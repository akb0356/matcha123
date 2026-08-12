{{-- Figma 153:2266 (Frame 147) — 비용 안내 --}}
@php
    $spec = [
        ['대상', '장기요양 1~5등급 · 인지지원등급'],
        ['제공 인력', '요양보호사'],
        ['이용 횟수', '1회 3~4시간 (등급별 한도 내)'],
        ['필요 서류', '장기요양인정서 · 표준장기요양이용계획서'],
    ];
@endphp

<section id="cost" class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">생각보다 부담은 크지 않아요</h2>
            <p class="text-m20 text-label-alt">
                장기요양보험이 적용되어 실제 내는 돈은 아주 적어요. 소득 구분에 따라 0원부터 시작합니다.
            </p>
        </div>

        {{-- 비용 패널은 강조색(violet)이 아니라 primary(청록) 계열을 쓴다. 방문간호와 동일. --}}
        <div class="flex w-full flex-col overflow-hidden rounded-xl shadow-panel lg:flex-row">
            <div class="flex flex-1 flex-col items-start justify-center gap-4 px-10 py-12"
                 style="background-image: linear-gradient(151.8deg, #e8f3f5 14.644%, #b8dce4 85.356%)">
                <div class="flex h-[30px] items-center justify-center gap-1 rounded-md bg-primary px-2">
                    <img src="{{ asset('images/icons/check-white.svg') }}" alt="" class="h-4 w-4">
                    <p class="text-m12 text-surface">장기요양보험 적용</p>
                </div>

                <p class="w-full text-b20 text-primary-strong">공단이 85~100%를 지원해, 실제 부담은 아주 적어요</p>

                <div class="flex w-full items-center justify-between border-t border-[rgba(54,148,171,0.1)] pt-4">
                    <p class="text-m20 text-label-alt">예상 월 본인부담</p>
                    <p class="text-primary-strong">
                        <span class="text-eb40">0~10 </span><span class="text-b24">만 원</span>
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

        {{-- 장기요양보험 급여율·본인부담 문구는 규정 변동 대상이다. 공단 고시 확인 후 확정할 것. --}}
    </div>
</section>
