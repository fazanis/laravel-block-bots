<a href="{{route('bots.trush')}}" class="btn btn-danger" onclick="return confirm('Вы уверенны?')">Очистить</a>
<a href="{{route('botsList.index')}}" class="btn btn-primary">Список ботов</a>
<table class="table">
    <thead>
        <th>
            <td>id</td>
            <td>ip</td>
            <td>Бот</td>
            <td>count</td>
            <td>refer</td>
            <td>captcha</td>
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
        </tr>
    @endforeach
    </tbody>
</table>
{{$bots->links()}}

