<?php

namespace App\Livewire\Support;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 비용·지원 > 본인부담금 안내 페이지.
 *
 * 서버 상태가 없는 정적 페이지다. FAQ 아코디언만 Livewire 3 번들 Alpine으로 동작한다.
 */
class Copayment extends Component
{
    #[Title('본인부담금 안내 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.support.copayment');
    }
}
