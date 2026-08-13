{{-- Figma 153:2831 (Frame 170) — 자주 묻는 질문 --}}
@php
    // 1번만 기본 펼침 (디자인 기준). 나머지는 접힌 상태로 시작한다.
    $faqs = [
        [
            'question' => '장기요양등급이 없어도 신청할 수 있나요?',
            'answer' => '네, 가능합니다. 등급이 없으셔도 먼저 무료 상담을 신청해 주시면 전담 매니저가 장기요양등급 신청과 공단 방문조사 준비까지 처음부터 함께 도와드립니다.',
            'open' => true,
        ],
        [
            'question' => '목욕은 어디에서 진행되나요?',
            'answer' => '목욕설비를 갖춘 차량 안에서 하거나, 가정 내 욕실에 이동식 욕조를 설치해 진행합니다. 어르신 상태와 댁의 환경에 맞춰 가장 안전한 방식으로 안내해 드려요.',
            'open' => false,
        ],
        [
            'question' => '요양보호사 몇 분이 오시나요?',
            'answer' => '안전을 위해 원칙적으로 요양보호사 2인이 함께 방문합니다. 이동과 입욕을 보조하며 어르신이 다치지 않도록 두 분이 곁을 지킵니다.',
            'open' => false,
        ],
        [
            'question' => '거동이 전혀 안 되셔도 가능한가요?',
            'answer' => '네. 누워 계신 어르신도 이동식 욕조와 보조 장비로 안전하게 목욕이 가능합니다. 상태에 따라 침상 목욕 등으로도 도와드려요.',
            'open' => false,
        ],
        [
            'question' => '본인부담금은 어떻게 결정되나요?',
            'answer' => '장기요양등급, 본인부담 구분(일반·감경·기초수급), 이용 횟수에 따라 달라집니다. 상담 시 어르신 상황에 맞춰 예상 금액을 정확히 안내해 드립니다.',
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
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

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
                </div>
            @endforeach
        </div>
    </div>
</section>
