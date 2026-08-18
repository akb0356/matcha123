{{-- Figma 156:4344 (Frame 207) — 등급 구분 --}}
@php
    /*
     * 시안(153:4012 등)은 Noto Sans KR 24/18/19px 로 되어 있고 디자인 변수에 없는
     * raw 값이다. Pretendard 토큰으로 정규화했다: 24 -> b24, 18·19 -> m20.
     *
     * 확인 필요: 인정점수 구간과 등급 설명은 공단 고시 대조 전이다. 시안 문구 그대로다.
     */
    $grades = [
        ['1등급', '95점 이상', '일상생활에서 전적으로 다른 사람의 도움이 필요한 상태'],
        ['2등급', '75점 ~ 95점 미만', '일상생활에서 상당 부분 다른 사람의 도움이 필요한 상태'],
        ['3등급', '60점 ~ 75점 미만', '일상생활에서 부분적으로 다른 사람의 도움이 필요한 상태'],
        ['4등급', '51점 ~ 60점 미만', '일상생활에서 일정 부분 다른 사람의 도움이 필요한 상태'],
        ['5등급', '45점 ~ 51점 미만', '치매환자 (노인성 질병으로 한정)'],
        ['인지지원등급', '45점 미만', '경증 치매환자 · 주야간보호 등 인지 서비스 이용 가능'],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[720px] flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">장기요양등급, 이렇게 나뉘어요</h2>
            <p class="text-m20 text-label-alt">
                심신 상태를 조사해 매긴 장기요양인정점수에 따라 등급이 결정됩니다. 점수가 높을수록 더 많은 도움이 필요한 상태예요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="flex w-full flex-col items-start gap-3">
                @foreach ($grades as [$name, $score, $desc])
                    {{-- 좁은 화면에서는 점수·설명이 세로로 쌓이도록 구분선을 왼쪽에서 위로 옮긴다 --}}
                    <div class="flex w-full flex-col items-start gap-3 rounded-md border border-line-soft bg-primary-soft p-5 sm:flex-row sm:items-center sm:gap-0">
                        <div class="flex shrink-0 flex-col items-start gap-1 sm:w-[200px]">
                            <p class="text-b24 text-label">{{ $name }}</p>
                            <p class="text-m20 text-label-neutral">{{ $score }}</p>
                        </div>
                        <div class="w-full border-t border-surface-alt pt-3 sm:border-l sm:border-t-0 sm:pl-6 sm:pt-0">
                            <p class="text-m20 text-label-alt">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="w-full text-m16 text-label-alt">
                ※ 인정점수·기준은 공단 정책에 따라 달라질 수 있어요. 정확한 판정은 공단 방문조사로 이뤄집니다.
            </p>
        </div>
    </div>
</section>
