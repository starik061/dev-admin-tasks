@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$lastId = 0;
@endphp

<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details posts-block">
        <div class="favorite-viewed-tab system-info-tabs">
          @include('front.crm.settings-menu')
        </div>
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block posts-block">
          <div class="posts-list">
            <form action="{{route('sp.update')}}" method="POST">
              @csrf
              <div class="fields-container">
                <div class="input-block" style="display: flex; align-items: center;">
                  <label style="padding-top:3px">@lang('message.payment_for')&nbsp;</label>
                  <select name="period" class="payments-period">
                    @foreach($reportPeriod as $month => $name)
                    <option value="{{$month}}" @if($month == $period) selected @endif>{{$name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <table class="bonus-table">
                  <tr>
                    <td>@lang('message.manager')</td>
                    <td>@lang('message.payment3')</td>
                    <td>@lang('message.date')</td>
                  </tr>
                @foreach($salaryPayments as $sp)
                  <tr>
                    <td>{{$managers[$sp->user_id]}}</td>
                    <td>
                      <input type="text" class="table-input payment-input" value="{{$sp->value}}" name="manager[{{$sp->user_id}}][{{$sp->id}}][value]"/>
                    </td>
                    <td>
                      <input type="text" class="table-input datepicker" value="{{date('d.m.Y', strtotime($sp->date))}}" name="manager[{{$sp->user_id}}][{{$sp->id}}][date]" id="d-{{$sp->id}}"/>
                    </td>
                  </tr>
                  @php
                    if($lastId < $sp->id){
                      $lastId = $sp->id;
                    }
                  @endphp
                @endforeach
                  <tr>
                    <td class="add-row pointer">@lang('message.add_line')</td>
                  </tr>
              </table>
            
              <button class="crm-button mt20">@lang('message.save')</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')
@if(session('success') || @$success)
<div class="success-mesage">
  {!! session('name') !!}
</div>
@endif
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
<style>
.bonus-table{
  
}
.bonus-table td,
.salary-table td{
  padding: 10px;
  border: solid 1px #CDD4D9;
  position: relative;
}
.bonus-table td.add-col,
.bonus-table td.add-row,
.salary-table td.add-col,
.salary-table td.add-row{
  border:none;
}
.table-input{
  width: 100px;
  height: 15px;
  border: none;
}
.percent-input{
  width: 130px;
}
.del-col, .del-row{
  position:absolute;
  display:none;
  right: 0;
  top:4px;
  background: #fff;
  padding:3px;
  cursor: pointer;
}
.bonus-table td:hover .del-col{
  display:block;
}
.bonus-table td:hover .del-row{
  display:block;
}
.payments-period, .manager-dd{
  width:200px;
}

</style>
<script>
let managerSelect = "<select class='manager-dd'><option>-</option>";
@foreach($managers as $id => $name)
  managerSelect += `<option value="{{$id}}">{{$name}}</option>`;
@endforeach
managerSelect += "</select>";
let lastId = {{$lastId}};

const daysName = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
const monthName = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

$(document).ready(function(){
  $('.add-row').click(function(){
    lastId++;
    $(this).parent().before(`<tr><td>${managerSelect}</td><td><input type="text" class="table-input payment-input"/></td><td><input type="text" class="table-input datepicker" value="" name="" id="d-${lastId}"/></td></tr>`);  
    createDatePicker('#d-'+lastId);
    $('.manager-dd').select2({minimumResultsForSearch: -1});
  })
  $('.datepicker').each(function(){
    createDatePicker('#'+$(this).attr('id'), $(this).val());
  })
  $(document).on('change', '.manager-dd', function(){
    $(this).closest('tr').find('.payment-input').attr('name','manager['+$(this).val()+']['+lastId+'][value]');
    $(this).closest('tr').find('.datepicker').attr('name','manager['+$(this).val()+']['+lastId+'][date]');
  })
  $('.payments-period').select2({minimumResultsForSearch: -1});
  $('.payments-period').change(function(){
    window.location = '{{route('sp.index')}}?period='+$(this).val();
  })
})

let dp = [];
const createDatePicker = (selector, selectedDate = null) => {
  let currentDatepicker = datepicker(selector, {
      startDay: 1,
      customDays: daysName,
      customMonths: monthName,
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
  if(selectedDate){
    const v = selectedDate.split('.');
    const d = new Date(v[2], +v[1]-1, v[0])
    currentDatepicker.setDate(d);
  }
}

</script>
