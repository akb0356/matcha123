{{-- Figma 156:4386 (Frame 219) — 신청 도움 --}}
@php
    $cards = [
        ['서류 준비', '복잡한 신청서·서류를 매니저가 함께 준비해요'],
        ['방문조사 대비', '조사 항목과 준비 사항을 미리 안내해 드려요'],
        ['서비스 연결', '등급에 맞는 방문요양·간호·목욕까지 바로 연결'],
    ];
@endphp

{{-- 시안의 gra1 그라데이션: 156.83deg, primary-soft -> inverse-primary --}}
<section id="help" class="w-full"
         style="background-image: linear-gradient(156.83deg, #e8f3f5 14.6%, #b8dce4 85.4%)">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[720px] flex-col items-start gap-3">
            {{-- eyebrow. 시안은 Noto Sans KR 18px medium 이라 m20 으로 정규화했다. --}}
            <div class="flex flex-col items-start gap-2">
                <p class="text-m20 text-primary">아직 장기요양등급이 없으신가요?</p>
                <h2 class="text-eb40 text-label">
                    신청, 혼자 하지 마세요<br>전담 매니저가 무료로 도와드려요
                </h2>
            </div>
            <p class="w-full text-m20 text-label-alt">
                등급이 없어도 괜찮아요. 신청서 작성부터 서비스 연결까지 무료로 함께합니다.
            </p>
        </div>

        <div class="flex w-full flex-col items-center gap-24">
            <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-3">
                @foreach ($cards as [$title, $desc])
                    <div class="flex flex-col items-start gap-3 rounded-md border border-primary-soft bg-white/70 p-7">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/icons/grade-help-check.svg') }}" alt="" class="h-5 w-5 shrink-0">
                            <span class="text-b24 text-label">{{ $title }}</span>
                        </div>
                        <p class="w-full text-r20 text-label-alt">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <a href="#"
               class="btn-hover flex h-14 items-center justify-center rounded bg-primary px-6 text-m20 text-surface hover:bg-primary-strong">
                무료로 신청 도움받기
            </a>
        </div>
    </div>
</section>
