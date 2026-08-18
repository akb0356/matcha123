{{-- Figma 163:5051 (Frame 244) — 자주 묻는 질문 --}}
@php
    /*
     * 1번 질문·답변은 시안(156:4485 / 156:4490) 그대로다.
     *
     * 확인 필요: 2~5번 답변은 시안에 없다(접힌 상태). 경감 요건·한도 초과 처리·
     * 비급여 항목·수급자 면제 범위는 모두 공단 규정에 걸리는 내용이라 임의로
     * 쓰지 않았다. 아래는 상담 안내로 대체한 임시 문구다.
     */
    $interim = '어르신 상황에 따라 달라져요. 무료 상담을 신청해 주시면 전담 매니저가 정확히 안내해 드립니다.';

    $faqs = [
        [
            'question' => '본인부담금은 어떻게 내나요?',
            'answer' => '보통 서비스를 제공한 센터(기관)에서 매달 본인부담금을 청구하고, 어르신(보호자)이 납부하시면 됩니다. 청담원은 청구 내역을 마이페이지에서 투명하게 확인하실 수 있어요.',
            'open' => true,
        ],
        ['question' => '경감 대상인지 어떻게 알 수 있나요?', 'answer' => $interim, 'open' => false],
        ['question' => '한도를 넘으면 어떻게 되나요?', 'answer' => $interim, 'open' => false],
        ['question' => '식비나 재료비도 15%만 내면 되나요?', 'answer' => $interim, 'open' => false],
        ['question' => '기초생활수급자도 비용이 드나요?', 'answer' => $interim, 'open' => false],
    ];
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">본인부담금 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

                    <button type="button" x-on:click="open = !open"
                            x-bind:aria-expanded="open" aria-controls="copay-faq-answer-{{ $i }}"
                            class="flex w-full items-center justify-between gap-4 py-6 text-left">
                        <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                              x-bind:class="open && 'rotate-45'">
                            <x-icon-plus />
                        </span>
                    </button>

                    <div id="copay-faq-answer-{{ $i }}" x-show="open" x-cloak
                         class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                        <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
