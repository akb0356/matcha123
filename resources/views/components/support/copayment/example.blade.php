{{-- Figma 163:5050 (Frame 243) — 계산 예시 --}}
@php
    /* 확인 필요: 예시 금액(120만 / 102만 / 18만)은 시안값이며 고시 대조 전이다. */
    $rows = [
        ['총 서비스 비용', '약 120만 원', false],
        ['공단 부담 (85%)', '약 102만 원', false],
        ['내 본인부담금(15%)', '약 18만 원', true],
    ];
@endphp

{{-- 시안 gra1 그라데이션 (152.16deg, primary-surface -> inverse-primary) --}}
<section id="copay-calc" class="w-full"
         style="background-image: linear-gradient(152.16deg, #e8f3f5 14.6%, #b8dce4 85.4%)">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">이렇게 계산돼요</h2>
            <p class="w-full text-m20 text-label-alt">
                3등급 어르신이 방문요양을 한 달 약 120만 원어치 이용했을 때, 실제 내시는 금액이에요.
            </p>
        </div>

        <div class="flex w-full flex-col items-center gap-24">
            <div class="flex w-full flex-col items-start gap-6 rounded-md border border-primary-soft bg-surface p-9 shadow-elevation-xs">
                <div class="flex w-full flex-col items-start gap-1 border-b border-surface-alt pb-5">
                    <p class="text-b14 text-primary">예시 조건</p>
                    <p class="w-full text-b24 text-label-strong">3등급 · 일반 대상자 · 방문요양 월 이용액 약 120만 원</p>
                </div>

                <div class="flex w-full flex-col items-start">
                    @foreach ($rows as $i => [$label, $amount, $emphasis])
                        <div class="flex w-full items-baseline justify-between gap-3 py-5 {{ $i > 0 ? 'border-t border-surface-alt' : '' }}">
                            @if ($emphasis)
                                <span class="text-b20 text-primary-strong">{{ $label }}</span>
                                <span class="text-eb30 text-primary-strong">{{ $amount }}</span>
                            @else
                                <span class="text-r20 text-label-alt">{{ $label }}</span>
                                <span class="text-b20 text-label">{{ $amount }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <p class="w-full text-r20 text-label-alt">
                    ※ 월 한도 초과분과 식비·간식비 등 비급여 항목은 별도예요. 경감 대상이면 부담금은 더 줄어듭니다.
                </p>
            </div>

            <a href="#"
               class="btn-lift flex h-14 items-center justify-center rounded bg-primary px-6 text-m20 text-surface hover:brightness-95">
                내 부담금 계산 도움받기
            </a>
        </div>
    </div>
</section>
