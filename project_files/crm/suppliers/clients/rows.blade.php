@php
$editable = in_array(Auth::user()->id,[1,202,248,263]) ? "editable" : "";

@endphp
@foreach($clients as $client)
@php
	$paidSum = 0;
    $boardsIds = [];
    $index = 0;
    if(isset($clientsBoards[$client->id]) && count($clientsBoards[$client->id])){
		foreach($clientsBoards[$client->id] as $k => $board){
			if( ($client->id == 554 && in_array($period,['2024-04', '2024-06', '2024-07'])) ||
				($client->id == 787 && $period == '2024-06') ||
				($client->id == 37 && $period == '2025-01') ||
				($client->id == 1061 && $period == '2025-02') ||
				($client->id == 716 && $period == '2025-05')
			) {

				if(in_array($board->id, $boardsIds)){
					$index = 1;
				}else{
					$index = 0;
					$boardsIds[] = $board->id;
				}
				if($clientsBoardsInfo[$client->id][$board->id][$index]->supplier_paid){
					$paidSum += $clientsBoardsInfo[$client->id][$board->id][$index]->sum;
				}
			}else{
				if($clientsBoardsInfo[$client->id][$board->id][0]->supplier_paid){
					$paidSum += $clientsBoardsInfo[$client->id][$board->id][0]->sum;
				}
			}
			if($client->id == 37 && $period == '2025-01'){
				$client->sum += $clientsBoardsInfo[$client->id][$board->id][$index]->sum;
			}
			if($client->id == 1061 && $period == '2025-02'){
				$client->sum += $clientsBoardsInfo[$client->id][$board->id][$index]->sum;
			}
            if($client->id == 716 && $period == '2025-05'){
				$client->sum += $clientsBoardsInfo[$client->id][$board->id][$index]->sum;
			}
		}
    }
    if(isset($clientServices[$client->id])){
        foreach($clientServices[$client->id] as $service){
            if($service->supplier_paid){
                $paidSum += $service->sum;
            }
            $client->sum += $service->sum;
        }
    }
	$addClass = "";
    if( ($client->id == 554 && in_array($period,['2024-04', '2024-06', '2024-07'])) || ($client->id == 787 && $period == '2024-06') ){
        $client->sum *= 2;
    }


	if($paidSum && $paidSum < $client->sum){
		$addClass = "bill-detials-2";
	}
	if($paidSum >= $client->sum && $paidSum){
		$addClass = "bill-detials-1";
	}
    //

    $boardsIds = [];
    $index = 0;
@endphp
<div class="supplier-block {{$addClass}}"
	 data-name="{{$client->name}}"
	 data-sum="{{number_format($client->sum, 2, '.', '')}}"
	 data-paid_sum="{{$paidSum}}">
	<div class="supplier-row supplier-data-row">
	    <div class="supplier-col">{{$client->name}} @if($cureentUser->id === 202)({{$client->user->name}})@endif</div>
	    <div class="supplier-col supplier-col-05">{{number_format($client->sum, 2, '.', '')}}</div>
	    <div class="supplier-col supplier-col-05">{{$paidSum}}</div>
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
		@if(isset($clientsBoards[$client->id]) && count($clientsBoards[$client->id]))
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
			@foreach($clientsBoards[$client->id] as $k => $board)
			@if($companyName != ($board->company_name_short ?: $board->company_name))
            <div class="client-company-title">
                <a href="/manager/clients/{{$client->id}}/view" target="_blank">
                    {{($board->company_name_short ?: $board->company_name)}}
                </a>
            </div>
			@php
            $companyName = ($board->company_name_short ?: $board->company_name);
            @endphp
            @endif
			@php
				if (
                    ($client->id == 554 && in_array($period,['2024-04', '2024-06', '2024-07'])) ||
                    ($client->id == 787 && $period == '2024-06') ||
                    ($client->id == 37 && $period == '2025-01') ||
                    ($client->id == 1061 && $period == '2025-02') ||
                    ($client->id == 716 && $period == '2025-05')
                ) {

                    if(in_array($board->id, $boardsIds)){
                        $index = 1;
                    }else{
                        $boardsIds[] = $board->id;
                    }
                }
			@endphp
			<div class="supplier-row">
				<div class="supplier-col">{{$board->id}} / {{$board->code}}</div>
				<div class="supplier-col">{{$board->city_name}}</div>
				<div class="supplier-col">{{$board->title}} {{$board->format}}</div>
				<div class="supplier-col f3">{{$board->addr}}</div>
				<div class="supplier-col f03">{{$board->side}}</div>
				<div class="supplier-col f07">
					@if(!$clientsBoardsInfo[$client->id][$board->id][$index]->date_from)
						{{date('d.m.Y',strtotime($board->getContractBoardInfo($period)->date_from))}} {{date('d.m.Y',strtotime($board->getContractBoardInfo($period)->date_to))}}
					@else
						{{date('d.m.Y',strtotime($clientsBoardsInfo[$client->id][$board->id][$index]->date_from))}} {{date('d.m.Y',strtotime($clientsBoardsInfo[$client->id][$board->id][$index]->date_to))}}
					@endif
				</div>
				<div class="supplier-col f07">{{$clientsBoardsInfo[$client->id][$board->id][$index]->sum ?: $board->getOwnerPrice($period)}}</div>
				<div class="supplier-col">
					<span class="informer @if($clientsBoardsInfo[$client->id][$board->id][$index]->paid) paid @else wait @endif">&bull; @if($clientsBoardsInfo[$client->id][$board->id][$index]->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
					@if($clientsBoardsInfo[$client->id][$board->id][$index]->paid)
					<br>
					<span class="informer-date">{{ date('d.m.Y', strtotime($clientsBoardsInfo[$client->id][$board->id][$index]->paid_at)) }}</span>
					@endif
				</div>
				<div class="supplier-col" id="b-{{$board->id}}">
					<span class="informer {{$editable}} @if($clientsBoardsInfo[$client->id][$board->id][$index]->supplier_paid) paid @else wait @endif"
						  data-id="{{$board->id}}"
						  data-contract_id="{{$clientsBoardsInfo[$client->id][$board->id][$index]->contract_id ?: $board->getContractBoardInfo($period)->contract_id}}"
					>&bull; @if($clientsBoardsInfo[$client->id][$board->id][$index]->supplier_paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
					@if($clientsBoardsInfo[$client->id][$board->id][$index]->supplier_paid)
					<br>
					<span class="informer-date">{{ date('d.m.Y', strtotime($clientsBoardsInfo[$client->id][$board->id][$index]->supplier_paid_at)) }}</span>
					<span class="informer-form">
					@php
					$spf = '';
                    switch($clientsBoardsInfo[$client->id][$board->id][$index]->supplier_paid_form){
						case "1": $spf = 'Безнал ТОВ'; break;
						case "2": $spf = 'Безнал ФОП'; break;
						case "3": $spf = 'Форма 2'; break;
					}
					@endphp
						{{ $spf }}
					</span>
					@endif
				</div>
			</div>
			@endforeach
		@endif
		@if(isset($clientServices[$client->id]))
			<b>@lang('message.additional_services')</b><br><br>
			<div class="suppliers-thead">
				<div class="supplier-col">№</div>
				<div class="supplier-col f73">доп. услуга</div>
				<div class="supplier-col f07">@lang('message.purchase_price')</div>
				<div class="supplier-col">@lang('message.payment_from_the_client')</div>
				<div class="supplier-col">@lang('message.payment_to_the_owner')</div>
			</div>
			@foreach($clientServices[$client->id] as $k => $service)
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
						<span class="informer @if($service->paid) paid @else wait @endif">&bull; @if($service->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
						@if($service->paid)
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
@endforeach
