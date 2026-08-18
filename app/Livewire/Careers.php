<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 채용·커리어 페이지.
 *
 * 지금은 공고를 뷰에 하드코딩해 두고 Alpine 으로 클라이언트 필터만 한다.
 * 공고를 DB 로 옮기면 이 컴포넌트에 프로퍼티·서비스 호출을 붙이고
 * 필터링을 서버로 내린다. 상세: resources/views/components/careers/positions.blade.php
 */
class Careers extends Component
{
    #[Title('채용·커리어 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.careers');
    }
}
