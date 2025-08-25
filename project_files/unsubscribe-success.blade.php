@include('add.head')
<body>
@include('add.header')
@include('add.menu')
<section id="promo" class="error_page">
    <div class="container-fluid container-fluid-base container-fluid-promo">
        <div class="row no-gutters">
            <div class="container container-base container-promo">
                <div class="row no-gutters">
                    <div class="title-promo">
                        <h3>Ви успішно відписалися від нашої розсилки</h3>
                        {{--
                        <div class="count-region">
                            <p>@lang('message.sorry')</p>
                        </div>
                        --}}
                    </div>
                    @include('add.filter')
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #promo .container-fluid-promo {
        min-height: 643px;
        background-image: url(/assets/img/promo_bg.jpeg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 75px 0;
        transition: all .4s ease-in;
    }
</style>
@include('add.footer')