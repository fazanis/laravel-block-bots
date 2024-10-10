<a href="{{route('bots.trush')}}" class="btn btn-danger" onclick="return confirm('Вы уверенны?')">Очистить</a>
<a href="{{route('botsList.index')}}" class="btn btn-primary">Список ботов</a>

<div>
    <form method="get" action="{{route('bots.index')}}">
        <select name="botname">
            <option></option>
            @foreach($botname as $item)
            <option {{$item->name==request('botname') ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
        <input type="checkbox" name="captcha"  {{request('captcha')=='on' ? 'checked="checked"' : ''}}> Капча
        <input type="checkbox" name="refer"  {{request('refer')=='on' ? 'checked="checked"' : ''}}> refer
        <input type="submit" class="btn btn-primary" value="Применить">
        <a href="{{route('bots.index')}}" class="btn btn-danger">Сбросить</a>
    </form>
</div>
<table class="table">
    <thead>
        <th>
            <td>id</td>
            <td>ip</td>
            <td>Бот</td>
            <td>count</td>
            <td>refer</td>
            <td>captcha</td>
            <td></td>
        </th>
    </thead>
    <tbody>
    @foreach($bots as $bot)
        <tr>
            <td>{{$bot->id}}</td>
            <td>{{$bot->ip}}</td>
            <td>{{$bot->name}}</td>
            <td>{{$bot->count}}</td>
            <td>{{$bot->block}}</td>
            <td>{{$bot->refer}}</td>
            <td>{{$bot->captcha}}</td>
            <td>
                <a href="{{route('bots.show',$bot)}}">Подробнее</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$bots->links()}}

