{{-- Figma 153:1975 (Frame 202) — 전역 헤더 + 메가 드롭다운 --}}
@php
    /*
     * children 이 있는 항목만 드롭다운에 컬럼으로 나온다.
     * 커뮤니티·채용·커리어·센터 소개의 하위 메뉴는 아직 확정되지 않아 비워 두었다.
     */
    $navItems = [
        [
            'label' => '서비스',
            'href' => '#',
            'children' => [
                ['label' => '방문간호', 'href' => route('services.visiting-nursing')],
                ['label' => '방문요양', 'href' => route('services.visiting-care')],
                ['label' => '방문목욕', 'href' => route('services.visiting-bath')],
                ['label' => '치매가족휴가제', 'href' => route('services.dementia-respite')],
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
        [
            'label' => '고객센터',
            'href' => '#',
            'children' => [
                ['label' => '공지사항', 'href' => '#'],
                ['label' => '자주 묻는 질문', 'href' => '#'],
            ],
        ],
    ];

    // 드롭다운 배경 패널 높이 = 위아래 여백(32+32) + 가장 긴 컬럼의 항목 수 × 항목 높이(32)
    $panelHeight = 64 + max(array_map(fn ($item) => count($item['children']), $navItems)) * 32;
@endphp

<header class="relative z-50 w-full bg-surface"
        x-data="{ open: false }"
        x-on:mouseleave="open = false"
        x-on:focusout="if (! $el.contains($event.relatedTarget)) open = false"
        x-on:keydown.escape="open = false">

    <div class="mx-auto flex h-[53px] max-w-content items-center justify-between gap-8 px-6">
        <div class="flex h-full items-center gap-5">
            <a href="/" class="flex shrink-0 items-center gap-[3.6px]" aria-label="청담원 홈">
                <img src="{{ asset('images/brand/logo-mark.svg') }}" alt=""
                     class="h-6 w-[28.8px]">
                <img src="{{ asset('images/brand/logo-wordmark.svg') }}" alt="청담원"
                     class="h-[19.2px] w-[53.7px]">
            </a>

            {{-- 메뉴에 마우스가 닿거나 키보드 포커스가 들어오면 전체 하위 메뉴가 함께 열린다. --}}
            <nav class="hidden h-full items-center gap-10 lg:flex"
                 x-on:mouseenter="open = true"
                 x-on:focusin="open = true"
                 aria-label="주요 메뉴">
                @foreach ($navItems as $item)
                    <div class="relative flex h-full items-center">
                        <a href="{{ $item['href'] }}"
                           @if ($item['children']) x-bind:aria-expanded="open" @endif
                           class="flex h-9 items-center justify-center rounded-md px-2.5 text-b14 text-label transition-colors hover:bg-fill-alt">
                            {{ $item['label'] }}
                        </a>

                        @if ($item['children'])
                            {{--
                                컬럼은 부모 메뉴와 같은 좌측 기준(left-0)에 두고 항목에도 같은
                                같은 px-2.5 를 줘서 글자 왼쪽 끝이 부모 라벨과 정확히 맞는다.
                                항목은 라벨보다 가벼운 medium 으로 두어 위계를 구분한다.
                            --}}
                            <div x-show="open" x-cloak x-transition.opacity.duration.150ms
                                 class="absolute left-0 top-full z-10 pt-8">
                                <ul class="flex flex-col items-start">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <a href="{{ $child['href'] }}"
                                               class="flex h-8 items-center whitespace-nowrap rounded-md px-2.5 text-m14 text-label-alt transition-colors hover:bg-fill-alt hover:text-label">
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
            <a href="#" class="flex h-9 items-center justify-center rounded-md px-3.5 text-b14 text-label transition-colors hover:bg-fill-alt">
                로그인
            </a>
            <a href="#" class="flex h-9 items-center justify-center rounded-md bg-primary px-3.5 text-b14 text-surface transition-colors hover:bg-primary-semistrong">
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
