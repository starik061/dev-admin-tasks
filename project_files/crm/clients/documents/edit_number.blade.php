<div class="popup-form edit-contract-number">
	<div class="popup-form-header">
    <span>@lang('message.contract') №{{$contract->number}}</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
      </svg>
    </span>
  </div>
  <div class="popup-form-body">
    <form class="edit-contract-number-form" action="{{ route('contract.change-number', ['id' => $contract->client_id, 'contract_id' => $contract->id]) }}">
      <input type="hidden" name="client_id" value="{{$contract->client_id}}">
      <input type="hidden" name="contract_id" value="{{$contract->id}}">
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.contract_date2')</label>
          <input type="text" name="edit_date" value="{{$contract->day.'.'.$contract->month.'.'.$contract->year}}" class="datepicker--" required=""/>
        </div>
        <div class="input-block">
          <label>@lang('message.number_of_contract')</label>
          <input type="text" name="edit_number" value="{{$contract->number}}" required="" data-our_detail_id="{{$contract->our_detail_id}}" data-current_number="{{$contract->number}}"/>
        </div>
      </div>
      <div class="buttons-block">
        <button class="crm-button">@lang('message.save')</button>
        <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
      </div>
    </form>
  </div>
  <script>
  	var contractDate = datepicker('.datepicker--', {
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
		    $('[name="edit_number"]').val(d+''+m+''+y2).attr('disabled', false).trigger('change');
		  },
		});
    contractDate.setDate({{$contract->year}}, {{$contract->month-1}}, {{$contract->day}});
  </script>
</div>
