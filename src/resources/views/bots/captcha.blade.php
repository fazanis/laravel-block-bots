
<div style="text-align: center;">
    <h2>Подтвердите что вы не бот</h2>
<form method="post" action="{{route('send.captcha')}}" >
@csrf
<p>{!! captcha_img('math',['width'=>280]) !!} </p>
<p><input type="text" name="captcha"></p>
<p><button type="submit" name="check">Отправить</button></p>
</form>
</div>
