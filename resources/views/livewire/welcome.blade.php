<div class="mx-auto max-w-2xl px-6 py-16">
    <h1 class="text-2xl font-bold tracking-tight">{{ config('app.name') }}</h1>
    <p class="mt-2 text-sm text-gray-500">스택 점검용 페이지입니다. 실제 기능 개발 시 삭제하세요.</p>

    <dl class="mt-8 grid grid-cols-2 gap-px overflow-hidden rounded-lg bg-gray-200 text-sm ring-1 ring-gray-200">
        @foreach ($this->stack() as $label => $value)
            <div class="bg-white px-4 py-3">
                <dt class="text-gray-500">{{ $label }}</dt>
                <dd class="mt-0.5 font-medium">{{ $value }}</dd>
            </div>
        @endforeach
    </dl>

    {{-- Livewire: 서버 왕복 --}}
    <div class="mt-8 rounded-lg border border-gray-200 bg-white p-4">
        <p class="text-sm font-medium">Livewire (서버 왕복)</p>
        <div class="mt-3 flex items-center gap-3">
            <button type="button" wire:click="increment"
                    class="rounded-md bg-gray-900 px-3 py-1.5 text-sm font-medium text-white hover:bg-gray-700">
                +1
            </button>
            <span class="text-sm text-gray-600">count = <span class="font-mono">{{ $count }}</span></span>
        </div>
    </div>

    {{-- Alpine: Livewire 3에 번들된 Alpine을 그대로 사용 (별도 설치 없음) --}}
    <div class="mt-4 rounded-lg border border-gray-200 bg-white p-4" x-data="{ open: false }">
        <p class="text-sm font-medium">Alpine.js (클라이언트 전용)</p>
        <button type="button" x-on:click="open = !open"
                class="mt-3 rounded-md border border-gray-300 px-3 py-1.5 text-sm font-medium hover:bg-gray-50">
            <span x-text="open ? '접기' : '펼치기'"></span>
        </button>
        <p x-show="open" x-cloak class="mt-3 text-sm text-gray-600">
            Alpine이 정상 동작합니다. 서버 요청 없이 토글됩니다.
        </p>
    </div>
</div>
