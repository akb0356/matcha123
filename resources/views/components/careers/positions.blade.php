{{-- Figma 180:2493 (Frame 203) — 지금 모집 중인 포지션 --}}
@php
    /*
     * 확인 필요: 공고 데이터는 시안(180:2249)에 그려진 한 건을 그대로 하드코딩한 것이다.
     * 실제로는 DB(또는 청담원 플랫폼 구인구직)에서 받아와야 하며, 그때 이 배열을
     * Livewire 프로퍼티로 옮기고 서버에서 필터링한다.
     *
     * 「상세보기」·「지원하기」는 연결할 페이지가 아직 없어 # 이다.
     *
     * 필터·검색은 지금 있는 목록 안에서 실제로 동작한다(클라이언트 필터).
     * 공고가 늘어나도 그대로 쓰이고, 조건에 맞는 게 없으면 빈 상태를 보여준다.
     */
    $jobs = [
        [
            'category' => '방문간호',
            'type' => '파트타임',
            'region' => '부산 기장군',
            'title' => '기장군 방문간호 간호사 모집',
            'schedule' => '주 1회 · 회당 1시간',
            'pay' => '방문당 40,000원',
        ],
    ];

    // 셀렉트 항목은 공고에서 뽑는다. 값이 늘면 자동으로 따라온다.
    $categories = array_values(array_unique(array_column($jobs, 'category')));
    $types = array_values(array_unique(array_column($jobs, 'type')));
    $regions = array_values(array_unique(array_column($jobs, 'region')));

    $selectClass = 'h-12 rounded-md border border-line-divider bg-surface px-3 text-m16 text-label'
        . ' appearance-none bg-no-repeat pr-9 transition-colors hover:bg-surface-alt'
        . ' focus:border-primary focus:outline-none';
    $selectStyle = "background-image: url('" . asset('images/icons/chevron-down.svg') . "');"
        . ' background-position: right 12px center; background-size: 16px 11.75px;';
@endphp

<section id="positions" class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-7 px-6 py-[120px]"
         x-data="{
             category: '',
             type: '',
             region: '',
             query: '',
             match(job) {
                 if (this.category && job.category !== this.category) return false;
                 if (this.type && job.type !== this.type) return false;
                 if (this.region && job.region !== this.region) return false;
                 if (! this.query.trim()) return true;
                 const q = this.query.trim().toLowerCase();
                 return [job.title, job.category, job.region, job.schedule].join(' ').toLowerCase().includes(q);
             },
             get shown() { return this.jobs.filter((j) => this.match(j)).length; },
             jobs: @js($jobs),
         }">

        <h2 class="w-full text-eb30 text-label">지금 모집 중인 포지션</h2>

        {{-- 필터 (180:2226) --}}
        <div class="flex w-full flex-col items-stretch justify-between gap-3 lg:flex-row lg:items-center">
            <div class="flex flex-wrap items-center gap-2">
                <select x-model="category" aria-label="직군 선택"
                        class="{{ $selectClass }}" style="{{ $selectStyle }}">
                    <option value="">전체 직군 ({{ count($categories) }})</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c }}">{{ $c }}</option>
                    @endforeach
                </select>

                <select x-model="type" aria-label="고용 형태 선택"
                        class="{{ $selectClass }}" style="{{ $selectStyle }}">
                    <option value="">전체 고용 형태</option>
                    @foreach ($types as $t)
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>

                <select x-model="region" aria-label="지역 선택"
                        class="{{ $selectClass }}" style="{{ $selectStyle }}">
                    <option value="">전체 지역</option>
                    @foreach ($regions as $r)
                        <option value="{{ $r }}">{{ $r }}</option>
                    @endforeach
                </select>
            </div>

            {{-- 검색 (180:2243) --}}
            <label class="flex h-12 w-full items-center gap-2 rounded-md border border-line-divider bg-surface pl-3.5 pr-4 focus-within:border-primary lg:w-[260px]">
                <img src="{{ asset('images/icons/search.svg') }}" alt="" class="h-5 w-5 shrink-0">
                <input type="search" x-model="query" placeholder="채용공고 검색"
                       aria-label="채용공고 검색"
                       class="h-full w-full border-0 bg-transparent p-0 text-m16 text-label placeholder:text-label-assistive focus:outline-none focus:ring-0">
            </label>
        </div>

        {{-- 공고 목록 (180:2248). 시안은 516px 카드 1장이라 2열 그리드의 한 칸이다. --}}
        <div class="grid w-full grid-cols-1 items-stretch gap-4 lg:grid-cols-2">
            @foreach ($jobs as $i => $job)
                <article x-show="match(jobs[{{ $i }}])"
                         x-data="{ saved: false }"
                         class="flex min-h-[299px] flex-col items-start rounded-md border border-line-neutral bg-surface p-6">
                    <div class="flex w-full items-center justify-between gap-3">
                        {{-- 시안 배지색은 info(#005eeb) 8% 틴트다 --}}
                        <span class="flex h-8 items-center justify-center rounded-md bg-info/[0.08] px-2 text-m14 text-info">
                            {{ $job['category'] }}
                        </span>
                        <span class="text-m14 text-label-alt">{{ $job['type'] }}</span>
                    </div>

                    <p class="mt-3.5 w-full text-b24 text-label">{{ $job['title'] }}</p>

                    <dl class="mt-4 flex w-full flex-col items-start gap-2.5">
                        @foreach ([
                            // 아이콘은 18px 정사각 프레임 안에 고유 비율(w x 18)로 넣는다
                            ['careers-job-place', '근무 지역', $job['region'], '15.08px'],
                            ['careers-job-time', '근무 일정', $job['schedule'], '18px'],
                            ['careers-job-pay', '급여', $job['pay'], '15.87px'],
                        ] as [$icon, $label, $value, $iconW])
                            <div class="flex items-center gap-2">
                                <span class="flex h-[18px] w-[18px] shrink-0 items-center justify-center">
                                    <img src="{{ asset("images/icons/{$icon}.svg") }}" alt="" class="h-[18px]" style="width: {{ $iconW }}">
                                </span>
                                <dt class="sr-only">{{ $label }}</dt>
                                <dd class="text-m16 text-label-neutral">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    <div class="mt-auto flex w-full items-center gap-2 pt-6">
                        {{-- 저장은 화면에서만 표시된다. 서버에 남기려면 로그인·저장 API 가 필요하다. --}}
                        <button type="button" x-on:click="saved = !saved"
                                x-bind:aria-pressed="saved"
                                x-bind:aria-label="saved ? '저장 취소' : '공고 저장'"
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded border transition-colors"
                                x-bind:class="saved ? 'border-primary bg-primary-surface' : 'border-line-divider bg-surface hover:bg-surface-alt'">
                            {{-- 고유 14.36x18 --}}
                            <img src="{{ asset('images/icons/careers-bookmark.svg') }}" alt=""
                                 class="h-[18px] w-[14.36px]">
                        </button>

                        <a href="#"
                           class="btn-lift flex h-10 flex-1 items-center justify-center rounded border border-line-divider bg-surface text-m16 text-label hover:bg-surface-alt">
                            상세보기
                        </a>
                        <a href="#"
                           class="btn-lift flex h-10 flex-1 items-center justify-center rounded bg-primary text-m16 text-surface hover:brightness-95">
                            지원하기
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- 조건에 맞는 공고가 없을 때 --}}
        <div x-show="shown === 0" x-cloak
             class="flex w-full flex-col items-center gap-2 rounded-md border border-line-divider bg-surface-alt px-6 py-16 text-center">
            <p class="text-b20 text-label">조건에 맞는 공고가 없어요</p>
            <p class="text-r16 text-label-alt">필터를 바꾸거나 검색어를 지워 보세요.</p>
        </div>
    </div>
</section>
