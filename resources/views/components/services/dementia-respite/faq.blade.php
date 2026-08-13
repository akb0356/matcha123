{{-- Figma 153:3035 (Frame 192) — 자주 묻는 질문 --}}
@php
    // 1번만 기본 펼침 (디자인 기준). 나머지는 접힌 상태로 시작한다.
    $faqs = [
        [
            'question' => '누가 이용할 수 있나요?',
            'answer' => '장기요양 1·2등급 수급자, 또는 치매 진단을 받은 수급자(등급 무관)가 대상입니다. 집에서 가족이 직접 어르신을 모시는 경우 신청할 수 있어요. 대상 여부가 확실치 않으면 먼저 상담해 주세요.',
            'open' => true,
        ],
        [
            'question' => '월 이용 한도액을 다 써도 이용할 수 있나요?',
            'answer' => '치매가족휴가제는 매월 이용 한도액과 관계없이 별도로 이용할 수 있습니다. 그래서 평소 방문요양·방문간호를 한도까지 이용 중이어도 추가로 이용할 수 있어요.',
            'open' => false,
        ],
        [
            'question' => '하루에 몇 시간 돌봐 주나요?',
            'answer' => '1회 12시간 동안 요양보호사가 가정에서 어르신을 안전하게 보호·관찰합니다. 식사·투약·안전 관리 등 하루 돌봄이 이어집니다.',
            'open' => false,
        ],
        [
            'question' => '연간 며칠까지 이용할 수 있나요?',
            'answer' => '연 12일 이내에서 이용할 수 있습니다(12시간 기준·24회). 남은 이용 일수는 상담 시 정확히 확인해 안내해 드려요.',
            'open' => false,
        ],
        [
            'question' => '비용은 얼마인가요?',
            'answer' => '장기요양보험이 적용돼 1회(12시간) 본인부담금은 소득 구분에 따라 0원~1만 원대예요. 기초생활수급자는 0원, 일반 대상자도 1만 원대 수준입니다. 정확한 금액은 상담 시 안내해 드려요.',
            'open' => false,
        ],
    ];
@endphp

<section class="w-full bg-accent-green-soft/20">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">치매가족휴가제 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

                    <button type="button" x-on:click="open = !open"
                            x-bind:aria-expanded="open" aria-controls="respite-faq-answer-{{ $i }}"
                            class="flex w-full items-center justify-between gap-4 py-6 text-left transition-colors hover:text-label-neutral">
                        <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                              x-bind:class="open && 'rotate-45'">
                            <x-icon-plus />
                        </span>
                    </button>

                    <div id="respite-faq-answer-{{ $i }}" x-show="open" x-cloak
                         class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                        <p class="max-w-[830px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
