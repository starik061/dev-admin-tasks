<div class="popup-form zi10102">
  <div class='popup-form-header'>
    <span>@lang('message.data_export')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="popup-form-body">
    <form method="POST" action="/manager/export-data/contragent/{{$contragent}}" id="export-form">
    	<div class="field-container">
        <div class="input-block mb-0">
          <label>@lang('message.from2')</label>
          <input type="text" name="date_from" value="" class="datepicker-date_from">
        </div>
        <div class="input-block mb-0">
          <label>@lang('message.over')</label>
          <input type="text" name="date_to" value="" class="datepicker-date_to">
        </div>
      </div>
      <hr>
      <div class="field-container">
      	@php 
      		$i = 0;
      		$n = count($fields);
      	@endphp
      	<div style="width:263px">
        @foreach($fields as $key => $value)
        @if($i < $n / 2 )
        <label>
        	<input type="checkbox" name="params[]" value="{{$key}}" checked>&nbsp;{{$value}}
        </label><br>
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
        @foreach($fields as $key => $value)
        @if($i >= $n / 2 )
        <label>
        	<input type="checkbox" name="params[]" value="{{$key}}" checked>&nbsp;{{$value}}
        </label><br>
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
          <label>
            <input type="checkbox" name="leads_and_clients" value="1" checked>&nbsp;@lang('message.export_leads_and_clients')
          </label><br>
          <label>
            <input type="checkbox" name="only_visible" value="1" checked>&nbsp;@lang('message.export_only_visible')
          </label><br>
          <label>
            <input type="checkbox" name="by_lead_created_at" value="1" checked>&nbsp;@lang('message.export_clients_by_lead_dates')
          </label>
        </div>
      </div>
      <hr>
      <div class="field-container">
  			<div class="input-block" style="width:180px;">
  				<div class="form_toggle">
						<div class="form_toggle-item item-1">
							<input id="fid-1" type="radio" name="file_type" value="csv" checked>
							<label for="fid-1">CSV</label>
						</div>
						<div class="form_toggle-item item-2">
							<input id="fid-2" type="radio" name="file_type" value="xlsx">
							<label for="fid-2">XLSX</label>
						</div>
					</div>
  			</div>
        <div class="input-block" style="width:346px;">
          <select name="encoding" style="width:200px;">
            <option value="windows-1251">Windows</option>
            <option value="UTF-8">Linux</option>
            {{--<option value="macOS">MacOS</option>--}}
          </select>
        </div>
  		</div>
      <div class="align-right">
        <a class="clear-new pointer">@lang('message.cancel')</a>
        <button class="submit">@lang('message.download')</button>
      </div>
    </form>
  </div>
</div>
<style type="text/css">
	#export-form .lds-ellipsis3 div {
		background: #fff;
	}
</style>
<script>
if(typeof document.dateFrom != 'undefined'){
  delete(document.dateFrom);
}
if(typeof document.dateTo != 'undefined'){
  delete(document.dateTo);
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
    if(d < 10){
      d = '0' + d;
    }
    if(m < 10){
      m = '0' + m;
    }
    input.value = d+'.'+m+'.'+y;
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
    if(d < 10){
      d = '0' + d;
    }
    if(m < 10){
      m = '0' + m;
    }
    input.value = d+'.'+m+'.'+y;
  },
});
$('.clear-new').click(function(){
	$('.al-overlay3').click();
})
</script>