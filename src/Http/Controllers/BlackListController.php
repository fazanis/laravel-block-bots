<?php

namespace Fazanis\LaravelBlockBots\Http\Controllers;

use App\Http\Controllers\Controller;
use Fazanis\LaravelBlockBots\Models\BlockList;
use Fazanis\LaravelBlockBots\Models\Bot;
use Illuminate\Support\Facades\DB;

class BlackListController extends Controller
{
    public function index()
    {
        $list = BlockList::query()->get();
        $bots = Bot::query()
            ->select('name')
            ->where('isbot',true)->groupBy('name')->get();
        $array = BlockList::query()->pluck('name')->toArray();
        return view('bots::list',compact('list','bots','array'));
    }

    public function destroy($id)
    {
        BlockList::query()->find($id)->delete();
        return back();
    }
}
