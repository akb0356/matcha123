<?php

namespace App\Livewire\Services;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 치매가족휴가제 서비스 소개 페이지.
 *
 * 다른 세 서비스 페이지와 같은 구조로, 서버 상태가 없는 정적 소개 페이지다.
 * FAQ 아코디언은 Livewire 3에 번들된 Alpine으로만 동작한다.
 */
class DementiaRespite extends Component
{
    #[Title('치매가족휴가제 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.services.dementia-respite');
    }
}
