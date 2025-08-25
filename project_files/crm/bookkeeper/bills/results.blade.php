<div class="client-contacts-header mb20 mt20">
  <div class="left-block bills-stat">
    <span>@lang('message.created_bills'): <b>{{$data['bills_count']}}</b></span>
    <span>@lang('message.waiting'): <b>{{$data['bills_wait']}}</b></span>
    <span>@lang('message.sent_to_client'): <b>{{$data['bills_send']}}</b></span>
    <span>@lang('message.paid2'): <b>{{$data['bills_paid']}}</b></span>
    <span>@lang('message.need_approve'): <b>{{$data['vise']}}</b></span>
    <span>@lang('message.need_fast_approve'): <b>{{$data['quick_vise']}}</b></span>
    <span>@lang('message.approved'): <b>{{$data['finish_vise']}}</b></span>
  </div>
  {{--
  <div class="right-block">
    <a href="/manager/clients/{{ $client->id }}/bills/add" class="btn submit bills-add-link">Создать счет</a>
  </div>
  --}}
</div>
@if(count($bills))
<div class="bills-table data-table">
  <div class="bills-table-thead data-thead">
    <div class="data-tr">
      <div class="data-td bill-payer">
        @lang('message.client')
      </div>
      @if(Auth::user()->id != 273)
      <div class="data-td">
        @lang('message.contract') / @lang('message.application')
      </div>
      @endif
      <div class="data-td sortable-td bill-date @if($sort=='date') active @endif" data-sort="date" data-dir="{{($sort == 'date' && $dir == 'asc')? 'desc' : 'asc'}}">
        @lang('message.invoice_date')
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'date' && $dir == 'desc') down @endif @if($sort == 'date' && $dir == 'asc') up @endif">
          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
        </svg>
      </div>
      <div class="data-td">
        @lang('message.bill_number')
      </div>
      <!--
      <div class="data-td">
        {{--@lang('message.pay_date')--}} оплата до
      </div>
      -->
      @if(Auth::user()->id != 273)
      <div class="data-td bill-payer">
        @lang('message.payer')
      </div>
      @endif
      <div class="data-td">
        Мен.
      </div>
      @if(Auth::user()->id != 273)
      <div class="data-td">
        @lang('message.recipient_')
      </div>
      @endif
      <div class="data-td">
        @lang('message.period')
      </div>
      <div class="data-td">
        @lang('message.payment_form')
      </div>
      <div class="data-td">
        @lang('message.bill_sum')
      </div>
      <div class="data-td">
        @lang('message.payed_sum')
      </div>
      <div class="data-td">
        @lang('message.remainder')
      </div>
      <div class="data-td bill-status-td f1-5">
        @lang('message.visa')
      </div>
      <div class="data-td sortable-td @if($sort=='paid_at') active @endif" data-sort="paid_at" data-dir="{{($sort == 'paid_at' && $dir == 'asc')? 'desc' : 'asc'}}">
        @lang('message.pay_date')
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'paid_at' && $dir == 'desc') down @endif @if($sort == 'paid_at' && $dir == 'asc') up @endif">
          <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
          <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
        </svg>
      </div>
      <div class="data-td bill-status-td f1-5">
        @lang('message.status')
      </div>
      <div class="data-td bill-action">
        &nbsp;
      </div>
    </div>
  </div>
  <div class="bills-table-tbody data-tbody">
  @foreach($bills as $key => $bill)
    @include('front.crm.bookkeeper.bills.row')
  @endforeach
  </div>
</div>
@if ($bills->lastPage() > 1)
<div class="result-paginator" data-current-page="{{ $bills->currentPage() }}" data-total-page="{{ $bills->lastPage() }}">
    {{--
    <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span> @lang('message.show_more_leads')</button>
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
@endif