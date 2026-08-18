{{-- Figma 176:839 (Frame 258) — 최종 CTA --}}
{{-- 시안 gra1 그라데이션 (164.57deg, primary-surface -> inverse-primary) --}}
<section class="w-full"
         style="background-image: linear-gradient(164.57deg, #e8f3f5 14.6%, #b8dce4 85.4%)">
    <div class="mx-auto flex max-w-content flex-col items-center gap-24 px-6 py-[120px]">
        <div class="flex w-full flex-col items-center gap-4 text-center">
            <h2 class="w-full text-eb44 text-label-strong lg:text-eb72">계산 결과, 더 정확히 알고 싶으세요?</h2>
            <p class="w-full text-b20 text-label-alt">
                등급·소득·이용 계획에 맞춰 예상 본인부담금을 정확히 알려드릴게요.
            </p>
        </div>

        <div class="flex w-full max-w-[329px] flex-col items-stretch gap-3 sm:flex-row sm:items-center">
            <a href="#"
               class="btn-lift flex h-[68px] flex-1 items-center justify-center rounded-md bg-primary px-7 text-b16 text-surface hover:brightness-95">
                무료 상담 신청
            </a>
            <a href="{{ route('support.copayment') }}"
               class="btn-lift flex h-[68px] flex-1 items-center justify-center rounded-md border border-line-divider bg-surface px-7 text-b16 text-label hover:bg-surface-alt">
                본인부담금 안내
            </a>
        </div>
    </div>
</section>
