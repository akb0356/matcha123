{{-- Figma 153:2661 (Frame 167) — 방문 전 안전 점검 · 오늘의 목욕 케어 --}}
@php
    $checkDetails = [
        ['목욕 방식', '차량 방문 목욕'],
        ['담당 인력', '요양보호사 2인'],
        ['소요 시간', '약 60분'],
    ];
    $equipment = ['이동식 욕조', '온수 설비', '미끄럼 방지 매트', '안전 손잡이'];

    $tasks = [
        ['label' => '수온·실온 확인 및 목욕 준비', 'done' => true],
        ['label' => '안전한 이동·입욕 보조 (2인)', 'done' => true],
        ['label' => '전신 세정·머리 감기', 'done' => true],
        ['label' => '보습·물기 제거 후 마무리', 'done' => false],
        ['label' => '목욕 후 컨디션 확인', 'done' => false],
    ];
    $doneCount = collect($tasks)->where('done', true)->count();
    $progress = (int) round($doneCount / count($tasks) * 100);
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">전문 장비와 2인 케어로 미끄러짐 걱정 없이</h2>
            <p class="text-m20 text-label-alt">
                이동식 욕조와 목욕 차량, 안전 보조 장비를 갖추고 방문합니다. 수온 관리부터 마무리 보습까지 두 사람이 함께 챙겨요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 lg:grid-cols-2">
            {{-- 방문 전 안전 점검 --}}
            <article class="flex flex-col items-start gap-5 overflow-hidden rounded-md border border-line-neutral bg-surface p-7">
                <header class="flex w-full items-start justify-between">
                    <div class="flex flex-col items-start gap-1.5">
                        <p class="text-b24 text-label">방문 전 안전 점검</p>
                        <p class="text-r16 text-label-alt">6월 9일 (월) · 방문 전 확인</p>
                    </div>
                    <span class="flex h-[30px] items-center justify-center rounded-md bg-info/[0.08] px-2 text-m12 text-info">
                        점검 완료
                    </span>
                </header>

                <dl class="flex w-full flex-col items-start gap-3 border-t border-surface-alt pt-5">
                    @foreach ($checkDetails as [$label, $value])
                        <div class="flex w-full items-start justify-between gap-4">
                            <dt class="text-r16 text-label-alt">{{ $label }}</dt>
                            <dd class="text-m20 text-label">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>

                {{-- Figma의 「mt-auto spacer」 — 준비 장비를 카드 하단으로 밀어낸다 --}}
                <div class="mt-auto flex w-full flex-col items-start gap-2.5">
                    <p class="text-m12 text-label-assistive">준비 장비</p>
                    <div class="flex flex-wrap items-center gap-1.5">
                        @foreach ($equipment as $item)
                            <span class="flex h-[37px] items-center justify-center rounded bg-fill-alt px-[11px] text-m16 text-label-alt">
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </article>

            {{-- 오늘의 목욕 케어 --}}
            <article class="flex flex-col items-start gap-5 overflow-hidden rounded-md border border-line-neutral bg-surface p-7">
                <header class="flex w-full items-start justify-between">
                    <div class="flex flex-col items-start gap-1.5">
                        <p class="text-b24 text-label">오늘의 목욕 케어</p>
                        <p class="text-r16 text-label-alt">6월 9일 (월) · 한영자·오미숙</p>
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
                        {{-- 진행 바는 방문간호(primary-strong)와 달리 primary 를 쓴다 --}}
                        <div class="h-full rounded-full bg-primary" style="width: {{ $progress }}%"></div>
                    </div>
                </div>

                <ul class="flex w-full flex-col items-start gap-2">
                    @foreach ($tasks as $task)
                        <li class="flex w-full items-center gap-3 rounded bg-surface-alt px-4 py-3">
                            <img src="{{ asset($task['done'] ? 'images/icons/check-done-primary.svg' : 'images/icons/todo.svg') }}"
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
