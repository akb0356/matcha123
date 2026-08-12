{{-- Figma 153:1812 (Frame 126) — 자주 묻는 질문 --}}
@php
    /*
     * 디자인에는 1번 문항의 답변만 작성되어 있다. 2~5번은 답변 문안이 비어 있어
     * 임의로 채우지 않고 null로 두었다(장기요양·공단 관련 문구는 규정 확인 후 확정).
     * answer가 null인 항목은 펼침 동작 없이 질문만 노출한다.
     */
    $faqs = [
        [
            'question' => '장기요양등급이 없어도 신청할 수 있나요?',
            'answer' => '네, 가능합니다. 등급이 없으셔도 먼저 무료 상담을 신청해 주시면 전담 매니저가 장기요양등급 신청과 공단 방문조사 준비까지 처음부터 함께 도와드립니다.',
            'open' => true,
        ],
        ['question' => '담당 간호사 한 분이 계속 방문하나요?', 'answer' => null, 'open' => false],
        ['question' => '담당 간호사를 변경할 수 있나요?', 'answer' => null, 'open' => false],
        ['question' => '가족이 직접 돌봄에 참여할 수도 있나요?', 'answer' => null, 'open' => false],
        ['question' => '본인부담금은 어떻게 결정되나요?', 'answer' => null, 'open' => false],
    ];
@endphp

<section class="w-full bg-caution/10">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">방문간호 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     @if ($faq['answer']) x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }" @endif>

                    @if ($faq['answer'])
                        <button type="button" x-on:click="open = !open" x-bind:aria-expanded="open"
                                class="flex w-full items-center justify-between gap-4 py-6 text-left">
                            <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                                  x-bind:class="open && 'rotate-45'">
                                <x-services.visiting-nursing.plus-icon />
                            </span>
                        </button>

                        <div x-show="open" x-cloak class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                            <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                        </div>
                    @else
                        <div class="flex w-full items-center justify-between gap-4 py-6">
                            <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center">
                                <x-services.visiting-nursing.plus-icon />
                            </span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
