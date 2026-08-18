{{-- Figma 208:720 (Frame 135) — 관리자·보호자 화면 --}}
@php
    /*
     * 시안은 같은 구조의 카드 2장이다(208:725 / 208:786). 데이터만 바꿔 한 틀로 낸다.
     * 본문은 Noto Sans KR raw 값(15·19·24px 등)이라 Pretendard 토큰으로 정규화했다.
     */
    $screens = [
        [
            'title' => '상담 관리 · 오늘의 처리',
            'when' => '2026년 6월 2일 (월) 기준',
            'badge' => '관리자 화면',
            'avatar' => '센',
            'name' => '청담원 강남센터',
            'role' => '담당 매니저 3명',
            'metrics_label' => '오늘의 운영 지표',
            'metrics' => [['신규 상담', '12건'], ['등급신청 진행', '5건'], ['서비스 등록', '3건'], ['후속 필요', '2건']],
            'list_label' => '처리한 단계',
            'list' => ['병원 연계 접수 4건', '상담 진행·기록 9건', '등급신청 안내 5건'],
            'note_label' => '매니저 메모',
            'note' => '성모의원 퇴원 연계 2건은 내일 오전 방문 상담으로 예약했습니다.',
            'next_label' => '다음 액션',
            'next' => '6월 3일 (화) 방문 상담 2건',
        ],
        [
            'title' => '케어플랜 · 6월',
            'when' => '재평가 예정 6월 28일',
            'badge' => '보호자 화면',
            'avatar' => '김',
            'name' => '김○○ 어르신',
            'role' => '담당 간호사 이정숙',
            'metrics_label' => '이번 달 케어',
            'metrics' => [['방문간호', '주 2회'], ['방문요양', '주 3회'], ['상태 평가', '6월 1일 완료'], ['본인부담', '월 9.8만 원']],
            'list_label' => '이번 주 기록',
            'list' => ['욕창 드레싱 2회', '혈당 체크 6회', '말벗·인지활동 3회'],
            'note_label' => '간호사 메모',
            'note' => '욕창 부위가 눈에 띄게 아물고 있습니다. 다음 재평가에서 플랜을 조정하겠습니다.',
            'next_label' => '다음 방문',
            'next' => '6월 5일 (목) 오전 10:00',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">보호자의 안심과<br>센터의 운영까지</h2>
            <p class="w-full text-m20 text-label-alt">
                센터는 상담과 케어플랜을 한 화면에서 관리하고, 보호자는 같은 기록을 실시간으로 확인합니다.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-5 lg:grid-cols-2">
            @foreach ($screens as $s)
                <div class="flex flex-col items-start gap-5 rounded-md bg-surface p-7 shadow-card-lo">
                    <div class="flex w-full items-start justify-between gap-3">
                        <div class="flex flex-col items-start gap-1.5">
                            <p class="text-b24 text-label">{{ $s['title'] }}</p>
                            <p class="text-r16 text-label-alt">{{ $s['when'] }}</p>
                        </div>
                        <span class="flex h-[30px] shrink-0 items-center justify-center rounded-md px-2 text-m12 text-primary-heavy"
                              style="background-color: rgba(5, 78, 96, 0.08)">
                            {{ $s['badge'] }}
                        </span>
                    </div>

                    <div class="flex w-full items-center gap-3 border-t border-surface-alt pt-5">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary text-b16 text-surface">
                            {{ $s['avatar'] }}
                        </span>
                        <div class="flex flex-col items-start">
                            <p class="text-b20 text-label">{{ $s['name'] }}</p>
                            <p class="text-r16 text-label-alt">{{ $s['role'] }}</p>
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">{{ $s['metrics_label'] }}</p>
                        <div class="grid w-full grid-cols-2 gap-2.5">
                            @foreach ($s['metrics'] as [$k, $v])
                                <div class="flex flex-col items-start gap-1 rounded bg-surface-alt px-4 py-3">
                                    <span class="text-r14 text-label-alt">{{ $k }}</span>
                                    <span class="text-b20 text-label">{{ $v }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">{{ $s['list_label'] }}</p>
                        <ul class="flex flex-col items-start gap-2">
                            @foreach ($s['list'] as $item)
                                <li class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/check-done-primary.svg') }}" alt="" class="h-5 w-5 shrink-0">
                                    <span class="text-r20 text-label">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2.5">
                        <p class="text-m16 text-label-assistive">{{ $s['note_label'] }}</p>
                        <div class="w-full rounded bg-surface-alt px-4 py-3">
                            <p class="text-r20 text-label">{{ $s['note'] }}</p>
                        </div>
                    </div>

                    <div class="mt-auto flex w-full flex-wrap items-center gap-2 border-t border-surface-alt pt-4">
                        <img src="{{ asset('images/icons/calendar.svg') }}" alt="" class="h-4 w-4 shrink-0">
                        <span class="text-r16 text-label-alt">{{ $s['next_label'] }}</span>
                        <span class="text-m16 text-label">{{ $s['next'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
