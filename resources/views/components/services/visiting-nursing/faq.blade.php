{{-- Figma 153:1812 (Frame 126) — 자주 묻는 질문 --}}
@php
    // 1번만 기본 펼침 (디자인 기준). 나머지는 접힌 상태로 시작한다.
    $faqs = [
        [
            'question' => '장기요양등급이 없어도 신청할 수 있나요?',
            'answer' => '네, 가능합니다. 등급이 없으셔도 먼저 무료 상담을 신청해 주시면 전담 매니저가 장기요양등급 신청과 공단 방문조사 준비까지 처음부터 함께 도와드립니다.',
            'open' => true,
        ],
        [
            'question' => '담당 간호사 한 분이 계속 방문하나요?',
            'answer' => '가능한 한 같은 간호사가 정기적으로 방문하도록 배정합니다. 일정이나 어르신 상태 변화로 조정이 필요할 때는 보호자와 먼저 상의해 안내해 드립니다.',
            'open' => false,
        ],
        [
            'question' => '담당 간호사를 변경할 수 있나요?',
            'answer' => '네. 어르신과 잘 맞지 않거나 불편한 점이 있으면 전담 매니저에게 말씀해 주세요. 사유를 확인해 다른 간호사로 다시 매칭해 드립니다.',
            'open' => false,
        ],
        [
            'question' => '가족이 직접 돌봄에 참여할 수도 있나요?',
            'answer' => '간호 자격을 가진 가족이라면 가족간호 형태로 참여할 수 있고, 자격이 없으셔도 간호사의 교육·안내에 따라 일상 돌봄을 함께하실 수 있습니다.',
            'open' => false,
        ],
        [
            'question' => '본인부담금은 어떻게 결정되나요?',
            'answer' => '장기요양등급, 본인부담 구분(일반·감경·기초수급), 이용 횟수·시간에 따라 달라집니다. 상담 시 어르신 상황에 맞춰 예상 금액을 정확히 안내해 드립니다.',
            'open' => false,
        ],
    ];
@endphp

<section class="w-full bg-caution/10">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">방문간호 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

                    <button type="button" x-on:click="open = !open"
                            x-bind:aria-expanded="open" aria-controls="faq-answer-{{ $i }}"
                            class="flex w-full items-center justify-between gap-4 py-6 text-left">
                        <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                              x-bind:class="open && 'rotate-45'">
                            <x-icon-plus />
                        </span>
                    </button>

                    <div id="faq-answer-{{ $i }}" x-show="open" x-cloak
                         class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                        <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
