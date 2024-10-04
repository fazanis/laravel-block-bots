<?php
use Illuminate\Support\Facades\Route;

Route::get(config('block-bots.admin_route').'/trush', [\Fazanis\LaravelBlockBots\Http\Controllers\BotsController::class,'trush'])->name('bots.trush');
Route::middleware('web')->post('/captcha',\Fazanis\LaravelBlockBots\Http\Controllers\CaptchaController::class)->name('send.captcha');
Route::resource(config('block-bots.admin_route').'/botsList', \Fazanis\LaravelBlockBots\Http\Controllers\BlackListController::class);//->name('bots.botlist');
Route::resource(config('block-bots.admin_route'), \Fazanis\LaravelBlockBots\Http\Controllers\BotsController::class);
Route::get(config('block-bots.admin_route').'/block/{bots}', [\Fazanis\LaravelBlockBots\Http\Controllers\BotsController::class,'block'])->name('bots.block');
//Route::get('/captcha',\Fazanis\LaravelBlockBots\Http\Controllers\CaptchaController::class)->name('captcha')->middleware('BotsMiddleware:true');;

