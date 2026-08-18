{{-- Figma 178:1739 (Frame 95) — 서비스 비교 --}}
@php
    $services = [
        [
            'tag' => '의료 전문',
            'tag_class' => 'bg-caution',
            'title' => '방문간호',
            'desc' => '의료적 처치·건강관리가 필요한 분',
            'spec' => [
                ['제공 인력', '간호인력'],
                ['주요 돌봄', '욕창·튜브·투약 등 의료 처치'],
                ['월 본인부담', '약 0~10만 원'],
            ],
            'href' => route('services.visiting-nursing'),
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
            'href' => route('services.visiting-care'),
        ],
        [
            // 시안(178:1788) 문구 그대로다. 방문목욕 페이지에서 복사된 흔적으로 보여
            // 메인에서는 뜻이 맞지 않는데, 임의로 바꾸지 않고 확인을 받는다. 확인 필요
            'tag' => '지금 보는 서비스',
            'tag_class' => 'bg-accent-light-blue',
            'title' => '방문목욕',
            'desc' => '혼자 목욕이 어려워 도움이 필요한 분',
            'spec' => [
                ['제공 인력', '요양보호사 2인'],
                ['주요 돌봄', '이동식 욕조·차량 방문 목욕'],
                ['월 본인부담', '약 0~6만 원'],
            ],
            'href' => route('services.visiting-bath'),
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <div class="flex flex-col items-center gap-[18px]">
            <h2 class="text-center text-eb52 text-label">청담원은 간호와 요양을 잇습니다</h2>
            <p class="text-center text-m20 text-label-alt">
                방문간호·방문요양·방문목욕까지, 어르신 상태에 꼭 맞는 재가 돌봄을 제공합니다.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($services as $service)
                {{--
                    호버하면 테두리가 primary 로 바뀐다. 두께는 평소에도 2px 로 두어
                    색만 바뀌게 했다(폭이 변하면 안쪽 내용이 밀린다).
                    예전에는 inset ring 을 겹쳤는데 ring 은 box-shadow 라서 걷어냈다.
                --}}
                <article class="group/svc flex h-full flex-col items-start rounded-md border-2 border-line-divider bg-surface p-8 shadow-card-lo transition-colors duration-200
                                hover:border-primary">
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

                    <div class="mt-auto w-full pt-6">
                        {{-- 카드 어디에 올려도 함께 primary 로 채워지고, 떼면 흰 버튼으로 돌아온다 --}}
                        <a href="{{ $service['href'] }}"
                           class="btn-hover flex h-12 w-full items-center justify-center rounded border border-line-divider bg-surface px-5 text-m16 text-label transition-colors duration-200
                                  group-hover/svc:border-primary group-hover/svc:bg-primary group-hover/svc:text-surface">
                            자세히 보기
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
