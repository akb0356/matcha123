<?php

namespace App\Livewire\Services;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 방문목욕 서비스 소개 페이지.
 *
 * 방문간호·방문요양과 같은 구조로, 서버 상태가 없는 정적 소개 페이지다.
 * FAQ 아코디언과 후기 캐러셀은 Livewire 3에 번들된 Alpine으로만 동작한다.
 */
class VisitingBath extends Component
{
    #[Title('방문목욕 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.services.visiting-bath');
    }
}
