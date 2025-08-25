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
        <div class="container container-base container-search-result manager-search client-details-container">
          <a class="back" href="/manager/suppliers/{{$supplier->id}}/companies">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            @lang('message.back')
          </a>
        </div>
        <div  class="container container-base container-search-result manager-search client-details-container">
          <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
          </h1>
          <div class="content-block content-details">
              <div class="details-tabs">
                <div class="details-tabs-header">

                  <a href="#nds" class="nds @if($details->type_id == 1 || !$details || !$details->type_id) active @endif" data-type_id="1" data-form="form-nds">@lang('message.VAT')</a>

                  <a href="#not-nds" class="not-nds @if($details->type_id == 2) active @endif" data-type_id="2"  data-form="form-not-nds">@lang('message.notVAT')</a>

                  <a href="#fo" class="fo @if($details->type_id == 3) active @endif" data-type_id="3"  data-form="form-fo">@lang('message.individual_')</a>
               

                </div>
                <div class="details-tabs-content">
                  <div class="tab-block @if($details->type_id > 1) hide @endif" id="type-1">
                    <form method="POST" id="form-nds" action="{{$action}}">
                      <input type="hidden" name="type_id" value="1"/>
                      <input type="hidden" name="supplier_id" value="{{$supplier->id}}"/>
                      @if($details->id)
                      <input type="hidden" name="id" value="{{$details->id}}"/>
                      @endif
                      @if($from)
                      <input type="hidden" name="from" value="{{$from}}"/>
                      @endif
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.full_name') *</label>
                          <input type="text" name="name" value="{{ ($details->type_id == 1) ? $details->name : '' }}" required class="full_name"/>
                        </div>
                        <div class="input-block mr0">
                          <label>@lang('message.short_name') *</label>
                          <input type="text" name="name_short" value="{{ ($details->type_id == 1) ? $details->name_short : ''}}" required/>
                        </div>
                      </div>
                      <span class="h2">Коды</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.drfo_edrpou') *</label>
                          <input type="text" name="edrpou" value="{{ ($details->type_id == 1) ? $details->edrpou : '' }}" required minlength="6" maxlength="10" autocomplete="off" />
                          <a class="get-edrpou @if(!$details->edrpou) hide @endif">@lang('message.get_data_on_drfo_edrpou')</a>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.inn2')</label>
                          <input type="text" name="inn" value="{{ ($details->type_id == 1) ? $details->inn : ''}}" class="l12" minlength="12" maxlength="12"/>
                        </div>
                        <!--
                        <div class="input-block">
                          <label>Свидетельство платильшика НДС</label>
                          <input type="text" name="nds" value="{{ ($details->type_id == 1) ? $details->nds : '' }}" class="l12" {{--minlength="12" maxlength="12"--}}/>
                        </div>
                        -->
                        <div class="input-block">
                          <label>@lang('message.tax_status')</label>
                          <select class="tax-status" name="tax_status">
                            <option></option>
                            @foreach($tax_status_nds as $key => $item) 
                            <option value="{{$item->id}}" @if($details->type_id == 1 && $item->id == $details->tax_status) selected @endif>{{$item->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <span class="h2">@lang('message.ur_address')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.index')</label>
                          <input type="text" name="ur_index" value="{{ ($details->type_id == 1) ? $details->ur_index : ''}}" class="index"/>
                        </div>
                        <div class="input-block ib-break">
                          <label>@lang('message.city') *</label>
                          <input type="text" name="ur_city" value="{{ ($details->type_id == 1) ? $details->ur_city : '' }}" required />
                        </div>
                        <div class="input-block">
                          <label>@lang('message.address') *</label>
                          <input type="text" name="ur_address" value="{{ ($details->type_id == 1) ?  $details->ur_address : ''}}" class="address" required />
                        </div>
                        <div class="input-block">
                          <label>@lang('message.house') *</label>
                          <input type="text" name="ur_house" value="{{ ($details->type_id == 1) ? $details->ur_house : ''}}" class="index" required />
                        </div>
                        <div class="input-block w340">
                          <label>@lang('message.office')</label>
                          <input type="text" name="ur_office" value="{{ ($details->type_id == 1) ? $details->ur_office : ''}}" class="index" />
                        </div>
                        <a class="ur2post hide">@lang('message.copy_to_post_address')</a>
                      </div>
                      <span class="h2">@lang('message.post_address')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.index')</label>
                          <input type="text" name="post_index" value="{{ ($details->type_id == 1) ? $details->post_index : '' }}" class="index"/>
                        </div>
                        <div class="input-block ib-break">
                          <label>@lang('message.city')</label>
                          <input type="text" name="post_city" value="{{ ($details->type_id == 1) ?  $details->post_city : '' }}"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.address')</label>
                          <input type="text" name="post_address" value="{{ ($details->type_id == 1) ? $details->post_address : '' }}" class="address"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.house')</label>
                          <input type="text" name="post_house" value="{{ ($details->type_id == 1) ? $details->post_house : '' }}" class="index"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.office')</label>
                          <input type="text" name="post_office" value="{{ ($details->type_id == 1) ?  $details->post_office : '' }}" class="index"/>
                        </div>
                      </div>
                      <span class="h2">@lang('message.bank_details')</span>
                      <div class="input-group bank-details-block">
                        @if(count($bankDetails))
                          @foreach($bankDetails as $k => $bankData)
                          <div class="bank-details-line">
                            <div class="input-block">
                              @if(!$k)<label>IBAN</label>@endif
                              <input type="text" name="iban[{{$k}}]" value="{{ ($details->type_id == 1) ? $bankData->iban : 'UA' }}"/>
                            </div>
                            <div class="input-block">
                              @if(!$k)<label>@lang('message.bank_name')</label>@endif
                              <input type="text" name="bank_name[{{$k}}]" value="{{ ($details->type_id == 1) ? $bankData->bank_name : '' }}"/>
                            </div>
                            <div class="input-block w340">
                              @if(!$k)<label>@lang('message.mfo')</label>@endif
                              <input type="text" name="mfo[{{$k}}]" value="{{ ($details->type_id == 1) ? $bankData->mfo : '' }}"/>
                              <a class="get-mfo hide">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37959 1.71284C3.80936 1.28307 4.39225 1.04163 5.00004 1.04163H12.3423L17.2917 5.99108V16.6666C17.2917 17.2744 17.0503 17.8573 16.6205 18.2871C16.1907 18.7169 15.6078 18.9583 15 18.9583H5.00004C4.39225 18.9583 3.80936 18.7169 3.37959 18.2871C2.94982 17.8573 2.70837 17.2744 2.70837 16.6666V3.33329C2.70837 2.72551 2.94982 2.14261 3.37959 1.71284ZM5.00004 2.29163C4.72377 2.29163 4.45882 2.40137 4.26347 2.59672C4.06812 2.79207 3.95837 3.05703 3.95837 3.33329V16.6666C3.95837 16.9429 4.06812 17.2078 4.26347 17.4032C4.45882 17.5985 4.72377 17.7083 5.00004 17.7083H15C15.2763 17.7083 15.5413 17.5985 15.7366 17.4032C15.932 17.2078 16.0417 16.9429 16.0417 16.6666V7.29163H11.0417V2.29163H5.00004ZM12.2917 2.75884L15.5745 6.04163H12.2917V2.75884ZM13.3334 10.2083H6.66671V11.4583H13.3334V10.2083ZM6.66671 13.5416H13.3334V14.7916H6.66671V13.5416ZM8.33337 6.87496H6.66671V8.12496H8.33337V6.87496Z" fill="#FC6B40"/>
                                </svg>
                                @lang('message.get_the_name_of_the_bank_by_mfo')
                              </a>
                            </div>
                            <span class="bank-details-del">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                              </svg>
                            </span>
                          </div>
                          @endforeach
                        @else
                        <div class="bank-details-line">
                          <div class="input-block">
                            <label>IBAN</label>
                            <input type="text" name="iban[0]" value="{{ ($details->type_id == 1) ? $details->iban : 'UA' }}"/>
                          </div>
                          <div class="input-block">
                            <label>@lang('message.mfo')</label>
                            <input type="text" name="bank_name[0]" value="{{ ($details->type_id == 1) ? $details->bank_name : '' }}"/>
                          </div>
                          <div class="input-block w340">
                            <label>@lang('message.mfo')</label>
                            <input type="text" name="mfo[0]" value="{{ ($details->type_id == 1) ? $details->mfo : '' }}"/>
                            <a class="get-mfo hide">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37959 1.71284C3.80936 1.28307 4.39225 1.04163 5.00004 1.04163H12.3423L17.2917 5.99108V16.6666C17.2917 17.2744 17.0503 17.8573 16.6205 18.2871C16.1907 18.7169 15.6078 18.9583 15 18.9583H5.00004C4.39225 18.9583 3.80936 18.7169 3.37959 18.2871C2.94982 17.8573 2.70837 17.2744 2.70837 16.6666V3.33329C2.70837 2.72551 2.94982 2.14261 3.37959 1.71284ZM5.00004 2.29163C4.72377 2.29163 4.45882 2.40137 4.26347 2.59672C4.06812 2.79207 3.95837 3.05703 3.95837 3.33329V16.6666C3.95837 16.9429 4.06812 17.2078 4.26347 17.4032C4.45882 17.5985 4.72377 17.7083 5.00004 17.7083H15C15.2763 17.7083 15.5413 17.5985 15.7366 17.4032C15.932 17.2078 16.0417 16.9429 16.0417 16.6666V7.29163H11.0417V2.29163H5.00004ZM12.2917 2.75884L15.5745 6.04163H12.2917V2.75884ZM13.3334 10.2083H6.66671V11.4583H13.3334V10.2083ZM6.66671 13.5416H13.3334V14.7916H6.66671V13.5416ZM8.33337 6.87496H6.66671V8.12496H8.33337V6.87496Z" fill="#FC6B40"/>
                              </svg>
                              @lang('message.get_the_name_of_the_bank_by_mfo')
                            </a>
                          </div>
                        </div> 
                        @endif
                        <span class="bank-details-add">
                            @lang('message.add_rs')
                        </span>
                        {{--
                        <div class="input-block">
                          <label>Номер карты</label>
                          <input type="text" name="card_number" value="{{ $details->card_number }}"/>
                        </div>
                        <div class="input-block">
                          <label>Банк карты</label>
                          <input type="text" name="card_bank" value="{{ $details->card_bank }}"/>
                        </div>
                        <div class="input-block">
                          <label>Получатель</label>
                          <input type="text" name="card_recipient" value="{{ $details->card_recipient }}"/>
                        </div>
                        --}}
                      </div>

                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.fio2'). *</label>
                          <input type="text" name="director_fio" value="{{ ($details->type_id == 1) ? $details->director_fio : '' }}" required />
                        </div>
                        <div class="input-block ib-break">
                          <label>@lang('message.post') *</label>
                          <input type="text" name="post" value="{{ ($details->type_id == 1) ? $details->post : '' }}" required />
                        </div>
                        <div class="input-block mr15">
                          <label>@lang('message.fio_r') *</label>
                          <input type="text" name="director_fio_r" value="{{ ($details->type_id == 1) ? $details->director_fio_r : '' }}" required />
                        </div>
                        <div class="input-block input-block ib-break">
                          <label>@lang('message.post_r') (не ФОП)</label>
                          <input type="text" name="post_r" value="{{ ($details->type_id == 1) ? $details->post_r : '' }}" />
                        </div>
                        <a class="ncl hide">@lang('message.receive_in_the_genitive_case')</a>
                      </div>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.based_on') *</label>
                          <input type="text" name="based_on" value="{{ ($details->type_id == 1) ? $details->based_on : 'Статуту' }}" required  class="full_name"/>
                        </div>
                      </div>
                      <span class="h2">@lang('message.additional')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.domain')</label>
                          <input type="text" name="domain" value="{{ ($details->type_id == 1) ? $details->domain : '@' }}" />
                        </div>
                      </div>
                      <input type="submit" class="hide" />
                    </form>
                  </div>
                  <div class="tab-block @if($details->type_id != 2) hide @endif" id="type-2">
                    <form method="POST" id="form-not-nds" action="{{$action}}">
                      <input type="hidden" name="type_id" value="2"/>
                      <input type="hidden" name="supplier_id" value="{{$supplier->id}}"/>
                      @if($details->id)
                      <input type="hidden" name="id" value="{{$details->id}}"/>
                      @endif
                      @if($from)
                      <input type="hidden" name="from" value="{{$from}}"/>
                      @endif
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.full_name') *</label>
                          <input type="text" name="name" value="{{ ($details->type_id == 2) ? $details->name : ''}}" required class="full_name"/>
                        </div>
                        <div class="input-block mr0">
                          <label>@lang('message.short_name') *</label>
                          <input type="text" name="name_short" value="{{ ($details->type_id == 2) ? $details->name_short : ''}}" required/>
                        </div>
                      </div>
                      <span class="h2">Коды</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.drfo_edrpou') *</label>
                          <input type="text" name="edrpou" value="{{ ($details->type_id == 2) ? $details->edrpou : '' }}" required  class="l10" minlength="6" maxlength="10" autocomplete="off" />
                          <a class="get-edrpou @if(!$details->edrpou) hide @endif">@lang('message.get_data_on_drfo_edrpou')</a>
                        </div>
                        <div class="input-block w680">
                          <label>@lang('message.tax_status')</label>
                          {{--
                          <input type="text" name="tax_status" value="{{ ($details->type_id == 2) ? $details->tax_status : '' }}"/>
                          --}}
                          <select class="tax-status" name="tax_status">
                            <option></option>
                            @foreach($tax_status_notnds as $key => $item)
                            <option value="{{$item->id}}" @if($details->type_id == 2 && $item->id == $details->tax_status) selected @endif>{{$item->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        
                      </div>
                      <span class="h2">@lang('message.ur_address')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.index')</label>
                          <input type="text" name="ur_index" value="{{ ($details->type_id == 2) ? $details->ur_index : '' }}" class="index"/>
                        </div>
                        <div class="input-block ib-break">
                          <label>@lang('message.city') *</label>
                          <input type="text" name="ur_city" value="{{ ($details->type_id == 2) ? $details->ur_city : '' }}" required />
                        </div>
                        <div class="input-block">
                          <label>@lang('message.address') *</label>
                          <input type="text" name="ur_address" value="{{ ($details->type_id == 2) ?  $details->ur_address : '' }}" class="address" required />
                        </div>
                        <div class="input-block">
                          <label>@lang('message.house') *</label>
                          <input type="text" name="ur_house" value="{{ ($details->type_id == 2) ? $details->ur_house : '' }}" class="index" required />
                        </div>
                        <div class="input-block w340">
                          <label>@lang('message.office')</label>
                          <input type="text" name="ur_office" value="{{ ($details->type_id == 2) ? $details->ur_office : '' }}" class="index"/>
                        </div>
                        <a class="ur2post hide">@lang('message.copy_to_post_address')</a>
                      </div>
                      <span class="h2">@lang('message.post_address')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.index')</label>
                          <input type="text" name="post_index" value="{{ ($details->type_id == 2) ? $details->post_index : '' }}" class="index"/>
                        </div>
                        <div class="input-block ib-break">
                          <label>@lang('message.city')</label>
                          <input type="text" name="post_city" value="{{ ($details->type_id == 2) ?  $details->post_city : '' }}"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.address')</label>
                          <input type="text" name="post_address" value="{{ ($details->type_id == 2) ?  $details->post_address : '' }}" class="address"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.house')</label>
                          <input type="text" name="post_house" value="{{ ($details->type_id == 2) ?  $details->post_house : '' }}" class="index"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.office')</label>
                          <input type="text" name="post_office" value="{{ ($details->type_id == 2) ?  $details->post_office : '' }}" class="index"/>
                        </div>
                      </div>
                      <span class="h2">@lang('message.bank_details')</span>
                      <div class="input-group bank-details-block">
                        @if(count($bankDetails))
                          @foreach($bankDetails as $k => $bankData)
                          <div class="bank-details-line">
                            <div class="input-block">
                              @if(!$k)<label>IBAN</label>@endif
                              <input type="text" name="iban[{{$k}}]" value="{{ ($details->type_id == 2) ? $bankData->iban : 'UA' }}"/>
                            </div>
                            <div class="input-block">
                              @if(!$k)<label>@lang('message.bank_name')</label>@endif
                              <input type="text" name="bank_name[{{$k}}]" value="{{ ($details->type_id == 2) ? $bankData->bank_name : '' }}"/>
                            </div>
                            <div class="input-block w340">
                              @if(!$k)<label>@lang('message.mfo')</label>@endif
                              <input type="text" name="mfo[{{$k}}]" value="{{ ($details->type_id == 2) ? $bankData->mfo : '' }}"/>
                              <a class="get-mfo hide">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37959 1.71284C3.80936 1.28307 4.39225 1.04163 5.00004 1.04163H12.3423L17.2917 5.99108V16.6666C17.2917 17.2744 17.0503 17.8573 16.6205 18.2871C16.1907 18.7169 15.6078 18.9583 15 18.9583H5.00004C4.39225 18.9583 3.80936 18.7169 3.37959 18.2871C2.94982 17.8573 2.70837 17.2744 2.70837 16.6666V3.33329C2.70837 2.72551 2.94982 2.14261 3.37959 1.71284ZM5.00004 2.29163C4.72377 2.29163 4.45882 2.40137 4.26347 2.59672C4.06812 2.79207 3.95837 3.05703 3.95837 3.33329V16.6666C3.95837 16.9429 4.06812 17.2078 4.26347 17.4032C4.45882 17.5985 4.72377 17.7083 5.00004 17.7083H15C15.2763 17.7083 15.5413 17.5985 15.7366 17.4032C15.932 17.2078 16.0417 16.9429 16.0417 16.6666V7.29163H11.0417V2.29163H5.00004ZM12.2917 2.75884L15.5745 6.04163H12.2917V2.75884ZM13.3334 10.2083H6.66671V11.4583H13.3334V10.2083ZM6.66671 13.5416H13.3334V14.7916H6.66671V13.5416ZM8.33337 6.87496H6.66671V8.12496H8.33337V6.87496Z" fill="#FC6B40"/>
                                </svg>
                                @lang('message.get_the_name_of_the_bank_by_mfo')
                              </a>
                            </div>
                            <span class="bank-details-del">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                              </svg>
                            </span>
                          </div>
                          @endforeach
                        @else
                        <div class="bank-details-line">
                          <div class="input-block">
                            <label>IBAN</label>
                            <input type="text" name="iban[0]" value="{{ ($details->type_id == 2) ? $details->iban : 'UA' }}"/>
                          </div>
                          <div class="input-block">
                            <label>@lang('message.bank_name')</label>
                            <input type="text" name="bank_name[0]" value="{{ ($details->type_id == 2) ? $details->bank_name : '' }}"/>
                          </div>
                          <div class="input-block w340">
                            <label>@lang('message.mfo')</label>
                            <input type="text" name="mfo[0]" value="{{ ($details->type_id == 2) ? $details->mfo : '' }}"/>
                            <a class="get-mfo hide">
                              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37959 1.71284C3.80936 1.28307 4.39225 1.04163 5.00004 1.04163H12.3423L17.2917 5.99108V16.6666C17.2917 17.2744 17.0503 17.8573 16.6205 18.2871C16.1907 18.7169 15.6078 18.9583 15 18.9583H5.00004C4.39225 18.9583 3.80936 18.7169 3.37959 18.2871C2.94982 17.8573 2.70837 17.2744 2.70837 16.6666V3.33329C2.70837 2.72551 2.94982 2.14261 3.37959 1.71284ZM5.00004 2.29163C4.72377 2.29163 4.45882 2.40137 4.26347 2.59672C4.06812 2.79207 3.95837 3.05703 3.95837 3.33329V16.6666C3.95837 16.9429 4.06812 17.2078 4.26347 17.4032C4.45882 17.5985 4.72377 17.7083 5.00004 17.7083H15C15.2763 17.7083 15.5413 17.5985 15.7366 17.4032C15.932 17.2078 16.0417 16.9429 16.0417 16.6666V7.29163H11.0417V2.29163H5.00004ZM12.2917 2.75884L15.5745 6.04163H12.2917V2.75884ZM13.3334 10.2083H6.66671V11.4583H13.3334V10.2083ZM6.66671 13.5416H13.3334V14.7916H6.66671V13.5416ZM8.33337 6.87496H6.66671V8.12496H8.33337V6.87496Z" fill="#FC6B40"/>
                              </svg>
                              @lang('message.get_the_name_of_the_bank_by_mfo')
                            </a>
                          </div>
                        </div> 
                        @endif
                        <span class="bank-details-add">
                            @lang('message.add_rs')
                        </span>
                        {{--
                        <div class="input-block">
                          <label>Номер карты</label>
                          <input type="text" name="card_number" value="{{ $details->card_number }}"/>
                        </div>
                        <div class="input-block">
                          <label>Банк карты</label>
                          <input type="text" name="card_bank" value="{{ $details->card_bank }}"/>
                        </div>
                        <div class="input-block">
                          <label>Получатель</label>
                          <input type="text" name="card_recipient" value="{{ $details->card_recipient }}"/>
                        </div>
                        --}}
                      </div>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.fio2') *</label>
                          <input type="text" name="fio" value="{{ ($details->type_id == 2) ? $details->fio : '' }}" required />
                        </div>
                        <div class="input-block ib-break">
                          <label>@lang('message.post') *</label>
                          <input type="text" name="post" value="{{ ($details->type_id == 2) ? $details->post : '' }}" required />
                        </div>
                        <div class="input-block mr15">
                          <label>@lang('message.fio_r') *</label>
                          <input type="text" name="fio_r" value="{{ ($details->type_id == 2) ? $details->fio_r : '' }}" required />
                        </div>
                        <div class="input-block ib-break">
                          <label>Д@lang('message.post_r') (не ФОП)</label>
                          <input type="text" name="post_r" value="{{ ($details->type_id == 2) ? $details->post_r : '' }}"  />
                        </div>
                        <a class="ncl hide">@lang('message.receive_in_the_genitive_case')</a>
                      </div>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.based_on') *</label>
                          <input type="text" name="based_on" value="{{ ($details->type_id == 2) ? $details->based_on : 'Статуту' }}" class="full_name" required />
                        </div>
                      </div>
                      <span class="h2">@lang('message.additional')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.domain')</label>
                          <input type="text" name="domain" value="{{ ($details->type_id == 2) ? $details->domain : '@' }}" />
                        </div>
                      </div>
                      <input type="submit" class="hide" />
                    </form>
                  </div>

                  <div class="tab-block @if($details->type_id != 3) hide @endif" id="type-3">
                    <form method="POST" id="form-fo" action="{{$action}}">
                      <input type="hidden" name="type_id" value="3"/>
                      <input type="hidden" name="supplier_id" value="{{$supplier->id}}"/>
                      @if($details->id)
                      <input type="hidden" name="id" value="{{$details->id}}"/>
                      @endif
                      @if($from)
                      <input type="hidden" name="from" value="{{$from}}"/>
                      @endif
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.fio2')*</label>
                          <input type="text" name="fio_full" value="{{ ($details->type_id == 3) ? $details->fio_full : '' }}" required />
                        </div>
                      </div>
                      <div class="input-group">

                        <div class="input-block">
                          <label>IBAN</label>
                          <input type="text" name="iban[0]" value="{{ ($details->type_id == 2) ? $details->iban : 'UA' }}"/>
                        </div>
                        <div class="input-block">
                          <label>@lang('message.bank_name')</label>
                          <input type="text" name="bank_name[0]" value="{{ ($details->type_id == 2) ?  $details->bank_name : '' }}"/>
                        </div>
                        <div class="input-block w340">
                          <label>@lang('message.mfo')</label>
                          <input type="text" name="mfo[0]" value="{{ ($details->type_id == 2) ? $details->mfo : '' }}"/>
                          <a class="get-mfo hide">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37959 1.71284C3.80936 1.28307 4.39225 1.04163 5.00004 1.04163H12.3423L17.2917 5.99108V16.6666C17.2917 17.2744 17.0503 17.8573 16.6205 18.2871C16.1907 18.7169 15.6078 18.9583 15 18.9583H5.00004C4.39225 18.9583 3.80936 18.7169 3.37959 18.2871C2.94982 17.8573 2.70837 17.2744 2.70837 16.6666V3.33329C2.70837 2.72551 2.94982 2.14261 3.37959 1.71284ZM5.00004 2.29163C4.72377 2.29163 4.45882 2.40137 4.26347 2.59672C4.06812 2.79207 3.95837 3.05703 3.95837 3.33329V16.6666C3.95837 16.9429 4.06812 17.2078 4.26347 17.4032C4.45882 17.5985 4.72377 17.7083 5.00004 17.7083H15C15.2763 17.7083 15.5413 17.5985 15.7366 17.4032C15.932 17.2078 16.0417 16.9429 16.0417 16.6666V7.29163H11.0417V2.29163H5.00004ZM12.2917 2.75884L15.5745 6.04163H12.2917V2.75884ZM13.3334 10.2083H6.66671V11.4583H13.3334V10.2083ZM6.66671 13.5416H13.3334V14.7916H6.66671V13.5416ZM8.33337 6.87496H6.66671V8.12496H8.33337V6.87496Z" fill="#FC6B40"/>
                            </svg>
                            @lang('message.get_the_name_of_the_bank_by_mfo')
                          </a>
                        </div>
                        <hr>
                        <div class="input-block">
                          <label>@lang('message.card_number')</label>
                          <input type="text" name="card_number[0]" value="{{ $bankDetails[0]->card_number ?? '' }}"/>
                        </div>
                        <div class="input-block" style="margin-right: 15px;">
                          <label>@lang('message.card_bank')</label>
                          <input type="text" name="card_bank[0]" value="{{ $bankDetails[0]->bank_name ?? '' }}"/>
                        </div>
                        <div class="input-block" style="margin-right: 0px;">
                          <label>@lang('message.recipient_')</label>
                          <input type="text" name="card_recipient[0]" value="{{ $bankDetails[0]->card_recipient ?? '' }}"/>
                        </div>
                      </div>
                      
                      <span class="h2">@lang('message.contacts')</span>
                      <div class="input-group">
                        <div class="input-block">
                          <label>@lang('message.phone')*</label>
                          <input type="text" name="phone" value="{{$details->phone}}" required />
                        </div>
                      </div>
                      <span class="h2 addition-data pointer">@lang('message.additional_data') <span class="rotate">&#x25BC;</span></span>
                      <div class="addition-block hide">
                        <span class="h2">@lang('message.passport_data')</span>
                        <div class="input-group">
                          <div class="input-block">
                            <label>@lang('message.passport_series')</label>
                            <input type="text" name="passport_series" value="{{ ($details->type_id == 3) ? $details->passport_series : '' }}"/>
                          </div>
                          <div class="input-block">
                            <label>@lang('message.passport_number')</label>
                            <input type="text" name="passport_number" value="{{ ($details->type_id == 3) ? $details->passport_number : '' }}" />
                          </div>
                          <div class="input-block">
                            <label>@lang('message.passport_issued') </label>
                            <input type="text" name="passport_issued" value="{{ ($details->type_id == 3) ? $details->passport_issued : '' }}" />
                          </div>
                          <div class="input-block">
                            <label>@lang('message.passport_valid_to')</label>
                            <input type="text" name="passport_valid_to" value="{{ ($details->type_id == 3) ?  $details->passport_valid_to : '' }}"/>
                          </div>
                          <div class="input-block ib-break">
                            <label>@lang('message.passport_record')</label>
                            <input type="text" name="passport_record" value="{{ ($details->type_id == 3) ? $details->passport_record : '' }}"/>
                          </div>
                          <div class="input-block">
                            <label>@lang('message.inn2') </label>
                            <input type="text" name="inn" value="{{ ($details->type_id == 3) ? $details->inn : '' }}" class="l10" minlength="10" maxlength="10"/>
                          </div>
                        </div>
                        <span class="h2">@lang('message.registration_place')</span>
                        <div class="input-group">
                          <div class="input-block">
                            <label>@lang('message.index')</label>
                            <input type="text" name="ur_index" value="{{ ($details->type_id == 3) ? $details->ur_index : '' }}" class="index"/>
                          </div>
                          <div class="input-block ib-break">
                            <label>@lang('message.city')</label>
                            <input type="text" name="ur_city" value="{{ ($details->type_id == 3) ? $details->ur_city : '' }}" />
                          </div>
                          <div class="input-block">
                            <label>@lang('message.address')</label>
                            <input type="text" name="ur_address" value="{{ ($details->type_id == 3) ? $details->ur_address : '' }}" class="address" />
                          </div>
                          <div class="input-block">
                            <label>@lang('message.house')</label>
                            <input type="text" name="ur_house" value="{{ ($details->type_id == 3) ? $details->ur_house : '' }}" class="index" />
                          </div>
                          <div class="input-block">
                            <label>@lang('message.flat')</label>
                            <input type="text" name="ur_office" value="{{ ($details->type_id == 3) ? $details->ur_office : '' }}" class="index"/>
                          </div>
                        </div>
                      </div>
                      <input type="submit" class="hide" />
                    </form>
                  </div>
                  
                </div>
              </div>
              <div class="buttons-block clearfix">
                <span class="client-details-note">* - @lang('message.required_fields')</span>
                <div class="right-block">
                  <a class="btn cancel new-cancel-button" href="/manager/suppliers/{{$supplier->id}}/companies">@lang('message.cancel')</a>
                  <button class="btn client-details-submit">@lang('message.save')</button>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@if(!$details)
<div class="al-overlay2"></div>
<div class="edrpou-form">
  <button class="mfp-close">×</button>
  <div class="input-block">
    <label>@lang('message.drfo_edrpou') *</label>
    <input type="text" name="edrpou" value="" required  class="l10" minlength="6" maxlength="10" autocomplete="off" />
    <a class="get-edrpou-start">@lang('message.get_data_on_drfo_edrpou')</a>
  </div>
</div>
@endif



@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');

@include('front.crm.scripts')

<style>
.addition-block.hide {
  display: none;
}
.tab-block .h2.addition-data{
  display: inline-block;
  position: relative;
}
.addition-data .rotate{
  display:inline-block;
  font-size:10px;
  position:absolute;
  right: -10px;
  top: 2px;
}
.addition-data.open .rotate{
  transform: rotateZ(180deg);
}
.card-bank-name{
  width: 340px;
}
</style>

<script>
document.form_submit = false; 
document.edrpou_click = false;
@if($details->type_id == '2')
document.tab_click = '.not-nds';
@endif
@if($details->type_id == '3')
document.tab_click = '.fo';
@endif
$(document).ready(function(){
  $('.addition-data').click(function(){
    $(this).toggleClass('open');
    $('.addition-block').toggleClass('hide');
  })
  $('[name=card_number]').change(function(){
    const value = $(this).val().split(' ').join('');
    var _this = this;
    if(value.length == 16){
      $.post('/manager/bank/bin/'+value.substr(0,6), {}, function(data){
        $(_this).closest('form').find('[name=card_bank]').val(data.name);
      })
    }
  })
})
</script>
