<div class="tr">
    <div class="td td-checkbox">
        <input type="checkbox" name="id[]"  data-value="{{ $board->id }}" {{ in_array($board->id,$checked) ? "checked" : ''}}/>
    </div>
    <div class="td td-code" data-code="351" data-select-month="">
        <span class="mb-title">@lang('message.code')</span>
        <a href="{{$data['lang_url']}}/{{ $board->aleas }}">{{$board->id}}</a>
    </div>
    <div class="td td-city">
        <span class="mb-title">@lang('message.city')</span>
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">{{ $board->city_name }}</a>
    </div>
    @can('view-suppliers-in-search')
        <div class="td td-firm">
            <span class="mb-title">@lang('message.firm')</span>
            <a style="cursor:pointer" class="conteact_open" data-id="{{$board->firm}}">{{ $board->firm_name }}
                - {{ $board->code }}</a>
        </div>
    @endif
    <div class="td td-type">
        <span class="mb-title">@lang('message.type_')</span>
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"
               aria-describedby="tooltip"
               class="hoverImg" title=""
               data-width="450px"
               data-height="200px"
               data-image="{{ $board->image != null ?  "/upload/" . $board->image . $webp : '' }}"
        >
            {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }}
            {{ $board->format != null ? ', ' . $board->format : '' }}
        </a>
    </div>
    <div class="td td-adress">
        <span class="mb-title">@lang('message.address_')</span>
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">
            @if ($board->city_name)
                @if (Auth::guest() || Auth::user() && Auth::user()->role_id > 2)
                    {{ $board->city_name }}
                @endif
            @endif
            @if ($board->format)
                @if ($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2 && Auth::user()->role_id < 7))
                    {{", "}}
                @endif
                {{ $board->format }}
            @endif
            @if ($board->addr)
                @if($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2 && Auth::user()->role_id < 7) || $board->format && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2  && Auth::user()->role_id < 7))
                    {{", "}}
                @endif
                {{ $board->addr }}
            @endif
            @if (!$board->city_name && !$board->format && !$board->addr)
                {{ '-' }}
            @endif
        </a>
    </div>
    <div class="td td-side text-center">
        <span class="mb-title">сторона</span>
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">{{ $board->side_type }}</a>
    </div>
    <div class="td td-light text-center">
        <span class="mb-title">@lang('message.light_')</span>
        @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
            <div class="image-wrapper">
                <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"><img class="img" loading="lazy"
                                                                           src="/img/icon_light_on.svg" alt="light on"></a>
                <p class="light-info">
                    @lang('message.light') - <span>@lang('message.exist')</span>
                </p>
            </div>
        @else
            <div class="image-wrapper">
                <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"><img class="img" loading="lazy"
                                                                           src="/img/icon_light_off.svg"
                                                                           alt="light off"></a>
                <p class="light-info">
                    @lang('message.light') - <span>@lang('message.no_light')</span>
                </p>
            </div>
        @endif
    </div>
    <div class="td td-photo text-center"
         @if ($board->image == null && $board->scheme == null) style="cursor: default" @endif>
        <span class="mb-title">@lang('message.photo')</span>
        @if ($board->image != null || $board->scheme != null)
            @if(App::isLocale('ua'))
                <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="ua/{{ $board->aleas }}"
                     data-id="{{ $board->id }}" data-img="
                                                  @else
                                                  <img alt=" board image" class="img" src="/img/icon_photo_on.svg"
                data-alias="{{ $board->aleas }}" data-id="{{ $board->id }}" data-img="
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

    @can('view-approximated-prices')
        @php
            $priceTitle = '';
            if($board->approximated_by_region){
                $priceTitle = 'Середня ціна по регіону для даного типу, сторони та підсвічування';
            }elseif($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date){
                $priceTitle = 'Собівартість';
            }elseif($board->approximated_supplier_price){
                $priceTitle = 'Розрахункова собівартість для власника';
            }
        @endphp
        <div class="td td-supplier-price al-power-tip boards-td-price-in @if($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date) by_cost @else @if($board->approximated_supplier_price > 0) by_median @endif @endif  @if($board->approximated_by_region) by_region @endif"
             @if($priceTitle) title="{{$priceTitle}}" @endif
        >
            <input class="basket-price-item"
                   id="owner-price_--{{$board->id}}-"
                   value="{{ $board->approximated_supplier_price }}"
                   data-board_id="{{$board->id}}"
                   data-type="price_in">
        </div>
    @endcan


    <div class="td td-original-price">
        <span class="mb-title">@lang('message.in_price')</span>
        <a href="{{ asset($board['aleas']) }}">{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
    </div>
    <div class="td td-price text-right boards-td-price-in">
        <input class="basket-price-item"
               id="client-price_--{{$board->id}}-"
               value="{{ $board->approximated_selling_price }}"
               data-board_id="{{$board->id}}"
               data-type="price_out">
    </div>

    <div class="td td-busy mobile-hide" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}"
         data-alias="{{$board['aleas']}}">
        <span class="mb-title">@lang('message.employment_')</span>
    </div>
    <div class="list-review">
        <div class="busy-calendar mobile-show">
            <p class="title">@lang('message.calendar_employment')</p>
            <div class="calendar" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
            </div>
        </div>
    </div>
    <div class="td td-changed mobile-hide">
        @php
            $date = explode('-',explode(' ',$board->updated_at)[0]);
            $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
        @endphp
        <span class="mb-title">@lang('message.change')</span>
        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">{{ $str_date }}</a>
    </div>
    <div class="td td-buy">
        <a class="del"><span
                    class="mb-title">@lang('message.remove_from_basket')</span>
            <div class="del-ico" data-basket_id="{{ $basket->id }}"
                 data-board_id="{{ $board->id }}"></div>
        </a>
    </div>
</div>