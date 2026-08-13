<?php

use App\Livewire\Services\VisitingBath;
use App\Livewire\Services\VisitingCare;
use App\Livewire\Services\VisitingNursing;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);

// 서비스 소개 페이지. 치매가족휴가제는 준비 중이다.
Route::get('/services/visiting-nursing', VisitingNursing::class)->name('services.visiting-nursing');
Route::get('/services/visiting-care', VisitingCare::class)->name('services.visiting-care');
Route::get('/services/visiting-bath', VisitingBath::class)->name('services.visiting-bath');
