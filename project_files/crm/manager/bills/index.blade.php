@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        {{--
        <div class="container container-base bills-page">
          <a class="back" href="/manager/clients">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            Назад
          </a>
        </div>
        --}}
        <div class="container container-base bookkeeper-bills-page">
          <h1 class="title">{{$data['seo']->h1_title}}</h1>
          <div class="client-tab-data-block pt0">
            {{--
            <div class="bills-switcher">
              <a href="/manager/clients/{{ $client->id }}/bills" class="@if(!$owners_bill) active @endif">@lang('message.bills_for_clients')</a>
              <!--
              <a href="#" class="@if($owners_bill) active @endif">Счета собственников</a>
              -->
            </div>
            --}}
            {{--@if(count($bills) > 0)--}}
            <div class="bills-search-form">
              <form action="{{ route('manager.bills') }}" method="GET" id="bookkeeper-bill-search">
                <div class="field-container">
                  <div class="input-block">
                    <label>@lang('message.search')</label>
                    <input type="text" name="s" placeholder="@lang('message.enter_value')"  value="@if(@$s){{ $s }}@endif" />
                  </div>
                  <div class="input-block">
                    <label>@lang('message.bill_number')</label>
                    <input type="text" name="s_number" placeholder="@lang('message.enter_bill_number')"  value="@if(@$s_number){{ $s_number }}@endif" />
                  </div>
                  <div class="input-block">
                    <label>@lang('message.status')</label>
                    <select name="paid" class="bills-status-select">
                      <option value="">@lang('message.all')</option>
                      <option value="wait" @if( @$paid == 'wait' ) selected @endif>@lang('message.wait')</option>
                      <option value="send" @if( @$paid == 'send' ) selected @endif>@lang('message.sent')</option>
                      <option value="partially_paid" @if( @$paid == 'partially_paid' ) selected @endif>Частично оплачен</option>
                      <option value="paid" @if( @$paid == 'paid' ) selected @endif>@lang('message.paid')</option>
                    </select>
                  </div>
                  <div class="input-block">
                    <label>@lang('message.results_period')</label>
                    <select name="report_period" class="report_period-select" placeholder="Выберите год">
                      @foreach($reportPeriod as $k => $v)
                      <option value="{{$k}}" @if($k == $report_period) selected @endif>{{$v}}</option>
                      @endforeach
                    </select>
                    <label class="checkbox-label">
                      <input type="checkbox" value="1" name="placing" @if(@$params['placing']) checked @endif><span>&nbsp;@lang('message.employment__')</span>
                    </label>
                  </div>
                  <div class="input-block">
                    <label style="text-transform: capitalize;">@lang('message.recipient')</label>
                    <select name="recipient" class="recipient-select">
                      <option value="-">-</option>
                      @foreach($our_details as $company)
                        <option value="{{$company->id}}" @if($params['recipient'] == $company->id) selected @endif>{{$company->name_short}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-block mr0">
                    <button class="crm-button">@lang('message.find')</button>
                  </div>
                </div>
              </form>
            </div>
            {{--@endif--}}
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
            </div>
            @if(count($bills))
            <div class="bills-table data-table">
              <div class="bills-table-thead data-thead">
                <div class="data-tr">
                  <div class="data-td bill-payersortable-td">
                    @lang('message.client')
                  </div>
                  <div class="data-td">
                    @lang('message.contract') / @lang('message.application')
                  </div>
                  <div class="data-td sortable-td bill-date @if($sort=='date') active @endif" data-sort="date" data-dir="{{($sort == 'date' && $dir == 'asc')? 'desc' : 'asc'}}">
                    @lang('message.date') создания
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'date' && $dir == 'desc') down @endif @if($sort == 'date' && $dir == 'asc') up @endif">
                      <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                      <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                    </svg>
                  </div>
                  <div class="data-td">
                    @lang('message.bill_number')
                  </div>
                  <div class="data-td bill-payer">
                    @lang('message.payer')
                  </div>
                  {{--
                  <div class="data-td">
                    Мен.
                  </div>
                  --}}
                  <div class="data-td">
                    Получатель
                  </div>
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
                @include('front.crm.manager.bills.row')
              @endforeach
              </div>
            </div>
            
              @if ($bills->lastPage() > 1)
              <div class="result-paginator" data-current-page="{{ $bills->currentPage() }}" data-total-page="{{ $bills->lastPage() }}">
                <!--
                <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span> @lang('message.show_more_leads')</button>
                -->
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
            <div class="no-company @if(count($bills)) hide @endif">
              <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M55.4393 9.32002C54.8989 9.17991 54.287 9.1667 53.3334 9.1667H30.0001C29.5508 9.1667 28.2923 9.16676 27.0315 9.19523C26.3994 9.2095 25.7865 9.23051 25.2842 9.26065C24.774 9.29126 24.5363 9.32358 24.4936 9.32938C24.4882 9.33012 24.4859 9.33042 24.4867 9.33024L24.4761 9.3328C24.035 9.43722 23.6321 9.66321 23.3131 9.98514C22.994 10.3071 22.7717 10.712 22.6713 11.154C22.6657 11.1785 22.6597 11.203 22.6534 11.2274C22.5133 11.7679 22.5001 12.3798 22.5001 13.3334V70.8334H57.5001V13.3334C57.5001 12.3897 57.4884 11.7611 57.3414 11.173L57.3338 11.1427C57.2294 10.7017 57.0036 10.2987 56.6816 9.9797C56.3597 9.66067 55.9548 9.43832 55.5128 9.33789C55.4882 9.33231 55.4637 9.32635 55.4393 9.32002ZM56.6577 4.47069C55.4568 4.16552 54.2637 4.16619 53.4285 4.16666C53.3963 4.16668 53.3646 4.1667 53.3334 4.1667H30.0001C29.5468 4.1667 28.2385 4.1667 26.9186 4.1965C26.2591 4.2114 25.5762 4.23414 24.9847 4.26963C24.4663 4.30073 23.8036 4.35153 23.3135 4.46983L23.9001 6.89999L23.3241 4.46729C21.9731 4.78715 20.7388 5.47948 19.7616 6.46564C18.7932 7.44279 18.1156 8.66961 17.8041 10.009C17.4989 11.21 17.4996 12.403 17.5 13.2383C17.5001 13.2705 17.5001 13.3022 17.5001 13.3334V73.3334C17.5001 74.7141 18.6194 75.8334 20.0001 75.8334H60.0001C61.3808 75.8334 62.5001 74.7141 62.5001 73.3334V13.3334C62.5001 13.3047 62.5001 13.2755 62.5001 13.2459C62.5005 12.3974 62.501 11.2058 62.1959 9.97548C61.8744 8.63043 61.1836 7.4018 60.2011 6.4282C59.224 5.45985 57.9972 4.78226 56.6577 4.47069Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2382 37.4999C13.2704 37.4999 13.3021 37.5 13.3333 37.5H19.9999C21.3806 37.5 22.4999 38.6192 22.4999 40V73.3333C22.4999 74.714 21.3806 75.8333 19.9999 75.8333H13.3333C8.28588 75.8333 4.16659 71.714 4.16659 66.6666V46.7096C4.13045 45.6059 4.2266 44.5017 4.45303 43.4207C4.46109 43.3822 4.47006 43.3439 4.47993 43.3059C4.80424 42.055 5.42958 40.8014 6.43216 39.7989C7.45985 38.7712 8.70847 38.141 9.97252 37.8133C11.1857 37.4988 12.3945 37.4994 13.2382 37.4999ZM13.3333 42.5C12.3797 42.5 11.7678 42.5132 11.2273 42.6533C10.6914 42.7922 10.2733 43.0288 9.96769 43.3344C9.7122 43.5899 9.47801 43.9849 9.33413 44.5075C9.19665 45.188 9.13985 45.8823 9.16496 46.5762C9.16605 46.6063 9.16659 46.6365 9.16659 46.6666V66.6666C9.16659 68.9526 11.0473 70.8333 13.3333 70.8333H17.4999V42.5H13.3333Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M66.6237 27.5C67.7274 27.4638 68.8316 27.56 69.9125 27.7864L69.4 30.2333L70.0274 27.8133C71.2783 28.1376 72.5319 28.763 73.5344 29.7655C74.5621 30.7932 75.1923 32.0419 75.52 33.3059C75.8344 34.5188 75.8338 35.6953 75.8334 36.5691C75.8334 36.6021 75.8333 36.6346 75.8333 36.6666V66.6666C75.8333 69.0978 74.8676 71.4294 73.1485 73.1484C71.4294 74.8675 69.0978 75.8333 66.6667 75.8333H60C58.6193 75.8333 57.5 74.714 57.5 73.3333V30C57.5 28.6193 58.6193 27.5 60 27.5H66.6237ZM68.8258 32.6675C68.1453 32.53 67.451 32.4732 66.7571 32.4983C66.7269 32.4994 66.6968 32.5 66.6667 32.5H62.5V70.8333H66.6667C67.7717 70.8333 68.8315 70.3943 69.6129 69.6129C70.3943 68.8315 70.8333 67.7717 70.8333 66.6666V36.6666C70.8333 35.6826 70.8204 35.1021 70.68 34.5607C70.5411 34.0247 70.3045 33.6067 69.9989 33.3011C69.7434 33.0456 69.3484 32.8114 68.8258 32.6675Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 20C30.833 18.6193 31.9523 17.5 33.333 17.5H46.6663C48.0471 17.5 49.1663 18.6193 49.1663 20C49.1663 21.3807 48.0471 22.5 46.6663 22.5H33.333C31.9523 22.5 30.833 21.3807 30.833 20Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 33.3334C30.833 31.9527 31.9523 30.8334 33.333 30.8334H46.6663C48.0471 30.8334 49.1663 31.9527 49.1663 33.3334C49.1663 34.7141 48.0471 35.8334 46.6663 35.8334H33.333C31.9523 35.8334 30.833 34.7141 30.833 33.3334Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 46.6666C30.833 45.2859 31.9523 44.1666 33.333 44.1666H46.6663C48.0471 44.1666 49.1663 45.2859 49.1663 46.6666C49.1663 48.0473 48.0471 49.1666 46.6663 49.1666H33.333C31.9523 49.1666 30.833 48.0473 30.833 46.6666Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 60C30.833 58.6193 31.9523 57.5 33.333 57.5H46.6663C48.0471 57.5 49.1663 58.6193 49.1663 60C49.1663 61.3807 48.0471 62.5 46.6663 62.5H33.333C31.9523 62.5 30.833 61.3807 30.833 60Z" fill="#3D445C"/>
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
<style type="text/css">
.mfp-bg,
.mfp-wrap,
.select2-container--open{
  z-index: 10105;
}
.iframe-popup{
  z-index: 10102;
}
.bookkeeper-bills-page .data-table{
  display: table;
}
.bookkeeper-bills-page .data-table .data-thead,
.bookkeeper-bills-page .data-table .data-tbody{
  display: table-header-group;
}
.bookkeeper-bills-page .data-table .data-thead .data-tr .data-td{
  border-top: solid 1px #CDD4D9;
}
.bookkeeper-bills-page .data-table .data-tr{
  display: table-row;
}
.bookkeeper-bills-page .data-table .data-tr .data-td{
  display: table-cell;
  border-bottom: solid 1px #CDD4D9;
}

.recipient-select{
  width: 227px;
}

.bills-search-form .field-container .input-block input,
#bookkeeper-bill-search .input-block select.bills-status-select,
#bookkeeper-bill-search .input-block select.report_period-select,
#bookkeeper-bill-search select.recipient-select{
  width: 219px;
}

</style>
@include('front.crm.scripts')
<script>
  const main_url = '/manager/bills-and-payments';
  $('.al-power-tip').powerTip({placement: 's'});
  $('.recipient-select').select2();
</script>
 