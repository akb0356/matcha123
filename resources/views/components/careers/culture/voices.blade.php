{{-- Figma 180:3038 (Frame 211) — 청담원과 함께하는 사람들 --}}
@php
    /*
     * 확인 필요: 후기 3건은 시안에 적힌 예시다. 실제 직원 후기로 교체할 때
     * 이름·근속연수는 본인 동의를 받은 표기로 바꿔야 한다.
     *
     * 아바타 색은 카드마다 다르며 시안의 raw 값이다(#e846cd, #f55a00 은 토큰에 없다).
     */
    $voices = [
        ['initial' => '김', 'color' => '#008dcf', 'name' => '김선영', 'role' => '요양보호사 · 근속 5년차',
         'quote' => '처음엔 방문요양이 막막했는데, 매칭부터 교육까지 센터가 끝까지 챙겨줬어요. 덕분에 5년째 같은 어르신을 돌보고 있습니다.'],
        ['initial' => '박', 'color' => '#e846cd', 'name' => '박정희', 'role' => '요양보호사 · 근속 3년차',
         'quote' => '거리 수당이 있어 집 근처에서 일할 수 있는 게 가장 좋아요. 급여일도 정확하고, 궁금한 건 24시간 핫라인으로 바로 물어봅니다.'],
        ['initial' => '이', 'color' => '#f55a00', 'name' => '이수진', 'role' => '방문간호사 · 근속 2년차',
         'quote' => '간호사로 재취업하며 걱정이 많았지만, 매달 유급 교육과 심리 상담 덕에 자신감을 얻었어요. 동료들과의 분위기도 따뜻합니다.'],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[720px] flex-col items-start gap-3">
            <h2 class="w-full text-eb44 text-label lg:text-eb52">청담원과 함께하는 사람들</h2>
            <p class="w-full text-m20 text-label-alt">먼저 일하고 있는 동료들의 이야기를 들어보세요.</p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-5 md:grid-cols-3">
            @foreach ($voices as $v)
                <figure class="flex flex-col items-start rounded-md border border-line-neutral bg-surface p-7 shadow-elevation-md">
                    {{-- 시안은 별을 텍스트로 두고 자간 2.4px 를 준다 --}}
                    <p class="text-r16 text-primary" style="letter-spacing: 2.4px" aria-label="별점 5점 만점에 5점">★★★★★</p>

                    <blockquote class="mt-4 w-full text-r16 text-label">{{ $v['quote'] }}</blockquote>

                    <figcaption class="mt-auto flex w-full items-center gap-3 border-t border-surface-alt pt-5">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full text-b16 text-surface"
                              style="background-color: {{ $v['color'] }}">
                            {{ $v['initial'] }}
                        </span>
                        <span class="flex flex-col items-start">
                            <span class="text-m16 text-label">{{ $v['name'] }}</span>
                            <span class="text-r14 text-label-alt">{{ $v['role'] }}</span>
                        </span>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
