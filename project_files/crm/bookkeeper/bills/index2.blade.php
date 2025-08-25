@include('add.head')
<body>
@include('add.header')
@include('add.menu')
<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base bookkeeper-bills-page">
                <h1 class="title">{{$data['seo']->h1_title}}</h1>
                <div class="client-tab-data-block pt0">
                    <div class="bills-search-form">
                        <form action="{{ route('bookkeeper.bills') }}" method="GET" id="bookkeeper-bill-search">
                            <div class="field-container wide-filter-">
                                <div class="input-block w150">
                                    <label>@lang('message.search')</label>
                                    <input type="text" name="s" placeholder="@lang('message.enter_value')"
                                           value="@if(@$s){{ $s }}@endif"/>
                                </div>
                                <div class="input-block w150">
                                    <label>@lang('message.bill_number')</label>
                                    <input type="text" name="s_number" placeholder="@lang('message.enter_bill_number')"
                                           value="@if(@$s_number){{ $s_number }}@endif"/>
                                </div>

                                <div class="search-right-block">
                                    <div class="input-block filter-btn-block">
                                        <a class="bk-filter-btn ">
                                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.989754 1.01326C1.08192 0.814602 1.28101 0.6875 1.50001 0.6875H16.5C16.719 0.6875 16.9181 0.814602 17.0103 1.01326C17.1024 1.21191 17.0709 1.446 16.9295 1.61322L11.0625 8.55096V14.75C11.0625 14.945 10.9616 15.126 10.7957 15.2285C10.6299 15.331 10.4228 15.3403 10.2485 15.2531L7.24845 13.7531C7.05788 13.6578 6.93751 13.4631 6.93751 13.25V8.55096L1.0705 1.61322C0.929088 1.446 0.897583 1.21191 0.989754 1.01326ZM2.71237 1.8125L7.92952 7.98178C8.01539 8.08333 8.06251 8.21201 8.06251 8.345V12.9024L9.93751 13.8399V8.345C9.93751 8.21201 9.98463 8.08333 10.0705 7.98178L15.2877 1.8125H2.71237Z"
                                                      fill="#FC6B40"/>
                                            </svg>
                                            @lang('message.filter')
                                        </a>
                                    </div>

                                    <div class="bk-filter-block">
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

                                            </div>
                                            <div class="field-container">
                                                <div class="input-block small-input-block">
                                                    <label>@lang('message.client') </label>
                                                    <select name="client_id" class="client_id-select">
                                                        <option value="">-</option>
                                                        @foreach($clients as $k => $v)
                                                            <option value="{{$k}}"
                                                                    @if($k == $params['client_id']) selected @endif>{{$v}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="field-container">
                                                <div class="input-block small-input-block">
                                                    <label>@lang('message.results_period')</label>
                                                    <select name="report_period[]" class="report_period-select"
                                                            multiple="multiple">
                                                        <option value="all"
                                                                @if($report_period == 'all') selected @endif>@lang('message.all_periods')</option>
                                                        @foreach($reportPeriod as $k => $v)
                                                            <option value="{{$k}}"
                                                                    @if(in_array($k, (array)$report_period)) selected @endif>{{$v}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" value="1" name="placing"
                                                               @if(@$params['placing']) checked @endif><span>&nbsp;@lang('message.employment__')</span>
                                                    </label>
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" value="1" name="payment_in_period"
                                                               @if(@$params['payment_in_period']) checked @endif><span>&nbsp;@lang('message.payment_in_the_reporting_period')</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="field-container">
                                                <div class="input-block small-input-block">
                                                    <label>@lang('message.manager')</label>
                                                    <select name="manager_id" class="manager-select">
                                                        <option value="">-</option>
                                                        @foreach($managers as $manager)
                                                            <option value="{{$manager->id}}"
                                                                    @if($manager->id == @$params['manager_id']) selected @endif>{{$manager->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @if(Auth::user()->id != 273)
                                                <div class="field-container">
                                                    <div class="input-block small-input-block">
                                                        <label>@lang('message.recipient_')</label>
                                                        <select name="our_details_id" class="our_details-select">
                                                            <option value="">-</option>
                                                            @foreach($our_details as $v)
                                                                <option value="{{$v->id}}"
                                                                        @if($v->id == @$params['our_details_id']) selected @endif>{{$v->name_short}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="field-container">
                                                <div class="input-block small-input-block">
                                                    <label>@lang('message.status')</label>
                                                    <select name="paid" class="bills-status-select">
                                                        <option value="">@lang('message.all')</option>
                                                        <option value="wait"
                                                                @if( @$paid == 'wait' ) selected @endif>@lang('message.wait')</option>
                                                        <option value="send"
                                                                @if( @$paid == 'send' ) selected @endif>@lang('message.sent')</option>
                                                        <option value="partially_paid"
                                                                @if( @$paid == 'partially_paid' ) selected @endif>@lang('message.partially_paid2')</option>
                                                        <option value="paid"
                                                                @if( @$paid == 'paid' ) selected @endif>@lang('message.paid')</option>
                                                    </select>
                                                    <label class="checkbox-label">
                                                        <input type="checkbox" value="1" name="with_deleted"
                                                               @if(@$params['with_deleted']) checked @endif><span>&nbsp;@lang('message.show_deleted')</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="field-container">
                                                <div class="input-block mr0">
                                                    <button class="crm-button">@lang('message.find')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(in_array(Auth::user()->id, [1,202,248]))
                                        <div class="input-block wa">
                                            <a class="crm-button export__ pointer"
                                               style="color:white;">@lang('message.export')</a>

                                            <div class="popup-form-export zi10102">
                                                <div class='popup-form-header'>
                                                    <span>@lang('message.data_export')</span>
                                                    <span class="close">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                                    fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                            </svg>
                          </span>
                                                </div>
                                                <div class="popup-form-body">

                                                    <div class="input-block" style="">
                                                        <div class="form_toggle">
                                                            <div class="form_toggle-item item-1">
                                                                <input id="dt-1" type="radio" name="date_type"
                                                                       value="paid_at" checked>
                                                                <label for="dt-1">@lang('message.pay_date2')</label>
                                                            </div>
                                                            <div class="form_toggle-item item-2">
                                                                <input id="dt-2" type="radio" name="date_type"
                                                                       value="date">
                                                                <label for="dt-2">@lang('message.bill_date')</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="field-container">
                                                        <div class="input-block mb-0">
                                                            <label>C</label>
                                                            <input type="text" name="date_from" value=""
                                                                   class="datepicker-date_from">
                                                        </div>
                                                        <div class="input-block mb-0">
                                                            <label>@lang('message.over')</label>
                                                            <input type="text" name="date_to" value=""
                                                                   class="datepicker-date_to">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="field-container">
                                                        @php
                                                            $i = 0;
                                                            $n = count($exportFields);
                                                        @endphp
                                                        <div style="width:263px">
                                                            @foreach($exportFields as $key => $value)
                                                                @if($i < $n / 2 )
                                                                    <label>
                                                                        <input type="checkbox" name="export_params[]"
                                                                               value="{{$key}}" checked>&nbsp;{{$value}}
                                                                    </label>
                                                                @endif
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endforeach
                                                        </div>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        <div style="width:263px">
                                                            @foreach($exportFields as $key => $value)
                                                                @if($i >= $n / 2 )
                                                                    <label>
                                                                        <input type="checkbox" name="export_params[]"
                                                                               value="{{$key}}" checked>&nbsp;{{$value}}
                                                                    </label>
                                                                @endif
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="field-container">
                                                        <div style="width:350px">
                                                            <label>@lang('message.status')</label>
                                                            <div>
                                                                <select name="bill_status" class="bills-status-select">
                                                                    <option value="">@lang('message.all')</option>
                                                                    <option value="wait"
                                                                            @if( @$paid == 'wait' ) selected @endif>@lang('message.wait')</option>
                                                                    <option value="partially_paid"
                                                                            @if( @$paid == 'partially_paid' ) selected @endif>@lang('message.partially_paid2')</option>
                                                                    <option value="paid"
                                                                            @if( @$paid == 'paid' ) selected @endif>@lang('message.paid')</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="align-right">
                                                        {{--<a class="clear-new pointer">@lang('message.cancel')</a>--}}
                                                        <a class="crm-button export pointer">@lang('message.download')</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    <div class="input-block mr0 wa">
                                        <button class="crm-button">@lang('message.find')</button>
                                    </div>

                                    <div class="al-selected-filter">
                                        @foreach($checkedFilters as $key => $value)
                                            @if(strpos($key,'[') !== false)
                                                @foreach($value as $k => $v)
                                                    <div class="selected-filter-item" data-filter="{{$key}}"
                                                         data-id="{{$v['id']}}">
                                                        {{$v['value']}}
                                                        <img src="/assets/img/icons/remove-icon.svg"
                                                             style="height: 15px;"/>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="selected-filter-item" data-filter="{{$key}}"
                                                     data-id="{{$value['id']}}">
                                                    {{$value['value']}}
                                                    <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                {{--
                                <div class="right-block" style="position:relative;">
                                  <a href="#" class="btn submit bills-add-dd more-action">Создать счет</a>
                                  <div class="sub-action hide">
                                    <a href="#">По договору</a>
                                    <a href="#">Без договора</a>
                                  </div>
                                </div>
                                --}}
                            </div>
                        </form>
                    </div>

                    <div class="bills-results">
                        @include('front.crm.bookkeeper.bills.results')
                    </div>

                    <div class="no-company @if(count($bills)) hide @endif">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                @lang('message.empty_biils')
              </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
<div class="status-popup  zi10101">
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
        <form class="status-form-change bookkeeper" id="status-change2">
            <input type="hidden" name="bill_id" value=""/>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.status')</label>
                    <select class="status-select" name="status" id="status-select">
                        @foreach($bookkeeperStatuses as  $status)
                            <option value="{{$status->id}}" data-color="{{$status->color}}"
                                    data-background="{{$status->background}}">{{$status->name}}</option>
                        @endforeach
                    </select>
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
<div class="number-popup  zi10101">
    <div class='status-header'>
        <span>@lang('message.bill_number2')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="number-form">
        <form class="number-form-change bookkeeper" id="number-change">
            <input type="hidden" name="bill_id" value=""/>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.bill_number2')</label>
                    <input type="text" name="bill_number">
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
<style type="text/css">
    .mfp-bg,
    .mfp-wrap,
    .select2-container--open {
        z-index: 10105;
    }

    .iframe-popup {
        z-index: 10102;
    }

    .bookkeeper-bills-page .data-table {
        display: table;
    }

    .bookkeeper-bills-page .data-table .data-thead,
    .bookkeeper-bills-page .data-table .data-tbody {
        display: table-header-group;
    }

    .bookkeeper-bills-page .data-table .data-thead .data-tr .data-td {
        border-top: solid 1px #CDD4D9;
    }

    .bookkeeper-bills-page .data-table .data-tr {
        display: table-row;
    }

    .bookkeeper-bills-page .data-table .data-tr .data-td {
        display: table-cell;
        border-bottom: solid 1px #CDD4D9;
    }

    .manager-letter.al-power-tip {
        border-radius: 50%;
    }

    .al-selected-filter {
        display: flex;
        align-items: center;
        flex-flow: row wrap;
        margin-left: 20px;
    }

    .al-selected-filter .selected-filter-item {
        padding: 5px 10px;
        border-radius: 5px;
        background: #FFF0EC;
        margin-right: 10px;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .al-selected-filter .selected-filter-item img {
        margin-left: 10px;
        cursor: pointer;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        line-height: 28px;
        border: none;
        border-radius: 0;
        display: flex;
        align-items: center;
        margin-top: 0px;
        margin-bottom: 2px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
        padding: 0px 4px 0px 5px;
        font-size: 13px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        border-right: none;
        height: 28px;
        display: inline-block;
    }

    .bills-search-form .field-container .input-block input[name="s_number"],
    .bills-search-form .field-container .input-block input[name="s"] {
        width: 150px;
    }

    .bills-search-form .field-container .input-block.w150 {
        width: 150px;
    }

    .export .lds-ellipsis3 div {
        background: #fff;
    }
</style>
@include('front.crm.scripts')
<style type="text/css">
    #export-form .lds-ellipsis3 div {
        background: #fff;
    }
</style>
<script>
    if (typeof document.dateFrom != 'undefined') {
        delete (document.dateFrom);
    }
    if (typeof document.dateTo != 'undefined') {
        delete (document.dateTo);
    }
    $('[name=encoding]').select2({minimumResultsForSearch: -1});
    document.dateFrom = datepicker('.datepicker-date_from', {
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
            if (d < 10) {
                d = '0' + d;
            }
            if (m < 10) {
                m = '0' + m;
            }
            input.value = d + '.' + m + '.' + y;
        },
    });
    document.dateTo = datepicker('.datepicker-date_to', {
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
            if (d < 10) {
                d = '0' + d;
            }
            if (m < 10) {
                m = '0' + m;
            }
            input.value = d + '.' + m + '.' + y;
        },
    });
    $('.clear-new').click(function () {
        $('.al-overlay3').click();
    })
</script>


{{--
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
--}}
<script>
    const main_url = '/manager/bills';
    $('.al-power-tip').powerTip({placement: 's'});
    ajaxBillEditPopup();
    if (window.location.hash.length) {
        if (window.location.hash.indexOf('-from-clients') != -1) {
            const openLink = `<a class="ajax-bill-popup-link" href="/manager/bills/${window.location.hash.split('#')[1].split('-')[1]}/edit" id="${window.location.hash.split('#')[1]}" style="display:none">&nbsp;</a>`;
            $('body').append(openLink);
            ajaxBillEditPopup();
        } else if (!$(window.location.hash).length && window.location.hash.indexOf('-open') != -1) {
            const openLink = `<a class="ajax-bill-popup-link" href="/manager/bills/${window.location.hash.split('#')[1].split('-')[1]}/edit" id="${window.location.hash.split('#')[1]}" style="display:none">&nbsp;</a>`;
            $('body').append(openLink);
            ajaxBillEditPopup();
        }

        if (!$(window.location.hash).length && window.location.hash.indexOf('-divide') != -1) {
            const openLink = `<a class="ajax-bill-popup-link" href="/manager/bills/${window.location.hash.split('#')[1].split('-')[1]}/divide" id="${window.location.hash.split('#')[1]}" style="display:none">&nbsp;</a>`;
            $('body').append(openLink);
            ajaxBillDividePopup();
        }


        $(window.location.hash).trigger('click');
    }
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
        $('#bookkeeper-bill-search [name]').change(function () {
            //console.log($(this).parent().parent().parent().parent().parent());
            if ($(this).parent().parent().parent().parent().parent().hasClass('popup-form-export')) {
                return;
            }
            if ($(this).hasClass('report_period-select')) {
                if ($(this).val().includes('all') && $(this).val().length > 1) {
                    $(this).find('option:selected').each(function () {
                        $(this).removeAttr('selected').prop('selected', false);
                    });
                    $(this).find('option[value=all]').prop('selected', true);
                    $(this).trigger('change');
                    return;
                }
            }
            let _this = this;
            if (!$(this).val()) {
                $('[data-filter="' + $(this).attr('name') + '"]').remove();
            } else if ($(this).attr('type') != 'checkbox') {
                if (!$('[data-filter="' + $(this).attr('name') + '"]').length) {
                    if (typeof $(this).val() == 'object') {
                        $(this).val().forEach(el => {
                            console.log(el);
                            $('.al-selected-filter').append('<div class="selected-filter-item" data-filter="' + $(_this).attr('name') + '" data-id=""></div>');
                        })
                    } else {
                        $('.al-selected-filter').append('<div class="selected-filter-item" data-filter="' + $(this).attr('name') + '" data-id=""></div>');
                    }
                } else if ($(this).attr('name').indexOf('[') != -1) {
                    $('[data-filter="' + $(this).attr('name') + '"]').remove();
                    $(this).val().forEach(el => {
                        $('.al-selected-filter').append('<div class="selected-filter-item" data-filter="' + $(_this).attr('name') + '" data-id=""></div>');
                    })
                }
                if (typeof $(this).val() == 'object') {
                    $('[data-filter="' + $(this).attr('name') + '"]').each(function (i) {
                        $(this).data('id', $(_this).find('option:selected').eq(i).val());
                    })
                } else {
                    $('[data-filter="' + $(this).attr('name') + '"]').data('id', $(this).val()).empty();
                }
                if ($(this).attr('type') == 'text') {
                    $('[data-filter="' + $(this).attr('name') + '"]').append($(this).val());
                } else {
                    if (typeof $(this).val() == 'object') {
                        let vals = $(this).val();
                        $('[data-filter="' + $(this).attr('name') + '"]').each(function (i) {
                            $(this).append($(_this).find('option:selected').eq(i).text());
                        })
                    } else {
                        $('[data-filter="' + $(this).attr('name') + '"]').append($(this).find('option:selected').text());
                    }
                }
                if (typeof $(this).val() == 'object') {
                    $('[data-filter="' + $(this).attr('name') + '"]').each(function () {
                        $(this).append('<img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>');
                    })
                } else {
                    $('[data-filter="' + $(this).attr('name') + '"]').append('<img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>');
                }
            }
            if ($(this).attr('type') == 'checkbox' && !$(this).prop('checked')) {
                $('[data-filter="' + $(this).attr('name') + '"]').remove();
            } else if ($(this).attr('type') == 'checkbox' && $(this).prop('checked')) {
                if (!$('[data-filter="' + $(this).attr('name') + '"]').length) {
                    $('.al-selected-filter').append('<div class="selected-filter-item" data-filter="' + $(this).attr('name') + '" data-id=""></div>');
                }
                $('[data-filter="' + $(this).attr('name') + '"]').data('id', $(this).val()).empty();
                $('[data-filter="' + $(this).attr('name') + '"]').append($(this).parent().find('span').text());
                $('[data-filter="' + $(this).attr('name') + '"]').append('<img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>');
            }
            $('#bookkeeper-bill-search').trigger('submit');
        });
        $('#bookkeeper-bill-search').submit(function () {
            $('body').append('<div class="global-loader"></div>');
            const formData = $(this).serialize();
            window.history.pushState({}, $('title').text(), main_url + '?' + formData);
            $.post(
                main_url,
                formData + '&ajax=true',
                function (view) {
                    $('.bills-results').empty().append(view);
                    $('.global-loader').remove();
                    $('.al-power-tip').powerTip({placement: 's'});
                }
            );
            return false;
        })
        $('#bookkeeper-bill-search .export__').click(function () {
            $('.al-overlay3').removeClass('hide');
            $('.popup-form-export').show();
        })
        document.billExport = false;
        $('#bookkeeper-bill-search .export').click(function () {
            if (document.billExport) {
                return false;
            }
            document.billExport = true;
            const formData = $('#bookkeeper-bill-search').serialize();
            $(this).empty().append('<div class="lds-ellipsis3" style="height:42px;"><div></div><div></div><div></div><div></div></div>');
            $.post(
                main_url,
                formData + '&ajax=true&export=true',
                function (data) {
                    document.billExport = false;
                    if (data.success) {
                        let a = document.createElement('a');
                        a.download = data.file.split('/')[3];
                        a.href = data.file;
                        a.click();
                        $('.al-overlay3').click();
                    } else {
                        toastr.error("@lang('message.wrong_request')");
                    }
                    $('#bookkeeper-bill-search .export').empty().append('@lang('message.export')');
                    $('.al-overlay3').click();
                }
            );
            return false;
        })
        $('.bk-filter-fields button').click(function () {
            $('.al-overlay3').click();
        });
        $(document).on('click', '.payment-info', function () {
            $.get(
                '/manager/bills/' + $(this).data('id') + '/payment-info',
                {},
                function (data) {
                    if (data.empty) {
                        toastr.warning('@lang('message.there_were_no_payments_on_this_account')');
                    } else {
                        const form = `
            <div class="default-popup">
              <div class="default-popup-header">
                <span>@lang('message.payment_information')</span>
                <span class="close">
                  <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
                  </svg>
                </span>
              </div>
              <div class="default-popup-body">
                ${data.info}
              </div>
            </div>
          `;
                        $('.al-overlay3').removeClass('hide');
                        $('body').append(form);
                    }
                }
            );
            return false;
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on('contentLoaded', '.bookkeeper-bill-edit-popup', function () {
        });
    });
</script>
