<html>
<head>
<style>
body{
    margin:  0 auto;
    font-family: sans-serif;
    font-size: 14px;
}
.wrapper{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.blocks{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.line{
    width: 100%;
    box-sizing: border-box;
    border-bottom: 1px solid #ccc;
    display: flex;
}
.line div{
    padding: 10px;
}
.title{
    display: flex;
    justify-content: space-between;
    width: 40%;
}
.data{
    display: flex;
    justify-content: space-between;
    width: 60%;
}
.data-not-form{
    display: flex;
}
.data-form{
    display:none;
}
.button-block{
    border:  none;
    margin-top: 20px;
}
/*.button-block div{
    display: flex;
    justify-content: space-between;
    width: 50%;
}*/
.button1{
    text-align:left;
}
.button2{
    text-align:right;
    /*align-items: flex-end*/
    margin-left: auto;
    /*justify-content:flex-end;*/
}
input, textarea, select{
    width: 100%;
    box-sizing: border-box;
}
select{
    background: #fff;
}
[type=checkbox],
[type=radio]{
    display: inline-block;
    width: auto;
}
label{
    display: block;
}
.dwn,
.send-request,
.edit-btn{
    display:inline;
    background: #fc6b40;
    padding: 5px;
    color: #fff;
    font-family: "Helvetica Neue", Helvetica, helvetica, Arial, sans-serif;
    text-decoration: none;
    cursor:pointer;
}
.cancel-btn,
.submit-btn{
    display:none;
}

.submit-btn{
    background: #55bc4f;
    padding: 5px;
    color: #fff;
    font-family: "Helvetica Neue", Helvetica, helvetica, Arial, sans-serif;
    text-decoration: none;
    cursor: pointer;
}
.cancel-btn{
    background: #fc6b40;
    padding: 5px;
    color: #fff;
    font-family: "Helvetica Neue", Helvetica, helvetica, Arial, sans-serif;
    text-decoration: none;
    margin-right: 10px;
}
.updated{
    background: #66ff00;
    margin: 10px;
    padding: 10px;
    border:  solid 1px #439240;
}
</style>
</head>
<body>
@if($firm->updated)
<div class="updated">
Данные успешно обновлены
</div>
@endif
<form method="POST" action="/firm/{{$firm->id}}">
    @csrf
    <input type="hidden" name="id" value="{{$firm->id}}"/>
<div class="wrapper">
    <div class="blocks">  
            <div class="line">
                <div class="title">ID</div>
                <div class="data">{{$firm->id}}</div>
            </div>
            <div class="line">
                <div class="title">Название</div>
                <div class="data">{{$firm->name}}</div>
            </div>
            @if(Auth::user()->id != 273)
            @if(Auth::user()->role_id == 1)
            <div class="line">
                <div class="title">Email</div>
                <div class="data data-not-form">{{$firm->email}}</div>
                <div class="data data-form">
                    <input type="email" name="email" value="{{$firm->email}}" />
                </div>
            </div>
            @endif
            <div class="line">
                <div class="title">Описание</div>
                <div class="data data-not-form">{{$firm->descr}}</div>
                <div class="data data-form">
                    <textarea name="descr">{{$firm->descr}}</textarea>
                </div>
            </div>
            <div class="line">
                <div class="title">Контактное лицо</div>
                <div class="data data-not-form">{{$firm->contact_user}}</div>
                <div class="data data-form">
                     <textarea name="contact_user">{{$firm->contact_user}}</textarea>
                </div>
            </div>
            @endif
            <div class="line">
                <div class="title">Коментарий</div>
                <div class="data data-not-form">{{$firm->comment}}</div>
                <div class="data data-form">
                     <textarea name="comment">{{$firm->comment}}</textarea>
                </div>
            </div>
            @if(Auth::user()->role_id == 1)
            <div class="line">
                <div class="title">Ссылка на файл</div>
                <div class="data">{{$firm->link}}</div>
            </div>
            @endif
            @if(Auth::user()->role_id == 1)
            <div class="line">
                <div class="title">Дни отправки запроса</div>
                <div class="data data-not-form">{{$firm->send_days}}</div>
                <div class="data data-form">
                    <label><input type="checkbox" name="send_days[]" value="Mon" @if(in_array("Mon",$firm->sd)) checked @endif /> Понедельник</label>
                    <label><input type="checkbox" name="send_days[]" value="Tue" @if(in_array("Tue",$firm->sd)) checked @endif /> Вторник</label>
                    <label><input type="checkbox" name="send_days[]" value="Wed" @if(in_array("Wed",$firm->sd)) checked @endif /> Среда</label>
                    <label><input type="checkbox" name="send_days[]" value="Thu" @if(in_array("Thu",$firm->sd)) checked @endif /> Четверг</label>
                    <label><input type="checkbox" name="send_days[]" value="Fri" @if(in_array("Fri",$firm->sd)) checked @endif /> Пятница</label>
                    <label><input type="checkbox" name="send_days[]" value="Sat" @if(in_array("Sat",$firm->sd)) checked @endif /> Суббота</label>
                    <label><input type="checkbox" name="send_days[]" value="Sun" @if(in_array("Sun",$firm->sd)) checked @endif /> Воскресенье</label>
                </div>
            </div>
            <div class="line">
                <div class="title">Частота отправки запросов</div>
                <div class="data data-not-form">{{$firm->send_week}}</div>
                <div class="data data-form">
                    <select name="send_week">
                        <option value="1" @if($firm->send_week == '1') selected @endif  >Каждую неделю</option>
                        <option value="2" @if($firm->send_week == '2') selected @endif >Раз в две недели</option>
                        <option value="3" @if($firm->send_week == '3') selected @endif >Раз в три недели</option>
                        <option value="4" @if($firm->send_week == '4') selected @endif >Раз в четыре недели</option>
                    </select>
                </div>
            </div>
            @endif
            @if(Auth::user()->role_id == 2)
            <div class="line">
                <div class="title">Дни отправки запроса</div>
                <div class="data">{{$firm->send_days}}</div>
            </div>
            <div class="line">
                <div class="title">Частота отправки запросов</div>
                <div class="data">{{$firm->send_week}}</div>
            </div>
            @endif
            <div class="line">
                <div class="title">Дата последнего запроса</div>
                <div class="data">{{ $firm->last_send }}</div>
            </div>
            <div class="line">
                <div class="title">Дата следующего запроса</div>
                <div class="data">{{ $firm->next_date }}</div>
            </div>
            <div class="line">
                <div class="title">Последнее обновление</div>
                <div class="data">
                    {{ $firm->last_upd }}
                    @if($firm->last_send != date('d.m.Y'))
                    <a data-href="/manager/suppliers/send-request/{{$firm->id}}" class="send-request">Отправить запрос</a>
                    @endif
                </div>
            </div>
            <div class="line">
                <div class="title">Последние обновление от</div>
                <div class="data">
                    {{ $firm->upd_who }}
                </div>
            </div>
            @if(Auth::user()->role_id == 1)
            <div class="line">
                <div class="title">Скрывать цену</div>
                <div class="data data-not-form">{{ $firm->hidden_price }}</div>
                <div class="data data-form">
                    <label>
                        <input type="radio" name="hidden_price" value="1" @if($firm->hidden_price == 'Да') checked @endif /> Да
                    </label>
                    <label>
                        <input type="radio" name="hidden_price" value="0" @if($firm->hidden_price == 'Нет') checked @endif /> Нет
                    </label>
                </div>
            </div>
            @endif
            @if(Auth::user()->role_id == 2)
            <div class="line">
                <div class="title">Скрывать цену</div>
                <div class="data">{{ $firm->hidden_price }}</div>
            </div>
            @endif
            @if(Auth::user()->role_id == 1)
            <div class="line">
                <div class="title">Участвует в аналитике</div>
                <div class="data data-not-form">{{ $firm->hidden_price }}</div>
                <div class="data data-form">
                    <label>
                        <input type="radio" name="in_occupancy" value="1" @if($firm->in_occupancy == '1') checked @endif /> Да
                    </label>
                    <label>
                        <input type="radio" name="in_occupancy" value="0" @if($firm->in_occupancy == '0') checked @endif /> Нет
                    </label>
                </div>
            </div>
            @endif
        <div class="line button-block">
            <div class="button1">
                <a href="{{ $firm->dwn }}" class="dwn">
                    Скачать последнюю сетку
                </a>
            </div>
            <div class="button2">
                <a href="#" class="edit-btn">
                    Редактировать
                </a>
                <a href="#" class="cancel-btn">
                    Отмена
                </a>
                <a href="#" class="submit-btn">
                    Сохранить
                </a>
            </div>
        </div>
    </div>
</div>
</form>
</body>
<script>
var edit = document.querySelector('.edit-btn');
var cancel = document.querySelector('.cancel-btn');
var submit = document.querySelector('.submit-btn');
let sendRequest = document.querySelector('.send-request');
edit.addEventListener('click', e => {
    e.target.style.display = 'none';
    cancel.style.display = 'inline';
    submit.style.display = 'inline';
    for (let item of document.getElementsByClassName('data-not-form')){
        item.style.display = 'none'
    }
    for (let item of document.getElementsByClassName('data-form')){
        item.style.display = 'block'
    }
});
cancel.addEventListener('click', e => {
    e.target.style.display = 'none';
    submit.style.display = 'none';
    edit.style.display = 'inline';
    for (let item of document.getElementsByClassName('data-not-form')){
        item.style.display = 'block'
    }
    for (let item of document.getElementsByClassName('data-form')){
        item.style.display = 'none'
    }
});
submit.addEventListener('click', e=> {
    document.querySelector('form').submit();
});
if(typeof sendRequest != 'undefined'){
    sendRequest.addEventListener('click', e=> {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', sendRequest.getAttribute('data-href'));
        xhr.send();

        sendRequest.remove();

        return false;
    });
}
</script>
</html>