<div class="manual-boards-list-item active" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">
	<div class="item-header">
		<div class="board-title">
			<span class="up-down">
				<svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="info-arrow">
		            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z" fill="#3D445C"></path>
				</svg>
			</span>
			@lang('message.plane') №<span class="number"><!--00000-->{{$index ? $index : $index+1}}</span>
		</div>
		<div class="item-action">
			<a class="pointer board-delete">
				<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
	            	<path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
	            	<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
	            	<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
	            	<path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
	          	</svg>
			</a>
		</div>
	</div>
	<div class="form">
		<span class="informer">@lang('message.information')</span>
		<div class="field-container">
			<div class="input-block">
				<label>@lang('message.photo')</label>
				<input type="file" name="manual_image[]" class="manual_image"/>
			</div>
			<div class="input-block">
				<label>@lang('message.firm')</label>
				<input type="text" name="manual_firm[]" placeholder="@lang('message.enter_firm_name')" class="manual_firm" required />
			</div>
			<div class="input-block">
				<label>@lang('message.plane_code2')</label>
				<input type="text" name="manual_code[]" placeholder="@lang('message.enter_code2')" class="manual_code" required />
			</div>
			<div class="input-block">
				<label>@lang('message.city')</label>
				<select name="manual_city[]" class="manual_city select2">
				@foreach($cities as $key => $city)
					<option value="{{$city->id}}">{{\App::getLocale() == 'ru' ? $city->name : $city->name_ua}}</option>
				@endforeach
				</select>
			</div>
			<div class="input-block">
				<label>@lang('message.address')</label>
				<input type="text" name="manual_addr[]" placeholder="@lang('message.enter_address')" class="manual_addr" required />
			</div>
			<div class="input-block">
				<label>@lang('message.type')</label>
				<select name="manual_type[]" class="manual_type select2">
				@foreach($types as $key => $type)
					<option value="{{$type->type}}">{{$type->title}}</option>
				@endforeach
				</select>
			</div>
			<div class="input-block">
				<label>@lang('message.size')</label>
				<input type="text" name="manual_format[]" placeholder="Введите размер" class="manual_format"/>
			</div>
			<div class="input-block">
				<label>@lang('message.side')</label>

				<select name="manual_side[]" class="manual_side select2">
				@foreach($sides as $key => $side)
					<option value="{{$side}}">{{$side}}</option>
				@endforeach
				</select>
			</div>
			<div class="input-block">
				<label>@lang('message.light')</label>
				<select name="manual_light[]" class="manual_light select2">
					<option value="true">@lang('message.yes')</option>
					<option value="false" selected>@lang('message.no')</option>
				</select>
			</div>
		</div>
		<span class="mt20 informer">@lang('message.period')</span>
		<div class="field-container">
			<div class="input-block date-block">
				<input type="text" name="manual_date_from[]" class="manual_date_from checkable" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" id="df_{{$client->id}}-{{$contract->id}}-{{$act->id}}-{{$index}}"/>
				-
				<input type="text" name="manual_date_to[]" class="manual_date_to checkable" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}"id="dt_{{$client->id}}-{{$contract->id}}-{{$act->id}}-{{$index}}"/>
			</div>
		</div>
		<span class="mt20 informer">@lang('message.price')</span>
		<div class="field-container">
			<div class="input-block">
				<label>-@lang('message.in_price_without_vat')</label>
				<input type="text" name="manual_price[]" class="manual_price price-input" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}"/>
			</div>
			<div class="input-block">
				<label>@lang('message.out_price_without_vat')</label>
				<input type="text" name="manual_client_price[]" class="manual_client_price price-input" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}"/>
			</div>
			<div class="input-block">
				<label>@lang('message.result_without_vat')</label>
				<input type="text" name="manual_client_price_total[]" class="manual_client_price_total price-input" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}"/>
			</div>
		</div>
	</div>
</div>