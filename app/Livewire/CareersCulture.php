<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 채용·커리어 > 청담원에서 일한다는 것.
 *
 * 채용 페이지(/careers)의 히어로 링크에서 들어오고, 이 페이지의 버튼 두 개는
 * 모두 채용 공고 목록으로 돌아간다. 서버 상태가 없는 정적 페이지다.
 */
class CareersCulture extends Component
{
    #[Title('청담원에서 일한다는 것 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.careers-culture');
    }
}
