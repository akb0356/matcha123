{{-- Figma 156:4373 (Frame 211) — 신청부터 등급 판정까지 4단계 --}}
@php
    /* 확인 필요: 절차·소요기간(30일 이내)은 공단 규정 대조 전이다. 시안 문구 그대로다. */
    $steps = [
        ['신청서 제출', '공단 지사 방문·우편·팩스 또는 온라인으로 장기요양인정 신청서를 제출합니다.'],
        ['방문 조사', '공단 직원이 댁을 방문해 어르신의 심신 상태(생활 기능 등)를 조사합니다.'],
        ['등급 판정', '의사소견서와 조사 결과를 바탕으로 등급판정위원회가 등급을 결정합니다.'],
        ['인정서 수령', '등급이 확정되면 장기요양인정서와 이용계획서를 받아 서비스를 시작할 수 있어요.'],
    ];
@endphp

<section id="steps" class="w-full bg-primary">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[813px] flex-col items-start gap-3">
            <h2 class="text-eb40 text-surface">신청부터 등급 판정까지, 4단계</h2>
            <p class="text-m20 text-white/70">
                보통 신청 후 30일 이내에 결과를 받아볼 수 있어요. 복잡한 절차는 청담원이 함께 챙겨드립니다.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
            @foreach ($steps as $i => [$title, $desc])
                <div class="flex flex-col items-start rounded-md border border-white/10 bg-white/5 p-7">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary text-b16 text-surface">
                        {{ $i + 1 }}
                    </span>
                    <p class="mt-4 w-full text-b24 text-surface">{{ $title }}</p>
                    <p class="mt-2 w-full text-r20 text-white/70">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
