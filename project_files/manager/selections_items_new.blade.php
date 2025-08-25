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
        <div class="selection-items-col col-checkbox td-checkbox">
            <input type="checkbox" class="item-checkbox" data-value="{{$board->id}}" value="{{$board->id}}"
                   name="ids[]"/>
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
            @if ($board->light == 'true')
                <div class="image-wrapper">
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank"><img class="img"
                                                                                               loading="lazy"
                                                                                               src="/img/icon_light_on.svg"
                                                                                               alt="light on"></a>
                    <p class="light-info">
                        @lang('message.light') - <span>@lang('message.exist')</span>
                    </p>
                </div>
            @else
                <div class="image-wrapper">
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank"><img class="img"
                                                                                               loading="lazy"
                                                                                               src="/img/icon_light_off.svg"
                                                                                               alt="light off"></a>
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
            <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $str_date }}</a>
        </div>
        <div class="selection-items-col col-image">
            @if ($board->image != null || $board->scheme != null)
                @if(App::isLocale('ua'))
                    <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="ua/{{ $board->aleas }}"
                         data-id="{{ $board->bord_id }}" data-img="
          @else
            <img alt=" board image" class="img" src="/img/icon_photo_on.svg" data-alias="{{ $board->aleas }}"
                    data-id="{{ $board->bord_id }}" data-img="
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

        <div class="selection-items-col nowrap">
            <span class="mb-title">Цена в системе</span>
            <a href="#"
               class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
        </div>


        <div class="selection-items-col nowrap">
            <span class="mb-title">@lang('message.purchase_price')</span>
            <div class="boards-td boards-td-price-in">
                <input class="selection-item-price"
                       id="owner-price_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
                       value="{{ $board->selectionTypeId === \App\CrmSelectionsTypes::TYPE_OUTDOOR || $board->selectionTypeId === \App\CrmSelectionsTypes::TYPE_SYSTEM || $board->selectionTypeId === \App\CrmSelectionsTypes::TYPE_BASKET ? ($board->selling_price ?? $board->price) : ($board->price ?? 0) }}"
                       data-board_id="{{$board->id}}"
                       data-selection_id="{{$selection->id}}"
                       data-type="selling_price"
                />
            </div>
        </div>

        <div class="selection-items-col nowrap">
            <span class="mb-title">@lang('message.selling_price')</span>
            <div class="boards-td boards-td-price-in">
                <input class="custom-selection-item-price"
                       id="owner-price_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
                       value="{{ $board->selectionTypeId === \App\CrmSelectionsTypes::TYPE_OUTDOOR || $board->selectionTypeId === \App\CrmSelectionsTypes::TYPE_SYSTEM || $board->selectionTypeId === \App\CrmSelectionsTypes::TYPE_BASKET ? ($board->buying_price ?? $board->start_price) : ($board->start_price ?? 0) }}"
                       data-board_id="{{$board->id}}"
                       data-selection_id="{{$selection->id}}"
                       data-type="buying_price"
                />
            </div>
        </div>

        <div class="selection-items-col nowrap">
            <span class="mb-title">Цена печати</span>
            <div class="boards-td boards-td-price-in">

                <input class="custom-selection-item-price"
                       id="owner-price_{{$contract->id}}-{{$act->id}}-{{$board->id}}-{{$board->contract_board_id}}"
                       value="{{ $board->printing_price ?? $board->getService()->price ?? 0 }}"
                       data-board_id="{{$board->id}}"
                       data-selection_id="{{$selection->id}}"
                       data-type="printing_price"
                />
            </div>
        </div>

        <div class="selection-items-col">
            @if($board->isWatched)
                <span class="mb-title">@lang('message.monitoring_status')</span>
                <div class="boards-td watched-container">
                    <a class="watched-link">
                        <strong>{{ $board->watchedFrom }}</strong> <br> <strong>{{ $board->watchedTo }}</strong>
                    </a>
                </div>
            @else
                <span class="mb-title">@lang('message.monitoring_status')</span>
                <div class="not-watched">@lang('message.billboard_is_not_under_monitoring')</div>
            @endif
        </div>
    </div>
@endforeach


<style>
    .selection-items-col {
        margin-bottom: 10px;
        max-width: 180px;
    }

    @media (max-width: 1560px) {
        .selection-items-col {
            max-width: 120px;
        }
    }

    @media (max-width: 1410px) {
        .selection-items-col {
            max-width: 110px;
        }
    }

    .mb-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .watched-link {
        display: block;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
    }

    .not-watched {
        padding: 5px;
        background-color: #ffe5e5;
        border: 1px solid #ffcccc;
        border-radius: 4px;
        color: #cc0000;
    }

    .watched-container {
        display: flex;
        align-items: center;
    }

    .custom-selection-item-price {
        width: 110px;
        height: 30px;
        border: solid 1px #CDD4D9;
        padding: 7px;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        color: #3D445C;
        border-radius: 3px;
        outline: none;
        background: white url(../assets/img/select2.png) left top no-repeat;
    }
</style>
