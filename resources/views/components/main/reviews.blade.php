{{-- Figma 60:12 (Frame 102) — 이용 가족 후기 --}}
@php
    /*
     * 아바타 배경은 카드마다 다른 색이 지정되어 있다 (62:42 / 62:51 / 62:61).
     * 토큰이 아닌 raw 값이라 그대로 옮긴다.
     */
    $reviews = [
        ['initial' => '보', 'who' => '서울 강남구 · 보호자', 'meta' => '방문간호 · 8개월째',
         'avatar' => 'rgba(91,63,160,0.29)',
         'quote' => '담당 간호사가 바뀌어도 기록이 남아있어서 마음이 놓여요.'],
        ['initial' => '보', 'who' => '경기 성남시 · 보호자', 'meta' => '방문요양 · 1년 2개월째',
         'avatar' => 'rgba(54,148,171,0.4)',
         'quote' => '등급 신청부터 서비스 시작까지 센터장님이 다 챙겨주셔서 편했어요.'],
        ['initial' => '보', 'who' => '인천 부평구 · 보호자', 'meta' => '치매가족휴가제 · 5개월째',
         // 확인 필요: 시안값 rgba(131,41,8,0.1) 은 흰 글자와 대비가 거의 없다.
         // 앞의 두 장과 같은 농도(0.4)로 올려 두었다.
         'avatar' => 'rgba(131,41,8,0.4)',
         'quote' => '치매가족휴가제 덕분에 처음으로 마음 편히 여행 다녀왔어요.'],
    ];
@endphp

{{-- 섹션 배경은 primary 15% 틴트다 (60:12) --}}
<section class="w-full bg-primary/15">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <h2 class="text-center text-eb52 text-label">먼저 이용해보신 가족들의 이야기</h2>

        <div class="grid w-full grid-cols-1 gap-10 md:grid-cols-3">
            @foreach ($reviews as $review)
                <figure class="flex h-full flex-col items-start rounded-[20px] bg-surface p-8 shadow-elevation-xs">
                    <figcaption class="flex items-center gap-4">
                        <span class="flex h-[60px] w-[60px] shrink-0 items-center justify-center rounded-full text-b20 text-surface"
                              style="background-color: {{ $review['avatar'] }}">
                            {{ $review['initial'] }}
                        </span>
                        <span class="flex flex-col items-start gap-[5px]">
                            <span class="text-b20 text-label">{{ $review['who'] }}</span>
                            <span class="text-r16 text-label-alt">{{ $review['meta'] }}</span>
                        </span>
                    </figcaption>
                    <blockquote class="mt-5 w-full text-r16 text-label">{{ $review['quote'] }}</blockquote>
                </figure>
            @endforeach
        </div>
    </div>
</section>
