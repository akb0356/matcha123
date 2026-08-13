{{-- Figma 153:1975 (Frame 202) — 전역 헤더 + 메가 드롭다운 --}}
@php
    /*
     * children 이 있는 항목만 드롭다운에 컬럼으로 나온다.
     * 커뮤니티·채용·커리어·센터 소개·고객센터의 하위 메뉴는 아직 확정되지 않아 비워 두었다.
     */
    $navItems = [
        [
            'label' => '서비스',
            'href' => '#',
            'children' => [
                ['label' => '방문간호', 'href' => route('services.visiting-nursing')],
                ['label' => '방문요양', 'href' => route('services.visiting-care')],
                ['label' => '방문목욕', 'href' => route('services.visiting-bath')],
                ['label' => '치매가족휴가제', 'href' => '#'], // 페이지 준비 중
            ],
        ],
        [
            'label' => '비용·지원',
            'href' => '#',
            'children' => [
                ['label' => '장기요양등급', 'href' => '#'],
                ['label' => '본인부담금 안내', 'href' => '#'],
                ['label' => '비용 계산기', 'href' => '#'],
            ],
        ],
        ['label' => '커뮤니티', 'href' => '#', 'children' => []],
        ['label' => '채용·커리어', 'href' => '#', 'children' => []],
        ['label' => '센터 소개', 'href' => '#', 'children' => []],
        ['label' => '고객센터', 'href' => '#', 'children' => []],
    ];

    // 드롭다운 배경 패널의 높이. 컬럼은 각 메뉴 아래에 붙으므로 가장 긴 컬럼을 기준으로 잡는다.
    // 위아래 여백 32px + (항목 수 × 항목 높이 30px)
    $panelHeight = 64 + max(array_map(fn ($item) => count($item['children']), $navItems)) * 30;
@endphp

<header class="relative z-50 w-full bg-surface"
        x-data="{ open: false }"
        x-on:mouseleave="open = false"
        x-on:focusout="if (! $el.contains($event.relatedTarget)) open = false"
        x-on:keydown.escape="open = false">

    <div class="mx-auto flex h-[53px] max-w-content items-center justify-between gap-10 px-6">
        <div class="flex h-full items-center gap-5">
            <a href="/" class="flex shrink-0 items-center gap-[3.6px]" aria-label="청담원 홈">
                <img src="{{ asset('images/brand/logo-mark.svg') }}" alt=""
                     class="h-6 w-[28.8px]">
                <img src="{{ asset('images/brand/logo-wordmark.svg') }}" alt="청담원"
                     class="h-[19.2px] w-[53.7px]">
            </a>

            {{-- 메뉴에 마우스가 닿거나 키보드 포커스가 들어오면 전체 하위 메뉴가 함께 열린다. --}}
            <nav class="hidden h-full items-center gap-1 lg:flex"
                 x-on:mouseenter="open = true"
                 x-on:focusin="open = true"
                 aria-label="주요 메뉴">
                @foreach ($navItems as $item)
                    <div class="relative flex h-full items-center">
                        <a href="{{ $item['href'] }}"
                           @if ($item['children']) x-bind:aria-expanded="open" @endif
                           class="flex h-9 items-center justify-center rounded-md px-3 text-b14 text-label hover:bg-fill-alt">
                            {{ $item['label'] }}
                        </a>

                        @if ($item['children'])
                            <div x-show="open" x-cloak x-transition.opacity.duration.150ms
                                 class="absolute left-0 top-full z-10 pt-8">
                                <ul class="flex flex-col items-start">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <a href="{{ $child['href'] }}"
                                               class="flex h-[30px] items-center whitespace-nowrap text-b14 text-label-alt transition-colors hover:text-label">
                                                {{ $child['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endforeach
            </nav>
        </div>

        <div class="flex items-center gap-2">
            <a href="tel:1588-2091" class="flex items-center gap-1.5 px-2">
                <img src="{{ asset('images/icons/phone.svg') }}" alt="" class="h-[18px] w-[18px]">
                <span class="text-b14 text-primary">1588-2091</span>
            </a>
            <a href="#" class="flex h-9 items-center justify-center rounded-md px-3.5 text-b14 text-label hover:bg-fill-alt">
                로그인
            </a>
            <a href="#" class="flex h-9 items-center justify-center rounded-md bg-primary px-3.5 text-b14 text-surface hover:bg-primary-semistrong">
                무료 상담 신청
            </a>
        </div>
    </div>

    {{-- 하위 메뉴 뒤에 깔리는 흰 패널. 히어로 이미지 위에서도 글자가 읽히도록 한다. --}}
    <div x-show="open" x-cloak x-transition.opacity.duration.150ms
         class="absolute inset-x-0 top-full border-b border-line-neutral bg-surface shadow-elevation-xs"
         style="height: {{ $panelHeight }}px"
         aria-hidden="true"></div>
</header>
