@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@if(Auth::user() && Auth::user()->role_id == 1 )
<script>
const isAdm = true;
</script>
@endif
@php

$webp = "";
if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' )!== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' )!== false ) {
   $webp = ".webp";
}

$blank = '';
if (Auth::user() && Auth::user()->isManagerSearchable()){
    $blank = 'target="_blank"';
}

if(!$_COOKIE['currency']){
    $_COOKIE['currency'] = 'uah';
}
switch($_COOKIE['currency']){
    case 'uah': $_COOKIE['currency_symbol'] = '&#8372;'; break;
    case 'usd': $_COOKIE['currency_symbol'] = '&#36;'; break;
    case 'eur': $_COOKIE['currency_symbol'] = '&euro;'; break;
}

$fo = @$_COOKIE['openFilterMobile'];
$mo = @$_COOKIE['openMapMobile'];

$isMobile = false;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
    $isMobile = true;
}
$show = @$_COOKIE['viewBoardSearch'];

$listPreview = false;
if(!$show && $isMobile){
    $listPreview = true;
}

@endphp
@if($listPreview)
<script>
document.cookie = 'viewBoardSearch=list-preview; Path=/; Expires=Fri, 31 Dec 9999 23:59:59 GMT;';
</script>
@endif

  <script>
      const canViewApproximatedPrice = @can('view-approximated-prices') 1  @else 0 @endcan ;
      const viewSuppliersInSearch = @can('view-suppliers-in-search') 1  @else 0 @endcan ;
  </script>
  <section id="result-search-map">
    @if (Auth::user() && Auth::user()->isManagerSearchable())
    <div class="search-filter-button">
        <span>Фильтр</span>
        <div class="arrow @if(!$fo || $fo == 'false') arrow-disclose-down @else arrow-disclose-up @endif"></div>
    </div> 
      <div id="selected-filters" class="@if(!$fo || $fo == 'false') mobile-hide @endif">
        <div class="selected-region"></div>
        <div class="selected-cities"></div>
        <div class="selected-district"></div>
        <div class="selected-operators"></div>
        <div class="selected-boards_status"></div>
        <div class="selected-types"></div>
        <div class="selected-side"></div>
        <div class="selected-period"></div>
        <div class="selected-employment"></div>
      </div>
    @endif
    <div class="container-fluid container-fluid-base container-fluid-map 
      @if(Auth::user() && Auth::user()->isManagerSearchable())
        {{ 'search-filter-manager' }}
      @endif

      @if(Auth::user())
        {{ 'user-registered' }}
      @endif
    ">
    @php
    $tmp_fo = $fo;
        if(!Auth::user()){
            $fo = 'true';
        }
    @endphp
      <div class="search-map @if(!$fo || $fo == 'false') mobile-hide @endif"
        @if(!(Auth::user() && Auth::user()->isManagerSearchable()))
          style="position: relative"
        @endif>
    @php
        $fo = $tmp_fo;
    @endphp
        <div class="wrapper-over">
          <div class="search">
            @if (Auth::user() && Auth::user()->isManagerSearchable())
              @include('add.filter_manager')
            @else
              @include('add.filter')
            @endif
          </div>
        </div>
      </div>
   <div class="search-map-button">
        <span>Карта</span>
        {{--<div class="arrow @if(!$mo || $mo == 'false') arrow-disclose-down @else arrow-disclose-up @endif"></div>--}}
        <div class="arrow @if($mo == 'false') arrow-disclose-down @else arrow-disclose-up @endif"></div>
    </div>  
      <input id="pac-input" class="controls       
      @if (Auth::user() && Auth::user()->isManagerSearchable())
        @if(!$mo || $mo == 'false')
            mobile-hide
        @endif
        {{ 'visible' }}
      @endif" 
      type="text" placeholder="Найти адрес"/>
      <input type="button" id="pac-search" value="Найти на карте" class="
      @if (Auth::user() && (Auth::user()->role_id == 1 || Auth::user()->role_id == 2))
        @if(!$mo || $mo == 'false')
            mobile-hide
        @endif
        {{ 'visible' }}
      @endif" 
      />

      <span id="selRadius" class="controls">
        Выбранный радиус: <br>
        <span></span>м.
      </span>

    <div class="control-group @if(!$mo || $mo == 'false') mobile-hide @endif ">
      @if (Auth::user() && Auth::user()->isManagerSearchable())

        <input id="radius-input" class="controls" type="text" placeholder="Радиус (м)"/>

        <button id="showOnMap">Найти на карте</button>

        <button id="getViewMarkers" title="Поиск точек которые попадают в зону видимости текущего зума по карте">@lang('message.visible')</button>

        <button id="getSelMarkers" title="Поиск точек, которые были выделены каким либо инструментом (окружность или полигон)">@lang('message.selections')</button>

        <button id="getInverse" title="Инверсия">@lang('message.invert_selections')</button>

        <button id="delFigures" title="Удалить нарисованную фигуру">@lang('message.remove_figures')</button>
      @endif
    </div>
      @if (Auth::user() && Auth::user()->id == 1)   
      <div id="map-global-search" class="eugene @if(!$mo || $mo == 'false') mobile-hide @endif"></div>
      @else
      {{--<div id="map-global-search" class="@if(!$mo || $mo == 'false') mobile-hide @endif"></div>--}}
      <div id="map-global-search" class="@if($mo == 'false') mobile-hide @endif"></div>
      @endif

      <div class="collapse-map  mobile-hide">
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
            @if (Auth::user() && Auth::user()->isManagerSearchable())
                manager-search
              @endif
          "
          @if(Auth::user() && Auth::user()->isManagerSearchable())
          style="padding-top:0"
          @endif
        >
          @if(!$admin)
          <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
          </h1>
          @endif
          @if(!Auth::user() || !Auth::user()->isManagerSearchable())
          @include('add.sub_filter')
          @endif
          <div class="view-board">
            <div class="total-find-board">
              <p>@lang('message.found'): 
				  <span>{{ $total }}</span>
				  @if (Auth::user() && Auth::user()->isManagerSearchable())
				  	<button id="addAll">Добавить все</button>
{{--                    <button id="watchAll" data-registered="{{ Auth::user() ? 'true' : 'false' }}">Наблюдать</button>--}}
                @endif
				</p>
              <div class="legend">
                <ul>
                @if (Auth::user() && Auth::user()->isManagerSearchable())
                  <li><i class="fa fa-circle hidden_price" aria-hidden="true"></i> — цена скрыта</li>   
                @endif
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
                  <div class="td td-checkbox"><input type="checkbox" ></div>
                  <div class="td td-code">
                    <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.code')</a>
                  </div>
                  @if (Auth::user() && Auth::user()->isManagerSearchable())
                    <!-- manager -->
                    <div class="td td-city">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.city')</a>
                    </div>
                    @can('view-suppliers-in-search')
                    <div class="td td-firm">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.firm_code')</a>
                    </div>
                    @endcan
                    <!--  -->
                  @endif
                    <div class="td td-type">
                      <a href="{{ "{$url_full}{$connector}order=type" }}{{ $order_field == "type" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.type_')</a>
                    </div>
                    <div class="td td-adress">
                      <a href="{{ "{$url_full}{$connector}order=addr" }}{{ $order_field == "addr" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.address_')</a>
                    </div>
                    <div class="td td-side">
                      <a href="{{ "{$url_full}{$connector}order=side" }}{{ $order_field == "side" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.side')</a>
                    </div>
                    <div class="td td-light">
                      <a href="{{ "{$url_full}{$connector}order=light" }}{{ $order_field == "light" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.light_')</a>
                    </div>
                    @if (Auth::user() && Auth::user()->isManagerSearchable())
                    <!-- manager -->
                      <div class="td td-gid">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.gid')</a>
                      </div>
                      <div class="td td-doors">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">Doors</a>
                      </div>
                      <div class="td td-ots">
                        <a href="{{ "{$url_full}{$connector}order=ots" }}{{ $order_field == "ots" && $order_type == 'asc' ? "&dir=desc" : null}}">OTS</a>
                      </div>
                      <div class="td td-grp">
                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">GRP</a>
                      </div>

                      <div class="td td-additionally">
                        Коорд.
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
                  <div class="td td-busy">занятость</div>
                  @if (Auth::user() && in_array(Auth::user()->role_id, [1,2,5,7]))
                    @can('view-approximated-prices')
                      <div class="td td-supplier-price">
                        <a>@lang('message.boards_table_cost')</a>
                      </div>
                    @endcan
                    <div class="td td-original-price">
                      <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.boards_table_price_from_file')</a>
                    </div>

                      @can('view-approximated-prices2')
                        <div class="td td-supplier-price">
                          <a>@lang('message.boards_table_price')</a>
                        </div>
                      @endcan
                      <div class="td td-supplier-price">
                      </div>
                  @else
                    <div class="td td-price">
                      <a href="{{ "{$url_full}{$connector}order=price" }}{{ $order_field == "price" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.price_')</a></div>
                    <div class="td td-buy"></div>
                  @endif
                  @if (Auth::user() && Auth::user()->isManagerSearchable())
                  <div class="td"></div>
                  @endif
                </div>
              </div>
              <div class="tbody">
              @if(isset($boards) && !empty($boards))
               @foreach($boards as $board)
                <div class="tr" @if($board->active != App\Helpers\BoardConstants::ACTIVE || $board->zmia_inactive == '1') style="background: #f9f9f9;" @else @if($board->coords_by_site == "1" && Auth::user() && Auth::user()->role_id == 1) style="background: #ffffdd;" @endif @endif>
                  <div class="td td-checkbox">
                    <input type="checkbox"  
                        @if($board->active != App\Helpers\BoardConstants::ACTIVE)
                            @if(!Auth::user() || @Auth::user()->role_id > 3) 
                            disabled 
                            @endif
                        @endif 
                        data-id="{{$board->bord_id}}">
                  </div>
                  <div class="td td-code" data-code="351" data-select-month="">
                    <span class="mb-title">@lang('message.code')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" >{{ $board->bord_id }} @if (Auth::user() && Auth::user()->isManagerSearchable() && $board->duplicate_new) ({{$board->duplicate_new}}) @endif</a>
                  </div>
                  @if (Auth::user() && Auth::user()->isManagerSearchable())
                  <!-- for manager -->
                    <div class="td td-city">
                      <span class="mb-title">@lang('message.city')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->city_name }}</a>
                    </div>
                    @can('view-suppliers-in-search')
                    <div class="td td-firm">
                      <span class="mb-title">@lang('message.firm')</span>
                      <a style="cursor:pointer" class="conteact_open" data-id="{{$board->firm}}">{{ $board->firm_name }} - {{ $board->code }}
                      </a>
                    </div>
                    @endcan
                  <!--  -->
                  @endif
                  <div class="td td-type">
                    <span class="mb-title">@lang('message.type_')</span>
                    @if (Auth::user() && Auth::user()->isManagerSearchable())
                      <a href="{{ $data['lang_url']}}/{{ $board['aleas'] }}" aria-describedby="tooltip" 
                        @if ($board->image != null)
                            class="hoverImg"
                        @endif
                        title="" 
                        data-width="450px" 
                        data-height="200px" 
                        data-image="@if ($board->image != null){{ "/upload/" . $board->image . $webp }}@endif" {{$blank}}>
                    @else
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>
                    @endif
                   
                      {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }}{{$board->format != null ? ", " : ""}} 
                      {{ $board->format }}
                    </a>
                  </div>
                  <div class="td td-adress">
                    <span class="mb-title">@lang('message.address_')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>
                    
                      @if ($board->city_name)
                        @if (Auth::guest() || Auth::user() && Auth::user()->role_id > 2)
                          {{ $board->city_name }}
                        @endif
                      @endif
                      {{--
                      @if ($board->format)
                        @if ($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2))
                          {{", "}}
                        @endif
                        {{ $board->format }}
                      @endif
                      --}}
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
                  <div class="td td-side text-center">
                    <span class="mb-title">@lang('message.side')</span>
                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->side_type }}</a>
                  </div>
                  <div class="td td-light text-center">
                    <span class="mb-title">@lang('message.light_')</span>
                    @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
                      <div class="image-wrapper">
                        <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}><img class="img" loading="lazy" src="/img/icon_light_on.svg" alt="light on"></a>
                        <p class="light-info">
                          @lang('message.light') - <span>@lang('message.exist')</span>
                        </p>
                      </div>
                    @else
                      <div class="image-wrapper">
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}><img class="img" loading="lazy" src="/img/icon_light_off.svg" alt="light off"></a>
                        <p class="light-info">
                          @lang('message.light') - <span>@lang('message.no_light')</span>
                        </p>
                      </div>
                    @endif
                  </div>
                  @if (Auth::user() && Auth::user()->isManagerSearchable() )
                  <!-- for managers -->
                    <div class="td td-gid">
                      <span class="mb-title">@lang('message.gid')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->guide }}{!! $board->district ? ($board->guide ? '<br>' : '').__('message.district').': '.$board->district->name : '' !!}</a>
                    </div>
                    <div class="td td-doors">
                      <span class="mb-title">Doors</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->doors }}</a>
                    </div>
                    <div class="td td-ots">
                      <span class="mb-title">OTS</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->ots }}</a>
                    </div>
                    <div class="td td-grp">
                      <span class="mb-title">GRP</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->grp }}</a>
                    </div>

                      <div class="td td-additionally">
                        <span class="mb-title">Координаты</span>
                        @if($board['x']) <img src="/assets/img/coordinates.svg"/> Есть @endif
                      </div> 

                    <div class="td td-additionally">
                      <span class="mb-title">@lang('message.additional')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $board->addition }}</a>
                    </div>
                    @php
                        $date = explode('-',explode(' ',$board->updated_at)[0]);
                        $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
                    @endphp
                    <div class="td td-changed">
                      <span class="mb-title">@lang('message.change')</span>
                      <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" {{$blank}}>{{ $str_date }}</a>
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
                  <div class="td td-busy" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                    <span class="mb-title">@lang('message.employment_')</span>
                  </div>
                  
                  @if (Auth::user() && Auth::user()->isManagerSearchable())
                    @can('view-approximated-prices')
                      @php
                      $priceTitle = '';
                      if($board->approximated_by_fixed_price){
                        $priceTitle = 'Фіксована ціна / знижка';
                      }elseif($board->approximated_by_region){
                        $priceTitle = 'Середня ціна по регіону для даного типу, сторони та підсвічування';
                      }elseif($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date){
                        $priceTitle = 'Собівартість';
                      }elseif($board->approximated_supplier_price){
                        $priceTitle = 'Розрахункова собівартість для власника';
                      }
                      @endphp
                      <div class="td al-power-tip td-supplier-price @if($board->approximated_by_fixed_price) by_fixed @else @if($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date) by_cost @else @if($board->approximated_supplier_price > 0) by_median @endif @endif @endif @if($board->approximated_by_region || ($board->firm == 302 && !$board->approximated_supplier_price_by_cost_date)) by_region @endif"
                           @if($priceTitle) title="{{$priceTitle}}" @endif
                      >
                        {{ $board->approximated_supplier_price }} ₴
                      </div>
                    @endcan
                    <div class="td td-original-price">
                      <span class="mb-title">@lang('message.in_price')</span>
                      @if($board->active != App\Helpers\BoardConstants::ACTIVE)
                      <a href="{{ asset($board['aleas']) }}" {{$blank}}>@lang('message.no_data')</a>
                      @else
                      <a href="{{ asset($board['aleas']) }}" {{$blank}}>{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
                      @endif
                    </div>
                      @can('view-approximated-prices2')
                        <div class="td td-supplier-price">
                          {{ $board->approximated_selling_price }} ₴
                        </div>
                      @endcan
                  @else
                  <div class="td td-price text-right  @if (Auth::user() && Auth::user()->role_id < 3 && $board->hidden_price) hidden-price @endif"">
                    <span class="mb-title">цена</span>
                    @if($board->active != App\Helpers\BoardConstants::ACTIVE && !(Auth::user() && Auth::user()->isManagerSearchable()))
                        <a href="#" class="cost-board">@lang('message.no_data')</a>
                    @else
                        @if (Auth::user() &&  Auth::user()->role_id < 3)
                            <a href="#" class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
                        @elseif (setting('front.hidden_price') || !$board->price)
                            <a href="#" class="cost-board">@lang('message.hidden_price_word')</a>
                        @else
                            <a href="#" class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
                        @endif
                    @endif
                  </div>
                  @endif

                    @if (Auth::user() && Auth::user()->isManagerSearchable())
                    @php
                      $statusSymbol = null;
                      $statusName = null;
                      $firm = \App\Firm::find($board->firm);
                      $supplier = $firm->supplier ?? null;

                      if ($supplier) {
                          $statusId = $supplier->status_id;
                          $statusName = $supplier->status
                              ? $supplier->status->getTranslatedAttribute('name', app()->getLocale(), 'ru')
                              : null;

                          if ($statusId === 1) {
                              $statusSymbol = '💚';
                          } elseif ($statusId === 3) {
                              $statusSymbol = '⛔️';
                          }
                      }
                    @endphp
                    <div class="td td-firm"
                         @if($statusName)
                           title="{{ $statusName }}"
                            @endif>
                      <a style="cursor:pointer" class="conteact_open" data-id="{{$board->firm}}">{{ $statusSymbol }}
                      </a>
                    </div>
                    @endif

                  <div class="td td-buy text-right">
                  @if($board->active != App\Helpers\BoardConstants::ACTIVE && !(Auth::user() && Auth::user()->isManagerSearchable()))
                    <button class="btn btn-style btn-disables ">Не активно</button>
                  @else
                    <button data-id="{{ $board->bord_id }}" class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}">{{ $board->basket ? __('message.in_basket') : __('message.buy')}}</button>
                  @endif
                  </div>
                  @if (Auth::user() && in_array(Auth::user()->role_id, [1,2,5]))
                  <div class="td text-right">
                    <a href="/edit/{{$board->id}}" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f76a47" d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/></svg>
                    </a>
                  </div>
                  @endif
                </div>
                @endforeach
              @endif
              </div>
            </div>
            <div class="list-review">
            @if(isset($boards) && !empty($boards))
              @foreach($boards as $board)
              <div class="item @if($board->active != App\Helpers\BoardConstants::ACTIVE) inactive-item @endif" @if($board->active != App\Helpers\BoardConstants::ACTIVE) style="background: #f9f9f9;"  @endif>
                <div class="see-board" @if($board->active != App\Helpers\BoardConstants::ACTIVE) style="background: #f9f9f9;"  @endif>
                  <div class="slick-boards-theme img @if ($board->image == null && $board->scheme == null) not-slick @endif" data-alias="{{ $board->aleas }}" data-id="{{ $board->bord_id }}"
                  data-img="
                    @if ($board->image != null)
                      {{ "/upload/" . $board->image . $webp }}
                    @endif
                    @if ($board->scheme != null)
                      |{{ "/upload/" . $board->scheme  . $webp}}
                    @endif
                  ">
                    @if ($board->image)
                      <div><img loading="lazy" src="{{ "/upload/" . $board->image . $webp }}" alt="board"></div>
                    @endif
                    @if ($board->scheme)
                      <div><img loading="lazy" src="{{ "/upload/" . $board->scheme . $webp }}" alt="board"></div>
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
                <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" class="info-board @if($board->active != App\Helpers\BoardConstants::ACTIVE) inactive-item @endif" {{$blank}} @if($board->active != App\Helpers\BoardConstants::ACTIVE) style="background: #f9f9f9;"  @endif>
                  <p class="location">
                    @if ($board->city_name)
                        {{ $board->city_name }}
                    @endif
                    {{--
                    @if ($board->format)
                      @if ($board->city_name)
                      {{", "}}
                      @endif
                     {{ $board->format }}
                    @endif
                    --}}
                    @if ($board->addr)
                      @if($board->city_name)
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
                      @if (Auth::user() &&  Auth::user()->role_id < 3)
                      <tr>
                        <td class="title-tr">@lang('message.firm_code')</td>
                        <td class="board_code">{{ $board->firm_name }} - {{ $board->code }} boardID => {{$board->id}} status32323 => {{$board->firm->id}}</td>
                      </tr>
                      @endif
                      <tr>
                        <td class="title-tr">@lang('message.city')</td>
                        <td class="board_code">{{ $board->city_name }}</td>
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
                        <td class="title-tr">@lang('message.type')</td>
                        <td>
                          {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }}{{$board->format != null ? ", " : ""}} 
                          {{ $board->format }}
                        </td>
                      </tr>
                      <tr>
                        <td class="title-tr">@lang('message.side')</td>
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
                        <td class="title-tr">@lang('message.gid')</td>
                        @if ($board->guide)
                          <td>{{ $board->guide }}{!! $board->district ? '<br>'.__('message.district').': '.$board->district->name : '' !!}</td>
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
                          <td>@lang('message.hidden_price_word')</td>
                        @else
                          <td>{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</td>
                        @endif
                      </tr>
                    </table>
                  </div>
                </a>
                <div class="price-busy-board" @if($board->active!= App\Helpers\BoardConstants::ACTIVE) style="background: #f9f9f9;"  @endif>
                    @if (Auth::user() &&  Auth::user()->isManagerSearchable())
                    <div class='list-preview_inprice'>@lang('message.in_price'): <span>{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</span></div>
                    @else
                  <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}" class="price" {{$blank}}>
                  @if($board->active != App\Helpers\BoardConstants::ACTIVE && !(Auth::user() && Auth::user()->isManagerSearchable()))
                      <p class="cost"><span>нет данных</span></p>
                  @else
                    @if (Auth::user() &&  Auth::user()->role_id < 3)
                      <td><span>{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</span></td>
                    @elseif (setting('front.hidden_price') || !$board->price)
                      <span style="width:83px;" class="mobile-show">@lang('message.price')</span><span>@lang('message.hidden_price_word')</span>
                    @else
                      <p class="cost"><span>{{ $board->price }}{!!$_COOKIE['currency_symbol']!!} </span>/ @lang('message.month')</p>
                      <p>@lang('message.price_without_nds')<img loading="lazy" src="/img/icon_done.svg" alt="done"></p>
                    @endif
                  @endif
                  </a>
                  @endif
                  @if($board->active != App\Helpers\BoardConstants::ACTIVE)
                  <div class="busy-calendar">
                    <p class="title">@lang('message.calendar_employment')</p>
                      <div class="calendar" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                    </div>
                  </div>
                  @else
                  <div class="busy-calendar">
                    <p class="title">@lang('message.calendar_employment')</p>
                      <div class="calendar" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                    </div>
                  </div>
                  @endif
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
                  @if($board->active != App\Helpers\BoardConstants::ACTIVE)
                  <div class="buy-board">
                    <button class="btn btn-style btn-disables btn-buy">Неактивно</button>
                  </div>
                  @else
                  <div class="buy-board">
                    <button data-id="{{ $board->bord_id }}" class="btn btn-style btn-buy al-buy-now {{ $board->basket ? 'btn-in-basket' : ''}}">{{ $board->basket ? __('message.in_basket') : __('message.buy_now')}}</button>
                  </div>
                  @endif
                </div>
              </div>
              @endforeach
            @endif
            </div>
          </div>

          <div class="add-selected-to-basket"> 
            <button>
              <span>@lang('message.add_to_basket2')</span>
              <i class="fa fa-plus"></i>
            </button>
            @if(Auth::user() && Auth::user()->role_id < 2)
              &nbsp;
            <a class="btn btn-style get-custom-excel">@lang('message.export_xls')</a>
            @endif
          </div>
          @if ($boardsPaginate->lastPage() > 1)
          <div class="result-paginator @if($admin)  new-result-paginator @endif" data-manager="{{ $admin }}" data-current-page="{{ $boardsPaginate->currentPage() }}" data-total-page="{{ $boardsPaginate->lastPage() }}">
            <button class="btn btn-style btn-show-more">@lang('message.show_more') <span class="board count">@if(Auth::user() && Auth::user()->isManagerSearchable()) 50 @else 20 @endif</span> @lang('message.show_more_planes')</button>
            <div class="result-paginator__pages">
              <div class='result-paginator__prev'>
                <i class="fa fa-arrow-left"></i>
                <a href="{!! $boardsPaginate->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
              </div>
              {!! $boardsPaginate->links() !!}
              <div class='result-paginator__next'>
                <a href="{!! $boardsPaginate->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                <i class="fa fa-arrow-right"></i>
              </div>                  
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- RESULT SEARCH (END) -->

<!-- START NOW (START) -->
  @if (Auth::user())
    @if(Auth::user()->role_id > 2 && Auth::user()->role_id < 5)
    {!! $data['main']->getTranslatedAttribute('account') !!}
    @endif
  @else
    {!! $data['main']->getTranslatedAttribute('start_now') !!}
  @endif
<!-- START NOW (END) -->
@if(!Auth::user() || (Auth::user() && !Auth::user()->isManagerSearchable()) )
    @if($faq)
        <section style="padding: 72px 0 92px 0">
            <div class="container-fluid container-fluid-base container-fluid-description">
                <div class="row no-gutters">
                    <div class="container container-base">
                        <div class="row no-gutters">
                            <div class="w-100"><h2 class="text-left">@lang('message.faq')</h2></div>
                            <div itemscope itemtype="https://schema.org/FAQPage">
                            @foreach($faq as $faqItem)
                                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <h4 itemprop="name">{!! $faqItem->question !!}</h4>
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                        <div itemprop="text">
                                            {!! $faqItem->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- TYPE BOARD (START) -->
  @if (Auth::user() )
    @if(Auth::user()->role_id > 2 && Auth::user()->role_id < 5)
  <section id="type-board">
    <div class="container-fluid container-fluid-base container-fluid-type-board">
      <div class="row no-gutters">
        <div class="container container-base">
          <div class="row no-gutters">
            <div class="w-100"><h3 class="text-left">@lang('message.type_plane')</h3></div>
          </div>
          @include('add.type_city_'.App::getLocale())
          <div class="w-100 show-town-for-this-type" >
            <div class="container container-base">
              <div class="row no-gutters">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    @endif
  @else
    <section id="type-board">
    <div class="container-fluid container-fluid-base container-fluid-type-board">
      <div class="row no-gutters">
        <div class="container container-base">
          <div class="row no-gutters">
            <div class="w-100"><h3 class="text-left">@lang('message.type_plane')</h3></div>
          </div>
          @include('add.type_city_'.App::getLocale())
          <div class="w-100 show-town-for-this-type" >
            <div class="container container-base">
              <div class="row no-gutters">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

<!-- TYPE BOARD (END) -->
@php
        $canonical = url()->current();
        $tmp = explode('/',$canonical);
        $is_canonical = true;
        //var_dump($tmp);
        if(is_numeric(end($tmp))){
            $is_canonical = false;
        }
@endphp

@if ($seo_text && $is_canonical)
<section id="description">
  <div class="container-fluid container-fluid-base container-fluid-description">
    <div class="row no-gutters">
      <div class="container container-base">
      <div class="row no-gutters">
      <h2 class="title-search-result">{{ $data['seo']->h1_title }}</h2>
      <div class="{{--col-xs-12--}}">
          {!! $seo_text->text !!}
      </div>
      {{--<span class="show-more">@lang('message.show_more_text')</span>--}}
      </div>
      </div>
    </div>
  </div>
</section>
@endif

@if(!empty($reLinks))
  @php
  $colFinished = false;
  @endphp
<section id="description" style="margin-top: -30px; background: #f6f7fa">
  <div class="container-fluid container-fluid-base container-fluid-description" style="background: #f6f7fa; padding-top: 45px; ">
    <div class="w-100 show-town-for-this-type">
      <div class="container container-base">
        <div class="row no-gutters" style="flex-direction: row">
          @foreach($reLinks as $k => $link)
            @if($k%10 === 0)
              @php
                $colFinished = false;
              @endphp
              <div class="col-md-6 col-sm-12 city-informer">
                <ul>
            @endif
                  <li>{!! $link !!}</li>
            @if($k%10 === 9)
              @php
                $colFinished = true;
              @endphp
                </ul>
              </div>
            @endif
          @endforeach
          @if(!$colFinished)
                </ul>
              </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
  <style>
    .city-informer{
      display: flex;
    }
    .city-informer ul li{
      list-style: none;
    }
  </style>
@endif

<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

<link rel="stylesheet" as="style" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>

@include('add.chaport_text')

<style>
.search-filter-button,
.search-map-button{
    display:none;
}
.list-preview_inprice{
    margin-left: 3px;
    line-height: 16px;
    margin-bottom: 10px;
}
.list-preview_inprice span{
    font-weight:bold;
}
{{--@if(Auth::user() && @Auth::user()->role_id < 3)--}}
.list-review .item .mob-view{
    display:none !important;
}
@media screen and (max-width: 560px){
    .filter-rslt-itm,
    .mob-view-map {
        display: none;
    }
    #result-search-list .container-search-result{
        padding-top: 7px;
    }
    .control-group.visible{
        display: block;
    }
    .control-group.visible #delFigures,
    .control-group.visible #getSelMarkers,
    .control-group.visible #getInverse,
    .control-group.visible #getViewMarkers{
        display: none;
    }
    .control-group.visible.mobile-hide{
        display:none;
    }
    #result-search-map .set-label-view{
        display: none;
    }
    #result-search-map .search-filter-manager{
        display:block;
    }
    #result-search-map .search-filter-manager .search-promo-container{
        margin-top: 10px;
    }
    
    #result-search-map .search-filter-manager .search-map{
        width: 100%;
        padding-top: 0px;
    }
    #result-search-map .search-filter-manager #map-global-search{
        width: 100%;
    }
    #result-search-map .set-label-view,
    #result-search-map .collapse-map{
        top: 57px;
    }
    #result-search-map .collapse-map{
        height: calc(100% - 57px);
    }
    #result-search-map .collapse-map span{
        display: none;
    }
    .search-filter-button,
    .search-map-button{
        display: block;
        color: #3d445c;
        font-family: "Helvetica Neue";
        font-size: 14px;
        font-weight: 700;
        line-height: 15px;
        letter-spacing: 0.07px;
        padding: 20px;
        cursor: pointer;
        position:relative;
    }
    .search-map-button{
        border-top: 1px solid #dee5ec;
        border-bottom: 1px solid #dee5ec;
        box-shadow: 0 3px 5px rgb(173 173 173 / 50%);
    }
    .search-filter-button .arrow-disclose-down,
    .search-map-button .arrow-disclose-down{
        position: absolute;
        top: 23px;
        right: 23px;
        width: 9px;
        height: 9px;
        border-right: 2px solid #ccc;
        border-bottom: 2px solid #ccc;
        transform: rotate(45deg);
    }
    .search-filter-button .arrow-disclose-up,
    .search-map-button .arrow-disclose-up{
        position: absolute;
        top: 23px;
        right: 23px;
        width: 9px;
        height: 9px;
        border-right: 2px solid #ccc;
        border-bottom: 2px solid #ccc;
        transform: rotate(-135deg);
    }
    
    #selected-filters.mobile-hide,
    #pac-input.mobile-hide,
    #pac-search.mobile-hide,
    .mobile-hide{
        display:none;
    }
    
    #result-search-list .result-list .list-review .item .price-busy-board{
        padding-top: 10px;
    }
    #result-search-list .result-list .list-review .item .price-busy-board .price{
        display:block;
    }
    /*#pac-input{
        right: 0;
    }*/
} 
{{--@endif--}}
</style>
@include('add.footer')

<div id='show-map-modal' class="modal">
  <div id="map-modal-board"></div>
</div>

@if(Auth::user() && Auth::user()->role_id < 2)
<div class="import-overlay hide"></div>
<div class="excel_setting">
    <div class="export-header">
        <span>Настройки экспорта</span>
        {{--<svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg>--}}
        <div class="close"><svg viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="11"  x2="11" y2="1" stroke="#aaa" stroke-width="2"/><line x1="1" y1="1" x2="11" y2="11" stroke="#aaa" stroke-width="2"/></svg></div>
    </div>
    <div class="checboxes">
        @can('view-suppliers-in-search')
          <div class="checkbox-block">
              <input type="checkbox" name="cols[]" value="firm" id="firm" checked />
              <label for="firm">Фирма</label>
          </div>
          <div class="checkbox-block">
              <input type="checkbox" name="cols[]" value="firm_code" id="firm_code" checked />
              <label for="firm_code">Код фирмы</label>
          </div>
        @endcan
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="start_price" id="start_price" checked />
            <label for="start_price">Цена</label>
        </div>
        @can('view-suppliers-in-search')
          <div class="checkbox-block">
              <input type="checkbox" name="cols[]" value="firm_contacts" id="firm_contacts" checked />
              <label for="firm_contacts">Контакты собственников</label>
          </div>
        @endcan
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
        <div class="checkbox-block">&nbsp;</div>
                                
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="code" id="code" checked />
            <label for="code">Код</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="city" id="city" checked />
            <label for="city">Город</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="type" id="type" checked />
            <label for="type">Тип</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="addr" id="addr" checked />
            <label for="addr">Адрес</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="side" id="side" checked />
            <label for="side">Сторона</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="light" id="light" checked />
            <label for="light">Подсветка</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="guide" id="guide" checked />
            <label for="guide">Гид</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="price" id="price" checked />
            <label for="price">Цена без НДС</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="doors" id="doors" checked />
            <label for="doors">DOORS</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="ots" id="ots" checked />
            <label for="ots">OTS</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="grp" id="grp" checked />
            <label for="grp">GRP</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="image" id="image" checked />
            <label for="image">Фото</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="scheme" id="scheme" checked />
            <label for="scheme">Схема</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="map" id="map" checked />
            <label for="map">Карта</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="link" id="link" checked />
            <label for="link">Ссылка</label>
        </div>
        <div class="checkbox-block">
            <input type="checkbox" name="cols[]" value="after_december" id="after_december" checked />
            <label for="after_december">Месяцы после декабря</label>
        </div>
    </div>
    <a href="{{$data['lang_url']}}/get_custom_excel" class="btn btn-style dwn-button" id="get-custom-excel">Скачать</a>
</div>
<style>
.excel_setting .close{
    width: 20px;
    height: 20px;
    position: absolute;
    top:-10px;
    right: -10px;
    border-radius: 10px;
    background: #fff;
    border: solid 2px #bbb;
    opacity: 1;
    padding-top: 2px;
    padding-left: 2px;
    box-sizing: border-box;  
}
.import-overlay{
    display:block;
    position: fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background: rgba(0, 0, 0, 0.1);
    z-index:100;
}
.import-overlay.hide{
    display:none;
}
.dwn-button{
    padding-left: 20px;
    padding-right: 20px;
    cursor:pointer;
    color:#fff !important;
}
.dwn-button:hover{
    color:#fff  !important;
}
.excel_setting{
  display: none;
  width:  420px;
  position: fixed;
  left:50%;
  top:50%;
  background: #fff;
  padding: 10px;
  z-index: 10000;
  margin-left: -210px;
  margin-top: -262px;
}
.export-excel2:hover .excel_setting{
    opacity:1;
}
.export-header span{
    font-size:16px;
    font-weight: 500;
}
.excel_setting .checboxes{
  height: 440px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
}
.excel_setting .checboxes .checkbox-block{
  width: 200px;
  padding: 5px 0;
}
.get-custom-excel{
    cursor:pointer;
    padding-left:20px;
    padding-right: 20px;
    color:#fff !important;
}
.get-custom-excel:hover{
    color:#fff !important;
}
@media screen and (max-width: 420px){
    .excel_setting{
        left: -30px;
        width: 100vw;
    }
    .excel_setting .checboxes{
        height: 320px;
    }
    .excel_setting .checboxes .checkbox-block{
        width: 49.5vw;
    }
}
</style>
<script>
let clicked = false;
$(document).on('click','.get-custom-excel', function(){
  $('.import-overlay').removeClass('hide');
  $('.excel_setting').show();
});
$(document).on('click', '.excel_setting .close, .import-overlay', function(){
    $('.import-overlay').addClass('hide');
    $('.excel_setting').hide();
    clicked = false;
})
$(document).on('click', '#get-custom-excel', function(){
    if(clicked){
        return false;
    }
    clicked = true;
    let ids = [];
    let cols = [];
    $('.tbody .td-checkbox [type=checkbox]:checked').each(function(){
        ids.push($(this).data('id'));
    })
    $('.excel_setting [type=checkbox]:checked').each(function(){
        cols.push($(this).val());;
    })
    $.post(
        $(this).attr('href'),
        {
            "cols": cols,
            "ids": ids
        },
        function(data){
            let link = document.createElement("a");
            link.download = data.name;
            link.href = data.link;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
            clicked = false;
            $('.import-overlay').trigger('click');
        }
    )
    return false;
})
</script>
@endif

<style>
.btn-disables,
.btn-disables:hover{
    height: 29px;
    font-size: 13px;
    line-height: 27px;
    max-width: 96px;
    width: 96px;
    background: #e9e9e9;
    cursor:default !important;
}
.hidden-price,
.legend ul li i.hidden_price{
    background:#f0f0f0;
}
#pac-search{
    display: none;
}
#pac-search.visible{
    display: block;
}
#pac-search.visible.mobile-hide{
    display:none;
}
.global-loader {
  color: #FC6B40;
  font-size: 10px;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  position: fixed;
  left:35px;
  top:35px;
  z-index:101111;
  text-indent: -9999em;
  animation: mulShdSpin 1.3s infinite linear;
  transform: translateZ(0);
}
@keyframes mulShdSpin {
  0%,
  100% {
    box-shadow: 0 -3em 0 0.2em,
    2em -2em 0 0em, 3em 0 0 -1em,
    2em 2em 0 -1em, 0 3em 0 -1em,
    -2em 2em 0 -1em, -3em 0 0 -1em,
    -2em -2em 0 0;
  }
  12.5% {
    box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em,
    3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em,
    -2em 2em 0 -1em, -3em 0 0 -1em,
    -2em -2em 0 -1em;
  }
  25% {
    box-shadow: 0 -3em 0 -0.5em,
    2em -2em 0 0, 3em 0 0 0.2em,
    2em 2em 0 0, 0 3em 0 -1em,
    -2em 2em 0 -1em, -3em 0 0 -1em,
    -2em -2em 0 -1em;
  }
  37.5% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
    3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em,
    -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
  }
  50% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
    3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em,
    -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
  }
  62.5% {
    box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
    3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0,
    -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
  }
  75% {
    box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em,
    3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em,
    -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
  }
  87.5% {
    box-shadow: 0em -3em 0 0, 2em -2em 0 -1em,
    3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em,
    -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
  }
}
@if($currentUser && $currentUser->role_id == 5)
.search-promo-container{
        height: auto;
        min-height: auto;
    }
@endif
@media screen and (max-width: 480px){
    .search-promo-container{
        height: auto;
    }
    .control-group.visible{
        position:relative;
        top: 20px;
        right: 0;
        text-align: right;
        padding-right:10px;
    }
    #selRadius{
        display:none;
    }
    @if(Auth::user() && Auth::user()->role_id < 3)
    #map-global-search{
        margin-top: 35px;
    }
    @endif;
}

/** FROM DEV **/
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

.inactive{
    background: #f9f9f9 !important; 
    /*padding-right:0 !important;*/
}
.btn.btn-style.btn-disables.btn-buy{
    line-height:41px;
    height:41px;
}
.inactive-item .month{
    background: #e6ecf2 !important;
    border: solid 1px #e6ecf2 !important;
     
}
.inactive-item .month a{
    color: #87447c !important;
}
span.mobile-show{
    display:none;   
}
.by_fixed{
  background: #50f939;
}
.by_cost{
  background: #39f9bc;
}
.by_median{
  background: #fbfaae;
}
.by_region{
  background: #fab25c;
}
@media screen and (max-width:560px){
    span.mobile-show{
        display:inline-block;   
    }
    #result-search-list .result-list .list-review .item .price-busy-board{
        padding-top:6px;
    }
    #result-search-list .result-list .list-review .item .price-busy-board .price{
        margin-left: 0;
    }
}
#powerTip {
  cursor: default;
  background-color: #333;
  background-color: rgba(0, 0, 0, 0.8);
  border-color: #333;
  border-color: rgba(0, 0, 0, 0.8);
  border-radius: 6px;
  color: #fff;
  display: none;
  padding: 10px;
  position: absolute;
  white-space: nowrap;
  z-index: 2147483647;
}
#powerTip:before {
  content: attr(class) " ";
  position: absolute;
  height: 0;
  width: 0;
  text-indent: 100%;
  overflow: hidden;
}
#powerTip.n:before, #powerTip.s:before {
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  left: 50%;
  margin-left: -5px;
}
#powerTip.e:before, #powerTip.w:before {
  border-bottom: 5px solid transparent;
  border-top: 5px solid transparent;
  margin-top: -5px;
  top: 50%;
}
#powerTip.n:before,
#powerTip.ne:before, #powerTip.nw:before {
  bottom: -10px;
}
#powerTip.n:before,
#powerTip.ne:before, #powerTip.nw:before ,
#powerTip.nw-alt:before, #powerTip.ne-alt:before {
  border-top-color: inherit;
  border-top-style: solid;
  border-top-width: 10px;
}
#powerTip.e:before {
  border-right-color: inherit;
  border-right-style: solid;
  border-right-width: 10px;
  left: -10px;
}
#powerTip.s:before,
#powerTip.se:before, #powerTip.sw:before {
  top: -10px;
}
#powerTip.s:before,
#powerTip.se:before, #powerTip.sw:before ,
#powerTip.sw-alt:before, #powerTip.se-alt:before {
  border-bottom-color: inherit;
  border-bottom-style: solid;
  border-bottom-width: 10px;
}
#powerTip.w:before {
  border-left-color: inherit;
  border-left-style: solid;
  border-left-width: 10px;
  right: -10px;
}
#powerTip.ne:before, #powerTip.se:before {
  border-right: 10px solid transparent;
  border-left: 0;
  left: 10px;
}
#powerTip.nw:before, #powerTip.sw:before {
  border-left: 10px solid transparent;
  border-right: 0;
  right: 10px;
}
#powerTip.nw-alt:before, #powerTip.ne-alt:before,
#powerTip.sw-alt:before, #powerTip.se-alt:before {
  bottom: -10px;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  left: 10px;
}
#powerTip.ne-alt:before {
  left: auto;
  right: 10px;
}
#powerTip.sw-alt:before, #powerTip.se-alt:before {
  border-top: none;
  bottom: auto;
  top: -10px;
}
#powerTip.se-alt:before {
  left: auto;
  right: 10px;
}
</style>
<script>
$('.search-filter-button').click(function(){
    if($('#selected-filters').is(':visible')){
        $('#selected-filters').addClass('mobile-hide');
        $('.search-map').addClass('mobile-hide');
        $('.search-filter-button .arrow').removeClass('arrow-disclose-up').addClass('arrow-disclose-down');
        setCookiesFilter(false);
    }else{
        $('#selected-filters').removeClass('mobile-hide');
        $('.search-map').removeClass('mobile-hide');
        $('.search-filter-button .arrow').removeClass('arrow-disclose-down').addClass('arrow-disclose-up');
        setCookiesFilter(true);
    }
})
$('.search-map-button').click(function(){
    console.log('click1')
    if($('#map-global-search').is(':visible')){
        $('#map-global-search').addClass('mobile-hide');
        $('#pac-input').addClass('mobile-hide');
        $('#pac-search').addClass('mobile-hide');
        $('.control-group.visible').addClass('mobile-hide');
        $('.search-map-button .arrow').removeClass('arrow-disclose-up').addClass('arrow-disclose-down');
        setCookiesMap(false);
    }else{
        $('#map-global-search').removeClass('mobile-hide');
        $('#pac-input').removeClass('mobile-hide');
        $('#pac-search').removeClass('mobile-hide');
        $('.control-group.visible').removeClass('mobile-hide');
        console.log('click');
        $('.search-map-button .arrow').removeClass('arrow-disclose-down').addClass('arrow-disclose-up');
        setCookiesMap(true);
    }
})

$(document).ready(function(){

    $('.al-power-tip').powerTip({placement: 's'});

});

function setCookiesFilter(type){
    document.cookie = "openFilterMobile=" + type + ";path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT";
}
function setCookiesMap(type){
    document.cookie = "openMapMobile=" + type + ";path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT";
}
/*function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined
}*/
</script>