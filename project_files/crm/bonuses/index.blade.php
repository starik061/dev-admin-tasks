@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
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
            @if($bonuses)
            <form action="{{route('bonuses.update')}}" method="POST">
            @csrf
            <table class="bonus-table">
              @foreach(json_decode($bonuses->data) as $rowIndex => $row)
                <tr @if($rowIndex) class="bonus-data-row"@endif>
                @foreach($row as $colIndex => $col)
                  <td data-col_index="{{$colIndex}}">
                    @if(!$rowIndex  && !$colIndex)
                    <input type="hidden" value="{{$col}}" name="data[{{$rowIndex}}][]"/> 
                    {{$col}}
                    @else
                    <input type="text" value="{{$col}}" name="data[{{$rowIndex}}][]" class="table-input @if(!$colIndex) percent-input @endif"/>
                      @if(!$rowIndex && $colIndex)
                      <a class="del-col" data-col_index="{{$colIndex}}">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                        </svg>
                      </a>
                      @endif
                      @if(!$colIndex && $rowIndex)
                      <a class="del-row">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                        </svg>
                      </a>
                      @endif
                    @endif
                  </td>
                @endforeach
                @if($rowIndex == 0)
                  <td class="add-col pointer">@lang('message.add_col')</td>
                @endif
                </tr>
              @endforeach
                <tr>
                  <td class="add-row pointer">@lang('message.add_row')</td>
                </tr>
            </table>
            @endif
            @if($salary)
            <br><br>
            @php
            $salaryData = json_decode($salary->data);
            @endphp
            <table class="salary-table">
              <tr>
                <td>@lang('message.manager')</td>
                <td>@lang('message.stavka')</td>
                <td style="border:none;">&nbsp;</td>
                <td>@lang('message.mzp')</td>
                <td style="border:none;">&nbsp;</td>
                <td>@lang('message.taxes')</td>
              </tr>
              @php
              $i=0;
              @endphp
              @foreach((array)$salaryData->managers_salary as $indexManager => $value)
              <tr>
                <td>{{$managers[$indexManager]}}</td>
                @php
                unset($managers[$indexManager]);
                @endphp
                <td>
                  <input type="text" value="{{$value}}" name="salary[managers_salary][{{$indexManager}}]" class="table-input"/>
                </td>
                @if(!$i)
                @php
                  $i++;
                  $tax = $salaryData->tax;
                  $mzp = $salaryData->min_salary;
                @endphp
                <td style="border:none;">&nbsp;</td>
                <td>
                  <input type="text" value="{{ $mzp }}" name="salary[min_salary]" class="table-input tax-data"/>
                </td>
                <td style="border:none;">&nbsp;</td>
                <td>
                  <input type="text" value="{{ $tax }}" name="salary[tax]" class="table-input tax-data"/>
                </td>
                @endif
              </tr>
              @endforeach
              @if(count($managers))
              @foreach($managers as $indexManager => $value)
              <tr>
                <td>{{$value}}</td>
                @php
                unset($managers[$indexManager]);
                @endphp
                <td>
                  <input type="text" value="" name="salary[managers_salary][{{$indexManager}}]" class="table-input"/>
                </td>
              </tr>
              @endforeach
              @endif
            </table>
            @endif
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
  width: 60px;
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

</style>
<script>
$(document).ready(function(){
  $('.add-col').click(function(){
    const colIndex = $('.bonus-table tr:nth-child(1) td').length - 1
    $(this).before(`<td><input type="text" value="" name="data[0][]" class="table-input"/><a class="del-col" data-col_index="${colIndex}">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                        </svg>
                      </a></td>`);
    $('.bonus-data-row').each(function(idx){
      $(this).append(`<td><input type="text" value="" name="data[${idx+1}][]" class="table-input"/></td>`);
    });
    reindexTable();
  });
  $('.add-row').click(function(){
    const cellCount = $('.bonus-table tr:nth-child(1) td').length - 2 ;
    const lastRowIndex = $('.bonus-table tr').length - 1;
    $(this).parent().before(`<tr><td><input type="text" value="" name="data[${lastRowIndex}][]" class="table-input percent-input"/><a class="del-row">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                        </svg>
                      </a></td></tr>`);
    for(let i = 0; i < cellCount; i++){
      $('.bonus-table tr:nth-child('+(lastRowIndex+1)+')').append(`<td><input type="text" value="" name="data[${lastRowIndex}][]" class="table-input"/></td>`);
    }
    reindexTable();
  })
  $(document).on('click', '.bonus-table .del-col', function(){
    const idx = $(this).data('col_index');
    createConfirm("Удалить столбец!", "Вы дейсмтвительно хотите удалить столбец?", function(){
      $('.bonus-table tr').each(function(){
        $('td[data-col_index='+idx+']').remove();
      });
      reindexTable();
    })
  })
  $(document).on('click', '.bonus-table .del-row', function(){
    let _this = this;
    createConfirm("Удалить столбец!", "Вы дейсмтвительно хотите удалить столбец?", function(){
      $(_this).closest('tr').remove();
      reindexTable();
    })
  })
  $('.tax-data').change(function(){
    $(this).val($(this).val().split(',').join('.'));
  })
})

const reindexTable = () => {
  $('.bonus-table tr').each(function(rowIndex){
    $(this).find('td').each(function(colIndex){
      $(this).data('col_index',colIndex);
      $(this).attr('data-col_index',colIndex);
      $(this).find('.del-col').data('col_index', colIndex);
      $(this).find('.del-col').attr('data-col_index', colIndex);
    })
  })
}
</script>
