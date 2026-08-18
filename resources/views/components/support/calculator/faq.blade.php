{{-- Figma 175:837 (Frame 256) — 자주 묻는 질문 --}}
@php
    /*
     * 1번 질문·답변은 시안(163:5684 / 163:5689) 그대로다.
     *
     * 확인 필요: 2~5번 답변은 시안에 없다(접힌 상태). 급여 병행 이용·비급여
     * 항목·경감 폭·한도 초과 처리는 모두 공단 규정에 걸리는 내용이라 임의로
     * 쓰지 않았다. 아래는 상담 안내로 대체한 임시 문구다.
     */
    $interim = '어르신 상황에 따라 달라져요. 무료 상담을 신청해 주시면 전담 매니저가 정확히 안내해 드립니다.';

    $faqs = [
        [
            'question' => '계산 결과가 실제 청구 금액과 같나요?',
            'answer' => '계산기는 공단 고시 한도액과 표준 수가를 바탕으로 한 예상 금액이에요. 실제 금액은 어르신 상태·이용 시간·비급여 항목에 따라 달라질 수 있어, 상담 시 정확히 안내해 드립니다.',
            'open' => true,
        ],
        ['question' => '방문요양과 방문간호를 같이 이용할 수 있나요?', 'answer' => $interim, 'open' => false],
        ['question' => '식비나 재료비도 계산에 포함되나요?', 'answer' => $interim, 'open' => false],
        ['question' => '경감 대상이면 얼마나 줄어드나요?', 'answer' => $interim, 'open' => false],
        ['question' => '월 한도를 넘기면 어떻게 되나요?', 'answer' => $interim, 'open' => false],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb44 text-label lg:text-eb52">비용 계산기 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

                    <button type="button" x-on:click="open = !open"
                            x-bind:aria-expanded="open" aria-controls="calc-faq-answer-{{ $i }}"
                            class="flex w-full items-center justify-between gap-4 py-6 text-left">
                        <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                              x-bind:class="open && 'rotate-45'">
                            <x-icon-plus />
                        </span>
                    </button>

                    <div id="calc-faq-answer-{{ $i }}" x-show="open" x-cloak
                         class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                        <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
