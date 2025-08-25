@php
$editable = in_array(Auth::user()->id,[1,202,248,263]) ? "editable" : "";
$resultAll = 0;
$resultPaid = 0;
if(Auth::user()->id == 202){
    //dd($suppliersBoardsInfo, $suppliers);
}
@endphp
@foreach($suppliers as $supplier)
	@php
	/*if(!count($suppliersBoardsInfo[$supplier->id])){
		continue;
	}*/
	$paidSum = 0;
	$supplierSum = 0; //вместо $supplier->sum которое уже не актуально
	if(isset($suppliersBoardsInfo[$supplier->id])){
		foreach($suppliersBoardsInfo[$supplier->id] as $clientDetailId => $clientInfo){
			$board = null;
			foreach($clientInfo as $boardId => $boardInfo){
				foreach($suppliersBoards[$supplier->id] as $k => $b){
					if( ($client->id != 554 && $client->id != 787 && $client->id != 37 && $client->id != 1061) || ($client->id == 554 && !in_array($period, ['2024-04'/*,'2024-05'*/, '2024-06','2024-07'])) || ($client->id == 787 && $period != '2024-06')  || ($client->id == 37 && $period != '2025-01') || ($client->id == 1061 && $period != '2025-02')){
						if($b->id == $boardId){
							$board = $b;
							$cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$boardInfo[0]->contract_board_id)->where('paid_period',$period)->first();
							if($cbsp){
								$boardInfo[0]->supplier_paid = $cbsp->supplier_paid;
								$boardInfo[0]->cbsp_sum = $cbsp->sum;
							}else{
								$boardInfo[0]->supplier_paid = 0;
							}
							if($boardInfo[0]->supplier_paid){
								$paidSum += $cbsp->sum; //$boardInfo[0]->owner_price;
								$supplierSum += $cbsp->sum;
							}else{
								$supplierSum += $boardInfo[0]->cbsp_sum ?: $boardInfo[0]->owner_price;
							}
							break;

						}
					}elseif( ($client->id == 554 && in_array($period, ['2024-04'/*,'2024-05'*/,'2024-06', '2024-07'])) || ($client->id == 787 && $period == '2024-06') || ($client->id == 37 && $period == '2025-01') || ($client->id == 1061 && $period == '2025-02')){
						if($b->id == $boardId){
							$board = $b;
							$cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$boardInfo[0]->contract_board_id)->where('paid_period',$period)->first();
							if($cbsp){
								$boardInfo[0]->supplier_paid = $cbsp->supplier_paid;
								$boardInfo[0]->cbsp_sum = $cbsp->sum;
							}else{
								$boardInfo[0]->supplier_paid = 0;
							}
							if($boardInfo[0]->supplier_paid){
								$paidSum += $cbsp->sum; //$boardInfo[0]->owner_price;
								$supplierSum += $cbsp->sum;
							}else{
								$supplierSum += $boardInfo[0]->cbsp_sum ?: $boardInfo[0]->owner_price;
							}

							//SECOND PERIOD
							$cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$boardInfo[1]->contract_board_id)->where('paid_period',$period)->first();
							if($cbsp){
								$boardInfo[1]->supplier_paid = $cbsp->supplier_paid;
								$boardInfo[1]->cbsp_sum = $cbsp->sum;
							}else{
								$boardInfo[1]->supplier_paid = 0;
							}
							if($boardInfo[1]->supplier_paid){
								$paidSum += $cbsp->sum; //$boardInfo[0]->owner_price;
								$supplierSum += $cbsp->sum;
							}else{
								$supplierSum += $boardInfo[1]->cbsp_sum ?: $boardInfo[1]->owner_price;
							}
						}
					}
				}
				if(!$board){
					continue;
				}
			}
		}
    }
    if(isset($suppliersServices[$supplier->id])){
		foreach($suppliersServices[$supplier->id] as $service){
			$supplierSum += $service->sum;
			if($service->supplier_paid){
				$paidSum += $service->sum;
			}
		}
	}
    $dontShow = $client->id == 1498 && $period == '2025-05';
    if($dontShow){
        $supplierSum = 0;
    }
	$board = null;
	$addClass = "";
	if($paidSum && $paidSum < $supplierSum){
		$addClass = "bill-detials-2";
	}
	if($paidSum >= $supplierSum && $paidSum){
		$addClass = "bill-detials-1";
	}
	@endphp

<div class="supplier-block {{$addClass}}"
	 data-name="{{$supplier->name}}"
	 data-sum="{{number_format($supplierSum, 2, '.', '')}}"
	 data-paid_sum="{{$paidSum}}">
	<div class="supplier-row supplier-data-row">
	    <div class="supplier-col"><a href="/manager/suppliers/{{$supplier->id}}/view" target="_blank">{{$supplier->name}}</a></div>
	    <div class="supplier-col sum-by-supplier supplier-col-05">{{number_format($supplierSum,2,'.','')}}</div>
	    <div class="supplier-col sum-by-supplier-paid supplier-col-05">{{$paidSum}}</div>
	    <div class="supplier-col action-col">
	    	<span class=" pointer up-down-new">
	          <svg fill="#FC6B40" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727" xml:space="preserve"  class="info-arrow">
	            <g class="info-arrow">
	              <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
	                l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"  class="info-arrow"/>
	            </g>
	          </svg>
	        </span>
	    </div>
	</div>
	<div class="supplier-row-selects hide">
		<!-- Информация о бордах -->
		@if(isset($suppliersBoards[$supplier->id]))
			<div class="suppliers-thead">
				<div class="supplier-col">ID / @lang('message.code')</div>
				<div class="supplier-col">@lang('message.city_')</div>
				<div class="supplier-col">@lang('message.type_')</div>
				<div class="supplier-col f3">@lang('message.address_')</div>
				<div class="supplier-col f03">ст.</div>
				<div class="supplier-col f07">@lang('message.period_lc')</div>
				<div class="supplier-col f07">@lang('message.purchase_price')</div>
				<div class="supplier-col">@lang('message.payment_from_the_client')</div>
				<div class="supplier-col">@lang('message.payment_to_the_owner')</div>
			</div>
			@php
            $companyName = "";
            @endphp
            @foreach($suppliersBoardsInfo[$supplier->id] as $clientDetailId => $clientInfo)
	            @php
		            $firstBoard = $clientInfo[array_key_first($clientInfo)][0];
		            $companyName = ($firstBoard->company_name_short ?: $firstBoard->company_name);
		            if($firstBoard->act_id == 912){
		            	$companyName = 'ФОП Кореганова Ю.А.';
		            }
	            @endphp
	            @if(count($suppliersBoardsInfo[$supplier->id]) > 1 || $firstBoard->act_id == 912)
	            <div class="client-company-title">{{ $companyName }}</div>
	            @endif
				@foreach($clientInfo as $boardId => $boardInfo)
				@php
					$board = null;
					foreach($suppliersBoards[$supplier->id] as $k => $b){
						if($b->id == $boardId){
							$board = $b;
							break;
						}
					}
					if(!$board){
						continue;
					}
				@endphp
				<div class="supplier-row">
					<div class="supplier-col">{{$board->id}} / {{$board->code}}</div>
					<div class="supplier-col">{{\App::getLocale() == 'ru' ? $board->board_city->name : $board->board_city->name_ua}}</div>
					<div class="supplier-col">{{$board->board_type ? $board->board_type->getTranslatedAttribute('title', \App::getLocale(), 'ru') : ''}} {{$board->format}}</div>
					<div class="supplier-col f3">{{$board->addr}}</div>
					<div class="supplier-col f03">{{$board->side}}</div>
					<div class="supplier-col f07">{{date('d.m.Y',strtotime($boardInfo[0]->date_from))}} {{date('d.m.Y',strtotime($boardInfo[0]->date_to))}}</div>
					<div class="supplier-col f07 owner-price">
						@if($boardInfo[0]->supplier_paid || Auth::user()->role_id == 5)
						{{--$boardInfo[0]->owner_price--}}
						{{ $boardInfo[0]->cbsp_sum ?: $boardInfo[0]->owner_price }}
						@else
						<input class="owner-price" type="text" data-client_id="{{$client->id}}" data-contract_id="{{$boardInfo[0]->contract_id}}" data-act_id="{{$boardInfo[0]->act_id}}" data-board_id="{{$board->id}}" data-contract_board_id="{{$boardInfo[0]->cbid}}" value="{{ $boardInfo[0]->cbsp_sum ?: $boardInfo[0]->owner_price }}" data-default_price="{{ $boardInfo[0]->cbsp_sum ?: $boardInfo[0]->owner_price }}" data-period="{{$period}}"/>
						@endif
					</div>
					<div class="supplier-col">
						<span class="informer @if($boardInfo[0]->paid && !$dontShow) paid @else wait @endif" style="display:inline-block;">&bull; @if($boardInfo[0]->paid && !$dontShow) @lang('message.paid') @else @if(!$dontShow) @lang('message.wait') @else @lang('message.refund__') @endif @endif</span>
						@if($boardInfo[0]->paid && !$boardInfo[0]->returned)
						<br> 
						<span class="informer-date">{{ date('d.m.Y', strtotime($boardInfo[0]->paid_at)) }}</span>
						@endif
					</div>
					<div class="supplier-col" id="b-{{$board->id}}">
						@php
						$cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$boardInfo[0]->contract_board_id)->where('paid_period',$period)->first();
						if($cbsp){
							$boardInfo[0]->supplier_paid = $cbsp->supplier_paid;
						}else{
							$boardInfo[0]->supplier_paid = 0;
						}
						@endphp
						<span class="informer {{$editable}} @if($boardInfo[0]->supplier_paid) paid @else wait @endif" data-id="{{$board->id}}" data-contract_id="{{$boardInfo[0]->contract_id}}">&bull;
						@if($boardInfo[0]->supplier_paid) @lang('message.paid') @else  @lang('message.wait') @endif</span>
						@if($boardInfo[0]->supplier_paid)
						<br>
						<span class="informer-date">{{ date('d.m.Y', strtotime($boardInfo[0]->supplier_paid_at)) }}</span>
						<span class="informer-form">
						@php
						$spf = '';
						switch($boardInfo[0]->supplier_paid_form){
				          case "1": $spf = __('message.bank_tov'); break;
				          case "2": $spf = __('message.bank_fop'); break;
				          case "3": $spf = __('message.bank_form2'); break;
				        }
						@endphp
							{{ $spf }}
						</span>
						@endif
					</div>
				</div>
					@if( ($client->id == '554' && in_array($period, ['2024-04','2024-07'])) || ($client->id == 787 && $period == '2024-06') || ($client->id == 37 && $period == '2025-01') || ($client->id == 1061 && $period == '2025-02') )
						<div class="supplier-row"> 
							<div class="supplier-col">{{$board->id}} / {{$board->code}}</div>
							<div class="supplier-col">{{$board->board_city->name}}</div>
							<div class="supplier-col">{{$board->board_type->title}} {{$board->format}}</div>
							<div class="supplier-col f3">{{$board->addr}}</div>
							<div class="supplier-col f03">{{$board->side}}</div>
							<div class="supplier-col f07">{{date('d.m.Y',strtotime($boardInfo[1]->date_from))}} {{date('d.m.Y',strtotime($boardInfo[1]->date_to))}}</div>
							<div class="supplier-col f07 owner-price">
								@if($boardInfo[1]->supplier_paid || Auth::user()->role_id == 5)
									{{--$boardInfo[0]->owner_price--}}
									{{ $boardInfo[1]->cbsp_sum ?: $boardInfo[1]->owner_price }}
								@else
									<input class="owner-price"
										   type="text"
										   data-client_id="{{$client->id}}"
										   data-contract_id="{{$boardInfo[1]->contract_id}}"
										   data-act_id="{{$boardInfo[1]->act_id}}"
										   data-board_id="{{$board->id}}"
										   data-contract_board_id="{{$boardInfo[1]->cbid}}"
										   value="{{ $boardInfo[1]->cbsp_sum ?: $boardInfo[1]->owner_price }}"
										   data-default_price="{{ $boardInfo[1]->cbsp_sum ?: $boardInfo[1]->owner_price }}"
										   data-period="{{$period}}"
									/>
								@endif
							</div>
							<div class="supplier-col">
								<span class="informer @if($boardInfo[1]->paid) paid @else wait @endif">&bull; @if($boardInfo[1]->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
								@if($boardInfo[1]->paid)
									<br>
									<span class="informer-date">{{ date('d.m.Y', strtotime($boardInfo[1]->paid_at)) }}</span>
								@endif
							</div>
							<div class="supplier-col" id="b-{{$board->id}}">
								@php
									$cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$boardInfo[1]->contract_board_id)->where('paid_period',$period)->first();
                                    if($cbsp){
                                        $boardInfo[1]->supplier_paid = $cbsp->supplier_paid;
                                    }else{
                                        $boardInfo[1]->supplier_paid = 0;
                                    }
								@endphp
								<span class="informer {{$editable}} @if($boardInfo[1]->supplier_paid) paid @else wait @endif"
									  data-id="{{$board->id}}"
									  data-contract_id="{{$boardInfo[1]->contract_id}}"
								>&bull; @if($boardInfo[1]->supplier_paid) @lang('message.paid') @else  @lang('message.wait') @endif</span>
								@if($boardInfo[1]->supplier_paid)
									<br>
									<span class="informer-date">{{ date('d.m.Y', strtotime($boardInfo[1]->supplier_paid_at)) }}</span>
									<span class="informer-form">
										@php
											$spf = '';
											switch($boardInfo[0]->supplier_paid_form){
											  case "1": $spf = __('message.bank_tov'); break;
											  case "2": $spf = __('message.bank_fop'); break;
											  case "3": $spf = __('message.bank_form2'); break;
											}
										@endphp
										{{ $spf }}
									</span>
								@endif
							</div>
						</div>
					@endif
				@endforeach
			@endforeach
		@endif
		@if(isset($suppliersServices[$supplier->id]))
			<b>@lang('message.additional_services')</b><br><br>
			<div class="suppliers-thead">
				<div class="supplier-col">№</div>
				<div class="supplier-col f73">доп. услуга</div>
				<div class="supplier-col f07">@lang('message.purchase_price')</div>
				<div class="supplier-col">@lang('message.payment_from_the_client')</div>
				<div class="supplier-col">@lang('message.payment_to_the_owner')</div>
			</div>
			@foreach($suppliersServices[$supplier->id] as $k => $service)
				<div class="supplier-row">
					<div class="supplier-col">{{$k+1}}</div>
					<div class="supplier-col f73">{{$service->name}}</div>
					<div class="supplier-col f07 supplier-price">
						@if($service->supplier_paid || Auth::user()->role_id == 5)
							{{ $service->sum }}
						@else
							<input class="supplier-price"
								   type="text"
								   data-client_id="{{$client->id}}"
								   data-service_id="{{$service->service_id}}"
								   data-payment_id="{{$service->payment_id}}"
								   data-default_price="{{$service->sum}}"
								   value="{{$service->sum}}"
							/>
						@endif
					</div>
					<div class="supplier-col">
						<span class="informer @if($service->paid && !$dontShow) paid @else wait @endif" style="display: inline-block;">&bull; @if($service->paid && !$dontShow) @lang('message.paid') @else @if(!$dontShow) @lang('message.wait') @else @lang('message.refund__') @endif @endif</span>
						@if($service->paid && !$dontShow)
							<br>
							<span class="informer-date">{{ date('d.m.Y', strtotime($service->paid_at)) }}</span>
						@endif
					</div>
					<div class="supplier-col" id="s-{{$service->payment_id}}">
						<span class="informer2 {{$editable}} @if($service->supplier_paid) paid @else wait @endif"
							  data-id="{{$service->payment_id}}"
						>&bull; @if($service->supplier_paid) @lang('message.paid') @else  @lang('message.wait') @endif</span>
						@if($service->supplier_paid)
							<br>
							<span class="informer-date">{{ date('d.m.Y', strtotime($service->supplier_paid_at)) }}</span>
							<span class="informer-form">
								@php
									$spf = '';
									switch($service->supplier_paid_form){
									  case "1": $spf = __('message.bank_tov'); break;
									  case "2": $spf = __('message.bank_fop'); break;
									  case "3": $spf = __('message.bank_form2'); break;
									}
								@endphp
								{{ $spf }}
							</span>
						@endif
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>
	@php
		$resultAll += $supplierSum;
		$resultPaid += $paidSum;
	@endphp
@endforeach
<div class="supplier-block">
	<div class="supplier-row supplier-data-row">
		<div class="supplier-col"><b>@lang('message.itogo3')</b></div>
		<div class="supplier-col sum-by-supplier supplier-col-05"><b>{{number_format($resultAll,2,'.','')}}</b></div>
		<div class="supplier-col sum-by-supplier-paid supplier-col-05"><b>{{number_format($resultPaid,2,'.','')}}</b></div>
		<div class="supplier-col action-col"></div>
	</div>
</div>

