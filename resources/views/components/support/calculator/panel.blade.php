{{-- Figma 163:5891 (Frame 252) — 비용 계산기 --}}
@php
    /*
     * 요청대로 계산 로직은 넣지 않았다. 버튼은 눌리고 선택 상태가 바뀌지만
     * 금액은 시안(163:5792)에 적힌 예시값에서 변하지 않는다.
     *
     * 선택에 따라 바뀌는 것은 요율 표가 없어도 만들 수 있는 것만이다.
     *   · 칩·탭의 선택 표시
     *   · 이용일수 카운터
     *   · 내역 문구와 「N등급 월 한도」 라벨, 부담률 배지
     * 금액 세 곳(월 본인부담금·공단/본인 부담·급여비용)은 고정이다.
     *
     * 확인 필요: 예시 금액과 월 한도(2,512,900원)는 공단 고시 대조 전이다.
     * 계산을 실제로 붙일 때 별도 단가 테이블로 옮겨야 한다.
     */
    $grades = ['1등급', '2등급', '3등급', '4등급', '5등급'];
    $burdens = ['일반 15%', '경감 9%', '감경 6%', '기초생활수급자 0%'];

    $chipOn = 'border-primary bg-primary text-surface';
    $chipOff = 'border-line-divider bg-surface text-label-neutral hover:bg-surface-alt';
@endphp

<section id="calculator" class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-8 px-6 py-[120px]">
        {{-- 시안은 이 블록을 1920 중 x=600 에 두어 콘텐츠 폭 안에서 가운데로 밀려 있다 --}}
        <div class="mx-auto flex w-full max-w-[720px] flex-col items-start gap-4">
            <h2 class="w-full text-eb44 text-label-strong lg:text-eb52">조건을 고르면 바로 계산돼요</h2>
            <p class="w-full text-m20 text-label-alt">
                재가급여(방문요양·방문간호·방문목욕) 기준이에요. 등급·본인부담 구분·서비스 종류와 이용일수를 골라보세요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start"
             x-data="{
                 grade: '1등급',
                 burden: '일반 15%',
                 benefit: 'home',
                 care: { days: 20, duration: '3시간' },
                 nursing: { days: 4, duration: '1시간' },
                 step(svc, delta) { svc.days = Math.min(31, Math.max(0, svc.days + delta)); },
                 rate() { return this.burden.replace(/[^0-9]/g, '') + '%'; },
             }">

            <div class="grid w-full grid-cols-1 items-stretch gap-5 lg:grid-cols-2">

                {{-- 입력 (163:5725) --}}
                <div class="flex flex-col items-start justify-between gap-8">
                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="text-m16 text-label-neutral">장기요양등급</p>
                        <div class="flex w-full flex-wrap items-start gap-2">
                            @foreach ($grades as $g)
                                <button type="button" x-on:click="grade = '{{ $g }}'"
                                        x-bind:aria-pressed="grade === '{{ $g }}'"
                                        class="flex h-[42px] items-center justify-center rounded border px-3.5 text-m16 transition-colors"
                                        x-bind:class="grade === '{{ $g }}' ? '{{ $chipOn }}' : '{{ $chipOff }}'">
                                    {{ $g }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="text-m16 text-label-neutral">본인부담 구분</p>
                        <div class="flex w-full flex-wrap items-start gap-2">
                            @foreach ($burdens as $b)
                                <button type="button" x-on:click="burden = '{{ $b }}'"
                                        x-bind:aria-pressed="burden === '{{ $b }}'"
                                        class="flex h-[42px] items-center justify-center rounded border px-3.5 text-m16 transition-colors"
                                        x-bind:class="burden === '{{ $b }}' ? '{{ $chipOn }}' : '{{ $chipOff }}'">
                                    {{ $b }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex w-full flex-col items-start gap-3">
                        {{-- 급여 유형 탭 (163:5751) --}}
                        <div class="flex w-full items-center gap-1 rounded bg-fill-alt p-1">
                            <button type="button" x-on:click="benefit = 'home'"
                                    class="flex flex-1 items-center justify-center rounded-md py-2 text-m16 transition-colors"
                                    x-bind:class="benefit === 'home' ? 'bg-surface text-label' : 'text-label-alt hover:text-label'">
                                재가급여
                            </button>
                            <button type="button" x-on:click="benefit = 'respite'"
                                    class="flex flex-1 items-center justify-center rounded-md py-2 text-m16 transition-colors"
                                    x-bind:class="benefit === 'respite' ? 'bg-surface text-label' : 'text-label-alt hover:text-label'">
                                치매가족휴가제
                            </button>
                        </div>

                        <div class="flex flex-wrap items-baseline gap-x-1.5">
                            <span class="text-m16 text-label-neutral">서비스별 이용일수</span>
                            <span class="text-r14 text-label-alt">· 서비스마다 일수를 정하면 합산돼요</span>
                        </div>

                        <div class="flex w-full flex-col items-start gap-2.5">
                            @foreach ([
                                ['key' => 'care', 'name' => '방문요양', 'durations' => ['3시간', '4시간']],
                                ['key' => 'nursing', 'name' => '방문간호', 'durations' => ['30분', '1시간']],
                            ] as $svc)
                                <div class="flex w-full flex-col items-start gap-3 rounded-md border border-primary px-4 py-3"
                                     style="background-color: #e8f3f5">
                                    <div class="flex w-full items-center justify-between gap-3">
                                        <span class="text-m16 text-label">{{ $svc['name'] }}</span>
                                        <span class="flex items-center gap-2">
                                            <button type="button" x-on:click="step({{ $svc['key'] }}, -1)"
                                                    aria-label="{{ $svc['name'] }} 이용일수 줄이기"
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-line-divider bg-surface text-m16 text-label-neutral transition-colors hover:bg-surface-alt">−</button>
                                            <span class="flex w-[60px] items-baseline justify-center gap-0.5">
                                                <span class="text-b16 text-label" x-text="{{ $svc['key'] }}.days"></span>
                                                <span class="text-r14 text-label-alt">일</span>
                                            </span>
                                            <button type="button" x-on:click="step({{ $svc['key'] }}, 1)"
                                                    aria-label="{{ $svc['name'] }} 이용일수 늘리기"
                                                    class="flex h-8 w-8 items-center justify-center rounded-full border border-line-divider bg-surface text-m16 text-label-neutral transition-colors hover:bg-surface-alt">+</button>
                                        </span>
                                    </div>
                                    <div class="flex w-full flex-wrap items-center gap-2 pt-3">
                                        @foreach ($svc['durations'] as $d)
                                            <button type="button" x-on:click="{{ $svc['key'] }}.duration = '{{ $d }}'"
                                                    x-bind:aria-pressed="{{ $svc['key'] }}.duration === '{{ $d }}'"
                                                    class="flex h-[37px] items-center justify-center rounded-md border px-3.5 text-m16 transition-colors"
                                                    x-bind:class="{{ $svc['key'] }}.duration === '{{ $d }}' ? '{{ $chipOn }}' : '{{ $chipOff }}'">
                                                {{ $d }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- 결과 (163:5792). 금액은 시안 예시값에서 변하지 않는다. --}}
                <div class="flex h-full flex-col items-start rounded-md bg-surface-alt p-6">
                    <div class="flex w-full items-center justify-between gap-3">
                        <span class="text-m16 text-label-neutral">예상 월 본인부담금</span>
                        <span class="flex items-center justify-center rounded-md border border-line-neutral px-2 py-1.5 text-m16 text-label-alt">
                            부담률&nbsp;<span x-text="rate()"></span>
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
                        <span class="text-r16 text-label-neutral"><span x-text="grade"></span> 월 한도</span>
                        <span class="text-b16 text-label">2,512,900원</span>
                    </div>

                    <div class="mt-4 flex w-full flex-col items-start gap-1.5 border-t border-surface-alt pt-4">
                        <div class="flex w-full items-center justify-between gap-3">
                            <span class="text-r14 text-label-alt"
                                  x-text="'방문요양 ' + care.duration + ' × ' + care.days + '일'"></span>
                            <span class="text-m16 text-label-neutral">1,140,400원</span>
                        </div>
                        <div class="flex w-full items-center justify-between gap-3">
                            <span class="text-r14 text-label-alt"
                                  x-text="'방문간호 ' + nursing.duration + ' × ' + nursing.days + '일'"></span>
                            <span class="text-m16 text-label-neutral">258,760원</span>
                        </div>
                        <div class="flex w-full items-center justify-between gap-3 border-t border-surface-alt pt-2.5">
                            <span class="text-m16 text-label-neutral">급여비용 합계</span>
                            <span class="text-b16 text-label">1,399,160원</span>
                        </div>
                    </div>

                    <span class="min-h-8 flex-1" aria-hidden="true"></span>

                    <a href="{{ route('services.visiting-nursing') }}"
                       class="btn-hover flex h-[52px] w-full shrink-0 items-center justify-center rounded bg-primary-strong text-m16 text-surface hover:bg-primary-heavy">
                        이 조건으로 서비스 신청하기
                    </a>
                </div>
            </div>

            {{--
                시안(163:5834)은 「계산 기준 안내」 라벨만 있고 뒤에 올 문장이 비어 있다.
                금액이 선택과 무관하게 고정이라는 점은 화면에 남겨야 해서 한 줄을 덧붙였다.
                확인 필요: 뒷문장은 시안에 없는 추가 문구다.
            --}}
            <div class="mt-6 w-full">
                <p class="text-r14 text-label-alt">
                    계산 기준 안내 · 표시된 금액은 예시이며 선택에 따라 다시 계산되지 않아요. 정확한 금액은 상담 시 안내해 드립니다.
                </p>
            </div>
        </div>
    </div>
</section>
