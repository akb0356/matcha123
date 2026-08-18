{{-- Figma 163:5045 (Frame 240) — 등급별 월 이용 한도 --}}
@php
    /*
     * 확인 필요: 월 한도액·환산 금액은 전부 시안값이며 공단 고시 대조 전이다.
     * 시안 자체가 매년 변동된다고 명시하고 있다.
     *
     * 또한 장기요양등급 안내 페이지(156:4141)와 메인 비용 계산기(178:2139)는
     * 1등급 월 한도를 2,512,900원으로 적어 두었는데 이 시안은 2,069,900원이다.
     * 두 값이 어긋나므로 확정 후 한쪽으로 통일해야 한다.
     */
    $limits = [
        ['1등급', '2,069,900원', '약 31만 원'],
        ['2등급', '1,869,600원', '약 28만 원'],
        ['3등급', '1,455,800원', '약 22만 원'],
        ['4등급', '1,341,800원', '약 20만 원'],
        ['5등급', '1,151,600원', '약 17만 원'],
        ['인지지원등급', '643,000원', '약 10만 원'],
    ];
@endphp

<section id="copay-limit" class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[900px] flex-col items-start gap-4">
            <h2 class="w-full text-eb40 text-label">등급마다 월 이용 한도가 있어요</h2>
            <p class="w-full text-m20 text-label-alt">
                재가급여는 등급별로 한 달에 쓸 수 있는 한도가 정해져 있어요. 이 한도 안에서 이용하면 본인부담은 15%(일반)예요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="grid w-full grid-cols-1 items-stretch gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($limits as [$grade, $limit, $copay])
                    <div class="flex flex-col items-start gap-4 rounded-md border border-line-neutral bg-surface p-7">
                        <p class="text-b24 text-label-strong">{{ $grade }}</p>
                        <div class="flex w-full flex-col items-start gap-3 border-t border-surface-alt pt-4">
                            <div class="flex w-full items-baseline justify-between gap-2">
                                <span class="text-r20 text-label-alt">월 이용 한도액</span>
                                <span class="text-m20 text-label">{{ $limit }}</span>
                            </div>
                            <div class="flex w-full items-baseline justify-between gap-2">
                                <span class="text-r20 text-label-alt">본인부담 15% 시</span>
                                <span class="text-b20 text-primary-strong">{{ $copay }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="w-full text-m16 text-label-alt">
                ※ 월 한도액·환산 금액은 공단 고시 기준으로 매년 변동돼요. 정확한 금액은 상담 시 안내해 드려요.
            </p>
        </div>
    </div>
</section>
