# matcha123

청담원 플랫폼 관련 프로젝트.

## 스택

| 항목 | 버전 / 선택 |
| --- | --- |
| PHP | 8.4 |
| Laravel | 13.x |
| Livewire | 4.x |
| DB (표준) | PostgreSQL 17 |
| 캐시 / 큐 | Redis 7 |
| 실행 환경 | Docker Compose |
| 프론트 빌드 | Vite + Node 24 |

## 아키텍처 규칙

- **비즈니스 로직은 Service Layer(`app/Services/`)에만 둔다.** 컨트롤러와 Livewire 컴포넌트는
  검증 → 서비스 호출 → 응답까지만 담당한다. 자세한 내용은 [app/Services/README.md](app/Services/README.md).
- 외부 연동(공단 API 등)은 벤더 API에 위임하고 결과를 자체 DB에 저장한다.
- 상태를 바꾸는 요청은 POST + CSRF 토큰을 사용한다. GET으로 상태 변경 금지.
- 비밀값(API 키, DB 접속정보, 결제 상점/서명키)은 전부 `.env`로 분리한다. 저장소에 커밋 금지.
- 개인정보(주민번호 등)는 평문 저장·평문 로그 금지.

## 브랜치 전략

- `main` — 배포 기준 브랜치. 직접 커밋 금지.
- `develop` — 통합 브랜치. 기능 작업은 여기서 분기한다.
- 기능 브랜치 → `develop` PR → CI 통과 후 병합.

## 로컬 개발 환경

### Docker (권장 · 운영 환경과 동일)

```bash
cp .env.example .env
docker compose up -d
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

→ http://localhost:8000

### Docker 없이 (현재 이 PC 구성)

관리자 권한 없이 사용자 폴더에 포터블로 설치된 도구를 사용한다.

| 도구 | 경로 |
| --- | --- |
| PHP 8.4.24 | `C:\Users\winner\tools\php` |
| Composer 2.10 | `C:\Users\winner\tools\composer` |
| Node 24.19 | `C:\Users\winner\tools\node` |

세 경로 모두 사용자 PATH에 등록되어 있다(새 터미널부터 적용).

```powershell
php artisan serve      # http://localhost:8000
npm run dev            # Vite (별도 터미널)
```

이 구성에서는 PostgreSQL / Redis가 없으므로 로컬 `.env`가 SQLite + 파일 캐시를 사용한다.
`.env.example`은 운영 표준(PostgreSQL + Redis)을 기준으로 유지하므로, 로컬 `.env`만 다르다.
Docker를 쓸 수 있게 되면 `.env.example`을 그대로 복사해서 전환한다.

## 자주 쓰는 명령

```powershell
php artisan migrate           # 마이그레이션
php artisan migrate:fresh     # DB 초기화 후 재생성 (로컬 전용)
php artisan make:livewire Foo # Livewire 컴포넌트 생성
php artisan test              # 테스트
vendor\bin\pint               # 코드 스타일 정리
npm run build                 # 프론트 빌드
```
