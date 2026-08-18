{{-- Figma 178:2040 (Frame 203) — 비용 계산기 --}}
@php
    /*
     * 시각 전용 자리표시자다. 실제 계산 로직은 붙이지 않았다.
     * 칩·탭·스테퍼는 시안의 선택 상태를 그대로 굳혀 놓은 것이고 클릭 핸들러가 없다.
     *
     * 확인 필요: 아래 금액은 전부 시안(178:2114)에 적힌 예시값이다.
     * 공단 급여 단가·월 한도·본인부담률은 고시 대조 전이므로 실제 계산을 붙일 때
     * 별도 단가 테이블로 옮기고 값을 다시 확인해야 한다.
     *
     * 시안 본문은 Noto Sans KR 15px / 자간 -0.6px 등 디자인 변수에 등록되지 않은
     * 값으로 되어 있다(토큰은 제목 eb52·부제 r20 뿐). 프로젝트 Pretendard 토큰으로
     * 정규화했다. 15px Medium -> m16, 14px Regular -> r14 식이다.
     */
    $grades = [['1등급', true], ['2등급', false], ['3등급', false], ['4등급', false], ['5등급', false]];

    $burdens = [['일반 15%', true], ['경감 9%', false], ['감경 6%', false], ['기초생활수급자 0%', false]];

    $services = [
        ['name' => '방문요양', 'days' => '20', 'durations' => [['3시간', true], ['4시간', false]]],
        ['name' => '방문간호', 'days' => '4', 'durations' => [['30분', false], ['1시간', true]]],
    ];

    // 결과 패널의 예시 수치 (확인 필요)
    $breakdown = [
        ['방문요양 3시간 × 20일', '1,140,400원'],
        ['방문간호 1시간 × 4일', '258,760원'],
    ];

    $chip = fn (bool $on) => $on
        ? 'border-primary bg-primary text-surface'
        : 'border-line-divider bg-surface text-label-neutral';
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        {{-- 시안 프레임은 781px 이지만 제목(178:2042)이 941px 로 넘쳐 한 줄을 유지한다.
             폭을 제한하면 「알려드립 / 니다」로 꺾이므로 콘텐츠 폭 전체를 쓴다. --}}
        <div class="flex w-full flex-col items-center gap-3 text-center">
            <h2 class="text-eb52 text-label">등급에 따라 얼마인지, 청담원이 먼저 알려드립니다</h2>
            <p class="text-r20 text-label">비용의 대부분은 공단이 부담하고, 어르신이 내는 '일부'가 본인부담금이에요.</p>
        </div>

        {{--
            시안에서는 이 영역(178:2044)이 래스터 이미지로 붙어 있고 배율도 어긋나 있다.
            잘린 비트맵을 그대로 쓰면 흐려지므로 같은 색·비율로 마크업으로 다시 만들었다.
            85 : 15 비율과 색(primary-strong / primary)은 결과 패널의 막대와 같다.
        --}}
        <div class="w-full">
            <div class="flex h-16 w-full overflow-hidden rounded-md" role="img"
                 aria-label="재가급여 비용은 공단이 85%, 본인이 15%를 부담합니다">
                <span class="flex basis-[85%] items-center justify-center bg-primary-strong text-b16 text-surface">
                    공단 부담 85%
                </span>
                <span class="flex basis-[15%] items-center justify-center bg-primary text-b16 text-surface">
                    본인 15%
                </span>
            </div>
            <p class="mt-2 text-r14 text-label-alt">재가급여(방문요양·방문간호·방문목욕) 일반 대상자 기준</p>
        </div>

        <div class="flex w-full flex-col items-start">
            <div class="grid w-full grid-cols-1 items-stretch gap-5 lg:grid-cols-2">

                {{-- 입력 (178:2047) --}}
                <div class="flex flex-col items-start justify-between gap-8 select-none">
                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="text-m16 text-label-neutral">장기요양등급</p>
                        <div class="flex w-full flex-wrap items-start gap-2">
                            @foreach ($grades as [$label, $on])
                                <span class="flex h-[42px] items-center justify-center rounded border px-3.5 text-m16 {{ $chip($on) }}">
                                    {{ $label }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="text-m16 text-label-neutral">본인부담 구분</p>
                        <div class="flex w-full flex-wrap items-start gap-2">
                            @foreach ($burdens as [$label, $on])
                                <span class="flex h-[42px] items-center justify-center rounded border px-3.5 text-m16 {{ $chip($on) }}">
                                    {{ $label }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-3">
                        {{-- 급여 유형 탭 (178:2073) --}}
                        <div class="flex w-full items-center gap-1 rounded bg-fill-alt p-1">
                            <span class="flex flex-1 items-center justify-center rounded-md bg-surface py-2 text-m16 text-label">재가급여</span>
                            <span class="flex flex-1 items-center justify-center rounded-md py-2 text-m16 text-label-alt">치매가족휴가제</span>
                        </div>

                        <div class="flex flex-wrap items-baseline gap-x-1.5">
                            <span class="text-m16 text-label-neutral">서비스별 이용일수</span>
                            <span class="text-r14 text-label-alt">· 서비스마다 일수를 정하면 합산돼요</span>
                        </div>

                        <div class="flex w-full flex-col items-start gap-2.5">
                            @foreach ($services as $service)
                                {{-- 선택된 서비스 카드. 배경 #e8f3f5 는 시안 raw 값이다. --}}
                                <div class="flex w-full flex-col items-start gap-3 rounded-md border border-primary px-4 py-3"
                                     style="background-color: #e8f3f5">
                                    <div class="flex w-full items-center justify-between gap-3">
                                        <span class="text-m16 text-label">{{ $service['name'] }}</span>
                                        <span class="flex items-center gap-2">
                                            <span class="flex h-8 w-8 items-center justify-center rounded-full border border-line-divider bg-surface text-m16 text-label-neutral">−</span>
                                            <span class="flex w-[60px] items-baseline justify-center gap-0.5">
                                                <span class="text-b16 text-label">{{ $service['days'] }}</span>
                                                <span class="text-r14 text-label-alt">일</span>
                                            </span>
                                            <span class="flex h-8 w-8 items-center justify-center rounded-full border border-line-divider bg-surface text-m16 text-label-neutral">+</span>
                                        </span>
                                    </div>
                                    <div class="flex w-full flex-wrap items-center gap-2 pt-3">
                                        @foreach ($service['durations'] as [$label, $on])
                                            <span class="flex h-[37px] items-center justify-center rounded-md border px-3.5 text-m16 {{ $chip($on) }}">
                                                {{ $label }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- 결과 (178:2114) --}}
                <div class="flex h-full flex-col items-start rounded-md bg-surface-alt p-6">
                    <div class="flex w-full items-center justify-between gap-3">
                        <span class="text-m16 text-label-neutral">예상 월 본인부담금</span>
                        <span class="flex items-center justify-center rounded-md border border-line-neutral px-2 py-1.5 text-m16 text-label-alt">
                            부담률 15%
                        </span>
                    </div>

                    <p class="mt-2 flex items-baseline">
                        <span class="text-b24 text-label">월&nbsp;</span>
                        <span class="text-eb40 text-primary-strong">209,874</span>
                        <span class="text-b24 text-label">원</span>
                    </p>

                    <div class="mt-5 flex w-full flex-col items-start gap-4">
                        <div class="flex w-full flex-col items-start gap-2">
                            <div class="flex w-full items-center justify-between gap-3">
                                <span class="text-r16 text-label-neutral">공단 부담</span>
                                <span class="text-m16 text-label">1,189,286원</span>
                            </div>
                            <span class="block h-2 w-full overflow-hidden rounded-full bg-line-divider">
                                <span class="block h-full w-[85%] rounded-full bg-primary-strong"></span>
                            </span>
                        </div>
                        <div class="flex w-full flex-col items-start gap-2">
                            <div class="flex w-full items-center justify-between gap-3">
                                <span class="text-r16 text-label-neutral">본인 부담</span>
                                <span class="text-m16 text-label">209,874원</span>
                            </div>
                            <span class="block h-2 w-full overflow-hidden rounded-full bg-line-divider">
                                <span class="block h-full w-[15%] rounded-full bg-primary"></span>
                            </span>
                        </div>
                    </div>

                    <div class="mt-5 flex w-full items-center justify-between gap-3 border-t border-surface-alt pt-5">
                        <span class="text-r16 text-label-neutral">1등급 월 한도</span>
                        <span class="text-b16 text-label">2,512,900원</span>
                    </div>

                    <div class="mt-4 flex w-full flex-col items-start gap-1.5 border-t border-surface-alt pt-4">
                        @foreach ($breakdown as [$label, $amount])
                            <div class="flex w-full items-center justify-between gap-3">
                                <span class="text-r14 text-label-alt">{{ $label }}</span>
                                <span class="text-m16 text-label-neutral">{{ $amount }}</span>
                            </div>
                        @endforeach
                        <div class="flex w-full items-center justify-between gap-3 border-t border-surface-alt pt-2.5">
                            <span class="text-m16 text-label-neutral">급여비용 합계</span>
                            <span class="text-b16 text-label">1,399,160원</span>
                        </div>
                    </div>

                    {{-- 시안 178:2152 의 mt-auto 스페이서. CTA 를 패널 맨 아래로 밀되
                         내용이 길어지면 최소 32px 간격은 지킨다. --}}
                    <span class="min-h-8 flex-1" aria-hidden="true"></span>

                    {{-- 계산은 없지만 신청 진입은 실제로 동작해야 한다 --}}
                    <a href="{{ route('services.visiting-nursing') }}"
                       class="btn-hover flex h-[52px] w-full shrink-0 items-center justify-center rounded bg-primary-strong text-m16 text-surface hover:bg-primary-heavy">
                        이 조건으로 서비스 신청하기
                    </a>
                </div>
            </div>

            <div class="mt-6 w-full border-t border-surface-alt pt-3">
                <p class="text-r14 text-label-alt">
                    *청담원의 방문요양 방문간호 방문목욕은 모두 재가급여(15%)에 해당해요. 소득에 따라 더 경감될 수 있어요.
                </p>
            </div>
        </div>
    </div>
</section>
