#!/usr/bin/env bash
#
# 서비스 소개 페이지를 정적 HTML로 뽑아 GitHub Pages(gh-pages 브랜치)용 산출물을 만든다.
#
# 이 페이지들은 wire: 서버 액션이 0건이고 인터랙션이 전부 Alpine이라 정적 변환이 가능하다.
# 상담 신청 폼처럼 서버가 필요한 기능이 붙으면 Pages로는 서비스할 수 없으니
# PaaS나 운영 서버로 옮겨야 한다.
#
# 사용법:
#   1) npm run build
#   2) ASSET_URL=$BASE_URL php artisan serve --port=8123   (SESSION_DRIVER=file 권장)
#   3) tools/export-static.sh <출력경로>
#
# 검증: FAQ 1번 답변이 보이면 Alpine이 정상 로드된 것이다(x-cloak에 걸리면 안 보인다).

set -euo pipefail

OUT="${1:?출력 경로를 인자로 주세요. 예: tools/export-static.sh /tmp/pages-out}"
ORIGIN="${ORIGIN:-http://127.0.0.1:8123}"
BASE_URL="${BASE_URL:-https://akb0356.github.io/matcha123}"
BASE_PATH="${BASE_PATH:-/matcha123}"

# 내보낼 페이지: <라우트 경로>:<출력 디렉터리(빈 값이면 루트)>
PAGES=(
  "/services/visiting-nursing:services/visiting-nursing"
  "/services/visiting-care:services/visiting-care"
  "/services/visiting-bath:services/visiting-bath"
  "/services/dementia-respite:services/dementia-respite"
  "/services/platform:services/platform"
  "/support/long-term-care-grade:support/long-term-care-grade"
  "/support/copayment:support/copayment"
  "/support/cost-calculator:support/cost-calculator"
)
# 루트(/)에 둘 페이지 = 메인
ROOT_PAGE="/"

echo "==> 출력 경로 초기화: $OUT"
mkdir -p "$OUT"
( cd "$OUT" && rm -rf images build livewire services support index.html robots.txt README.md )

fetch_page() {
  local route="$1" dest="$2"
  mkdir -p "$(dirname "$dest")"
  curl -sSf "$ORIGIN$route" -o "$dest"

  # Livewire 스크립트는 루트 절대경로(/livewire/livewire.js)로 나오는데 Pages는
  # 하위 경로에 놓이므로 base path를 붙인다. 하위 디렉터리 페이지에서도 깨지지 않는다.
  # 이 파일이 Alpine 공급원이라 빠지면 아코디언·캐러셀이 죽는다.
  # route() 는 APP_URL 이 아니라 요청 호스트를 쓰므로 페이지 간 링크에 개발 서버
  # 주소가 박힌다. 공개 주소로 바꿔 준다.
  perl -0777 -i -pe "
    s{\\Q$ORIGIN\\E}{$BASE_URL}g;
    s{src=\"/livewire/livewire\\.js\\?id=[^\"]*\"}{src=\"$BASE_PATH/livewire/livewire.min.js\"}g;
    s{\\s*data-update-uri=\"/livewire/update\"}{}g;      # 정적에는 서버 엔드포인트가 없다
    s{\\s*data-csrf=\"[^\"]*\"}{}g;                       # 세션에 묶인 토큰 제거
    s{[ \\t]*<meta name=\"csrf-token\" content=\"[^\"]*\">\\r?\\n}{}g;
    s{(<meta name=\"viewport\"[^>]*>)}{\$1\\n    <meta name=\"robots\" content=\"noindex, nofollow\">}g;
  " "$dest"

  printf '  %-40s -> %s\n' "$route" "${dest#$OUT/}"
}

echo "==> 페이지 내보내기"
for entry in "${PAGES[@]}"; do
  route="${entry%%:*}"; dir="${entry##*:}"
  fetch_page "$route" "$OUT/$dir/index.html"
done
fetch_page "$ROOT_PAGE" "$OUT/index.html"

echo "==> 자산 복사"
cp -r public/images "$OUT/images"
cp -r public/build  "$OUT/build"
mkdir -p "$OUT/livewire"
cp vendor/livewire/livewire/dist/livewire.min.js "$OUT/livewire/livewire.min.js"

echo "==> 크롤링 차단 · Jekyll 비활성"
printf 'User-agent: *\nDisallow: /\n' > "$OUT/robots.txt"
touch "$OUT/.nojekyll"

# gh-pages 브랜치 설명서. 이걸 빼면 배포마다 README 가 삭제 대상으로 잡힌다.
echo "==> 브랜치 설명서"
cp "$(dirname "$0")/gh-pages-README.md" "$OUT/README.md"

echo "==> 검증"
fail=0
for f in $(cd "$OUT" && find . -name index.html); do
  html="$OUT/${f#./}"
  for pattern in '127.0.0.1' 'localhost' 'csrf'; do
    if grep -q "$pattern" "$html"; then echo "  FAIL: $f 에 '$pattern' 잔존"; fail=1; fi
  done
  grep -q 'name="robots" content="noindex' "$html" || { echo "  FAIL: $f 에 noindex 없음"; fail=1; }
  grep -q "$BASE_PATH/livewire/livewire.min.js" "$html" || { echo "  FAIL: $f 의 Livewire 경로 미치환"; fail=1; }
done
[ "$fail" -eq 0 ] && echo "  모든 페이지 통과" || { echo "검증 실패"; exit 1; }

echo "==> 완료: $(cd "$OUT" && find . -type f | wc -l) 개 파일"
