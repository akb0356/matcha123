{{-- Figma 153:2992 (Frame 191) — 비용 안내 --}}
@php
    $spec = [
        ['제공 형태', '종일방문요양 (1회 12시간)'],
        ['이용 대상', '치매 수급자 (1·2등급 또는 치매)'],
        ['이용 한도', '월 한도액과 별도 · 연 최대 12일'],
        ['필요 서류', '장기요양인정서 · 이용계획서'],
    ];
@endphp

<section id="cost" class="w-full bg-fill-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">생각보다 부담은 크지 않아요</h2>
            <p class="text-m20 text-label-alt">
                장기요양보험이 적용되어 실제 내는 돈은 아주 적어요. 소득 구분에 따라 0원부터 시작합니다.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-6">
            <div class="flex w-full flex-col items-start gap-4">
                {{-- 비용 패널은 강조색(green)이 아니라 primary(청록) 계열을 쓴다. 네 페이지 공통. --}}
                <div class="flex w-full flex-col overflow-hidden rounded-xl shadow-panel lg:flex-row">
                    <div class="flex flex-1 flex-col items-start justify-center gap-4 px-10 py-12"
                         style="background-image: linear-gradient(151.8deg, #e8f3f5 14.644%, #b8dce4 85.356%)">
                        <div class="flex h-[30px] items-center justify-center gap-1 rounded-md bg-primary px-2">
                            <img src="{{ asset('images/icons/check-white.svg') }}" alt="" class="h-4 w-4">
                            <p class="text-m12 text-surface">장기요양보험 적용</p>
                        </div>

                        <p class="w-full text-b20 text-primary-strong">공단이 대부분 부담해, 실제 내는 돈은 아주 적어요</p>

                        <div class="flex w-full items-center justify-between gap-4 border-t border-[rgba(54,148,171,0.1)] pt-4">
                            <p class="text-m20 text-label-alt">1회(12시간) 본인부담</p>
                            <p class="whitespace-nowrap text-primary-strong">
                                <span class="text-eb40">0~1 </span><span class="text-b24">만 원대</span>
                            </p>
                        </div>

                        <p class="text-r14 text-label-alt">
                            기초생활수급자는 <span class="text-b14 text-primary-strong">0원</span> · 감경 대상은 더 적게 내요
                        </p>
                    </div>

                    <dl class="flex flex-1 flex-col items-start justify-center bg-surface px-2">
                        @foreach ($spec as $i => [$label, $value])
                            <div class="flex w-full items-center justify-between gap-4 px-6 py-5 {{ $i > 0 ? 'border-t border-surface-alt' : '' }}">
                                <dt class="text-m16 text-label-alt">{{ $label }}</dt>
                                <dd class="text-right text-m20 text-label">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="flex w-full items-start gap-2">
                    <img src="{{ asset('images/icons/info.svg') }}" alt="" class="mt-0.5 h-[18px] w-[18px] shrink-0">
                    <p class="flex-1 text-[15px] font-normal leading-[23px] tracking-[-0.6px] text-label-alt">
                        월 한도액과 관계없이 연 12일까지 이용할 수 있어요. 정확한 금액은 어르신 소득 구분에 따라 달라지며 상담 시 안내해 드립니다.
                    </p>
                </div>
            </div>

            <div class="flex w-full flex-col items-start justify-between gap-4 rounded-xl border border-surface-alt bg-surface p-6 sm:flex-row sm:items-center">
                <p class="text-b20 text-label">우리 어르신 기준 예상 본인부담이 궁금하다면?</p>
                <a href="#"
                   class="btn-hover hover:bg-primary-strong flex h-11 shrink-0 items-center justify-center rounded bg-primary px-5 text-b16 text-surface">
                    비용 계산기로 확인
                </a>
            </div>
        </div>

        {{-- 장기요양보험 급여율·본인부담 문구는 규정 변동 대상이다. 공단 고시 확인 후 확정할 것. --}}
    </div>
</section>
