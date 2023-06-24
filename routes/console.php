<?php

// use Illuminate\Foundation\Inspiring;
use Illuminate\Foundation\Quotetest;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('quotes', function () {
    $this->comment(Quotetest::quote());
})->purpose('Display an inspiring quote');
