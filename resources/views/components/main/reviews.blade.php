{{-- Figma 60:12 (Frame 102) — 이용 가족 후기 --}}
@php
    $reviews = [
        ['initial' => '보', 'who' => '서울 강남구 · 보호자', 'meta' => '방문간호 · 8개월째',
         'quote' => '담당 간호사가 바뀌어도 기록이 남아있어서 마음이 놓여요.'],
        ['initial' => '보', 'who' => '경기 성남시 · 보호자', 'meta' => '방문요양 · 1년 2개월째',
         'quote' => '등급 신청부터 서비스 시작까지 센터장님이 다 챙겨주셔서 편했어요.'],
        ['initial' => '보', 'who' => '인천 부평구 · 보호자', 'meta' => '치매가족휴가제 · 5개월째',
         'quote' => '치매가족휴가제 덕분에 처음으로 마음 편히 여행 다녀왔어요.'],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <h2 class="text-center text-eb52 text-label">먼저 이용해보신 가족들의 이야기</h2>

        <div class="grid w-full grid-cols-1 gap-10 md:grid-cols-3">
            @foreach ($reviews as $review)
                <figure class="flex h-full flex-col items-start rounded-[20px] border border-primary-surface bg-surface p-8 shadow-elevation-xs">
                    <figcaption class="flex items-center gap-4">
                        <span class="flex h-[60px] w-[60px] shrink-0 items-center justify-center rounded-full bg-primary/10 text-b20 text-primary">
                            {{ $review['initial'] }}
                        </span>
                        <span class="flex flex-col items-start">
                            <span class="text-m16 text-label">{{ $review['who'] }}</span>
                            <span class="text-r16 text-label-alt">{{ $review['meta'] }}</span>
                        </span>
                    </figcaption>
                    <blockquote class="mt-5 w-full text-r20 text-label-neutral">{{ $review['quote'] }}</blockquote>
                </figure>
            @endforeach
        </div>
    </div>
</section>
