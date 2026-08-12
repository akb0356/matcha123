{{-- Figma 153:1847 (Frame 128) — 서비스 비교 --}}
@php
    $services = [
        [
            'tag' => '지금 보는 서비스',
            'tag_class' => 'bg-caution',
            'title' => '방문간호',
            'desc' => '의료적 처치·건강관리가 필요한 분',
            'spec' => [
                ['제공 인력', '간호인력'],
                ['주요 돌봄', '욕창·튜브·투약 등 의료 처치'],
                ['월 본인부담', '약 0~10만 원'],
            ],
            'cta' => '상담 신청',
            'cta_class' => 'bg-caution text-surface',
            'card_class' => 'border-2 border-caution shadow-card-hi',
            'current' => true,
        ],
        [
            'tag' => '일상 지원',
            'tag_class' => 'bg-accent-violet',
            'title' => '방문요양',
            'desc' => '식사·이동 등 일상 지원이 필요한 분',
            'spec' => [
                ['제공 인력', '요양보호사'],
                ['주요 돌봄', '식사·세면·이동·말벗'],
                ['월 본인부담', '약 0~10만 원'],
            ],
            'cta' => '자세히 보기',
            'cta_class' => 'border border-line-divider bg-surface text-label',
            'card_class' => 'shadow-card-lo',
            'current' => false,
        ],
        [
            'tag' => '목욕 전문',
            'tag_class' => 'bg-accent-light-blue',
            'title' => '방문목욕',
            'desc' => '혼자 목욕이 어려워 도움이 필요한 분',
            'spec' => [
                ['제공 인력', '요양보호사 2인'],
                ['주요 돌봄', '이동식 욕조·차량 방문 목욕'],
                ['월 본인부담', '약 0~6만 원'],
            ],
            'cta' => '자세히 보기',
            'cta_class' => 'border border-line-divider bg-surface text-label',
            'card_class' => 'shadow-card-lo',
            'current' => false,
        ],
    ];
@endphp

<section class="w-full bg-fill-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-[95px] px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">어떤 돌봄이 맞을까요?</h2>
            <p class="text-m20 text-label-alt">
                어르신 상태와 가족 상황에 따라 알맞은 서비스가 달라요. 핵심만 비교하고 골라보세요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($services as $service)
                <article @class([
                    'flex h-full flex-col items-start rounded-md bg-surface p-8',
                    $service['card_class'],
                ])
                    @if ($service['current']) aria-current="page" @endif>

                    <span class="flex h-[30px] items-center justify-center rounded-md px-2 text-b14 text-surface {{ $service['tag_class'] }}">
                        {{ $service['tag'] }}
                    </span>

                    <p class="mt-4 text-b24 text-label">{{ $service['title'] }}</p>
                    <p class="mt-2 w-full text-m20 text-label-alt">{{ $service['desc'] }}</p>

                    <dl class="mt-5 flex w-full flex-col items-start border-t border-surface-alt">
                        @foreach ($service['spec'] as $i => [$label, $value])
                            <div class="flex w-full items-center justify-between gap-3 py-3.5 {{ $i > 0 ? 'border-t border-surface-alt' : '' }}">
                                <dt class="text-r16 text-label-assistive">{{ $label }}</dt>
                                <dd class="text-right text-m16 text-label">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    {{-- Figma의 「gap 24」 스페이서 + 카드 하단 정렬 --}}
                    <div class="mt-auto w-full pt-6">
                        <a href="#"
                           class="flex h-12 w-full items-center justify-center rounded px-5 text-m16 {{ $service['cta_class'] }}">
                            {{ $service['cta'] }}
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
