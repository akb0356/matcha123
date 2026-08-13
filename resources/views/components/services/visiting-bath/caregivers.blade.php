{{-- Figma 153:2442 (Frame 161) — 검증된 목욕 전문 인력 --}}
@php
    $caregivers = [
        [
            'initial' => '한',
            'name' => '한영자 요양보호사',
            'career' => '방문목욕 경력 9년',
            'chips' => ['안전 입욕', '전신 목욕'],
            'rating' => '4.9',
            'visits' => '방문 1,100+회',
        ],
        [
            'initial' => '오',
            'name' => '오미숙 요양보호사',
            'career' => '방문목욕 경력 7년',
            'chips' => ['입욕 보조', '피부 케어'],
            'rating' => '5.0',
            'visits' => '방문 740+회',
        ],
        [
            'initial' => '강',
            'name' => '강순자 요양보호사',
            'career' => '방문목욕 경력 5년',
            'chips' => ['와상 목욕', '이동 보조'],
            'rating' => '4.8',
            'visits' => '방문 520+회',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">
                전문 인력이<br>2인 1조로 찾아갑니다
            </h2>
            <p class="text-m20 text-label-alt">
                자격과 경력을 검증한 요양보호사 2인이 함께 방문합니다. 이동부터 입욕까지 두 사람이 곁을 지켜 안전하게 도와드려요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-8">
            <div class="flex w-full flex-col items-start gap-5">
                <div class="flex h-8 items-center justify-center gap-1 rounded-md bg-accent-light-blue/[0.08] px-2">
                    <img src="{{ asset('images/icons/check-badge-light-blue.svg') }}" alt="" class="h-4 w-4">
                    <p class="text-m14 text-accent-light-blue">경력·자격 검증 완료</p>
                </div>

                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-3">
                    @foreach ($caregivers as $caregiver)
                        <div class="flex flex-col items-start gap-4 overflow-hidden rounded-md border border-line-neutral bg-surface px-6 py-8">
                            <div class="flex h-24 w-24 items-center justify-center rounded-full bg-accent-light-blue">
                                <span class="text-[36px] font-bold leading-[48px] tracking-[-0.972px] text-surface">
                                    {{ $caregiver['initial'] }}
                                </span>
                            </div>

                            <div class="flex flex-col items-start gap-1">
                                <div class="flex items-center gap-1.5">
                                    <p class="text-b24 text-label">{{ $caregiver['name'] }}</p>
                                    <img src="{{ asset('images/icons/verified-check-light-blue.svg') }}"
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
                                    <img src="{{ asset('images/icons/star-light-blue.svg') }}" alt="평점" class="h-4 w-4">
                                    <p class="text-b16 text-label">{{ $caregiver['rating'] }}</p>
                                </div>
                                <div class="h-3 w-px bg-line-divider"></div>
                                <p class="text-r16 text-label-alt">{{ $caregiver['visits'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <p class="w-full text-center text-b14 text-label-alt">
                그 외 <span class="text-label">180</span>명의 검증된 목욕 전문 인력이 활동 중이에요
            </p>
        </div>
    </div>
</section>
