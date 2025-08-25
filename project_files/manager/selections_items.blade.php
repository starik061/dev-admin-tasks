<div class="ajax-content application-tabs">
  <div class="selection-items-table" data-selection_id="{{$selection->id}}">
    <div class="selection-items-head">
      <div class="selection-items-row">
        <div class="selection-items-col col-checkbox">
          <input type="checkbox" class="select-all"/>
        </div>
        <div class="selection-items-col">ID</div>
        <div class="selection-items-col">@lang('message.city')</div>
        <div class="selection-items-col">@lang('message.firm_code')</div>
        <div class="selection-items-col">@lang('message.type')</div>
        <div class="selection-items-col">@lang('message.address')</div>
        <div class="selection-items-col">@lang('message.side')</div>
        <div class="selection-items-col">@lang('message.light')</div>
        <div class="selection-items-col">@lang('message.updated_date')</div>
        <div class="selection-items-col">Фото</div>
        <div class="selection-items-col">@lang('message.employment')</div>
        <div class="selection-items-col">Ціна у системі</div>
        <div class="selection-items-col">@lang('message.in_price_without_vat')</div>
        <div class="selection-items-col">@lang('message.out_price_without_vat')</div>
        <div class="selection-items-col">Ціна друку</div>
        {{--@if($selection->type->id === \App\CrmSelectionsTypes::TYPE_SUPERVISION)--}}
          <div class="selection-items-col">@lang('message.tracking')</div>
        {{--@endif--}}
      </div>
    </div>
    <div class="selection-items-body">
      @include('front.manager.selections_items_new')
    </div>
  </div>
  <div class="selection-shadow"></div>
  <div class="selections-actions-block">
    <a class="new-flex-link items-delete">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.875 5C1.875 4.65482 2.15482 4.375 2.5 4.375H17.5C17.8452 4.375 18.125 4.65482 18.125 5C18.125 5.34518 17.8452 5.625 17.5 5.625H2.5C2.15482 5.625 1.875 5.34518 1.875 5Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33366 2.29163C8.05739 2.29163 7.79244 2.40137 7.59709 2.59672C7.40174 2.79207 7.29199 3.05703 7.29199 3.33329V4.37496H12.7087V3.33329C12.7087 3.05703 12.5989 2.79207 12.4036 2.59672C12.2082 2.40137 11.9433 2.29163 11.667 2.29163H8.33366ZM13.9587 4.37496V3.33329C13.9587 2.7255 13.7172 2.14261 13.2874 1.71284C12.8577 1.28307 12.2748 1.04163 11.667 1.04163H8.33366C7.72587 1.04163 7.14298 1.28307 6.71321 1.71284C6.28344 2.14261 6.04199 2.7255 6.04199 3.33329V4.37496H4.16699C3.82181 4.37496 3.54199 4.65478 3.54199 4.99996V16.6666C3.54199 17.2744 3.78343 17.8573 4.21321 18.2871C4.64298 18.7169 5.22587 18.9583 5.83366 18.9583H14.167C14.7748 18.9583 15.3577 18.7169 15.7874 18.2871C16.2172 17.8573 16.4587 17.2744 16.4587 16.6666V4.99996C16.4587 4.65478 16.1788 4.37496 15.8337 4.37496H13.9587ZM4.79199 5.62496V16.6666C4.79199 16.9429 4.90174 17.2078 5.09709 17.4032C5.29244 17.5985 5.55739 17.7083 5.83366 17.7083H14.167C14.4433 17.7083 14.7082 17.5985 14.9036 17.4032C15.0989 17.2078 15.2087 16.9429 15.2087 16.6666V5.62496H4.79199Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33301 8.54163C8.67819 8.54163 8.95801 8.82145 8.95801 9.16663V14.1666C8.95801 14.5118 8.67819 14.7916 8.33301 14.7916C7.98783 14.7916 7.70801 14.5118 7.70801 14.1666V9.16663C7.70801 8.82145 7.98783 8.54163 8.33301 8.54163Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.667 8.54163C12.0122 8.54163 12.292 8.82145 12.292 9.16663V14.1666C12.292 14.5118 12.0122 14.7916 11.667 14.7916C11.3218 14.7916 11.042 14.5118 11.042 14.1666V9.16663C11.042 8.82145 11.3218 8.54163 11.667 8.54163Z" fill="#FC6B40"/>
      </svg>
      @lang('message.delete_selected')
    </a>
    <span>|</span>
    @if($contract)
    <a class='new-flex-link add-to-contract hide'>
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.37922 1.71284C3.80899 1.28307 4.39189 1.04163 4.99967 1.04163H12.3419L17.2913 5.99108V16.6666C17.2913 17.2744 17.0499 17.8573 16.6201 18.2871C16.1904 18.7169 15.6075 18.9583 14.9997 18.9583H4.99967C4.39189 18.9583 3.80899 18.7169 3.37922 18.2871C2.94945 17.8573 2.70801 17.2744 2.70801 16.6666V3.33329C2.70801 2.72551 2.94945 2.14261 3.37922 1.71284ZM4.99967 2.29163C4.72341 2.29163 4.45846 2.40137 4.2631 2.59672C4.06775 2.79207 3.95801 3.05703 3.95801 3.33329V16.6666C3.95801 16.9429 4.06775 17.2078 4.2631 17.4032C4.45846 17.5985 4.72341 17.7083 4.99967 17.7083H14.9997C15.2759 17.7083 15.5409 17.5985 15.7362 17.4032C15.9316 17.2078 16.0413 16.9429 16.0413 16.6666V7.29163H11.0413V2.29163H4.99967ZM12.2913 2.75884L15.5741 6.04163H12.2913V2.75884ZM13.333 10.2083H6.66634V11.4583H13.333V10.2083ZM6.66634 13.5416H13.333V14.7916H6.66634V13.5416ZM8.33301 6.87496H6.66634V8.12496H8.33301V6.87496Z" fill="#FC6B40"/>
      </svg>
      @lang('message.add_to_contract')
    </a>
    @endif
    <a class="new-flex-link items-add">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.44336 6.83337H18.5567L17.3731 17.8334H2.62699L1.44336 6.83337ZM2.55673 7.83337L3.52516 16.8334H16.4749L17.4434 7.83337H2.55673Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.1665 5.33337C7.1665 3.76857 8.43503 2.50004 9.99984 2.50004C11.5646 2.50004 12.8332 3.76857 12.8332 5.33337H13.8332C13.8332 3.21628 12.1169 1.50004 9.99984 1.50004C7.88275 1.50004 6.1665 3.21628 6.1665 5.33337H7.1665Z" fill="#FC6B40"/>
      </svg>
      @lang('message.add_from_basket')
    </a>
    <a class="new-flex-link items-export">
      <input type="hidden" name="selection_id" value="{{ $selection->id }}">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.125 12.5V15.8333C3.125 16.1096 3.23475 16.3746 3.4301 16.5699C3.62545 16.7653 3.8904 16.875 4.16667 16.875H15.8333C16.1096 16.875 16.3746 16.7653 16.5699 16.5699C16.7653 16.3746 16.875 16.1096 16.875 15.8333V12.5H18.125V15.8333C18.125 16.4411 17.8836 17.024 17.4538 17.4538C17.024 17.8836 16.4411 18.125 15.8333 18.125H4.16667C3.55888 18.125 2.97598 17.8836 2.54621 17.4538C2.11644 17.024 1.875 16.4411 1.875 15.8333V12.5H3.125Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3916 8.77524L6.27548 7.89136L10.0002 11.6161L13.7249 7.89136L14.6088 8.77524L10.0002 13.3839L5.3916 8.77524Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.625 2.5V12.5H9.375V2.5H10.625Z" fill="#FC6B40"/>
      </svg>
      @lang('message.export_to_excel')
    </a>

    <div class="selected-btn" id="custom-watchAll"
         data-registered="{{ Auth::user() ? 'true' : 'false' }}"
         data-type="{{ $selection->lead_id ? 'lead' : 'client' }}"
         data-selection_id="{{ $selection->id }}"
         @if($selection->lead_id)
         data-lead_id="{{ $selection->lead_id }}"
         @else
           data-client_id="{{ $selection->client_id }}"
         @endif
         style="cursor: pointer">
      <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png" alt="add" />
      <span>@lang('message.watch')</span>
    </div>

    <div class="selected-btn" id="custom-watch-remove" data-type="lead" data-registered="{{ Auth::user() ? 'true' : 'false' }}" data-selection_id="{{$selection->id}}" data-lead_id="{{$selection->lead_id}}" style="cursor: pointer">
      <img src="https://img.icons8.com/material-rounded/24/000000/add-to-database.png" alt="add" />
      <span>@lang('message.remove_from_monitoring')</span>
    </div>

    @if($selection->type->id !== \App\CrmSelectionsTypes::TYPE_ORDER && $selection->canDownlod)
      <a class="new-flex-link download-file">
        <input type="hidden" name="selection_id" value="{{ $selection->id }}">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.125 12.5V15.8333C3.125 16.1096 3.23475 16.3746 3.4301 16.5699C3.62545 16.7653 3.8904 16.875 4.16667 16.875H15.8333C16.1096 16.875 16.3746 16.7653 16.5699 16.5699C16.7653 16.3746 16.875 16.1096 16.875 15.8333V12.5H18.125V15.8333C18.125 16.4411 17.8836 17.024 17.4538 17.4538C17.024 17.8836 16.4411 18.125 15.8333 18.125H4.16667C3.55888 18.125 2.97598 17.8836 2.54621 17.4538C2.11644 17.024 1.875 16.4411 1.875 15.8333V12.5H3.125Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3916 8.77524L6.27548 7.89136L10.0002 11.6161L13.7249 7.89136L14.6088 8.77524L10.0002 13.3839L5.3916 8.77524Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.625 2.5V12.5H9.375V2.5H10.625Z" fill="#FC6B40"/>
        </svg>
        @lang('message.download_original_file')
      </a>
    @endif

  </div>
  <!--<button class='section-items-button items-delete'>Выбранные удалить</button>
  <button class='section-items-button items-add'>Добавить ещё</button>
  <button class='section-items-button items-export'>Экспорт в XLS</button>-->

  <!-- вывести в отдельный шаблон (при необходимости) -->
  <div class="excel_setting">
    <div class="export-header">
      <span>@lang('message.export_settings')</span>
      <svg height="512px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/></svg>
    </div>
    <div class="checboxes">
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="firm" id="firm" checked />
        <label for="firm">@lang('message.firm')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="firm_code" id="firm_code" checked />
        <label for="firm_code">@lang('message.code_firm')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="code" id="code" checked />
        <label for="code">@lang('message.Code')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="city" id="city" checked />
        <label for="city">@lang('message.city')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="type" id="type" checked />
        <label for="type">@lang('message.type')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="addr" id="addr" checked />
        <label for="addr">@lang('message.address')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="side" id="side" checked />
        <label for="side">@lang('message.side')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="light" id="light" checked />
        <label for="light">@lang('message.light')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="guide" id="guide" checked />
        <label for="guide">@lang('message.gid')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="start_price" id="start_price" checked />
        <label for="start_price">@lang('message.in_price_without_vat')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="price" id="price" checked />
        <label for="price">@lang('message.out_price_without_vat')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="poster_print" id="poster_print" checked />
        <label for="poster_print">@lang('message.printing_price')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="doors" id="doors" checked />
        <label for="doors">DOORS</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="ots" id="ots" checked />
        <label for="ots">OTS</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="grp" id="grp" checked />
        <label for="grp">GRP</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="image" id="image" checked />
        <label for="image">@lang('message.photo')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="scheme" id="scheme" checked />
        <label for="scheme">@lang('message.Schema')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="map" id="map" checked />
        <label for="map">@lang('message.Map')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="link" id="link" checked />
        <label for="link">@lang('message.Link')</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="firm_contacts" id="firm_contacts" checked />
        <label for="firm_contacts">@lang('message.owners_contacts')</label>
      </div>
    </div>
    <a href="#" class="btn btn-style dwn-button">@lang('message.download')</a>
  </div>
</div>
