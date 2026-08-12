{{-- Figma 153:1975 (Frame 202) — 전역 헤더 --}}
@php
    $navItems = ['서비스', '비용·지원', '커뮤니티', '채용·커리어', '센터 소개', '고객센터'];
@endphp

<header class="h-[53px] w-full bg-surface">
    <div class="mx-auto flex h-full max-w-content items-center justify-between gap-10 px-6">
        <div class="flex items-center gap-5">
            <a href="/" class="flex shrink-0 items-center gap-[3.6px]" aria-label="청담원 홈">
                <img src="{{ asset('images/brand/logo-mark.svg') }}" alt=""
                     class="h-6 w-[28.8px]">
                <img src="{{ asset('images/brand/logo-wordmark.svg') }}" alt="청담원"
                     class="h-[19.2px] w-[53.7px]">
            </a>

            <nav class="hidden items-center gap-1 lg:flex">
                @foreach ($navItems as $item)
                    <a href="#"
                       class="flex h-9 items-center justify-center rounded-md px-3 text-b14 text-label hover:bg-fill-alt">
                        {{ $item }}
                    </a>
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
</header>
