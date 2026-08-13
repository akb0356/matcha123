# gh-pages (자동 생성 브랜치)

이 브랜치는 **손으로 편집하지 마세요.** `develop`을 정적 HTML로 뽑아낸 산출물입니다.

- 원본: `develop` 브랜치
- 공개 주소: https://akb0356.github.io/matcha123/
- `robots.txt`와 `<meta name="robots" content="noindex, nofollow">`로 검색엔진 색인을 막아 두었습니다.

## 담긴 페이지

| 주소 | 원본 뷰 |
| --- | --- |
| `/` | `resources/views/livewire/main.blade.php` |
| `/services/visiting-nursing/` | 방문간호 |
| `/services/visiting-care/` | 방문요양 |
| `/services/visiting-bath/` | 방문목욕 |
| `/services/dementia-respite/` | 치매가족휴가제 |

## 다시 뽑는 방법

`develop`에서 아래 한 줄이면 됩니다. 페이지 목록·URL 치환·검증이 모두 스크립트에 들어 있습니다.

```bash
bash tools/export-static.sh <출력경로>
```

그 뒤 출력 경로의 내용을 이 브랜치에 통째로 덮어쓰고 푸시합니다.
페이지를 추가할 때는 스크립트 상단의 `PAGES` 배열만 손봅니다.

## 남은 확인 사항

- 비용 문구(공단 급여율, 본인부담 금액)는 공단 고시 대조 전입니다.
- 히어로·간호사 프로필은 아직 임시 이미지입니다.
