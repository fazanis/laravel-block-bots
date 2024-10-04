<?php

namespace Fazanis\LaravelBlockBots\Http\Middleware;

use Closure;

use Fazanis\LaravelBlockBots\BlockBotManager;
use Fazanis\LaravelBlockBots\BlockBots;
use Illuminate\Http\Request;



class BotsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private $bots;
    public function __construct(BlockBotManager $blockBotManager)
    {
        $this->bots = $blockBotManager;
    }

    public function handle(Request $request, Closure $next)
    {
        if (config('block-bots.on')===true){
            $this->bots->create();
            if ($this->bots->isBlock()) {
                return $this->bots->render();
            }
            $this->bots->counts();
        }

        return $next($request);
    }
}
