<div class="popup-form">
  <div class='popup-form-header'>
    <span>@lang('message.edit_signer')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="popup-form-body">
    <form method="POST" action="/manager/suppliers/{{ $supplier->id }}/companies/{{$signer->detail_id}}/signers/{{$signer->id}}/edit" id="signer-form">
      <input type="hidden" name="client_id" value="{{ $supplier->id }}"/>
      <input type="hidden" name="detail_id" value="{{ $signer->detail_id }}"/>
      <input type="hidden" name="signer_id" value="{{ $signer->id }}"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.fio')</label>
          <input type="text" name="name" value="{{$signer->name}}" required/>
        </div>
        <div class="input-block">
          <label>@lang('message.post')</label>
          <input type="text" name="post" value="{{$signer->post}}" required/>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.fio_r')</label>
          <input type="text" name="name_r" value="{{$signer->name_r}}" required/>
          <a class="ncl-2">@lang('message.receive_in_the_genitive_case')</a>
        </div>
        <div class="input-block">
          <label>@lang('message.post_r')</label>
          <input type="text" name="post_r" value="{{$signer->post_r}}" required/>
        </div> 
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.active_from')</label>
          <input type="text" name="started_at" value="{{ date('d.m.Y', strtotime($signer->started_at)) }}" class="datepicker" required>
        </div>
      </div>
      <div class="align-right">
        <a class="clear-new">@lang('message.cancel')</a>
        <button class="submit">@lang('message.save')</button>
      </div>
    </form>
  </div>
</div>
<script>
startedAt = datepicker('.datepicker', {
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
</script>