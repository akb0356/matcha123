{{-- Figma 55:44 (Frame 90) — 기록 확인 --}}
<section class="w-full bg-fill-alt">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <h2 class="w-full text-center text-eb52 text-label">
            이제는, <span class="text-primary">청담원</span>과 함께하세요
        </h2>

        <div class="flex w-full flex-col items-center gap-10 lg:flex-row">
            <img src="{{ asset('images/main/record.png') }}"
                 alt="방문 기록을 확인하는 보호자"
                 class="h-[465px] w-full rounded-[20px] object-cover lg:w-[512px] lg:shrink-0">

            {{--
                시안 Frame 88 은 418px 이지만 본문 노드(41:1459)가 483px 로 넘쳐 있다.
                넓은 쪽에 맞춰야 헤드라인 3줄이 단어 중간에서 끊기지 않는다.
            --}}
            <div class="flex w-full flex-col items-start gap-3 lg:w-[483px]">
                <p class="w-full text-b20 text-accent-violet">간편하고 투명한 확인</p>
                {{-- 41:1458 은 3줄로 끊긴다. 좁은 화면에서는 자연 줄바꿈에 맡긴다. --}}
                <p class="w-full text-eb30 text-label">
                    간호사·요양보호사 방문이 <br class="hidden lg:inline">끝나면, 바로 기록되고
                    <br class="hidden lg:inline">보호자는 그 자리에서 확인합니다.
                </p>
                <p class="text-r20 text-label-alt">
                    방문 시간, 건강 상태, 케어 내용까지 요양보호사와 간호사가 남긴 기록을 보호자가
                    실시간으로 확인할 수 있습니다. 담당자가 바뀌어도 기록은 그대로 이어집니다.
                </p>
            </div>
        </div>
    </div>
</section>
