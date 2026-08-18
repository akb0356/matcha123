{{--
    전역 헤더 + 메가 드롭다운
    헤더: Figma 153:1975 (Frame 202)
    드롭다운: Figma 163:4967 (Nav) — 고정폭 컬럼(디자인 110px -> 100px로 축소), 4px 간격, 37px 행, 가운데 정렬
--}}
@php
    /*
     * 컬럼은 부모 메뉴와 같은 100px 고정폭이라 left-0 만으로 정확히 정렬된다.
     * 하위 메뉴가 없는 항목(커뮤니티·채용·커리어·센터 소개)은 컬럼을 만들지 않는다.
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
                ['label' => '청담원 플랫폼', 'href' => route('services.platform')],
            ],
        ],
        [
            'label' => '비용·지원',
            'href' => '#',
            'children' => [
                ['label' => '장기요양등급', 'href' => route('support.long-term-care-grade')],
                ['label' => '본인부담금 안내', 'href' => route('support.copayment')],
                ['label' => '비용 계산기', 'href' => route('support.cost-calculator')],
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

    // 패널 높이 = 가장 긴 컬럼의 항목 수 × 행 높이 37px (디자인 4행 = 148px)
    $panelHeight = max(array_map(fn ($item) => count($item['children']), $navItems)) * 37;
@endphp

{{--
    sticky 로 두면 처음에는 문서 흐름에 있다가 스크롤할 때 상단에 붙는다.
    fixed 와 달리 흐름에서 빠지지 않으므로 히어로가 헤더 밑으로 밀려 들어가지 않는다.
    페이지 래퍼(.bg-surface)에 overflow 가 없어야 동작한다.
--}}
<header class="sticky top-0 z-50 w-full border-b border-line-divider bg-surface"
        x-data="{ open: false }"
        x-on:mouseleave="open = false"
        x-on:focusout="if (! $el.contains($event.relatedTarget)) open = false"
        x-on:keydown.escape="open = false">

    <div class="mx-auto flex h-[53px] max-w-content items-center justify-between gap-4 px-6">
        <a href="{{ route('main') }}" class="flex shrink-0 items-center gap-[3.6px]" aria-label="청담원 홈">
            <img src="{{ asset('images/brand/logo-mark.svg') }}" alt="" class="h-6 w-[28.8px]">
            <img src="{{ asset('images/brand/logo-wordmark.svg') }}" alt="청담원" class="h-[19.2px] w-[53.7px]">
        </a>

        {{-- 메뉴에 마우스가 닿거나 키보드 포커스가 들어오면 전체 하위 메뉴가 함께 열린다. --}}
        <nav class="hidden h-full shrink-0 items-center gap-1 lg:flex"
             x-on:mouseenter="open = true"
             x-on:focusin="open = true"
             aria-label="주요 메뉴">
            @foreach ($navItems as $item)
                <div class="relative flex h-full w-[100px] shrink-0 items-center">
                    <a href="{{ $item['href'] }}"
                       @if ($item['children']) x-bind:aria-expanded="open" @endif
                       class="flex h-9 w-full items-center justify-center rounded-md text-b14 text-label transition-colors hover:bg-label/5">
                        {{ $item['label'] }}
                    </a>

                    @if ($item['children'])
                        <div x-show="open" x-cloak x-transition.opacity.duration.150ms
                             class="absolute left-0 top-full z-10 w-[100px] overflow-hidden rounded-md">
                            <ul class="flex flex-col items-center">
                                @foreach ($item['children'] as $child)
                                    <li class="w-full">
                                        <a href="{{ $child['href'] }}"
                                           class="flex h-[37px] w-full items-center justify-center whitespace-nowrap px-3 text-m14 text-label transition-colors hover:bg-label/5">
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

        <div class="flex shrink-0 items-center gap-2">
            <a href="tel:1588-2091" class="flex items-center gap-1.5 px-2">
                <img src="{{ asset('images/icons/phone.svg') }}" alt="" class="h-[18px] w-[18px]">
                <span class="text-b14 text-primary">1588-2091</span>
            </a>
            <a href="#" class="flex h-9 items-center justify-center rounded-md px-3.5 text-b14 text-label transition-colors hover:bg-label/5">
                로그인
            </a>
            <a href="#" class="flex h-9 items-center justify-center rounded-md bg-primary px-3.5 text-b14 text-surface transition-colors hover:bg-primary-semistrong">
                무료 상담 신청
            </a>
        </div>
    </div>

    {{--
        하위 메뉴 뒤에 깔리는 패널. 디자인은 흰색 80% 반투명이라 히어로가 살짝 비친다.
        글자가 #111 이라 그 위에서도 읽힌다. 위아래 여백은 없다.
        뒤 내용이 글자와 경쟁하지 않도록 backdrop-blur 를 얹었다.
    --}}
    <div x-show="open" x-cloak x-transition.opacity.duration.150ms
         class="absolute inset-x-0 top-full bg-white/80 backdrop-blur-md"
         style="height: {{ $panelHeight }}px"
         aria-hidden="true"></div>
</header>
