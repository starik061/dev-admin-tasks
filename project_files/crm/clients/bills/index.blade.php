@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base bills-page">
          <a class="back" href="/manager/clients">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            @lang('message.back')
          </a>
        </div>
        <div class="container container-base bills-page">
          @include('front.crm.clients.header')
          @include('front.crm.clients.inner-menu')
          <div class="client-tab-data-block pt0">
            {{--
            <div class="bills-switcher">
              <a href="/manager/clients/{{ $client->id }}/bills" class="@if(!$owners_bill) active @endif">@lang('message.bills_for_clients')</a> 
              <!--
              <a href="#" class="@if($owners_bill) active @endif">Счета собственников</a>
              -->
            </div>
            --}}
            @if(count($bills) > 1 )
            <div class="bills-search-form">
              {{--
              <form action="{{ route('client.bills', ['id' => $client->id]) }}" method="GET" id="bill-search">
              --}}
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
                      <option value="wait" @if( @$paid == 'wiat' ) selected @endif>@lang('message.wait')</option>
                      <option value="send" @if( @$paid == 'send' ) selected @endif>@lang('message.sent')</option>
                      <option value="partially_paid" @if( @$paid == 'partially_paid' ) selected @endif>@lang('message.partially_paid2')</option>
                      <option value="paid" @if( @$paid == 'paid' ) selected @endif>@lang('message.paid')</option>
                    </select>
                  </div>
                  <div class="input-block">
                    <label>@lang('message.year')</label>
                    <select name="year[]" class="bills-year-select">
                      <option value="">-</option>
                      @foreach($years as $v)
                      <option value="{{$v}}" @if(in_array($v, $year)) selected @endif>{{$v}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-block mr0">
                    <label>@lang('message.month2')</label>
                    <select name="month[]" class="bills-month-select">
                      <option value="">-</option>
                      @foreach($months as $v)
                      <option value="{{$v}}" @if(in_array($v, $month)) selected @endif>{{$months_i[$v]}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              {{--  
                <input type="submit" class="hide"/>
              </form>
              --}}
            </div>
            @endif
            <div class="client-contacts-header mb20 mt20">
              <div class="left-block bills-stat">
                <span>@lang('message.created_bills'): <b>{{$data['bills_count']}}</b></span>
                <span>@lang('message.waiting'): <b>{{$data['bills_wait']}}</b></span>
                <span>@lang('message.sent_to_client'): <b>{{$data['bills_send']}}</b></span>
                <span>@lang('message.paid2'): <b>{{$data['bills_paid']}}</b></span>
              </div>
              <div class="right-block">
                {{--@if(Auth::user()->role_id != 5)--}}
                @if(Auth::user()->id !==263 && Auth::user()->id != 273)
                  {{--@if(in_array(Auth::user()->id, [1,202,207,262,277]) && in_array($client->id,[11, 30, 162, 27, 53, 309, 359, 669, 439, 465, 467, 643, 670, 672, /*717,*/ 755, 793, 818, 840, 856, 877, 879, 932, 951, 957, 975, 1021, 1026, 1152, 1206/*, 723*/]))--}}
                  @if(in_array($currentUser->id, [1, 202, 207, 262, 277, 300]) && $client->available_bill_without_contract === 1)
                    <a href="/manager/clients/{{ $client->id }}/bills/add" class="btn submit bills-add-link">@lang('message.create_bill')</a>
                    <a class="btn submit bills-add-without-contract-link">@lang('message.create_bill_without_contract')</a>
                  @else
                    @if(count($contracts))
                      <a href="/manager/clients/{{ $client->id }}/bills/add" class="btn submit bills-add-link">@lang('message.create_bill')</a>
                    @else
                      <a class="btn submit bills-add-without-contract-link">@lang('message.create_bill_without_contract')</a>
                    @endif
                  @endif
                  {{--
                  @if(Auth::user()->id == 202)
                    <a class="btn submit bills-add-without-contract-link">@lang('message.create_bill_without_contract')</a>
                  @endif
                  --}}
                @endif
                {{--@endif--}}
              </div>
            </div>
            @if(count($bills))
            <div class="bills-table data-table">
              <div class="bills-table-thead data-thead">
                <div class="data-tr">
                  @if(Auth::user()->id != 273)
                  <div class="data-td">
                    @lang('message.contract') / @lang('message.application')
                  </div>
                  @endif
                  <div class="data-td">
                    @lang('message.creation_date')
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
                  
                  <div class="data-td">
                    @lang('message.pay_date2')
                  </div>
                  
                  <div class="data-td bill-status-td">
                    @lang('message.status')
                  </div>
                  <div class="data-td bill-action">
                    &nbsp;
                  </div>
                </div>
              </div>
              <div class="bills-table-tbody data-tbody">
              @foreach($bills as $key => $bill)
                @include('front.crm.clients.bills.row')
              @endforeach
              </div>
            </div>
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
@include('front.crm.clients.bills.prepare-form')
<div class="status-popup  zi10101">
  <div class='status-header'>
    <span>@lang('message.change_status')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="status-form">
    <form class="status-form-change" id="status-change">
      <input type="hidden" name="client_id" value="{{$client->id}}"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.status')</label>
          <select class="status-select" name="status" id="status-select">
            <option value="wait" data-color="#FC6B40" data-background="#FCE9E4">@lang('message.wait')</option>
            <option value="4" data-color="#FC6B40" data-background="#FCE9E4" disabled>@lang('message.approved')</option>
            <option value="send" data-color="#F2994A" data-background="#FEF5ED">@lang('message.sent')</option>
            <option value="paid" data-color="#4FB14B" data-background="#EDF7ED">@lang('message.paid')</option>
          </select>
        </div>
      </div>
      <div class="buttons-block">
        <button class="crm-button">@lang('message.save')</button>
        <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
      </div>
    </form>
  </div>
</div>

<div class="bill-without-contract-popup">
  <div class='lead-add-header'>
    <span>@lang('message.add_bill_without_contract')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="contracts-add-form">
    <form class="contract-form-add" id="new_contract-3">
      <input type="hidden" name="client_id" value="{{$client->id}}"/>
      <input type="hidden" name="only_bill" value="true"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.bill_from')</label>
          <select class="our-details-select" name="our_detail_id" id="contract_our_detail_id">
            @if($our_details)
            @foreach($our_details as $key => $item)
            <option value="{{$item->id}}" data-is_nds="{{$item->is_nds == '1' ? 'true' : 'false'}}">{{ $item->name_short }}</option>
            @endforeach
            @endif
          </select>
        </div>
        <div class="input-block">
          <label>@lang('message.company')</label>
          <select class="details-select" name="detail_id" id="contract_detail_id">
            @if($details)
            @foreach($details as $key => $item)
            {{--<option value="{{$item->id}}" data-is_nds="{{$item->tax_status == '1' || $item->tax_status == '4' ? 'true' : 'false'}}">{{ ($item->client_type_id != 3) ? $item->name_short : $item->fio_full}}</option>--}}
                <option value="{{$item->id}}"
                        data-is_nds="{{$item->company_tax_status->nds === 1 ? 'true' : 'false'}}"
                        data-is_single_tax="{{$item->company_tax_status->single_tax === 1 ? 'true' : 'false'}}"
                >
                  {{ ($item->client_type_id != 3) ? $item->name_short : $item->fio_full}}
                </option>
            @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="field-container view-fix">
        <div class="input-block">
          <label>
            <input type="checkbox" name="without_pay_date">&nbsp;@lang('message.without_pay_date')
          </label>
        </div>
        <div class="input-block">
          <label>
            <input type="checkbox" name="without_payer">&nbsp;@lang('message.without_payer')
          </label>
        </div>
      </div>
      <div class="buttons-block">
        <button class="crm-button">@lang('message.save')</button>
        <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
      </div>
    </form>
  </div>
</div>

<style type="text/css">
.mfp-bg,
.mfp-wrap,
.select2-container--open{
  /*z-index: 10105;*/
}
.iframe-popup{
  z-index: 10102;
}
.bills-search-form .select2-container{
  z-index: 100;
}
</style>
@include('front.crm.scripts')
<script>
$('.al-power-tip').powerTip({placement: 's'});
/*const pusher = new Pusher('cf88bde4f51edb2e4575', {
  cluster: 'eu'
  //useTLS: true
  //enabledTransports: ['ws']
});*/
let channel2 = pusher.subscribe('boards-channel');
channel2.bind('bill-sum-change', function(data) {
  console.log(data);
  $('#bill-'+data.id+" .bill-sum").empty().append(data.itogo);
  //alert('Received my-event with message: ' + data.message);
});
var date_from = {};
var date_to = {};
const dtpicker = datepicker('.datepicker', {
  minDate: new Date({{date('Y')}}, parseInt({{date('m')}}) - 1, {{date('d')}}),
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
    if(d < 10){
      d = '0' + d;
    }
    if(m < 10){
      m = '0' + m;
    }
    /*if(m == '{{date('m')}}' && y == '{{date('Y')}}'){
      $('.first_month_pay_date').removeClass('hide');
      $('[name=first_month_pay_date]').val('').prop('required',true);
      $('.contacts-add-popup').css('height','411px').css('margin-top','-205px');
      let fmpd = date;
      if(d < 20 ){
        fmpd = new Date(y, m - 1, 20);
      }
      first_month_pay_date.setDate(null);
      first_month_pay_date.setMin(date);
      first_month_pay_date.setDate(fmpd,true);
    }else{
      $('.first_month_pay_date').addClass('hide');
      $('[name=first_month_pay_date]').val('').prop('required',false);
      $('.contacts-add-popup').css('height','328px').css('margin-top','-164px');
    }*/
    input.value = d+'.'+m+'.'+y;
    $('[name=number]').val(d+''+m+''+y2).attr('disabled', false).trigger('change');
  },
});
const dtpicker2 = datepicker('.datepicker2', {
  minDate: new Date({{date('Y')}}, parseInt({{date('m')}}) - 1, {{date('d')}}),
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
    if(d < 10){
      d = '0' + d;
    }
    if(m < 10){
      m = '0' + m;
    }
    input.value = d+'.'+m+'.'+y;
    $('[name=number]').val(d+''+m+''+y2).attr('disabled', false).trigger('change');
  },
});
/*const first_month_pay_date = datepicker('[name=first_month_pay_date]', {
  startDay: 1,
  customDays: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
  customMonths: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
  onSelect: instance => {
    console.log(instance.dateSelected)
  },
  formatter: (input, date, instance) => {
    let d = date.getDate();
    let m = date.getMonth() + 1;
    let y = date.getYear() + 1900;
    let y2 = date.getYear() - 100;
    if(d < 10){
      d = '0' + d;
    }
    if(m < 10){
      m = '0' + m;
    }
    input.value = d+'.'+m+'.'+y;
  },
});*/
const services_line = `
    <div class="services-item service-item-data">
      <div class="services-name">
        <select name="service_id[]" class="services-dd">
        @foreach($services as $service)
          <option value="{{$service->id}}">{{$service->name}}</option>
        @endforeach
        </select>
        <input type="text" class="other-input hide" name="service_other[]"/>
      </div>
      <div class="services-supplier">
        <div class="supplier-type-item">
          <input type="checkbox" name="by_supplier[##number##]" value="1"> @lang('message.performed_by_the_owner')
        </div>
        <div class="supplier-service-block">
          <select name="supplier_id[##number##]" class="services-supplier-dd">
            @foreach($defaultSuppliers as $supplier)
              <option value="{{$supplier->id}}">{{$supplier->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="services-price_in">
        <input type="text" name="service_price_in[]" class="" value="{{$services[0]->price}}">
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
document.statusChanger = {
  client_id: {{$client->id}}
};
document.user_role = {{Auth::user()->role_id}};
ajaxPopupInit();
if (window.location.hash.length) {
  if (!$(window.location.hash).length && window.location.hash.indexOf('-divide') != -1) {
    const openLink = `<a class="ajax-bill-popup-link" href="/manager/bills/${window.location.hash.split('#')[1].split('-')[1]}/divide" id="${window.location.hash.split('#')[1]}" style="display:none">&nbsp;</a>`;
    $('body').append(openLink);
    ajaxBillDividePopup();
  }
  $(window.location.hash).trigger('click');
}
</script>