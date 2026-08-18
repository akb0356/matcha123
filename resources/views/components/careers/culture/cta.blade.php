{{-- Figma 180:2904 (CTA band) — 채용 공고로 보내는 띠 --}}
<section class="w-full bg-primary">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <div class="flex flex-col items-center gap-4 text-center">
            <h2 class="text-eb44 text-surface lg:text-eb52">마음이 움직이셨다면</h2>
            <p class="text-m20 text-surface">지금 모집 중인 공고를 확인하고, 이력서 없이 1분이면 지원할 수 있어요.</p>
        </div>

        <a href="{{ route('careers') }}"
           class="btn-hover flex h-[58px] w-[300px] max-w-full items-center justify-center gap-2 rounded bg-surface-alt text-m20 text-primary hover:bg-surface">
            채용 공고 보러 가기
            <img src="{{ asset('images/icons/arrow-right-primary.svg') }}" alt="" class="h-[16.81px] w-5">
        </a>
    </div>
</section>
