{{-- Figma 33:1338 (Frame 71) + main2/main3 호버 상태 — 사업 소개 --}}
@php
    /*
     * 호버하면 해당 카드가 넓어지고(flex-grow 1 -> 2.1) 배경 사진 + 컬러 그라데이션이
     * 깔리며 글자가 흰색으로 바뀐다. 디자인 main2/main3 의 호버 상태를 옮긴 것이다.
     *
     * 배경 사진(bg)은 원본 4800px 짜리를 카드 최대 표시폭(약 690px)의 2배인
     * 1400px 로 줄여 넣었다. 교체할 때도 1400px / JPEG q82 기준을 유지한다.
     */
    $items = [
        [
            'key' => 'care',
            'icon' => 'home',
            'icon_bg' => 'bg-primary',
            'title' => '재가복지센터',
            'body' => '방문간호, 방문요양, 방문목욕,<br>치매가족휴가제 등 주요 서비스를 통해<br>어르신의 일상에 전문성을 더합니다.',
            'href' => route('services.visiting-nursing'),
            'bg' => 'images/main/care.jpg',
            'overlay' => 'linear-gradient(135deg, rgba(4,113,139,0.90) 0%, rgba(54,148,171,0.55) 100%)',
        ],
        [
            'key' => 'platform',
            'icon' => 'box',
            'icon_bg' => 'bg-accent-violet',
            'title' => '청담원 플랫폼',
            'body' => '환자연계, 상담관리, 케어플랜,<br>구인구직 등 센터 운영의<br>전 과정을 하나로 통합해 지원합니다.',
            'href' => '#platform',
            'bg' => 'images/main/platform.jpg',
            'overlay' => 'linear-gradient(135deg, rgba(53,28,150,0.90) 0%, rgba(91,55,237,0.55) 100%)',
        ],
    ];
@endphp

<section id="platform" class="w-full bg-primary/5">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <h2 class="text-center text-eb52 text-label">
            돌봄이 이어지는 첫걸음, <span class="text-primary">청담원 사업 소개</span>
        </h2>

        {{-- 마우스가 어느 카드에 있는지 하나의 상태로 관리한다 --}}
        <div class="flex w-full flex-col items-stretch gap-10 lg:flex-row" x-data="{ hovered: null }">
            @foreach ($items as $item)
                <div class="flex transition-[flex-grow] duration-500 ease-out lg:flex-1"
                     x-bind:style="hovered === '{{ $item['key'] }}' ? 'flex-grow: 2.1'
                                 : (hovered === null ? 'flex-grow: 1' : 'flex-grow: 1')"
                     x-on:mouseenter="hovered = '{{ $item['key'] }}'"
                     x-on:mouseleave="hovered = null">
                    <a href="{{ $item['href'] }}"
                       class="group/card relative flex w-full flex-col justify-between gap-20 overflow-hidden rounded-[20px] border border-primary-surface bg-surface p-8 shadow-elevation-xs transition-shadow duration-300 hover:shadow-card-hi">

                        {{-- 호버 시 나타나는 배경: 사진 위에 컬러 그라데이션을 얹는다 --}}
                        <span class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-500 group-hover/card:opacity-100"
                              aria-hidden="true">
                            <img src="{{ asset($item['bg']) }}" alt="" loading="lazy" decoding="async"
                                 class="absolute inset-0 h-full w-full object-cover object-center">
                            <span class="absolute inset-0 block" style="background-image: {{ $item['overlay'] }}"></span>
                        </span>

                        <span class="relative flex flex-col items-start gap-5">
                            <span class="flex h-[52px] w-[52px] shrink-0 items-center justify-center rounded-full {{ $item['icon_bg'] }} transition-colors duration-300 group-hover/card:bg-surface/20">
                                <img src="{{ asset("images/icons/{$item['icon']}.svg") }}" alt="" class="h-6 w-6">
                            </span>
                            <span class="flex w-full flex-col items-start gap-5">
                                <span class="text-eb30 text-label transition-colors duration-300 group-hover/card:text-surface">
                                    {{ $item['title'] }}
                                </span>
                                <span class="w-full text-r20 text-label-alt transition-colors duration-300 group-hover/card:text-white/90">
                                    {!! $item['body'] !!}
                                </span>
                            </span>
                        </span>

                        <span class="relative flex items-center justify-center gap-2.5 self-start rounded-full border border-primary px-6 py-3 transition-colors duration-300 group-hover/card:border-surface">
                            <span class="whitespace-nowrap text-m20 text-primary transition-colors duration-300 group-hover/card:text-surface">더보기</span>
                            <img src="{{ asset('images/icons/chevron-right-primary.svg') }}" alt=""
                                 class="h-6 w-6 transition-all duration-300 group-hover/card:brightness-0 group-hover/card:invert">
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
