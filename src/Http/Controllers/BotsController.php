<?php

namespace Fazanis\LaravelBlockBots\Http\Controllers;

use App\Http\Controllers\Controller;
use Fazanis\LaravelBlockBots\Models\BlockList;
use Fazanis\LaravelBlockBots\Models\Bot;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


class BotsController extends Controller
{
    public function index()
    {

        $bots = Bot::query()
            ->when(\request('botname'),function(Builder $q){
                $q->where('name',\request('botname'));
            })
            ->when(\request('captcha'),function(Builder $q){
                $q->where('captcha',1);
            })
            ->when(\request('refer'),function(Builder $q){
                $q->whereNotNull('refer');
            })
            ->simplePaginate(30)->withPath(url()->full());
        $botname = Bot::query()
            ->select('name')
            ->where('isbot',true)->groupBy('name')->get();
        return view('bots::index',[
            'bots'=>$bots,
            'botname'=>$botname
        ]);
    }


    public function show($bot)
    {
        return view('bots::show',[
            'bot'=>Bot::query()->where('id',$bot)->first()
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
