@foreach($contracts as $contract)
    <div class="data-tr-global data-contract-item @if($new) new @endif" id="contract-row-{{$contract->id}}">
        <div class="data-tr tr-action pointer">
            <div class="data-td td-name">
        <span class="up-down">
          <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg"
               class="info-arrow">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z"
                  fill="#3D445C"/>
          </svg>
        </span>
                <span class="contract_title" id="title-{{$contract->id}}">
          @lang('message.contract') №{{$contract->number}} {{$contract->our_company_name_short}} - {{$contract->company_name_short}}
        </span>
            </div>
            <div class="data-td" id="date-{{$contract->id}}">
                {{-- date('d.m.Y', strtotime($contract->created_at)) --}}
                {{ $contract->day.".".$contract->month.".".$contract->year }}
            </div>
            <div class="data-td
                @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                    status-changer
                @endif
                    f2" data-type="contract" data-id="{{$contract->id}}" data-status="{{$contract->status_id}}">
                @if($contract->status_id)
                    <span class="status-info"
                          style="background: {{$contract->status->background}}; color: {{$contract->status->color}};">&bull; {{ $contract->status->getTranslatedAttribute('name', App::getLocale(), 'ru') }} {{$contract->status->id == 3 ? $contract->status->contractSentBy($contract->id) : '' }}</span>
                @endif
            </div>

            <div class="data-td action-col">

                <div class="data-td action-col">
                    <a class="download pointer contract-files-dwn" {{--href="{{ $contract->file }}" download--}}>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2.8125 11.25V14.25C2.8125 14.4986 2.91127 14.7371 3.08709 14.9129C3.2629 15.0887 3.50136 15.1875 3.75 15.1875H14.25C14.4986 15.1875 14.7371 15.0887 14.9129 14.9129C15.0887 14.7371 15.1875 14.4986 15.1875 14.25V11.25H16.3125V14.25C16.3125 14.797 16.0952 15.3216 15.7084 15.7084C15.3216 16.0952 14.797 16.3125 14.25 16.3125H3.75C3.20299 16.3125 2.67839 16.0952 2.29159 15.7084C1.9048 15.3216 1.6875 14.797 1.6875 14.25V11.25H2.8125Z"
                                  fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M4.85156 7.89779L5.64706 7.10229L8.99931 10.4545L12.3516 7.10229L13.1471 7.89779L8.99931 12.0455L4.85156 7.89779Z"
                                  fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5625 2.25V11.25H8.4375V2.25H9.5625Z"
                                  fill="#FC6B40"/>
                        </svg>
                    </a>
                    @if($contract->can_edit_number && Auth::user()->id != 263)
                        <a class="pointer edit-contract-number-link action-right-button mr10"
                           data-link="{{ route('contract.edit-number', ['id' => $contract->client_id, 'contract_id' => $contract->id ])}}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                                      stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    @endif
                    @if(Auth::user()->canDeleteContracts())
                        @if($contract->can_delete)
                            <a class="contract-delete pointer del_" data-contract_id="{{$contract->id}}"
                               data-client_id="{{$contract->client_id}}">
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
                            </a>
                        @else
                            <a class="contract-delete--- action-disabled del_">
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
                            </a>
                        @endif
                    @endif
                    <div class="contract-dwn hide">
                        @if(Auth::user()->role_id == 1 && $contract->file_id)
                            <a class="pointer edit-contract" data-id="{{$contract->file_id}}"
                               data-title="Договiр №{{$contract->number}} {{$contract->our_company_name_short}} - {{$contract->company_name_short}}">@lang('message.edit_file')</a>
                            {{--<a class="pointer view-contract-" data-id="{{$contract->file_id}}" data-title="Договiр №{{$contract->number}} {{$contract->our_company_name_short}} - {{$contract->company_name_short}}" href="https://drive.google.com/file/d/{{$contract->file_id}}/view" target="_blank">@lang('message.view')</a>
                            <a class="pointer view-contract" data-id="{{$contract->file_id}}" data-title="Договiр №{{$contract->number}} {{$contract->our_company_name_short}} - {{$contract->company_name_short}}">@lang('message.view') (iframe)</a>--}}
                        @endif
                        @if(Auth::user()->role_id == 2 && $contract->file_id)
                            <a class="pointer view-contract"
                               href="https://drive.google.com/file/d/{{$contract->file_id}}/view"
                               target="_blank">@lang('message.view')</a>
                        @endif

                        <a class="pointer add-multiple-control-layout" data-applications='@json($contract->acts_data)'>@lang('message.control_layout')</a>

                        <a href="{{ $contract->file_id ? route('contract.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'file_id' => $contract->file_id]) : $contract->file }}"
                           class="docx_download"
                           download>@lang('message.download_contract')</a>
                        <a href="{{ $contract->file_id ? route('contract.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'file_id' => $contract->file_id]) : $contract->file }}?pdf=true"
                           class="pdf_download"
                           download>@lang('message.download_contract') (PDF)</a>
                        @if(Auth::user()->role_id != 5)
                            <a href="/manager/clients/{{$contract->client_id}}/contract/{{$contract->id}}/get-all-data"
                               download>@lang('message.download_all')</a>
                        @endif
                    </div>
                </div>

                <div class="data-td action-col" style="left: 4%">
                    <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/contractLogs"
                       class="ajax-popup-link" id="act-view-{{$act->id}}" style="position: absolute;">
                        <div>
                            <svg width="24" height="24" viewBox="0 0 24 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2H22V16H5.17L2 19.17V2ZM20 4H4V14L5.17 12.83H20V4Z" fill="#FF7F00"/>
                            </svg>
                            <span style="position: absolute; top: -10px; right: -10px; background-color: #FF7F00; color: white; border-radius: 50%; padding: 2px 5px; font-size: 12px;">
                            {{$contract->notes->count()}}
                        </span>
                        </div>
                    </a>
                </div>

                <div class="data-td action-col">
                    <a class="download pointer contract-files-dwn">
                        <svg width="18" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="for-js">
                            <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                                  fill="#3D445C" class="for-js"/>
                        </svg>
                    </a>
                    <div class="contract-dwn hide">
                        <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/contractLogs?logsFirst=true"
                           class="ajax-popup-link" id="act-view-{{$act->id}}">@lang('message.status_logs')</a>

                        <a class="pointer photoreport-add-link" data-contract-id="{{ $contract->id }}">
                            @lang('message.create_photoreport')
                        </a>

                        @if(in_array($currentUser->id, [1, 202, 248, 263]))
                            <a class="pointer update-contract-file"
                               data-id="{{$contract->id}}">@lang('message.update_contract_file')</a>
                        @endif
                    </div>
                </div>

            </div>

        </div>
        <div class="data-td-application hide" id="application-{{$contract->id}}">
            @if(count($contract->acts_data))
                <div class="data-table acts-list" id="acts-list-{{$contract->id}}">
                    <div class="data-thead">
                        <div class="data-tr">
                            <div class="data-td td-number">№</div>
                            <div class="data-td">@lang('message.application_date')</div>
                            <div class="data-td">@lang('message.period')</div>
                            <div class="data-td">@lang('message.city')</div>
                            <div class="data-td">@lang('message.sum')</div>
                            <div class="data-td">@lang('message.status_lc')</div>
                            <div class="data-td action-col"></div>

                        </div>
                    </div>
                    <div class="data-tbody" id="contract-acts-{{$contract->id}}">
                        @foreach($contract->acts_data as $act)
                            @include('front.crm.clients.contracts.app_row')
                        @endforeach
                    </div>
                </div>
            @endif
            @if(Auth::user()->role_id != 5)
                {{--@if(!in_array($contract->our_detail_id, [1,2,6]) || in_array($contract->client_id,[1035, 1073, 656, 1006, 1099, 37, 1230, 1229]) || in_array($contract->id, [836, 1475, 1790]))--}}
                <a class="add-act-new pointer" data-contract_id="{{$contract->id}}"
                   data-client_id="{{$contract->client_id}}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z"
                              fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z"
                              fill="#FC6B40"/>
                    </svg>
                    @lang('message.add_application')
                </a>
                {{--@endif--}}
            @endif
        </div>
    </div>
@endforeach