{{--
    본인부담금 안내 페이지
    원본 디자인: Figma sIDsDQere8geTVIKciOGxh / node 156:4390 (본인부담금 안내, 1920×6710)
    섹션 순서는 아트보드의 y좌표 순서를 그대로 따른다.

    확인 필요: 부담률·경감 구간·등급별 월 한도액·계산 예시는 모두 시안 문구를
    그대로 옮긴 것이며 공단 고시 대조 전이다. FAQ 2~5번 답변은 임시 문구다.
--}}
<div class="bg-surface">
    <x-site.header />

    <main>
        <x-support.copayment.hero />
        <x-support.copayment.flow />
        <x-support.copayment.kinds />
        <x-support.copayment.reduction />
        <x-support.copayment.limits />
        <x-support.copayment.example />
        <x-support.copayment.faq />
        <x-support.copayment.cta />
    </main>

    <x-site.footer />
</div>
