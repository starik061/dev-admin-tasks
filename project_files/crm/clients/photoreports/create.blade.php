<div class="photoreports-form">
	<ul class="photoreports-tabs-switch">

		<li class="{{ $fromBoard ? 'active' : ($fromContract ? 'disabled' : ('active')) }}" data-tab="board-tab">
			@lang('message.by_plane')
		</li>
		<li class="{{ $fromContract ? 'active' : ($fromBoard ? 'disabled' : '') }}" data-tab="contract-tab">
			@lang('message.by_contract')
		</li>
	</ul>


	<div class="contracts-tab">
		@if(!$fromBoard && !$fromContract)
			<div class="popup-tab hide" id="contract-tab">
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.client')</label>
						<select id="photoreports-client">
							@if(count($clients) > 1)
								<option>-</option>
							@endif
							@foreach($clients as $client)
								<option value="{{ $client->id }}">{{ $client->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block">
						<label>@lang('message.contract')</label>
						<select id="photoreports-contract" @if(@count($clients) != 1) disabled @endif>
							@if(@count($contracts) != 1)
								<option>-</option>
							@endif
							@if($clients && count($clients) == 1)
								@foreach($contracts as $contract)
									<option value="{{ $contract->id }}">{{ $contract->number }}</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="input-block">
						<label>@lang('message.application')</label>
						<select id="photoreports-application" @if(@count($contracts) != 1) disabled @endif>
							@if(@count($applications) != 1)
								<option>-</option>
							@endif
							@if($contracts && count($contracts) == 1)
								@foreach($applications as $application)
									<option value="{{ $application->id }}">{{ $application->number }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block w570- select2-dd-fix-">
						<label>@lang('message.plane')</label>
						<select id="photoreports-board" @if(@count($applications) != 1) disabled @endif>
							@if(@count($boards) != 1)
								<option>-</option>
							@endif
							@if($applications && count($applications) == 1)
								@foreach($boards as $board)
									<option value="{{ $board->board_id }}">{{ $board->full_title }}</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="input-block w570- select2-dd-fix-">
						<label>@lang('message.period')</label>
						<select id="photoreports-months" @if(@count($boards) != 1) disabled @endif>
							@if(@count($months) != 1)
								<option>-</option>
							@endif
							@if($boards && count($boards) == 1)
								@foreach($months as $ym => $month)
									<option value="{{ $ym }}">{{ $month }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>
			<div class="popup-tab" id="board-tab">
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.client')</label>
						<select id="photoreports-client-2">
							@if(count($clients) > 1)
								<option>-</option>
							@endif
							@foreach($clients as $client)
								<option value="{{ $client->id }}">{{ $client->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.period')</label>
						<select id="photoreports-months-2" @if(@count($clients) != 1) disabled @endif>
							@if(@count($months2) != 1)
								<option>-</option>
							@endif
							@if($clients && count($clients) == 1)
								@foreach($months2 as $ym => $month)
									<option value="{{ $ym }}">{{ $month }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.plane')</label>
						<select id="photoreports-board-2" @if(@count($clients) != 1 && @count($months2) != 1) disabled @endif>
							@if(@count($boards2) != 1)
								<option>-</option>
							@endif
							@if($months2 && @count($months2) == 1)
								@foreach($boards2 as $board)
									<option value="{{ $board->board_id }}">{{ $board->full_title }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>
		@else
			<div class="popup-tab {{ $fromBoard ? 'hide' : ($fromContract ? '' : ('hide')) }}" id="contract-tab">
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.client')</label>
						<select id="photoreports-client">
							@if(count($clients) > 1)
								<option>-</option>
							@endif
							@foreach($clients as $client)
								<option value="{{ $client->id }}">{{ $client->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block">
						<label>@lang('message.contract')</label>
						<select id="photoreports-contract" @if(@count($clients) != 1) disabled @endif>
							@if(@count($contracts) != 1)
								<option>-</option>
							@endif
							@if($clients && count($clients) == 1)
								@foreach($contracts as $contract)
									<option value="{{ $contract->id }}">{{ $contract->number }}</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="input-block">
						<label>@lang('message.application')</label>
						<select id="photoreports-application" @if(@count($contracts) != 1) disabled @endif>
							@if(@count($applications) != 1)
								<option>-</option>
							@endif
							@if($contracts && count($contracts) == 1)
								@foreach($applications as $application)
									<option value="{{ $application->id }}">{{ $application->number }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block w570- select2-dd-fix-">
						<label>@lang('message.plane')</label>
						<select id="photoreports-board" @if(@count($applications) != 1) disabled @endif>
							@if(@count($boards) != 1)
								<option>-</option>
							@endif
							@if($applications && count($applications) == 1)
								@foreach($boards as $board)
									<option value="{{ $board->board_id }}">{{ $board->full_title }}</option>
								@endforeach
							@endif
						</select>
					</div>
					<div class="input-block w570- select2-dd-fix-">
						<label>@lang('message.period')</label>
						<select id="photoreports-months" @if(@count($boards) != 1) disabled @endif>
							@if(@count($months) != 1)
								<option>-</option>
							@endif
							@if($boards && count($boards) == 1)
								@foreach($months as $ym => $month)
									<option value="{{ $ym }}">{{ $month }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>
			<div class="popup-tab {{ $fromContract ? 'hide' : ($fromBoard ? '' : 'hide') }}" id="board-tab">
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.client')</label>
						<select id="photoreports-client-2">
							@if(count($clients) > 1)
								<option>-</option>
							@endif
							@foreach($clients as $client)
								<option value="{{ $client->id }}">{{ $client->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.period')</label>
						<select id="photoreports-months-2" @if(@count($clients) != 1) disabled @endif>
							@if(@count($months2) != 1)
								<option>-</option>
							@endif
							@if($clients && count($clients) == 1)
								@foreach($months2 as $ym => $month)
									<option value="{{ $ym }}">{{ $month }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="field-container">
					<div class="input-block w570 select2-dd-fix">
						<label>@lang('message.plane')</label>
						<select id="photoreports-board-2">
							@if($boards2 && count($boards2))
								@foreach($boards2 as $board)
									<option value="{{ $board->board_id }}">{{ $board->full_title }}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
			</div>
		@endif
	</div>	
	<div class="field-container">
		<div class="input-block w570 radio-buttons">
			<label>@lang('message.work_type')</label>
			<div class="for-radio">
				@foreach($works as $key => $work)
				<div class="radio-button">
	        <input type="radio" name="work_id" value="{{$work->id}}" id="sid_-{{$key}}" @if(!$key) checked @endif>
	        <label for="sid_-{{$key}}">{{$work->name}}</label>
	      </div>
	      @endforeach
    	</div>
		</div>
	</div>
	<span class="information-title">@lang('message.photos')</span>
  <div class="photo-block my-dropzone" action="/target">
    <div class="upload-info-div">
      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.8125 11.25V14.25C2.8125 14.4986 2.91127 14.7371 3.08709 14.9129C3.2629 15.0887 3.50136 15.1875 3.75 15.1875H14.25C14.4986 15.1875 14.7371 15.0887 14.9129 14.9129C15.0887 14.7371 15.1875 14.4986 15.1875 14.25V11.25H16.3125V14.25C16.3125 14.797 16.0952 15.3216 15.7084 15.7084C15.3216 16.0952 14.797 16.3125 14.25 16.3125H3.75C3.20299 16.3125 2.67839 16.0952 2.29159 15.7084C1.9048 15.3216 1.6875 14.797 1.6875 14.25V11.25H2.8125Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.85156 6.39774L5.64706 7.19324L8.99931 3.84099L12.3516 7.19324L13.1471 6.39774L8.99931 2.24999L4.85156 6.39774Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5625 12.0455V3.04553H8.4375V12.0455H9.5625Z" fill="#FC6B40"/>
      </svg>
      @lang('message.upload_photos')
      <span class="break"></span>
      <span class="notice">@lang('message.upload_photos_note')</span>
    </div>
  </div>
  <div class="photo-list">
    <div class="photo-list-item hide select-photo_design" id="photo-1">
      <select>
        <option value="photo_design" selected>@lang('message.layout')</option>
        <option value="photo_near">@lang('message.near')</option>
        <option value="photo_far">@lang('message.far')</option>
        <option value="photo_night">@lang('message.night')</option>
      </select>
    </div>
    <div class="photo-list-item hide select-photo_near" id="photo-2">
      <select>
        <option value="photo_design">@lang('message.layout')</option>
        <option value="photo_near" selected>@lang('message.near')</option>
        <option value="photo_far">@lang('message.far')</option>
        <option value="photo_night">@lang('message.night')</option>
      </select>
    </div>
    <div class="photo-list-item hide select-photo_far" id="photo-3">
      <select>
        <option value="photo_design">@lang('message.layout')</option>
        <option value="photo_near">@lang('message.near')</option>
        <option value="photo_far" selected>@lang('message.far')</option>
        <option value="photo_night">@lang('message.night')</option>
      </select>
    </div>
    <div class="photo-list-item hide select-photo_night" id="photo-4">
      <select>
        <option value="photo_design">@lang('message.layout')</option>
        <option value="photo_near">@lang('message.near')</option>
        <option value="photo_far">@lang('message.far')</option>
        <option value="photo_night" selected>@lang('message.night')</option>
      </select>
    </div>
  </div>
</div>