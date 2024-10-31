<?php

namespace Fazanis\LaravelBlockBots\Models;

class SortableLink
{
    public static function render($param,$name=null)
    {

        $url = '';
        $i=0;
        $iter = '?';
        if(request()->query('filter')!=null){
            foreach (request()->query('filter') as $key=>$item){
                if ($i==0){
                    $iter = '?';
                }
                else{
                    $iter='&';
                }
                $url.= $iter.'filter['.$key.']='.$item;
                $i++;
            }
        }
        if ($name==null){$name = $param;}
        if(str(request()->query('sort'))->contains('-')){
            return '<a href="'.$url.$iter.'sort='.$param.'">'.$name.' <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>';
        }else{
            return '<a href="'.$url.$iter.'sort=-'.$param.'">'.$name.' <i class="fa fa-sort-amount" aria-hidden="true"></i></a>';
        }

    }
}
