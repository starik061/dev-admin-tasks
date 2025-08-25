@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <a class="back" href="/manager/leads">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            Назад
          </a>
          <h1 class="title">@lang('message.lead_edit')</h1>
          <div class="lead-block-info">
            <form method="POST" id="edit-leads-form">
              @csrf
              <input type="hidden" id="{{ $lead->id }}"/>
              <h2>@lang('message.information')</h2>
              <div class="field-container">
                <div class="input-block">
                  <label>@lang('message.company_name2')</label>
                  <input type="text" name="name" value="{{ $lead->name }}" required/>
                  @if($errors['name'])
                    <span class="error">{{ $errors['name'] }}</span>
                  @endif
                </div>
              </div>
              <div class="field-container">
                <div class="input-block">
                  <label>@lang('message.name')</label>
                  <input type="text" name="fio" value="{{ $lead->fio }}" />
                  @if($errors['fio'])
                  <span class="error">{{ $errors['fio'] }}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>E-mail</label>
                  <input type="text" name="email" value="{{ $lead->email }}"/>
                  @if($errors['email'])
                  <span class="error">{{ $errors['email'] }}</span>
                  @endif
                </div>
                <div class="input-block mr0">
                  <label>@lang('message.phone')</label>
                  <input type="text" name="phone" id="lead_phone" value="{{ $lead->phone }}"/>
                  @if($errors['phone'])
                  <span class="error">{{ $errors['phone'] }}</span>
                  @endif
                </div>
              </div>
              <div class="addition-phones">
                @if(count($lead->contacts))
                @foreach($lead->contacts as $index => $contactData)
                @php
                  if(!$index){
                    continue;
                  }
                @endphp
                <div class="field-container">
                  <div class="input-block">
                    <!--<label>@lang('message.name')</label>-->
                    <input type="text" name="add_name[]" value="{{ $contactData->fio }}"/>
                  </div>
                  <div class="input-block">
                    <!--<label>E-mail</label>-->
                    <input type="text" name="add_email[]" value="{{$contactData->email}}"/>
                  </div>
                  <div class="input-block mr0">
                    <!--<label>@lang('message.phone')</label>-->
                    <input type="text" name="add_phone[]" value="{{$contactData->phone}}"/>
                  </div>
                  
                    <span class="addition-contact-del">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                      </svg>
                    </span>
                  
                </div>
                @endforeach
                @endif
              </div>
              <div class="field-container add-contact-line">
                <a class="crm-button pointer">@lang('message.add_phone_email')</a>
              </div>
              <div class="hr"></div>
              <div class="field-container">
                <div class="input-block">
                  <label>@lang('message.telegram_profile')</label>
                  <input type="text" name="tg_name" id="lead_tg_name" value="{{ $lead->tg_name }}"/>
                </div>
                <div class="input-block wide-select">
                  <label>@lang('message.city')</label>
                  <select class="js-example-basic-multiple-- tagged-cities" name="cities[]" multiple="multiple" id="lead_cities">
                  @foreach($cities as $key => $item)
                    <option value="{{$item->id}}" @if(in_array($item->id, $lead->citiesIds)) selected @endif>{{$item->name}}</option>
                  @endforeach
                  </select>
                  @if($errors['cities'])
                  <span class="error">{{ $errors['cities'] }}</span>
                  @endif
                </div>
              </div>
              <div class="hr"></div>
              <h2>@lang('message.chanel')</h2>
              <div class="field-container">
                <div class="input-block">
                  <label>@lang('message.chanel-title')</label>
                  <select name="channel" class="al-dropdown">
                    <option value="телеграмм" @if($lead->channel == 'телеграмм') selected @endif>@lang('message.telegram')</option>
                    <option value="вайбер" @if($lead->channel == 'вайбер') selected @endif>@lang('message.viber')</option>
                    <option value="телефон" @if($lead->channel == 'телефон') selected @endif>@lang('message.phone_')</option>
                    <option value="почта" @if($lead->channel == 'почта') selected @endif>@lang('message.mail')</option>
                  </select>
                </div>
              </div>
              <div class="hr"></div>
              <h2>@lang('message.comment1')</h2>
              <div class="field-container">
                <div class="textarea-block">
                  <label>@lang('message.note')</label>
                  <textarea name="comment">{{ $lead->comment }}</textarea>
                </div>
              </div>
              <div class="hr"></div>
              <h2>@lang('message.statuses')</h2>
              <div class="tabs-item status-tab" id="t-{{$lead->id}}-status" style="background:#fff;padding:20px;">
                <div class="status-div">
                  @php
                    $statusLog = $lead->statusLog();
                  @endphp
                  @if($statusLog && count($statusLog))
                    @foreach($statusLog as $statusItem)
                      <span>{{date('d.m.Y H:i:s', strtotime($statusItem->created_at))}} - <b>{{$statusItem->new_status ? $statusItem->new_status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}</b></span><br>
                      {{$statusItem->comment}}
                      <hr>
                    @endforeach
                    <span>{{date('d.m.Y H:i:s', strtotime($lead->created_at))}} - <b>{{$statusItem->old_status ? $statusItem->old_status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}</b></span><br>
                  @else
                    <span>{{date('d.m.Y H:i:s', strtotime($lead->created_at))}} - <b>{{$lead->status ? $lead->status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : ''}}</b></span>
                  @endif
                </div>
                <div class="status-div">
                  <input type="hidden" name="old_status_id" value="{{$lead->status->id}}"/>
                  <div class="field-container">
                    <div class="input-block">
                      <label>@lang('message.status')</label>
                      <select class="w540 lead_status_id-edit al-dropdown" name="new_status_id" data-old_status_id="{{$lead->status->id}}">
                        @foreach($lead->availableStatuses() as $statusId => $statusName)
                          <option value="{{$statusId}}" @if($statusId == $lead->status->id) selected @endif>{{$statusName}}</option>
                        @endforeach
                      </select>
                      @if($classes)
                        <label>@lang('message.class')</label>
                        <select class="w540 lead_class_id-edit al-dropdown" name="class_id" data-old_class_id="{{$lead->class_id}}">
                          <option value="" @if($lead->class_id == null) selected @endif>-</option>
                          @foreach($classes as $class)
                            <option value="{{$class->id}}" @if($class->id == $lead->class_id) selected @endif>{{$class->name}}</option>
                          @endforeach
                        </select>
                      @endif
                    </div>
                  </div>
                  <div class="field-container comment-container" @if($lead->status_id == 7 || $lead->status_id == 11) style="display: none" @endif>
                    <div class="input-block">
                      <label>@lang('message.comment1')</label>
                      <textarea name="comment2"></textarea>
                    </div>
                  </div>
                  <div class="field-container call-me-block" @if($lead->status->id != 6) style="display:none;" @endif>
                    <div class="info-block">
                      <label class="radio-label @if($lead->call_me_datetime) checked @endif"><input type="checkbox" name="call_me" @if($lead->call_me_datetime) checked @endif>@lang('message.remind_me_to_contact_the_lead')</label>
                    </div><br>
                    <div class="input-block  dt" @if(!$lead->call_me_datetime) style="display:none;" @endif>
                      <label>@lang('message.select_date_and_time')</label>
                      <input type="text" name="call_me_datetime" class="datetime-input" placeholder="@lang('message.date_time')" style="width:540px;" value="{{ $lead->call_me_datetime ? date('d.m.Y H:i', strtotime($lead->call_me_datetime)) : '' }}"/>
                    </div>
                  </div>
                  <div class="field-container lead-off-reason fd-column" @if($lead->status_id != 7 && $lead->status_id != 11) style="display: none" @endif>
                    @php
                      if(!$lead->rejection_id){
                          $lead->rejection_id = 1;
                      }
                    @endphp
                    <div class="input-block" style="width:400px;">
                      <label>@lang('message.reason')</label>
                      @foreach($rejections_reasons as $reason)
                        <label class="radio-label @if($reason->id == $lead->rejection_reason_id) checked @endif"
                               @if($reason->rejection_id != $lead->rejection_id) style="display: none" @endif
                               data-rejection_id="{{$reason->rejection_id}}">
                          <input type="radio"
                                 name="rejection_reason_id"
                                 @if($reason->id == $lead->rejection_reason_id) checked @endif
                                 value="{{$reason->id}}">
                          {{$reason->name}}
                        </label>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>

              <div class="hr"></div>
              <div class="field-container right">
                <div class="buttons-block">
                  <a href="" class="cancel">@lang('message.cancel')</a>
                  <button class="submit">
                    @lang('message.save')
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');

<style type="text/css">
h1.title{
  margin-top: 22px;
}
h2{
  font-size: 20px;
  color: #3D445C;
  font-weight: 500;
  margin: 0;
  margin-bottom: 20px;
  padding: 0;
}
.container-base{
  max-width: 1050px;
}
.lead-block .h2{
  font-size: 24px;
  line-height:  28px;
  margin-bottom: 14px;
  display: block;
}
.field-container{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  position:relative;
} 
.field-container.hide{
  display: none;
}
.lead-block .input-block{
  margin-right: 15px;
  margin-bottom: 15px;
  position: relative;
}
/*.lead-block .input-block:nth-child(3n){
  margin-right: 0;
}*/
.lead-block .input-block label,
.lead-block .textarea-block label{
  display: block;
  font-family: "Helvetica Neue";
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #ADB0B9;
  margin-bottom: 5px;
}
.lead-block .input-block select,
.lead-block .input-block input{
  background: white;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;
  width: 340px;
  height: 42px;

  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;

  padding: 0 11px;
}
.lead-block .textarea-block textarea {
  background: white;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;
  width: 700px;
  height: 146px;

  font-family: "Helvetica Neue";
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;

  padding: 0 11px;
  margin-bottom: 25px;
  resize: none;
}
.hr{
  margin: 5px 0 25px;
  border-bottom: solid 1px #e6e9ec;
  width: 100%;
}
/*select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;       
  background-image: url(/assets/img/dwn.png) ;   
  background-repeat: no-repeat;
  background-position: right center;
  background-color: #F6F7F9;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;

  padding:  0 20px 0 11px;
  width: 340px;
  height: 42px;

  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;
}*/
.select2-container{
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
.select2-selection__rendered{
  height:  40px;
  background: white;
}
.select2-container--default .select2-selection--single{
  width: 100%;
  height: 40px !important;
  border: none !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
  padding: 0 !important;
}
.input-block .select2-selection__rendered {
  height: auto;
  background: white;
  flex-wrap: wrap;
}
.select2-container--default .select2-selection--multiple{
  border: none;
  padding-bottom:0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
  line-height: 28px;
  border: none;
  border-radius: 0;
  display: flex;
  align-items: center;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__display{
  padding: 0px 4px 0px 5px;
  font-size: 13px;
}
.select2-selection__choice__remove span{
  width: 12px;
  height: 12px;
  display: block;
  line-height: 12px;
  margin-right: 5px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
  border-right: none;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
  background: none;
}
.select2-container--default .select2-search--inline .select2-search__field{
  line-height: 30px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple{
  border: none;
}
/*.select2.select2-container.select2-container--default{
  width: 340px !important;
}*/
.field-container.right{
  justify-content: flex-end;
}
.buttons-block{
  text-align: right;
  padding-bottom: 15px;
}
.cancel{
  display: inline-block;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 4px;
  width:  97px;
  height:  42px;
  font-family: "Helvetica Neue";
  font-style: normal;
  font-weight: bold;
  font-size: 13px;
  line-height: 42px;
  text-align: center;
  margin-right: 12px;
}
.submit{
  width: 108px;
  height:  42px;
  box-sizing: border-box;
  border-radius: 4px;
  font-family: "Helvetica Neue";
  font-style: normal;
  font-weight: bold;
  font-size: 13px;
  line-height: 42px;
  text-align: center;
  color:  #fff;
  background: #FC6B40;
  border: none;
}
.personal-block .input-block input.error{
  border-color: #FC6B40;
}
.field-container .input-block .error,
.input-block span.error{
  color: #FC6B40;
  line-height: 25px;
  display: block;
}
/*.success-message{
  margin: 10px 0;
  widht:  100%;
  display: block;
  padding:  15px;
  border:  solid 1px #5cbc59;
  background: #9adf68;

  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #444444;
}*/
@media screen and (max-width: 820px){
    .personal-block{
        padding: 0 20px;
    }
    h1.title{
        padding: 0 20px;
    }
    .personal-block .input-block:nth-child(3n){
     margin-right: 15px;
    }
    .personal-block .input-block:nth-child(2n){
     margin-right: 0px;
    }
}
@media screen and (max-width: 560px){
    .personal-block{
        padding: 0 30px;
    }
    h1.title{
        padding: 0 30px;
    }
}
@media screen and (max-width: 375px){
    .personal-block{
        padding: 0 15px;
    }
    h1.title{
        padding: 0 15px;
    }
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
.select2.select2-container.select2-container--default{
  z-index:10;
}
.add-contact-line{
  justify-content: flex-end;
}
.add-contact-line a{
  color:#fff !important;
  margin-top: 0;
}

</style>

<script>
  const additionContacts = `
              <div class="field-container">
                <div class="input-block">
                  <input type="text" name="add_name" value="{{ $contactData->name }}"/>
                </div>
                <div class="input-block">
                  <input type="text" name="add_email[]" value=""/>
                </div>
                <div class="input-block mr0">
                  <input type="text" name="add_phone[]" value=""/>
                </div>
                
                  <span class="addition-contact-del">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                    </svg>
                  </span>
                
              </div>`
</script>

@include('front.crm.scripts')

<script type="text/javascript">
  document.canSubmit = false;
  $(document).ready(function(){
    $('.tagged-cities').select2({
      'tags':true
    });
    $('body').addClass('tagged-select');
    $('#edit-leads-form').submit(function(){
      if(!document.canSubmit){
        $.post(
          '/manager/leads/{{$lead->id}}/check-contacts',
          $(this).serialize(),
          function(data){
            if(data.success){
              document.canSubmit = true;
              $('#edit-leads-form').submit();
            }else{
              if (data.message) {
                notify(data.message);
              }
              $('[name="add_email[]"]').removeClass('error');
              $('[name="add_phone[]"]').removeClass('error');
              $('.addition-phones span.error').remove();
              for (const [index, el] of Object.entries(data.errors)) {
                if(el.email){
                  $('[name="add_email[]"]').eq(index).addClass('error').after(`<span class="error">${el.email}</span>`);
                }
                if(el.phone){
                  $('[name="add_phone[]"]').eq(index).addClass('error').after(`<span class="error">${el.phone}</span>`);
                }
              }
              $([document.documentElement, document.body]).animate({
                scrollTop: $(".addition-phones").offset().top - 200
              }, 200);
            }
          }
        )

        return false;
      }
    })
  })
</script>