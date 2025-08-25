@php
    $codes = [
      'ANSWER' => __('message.successful_call'),
      'TRANSFER' => __('message.successful_call_that_was_transferred'),
      'ONLINE' => __('message.online_call'),
      'BUSY' => __('message.busy_call'),
      'NOANSWER' => __('message.no_answer_call'),
      'CANCEL' => __('message.call_canceled'),
      'CONGESTION' => __('message.unsuccessful_call'),
      'CHANUNAVAIL' => __('message.unsuccessful_call'),
      'VM' => /*'звонок в нерабочее время',*/__('message.empty_voice_mail'),
      'VM-SUCCESS' => /*'звонок в нерабочее время',*/__('message.voice_mail'),
      'SMS-SENDING SMS' => __('message.message_in_progress'),
      'SMS-SUCCESS SMS' => __('message.message_sent_successfully'),
      'SMS-FAILED SMS' => __('message.message_not_sent'),
      'SUCCESS' => __('message.successfully_received_fax'),
      'FAILED' => __('failed_fax'),
    ];
@endphp
@foreach($clients as $key => $item)
    @php
        $call = end($item->calls->toArray());
        $addClass = '';
        if(Auth::user()->role_id == 2 && (Auth::user()->id != $item->user_id && $item->user_id && ($item->user_id != 288 && Auth::user()->id == 207))){
          $addClass = 'o-4';
        }
    @endphp
    <div class="leads-main-row {{$addClass}} active-{{$item->active}}"
        @if($item->active != '1' && $item->source != 'Chaport AI Assistant')
            style="background: /*#fdece2*/ #e8ebed"
        @endif

        @if($item->source == 'Chaport AI Assistant' && $item->active == '1')
            style="background: url(/assets/img/chaport_gpt.png) 25px 66px no-repeat"
        @endif
        @if($item->source == 'Chaport AI Assistant' && $item->active != '1')
            style="background: #e8ebed url(/assets/img/chaport_gpt.png) 25px 66px no-repeat"
        @endif

    >
        <div class="leads-row" data-id="{{$item->id}}" data-name="{{$item->name}}" data-email="{{$item->email}}"
             data-phone="{{$item->phone}}" data-cities='{{$item->city}}' data-comment="{{$item->comment}}"
             data-edit="{{ route('clients.view', ['id' => $item->id]) }}">
            <div class="leads-col lead-name" style="display: flex; padding: 38px 6px 38px 24px;">
                {{--
                <span class="up-down">
                  <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="info-arrow">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z" fill="#3D445C"/>
                  </svg>
                </span>
                --}}
                {{$item->name}}
                @if(Auth::user()->id != $item->user_id && Auth::user()->role_id != 1)
                    <br>({{$item->user->name}})
                @endif
                <span class="class-icon" style="background: {{$item->class->background}};">
                    {{$item->class->name}}
                </span>
            </div>
            <div class="leads-col">{{$item->fio}}</div>
            {{--@if(Auth::user()->id != 273)--}}
            <div class="leads-col" style="overflow: hidden; text-overflow: ellipsis; flex: 0 0 155px"
                 title="{{$item->email}}">{{$item->email}}</div>
            <div class="leads-col">{{$item->phone}}</div>
            {{--@endif--}}
            <div class="leads-col">
                @php
                    $list = explode(", ", $item->cities);

                @endphp
                @if(count($list) <= 1)
                    {{$item->cities}}
                @else
                    {{ $list[0] }}
                    @php
                        unset($list[0]);
                    @endphp
                    <span class="city-counts al-power-tip" title="{{ implode(', ', $list) }}">{{ count($list) }}</span>
                @endif
            </div>
            @if(Auth::user()->role_id == 1 || Auth::user()->id == 207)
                <div class="leads-col">{{$item->user->name}}</div>
            @endif
            @if(Auth::user()->role_id == 1)
                <div class="leads-col" style="hyphens: manual; flex: 0 0 155px">
                    @php
                        if(strpos($item->source, "safeframe") !== false){
                            $parts = explode(".",$item->source);
                            $parts[1] = " ".$parts[1]." ";
                            $parts[0] = substr($parts[0],0,15)." ".substr($parts[0],15);
                            $item->source = implode(".", $parts);
                        }
                    @endphp
                    {{ $item->source }} {{-- $item->jivo_number || $item->binotel_id ? " / ".( $item->jivo_number ? "JivoSite" : "Binotel" ) : ''--}}
                </div>
            @endif
            @if(Auth::user()->role_id == 1)
                <div class="leads-col">
                    {{ $item->utm_channel }}
                </div>

                <div class="leads-col binotel-info">
                    @if($call)
                        <img class="al-power-tip2"
                             src="/assets/img/{{ $call['call_type'] == '1' ? 'outcall' : 'incall' }}{{ in_array($call['disposition'],['BUSY','NOANSWER','CANCEL','CONGESTION','CHANUNAVAIL','VM','VM-SUCCESS']) ? '_bad' : '' }}.svg"
                             width="32"
                             title="{{ $call['call_type'] == '1' ? __('message.outcall') : __('message.incall') }} {{ in_array($call['disposition'],['BUSY','NOANSWER','CANCEL','CONGESTION','CHANUNAVAIL','VM','VM-SUCCESS']) ? __('message.unsuccessful') : __('message.successful') }} @lang('message.call')"
                        />
                    @endif
                </div>
                <div class="leads-col binotel-info">
                    @if($call)
                        {{ $codes[$call['disposition']] }}
                    @endif
                </div>
            @endif
            <div class="leads-col">
                {{$item->status->getTranslatedAttribute('name', \App::getLocale(), 'ru')}}
            </div>
            @if(Auth::user()->role_id == 1)
                <div class="leads-col">
                    {{ $item->lead_created_at ? date('d.m.Y H:i:s', strtotime($item->lead_created_at)) : '' }}
                </div>
            @endif
            <div class="leads-col">
                {{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}
            </div>
            <div class="leads-col">
                {{ date('d.m.Y H:i:s', strtotime($item->updated_at)) }}
            </div>
            <div class="leads-col action-col">
                @if(!$addClass)
                    <span class="edit pointer">
        <!--<a {{--href=" route('clients.view', ['id' => $item->id]) "--}} class="edit">-->
                        {{--
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        --}}
          <svg fill="#FC6B40" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
               xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727"
               xml:space="preserve" class="info-arrow">
            <g class="info-arrow">
              <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"
                    class="info-arrow"/>
            </g>
          </svg>

                        <!--</a>-->
        </span>
                    <a href="{{ route('clients.view', ['id' => $item->id]) }}" class="edit">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                                  stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    {{--
                    @if(Auth::user()->role_id == 1)

                    <a class="del_" data-id="{{$item->id}}">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                      </svg>
                    </a>

                    @endif
                    --}}
                @endif
            </div>
        </div>
        <div class="leads-row-selects hide" data-lead_id="{{ $item->id }}">
            @php
                $item->info = json_decode($item->info);
            @endphp

            <div class="row-inner-tabs">
                <div class="row-inner-tabs-nav">
                    @if(Auth::user()->id != 273)
                        <ul>
                            <li data-id="#t-{{$item->id}}-selections" class="active">@lang('message.selections_')</li>
                            @if($item->messages || count($item->calls))
                                <li data-id="#t-{{$item->id}}-messages">@lang('message.chatting_history')</li>
                            @endif
                            <li data-id="#t-{{$item->id}}-info">@lang('message.information_about_client')</li>
                            @if(Auth::user()->role_id == 1)
                                @if($item->ga_client_id)
                                    <li data-id="#t-{{$item->id}}-ga">Google Analitics</li>
                                @endif
                            @endif
                        </ul>
                    @else
                        <ul>
                            @if($item->messages || count($item->calls))
                                <li data-id="#t-{{$item->id}}-messages">@lang('message.chatting_history')</li>
                            @endif
                            <li data-id="#t-{{$item->id}}-info"
                                class="active">@lang('message.information_about_client')</li>
                            @if(Auth::user()->role_id == 1)
                                @if($item->ga_client_id)
                                    <li data-id="#t-{{$item->id}}-ga">Google Analitics</li>
                                @endif
                            @endif
                        </ul>
                    @endif
                </div>
                <div class="tabs-content">
                    @if(Auth::user()->id != 273)
                        <div class="tabs-item active" id="t-{{$item->id}}-selections">
                            @if(count($item->selections))
                                <div class="leads-selections">
                                    <div class="selection-item selection-head">
                                        <div class="selection-col">id</div>
                                        <div class="selection-col">@lang('message.type')</div>
                                        <div class="selection-col">@lang('message.creation_date')</div>
                                        <div class="selection-col">@lang('message.manager')</div>
                                        <div class="selection-col">@lang('message.planes_count_')</div>
                                        <div class="selection-col">@lang('message.views_count')</div>
                                        <div class="selection-col" style="flex: 0.3;"></div>
                                    </div>
                                    @foreach($item->selections as $k => $v)
                                        <a href="/manager/selection/{{$v->id}}" class="ajax-popup-link">
                                            <div class="selection-item pointer">
                                                <div class="selection-col">{{ $v->id }}</div>
                                                <div class="selection-col">{{ $v->type->name ?? "" }}</div>
                                                <div class="selection-col">{{ $v->created_at }}</div>
                                                <div class="selection-col">{{ $v->manager ? $v->manager : 'клиент' }}</div>
                                                <div class="selection-col"
                                                     id="selection_count_{{$v->id}}">{{ $v->boards_count }}</div>
                                                <div class="selection-col"
                                                     id="selection_views_{{$v->id}}">{{ $v->views_count }}</div>
                                                <div class="selection-col" style="flex: 0.3;">
                    <span data-url="/manager/selection/{{$v->id}}/delete" class="delete-selection pointer">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <div class="action-line">
                                    {{--
                                    <a class="to-client-action add-form-basket" data-lead-id="{{ $item->id }}">
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
                                    <a class="to-client-action go-to-search-for-contragent" data-id="{{ $item->id }}" data-type="client">
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
                                    <a class="to-client-action add-form-file" data-lead_id="{{ $item->id }}">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z"
                                                  fill="#FC6B40"/>
                                        </svg>
                                        @lang('message.add_from_excel')
                                    </a>
                                    @if($item->active == '1')
                                        <a class="to-client-action deactivate-link pointer"
                                           data-client_id="{{ $item->id }}">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.deactivate_client')
                                        </a>
                                    @endif
                                    @if(in_array(Auth::user()->id, [1,202]))
                                        <a class="change-manager-action"
                                           href="/manager/clients/{{ $item->id }}/change-manager">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z"
                                                      fill="#FC6B40"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.change_manager')
                                        </a>
                                    @endif

                                    @if(in_array(Auth::user()->role_id, [1, 2]))
                                        <a class="merge-user-action" style="cursor: pointer"
                                           data-id="{{$item->id}}">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z"
                                                      fill="#FC6B40"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @if(Auth::user()->role_id == 2)
                                                @lang('message.merge_request')
                                            @else
                                                @lang('message.merge_client')
                                            @endif
                                        </a>
                                    @endif


                                </div>
                            @else
                                <div class="no-selection">
                                    <svg width="44" height="54" viewBox="0 0 44 54" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M2.13864 2.13864C3.42795 0.849328 5.17664 0.125 7 0.125H29.0266L43.875 14.9733V47C43.875 48.8234 43.1507 50.572 41.8614 51.8614C40.572 53.1507 38.8234 53.875 37 53.875H7C5.17664 53.875 3.42795 53.1507 2.13864 51.8614C0.849328 50.572 0.125 48.8234 0.125 47V7C0.125 5.17664 0.849328 3.42795 2.13864 2.13864ZM7 3.875C6.1712 3.875 5.37634 4.20424 4.79029 4.79029C4.20424 5.37634 3.875 6.1712 3.875 7V47C3.875 47.8288 4.20424 48.6237 4.79029 49.2097C5.37634 49.7958 6.1712 50.125 7 50.125H37C37.8288 50.125 38.6237 49.7958 39.2097 49.2097C39.7958 48.6237 40.125 47.8288 40.125 47V18.875H25.125V3.875H7ZM28.875 5.27665L38.7234 15.125H28.875V5.27665ZM32 27.625H12V31.375H32V27.625ZM12 37.625H32V41.375H12V37.625ZM17 17.625H12V21.375H17V17.625Z"
                                              fill="#3D445C"/>
                                    </svg>
                                    <span class="no-data-title">@lang('message.this_client_has_no_selections')</span>
                                    <span>@lang('message.create_a_new_collection_using_the_link_below')</span>
                                    <div class="no-selection-action">
                                        <a class="to-client-action add-form-basket" data-lead-id="{{ $item->id }}">
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
                                        <a class="to-client-action add-form-file" data-lead_id="{{ $item->id }}">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.add_from_excel')
                                        </a>
                                        @if($item->active == '1')
                                            <a class="to-client-action deactivate-link pointer"
                                               data-client_id="{{ $item->id }}">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z"
                                                          fill="#FC6B40"/>
                                                </svg>
                                                @lang('message.deactivate_client')
                                            </a>
                                        @endif
                                        @if(in_array(Auth::user()->id, [1,202]))
                                            <a class="change-manager-action"
                                               href="/manager/clients/{{ $item->id }}/change-manager">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z"
                                                          fill="#FC6B40"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z"
                                                          fill="#FC6B40"/>
                                                </svg>
                                                @lang('message.change_manager')
                                            </a>
                                        @endif

                                        @if(in_array(Auth::user()->role_id, [1, 2]))
                                            <a class="merge-user-action" style="cursor: pointer"
                                               data-id="{{$item->id}}">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z"
                                                          fill="#FC6B40"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z"
                                                          fill="#FC6B40"/>
                                                </svg>
                                                @if(Auth::user()->role_id == 2)
                                                    @lang('message.merge_request')
                                                @else
                                                    @lang('message.merge_client')
                                                @endif
                                            </a>
                                        @endif

                                    </div>

                                </div>
                            @endif
                        </div><!-- /selection -->
                    @endif
                    <div class="tabs-item message-tab" id="t-{{$item->id}}-messages">
                        <div class="messages-container">
                            <div class="messages-tab">
                                <span class="pointer active tab-selector"
                                      data-type="message">@lang('message.messages')</span>
                                <span class="pointer tab-selector" data-type="calls">@lang('message.calls')</span>
                            </div>
                            <div class="client-messages-data">
                                <div id="l-{{$item->id}}-m" class="message active tab-item">
                                    {!!$item->messages!!}
                                </div>

                                <div id="l-{{$item->id}}-m" class="calls tab-item">
                                    @if($item->calls)
                                        <!-- call_type = 1 - исходящий -->
                                        @foreach($item->calls as $k => $call)
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
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--@endif--}}
                    <div class="tabs-item message-tab @if(Auth::user()->id == 273) active @endif"
                         id="t-{{$item->id}}-info">
                        <div class="info-table">
                            <div class="info-tr">
                                <div class="info-td">@lang('message.dialog_page')</div>
                                <div class="info-td">
                                    <a href="{{$item->info->page->url}}" target="_blank">{{$item->info->page->url}}</a>
                                </div>
                            </div>
                            <div class="info-tr">
                                <div class="info-td">utm</div>
                                <div class="info-td">{{urldecode($item->utm)}}</div>
                            </div>
                            <div class="info-tr">
                                <div class="info-td">@lang('message.location')</div>
                                \
                                <div class="info-td">
                                    {{$item->info->location}}
                                    @if($item->info->map->lat)
                                        &nbsp;<a
                                                href="https://www.google.com/maps/search/?api=1&query={{$item->info->map->lat}},{{$item->info->map->lng}}"
                                                target="_blank">(на карте)</a>
                                    @endif
                                </div>
                            </div>
                            <div class="info-tr">
                                <div class="info-td">@lang('message.provider')</div>
                                <div class="info-td">{{$item->info->isp}}</div>
                            </div>
                            <div class="info-tr">
                                <div class="info-td">@lang('message.ip_address')</div>
                                <div class="info-td">{{$item->info->ip}}</div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->role_id == 1)
                        <div class="tabs-item message-tab" id="t-{{$item->id}}-ga">
                            <div class="info-table">
                                <div class="info-tr">
                                    <div class="info-td">Client ID</div>
                                    <div class="info-td">{{$item->ga_client_id}}</div>
                                </div>
                                <div class="info-tr">
                                    <div class="info-td">Tracking ID</div>
                                    <div class="info-td">{{$item->info->ga_tracking_id}}</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
<style>
    .o-4 {
        opacity: 0.4;
    }
</style>