<?php

use App\Livewire\Services\DementiaRespite;
use App\Livewire\Services\VisitingBath;
use App\Livewire\Services\VisitingCare;
use App\Livewire\Services\VisitingNursing;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);

// 서비스 소개 페이지 4종. 헤더 드롭다운의 「서비스」 하위 메뉴와 같은 순서다.
Route::get('/services/visiting-nursing', VisitingNursing::class)->name('services.visiting-nursing');
Route::get('/services/visiting-care', VisitingCare::class)->name('services.visiting-care');
Route::get('/services/visiting-bath', VisitingBath::class)->name('services.visiting-bath');
Route::get('/services/dementia-respite', DementiaRespite::class)->name('services.dementia-respite');
