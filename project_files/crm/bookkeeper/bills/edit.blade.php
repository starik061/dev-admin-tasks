<div class="bookkeeper-bill-edit-popup">
  <div class="act-popup-title">
    <h2>@lang('message.bill_edit')</h2>
  </div>
  <form id="bill-approve-form">
  	<input type="hidden" name="id" value="{{$bill->id}}"/>
	  <div class="bill-details-info">
	  	<div class="field-container">
	  		<div class="input-block">
	  			<label>@lang('message.bill_number2')</label>
	  			<input name="number" value="{{$bill->number}}">
	  		</div>
	  		<div class="input-block">
	  			<label>@lang('message.date')</label>
	  			<input name="date" value="{{$bill->date}}" class="bill-date-datepicker" data-min-date="{{$bill->act->date}}" required>
	  		</div>
	  		<div class="input-block">
	  			<label>@lang('message.payment')</label>
	  			<input name="pay_date" value="{{$bill->pay_date}}" class="bill-pay-date-datepicker" data-min-date="{{$bill->act->date}}" required>
	  		</div>
	  	</div>
	  	<div class="text-info-block">
	  		<div class="text-info-line">
	  			<div class="text-info-title">@lang('message.organization'):</div>
	  			<div class="text-info-value">{{$bill->contract->our_company_name_short}}</div>
	  		</div>
	  		<div class="text-info-line">
	  			<div class="text-info-title">@lang('message.contragent'):</div>
	  			<div class="text-info-value">{{$bill->contract->company_name_short ?? $bill->contract->fio_full}}</div>
	  		</div>
	  		<div class="text-info-line">
	  			<div class="text-info-title">@lang('message.contract'):</div>
	  			<div class="text-info-value">@if($bill->contract->number == '-') надання послуг @else №{{$bill->contract->number}} @lang('message.from') {{$bill->contract->day.".".$bill->contract->month.".".$bill->contract->year}} @endif</div>
	  		</div>
	  		@if($bill->contract->number != '-')
	  		<div class="text-info-line">
	  			<div class="text-info-title">@lang('message.application'):</div>
	  			<div class="text-info-value">
	  				{{--№{{$bill->act->number}} @lang('message.from') {{date('d.m.Y',strtotime($bill->act->date))}}--}}
	  				{{$appData}}
	  			</div>
	  		</div>
	  		@endif
	  	</div>
			<div class="">
				<h3>@lang('message.services')</h3>
			</div>
			<div class="items-list">
				@php
				$sum = 0;
				@endphp
				@foreach($bill->items as $k => $item)
					<input type="hidden" name="contract_service_id[]" value="{{$item->contract_service_id}}">
					<input type="hidden" name="contract_board_id[]" value="{{$item->contract_board_id}}">
				<div class="item">
					<div class="field-container">
						<div class="input-block number-block">
							@if(!$k)
							<label>&nbsp;</label>
							@endif
							<span class="line-number">
								{{$k+1}}
							</span>
						</div>
						<div class="input-block name-block">
							@if(!$k)
							<label>@lang('message.company_name2')</label>
							@endif
							<input name="name[]" value="{{$item->name}}" required>
						</div>
						<div class="input-block number-block">
							@if(!$k)
							<label>@lang('message.qty')</label>
							@endif
							<input name="count[]" value="{{$item->count}}" class="count-input" required>
						</div>
						<div class="input-block number-block">
							@if(!$k)
							<label>@lang('message.without_vat')</label>
							@endif
							<input name="price_without_nds[]" value="{{$item->price_without_nds}}" class="price-input" required>
						</div>
						@if($bill->act->nds)
						<div class="input-block number-block">
							@if(!$k)
							<label>@lang('message.price_with_vat')</label>
							@endif
							<input name="price[]" value="{{$item->price}}" class="price-input vat" required>
						</div>
						@endif
						<div class="input-block number-block">
							@if(!$k)
							<label>@lang('message.itogo_without_vat')</label>
							@endif
							@php
								$sum += $item->sum_without_nds;
							@endphp
							<input name="sum_without_nds[]" value="{{$item->sum_without_nds}}" class="sum-input" disabled>
						</div>
						@if($bill->act->nds)
						<div class="input-block number-block">
							@if(!$k)
							<label>@lang('message.itogo_vat')</label>
							@endif
							<input name="sum_nds[]" value="{{$item->sum}}" class="sum-vat-input" disabled>
						</div>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			<div class="bill-result">
				<div class="result-line">
					<div class="text">@lang('message.itogo_without_vat_uah')</div>
					<div class="value result-sum">{{number_format($sum, 2, ',', '')}}</div>
				</div>
				@if($bill->contract->our_nds)
				<div class="result-line">
					<div class="text">@lang('message.vat_uah')</div>
					<div class="value result-nds">{{number_format($sum*0.2, 2, ',', '')}}</div>
				</div>
				<div class="result-line">
					<div class="text">@lang('message.itogo_vat_uah')</div>
					<div class="value result-sum-nds">{{number_format($sum*1.2, 2, ',' ,'')}}</div>
				</div>
				@endif
			</div>
            
			<div class="right-block">
				<button class="crm-button">@lang('message.need_approve')</button>
				<div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
			</div>
            
	  </div>
	</form>
</div>
<style type="text/css">
	.line-number{
		padding-top: 15px;
		display: inline-block;
	}
</style>