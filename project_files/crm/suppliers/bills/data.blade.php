@can('view-suppliers-bills-amount')
    <div style="margin-bottom: 10px;">
        <span>Ожидают постановку на оплату: <b>{{$sums['wait']}}</b></span>&nbsp;
        <span>Поставлены на оплату: <b>{{$sums['to_pay']}}</b></span>&nbsp;
        <span>Оплачено: <b>{{$sums['paid']}}</b></span>
    </div>
@endcan
<table class="result-table">
    <thead>
    <tr>
        <td>№</td>
        <td class="created-at">@lang('message.created_at')</td>
        <td class="supplier-name">@lang('message.supplier')</td>
        <td class="client-name">@lang('message.client')</td>
        <td class="client-name">@lang('message.our_getter')</td>
        <td class="paid-period">@lang('message.period')</td>
        <td class="supplier-bill">@lang('message.bill')</td>
        <td class="supplier-bill">@lang('message.bill_number')</td>
        <td class="our_details">@lang('message.payer')</td>
        <td class="bill-sum">@lang('message.sum')</td>
        @can('view-suppliers-bills-commission')
            <td class="bill-sum">@lang('message.commission')</td>
        @endcan
        <td class="manager-name">@lang('message.manager')</td>
        <td class="manager-name">@lang('message.comment')</td>
        <td class="paid-at">@lang('message.payment_from_the_client')</td>
        <td class="paid-at">@lang('message.status')</td>
        <td class="created-at">@lang('message.updated_at')</td>
        <td class="action"></td>
    </tr>
    </thead>
    <tbody>
    @if(count($bills))
        @foreach($bills as $key => $bill)
            @include('front.crm.suppliers.bills.row')
        @endforeach
    @endif
    </tbody>
</table>
@if ($bills->lastPage() > 1)
    <div class="result-paginator" data-current-page="{{ $bills->currentPage() }}" data-total-page="{{ $bills->lastPage() }}">
        {{--
        <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span> @lang('message.suppliers_')</button>
        --}}
        <div class="result-paginator__pages">
            <div class='result-paginator__prev'>
                <i class="fa fa-arrow-left"></i>
                <a href="{!! $bills->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
            </div>
            {!! $bills->appends($params)->links() !!}
            <div class='result-paginator__next'>
                <a href="{!! $bills->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                <i class="fa fa-arrow-right"></i>
            </div>
        </div>
    </div>
@endif