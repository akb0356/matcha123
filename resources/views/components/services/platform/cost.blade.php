{{-- Figma 208:891 (Frame 147) — 도입 비용 --}}
@php
    $spec = [
        ['대상', '운영 중인 재가복지센터 · 병·의원'],
        ['제공 범위', '환자연계 · 상담관리 · 케어플랜 · 구인구직'],
        ['계약', '월 단위 이용 계약'],
        ['필요 서류', '사업자등록증 · 장기요양기관 지정서'],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[760px] flex-col items-start gap-3">
            <h2 class="w-full text-eb40 text-label">도입 부담은 생각보다 가볍습니다</h2>
            <p class="w-full text-m20 text-label-alt">
                센터 규모와 사용할 기능 범위에 따라 달라집니다. 상담 시 정확히 안내해 드려요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 overflow-hidden rounded-xl shadow-[0_10px_15px_rgba(0,0,0,0.08)] lg:grid-cols-2">
            {{-- 요약 (208:896). 시안 gra1 과 같은 계열 그라데이션이다. --}}
            <div class="flex flex-col items-start justify-center gap-4 px-10 py-12"
                 style="background-image: linear-gradient(151.8deg, #e8f3f5 14.6%, #b8dce4 85.4%)">
                <span class="flex h-[30px] items-center justify-center gap-1 rounded-md bg-primary px-2">
                    <img src="{{ asset('images/icons/check-white.svg') }}" alt="" class="h-4 w-4">
                    <span class="text-m12 text-surface">규모별 맞춤 제안</span>
                </span>

                <p class="w-full text-b20 text-primary-strong">지금 운영 규모에 맞춰 견적을 드려요</p>

                <div class="flex w-full items-center justify-between gap-3 border-t pt-4"
                     style="border-color: rgba(54, 148, 171, 0.1)">
                    <span class="text-m20 text-label-alt">도입 비용</span>
                    <span class="text-eb40 text-primary-strong">맞춤 견적</span>
                </div>

                <p class="w-full text-m14 text-label-alt">간호사 수 · 이용 어르신 수 · 기능 범위에 따라 달라져요</p>
            </div>

            {{-- 스펙 (208:908) --}}
            <div class="flex flex-col items-start justify-center bg-surface px-2">
                @foreach ($spec as $i => [$label, $value])
                    <div class="flex w-full items-center justify-between gap-4 px-6 py-5 {{ $i > 0 ? 'border-t border-surface-alt' : '' }}">
                        <span class="shrink-0 text-m16 text-label-alt">{{ $label }}</span>
                        <span class="text-right text-m20 text-label">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
