@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp
  <section id="result-search-list" class="al-leeds-page">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters">
        <div class="steps">
          <div class="container">
            <div class="step-1 step current">
              <span class="round">1</span>
              @lang('message.add_a_new_client')
            </div>
            <div class="line"></div>
            <div class="step-2 step current">
              <span class="round">2</span>
              @lang('message.add_a_company')
            </div>
            <div class="line"></div>
            <div class="step-3 step current">
              <span class="round">3</span>
              @lang('message.company_details')
            </div>
            <div class="line"></div>
            <div class="step-3 step ">
              <span class="round">4</span>
              @lang('message.requisites')
            </div>
          </div>
        </div>
        <div  class="container container-base container-search-result manager-search client-details-container">
          <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
          </h1>
          <div class="content-block content-details">
            <div class="details-tabs-content">
              <div class="tab-block">
                <form method="POST" id="form-fo" action="{{$action}}" class="form-details">
                  <input type="hidden" name="client_type_id" value="3"/>
                  <input type="hidden" name="client_id" value="{{$client->id}}"/>
                  @if($details->id)
                  <input type="hidden" name="id" value="{{$details->id}}"/>
                  @endif
                  {{--
                  @if($from)
                  <input type="hidden" name="from" value="{{$from}}"/>
                  @endif
                  --}}
                  <div class="input-group">
                    <div class="input-block">
                      <label>@lang('message.fio_full') *</label>
                      <input type="text" name="fio_full" value="{{ $details->fio_full }}" required />
                    </div>
                    <div class="input-block w680">
                      <label>@lang('message.fio_full_r') *</label>
                      <input type="text" name="fio_full_r" value="{{ $details->fio_full_r }}" required />
                    </div>
                    <a class="ncl hide">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37959 1.71284C3.80936 1.28307 4.39225 1.04163 5.00004 1.04163H12.3423L17.2917 5.99108V16.6666C17.2917 17.2744 17.0503 17.8573 16.6205 18.2871C16.1907 18.7169 15.6078 18.9583 15 18.9583H5.00004C4.39225 18.9583 3.80936 18.7169 3.37959 18.2871C2.94982 17.8573 2.70837 17.2744 2.70837 16.6666V3.33329C2.70837 2.72551 2.94982 2.14261 3.37959 1.71284ZM5.00004 2.29163C4.72377 2.29163 4.45882 2.40137 4.26347 2.59672C4.06812 2.79207 3.95837 3.05703 3.95837 3.33329V16.6666C3.95837 16.9429 4.06812 17.2078 4.26347 17.4032C4.45882 17.5985 4.72377 17.7083 5.00004 17.7083H15C15.2763 17.7083 15.5413 17.5985 15.7366 17.4032C15.932 17.2078 16.0417 16.9429 16.0417 16.6666V7.29163H11.0417V2.29163H5.00004ZM12.2917 2.75884L15.5745 6.04163H12.2917V2.75884ZM13.3334 10.2083H6.66671V11.4583H13.3334V10.2083ZM6.66671 13.5416H13.3334V14.7916H6.66671V13.5416ZM8.33337 6.87496H6.66671V8.12496H8.33337V6.87496Z" fill="#FC6B40"/>
                      </svg>
                      @lang('message.receive_in_the_genitive_case')
                    </a>
                  </div>
                  <span class="h2">@lang('message.passport_data')</span>
                  <div class="input-group">
                    <div class="input-block">
                      <label>@lang('message.passport_series')</label>
                      <input type="text" name="passport_series" value="{{ $details->passport_series }}"/>
                    </div>
                    <div class="input-block">
                      <label>@lang('message.passport_number') *</label>
                      <input type="text" name="passport_number" value="{{ $details->passport_number }}" required />
                    </div>
                    <div class="input-block">
                      <label>@lang('message.passport_issued') *</label>
                      <input type="text" name="passport_issued" value="{{ $details->passport_issued }}" required />
                    </div>
                    <div class="input-block">
                      <label>@lang('message.passport_valid_to')</label>
                      <input type="text" name="passport_valid_to" value="{{ $details->passport_valid_to }}"/>
                    </div>
                    <div class="input-block ib-break">
                      <label>@lang('message.passport_record')</label>
                      <input type="text" name="passport_record" value="{{ $details->passport_record }}"/>
                    </div>
                    <div class="input-block">
                      <label>@lang('message.inn2') *</label>
                      <input type="text" name="inn" value="{{ $details->inn }}" required  class="l10" minlength="10" maxlength="10"/>
                    </div>
                  </div>
                  <span class="h2">@lang('message.registration_place')</span>
                  <div class="input-group">
                    <div class="input-block">
                      <label>@lang('message.index')</label>
                      <input type="text" name="ur_index" value="{{ $details->ur_index }}" class="index"/>
                    </div>
                    <div class="input-block ib-break">
                      <label>@lang('message.city')*</label>
                      <input type="text" name="ur_city" value="{{ $details->ur_city }}" required />
                    </div>
                    <div class="input-block">
                      <label>@lang('message.address')*</label>
                      <input type="text" name="ur_address" value="{{ $details->ur_address }}" class="address" required />
                    </div>
                    <div class="input-block">
                      <label>@lang('message.home')*</label>
                      <input type="text" name="ur_house" value="{{ $details->ur_house }}" class="index" required />
                    </div>
                    <div class="input-block">
                      <label>@lang('message.flat')</label>
                      <input type="text" name="ur_office" value="{{ $details->ur_office }}" class="index"/>
                    </div>
                  </div>
                  <span class="h2">@lang('message.contacts')</span>
                  <div class="input-group">
                    <div class="input-block">
                      <label>@lang('message.phone')*</label>
                      <input type="text" name="phone" value="{{$details->phone}}" required />
                    </div>
                  </div>
                  <input type="submit" class="hide"/>
                </form>
              </div>
            </div>
          </div>
          <div class="field-container bottom-action">
            <a href="{{ $from }}" class="back">
              <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
                </svg>
              @lang('message.back')
            </a>
            <div class="buttons-block">
              <a href="/manager/clients/{{ $client->id }}/view" class="cancel">@lang('message.cancel')</a>
              <button class="btn new-details-submit">@lang('message.save')</button>
            </div>
          </div>
          {{--
          <div class="buttons-block clearfix">
            <span class="client-details-note">* - поля обязательные для заполнения</span>
            <button class="btn new-details-submit">Сохранить</button>
          </div>
          --}}
          <br>
        </div>
      </div>
    </div>
  </section>

@include('add.footer')
<div id='show-map-modal' class="modal">
  <div id="map-modal-board"></div>
</div>


<style>
.field-container {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.cancel {
  display: inline-block;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 4px;
  height: 42px;
  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: bold;
  font-size: 13px;
  line-height: 42px;
  text-align: center;
  margin-right: 12px;
  color:#3D445C;
  padding:0 24px;
}
.cancel:hover{
  /*color: #FC6B40;*/
  color:#3D445C;
}    
</style>

<script>
document.form_submit = false; 
document.edrpou_click = false;
</script>
{{$details->client_type_id}}

@include('front.crm.scripts')