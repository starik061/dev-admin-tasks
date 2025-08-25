<div class="bookkeeper-bill-edit-popup">
    <div class="act-popup-title">
        <h2>@lang('message.divide_bill')</h2>
    </div>
    <form id="bill-split-form">
        <input type="hidden" name="id" value="{{$bill->id}}"/>
        <div class="bill-details-info">
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.bill_number2')</label>
                    <input name="number" value="{{$bill->number}}" disabled>
                </div>

                <div class="input-block">
                    <label>@lang('message.bill_sum')</label>
                    <input name="initial_sum" value="{{$bill->sum}}" disabled>
                </div>
                <div class="input-block">
                    <label>@lang('message.payed_sum')</label>
                    <input name="initial_paid_sum" value="{{$bill->paid_sum}}" disabled>
                </div>

                <div class="input-block">
                    <label>@lang('message.date')</label>
                    <input name="date" value="{{$bill->date}}" class="bill-date-datepicker"
                           data-min-date="{{$bill->act->date}}" disabled>
                </div>
                <div class="input-block">
                    <label>@lang('message.payment')</label>
                    <input name="pay_date" value="{{$bill->pay_date}}" class="bill-pay-date-datepicker"
                           data-min-date="{{$bill->act->date}}" disabled>
                </div>
            </div>

            <div class="text-info-block">
                <div class="text-info-line">
                    <div class="text-info-title">@lang('message.organization'):</div>
                    <div class="text-info-value">{{$bill->contract->our_company_name_short}}</div>
                </div>
                <div class="text-info-line">
                    <div class="text-info-title">@lang('message.contragent'):</div>
                    <div class="text-info-value">{{$bill->contract->company_name_short ?? $bill->contract->fio_full}}</div>
                </div>
                <div class="text-info-line">
                    <div class="text-info-title">@lang('message.contract'):</div>
                    <div class="text-info-value">@if($bill->contract->number == '-')
                            надання послуг
                        @else
                            №{{$bill->contract->number}} @lang('message.from') {{$bill->contract->day.".".$bill->contract->month.".".$bill->contract->year}}
                        @endif</div>
                </div>

                <div class="text-info-line">
                    <div class="text-info-title">@lang('message.payment_information'):</div>
                </div>
            </div>
            <table class="payment-info-table">
                <tr class="payment-info-table-header">
                    <td>№</td>
                    <td>@lang('message.date')</td>
                    <td>@lang('message.edrpou_')</td>
                    <td>@lang('message.payer')</td>
                    <td>@lang('message.description')</td>
                    <td>@lang('message.sum')</td>
                </tr>
                @foreach($operations as $k => $v)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$v->operation_date}}</td>
                        <td>{{$v->edrpou}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->description}}</td>
                        <td>{{$v->sum}}</td>
                    </tr>
                @endforeach
            </table>

            <div class="">
                <h3>@lang('message.other_bills')</h3>
            </div>
            @if(count($otherBills))
                <div class="items-list">
                    @foreach($otherBills as $k => $item)
                        <div class="item">
                            <div class="field-container">
                                <div class="input-block number-block">
                                    @if(!$k)
                                        <label>&nbsp;</label>
                                    @endif
                                    <span class="line-number">
                					{{$k+1}}
            					</span>
                                </div>

                                <div class="input-block">
                                    @if(!$k)
                                        <label>@lang('message.contract')</label>
                                    @endif
                                    <input value="№{{$item->contract->number}} @lang('message.from') {{$item->contract->day.".".$bill->contract->month.".".$bill->contract->year}}" disabled>
                                </div>

                                <div class="input-block number-block">
                                    @if(!$k)
                                        <label>@lang('message.application')</label>
                                    @endif
                                    <input value="№{{$item->act->number}}" disabled>
                                </div>

                                <div class="input-block number-block">
                                    @if(!$k)
                                        <label>@lang('message.bill_number2')</label>
                                    @endif
                                    <input value="{{$item->number}}" class="count-input" disabled>
                                </div>
                                <div class="input-block name-block">
                                    @if(!$k)
                                        <label>@lang('message.organization')</label>
                                    @endif
                                    <input value="{{$item->contract->our_company_name_short}}" disabled>
                                </div>

                                <div class="input-block number-block">
                                    @if(!$k)
                                        <label>@lang('message.sum')</label>
                                    @endif
                                    <input name="children[{{$item->id}}][sum]" value="{{$item->sum}}"
                                           class="count-input"
                                           disabled>
                                </div>

                                <div class="input-block number-block">
                                    @if(!$k)
                                        <label>@lang('message.paid2')</label>
                                    @endif
                                    <input type="number"  name="children[{{$item->id}}][paid_sum]" value="{{$item->paid_sum}}"
                                           class="count-input" required>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="right-block">
                    <button class="crm-button">@lang('message.need_approve')</button>
                    <div class="lds-ellipsis2 hide">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>

            @else
                <h2 style="margin-left: 40%">@lang('message.no_other_bills')</h2>
            @endif
        </div>
    </form>
</div>
<style type="text/css">
    .line-number {
        padding-top: 15px;
        display: inline-block;
    }
</style>

