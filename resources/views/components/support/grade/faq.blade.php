{{-- Figma 156:4387 (Frame 220) — 자주 묻는 질문 --}}
@php
    /*
     * 시안에는 1번 답변만 그려져 있고 2~5번은 접힌 상태라 답변이 없다.
     *
     * 확인 필요: 2~5번 답변은 공단 규정에 걸리는 내용(등급 판정 요건, 이의신청 절차 등)
     * 이라 임의로 쓰지 않았다. 아래는 상담 안내로 대체한 임시 문구이며 담당자 확인 후
     * 실제 답변으로 교체해야 한다.
     */
    $interim = '자세한 내용은 어르신 상황에 따라 달라져요. 무료 상담을 신청해 주시면 전담 매니저가 정확히 안내해 드립니다.';

    $faqs = [
        [
            'question' => '신청하면 등급은 언제 나오나요?',
            // 시안 153:4149 문구
            'answer' => '신청서 접수 후 방문조사와 등급판정을 거쳐 보통 30일 이내에 결과가 나옵니다. 상황에 따라 기간이 연장될 수 있어요.',
            'open' => true,
        ],
        ['question' => '치매가 있으면 무조건 등급을 받나요?', 'answer' => $interim, 'open' => false],
        ['question' => '등급을 받으면 무엇을 이용할 수 있나요?', 'answer' => $interim, 'open' => false],
        ['question' => '신청이 복잡한데 도와주시나요?', 'answer' => $interim, 'open' => false],
        ['question' => '등급이 안 나오거나 낮게 나오면요?', 'answer' => $interim, 'open' => false],
    ];
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">장기요양등급 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

                    <button type="button" x-on:click="open = !open"
                            x-bind:aria-expanded="open" aria-controls="grade-faq-answer-{{ $i }}"
                            class="flex w-full items-center justify-between gap-4 py-6 text-left">
                        <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                              x-bind:class="open && 'rotate-45'">
                            <x-icon-plus />
                        </span>
                    </button>

                    <div id="grade-faq-answer-{{ $i }}" x-show="open" x-cloak
                         class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                        <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
