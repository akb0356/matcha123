{{-- Figma 153:1643 (Frame 120) — 방문간호지시서 · 오늘의 케어 플랜 --}}
@php
    $orderDetails = [
        ['발급 의료기관', '청담내과의원'],
        ['지시 의사', '김철영 원장'],
        ['진단명', '제2형 당뇨 · 천골부 욕창'],
    ];
    $orderChips = ['욕창 드레싱', '인슐린 투약', '경관영양 관리', '혈당 모니터링'];

    // done = 완료 처치, 나머지는 예정
    $tasks = [
        ['label' => '욕창 드레싱·소독', 'done' => true],
        ['label' => '혈당 체크 및 인슐린', 'done' => true],
        ['label' => '경관영양 튜브 관리', 'done' => true],
        ['label' => '활력징후 측정', 'done' => false],
        ['label' => '보호자 상태 안내', 'done' => false],
    ];
    $doneCount = collect($tasks)->where('done', true)->count();
    $progress = (int) round($doneCount / count($tasks) * 100);
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-[95px] px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">의사 지시에 따라 집에서 안전하게</h2>
            <p class="text-m20 text-label-alt">
                방문간호지시서에 따라 욕창·튜브·투약을 전문적으로 관리합니다. 응급 상황 대처와 보호자 교육까지 함께해요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 lg:grid-cols-2">
            {{-- 방문간호지시서 --}}
            <article class="flex flex-col items-start justify-between gap-5 overflow-hidden rounded-md border border-line-neutral bg-surface p-7">
                <div class="flex w-full flex-col items-start gap-5">
                    <header class="flex w-full items-start justify-between">
                        <div class="flex flex-col items-start gap-1.5">
                            <p class="text-b24 text-label">방문간호지시서</p>
                            <p class="text-r16 text-label-alt">유효기간 2026.06.01 – 08.31</p>
                        </div>
                        <span class="flex h-[30px] items-center justify-center rounded-md bg-info/[0.08] px-2 text-m12 text-info">
                            발급 완료
                        </span>
                    </header>

                    <dl class="flex w-full flex-col items-start gap-3 border-t border-surface-alt pt-5">
                        @foreach ($orderDetails as [$label, $value])
                            <div class="flex w-full items-start justify-between">
                                <dt class="text-r16 text-label-alt">{{ $label }}</dt>
                                <dd class="text-m20 text-label">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="flex w-full flex-col items-start gap-2.5">
                    <p class="text-m12 text-label-assistive">지시 처치</p>
                    <div class="flex flex-wrap items-center gap-1.5">
                        @foreach ($orderChips as $chip)
                            <span class="flex h-[37px] items-center justify-center rounded bg-fill-alt px-[11px] text-m16 text-label-alt">
                                {{ $chip }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </article>

            {{-- 오늘의 케어 플랜 --}}
            <article class="flex flex-col items-start gap-5 overflow-hidden rounded-md border border-line-neutral bg-surface p-7">
                <header class="flex w-full items-start justify-between">
                    <div class="flex flex-col items-start gap-1.5">
                        <p class="text-b24 text-label">오늘의 케어 플랜</p>
                        <p class="text-r16 text-label-alt">6월 5일 (목) · 이정숙 간호사</p>
                    </div>
                    <span class="flex h-[30px] items-center justify-center rounded-md bg-primary/[0.08] px-2 text-m12 text-primary-strong">
                        진행 중
                    </span>
                </header>

                <div class="flex w-full flex-col items-start gap-2 border-t border-surface-alt pt-5">
                    <div class="flex w-full items-center justify-between">
                        <p class="text-r16 text-label-alt">오늘 진행률</p>
                        <p class="text-b20 text-label">{{ $doneCount }}/{{ count($tasks) }} 완료</p>
                    </div>
                    <div class="h-2 w-full overflow-hidden rounded-full bg-fill-alt"
                         role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                        <div class="h-full rounded-full bg-primary-strong" style="width: {{ $progress }}%"></div>
                    </div>
                </div>

                <ul class="flex w-full flex-col items-start gap-2">
                    @foreach ($tasks as $task)
                        <li class="flex w-full items-center gap-3 rounded bg-surface-alt px-4 py-3">
                            <img src="{{ asset($task['done'] ? 'images/icons/check-done.svg' : 'images/icons/todo.svg') }}"
                                 alt="{{ $task['done'] ? '완료' : '예정' }}" class="h-5 w-5">
                            <span class="{{ $task['done'] ? 'text-m20 text-label' : 'text-r20 text-label-alt' }}">
                                {{ $task['label'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>
</section>
