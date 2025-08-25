<div class="photoreports-data">
  <span class="information-title">Информация</span>
  <div class="information-block">
    <div class="info-row">
      <div class="row-title">@lang('message.contract')</div>
      <div class="row-value">{{$data['contract']}}</div>
    </div>
    <div class="info-row">
      <div class="row-title">@lang('message.application')</div>
      <div class="row-value">{{$data['application']}}</div>
    </div>
    <div class="info-row">
      <div class="row-title">@lang('message.month2')</div>
      <div class="row-value">{{$data['month']}}</div>
    </div>
    <div class="info-row">
      <div class="row-title">@lang('message.plane_code2')</div>
      <div class="row-value">{{$data['code']}}</div>
    </div>
    <div class="info-row">
      <div class="row-title">@lang('message.address')</div>
      <div class="row-value">{{$data['address']}}</div>
    </div>
    <div class="info-row">
      <div class="row-title">@lang('message.type')</div>
      <div class="row-value">{{$data['type']}}</div>
    </div>
  </div>
  <span class="information-title">Фотографии</span>
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