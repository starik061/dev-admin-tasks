<div class="app-list-line">
	<div class="contract-info line-title">@lang('message.contract')</div>
	<div class="app-info line-title">@lang('message.application')</div>
</div>
@foreach($applications as $app)
<div class="app-list-line">
	<div class="contract-info">
		@if($sameContract)
		<input type="checkbox" name="application_id[]" value="{{$app->id}}" class="multy-app"/>
		@endif
		№{{$app->contract->number}} @lang('message.from') {{$app->contract->day.".".$app->contract->month.".".$app->contract->year}}
	</div>
	<div class="app-info">
		№{{$app->number}}
	</div>
</div>
@endforeach