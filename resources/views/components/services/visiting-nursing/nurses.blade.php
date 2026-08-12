{{-- Figma 153:1427 (Frame 116) — 검증된 간호사 소개 --}}
@php
    $nurses = [
        [
            'name' => '이정숙 간호사',
            'career' => '방문간호 경력 12년',
            'photo' => 'images/services/visiting-nursing/nurse-lee-96.png',
            'initial' => null,
            'chips' => ['욕창 관리', '당뇨 관리'],
            'rating' => '4.9',
            'visits' => '방문 1,200+회',
        ],
        [
            'name' => '김민정 간호사',
            'career' => '방문간호 경력 8년',
            'photo' => null,
            'initial' => '김',
            'chips' => ['투약 관리', '상처 관리'],
            'rating' => '4.8',
            'visits' => '방문 860+회',
        ],
        [
            'name' => '박서연 간호사',
            'career' => '방문간호 경력 6년',
            'photo' => null,
            'initial' => '박',
            'chips' => ['경관영양', '튜브 관리'],
            'rating' => '5.0',
            'visits' => '방문 540+회',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">
                믿고 맡길 수 있는<br>전문 간호사가 찾아갑니다
            </h2>
            <p class="text-m20 text-label-alt">
                경력과 자격을 검증한 간호사만 어르신께 배정합니다. 어르신의 상태와 성향까지 고려해 꼭 맞는 인력을 연결해 드려요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="flex h-8 items-center justify-center gap-1 rounded-md bg-caution/[0.08] px-2">
                <img src="{{ asset('images/icons/check-badge-orange.svg') }}" alt="" class="h-4 w-4">
                <p class="text-m14 text-caution">경력·자격 검증 완료</p>
            </div>

            <div class="flex w-full flex-col items-start gap-[34px]">
                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-3">
                    @foreach ($nurses as $nurse)
                        <div class="flex flex-col items-start gap-4 overflow-hidden rounded-md border border-line-neutral bg-surface px-6 py-8">
                            @if ($nurse['photo'])
                                <img src="{{ asset($nurse['photo']) }}" alt="{{ $nurse['name'] }}"
                                     class="h-24 w-24 rounded-full object-cover">
                            @else
                                <div class="flex h-24 w-24 items-center justify-center rounded-full bg-caution">
                                    <span class="text-[36px] font-bold leading-[48px] tracking-[-0.972px] text-surface">
                                        {{ $nurse['initial'] }}
                                    </span>
                                </div>
                            @endif

                            <div class="flex flex-col items-start gap-1">
                                <div class="flex items-center gap-1.5">
                                    <p class="text-b24 text-label">{{ $nurse['name'] }}</p>
                                    <img src="{{ asset('images/icons/verified-check.svg') }}"
                                         alt="검증 완료" class="h-5 w-5">
                                </div>
                                <p class="text-m16 text-label-alt">{{ $nurse['career'] }}</p>
                            </div>

                            {{-- Figma의 「gap 32」 스페이서를 margin으로 옮겼다 (부모 gap 16 + 48 = 64) --}}
                            <div class="mt-12 flex items-center gap-1.5">
                                @foreach ($nurse['chips'] as $chip)
                                    <span class="flex h-8 items-center justify-center rounded-md bg-fill-alt px-2.5 text-m14 text-label-alt">
                                        {{ $chip }}
                                    </span>
                                @endforeach
                            </div>

                            {{-- 「gap 4」 스페이서 → 부모 gap 16 + 20 = 36 --}}
                            <div class="mt-5 flex w-full items-center gap-3 border-t border-surface-alt pt-4">
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('images/icons/star.svg') }}" alt="평점" class="h-4 w-4">
                                    <p class="text-b16 text-label">{{ $nurse['rating'] }}</p>
                                </div>
                                <div class="h-3 w-px bg-line-divider"></div>
                                <p class="text-r16 text-label-alt">{{ $nurse['visits'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="w-full text-center text-b14 text-label-alt">
                    그 외 <span class="text-label">248</span>명의 검증된 간호사가 활동 중이에요
                </p>
            </div>
        </div>
    </div>
</section>
