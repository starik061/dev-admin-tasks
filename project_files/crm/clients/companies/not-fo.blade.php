<div class="company-info">
  <div class="block">
	<div class="line">
	  <div class="title">@lang('message.drfo_edrpou')</div>
	  <div class="value">{{$company->edrpou}}</div>
	</div>
	@if($company->inn)
	<div class="line">
	  <div class="title">@lang('message.inn2')</div>
	  <div class="value">{{$company->inn}}</div>
	</div>
	@endif
	<div class="line">
	  <div class="title">@lang('message.tax_status')</div>
	  <div class="value">{{$company->company_tax_status->name}}</div>
	</div>
  </div>
  <hr/>
  <div class="block">
	<span class="block-title">@lang('message.ur_address')</span>
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
	  <div class="title">@lang('message.office')</div>
	  <div class="value">{{$company->ur_office}}</div>
	</div>
  </div>
  <hr/>
  <div class="block">
	<span class="block-title">@lang('message.post_address')</span>
	<div class="line">
	  <div class="title">@lang('message.index')</div>
	  <div class="value">{{$company->post_index}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.city')</div>
	  <div class="value">{{$company->post_city}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.address')</div>
	  <div class="value">{{$company->post_address}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.house')</div>
	  <div class="value">{{$company->post_house}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.office')</div>
	  <div class="value">{{$company->post_office}}</div>
	</div>
  </div>
  <hr/>
  <div class="block">
	<span class="block-title">@lang('message.bank_details')</span>
	<div class="line">
	  <div class="title">IBAN</div>
	  <div class="value">{{$company->iban}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.bank_name')</div>
	  <div class="value">{{$company->bank_name}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.mfo')</div>
	  <div class="value">{{$company->mfo}}</div>
	</div>
  </div>
  <hr/>
  <div class="block">
	<span class="block-title">@lang('message.director')</span>
	<div class="line">
	  <div class="title">@lang('message.fio2')</div>
	  <div class="value">{{ $company->director_fio ? $company->director_fio : $company->fio }}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.post')</div>
	  <div class="value">{{$company->post}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.fio_r')</div>
	  <div class="value">{{ $company->director_fio_r ? $company->director_fio_r : $company->fio_r }}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.post_r')</div>
	  <div class="value">{{$company->post_r}}</div>
	</div>
	<div class="line">
	  <div class="title">@lang('message.based_on')</div>
	  <div class="value">{{$company->based_on}}</div>
	</div>
  </div>
  <hr/>
  <div class="block">
	<span class="block-title">@lang('message.additional')</span>
	<div class="line">
	  <div class="title">@lang('message.domain')</div>
	  <div class="value">{{ $company->domain }}</div>
	</div>
  </div>
</div>