<div class="company-info">
  <div class="block">
		<div class="line">
		  <div class="title">@lang('message.fio_full_r')</div>
		  <div class="value">{{$company->fio_full_r}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.inn2')</div>
		  <div class="value">{{$company->inn}}</div>
		</div>
  </div>
  <hr/>
  <div class="block">
		<span class="block-title">@lang('message.passport_data')</span>
		<div class="line">
		  <div class="title">@lang('message.passport_series')</div>
		  <div class="value">{{$company->passport_series}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.passport_number')</div>
		  <div class="value">{{$company->passport_number}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.passport_issued')</div>
		  <div class="value">{{$company->passport_issued}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.passport_valid_to')</div>
		  <div class="value">{{$company->passport_valid_to}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.passport_record')</div>
		  <div class="value">{{$company->passport_record}}</div>
		</div>
  </div>
  <hr/>
  <div class="block">
		<span class="block-title">@lang('message.registration_place')</span>
		<div class="line">
	  	<div class="title">@lang('message.index')</div>
	  	<div class="value">{{$company->ur_index}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.city')</div>
		  <div class="value">{{$company->ur_city}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.address')</div>
		  <div class="value">{{$company->ur_address}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.house')</div>
		  <div class="value">{{$company->ur_house}}</div>
		</div>
		<div class="line">
		  <div class="title">@lang('message.flat')</div>
		  <div class="value">{{$company->ur_office}}</div>
		</div>
  </div>
  <hr/>
  <div class="block">
		<span class="block-title">@lang('message.contacts')</span>
		<div class="line">
		  <div class="title">@lang('message.phone')</div>
		  <div class="value">{{ $company->phone }}</div>
		</div>
  </div>
</div>