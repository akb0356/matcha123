{{-- Figma 153:1974 (Frame 179) — 전역 푸터 --}}
@php
    $footerNav = [
        '서비스' => ['방문간호', '방문요양', '방문목욕', '비용 계산기'],
        '센터' => ['센터 소개', '커뮤니티', '오시는 길'],
        '지원' => ['무료 상담 신청', '채용·커리어', '공지사항', '자주 묻는 질문'],
    ];
    $legalLinks = ['이용약관', '개인정보처리방침', '사업자정보확인'];
@endphp

<footer class="w-full bg-surface-inverse">
    <div class="mx-auto flex max-w-content flex-col gap-7 px-6 py-20">
        <div class="flex flex-col items-start justify-between gap-12 lg:flex-row">
            <div class="flex flex-col items-start gap-[41px]">
                <div class="flex flex-col items-start gap-3">
                    <div class="flex flex-col items-start gap-1 tracking-[-0.6px]">
                        <p class="text-[19px] font-bold leading-[29px] text-surface">청담원 재가복지센터</p>
                        <p class="text-[15px] font-normal leading-[23px] text-white/70">
                            어르신 곁의 따뜻한 돌봄, 방문간호·방문요양 전문 재가복지센터
                        </p>
                    </div>
                    <div class="text-[14px] font-normal leading-5 tracking-[-0.2px] text-white/60">
                        <p>주식회사 청담원 · 대표 김경애 · 사업자등록번호 739-81-03399</p>
                        <p>서울특별시 서초구 효령로70길 36-9, 1층 101호 · 대표 1588-2091 · 평일 09:00–18:00</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    @foreach (['social-1', 'social-2'] as $social)
                        <a href="#"
                           class="flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5">
                            <img src="{{ asset("images/icons/{$social}.svg") }}" alt="" class="h-6 w-6">
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex items-start gap-16 text-[14px] leading-5 tracking-[-0.2px] xl:gap-[82px]">
                @foreach ($footerNav as $heading => $links)
                    <div class="flex flex-col items-start gap-3.5">
                        <p class="font-medium text-surface">{{ $heading }}</p>
                        @foreach ($links as $link)
                            <a href="#" class="font-normal text-white/65 hover:text-surface">{{ $link }}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col items-start justify-between gap-3 border-t border-white/15 pt-6 text-[14px] font-normal leading-5 tracking-[-0.2px] sm:flex-row sm:items-center">
            <p class="text-white/55">© {{ now()->year }} 청담원 재가복지센터. All rights reserved.</p>
            <div class="flex items-center gap-5 text-white/65">
                @foreach ($legalLinks as $link)
                    <a href="#" class="hover:text-surface">{{ $link }}</a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
