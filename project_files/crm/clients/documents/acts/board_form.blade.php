
@php
$index = 0;
@endphp

<div class="manual-boards-wrap">
	<h2>@lang('message.add_board_manual')</h2>
	<div class="manual-boards-list">
		<form id="manual-add-boards-form" enctype="multipart/form-data" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">
			@include('front.crm.clients.contracts.acts.board_form_item')
		</form>
		<div class="form-action">
			<a href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/get-manual-board-form-item" class="manual-board-form-item-add">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.54166C10.3452 3.54166 10.625 3.82148 10.625 4.16666V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16666C9.375 3.82148 9.65482 3.54166 10 3.54166Z" fill="#FC6B40"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z" fill="#FC6B40"/>
				</svg>
				@lang('message.add_more')
			</a>
		</div>
		<div class="align-right form-buttons">
			<a class="btn pointer manual-add-boards-form-clear">@lang('message.cancel')</a>
			<a class="crm-button manual-add-boards-form-submit pointer">@lang('message.add_plane')</a>
		</div>
	</div>
</div>