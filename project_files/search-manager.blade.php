<section id="result-search-list">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search" style="padding-top:0">
                <div class="view-board">
                    <div class="total-find-board">
                        <p>
                            @lang('message.found'): <span>{{ $boards->total() }}</span>
                            <button id="addAll">Добавить все</button>
{{--                            <button id="watchAll" data-registered="{{ Auth::user() ? 'true' : 'false' }}">Наблюдать</button>--}}
                        </p>
                        <div class="legend">
                            <ul>
                                <li>
                                    <i class="fa fa-circle hidden_price" aria-hidden="true"></i> — цена скрыта
                                </li>
                                <li>
                                    <i class="fa fa-circle select" aria-hidden="true"></i> — @lang('message.free_')
                                </li>
                                <li>
                                    <i class="fa fa-circle reserve" aria-hidden="true"></i> — @lang('message.reserve')
                                </li>
                                <li>
                                    <i class="fa fa-circle pre-order" aria-hidden="true"></i>— @lang('message.predzakaz')
                                </li>
                                <li>
                                    <i class="fa fa-circle busy" aria-hidden="true"></i> — @lang('message.busy')
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="legend-view">
                        <div class="view-rs-list">
                            <div class="list">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="511.63px" height="511.631px" viewBox="0 0 511.63 511.631"
                                     style="enable-background:new 0 0 511.63 511.631;"
                                     xml:space="preserve"
                                >
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
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 174.239 174.239" style="enable-background:new 0 0 174.239 174.239;"
                                     xml:space="preserve"
                                >
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
                                <div class="td td-checkbox"><input type="checkbox"></div>
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
                                    <a href="{{ "{$url_full}{$connector}order=side" }}{{ $order_field == "side" && $order_type == 'asc' ? "&dir=desc" : null}}">сторона</a>
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

                                    <div class="td td-additionally">Коорд.</div>

                                    <div class="td td-additionally">
                                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.additional')</a>
                                    </div>
                                    <div class="td td-changed">
                                        <a href="{{ "{$url_full}{$connector}order=id" }}{{ $order_field == "id" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.change')</a>
                                    </div>
                                @endif
                                <div class="td td-photo">
                                    <a href="{{ "{$url_full}{$connector}order=image" }}{{ $order_field == "image" && $order_type == 'asc' ? "&dir=desc" : null}}">@lang('message.photo')</a>
                                </div>
                                <div class="td td-busy">занятость</div>
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
                                <div class="td"></div>
                            </div>
                        </div>
                        <div class="tbody">
                            @if($boards->count() > 0)
                                @foreach($boards->items() as $board)
                                    <div
                                        class="tr"
                                        @if($board->active != App\Helpers\BoardConstants::ACTIVE || $board->zmia_inactive == '1')
                                            style="background: #f9f9f9;"
                                        @else
                                            @if($board->coords_by_site == "1" && Auth::user() && Auth::user()->role_id == 1)
                                                style="background: #ffffdd;"
                                            @endif
                                        @endif
                                    >
                                        <div class="td td-checkbox">
                                            <input type="checkbox" data-id="{{$board->id}}">
                                        </div>
                                      
                                        <div class="td td-code" data-code="351" data-select-month="">
                                            <span class="mb-title">@lang('message.code')</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}">
                                                {{ $board->id }}
                                                @if ($board->duplicate_new)
                                                    ({{$board->duplicate_new}})
                                                @endif
                                            </a>
                                        </div>
                                      
                                        <div class="td td-city">
                                            <span class="mb-title">@lang('message.city')</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->city_name }}</a>
                                        </div>
                                        @can('view-suppliers-in-search')
                                            <div class="td td-firm">
                                                <span class="mb-title">@lang('message.firm')</span>
                                                <a
                                                        class="conteact_open"
                                                        style="cursor:pointer"
                                                        data-id="{{ $board->firm }}">
                                                    {{ $board->firm_name }} - {{ $board->code }}
                                                </a>
                                            </div>
                                        @endcan


                                        <div class="td td-type">
                                            <span class="mb-title">@lang('message.type_')</span>
                                            <a
                                                href="{{ $langUrl}}/{{ $board->aleas }}"
                                                aria-describedby="tooltip"
                                                class="{{ $board->image != null ? 'hoverImg' : '' }}"
                                                data-width="450px"
                                                data-height="200px"
                                                data-image="{{ $board->image != null ? '/upload/' . $board->image . $webp : '' }}"
                                                target="_blank"
                                            >
                                                {{ $board->title . ($board->format !== null ? ', ' : '') }}
                                                {{ $board->format }}
                                            </a>
                                        </div>
                                      
                                        <div class="td td-adress">
                                            <span class="mb-title">@lang('message.address_')</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">
                                                @if ($board->city_name && Auth::user()->role_id > 2)
                                                    {{ $board->city_name }}
                                                @endif
                                                @if ($board->addr)
                                                    @if($board->city_name && ($board->format && Auth::user()->role_id > 2))
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
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">
                                                {{ $board->side_type }}
                                            </a>
                                        </div>
                                      
                                        <div class="td td-light text-center">
                                            <span class="mb-title">@lang('message.light_')</span>
                                            @if ($board->light == App\Helpers\BoardConstants::LIGHT_ON)
                                                <div class="image-wrapper">
                                                    <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">
                                                        <img
                                                            class="img"
                                                            loading="lazy"
                                                            src="/img/icon_light_on.svg"
                                                            alt="light on"
                                                        />
                                                    </a>
                                                    <p class="light-info">
                                                        @lang('message.light') - <span>@lang('message.exist')</span>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="image-wrapper">
                                                    <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">
                                                        <img
                                                            class="img" 
                                                            loading="lazy" 
                                                            src="/img/icon_light_off.svg"
                                                            alt="light off"
                                                        />
                                                    </a>
                                                    <p class="light-info">
                                                        @lang('message.light') - <span>@lang('message.no_light')</span>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                      
                                        <div class="td td-gid">
                                            <span class="mb-title">@lang('message.gid')</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->guide }}{!! $board->district ? ($board->guide ? '<br>' : '').__('message.district').': '.$board->district->name : '' !!}</a>
                                        </div>
                                      
                                        <div class="td td-doors">
                                            <span class="mb-title">Doors</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->doors }}</a>
                                        </div>
                                      
                                        <div class="td td-ots">
                                            <span class="mb-title">OTS</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->ots }}</a>
                                        </div>
                                      
                                        <div class="td td-grp">
                                            <span class="mb-title">GRP</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->grp }}</a>
                                        </div>
                                      

                                            <div class="td td-additionally">
                                                <span class="mb-title">Координаты</span>
                                                @if($board->x)
                                                    <img src="/assets/img/coordinates.svg"/> Есть
                                                @endif
                                            </div>
                                        
                                      
                                        <div class="td td-additionally">
                                            <span class="mb-title">@lang('message.additional')</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->addition }}</a>
                                        </div>
                                      
                                        <div class="td td-changed">
                                            <span class="mb-title">@lang('message.change')</span>
                                            <a href="{{$langUrl}}/{{ $board->aleas }}" target="_blank">{{ $board->updated_at->format('d.m.Y H:i:s') }}</a>
                                        </div>
                                            
                                        <div 
                                            class="td td-photo text-center"
                                            style="{{ $board->image == null && $board->scheme == null ? 'cursor: default' : '' }}"
                                        >
                                            <span class="mb-title">@lang('message.photo')</span>
                                            @if ($board->image != null || $board->scheme != null)
                                                <img
                                                    alt="board image" 
                                                    class="img" 
                                                    src="/img/icon_photo_on.svg"
                                                    data-alias="ua/{{ $board->aleas }}"
                                                    data-id="{{ $board->id }}"
                                                    data-img="
                                                        {{ $board->image != null ? "/upload/" . $board->image . $webp : ''}}
                                                        {{ $board->scheme != null ? "|/upload/" . $board->scheme  . $webp : ''}}
                                                    "
                                                />
                                            @else
                                                <img alt="none image" class="img" src="/img/icon_photo_off.svg" />
                                            @endif
                                        </div>
                                      
                                        <div class="td td-busy" data-basket="{{ $board->basket }}" data-busy="{{ $board->reserve }}">
                                            <span class="mb-title">@lang('message.employment_')</span>
                                        </div>

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
                                            <div class="td td-supplier-price al-power-tip @if($board->approximated_by_fixed_price) by_fixed @else @if($board->approximated_supplier_price > 0 && $board->approximated_supplier_price_by_cost_date) by_cost @else @if($board->approximated_supplier_price > 0) by_median @endif @endif @endif @if($board->approximated_by_region || ($board->firm == 302 && !$board->approximated_supplier_price_by_cost_date)) by_region @endif"
                                                 @if($priceTitle) title="{{$priceTitle}}" @endif
                                            >
                                                {{ $board->approximated_supplier_price }} ₴
                                            </div>
                                        @endcan
                                      
                                        <div class="td td-original-price">
                                            <span class="mb-title">@lang('message.in_price')</span>
                                            @if($board->active != App\Helpers\BoardConstants::ACTIVE)
                                                <a href="{{ asset($board->aleas) }}" target="_blank">@lang('message.no_data')</a>
                                            @else
                                                <a href="{{ asset($board->aleas) }}" target="_blank">
                                                    {{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}
                                                </a>
                                            @endif
                                        </div>

                                        @can('view-approximated-prices2')
                                            <div class="td td-supplier-price">
                                                {{ $board->approximated_selling_price }} ₴
                                            </div>
                                        @endcan

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
                                      
                                        <div class="td td-buy text-right">
                                            <button 
                                                data-id="{{ $board->id }}"
                                                class="btn btn-style btn-buy {{ $board->basket ? 'btn-in-basket' : ''}}"
                                            >
                                                {{ $board->basket ? __('message.in_basket') : __('message.buy') }}
                                            </button>
                                        </div>
                                      
                                        @if (Auth::user() && in_array(Auth::user()->role_id, [1,2,5]))
                                            <div class="td text-right">
                                                <a href="/edit/{{$board->id}}" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path fill="#f76a47" d="M7.127 22.562l-7.127 1.438 1.438-7.128 5.689 5.69zm1.414-1.414l11.228-11.225-5.69-5.692-11.227 11.227 5.689 5.69zm9.768-21.148l-2.816 2.817 5.691 5.691 2.816-2.819-5.691-5.689z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="list-review">
                        @if($boards->count() > 0)
                            @foreach($boards->items() as $board)
                                <div
                                    class="item {{ $board->active != App\Helpers\BoardConstants::ACTIVE ? 'inactive-item' : '' }}"
                                    style="{{ $board->active != App\Helpers\BoardConstants::ACTIVE ? 'background: #f9f9f9' : '' }}"
                                >
                                    <div
                                        class="see-board"
                                        style=" {{ $board->active != App\Helpers\BoardConstants::ACTIVE ? 'background: #f9f9f9' : '' }}"
                                    >
                                        <div
                                            class="slick-boards-theme img {{ $board->image == null && $board->scheme == null ? 'not-slick' : ''}}"
                                            data-alias="{{ $board->aleas }}" data-id="{{ $board->id }}"
                                            data-img="
                                                {{ $board->image != null ? "/upload/" . $board->image . $webp : ''}}
                                                {{ $board->scheme != null ? "|/upload/" . $board->scheme  . $webp : ''}}
                                            "
                                        >
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
                                                        <style>.cls-1 {fill: #55bc4f;fill-rule: evenodd;}</style>
                                                    </defs>
                                                    <path class="cls-1"
                                                          d="M411.176,1216.33h1.832v-2.32l2.75-2.2v3.6h1.833v-5.51a0.933,0.933,0,0,0-.52-0.83,0.921,0.921,0,0,0-.969.11l-4.01,3.22-4.01-3.22a0.985,0.985,0,0,0-.575-0.19,0.975,0.975,0,0,0-.57.19l-4.582,3.68a0.9,0.9,0,0,0-.344.71v12.85a0.916,0.916,0,0,0,.916.92,0.931,0.931,0,0,0,.573-0.2l4.582-3.67a0.93,0.93,0,0,0,.344-0.72v-10.94l2.75,2.2v2.32Zm-7.332-2.32,2.749-2.2v10.5l-2.749,2.2v-10.5Zm17.144,12.68-2.328-2.33a4.573,4.573,0,1,0-1.3,1.3l2.328,2.33Zm-6.147-2.1a2.755,2.755,0,1,1,2.75-2.76A2.759,2.759,0,0,1,414.841,1224.59Z"
                                                          transform="translate(-402 -1208.97)"/>
                                                </svg>
                                                <span>@lang('message.show_on_map')</span>
                                            </div>
                                        @endif
                                    </div>
                                    <a
                                        href="{{$langUrl}}/{{ $board->aleas }}"
                                        class="info-board {{ $board->active != App\Helpers\BoardConstants::ACTIVE ? 'inactive-item' : ''}}"
                                        target="_blank"
                                        style="{{ $board->active!= App\Helpers\BoardConstants::ACTIVE ? 'background: #f9f9f9;' : '' }}"
                                    >
                                        <p class="location">
                                            @if ($board->city_name)
                                                {{ $board->city_name }}
                                            @endif
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
                                                    <td class="board_code">{{ $board->id }}</td>
                                                </tr>
                                                @can('view-suppliers-in-search')
                                                    <tr>
                                                        <td class="title-tr">@lang('message.firm_code')</td>
                                                        <td class="board_code">{{ $board->firm_name }}  - {{ $board->code }}</td>
                                                    </tr>
                                                @endcan
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
                                                    <td class="title-tr">Сторона</td>
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
                                                        <td>{{ $board->guide }}</td>
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
                                    <div
                                        class="price-busy-board"
                                        style="{{ $board->active!= App\Helpers\BoardConstants::ACTIVE ? 'background: #f9f9f9;' : '' }}"
                                    >
                                        @if (Auth::user() &&  Auth::user()->isManagerSearchable())
                                            <div class='list-preview_inprice'>@lang('message.in_price'):
                                                <span>{{ $board->start_price }} {!!$_COOKIE['currency_symbol']!!}</span>
                                            </div>
                                        @endif

                                        @if($board->active != App\Helpers\BoardConstants::ACTIVE)
                                            <div class="busy-calendar">
                                                <p class="title">@lang('message.calendar_employment')</p>
                                                <div class="calendar" data-basket="{{ $board->basket }}"
                                                     data-busy="{{ $board->reserve }}">
                                                </div>
                                            </div>
                                        @else
                                            <div class="busy-calendar">
                                                <p class="title">@lang('message.calendar_employment')</p>
                                                <div class="calendar" data-basket="{{ $board->basket }}"
                                                     data-busy="{{ $board->reserve }}">
                                                </div>
                                            </div>
                                        @endif

                                        @if ($board->x && $board->y)
                                            <div class="show-on-map">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19.03"
                                                     viewBox="0 0 19 19.03">
                                                    <defs>
                                                        <style>
                                                            .cls-1 {
                                                                fill: #55bc4f;
                                                                fill-rule: evenodd;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <path class="cls-1"
                                                          d="M411.176,1216.33h1.832v-2.32l2.75-2.2v3.6h1.833v-5.51a0.933,0.933,0,0,0-.52-0.83,0.921,0.921,0,0,0-.969.11l-4.01,3.22-4.01-3.22a0.985,0.985,0,0,0-.575-0.19,0.975,0.975,0,0,0-.57.19l-4.582,3.68a0.9,0.9,0,0,0-.344.71v12.85a0.916,0.916,0,0,0,.916.92,0.931,0.931,0,0,0,.573-0.2l4.582-3.67a0.93,0.93,0,0,0,.344-0.72v-10.94l2.75,2.2v2.32Zm-7.332-2.32,2.749-2.2v10.5l-2.749,2.2v-10.5Zm17.144,12.68-2.328-2.33a4.573,4.573,0,1,0-1.3,1.3l2.328,2.33Zm-6.147-2.1a2.755,2.755,0,1,1,2.75-2.76A2.759,2.759,0,0,1,414.841,1224.59Z"
                                                          transform="translate(-402 -1208.97)"/>
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
                                                <button
                                                    data-id="{{ $board->id }}"
                                                    class="btn btn-style btn-buy al-buy-now {{ $board->basket ? 'btn-in-basket' : ''}}"
                                                >
                                                    {{ $board->basket ? __('message.in_basket') : __('message.buy_now')}}
                                                </button>
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

                @if ($boards->lastPage() > 1)
                    <div
                        class="result-paginator new-result-paginator"
                        data-manager="{{ $admin }}"
                        data-current-page="{{ $boards->currentPage() }}"
                        data-total-page="{{ $boards->lastPage() }}"
                    >
                        <button class="btn btn-style btn-show-more">
                            @lang('message.show_more')
                            <span class="board count">50</span>
                            @lang('message.show_more_planes')
                        </button>
                        <div class="result-paginator__pages">
                            <div class='result-paginator__prev'>
                                <i class="fa fa-arrow-left"></i>
                                <a href="{!! $boards->appends($params)->previousPageUrl() !!}">
                                    <p class="result-paginator__prev-title">@lang('message.prev')</p>
                                </a>
                            </div>
                            {!! $boards->appends($params)->links() !!}
                            <div class='result-paginator__next'>
                                <a href="{!! $boards->appends($params)->nextPageUrl() !!}">
                                    <p class="result-paginator__next-title">@lang('message.next')</p>
                                </a>
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

