<div class="data-tr act-tr pointer" id="act-item-{{$act->id}}">
    <div class="data-td td-number">
        @lang('message.application') №{{$act->number}}
    </div>
    <div class="data-td">
        {{ date('d.m.Y', strtotime($act->date)) }}
    </div>
    <div class="data-td">
        @if($act->months_list)
            @foreach(json_decode($act->months_list) as $month)
                {{$month}},
            @endforeach
        @endif
    </div>
    <div class="data-td">
        {!! $act->cities_list !!}
    </div>
    <div class="data-td">
        {{ $act->sum_nds ? $act->sum_nds : $act->sum }} грн.
    </div>
    <div class="data-td  @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                            status-changer
                         @endif"
         id="act_status-{{$act->id}}" data-type="application" data-client_id="{{$contract->client_id}}" data-id="{{$act->id}}" data-status="{{$act->status_id}}">
        @if($act->status_id)
            <span class="status-info" style="background: {{$act->status->background}}; color: {{$act->status->color}};">&bull; {{ $act->status->name }}</span>
        @endif
    </div>

    <div class="data-td action-col align-right">
        <div class="sub-action hide" id="sub-action-{{$contract->client_id}}-{{$contract->id}}-{{$act->id}}">

            @if($act->can_delete && Auth::user()->id != 263)
                <a class="pointer edit-act-date" data-client_id="{{$contract->client_id}}"
                   data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-date="{{$act->date}}"
                   data-first_month_pay_date="{{ $act->first_month_pay_date }}"
                   data-number="{{$act->number}}">@lang('message.change_date')</a>
            @endif
                @if(Auth::user()->id != 263)
                    <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/actLogs"
                       class="ajax-popup-link" id="act-view-{{$act->id}}">@lang('message.status_logs')</a>
                @endif
            @if(Auth::user()->id != 263)
                <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/view"
                   class="ajax-popup-link" id="act-view-{{$act->id}}">@lang('message.edit')</a>
            @endif
            @if($act->file)

                @if(Auth::user()->role_id == 1 && $act->file_id)
                    @php
                        $file_name = str_replace(".docx", "", end(explode("/",$act->file)));
                    @endphp
                    <a class="pointer edit-contract" data-id="{{$act->file_id}}"
                       data-title="{{$file_name}}">@lang('message.edit_file')</a>
                    <a class="pointer view-contract" href="https://drive.google.com/file/d/{{$act->file_id}}/view"
                       target="_blank">@lang('message.view_file')</a>
                @endif
                @if(Auth::user()->role_id == 2 && $contract->file_id)
                    <a class="pointer view-contract" href="https://drive.google.com/file/d/{{$act->file_id}}/view"
                       target="_blank">@lang('message.view_file')</a>
                @endif

                <a href="{{$act->file_id ? route('act.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'act_id' => $act->id, 'file_id' => $act->file_id]) : $act->file}}"
                   download>@lang('message.download_application')</a>
                <a href="{{$act->file_id ? route('act.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'act_id' => $act->id, 'file_id' => $act->file_id]) : $act->file}}?pdf=true"
                   download>@lang('message.download_application') (PDF)</a>
                @if(Auth::user()->role_id != 5)
                    @if($act->month)
                        <a class="bill-acts-submenu pointer @if(!count($act->month)) hide @endif">
                            @lang('message.download_bill')
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967Z"
                                      fill="#8B8F9D"/>
                            </svg>
                        </a>
                        <div class="flex-position-fix month-list">
                            <div class="bills-month-list hide">
                                <ul>
                                    @foreach($act->month as $k => $month)
                                        <li data-date="{{$k}}" data-client_id="{{$contract->client_id}}"
                                            data-contract_id="{{$contract->id}}"
                                            data-act_id="{{$act->id}}">{{$month}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @if($act->can_delete)
                @if(Auth::user()->role_id != 5)
                    <a class="act-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}"
                       data-client_id="{{$contract->client_id}}"
                       href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/delete">@lang('message.delete_application')</a>
                @endif
            @endif
        </div>
    </div>
</div>