<?php

namespace Fazanis\LaravelBlockBots\Http\Controllers;

use App\Http\Controllers\Controller;
use Fazanis\LaravelBlockBots\Models\BlockList;
use Fazanis\LaravelBlockBots\Models\Bot;

class BlackListController extends Controller
{
    public function index()
    {
        $list = BlockList::query()->get();
        $bots = Bot::query()->distinct()->where('isbot',true)->get();
        $array = BlockList::query()->pluck('name')->toArray();
        return view('bots::list',compact('list','bots','array'));
    }

    public function destroy($id)
    {
        BlockList::query()->find($id)->delete();
        return back();
    }
}
