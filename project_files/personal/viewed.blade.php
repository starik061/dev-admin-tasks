@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";

if(!$_COOKIE['currency']){
    $_COOKIE['currency'] = 'uah';
}
switch($_COOKIE['currency']){
    case 'uah': $_COOKIE['currency_symbol'] = '&#8372;'; break;
    case 'usd': $_COOKIE['currency_symbol'] = '&#36;'; break;
    case 'eur': $_COOKIE['currency_symbol'] = '&euro;'; break;
}

@endphp

  <section id="result-search-list">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters">
        <div 
          class="container container-base container-search-result
            @if (Auth::user() && Auth::user()->role_id == 1) 
                manager-search
              @endif
          "
        >
          <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
          </h1>
          <div class="favorite-viewed-tab">
            <a href="{{$data['lang_url']}}/personal/favorite">@lang('message.favorites')</a>
            <a href="{{$data['lang_url']}}/personal/viewed" class="active">@lang('message.you_watched_')</a>
          </div>  

@if(@count($boards))

          <div class="result-list">
            <div class="table-result">
              <div class="thead">
                <div class="tr">
                  <div class="td td-checkbox"><input id="selectAll" type="checkbox" ></div>
                  <div class="td td-code">
                    <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.code')</a>
                  </div>
                  @if (Auth::user() && Auth::user()->role_id == 1) 
                    <!-- manager -->
                    <div class="td td-city">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.city')</a>
                    </div>
                    <div class="td td-firm">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.firm_code')</a>
                    </div>
                    <!--  -->
                  @endif
                    <div class="td td-type">
                      <a href="{{ "{$url_full}{$connector}order=type" }}{{ $order_field == "type" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.type_')</a>
                    </div>
                    <div class="td td-adress">
                      <a href="{{ "{$url_full}{$connector}order=addr" }}{{ $order_field == "addr" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.address_')</a>
                    </div>
                    <div class="td td-side">
                      <a href="{{ "{$url_full}{$connector}order=side" }}{{ $order_field == "side" && $order_type == 'asc' ? "&dir=desc" : null}}">сторона</a>
                    </div>
                    <div class="td td-light">
                      <a href="{{ "{$url_full}{$connector}order=light" }}{{ $order_field == "light" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.light_')</a>
                    </div>
                    @if (Auth::user() && Auth::user()->role_id == 1) 
                    <!-- manager -->
                      <div class="td td-gid">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.gid')</a>
                      </div>
                      <div class="td td-doors">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">Doors</a>
                      </div>
                      <div class="td td-ots">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">OTS</a>
                      </div>
                      <div class="td td-grp">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">GRP</a>
                      </div>
                      <div class="td td-additionally">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.additional')</a>
                      </div>
                      <div class="td td-changed">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.change')</a>
                      </div>
                    <!--  -->
                    @endif
                  <div class="td td-photo">
                    <a href="{{ "{$url_full}{$connector}order=image" }}{{ $order_field == "image" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.photo')</a></div>
                  <div class="td td-busy">@lang('message.employment_')</div>
                  @if (Auth::user() && Auth::user()->role_id == 1) 
                    <div class="td td-original-price">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.in_price')</a>
                    </div>
                  @endif
                  <div class="td td-price">
                    <a href="{{ "{$url_full}{$connector}order=price" }}{{ $order_field == "price" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.price_')</a></div>
                  <div class="td td-buy"></div>
                </div>
              </div>
              <div class="tbody">
               @foreach($boards as $board)
                <div class="tr" @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif data-board_id="{{ $board->id }}">
                  <div class="td td-checkbox">
                    <input type="checkbox" name="id[]" @if($board->active == App\Helpers\BoardConstants::INACTIVE) disabled @endif>
                  </div>
                  <div class="td td-code" data-code="351" data-select-month="">
                    <span class="mb-title">@lang('message.code')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->id }}</a>
                  </div>
                  @if (Auth::user() && Auth::user()->role_id == 1) 
                  <!-- for manager -->
                    <div class="td td-city">
                      <span class="mb-title">@lang('message.city')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->city_name }}</a>
                    </div>
                    <div class="td td-firm">
                      <span class="mb-title">@lang('message.firm')</span>
                      <a style="cursor:pointer" class="conteact_open" data-id="{{$board->firm}}">{{ $board->firm_name }} - {{ $board->code }}</a>
                    </div>
                  <!--  -->
                  @endif
                  <div class="td td-type">
                    <span class="mb-title">@lang('message.type_')</span>
                    @if (Auth::user() && Auth::user()->role_id == 1)
                      <a href="{{ $data['lang_url']}}/{{ $board['aleas'] }}" aria-describedby="tooltip" 
                      @if ($board->image != null)
                        class="hoverImg"
                      @endif
                        title="" 
                        data-width="450px" 
                        data-height="200px" 
                        data-image="@if ($board->image != null){{ "/upload/" . $board->image.$webp }}@endif" target="_blank">
                    @else
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
                    @endif
                   
                      {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }} 
                      @if ($board->format != null)  
                      @php echo ", "; @endphp
                      @endif {{ $board->format }}
                    </a>
                  </div>
                  <div class="td td-adress">
                    <span class="mb-title">@lang('message.address_')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
                    
                      @if ($board->city_name)
                        @if (Auth::guest() || Auth::user() && Auth::user()->role_id != 1)
                          {{ $board->city_name }}
                        @endif
                      @endif
                      @if ($board->format)
                        @if ($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id != 1))
                          {{", "}}
                        @endif
                        {{ $board->format }}
                      @endif
                      @if ($board->addr)
                        @if($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id != 1) || $board->format && (Auth::guest() || Auth::user() && Auth::user()->role_id != 1))
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
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->side_type }}</a>
                  </div>
                  <div class="td td-light text-center">
                    <span class="mb-title">@lang('message.light_')</span>
                    @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
                      <div class="image-wrapper">
                        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank"><img class="img" loading="lazy" src="/img/icon_light_on.svg" alt="light on"></a>
                        <p class="light-info">
                          @lang('message.light') - <span>@lang('message.exist')</span>
                        </p>
                      </div>
                    @else
                      <div class="image-wrapper">
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank"><img class="img" loading="lazy" src="/img/icon_light_off.svg" alt="light off"></a>
                        <p class="light-info">
                          @lang('message.light') - <span>@lang('message.no_light')</span>
                        </p>
                      </div>
                    @endif
                  </div>
                  @if (Auth::user() && Auth::user()->role_id == 1) 
                  <!-- for managers -->
                    <div class="td td-gid">
                      <span class="mb-title">@lang('message.gid')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->guide }}</a>
                    </div>
                    <div class="td td-doors">
                      <span class="mb-title">Doors</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->doors }}</a>
                    </div>
                    <div class="td td-ots">
                      <span class="mb-title">OTS</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->ots }}</a>
                    </div>
                    <div class="td td-grp">
                      <span class="mb-title">GRP</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->grp }}</a>
                    </div>
                    <div class="td td-additionally">
                      <span class="mb-title">@lang('message.additional')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->addition }}</a>
                    </div>
                    @php
                        $date = explode('-',explode(' ',$board->updated_at)[0]);
                        $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
                    @endphp
                    <div class="td td-changed">
                      <span class="mb-title">@lang('message.change')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $str_date }}</a>
                    </div>
                  <!--  -->
                  @endif
                  <div class="td td-photo text-center" @if ($board->image == null && $board->scheme == null) style="cursor: default" @endif>
                    <span class="mb-title">@lang('message.photo')</span>
                    @if ($board->image != null || $board->scheme != null)
                      @if(App::isLocale('ua'))
                      <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="ua/{{ $board->aleas }}" data-id="{{ $board->bord_id }}" data-img="
                      @else
                      <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="{{ $board->aleas }}" data-id="{{ $board->bord_id }}" data-img="
                      @endif
                      
                      @if ($board->image != null)
                        {{ "/upload/" . $board->image.$webp }}|
                      @endif
                      @if ($board->scheme != null)
                        {{ "/upload/" . $board->scheme.$webp }}
                      @endif
                      ">
                    @else
                      <img alt="none image" class="img" src="/img/icon_photo_off.svg" alt="board">
                    @endif
                  </div>
                  
                  <div class="td td-busy" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                    <span class="mb-title">@lang('message.employment_')</span>
                  </div>
                  @if (Auth::user() && Auth::user()->role_id == 1) 
                    <div class="td td-original-price">
                      <span class="mb-title">@lang('message.in_price')</span>
                      @if($board->active == App\Helpers\BoardConstants::INACTIVE)
                      <a href="{{ asset($board['aleas']) }}" target="_blank">@lang('message.no_data')</a>
                      @else
                      <a href="{{ asset($board['aleas']) }}" target="_blank">{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
                      @endif
                    </div>
                  @endif
                  <div class="td td-price text-right @if (Auth::user() && Auth::user()->role_id == 1 && $board->hidden_price) hidden-price @endif">
                    <span class="mb-title">@lang('message.price_')</span>
                    @if($board->active == App\Helpers\BoardConstants::INACTIVE)
                        <a href="#" class="cost-board">@lang('message.no_data')</a>
                    @else
                        @if (Auth::user() &&  Auth::user()->role_id == 1)
                          <a href="#" class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
                        @elseif (setting('front.hidden_price') || !$board->price)
                          <a href="#" class="cost-board">{{ setting('front.hidden_price_word') }}</a>
                        @else
                          <a href="#" class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
                        @endif
                    @endif
                  </div>
                  <div class="td td-buy text-right">
                  @if($board->active == App\Helpers\BoardConstants::INACTIVE)
                    <button class="btn btn-style btn-disables ">@lang('message.not_active')</button>
                  @else
                    <button data-id="{{ $board->id }}" class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}">{{ $board->basket ? __('message.in_basket') : __('message.buy')}}</button>
                  @endif
                  </div>
                  @if (Auth::user() &&  Auth::user()->role_id == 1)
                  <div class="td text-right">
                    <a href="/edit/{{$board->id}}" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f76a47" d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
                    </a>
                  </div>
                  @endif
                </div>
                @endforeach
              
              </div>
            </div>
            <div class="list-review">
            
              @foreach($boards as $board)
              <div class="item"  @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
                <div class="td td-checkbox">
                    <input type="checkbox" name="id[]" @if($board->active == App\Helpers\BoardConstants::INACTIVE) disabled @endif>
                  </div>
                  <div class="td td-code" data-code="351" data-select-month="" style="display: none;">
                    <span class="mb-title">@lang('message.code')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->id }}</a>
                  </div>
                <div class="see-board" @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
                  <div class="slick-boards-theme img @if ($board->image == null && $board->scheme == null) not-slick @endif" data-alias="{{ $board->aleas }}" data-id="{{ $board->bord_id }}"
                  data-img="
                    @if ($board->image != null)
                      {{ "/upload/" . $board->image.$webp }}
                    @endif
                    @if ($board->scheme != null)
                      |{{ "/upload/" . $board->scheme.$webp }}
                    @endif
                  ">
                    @if ($board->image)
                      <div><img loading="lazy" src="{{ "/upload/" . $board->image.$webp }}" alt="board"></div>
                    @endif
                    @if ($board->scheme)
                      <div><img loading="lazy" src="{{ "/upload/" . $board->scheme.$webp }}" alt="board"></div>
                    @endif
                    @if ($board->image == null && $board->scheme == null)
                      <div><img loading="lazy" src="/assets/img/icon_basket_modal.svg" alt="basket"></div>
                    @endif
                  </div>
                  @if ($board->x && $board->y)
                    <div class="show-on-map">
                      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19.03" viewBox="0 0 19 19.03">
                        <defs>
                          <style>
                            .cls-1 {
                              fill: #55bc4f;
                              fill-rule: evenodd;
                            }
                          </style>
                        </defs>
                        <path class="cls-1" d="M411.176,1216.33h1.832v-2.32l2.75-2.2v3.6h1.833v-5.51a0.933,0.933,0,0,0-.52-0.83,0.921,0.921,0,0,0-.969.11l-4.01,3.22-4.01-3.22a0.985,0.985,0,0,0-.575-0.19,0.975,0.975,0,0,0-.57.19l-4.582,3.68a0.9,0.9,0,0,0-.344.71v12.85a0.916,0.916,0,0,0,.916.92,0.931,0.931,0,0,0,.573-0.2l4.582-3.67a0.93,0.93,0,0,0,.344-0.72v-10.94l2.75,2.2v2.32Zm-7.332-2.32,2.749-2.2v10.5l-2.749,2.2v-10.5Zm17.144,12.68-2.328-2.33a4.573,4.573,0,1,0-1.3,1.3l2.328,2.33Zm-6.147-2.1a2.755,2.755,0,1,1,2.75-2.76A2.759,2.759,0,0,1,414.841,1224.59Z" transform="translate(-402 -1208.97)"/>
                      </svg>
                      <span>@lang('message.show_on_map')</span>
                    </div>
                  @endif
                </div>
                <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" class="info-board" target="_blank" @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
                  <p class="location">
                    @if ($board->city_name)
                        {{ $board->city_name }}
                    @endif
                    @if ($board->format)
                      @if ($board->city_name)
                      {{", "}}
                      @endif
                     {{ $board->format }}
                    @endif
                    @if ($board->addr)
                      @if($board->city_name || $board->format)
                      {{", "}}
                      @endif
                      {{ $board->addr }}
                    @endif
                    @if (!$board->city_name && !$board->format && !$board->addr)
                    {{ '-' }}
                    @endif
                  </p>
                  <div class="tbl-ins">
                    <table>
                      <tr>
                        <td class="title-tr">@lang('message.Code')</td>
                        <td class="board_code">{{ $board->bord_id }}</td>
                      </tr>
                      <tr>
                        <td class="title-tr">@lang('message.type')</td>
                        <td>
                          {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }} 
                          @if ($board->format != null)  
                          @php echo ", "; @endphp
                          @endif {{ $board->format }}
                        </td>
                      </tr>
                      <tr>
                        <td class="title-tr">Сторона</td>
                        <td>{{ $board->side_type }}</td>
                      </tr>
                      <tr>
                        <td class="title-tr">@lang('message.light')</td>
                        <td>
                        @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
                          <img class="img" loading="lazy" src="/img/icon_light_on.svg" alt="light on">
                        @else
                          <img class="img" loading="lazy" src="/img/icon_light_off.svg" alt="light off">
                        @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="title-tr">@lang('message.address')</td>
                        <td>
                          @if ($board->addr)
                            {{ $board->addr }}
                          @else
                            {{ '-' }}
                          @endif 
                        </td>
                      </tr>
                      
                      <tr>
                        <td class="title-tr">@lang('message.gid')</td>
                        @if ($board->guide)
                          <td>{{ $board->guide }}</td>
                        @else
                          <td>-</td>
                          @endif
                      </tr>
                      <tr class="mob-view">
                        <td class="title-tr">@lang('message.employment')</td>
                        <td class="busy-line"></td>
                      </tr>
                      <tr class="mob-view">
                        <td class="title-tr">@lang('message.price')</td>
                        @if (setting('front.hidden_price') || !$board->price)
                          <td>{{ setting('front.hidden_price_word') }}</td>
                        @else
                          <td>{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</td>
                        @endif
                      </tr>
                    </table>
                  </div>
                </a>
                <div class="price-busy-board" @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
                @if($board->active == App\Helpers\BoardConstants::INACTIVE)
                  <a href="#" class="cost-board"><td><span>@lang('message.no_data')</span></td></a>
                @else
                  <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" class="price" target="_blank">
                    @if (Auth::user() &&  Auth::user()->role_id == 1)
                      <td>{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</td>
                    @elseif (setting('front.hidden_price') || !$board->price)
                      <td><span>{{ setting('front.hidden_price_word') }}</span></td>
                    @else
                      <p class="cost"><span>{{ $board->price }}</span> {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</p>
                      <p>@lang('message.price_without_nds')<img loading="lazy" src="/img/icon_done.svg" alt="done"></p>
                    @endif
                  </a>
                @endif
                  <div class="busy-calendar">
                    <p class="title">@lang('message.calendar_employment')</p>
                      <div class="calendar" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                    </div>
                  </div>
                    @if ($board->x && $board->y)
                    <div class="show-on-map">
                      <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19.03" viewBox="0 0 19 19.03">
                        <defs>
                          <style>
                            .cls-1 {
                              fill: #55bc4f;
                              fill-rule: evenodd;
                            }
                          </style>
                        </defs>
                        <path class="cls-1" d="M411.176,1216.33h1.832v-2.32l2.75-2.2v3.6h1.833v-5.51a0.933,0.933,0,0,0-.52-0.83,0.921,0.921,0,0,0-.969.11l-4.01,3.22-4.01-3.22a0.985,0.985,0,0,0-.575-0.19,0.975,0.975,0,0,0-.57.19l-4.582,3.68a0.9,0.9,0,0,0-.344.71v12.85a0.916,0.916,0,0,0,.916.92,0.931,0.931,0,0,0,.573-0.2l4.582-3.67a0.93,0.93,0,0,0,.344-0.72v-10.94l2.75,2.2v2.32Zm-7.332-2.32,2.749-2.2v10.5l-2.749,2.2v-10.5Zm17.144,12.68-2.328-2.33a4.573,4.573,0,1,0-1.3,1.3l2.328,2.33Zm-6.147-2.1a2.755,2.755,0,1,1,2.75-2.76A2.759,2.759,0,0,1,414.841,1224.59Z" transform="translate(-402 -1208.97)"/>
                      </svg>
                      <span>@lang('message.show_on_map')</span>
                      </div>
                    @endif
                  <div class="buy-board">
                   @if($board->active == App\Helpers\BoardConstants::INACTIVE)
                    <button class="btn btn-style btn-disables " style="height: 45px;min-width: 210px;;">@lang('message.not_active')</button>
                   @else
                    <button data-id="{{ $board->bord_id }}" class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}">{{ $board->basket ? __('message.in_basket') : __('message.buy_now')}}</button>
                   @endif
                  </div>
                </div>
              </div>
              @endforeach
            
            </div>
            {{--<br /><br />--}}
          </div>

          <div class="add-selected-to-basket"> 
            <button class="to-basket-button">
              <span>@lang('message.add_to_basket2')</span>
            </button>
            <button class="to-favorite-button">
                @lang('message.to_favorite')
            </button>
            <span class="selected-planes-count">
                <span class="text"></span>
                <span class="sum__"></span>
            </span>
          </div>
          @if ($boards->lastPage() > 1)
          <div class="result-paginator" data-manager="{{ $admin }}" data-current-page="{{ $boards->currentPage() }}" data-total-page="{{ $boards->lastPage() }}">
            <button class="btn btn-style btn-show-more">@lang('message.show_more') <span class="board count">20</span> @lang('message.show_more_planes')</button>
            <div class="result-paginator__pages">
              <div class='result-paginator__prev'>
                <i class="fa fa-arrow-left"></i>
                <a href="{!! $boards->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
              </div>
              {{-- добавление параметров сделано чтобы починить пагинатор --}}
              {!! $boards->appends($param)->links() !!}
              <div class='result-paginator__next'>
                <a href="{!! $boards->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                <i class="fa fa-arrow-right"></i>
              </div>                  
            </div>
            @endif
          </div>
@else
          <div class="no-data">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="eye">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8039 40.0001C13.1176 40.5899 13.5653 41.3972 14.1429 42.3536C15.4103 44.4522 17.2859 47.2412 19.7208 50.0188C24.6495 55.6411 31.5208 60.8334 40 60.8334C48.4792 60.8334 55.3505 55.6411 60.2792 50.0188C62.7141 47.2412 64.5898 44.4522 65.8571 42.3536C66.4347 41.3972 66.8824 40.5899 67.1961 40.0001C66.8824 39.4103 66.4347 38.603 65.8571 37.6466C64.5898 35.548 62.7141 32.759 60.2792 29.9814C55.3505 24.3591 48.4792 19.1667 40 19.1667C31.5208 19.1667 24.6495 24.3591 19.7208 29.9814C17.2859 32.759 15.4103 35.548 14.1429 37.6466C13.5653 38.603 13.1176 39.4103 12.8039 40.0001ZM70 40.0001C72.2647 38.9413 72.2643 38.9404 72.2639 38.9395L72.2599 38.931L72.2511 38.9123L72.2213 38.85C72.1961 38.7975 72.1601 38.7235 72.1135 38.6293C72.0204 38.441 71.8845 38.172 71.7066 37.8337C71.3509 37.1575 70.8261 36.2027 70.1372 35.0619C68.7625 32.7855 66.7178 29.7412 64.039 26.6854C58.7404 20.641 50.6117 14.1667 40 14.1667C29.3883 14.1667 21.2596 20.641 15.961 26.6854C13.2822 29.7412 11.2375 32.7855 9.8628 35.0619C9.17386 36.2027 8.64908 37.1575 8.29343 37.8337C8.11551 38.172 7.97965 38.441 7.88647 38.6293C7.83987 38.7235 7.80393 38.7975 7.77871 38.85L7.74893 38.9123L7.74009 38.931L7.73719 38.9372C7.73676 38.9381 7.73529 38.9413 10 40.0001L7.73529 38.9413C7.42157 39.6123 7.42157 40.3879 7.73529 41.0589L10 40.0001C7.73529 41.0589 7.73486 41.058 7.73529 41.0589L7.74009 41.0691L7.74893 41.0878L7.77871 41.1502C7.80393 41.2026 7.83987 41.2767 7.88647 41.3708C7.97965 41.5592 8.11551 41.8282 8.29343 42.1665C8.64908 42.8426 9.17386 43.7975 9.8628 44.9383C11.2375 47.2146 13.2822 50.259 15.961 53.3147C21.2596 59.3591 29.3883 65.8334 40 65.8334C50.6117 65.8334 58.7404 59.3591 64.039 53.3147C66.7178 50.259 68.7625 47.2146 70.1372 44.9383C70.8261 43.7975 71.3509 42.8426 71.7066 42.1665C71.8845 41.8282 72.0204 41.5592 72.1135 41.3708C72.1601 41.2767 72.1961 41.2026 72.2213 41.1502L72.2511 41.0878L72.2599 41.0691L72.2628 41.063C72.2632 41.062 72.2647 41.0589 70 40.0001ZM70 40.0001L72.2647 41.0589C72.5784 40.3879 72.5776 39.6105 72.2639 38.9395L70 40.0001Z" fill="#3D445C"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M40.0007 35.8333C37.6995 35.8333 35.834 37.6987 35.834 39.9999C35.834 42.3011 37.6995 44.1666 40.0007 44.1666C42.3018 44.1666 44.1673 42.3011 44.1673 39.9999C44.1673 37.6987 42.3018 35.8333 40.0007 35.8333ZM30.834 39.9999C30.834 34.9373 34.938 30.8333 40.0007 30.8333C45.0633 30.8333 49.1673 34.9373 49.1673 39.9999C49.1673 45.0625 45.0633 49.1666 40.0007 49.1666C34.938 49.1666 30.834 45.0625 30.834 39.9999Z" fill="#3D445C"/>
            </svg>
            <span class="no-data-title">
              @lang('message.no_date_in_you_watch')
            </span>
            <span class="no-data-text">
              @lang('message.no_data_in_you_watch2')
            </span>
          </div>
@endif
        </div>
      </div>
    </div>
  </section>
<!-- RESULT SEARCH (END) -->



<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

@include('add.footer')
<div id='show-map-modal' class="modal">
  <div id="map-modal-board"></div>
</div>
<style>
.btn-disables,
.btn-disables:hover{
    height: 29px;
    font-size: 13px;
    line-height: 27px;
    max-width: 96px;
    width: 96px;
    /*background: #f9f9f9;*/
    background: #e9e9e9;
    /*color: #ddd;*/
    cursor:default !important;
}
.hidden-price{
    background:#f0f0f0;
}
#result-search-list .container-search-result{
    padding-top: 0px;
    padding-bottom:0px;
    background: #fff;
}
#result-search-list h1.title-search-result{
    font-family: Helvetica Neue;
    font-style: normal;
    font-weight: normal;
    font-size: 34px;
    line-height: 41px;
}

#result-search-list .add-selected-to-basket{
    flex-direction: row-reverse;
}
#result-search-list .add-selected-to-basket button{
    background: #FC6B40;
}
#result-search-list .add-selected-to-basket button span{
    margin-right: 0;
}
.favorite-viewed-tab{
    border-bottom: solid 1px #cdd4d9;
    margin: 0 20px 20px;
}
.favorite-viewed-tab a{
    font-family: Helvetica Neue;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #FC6B40;
    padding-bottom: 7px;
    display: inline-block;
    margin-right: 20px;
    border-bottom: 2px solid rgba(0,0,0,0);
}
.favorite-viewed-tab a:hover,
.favorite-viewed-tab a.active{
    border-bottom: 2px solid #fc6b40;
    color: #3D445C; 
}
#result-search-list .result-list .table-result .thead .tr .td{
    border-bottom: solid 1px #e8ebf1;
}
#result-search-list .result-list .table-result .tbody .tr .td.td-checkbox{
    padding-left:10px;
}
#result-search-list .result-list .table-result .tbody .tr:last-child .td{
    border-bottom: solid 1px #e8ebf1;
}
.selected-planes-count{
    display: inline-block;
    margin-right: 24px;
}
.selected-planes-count .text{
    display:block;
    padding-bottom: 8px;
}
.selected-planes-count .sum__{
    display:block;
    font-family: Helvetica Neue;
    font-style: normal;
    font-weight: bold;
    font-size: 15px;
    line-height: 18px;
    text-align: right;
}
.al-line-checked{
    background: #FFF0EC;
}
#result-search-list .add-selected-to-basket button.to-basket-button{
    padding: 13px 24px;
    width: 178px;
    height: 42px;
    background: #FC6B40;
    border-radius: 4px;
    font-family: Helvetica Neue;
    font-style: normal;
    font-weight: bold;
    font-size: 13px;
    line-height: 16px;
    color: #FFFFFF;
}
#result-search-list .add-selected-to-basket button.to-favorite-button{
    padding: 13px 24px;
    width: 130px;
    height: 42px;
    border: 1px solid #CDD4D9;
    box-sizing: border-box;
    border-radius: 4px;
    font-family: Helvetica Neue;
    font-style: normal;
    font-weight: bold;
    font-size: 13px;
    line-height: 16px;
    color: #3D445C;
    background: #fff;
    margin-right: 10px;
}
.no-data{
    background: #F6F7F9;
    border-radius: 4px;
    height: 254px;
    text-align: center;
    margin: 20px;
    box-sizing: border-box;
    padding-top: 44px;
}
.eye{
  margin: 0px auto 17px;
  display: block;
}
.no-data-title{
  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 21px;
  text-align: center;
  color: #3D445C;
  margin: 17px auto 11px;
  display: block;
}
.no-data-text{
  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: normal;
  font-size: 13px;
  line-height: 16px;
  text-align: center;
  color: #8B8F9D;
}
</style>