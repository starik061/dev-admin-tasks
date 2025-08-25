@include('add.head')
<body>
@include('add.header')
@include('add.menu')

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base container-search-result manager-search mw1460">
                <form style="margin-top: 4%">

                    <div class="search-right-block">
                        <div class="field-container">
                            <div class="input-block">
                                <label>@lang('message.search')</label>
                                <input type="text" name="search" id="searchInput" value="{{$params['search']}}"
                                       placeholder="@lang('message.enter_value')"/>
                            </div>
                        </div>

                        <div class="input-block filter-btn-block" style="margin-left: 2%">
                            <a class="bk-filter-btn">
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M0.989754 1.01326C1.08192 0.814602 1.28101 0.6875 1.50001 0.6875H16.5C16.719 0.6875 16.9181 0.814602 17.0103 1.01326C17.1024 1.21191 17.0709 1.446 16.9295 1.61322L11.0625 8.55096V14.75C11.0625 14.945 10.9616 15.126 10.7957 15.2285C10.6299 15.331 10.4228 15.3403 10.2485 15.2531L7.24845 13.7531C7.05788 13.6578 6.93751 13.4631 6.93751 13.25V8.55096L1.0705 1.61322C0.929088 1.446 0.897583 1.21191 0.989754 1.01326ZM2.71237 1.8125L7.92952 7.98178C8.01539 8.08333 8.06251 8.21201 8.06251 8.345V12.9024L9.93751 13.8399V8.345C9.93751 8.21201 9.98463 8.08333 10.0705 7.98178L15.2877 1.8125H2.71237Z"
                                          fill="#FC6B40"/>
                                </svg>
                                @lang('message.filter')
                            </a>
                        </div>

                        <form id="searchForm" action="{{route('contracts.unsigned-documents-index', ['page' => 1])}}"
                              method="GET"
                              class="form-inline">
                            <input type="hidden" id="form_custom_start_date" name="custom_start_date"
                                   value="{{$params['customStartDate']}}"
                                   class="form-control">
                            <input type="hidden" id="form_custom_end_date" name="custom_end_date" class="form-control"
                                   value="{{$params['customEndDate']}}">

                            <div class="bk-filter-block" id="bk-filter-block">
                                <div class="bk-filter-header">
                                    <span>@lang('message.filter')</span>
                                    <span class="close">
                                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                                                  fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                                          </svg>
                                </span>
                                </div>
                                <div class="bk-filter-fields">
                                    <div class="field-container">
                                        <div class="input-block big-input-block">
                                            <label>@lang('message.document_type')</label>
                                            <select name="docType" class="manager-select" style="width: 100%">
                                                <option value="">-</option>
                                                @foreach($docsTypes as $docType)
                                                    <option value="{{$docType}}"
                                                            @if($docType == @$params['docType']) selected @endif>{{$docType}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block big-input-block">
                                            <label>@lang('message.manager')</label>
                                            <select name="manager" class="manager-select" style="width: 100%">
                                                <option value="">-</option>
                                                @foreach($managers as $manager)
                                                    <option value="{{$manager->name}}"
                                                            @if($manager->name == @$params['manager']) selected @endif>{{$manager->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block big-input-block">
                                            <label>@lang('message.select_legal_entity')</label>
                                            <select name="entity" class="manager-select" style="width: 100%">
                                                <option value="">-</option>
                                                @foreach($entities as $entity)
                                                    <option
                                                            @if(@$params['entity'] == $entity->name_short) selected
                                                            @endif
                                                            value="{{$entity->name_short}}">{{$entity->name_short}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block big-input-block">
                                            <label>Статус</label>
                                            <select name="status" class="manager-select" style="width: 100%">
                                                <option value="">-</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{$status->name}}"
                                                            @if($status->name == @$params['status']) selected @endif>{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block small-input-block" style="width: 88%">
                                            <label>@lang('message.results_period')</label>
                                            <select id="report-period-select" name="report_periods[]"
                                                    class="report_period-select" multiple="multiple"
                                                    style="width: 100%">
                                                <option value="all">Все</option>
                                                <option value="custom">@lang('message.custom_range')</option>
                                                @foreach($dates as $k => $v)
                                                    <option value="{{ $k }}" {{ in_array($k, $params['periods']) ? 'selected' : '' }}>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block small-input-block" style="width: 88%">
                                            <label>@lang('message.column_search')</label>
                                            <select name="column_search"
                                                    class="report_period-select" style="width: 100%">
                                                <option value=""></option>
                                                @foreach($columns as $k => $v)
                                                    <option value="{{ $k }}" @if($k == $params['foreignColumnSearch']) selected @endif>{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block small-input-block" style="width: 88%">
                                            <label>@lang('message.column_search_value')</label>
                                            <input type="text" name="column_search_value" style="width: 100%" @if($params['foreignColumnSearchValue'])value="{{$params['foreignColumnSearchValue']}}"@endif>
                                        </div>
                                    </div>

                                    <div class="field-container">
                                        <div class="input-block mr0">
                                            <button id="form-submit-button" type="submit"
                                                    class="crm-button" onclick="updatePageAndSubmit()">@lang('message.find')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-block" style="margin-top: 20px; margin-left: 2%">
                                <button class="crm-button" onclick="updatePageAndSubmit()">@lang('message.find')</button>
                                <div class="lds-ellipsis2 hide">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>

                            <div class="input-block wa" style="margin-top: 2%; margin-left: 2%">
                                <div class="al-selected-filter">
                                    @foreach($checkedFilters as $key => $value)
                                        @if($value)
                                            <div class="selected-filter-item" data-filter="{{$key}}">
                                                {{$value}}
                                                <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </form>

                    </div>
                    @if($advanced)
                        @if(count($contracts))
                            <div class="clients-contracts-data">
                                <div class="data-table">
                                    <div class="data-thead">
                                        <div class="data-tr">
                                            <div class="data-td td-name">@lang('message.company_name_lc')</div>
                                            <div class="data-td">@lang('message.contract_date')</div>
                                            <div class="data-td f2">@lang('message.status_lc')</div>
                                            <div class="data-td action-col"></div>
                                        </div>
                                    </div>
                                    <div class="data-tbody contracts-rows">
                                        @include('front.crm.clients.documents.rows')
                                    </div>
                                </div>
                                <div class="pagination">
                                    {{ $contracts->appends(request()->query())->links() }}
                                </div>
                            </div>
                        @endif
                        <div class="no-company @if(count($contracts)) hide @endif">
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M55.4393 9.32002C54.8989 9.17991 54.287 9.1667 53.3334 9.1667H30.0001C29.5508 9.1667 28.2923 9.16676 27.0315 9.19523C26.3994 9.2095 25.7865 9.23051 25.2842 9.26065C24.774 9.29126 24.5363 9.32358 24.4936 9.32938C24.4882 9.33012 24.4859 9.33042 24.4867 9.33024L24.4761 9.3328C24.035 9.43722 23.6321 9.66321 23.3131 9.98514C22.994 10.3071 22.7717 10.712 22.6713 11.154C22.6657 11.1785 22.6597 11.203 22.6534 11.2274C22.5133 11.7679 22.5001 12.3798 22.5001 13.3334V70.8334H57.5001V13.3334C57.5001 12.3897 57.4884 11.7611 57.3414 11.173L57.3338 11.1427C57.2294 10.7017 57.0036 10.2987 56.6816 9.9797C56.3597 9.66067 55.9548 9.43832 55.5128 9.33789C55.4882 9.33231 55.4637 9.32635 55.4393 9.32002ZM56.6577 4.47069C55.4568 4.16552 54.2637 4.16619 53.4285 4.16666C53.3963 4.16668 53.3646 4.1667 53.3334 4.1667H30.0001C29.5468 4.1667 28.2385 4.1667 26.9186 4.1965C26.2591 4.2114 25.5762 4.23414 24.9847 4.26963C24.4663 4.30073 23.8036 4.35153 23.3135 4.46983L23.9001 6.89999L23.3241 4.46729C21.9731 4.78715 20.7388 5.47948 19.7616 6.46564C18.7932 7.44279 18.1156 8.66961 17.8041 10.009C17.4989 11.21 17.4996 12.403 17.5 13.2383C17.5001 13.2705 17.5001 13.3022 17.5001 13.3334V73.3334C17.5001 74.7141 18.6194 75.8334 20.0001 75.8334H60.0001C61.3808 75.8334 62.5001 74.7141 62.5001 73.3334V13.3334C62.5001 13.3047 62.5001 13.2755 62.5001 13.2459C62.5005 12.3974 62.501 11.2058 62.1959 9.97548C61.8744 8.63043 61.1836 7.4018 60.2011 6.4282C59.224 5.45985 57.9972 4.78226 56.6577 4.47069Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.2382 37.4999C13.2704 37.4999 13.3021 37.5 13.3333 37.5H19.9999C21.3806 37.5 22.4999 38.6192 22.4999 40V73.3333C22.4999 74.714 21.3806 75.8333 19.9999 75.8333H13.3333C8.28588 75.8333 4.16659 71.714 4.16659 66.6666V46.7096C4.13045 45.6059 4.2266 44.5017 4.45303 43.4207C4.46109 43.3822 4.47006 43.3439 4.47993 43.3059C4.80424 42.055 5.42958 40.8014 6.43216 39.7989C7.45985 38.7712 8.70847 38.141 9.97252 37.8133C11.1857 37.4988 12.3945 37.4994 13.2382 37.4999ZM13.3333 42.5C12.3797 42.5 11.7678 42.5132 11.2273 42.6533C10.6914 42.7922 10.2733 43.0288 9.96769 43.3344C9.7122 43.5899 9.47801 43.9849 9.33413 44.5075C9.19665 45.188 9.13985 45.8823 9.16496 46.5762C9.16605 46.6063 9.16659 46.6365 9.16659 46.6666V66.6666C9.16659 68.9526 11.0473 70.8333 13.3333 70.8333H17.4999V42.5H13.3333Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M66.6237 27.5C67.7274 27.4638 68.8316 27.56 69.9125 27.7864L69.4 30.2333L70.0274 27.8133C71.2783 28.1376 72.5319 28.763 73.5344 29.7655C74.5621 30.7932 75.1923 32.0419 75.52 33.3059C75.8344 34.5188 75.8338 35.6953 75.8334 36.5691C75.8334 36.6021 75.8333 36.6346 75.8333 36.6666V66.6666C75.8333 69.0978 74.8676 71.4294 73.1485 73.1484C71.4294 74.8675 69.0978 75.8333 66.6667 75.8333H60C58.6193 75.8333 57.5 74.714 57.5 73.3333V30C57.5 28.6193 58.6193 27.5 60 27.5H66.6237ZM68.8258 32.6675C68.1453 32.53 67.451 32.4732 66.7571 32.4983C66.7269 32.4994 66.6968 32.5 66.6667 32.5H62.5V70.8333H66.6667C67.7717 70.8333 68.8315 70.3943 69.6129 69.6129C70.3943 68.8315 70.8333 67.7717 70.8333 66.6666V36.6666C70.8333 35.6826 70.8204 35.1021 70.68 34.5607C70.5411 34.0247 70.3045 33.6067 69.9989 33.3011C69.7434 33.0456 69.3484 32.8114 68.8258 32.6675Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 20C30.833 18.6193 31.9523 17.5 33.333 17.5H46.6663C48.0471 17.5 49.1663 18.6193 49.1663 20C49.1663 21.3807 48.0471 22.5 46.6663 22.5H33.333C31.9523 22.5 30.833 21.3807 30.833 20Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 33.3334C30.833 31.9527 31.9523 30.8334 33.333 30.8334H46.6663C48.0471 30.8334 49.1663 31.9527 49.1663 33.3334C49.1663 34.7141 48.0471 35.8334 46.6663 35.8334H33.333C31.9523 35.8334 30.833 34.7141 30.833 33.3334Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 46.6666C30.833 45.2859 31.9523 44.1666 33.333 44.1666H46.6663C48.0471 44.1666 49.1663 45.2859 49.1663 46.6666C49.1663 48.0473 48.0471 49.1666 46.6663 49.1666H33.333C31.9523 49.1666 30.833 48.0473 30.833 46.6666Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 60C30.833 58.6193 31.9523 57.5 33.333 57.5H46.6663C48.0471 57.5 49.1663 58.6193 49.1663 60C49.1663 61.3807 48.0471 62.5 46.6663 62.5H33.333C31.9523 62.5 30.833 61.3807 30.833 60Z"
                                      fill="#3D445C"/>
                            </svg>
                            <span class="title">
                @lang('message.no_contracts')
              </span>
                        </div>

                    @else
                        @if(count($documents))
                            <div class="clients-contracts-data">
                                <div class="data-table">
                                    <div class="data-thead">
                                        <div class="data-tr">
                                            <div class="data-td">№</div>
                                            <div class="data-td" data-sort="client">
                                                @lang('message.client')
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    @if($sort['order'] === 'asc' && $sort['key'] === 'client')
                                                        <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                                                    @endif

                                                    @if($sort['order'] === 'desc' && $sort['key'] === 'client')
                                                        <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                                                    @endif
                                                </svg>
                                            </div>
                                            <div class="data-td">@lang('message.document')</div>
                                            <div class="data-td">@lang('message.conttragent')</div>
                                            <div class="data-td">@lang('message.manager')</div>
                                            <div class="data-td">@lang('message.our_legal_person')</div>

                                            <div class="data-td"
                                                 data-sort="updated_date">
                                                @lang('message.application_or_contract_date')
                                            </div>

                                            <div class="data-td"
                                                 data-sort="creation_date">
                                                @lang('message.creation_date')
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    @if($sort['order'] === 'asc' && $sort['key'] === 'creation_date')
                                                        <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                                                    @endif

                                                    @if($sort['order'] === 'desc' && $sort['key'] === 'creation_date')
                                                        <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                                                    @endif
                                                </svg>
                                            </div>
                                            <div class="data-td"
                                                 data-sort="updated_date">
                                                @lang('message.updated_date')
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    @if($sort['order'] === 'asc' && $sort['key'] === 'updated_date')
                                                        <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                                                    @endif

                                                    @if($sort['order'] === 'desc' && $sort['key'] === 'updated_date')
                                                        <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                                                    @endif
                                                </svg>
                                            </div>

                                            <div class="data-td" data-sort="status">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    @if($sort['order'] === 'asc' && $sort['key'] === 'status')
                                                        <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                                                    @endif

                                                    @if($sort['order'] === 'desc' && $sort['key'] === 'status')
                                                        <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                                                    @endif
                                                </svg>
                                                @lang('message.status_lc')
                                            </div>
                                            <div class="data-td">@lang('message.note')</div>

                                            <div class="data-td"></div>
                                        </div>
                                    </div>
                                    <div class="data-tbody contracts-rows">
                                        @include('front.crm.clients.documents.documents-rows')
                                    </div>
                                </div>
                                <div class="result-paginator" data-current-page="{{ $documents->currentPage() }}"
                                     data-total-page="{{ $documents->lastPage() }}" style="margin-bottom: 7%; margin-top: 2%">
                                    @if(!$lastPage)
                                        <button class="btn btn-style btn-show-more-documents">@lang('message.show_more')
                                            <span
                                                    class="board count">10</span>
                                        </button>
                                    @endif
                                    @php
                                        $query = request()->query();
                                        unset($query['export']);
                                    @endphp
                                    {!! $documents->appends($query)->links() !!}
                                    <a id="exportButton" class="pointer btn btn-style"
                                       style="padding: 0 20px; color:white;">@lang('message.data_export')</a>
                                </div>
                            </div>
                        @endif
                        <div class="no-company @if(count($documents)) hide @endif">
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M55.4393 9.32002C54.8989 9.17991 54.287 9.1667 53.3334 9.1667H30.0001C29.5508 9.1667 28.2923 9.16676 27.0315 9.19523C26.3994 9.2095 25.7865 9.23051 25.2842 9.26065C24.774 9.29126 24.5363 9.32358 24.4936 9.32938C24.4882 9.33012 24.4859 9.33042 24.4867 9.33024L24.4761 9.3328C24.035 9.43722 23.6321 9.66321 23.3131 9.98514C22.994 10.3071 22.7717 10.712 22.6713 11.154C22.6657 11.1785 22.6597 11.203 22.6534 11.2274C22.5133 11.7679 22.5001 12.3798 22.5001 13.3334V70.8334H57.5001V13.3334C57.5001 12.3897 57.4884 11.7611 57.3414 11.173L57.3338 11.1427C57.2294 10.7017 57.0036 10.2987 56.6816 9.9797C56.3597 9.66067 55.9548 9.43832 55.5128 9.33789C55.4882 9.33231 55.4637 9.32635 55.4393 9.32002ZM56.6577 4.47069C55.4568 4.16552 54.2637 4.16619 53.4285 4.16666C53.3963 4.16668 53.3646 4.1667 53.3334 4.1667H30.0001C29.5468 4.1667 28.2385 4.1667 26.9186 4.1965C26.2591 4.2114 25.5762 4.23414 24.9847 4.26963C24.4663 4.30073 23.8036 4.35153 23.3135 4.46983L23.9001 6.89999L23.3241 4.46729C21.9731 4.78715 20.7388 5.47948 19.7616 6.46564C18.7932 7.44279 18.1156 8.66961 17.8041 10.009C17.4989 11.21 17.4996 12.403 17.5 13.2383C17.5001 13.2705 17.5001 13.3022 17.5001 13.3334V73.3334C17.5001 74.7141 18.6194 75.8334 20.0001 75.8334H60.0001C61.3808 75.8334 62.5001 74.7141 62.5001 73.3334V13.3334C62.5001 13.3047 62.5001 13.2755 62.5001 13.2459C62.5005 12.3974 62.501 11.2058 62.1959 9.97548C61.8744 8.63043 61.1836 7.4018 60.2011 6.4282C59.224 5.45985 57.9972 4.78226 56.6577 4.47069Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M13.2382 37.4999C13.2704 37.4999 13.3021 37.5 13.3333 37.5H19.9999C21.3806 37.5 22.4999 38.6192 22.4999 40V73.3333C22.4999 74.714 21.3806 75.8333 19.9999 75.8333H13.3333C8.28588 75.8333 4.16659 71.714 4.16659 66.6666V46.7096C4.13045 45.6059 4.2266 44.5017 4.45303 43.4207C4.46109 43.3822 4.47006 43.3439 4.47993 43.3059C4.80424 42.055 5.42958 40.8014 6.43216 39.7989C7.45985 38.7712 8.70847 38.141 9.97252 37.8133C11.1857 37.4988 12.3945 37.4994 13.2382 37.4999ZM13.3333 42.5C12.3797 42.5 11.7678 42.5132 11.2273 42.6533C10.6914 42.7922 10.2733 43.0288 9.96769 43.3344C9.7122 43.5899 9.47801 43.9849 9.33413 44.5075C9.19665 45.188 9.13985 45.8823 9.16496 46.5762C9.16605 46.6063 9.16659 46.6365 9.16659 46.6666V66.6666C9.16659 68.9526 11.0473 70.8333 13.3333 70.8333H17.4999V42.5H13.3333Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M66.6237 27.5C67.7274 27.4638 68.8316 27.56 69.9125 27.7864L69.4 30.2333L70.0274 27.8133C71.2783 28.1376 72.5319 28.763 73.5344 29.7655C74.5621 30.7932 75.1923 32.0419 75.52 33.3059C75.8344 34.5188 75.8338 35.6953 75.8334 36.5691C75.8334 36.6021 75.8333 36.6346 75.8333 36.6666V66.6666C75.8333 69.0978 74.8676 71.4294 73.1485 73.1484C71.4294 74.8675 69.0978 75.8333 66.6667 75.8333H60C58.6193 75.8333 57.5 74.714 57.5 73.3333V30C57.5 28.6193 58.6193 27.5 60 27.5H66.6237ZM68.8258 32.6675C68.1453 32.53 67.451 32.4732 66.7571 32.4983C66.7269 32.4994 66.6968 32.5 66.6667 32.5H62.5V70.8333H66.6667C67.7717 70.8333 68.8315 70.3943 69.6129 69.6129C70.3943 68.8315 70.8333 67.7717 70.8333 66.6666V36.6666C70.8333 35.6826 70.8204 35.1021 70.68 34.5607C70.5411 34.0247 70.3045 33.6067 69.9989 33.3011C69.7434 33.0456 69.3484 32.8114 68.8258 32.6675Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 20C30.833 18.6193 31.9523 17.5 33.333 17.5H46.6663C48.0471 17.5 49.1663 18.6193 49.1663 20C49.1663 21.3807 48.0471 22.5 46.6663 22.5H33.333C31.9523 22.5 30.833 21.3807 30.833 20Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 33.3334C30.833 31.9527 31.9523 30.8334 33.333 30.8334H46.6663C48.0471 30.8334 49.1663 31.9527 49.1663 33.3334C49.1663 34.7141 48.0471 35.8334 46.6663 35.8334H33.333C31.9523 35.8334 30.833 34.7141 30.833 33.3334Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 46.6666C30.833 45.2859 31.9523 44.1666 33.333 44.1666H46.6663C48.0471 44.1666 49.1663 45.2859 49.1663 46.6666C49.1663 48.0473 48.0471 49.1666 46.6663 49.1666H33.333C31.9523 49.1666 30.833 48.0473 30.833 46.6666Z"
                                      fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M30.833 60C30.833 58.6193 31.9523 57.5 33.333 57.5H46.6663C48.0471 57.5 49.1663 58.6193 49.1663 60C49.1663 61.3807 48.0471 62.5 46.6663 62.5H33.333C31.9523 62.5 30.833 61.3807 30.833 60Z"
                                      fill="#3D445C"/>
                            </svg>
                            <span class="title">
                @lang('message.no_results')
              </span>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
<div class="al-overlay hide"></div>

<div class="notes-popup" style="height: 270px">
    <div class='status-header'>
        <span>@lang('message.new_notes')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="status-form">
        <form class="status-form-change" id="custom-notes-change">
            <div class="field-container">
                <div class="input-block" style="width: 100%">
                    <label for="note">@lang('message.note')</label>
                    <textarea class="note-textarea" name="note" id="note" style="width: 100%; height: 80%"
                              placeholder="@lang('message.enter_note')"></textarea>
                </div>
            </div>
            <div class="buttons-block">
                <button class="crm-button">@lang('message.save')</button>
                <div class="lds-ellipsis2 hide">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="status-popup" style="height: 350px">
    <div class='status-header'>
        <span>@lang('message.change_status')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="status-form">
        <form class="status-form-change" id="custom-status-change">
            <input type="hidden" name="client_id" value="{{$client->id}}"/>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.status')</label>
                    <select class="status-select" name="status" id="status-select">
                        @foreach($statuses as $value)
                            @if(($value->id == 2 && Auth::user()->role_id == 2) || ($value->id == 3 && in_array(Auth::user()->role_id, [1, 5])) || ($value->id != 2 && $value->id != 3))
                                <option value="{{$value->id}}" data-color="{{$value->color}}"
                                        data-background="{{$value->background}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="input-block">
                        <label for="note">@lang('message.note')</label>
                        <textarea class="status-note-textarea" name="note" id="note" style="width: 100%; height: 80%"
                                  placeholder="@lang('message.enter_note')"></textarea>
                    </div>
                </div>
            </div>
            <div class="buttons-block">
                <button class="crm-button">@lang('message.save')</button>
                <div class="lds-ellipsis2 hide">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="notes-status-popup" style="height: 250px">
    <div class='status-header'>
        <span>@lang('message.change_notes_status')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="status-form">
        <form class="status-form-change" id="custom-status-notes-change">
            <div class="field-container">
                <div class="input-block">
                        <label for="note">@lang('message.note')</label>
                        <textarea class="note-status-textarea" name="note" id="note" style="width: 150%; height: 80%"
                                  placeholder="@lang('message.enter_note')"></textarea>
                </div>
            </div>
            <div class="buttons-block">
                <button class="crm-button">@lang('message.save')</button>
                <div class="lds-ellipsis2 hide">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="custom_date_range_modal" class="modal_time">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="form-group">
            <label for="custom_start_date" class="mr-2">Начальная дата:</label>
            <input type="date" id="custom_start_date" name="custom_start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="custom_end_date" class="mr-2">Конечная дата:</label>
            <input type="date" id="custom_end_date" name="custom_end_date" class="form-control" required>
        </div>
        <button id="custom_date_range_submit" class="btn def-custom-btn">Применить</button>
    </div>
</div>


<script>

    function updatePageAndSubmit() {
        // Получаем текущий URL
        const url = new URL(window.location.href);

        // Устанавливаем значение page = 1
        const newPageValue = 1;

        // Разбиваем путь на сегменты
        const pathSegments = url.pathname.split('/');

        // Проверяем, есть ли уже число в конце пути (страница)
        const lastSegment = pathSegments[pathSegments.length - 1];

        if (!isNaN(lastSegment)) {
            // Если последний сегмент является числом, заменяем его на новое значение
            pathSegments[pathSegments.length - 1] = newPageValue;
        } else {
            // Если последний сегмент не является числом, добавляем новое значение
            pathSegments.push(newPageValue);
        }

        // Обновляем путь в URL
        url.pathname = pathSegments.join('/');

        // Обновляем URL в адресной строке без перезагрузки страницы
        window.history.replaceState({}, document.title, url);
    }



    document.querySelector('.data-tbody').addEventListener('click', function (event) {
        const editButton = event.target.closest('.edit');
        if (editButton) {
            event.preventDefault();
            const id = editButton.getAttribute('data-id');
            const arrow = editButton.querySelector('.info-arrow');
            const tabs = document.querySelector(`.row-inner-tabs[data-id="tabs-${id}"]`);

            arrow.classList.toggle('rotate');
            tabs.classList.toggle('visible');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Store the initial selected values
        let previousSelectedValues = $('#report-period-select').val() || [];

        $('#report-period-select').on('change', function () {
            let currentSelectedValues = $(this).val();

            // Convert to array if null (for the case when no values are selected)
            if (currentSelectedValues === null) {
                currentSelectedValues = [];
            }

            // Check if 'custom' was added
            if (!previousSelectedValues.includes('custom') && currentSelectedValues.includes('custom')) {
                document.querySelector('.al-overlay3').classList.add('hide');
                document.getElementById('bk-filter-block').style.display = 'none';
                document.getElementById('custom_date_range_modal').style.display = 'flex';
            }

            // Update the previous selected values
            previousSelectedValues = currentSelectedValues;
        });

    });

    document.getElementById('custom_date_range_submit').addEventListener('click', function () {
        let startDate = document.getElementById('custom_start_date').value;
        let endDate = document.getElementById('custom_end_date').value;

        document.getElementById('form_custom_start_date').value = startDate;
        document.getElementById('form_custom_end_date').value = endDate;

        document.getElementById('custom_date_range_modal').style.display = 'none';

        document.querySelector('.al-overlay3').classList.remove('hide');
        document.getElementById('bk-filter-block').style.display = 'block';
    });

    document.querySelector("#custom_date_range_modal .close").addEventListener('click', function () {
        document.getElementById('custom_date_range_modal').style.display = 'none';
    });


    document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('report-period-select');

        selectElement.addEventListener('change', function () {
            const options = selectElement.options;
            const allOption = options[0];

            if (allOption.selected) {
                // Deselect all other options
                for (let i = 1; i < options.length; i++) {
                    options[i].selected = false;
                }
            } else {
                // If any other option is selected, ensure the "all" option is deselected
                for (let i = 1; i < options.length; i++) {
                    if (options[i].selected) {
                        allOption.selected = false;
                        break;
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const sortColumns = document.querySelectorAll('.data-td[data-sort]');

        sortColumns.forEach(column => {
            column.addEventListener('click', function () {
                const sortField = column.getAttribute('data-sort');
                let url = new URL(window.location.href);
                let order = url.searchParams.get('order') === 'asc' ? 'desc' : 'asc';

                url.searchParams.set('sort', sortField);
                url.searchParams.set('order', order);
                let hiddenInput = document.querySelector('input[name="page"]');
                hiddenInput.value = 1;

                if (url.searchParams.has('page')) {
                    url.searchParams.set('page', '1');
                } else {
                    url.searchParams.append('page', '1');
                }

                window.location.href = url.toString();
            });
        });
    });

    document.getElementById('exportButton').addEventListener('click', function (event) {
        event.preventDefault();

        const currentUrl = new URL(window.location.href);
        const params = new URLSearchParams(currentUrl.search);

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('contracts.unsigned-documents-export') }}';

        // Добавляем CSRF токен
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        // Добавляем текущие параметры запроса в форму
        params.forEach((value, key) => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = value;
            form.appendChild(input);
        });

        // Добавляем форму на страницу и отправляем её
        document.body.appendChild(form);
        form.submit();
    });

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script>

<script src="/assets/js/slick/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/assets/js/mp/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
<script src="/assets/js/datepicker.min.js"></script>

<script type="text/javascript">
    $('.al-power-tip').powerTip({placement: 's'});
    const dtpicker = datepicker('.datepicker', {
        startDay: 1,
        customDays: ['@lang('message.sunday')', '@lang('message.monday')', '@lang('message.tuesday')', '@lang('message.wednesday')', '@lang('message.thursday')', '@lang('message.friday')', '@lang('message.saturday')'],
        customMonths: ['@lang('message.january')', '@lang('message.february')', '@lang('message.march')', '@lang('message.april')', '@lang('message.may')', '@lang('message.june')', '@lang('message.july')', '@lang('message.august')', '@lang('message.september')', '@lang('message.october')', '@lang('message.november')', '@lang('message.december')'],
        onSelect: instance => {
            console.log(instance.dateSelected)
        },
        formatter: (input, date, instance) => {
            let d = date.getDate();
            let m = date.getMonth() + 1;
            let y = date.getYear() + 1900;
            let y2 = date.getYear() - 100;
            if (d < 10) {
                d = '0' + d;
            }
            if (m < 10) {
                m = '0' + m;
            }
            if (m == '{{date('m')}}' && y == '{{date('Y')}}') {
                $('.first_month_pay_date').removeClass('hide');
                $('[name=first_month_pay_date]').val('').prop('required', true);
                $('.contacts-add-popup').css('height', '411px').css('margin-top', '-205px');
                let fmpd = date;
                if (d < 20) {
                    fmpd = new Date(y, m - 1, 20);
                }
                first_month_pay_date.setDate(null);
                first_month_pay_date.setMin(date);
                first_month_pay_date.setDate(fmpd, true);
            } else {
                $('.first_month_pay_date').addClass('hide');
                $('[name=first_month_pay_date]').val('').prop('required', false);
                $('.contacts-add-popup').css('height', '328px').css('margin-top', '-164px');
            }
            input.value = d + '.' + m + '.' + y;
            $('[name=number]').val(d + '' + m + '' + y2).attr('disabled', false).trigger('change');
        },
    });
    const first_month_pay_date = datepicker('[name=first_month_pay_date]', {
        startDay: 1,
        customDays: ['@lang('message.sunday')', '@lang('message.monday')', '@lang('message.tuesday')', '@lang('message.wednesday')', '@lang('message.thursday')', '@lang('message.friday')', '@lang('message.saturday')'],
        customMonths: ['@lang('message.january')', '@lang('message.february')', '@lang('message.march')', '@lang('message.april')', '@lang('message.may')', '@lang('message.june')', '@lang('message.july')', '@lang('message.august')', '@lang('message.september')', '@lang('message.october')', '@lang('message.november')', '@lang('message.december')'],
        onSelect: instance => {
            console.log(instance.dateSelected)
        },
        formatter: (input, date, instance) => {
            let d = date.getDate();
            let m = date.getMonth() + 1;
            let y = date.getYear() + 1900;
            let y2 = date.getYear() - 100;
            if (d < 10) {
                d = '0' + d;
            }
            if (m < 10) {
                m = '0' + m;
            }
            input.value = d + '.' + m + '.' + y;
        },
    });
    first_month_pay_date.setDate(new Date({{ date('Y') }}, {{ (int)date('m')-1 }}, 1), true);
    const monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    const valid_until = datepicker('[name=valid_until]', {
        startDay: 1,
        customDays: ['@lang('message.sunday')', '@lang('message.monday')', '@lang('message.tuesday')', '@lang('message.wednesday')', '@lang('message.thursday')', '@lang('message.friday')', '@lang('message.saturday')'],
        customMonths: ['@lang('message.january')', '@lang('message.february')', '@lang('message.march')', '@lang('message.april')', '@lang('message.may')', '@lang('message.june')', '@lang('message.july')', '@lang('message.august')', '@lang('message.september')', '@lang('message.october')', '@lang('message.november')', '@lang('message.december')'],
        onSelect: instance => {
            console.log(instance.dateSelected)
        },
        formatter: (input, date, instance) => {
            let d = date.getDate();
            let m = date.getMonth() + 1;
            let y = date.getYear() + 1900;
            let y2 = date.getYear() - 100;
            if (d < 10) {
                d = '0' + d;
            }
            if (m < 10) {
                m = '0' + m;
            }
            input.value = d + '.' + m + '.' + y;
        },
    });
    valid_until.setDate(new Date({{ (date('Y')+1) }}, {{ (date('m')-1) }}, monthDays[{{ (date('m')-1) }}]), true); // 11 - декабрь
    document.del_click = false;
    //var contract_id = null;
    //var contract_act_id = null;
    //var main_url = '/manager/clients';


    let xgh = null;
    document.addEventListener('DOMContentLoaded', function () {
        const statusChangers = document.querySelectorAll('.status-changer');

        // Добавляем обработчик клика для каждого элемента .status-changer
        statusChangers.forEach(function (statusChanger) {
            statusChanger.addEventListener('click', function () {
                xgh = this.getAttribute('data-client_id');
            });
        });

    });


    document.statusChanger = {
        client_id: xgh
    };

    document.notesChanger = {
        notes: null,
        type: null,
    };

    document.notesStatusChanger = {
        notes: null,
        type: null,
    }
    var page_type = 'clients';
    var can_change = false;
    var date_from = {};
    var date_to = {};
    const services_line = `
    <div class="services-item service-item-data">
      <div class="services-name">
        <select name="service_id[]" class="services-dd">
        @foreach($services as $service)
    <option value="{{$service->id}}" data-price_in="{{$service->price}}">{{$service->name}}</option>
        @endforeach
    </select>
    <input type="text" class="other-input hide" name="service_other[]"/>
  </div>
  <div class="services-supplier">
    <select name="supplier_id[]" class="services-supplier-dd">
@foreach($defaultSuppliers as $supplier)
    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
          @endforeach
    </select>
  </div>

  <div class="services-price_in">
    <input type="text" name="service_price_in[]" class="sp_in" value="{{$services[0]->price}}">
      </div>

      <div class="services-price">
        <input type="text" name="service_price[]" class="sp" required>
      </div>
      <div class="services-count">
        <input type="text" name="service_count[]" class="sc" required>
      </div>
      <div class="services-result">
        <input type="text" name="service_result[]" class="sr" required>
      </div>
      <div class="services-action">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 6C2.25 5.58579 2.58579 5.25 3 5.25H21C21.4142 5.25 21.75 5.58579 21.75 6C21.75 6.41421 21.4142 6.75 21 6.75H3C2.58579 6.75 2.25 6.41421 2.25 6Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.75C9.66848 2.75 9.35054 2.8817 9.11612 3.11612C8.8817 3.35054 8.75 3.66848 8.75 4V5.25H15.25V4C15.25 3.66848 15.1183 3.35054 14.8839 3.11612C14.6495 2.8817 14.3315 2.75 14 2.75H10ZM16.75 5.25V4C16.75 3.27065 16.4603 2.57118 15.9445 2.05546C15.4288 1.53973 14.7293 1.25 14 1.25H10C9.27065 1.25 8.57118 1.53973 8.05546 2.05546C7.53973 2.57118 7.25 3.27065 7.25 4V5.25H5C4.58579 5.25 4.25 5.58579 4.25 6V20C4.25 20.7293 4.53973 21.4288 5.05546 21.9445C5.57118 22.4603 6.27065 22.75 7 22.75H17C17.7293 22.75 18.4288 22.4603 18.9445 21.9445C19.4603 21.4288 19.75 20.7293 19.75 20V6C19.75 5.58579 19.4142 5.25 19 5.25H16.75ZM5.75 6.75V20C5.75 20.3315 5.8817 20.6495 6.11612 20.8839C6.35054 21.1183 6.66848 21.25 7 21.25H17C17.3315 21.25 17.6495 21.1183 17.8839 20.8839C18.1183 20.6495 18.25 20.3315 18.25 20V6.75H5.75Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.25C10.4142 10.25 10.75 10.5858 10.75 11V17C10.75 17.4142 10.4142 17.75 10 17.75C9.58579 17.75 9.25 17.4142 9.25 17V11C9.25 10.5858 9.58579 10.25 10 10.25Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.25C14.4142 10.25 14.75 10.5858 14.75 11V17C14.75 17.4142 14.4142 17.75 14 17.75C13.5858 17.75 13.25 17.4142 13.25 17V11C13.25 10.5858 13.5858 10.25 14 10.25Z" fill="#FC6B40"/>
        </svg>
      </div>
    </div>
  `;
</script>

<script src="/assets/js/crm.js?t=20221102-1"></script>

<!-- Selected filters -->


<script>
    $(document).ready(function () {
        $(document).on('click', '.al-selected-filter .selected-filter-item img', function () {
            const filterName = $(this).parent().data('filter');
            if (filterName.indexOf('[') !== -1) {
                $('[name="' + filterName + '"] option[value=' + $(this).parent().data('id') + ']:selected').removeAttr('selected').prop('selected', false);
            } else {
                $('[name="' + filterName + '"]').val('');
                $('[name="' + filterName + '"] option:selected').removeAttr('selected').prop('selected', false);
                $('[name="' + filterName + '"]').removeAttr('checked').prop('checked', false);
            }
            $(this).parent().remove();
            $('[name="' + filterName + '"]').trigger('change');
        });
    });


    function appendGetParams(formId) {
        let form = document.getElementById(formId);
        let formAction = form.getAttribute('action');
        let queryParams = window.location.search.substring(1).split('&');

        queryParams.forEach(function (param) {
            let keyValue = param.split('=');
            let paramName = keyValue[0];
            let paramValue = keyValue[1];
            if (paramName !== 'search') { // Exclude the 'search' parameter
                let hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', paramName);
                hiddenField.setAttribute('value', paramValue);
                form.appendChild(hiddenField);
            }
        });

        form.setAttribute('action', formAction + window.location.search);
    }

    window.onload = function () {
        appendGetParams('searchForm');
    };

    document.getElementById('searchInput').addEventListener('input', function () {
        appendGetParams('searchForm');
    });
    document.addEventListener('click', function (event) {
        if (event.target && event.target.tagName === 'IMG' && event.target.parentElement.classList.contains('selected-filter-item')) {
            let filterToRemove = event.target.parentElement.dataset.filter;
            let currentUrl = window.location.href;
            let url = new URL(currentUrl);

            // Collect current parameters
            let params = new URLSearchParams(url.search);

            if (params.has('export')) {
                params.delete('export');
            }

            // Create a new URLSearchParams object to hold the new parameters
            let newParams = new URLSearchParams();

            // Iterate over current parameters and add them to newParams, excluding the filter to remove
            for (const [name, value] of params.entries()) {
                if (filterToRemove === 'custom' && (name === 'report_periods' || name === 'custom_end_date' || name === 'custom_start_date')) {
                } else {
                    if (!(name === filterToRemove || value === filterToRemove)) {
                        newParams.append(name, value);
                    } else if (name === 'report_periods') {
                        let values = params.getAll(name);
                        values.forEach(val => {
                            if (val !== filterToRemove) {
                                newParams.append(name, val);
                            }
                        });
                    }
                }
            }

            // Update the URL with new parameters
            url.search = newParams.toString();

            window.location.href = url.toString();
        }
    });


    $(document).ready(function () {
        $('#report-period-select').change(function () {
            let selectedOptions = $(this).val();
            if (selectedOptions.includes('all')) {
                $(this).val('all');
                $(this).find('option[value!="all"]').prop('disabled', true);
            } else if (selectedOptions.includes('custom')) {
                $(this).val('custom');
                $(this).find('option[value!="custom"]').prop('disabled', true);
            } else {
                $(this).find('option').prop('disabled', false);
            }
        });
    });

</script>


<style>

    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        line-height: 28px;
        border: none;
        border-radius: 0;
        display: flex;
        align-items: center;
    }

    .contract-creating .select2-dropdown--below {
        width: 263px !important;
    }

    .al-power-tip {
        margin-left: 5px;
    }

    .modal_time {
        display: none; /* По умолчанию скрыто */
        position: absolute !important;
        z-index: 9999; /* Установите высокий z-index, чтобы модальное окно было поверх других элементов */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(29, 29, 33, 0.8);
        overflow: auto; /* Добавляем прокрутку, если содержимое модального окна превышает видимую область */
        align-items: center;
        justify-content: center;
    }

    /* Контент модального окна */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        border-radius: 5px;
        width: 10%; /* Регулируйте ширину по вашему выбору */
    }

    /* Кнопка закрытия */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .sort-icon {
        display: none;
    }

    .sort-icon.active {
        display: inline;
    }

    .btn-show-more-documents {
        width: 100%;
        background: #f76a47;
    }
</style>