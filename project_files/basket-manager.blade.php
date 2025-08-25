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
                                            {{--
                                            <div class="td td-original-price">@lang('message.in_price')</div>
											<div class="td td-price">@lang('message.price_')</div>
											--}}
                                            @can('view-approximated-prices')
                                                <div class="td td-supplier-price">
                                                    <a>@lang('message.purchase_price')</a>
                                                </div>
                                            @endcan
                                            <div class="td td-original-price">@lang('message.in_price')</div>
                                            @if(in_array($currentUser->id, [1,202, 207, 273, 309]))
                                                <div class="td td-price">
                                                    <a>@lang('message.selling_price')</a>
                                                </div>
                                            @else
                                                <div class="td td-price">@lang('message.price_')</div>
                                            @endif

											<div class="td td-choice">@lang('message.employment_')</div>
                                            <div class="td td-changed">@lang('message.change')</div>
											<div class="td"></div>
										</div>
									</div>
									<div class="tbody">
										@foreach($orders as $board)
										<div class="tr">
                                            <div class="td td-checkbox">
                                                <input type="checkbox" name="id[]" data-value="{{ $board->id }}" @if(in_array($board->id,$checked)){{"checked"}}@endif/>
                                            </div>
                                            <div class="td td-code" data-code="351" data-select-month="">
                                                <span class="mb-title">@lang('message.code')</span>
                                                <a href="{{$data['lang_url']}}/{{ $board->aleas }}">{{$board->id}}</a>
                                            </div>
                                            <div class="td td-city">
                                              <span class="mb-title">@lang('message.city')</span>
                                              <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">{{ $board->city_name }}</a>
                                            </div>
                                            @can('view-suppliers-in-search')
                                            <div class="td td-firm">
                                              <span class="mb-title">@lang('message.firm')</span>
                                              <a style="cursor:pointer" class="conteact_open" data-id="{{$board->firm}}">{{ $board->firm_name }} - {{ $board->code }}</a>
                                            </div>
                                            @endif
                                            <div class="td td-type">
                                                <span class="mb-title">@lang('message.type_')</span>
                                                @if (Auth::user() && Auth::user()->role_id < 3)
                                                  <a href="{{ $data['lang_url']}}/{{ $board['aleas'] }}" aria-describedby="tooltip" 
                                                    class="hoverImg" title="" 
                                                    data-width="450px" 
                                                    data-height="200px" 
                                                    data-image="@if ($board->image != null){{ "/upload/" . $board->image . $webp }}@endif">
                                                @else
                                                  <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">
                                                @endif
                                               
                                                  {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }} 
                                                  @if ($board->format != null)  
                                                  @php echo ", "; @endphp
                                                  @endif {{ $board->format }}
                                                </a>
                                            </div>
                                            <div class="td td-adress">
                                                <span class="mb-title">@lang('message.address_')</span>
                                                <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">
                                                
                                                  @if ($board->city_name)
                                                    @if (Auth::guest() || Auth::user() && Auth::user()->role_id > 2)
                                                      {{ $board->city_name }}
                                                    @endif
                                                  @endif
                                                  @if ($board->format)
                                                    @if ($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2 && Auth::user()->role_id < 7))
                                                      {{", "}}
                                                    @endif
                                                    {{ $board->format }}
                                                  @endif
                                                  @if ($board->addr)
                                                    @if($board->city_name && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2 && Auth::user()->role_id < 7) || $board->format && (Auth::guest() || Auth::user() && Auth::user()->role_id > 2  && Auth::user()->role_id < 7))
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
                                                <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">{{ $board->side_type }}</a>
                                            </div>
                                            <div class="td td-light text-center">
                                                <span class="mb-title">@lang('message.light_')</span>
                                                @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
                                                  <div class="image-wrapper">
                                                    <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"><img class="img" loading="lazy" src="/img/icon_light_on.svg" alt="light on"></a>
                                                    <p class="light-info">
                                                      @lang('message.light') - <span>@lang('message.exist')</span>
                                                    </p>
                                                  </div>
                                                @else
                                                  <div class="image-wrapper">
                                                  <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}"><img class="img" loading="lazy" src="/img/icon_light_off.svg" alt="light off"></a>
                                                    <p class="light-info">
                                                      @lang('message.light') - <span>@lang('message.no_light')</span>
                                                    </p>
                                                  </div>
                                                @endif
                                            </div>
                                            <div class="td td-photo text-center" @if ($board->image == null && $board->scheme == null) style="cursor: default" @endif>
                                                <span class="mb-title">@lang('message.photo')</span>
                                                @if ($board->image != null || $board->scheme != null)
                                                  @if(App::isLocale('ua'))
                                                  <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="ua/{{ $board->aleas }}" data-id="{{ $board->id }}" data-img="
                                                  @else
                                                  <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-alias="{{ $board->aleas }}" data-id="{{ $board->id }}" data-img="
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

                                            @can('view-approximated-prices')
                                                @php
                                                    $priceTitle = '';
                                                    if($board->approximated_by_region){
                                                        $priceTitle = 'Середня ціна по регіону для даного типу, сторони та підсвічування';
                                                    }elseif($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date){
                                                        $priceTitle = 'Собівартість';
                                                    }elseif($board->approximated_supplier_price){
                                                        $priceTitle = 'Розрахункова собівартість для власника';
                                                    }
                                                @endphp
                                                <div class="td td-supplier-price al-power-tip @if($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date) by_cost @else @if($board->approximated_supplier_price > 0) by_median @endif @endif  @if($board->approximated_by_region) by_region @endif"
                                                     @if($priceTitle) title="{{$priceTitle}}" @endif
                                                >
                                                    {{ $board->approximated_supplier_price }} ₴
                                                </div>
                                            @endcan
                                            
                                            @if (Auth::user() && (Auth::user()->role_id < 3 || Auth::user()->role_id == 7))
                                            <div class="td td-original-price">
                                                  <span class="mb-title">@lang('message.in_price')</span>
                                                  <a href="{{ asset($board['aleas']) }}">{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</a>
                                            </div>
                                            @endif
                                            @if(in_array($currentUser->id, [1,202, 207, 273, 309]))
                                                <div class="td td-price text-right">
                                                    {{ $board->approximated_selling_price }} ₴
                                                </div>
                                            @else
                                            <div class="td td-price text-right">
                                                <span class="mb-title">цена</span>
                                                @if (Auth::user() &&  (Auth::user()->role_id < 3 || Auth::user()->role_id == 7))
                                                  <a href="#" class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
                                                @elseif (setting('front.hidden_price') || !$board->price)
                                                  <a href="#" class="cost-board">{{ setting('front.hidden_price_word') }}</a>
                                                @else
                                                  <a href="#" class="cost-board">{{ $board->price }} {!!$_COOKIE['currency_symbol']!!}</a>
                                                @endif
                                            </div>
                                            @endif
                                            <div class="td td-busy mobile-hide" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}" data-alias="{{$board['aleas']}}">
                                                <span class="mb-title">@lang('message.employment_')</span>
                                            </div>
                                            <div class="list-review">
                                                <div class="busy-calendar mobile-show">
                                                    <p class="title">@lang('message.calendar_employment')</p>
                                                      <div class="calendar" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="td td-changed mobile-hide">
                                            @php
                                                $date = explode('-',explode(' ',$board->updated_at)[0]);
                                                $str_date = $date[2].".".$date[1].".".$date[0] ." ". explode(' ',$board->updated_at)[1];
                                            @endphp
                                              <span class="mb-title">@lang('message.change')</span>
                                              <a href="{{$data['lang_url']}}/{{ $board['aleas'] }}">{{ $str_date }}</a>
                                            </div>
											<div class="td td-buy">
												<a class="del"><span
														class="mb-title">@lang('message.remove_from_basket')</span>
													<div class="del-ico" data-basket_id="{{ $basket->id }}"
														data-board_id="{{ $board->id }}"></div>
												</a>
											</div>
										</div>
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
                        {{--
						<div class="extra-block">
							<p class="subtitle">@lang('message.additional_services')</p>
							<div class="line">
								<input class="checkbox" id="new-maket" type="checkbox" name="new-maket" />
								<label for="new-maket">@lang('message.need_design') (@lang('message.price_from') 750
									грн.)</label>
							</div>
							<div class="line">
								<input class="checkbox" id="print-poster" type="checkbox" name="print-poster" />
								<label for="print-poster">@lang('message.need_posters') (постер 3х6м - 549 грн.)</label>
							</div>
						</div>
						<div class="comment-block">
							<p class="subtitle">@lang('message.comment')</p>
							<textarea name="" placeholder="@lang('message.comment_to_order')"></textarea>
						</div>
						<div class="confirm-block">
							<div class="check-robot">
								<label class="label-box chBox">
									<input type="checkbox" />
									<div class="box"></div><span>@lang('message.drag_captcha')</span>
								</label>
							</div>
							<div class="agreement">
								<div class="line">
									<input class="checkbox" id="agreement" type="checkbox" name="agreement" checked />
									<label for="agreement">@lang('message.agree') <a
											href="{{$data['lang_url']}}/agreement">@lang("message.user_agreement")</a></label>
								</div>
							</div>
						</div>
                        --}}
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
                            {{--
							<div class="submit" data-basket_id="{{ $basket->id }}"><span
									class="btn">@lang('message.get_order')</span></div>
                            --}}
						</div>
					</div>
					@if (count($orders) && Auth::user() && (Auth::user()->role_id < 3 || Auth::user()->role_id == 7))
					<div class="basket_manager-controls">
						<div class="export-excel">
							<img src="https://img.icons8.com/fluent/24/000000/microsoft-excel-2019.png" alt="excel" />
							<a class="export_excel_link" href="{{$data['lang_url']}}/get_excel">@lang('message.export_xls')</a>
                            
                            <div class="excel_setting">
                              <div class="export-header">
                                <span>Настройки экспорта</span>
                                <svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg>
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
                                @endif
                                <div class="checkbox-block">
                                  <input type="checkbox" name="cols[]" value="start_price" id="start_price" checked />
                                  <label for="start_price">Цена</label>
                                </div>
                                @can('view-suppliers-in-search')
                                    <div class="checkbox-block">
                                      <input type="checkbox" name="cols[]" value="firm_contacts" id="firm_contacts" checked />
                                      <label for="firm_contacts">Контакты собственников</label>
                                    </div>
                                @endif
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
                                      <input type="checkbox" name="cols[]" value="poster_print" id="poster_print" checked />
                                      <label for="poster_print">Цена печати</label>
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
                              <a href="{{$data['lang_url']}}/get_excel" class="btn btn-style dwn-button">Скачать</a>
                            </div>
						</div>
                        
                        <div class="export-ppt">
                            <a href="/get_ppt">
							<img src="/assets/img/ppt.png"/>
							<span>Еспорт в ppt</span>
                            </a>
						</div>
                        
						<div class="add-to-collection">
							<img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png"
								alt="add" />
							<span>@lang('message.add_podborku')</span>
						</div>

{{--                        <div class="selected-btn" id="watchAll" data-registered="{{ Auth::user() ? 'true' : 'false' }}">--}}
{{--                            <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png"--}}
{{--                                 alt="add" />--}}
{{--                            <span>Наблюдать</span>--}}
{{--                        </div>--}}

						<div class="export-excel selected-btn  mobile-hide">
							<img src="https://img.icons8.com/fluent/24/000000/microsoft-excel-2019.png" alt="excel" />
							<a href="#">Выделенное в xls</a>
						</div>
                         <div class="export-ppt selected-btn  mobile-hide">
							<img src="/assets/img/ppt.png"/>
							<a href="#">Выделенное в ppt</a>
						</div>

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

});
</script>