<?php

namespace App\Livewire\Services;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 방문간호 서비스 소개 페이지.
 *
 * 정적 소개 페이지라 서버 상태가 없다. FAQ 아코디언과 후기 캐러셀은
 * Livewire 3에 번들된 Alpine으로만 동작하므로 서버 왕복이 발생하지 않는다.
 * 상담 신청 폼처럼 상태가 생기는 기능은 Service Layer를 거쳐 붙인다.
 */
class VisitingNursing extends Component
{
    #[Title('방문간호 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.services.visiting-nursing');
    }
}
