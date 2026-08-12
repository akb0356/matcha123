# 개발 환경 세팅 가이드

이 PC(Windows 10, 관리자 권한 없음)에서 VSCode + Figma + Laravel 11 + Livewire 3 + Tailwind
환경을 어떻게 만들었는지, 그리고 **다른 PC에서 똑같이 다시 만들려면 무엇을 하면 되는지** 정리한 문서다.

검증 시점: 2026-08-12 / PHP 8.3.33, Composer 2.10.2, Node 24.19.0, npm 11.17.0, Laravel 11.55.1

---

## 1. 전체 구조 — 4개의 층

이 환경은 서로 독립적인 4개 층이 쌓여 있는 구조다. **각 층은 따로 설치되고, 아랫층이 없으면 윗층이 동작하지 않는다.**

| 층 | 무엇 | 어디에 설치됨 | 없으면 |
| --- | --- | --- | --- |
| ① 실행 도구 | PHP, Composer, Node/npm | `C:\Users\winner\tools\` | 아무것도 못 함 |
| ② 백엔드 | Laravel 11 + Livewire 3 | 프로젝트 `vendor/` | 페이지가 안 뜸 |
| ③ 프론트 빌드 | Vite + Tailwind + PostCSS | 프로젝트 `node_modules/` | 스타일이 안 먹음 |
| ④ 디자인 소스 | Figma 커넥터 (MCP) | claude.ai 계정 | 색·폰트를 손으로 옮겨야 함 |

핵심: **①은 PC마다 한 번, ②③은 프로젝트마다, ④는 계정에 한 번.**

---

## 2. ① 실행 도구 — 관리자 권한 없이 설치하기

이 PC는 관리자 권한이 없어서 일반 설치 프로그램(`.msi`, `.exe` 인스톨러)을 쓸 수 없었다.
그래서 **압축 파일(zip)만 풀어서 쓰는 "포터블" 방식**으로 설치했다.

설치 위치와 방법:

| 도구 | 받는 곳 | 푼 위치 |
| --- | --- | --- |
| PHP 8.3 (VS16 x64 **Thread Safe 아님/NTS**) | https://windows.php.net/download | `C:\Users\winner\tools\php83` |
| Composer | https://getcomposer.org/composer.phar | `C:\Users\winner\tools\composer` |
| Node.js LTS (**zip** 버전, msi 아님) | https://nodejs.org/en/download | `C:\Users\winner\tools\node` |

### 2-1. PHP 확장 켜기 (이걸 안 하면 Laravel이 설치 자체가 안 된다)

`php.ini-development`를 `php.ini`로 복사한 뒤, 아래 줄들의 맨 앞 `;`(주석)을 지운다.

```ini
extension_dir = "ext"
extension=curl
extension=fileinfo
extension=mbstring
extension=openssl
extension=pdo_sqlite
extension=pdo_pgsql      ; PostgreSQL 쓸 때
extension=zip
```

### 2-2. PATH 등록 (관리자 권한 불필요 — "사용자" PATH만 건드린다)

PowerShell에서:

```powershell
$add = @(
  'C:\Users\winner\tools\php83',
  'C:\Users\winner\tools\composer',
  'C:\Users\winner\tools\node'
)
$cur = [Environment]::GetEnvironmentVariable('Path','User')
[Environment]::SetEnvironmentVariable('Path', ($cur + ';' + ($add -join ';')), 'User')
```

**등록 후 VSCode를 완전히 종료했다가 다시 켜야 반영된다.** (터미널만 다시 여는 걸로는 부족함)

확인:

```powershell
php -v ; composer --version ; node -v ; npm -v
```

### 2-3. Composer를 `composer` 한 단어로 쓰기

`composer.phar`만 있으면 `php composer.phar ...`로 길게 써야 하므로,
같은 폴더에 `composer.bat`을 만들어 둔다:

```bat
@echo off
php "%~dp0composer.phar" %*
```

---

## 3. ② + ③ 프로젝트 만들기

### 3-1. Laravel 11 뼈대 생성

**주의: 그냥 `create-project laravel/laravel`을 치면 최신 버전(13)이 깔린다.**
이 프로젝트는 Laravel 11이 필요하므로 버전을 명시해야 한다.
(실제로 이 저장소도 처음엔 Laravel 13으로 깔렸다가 커밋 `fc1ce67`에서 11로 다시 만들었다.)

```powershell
composer create-project laravel/laravel:^11.0 matcha123
cd matcha123
```

### 3-2. Livewire 3 설치

```powershell
composer require livewire/livewire:^3.5
```

Livewire 3는 **Alpine.js를 안에 포함하고 있다.** `npm install alpinejs`를 절대 하지 말 것 —
Alpine이 두 번 등록되어 아코디언·드롭다운 같은 게 조용히 망가진다.
(`resources/js/app.js` 주석에 이 내용을 남겨 두었다.)

### 3-3. Tailwind 3 + Vite

Laravel에는 Vite가 이미 들어 있다. Tailwind만 추가한다.

```powershell
npm install -D tailwindcss@^3.4 postcss autoprefixer
npx tailwindcss init -p
```

`tailwind.config.js`의 `content`에 **Tailwind가 클래스 이름을 찾아볼 파일 목록**을 적는다.
여기 없는 파일에 쓴 클래스는 CSS로 만들어지지 않는다 — 스타일이 안 먹는 사고의 90%가 이것 때문이다.

```js
content: [
  './resources/**/*.blade.php',
  './resources/**/*.js',
  './app/Livewire/**/*.php',   // Livewire 컴포넌트 클래스 안의 클래스 문자열
],
```

`resources/css/app.css` 맨 위:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

`vite.config.js`에 Livewire 파일 저장 시 브라우저 자동 새로고침을 추가:

```js
laravel({
  input: ['resources/css/app.css', 'resources/js/app.js'],
  refresh: ['resources/views/**', 'app/Livewire/**'],
}),
```

### 3-4. 레이아웃에 연결

`resources/views/components/layouts/app.blade.php`의 `<head>`에 이 한 줄이 있어야
Vite가 만든 CSS/JS가 페이지에 붙는다.

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

### 3-5. 실행

```powershell
php artisan serve      # 터미널 1 — 백엔드 (http://127.0.0.1:8000)
npm run dev            # 터미널 2 — 프론트 빌드 감시
```

**두 개를 동시에 켜 두어야 한다.** `npm run dev`는 서버가 아니라
"파일이 바뀌면 CSS/JS를 다시 만드는 감시자"다.

---

## 4. ④ Figma 연동

### 이 프로젝트에서 실제로 쓴 방식

VSCode에 Figma 플러그인을 깐 게 아니라, **claude.ai의 Figma 커넥터(MCP)** 를 연결했다.
설정이 계정에 저장되므로 **PC를 바꿔도 다시 로그인만 하면 그대로 따라온다.**

연결: claude.ai → 설정 → 커넥터 → Figma → 연결 → Figma 계정 승인
(VSCode 안에서는 OAuth 창을 못 띄우므로, 브라우저에서 먼저 연결해 두어야 한다.)

### 디자인 → 코드로 옮긴 실제 흐름

1. Figma 파일 URL을 준다 (이 프로젝트: 파일 키 `sIDsDQere8geTVIKciOGxh`)
2. 디자인 변수(색·폰트)를 통째로 읽어온다 → `get_variable_defs`
3. 그 값을 `tailwind.config.js`의 `theme.extend`에 **토큰 이름을 Figma와 1:1로 맞춰서** 옮긴다
4. 이후 화면 작업은 `#3694ab` 같은 색상 코드 대신 `text-primary`, `text-b24` 같은 이름으로만 한다

이렇게 하면 디자인 색이 바뀌었을 때 **`tailwind.config.js` 한 곳만 고치면 전체 화면에 반영된다.**
Blade 파일마다 색상 코드를 흩뿌려 놓으면 나중에 전수 검색해서 고쳐야 한다.

> 참고: 이 저장소의 `tailwind.config.js`에는 Figma에 변수로 등록돼 있지 않아 화면에서 직접 뽑은 값
> (`label.assistive`, `info`)이 섞여 있고, 주석으로 표시해 두었다.

---

## 5. 다른 곳에서 다시 세팅하기

### 케이스 A — **같은 프로젝트를 다른 PC에서 이어서 작업**

`vendor/`와 `node_modules/`는 git에 올라가지 않으므로 받아서 다시 설치해야 한다.

```powershell
git clone https://github.com/akb0356/matcha123.git
cd matcha123
composer install          # composer.lock 기준으로 동일 버전 설치
npm install               # package-lock.json 기준으로 동일 버전 설치
copy .env.example .env
php artisan key:generate  # 이 프로젝트 전용 암호화 키 생성 (PC마다 새로)
php artisan migrate
npm run build
```

`.env`는 **비밀값이 들어 있어 git에 없다.** 실제 DB 비밀번호·API 키는 별도로 안전하게 전달받아 채운다.

### 케이스 B — **완전히 새 프로젝트를 같은 스택으로**

위 2장 → 3장을 순서대로. 요약하면:

```powershell
# ① PC에 한 번만 (php/composer/node 포터블 설치 + PATH)
composer create-project laravel/laravel:^11.0 새프로젝트명
cd 새프로젝트명
composer require livewire/livewire:^3.5
npm install -D tailwindcss@^3.4 postcss autoprefixer
npx tailwindcss init -p
# tailwind.config.js content 배열 채우기
# app.css에 @tailwind 3줄
# 레이아웃에 @vite(...) 한 줄
php artisan serve
npm run dev
```

### 케이스 C — **Docker(Sail)로 제대로 된 환경**

PostgreSQL·Redis까지 실제 운영과 같게 쓰려면 WSL2 안에 Docker를 깔고 Sail을 쓴다.
절차는 [CLAUDE.md](../CLAUDE.md)의 "로컬 개발 환경 (WSL2 + Sail)" 절에 있다.
프로젝트를 `/mnt/c/...`가 아니라 **리눅스 파일시스템(`~/`)에 복사해서** 작업해야 속도가 나온다.

---

## 6. 자주 걸리는 함정

| 증상 | 원인 | 해결 |
| --- | --- | --- |
| `php`를 못 찾음 | PATH 등록 후 VSCode 재시작 안 함 | VSCode 완전 종료 후 재실행 |
| `composer install` 중 확장 오류 | php.ini에서 확장 주석 안 지움 | 2-1절 확인 |
| Tailwind 클래스가 안 먹음 | `content` 배열에 그 파일이 없음 | 3-3절 경로 추가 후 `npm run dev` 재시작 |
| 새로 만든 클래스만 안 먹음 | `npm run dev`를 안 켜 둠 | 터미널 2에서 실행 유지 |
| 아코디언·캐러셀이 죽음 | Alpine 이중 등록 | `alpinejs`를 직접 import/설치하지 말 것 |
| 화면이 아예 무스타일 | 레이아웃에 `@vite(...)` 누락 | 3-4절 |
| Laravel 버전이 13으로 깔림 | 버전 미지정 | `laravel/laravel:^11.0` |
| Sail 밖에서 DB 연결 실패 | `.env`의 호스트 `pgsql`은 도커 내부 이름 | 임시로 `DB_CONNECTION=sqlite`, `SESSION_DRIVER=file` |
