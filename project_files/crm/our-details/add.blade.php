@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details">
        <div class="favorite-viewed-tab system-info-tabs">
          @include('front.crm.settings-menu')
        </div>
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block content-our-details">
          <form action="/manager/details/add" method="post" enctype="multipart/form-data">
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.company_name2')</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="full_name--"/>
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block">
                <label>@lang('message.company_name_short')</label>
                <input type="text" name="name_short" value="{{ old('name_short') }}" required class="full_name--"/>
                @if ($errors->has('name_short'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name_short') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block">
                <label>@lang('message.nds_title')</label>
                <div class="form_toggle">
                  <div class="form_toggle-item item-1">
                    <input id="fid-1" type="radio" name="is_nds" value="1">
                    <label for="fid-1">@lang('message.yes')</label>
                  </div>
                  <div class="form_toggle-item item-2">
                    <input id="fid-2" type="radio" name="is_nds" value="0" checked="">
                    <label for="fid-2">@lang('message.no')</label>
                  </div>
                </div>
                @if ($errors->has('is_nds'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('is_nds') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.address')</label>
                <input type="text" name="address" value="{{ old('address') }}" required class="full_name"/>
                @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block mr0">
                <label>@lang('message.phone')</label>
                <input type="text" name="phone" value="{{ old('phone') }}"/>
                @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block" style="margin-right: 15px">
                <label>@lang('message.post_address')</label>
                <input type="text" name="post_address" value="{{ old('post_address') }}" required class="full_name"/>
                @if ($errors->has('post_address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('post_address') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block mr0">
                <label>@lang('message.base_city')</label>
                <input type="text" name="city_of_docs" value="{{ old('city_of_docs') }}"/>
                @if ($errors->has('city_of_docs'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('city_of_docs') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.edrpou')</label>
                <input type="text" name="edrpou" value="{{ old('edrpou') }}" required />
                @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('edrpou') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block no-nds-hide @if($details->is_nds == '0') hide @endif">
                <label>@lang('message.inn2')</label>
                <input type="text" name="inn" value="{{ old('inn') }}" />
              </div>
              <div class="input-block ">
                <label>@lang('message.income_limit_without_nds')</label>
                <input type="text" name="income_limit" value="{{ old('income_limit') }}" />
              </div>
              {{--
              <div class="input-block no-nds-hide @if($details->is_nds == '0') hide @endif">
                <label>@lang('message.vat_number')</label>
                <input type="text" name="nds" value="{{ old('nds') }}" />
              </div>
              --}}
              <div class="input-block  mr0">
                <label>@lang('message.tax_status')</label>
                <input type="text" name="status_tax" value="{{ old('status_tax') }}" required class="full_name"/>
                @if ($errors->has('status_tax'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('status_tax') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block">
                <label>@lang('message.based_on')</label>
                <input type="text" name="based_on" value="{{ old('based_on') }}" required class="full_name "/>
                @if ($errors->has('based_on'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('based_on') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.signer')</label>
                <input type="text" name="signer" value="{{ old('signer') }}" required />
                @if ($errors->has('signer'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('signer') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block">
                <label>@lang('message.bill_number_start')</label>
                <input type="text" name="first_bill_number" value="{{ old('first_bill_number') }}" required />
                @if ($errors->has('first_bill_number'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_bill_number') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>@lang('message.bank_name')</label>
                <input type="text" name="bank_name" value="{{ old('bank_name')}}" required/>
                @if ($errors->has('bank_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bank_name') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block">
                <label>IBAN</label>
                <input type="text" name="iban" value="{{ old('iban')}}" required/>
                @if ($errors->has('iban'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('iban') }}</strong>
                  </span>
                @endif
              </div>
              <div class="input-block mr0">
                <label>@lang('message.card_number')</label>
                <input type="text" name="card_number" value="{{ old('card_number')}}"/>
                @if ($errors->has('card_number'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('card_number') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            {{--
            <div class='input-group'>
              <div class="input-block">
                <label>Печать и подпись</label>
                <input type="file" name="stamp_file" value=""/>
              </div>
            </div>
            --}}
            <div class="buttons-block">
              <button class="crm-button">@lang('message.save')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')

<script>
var main_url = '/manager/detials';
</script>

@include('front.crm.scripts')
