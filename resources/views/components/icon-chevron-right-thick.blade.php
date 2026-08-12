{{--
    청담원 디자인 시스템 아이콘 · chevron-right-thick
    출처: http://218.232.94.242/styleguide/ (Icons, 219종, <x-icon-{name} /> 규약)

    currentColor를 쓰므로 색은 부모의 text-* 로 지정한다.
    크기는 class 로 넘기며, 넘기지 않으면 24px(h-6 w-6)가 기본이다.
--}}
<svg {{ $attributes->except('class')->merge(['aria-hidden' => 'true']) }}
     class="{{ $attributes->get('class', 'h-6 w-6') }}"
     viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M10 7.5L14.5 12L10 16.5" stroke="currentColor" stroke-width="2.4"
          stroke-linecap="round" stroke-linejoin="round"/>
</svg>
