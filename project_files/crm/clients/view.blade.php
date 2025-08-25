@include('add.head')
<body>
@include('add.header')
@include('add.menu')
<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base">
                <a class="back" href="/manager/clients">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z"
                              fill="#FC6B40"/>
                    </svg>
                    @lang('message.back')
                </a>
            </div>
            <div class="container  container-base">
                @include('front.crm.clients.header')
                @include('front.crm.clients.inner-menu')
                <div class="client-tab-data-block">
                    <div class="info-block">
                        <div class="info-block-table">
                            <div class="tr">
                                <div class="td">
                                    <span>@lang('message.company_name2')</span>
                                </div>
                                <div class="td">
                                    {{ $client->name }}
                                </div>
                            </div>
                            {{--
                            <div class="tr">
                              <div class="td">
                                <span>E-mail</span>
                              </div>
                              <div class="td">
                                {{ $client->email }}
                              </div>
                            </div>
                            --}}
                            <div class="tr">
                                <div class="td">
                                    <span>@lang('message.city')</span>
                                </div>
                                <div class="td">
                                    @foreach($client->cities as $k =>  $city)
                                        {{$city->name}}@if($k != (count($client->cities) -1))
                                            ,
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->role_id == 1 && isset($client->ltv->live_time_value))
                        <hr/>
                        <div class="info-block">
                            <h2 class="info-block-title">@lang('message.analitics')</h2>
                            <div class="info-block-table">
                                <div class="tr">
                                    <div class="td" style="width: 300px;">
                                        <span>LTV</span>
                                    </div>
                                    <div class="td">
                                        {{ $client->ltv->live_time_value }}
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="td" style="width: 300px;">
                                        <span>LT</span>
                                    </div>
                                    <div class="td">
                                        {{ $client->ltv->live_time }}
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="td" style="width: 300px;">
                                        <span>LT Active</span>
                                    </div>
                                    <div class="td">
                                        {{ $client->ltv->live_time_active }}
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="td" style="width: 300px;">
                                        <span> Середній чек за місяць</span>
                                    </div>
                                    <div class="td">
                                        {{ $client->ltv->avg_bill }}
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="td" style="width: 300px;">
                                        <span>Реальний середній чек за місяць</span>
                                    </div>
                                    <div class="td">
                                        {{ $client->ltv->real_avg_bill }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr/>
                    @if(Auth::user()->id != 273 || $client->id == 692 || true)
                        <div class="info-block">
                            <h2 class="info-block-title">@lang('message.contacts')</h2>
                            {{--<span>{{ $client->channel }}</span>--}}
                            @foreach($contacts as $contact)
                                <div class="contact-block">
                                    <div class="field-container">
                                        <div class="input-block">
                                            <label>@lang('message.fio2')</label>
                                            {{ $contact->fio }}
                                        </div>
                                        @if($contact->phone)
                                            <div class="input-block">
                                                <label>@lang('message.phone')</label>
                                                {{ $contact->phone }}
                                            </div>
                                        @endif
                                        @if($client->contact_person == $contact->id)
                                            <div class="input-block">
                                                <label>@lang('message.chanel-title')</label>
                                                {{ $client->channel }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="field-container">
                                        @if($contact->email)
                                            <div class="input-block">
                                                <label>E-mail</label>
                                                {{ $contact->email }}
                                            </div>
                                        @endif
                                        <div class="input-block">
                                            <label>@lang('message.post')</label>
                                            <span style="background: {{$contact->post->background}}; color: {{$contact->post->color}}; padding: 5px; border-radius: 3px">
                    &bull; {{ $contact->post ? $contact->post->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}
                    </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{--
                            <div class="info-block-table">
                              <div class="tr">
                                <div class="td">
                                  <span>Ф.И.О.</span>
                                </div>
                                <div class="td">
                                  {{ $contact->fio }}
                                </div>
                              </div>
                              <div class="tr">
                                <div class="td">
                                  <span>Должность</span>
                                </div>
                                <div class="td">
                                  {{ $contact->post->name }}
                                </div>
                              </div>
                              <div class="tr">
                                <div class="td">
                                  <span>E-mail</span>
                                </div>
                                <div class="td">
                                  {{ $contact->email }}
                                </div>
                              </div>
                              <div class="tr">
                                <div class="td">
                                  <span>Телефон</span>
                                </div>
                                <div class="td">
                                  {{ $contact->phone }}
                                </div>
                              </div>
                              <div class="tr">
                                <div class="td">
                                  <span>Канал связи</span>
                                </div>
                                <div class="td">
                                  {{ $client->channel }}
                                </div>
                              </div>
                            </div>
                            --}}
                        </div>
                        <hr/>
                            <div class="info-block">
                                <h2 class="info-block-title">@lang('message.selections_')</h2>
                                @if(count($client->selections))
                                    <div class="leads-selections" style="padding: 0;">
                                        <div class="selection-item selection-head">
                                            <div class="selection-col">id</div>
                                            <div class="selection-col">@lang('message.type')</div>
                                            <div class="selection-col">@lang('message.creation_date')</div>
                                            <div class="selection-col">@lang('message.selection_author')</div>
                                            <div class="selection-col">@lang('message.planes_count_')</div>
                                            <div class="selection-col">@lang('message.views_count')</div>
                                            <div class="selection-col" style="flex: 0.3;"></div>
                                        </div>
                                        @foreach($client->selections as $k => $v)
                                            <a href="/manager/selection/{{$v->id}}" class="ajax-popup-link">
                                                <div class="selection-item pointer">
                                                    <div class="selection-col">{{ $v->id }}</div>
                                                    <div class="selection-col">{{ $v->type->name }}</div>
                                                    <div class="selection-col">{{ $v->created_at }}</div>
                                                    <div class="selection-col">{{ $v->manager ? $v->manager : __('message.client')  }}</div>
                                                    <div class="selection-col"
                                                         id="selection_count_{{$v->id}}">{{ $v->boards_count }}</div>
                                                    <div class="selection-col"
                                                         id="selection_views_{{$v->id}}">{{ $v->views_count }}</div>
                                                    <div class="selection-col" style="flex: 0.3;">
                                                        <span data-url="/manager/selection/{{$v->id}}/delete" class="delete-selection pointer">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                                                                      fill="#FC6B40"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                                                                      fill="#FC6B40"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                                                                      fill="#FC6B40"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                                                                      fill="#FC6B40"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                                <div style="display: flex">
                                        {{--
                                        <a class="to-client-action add-form-basket" data-lead-id="{{ $client->id }}">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z"
                                                      fill="#FC6B40"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.54199 10C3.54199 9.65482 3.82181 9.375 4.16699 9.375H15.8337C16.1788 9.375 16.4587 9.65482 16.4587 10C16.4587 10.3452 16.1788 10.625 15.8337 10.625H4.16699C3.82181 10.625 3.54199 10.3452 3.54199 10Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.add_from_basket')
                                        </a>
                                        --}}
                                        <a class="to-client-action go-to-search-for-contragent" data-id="{{ $client->id }}" data-type="client">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z"
                                                      fill="#FC6B40"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.54199 10C3.54199 9.65482 3.82181 9.375 4.16699 9.375H15.8337C16.1788 9.375 16.4587 9.65482 16.4587 10C16.4587 10.3452 16.1788 10.625 15.8337 10.625H4.16699C3.82181 10.625 3.54199 10.3452 3.54199 10Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.create_selection')
                                        </a>

                                        <a class="to-client-action add-form-file" data-lead_id="{{ $client->id }}">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.add_from_excel')
                                        </a>

                                        <a class="to-client-action add-form-file-outdoor"
                                           data-lead_id="{{$client->id}}}" data-type="client">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.add_from_outdoor_online')
                                        </a>

                                    </div>
                            </div>
                            <hr/>
                    @endif
                    @if($client->info)
                        @php
                            $client->info = json_decode($client->info);
                        @endphp
                        <div class="info-block additional-information">
                            <h2 class="info-block-title">@lang('message.addition_information')</h2>
                            <div class="info-block-table">
                                <div class="tr">
                                    <div class="td">@lang('message.dialog_page')</div>
                                    <div class="td">
                                        <a href="{{$client->info->page->url}}"
                                           target="_blank">{{$client->info->page->url}}</a>
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="td">utm</div>
                                    <div class="td">{{urldecode($client->utm)}}</div>
                                </div>
                                <div class="tr">
                                    <div class="td">@lang('message.location')</div>
                                    <div class="td">
                                        {{$client->info->location}}
                                        @if($client->info->map->lat)
                                            &nbsp;<a
                                                    href="https://www.google.com/maps/search/?api=1&query={{$client->info->map->lat}},{{$client->info->map->lng}}"
                                                    target="_blank">(@lang('message.on_map')</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="td">@lang('message.provider')</div>
                                    <div class="td">{{$client->info->isp}}</div>
                                </div>
                                <div class="tr">
                                    <div class="td">@lang('message.ip_address')</div>
                                    <div class="td">{{$client->info->ip}}</div>
                                </div>
                                <div class="tr">
                                    <div class="td">Client ID</div>
                                    <div class="td">{{$client->ga_client_id}}</div>
                                </div>
                                <div class="tr">
                                    <div class="td">Tracking ID</div>
                                    <div class="td">{{$client->info->ga_tracking_id}}</div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    @endif
                    @if(Auth::user()->id != 273 || $client->id == 692 || true)
                        <div class="info-block">
                            <h2 class="info-block-title">@lang('message.comment')
                                <span class="pointer edit-comment">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                        stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
                            </h2>
                            <div class="info-block-table">
                                <div class="tr">
                                    <div class="td">
                                        <span>@lang('message.note')</span>
                                    </div>
                                    <div class="td td-comment comment-value" data-id="{{$client->id}}">
                                        {!! $client->comment !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        @if($client->messages || $client->calls)
                            <div class="info-block">
                                <h2 class="info-block-title">@lang('message.communications')</h2>
                                @if($client->calls)
                                    @foreach($client->calls as $k => $call)
                                        <div class="call-item">
                                            <div class="call-ico">
                                                @if($call->disposition  == 'ANSWER')
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.1667 0.833008L14.5833 5.41634L12.5 3.33301"
                                                              stroke="#4FB14B" stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M18.3351 14.1004V16.6004C18.3361 16.8325 18.2886 17.0622 18.1956 17.2749C18.1026 17.4875 17.9662 17.6784 17.7952 17.8353C17.6242 17.9922 17.4223 18.1116 17.2024 18.186C16.9826 18.2603 16.7496 18.288 16.5185 18.2671C13.9542 17.9884 11.491 17.1122 9.32682 15.7087C7.31334 14.4293 5.60626 12.7222 4.32682 10.7087C2.91846 8.53474 2.04202 6.05957 1.76848 3.48374C1.74766 3.2533 1.77505 3.02104 1.8489 2.80176C1.92275 2.58248 2.04146 2.38098 2.19745 2.21009C2.35345 2.0392 2.54332 1.90266 2.75498 1.80917C2.96663 1.71569 3.19543 1.66729 3.42682 1.66707H5.92682C6.33124 1.66309 6.72331 1.80631 7.02995 2.07002C7.33659 2.33373 7.53688 2.69995 7.59348 3.10041C7.699 3.90046 7.89469 4.68601 8.17682 5.44207C8.28894 5.74034 8.3132 6.0645 8.24674 6.37614C8.18027 6.68778 8.02587 6.97383 7.80182 7.20041L6.74348 8.25874C7.92978 10.345 9.65719 12.0724 11.7435 13.2587L12.8018 12.2004C13.0284 11.9764 13.3144 11.8219 13.6261 11.7555C13.9377 11.689 14.2619 11.7133 14.5601 11.8254C15.3162 12.1075 16.1018 12.3032 16.9018 12.4087C17.3066 12.4658 17.6763 12.6697 17.9406 12.9817C18.2049 13.2936 18.3453 13.6917 18.3351 14.1004Z"
                                                              stroke="#4FB14B" stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                @else
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.168 0.833008L14.168 5.83301" stroke="#FC0808"
                                                              stroke-width="1.25" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path d="M14.168 0.833008L19.168 5.83301" stroke="#FC0808"
                                                              stroke-width="1.25" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                        <path d="M18.3351 14.1004V16.6004C18.3361 16.8325 18.2886 17.0622 18.1956 17.2749C18.1026 17.4875 17.9662 17.6784 17.7952 17.8353C17.6242 17.9922 17.4223 18.1116 17.2024 18.186C16.9826 18.2603 16.7496 18.288 16.5185 18.2671C13.9542 17.9884 11.491 17.1122 9.32682 15.7087C7.31334 14.4293 5.60626 12.7222 4.32682 10.7087C2.91846 8.53474 2.04202 6.05957 1.76848 3.48374C1.74766 3.2533 1.77505 3.02104 1.8489 2.80176C1.92275 2.58248 2.04146 2.38098 2.19745 2.21009C2.35345 2.0392 2.54332 1.90266 2.75498 1.80917C2.96663 1.71569 3.19543 1.66729 3.42682 1.66707H5.92682C6.33124 1.66309 6.72331 1.80631 7.02995 2.07002C7.33659 2.33373 7.53688 2.69995 7.59348 3.10041C7.699 3.90046 7.89469 4.68601 8.17682 5.44207C8.28894 5.74034 8.3132 6.0645 8.24674 6.37614C8.18027 6.68778 8.02587 6.97383 7.80182 7.20041L6.74348 8.25874C7.92978 10.345 9.65719 12.0724 11.7435 13.2587L12.8018 12.2004C13.0284 11.9764 13.3144 11.8219 13.6261 11.7555C13.9377 11.689 14.2619 11.7133 14.5601 11.8254C15.3162 12.1075 16.1018 12.3032 16.9018 12.4087C17.3066 12.4658 17.6763 12.6697 17.9406 12.9817C18.2049 13.2936 18.3453 13.6917 18.3351 14.1004Z"
                                                              stroke="#FC0808" stroke-width="1.25"
                                                              stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="user-info">
                                                <span class="manager-name">{{$call->client_contacts->fio}}</span><br>
                                                <span class="call-date">{{date('d.m.Y H:i:s', strtotime($call->created_at))}}</span>
                                            </div>
                                            <div class="user-post">
                                                {{$call->client_contacts->post->name}}
                                            </div>
                                            <div class="phone">
                                                {{$call->phone}}
                                            </div>
                                            <div class="billsec">
                                                @lang('message.expectation'): {{$call->waitsec}} c.<br>
                                                @lang('message.duration'): {{$call->billsec}} с.
                                            </div>
                                            <div class="link2file">
                                                @if($call->link)
                                                    <a class="binotel-get-call"
                                                       data-call_id="{{$call->binotel_id}}">@lang('message.audio')</a>
                                                @else
                                                    <span style="width:78px;display:block;">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </span>
                                                @endif
                                            </div>
                                            @if($call->link && $call->disposition == 'ANSWER' && $call->transcription_status_id === \App\CrmCallsTranscriptionsStatus::TRANSCRIPTION_RECEIVED)
                                                <div class="transcription-col">
                                                    <a class="show-transcription" data-id="transcription-{{$call->id}}">@lang('message.transcription')</a>
                                                </div>
                                            @endif
                                        </div>
                                        @if($call->link && $call->disposition == 'ANSWER' && $call->transcription_status_id === \App\CrmCallsTranscriptionsStatus::TRANSCRIPTION_RECEIVED)
                                            <div class="transcription-block" id="transcription-{{$call->id}}">
                                                <b>@lang('message.summary'):</b>
                                                <br><br>
                                                {!! nl2br(str_replace(['### Резюме розмови', '### Важливі деталі обговорення','### Завдання для менеджера'],['<b>Резюме розмови:</b>', '<b>Важливі деталі обговорення:</b>','<b>Завдання для менеджера:</b>'], $call->transcription[0]->summary)) !!}
                                                <br>
                                                <b class="show-transcription-text">@lang('message.transcription')</b>
                                                <br><br>
                                                <div class="transcription-text">
                                                    {!! nl2br(str_replace(['**Клієнт:**', '**Менеджер:**'],['<b>Клієнт:</b>', '<b>Менеджер:</b>'], $call->transcription[0]->transcription)) !!}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                                @if($client->messages)
                                    @php
                                        preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/i', $client->messages, $out);
                                        $date = date('d.m.Y', strtotime($out[0]));
                                    @endphp
                                    <div class="call-item message-item">
                                        <div class="call-ico">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 12.5C17.5 12.942 17.3244 13.3659 17.0118 13.6785C16.6993 13.9911 16.2754 14.1667 15.8333 14.1667H5.83333L2.5 17.5V4.16667C2.5 3.72464 2.67559 3.30072 2.98816 2.98816C3.30072 2.67559 3.72464 2.5 4.16667 2.5H15.8333C16.2754 2.5 16.6993 2.67559 17.0118 2.98816C17.3244 3.30072 17.5 3.72464 17.5 4.16667V12.5Z"
                                                      stroke="#FC6B40" stroke-width="1.25" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="user-info" style="width:100%">
                                            <span class="call-date">{{ $date }}</span>
                                        </div>
                                        <div class="slide-up-down">
                      <span>
                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="info-arrow">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z"
                                fill="#3D445C"></path>
                        </svg>
                      </span>
                                        </div>
                                    </div>
                                    @php
                                        $client->messages = preg_replace('/<p><strong>Agent/', '<div class="right-side clearfix"><strong>Agent', $client->messages);
                                        $client->messages = preg_replace('/<p>/', '<div>', $client->messages);
                                        $client->messages = preg_replace('/<\/p>/', '</div>', $client->messages);
                                        $client->messages = preg_replace('/[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}/', '<span class="date">$0</span>', $client->messages);
                                        //$client->messages = preg_replace('/<\/strong><br>/', '</strong>', $client->messages);
                                    @endphp

                                    <div class="messages-block hide">{!! $client->messages !!}</div>
                                @endif
                                {{--
                                <div class="kved-table">
                                  {!! $client->messages !!}
                                </div>
                                --}}
                            </div>
                            <hr/>
                        @endif
                    @endif
                    <div class="info-block">
                        <h2 class="info-block-title">@lang('message.lead_status_changes')</h2>
                        <div class="status-div">
                            @php
                                $statusLog = $client->leadStatusLog();
                            @endphp
                            @if($statusLog && count($statusLog))
                                @foreach($statusLog as $statusItem)
                                    <span>{{date('d.m.Y H:i:s', strtotime($statusItem->created_at))}} - <b>{{$statusItem->new_status ? $statusItem->new_status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}</b></span>
                                    @if($statusItem->user)
                                        <br>
                                        {{$statusItem->user->name}}
                                    @endif
                                    <br>
                                    {{$statusItem->comment}}
                                    <hr>
                                @endforeach
                                <span>{{date('d.m.Y H:i:s', strtotime($item->created_at))}} - <b>{{$statusItem->old_status ? $statusItem->old_status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}</b></span>
                                <br>
                            @else
                                <span>{{date('d.m.Y H:i:s', strtotime($item->created_at))}} - <b>{{$item->status ? $item->status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}</b></span>
                            @endif
                        </div>
                    </div>
                    <hr/>
                    <div class="info-block">
                        <h2 class="info-block-title">@lang('message.kved')</h2>
                        <div class="info-block-table kved-table">
                            @foreach($client->kved as $code => $title)
                                <div class="tr">
                                    <div class="td">
                                        <span>{{$code}}</span>
                                    </div>
                                    <div class="td td-comment">
                                        {{ $title }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr/>

                    <div class="custom-info-block">
                        <h2 class="custom-info-block-title">@lang('message.merge_history')</h2>
                        <div class="custom-info-block-table">
                            @if($client && $client->mergeChildren)
                                <div class="tr">
                                    <div class="td">#</div>
                                    <div class="td">Название дочернего клиента</div>
                                    <div class="td">Директор</div>
                                    <div class="td">Дата</div>
                                </div>
                                @foreach($client->mergeChildren as $k => $child)
                                    <div class="tr">
                                        <div class="td">{{$k + 1}}</div>
                                        <div class="td"><span>{{$child->childClient ? $child->childClient->name : ''}}</span></div>
                                        <div class="td"><span>{{$child->user->name}}</span>
                                        </div>
                                        <div class="td"><span>{{$child->created_at}}</span></div>
                                    </div>
                                @endforeach
                            @endif


{{--                            <div class="tr">--}}
{{--                                <div class="td">2</div>--}}
{{--                                <div class="td"><span>Клиент 2</span></div>--}}
{{--                                <div class="td"><span>Директор 2</span></div>--}}
{{--                                <div class="td"><span>2024-10-17</span></div>--}}
{{--                                <div class="td td-comment">Комментарий 2</div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
@if(session('success') || @$success)
    <div class="success-mesage">
        {!!session('success')!!}
    </div>
@endif
<div class="al-overlay3 hide"></div>
<div class="confirm-popup">
    <div class='confirm-header'>
        <span class="confirm-title"></span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="confirm-body">
        <div class="confirm-message"></div>
        <div class="align-right confirm-action">
            <a class="cancel pointer">@lang('message.cancel')</a>
            <a class="yes pointer">@lang('message.yes')</a>
        </div>
    </div>
</div>


<div class="al-overlay3 hide zi10101"></div>

<div class="import-block hide zi10101">
    <div class="close">
        <svg viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <line x1="1" y1="11" x2="11" y2="1" stroke="#aaa" stroke-width="2"/>
            <line x1="1" y1="1" x2="11" y2="11" stroke="#aaa" stroke-width="2"/>
        </svg>
    </div>
    <h2>@lang('message.import_from_excel')</h2>
    <div><a href="/import/import.xlsx" class="red-link">@lang('message.example_file')</a></div>
    <br/>
    <form method="post" action="" enctype="multipart/form-data" id="import-form">
        <div>
            <input type="file" name="import_file"/>
        </div>
        <br/>
        <button class="btn-style btn" id="import-button">@lang('message.import_button')</button>
    </form>
</div>
<div class="import-block-outdoor hide zi10101">
    <div class="close-outdoor">
        <svg viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <line x1="1" y1="11" x2="11" y2="1" stroke="#aaa" stroke-width="2"/>
            <line x1="1" y1="1" x2="11" y2="11" stroke="#aaa" stroke-width="2"/>
        </svg>
    </div>
    <h2>@lang('message.import_from_excel')</h2>
    <form method="post" action="" enctype="multipart/form-data" id="import-form-outdoor">
        <div>
            <input type="file" name="import_file_outdoor">
            <input type="hidden" id="button_old_name" value="@lang('message.import_button')">

        </div>
        <br/>
        <button class="btn-style btn" id="input_button_outdoor">@lang('message.import_button')</button>

    </form>
</div>

<script>
    const main_url = '/manager/clients';
</script>

@include('front.crm.scripts')

@if(session('success') || @$success)
    <script>
        const w = $('.success-mesage').width();
        $('.success-mesage').css('margin-left', '-' + (w / 2) + 'px');
        $('.success-mesage').css('opacity', '1');
        setTimeout(function () {
            $('.success-mesage').css('opacity', '0');
        }, 4000)
    </script>
@endif
<style>
    .additional-information .info-block-table .tr .td:nth-child(1) {
        width: 200px;
    }

    .additional-information .info-block-table .tr .td a {
        color: #FC6B40;
    }

    .custom-info-block-title {
        font-size: 24px;
        margin-bottom: 15px;
        color: #333;
    }

    .custom-info-block-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-info-block-table .tr {
        display: flex;
        border-bottom: 1px solid #ddd;
    }

    .custom-info-block-table .td {
        flex: 1;
        padding: 10px;
        display: flex;
        align-items: center;
        overflow: hidden;
        text-overflow: ellipsis;
        word-wrap: break-word;
        white-space: normal;
        width: 100%;
    }

    .custom-info-block-table .td-comment {
        flex: 2;
    }

    .custom-info-block-table .td:last-child {
        border-right: none;
    }

    .custom-info-block-table .td span {
        display: inline-block;
        width: 100%;
        word-wrap: break-word;
        white-space: normal;
    }




</style>