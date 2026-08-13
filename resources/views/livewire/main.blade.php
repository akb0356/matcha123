{{--
    메인 페이지
    원본 디자인: Figma sIDsDQere8geTVIKciOGxh
      · 기본  main   (20:1043)
      · 호버  main2  (178:884)
      · 탭    main3  (178:1177)

    인터랙션 4가지
      1) 사업 소개  — 호버 시 카드 확장 + 배경 그라데이션 (business)
      2) 문제 제기  — 호버 시 블러 + 화이트 그라데이션 + 문구 (problem)
      3) 추세 지표  — 스크롤 진입 시 0부터 카운트업 (trend)
      4) 화면 소개  — 탭 전환 시 스크린샷·라벨 교체 (screens)

    섹션 전체가 스크롤 진입 시 떠오르는 효과는 app.js 의 setupSectionReveal 이
    main > section 을 대상으로 처리하므로 별도 작업이 없다.

    비용 계산기(Figma 178:2040)는 급여 단가 확정 후 별도로 붙인다.
--}}
<div class="bg-surface">
    <x-site.header />

    <main>
        <x-main.hero />
        <x-main.business />
        <x-main.problem />
        <x-main.record />
        <x-main.trend />
        <x-main.services />
        <x-main.screens />
        <x-main.reviews />
        <x-main.cta />
    </main>

    <x-site.footer />
</div>
