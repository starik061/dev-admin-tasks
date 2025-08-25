<div class="contract-item new">
  <span>Договiр №{{$item->number}} {{$item->our_company_name_short}} - {{$item->company_name_short}}</span>
  &nbsp;
  <a href="{{$item->file}}" class="dwn-contract">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 15V19C3.75 19.3315 3.8817 19.6495 4.11612 19.8839C4.35054 20.1183 4.66848 20.25 5 20.25H19C19.3315 20.25 19.6495 20.1183 19.8839 19.8839C20.1183 19.6495 20.25 19.3315 20.25 19V15H21.75V19C21.75 19.7293 21.4603 20.4288 20.9445 20.9445C20.4288 21.4603 19.7293 21.75 19 21.75H5C4.27065 21.75 3.57118 21.4603 3.05546 20.9445C2.53973 20.4288 2.25 19.7293 2.25 19V15H3.75Z" fill="#FC6B40"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M6.46973 10.5303L7.53039 9.46967L12.0001 13.9393L16.4697 9.46967L17.5304 10.5303L12.0001 16.0607L6.46973 10.5303Z" fill="#FC6B40"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M12.75 3V15H11.25V3H12.75Z" fill="#FC6B40"/>
    </svg>
  </a>
  <a class="show-planes">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
      <g id="board_1_">
        <g id="Group" transform="translate(7.000000, 0.000000)">
          <g id="board" transform="translate(17.729730, 23.172414)" fill="#FC6B40">
            <path fill="#FC6B40" d="M11.224,3.264H0.55v6.082H4.98v3.04H0.55H-9.921h-4.432v-3.04h4.432V3.264h-10.676
                              c-1.776,0-3.221-1.363-3.221-3.04v-15.201c0-1.676,1.445-3.04,3.221-3.04h31.821c1.776,0,3.224,1.364,3.224,3.04V0.224
                              C14.448,1.901,13.001,3.264,11.224,3.264z M-6.699,9.346h4.025V3.264h-4.025V9.346z M11.224-14.977H5.116v1.518H1.76v-1.518
                              h-4.768v1.518h-3.357v-1.518h-4.767v1.518h-3.354v-1.518h-6.11V0.224h10.676H0.55h10.677L11.224-14.977z"/>
          </g>
        </g>
      </g>
    </svg>
  </a>
  <a class="contract-del" data-contract_id="{{$item->id}}" data-client_id="{{$client->id}}">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 6C2.25 5.58579 2.58579 5.25 3 5.25H21C21.4142 5.25 21.75 5.58579 21.75 6C21.75 6.41421 21.4142 6.75 21 6.75H3C2.58579 6.75 2.25 6.41421 2.25 6Z" fill="#FC6B40"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.75C9.66848 2.75 9.35054 2.8817 9.11612 3.11612C8.8817 3.35054 8.75 3.66848 8.75 4V5.25H15.25V4C15.25 3.66848 15.1183 3.35054 14.8839 3.11612C14.6495 2.8817 14.3315 2.75 14 2.75H10ZM16.75 5.25V4C16.75 3.27065 16.4603 2.57118 15.9445 2.05546C15.4288 1.53973 14.7293 1.25 14 1.25H10C9.27065 1.25 8.57118 1.53973 8.05546 2.05546C7.53973 2.57118 7.25 3.27065 7.25 4V5.25H5C4.58579 5.25 4.25 5.58579 4.25 6V20C4.25 20.7293 4.53973 21.4288 5.05546 21.9445C5.57118 22.4603 6.27065 22.75 7 22.75H17C17.7293 22.75 18.4288 22.4603 18.9445 21.9445C19.4603 21.4288 19.75 20.7293 19.75 20V6C19.75 5.58579 19.4142 5.25 19 5.25H16.75ZM5.75 6.75V20C5.75 20.3315 5.8817 20.6495 6.11612 20.8839C6.35054 21.1183 6.66848 21.25 7 21.25H17C17.3315 21.25 17.6495 21.1183 17.8839 20.8839C18.1183 20.6495 18.25 20.3315 18.25 20V6.75H5.75Z" fill="#FC6B40"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.25C10.4142 10.25 10.75 10.5858 10.75 11V17C10.75 17.4142 10.4142 17.75 10 17.75C9.58579 17.75 9.25 17.4142 9.25 17V11C9.25 10.5858 9.58579 10.25 10 10.25Z" fill="#FC6B40"/>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.25C14.4142 10.25 14.75 10.5858 14.75 11V17C14.75 17.4142 14.4142 17.75 14 17.75C13.5858 17.75 13.25 17.4142 13.25 17V11C13.25 10.5858 13.5858 10.25 14 10.25Z" fill="#FC6B40"/>
    </svg>
  </a>
  <div class="contrat-info hide">

<!-- ACTS START -->
  @foreach($item->acts as $key2 => $act)
    <div class="contract-planes" id="act-{{$item->id}}_{{$act->id}}" data-contract_id="{{$item->id}}" data-act_id="{{$act->id}}">
                        
      <div class="act-name" id="act_name-{{$item->id}}_{{$act->id}}">
        Приложение №{{$act->number}} от {{date('d.m.Y', strtotime($act->date))}}
      </div>
      <div class="contract-planes-buttons clearfix @if($act->file) hide @endif" id="cpb_{{$item->id}}_{{$act->id}}">
        <button class="crm-button add-from-selection fleft" data-id="{{$item->id}}" data-act_id="{{$act->id}}">Добавить из подборки</button>
        <div class="code-search fleft">
          <input type="text" class="code"/>
          <button class="crm-button find" data-contract_id="{{$item->id}}" data-act_id="{{$act->id}}">Поиск</button>
        </div>
        <button class="crm-button add-by-code fleft">Поиск по коду</button>
        <button class="crm-button add-service fleft" data-id="{{$item->id}}" data-act_id="{{$act->id}}">Добавить доп. услугу</button>
                          
        <button class="crm-button create-act fleft @if(!@count($act->boards)) hide @endif" data-contract_id="{{$item->id}}" data-act_id="{{$act->id}}">@if($act->file) Обновить приложение @else Создать приложение @endif</button>
        @if($act->file)
          <a href="{{$act->file}}?t=112233" class="dwn-act">скачать</a>
        @endif
                          
      </div>
      <div class="contract-planes-items @if($act->file) hide @endif" id="contract_planes_{{$item->id}}_{{$act->id}}" data-contract_id="{{$item->id}}"  data-act_id="{{$act->id}}">
        <div class="selection-items-table @if(!@count($act->boards)) hide @endif">
          <div class="selection-items-head">
            <div class="selection-items-row">
              <div class="selection-items-col">ID</div>
              <div class="selection-items-col">Город</div>
              <div class="selection-items-col">Фирма - Код</div>
              <div class="selection-items-col">Тип</div>
              <div class="selection-items-col">Адрес</div>
              <div class="selection-items-col">Ст.</div>
              <div class="selection-items-col">Под- светка</div>
              <div class="selection-items-col">Дата обновлния</div>
              <div class="selection-items-col">Фото</div>
              <div class="selection-items-col">Период</div>
              <div class="selection-items-col">@lang('message.in_price') без НДС</div>
              <div class="selection-items-col">@lang('message.price_') в месяц без НДС</div>
              <div class="selection-items-col">Итого</div>
              <div class="selection-items-col"></div>
            </div>
          </div>
          <div class="selection-items-body" data-contract_id="{{$item->id}}" data-act_id="{{$act->id}}">

          </div>
        </div>   
      </div>
    </div>
  @endforeach
  <button class="crm-button add-new-act" data-contract_id="{{$item->id}}">Добавить приложение</button>
  </div>
</div>