{{-- Figma 153:2733 (S6 / 보호자 후기) --}}
@php
    $reviews = [
        [
            'initial' => '김',
            'name' => '김○○ 보호자',
            'meta' => '강남구 · 어머니 방문목욕',
            'quote' => '거동이 불편한 어머니 목욕이 늘 큰 일이었는데, 두 분이 오셔서 안전하게 씻겨주시니 정말 든든해요. 개운해하시는 모습에 마음이 놓입니다.',
        ],
        [
            'initial' => '이',
            'name' => '이○○ 보호자',
            'meta' => '송파구 · 아버지 방문목욕',
            'quote' => '혼자선 위험해서 제대로 못 씻으셨는데 전문 장비로 안전하게 해주시니 피부 트러블도 사라졌어요. 진작 신청할 걸 그랬습니다.',
        ],
        [
            'initial' => '박',
            'name' => '박○○ 보호자',
            'meta' => '서초구 · 어머니 방문목욕',
            'quote' => '목욕 후 개운해하시는 어머니 표정을 보면 마음이 놓여요. 머리까지 정성껏 감겨주시고 보습도 꼼꼼히 챙겨주세요.',
        ],
        [
            'initial' => '정',
            'name' => '정○○ 보호자',
            'meta' => '마포구 · 아버지 방문목욕',
            'quote' => '무거운 아버지를 가족이 씻기다 다칠 뻔한 적도 있었는데, 이제는 안심하고 맡깁니다. 두 분이 오시니 훨씬 안전해요.',
        ],
        [
            'initial' => '최',
            'name' => '최○○ 보호자',
            'meta' => '노원구 · 시어머니 방문목욕',
            'quote' => '차량으로 오셔서 따뜻한 물에 정성껏 씻겨주시니, 어르신이 목욕 오는 날을 손꼽아 기다리세요. 표정이 한결 밝아지셨어요.',
        ],
    ];
@endphp

{{-- 카드 폭 400 + 간격 16 = 한 칸 이동 거리 416 --}}
<section class="w-full overflow-hidden bg-accent-light-blue/20"
         x-data="{ index: 0, last: {{ count($reviews) - 1 }}, step: 416 }">
    <div class="mx-auto max-w-content px-6 pb-[128px] pt-[136px]">
        <div class="flex items-end justify-between">
            <h2 class="text-eb40 text-label">보호자들이 전하는 변화</h2>

            <div class="flex items-center gap-2">
                <button type="button" x-on:click="index = Math.max(0, index - 1)"
                        x-bind:disabled="index === 0"
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-surface text-label-alt transition disabled:opacity-40 hover:text-label"
                        aria-label="이전 후기">
                    <x-icon-chevron-left-thick class="h-5 w-5" />
                </button>
                <button type="button" x-on:click="index = Math.min(last, index + 1)"
                        x-bind:disabled="index === last"
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-surface text-label-alt transition disabled:opacity-40 hover:text-label"
                        aria-label="다음 후기">
                    <x-icon-chevron-right-thick class="h-5 w-5" />
                </button>
            </div>
        </div>

        <div class="mt-[115px]">
            {{-- 본문 최소 높이(디자인 90px = 3줄)와 하단 정렬로 작성자 줄을 카드마다 맞춘다 --}}
            <div class="flex items-stretch gap-4 transition-transform duration-300 ease-out"
                 x-bind:style="`transform: translateX(-${index * step}px)`">
                @foreach ($reviews as $review)
                    <figure class="flex w-[400px] shrink-0 flex-col items-start overflow-hidden rounded-md bg-surface p-7">
                        <p class="text-[16px] font-normal leading-6 tracking-[2.4px] text-accent-light-blue" aria-label="별점 5점 만점에 5점">
                            ★★★★★
                        </p>

                        <blockquote class="mb-6 mt-4 min-h-[90px] w-full text-r20 text-[rgba(51,48,46,0.9)]">
                            {{ $review['quote'] }}
                        </blockquote>

                        <figcaption class="mt-auto flex w-full items-center gap-3 border-t border-[rgba(51,48,46,0.1)] pt-5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-accent-light-blue">
                                <span class="text-[16px] font-bold leading-6 tracking-[-0.6px] text-surface">
                                    {{ $review['initial'] }}
                                </span>
                            </div>
                            <div class="flex flex-col items-start">
                                <p class="text-m16 text-label-neutral">{{ $review['name'] }}</p>
                                <p class="text-r14 text-[rgba(51,48,46,0.6)]">{{ $review['meta'] }}</p>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </div>
</section>
