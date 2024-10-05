<?php

namespace Fazanis\LaravelBlockBots\Http\Controllers;

use App\Http\Controllers\Controller;
use Fazanis\LaravelBlockBots\Models\BlockList;
use Fazanis\LaravelBlockBots\Models\Bot;
use Jenssegers\Agent\Agent;


class BotsController extends Controller
{
    public function index()
    {

        $bots = Bot::query()->paginate(30);
        return view('bots::index',[
            'bots'=>$bots
        ]);
    }


    public function block($bot)
    {
//        $bot = Bot::query()->find($bot);
        try {
            BlockList::query()->create(['name'=>$bot]);
        }catch (\Exception $e){

        }

//        $bot->update(['block'=>$bot->block==1?0:1]);
        return back();
    }

    public function trush()
    {
        Bot::query()->delete();
        return back();
    }
}
