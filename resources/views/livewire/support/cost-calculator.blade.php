{{--
    비용 계산기 페이지
    원본 디자인: Figma sIDsDQere8geTVIKciOGxh / node 163:5589 (비용 계산기, 1920×4260)
    섹션 순서는 아트보드의 y좌표 순서를 그대로 따른다.

    계산 기능은 넣지 않았다. 버튼은 눌리고 선택 표시·이용일수·내역 문구는 바뀌지만
    금액은 시안 예시값 고정이다. 공단 단가 확정 후 계산을 붙인다.
--}}
<div class="bg-surface">
    <x-site.header />

    <main>
        <x-support.calculator.hero />
        <x-support.calculator.panel />
        <x-support.calculator.excluded />
        <x-support.calculator.faq />
        <x-support.calculator.cta />
    </main>

    <x-site.footer />
</div>
