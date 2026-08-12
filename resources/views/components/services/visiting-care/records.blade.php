{{-- Figma 153:2071 (Frame 135) — 방문 기록 공유 --}}
@php
    $records = [
        [
            'date' => '6월 2일 (월) 방문',
            'time' => '오전 9:00 – 12:00',
            'care' => [
                ['식사', '아침·점심 완료'],
                ['위생', '세면·구강'],
                ['이동', '실내 보행 30분'],
                ['정서', '말벗 20분'],
            ],
            'activities' => ['아침·점심 식사 보조', '세면·구강 위생 관리', '실내 보행 운동'],
            'note' => '식사량 좋으시고 표정이 밝으셨어요. 오후에는 가벼운 산책도 함께 다녀왔습니다.',
            'next' => '6월 4일 (수) 오전 9:00',
        ],
        [
            'date' => '6월 4일 (수) 방문',
            'time' => '오전 9:00 – 12:00',
            'care' => [
                ['식사', '아침·점심 완료'],
                ['위생', '목욕 보조'],
                ['이동', '외출 동행'],
                ['정서', '인지활동 30분'],
            ],
            'activities' => ['식사 준비·보조', '목욕·위생 관리', '병원 외출 동행'],
            'note' => '컨디션 안정적이고 인지활동에도 잘 참여하셨어요. 무릎 통증은 조금 줄었다고 하십니다.',
            'next' => '6월 6일 (금) 오전 9:00',
        ],
    ];
@endphp

<section class="w-full bg-fill-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">
                방문할 때마다,<br>무엇을 했는지 다 보여드려요
            </h2>
            <p class="text-m20 text-label-alt">
                매 방문의 돌봄 내용과 어르신 컨디션을 정리해 보호자에게 실시간으로 공유합니다. 멀리 사는 가족도 언제든 확인할 수 있어요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 lg:grid-cols-2">
            @foreach ($records as $record)
                <article class="flex flex-col items-start gap-5 overflow-hidden rounded-md bg-surface p-7">
                    <header class="flex w-full items-start justify-between">
                        <div class="flex flex-col items-start gap-1.5">
                            <p class="text-b24 text-label">{{ $record['date'] }}</p>
                            <p class="text-r16 text-label-alt">{{ $record['time'] }}</p>
                        </div>
                        <span class="flex h-[30px] items-center justify-center rounded-md bg-accent-violet/[0.08] px-2 text-m12 text-accent-violet">
                            보호자 공유됨
                        </span>
                    </header>

                    {{-- 담당자 아바타는 디자인에서 primary(청록)이다. 강조색 violet 과 다른 점 주의. --}}
                    <div class="flex w-full items-center gap-3 border-t border-surface-alt pt-5">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary">
                            <span class="text-[16px] font-bold leading-6 tracking-[-0.6px] text-surface">이</span>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="text-b20 text-label">이순영 요양보호사</p>
                            <p class="text-r16 text-label-alt">담당 방문요양보호사</p>
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">오늘의 돌봄</p>
                        <div class="grid w-full grid-cols-2 gap-2.5">
                            @foreach ($record['care'] as [$label, $value])
                                <div class="flex flex-col items-start gap-1 rounded bg-surface-alt px-4 py-3">
                                    <p class="text-r14 text-label-alt">{{ $label }}</p>
                                    <p class="text-b20 text-label">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">수행 활동</p>
                        <ul class="flex flex-col items-start gap-2">
                            @foreach ($record['activities'] as $activity)
                                <li class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/check-done-primary.svg') }}" alt="" class="h-5 w-5">
                                    <span class="text-r20 text-label">{{ $activity }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">요양보호사 메모</p>
                        <p class="w-full rounded bg-surface-alt px-4 py-3 text-r20 text-label">
                            {{ $record['note'] }}
                        </p>
                    </div>

                    <div class="mt-auto flex w-full items-center gap-2 border-t border-surface-alt pt-4">
                        <img src="{{ asset('images/icons/calendar.svg') }}" alt="" class="h-4 w-4">
                        <p class="text-r16 text-label-alt">다음 방문</p>
                        <p class="text-m16 text-label">{{ $record['next'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
