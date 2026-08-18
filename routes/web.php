<?php

use App\Livewire\Careers;
use App\Livewire\CareersCulture;
use App\Livewire\Main;
use App\Livewire\Services\DementiaRespite;
use App\Livewire\Services\Platform;
use App\Livewire\Services\VisitingBath;
use App\Livewire\Services\VisitingCare;
use App\Livewire\Services\VisitingNursing;
use App\Livewire\Support\Copayment;
use App\Livewire\Support\CostCalculator;
use App\Livewire\Support\LongTermCareGrade;
use Illuminate\Support\Facades\Route;

// 메인 페이지. 헤더 로고가 이 주소를 가리킨다.
Route::get('/', Main::class)->name('main');

// 서비스 소개 페이지 5종. 헤더 드롭다운의 「서비스」 하위 메뉴와 같은 순서다.
Route::get('/services/visiting-nursing', VisitingNursing::class)->name('services.visiting-nursing');
Route::get('/services/visiting-care', VisitingCare::class)->name('services.visiting-care');
Route::get('/services/visiting-bath', VisitingBath::class)->name('services.visiting-bath');
Route::get('/services/dementia-respite', DementiaRespite::class)->name('services.dementia-respite');
Route::get('/services/platform', Platform::class)->name('services.platform');

// 비용·지원. 헤더 드롭다운의 「비용·지원」 하위 메뉴다.
Route::get('/support/long-term-care-grade', LongTermCareGrade::class)->name('support.long-term-care-grade');
Route::get('/support/copayment', Copayment::class)->name('support.copayment');
Route::get('/support/cost-calculator', CostCalculator::class)->name('support.cost-calculator');

// 채용·커리어. 헤더 상단 메뉴에서 바로 연결된다(하위 메뉴 없음).
Route::get('/careers', Careers::class)->name('careers');
Route::get('/careers/culture', CareersCulture::class)->name('careers.culture');
