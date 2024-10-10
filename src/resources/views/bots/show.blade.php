<a href="{{route('bots.index')}}" class="btn btn-warning">Назад</a>
<table class="table">

        <tr>
            <td>id</td><td>{{$bot->id}}</td>
        </tr>
        <tr>
            <td>ip</td><td>{{$bot->ip}}</td>
        </tr>
        <tr>
            <td>Бот</td><td>{{$bot->name}}</td>
        </tr>
        <tr>
            <td>user-agent</td><td>{{$bot->agent}}</td>
        </tr>
        <tr>
            <td>count</td><td>{{$bot->count}}</td>
        </tr>
        <tr>
            <td>refer</td><td>{{$bot->refer}}</td>
        </tr>
        <tr>
            <td>captcha</td><td>{{$bot->captcha}}</td>
        </tr>

</table>


