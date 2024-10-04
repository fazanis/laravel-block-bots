# install

>composer require fazanis/laravel-block-bots

>php artisan vendor:publish --provider="Fazanis\LaravelBlockBots\Providers\LaravelBlockBotsServiceProvider"

>php artisan migrate

## Usage

add middelware from route **bot_block**

>Route::middleware('bot_block')->group(function () {
/**/
});

add from admin menu route
>{{route('bots.index')}}

add .env
>BOTS_ON=true

clear client list (recomended)
>$schedule->command('delelte:list')->daily();
