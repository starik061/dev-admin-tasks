@foreach($clients as $key => $item)
<div class="leads-main-row">
  <div class="leads-row" data-id="{{$item->id}}" data-name="{{$item->name}}" data-fio="{{$item->fio}}" data-email="{{$item->email}}" data-phone="{{$item->phone}}" data-cities='{{$item->city}}' data-comment="{{$item->comment}}" data-details="{{$item->datails}}">
    <div class="leads-col">{{$item->name}}</div>
    <div class="leads-col">{{$item->fio}}</div>
    <div class="leads-col">{{$item->email}}</div>
    <div class="leads-col">{{$item->phone}}</div>
    <div class="leads-col">{{$item->cities}}</div>
    <div class="leads-col action-col">
      {{$item->created_at}}
      <!--<a class="edit" href="/manager/clients/{{$item->id}}/details/{{$item->details}}">-->
      <a class="edit" href="/manager/clients/{{$item->id}}/info">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve">
          <g>
            <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981
              c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611
              C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069
              L27.473,390.597L0.3,512.69z" fill="#FC6B40"/>
          </g>
        </svg>
      </a>
      <a class="del" data-id="{{$item->id}}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 6C2.25 5.58579 2.58579 5.25 3 5.25H21C21.4142 5.25 21.75 5.58579 21.75 6C21.75 6.41421 21.4142 6.75 21 6.75H3C2.58579 6.75 2.25 6.41421 2.25 6Z" fill="#FC6B40"/>
         <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.75C9.66848 2.75 9.35054 2.8817 9.11612 3.11612C8.8817 3.35054 8.75 3.66848 8.75 4V5.25H15.25V4C15.25 3.66848 15.1183 3.35054 14.8839 3.11612C14.6495 2.8817 14.3315 2.75 14 2.75H10ZM16.75 5.25V4C16.75 3.27065 16.4603 2.57118 15.9445 2.05546C15.4288 1.53973 14.7293 1.25 14 1.25H10C9.27065 1.25 8.57118 1.53973 8.05546 2.05546C7.53973 2.57118 7.25 3.27065 7.25 4V5.25H5C4.58579 5.25 4.25 5.58579 4.25 6V20C4.25 20.7293 4.53973 21.4288 5.05546 21.9445C5.57118 22.4603 6.27065 22.75 7 22.75H17C17.7293 22.75 18.4288 22.4603 18.9445 21.9445C19.4603 21.4288 19.75 20.7293 19.75 20V6C19.75 5.58579 19.4142 5.25 19 5.25H16.75ZM5.75 6.75V20C5.75 20.3315 5.8817 20.6495 6.11612 20.8839C6.35054 21.1183 6.66848 21.25 7 21.25H17C17.3315 21.25 17.6495 21.1183 17.8839 20.8839C18.1183 20.6495 18.25 20.3315 18.25 20V6.75H5.75Z" fill="#FC6B40"/>
         <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.25C10.4142 10.25 10.75 10.5858 10.75 11V17C10.75 17.4142 10.4142 17.75 10 17.75C9.58579 17.75 9.25 17.4142 9.25 17V11C9.25 10.5858 9.58579 10.25 10 10.25Z" fill="#FC6B40"/>
         <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.25C14.4142 10.25 14.75 10.5858 14.75 11V17C14.75 17.4142 14.4142 17.75 14 17.75C13.5858 17.75 13.25 17.4142 13.25 17V11C13.25 10.5858 13.5858 10.25 14 10.25Z" fill="#FC6B40"/>
        </svg>
      </a>
    </div>
  </div>
  <div class="leads-row-selects hide">
  @if(count($item->selections))
    <b>Подборки</b>
    <div class="leads-selections">
      <div class="selection-item selection-head">
        <div class="selection-col">id</div>
        <div class="selection-col">Дата создания</div>
        <div class="selection-col">Менеджер</div>
        <div class="selection-col">Количество плоскостей</div>
      </div>
      @foreach($item->selections as $k => $v)
      <div class="selection-item">
        <div class="selection-col">{{ $v->id }}</div>
        <div class="selection-col">{{ $v->created_at }}</div>
        <div class="selection-col">{{ $v->manager }}</div>
        <div class="selection-col">{{ $v->boards_count }}</div>
      </div>
      @endforeach
    </div>
  @else
    Подборки отсутствуют
  @endif
  </div>
</div>
@endforeach

          