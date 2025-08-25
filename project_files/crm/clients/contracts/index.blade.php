@include('add.head')
<body>
@include('add.header')
@include('add.menu')

<section class="lead-block">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters navigation-wrapper">
      <div class="container container-base">
        <a class="back" href="/manager/clients">
          <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
          </svg>
          @lang('message.back')
        </a>
      </div>
      <div class="container  container-base">
        @include('front.crm.clients.header')
        @include('front.crm.clients.inner-menu')
        <div class="client-tab-data-block">
          <div class="client-contacts-header mb20">
            <div class="left-block">
              @if(count($contracts) > 1)
                <form action="/manager/clients/{{$client->id}}/contracts" method="GET" class="input-block search-form">
                  <label for="company_search">@lang('message.search')</label>
                  <input type="text" name="s" value="{{ $_GET['s'] }}" id="company_search">
                  <svg class="clear-search  @if(!$_GET['s']) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
                  </svg>
                </form>
              @endif
            </div>
            @if(count($details))
              @if(Auth::user()->role_id != 5)
                <div class="right-block">
                  <a href="/manager/clients/{{ $client->id }}/contracts/add" class="btn submit contracts-add-link">@lang('message.add_contract')</a>
                </div>
              @endif
            @endif
          </div>
          {{--<hr class="mtb20"/>--}}
          @if(count($contracts))
            <div class="clients-contracts-data">
              <div class="data-table">
                <div class="data-thead">
                  <div class="data-tr">
                    <div class="data-td td-name">@lang('message.company_name_lc')</div>
                    <div class="data-td">@lang('message.contract_date')</div>
                    <div class="data-td f2">@lang('message.status_lc')</div>
                    <div class="data-td action-col"></div>

                  </div>
                </div>
                <div class="data-tbody contracts-rows">
                  @include('front.crm.clients.contracts.rows')
                </div>
              </div>
            </div>
          @endif
          <div class="no-company @if(count($contracts)) hide @endif">
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
                @lang('message.no_contracts')
              </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')


<div class="photoreports-popup" style="z-index: 10006">
  <div class='popup-header'>
    <span>@lang('message.edit_photoreport')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="popup-body">
    <div class="buttons-block right-buttons">
      <a class="cancel">@lang('message.cancel')</a>
      <a class="crm-button">@lang('message.save')</a>
    </div>
  </div>
</div>
<div class="photoreports-popup2" style="z-index: 10006">
  <div class='popup-header'>
    <span>@lang('message.create_photoreport')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="popup-body">
    <div class="buttons-block right-buttons">
      <a class="cancel">@lang('message.cancel')</a>
      <a class="crm-button">@lang('message.save')</a>
    </div>
  </div>
</div>

<div class="contacts-add-popup">
  <div class='lead-add-header'>
    <span>@lang('message.add_contract')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="contracts-add-form">
    <form class="contract-form-add" id="new_contract-2">
      <input type="hidden" name="client_id" value="{{$client->id}}"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.contract_from')</label>
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
                        data-is_single_tax="{{$item->company_tax_status->single_tax === 1 || $item->id === 1819 ? 'true' : 'false'}}"
                >
                  {{ ($item->client_type_id != 3) ? $item->name_short : $item->fio_full}}
                </option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.contract_date2')</label>
          <input type="text" name="date" value="" class="datepicker" required/>
        </div>
        <div class="input-block">
          <label>@lang('message.number_of_contract')</label>
          <input type="text" name="number" value="" required/>
        </div>
      </div>
      <div class="field-container first_month_pay_date hide">
        <div class="input-block">
          <label>@lang('message.payment_current_month')</label>
          <input type="text" name="first_month_pay_date" value="" class="datepicker"/>
        </div>
        <div class="input-block">
          <label>@lang('message.contract_valid_until')</label>
          <input type="text" name="valid_until" value="" class="datepicker"/>
        </div>
      </div>
      <div class="buttons-block">
        <button class="crm-button">@lang('message.save')</button>
        <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
      </div>
    </form>
  </div>
</div>
<div class="al-overlay hide"></div>
<div class="status-popup" style="height: 350px">
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
            @foreach($statuses as $value)
              @if(($value->id == 2 && Auth::user()->role_id == 2) || ($value->id == 3 && in_array(Auth::user()->role_id, [1, 5])) || ($value->id != 2 && $value->id != 3))
                <option value="{{$value->id}}" data-color="{{$value->color}}" data-background="{{$value->background}}">{{$value->name}}</option>
              @endif
            @endforeach
          </select>
          <div class="input-block">
            <label for="note">@lang('message.note')</label>
            <textarea class="status-note-textarea" name="note" id="note" style="width: 100%" placeholder="@lang('message.enter_note')"></textarea>
          </div>
        </div>
      </div>
      <div class="buttons-block">
        <button class="crm-button">@lang('message.save')</button>
        <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

</script>
<script src="/assets/js/slick/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/assets/js/mp/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
<script src="/assets/js/datepicker.min.js"></script>

<script type="text/javascript">
  $('.al-power-tip').powerTip({placement: 's'});
  const dtpicker = datepicker('.datepicker', {
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
      if(m == '{{date('m')}}' && y == '{{date('Y')}}'){
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
      }
      input.value = d+'.'+m+'.'+y;
      $('[name=number]').val(d+''+m+''+y2).attr('disabled', false).trigger('change');
    },
  });
  const first_month_pay_date = datepicker('[name=first_month_pay_date]', {
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
    },
  });
  first_month_pay_date.setDate(new Date({{ date('Y') }}, {{ (int)date('m')-1 }}, 1), true);
  const monthDays = [31,28,31,30,31,30,31,31,30,31,30,31];
  const valid_until = datepicker('[name=valid_until]', {
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
    },
  });
  valid_until.setDate(new Date({{ (date('Y')+1) }}, {{ (date('m')-1) }}, monthDays[{{ (date('m')-1) }}]), true); // 11 - декабрь
  document.del_click = false;
  //var contract_id = null;
  //var contract_act_id = null;
  //var main_url = '/manager/clients';
  document.statusChanger = {
    client_id: {{$client->id}}
  };
  var page_type = 'clients';
  var can_change = false;
  var date_from = {};
  var date_to = {};
  const services_line = `
    <div class="services-item service-item-data">
      <div class="services-name">
        <select name="service_id[]" class="services-dd">
        @foreach($services as $service)
  <option value="{{$service->id}}" data-price_in="{{$service->price}}">{{$service->name}}</option>
        @endforeach
  </select>
  <input type="text" class="other-input hide" name="service_other[]"/>
</div>
<div class="services-supplier">
  <div class="supplier-type-item">
    <input type="checkbox" name="by_supplier[]" value="1"> @lang('message.many_suppliers')
  </div>
  <div class="supplier-service-block">
    <select name="supplier_id[]" class="services-supplier-dd">
@foreach($defaultSuppliers as $supplier)
  <option value="{{$supplier->id}}">{{$supplier->name}}</option>
            @endforeach
  </select>
</div>
</div>

<div class="services-price_in">
<input type="text" name="service_price_in[]" class="sp_in" value="{{$services[0]->price}}">
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
      <div class="sub-service hide"></div>
      <div class="sub-service-action hide">
        <a class="add-sub-service-line pointer">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z" fill="#FC6B40"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z" fill="#FC6B40"/>
          </svg>
          @lang('message.add_additional_supplier')
  </a>
</div>
</div>
`;

  const subServiceLine = `
              <div class="services-item service-item-data">
                  <div class="services-name">
                      <input type="hidden" name="service_id[]" value="##serviceId##" class="hide"/>
                      <input type="text" class="other-input hide" name="service_other[]" value="##serviceOther##"/>
                  </div>
                  <div class="services-supplier">
                       <select name="supplier_id[]" class="services-supplier-dd">##select##</select>
                  </div>
                  <div class="services-price_in">
                      <input type="text" name="service_price_in[]" class="sp_in" value="##pricePurchase##">
                  </div>
                  <div class="services-price">
                      <input type="text" name="service_price[]" class="sp" value="##priceSale##" required style="display:none">
                  </div>
                  <div class="services-count">
                      <input type="text" name="service_count[]" class="sc" required>
                  </div>
                  <div class="services-result">
                      <input type="text" name="service_result[]" class="sr" required style="display:none">
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
</script>

<script src="/assets/js/crm.js?t=20250310"></script>
<style>
  .contract-creating .select2-dropdown--below{
    width: 263px !important;
  }
  .al-power-tip{
    margin-left:5px;
  }

  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    line-height: 28px;
    border: none;
    border-radius: 0;
    display: flex;
    align-items: center;
  }

</style>
<script>
  let startSending = false;
  $(document).on('click', '.update-contract-file', function(){
    if(startSending){
      return false;
    }
    let _this = this;
    startSending = true;
    const contractId = $(this).data('id');
    $('body').append('<div class="global-loader"></div>');
    $.ajax({
      url: `/manager/clients/{{$client->id}}/contracts/${contractId}/update-file`,
      data: null,
      type: "post",
      dataType: "json",
      contentType: "application/json",
      processData: false,
      success: function(data){
        toastr.success(data.message);
        startSending = false;
        const dwnLink = `/manager/clients/{{$client->id}}/contract/${contractId}/download/${data.file_id}`
        $(_this).closest('.data-tr.tr-action.pointer').find('.pointer.edit-contract').data('id', data.file_id);
        $(_this).closest('.data-tr.tr-action.pointer').find('.pointer.view-contract').attr('href', `https://drive.google.com/file/d/${data.file_id}}/view`);
        $(_this).closest('.data-tr.tr-action.pointer').find('.docx_download').attr('href', dwnLink);
        $(_this).closest('.data-tr.tr-action.pointer').find('.pdf_download').attr('href', dwnLink+'?pdf=true');
        $('.global-loader').remove();
      },
      error: function(xhr, ajaxOptions, thrownError){
        toastr.error(xhr.responseJSON.message, "Ошибка", {timeOut: 5000});
        startSending = false;
        $('.global-loader').remove();
      }
    })
  })
</script>

<script type="text/javascript">
  $('.al-power-tip').powerTip({placement: 'n'});

  let photoreportData = {
    id: null,
    photo_design: null,
    photo_near: null,
    photo_far: null,
    photo_night: null,
    ym: "{{ $period }}",
    client_view: false,
    client_id: {{$client->id}}
  }
</script>