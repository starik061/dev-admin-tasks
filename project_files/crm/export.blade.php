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
        <input type="checkbox" name="cols[]" value="price" id="price" checked />
        <label for="price">Цена покупки</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="start_price" id="start_price" checked />
        <label for="start_price">Цена продажи</label>
      </div>
      <div class="checkbox-block">
        <input type="checkbox" name="cols[]" value="poster_print" id="poster_print" checked />
        <label for="poster_print">Цена печати</label>
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