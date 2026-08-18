{{-- Figma 156:4678 (Frame 228) — 본인부담금이 뭔가요 --}}
@php
    /* STEP 3 만 강조(primary-surface 배경 + inverse-primary 테두리 + primary-strong 라벨)다. */
    $steps = [
        ['STEP 1', '총 서비스 비용', '한 달 이용한 방문요양·간호·목욕의 전체 금액', false],
        ['STEP 2', '공단이 대부분 부담', '재가 85% · 시설 80%를 공단이 직접 결제', false],
        ['STEP 3', '본인부담금만 납부', '남은 일부만 어르신이 부담 (소득에 따라 더 경감)', true],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">본인부담금이 뭔가요?</h2>
            <p class="w-full text-m20 text-label-alt">비용의 대부분은 공단이 부담하고, 어르신이 내는 '일부'가 본인부담금이에요.</p>
        </div>

        <div class="flex w-full flex-col items-start gap-3">
            {{-- 85 : 15 분담 바 (156:4529) --}}
            <div class="flex h-16 w-full overflow-hidden rounded-md shadow-elevation-xs" role="img"
                 aria-label="재가급여 비용은 공단이 85%, 본인이 15%를 부담합니다">
                <span class="flex basis-[85%] items-center justify-center bg-primary-strong text-b16 text-surface">
                    공단 부담 85%
                </span>
                <span class="flex basis-[15%] items-center justify-center bg-primary text-b14 text-surface">
                    본인 15%
                </span>
            </div>
            <p class="w-full text-r16 text-label-alt">재가급여(방문요양·방문간호·방문목욕) 일반 대상자 기준</p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-4 md:grid-cols-3">
            @foreach ($steps as [$step, $title, $desc, $highlight])
                <div class="flex flex-col items-start gap-3 rounded-md border p-7
                            {{ $highlight ? 'border-primary-inverse bg-primary-surface' : 'border-line-neutral bg-surface' }}">
                    <p class="text-b16 {{ $highlight ? 'text-primary-strong' : 'text-primary' }}">{{ $step }}</p>
                    <p class="w-full text-b24 text-label-strong">{{ $title }}</p>
                    <p class="w-full text-r20 text-label-alt">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
