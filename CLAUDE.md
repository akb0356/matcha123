# matcha123

청담원 플랫폼 관련 프로젝트.

## 스택

| 항목 | 버전 |
| --- | --- |
| PHP | 8.3 |
| Laravel | 11.55.1 |
| Livewire | 3.8.4 |
| Alpine.js | Livewire 3 번들 (별도 설치 안 함) |
| Tailwind CSS | 3.4 |
| PostgreSQL | 18 |
| 로컬 개발 | WSL2 + Laravel Sail |
| 운영 서버 | Rocky Linux 9 (임시) |
| CI/CD | GitHub Actions |

> **Laravel 11은 보안 지원이 종료된 버전이다.** 수정 불가능한 취약점 3건을 감수하고 사용 중이며,
> 코드 작성 시 지켜야 할 대응 방법이 [SECURITY-NOTES.md](SECURITY-NOTES.md)에 정리되어 있다.
> **이메일 검증과 서명 URL을 다룰 때는 반드시 먼저 읽을 것.**

## 아키텍처 규칙

- **비즈니스 로직은 Service Layer(`app/Services/`)에만 둔다.** 컨트롤러와 Livewire 컴포넌트는
  검증 → 서비스 호출 → 응답까지만 담당한다. 상세: [app/Services/README.md](app/Services/README.md)
- 외부 연동(공단 API 등)은 벤더 API에 위임하고 결과를 자체 DB에 저장한다.
- 상태를 바꾸는 요청은 POST + CSRF 토큰. GET으로 상태 변경 금지.
- 비밀값(API 키, DB 접속정보, 결제 상점/서명키)은 전부 `.env`로 분리한다. 저장소 커밋 금지.
- 개인정보(주민번호 등)는 평문 저장·평문 로그 금지.
- **Alpine.js를 따로 import 하지 않는다.** Livewire 3에 번들되어 있어 이중 등록되면 오작동한다.
  플러그인 추가는 [resources/js/app.js](resources/js/app.js)의 주석 참고.

## 브랜치 전략

- `main` — 배포 기준. 직접 커밋 금지.
- `develop` — 통합 브랜치. 기능 작업은 여기서 분기한다.
- 기능 브랜치 → `develop` PR → CI 통과 후 병합.

## 로컬 개발 환경 (WSL2 + Sail)

### 최초 1회 준비

WSL2와 Ubuntu는 이 PC에 설치되어 있다. Docker는 **Docker Desktop이 아니라 Ubuntu 안에 직접**
설치한다(Windows 관리자 권한이 필요 없다).

```bash
# Windows 터미널에서
wsl -d Ubuntu

# 아래부터는 Ubuntu 안에서
sudo apt-get update
sudo apt-get install -y ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc
echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu $(. /etc/os-release && echo $VERSION_CODENAME) stable" \
  | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
sudo apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
sudo usermod -aG docker $USER
sudo service docker start
```

`sudo usermod` 이후에는 WSL을 재시작해야 그룹 변경이 적용된다 (`wsl --shutdown` 후 다시 진입).

### 프로젝트 위치

Windows 파일시스템(`/mnt/c/...`)에 두면 Docker I/O가 매우 느리다.
**리눅스 파일시스템으로 복사해서 작업한다.**

```bash
cp -r /mnt/c/Users/winner/projects/matcha123 ~/matcha123
cd ~/matcha123
```

### 실행

```bash
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

→ http://localhost

`sail`을 짧게 쓰려면: `echo "alias sail='./vendor/bin/sail'" >> ~/.bashrc`

## Sail 없이 (Windows 네이티브, 임시)

Docker를 아직 못 쓰는 상황을 위한 대안이다. PostgreSQL이 없으므로 DB 작업은 제한된다.

관리자 권한 없이 사용자 폴더에 포터블 설치되어 있고, 세 경로 모두 사용자 PATH에 등록되어 있다.

| 도구 | 경로 |
| --- | --- |
| PHP 8.3.33 | `C:\Users\winner\tools\php83` |
| Composer 2.10 | `C:\Users\winner\tools\composer` |
| Node 24.19 | `C:\Users\winner\tools\node` |

```powershell
# .env에서 DB_CONNECTION=sqlite 로 바꾼 뒤
php artisan migrate
php artisan serve
npm run dev
```

## 자주 쓰는 명령

Sail 환경에서는 앞에 `./vendor/bin/sail`을 붙인다.

```bash
php artisan migrate                # 마이그레이션
php artisan migrate:fresh --seed   # DB 초기화 (로컬 전용)
php artisan make:livewire Foo      # Livewire 컴포넌트 생성
php artisan test                   # 테스트
vendor/bin/pint                    # 코드 스타일 정리
composer audit                     # 보안 감사 (무시 항목 사유 포함 출력)
npm run dev                        # Vite 개발 서버
npm run build                      # 프론트 빌드
```

## CI/CD

- [.github/workflows/ci.yml](.github/workflows/ci.yml) — `main`/`develop` push 및 PR에서 실행.
  PHP 8.3 + PostgreSQL 18 서비스 컨테이너로 `composer audit` → Pint → 마이그레이션 → 테스트.
- [.github/workflows/deploy.yml](.github/workflows/deploy.yml) — Rocky Linux 9 배포.
  **현재 수동 실행(workflow_dispatch)만 가능하다.** 배포 서버와 시크릿이 확정되면
  파일 상단 주석대로 push 트리거를 켠다. 필요한 시크릿 목록도 그 주석에 있다.
