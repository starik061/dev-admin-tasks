@php
  $_COOKIE['currency'] = 'uah';
  $_COOKIE['currency_symbol'] = '&#8372;';
@endphp

    @foreach($selectionBoards as $key => $board)
    <div class="selection-items-row">
      <div class="selection-items-col col-checkbox td-checkbox">
        <input type="checkbox" class="item-checkbox" value="{{$board->id}}" name="ids[]"
               data-value={{$board->id}} data-selection-id="{{ $selection->id }}"/>
      </div>
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
        @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
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
      <div class="selection-items-col col-busy" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
        <span class="mb-title">@lang('message.employment_')</span>
      </div>

      @can('view-approximated-prices')
        <div class="selection-items-col nowrap">
          {{ $board->approximated_supplier_price }} ₴
        </div>
      @endcan

      <div class="selection-items-col nowrap">
        <span class="mb-title">@lang('message.in_price')</span>
        @if($board->active == App\Helpers\BoardConstants::INACTIVE)
        <a href="{{ asset($board['aleas']) }}"  target="_blank">@lang('message.no_data')</a>
        @else
        <a href="{{ asset($board['aleas']) }}"  target="_blank">{{ $selection ? ($selection->getItemByBoardId($board->id)->buying_price ?? ($board->start_price ?? 0)) : ($board->start_price ?? 0)  }} {!!$_COOKIE['currency_symbol']!!}</a>
        @endif
      </div>
      <div class="selection-items-col nowrap @if (Auth::user() && Auth::user()->role_id < 3 && $board->hidden_price) hidden-price @endif">
        <span class="mb-title">@lang('message.price')</span>
        @if($board->active == App\Helpers\BoardConstants::INACTIVE)
        <a href="#" class="cost-board">@lang('message.no_data')</a>
        @else
          @if (Auth::user() &&  Auth::user()->role_id < 3)
            <a href="#" class="cost-board">{{ $selection ? ($selection->getItemByBoardId($board->id)->selling_price ?? ($board->price ?? 0)) : ($board->price ?? 0) }} {!!$_COOKIE['currency_symbol']!!}</a>
          @elseif (setting('front.hidden_price') || !$board->price)
          <a href="#" class="cost-board">@lang('message.hidden_price_word')</a>
          @else
          <a href="#" class="cost-board">{{ $selection && $selection->getItemByBoardId($board->id)->selling_price ?? $board->price ?? 0 }} {!!$_COOKIE['currency_symbol']!!}</a>
          @endif
        @endif
      </div>
    </div>
    @endforeach
  
