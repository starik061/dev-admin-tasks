@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
<!-- BOARD (START) -->
  @include('add.bread')
  
@php
$webp = "";
if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' )!== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' )!== false ) {
   $webp = ".webp";
}
if(!$_COOKIE['currency']){
    $_COOKIE['currency'] = 'uah';
}
switch($_COOKIE['currency']){
    case 'uah': $_COOKIE['currency_symbol'] = '&#8372;'; break;
    case 'usd': $_COOKIE['currency_symbol'] = '&#36;'; break;
    case 'eur': $_COOKIE['currency_symbol'] = '&euro;'; break;
}
@endphp

  @if ($board->active == App\Helpers\BoardConstants::INACTIVE)
    <section class="interested_info">
      <div class="main container container-base container-board-detail">
        <h2>@lang('message.not_active_title')</h2>
        <p>@lang('message.offer_other') {{ $board->city_title }} @lang('message.offer_go_main').</p>
        <div class="buttons-group">
          <button class="actual-boards"><a href="{{$data['lang_url']}}/{{ $board->city_alias }}">@lang('message.actual_planes')</a></button>
          <button class="to-home"><a href="{{ $data['lang_url']? $data['lang_url'] : '/'}}">@lang('message.go_home')</a></button>
        </div>
      </div>
    </section>

    <section class="interested_subscribe">
      <div class="main container container-base container-board-detail">
        <p>@lang('message.do_you_want')</p>
        <div class="subscribe">
          <input type="phone" maxlength="14" name="phone" data-mask="(000)000-00-00" placeholder="Введите номер телефона" required>
          <button class="submit" data-id="{{ $board->id }}">@lang('message.send')</button>
        </div>
      </div>
    </section>
  @endif  

  <section id="board-detail" {{--itemscope itemtype="http://schema.org/Product"--}}>
    {{--
    <meta itemprop="brand" content="Billboards">
    <meta itemprop="description" content="{{ $data['seo']->seo_description }}">
    <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
      <meta itemprop="ratingValue" content="4">
      <meta itemprop="reviewCount" content="242">
    </div>
    --}}
    <div class="container-fluid container-fluid-base container-fluid-board-detail">
      <div class="row no-gutters">
        <div class="container container-base container-board-detail">
          @if ($board->active == App\Helpers\BoardConstants::INACTIVE)
            <p class="interested-title">@lang('message.interested')</p>
          @endif
          <div class="row no-gutters">
            <div class="buy-section info-price-board">
              <div class="location">
                <p class="code">
                  @lang('message.plane_code2'): 
                  <span {{--itemprop="sku"--}}>{{ $board->id }}</span>
                </p>
                <h1 class="info" {{--itemprop="name"--}}>{{ $data['seo']->seo_title }}</h1>
                @if(Auth::user() &&  in_array(Auth::user()->role_id, [1,2,5]) && Auth::user()->id)
                <a href="/edit/{{ $board->id }}" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f76a47" d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"></path></svg>
                </a>
                @endif
              </div>
              @if ($board->active == App\Helpers\BoardConstants::ACTIVE || (Auth::user() && Auth::user()->role_id < 3))
                <div class="pr-buy">
                  <div class="price" {{--itemprop="offers" itemscope itemtype="http://schema.org/Offer"--}}>
                      @can('view-approximated-prices')
                          <p>@lang('message.approximated_supplier_price')</p>
                          <p class="cost"><span>{{ $board->approximated_supplier_price }}</span> ₴ / @lang('message.month')</p><br>
                          <p>@lang('message.file_price')</p>
                      @endcan
                    @if ($board->board_price)
                      @if ($currentUser && in_array($currentUser->role_id, [1,2,7]))
                        <p class="cost"><span {{--itemprop="price"--}}>{{ $board->start_price }}</span> {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</p>
                      @elseif (setting('front.hidden_price'))
                        <p class="cost"><span {{--itemprop="price"--}}>@lang('message.hidden_price_word')</span></p>
                      @else
                        <p class="cost"><span {{--itemprop="price"--}}>{{ $board->board_price }}</span> {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</p>
                      @endif
                      {{--
                      <meta itemprop="priceCurrency" content="UAH, грн">
                      <meta itemprop="availability" content="InStock">
                      <meta itemprop="url" content="{{ url()->current() }}">
                      --}}
                      <p>@lang('message.without_nds')
                        <img src="/assets/img/icon_done.svg" alt="done"/>
                      </p>
                      {{--
                        @if ($board->tech_id)
                          <a class="g-b" href="{{ $board->tech_image }}" target="_blank">
                            <span>@lang('message.tech_maket')</span>
                          </a>
                        @endif
                      --}}
                    @else
                    <p class="cost">@lang('message.inner_board__hidden_price')</p>
                    @endif
                      @can('view-approximated-prices2')
                              <br>
                          <p>@lang('message.approximated_selling_price')</p>
                          <p class="cost"><span>{{ $board->approximated_selling_price }}</span> ₴ / @lang('message.month')</p><br>
                      @endcan
                  </div>
                  <div class="board-buy">
                    <button class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}" {{ $board->basket ? 'disabled' : ''}}>{{ $board->basket ? __('message.in_basket') : ( (Auth::user() && in_array(Auth::user()->role_id,[1,2,5]) )? __('message.add_podborku') :__('message.buy_now')) }}</button>
                  </div>
                </div>
              @endif
            </div>

            <div class="view-board">
              @if ($board->image || $board->scheme)
              <div class="photo-board">
                <div class="slick-boards-theme t-i" data-images="{{ $board->image }}">
                  <!-- t-i  >> this-image-->
                  @if ($board->image)
                    <a data-fancybox="gallery" href="{{ "/upload/" . $board->image . $webp }}" >
                      <img {{--loading="lazy"--}} {{--itemprop="image"--}} src="{{ "/upload/" . $board->image . $webp }}" alt="{{ $data['seo']->seo_title }} @lang('message.photo')"/>
                    </a>
                  @endif
                  @if ($board->scheme)
                    <a data-fancybox="gallery" href="{{ "/upload/" . $board->scheme . $webp }}">
                      <img loading="lazy" {{--itemprop="image"--}} src="{{ "/upload/" . $board->scheme . $webp }}" alt="{{ $data['seo']->seo_title }} @lang('message.scheme')" />
                    </a>
                  @endif
                </div>
              </div>
              @else
                <div class="photo-board">
                  <div class="slick-boards-theme t-i not-slick" data-images="{{ $board->image . $webp }}">
                    <img src="/assets/img/icon_basket_modal.svg">
                  </div>
                </div>
              @endif
              <div class="map-board">
                <div id="t-m" data-lat="{{ $board->x }}" data-lng="{{ $board->y }}" data-zoom="15">
                </div>
              </div>
            </div>
            @if($currentUser && in_array($currentUser->role_id, [1]) && $board->image)
                <div class="validation-block">
                    <span class="validate-image" data-id="{{$board->id}}">AI CHECK</span>
                    <div class="validate-result"></div>
                </div>
            @endif
            @if(Auth::user() &&  in_array(Auth::user()->role_id, [1,2,5]) && Auth::user()->id != 263)
            <div class="photo-apply-btn-wrapper"><button class="btn btn-style btn-buy popup13-open" data-rel="photo-apply">@lang('message.photo_apply_show')</button></div>
            @endif

            <div class="mob-map-board">
              <div id="m-m-b">

              </div>
            </div>
            @if ($board->active == App\Helpers\BoardConstants::ACTIVE)
              <div class="i-t-b">
                <!-- item-this-board-->
                <div class="calendar-board">
                  <div class="legend">
                    <p>@lang('message.calendar_employment')</p>
                    <ul>
                      <li><i class="fa fa-circle select" aria-hidden="true"></i> — @lang('message.free_')</li>
                      <li><i class="fa fa-circle reserve" aria-hidden="true"></i> — @lang('message.reserve')</li>
                      <li><i class="fa fa-circle pre-order" aria-hidden="true"></i> — @lang('message.predzakaz')</li>
                      <li><i class="fa fa-circle busy" aria-hidden="true"></i> — @lang('message.busy')</li>
                    </ul>
                  </div>
                  @if ($board->reserve)
                    <div class="choose-calendar" data-reserve="{{ $board->reserve }}" data-basket="{{ $board->basket }}" data-board-id="{{ $board->id }}"></div>
                  @endif                      

                  <div class="select-month hide-this"><span class="text">выбран 1 месяц</span><img src="/assets/img/icon_done.svg" alt="done"/></div>
                </div>
              </div>
            @endif
            <div class="p-t-b">
              <!-- property-this-board-->
              <p class="p-h">@lang('message.parametrs')</p>
              <!-- property-header-->
              <div class="p-t">
                <!-- property-table-->
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.plane_code2')</div>
                  <div class="p-t__td">
                    <p>{{ $board->id }}</p>
                  </div>
                </div>
                @if(Auth::user()->role_id < 3 && Auth::user())
                <div class="p-t__tr ">
                  <div class="p-t__td">@lang('message.firm_code')</div>
                  <div class="p-t__td">
                    <p class="conteact_open" data-id="{{$board->firm}}" style="cursor: pointer;">{{$board->firm_name}} - {{ $board->code }}</p>
                    @if(Auth::user()->role_id == 1 && $firm->supplier_id)
                    <a href="/manager/suppliers/{{$firm->supplier_id}}/view" target="_blank" style="color:#f76a47;">Перейти на страницу собственника</a>
                    @endif
                  </div>
                </div>
                {{--
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.contacts')</div>
                  <div class="p-t__td">
                    <p>{{$board->firm_contacts}}</p>
                  </div>
                </div>
                --}}
                @endif
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.type')</div>
                  <div class="p-t__td">
<!-- ----------------------------------- board type ------------------------------------- -->                      
                    <p {{--itemprop="category"--}}>{{ (mb_convert_case(mb_strtolower($board->board_type), MB_CASE_TITLE))  }}@if(!empty($board->format)){{", " . $board->format }}@endif</p>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">Сторона</div>
                  <div class="p-t__td">
                    <p>{{ (mb_convert_case(mb_strtolower($board->board_side), MB_CASE_TITLE)) }}</p>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.light')</div>
                  <div class="p-t__td">
                    @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
                      <div class="image-wrapper">
                        <img class="light" src="/img/icon_light_on.svg" alt="light"/><span> - @lang('message.exist')</span>
                        <p class="light-info">
                          @lang('message.light') - <span>@lang('message.exist')</span>
                        </p>
                      </div>
                    @else
                      <div class="image-wrapper">
                        <img class="sun" src="/img/icon_light_off.svg" alt="sun-energy"/><span> - @lang('message.no_light')</span>
                        <p class="light-info">
                          @lang('message.light') - <span>@lang('message.no_light')</span>
                        </p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.address')</div>
                  <div class="p-t__td">
<!-- ----------------------------------- board addr, city ------------------------------------- -->                      
                    <p>{{ $board->city_name }}, {{ (mb_convert_case(mb_strtolower($board->board_addr), MB_CASE_TITLE)) }}</p>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.gid')</div>
                  <div class="p-t__td">
                    <p>{{ $board->guide }}{!! $board->district ? ($board->guide ? '<br>' : '').__('message.district').': '.$board->district->name : '' !!}</p>
                  </div>
                </div>
                @if(Auth::user() && in_array(Auth::user()->role_id, [1,2,5]))
                @php
                    $date = explode('-',explode(' ',$board->updated_at)[0]);
                    $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
                @endphp
                <div class="p-t__tr">
                  <div class="p-t__td">Дата обновления</div>
                  <div class="p-t__td">
                    <p>{{ $str_date }}</p>
                  </div>
                </div>
                @endif
              </div>
            </div>
            @if ($board->active == App\Helpers\BoardConstants::ACTIVE || (Auth::user() && Auth::user()->role_id < 3))
              <div class="buy-section follow-board">
                <div class="d-s-w-t-b">
                  <!-- do-something-with-this-board-->
                  @if ($board->x && $board->y)
                  <div class="btn-special see-on-map">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19.03" viewBox="0 0 19 19.03">
                      <defs>
                        <style>
                          .cls-1 {
                          fill: #55bc4f;
                          fill-rule: evenodd;
                          }
                        </style>
                      </defs>
                      <path class="cls-1" d="M411.176,1216.33h1.832v-2.32l2.75-2.2v3.6h1.833v-5.51a0.933,0.933,0,0,0-.52-0.83,0.921,0.921,0,0,0-.969.11l-4.01,3.22-4.01-3.22a0.985,0.985,0,0,0-.575-0.19,0.975,0.975,0,0,0-.57.19l-4.582,3.68a0.9,0.9,0,0,0-.344.71v12.85a0.916,0.916,0,0,0,.916.92,0.931,0.931,0,0,0,.573-0.2l4.582-3.67a0.93,0.93,0,0,0,.344-0.72v-10.94l2.75,2.2v2.32Zm-7.332-2.32,2.749-2.2v10.5l-2.749,2.2v-10.5Zm17.144,12.68-2.328-2.33a4.573,4.573,0,1,0-1.3,1.3l2.328,2.33Zm-6.147-2.1a2.755,2.755,0,1,1,2.75-2.76A2.759,2.759,0,0,1,414.841,1224.59Z" transform="translate(-402 -1208.97)"></path>
                    </svg><span>@lang('message.show_plane_on_map')</span>
                  </div>
                  @endif
                  @if (preg_match("/busy/", $board->reserve))
                    <div class="btn-special follow" data-registered="{{ Auth::user() ? 'true' : 'false' }}" data-id="{{ $board->id }}">
                      <svg class="add-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19">
                        <defs>
                          <style>
                            .cls-1 {
                            fill: #55bc4f;
                            fill-rule: evenodd;
                            }
                          </style>
                        </defs>
                        <path class="cls-1" d="M660.825,1219.15c-0.168-.24-4.175-5.82-9.826-5.82s-9.658,5.58-9.826,5.82a0.9,0.9,0,0,0,0,1.04c0.168,0.23,4.174,5.81,9.826,5.81s9.658-5.58,9.826-5.81A0.9,0.9,0,0,0,660.825,1219.15ZM651,1224.19c-3.784,0-6.857-3.23-7.931-4.52,1.071-1.29,4.134-4.53,7.931-4.53s6.857,3.24,7.931,4.53C657.859,1220.96,654.8,1224.19,651,1224.19Zm5.45-9.95h1.817v-2.72h2.725v-1.81h-2.725V1207h-1.817v2.71h-2.725v1.81h2.725v2.72Zm-5.45,1.81a3.62,3.62,0,1,0,3.633,3.62A3.628,3.628,0,0,0,651,1216.05Zm0,5.43a1.81,1.81,0,1,1,1.817-1.81A1.821,1.821,0,0,1,651,1221.48Z" transform="translate(-641 -1207)"></path>
                      </svg>
                      <svg class="remove-icon hide-this" id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="19px" viewBox="0 -2.728 20 19" enable-background="new 0 -2.728 20 19" xml:space="preserve">
                        <path id="Remove" d="M19.825,9.43c-0.168-0.24-4.175-5.819-9.826-5.819c-5.651,0-9.658,5.579-9.826,5.819                  c-0.22,0.312-0.22,0.729,0,1.04c0.168,0.23,4.174,5.811,9.826,5.811c5.651,0,9.658-5.58,9.826-5.811                  C20.045,10.158,20.045,9.741,19.825,9.43z M10,14.47c-3.784,0-6.857-3.229-7.931-4.52C3.14,8.66,6.203,5.42,10,5.42                 s6.857,3.24,7.932,4.53C16.859,11.24,13.8,14.47,10,14.47z M19.992-0.01h-7.268V1.8h7.268V-0.01z M10,6.33                  C8.001,6.337,6.386,7.964,6.393,9.963s1.634,3.614,3.633,3.607c1.994-0.008,3.607-1.626,3.607-3.62                 C13.629,7.948,12.002,6.327,10,6.33z M10,11.76c-1-0.004-1.807-0.817-1.803-1.816c0.004-1,0.817-1.808,1.817-1.804                  c0.997,0.004,1.802,0.813,1.802,1.811C11.811,10.95,11,11.758,10,11.76L10,11.76z"></path>
                      </svg><span>@lang('message.watch_plane')</span>
                    </div>
                  @endif
                </div>
                <div class="pr-buy">
                  <div class="price">
                    @if ($board->board_price)
                      @if (Auth::user() &&  Auth::user()->role_id < 3)
                        <p class="cost">{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</p>
                      @elseif (setting('front.hidden_price'))
                        <p class="cost">@lang('message.hidden_price_word')</p>
                      @else
                        <p class="cost">{{ $board->board_price }} {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</p>
                      @endif
                      <p>@lang('message.without_nds')
                        <img src="/assets/img/icon_done.svg" alt="done"/>
                      </p>
                      @if ($board->tech_id)
                        <a class="g-b" href="{{ $board->tech_image }}" target="_blank">
                          <span>@lang('message.tech_maket')</span>
                        </a>
                      @endif
                    @else
                      <p class="cost">@lang('message.inner_board__hidden_price')</p>
                    @endif
                  </div>
                </div>
                <div class="board-buy">
                  <button class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}" {{ $board->basket ? 'disabled' : ''}}>{{ $board->basket ? __('message.in_basket') :( (Auth::user() && in_array(Auth::user()->role_id,[1,2,5]) )? __('message.add_podborku') :__('message.buy_now'))}}</button>
                </div>
              </div>
              <div class="around-board">
                <p class="a-b-h">@lang('message.near_plane')</p>
                <!-- around-board-header-->
                <div class="slick-boards-theme s-a-b">
                  <!-- slick-around-board-->
                  @foreach($beside_board as $b)
                  <div class="item" {{--itemscope itemtype="http://schema.org/Product"--}}>

                    <a href="{{$data['lang_url']}}/{{ $b->aleas }}">
                      
                      <div class="img-bg">
                        @if($b->image)
                        <img loading="lazy" {{--itemprop="image"--}} src="{{ "/upload/" . $b->image . $webp }}" />
                        @else
                        <img loading="lazy" src="/assets/img/icon_basket_modal.svg" />
                        @endif
                      </div>
                      <div class="info-board">
                        <p class="type-board">@lang('message.plane_code2'): <span  {{--itemprop="sku"--}}>{{ $b->board_id }}</span></p> 
                        <p class="type-board"><span {{--itemprop="category"--}}>{{ $b->board_type }}</span></p>
                        <p class="guide-board" title="{{ $b->city_title }}, {{ $b->addr }}"><span {{--itemprop="name"--}}>{{ $b->city_title }}, {{ $b->addr }}</span></p>
                        <a class="continue" href="{{$data['lang_url']}}/{{ $b->aleas }}">@lang('message.go_to_plane')</a>
                        {{--
                        <meta itemprop="url" content="/{{ $b->aleas }}"> 
                        <meta itemprop="brand" content="Billboards">
                        <meta itemprop="description" content="{{ $data['seo']->seo_description }}">
                        
                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                          @if ($b->price)
                            <meta itemprop="price" content="{{ $b->price }}">
                          @else
                            <meta itemprop="price" content="@lang('message.hidden_price_word')">
                          @endif
                          <meta itemprop="priceCurrency" content="UAH, грн">
                          <meta itemprop="availability" content="InStock">
                          <meta itemprop="url" content="/{{ $b->aleas }}">
                        </div>
                        <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                          <meta itemprop="ratingValue" content="4">
                          <meta itemprop="reviewCount" content="242">
                        </div>
                        --}}
                      </div>
                    </a>
                  </div>
                  @endforeach
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@if(Auth::user() && Auth::user()->isManagerSearchable())
  @can('view-suppliers-in-search')
  <div class="popup13-wrapper">
    
    <div class="popup13-conteiner size-a" data-rel="photo-apply">

        <div class="popup13-overlay popup13-close-clear"></div>
        
        <div class="popup13-content">

          <div class="popup13-close popup13-close-clear"><span></span><span></span></div>

            <div id="photoEditor" data-bg="@if($board->image) {{ "/upload/" . $board->image . $webp }} @endif">

                    <div>
                        <div class="canvas-container photo-editor__canvas-container"> 
                          <canvas id="canvas" width="1200" height="701"></canvas>
                        </div>
                    </div>
                                                
                    <label class="mt-4 font-size-default d-block d-lg-flex justify-content-start align-items-center mb-4">
                        <span class="mr-3 mb-2 mb-lg-0 d-block">@lang('message.photo_apply_upload')</span>
                        <input id="storyFile" type="file" class="form-control form-control-file">
                    </label>

                    <label class="font-size-default d-block d-lg-flex justify-content-start align-items-center">
                        <span class="mr-3 mb-2 mb-lg-0 d-block">Илиуказать url превью макета</span>
                        <input id="storyUrl" type="text" class="form-element form-element-text-input form-control font-size-default">
                    </label>

                    <input type="hidden" name="photoDataUrl" value="" id="photoDataUrl">

                    <div id="canvasImages" class="resource-advertise-img-wrapper d-grid gap-3 pt-4 pb-4"></div>

                    <div class="d-flex">
                        <input id="clearCanvas" type="button" value="@lang('message.clear')" class="btn btn-black btn-full-width-sm font-size-default mr-3">
                        <a id="saveCanvas" href="javascript: void(0)" class="btn btn-primary btn-full-width-sm font-size-default">@lang('message.save')</a>
                    </div>         

            </div>

        </div>
    </div>
  </div>
  @endcan
@endif
<!-- BOARD (END) -->
@include('add.chaport_text')
@include('add.footer')
<style>
    .validate-image{
        margin: 10px auto 0;
        background: #f76a47;
        font-size:15px;
        line-height: 41px;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        padding: 0 10px;
        font-weight: 500;
        display: inline-block;
    }
    .validation-block{
        display: block;
        text-align: center;
        width: 100%;
    }
</style>
<script>
    $(document).ready(function(){
        $(document).on('click', '.validate-image', function(){
            $.post('/api/image-validation/send/'+$(this).data('id'), {}, function(response){
                toastr.success('Файл отправлен на обработку');
            })
        })
    })
    @if($currentUser && in_array($currentUser->role_id, [1]))
    const imgNotification = pusher.subscribe('image-{{$board->id}}');
    imgNotification.bind('ai-check-result', function(data) {
        $('.validate-result').empty().append(`${data.valid ? 'Фото валидно' : 'Фото не валидно'}<br>${data.description}`)
    });
    @endif
</script>