{{-- Figma 153:2534 (Frame 164) — 방문 기록 공유 --}}
@php
    $records = [
        [
            'date' => '6월 2일 (월) 방문',
            'time' => '오후 2:00 – 3:00',
            'status' => [
                ['목욕 방식', '이동욕조 전신'],
                ['피부 상태', '이상 없음'],
                ['수온', '40℃ 유지'],
                ['컨디션', '입욕 중 안정'],
            ],
            'care' => ['안전한 이동·입욕 보조', '전신 세정·머리 감기', '보습·물기 제거 마무리'],
            'note' => '입욕 내내 편안해하셨고 목욕 후 개운해하셨어요. 피부 트러블도 보이지 않습니다.',
            'next' => '6월 9일 (월) 오후 2:00',
        ],
        [
            'date' => '6월 9일 (월) 방문',
            'time' => '오후 2:00 – 3:00',
            'status' => [
                ['목욕 방식', '차량 방문 목욕'],
                ['피부 상태', '보습 완료'],
                ['수온', '40℃ 유지'],
                ['컨디션', '안정적'],
            ],
            'care' => ['수온·실온 확인 및 준비', '안전 입욕·세정 (2인)', '머리 감기·보습 마무리'],
            'note' => '컨디션 좋으시고 식사량도 양호하십니다. 다음 방문 때 발톱 정리도 함께 도와드리기로 했어요.',
            'next' => '6월 16일 (월) 오후 2:00',
        ],
    ];
@endphp

<section class="w-full bg-fill-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">
                목욕할 때마다,<br>상태를 꼼꼼히 살펴 전해드려요
            </h2>
            <p class="text-m20 text-label-alt">
                매 방문의 목욕 내용과 피부·컨디션 변화를 정리해 보호자에게 실시간으로 공유합니다. 멀리 사는 가족도 언제든 확인할 수 있어요.
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
                        <span class="flex h-[30px] items-center justify-center rounded-md bg-accent-light-blue/[0.08] px-2 text-m12 text-accent-light-blue">
                            보호자 공유됨
                        </span>
                    </header>

                    {{-- 담당자 아바타는 강조색(light-blue)이 아니라 primary(청록)이다. 방문요양과 동일. --}}
                    <div class="flex w-full items-center gap-3 border-t border-surface-alt pt-5">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary">
                            <span class="text-[16px] font-bold leading-6 tracking-[-0.6px] text-surface">한</span>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="text-b20 text-label">한영자 · 오미숙 요양보호사</p>
                            <p class="text-r16 text-label-alt">담당 방문목욕 2인 1조</p>
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">목욕 상태</p>
                        <div class="grid w-full grid-cols-2 gap-2.5">
                            @foreach ($record['status'] as [$label, $value])
                                <div class="flex flex-col items-start gap-1 rounded bg-surface-alt px-4 py-3">
                                    <p class="text-r14 text-label-alt">{{ $label }}</p>
                                    <p class="text-b20 text-label">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">수행 케어</p>
                        <ul class="flex flex-col items-start gap-2">
                            @foreach ($record['care'] as $item)
                                <li class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/check-done-primary.svg') }}" alt="" class="h-5 w-5">
                                    <span class="text-r20 text-label">{{ $item }}</span>
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
