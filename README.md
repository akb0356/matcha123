# gh-pages (자동 생성 브랜치)

이 브랜치는 **손으로 편집하지 마세요.** `develop`의 방문간호 페이지를
정적 HTML로 뽑아낸 산출물입니다.

- 원본: `develop` 브랜치 / `resources/views/livewire/services/visiting-nursing.blade.php`
- 공개 주소: https://akb0356.github.io/matcha123/
- `robots.txt`와 `<meta name="robots" content="noindex, nofollow">`로 검색엔진 색인을 막아 두었습니다.

## 다시 뽑는 방법

1. `develop`에서 `npm run build` 후 `php artisan serve`
2. `ASSET_URL=https://akb0356.github.io/matcha123` 를 준 상태로 페이지를 받아 `index.html`로 저장
3. Livewire 스크립트 경로를 `livewire/livewire.min.js`(상대경로)로 바꾸고 CSRF 토큰 제거, noindex 주입
4. `public/images`, `public/build`, `vendor/livewire/livewire/dist/livewire.min.js` 를 함께 복사

FAQ 2~5번 답변과 비용 문구가 확정되면 다시 뽑아야 합니다.
