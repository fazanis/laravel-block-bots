<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container mt-5 mb-5">
    <div class="d-flex align-items-center">
        <!-- Форма с кнопкой -->
        <form class="d-flex" action="{{route('bots.trush')}}" method="post" onclick="return confirm('Вы уверенны?')">
            <button type="submit" class="btn btn-danger">Очистить</button>
        </form>

        <!-- Ссылка -->
        <a href="{{route('botsList.index')}}" class="btn btn-primary ms-3">Список ботов</a>
    </div>
</div>

<div>
    <form method="get" action="{{route('bots.index')}}">
        <select name="filter[botname]">
            <option></option>
            <option value="nobots" {{request('filter.botname')=='nobots' ? 'selected' : ''}}>Без ботов</option>
            @foreach($botname as $item)
            <option {{$item->name==request('filter.botname') ? 'selected' : ''}} value="{{$item->name}}">{{$item->name}}</option>
            @endforeach
        </select>
        <input type="checkbox" name="filter[captcha]"  {{request('filter.captcha')=='on' ? 'checked="checked"' : ''}}> Капча
        <input type="radio" name="filter[refer]" value="on"  {{request('filter.refer')=='on' ? 'checked="checked"' : ''}}> refer
        <input type="radio" name="filter[refer]" value="off" {{request('filter.refer')=='off' ? 'checked="checked"' : ''}}> no refer
        <input type="submit" class="btn btn-primary" value="Применить">
        <a href="{{route('bots.index')}}" class="btn btn-danger">Сбросить</a>
    </form>
</div>
<div class="table-responsive">
<table class="table">
    <thead>
        <th>
            <td>@sortablelink('id')</td>
            <td>ip Адрес</td>
            <td>Бот</td>
            <td>@sortablelink('count','Колличество просмотров')</td>
            <td>@sortablelink('refer','Откуда зашли')</td>
            <td>@sortablelink('captcha','Прохождение капчи')</td>
            <td>@sortablelink('created_at','Дата')</td>
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
            <td>{{$bot->created_at->format('d.m.Y H:i')}}</td>
            <td>
                <a href="{{route('bots.show',$bot)}}">Подробнее</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
{{$bots->links()}}

