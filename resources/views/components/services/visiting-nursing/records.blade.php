{{-- Figma 153:1518 (Frame 123) — 방문 기록 공유 --}}
@php
    $records = [
        [
            'date' => '6월 2일 (월) 방문',
            'time' => '오전 10:00 – 11:00',
            'metrics' => [
                ['혈압', '120 / 80 mmHg'],
                ['혈당', '110 mg/dL'],
                ['체온', '36.5 ℃'],
                ['맥박', '72 bpm'],
            ],
            'treatments' => ['인슐린 주사 투약', '활력징후 측정', '복약 상태 점검'],
            'note' => '식사량 양호하시고 컨디션 안정적입니다. 혈당 수치도 지난주보다 개선되었어요.',
            'next' => '6월 5일 (목) 오전 10:00',
        ],
        [
            'date' => '6월 5일 (목) 방문',
            'time' => '오전 10:00 – 11:20',
            'metrics' => [
                ['혈압', '128 / 84 mmHg'],
                ['혈당', '135 mg/dL'],
                ['체온', '36.7 ℃'],
                ['맥박', '76 bpm'],
            ],
            'treatments' => ['욕창 드레싱 교체', '경관영양 튜브 관리', '활력징후 측정'],
            'note' => '욕창 부위 상처가 눈에 띄게 아물고 있습니다. 수면도 안정적이고 통증도 줄어드셨어요.',
            'next' => '6월 9일 (월) 오전 10:00',
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
                매 방문의 간호 기록과 상태 변화를 정리해 보호자에게 실시간으로 공유합니다. 멀리 사는 가족도 언제든 확인할 수 있어요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 lg:grid-cols-2">
            @foreach ($records as $record)
                <article class="flex flex-col items-start gap-5 overflow-hidden rounded-md border border-surface-alt bg-surface p-7">
                    <header class="flex w-full items-start justify-between">
                        <div class="flex flex-col items-start gap-1.5">
                            <p class="text-b24 text-label">{{ $record['date'] }}</p>
                            <p class="text-m16 text-label-alt">{{ $record['time'] }}</p>
                        </div>
                        <span class="flex h-[30px] items-center justify-center rounded-md bg-caution/[0.08] px-2 text-m12 text-caution">
                            보호자 공유됨
                        </span>
                    </header>

                    <div class="flex w-full items-center gap-3 border-t border-surface-alt pt-5">
                        <img src="{{ asset('images/services/visiting-nursing/nurse-lee-44.png') }}"
                             alt="이정숙 간호사" width="44" height="44" class="h-11 w-11 rounded-full object-cover">
                        <div class="flex flex-col items-start">
                            <p class="text-b20 text-label">이정숙 간호사</p>
                            <p class="text-r16 text-label-alt">담당 방문간호사</p>
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">측정 지표</p>
                        <div class="grid w-full grid-cols-2 gap-2.5">
                            @foreach ($record['metrics'] as [$label, $value])
                                <div class="flex flex-col items-start gap-1 rounded bg-surface-alt px-4 py-3">
                                    <p class="text-r14 text-label-alt">{{ $label }}</p>
                                    <p class="text-b20 text-label">{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">수행 처치</p>
                        <ul class="flex flex-col items-start gap-2">
                            @foreach ($record['treatments'] as $treatment)
                                <li class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/check-done.svg') }}" alt="" class="h-5 w-5">
                                    <span class="text-r20 text-label">{{ $treatment }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">간호사 메모</p>
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
