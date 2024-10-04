<?php

namespace Fazanis\LaravelBlockBots\Http\Controllers;

use App\Http\Controllers\Controller;
use Fazanis\LaravelBlockBots\BlockBotManager;
use Fazanis\LaravelBlockBots\Models\Bot;
use  \Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function __invoke(Request $request)
    {
        $userAgent = strtolower($request->header('user-agent'));
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);

        if ($validator->fails()) {
            return back();
        } else {
            $r = Bot::query()->where('ip',\request()->ip())->update(['captcha'=>false,'count'=>0]);
            return back();
        }

    }
}
