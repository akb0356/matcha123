{{-- Figma 208:994 (Frame 117) — 자주 묻는 질문 --}}
@php
    /*
     * 1번 질문·답변은 시안(208:999 / 208:1004) 그대로다.
     * 2~5번은 담당자가 전달한 문구로 채웠다. 3·4번은 시안 질문
     * (「환자연계는 어떤 병원에서 오나요?」 「어르신 개인정보는 어떻게 보호되나요?」)과
     * 다르며, 전달받은 질문을 정본으로 삼았다.
     */
    $faqs = [
        [
            'question' => '지금 쓰는 엑셀·기록지 자료를 옮길 수 있나요?',
            'answer' => '네. 상담 이력과 어르신 명단은 양식에 맞춰 일괄 이관해 드립니다. 셋업 단계에서 담당자가 함께 확인합니다.',
            'open' => true,
        ],
        [
            'question' => '프랜차이즈 가맹과 다른가요?',
            'answer' => '가맹은 센터를 새로 여는 분을 위한 창업 지원이고, 플랫폼은 이미 운영 중인 센터를 위한 운영 도구입니다. 두 가지는 따로 신청하실 수 있습니다.',
            'open' => false,
        ],
        [
            'question' => '우리 지역에도 연계 병원이 있나요?',
            'answer' => '지역에 따라 다릅니다. 상담 시 활동하시는 지역의 연계 현황을 확인해 안내해 드립니다.',
            'open' => false,
        ],
        [
            'question' => '담당자가 바뀌면 상담 이력은 어떻게 되나요?',
            'answer' => '첫 상담부터의 이력이 그대로 남습니다. 담당자가 바뀌어도 맥락이 이어지므로 보호자께 같은 설명을 반복하실 필요가 없습니다.',
            'open' => false,
        ],
        [
            'question' => '간호사 채용 공고도 플랫폼에서 올리나요?',
            'answer' => '네. 공고 등록부터 지원자 접수, 서류 검토, 면접, 채용 확정까지 센터가 직접 관리합니다.',
            'open' => false,
        ],
    ];
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label">청담원 플랫폼 자주 묻는 질문</h2>

        <div class="flex w-full flex-col items-start gap-5 border-t border-surface-alt">
            @foreach ($faqs as $i => $faq)
                <div class="w-full rounded-md border-b border-surface-alt bg-surface px-5"
                     x-data="{ open: {{ $faq['open'] ? 'true' : 'false' }} }">

                    <button type="button" x-on:click="open = !open"
                            x-bind:aria-expanded="open" aria-controls="platform-faq-answer-{{ $i }}"
                            class="flex w-full items-center justify-between gap-4 py-6 text-left">
                        <span class="text-m20 text-label">{{ $faq['question'] }}</span>
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center transition-transform duration-200"
                              x-bind:class="open && 'rotate-45'">
                            <x-icon-plus />
                        </span>
                    </button>

                    <div id="platform-faq-answer-{{ $i }}" x-show="open" x-cloak
                         class="flex w-full flex-col items-start justify-center pb-12 pr-8">
                        <p class="max-w-[800px] text-r20 text-label-neutral">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
