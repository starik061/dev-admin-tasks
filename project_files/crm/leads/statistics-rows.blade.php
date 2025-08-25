@php
    $codes = [
      'ANSWER' => 'успешный звонок',
      'TRANSFER' => 'успешный звонок который был переведен',
      'ONLINE' => 'звонок в онлайне',
      'BUSY' => 'неуспешный звонок по причине занято',
      'NOANSWER' => 'неуспешный звонок по причине нет ответа',
      'CANCEL' => 'неуспешный звонок по причине отмены звонка',
      'CONGESTION' => 'неуспешный звонок',
      'CHANUNAVAIL' => 'неуспешный звонок',
      'VM' => /*'звонок в нерабочее время',*/'голосовая почта без сообщения',
      'VM-SUCCESS' => /*'звонок в нерабочее время',*/'голосовая почта с сообщением',
      'SMS-SENDING SMS' => 'сообщение на отправке',
      'SMS-SUCCESS SMS' => 'сообщение успешно отправлено',
      'SMS-FAILED SMS' => 'сообщение не отправлено',
      'SUCCESS' => 'успешно принятый факс',
      'FAILED' => 'непринятый факс'
    ];
@endphp
@foreach($leads as $key => $item)
    @php
        $call = end($item->calls->toArray());
        $addClass = '';
        if(Auth::user()->role_id == 2 && (Auth::user()->id != $item->user_id && $item->user_id)){
          $addClass = 'o-4';
        }
        $dateTime = explode(" ", date('Y-m-d H:i:s', strtotime(str_replace(['T','.000000Z'],[' ',''],$call['created_at']))+(3*3600)));
        //dd($call['created_at']);
        $time = $dateTime[1];
        $weekDay = date('w',strtotime($dateTime[0]));
        $notWork = ((($time < '08:00:00' || $time > '23:00:00') && ($weekDay >= 1 && $weekDay <= 5)) ||in_array($weekDay,[0,6])) && $time && $call['created_at'] != null;
    @endphp
    <div class="leads-main-row {{$addClass}}"
         id="lead-info-{{$item->id}}"
         @if($item->visible != '1')
             style="background: #ccc;"
         @else
             @if($item->from_form && $item->user_id)
                 style="background: #EDF7ED;"
         @else
             @if($item->from_form && $item->from_form != '0')
                 style="background: #ffffaa;"
         @else

             {{--@if($notWork && $item->user_id)
             style="background: #fcd68d;"
             @else--}}
             @if(in_array($call['disposition'],['BUSY','NOANSWER','CONGESTION','CHANUNAVAIL','CANCEL','VM','VM-SUCCESS']) && $item->user_id)
                 style="background: #fedfcc;"
         @else
             @if(in_array($call['disposition'],['BUSY','NOANSWER','CONGESTION','CHANUNAVAIL','CANCEL','VM','VM-SUCCESS']) && !$item->user_id)
                 style="background: #ffffaa;"
            @endif
            @endif
            {{--@endif--}}

            @endif
            @endif
            @endif
    >
        <div class="leads-row"
             data-id="{{$item->id}}"
             data-name="{{$item->name}}"
             data-email="{{$item->email}}"
             data-phone="{{$item->phone}}"
             data-cities='{{$item->city}}'
             data-comment="{{$item->comment}}"
        >
            <div class="leads-col lead-name leads-new-name-col">
                <div class="new-name-items">
                    <div class="new-name-item">
                        <span class="up-down">
                          <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="info-arrow">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z" fill="#3D445C"/>
                          </svg>
                        </span>
                    </div>
                    <div class="new-name-item">
                        <!-- favorite -->
                        {{$item->name}}<br>
                        <span class="new-created-at">{{$item->created_at}}</span>
                        @if(Auth::user()->id != $item->user_id && Auth::user()->role_id != 1)
                            <br>({{$item->user->name}})
                        @endif
                        @if($item->from_form == 1)
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_4364_184941" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="18" height="18">
                                    <rect width="18" height="18" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_4364_184941)">
                                    <path d="M4.5 10.5C4.5 11.15 4.63125 11.7655 4.89375 12.3465C5.15625 12.928 5.53125 13.4375 6.01875 13.875C6.00625 13.8125 6 13.7562 6 13.7062V13.5375C6 13.1375 6.075 12.7625 6.225 12.4125C6.375 12.0625 6.59375 11.7437 6.88125 11.4562L9 9.375L11.1187 11.4562C11.4062 11.7437 11.625 12.0625 11.775 12.4125C11.925 12.7625 12 13.1375 12 13.5375V13.7062C12 13.7562 11.9938 13.8125 11.9813 13.875C12.4688 13.4375 12.8438 12.928 13.1063 12.3465C13.3688 11.7655 13.5 11.15 13.5 10.5C13.5 9.875 13.3845 9.28425 13.1535 8.72775C12.922 8.17175 12.5875 7.675 12.15 7.2375C11.9 7.4 11.6375 7.52175 11.3625 7.60275C11.0875 7.68425 10.8062 7.725 10.5187 7.725C9.74375 7.725 9.072 7.46875 8.5035 6.95625C7.9345 6.44375 7.60625 5.8125 7.51875 5.0625C7.03125 5.475 6.6 5.903 6.225 6.3465C5.85 6.7905 5.5345 7.2405 5.2785 7.6965C5.022 8.153 4.82825 8.61875 4.69725 9.09375C4.56575 9.56875 4.5 10.0375 4.5 10.5ZM9 11.475L7.93125 12.525C7.79375 12.6625 7.6875 12.8188 7.6125 12.9938C7.5375 13.1688 7.5 13.35 7.5 13.5375C7.5 13.9375 7.647 14.2812 7.941 14.5687C8.2345 14.8562 8.5875 15 9 15C9.4125 15 9.76575 14.8562 10.0598 14.5687C10.3533 14.2812 10.5 13.9375 10.5 13.5375C10.5 13.3375 10.4625 13.153 10.3875 12.984C10.3125 12.8155 10.2063 12.6625 10.0688 12.525L9 11.475ZM9 2.25V4.725C9 5.15 9.147 5.50625 9.441 5.79375C9.7345 6.08125 10.0937 6.225 10.5187 6.225C10.7437 6.225 10.9532 6.17825 11.1473 6.08475C11.3407 5.99075 11.5125 5.85 11.6625 5.6625L12 5.25C12.925 5.775 13.6562 6.50625 14.1937 7.44375C14.7312 8.38125 15 9.4 15 10.5C15 12.175 14.4187 13.5937 13.2562 14.7562C12.0937 15.9187 10.675 16.5 9 16.5C7.325 16.5 5.90625 15.9187 4.74375 14.7562C3.58125 13.5937 3 12.175 3 10.5C3 8.8875 3.54075 7.35625 4.62225 5.90625C5.70325 4.45625 7.1625 3.2375 9 2.25Z" fill="#FC6B40"/>
                                </g>
                            </svg>
                        @endif
                    </div>
                </div>
            </div>
            <div class="leads-col leads-status-col">
                {{$item->status->name}}<br>
                <svg width="132" height="4" viewBox="0 0 132 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 2C0 1.17157 0.671573 0.5 1.5 0.5H25.6V3.5H1.5C0.671574 3.5 0 2.82843 0 2Z" fill="{{ ($item->status->id >= 2  && $item->status->id <= 5) || $item->status->id == 6 ? '#FC6B40' : '#E8EBF1' }}"/>
                    <rect x="26.6016" y="0.5" width="25.6" height="3" fill="{{ $item->status->id >= 3 && $item->status->id <= 5 ? '#FC6B40' : '#E8EBF1' }}"/>
                    <rect x="53.1992" y="0.5" width="25.6" height="3" fill="{{ $item->status->id >= 4 && $item->status->id <= 5 ? '#FC6B40' : '#E8EBF1' }}"/>
                    <rect x="79.8008" y="0.5" width="25.6" height="3" fill="{{ $item->status->id == 5 ? '#FC6B40' : '#E8EBF1' }}"/>
                </svg>

            </div>
            <div class="leads-col leads-contacts-col">
                {{$item->phone}}{!! $item->phone && $item->tg_name ? '<br>' : '' !!}{{$item->tg_name}}
                @if($call['is_new'] == '0')
                    <img src="/assets/img/exists_call.svg" width="32"/>
                @endif
                @if(count($item->contacts) > 1)
                    @foreach($item->contacts as $index => $contact)
                        @if($contact->phone && $index)
                            <br>{{$contact->phone}}
                        @endif
                    @endforeach
                @endif
                @if($item->email)
                    <br>
                    <span class="new-lead-email">
                    {{$item->email}}
                        @if(count($item->contacts) > 1)
                            @foreach($item->contacts as $index => $contact)
                                @if($contact->email && $index)
                                    <br>{{$contact->email}}
                                @endif
                            @endforeach
                        @endif
                    </span>
                @endif
            </div>
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
            @if(Auth::user()->role_id == 1)
                <div class="leads-col">{{$item->user->name}}</div>
            @endif
            <div class="leads-col" style="hyphens: manual; flex: 0 0 125px">
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
            @if(Auth::user()->role_id == 1)
                <div class="leads-col">
                    {{ $item->utm_channel }}
                </div>
            @endif
            <div class="leads-col binotel-info">
                @if($call)
                    <img class="al-power-tip2" src="/assets/img/{{ $call['call_type'] == '1' ? 'outcall' : 'incall' }}{{ in_array($call['disposition'],['BUSY','NOANSWER','CANCEL','CONGESTION','CHANUNAVAIL','VM','VM-SUCCESS']) ? '_bad' : '' }}.svg" width="32" title="{{ $call['call_type'] == '1' ? 'Исходящий' : 'Входящий' }} {{ in_array($call['disposition'],['BUSY','NOANSWER','CANCEL','CONGESTION','CHANUNAVAIL','VM','VM-SUCCESS']) ? 'неуспешный' : 'успешный' }} звонок"/>
                @endif
            </div>
            <div class="leads-col binotel-info">
                @if($call)
                    {{ $codes[$call['disposition']] }}
                @endif
            </div>
            <div class="leads-col binotel-info">
                {{ date('H:i:s d.m.Y', strtotime($item->updated_at)) }}
            </div>

            <div class="leads-col action-col">
                {{--@if(Auth::user()->role_id == 1 || Auth::user()->id == $item->user_id)--}}

                <a href="{{ route('leads.edit', ['id' => $item->id]) }}" class="edit">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                @if(Auth::user()->role_id == 1)
                    {{--@if(Auth::user()->id != 273)--}}
                    <a class="del_" data-id="{{$item->id}}">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                        </svg>
                    </a>
                    {{--@endif--}}
                @endif
            </div>

        </div>
        @if(Auth::user()->role_id == 1 || Auth::user()->id == $item->user_id || $item->user_id == null)
            <div class="leads-row-selects hide" data-lead_id="{{ $item->id }}">
                @php
                    $item->info = json_decode($item->info);
                @endphp

                <div class="row-inner-tabs">
                    <div class="row-inner-tabs-nav">
                        {{--@if(Auth::user()->id != 273)--}}
                        <ul>
                            <li data-id="#t-{{$item->id}}-status" class="active">Статус</li>
                            <li data-id="#t-{{$item->id}}-selections">Подборки</li>
                            @if($item->messages || count($item->calls))
                                <li data-id="#t-{{$item->id}}-messages">История переписки </li>
                            @endif
                            <li data-id="#t-{{$item->id}}-info">Информация о клиенте</li>
                            @if(Auth::user()->role_id == 1)
                                @if($item->ga_client_id)
                                    <li data-id="#t-{{$item->id}}-ga">Google Analitics</li>
                                @endif
                            @endif
                        </ul>
                        {{--
                        @else
                        <ul>
                          @if($item->messages || count($item->calls))
                          <li data-id="#t-{{$item->id}}-messages">История переписки </li>
                          @endif
                          <li data-id="#t-{{$item->id}}-info"  class="active">Информация о клиенте</li>
                          @if($item->ga_client_id)
                            <li data-id="#t-{{$item->id}}-ga">Google Analitics</li>
                          @endif
                        </ul>
                        @endif
                        --}}
                    </div>
                    <div class="tabs-content">
                        {{--@if(Auth::user()->id != 273)--}}
                        <div class="tabs-item status-tab active" id="t-{{$item->id}}-status" style="background:#fff;padding:20px;">
                            <div class="status-div">
                                @php
                                    $statusLog = $item->statusLog();
                                @endphp
                                @if($statusLog && count($statusLog))
                                    @foreach($statusLog as $statusItem)
                                        <span>{{date('d.m.Y H:i:s', strtotime($statusItem->created_at))}} - <b>{{$statusItem->new_status->name}}</b></span>
                                        @if($statusItem->user)
                                            <br>
                                            {{$statusItem->user->name}}
                                        @endif
                                        <br>
                                        {{$statusItem->comment}}
                                        <hr>
                                    @endforeach
                                    <span>{{date('d.m.Y H:i:s', strtotime($item->created_at))}} - <b>{{$statusItem->old_status->name}}</b></span><br>
                                @else
                                    <span>{{date('d.m.Y H:i:s', strtotime($item->created_at))}} - <b>{{$item->status->name}}</b></span>
                                @endif
                            </div>
                            <div class="status-div">
                                <form method="POST" action="/manager/leads/{{$item->id}}/change-status" class="lead-change-status-form">
                                    <input type="hidden" name="lead_id" value="{{$item->id}}"/>
                                    <input type="hidden" name="old_status_id" value="{{$item->status->id}}"/>
                                    <div class="field-container">
                                        <div class="input-block">
                                            <label>Статус</label>
                                            <select class="w540 lead_status_id" name="new_status_id" data-old_status_id="{{$item->status->id}}">
                                                @foreach($item->availableStatuses() as $statusId => $statusName)
                                                    <option value="{{$statusId}}" @if($statusId == $item->status->id) selected @endif>{{$statusName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field-container comment-container" @if($item->status_id == 7) style="display: none" @endif>
                                        <div class="input-block">
                                            <label>Комментарий</label>
                                            <textarea name="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="field-container call-me-block" @if($item->status->id != 6) style="display:none;" @endif>
                                        <div class="info-block">
                                            <label class="radio-label @if($item->call_me_datetime) checked @endif"><input type="checkbox" name="call_me" @if($item->call_me_datetime) checked @endif>Напомнить мне связаться с лидом</label>
                                        </div><br>
                                        <div class="input-block  dt" @if(!$item->call_me_datetime) style="display:none;" @endif>
                                            <label>Выберите дату и время</label>
                                            <input type="text" name="call_me_datetime" class="datetime-input" placeholder="дата и время" style="width:540px;" value="{{ $item->call_me_datetime ? date('d.m.Y H:i', strtotime($item->call_me_datetime)) : '' }}"/>
                                        </div>
                                    </div>
                                    <div class="field-container lead-off-reason fd-column" @if($item->status_id != 7) style="display: none" @endif>
                                        @php
                                            if(!$item->rejection_id){
                                                $item->rejection_id = 1;
                                            }
                                        @endphp
                                        <div class="input-block">
                                            <label>Тип</label>
                                            <select class="w540 rejection_id" name="rejection_id">
                                                @foreach($rejections as $rejection)
                                                    <option value="{{$rejection->id}}" @if($item->rejection_id == $rejection->id) selected @endif>{{$rejection->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-block" style="width:400px;">
                                            <label>причина</label>
                                            @foreach($rejections_reasons as $reason)
                                                <label class="radio-label @if($reason->id == $item->rejection_reason_id) checked @endif"
                                                       @if($reason->rejection_id != $item->rejection_id) style="display: none" @endif
                                                       data-rejection_id="{{$reason->rejection_id}}">
                                                    <input type="radio"
                                                           name="rejection_reason_id"
                                                           @if($reason->id == $item->rejection_reason_id) checked @endif
                                                           value="{{$reason->id}}">
                                                    {{$reason->name}}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="align-right">
                                        <button class="submit" disabled>Изменить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tabs-item" id="t-{{$item->id}}-selections">

                            @if(@count($item->selections))
                                <div class="leads-selections">
                                    <div class="selection-item selection-head">
                                        <div class="selection-col">id</div>
                                        <div class="selection-col">Дата создания</div>
                                        <div class="selection-col">Менеджер</div>
                                        <div class="selection-col">Количество плоскостей</div>
                                    </div>
                                    @foreach($item->selections as $k => $v)
                                        <a href="/manager/selection/{{$v->id}}" class="ajax-popup-link">
                                            <div class="selection-item pointer">
                                                <div class="selection-col">{{ $v->id }}</div>
                                                <div class="selection-col">{{ $v->created_at }}</div>
                                                <div class="selection-col">{{ $v->manager->name }}</div>
                                                <div class="selection-col" id="selection_count_{{$v->id}}">{{ $v->boards_count }}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="action-line">


                                </div>
                                <!--
            <div class="to-client">
              <a class="to-client-action" href="/manager/leads/lead2client/{{ $item->id }}">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                </svg>
                Перевести в клиенты
              </a>
            </div>
            -->
                            @else
                                <div class="no-selection">
                                    <svg width="44" height="54" viewBox="0 0 44 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.13864 2.13864C3.42795 0.849328 5.17664 0.125 7 0.125H29.0266L43.875 14.9733V47C43.875 48.8234 43.1507 50.572 41.8614 51.8614C40.572 53.1507 38.8234 53.875 37 53.875H7C5.17664 53.875 3.42795 53.1507 2.13864 51.8614C0.849328 50.572 0.125 48.8234 0.125 47V7C0.125 5.17664 0.849328 3.42795 2.13864 2.13864ZM7 3.875C6.1712 3.875 5.37634 4.20424 4.79029 4.79029C4.20424 5.37634 3.875 6.1712 3.875 7V47C3.875 47.8288 4.20424 48.6237 4.79029 49.2097C5.37634 49.7958 6.1712 50.125 7 50.125H37C37.8288 50.125 38.6237 49.7958 39.2097 49.2097C39.7958 48.6237 40.125 47.8288 40.125 47V18.875H25.125V3.875H7ZM28.875 5.27665L38.7234 15.125H28.875V5.27665ZM32 27.625H12V31.375H32V27.625ZM12 37.625H32V41.375H12V37.625ZM17 17.625H12V21.375H17V17.625Z" fill="#3D445C"/>
                                    </svg>
                                    <span class="no-data-title">У этого лида нет подборок</span>
                                    <span>Создайте новую подборку с помощью ссылки ниже</span>
                                    <div class="no-selection-action">

                                    </div>
                                </div>
                            @endif
                        </div><!-- /selection -->
                        {{--@endif--}}
                        <div class="tabs-item message-tab" id="t-{{$item->id}}-messages">
                            <div class="messages-container">
                                <div class="messages-tab">
                                    <span class="pointer active tab-selector" data-type="message">Сообщения</span>
                                    <span class="pointer tab-selector" data-type="calls">Звонки</span>
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
                                                        <img class="al-power-tip2" src="/assets/img/{{ $call->call_type == '1' ? 'outcall' : 'incall' }}{{ in_array($call->disposition,['BUSY','NOANSWER','CANCEL','CONGESTION','CHANUNAVAIL','VM','VM-SUCCESS']) ? '_bad' : '' }}.svg" title="{{ $call->call_type == '1' ? 'Исходящий' : 'Входящий' }} {{ in_array($call->disposition,['BUSY','NOANSWER','CANCEL','CONGESTION','CHANUNAVAIL','VM','VM-SUCCESS']) ? 'неуспешный' : 'успешный' }} звонок"/>
                                                        {{--
                                                        @if($call->disposition  == 'ANSWER')

                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M19.1667 0.833008L14.5833 5.41634L12.5 3.33301" stroke="#4FB14B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                                          <path d="M18.3351 14.1004V16.6004C18.3361 16.8325 18.2886 17.0622 18.1956 17.2749C18.1026 17.4875 17.9662 17.6784 17.7952 17.8353C17.6242 17.9922 17.4223 18.1116 17.2024 18.186C16.9826 18.2603 16.7496 18.288 16.5185 18.2671C13.9542 17.9884 11.491 17.1122 9.32682 15.7087C7.31334 14.4293 5.60626 12.7222 4.32682 10.7087C2.91846 8.53474 2.04202 6.05957 1.76848 3.48374C1.74766 3.2533 1.77505 3.02104 1.8489 2.80176C1.92275 2.58248 2.04146 2.38098 2.19745 2.21009C2.35345 2.0392 2.54332 1.90266 2.75498 1.80917C2.96663 1.71569 3.19543 1.66729 3.42682 1.66707H5.92682C6.33124 1.66309 6.72331 1.80631 7.02995 2.07002C7.33659 2.33373 7.53688 2.69995 7.59348 3.10041C7.699 3.90046 7.89469 4.68601 8.17682 5.44207C8.28894 5.74034 8.3132 6.0645 8.24674 6.37614C8.18027 6.68778 8.02587 6.97383 7.80182 7.20041L6.74348 8.25874C7.92978 10.345 9.65719 12.0724 11.7435 13.2587L12.8018 12.2004C13.0284 11.9764 13.3144 11.8219 13.6261 11.7555C13.9377 11.689 14.2619 11.7133 14.5601 11.8254C15.3162 12.1075 16.1018 12.3032 16.9018 12.4087C17.3066 12.4658 17.6763 12.6697 17.9406 12.9817C18.2049 13.2936 18.3453 13.6917 18.3351 14.1004Z" stroke="#4FB14B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        @else
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M19.168 0.833008L14.168 5.83301" stroke="#FC0808" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                                          <path d="M14.168 0.833008L19.168 5.83301" stroke="#FC0808" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                                          <path d="M18.3351 14.1004V16.6004C18.3361 16.8325 18.2886 17.0622 18.1956 17.2749C18.1026 17.4875 17.9662 17.6784 17.7952 17.8353C17.6242 17.9922 17.4223 18.1116 17.2024 18.186C16.9826 18.2603 16.7496 18.288 16.5185 18.2671C13.9542 17.9884 11.491 17.1122 9.32682 15.7087C7.31334 14.4293 5.60626 12.7222 4.32682 10.7087C2.91846 8.53474 2.04202 6.05957 1.76848 3.48374C1.74766 3.2533 1.77505 3.02104 1.8489 2.80176C1.92275 2.58248 2.04146 2.38098 2.19745 2.21009C2.35345 2.0392 2.54332 1.90266 2.75498 1.80917C2.96663 1.71569 3.19543 1.66729 3.42682 1.66707H5.92682C6.33124 1.66309 6.72331 1.80631 7.02995 2.07002C7.33659 2.33373 7.53688 2.69995 7.59348 3.10041C7.699 3.90046 7.89469 4.68601 8.17682 5.44207C8.28894 5.74034 8.3132 6.0645 8.24674 6.37614C8.18027 6.68778 8.02587 6.97383 7.80182 7.20041L6.74348 8.25874C7.92978 10.345 9.65719 12.0724 11.7435 13.2587L12.8018 12.2004C13.0284 11.9764 13.3144 11.8219 13.6261 11.7555C13.9377 11.689 14.2619 11.7133 14.5601 11.8254C15.3162 12.1075 16.1018 12.3032 16.9018 12.4087C17.3066 12.4658 17.6763 12.6697 17.9406 12.9817C18.2049 13.2936 18.3453 13.6917 18.3351 14.1004Z" stroke="#FC0808" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        @endif
                                                        --}}
                                                    </div>
                                                    <div class="user-info">
                                                        <!--<span class="manager-name">{{$call->user->name}}</span><br>-->
                                                        <span class="call-date">{{date('d.m.Y H:i:s', strtotime($call->created_at))}}</span>
                                                    </div>
                                                    <div class="phone">
                                                        {{$call->phone}}
                                                    </div>
                                                    <div>
                                                        @php
                                                            $callDetails = $call->getCallData();
                                                        @endphp
                                                        @if($callDetails)
                                                            @foreach($callDetails->historyData as $key => $info)
                                                                <div style="display:flex; margin-bottom: 15px;">
                                                                    <div class="billsec">
                                                                        Ожидание: <b>{{$info->waitsec}}</b> c.<br>
                                                                        Продолжительность: <b>{{$info->billsec}}</b> с.
                                                                    </div>
                                                                    <div class="link2file" style="min-width:250px;">
                                                                        @if($call->link && $info->disposition == 'ANSWER')
                                                                            <a class="binotel-get-call" data-call_id="{{$call->binotel_id}}">Аудиозапись</a>
                                                                        @else
                                                                            @if($call->link)
                                                                                <img src="/images/redirect.png"/>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                    <div style="padding-left: 10px;">
                                                                        @if($info->employeeData->name && $info->employeeData->name != null)
                                                                            {{$info->employeeData->name}}
                                                                        @else
                                                                            {{--$item->user->name--}}
                                                                            {{ $call->user->name }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div style="display:flex">
                                                                <div class="billsec">
                                                                    Ожидание: <b>{{$call->waitsec}}</b> c.<br>
                                                                    Продолжительность: <b>{{$call->billsec}}</b> с.
                                                                </div>
                                                                <div class="link2file">
                                                                    @if($call->link)
                                                                        <a class="binotel-get-call" data-call_id="{{$call->binotel_id}}">Аудиозапись</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach

                                        @endif
                                    </div>

                                </div>
                            </div>
                            {{--
                            @if(Auth::user()->id != 273)
                            <div class="action-line">
                              <a class="to-client-action" href="/manager/leads/lead2client/{{ $item->id }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Перевести в клиенты
                              </a>
                              @if(!$item->user_id)
                              <a class="to-client-action ml20" href="/accept-lead/{{ $item->id }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Принять лида
                              </a>
                              @endif
                            </div>
                            @endif
                            --}}
                        </div>

                        <div class="tabs-item message-tab {{--@if(Auth::user()->id == 273) active @endif--}}" id="t-{{$item->id}}-info">
                            <div class="info-table">
                                <div class="info-tr">
                                    <div class="info-td">Страница диалога</div>
                                    <div class="info-td">
                                        <a href="{{$item->info->page->url}}" target="_blank">{{$item->info->page->url}}</a>
                                    </div>
                                </div>
                                <div class="info-tr">
                                    <div class="info-td">utm</div>
                                    <div class="info-td">{{urldecode($item->info->utm)}}</div>
                                </div>
                                <div class="info-tr">
                                    <div class="info-td">Местоположение</div>
                                    <div class="info-td">
                                        {{$item->info->location}}
                                        @if($item->info->map->lat)
                                            &nbsp;<a href="https://www.google.com/maps/search/?api=1&query={{$item->info->map->lat}},{{$item->info->map->lng}}" target="_blank">(на карте)</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="info-tr">
                                    <div class="info-td">Организация (провайдер)</div>
                                    <div class="info-td">{{$item->info->isp}}</div>
                                </div>
                                <div class="info-tr">
                                    <div class="info-td">IP адрес</div>
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
                            {{--
                            @if(Auth::user()->id == 273)
                              <a class="change-manager-action" href="/manager/leads/{{ $item->id }}/change-manager">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Изменить меннеджера
                              </a>
                            @endif
                            --}}
                        @endif

                        <div class="lead-actions-container">
                            <a class="to-client-action add-form-basket" data-lead-id="{{ $item->id }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z" fill="#FC6B40"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54199 10C3.54199 9.65482 3.82181 9.375 4.16699 9.375H15.8337C16.1788 9.375 16.4587 9.65482 16.4587 10C16.4587 10.3452 16.1788 10.625 15.8337 10.625H4.16699C3.82181 10.625 3.54199 10.3452 3.54199 10Z" fill="#FC6B40"/>
                                </svg>
                                Добавить из корзины
                            </a>
                            <a class="to-client-action add-form-file" data-lead_id="{{ $item->id }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z" fill="#FC6B40"/>
                                </svg>
                                Добавить из excel
                            </a>
                            <a class="to-client-action add-form-file-outdoor" data-lead_id="{{$item->id}}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z" fill="#FC6B40"/>
                                </svg>
                                Добавить из excel outdoor
                            </a>
                            <a class="to-client-action" href="/manager/leads/lead2client/{{ $item->id }}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Перевести в клиенты
                            </a>
                            @if(!$item->user_id)
                                <a class="to-client-action ml20" href="/accept-lead/{{ $item->id }}">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                    </svg>
                                    Принять лида
                                </a>
                            @endif

                            <a class="change-manager-action" href="/manager/leads/{{ $item->id }}/change-manager">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Изменить меннеджера
                            </a>


                            <a class="change-type-action" href="/manager/leads/{{ $item->id }}/merge">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Объединить
                            </a>
                            <a class="change-type-action" href="/manager/leads/{{ $item->id }}/change-type">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Перевести в собственники
                            </a>
                            <a class="change-type-action" href="/manager/leads/{{ $item->id }}/change-type-client">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1904 9.70236C11.604 9.70236 12.7499 8.55642 12.7499 7.14284C12.7499 5.72925 11.604 4.58331 10.1904 4.58331C8.7768 4.58331 7.63086 5.72925 7.63086 7.14284C7.63086 8.55642 8.7768 9.70236 10.1904 9.70236ZM10.1904 10.9524C12.2943 10.9524 13.9999 9.24678 13.9999 7.14284C13.9999 5.0389 12.2943 3.33331 10.1904 3.33331C8.08644 3.33331 6.38086 5.0389 6.38086 7.14284C6.38086 9.24678 8.08644 10.9524 10.1904 10.9524Z" fill="#FC6B40"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.21033 14.625C6.44963 14.625 4.8101 15.5216 3.86001 17.0039L2.80762 16.3294C3.98754 14.4884 6.02369 13.375 8.21033 13.375H11.987C14.0351 13.375 15.9715 14.309 17.2465 15.912L17.5372 16.2776L16.559 17.0557L16.2682 16.6901C15.2304 15.3853 13.6542 14.625 11.987 14.625H8.21033Z" fill="#FC6B40"/>
                                </svg>
                                Перевести контакт в существующего клиента
                            </a>
                            @if(Auth::user()->role_id == 1)
                                <a class="visibility-change pointer" data-visibility="{{$item->visible}}" data-id="{{$item->id}}" id="v-{{$item->id}}">
                                    @if($item->visible)
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_15_1120)">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.84467 0.758824C1.13756 0.465931 1.61244 0.465931 1.90533 0.758824L23.9053 22.7588C24.1982 23.0517 24.1982 23.5266 23.9053 23.8195C23.6124 24.1124 23.1376 24.1124 22.8447 23.8195L0.84467 1.81948C0.551777 1.52659 0.551777 1.05172 0.84467 0.758824Z" fill="#FC6B40"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4459 5.25941C11.0777 5.11154 11.7244 5.03762 12.3732 5.03915L12.375 5.03915C15.5754 5.03915 18.1409 6.86932 19.9528 8.8021C20.852 9.7612 21.5437 10.7232 22.0106 11.446C22.2338 11.7916 22.4045 12.0809 22.5208 12.2866C21.9798 13.2459 21.3506 14.1531 20.6411 14.9963C20.3744 15.3132 20.4152 15.7863 20.7321 16.053C21.0491 16.3197 21.5222 16.279 21.7889 15.962C22.6515 14.9368 23.4048 13.8244 24.0364 12.6427C24.1511 12.4282 24.1546 12.1713 24.0458 11.9537L23.6435 12.1549L23.6435 12.1549C24.0458 11.9537 24.0457 11.9534 24.0455 11.9532L24.0452 11.9525L24.0442 11.9504L24.041 11.9442L24.0303 11.9233C24.0212 11.9056 24.0082 11.8805 23.9913 11.8485C23.9574 11.7846 23.908 11.693 23.8431 11.5777C23.7135 11.3473 23.5221 11.0215 23.2707 10.6323C22.7688 9.85513 22.023 8.8171 21.0472 7.77619C19.1093 5.70914 16.1751 3.53948 12.3759 3.53915C11.6111 3.53742 10.8487 3.62458 10.1041 3.79889C9.70075 3.89329 9.45033 4.29677 9.54474 4.70008C9.63914 5.1034 10.0426 5.35381 10.4459 5.25941ZM12.3759 3.53915L12.375 3.53915V4.28915L12.3768 3.53915L12.3759 3.53915ZM22.5227 12.2832C22.5221 12.2844 22.5215 12.2855 22.5208 12.2866L22.5238 12.2918L22.5227 12.2832ZM6.89018 6.94523C7.21938 6.69385 7.28247 6.22318 7.03108 5.89397C6.7797 5.56477 6.30903 5.50168 5.97982 5.75307C3.80397 7.41458 2.00859 9.52219 0.714133 11.9345C0.598908 12.1493 0.595196 12.4066 0.70418 12.6246L1.375 12.2891C0.70418 12.6246 0.70431 12.6248 0.704455 12.6251L0.704823 12.6258L0.705837 12.6279L0.708974 12.6341L0.719676 12.655C0.728774 12.6727 0.7418 12.6978 0.758723 12.7298C0.792564 12.7937 0.842023 12.8853 0.906865 13.0006C1.03649 13.231 1.22793 13.5568 1.47935 13.946C1.98124 14.7232 2.727 15.7612 3.70285 16.8021C5.64086 18.8693 8.57537 21.0391 12.375 21.0391V21.0392L12.3873 21.039C14.6964 21.0013 16.9329 20.2257 18.7697 18.8256C19.0991 18.5745 19.1626 18.1039 18.9115 17.7745C18.6604 17.4451 18.1898 17.3816 17.8603 17.6327C16.2799 18.8374 14.3557 19.5054 12.3689 19.5391C9.17136 19.5368 6.60798 17.7077 4.79715 15.7762C3.898 14.8171 3.20626 13.8551 2.7394 13.1323C2.51645 12.787 2.3459 12.4981 2.22957 12.2924C3.4057 10.215 4.99067 8.39572 6.89018 6.94523ZM10.7663 10.7179C11.0693 10.4355 11.0861 9.9609 10.8037 9.65786C10.5213 9.35481 10.0468 9.33806 9.74371 9.62044C9.37527 9.96375 9.07976 10.3778 8.8748 10.8377C8.66984 11.2977 8.55963 11.7943 8.55075 12.2978C8.54187 12.8013 8.63449 13.3015 8.82309 13.7684C9.0117 14.2354 9.29242 14.6595 9.64852 15.0156C10.0046 15.3717 10.4288 15.6524 10.8957 15.8411C11.3627 16.0297 11.8628 16.1223 12.3663 16.1134C12.8698 16.1045 13.3664 15.9943 13.8264 15.7893C14.2864 15.5844 14.7004 15.2889 15.0437 14.9204C15.3261 14.6174 15.3093 14.1428 15.0063 13.8604C14.7032 13.5781 14.2287 13.5948 13.9463 13.8979C13.7403 14.1189 13.4919 14.2962 13.2159 14.4192C12.9399 14.5422 12.642 14.6083 12.3399 14.6136C12.0378 14.619 11.7377 14.5634 11.4575 14.4502C11.1773 14.3371 10.9228 14.1686 10.7092 13.955C10.4955 13.7413 10.3271 13.4868 10.2139 13.2066C10.1008 12.9265 10.0452 12.6264 10.0505 12.3243C10.0558 12.0222 10.122 11.7242 10.2449 11.4482C10.3679 11.1722 10.5452 10.9238 10.7663 10.7179Z" fill="#FC6B40"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_15_1120">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    @else
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.85273 12C1.9691 12.2059 2.14027 12.4961 2.3644 12.8431C2.83126 13.566 3.523 14.5279 4.42215 15.487C6.23414 17.4198 8.79963 19.25 12 19.25C15.2004 19.25 17.7659 17.4198 19.5778 15.487C20.477 14.5279 21.1687 13.566 21.6356 12.8431C21.8597 12.4961 22.0309 12.2059 22.1473 12C22.0309 11.7941 21.8597 11.5039 21.6356 11.1569C21.1687 10.434 20.477 9.47205 19.5778 8.51296C17.7659 6.58017 15.2004 4.75 12 4.75C8.79963 4.75 6.23414 6.58017 4.42215 8.51296C3.523 9.47205 2.83126 10.434 2.3644 11.1569C2.14027 11.5039 1.9691 11.7941 1.85273 12ZM23 12C23.6708 11.6646 23.6707 11.6643 23.6705 11.664L23.6702 11.6633L23.6692 11.6613L23.666 11.6551L23.6553 11.6341C23.6462 11.6164 23.6332 11.5913 23.6163 11.5594C23.5824 11.4954 23.533 11.4038 23.4681 11.2886C23.3385 11.0581 23.1471 10.7324 22.8957 10.3431C22.3938 9.56598 21.648 8.52795 20.6722 7.48704C18.7341 5.41983 15.7996 3.25 12 3.25C8.20037 3.25 5.26586 5.41983 3.32785 7.48704C2.352 8.52795 1.60624 9.56598 1.10435 10.3431C0.852934 10.7324 0.661492 11.0581 0.531865 11.2886C0.467023 11.4038 0.417564 11.4954 0.383723 11.5594C0.3668 11.5913 0.353774 11.6164 0.344675 11.6341L0.333974 11.6551L0.330837 11.6613L0.329823 11.6633L0.329455 11.664C0.32931 11.6643 0.32918 11.6646 1 12L0.32918 11.6646C0.223607 11.8757 0.223607 12.1243 0.32918 12.3354L1 12C0.32918 12.3354 0.32931 12.3357 0.329455 12.336L0.329823 12.3367L0.330837 12.3387L0.333974 12.3449L0.344675 12.3659C0.353774 12.3836 0.3668 12.4087 0.383723 12.4406C0.417564 12.5046 0.467023 12.5962 0.531865 12.7114C0.661492 12.9419 0.852934 13.2676 1.10435 13.6569C1.60624 14.434 2.352 15.4721 3.32785 16.513C5.26586 18.5802 8.20037 20.75 12 20.75C15.7996 20.75 18.7341 18.5802 20.6722 16.513C21.648 15.4721 22.3938 14.434 22.8957 13.6569C23.1471 13.2676 23.3385 12.9419 23.4681 12.7114C23.533 12.5962 23.5824 12.5046 23.6163 12.4406C23.6332 12.4087 23.6462 12.3836 23.6553 12.3659L23.666 12.3449L23.6692 12.3387L23.6702 12.3367L23.6705 12.336C23.6707 12.3357 23.6708 12.3354 23 12ZM23 12L23.6708 12.3354C23.7764 12.1243 23.7764 11.8757 23.6708 11.6646L23 12Z" fill="#FC6B40"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9.75C10.7574 9.75 9.75 10.7574 9.75 12C9.75 13.2426 10.7574 14.25 12 14.25C13.2426 14.25 14.25 13.2426 14.25 12C14.25 10.7574 13.2426 9.75 12 9.75ZM8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12Z" fill="#FC6B40"/>
                                        </svg>
                                    @endif
                                </a>
                            @endif
                        </div>

                    </div>

                </div>

            </div>
        @endif
    </div>
@endforeach
<style type="text/css">
    .binotel-info{
        flex:0.6;
    }
    .o-4{
        opacity: 0.4;
    }
</style>