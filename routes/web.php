<?php

use App\Livewire\Services\VisitingNursing;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);

Route::get('/services/visiting-nursing', VisitingNursing::class)->name('services.visiting-nursing');
