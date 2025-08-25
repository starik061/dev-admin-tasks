@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <a class="back" href="/manager/suppliers">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            Назад
          </a>
        </div>
        <div class="container  container-base">

          @include('front.crm.suppliers.header')
          @include('front.crm.suppliers.menu')
          <div class="client-tab-data-block">
            <form action="{{ route('suppliers.parser.store', ['id' => $supplier->id]) }}" method="POST">
              <input type="hidden" value="{{ $supplier->id }}" name="supplier_id"/>
              @csrf
              <div class="tab-body">
                <div class="tab-content" id="main-info">
                  <div class="info-block">
                    <h2 class="info-block-title">@lang('message.basic_information')</h2>
                    <div class="field-container">
                      <div class="input-block wide-select">
                        <label>@lang('message.name2')</label>
                        <input type="text" value="{{ old('name') }}" name="name"/>
                      </div>
                      <div class="input-block">
                        <div class="switcher-block">
                          <div class="switcher-label">@lang('message.active_parser')</div>
                          <div class="switcher">
                            <input type='checkbox' class='ios8-switch' name="active" value="true" id="active">
                            <label for='active'>&nbsp;</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field-container">
                      <div class="input-block wide-select">
                        <label>@lang('message.description')</label>
                        <input type="text" value="{{ old('descr') }}" name="descr"/>
                      </div>
                      <div class="input-block wide-select cities-select">
                        <label>@lang('message.city') </label>
                        <select class="js-example-basic-multiple-- tagged-cities" name="cities[]" multiple="multiple" id="lead_cities">
                        @foreach($cities as $key => $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="input-block">
                        <label>E-mail</label>
                        <input type="text" value="{{ old('email') }}" name="email"/>
                      </div>
                      <div class="input-block">
                        <label>@lang('message.link_to_grid')</label>
                        <input type="text" value="{{ old('link') }}" name="link"/>
                      </div>
                    </div>
                    <div class="field-container">
                      <div class="input-block">
                        <label>@lang('message.comment1')</label>
                        <input type="text" value="{{ old('comment') }}" name="comment"/>
                      </div>
                    </div>
                    <hr/>
                  </div>
                    {{-- тут типа контакты но они есть отдельно --}}
                  <div class="info-block">
                    <div class="field-container">
                      <div class="input-block days-block">
                        <label>Дни отправки</label>
  @php
  $week_days = [
    'Mon' => __('message.monday'),
    'Tue' => __('message.tuesday'),
    'Wed' => __('message.wednesday'),
    'Thu' => __('message.thursday'),
    'Fri' => __('message.friday'),
    'Sat' => __('message.saturday'),
    'Sun' => __('message.sunday')
  ];
  @endphp                      
                        <select name="send_days[]" class="send_days" multiple="multiple">
                          @foreach($week_days as $k => $v)
                          <option value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="input-block">
                        <label>@lang('message.send_frequency')</label>
  @php
  $send_week = [
    1 => __('message.weekly'),
    2 => __('message.weekly'),
    3 => __('message.weekly'),
    4 => __('message.weekly')
  ];
  @endphp
                        <select name="send_week" class="send_week">
                          @foreach($send_week as $k => $v)
                          <option value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="input-block">
                        <label>@lang('message.last_send')</label>
                        <input type="text" value="{{ old('last_send') }}" name="last_send"/>
                      </div>
                      <div class="input-block">
                        <label>@lang('message.next_send')</label>
                        <input type="text" value="{{ old('next_date') }}" name="next_date"/>
                      </div>
                      <div class="input-block">
                        <label>@lang('message.extra_charge')</label>
                        <input type="text" value="{{ old('markup') }}" name="markup"/>
                      </div>
                      <div class="input-block">
                        <label>@lang('message.VAT')</label>
                        <div class="form_toggle">
                          <div class="form_toggle-item item-1">
                            <input id="fid-1" type="radio" name="fix_price" value="1">
                            <label for="fid-1">@lang('message.VAT')</label>
                          </div>
                          <div class="form_toggle-item item-2">
                            <input id="fid-2" type="radio" name="fix_price" value="0" checked>
                            <label for="fid-2">@lang('message.without_nds3')</label>
                          </div>
                        </div>
                      </div>
                      <div class="input-block">
                        <div class="switcher-block">
                          <div class="switcher-label">@lang('message.hide_price2')</div>
                          <div class="switcher">
                            <input type='checkbox' class='ios8-switch' name="hidden_price" value="1" id="hidden_price" >
                            <label for='hidden_price'>&nbsp;</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <br>
                  <div class="field-container">
                    <div class="input-block days-block employment-text">
                      <label>@lang('message.free_text')</label>
                      <select name="free_text[]" multiple="multiple" class="free_text">
                        @foreach($employmentTextFree as $k => $v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-block days-block employment-text">
                      <label>@lang('message.free_color')</label>
                      <select name="free_color[]" multiple="multiple" class="free_color">
                        @foreach($colors as $k => $v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-block days-block employment-text">
                      <label>@lang('message.reserve_text')</label>
                      <select name="reserve_text[]" multiple="multiple" class="reserve_text">
                        @foreach($employmentTextReserve as $k => $v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-block days-block employment-text">
                      <label>@lang('message.reserve_color')</label>
                      <select name="reserve_color[]" multiple="multiple" class="reserve_color">
                        @foreach($colors as $k => $v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-block days-block employment-text">
                      <label>@lang('message.busy_text')</label>
                      <select name="busy_text[]" multiple="multiple" class="busy_text">
                        @foreach($employmentTextBusy as $k => $v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-block days-block employment-text">
                      <label>@lang('message.busy_color')</label>
                      <select name="busy_color[]" multiple="multiple" class="busy_color">
                        @foreach($colors as $k => $v)
                        <option value="{{$k}}">{{$v}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr/>
            <div class="right-block">
              <a href="{{ route('suppliers.parser', ['id' => $supplier->id]) }}" class="btn cancel cancel-border">@lang('message.cancel')</a>
              <button class="btn submit">@lang('message.save')</button>
            </div>
          </form>
          <br><br>
        </div>
      </div>
    </div>
  </section>

@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.scripts')

<script>
  $('.al-power-tip').powerTip({placement: 's'});
  $(document).ready(function(){
    $('.tagged-cities').select2({
      'tags':true
    });
    $('.send_days').select2({minimumResultsForSearch: -1});
    $('.send_week').select2({minimumResultsForSearch: -1});
    $('.free_text').select2();
    $('.reserve_text').select2();
    $('.busy_text').select2();
    $('.free_color').select2();
    $('.reserve_color').select2();
    $('.busy_color').select2();

    $('.tab-item').click(function(){
      $('.tab-item').removeClass('active');
      $(this).addClass('active');
      $('.tab-content').addClass('hide');
      $($(this).data('tab')).removeClass('hide');
    })
  });
</script>
<style>
.field-container{
  display:flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.switcher-block{
  justify-content: flex-start;
}
.field-container .input-block{
  width: 340px;
  margin-right: 20px;
}
.input-block input[type=text],
.input-block select{
  width: 340px;
}
.field-container .wide-select{
  width: 700px;
}
.field-container .wide-select input[type=text]{
  width: 700px;
}
/*--*/
.tab-navigate{
  list-style:none;
  margin: 0;
  padding: 0;
  border-bottom: solid 1px #cdd4d9;
}
.tab-navigate li{
  cursor: pointer;
  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 18px;
  line-height: 22px;
  color: #FC6B40;
  padding-bottom: 7px;
  display: inline-block;
  margin-right: 20px;
  border-bottom: 2px solid rgba(0,0,0,0);
}
.tab-navigate li:hover,
.tab-navigate li.active{
  border-bottom: 2px solid #fc6b40;
  color: #3D445C;
}
.tab-content{
  padding-top:20px;
}
.tab-content.hide{
  display:none;
}
/* select css */
.cities-select .select2-container,
.days-block .select2-container{
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;
  /*width: 340px;*/
  font-family: "Helvetica Neue";
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;
  background: white;
}
.cities-select .select2-selection__rendered,
.days-block .select2-selection__rendered{
  height:  40px;
  background: white;
}
.cities-select .select2-container--default .select2-selection--single,
.days-block .select2-container--default .select2-selection--single{
  width: 100%;
  height: 40px !important;
  border: none !important;
}
.cities-select .select2-container--default .select2-selection--single .select2-selection__rendered,
.days-block .select2-container--default .select2-selection--single .select2-selection__rendered{
  padding: 0 !important;
}
.input-block.cities-select .select2-selection__rendered,
.input-block.days-block .select2-selection__rendered {
  height: auto;
  background: white;
  flex-wrap: wrap;
}
.cities-select  .select2-container--default .select2-selection--multiple,
.days-block  .select2-container--default .select2-selection--multiple{
  border: none;
  padding-bottom:0;
}
.cities-select  .select2-container--default .select2-selection--multiple .select2-selection__choice,
.days-block  .select2-container--default .select2-selection--multiple .select2-selection__choice{
  line-height: 28px;
  border: none;
  border-radius: 0;
  display: flex;
  align-items: center;
}
.cities-select .select2-container--default .select2-selection--multiple .select2-selection__choice__display,
.days-block .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
  padding: 0px 4px 0px 5px;
  font-size: 13px;
}
.cities-select .select2-selection__choice__remove span,
.days-block .select2-selection__choice__remove span{
  width: 12px;
  height: 12px;
  display: block;
  line-height: 12px;
  margin-right: 5px;
}
.cities-select .select2-container--default .select2-selection--multiple .select2-selection__choice__remove,
.days-block .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
  border-right: none;
}
.cities-select .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,
.days-block .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
  background: none;
}
.cities-select .select2-container--default .select2-search--inline .select2-search__field,
.days-block .select2-container--default .select2-search--inline .select2-search__field{
  line-height: 30px;
}
.cities-select .select2-container--default.select2-container--focus .select2-selection--multiple,
.days-block .select2-container--default.select2-container--focus .select2-selection--multiple{
  border: none;
}
.tagged-select .wide-select{
  width: 695px;
  margin-right: 0px;
}
.lead-block .input-block.wide-select select{
  width: 695px;
  height: 40px;
}
.tagged-select .wide-select .select2-selection.select2-selection--multiple{
  display: flex;
  height: 40px;
}
.tagged-select .wide-select .select2-selection__rendered{
  width: auto;
  height: 40px;
}
.tagged-select .wide-select .select2-container--default .select2-selection--multiple .select2-selection__choice{
  margin-top: 1.5px;
  margin-bottom: 1.5px;
}
.tagged-select .wide-select .select2-container--default .select2-search--inline .select2-search__field{
  line-height: 33px;
}
.days-block .select2.select2-container.select2-container--default{
  height: 40px;
}
.days-block .select2-search.select2-search--inline {
  display: none;
}
.days-block.employment-text .select2-search.select2-search--inline{
  display: inline-block;
}
.days-block .select2.select2-container.select2-container--default .selection,
.days-block .select2-container--default .select2-selection--multiple{
  height: 38px;
}
.days-block.employment-text .select2.select2-container.select2-container--default .selection,
.days-block.employment-text .select2-container--default .select2-selection--multiple,
.days-block.employment-text .select2.select2-container.select2-container--default{
  height: auto;
}
/* radio */
.input-block .form_toggle-item label {
  display: inline-block;
  padding: 0px/* 15px*/;   
  line-height: 42px;    
  border: 1px solid #CDD4D9;
  border-right: none;
  cursor: pointer;
  user-select: none; 
  width: 170px;  
  height: 42px;
  box-sizing: border-box;
  background: #fff;

  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  text-align: center;
  color: #3D445C;

}

</style>