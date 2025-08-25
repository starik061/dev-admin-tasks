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
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')
<section class="checkout">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters navigation-wrapper">
      <div class="container container-base">
        <h1 class="title">@lang('message.confirm_order')</h1>
        <div class="checkout-block">
          <div class="form-block">
            <form id="confirmForm">
              <div class="formTitle">
                <h4 class="title">@lang('message.client_data')</h4>
              </div>
              <div class="lines">
                @if(!Auth::user())
                  <div class="line">
                    <label class="label" for="#askName">@lang('message.client_info'):</label>
                    <input id="confirmF-Name" type="text"
                           placeholder="@lang('message.name')/@lang('message.company')"
                           name="first_name" maxlength="30" required/>
                  </div>
                  <div class="mb12"></div>
                  <div class="line">
                    <label class="label" for="#askEmail">Email:</label>
                    <input id="confirmEmail" type="text" name="email" placeholder="Email"/>
                  </div>
                @else
                  <div class="line">
                    <label class="label" for="#askName">@lang('message.client_info'):</label>
                    <input id="confirmF-Name" type="text" placeholder="@lang('message.name')"
                           name="first_name" maxlength="30" required/>
                  </div>
                  <div class="line">
                    <input id="confirmL-Name" type="text" placeholder="@lang('message.last_name')"
                           name="last_name" maxlength="30" required/>
                  </div>
                  <div class="line">
                    <input id="confirmM-Name" type="text" placeholder="@lang('message.middle_name')"
                           name="middle_name" maxlength="30" required/>
                  </div>
                  <div class="mb12"></div>
                  <div class="line">
                    <label class="label" for="#askEmail">Email:</label>
                    <input id="confirmEmail" type="text" name="email" placeholder="Email" required/>
                  </div>
                @endif
                <div class="line">
                  <label class="label" for="#askPhone">@lang('message.contact_phone'):</label>
                  <input class="validPhone" id="confirmPhone" type="text" placeholder="+380"
                         name="phone" maxlength="18" required/>
                </div>
              </div>
              <div class="confirm-block">
                @if(Auth::user())

                  <div class="totalCount">
                    @if (Auth::user() &&  Auth::user()->role_id < 3)
                      <p class="key">@lang('message.itogo'): </p><span
                              class="val">{{$total_price}} {!!$_COOKIE['currency_symbol']!!}</span>
                    @elseif (setting('front.hidden_price') && count($orders))
                      <p class="key">@lang('message.itogo'): </p><span
                              class="val">{{ __('message.hidden_price_word') }}</span>
                    @else
                      <p class="key">@lang('message.itogo'): </p><span
                              class="val">{{$total_price}} {!!$_COOKIE['currency_symbol']!!}</span>
                    @endif
                  </div>
                @endif
                <div class="submit">
                  <!--<input class="btn" id="checkout-final" type="submit" value="@lang('message.checkout')"/>-->
                  <button class="btn" id="checkout-final" data-authorized="{{Auth::user()}}">@lang('message.checkout')</button>
                </div>
              </div>
            </form>
          </div>
          <div class="bord-choice">
            <div class="accTitle accordion active">
              <h4>@lang('message.planes_count'): <span class="boardCount">{{ count($orders) }}</span></h4>
            </div>
            <div class="panel">
              @if (count($orders))
                @foreach($orders as $board)
                  <a href="{{ $board->aleas }}" class="board" data-board_id="{{ $board->board_id }}"
                     target="_blank">
                    <div class="board-img" style="background:
                        @if ($board->image != null || $board->scheme != null)
                          @if ($board->image != null)
                            url({{ "/upload/" . $board->image . $webp }})
                          @elseif ($board->scheme != null)
                            url({{ "/upload/" . $board->scheme . $webp }})
                          @endif
                        @else
                            url({{ "/assets/img/icon_basket_modal.svg" }})
                        @endif
                       no-repeat center center /contain"></div>
                    <div class="description">
                      <div class="code block"><span class="key">@lang('message.Code')</span>
                        <p class="val">{{ $board->board_id }}</p>
                      </div>
                      <div class="where block"><span class="key">@lang('message.address')</span>
                        <p class="val">{{ $board->city }}, {{ $board->addr }}</p>
                      </div>
                      <div class="how_long block"><span class="key">@lang('message.months')</span>
                        <p class="val">{{ $board->ym['boards'] }}</p>
                      </div>
                      @if(Auth::user())
                        <div class="cost block"><span class="key">@lang('message.price')</span>
                          @if (setting('front.hidden_price') || !$board->price)
                            <p class="val">{{ __('message.hidden_price_word') }}</p>
                          @else
                            <p class="val">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}
                              / @lang('message.month')</p>
                          @endif
                        </div>
                      @endif
                    </div>
                  </a>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')