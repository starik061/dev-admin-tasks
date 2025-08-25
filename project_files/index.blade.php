@include('add.head')
<style>
    .select2-container .error {
        position: absolute;
        top: -21px;
        color: coral;
        background: #fff;
        padding: 2px 10px;
    }

    #promo .container-fluid-promo {
        min-height: 643px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 75px 0;
        transition: all .4s ease-in;
    }

    .no-webp #promo .container-fluid-promo {
        background-image: url('/assets/img/promo_bg.jpeg');
    }

    .webp #promo .container-fluid-promo {
        background-image: url('/assets/img/webp/promo_bg.webp');
    }
    .like-h3{
        margin-bottom: 10px;
        font-family: 'helveticaThin', sans-serif;
        font-size: 41px;
        font-weight: 100;
        line-height: 45px;
        text-align: center;
    }
    .like-p{
        text-align: center;
        letter-spacing: .3px;
        font-size: 17px;
    }
    .like-p span{
        font-weight: bold;
        color: #f76a47;
    }
    .reason-block h3.title{
        margin-bottom: 7px;
        font-size: 12px;
        font-weight: bold;
        text-transform: capitalize;
        line-height: 1.2;
    }
</style>
<body>
@include('add.header')
@include('add.menu')
<section id="promo">
    <div class="container-fluid container-fluid-base container-fluid-promo">
        <div class="row no-gutters">
            <div class="container container-base container-promo">
                <div class="row no-gutters">
                    <div class="title-promo">
                        <h2 class="like-h3">@lang('message.main_page_slogan')</h2>
                        <div class="count-region">
                            <h3 class="like-p"><span>{{ $total_boards }}</span> @lang('message.main_page_actual')</h3>
                        </div>
                    </div>
                    @include('add.filter')
                </div>
            </div>
        </div>
    </div>
</section>
<section id="why-we">
    <div class="container-fluid container-fluid-base container-fluid-why-we">
        <div class="row no-gutters">
            <div class="container container-base">
                <div class="row no-gutters">
                    <div class="title-why-we">
                        <h2 class="like-h3">@lang('message.why')</h2>
                    </div>
                    <div class="container container-base container-explain-why-we">
                        <div class="row no-gutters">
                            @foreach($evidences as $evd)
                                <div class="col-md-4">
                                    {!! $evd->getTranslatedAttribute('block') !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #our-advantages{
        background: #F2F5FB;
        padding-top: 80px;
    }
    .advantages-content{
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        flex-wrap: wrap;
        margin: 30px 0 80px;
    }
    .adv-item{
        display: flex;
        flex-basis: calc(100% / 3 - 40px);
        flex-direction: row;
        margin-bottom: 30px;
    }
    .adv-item .image-col{
        flex-basis: 60px;
        margin: 0 16px 0 0;
    }
    .adv-item .text-col {
        flex-basis: calc(100% - 76px);
    }
    .adv-item .text-col .counter{
        font-family: "Helvetica Neue";
        font-weight: 500;
        font-size: 30px;
        line-height: 37px;
    }
    .adv-item .text-col .name{
        font-family: "Helvetica Neue";
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;
        text-transform: lowercase;
        color: #8B8F9D;
    }
    @media (min-width: 100px) and (max-width: 1000px) {
        #our-advantages .container-explain-our-advantages div[class='adv-item'] {
            padding: 21px 10px 14px 10px;
            text-align: center;
        }
        #our-advantages .slick-boards-theme .slick-dots {
            bottom: -57px;
        }
        #our-advantages .title-why-we{
            text-align: center;
            width: 100%;
        }
    }
</style>

<section id="our-advantages">
    <div class="container-fluid container-fluid-base container-fluid-why-we">
        <div class="row no-gutters">
            <div class="container container-base">
                <div class="row no-gutters">
                    <div class="title-why-we">
                        <h2 class="like-h3">@lang('message.our_advantages')</h2>
                    </div>
                    <div class="container container-base container-explain-our-advantages">
                        <div class="row no-gutters advantages-content">
                            @foreach($ourAdvantages as $item)
                                <div class="adv-item">
                                    <div class="image-col">
                                        <img src="/storage/{{json_decode($item->image)[0]->download_link}}">
                                    </div>
                                    <div class="text-col">
                                        <div class="counter">{{$item->getTranslatedAttribute('value')}}</div>
                                        <div class="name">{{$item->getTranslatedAttribute('name')}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- USERS ABOUT US (START) -->
@if ($data['main']->active_publications || $data['main']->active_reviews)
    <section id="write-about-us">
        <div class="container-fluid container-fluid-base container-fluid-about-us">
            <div class="row no-gutters">
                <div class="container container-base">
                    <div class="row no-gutters">
                        @if($data['main']->active_publications)
                            <div class="title-write-about-us-media">
                                <h3>Что пишут о Billboards?</h3>
                                <div class="slick-boards-theme what-write-media">
                                    @foreach ($about_us as $key => $value)
                                        <a href="#" class="about-us-for-media-item"><img
                                                    src="{{ asset($value['image']) }}" alt="value"/></a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if($data['main']->active_reviews)
                            <div class="title-write-about-us-user">
                                <h2>@lang('message.main_reviews')</h2>
                                <div class="about-us-for-user-block">
                                    <div class="slick-boards-theme what-write-user">
                                        @foreach($comments as $value)
                                            <div class="about-us-for-user-item lady">
                                                <div class="user-review-block">
                                                    <img class="img-user" src="{{ asset($value->avatar) }}"
                                                         alt="avatar"/>
                                                    <p class="title">{{ $value->getTranslatedAttribute('name') }}</p>
                                                    <p class="text">{{ $value->getTranslatedAttribute('text') }}</p>
                                                    <a href="{{$data['lang_url']}}/reviews#{{ $value->id }}">@lang('message.detail')</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- USERS ABOUT US (END) -->
@if (Auth::user())
    @if(Auth::user()->role_id > 2)
        {!! $data['main']->getTranslatedAttribute('account') !!}
    @endif
@else
    {!! $data['main']->getTranslatedAttribute('start_now') !!}
@endif
<!-- TYPE BOARD (START) -->
@if (Auth::user() )
    @if(Auth::user()->role_id > 2)
        <section id="type-board">
            <div class="container-fluid container-fluid-base container-fluid-type-board">
                <div class="row no-gutters">
                    <div class="container container-base">
                        <div class="row no-gutters">
                            <div class="w-100"><h2 class="text-left">@lang('message.type_plane')</h2></div>
                        </div>

                        @include('add.type_city_'.App::getLocale())

                        <div class="w-100 show-town-for-this-type">
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
                        <div class="w-100"><h2 class="text-left">@lang('message.type_plane')</h2></div>
                    </div>
                    @include('add.type_city_'.App::getLocale())
                    <div class="w-100 show-town-for-this-type">
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
<!-- {!! $data['main']->subscribe !!} -->

<section id="subscribe">
    <div class="container-fluid container-fluid-base container-fluid-subscribe">
        <div v class="row no-gutters">
            <div class="container container-base container-subscribe">
                <div class="row no-gutters">
                    <div class="title-subscribe">
                        <h2>@lang('message.main_subsrcibe_title')</h2>
                    </div>
                    <div class="do-more-567">@lang('message.main_subscribe_slogan')</div>
                    <div class="d-flex subscribe-field-btn">
                        <div class="d-flex subscribe-field">
                            <div><input id="subscribe-email" type="email" class="input-base-field" placeholder="Email"/>
                            </div>


                            <div class="wrapp-input">
                                <select id="subscribe-town" class="input-base-field"
                                        placeholder='@lang('message.city')'>
                                    <option></option>
                                    @foreach ($cities as $key => $city)
                                        <option title="{{ $city->alias }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="subscribe-btn">
                            <button class="btn btn-style btn-subscribe be-in-touch">@lang('message.subscribe')</button>
                        </div>
                    </div>
                    <div class="do-more">@lang('message.main_subscribe_slogan')</div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="write-about-us">
    <div class="container-fluid container-fluid-base" id="custom_output_portfolio">
        <div class="row no-gutters">
            <div class="container container-base">
                <div class="row no-gutters">
                    <div class="title-write-about-us-user">
                        <h2>@lang('message.portfolio')</h2>
                    </div>
                    <div class="image-container-custom" id="image-container-custom">
                        <!-- Images will be inserted here by JavaScript -->
                    </div>
                    <div class="custom-portfolio-buttons-block">
                        <button class="show-less-btn" id="show-less-button">@lang('message.show-less')</button>
                        <button class="load-more-btn" id="load-more-button">@lang('message.show-more')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@if (!empty($seo_text))
    <section id="description">
        <div class="container-fluid container-fluid-base container-fluid-description">
            <div class="row no-gutters">
                <div class="container container-base">
                    <div class="row no-gutters">
                        <h2 class="title-search-result">@php echo $header_type ?? "Наружная реклама"; @endphp
                            в @php echo $header_city ?? "Украине"; @endphp</h2>
                        <div class="col-xs-12">

                            {!! $seo_text->text !!}
                        </div>
                        <span class="show-more">Развернуть текст</span></div>
                </div>
            </div>
        </div>
    </section>
@else
    {!! $data['main']->getTranslatedAttribute('description') !!}
@endif


@include('add.footer')
