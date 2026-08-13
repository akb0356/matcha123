{{-- Figma 59:28 (Frame 101) — 최종 CTA --}}
{{-- 섹션 전체가 primary(#3694ab) 배경이고 글자는 전부 흰색이다. --}}
<section class="w-full bg-primary">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <div class="flex flex-col items-center gap-5">
            {{-- 흰 배경 위 강조색이 아니라 통째로 흰 글자다 (51:13) --}}
            <h2 class="text-center text-eb44 text-surface lg:text-eb52">
                노년은 줄어듦이 아니라, 더해짐이라 믿습니다
            </h2>
            <p class="text-center text-r20 text-surface">등급신청부터 서비스 등록까지, 청담원이 함께합니다</p>
        </div>

        <div class="flex w-full max-w-[577px] flex-col items-stretch gap-4 sm:flex-row sm:items-center">
            {{-- 51:16 흰 배경 + primary 글자 --}}
            <a href="{{ route('services.visiting-nursing') }}"
               class="btn-lift flex h-16 flex-1 items-center justify-center rounded-md bg-surface px-6 text-b20 text-primary hover:bg-surface-alt">
                1분안에 서비스 신청하기
            </a>
            {{-- 51:23 accent-violet 배경 + 흰 글자 --}}
            <a href="#platform"
               class="btn-lift flex h-16 flex-1 items-center justify-center rounded-md bg-accent-violet px-6 text-b20 text-surface hover:brightness-95">
                청담원 플랫폼 도입 문의하기
            </a>
        </div>
    </div>
</section>
