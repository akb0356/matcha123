{{-- Figma 180:3117 (Frame 132) — 3대 주축 + 상담 관리 --}}
@php
    /* 본문은 시안에서 「1. …」 번호 목록이라 배열로 옮겨 ol 로 낸다. */
    $pillars = [
        [
            'no' => '01', 'name' => '환자연계', 'icon' => 'platform-pillar-link',
            'title' => '병원에서부터 이어집니다',
            'items' => [
                '병 · 의원과 연계되어 있습니다',
                '퇴원 후 생기는 돌봄 공백을 병원과 함께 채웁니다',
                '집에서도 돌봄이 끊기지 않도록 경로를 넓혀갑니다',
                '센터는 신규 어르신 수급 부담을 덜어냅니다',
            ],
        ],
        [
            'no' => '02', 'name' => '케어플랜', 'icon' => 'platform-pillar-share',
            'title' => '하나의 계획으로 잇습니다',
            'items' => [
                '상태 평가 결과에서 케어플랜을 세웁니다',
                '평가 → 플랜 → 실행 → 기록 → 재평가로 이어집니다',
                '간호와 요양이 하나의 계획 위에서 움직입니다',
                '기록이 남아 보호자 소통에 활용됩니다',
            ],
        ],
        [
            'no' => '03', 'name' => '구인구직', 'icon' => 'platform-pillar-user',
            'title' => '상담과 동시에 사람을 구합니다',
            'items' => [
                '방문간호 특화 간호 인력풀을 보유합니다',
                '공고 등록부터 채용 확정까지 직접 관리합니다',
                '방문 지역 · 경력 · 자격 등 실무 조건으로 매칭합니다',
                '채용 이후 인력 운영으로 이어집니다',
            ],
        ],
    ];

    $lead = [
        '연계 · 문의로 들어온 상담 건을 상태별로 관리합니다',
        '문의 접수 → 상담 진행 → 등급신청 안내 → 서비스 등록까지 전환을 추적합니다',
        '상담 이력이 남아 담당자가 바뀌어도 맥락이 유지됩니다',
        '후속 조치가 필요한 건을 놓치지 않아 등록 전환율이 올라갑니다',
    ];
@endphp

<section id="platform-pillars" class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">따로 돌던 업무를<br>하나의 축으로 잇습니다</h2>
            <p class="w-full text-m20 text-label-alt">
                환자연계 · 케어플랜 · 구인구직. 센터 운영의 세 축이 한 플랫폼에서 맞물려 돌아갑니다.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="grid w-full grid-cols-1 items-stretch gap-5 md:grid-cols-3">
                @foreach ($pillars as $pillar)
                    <div class="flex flex-col items-start gap-3 rounded-md border border-[#d8e3e6] bg-surface p-6">
                        <p class="w-full text-b14 text-primary">{{ $pillar['no'] }} {{ $pillar['name'] }}</p>
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded"
                              style="background-color: rgba(4, 113, 139, 0.1)">
                            <img src="{{ asset('images/icons/' . $pillar['icon'] . '.svg') }}" alt="" class="h-6 w-6">
                        </span>
                        <p class="w-full text-b20 text-label">{{ $pillar['title'] }}</p>
                        <ol class="flex w-full list-inside list-decimal flex-col text-r16 text-label-neutral">
                            @foreach ($pillar['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            </div>

            {{-- 04 상담 관리. 위 셋을 받치는 와이드 카드다 (207:703) --}}
            <div class="flex w-full flex-col items-start gap-3 rounded-md border border-[#d8e3e6] px-5 py-[18px]"
                 style="background-color: #e2eff1">
                <p class="w-full text-b14 text-primary">04 상담(리드) 관리 · 위 셋을 받칩니다</p>
                <div class="flex w-full flex-col items-start gap-3 sm:flex-row">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded"
                          style="background-color: rgba(4, 113, 139, 0.1)">
                        <img src="{{ asset('images/icons/platform-pillar-box.svg') }}" alt="" class="h-6 w-6">
                    </span>
                    <div class="flex w-full flex-col items-start gap-3">
                        <p class="w-full text-b20 text-label">유입 → 상담 → 등록의 전 과정을 하나의 흐름으로 관리합니다</p>
                        <ol class="flex w-full list-inside list-decimal flex-col text-r16 text-label-neutral">
                            @foreach ($lead as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
