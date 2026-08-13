{{-- Figma 153:2831 (Frame 170) — 자주 묻는 질문 --}}
@php
    /*
     * 디자인에는 1번 답변만 작성되어 있다.
     * 5번은 방문간호·방문요양과 문항이 완전히 같고 답변도 서비스와 무관해 그대로 가져왔다.
     * 2~4번은 방문목욕 전용 문안이 필요해 null로 두었다(임의 작성하지 않는다).
     * answer가 null인 항목은 펼침 동작 없이 질문만 노출한다.
     */
    $faqs = [
        [
            'question' => '장기요양등급이 없어도 신청할 수 있나요?',
            'answer' => '네, 가능합니다. 등급이 없으셔도 먼저 무료 상담을 신청해 주시면 전담 매니저가 장기요양등급 신청과 공단 방문조사 준비까지 처음부터 함께 도와드립니다.',
            'open' => true,
        ],
        ['question' => '목욕은 어디에서 진행되나요?', 'answer' => null, 'open' => false],
        ['question' => '요양보호사 몇 분이 오시나요?', 'answer' => null, 'open' => false],
        ['question' => '거동이 전혀 안 되셔도 가능한가요?', 'answer' => null, 'open' => false],
        [
            'question' => '본인부담금은 어떻게 결정되나요?',
            'answer' => '장기요양등급, 본인부담 구분(일반·감경·기초수급), 이용 시간·횟수에 따라 달라집니다. 상담 시 어르신 상황에 맞춰 예상 금액을 정확히 안내해 드립니다.',
            'open' => false,
        ],
    ];
@endphp

<section class="w-full bg-accent-light-blue/10">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">방문목욕 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     @if ($faq['answer']) x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }" @endif>

                    @if ($faq['answer'])
                        <button type="button" x-on:click="open = !open"
                                x-bind:aria-expanded="open" aria-controls="bath-faq-answer-{{ $i }}"
                                class="flex w-full items-center justify-between gap-4 py-6 text-left">
                            <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                                  x-bind:class="open && 'rotate-45'">
                                <x-icon-plus />
                            </span>
                        </button>

                        <div id="bath-faq-answer-{{ $i }}" x-show="open" x-cloak
                             class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                            <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                        </div>
                    @else
                        <div class="flex w-full items-center justify-between gap-4 py-6">
                            <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center">
                                <x-icon-plus />
                            </span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
