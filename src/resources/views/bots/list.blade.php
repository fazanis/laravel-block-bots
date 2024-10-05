<a href="{{route('bots.index')}}" class="btn btn-warning">Назад</a>
Все боты

<table class="table">
    <thead>
        <th>
            <td>id</td>
            <td>name</td>
            <td>Действия</td>
        </th>
    </thead>
    <tbody>
    @foreach($bots as $bot)
        <tr>
            <td>{{$bot->id}}</td>
            <td><span style="background: {{in_array($bot->name,$array) ? 'red' : 'green'}}"> {{$bot->name}}</span></td>
            <td>
                <a href="{{route('bots.block',$bot->name)}}" class="btn btn-primary" style="{{in_array($bot->name,$array) ? 'display:none' : 'display:inline'}}"
                   onclick="return confirm('Вы уверенны?')"
                >Заблокировать</a>
{{--                <a href="" class="btn btn-primary" >Удалить</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Заблокированные боты
<table class="table">
    <thead>
        <th>
            <td>id</td>
            <td>name</td>
            <td>Действия</td>
        </th>
    </thead>
    <tbody>
    @foreach($list as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                <form method="post" action="{{route('botsList.destroy',$item)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Удалить">
                </form>
{{--                <a href="" class="btn btn-primary" >Удалить</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{--{{$bots->link()}}--}}

