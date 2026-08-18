{{-- Figma 180:3040 (Frame 213) — 커리어 단계 --}}
@php
    $steps = [
        ['STEP 01', '신입 방문간호사', '기초 교육과 선배 동행 방문으로 부담 없이 현장에 적응합니다.'],
        ['STEP 02', '숙련 방문간호사', '1년 이상 · 단독 방문을 맡으며 숙련 수당이 더해집니다.'],
        ['STEP 03', '시니어 방문간호사', '3년 이상 · 욕창·튜브 관리 등 난이도 높은 케이스를 담당합니다.'],
        ['STEP 04', '간호팀장 · 교육 강사', '방문간호팀을 이끌고 신입 간호사 교육을 맡는 관리직 경로입니다.'],
    ];
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-3">
            <h2 class="w-full text-eb44 text-label lg:text-eb52">함께 할수록 더 단단해지는 길</h2>
            <p class="w-full text-m20 text-label-alt">
                입사 첫날부터 팀 리더가 되기까지, 단계마다 교육과 처우가 함께 올라갑니다.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-5 md:grid-cols-2">
            @foreach ($steps as [$step, $title, $desc])
                <div class="flex flex-col items-start rounded-md border border-surface-alt bg-surface p-6">
                    <p class="text-b14 text-primary-strong">{{ $step }}</p>
                    <p class="mt-3 w-full text-b20 text-label">{{ $title }}</p>
                    <p class="mt-2 w-full text-r16 text-label-alt">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
