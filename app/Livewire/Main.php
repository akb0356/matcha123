<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

/**
 * 메인 페이지.
 *
 * 서비스 소개 페이지들과 같은 구조로, 서버 상태가 없는 정적 페이지다.
 * 카드 호버·탭 전환은 Livewire 3에 번들된 Alpine으로만 동작하고,
 * 숫자 카운트업과 섹션 스크롤 진입은 resources/js/app.js 가 처리한다.
 */
class Main extends Component
{
    #[Title('청담원 재가복지센터 | 재가복지서비스부터 운영 플랫폼까지')]
    public function render(): View
    {
        return view('livewire.main');
    }
}
