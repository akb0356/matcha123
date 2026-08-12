{{-- Figma 153:1979 (Frame 132) — 검증된 요양보호사 소개 --}}
@php
    // 방문요양은 프로필 사진이 없어 디자인상 전원 이니셜 원형이다.
    $caregivers = [
        [
            'initial' => '이',
            'name' => '이순영 요양보호사',
            'career' => '방문요양 경력 11년',
            'chips' => ['일상생활 지원', '치매 돌봄'],
            'rating' => '4.9',
            'visits' => '방문 1,400+회',
        ],
        [
            'initial' => '김',
            'name' => '김미경 요양보호사',
            'career' => '방문요양 경력 8년',
            'chips' => ['인지활동', '식사 보조'],
            'rating' => '4.8',
            'visits' => '방문 980+회',
        ],
        [
            'initial' => '박',
            'name' => '박정자 요양보호사',
            'career' => '방문요양 경력 6년',
            'chips' => ['이동 보조', '가사 지원'],
            'rating' => '5.0',
            'visits' => '방문 620+회',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">
                믿고 맡길 수 있는<br>요양보호사가 찾아갑니다
            </h2>
            <p class="text-m20 text-label-alt">
                자격과 경력을 검증한 요양보호사만 어르신께 배정합니다. 어르신의 상태와 성향까지 고려해 꼭 맞는 분을 연결해 드려요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="flex h-8 items-center justify-center gap-1 rounded-md bg-accent-violet/[0.08] px-2">
                <img src="{{ asset('images/icons/check-badge-violet.svg') }}" alt="" class="h-4 w-4">
                <p class="text-m14 text-accent-violet">경력·자격 검증 완료</p>
            </div>

            <div class="flex w-full flex-col items-start gap-8">
                {{-- 방문간호는 카드 간격 16, 방문요양은 32이다 (Figma 153:1991) --}}
                <div class="grid w-full grid-cols-1 gap-8 md:grid-cols-3">
                    @foreach ($caregivers as $caregiver)
                        <div class="flex flex-col items-start gap-4 overflow-hidden rounded-md border border-line-neutral bg-surface px-6 py-8">
                            <div class="flex h-24 w-24 items-center justify-center rounded-full bg-accent-violet">
                                <span class="text-[36px] font-bold leading-[48px] tracking-[-0.972px] text-surface">
                                    {{ $caregiver['initial'] }}
                                </span>
                            </div>

                            <div class="flex flex-col items-start gap-1">
                                <div class="flex items-center gap-1.5">
                                    <p class="text-b24 text-label">{{ $caregiver['name'] }}</p>
                                    <img src="{{ asset('images/icons/verified-check-violet.svg') }}"
                                         alt="검증 완료" class="h-5 w-5">
                                </div>
                                <p class="text-m16 text-label-alt">{{ $caregiver['career'] }}</p>
                            </div>

                            {{-- Figma의 「gap 32」 스페이서 (부모 gap 16 + 48 = 64) --}}
                            <div class="mt-12 flex items-center gap-1.5">
                                @foreach ($caregiver['chips'] as $chip)
                                    <span class="flex h-8 items-center justify-center rounded-md bg-fill-alt px-2.5 text-m14 text-label-alt">
                                        {{ $chip }}
                                    </span>
                                @endforeach
                            </div>

                            {{-- 「gap 4」 스페이서 (부모 gap 16 + 20 = 36) --}}
                            <div class="mt-5 flex w-full items-center gap-3 border-t border-surface-alt pt-4">
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('images/icons/star-violet.svg') }}" alt="평점" class="h-4 w-4">
                                    <p class="text-b16 text-label">{{ $caregiver['rating'] }}</p>
                                </div>
                                <div class="h-3 w-px bg-line-divider"></div>
                                <p class="text-r16 text-label-alt">{{ $caregiver['visits'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="w-full text-center text-b14 text-label-alt">
                    그 외 <span class="text-label">312</span>명의 검증된 요양보호사가 활동 중이에요
                </p>
            </div>
        </div>
    </div>
</section>
