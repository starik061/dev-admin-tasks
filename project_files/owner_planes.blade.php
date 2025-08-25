@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
/*if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' )!== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' )!== false ) {
   $webp = ".webp";
}*/


if(!$_COOKIE['currency']){
    $_COOKIE['currency'] = 'uah';
}
switch($_COOKIE['currency']){
    case 'uah': $_COOKIE['currency_symbol'] = '&#8372;'; break;
    case 'usd': $_COOKIE['currency_symbol'] = '&#36;'; break;
    case 'eur': $_COOKIE['currency_symbol'] = '&euro;'; break;
}

@endphp
  <section id="result-search-map">
<!-- autocomplete -->
<!-- https://maps.googleapis.com/maps/api/place/queryautocomplete/json?input=%D0%A1%D0%B5%D0%B4%D0%BE%D0%B2%D0%B0&radius=200000&key=AIzaSyDz2s29ChsjKNAecWarcoSx76by6WDSiXw -->
    
    <div class="container-fluid container-fluid-base container-fluid-map 
      @if (Auth::user() && Auth::user()->role_id == 1)
        {{ 'search-filter-manager' }}
      @endif

      @if (Auth::user())
        {{ 'user-registered' }}
      @endif
    ">
    <div style="display: none;">
        <select id="data-operators-search" style="display: none;">
            <option value="{{ Auth::user()->firm_id }}" selected data-val="{{ Auth::user()->firm_id }}">Your firm</option>
        </select>
    </div>
    {{--
      <div class="search-map" style="display: none;">
        <div class="wrapper-over">
          <div class="search">
            @if (Auth::user() && Auth::user()->role_id == 1) 
              @include('add.filter_manager')
            @else
              @include('add.filter')
            @endif
          </div>
        </div>
      </div>
    --}}
      <input id="pac-input" class="controls       
      @if (Auth::user() && Auth::user()->role_id == 1)
        {{ 'visible' }}
      @endif" 
      type="text" placeholder="Найти адрес на карте" style="display: none;"/>
    
<!--       <input type="button" id="pac-search" value="Поиск" class=" -->
<!--       @if (Auth::user() && Auth::user()->role_id == 1) -->
<!--         {{ 'visible' }} -->
<!--       @endif"  -->
<!--       /> -->
    {{--
      <span id="selRadius" class="controls">
        Выбранный радиус: <br>
        <span></span>м.
      </span>
    --}}
    {{--
    <div class="control-group" style="/*margin-top: 48px;*/">
      @if (Auth::user() && Auth::user()->role_id == 1)
        <input id="radius-input" class="controls" type="text" placeholder="Радиус (м)"/>

        <button id="showOnMap">Найти на карте</button>

        <button id="getViewMarkers" title="Поиск точек которые попадают в зону видимости текущего зума по карте">@lang('message.visible')</button>

        <button id="getSelMarkers" title="Поиск точек, которые были выделены каким либо инструментом (окружность или полигон)">@lang('message.selections')</button>

        <button id="getInverse" title="Инверсия">@lang('message.invert_selections')</button>

        <button id="delFigures" title="Удалить нарисованную фигуру">@lang('message.remove_figures')</button>
      @endif
    </div>
    --}}

      <div id="map-global-search" style="/*margin-top: 48px;*/"></div>

      <div class="collapse-map">
        <div class="wrapper-over">
          <span>@lang('message.hide_map')</span>
        </div>
      </div>
      @include('add.overmap')
      <div class="set-label-view">
        <div class="wrapper-over">
          <div class="mob-view-map">
            <div class="wrapp">
              <span>@lang('message.view_setting')</span>
              <span><img loading="lazy" src="/img/map-marker.svg" alt="map-marker" height="21px"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="result-search-list">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters">
        <div 
          class="container container-base container-search-result
            @if (Auth::user() && Auth::user()->role_id == 3) 
                manager-search
              @endif
          "
        >
          <h1 class="title-search-result">
            @lang('message.planes')
          </h1>
          <div class="view-board">
            <div class="total-find-board">
              <p>@lang('message.found'): <span>{{ $total }}</span></p>
              <div class="legend">
                <ul>
                  
                  <li><i class="fa fa-circle select" aria-hidden="true"></i> — @lang('message.free_')</li>
                  <li><i class="fa fa-circle reserve" aria-hidden="true"></i> — @lang('message.reserve')</li>
                  <li><i class="fa fa-circle pre-order" aria-hidden="true"></i> — @lang('message.predzakaz')</li>
                  <li><i class="fa fa-circle busy" aria-hidden="true"></i> — @lang('message.busy')</li>
                </ul>
              </div>
            </div>
            <div class="legend-view">
              <div class="view-rs-list">
                <div class="list">
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="511.63px" height="511.631px" viewBox="0 0 511.63 511.631" style="enable-background:new 0 0 511.63 511.631;"
                    xml:space="preserve">
                  <g>
                    <g>
                      <path d="M493.356,274.088H18.274c-4.952,0-9.233,1.811-12.851,5.428C1.809,283.129,0,287.417,0,292.362v36.545
                        c0,4.948,1.809,9.236,5.424,12.847c3.621,3.617,7.904,5.432,12.851,5.432h475.082c4.944,0,9.232-1.814,12.85-5.432
                        c3.614-3.61,5.425-7.898,5.425-12.847v-36.545c0-4.945-1.811-9.233-5.425-12.847C502.588,275.895,498.3,274.088,493.356,274.088z"
                        />
                      <path d="M493.356,383.721H18.274c-4.952,0-9.233,1.81-12.851,5.427C1.809,392.762,0,397.046,0,401.994v36.546
                        c0,4.948,1.809,9.232,5.424,12.854c3.621,3.61,7.904,5.421,12.851,5.421h475.082c4.944,0,9.232-1.811,12.85-5.421
                        c3.614-3.621,5.425-7.905,5.425-12.854v-36.546c0-4.948-1.811-9.232-5.425-12.847C502.588,385.53,498.3,383.721,493.356,383.721z"
                        />
                      <path d="M506.206,60.241c-3.617-3.612-7.905-5.424-12.85-5.424H18.274c-4.952,0-9.233,1.812-12.851,5.424
                        C1.809,63.858,0,68.143,0,73.091v36.547c0,4.948,1.809,9.229,5.424,12.847c3.621,3.616,7.904,5.424,12.851,5.424h475.082
                        c4.944,0,9.232-1.809,12.85-5.424c3.614-3.617,5.425-7.898,5.425-12.847V73.091C511.63,68.143,509.82,63.861,506.206,60.241z"/>
                      <path d="M493.356,164.456H18.274c-4.952,0-9.233,1.807-12.851,5.424C1.809,173.495,0,177.778,0,182.727v36.547
                        c0,4.947,1.809,9.233,5.424,12.845c3.621,3.617,7.904,5.429,12.851,5.429h475.082c4.944,0,9.232-1.812,12.85-5.429
                        c3.614-3.612,5.425-7.898,5.425-12.845v-36.547c0-4.952-1.811-9.231-5.425-12.847C502.588,166.263,498.3,164.456,493.356,164.456z
                        "/>
                    </g>
                  </g>
                  </svg>
                </div>
                <div class="list-preview">
                  <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 174.239 174.239" style="enable-background:new 0 0 174.239 174.239;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M174.239,174.239H96.945V96.945h77.294V174.239z M111.88,159.305h47.425V111.88H111.88V159.305z"/>
                    </g>
                    <g>
                      <path d="M77.294,174.239H0V96.945h77.294V174.239z M14.935,159.305H62.36V111.88H14.935V159.305z"/>
                    </g>
                    <g>
                      <path d="M174.239,77.294H96.945V0h77.294V77.294z M111.88,62.36h47.425V14.935H111.88V62.36z"/>
                    </g>
                    <g>
                      <path d="M77.294,77.294H0V0h77.294V77.294z M14.935,62.36H62.36V14.935H14.935V62.36z"/>
                    </g>
                  </g>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="result-list">
            <div class="table-result">
              <div class="thead">
                <div class="tr">
                    {{--
                    <div class="td td-checkbox"><input id="selectAll" type="checkbox" ></div>
                    --}}
                    <div class="td td-firm">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.code')</a>
                    </div>
                    <div class="td td-code">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.site_code')</a>
                    </div>
                   
                    <!-- manager -->
                    <div class="td td-city">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.city')</a>
                    </div>
                    
                    <!--  -->
                  
                    <div class="td td-type">
                      <a href="{{ "{$url_full}{$connector}order=type" }}{{ $order_field == "type" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.type_')</a>
                    </div>
                    <div class="td td-type">
                      @lang('message.format')
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
                      
                    
                    <div class="td td-photo">
                        <a href="{{ "{$url_full}{$connector}order=image" }}{{ $order_field == "image" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.photo')</a>
                    </div>
                    
                    <div class="td">@lang('message.on_map')</div>
                    <div class="td td-original-price">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.price')</a>
                    </div>
                    <div class="td td-busy">занятость</div>
                   
                    
                    <div class="td td-changed">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.change')</a>
                    </div>
                    <div class="td td-action"></div>
                </div>
              </div>
              <div class="tbody">
              @if(isset($boards) && !empty($boards))
               @foreach($boards as $board)
                <div class="tr" @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
                    {{--
                    <div class="td td-checkbox">
                        <input type="checkbox" name="id[]" @if($board->active == 'false') disabled @endif>
                    </div>
                    --}}
                    <div class="td td-firm">
                        <span class="mb-title">@lang('message.firm')</span>
                        <a style="cursor:pointer" class="conteact_open" data-id="{{$board->firm}}">{{ $board->code }}</a>
                    </div>
                    <div class="td td-code" data-code="351" data-select-month="">
                        <span class="mb-title">@lang('message.code')</span>
                        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->id }}</a>
                    </div>
                    <div class="td td-city">
                        <span class="mb-title">@lang('message.city')</span>
                        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->city_name }}</a>
                    </div>
                    
                  <!--  -->
                  
                  <div class="td td-type">
                    <span class="mb-title">@lang('message.type_')</span>
                    <a href="{{ $data['lang_url']}}/{{ $board['aleas'] }}" aria-describedby="tooltip" 
                      @if ($board->image != null)
                        class="hoverImg"
                      @endif
                        title="" 
                        data-width="450px" 
                        data-height="200px" 
                        data-image="@if ($board->image != null){{ "/upload/" . $board->image.$webp }}@endif" target="_blank">
                                      
                      {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }} 
                      
                    </a>
                  </div>
                  <div class="td">
                    {{ $board->format }}
                  </div>
                  <div class="td td-adress">
                    <span class="mb-title">@lang('message.address_')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">
                    
                      @if ($board->city_name)
                        @if (Auth::guest() || Auth::user() && Auth::user()->role_id != 3)
                          {{ $board->city_name }}
                        @endif
                      @endif

                      @if ($board->addr)
                        @if($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id != 3) || $board->format && (Auth::guest() || Auth::user() && Auth::user()->role_id != 1))
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
                    
                    
                  <!--  -->
                  
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
                  <div class="td">
                    @if($board->x) да @else нет @endif
                  </div>
                  <div class="td td-original-price">
                      <span class="mb-title">@lang('message.in_price')</span>
                      <a href="{{ asset($board['aleas']) }}" target="_blank">{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
                      
                  </div>
                  <div class="td td-busy" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                    <span class="mb-title">@lang('message.employment_')</span>
                  </div>
                   
                    
                    @php
                        $date = explode('-',explode(' ',$board->updated_at)[0]);
                        $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
                    @endphp
                    <div class="td td-changed">
                      <span class="mb-title">@lang('message.change')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $str_date }}</a>
                    </div>
                  
                  
                  <div class="td text-right">
                    <a href="/planes/edit/{{$board->id}}" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f76a47" d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
                    </a>
                  </div>
                  
                </div>
                @endforeach
              @endif
              </div>
            </div>
            <div class="list-review">
            @if(isset($boards) && !empty($boards))
              @foreach($boards as $board)
              <div class="item"  @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
                  <div class="td td-code" data-code="351" data-select-month="" style="display: none;">
                    <span class="mb-title">@lang('message.code')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" target="_blank">{{ $board->code }}</a>
                  </div>  
                  <div class="td td-code" data-code="351" data-select-month="" style="display: none;">
                    <span class="mb-title">@lang('message.site_code2')</span>
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
                    @if ($board->addr)
                      @if($board->city_name)
                      {{", "}}
                      @endif
                      {{ $board->addr }}
                    @endif
                    @if (!$board->city_name && !$board->addr)
                    {{ '-' }}
                    @endif
                  </p>
                  <div class="tbl-ins">
                    <table>
                      <tr>
                        <td class="title-tr">@lang('message.Code')</td>
                        <td class="board_code">{{ $board->code }}</td>
                      </tr>
                      <tr>
                        <td class="title-tr">@lang('message.site_code2')</td>
                        <td class="board_code">{{ $board->id }}</td>
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
                        <td>{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</td>
                      </tr>
                    </table>
                  </div>
                </a>
                <div class="price-busy-board" @if($board->active == App\Helpers\BoardConstants::INACTIVE) style="background: #f9f9f9;"  @endif>
               
                  <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" class="price" target="_blank">
                    
                      <p class="cost"><span>{{ $board->start_price }}</span> {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</p>
                      
                    
                  </a>
                
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
                  
                </div>
              </div>
              @endforeach
            @endif
            </div>
            <br /><br />
              <div class="basket_manager-controls">
                <div class="export-excel2 selected-btn  mobile-hide">
                    <img src="https://img.icons8.com/fluent/24/000000/microsoft-excel-2019.png" alt="excel" />
                    <a href="/export-xls">Експорт в xls</a>
                </div>
              </div>
          </div>
          
          {{--
          <div class="add-selected-to-basket"> 
            <button class="to-basket-button">
              <span>@lang('message.add_to_basket2')</span>
            </button>
          </div>
          --}}
          @if ($boards->lastPage() > 1)
          <div class="result-paginator" data-manager="{{ $admin }}" data-current-page="{{ $boards->currentPage() }}" data-total-page="{{ $boards->lastPage() }}">
            {{--
            <button class="btn btn-style btn-show-more">@lang('message.show_more') <span class="board count">20</span> @lang('message.show_more_planes')</button>
            --}}
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
            <br />
          </div>
          
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


#result-search-list .add-selected-to-basket{
    /*flex-direction: row-reverse;*/
}
#result-search-list .add-selected-to-basket button{
    background: #FC6B40;
}
#result-search-list .add-selected-to-basket button span{
    margin-right: 0;
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
#result-search-list .container-search-result{
    padding-top: 0;
}
.busy-calendar{
    left: -140px;
}
#result-search-list .result-list .table-result .tbody .td-busy .busy-calendar::before{
    left: 159px;
}
.basket_manager-controls{
    padding: 25px 30px;
    /*display: none;*/
}
</style>
<script>


      
</script>