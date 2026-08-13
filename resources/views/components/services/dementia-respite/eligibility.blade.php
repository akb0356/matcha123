{{-- Figma 153:3177 (Frame 185) — 이용 대상 체크리스트 --}}
@php
    $items = [
        '장기요양 1·2등급을 보유한 수급자',
        '치매 진단을 받은 치매 수급자 (등급 무관)',
        '가정에서 가족이 직접 어르신을 모시고 있는 경우',
        '보호자의 휴식·경조사·병원 진료 등으로 하루 돌봄이 필요한 경우',
    ];
@endphp

<section class="w-full bg-accent-green-soft/10">
    <div class="mx-auto flex max-w-content flex-col items-start gap-[63px] px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">이런 분이 이용할 수 있어요</h2>
            <p class="text-m20 text-label-alt">
                아래에 해당하면 신청 대상입니다. 등급이나 대상 여부가 확실하지 않아도 먼저 상담해 주세요.
            </p>
        </div>

        <ul class="flex w-full flex-col items-start gap-3">
            @foreach ($items as $item)
                <li class="flex w-full items-start gap-3 rounded-xl border border-surface-alt bg-surface p-5">
                    <img src="{{ asset('images/icons/checklist-check.svg') }}" alt="" class="h-6 w-6 shrink-0">
                    <span class="text-b20 text-label">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
