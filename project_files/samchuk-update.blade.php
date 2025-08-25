@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
@endphp

<section id="result-search-list" class="al-client-info">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search our-details posts-block">
                <h1 class="title-search-result" style="position: relative">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block posts-block">
                    <div class="search-block">
                        <form action="/manager/samchuk-duplicates" method="GET" class="field-container">
                            <div class="input-block w260">
                                <label>@lang('message.owner')</label>
                                <select name="firm_id">
                                    <option></option>
                                    @foreach($firms as $firm)
                                        <option value="{{$firm->id}}" @if(@$params['firm_id'] == $firm->id) selected @endif>{{$firm->name}} ({{$firm->boardsCount}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-block small-input-block">
                                <label>&nbsp;</label>
                                <button class="btn submit">@lang('message.show')</button>
                            </div>
                        </form>
                    </div>
                    @if($boards)
                        <div class="results-blocks">
                            @foreach($boards as $board)
                                <div class="result-item">
                                    <button class="btn cancel-button submit"
                                            data-prime_id="{{$board->id}}"
                                    >
                                        @lang('message.cancel')
                                    </button>
                                    <div class="left-info-block">
                                        id: <a href="/{{$board->aleas}}" target="_blank" style="color:#FC6B40; text-decoration: underline;">{{$board->id}}</a><br>
                                        @lang('message.type_'): {{$board->board_type->title}}<br>
                                        @lang('message.address_'): {{$board->board_cirty->name}}, {{$board->addr}}<br>
                                        @lang('message.side_lc'): {{$board->side}}<br>
                                        <a class="fancybox" href="/upload/{{$board->image}}">
                                            <img src="/upload/{{$board->image}}"/>
                                        </a>
                                    </div>
                                    <div class="right-info-block" style="position:relative">
                                        @if($board->originalBoards)
                                            <div class="field-container" style="position: absolute; padding-bottom: 5px; background: #fff; left: 0; top : 0; z-index:100;">
                                                <div class="input-block">
                                                    <label>@lang('message.plane_type')</label>
                                                    <select class="type-select">
                                                        <option value="">-</option>
                                                        @foreach($boardsType as $type)
                                                            <option value="{{$type->type}}" @if($type->type == $board->type) selected @endif>{{$type->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-block">
                                                    <label>@lang('message.side')</label>
                                                    <select class="side_-select">
                                                        <option value="">-</option>
                                                        @foreach($boardsSide as $side)
                                                            <option value="{{$side}}" @if($side == $board->side_type) selected @endif>{{$side}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-block">
                                                    <label>@lang('message.address')</label>
                                                    <input type="text" class="addr-input"/>
                                                </div>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class="scrollable">
                                                @foreach($board->originalBoards as $original)
                                                    <div class="original-item"
                                                         data-type="{{$original->type}}"
                                                         data-side="{{$original->side_type}}"
                                                         data-address="{{$original->addr}}"
                                                         @if($board->side_type == $original->side_type && $board->type == $original->type)
                                                             style="display: flex"
                                                         @else
                                                             style="display: none"
                                                            @endif
                                                    >
                                                        <div class="img-block">
                                                            <a class="fancybox" href="/upload/{{$original->image}}">
                                                                <img src="/upload/{{$original->image}}"/>
                                                            </a>
                                                        </div>
                                                        <div class="info">
                                                            id: <a href="/{{$original->aleas}}" target="_blank" style="color:#FC6B40; text-decoration: underline;">{{$original->id}}</a><br>
                                                            @lang('message.type_'): {{$original->board_type->title}}<br>
                                                            @lang('message.address_'): {{$original->board_cirty->name}}, {{$original->addr}}<br>
                                                            @lang('message.side_lc'): {{$original->side}}<br>
                                                            <a class="btn select-original submit pointer"
                                                               data-prime_id="{{$board->id}}"
                                                               data-original_id="{{$original->id}}"
                                                            >
                                                                @lang('message.choose')
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            @if ($boards->lastPage() > 1)
                                <div class="result-paginator" data-current-page="{{ $boards->currentPage() }}" data-total-page="{{ $boards->lastPage() }}">
                                    <div class="result-paginator__pages">
                                        <div class='result-paginator__prev'>
                                            <i class="fa fa-arrow-left"></i>
                                            <a href="{!! $boards->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                                        </div>
                                        {!! $boards->appends($params)->links() !!}
                                        <div class='result-paginator__next'>
                                            <a href="{!! $boards->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- RESULT SEARCH (END) -->
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<style>
    #result-search-list .manager-search.our-details.posts-block{
        width: 1200px;
    }
    .result-item{
        display:flex;
        flex-direction: row;
        border-bottom: 1px solid #dee5ec;
        padding: 10px 0px;
        position: relative;
    }
    .result-item .cancel-button{
        display: none;
    }
    .result-item.disabled .cancel-button{
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -37px;
        margin-top: -21px;
        z-index: 100;
    }
    .result-item.disabled .left-info-block,
    .result-item.disabled .right-info-block{
        opacity:0.5;
    }
    .left-info-block,
    .right-info-block{
        flex:1
    }
    .right-info-block{

    }
    .right-info-block .scrollable{
        height:500px;
        overflow-y: scroll;
    }
    .left-info-block img{
        width: 480px;
    }
    .original-item{
        /*width: 700px;*/
        margin-left: 20px;
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
    }
    .original-item .img-block,
    .original-item .img-block img{
        width: 200px;
    }
    .original-item .info{
        padding-left:10px;
    }
    .btn.select-original.submit.pointer{
        color: #fff;
    }
    .type-select{
        width: 120px;
    }
    .side_-select{
        width: 80px;
    }
    .right-info-block .original-item:first-child{
        padding-top: 40px;
    }
    .select2-container {
        z-index: 105;
    }
</style>
<script>
    $('[name=firm_id]').select2({minimumResultsForSearch: -1});
    $('.type-select').select2({minimumResultsForSearch: -1});
    $('.side_-select').select2({minimumResultsForSearch: -1});
    $('.fancybox').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });
    $(document).on('click', '.result-item:not(.disabled) .select-original', function(){
        let _this = this;
        $.post(
            '/manager/samchuk-duplicates',
            {
                'prime_id': $(this).data('prime_id'),
                'original_id': $(this).data('original_id'),
            },
            function(data){
                if(data.status){
                    $(_this).closest('.result-item').addClass('disabled');
                    toastr.success('@lang('message.plane_processed')')
                }
            }
        )

        return false;
    })
    $(document).on('click', '.cancel-button', function(){
        let _this = this;
        $.post(
            '/manager/samchuk-duplicates/cancel',
            {
                'prime_id': $(this).data('prime_id')
            },
            function(data){
                if(data.status){
                    $(_this).closest('.result-item').removeClass('disabled');
                    toastr.success('@lang('message.action_canceled')')
                }
            }
        )
    })
    $(document).on('change', '.right-info-block .field-container .type-select, .right-info-block .field-container .side_-select', function(){
        filterPlanes(this);
    })
    $(document).on('keyup', '.right-info-block .field-container .addr-input', function(){
        filterPlanes(this);
    })
    const filterPlanes = (el) => {
        const type = $(el).closest('.field-container').find('.type-select').val();
        const side = $(el).closest('.field-container').find('.side_-select').val();
        const addr = $(el).closest('.field-container').find('.addr-input').val().toLowerCase();
        $(el).closest('.right-info-block').find('.original-item').hide().each(function(){
            if(!type && side){
                if($(this).data('side') === side){
                    $(this).css('display','flex');
                }
            }
            if(type && !side){
                if($(this).data('type') === type){
                    $(this).css('display','flex');
                }
            }
            if(!type && !side){
                $(this).css('display','flex')
            }
            if(type && side){
                if($(this).data('type') === type && $(this).data('side') === side){
                    $(this).css('display','flex');
                }
            }
            if(addr){
                if($(this).data('address').toLowerCase().indexOf(addr) !== -1){
                    $(this).css('display','flex');
                }else{
                    $(this).hide();
                }
            }
        })
    }
</script>

