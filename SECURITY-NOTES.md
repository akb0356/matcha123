# 보안 메모 — 감수한 취약점

작성일: 2026-08-12

## 배경

이 프로젝트는 **Laravel 11**을 사용한다. Laravel 11은 보안 지원이 종료되어
더 이상 패치가 나오지 않으며, 최신 버전인 **11.55.1**에도 수정 불가능한 보안 권고 3건이 남아 있다.

Laravel 12 이상으로 올리면 3건 모두 해소되지만, 프로젝트 결정에 따라 11을 유지한다.

`composer.json`의 `config.policy.advisories.ignore-id`에 이 3건만 명시적으로 등록했다.
**보안 검사 자체는 켜져 있으므로**, 새로운 취약점이 나오면 `composer audit`과 CI가 실패한다.

```bash
composer audit          # 무시 중인 건과 사유를 함께 출력
```

## 감수한 항목과 대응

### 1. CRLF injection in default email rule (high)

- 권고: `PKSA-3r5d-mb8f-1qw9`
- 수정 버전: Laravel 12.60.0 이상 (11.x에는 백포트 없음)

### 2. CVE-2026-48019 — Laravel CRLF injection in default email rule

- 권고: `PKSA-mdq4-51ck-6kdq`
- 참고: https://github.com/laravel/framework/security/advisories/GHSA-5vg9-5847-vvmq
- 수정 버전: Laravel 12.60.0 / 13.10.0 이상

**대응** — 1, 2번은 같은 원인이다. 기본 `email` 검증 규칙이 CR/LF를 걸러내지 않아
메일 헤더 인젝션으로 이어질 수 있다. 이메일 입력을 받는 모든 지점에서 아래를 지킨다.

```php
// 나쁨 — 기본 규칙은 CR/LF를 통과시킨다
'email' => ['required', 'email'],

// 좋음 — 엄격한 검증기 + 개행 명시적 차단
'email' => ['required', 'email:rfc,strict', 'not_regex:/[\r\n]/'],
```

- 사용자 입력을 `Mail::to()`, `from()`, `replyTo()`, 제목(subject)에 넣기 전에 반드시 위 규칙을 통과시킨다.
- 이메일을 DB에서 읽어 발송할 때도, 저장 시점에 검증을 통과한 값인지 확인한다.

### 3. Temporary Signed URL Path Confusion (medium)

- 권고: `PKSA-m5cs-t1y6-qpcs`
- 수정 버전: Laravel 12.61.1 이상

**대응** — 서명 URL의 경로 세그먼트에 사용자가 제어 가능한 값을 넣지 않는다.

```php
// 위험 — 사용자 입력이 경로에 들어감
URL::temporarySignedRoute('files.show', now()->addMinutes(30), ['path' => $userInput]);

// 안전 — 식별자만 넣고, 실제 대상은 서버에서 다시 조회
URL::temporarySignedRoute('files.show', now()->addMinutes(30), ['file' => $file->id]);
```

- 서명 검증(`hasValidSignature`) 통과 후에도 **권한 검사를 따로** 수행한다.
  서명은 "이 URL이 우리가 발급한 것"만 보장하며, "이 사용자가 접근해도 되는지"는 보장하지 않는다.

## 재검토 시점

- Laravel 12 이상으로 상향하는 시점에 이 파일과 `composer.json`의 `ignore-id`를 **함께 삭제**한다.
- 그 전까지는 분기마다 `composer audit`을 돌려 새 권고가 추가됐는지 확인한다.
