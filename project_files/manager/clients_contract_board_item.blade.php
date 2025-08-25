@php
if(!$_COOKIE['currency']){
    $_COOKIE['currency'] = 'uah';
}
switch($_COOKIE['currency']){
    case 'uah': $_COOKIE['currency_symbol'] = '&#8372;'; break;
    case 'usd': $_COOKIE['currency_symbol'] = '&#36;'; break;
    case 'eur': $_COOKIE['currency_symbol'] = '&euro;'; break;
}
@endphp

    @foreach($boards as $key => $board)
    <div class="selection-items-row">
      {{--
      <div class="selection-items-col col-checkbox">
        <input type="checkbox" class="item-checkbox" value="{{$board->id}}" name="ids[]"/>
      </div>
      --}}
      <div class="selection-items-col col-code" daa-code="{{$board->id}}">
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
        {{$board->id}}
        </a>
      </div>
      <div class="selection-items-col">
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
          {{ $board->city_name }}
        </a>
      </div>
      <div class="selection-items-col">
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
          {{ $board->firm_name }} - {{ $board->code }}
        </a>
      </div>
      <div class="selection-items-col col-image">
        <a href="{{ $data['lang_url']}}/{{ $board['aleas'] }}" aria-describedby="tooltip" 
            class="hoverImg" title="" 
            data-width="450px" 
            data-height="200px" 
            data-image="@if ($board->image != null){{ "/upload/" . $board->image . $webp }}@endif">
          {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }} 
          @if ($board->format != null)  
            {{ ", " }}
          @endif 
          {{ $board->format }}
        </a>
        @if ($board->image != null)
          <img src="/upload/{{$board->image}}" class="al-popup-image"/>
        @endif
      </div>
      <div class="selection-items-col break-words">
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
        @if ($board->city_name)
          @if (Auth::guest() || Auth::user() && Auth::user()->role_id > 2)
            {{ $board->city_name }}
          @endif
        @endif
        @if ($board->format)
          @if ($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2))
            {{", "}}
          @endif
          {{ $board->format }}
        @endif
        @if ($board->addr)
          @if($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2) || $board->format && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2))
            {{", "}}
          @endif
          {{ $board->addr }}
        @endif
        @if (!$board->city_name && !$board->format && !$board->addr)
          {{ '-' }}
        @endif
        </a>
      </div>
      <div class="selection-items-col">
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
          {{ $board->side_type }}
        </a>
      </div>
      <div class="selection-items-col">
        <span class="mb-title">@lang('message.light_')</span>
        @if ($board->light == 'true')
        <div class="image-wrapper">
          <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"  target="_blank"><img class="img" loading="lazy" src="/img/icon_light_on.svg" alt="light on"></a>
          <p class="light-info">
            @lang('message.light') - <span>@lang('message.exist')</span>
          </p>
        </div>
        @else
        <div class="image-wrapper">
          <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"  target="_blank"><img class="img" loading="lazy" src="/img/icon_light_off.svg" alt="light off"></a>
          <p class="light-info">
            @lang('message.light') - <span>@lang('message.no_light')</span>
          </p>
        </div>
        @endif
      </div>
      @php
        $date = explode('-',explode(' ',$board->updated_at)[0]);
        $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
      @endphp
      <div class="selection-items-col">
        <span class="mb-title">@lang('message.change')</span>
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"  target="_blank">{{ $str_date }}</a>
      </div>
      <div class="selection-items-col col-image">
        @if ($board->image != null || $board->scheme != null)
          @if(App::isLocale('ua'))
            <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="ua/{{ $board->aleas }}" data-id="{{ $board->bord_id }}" data-img="
          @else
            <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="{{ $board->aleas }}" data-id="{{ $board->bord_id }}" data-img="
          @endif            
          @if ($board->image != null)
            {{ "/upload/" . $board->image . $webp }}|
          @endif
          @if ($board->scheme != null)
            {{ "/upload/" . $board->scheme . $webp }}
          @endif
          ">
        @else
          <img alt="none image" class="img" src="/img/icon_photo_off.svg" alt="board">
        @endif
      </div>
      <div class="selection-items-col col-date-from-to">
        С <input class="date_from checkable" id="df_{{$contract_id}}-{{$act_id}}-{{$board->id}}" type="text" data-board_id="{{$board->id}}" value="{{$board->date_from}}"/>
        по <input class="date_to checkable" id="dt_{{$contract_id}}-{{$act_id}}-{{$board->id}}"type="text" data-board_id="{{$board->id}}" value="{{$board->date_to}}"/>
      </div>

      <div class="selection-items-col nowrap">
        <span class="mb-title">@lang('message.in_price')</span>
        @if($board->active == App\Helpers\BoardConstants::INACTIVE)
          <a>@lang('message.no_data')</a>
        @else
          <a>{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
        @endif
      </div>
      <div class="selection-items-col nowrap @if (Auth::user() && Auth::user()->role_id < 3 && $board->hidden_price) hidden-price @endif">
          <span class="mb-title">Цена</span>
        @if($board->active == App\Helpers\BoardConstants::INACTIVE)
          <a class="cost-board">@lang('message.no_data')</a>
        @else
          <input class="client-price checkable" id="client-price_{{$contract_id}}-{{$act_id}}-{{$board->id}}"  value="{{ $board->client_price ? $board->client_price : $board->price }}" data-board_id="{{$board->id}}" data-default_price="{{ $board->price }}" data-act_id="{{$act_id}}"/> {!!$_COOKIE['currency_symbol']!!}
        @endif
      </div>
      <div class="selection-items-col nowrap">
        <input class="clinet-price-total checkable" value="{{$board->total_price}}" id="client-price-total_{{$contract_id}}-{{$act_id}}-{{$board->id}}" data-board_id="{{$board->id}}" data-contract_id="{{$contract_id}}" data-act_id="{{$act_id}}"/> {!!$_COOKIE['currency_symbol']!!}
      </div>
      <div class="selection-items-col">
        <a class="contract-plane-remove" data-board_id="{{$board->id}}">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 6C2.25 5.58579 2.58579 5.25 3 5.25H21C21.4142 5.25 21.75 5.58579 21.75 6C21.75 6.41421 21.4142 6.75 21 6.75H3C2.58579 6.75 2.25 6.41421 2.25 6Z" fill="#FC6B40"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.75C9.66848 2.75 9.35054 2.8817 9.11612 3.11612C8.8817 3.35054 8.75 3.66848 8.75 4V5.25H15.25V4C15.25 3.66848 15.1183 3.35054 14.8839 3.11612C14.6495 2.8817 14.3315 2.75 14 2.75H10ZM16.75 5.25V4C16.75 3.27065 16.4603 2.57118 15.9445 2.05546C15.4288 1.53973 14.7293 1.25 14 1.25H10C9.27065 1.25 8.57118 1.53973 8.05546 2.05546C7.53973 2.57118 7.25 3.27065 7.25 4V5.25H5C4.58579 5.25 4.25 5.58579 4.25 6V20C4.25 20.7293 4.53973 21.4288 5.05546 21.9445C5.57118 22.4603 6.27065 22.75 7 22.75H17C17.7293 22.75 18.4288 22.4603 18.9445 21.9445C19.4603 21.4288 19.75 20.7293 19.75 20V6C19.75 5.58579 19.4142 5.25 19 5.25H16.75ZM5.75 6.75V20C5.75 20.3315 5.8817 20.6495 6.11612 20.8839C6.35054 21.1183 6.66848 21.25 7 21.25H17C17.3315 21.25 17.6495 21.1183 17.8839 20.8839C18.1183 20.6495 18.25 20.3315 18.25 20V6.75H5.75Z" fill="#FC6B40"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.25C10.4142 10.25 10.75 10.5858 10.75 11V17C10.75 17.4142 10.4142 17.75 10 17.75C9.58579 17.75 9.25 17.4142 9.25 17V11C9.25 10.5858 9.58579 10.25 10 10.25Z" fill="#FC6B40"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.25C14.4142 10.25 14.75 10.5858 14.75 11V17C14.75 17.4142 14.4142 17.75 14 17.75C13.5858 17.75 13.25 17.4142 13.25 17V11C13.25 10.5858 13.5858 10.25 14 10.25Z" fill="#FC6B40"/>
          </svg>
        </a>
      </div>
    </div>
    @endforeach
  
