{{-- Figma 163:5053 (Frame 246) — 최종 CTA --}}
<section class="w-full bg-primary-heavy">
    <div class="mx-auto flex max-w-content flex-col items-center gap-24 px-6 py-[120px]">
        <div class="flex w-full flex-col items-center gap-4 text-center">
            <h2 class="w-full text-eb44 text-surface lg:text-eb72">내 부담금이 얼마인지 궁금하신가요?</h2>
            <p class="w-full text-b20 text-surface">
                등급·소득·이용 계획에 맞춰 예상 본인부담금을 알려드릴게요. 청담원이 함께 계산해 드립니다.
            </p>
        </div>

        <div class="flex w-full max-w-[372px] flex-col items-stretch gap-3 sm:flex-row sm:items-center">
            <a href="#"
               class="btn-hover flex h-[68px] flex-1 items-center justify-center gap-2 rounded-md bg-primary-strong px-7 text-b16 text-surface hover:bg-primary-heavy">
                무료 상담 신청
                <img src="{{ asset('images/icons/arrow-right-white.svg') }}" alt="" class="h-[16.81px] w-5">
            </a>
            <a href="{{ route('support.long-term-care-grade') }}"
               class="btn-hover flex h-[68px] flex-1 items-center justify-center rounded-md border border-line-divider bg-surface px-7 text-b16 text-label hover:bg-surface-alt">
                장기요양등급 안내
            </a>
        </div>
    </div>
</section>
