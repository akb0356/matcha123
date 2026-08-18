{{-- Figma 208:866 (S7 / 대상별 가치) --}}
@php
    $cards = [
        ['센터장 · 운영이 손에 잡혀요', '연계로 어르신이 이어지고 상담은 등록까지 추적됩니다. 케어 품질과 채용까지 한 곳에서 관리해요.'],
        ['의료기관 · 퇴원 후가 이어져요', '치료 이후 집으로 돌아가는 구간에 돌봄 경로가 생깁니다. 등급신청은 센터가 무료로 도와드려요.'],
        ['보호자 · 확인할 수 있어 안심돼요', '어떤 돌봄이 언제 제공됐는지 기록으로 남습니다.'],
    ];
@endphp

<section class="w-full" style="background-color: rgba(5, 78, 96, 0.05)">
    <div class="mx-auto flex max-w-content flex-col items-start gap-16 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label-neutral">
            센터장 · 의료기관 · 보호자,<br>각자 얻는 것이 분명합니다
        </h2>

        <div class="grid w-full grid-cols-1 items-stretch gap-6 md:grid-cols-3">
            @foreach ($cards as $i => [$title, $desc])
                <div class="flex flex-col items-start gap-3 rounded-md bg-surface p-8"
                     style="filter: drop-shadow(0 {{ $i === 1 ? 16 : 12 }}px 12px rgba(207,223,234,0.25))">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary text-b16 text-surface">
                        {{ $i + 1 }}
                    </span>
                    <p class="w-full text-b20 text-label-neutral">{{ $title }}</p>
                    {{-- 시안 raw 색 #8c837e. 토큰 미등록이라 그대로 쓴다. --}}
                    <p class="w-full text-m16" style="color: #8c837e">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
