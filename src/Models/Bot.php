<?php

namespace Fazanis\LaravelBlockBots\Models;

use Fazanis\LaravelBlockBots\BlockBotManager;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'ip',
        'refer',
        'count',
        'block',
        'captcha',
        'isbot',
        'agent'
    ];

    public function getButtonAttribute()
    {
        return $this->block==1 ? 'Разблокировать' : 'Заблокировать';
    }
    public function getButtonColorAttribute()
    {
        return $this->block==1 ? 'background: red' : 'background: green'.';color:white';
    }


}
