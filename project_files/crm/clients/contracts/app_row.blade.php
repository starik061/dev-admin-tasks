<div class="data-tr act-tr pointer @if($act->services_are_not_detailed) app-without-detailed-services @endif" id="act-item-{{$act->id}}">
    <div class="data-td td-number">
        @if($act->parent_id)
            @if($act->is_layout)
                @lang('message.control_layout') №{{$act->number}}
            @else
                @lang('message.additional_agreement') №{{$act->number}}
            @endif
        @else
            @lang('message.application') №{{$act->number}}
        @endif
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
        @if(!$act->is_layout)
            {!! $act->cities_list !!}
        @endif
    </div>
    <div class="data-td">
        @if(!$act->is_layout)
            {{ $act->sum_nds ? $act->sum_nds : $act->sum }} грн.
        @endif
    </div>
    <div class="data-td @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                            status-changer
                         @endif"
         id="act_status-{{$act->id}}" data-type="application" data-id="{{$act->id}}" data-status="{{$act->status_id}}">
        @if($act->status_id)
            <span class="status-info" style="background: {{$act->status->background}}; color: {{$act->status->color}};">&bull; {{ $act->status->getTranslatedAttribute('name', App::getLocale(), 'ru') }} {{$act->status->id == 3 ? $act->status->applicationSentBy($act->id) : '' }}</span>
        @endif
    </div>
    <div class="data-td action-col align-right">
        <a href="#" class="more-action">
            <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="for-js">
                <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                      fill="#3D445C" class="for-js"/>
            </svg>
        </a>
        <div class="sub-action hide" id="sub-action-{{$contract->client_id}}-{{$contract->id}}-{{$act->id}}">
            @if(!$act->parent_id && Auth::user()->role_id == 1 && false)
                <a class="add-addition-agreement-new pointer" data-contract_id="{{$contract->id}}"
                   data-client_id="{{$contract->client_id}}"
                   data-parent_id="{{$act->id}}">@lang('message.add_additional_agreement')</a>
            @endif

                <a class="pointer photoreport-add-link" data-contract-id="{{ $act->contract_id }}" data-act-id="{{ $act->id }}">
                    @lang('message.create_photoreport')
                </a>

            @if($act->can_delete && Auth::user()->id != 263 && !$act->is_layout)
                <a class="pointer edit-act-date" data-client_id="{{$contract->client_id}}"
                   data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-date="{{$act->date}}"
                   data-first_month_pay_date="{{ $act->first_month_pay_date }}"
                   data-number="{{$act->number}}">@lang('message.change_date')</a>
            @endif
            @if(!$act->parent_id /*&& Auth::user()->id != 263*/)
                <a class="add-control-layout-new pointer" data-contract_id="{{$contract->id}}"
                   data-client_id="{{$contract->client_id}}"
                   data-parent_id="{{$act->id}}"
                   data-months_list="{{$act->months_list}}"
                   data-act_number="{{$act->number}}"
                   data-date="{{date('d.m.Y', strtotime($act->date))}}"
                >@lang('message.control_layout')</a>

                <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/actLogs?logsFirst=true"
                   class="ajax-popup-link" id="act-view-{{$act->id}}">@lang('message.status_logs')</a>
            @endif
            @if(/*Auth::user()->id != 263 &&*/ !$act->is_layout)
                <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/view"
                   class="ajax-popup-link"
                   id="act-view-{{$act->id}}">{{ count($act->not_from_root_addition_agreement) ? __('message.view') : __('message.edit') }}</a>
            @endif
            @if($act->file)
                @if(in_array($currentUser->role_id, [1,5]) && $act->file_id)
                    @php
                        $file_name = str_replace(".docx", "", end(explode("/",$act->file)));
                    @endphp
                    @if(!count($act->not_from_root_addition_agreement))
                        <a class="pointer edit-contract" data-id="{{$act->file_id}}"
                           data-title="{{$file_name}}">@lang('message.edit_file')</a>
                    @endif
                    <a class="pointer view-contract" href="https://drive.google.com/file/d/{{$act->file_id}}/view"
                       target="_blank">@lang('message.view_file')</a>
                @endif
                @if(Auth::user()->role_id == 2 && $contract->file_id)
                    <a class="pointer view-contract" href="https://drive.google.com/file/d/{{$act->file_id}}/view"
                       target="_blank">@lang('message.view_file')</a>
                @endif

                @if($act->is_layout)
                    <a class="layout-image pointer" href="{{ asset('storage/' . $act->layout_image_path) }}">
                        @lang('message.check_image')
                    </a>
                @endif

                @if(!$act->is_layout)
                    <a href="{{$act->file_id ? route('act.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'act_id' => $act->id, 'file_id' => $act->file_id]) : $act->file}}"
                       download>@lang('message.download_application')</a>
                    <a href="{{$act->file_id ? route('act.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'act_id' => $act->id, 'file_id' => $act->file_id]) : $act->file}}?pdf=true"
                       download>@lang('message.download_application') (PDF)</a>
                @else
                    <a href="{{ asset('storage/' . $act->file) }}" download>
                        @lang('message.download')
                    </a>
                @endif
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
                                        <li data-date="{{$k}}" data-client_id="{{$client->id}}"
                                            data-contract_id="{{$contract->id}}"
                                            data-act_id="{{$act->id}}">{{$month}}</li>
                                    @endforeach
                                    {{--
                                      <li data-date="full-date" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">За весь період</li>
                                    --}}
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
            @if($act->getBillsCount() && in_array($currentUser->role_id, [1,5]))
            <a class="change-first-month-pay-date pointer"
               data-app_id="{{ $act->id }}"
               data-contract_id="{{ $act->contract_id }}"
               data-client_id="{{ $contract->client_id }}">
                @lang('message.chane_first_month_pay_date')
            </a>
            @endif
            @if(!$act->root_id && Auth::user()->role_id == 1 && !$act->is_layout && false)
                <a class="app-deactivate pointer"
                   data-act_id="{{ $act->id }}"
                   data-contract_id="{{ $act->contract_id }}"
                   data-client_id="{{ $contract->client_id }}"
                   data-last_paid_period="{{ $act->lastPaidPeriod() }}">
                    @lang('message.deactivate_application')
                </a>
            @endif

                @if($act->is_layout)
                    @if(Auth::user()->role_id != 5 || Auth::user()->id == 248)
                        <a class="act-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}"
                           data-client_id="{{$contract->client_id}}"
                           href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/delete">
                            @lang('message.delete_control_layout')
                        </a>
                    @endif
                @endif

            @if($act->can_delete && !$act->root_id && !$act->is_layout)
                @if(Auth::user()->role_id != 5 || Auth::user()->id == 248)
                    <a class="act-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}"
                       data-client_id="{{$contract->client_id}}"
                       href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/delete">
                        @if($act->parent_id)
                            @lang('message.delete_additional_agreement')
                        @else
                            @lang('message.delete_application')
                        @endif
                    </a>
                @endif
            @endif
        </div>
        <div class="data-td action-col" style="left: 18%">
            <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/actLogs"
               class="custom-ajax-popup-link" style="position: absolute; right: 67%;">
                <div style="position: relative;">
                    <svg width="24" height="24" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2H22V16H5.17L2 19.17V2ZM20 4H4V14L5.17 12.83H20V4Z" fill="#FF7F00"/>
                    </svg>
                    <span style="position: absolute; top: -10px; right: -10px; background-color: #FF7F00; color: white; border-radius: 50%; padding: 2px 5px; font-size: 12px;">
                    {{$act->notes->count()}}
                </span>
                </div>
            </a>
        </div>
    </div>

</div>
@if($act->addition_agreement && !@$ajax)
    <div class="addition-agreements">
        @foreach($act->addition_agreement as $act)
            @include('front.crm.clients.contracts.app_row')
        @endforeach
    </div>
@endif

@if($act->layouts && !@$ajax)
    <div class="addition-agreements">
        @foreach($act->layouts as $act)
            @include('front.crm.clients.contracts.layout_app_row')
        @endforeach
    </div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.addEventListener('click', function (event) {
            const clickedElement = event.target;

            const logsContainer = document.querySelector('.boards-table-tbody');

            // Клик на Информация
            if (clickedElement.classList.contains('custom-popup-info')) {
                let x = document.querySelector('.custom-popup-notes');
                x.classList.remove('active');
                clickedElement.classList.add('active');

                document.querySelector('.custom-notes-popup').classList.add('hide');
                document.querySelector('.info-popup').classList.remove('hide');

                // Клик на История
            } else if (clickedElement.classList.contains('custom-popup-notes')) {
                let y = document.querySelector('.custom-popup-info');
                y.classList.remove('active');
                clickedElement.classList.add('active');

                document.querySelector('.info-popup').classList.add('hide');
                document.querySelector('.custom-notes-popup').classList.remove('hide');
            }
        });
    });

</script>