<?php

namespace Fazanis\LaravelBlockBots\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockList extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function getColorAttrebute()
    {
        dd(1);
    }
}
