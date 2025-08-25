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
          <a href="{{$act->file}}?t=112233" class="dwn-act crm-button crm-button-default">Скачать приложение</a>
          <button class="dwn-bill crm-button crm-button-default">Скачать счёт</button>
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