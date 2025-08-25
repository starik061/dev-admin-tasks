<div class="popup-form zi10102">
  <div class='popup-form-header'>
    <span>@lang('message.payment_to_the_owner')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="popup-form-body">
    <form method="POST" action="/manager/supplier/payment/{{$contractBoard->contract_id}}/{{$contractBoard->board_id}}/{{$period}}/change" id="supplier-payment-form" data-id="{{$contractBoard->board_id}}">
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.supplier_payment_status')</label>
          <select class="payment-status" name="supplier_paid">
          	<option value="0">@lang('message.wait')</option>
          	<option value="1" @if($payment && $payment->supplier_paid) selected @endif>@lang('message.paid2')</option>
          </select>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.payment_form')</label>
          <select class="payment-status" name="supplier_paid_form">
          	{{--<option value="0">-</option>--}}
          	<option value="1" @if($payment && $payment->supplier_paid_form == 1) selected @endif>@lang('message.bank_tov')</option>
          	<option value="2" @if($payment && $payment->supplier_paid_form == 2) selected @endif>@lang('message.bank_fop')</option>
          	<option value="3" @if($payment && $payment->supplier_paid_form == 3) selected @endif>@lang('message.bank_form2')</option>
          </select>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.sum')</label>
          <input type="text" value="{{$payment->sum ?: $contractBoard->owner_price}}" name="sum" />
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.paid2')</label>
          <input type="text" name="supplier_paid_at" value="{{ $payment && $payment->supplier_paid_at ? date('d.m.Y', strtotime($payment->supplier_paid_at)) : date('d.m.Y') }}" class="datepicker">
        </div>
      </div>
      <div class="align-right">
        <a class="clear-new pointer">@lang('message.cancel')</a>
        <button class="submit">@lang('message.save')</button>
      </div>
    </form>
  </div>
</div>
<script>
if(typeof document.startedAt != 'undefined'){
  delete(document.startedAt);
}
document.startedAt = datepicker('.datepicker', {
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
    if(d < 10){
      d = '0' + d;
    }
    if(m < 10){
      m = '0' + m;
    }
    input.value = d+'.'+m+'.'+y;
  },
});
$('.payment-status').select2({minimumResultsForSearch: -1});
$('.clear-new').click(function(){
	$('.al-overlay3').click();
})
</script>