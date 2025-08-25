@php
  $_COOKIE['currency'] = 'uah';
  $_COOKIE['currency_symbol'] = '&#8372;';
@endphp
@foreach($boards as $board)
<div class="boards-table-tr" id="board-tr-{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}">
  <div class="boards-td boards-td-photo">
    @if($board->image)
    <img src="/upload/{{$board->image}}"/>
    @endif
  </div>
  <div class="boards-td boards-td-code">
    <a href="/{{ $board->aleas }}" target="_blank">
    {{$board->id}}
    </a>
  </div>
  <div class="boards-td boards-td-addr">
    <a href="/{{ $board->aleas }}" target="_blank">
    {{--dump($board->city_name)--}}  
    @if ($board->city_name)
      {{ $board->city_name }},
    @endif
    {{$board->addr}}
    </a>
  </div>
  <div class="boards-td boards-td-firm">
    <a href="/{{ $board->aleas }}" target="_blank">
    {{ $board->firm_name }}, <span class="board-code" id="board-code-{{$board->contract_board_id}}">{{ $board->board_code ?? $board->code }}</span>
    </a>
  </div>
  <div class="boards-td boards-td-type">
    <a href="/{{ $board->aleas }}" target="_blank">
    {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }} 
    @if ($board->format != null)  
      {{ ", " }}
    @endif 
    {{ $board->format }}
    </a>
  </div>
  <div class="boards-td boards-td-side">
    <a href="/{{ $board->aleas }}" target="_blank">
    {{ $board->side_type }}
    </a>
  </div>
  <div class="boards-td boards-td-updated">
    @php
      $date = explode('-',explode(' ',$board->updated_at)[0]);
      $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
      echo $str_date;
    @endphp
  </div>
  <div class="boards-td boards-td-period col-date-from-to">
    <input class="date_from checkable"
           id="df_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
           type="text" data-board_id="{{$board->id}}"
           data-contract_id="{{$contract->id}}"
           data-act_id="{{$act->id}}"
           data-client_id="{{$client->id}}"
           data-contract_board_id="{{$board->contract_board_id}}"
           value="{{$board->date_to && (explode(".", $board->date_to)[2].'-' .explode(".", $board->date_to)[1].'-'.explode(".", $board->date_to)[0] < date('Y-m-d')) && $contract->number == '-'  ? '' : $board->date_from}}" @if(!$act->can_delete) disabled @endif/>
    - 
    <input class="date_to checkable"
           id="dt_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
           type="text"
           data-board_id="{{$board->id}}"
           data-contract_id="{{$contract->id}}"
           data-act_id="{{$act->id}}"
           data-client_id="{{$client->id}}"
           data-contract_board_id="{{$board->contract_board_id}}"
           value="{{$board->date_to && (explode(".", $board->date_to)[2].'-' .explode(".", $board->date_to)[1].'-'.explode(".", $board->date_to)[0] < date('Y-m-d')) && $contract->number == '-'  ? '' : $board->date_to}}" @if(!$act->can_delete) disabled @endif/>
  </div>
  <div class="boards-td boards-td-price-in">
    {{--
    @if($board->active == 'false')
      <a>@lang('message.no_data')</a>
    @else
      <a>{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
    @endif
    --}}
    <input class="owner-price " id="owner-price_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"  value="{{ $board->owner_price ? $board->owner_price : $board->start_price }}" data-board_id="{{$board->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-client_id="{{$client->id}}" data-contract_board_id="{{$board->contract_board_id}}" @if(!$act->can_delete && false) disabled @endif/>
  </div>
  <div class="boards-td boards-td-price-out">
    
    @if($board->active == 'false' && false)
      <a class="cost-board">@lang('message.no_data')</a>
    @else

      <input class="client-price-new checkable"
             id="client-price_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
             value="{{ $board->client_price ? : $board->price }}"
             data-board_id="{{$board->id}}"
             data-default_price="{{ $board->price }}"
             data-contract_id="{{$contract->id}}"
             data-act_id="{{$act->id}}"
             data-client_id="{{$client->id}}"
             data-contract_board_id="{{$board->contract_board_id}}"
             @if(!$act->can_delete) disabled @endif
      />
    @endif
  </div>
  <div class="boards-td boards-td-price-result">
    <input class="clinet-price-total-new checkable"
           value="{{$board->date_to && (explode(".", $board->date_to)[2].'-' .explode(".", $board->date_to)[1].'-'.explode(".", $board->date_to)[0] < date('Y-m-d')) && $contract->number == '-'  ? '' : $board->total_price}}"
           id="client-price-total_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
           data-board_id="{{$board->id}}"
           data-contract_id="{{$contract->id}}"
           data-act_id="{{$act->id}}"
           data-client_id="{{$client->id}}"
           data-contract_board_id="{{$board->contract_board_id}}" @if(!$act->can_delete) disabled @endif/>
  </div>
  <div class="boards-td boards-td-action action-col">
    @if($act->can_delete)
    <a href="#" class="more-action">
      <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="for-js">
        <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z" fill="#3D445C" class="for-js"/>
      </svg>
    </a>
    <div class="sub-action hide">
      {{--
      <a href="#" class="board-photo-report">
        @lang('message.photoreport')
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967Z" fill="#8B8F9D"/>
        </svg>
        <div class="flex-position-fix"></div>
      </a>
      --}}
      <a class="plane-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}" data-client_id="{{$contract->client_id}}" data-board_id="{{$board->id}}"  data-contract_board_id="{{$board->contract_board_id}}" href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/planes/{{$board->id}}-{{$board->contract_board_id}}/delete">@lang('message.delete_plane')</a>
      <a class="change-board-code pointer"
         data-id="{{$board->contract_board_id}}"
         data-client_id="{{$client->id}}"
         data-contract_id="{{$contract->id}}"
         data-app_id="{{$act->id}}"
         data-board_id="{{$board->id}}">
        @lang('message.change_code')
      </a>
    </div>
    @endif
  </div>
</div>
@endforeach