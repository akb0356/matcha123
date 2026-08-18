<?php

namespace App\Livewire\Support;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 비용·지원 > 비용 계산기 페이지.
 *
 * 계산 로직은 없다. 칩·탭·스테퍼는 Alpine 으로 선택 상태만 바뀌고
 * 금액은 시안의 예시값에서 변하지 않는다. 상세는 계산기 패널 주석 참고.
 */
class CostCalculator extends Component
{
    #[Title('비용 계산기 | 청담원 재가복지센터')]
    public function render(): View
    {
        return view('livewire.support.cost-calculator');
    }
}
