<?php

namespace Fazanis\LaravelBlockBots;

use Fazanis\LaravelBlockBots\Models\BlockList;
use Fazanis\LaravelBlockBots\Models\Bot;
use Jenssegers\Agent\Agent;
use function Sodium\increment;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
class BlockBotManager extends Bot
{

    private $agent;
    private $userAgent;
    private $bot;
    private $render;
    private $botlist;
    public function __construct()
    {
        $this->agent = new Agent();
        $this->userAgent = strtolower(request()->header('User-Agent'));
        $this->botlist = BlockList::query()->pluck('name')->toArray();
    }

    public function create()
    {
        $name = $this->agent->robot() ? $this->agent->robot() : $this->userAgent;
        $bot = Bot::query()->where('ip',request()->ip())->where('name',$name)->first();
        $data=[
            'name'=>$name,
            'ip'=>request()->ip(),
            'refer'=>request()->server('HTTP_REFERER'),
            'agent'=>$this->userAgent,
            'captcha'=>$this->isCaptcha(),
            'isbot'=>$this->agent->robot() ? true : false
//        ]);
        ];
        if ($bot){
            $updateData = collect($data)->except(['refer'])->toArray();
            $bot->update($updateData);
            $this->bot=$bot->fresh();
        }else{
            $this->bot=Bot::query()->create($data);
        }
    }

    private function isCaptcha()
    {
        if($this->agent->robot()){
            return false;
        }
        if(isset($bot->captcha) && $bot->captcha==0) {
          return false;
        }
        if (request()->server('HTTP_REFERER')!=null){
            return false;
        }
        return true;
    }

    public function counts()
    {
        $this->bot->increment('count');
    }
    public function isBlock()
    {

        if(in_array($this->agent->robot(),$this->botlist)){
            $this->render='403';
            return true;
        }
        if($this->bot->block==1){
            $this->render='403';
            return true;
        }
        if(request()->server('HTTP_REFERER')==null && $this->bot->captcha==1){
            $this->render='captcha';
            return true;
        }
        if($this->bot->captcha==1){
            $this->render='captcha';
            return true;
        }
        if ($this->bot->count>=20 && $this->bot->isbot==0){
            $this->render='captcha';
            return true;
        }

    }

    public function render()
    {
        if ($this->render=='captcha'){
            return response()->view('bots::captcha');
        }else{
            return response('Access denied for bots', 403);
        }
    }
    public function isBot()
    {
        if($this->agent->robot()){
            return false;
        };
//        if ($this->bot->)
    }

}
