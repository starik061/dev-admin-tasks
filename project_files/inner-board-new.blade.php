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
<section id="board-detail">
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
                            <h1 class="info">{{ $data['seo']->seo_title }}</h1>
                        </div>
                        <div class="price-block">
                            <div class="edit-block">
                                @can('edit-board')
                                    <a href="/edit/{{ $board->id }}" target="_blank" class="edit-board">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.166 2.49999C14.3849 2.28112 14.6447 2.1075 14.9307 1.98905C15.2167 1.8706 15.5232 1.80963 15.8327 1.80963C16.1422 1.80963 16.4487 1.8706 16.7347 1.98905C17.0206 2.1075 17.2805 2.28112 17.4993 2.49999C17.7182 2.71886 17.8918 2.97869 18.0103 3.26466C18.1287 3.55063 18.1897 3.85713 18.1897 4.16665C18.1897 4.47618 18.1287 4.78268 18.0103 5.06865C17.8918 5.35461 17.7182 5.61445 17.4993 5.83332L6.24935 17.0833L1.66602 18.3333L2.91602 13.75L14.166 2.49999Z" stroke="#FC6B40" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>@lang('message.edit')</span>
                                    </a>
                                @endcan
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
                                    <div class="board-buy mobile-hide">
                                        <button class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}" {{ $board->basket ? 'disabled' : ''}}>{{ $board->basket ? __('message.in_basket') : ( (Auth::user() && in_array(Auth::user()->role_id,[1,2,5]) )? __('message.add_podborku') :__('message.buy_now')) }}</button>
                                    </div>
                                </div>
                           @endif
                        </div>
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
                        <div class="mob-map-board">
                            <div id="m-m-b">
                            </div>
                        </div>
                    @endif
                    <div class="buy-section info-price-board mobile-board-buy">
                        <div class="board-buy">
                            <button class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}" {{ $board->basket ? 'disabled' : ''}}>{{ $board->basket ? __('message.in_basket') : ( (Auth::user() && in_array(Auth::user()->role_id,[1,2,5]) )? __('message.add_podborku') :__('message.buy_now')) }}</button>
                        </div>
                    </div>
                    @if($related)
                        <div class="related-boards">
                            <div class="side-block">
                                @lang('message.side'):
                                @foreach($related as $side => $boards)
                                    <a class="related-link
                                              {{in_array($side, ['A', 'А', 'В', 'B']) ? 'al-power-tip' : ''}}
                                              {{$board->side_type == $side ? 'selected-link' : ''}}"
                                       title="{{ $side == 'A' || $side == 'А' ? __('message.side_a_description') : ( $side == 'B' || $side == 'В' ? __('message.side_b_description')  : '') }}"
                                       href="{{$data['lang_url']}}/{{$boards[1]}}">
                                        {{$side}}
                                    </a>
                                @endforeach
                            </div>
                            @if($related[$board->side_type])
                                <div class="construction-block">
                                    @lang('message.Advertising_space'):
                                    @foreach($related[$board->side_type] as $index => $relatedBoard)
                                        <a class="related-link al-power-tip {{$board->aleas == $relatedBoard ? 'selected-link' : ''}}"
                                           title="@lang('message.side_plots_description')"
                                           href="{{$data['lang_url']}}/{{$relatedBoard}}">
                                            {{$index}}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="board-info-block">
                        <div class="data-block p-t-b">
                            <p class="p-h block-title">@lang('message.parametrs')</p>
                            <div class="p-t">
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
                                @endif
                                <div class="p-t__tr">
                                    <div class="p-t__td">@lang('message.type')</div>
                                    <div class="p-t__td">
                                        <p >{{ (mb_convert_case(mb_strtolower($board->board_type), MB_CASE_TITLE))  }}@if(!empty($board->format)){{", " . $board->format }}@endif</p>
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
                        <div class="calendar-block">
                            @if ($board->active == App\Helpers\BoardConstants::ACTIVE)
                                <div class="i-t-b">
                                    <!-- item-this-board-->
                                    <div class="calendar-board">
                                        <p class="p-h block-title">@lang('message.calendar_employment')</p>
                                        @if ($board->reserve)
                                            <div class="choose-calendar" data-reserve="{{ $board->reserve }}" data-basket="{{ $board->basket }}" data-board-id="{{ $board->id }}"></div>
                                        @endif
                                        <div class="select-month hide-this"><span class="text">выбран 1 месяц</span><img src="/assets/img/icon_done.svg" alt="done"/></div>
                                        <div class="legend">
                                            <ul>
                                                <li><i class="fa fa-circle select" aria-hidden="true"></i> — @lang('message.free_')</li>
                                                <li><i class="fa fa-circle reserve" aria-hidden="true"></i> — @lang('message.reserve')</li>
                                                <li><i class="fa fa-circle pre-order" aria-hidden="true"></i> — @lang('message.predzakaz')</li>
                                                <li><i class="fa fa-circle busy" aria-hidden="true"></i> — @lang('message.busy')</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if ($board->active == App\Helpers\BoardConstants::ACTIVE || (Auth::user() && Auth::user()->role_id < 3))
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
@include('add.chaport_text')
@include('add.footer')
<style>
    .mobile-board-buy{
        display: none;
    }
    #board-detail .container-board-detail {
        padding-bottom: 79px;
        max-width: 1060px;
    }
    #board-detail{
        background: #fff;
    }
    #board-detail .buy-section{
        padding: 0;
    }
    #board-detail .buy-section .location p.code{
        display: inline-block;
        background: #FFF0EC;
        border-radius: 4px;
        padding: 4px 8px;
        color: #FC6B40;
        font-family: "Helvetica Neue";
        font-size: 13px;
        line-height: 18px;
        border: none;
    }
    #board-detail .buy-section .location p.code span{
        font-weight: bold;
    }
    #board-detail .buy-section.info-price-board .location > .info{
        font-family: Helvetica Neue;
        font-weight: 500;
        font-size: 20px;
        line-height: 32px;
        overflow: visible;
        width: auto;
        height: auto;
        cursor: default;
    }
    #board-detail .buy-section > div.location{
        flex: 1.6;
    }
    #board-detail .buy-section > div.price-block{
        flex: 1;
    }
    .edit-block{
        display: flex;
        justify-content: flex-end;
        height: 26px;
    }
    .edit-board{
        display: inline-flex;
        align-items: center;
        color: #FC6B40;
        font-size: 13px;
        line-height: 17px;
    }
    .edit-board span{
        padding-left: 5px;
    }
    #board-detail .buy-section .pr-buy > div.board-buy{
        flex: 0.8;
    }
    #board-detail .buy-section .pr-buy .price .cost{
        font-size: 20px;
        line-height: 32px;
    }
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
    .view-board{
        background: #fff;
    }
    .validation-block{
        display: block;
        text-align: center;
        width: 100%;
        background: #fff;
    }
    #board-detail .view-board{
        justify-content: space-between;
    }
    #board-detail .view-board > div{
        flex-basis: 520px;
    }
    .board-info-block{
        display: flex;
        padding: 30px;
        justify-content: space-between;
        background: #F9F9FA;
        width: 100%;
        margin: 30px 0;
    }
    .board-info-block > div{
        flex-basis: 490px;
    }
    .calendar-block,
    #board-detail .i-t-b,
    #board-detail .p-t-b{
        background: #F9F9FA;
        border: none;
    }
    #board-detail .i-t-b .calendar-board .legend{
        background: #F9F9FA;
    }
    #board-detail .p-t-b .p-h.block-title,
    .board-info-block .block-title{
        font-family: "Helvetica Neue";
        font-size: 24px;
        line-height: 1;
        font-weight: 400;
    }
    #board-detail .i-t-b{
        margin-top: 0;
    }
    #board-detail .p-t-b,
    #board-detail .i-t-b{
        padding: 0;
    }
    .choose-calendar{
        flex-direction: row;
        flex-wrap: wrap;
    }
    #board-detail .i-t-b .calendar-board .choose-calendar > div{
        flex: 1;
        flex-basis: 81px;
    }
    .around-board{
        background: #fff;
        margin-top: 0;
    }
    #board-detail .around-board .a-b-h{
        font-family: "Helvetica Neue";
        font-size: 24px;
        line-height: 1;
        font-weight: 400;
    }
    .related-boards{
        display: flex;
        width: 100%;
        padding: 30px;
        background: #f9f9fa;
        font-size: 13px;
        line-height: 30px;
        color: #9498a5;
        margin-top: 30px;
    }
    .construction-block,
    .side-block{
        display: flex;
        align-items: center;
        height: 34px;
    }
    .construction-block{
        padding-left: 32px;
    }
    .construction-block .related-link,
    .side-block .related-link{
        display: inline-block;
        width: 30px;
        border: solid 1px #dee2e5;
        color: #888c9b;
        font-weight: 500;
        border-radius: 3px;
        text-transform: uppercase;
        background: #f9f9fa;
        text-align: center;
        margin: 0 7px;
        position: relative;
    }
    .construction-block .related-link:hover,
    .side-block .related-link:hover,
    .construction-block .related-link.selected-link,
    .side-block .related-link.selected-link{
        border: solid 1px #fba58c;
        background: #fff0ec;
    }
    #board-detail .p-t-b .p-t,
    .p-t div {
        border: none !important;
    }
    @media screen and (max-width: 1046px){
        #board-detail .i-t-b .calendar-board .choose-calendar > div{
            flex: 1;
            flex-basis: 120px;
        }
    }
    @media screen and (max-width: 820px){
        #board-detail .buy-section.info-price-board{
            padding: 30px;
        }
        .board-info-block{
            display: block;
        }
        #board-detail .i-t-b .calendar-board .choose-calendar > div{
            flex: 4;
            flex-basis: 180px;
        }
    }
    @media screen and (max-width: 500px){
        .related-boards{
            display:block;
        }
        .side-block .related-link:first-child{
            margin-left: 50px;
        }
        .construction-block{
            padding-left: 0;
            padding-top: 16px;
        }
        #board-detail .view-board{
            order: 0;
        }
        #board-detail .view-board > div{
            flex-basis: auto;
        }
        .validation-block{
            display: none;
        }
        .mobile-board-buy{
            display: block;
        }
        .mobile-hide{
            display:none;
        }
        #board-detail .p-t-b .p-h{
            padding: 0;
        }
        #board-detail .i-t-b .calendar-board{
            min-height: auto;
            margin-top: 16px;
        }
        #board-detail .i-t-b .calendar-board .choose-calendar > div{
            flex-basis: 60px;
            height: 30px;
        }
        #board-detail .i-t-b .calendar-board .choose-calendar  .m-t{
            display: none;
        }
    }
    @media screen and (max-width: 360px) {
        #board-detail .i-t-b .calendar-board .choose-calendar > div{
            flex-basis: 50px;
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
    $(document).ready(function(){
        $(document).on('click', '.validate-image', function(){
            $.post('/api/image-validation/send/'+$(this).data('id'), {}, function(response){
                toastr.success('Файл отправлен на обработку');
            })
        })
        $('.al-power-tip').powerTip({placement: 'n'});
    })
    @if($currentUser && in_array($currentUser->role_id, [1]))
    const imgNotification = pusher.subscribe('image-{{$board->id}}');
    imgNotification.bind('ai-check-result', function(data) {
        $('.validate-result').empty().append(`${data.valid ? 'Фото валидно' : 'Фото не валидно'}<br>${data.description}`)
    });
    @endif
</script>