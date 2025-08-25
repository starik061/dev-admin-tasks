@include('add.head')
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
    .selected-btn{
        opacity: 0;
        visibility: hidden;
        transition: all .3s ease
    }
    .selected-btn.show{
        opacity: 1;
        visibility: visible;
        transition: all .3s ease
    }
    #basketMap{
        height: 600px;
        width: 100%;
    }
    .table-body{
        display: block;
        position: static;
    }
    #result-search-list .manager-search{
        padding: 0;
    }
    #result-search-list .result-list .table-result{
        padding: 0;
    }
    #result-search-list .result-list .table-result .thead .tr .td-buy, #result-search-list .result-list .table-result .tbody .tr .td-buy {
        width: auto;
    }
    .manager-search.show-list h1.title{
        padding: 0 30px;
    }
    section.basket {
        padding-bottom: 20px;
    }
    section.basket .basket_manager-controls{
        padding: 20px 30px;
    }
    .td-type{
        white-space: normal !important;
    }
</style>
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')
@php
    $mo = @$_COOKIE['openMapMobileBasket'];
@endphp
<div class="search-map-button">
    <span>Карта</span>
    <div class="arrow @if(!$mo || $mo == 'false') arrow-disclose-down @else arrow-disclose-up @endif"></div>
</div>

<section class="basket-map @if(!$mo || $mo == 'false') mobile-hide @endif">
    <div class="row no-gutters navigation-wrapper">
        <div id="basketMap"></div>
    </div>
</section>



<section class="basket" id="result-search-list">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base container-search-result manager-search show-list">
                <h1 class="title">@lang('message.my_basket')</h1>
                <div class="basket-block result-list">
                    <div class="basket-table">
                        <div class="table-head">
                            <p class="subtitle count">@lang('message.planes_in_basket'): <span
                                        class="cnt_val">{{ $data['order_count'] }}</span></p>
                            <div style="display: flex; align-items: center">
                                <a class="clear-bskt" id="back-to-buy">@lang('message.back_to_buy')</a>
                                @if (count($orders))
                                    <a class="clear-bskt"
                                       data-basket_id="{{ $basket->id }}">@lang('message.clear_basket')
                                        <div class="del-ico"></div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="table-body">
                            <div class="table-result">
                                <div class="thead">
                                    <div class="tr">
                                        <div class="td td-checkbox"><input id="selectAll" type="checkbox"/></div>
                                        <div class="td td-code">ID</div>
                                        <div class="td td-city">@lang("message.city")</div>
                                        {{--<div class="td td-code">@lang('message.code')</div>--}}
                                        @can('view-suppliers-in-search')
                                            <div class="td td-firm">@lang("message.firm")</div>
                                        @endif
                                        <div class="td td-type">@lang('message.type_')</div>
                                        <div class="td td-adress">@lang('message.address_')</div>
                                        <div class="td td-side">сторона</div>
                                        <div class="td td-light">@lang('message.light_')</div>
                                        <div class="td td-photo">@lang('message.photo')</div>
                                        @can('view-approximated-prices')
                                            <div class="td td-supplier-price">
                                                <a>@lang('message.purchase_price')</a>
                                            </div>
                                        @endcan
                                        <div class="td td-original-price">@lang('message.in_price')</div>

                                            <div class="td td-price">
                                                <a>@lang('message.selling_price')</a>
                                            </div>


                                        <div class="td td-choice">@lang('message.employment_')</div>
                                        <div class="td td-changed">@lang('message.change')</div>
                                        <div class="td"></div>
                                    </div>
                                </div>
                                <div class="tbody">
                                    @foreach($orders as $board)
                                        @include('front.basket.manager.row')
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if ($boards->lastPage() > 1)
                            <div class="result-paginator" data-manager="{{ $admin }}" data-current-page="{{ $boards->currentPage() }}" data-total-page="{{ $boards->lastPage() }}">
                                <div class="result-paginator__pages">
                                    <div class='result-paginator__prev'>
                                        <i class="fa fa-arrow-left"></i>
                                        <a href="{!! $boards->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                                    </div>
                                    {!! $boards->links() !!}
                                    <div class='result-paginator__next'>
                                        <a href="{!! $boards->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="total-block">
                        <div class="text">
                            <p class="subtitle">@lang('message.itogo'):
                                @if (Auth::user() && (Auth::user()->role_id < 3 || Auth::user()->role_id == 7))
                                    <span class="total-amount">{{$total_price}} грн</span>
                                @elseif (setting('front.hidden_price') && count($orders))
                                    <span class="total-amount">{{ setting('front.hidden_price_word') }}</span>
                                @else
                                    <span class="total-amount">{{$total_price}} грн</span>
                                @endif
                            </p>
                            <p class="descr">@lang('message.price_without_nds') <svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #55bc4f;
                                                fill-rule: evenodd;
                                            }
                                        </style>
                                    </defs>
                                    <path id="done" class="cls-1"
                                          d="M1035,1210a5,5,0,1,0,5,5A4.989,4.989,0,0,0,1035,1210Zm2.89,3.43h0l-3.64,3.77a0.2,0.2,0,0,1-.16.07,0.165,0.165,0,0,1-.16-0.07l-1.77-1.9-0.05-.05a0.266,0.266,0,0,1-.06-0.16,0.29,0.29,0,0,1,.06-0.16l0.32-.32a0.223,0.223,0,0,1,.32,0l0.02,0.03,1.25,1.34a0.121,0.121,0,0,0,.16,0l3.05-3.16h0.02a0.223,0.223,0,0,1,.32,0l0.32,0.32A0.189,0.189,0,0,1,1037.89,1213.43Z"
                                          transform="translate(-1030 -1210)" />
                                </svg></p>
                        </div>
                    </div>
                </div>
                @if (count($orders))
                    <div class="basket_manager-controls">
                        @if($selectionSession = session()->get('selection_contragent'))
                            <div class="add-to-collection-quick" data-id="{{$selectionSession->id}}" data-type="{{get_class($selectionSession) === 'App\CrmLeads' ? 'lead' : 'client'}}">
                                <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png"
                                     alt="add" />
                                <span>@lang('message.add_podborku')</span>
                            </div>
                        @else
                            <div class="add-to-collection">
                                <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png"
                                     alt="add" />
                                <span>@lang('message.add_podborku')</span>
                            </div>
                        @endif
                        <div class="del-selected selected-btn mobile-hide">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" heigth="24"><path d="M 10 2 L 9 3 L 5 3 C 4.4 3 4 3.4 4 4 C 4 4.6 4.4 5 5 5 L 7 5 L 17 5 L 19 5 C 19.6 5 20 4.6 20 4 C 20 3.4 19.6 3 19 3 L 15 3 L 14 2 L 10 2 z M 5 7 L 5 20 C 5 21.1 5.9 22 7 22 L 17 22 C 18.1 22 19 21.1 19 20 L 19 7 L 5 7 z M 9 9 C 9.6 9 10 9.4 10 10 L 10 19 C 10 19.6 9.6 20 9 20 C 8.4 20 8 19.6 8 19 L 8 10 C 8 9.4 8.4 9 9 9 z M 15 9 C 15.6 9 16 9.4 16 10 L 16 19 C 16 19.6 15.6 20 15 20 C 14.4 20 14 19.6 14 19 L 14 10 C 14 9.4 14.4 9 15 9 z"></path></svg>
                            <span>Выделенное удалить</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


<script>
    var checked = {!!json_encode($checked)!!};
</script>
<style>
    .mobile-show{
        display:none;
    }
    @media screen and (max-width: 560px){
        .mobile-show{
            display:block;
        }
        #result-search-list .result-list .table-result .tbody .td.mobile-hide{
            display: none !important;
        }
        #result-search-list .result-list .table-result .tbody  .td.td-busy.mobile-hide{
            display:none !important;
        }
        .basket-map.mobile-hide{
            display:none;
        }
        section.basket .basket_manager-controls .mobile-hide{
            display:none;
        }
        .busy-calendar .title{
            font-size: 14px;
            margin-bottom:  8px;
            margin-top: 10px;
        }

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
    }
    .export-excel{
        position:relative;
    }
    section.basket .basket_manager-controls > div.export-excel:hover{
        opacity: 1;
    }
    section.basket .basket_manager-controls > div.export-excel:hover a,
    section.basket .basket_manager-controls > div.export-excel:hover img{
        opacity: 0.5;
    }
    section.basket .basket_manager-controls > div.export-excel:hover a.dwn-button{
        opacity: 1;
        color:#fff;
    }
    section.basket .basket_manager-controls > div.export-excel:hover a.dwn-button:hover{
        opacity: 1;
        color:#fff;
    }
    .dwn-button{
        padding-left: 20px;
        padding-right: 20px;
    }
    .excel_setting{
        display: none;
        width:  420px;
        position: absolute;
        left:0;
        top:0;
        background: #fff;
        padding: 10px;
        z-index: 10000;
    }
    .export-excel:hover .excel_setting{
        opacity:1;
    }
    .export-header{
        padding-bottom: 10px;
    }
    .export-header span{
        font-size:16px;
        font-weight: 500;
    }
    .export-header svg{
        fill: #fc6b40;
        width: 20px;
        height: 20px;
        position: absolute;
        right: 10px;
        top: 15px;
        cursor: pointer;
    }
    .excel_setting .checboxes{
        height: 460px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }
    .excel_setting .checboxes .checkbox-block{
        width: 200px;
        padding: 5px 0;
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

    .boards-td-price-in .basket-price-item{
        background: white url(/public/assets/img/select2.png) left top no-repeat;
    }

    .boards-td-price-in .basket-price-item{
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
    }
</style>
@include('add.footer')
<script>
    $('.search-map-button').click(function(){
        if($('.basket-map').is(':visible')){
            $('.basket-map').addClass('mobile-hide');
            $('.search-map-button .arrow').removeClass('arrow-disclose-up').addClass('arrow-disclose-down');
            setCookiesMap(false);
        }else{
            $('.basket-map').removeClass('mobile-hide');
            $('.search-map-button .arrow').removeClass('arrow-disclose-down').addClass('arrow-disclose-up');
            setCookiesMap(true);
        }
    })

    function setCookiesMap(type){
        document.cookie = "openMapMobileBasket=" + type + ";path=/;expires=Fri, 31 Dec 9999 23:59:59 GMT";
    }
    $(document).ready(function(){
        $('.export-excel a.export_excel_link').click(function(e){
            e.preventDefault();
            $('.excel_setting').show();
        })
        $('[name="cols[]"]').change(function(){
            var q_str = "?tmp=1";
            $('[name="cols[]"]:checked').each(function(){
                q_str += '&cols[]='+$(this).val()
            });
            let my_url = $('.dwn-button').attr('href').split('?')[0] + q_str;
            $('.dwn-button').attr('href',my_url);
        });
        $('.export-header svg').click(function(){
            $('.excel_setting').hide();
        });

        // LEADS CHANGE
        document.lead_change = false;
        $('.lead__name').change(function(){
            if(document.lead_change){
                return;
            }
            document.lead_change = true;
            let val = $(this).val();
            $('.lead__email').val(val).trigger('change');
            $('.lead__phone').val(val).trigger('change');
            document.lead_change = false;
        });
        $('.lead__phone').change(function(){
            if(document.lead_change){
                return;
            }
            document.lead_change = true;
            let val = $(this).val();
            $('.lead__email').val(val).trigger('change');
            $('.lead__name').val(val).trigger('change');
            document.lead_change = false;
        });
        $('.lead__email').change(function(){
            if(document.lead_change){
                return;
            }
            document.lead_change = true;
            let val = $(this).val();
            $('.lead__phone').val(val).trigger('change');
            $('.lead__name').val(val).trigger('change');
            document.lead_change = false;
        });

        $('.client__name').change(function(){
            if(document.lead_change){
                return;
            }
            document.lead_change = true;
            let val = $(this).val();
            $('.client__email').val(val).trigger('change');
            $('.client__phone').val(val).trigger('change');
            document.lead_change = false;
        });
        $('.client__phone').change(function(){
            if(document.lead_change){
                return;
            }
            document.lead_change = true;
            let val = $(this).val();
            $('.client__email').val(val).trigger('change');
            $('.client__name').val(val).trigger('change');
            document.lead_change = false;
        });
        $('.client__email').change(function(){
            if(document.lead_change){
                return;
            }
            document.lead_change = true;
            let val = $(this).val();
            $('.client__phone').val(val).trigger('change');
            $('.client__name').val(val).trigger('change');
            document.lead_change = false;
        });

        $(document).on('change', '.basket-price-item', function(){
            if(!$(this).val()){
                return false;
            }
            const data = {
                type: $(this).data('type'),
                board_id: $(this).data('board_id'),
                price: +$(this).val()
            }
            $.ajax({
                url: '/manager/basket/change-price',
                method: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                accept: 'application/json',
                processData: false,
                success: function(response){
                    if(response.message){
                        toastr.success(response.message)
                    }
                },
                error: suppliersBillsResponseError
            })
        })

    });
</script>