<?php

namespace App\Livewire\Support;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 비용·지원 > 장기요양등급 안내 페이지.
 *
 * 서비스 소개 페이지들과 같은 구조로, 서버 상태가 없는 정적 페이지다.
 * FAQ 아코디언은 Livewire 3에 번들된 Alpine으로만 동작한다.
 */
class LongTermCareGrade extends Component
{
    #[Title('장기요양등급 안내 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.support.long-term-care-grade');
    }
}
