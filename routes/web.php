<?php

use App\Livewire\Main;
use App\Livewire\Services\DementiaRespite;
use App\Livewire\Services\Platform;
use App\Livewire\Services\VisitingBath;
use App\Livewire\Services\VisitingCare;
use App\Livewire\Services\VisitingNursing;
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
