@if($wrongPayment && $issuedByDetail)
	<div class="alert alert-warning">
		<strong>@lang('message.caution')</strong>
		<p>
			{!! __('message.client_paid_wrong_details_part1') !!}<strong>{{ $client->name }}</strong>
			{!! __('message.client_paid_wrong_details_part2') !!}<strong>{{ $issuedByDetail->name_short }}</strong>.
		</p>
		<p>@lang('message.contact_client')</p>
	</div>
@else
	<table class="payment-info-table">
		<tr class="payment-info-table-header">
			<td>№</td>
			<td>@lang('message.date')</td>
			<td>@lang('message.edrpou_')</td>
			<td>@lang('message.payer')</td>
			<td>@lang('message.description')</td>
			<td>@lang('message.sum')</td>
		</tr>
		@foreach($operations as $k => $v)
			<tr>
				<td>{{$k+1}}</td>
				<td>{{$v->operation_date}}</td>
				<td>{{$v->edrpou}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->description}}</td>
				<td>{{$v->sum}}</td>
			</tr>
		@endforeach
	</table>
@endif
