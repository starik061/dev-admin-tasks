@include('add.head')
<body>
@include('add.header')
@include('add.menu')
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
<style>
    .basket {
        background: #f6f7fa;
    }

    .basket .table-body .table-result .tbody .td {
        border-bottom: none;
    }

    .basket .table-body .table-result .tbody.basket-data-block .tr .td {
        border-top: none;
        padding-top: 16px;
    }

    .basket .table-body .table-result .tr .td-adress {
        width: 260px;
    }

    .basket-block {
        padding-bottom: 80px;
    }

    .basket-block .line {
        display: inline-block;
        padding-left: 0px;
        padding-right: 10px;
    }

    .basket-block .line input[type="checkbox"] {
        display: none;
    }

    label.label-box input[type="checkbox"] {
        display: none;
    }

    .basket-block .confirm-block .check-robot .label-box {
        margin-right: 10px;
    }

    .agreement .line {
        padding: 0;
        padding-top: 5px;
    }

    .basket-data-block .gray-bg {
        background: #f6f7fa;
        padding: 0 26px;
        margin: 0 -26px;
    }

    .table-body .table-result .thead .tr, .table-body .table-result .tbody .tr {
        display: block;
    }

    .table-body .table-result .thead .tr .td,
    .table-body .table-result .tbody .tr .td {
        padding-left: 0;
    }

    .legend {
        margin-top: 5px;
    }

    .basket-data-block .i-t-b .calendar-board .choose-calendar > div {
        height: 50px;
    }

    .basket-data-block .i-t-b .calendar-board .choose-calendar > div p.m-n {
        font-size: 11px;
    }

    .basket-container .i-t-b {
        width: 900px;
    }

    .table-body .table-result .thead .tr .td-price, .table-body .table-result .tbody .tr .td-price {
        min-width: 200px;
    }

    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.free,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.busy,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.reserve,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.pre-order,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.free.select,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.busy.select,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.reserve.select,
    .basket-data-block .i-t-b .calendar-board .choose-calendar > div.pre-order.select {
        border-left: none !important;
        border-top: none !important;
        border-bottom: none !important;
        border-radius: 0;
        border-right: solid 3px #fff !important;
    }

    .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(12) {
        border-right: none !important;
    }

    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.free,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.busy,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.reserve,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.pre-order,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.free.select,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.busy.select,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.reserve.select,
    .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div.pre-order.select {
        border-right: solid 3px #f6f7fa !important;
    }

    .basket-data-block .i-t-b .calendar-board .legend p {
        font-size: 13px;
    }

    .basket-data-block .i-t-b .calendar-board .legend ul li {
        font-size: 13px;
    }

    .basket-data-block .i-t-b .calendar-board .choose-calendar {
        margin-top: 0;
    }

    .table-body .table-result .tbody.basket-data-block .basket-container {
        height: 104px;
    }

    .table-head {
        display: flex;
    }

    .head-item {
        flex: 1;
    }

    .head-item:nth-child(1) {
        text-align: left;
    }

    .head-item:nth-child(2) {
        text-align: center;
    }

    .head-item:nth-child(3) {
        text-align: right;
    }

    #back-to-buy {
        /*display:inline;*/
        justify-content: left;
    }

    #back-to-buy img {
        margin-right: 5px;
    }

    .clear-bskt {
        justify-content: right;
    }

    .table-body .table-result .thead .tr .td.td-buy,
    .table-body .table-result .tbody .tr .td.td-buy {
        padding-left: 5px;
    }

    .del-ico2:after {
        top: calc(50% - 3px);
        right: 3px;
        border-right: 3px solid #8b8f9d;
        transform: rotate(-45deg);
    }

    .del-ico2:after, .del-ico2:before {
        position: absolute;
        bottom: 0;
        width: 17px;
        height: 17px;
        content: '';
    }

    .del-ico2:before {
        top: calc(50% - 3px);
        left: 6px;
        border-left: 3px solid #8b8f9d;
        transform: rotate(45deg);
    }

    @media screen and (min-width: 100px) and (max-width: 1000px) {
        .table-body .table-result .tbody .tr {
            display: flex;
            flex-direction: column;
            margin-top: 0px;
            padding: 0 20px;
            border-bottom: none;
            background-color: #fff;
        }

        .table-body .table-result .tbody .tr.gray-bg {
            background: #f6f7fa;
        }

        .table-body .table-result .tbody.basket-data-block .basket-container {
            height: 150px;
        }

        .basket-container .i-t-b {
            width: calc(100% - 60px);
        }

        header .right-side .currency .dropdown-currency {
            margin-left: -150px;
        }

        section.basket {
            padding-bottom: 0px;
        }
    }

    @media screen and (min-width: 768px) and (max-width: 1000px) {
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(6) {
            border-right: none !important;
        }

        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(1),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(2),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(3),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(4),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(5),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(6) {
            border-bottom: solid 3px #fff !important;
        }

        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(1),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(2),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(3),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(4),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(5),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(6) {
            border-bottom: solid 3px #f6f7fa !important;
        }
    }

    @media screen and (min-width: 100px) and (max-width: 767px) {
        .table-body .table-result .tbody.basket-data-block .basket-container {
            height: 260px;
        }

        .table-body .table-result .tbody .tr {
            margin: 0 -26px
        }

        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(3),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(6),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(9) {
            border-right: none !important;
        }

        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(1),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(2),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(3),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(4),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(5),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(6),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(7),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(8),
        .basket-data-block .i-t-b .calendar-board .choose-calendar > div:nth-child(9) {
            border-bottom: solid 3px #fff !important;
        }

        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(1),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(2),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(3),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(4),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(5),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(6),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(7),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(8),
        .basket-data-block .gray-bg .i-t-b .calendar-board .choose-calendar > div:nth-child(9) {
            border-bottom: solid 3px #f6f7fa !important;
        }
    }

    @media screen and (min-width: 100px) and (max-width: 572px) {
        .table-body .table-result .tbody.basket-data-block .basket-container {
            height: 290px;
        }
    }

    @media screen and (min-width: 100px) and (max-width: 380px) {
        .table-body .table-result .tbody.basket-data-block .basket-container {
            height: 310px;
        }
    }

    .thead .td-side {
        text-transform: lowercase;
    }
</style>
<section class="basket">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base">
                <h1 class="title">@lang('message.my_basket')</h1>
                <div class="basket-block  @if(!count($orders)) hide @endif">
                    <div class="basket-table">
                        <div class="table-head">
                            <div class="head-item">
                                <a class="clear-bskt" id="back-to-buy">
                                    <img src="/public/assets/img/arr-left.png"/>
                                    @lang('message.back_to_buy')
                                </a>
                            </div>
                            <div class="head-item">
                                <p class="subtitle count">@lang('message.planes_in_basket'): <span
                                            class="cnt_val">{{ $data['order_count'] }}</span></p>
                            </div>
                            <div class="head-item">
                                @if (count($orders))
                                    <a class="clear-bskt"
                                       data-basket_id="{{ $basket->id }}">@lang('message.clear_basket')
                                        <div class="del-ico del-ico2"></div>
                                    </a>
                                @endif
                            </div>
                            {{--
                            <div style="display: flex; align-items: center">
                            </div>
                            --}}
                        </div>
                        <div class="table-body">
                            <div class="table-result">
                                <div class="thead">
                                    <div class="tr">
                                        <div class="td td-code">@lang('message.code')</div>
                                        <div class="td td-type">@lang('message.type_')</div>
                                        <div class="td td-adress">@lang('message.address_')</div>
                                        <div class="td td-side">@lang('message.side')</div>
                                        @if(Auth::user())
                                            <div class="td td-choice">@lang('message.employment__')</div>
                                            <div class="td td-price">@lang('message.without_nds')</div>
                                            <div class="td" style="width: 30px;">&nbsp;</div>
                                        @else
                                            <div class="td td-choice" style="width: 370px; max-width: none !important;">@lang('message.employment__')</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tbody  basket-data-block">
                                    @php $i = 0; @endphp
                                    @foreach($orders as $board)
                                        @php
                                            $gray = "";
                                            if($i % 2 == 1){
                                                $gray = "gray-bg";
                                            }
                                            $i++;
                                        @endphp
                                        <div class="tr {{ $gray }}">
                                            <!-- <div class="td td-photo text-center">
                          <span class="mb-title">фото</span>
                          <img class="img" src="assets/img/icon_photo_on.svg" alt="board" data-img="
                            @if ($board->image != null)
                                                {{ "/upload/" . $board->image }}
                                            @endif
                                            @if ($board->image != null && $board->scheme != null)
                                                |

                                            @endif
                                            @if ($board->scheme != null)
                                                {{ "/upload/" . $board->scheme }}
                                            @endif
                                            "/>
                                          </div> -->
                                            <a href="{{$data['lang_url']}}/{{ $board->aleas }}" class="td td-code"
                                               data-code="351" data-select-month="">
                                                <span class="mb-title">@lang('message.code')</span>
                                                <span>{{$board->board_id}}</span>
                                            </a>
                                            <a href="{{$data['lang_url']}}/{{ $board->aleas }}" class="td td-type">
                                                <span class="mb-title">@lang('message.type_')</span>
                                                <span>{{ $board->type }}</span>
                                            </a>
                                            <a href="{{$data['lang_url']}}/{{ $board->aleas }}" class="td td-adress">
                                                <span class="mb-title">@lang('message.address_')</span>
                                                <span>{{$board->city}}, {{$board->addr}}</span>
                                            </a>
                                            <a href="{{$data['lang_url']}}/{{ $board->aleas }}"
                                               class="td td-side text-center">
                                                <span class="mb-title">@lang('message.side')</span>
                                                <span>{{ $board->side_type }}</span>
                                            </a>
                                            @if ($board->ym['line'])
                                                <div class="td td-choice" @if(!Auth::user())"
                                                style="padding-left: 12px; width: 370px; max-width: none !important;"@endif>

                                                <span class="mb-title">@lang('message.selected_month')</span>
                                                <span class="months-title">{{ $board->ym['boards'] }}</span>

                                                <div class="busy-calendar">
                                                    {{--<p class="title-calendar">@lang('message.calendar_employment') <span class="title-year">{{date('Y')}}</span> г.</p>--}}
                                                    <p class="title-calendar">@lang('message.calendar_employment__')</p>
                                                    <div class="wrapp-busy-table"
                                                         data-board_id="{{ $board->board_id }}"
                                                         data-busy="{{ $board->reserve }}"
                                                         data-set="{{ $board->ym_line }}">

                                                    </div>
                                                </div>
                                        </div>
                                        @else
                                            <div class="td td-choice" @if(!Auth::user())"
                                            style="padding-left: 12px; width: 370px; max-width: none !important;"@endif>
                                            <span class="mb-title">@lang('message.selected_month')</span>
                                            <span class="months-title">
                                                        {{ $board->ym['boards']}}
                                                    </span>
                                            <div class="busy-calendar">
                                                {{--<p class="title-calendar">@lang('message.calendar_employment') <span class="title-year">{{date('Y')}}</span> г.</p>--}}
                                                <p class="title-calendar">@lang('message.calendar_employment__')</p>
                                                <div class="wrapp-busy-table"
                                                     data-board_id="{{ $board->board_id }}"
                                                     data-busy="{{ $board->reserve }}"
                                                     data-set="{{ $board->ym_line }}">

                                                </div>
                                            </div>
                                </div>
                                @endif
                                @if(Auth::user())
                                    <a href="{{$data['lang_url']}}/{{ $board->aleas }}" class="td td-price">
                                        @if ($currentUser &&  $currentUser->role_id == 1)
                                            <span class="mb-title">@lang('message.price_')</span><span
                                                    class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!} / @lang('message.month') </span>
                                        @elseif (setting('front.hidden_price') || !$board->price)
                                            <span class="mb-title">@lang('message.price_')</span><span
                                                    class="cost-board">{{ __('message.hidden_price_word') }}</span>
                                        @else
                                            <span class="mb-title">@lang('message.price_')</span><span
                                                    class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!} / @lang('message.month')</span>
                                        @endif
                                    </a>
                                @endif
                                <div class="td td-buy">
                                    <a class="del"><span
                                                class="mb-title">@lang('message.remove_from_basket')</span>
                                        <div class="del-ico" data-basket_id="{{ $basket->id }}"
                                             data-board_id="{{ $board->board_id }}"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="basket-container {{ $gray }}"
                                 id="basket-employment-{{$board->board_id}}">
                                <div class="i-t-b">
                                    <div class="calendar-board">
                                        @if ($board->reserve)
                                            <div class="choose-calendar"
                                                 data-reserve="{{ $board->reserve }}"
                                                 {{--data-basket="{{ $board->basket }}"--}} data-board-id="{{ $board->id }}"
                                                 data-basket="{{$board->ym_line}}"></div>
                                        @endif
                                        <div class="legend">
                                            <p>@lang('message.check_month_employment')</p>
                                            <ul>
                                                <li>@lang('message.calendar_employment')</li>
                                                <li><i class="fa fa-circle select" aria-hidden="true"></i>
                                                    - @lang('message.free_')</li>
                                                <li><i class="fa fa-circle reserve" aria-hidden="true"></i>
                                                    - @lang('message.reserve')</li>
                                                <li><i class="fa fa-circle pre-order"
                                                       aria-hidden="true"></i> - @lang('message.predzakaz')
                                                </li>
                                                <li><i class="fa fa-circle busy" aria-hidden="true"></i>
                                                    - @lang('message.busy')</li>
                                            </ul>
                                        </div>
                                        <div class="select-month hide-this"><span class="text">выбран 1 месяц</span><img
                                                    src="/assets/img/icon_done.svg" alt="done"/></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="extra-block">
                <p class="subtitle">@lang('message.additional_services')</p>
                <div class="line">
                    <input class="checkbox" id="new-maket" type="checkbox" name="new-maket"/>
                    <label for="new-maket">@lang('message.need_design')
                        (@lang('message.price_from') {{setting('billboards.design_price')}} @lang('message.uah')
                        )</label>
                </div>
                <div class="line">
                    <input class="checkbox" id="print-poster" type="checkbox" name="print-poster"/>
                    <label for="print-poster">@lang('message.need_posters') (@lang('message.basket_poster')
                        - {{ App\BoardsServicesPriceForFaq::find(1)->price }} @lang('message.uah')</label>
                </div>
            </div>
            <div class="comment-block">
                <p class="subtitle">@lang('message.comment')</p>
                <textarea name="" placeholder="@lang('message.comment_to_order')"></textarea>
            </div>
            <div class="confirm-block">
                <div class="check-robot">
                    <label class="label-box chBox">
                        <input type="checkbox"/>
                        <div class="box"></div>
                        <span>@lang('message.drag_captcha')</span>
                    </label>
                </div>
                @if(Auth::user())
                    <div class="agreement">
                        <div class="line">
                            <input class="checkbox" id="agreement" type="checkbox" name="agreement"/>
                            <label for="agreement">@lang('message.agree') <a
                                        href="{{$data['lang_url']}}/agreement">@lang("message.user_agreement")</a></label>
                        </div>
                    </div>
                @endif
            </div>
            <div class="total-block">
                @if(Auth::user())
                    <div class="text">
                        <p class="subtitle">@lang('message.itogo'):
                            @if ($currentUser &&  $currentUser->role_id == 1)
                                <span class="total-amount">{{$total_price}} {!!$_COOKIE['currency_symbol']!!}</span>
                            @elseif (setting('front.hidden_price') && count($orders))
                                <span class="total-amount">{{ __('message.hidden_price_word') }}</span>
                            @else
                                <span class="total-amount">{{$total_price}} {!!$_COOKIE['currency_symbol']!!}</span>
                            @endif
                        </p>
                        <p class="descr">@lang('message.price_without_nds')
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                <defs>
                                    <style>.cls-1 {
                                            fill: #55bc4f;
                                            fill-rule: evenodd;
                                        }</style>
                                </defs>
                                <path id="done" class="cls-1"
                                      d="M1035,1210a5,5,0,1,0,5,5A4.989,4.989,0,0,0,1035,1210Zm2.89,3.43h0l-3.64,3.77a0.2,0.2,0,0,1-.16.07,0.165,0.165,0,0,1-.16-0.07l-1.77-1.9-0.05-.05a0.266,0.266,0,0,1-.06-0.16,0.29,0.29,0,0,1,.06-0.16l0.32-.32a0.223,0.223,0,0,1,.32,0l0.02,0.03,1.25,1.34a0.121,0.121,0,0,0,.16,0l3.05-3.16h0.02a0.223,0.223,0,0,1,.32,0l0.32,0.32A0.189,0.189,0,0,1,1037.89,1213.43Z"
                                      transform="translate(-1030 -1210)"/>
                            </svg>
                        </p>
                    </div>
                @endif
                <div class="submit" data-basket_id="{{ $basket->id }}" data-authorized="{{Auth::user()}}"><span
                            class="btn">@lang('message.get_order')</span></div>
            </div>
        </div>
        <div class="basket-block-2 @if(count($orders)) hide @endif">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="200px" height="200px" viewBox="0 0 902.86 902.86"
                 style="enable-background:new 0 0 902.86 902.86; "
                 xml:space="preserve">
                <g>
                    <g style="fill:#3d445c; opacity:0.3">
                        <path d="M671.504,577.829l110.485-432.609H902.86v-68H729.174L703.128,179.2L0,178.697l74.753,399.129h596.751V577.829z
                			 M685.766,247.188l-67.077,262.64H131.199L81.928,246.756L685.766,247.188z"/>
                        <path d="M578.418,825.641c59.961,0,108.743-48.783,108.743-108.744s-48.782-108.742-108.743-108.742H168.717
                			c-59.961,0-108.744,48.781-108.744,108.742s48.782,108.744,108.744,108.744c59.962,0,108.743-48.783,108.743-108.744
                			c0-14.4-2.821-28.152-7.927-40.742h208.069c-5.107,12.59-7.928,26.342-7.928,40.742
                			C469.675,776.858,518.457,825.641,578.418,825.641z M209.46,716.897c0,22.467-18.277,40.744-40.743,40.744
                			c-22.466,0-40.744-18.277-40.744-40.744c0-22.465,18.277-40.742,40.744-40.742C191.183,676.155,209.46,694.432,209.46,716.897z
                			 M619.162,716.897c0,22.467-18.277,40.744-40.743,40.744s-40.743-18.277-40.743-40.744c0-22.465,18.277-40.742,40.743-40.742
                			S619.162,694.432,619.162,716.897z"/>
                    </g>
                </g>
             </svg>
            <br/>
            <span>@lang("message.empty_basket")</span>
        </div>
        @if (count($orders) && $currentUser &&  $currentUser->role_id == 1)
            <div class="basket_manager-controls">
                <div class="export-excel">
                    <img src="https://img.icons8.com/fluent/24/000000/microsoft-excel-2019.png" alt="excel"/>
                    <a href="{{$data['lang_url']}}/get_excel">@lang('message.export_xls')</a>
                </div>
                <div class="add-to-collection">
                    <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png" alt="add"/>
                    <span>@lang('message.add_podborku')</span>
                </div>

                <div class="selected-btn" id="watchAll" data-registered="{{ $currentUser ? 'true' : 'false' }}">
                    <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png" alt="add"/>
                    <span>Наблюдать</span>
                </div>

            </div>
        @endif
    </div>
    </div>
    </div>
</section>
@include('add.footer')