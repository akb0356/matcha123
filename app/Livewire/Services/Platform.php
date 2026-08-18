<?php

namespace App\Livewire\Services;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 서비스 > 청담원 플랫폼 소개 페이지.
 *
 * 다른 서비스 페이지와 같은 구조로, 서버 상태가 없는 정적 페이지다.
 * FAQ 아코디언은 Livewire 3에 번들된 Alpine으로만 동작한다.
 */
class Platform extends Component
{
    #[Title('청담원 플랫폼 | 센터 운영 통합 관리')]
    public function render(): View
    {
        return view('livewire.services.platform');
    }
}
