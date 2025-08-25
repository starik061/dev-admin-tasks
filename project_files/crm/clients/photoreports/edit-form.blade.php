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
    <div class="info-row radio-buttons">
        <div class="row-title">@lang('message.work_type')</div>
        <div class="for-radio row-value">
          @foreach($data['works'] as $work)
          <div class="radio-button">
            <input type="radio" name="work_id" value="{{$work->id}}" id="sid_-{{$work->id}}" @if($work->id == $data['work_id']) checked @endif>
            <label for="sid_-{{$work->id}}">{{$work->name}}</label>
          </div>
          @endforeach
        </div>
    </div>
  </div>
  <span class="information-title">@lang('message.photos')</span>
  <div class="photo-list">
    <div class="photo-list-item">
      <div class="photo-desing my-file-uploader" data-photo="{{ $data['photo_design'] }}">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.8125 11.25V14.25C2.8125 14.4986 2.91127 14.7371 3.08709 14.9129C3.2629 15.0887 3.50136 15.1875 3.75 15.1875H14.25C14.4986 15.1875 14.7371 15.0887 14.9129 14.9129C15.0887 14.7371 15.1875 14.4986 15.1875 14.25V11.25H16.3125V14.25C16.3125 14.797 16.0952 15.3216 15.7084 15.7084C15.3216 16.0952 14.797 16.3125 14.25 16.3125H3.75C3.20299 16.3125 2.67839 16.0952 2.29159 15.7084C1.9048 15.3216 1.6875 14.797 1.6875 14.25V11.25H2.8125Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.85156 6.39774L5.64706 7.19324L8.99931 3.84099L12.3516 7.19324L13.1471 6.39774L8.99931 2.24999L4.85156 6.39774Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5625 12.0455V3.0455H8.4375V12.0455H9.5625Z" fill="#FC6B40"/>
        </svg><br>
        <span>@lang('message.drag_here')<br/><span class="red">@lang('message.or_click_to_upload')</span></span>
        @if($data['photo_design'])
        <div class="img-div" style="background: url(/storage/{{$data['photo_design']}}) center center no-repeat; background-size: cover;">
          <img src="/assets/img/upload-img.svg" class="upload-file-ico"/>
          <img src="/assets/img/trash-img.svg" class="trash-file-ico" data-field="photo_design" data-id="{{$data['id']}}"/>
        </div>
        @endif
      </div>
      <form class="file-form">
        <input type="file" name="file"/>
      </form>
      <div>
        <select>
          <option value="photo_design" selected>@lang('message.layout')</option>
          <option value="photo_near">@lang('message.near')</option>
          <option value="photo_far">@lang('message.far')</option>
          <option value="photo_night">@lang('message.night')</option>
        </select>
      </div>
    </div>
    <div class="photo-list-item">
      <div class="photo-desing my-file-uploader" data-photo="{{ $data['photo_near'] }}">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.8125 11.25V14.25C2.8125 14.4986 2.91127 14.7371 3.08709 14.9129C3.2629 15.0887 3.50136 15.1875 3.75 15.1875H14.25C14.4986 15.1875 14.7371 15.0887 14.9129 14.9129C15.0887 14.7371 15.1875 14.4986 15.1875 14.25V11.25H16.3125V14.25C16.3125 14.797 16.0952 15.3216 15.7084 15.7084C15.3216 16.0952 14.797 16.3125 14.25 16.3125H3.75C3.20299 16.3125 2.67839 16.0952 2.29159 15.7084C1.9048 15.3216 1.6875 14.797 1.6875 14.25V11.25H2.8125Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.85156 6.39774L5.64706 7.19324L8.99931 3.84099L12.3516 7.19324L13.1471 6.39774L8.99931 2.24999L4.85156 6.39774Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5625 12.0455V3.0455H8.4375V12.0455H9.5625Z" fill="#FC6B40"/>
        </svg><br>
        <span>@lang('message.drag_here')<br/><span class="red">@lang('message.or_click_to_upload')</span></span>
        @if($data['photo_near'])
        <div class="img-div" style="background: url(/storage/{{$data['photo_near']}}) center center no-repeat; background-size: cover;">
          <img src="/assets/img/upload-img.svg" class="upload-file-ico"/>
          <img src="/assets/img/trash-img.svg" class="trash-file-ico" data-field="photo_near" data-id="{{$data['id']}}"/>
        </div>
        @endif
      </div>
      <form class="file-form">
        <input type="file" name="file"/>
      </form>
      <div>
        <select>
          <option value="photo_design">@lang('message.layout')</option>
          <option value="photo_near"selected>@lang('message.near')</option>
          <option value="photo_far">@lang('message.far')</option>
          <option value="photo_night">@lang('message.night')</option>
        </select>
      </div>
    </div>
    <div class="photo-list-item">
      <div class="photo-desing my-file-uploader" data-photo="{{ $data['photo_far'] }}">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.8125 11.25V14.25C2.8125 14.4986 2.91127 14.7371 3.08709 14.9129C3.2629 15.0887 3.50136 15.1875 3.75 15.1875H14.25C14.4986 15.1875 14.7371 15.0887 14.9129 14.9129C15.0887 14.7371 15.1875 14.4986 15.1875 14.25V11.25H16.3125V14.25C16.3125 14.797 16.0952 15.3216 15.7084 15.7084C15.3216 16.0952 14.797 16.3125 14.25 16.3125H3.75C3.20299 16.3125 2.67839 16.0952 2.29159 15.7084C1.9048 15.3216 1.6875 14.797 1.6875 14.25V11.25H2.8125Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.85156 6.39774L5.64706 7.19324L8.99931 3.84099L12.3516 7.19324L13.1471 6.39774L8.99931 2.24999L4.85156 6.39774Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5625 12.0455V3.0455H8.4375V12.0455H9.5625Z" fill="#FC6B40"/>
        </svg><br>
        <span>@lang('message.drag_here')<br/><span class="red">@lang('message.or_click_to_upload')</span></span>
        @if($data['photo_far'])
        <div class="img-div" style="background: url(/storage/{{$data['photo_far']}}) center center no-repeat; background-size: cover;">
          <img src="/assets/img/upload-img.svg" class="upload-file-ico"/>
          <img src="/assets/img/trash-img.svg" class="trash-file-ico" data-field="photo_far" data-id="{{$data['id']}}"/>
        </div>
        @endif
      </div>
      <form class="file-form">
        <input type="file" name="file"/>
      </form>
      <div>
        <select>
          <option value="photo_design">Макет</option>
          <option value="photo_near">Ближний</option>
          <option value="photo_far"selected>Дальний</option>
          <option value="photo_night">Ночной</option>
        </select>
      </div>
    </div>
    <div class="photo-list-item">
      <div class="photo-desing my-file-uploader" data-photo="{{ $data['photo_night'] }}">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.8125 11.25V14.25C2.8125 14.4986 2.91127 14.7371 3.08709 14.9129C3.2629 15.0887 3.50136 15.1875 3.75 15.1875H14.25C14.4986 15.1875 14.7371 15.0887 14.9129 14.9129C15.0887 14.7371 15.1875 14.4986 15.1875 14.25V11.25H16.3125V14.25C16.3125 14.797 16.0952 15.3216 15.7084 15.7084C15.3216 16.0952 14.797 16.3125 14.25 16.3125H3.75C3.20299 16.3125 2.67839 16.0952 2.29159 15.7084C1.9048 15.3216 1.6875 14.797 1.6875 14.25V11.25H2.8125Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M4.85156 6.39774L5.64706 7.19324L8.99931 3.84099L12.3516 7.19324L13.1471 6.39774L8.99931 2.24999L4.85156 6.39774Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5625 12.0455V3.0455H8.4375V12.0455H9.5625Z" fill="#FC6B40"/>
        </svg><br>
        <span>@lang('message.drag_here')<br/><span class="red">@lang('message.or_click_to_upload')</span></span>
        @if($data['photo_night'])
        <div class="img-div" style="background: url(/storage/{{$data['photo_night']}}) center center no-repeat; background-size: cover;">
          <img src="/assets/img/upload-img.svg" class="upload-file-ico"/>
          <img src="/assets/img/trash-img.svg" class="trash-file-ico" data-field="photo_night" data-id="{{$data['id']}}"/>
        </div>
        @endif
      </div>
      <form class="file-form">
        <input type="file" name="file"/>
      </form>
      <div>
        <select>
          <option value="photo_design">@lang('message.layout')</option>
          <option value="photo_near">@lang('message.near')</option>
          <option value="photo_far">@lang('message.far')</option>
          <option value="photo_night" selected>@lang('message.night')</option>
        </select>
      </div>
    </div>
  </div>
</div>
<script>
  photoreportData.photo_design = '{{ $data['photo_design'] ? $data['photo_design'] : '' }}';
  photoreportData.photo_near = '{{ $data['photo_near'] ? $data['photo_near'] : '' }}';
  photoreportData.photo_far = '{{ $data['photo_far'] ? $data['photo_far'] : '' }}';
  photoreportData.photo_night = '{{ $data['photo_night'] ? $data['photo_night'] : '' }}';
</script>