@if(Auth::user()->role_id == '5')
<style type="text/css">
.select2-container.select2-container--default.select2-container--open{
  z-index: 10102;
}
</style>
@endif
<div class="confirm-popup">
  <div class='confirm-header'>
    <span class="confirm-title"></span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="confirm-body">
    <div class="confirm-message"></div>
	<div class="align-right confirm-action">
        <a class="cancel pointer">@lang('message.cancel')</a>
        <a class="yes pointer">@lang('message.yes')</a>
	</div>
  </div>
</div>
<div class="iframe-popup">
  <div class='iframe-header'>
    <span class="iframe-title"></span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="iframe-body">
    <div class="note">
      @lang('message.google_doc_auth1') - <a class="btn pointer" id="authorize_button" onclick="handleAuthClick()" data-id="">@lang('message.google_doc_auth2')</a>
      <div id="google-doc-error"></div>
    </div>
    <iframe src="" style="width:100%; height: calc(100% - 53px); border:none;" id="google-docs-editor-iframe"></iframe>
  </div>
</div>
<!-- Создание приложения -->
<div class="application-form-popup">
  <div class='application-form-header'>
    <span class="application-form-title">@lang('message.adding_application')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="application-form-body">
    <div class="application-form-message">
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.application_name')</label>
          <input type="text" name="application_title" disabled/>
        </div>
        <div class="input-block">
          <label>@lang('message.application_date2')</label>
          <input type="text" name="application_date"/>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.payment_first_month')</label>
          <input type="text" name="application_first_month_pay_date"/>
        </div>
      </div>
    </div>
    <div class="align-right application-form-action">
      <a class="cancel pointer">@lang('message.cancel')</a>
      <a class="yes pointer">@lang('message.add')</a>
    </div>
  </div>
</div>


<!-- Добавление макета -->
<div class="control-layout-popup hide" style="max-height: 700px !important; overflow-y: auto !important;">

  <div class="control-layout-header">
    <input type="hidden" id="add_control_layout_text" value="{{ __('message.add_control_layout') }}">
    <input type="hidden" id="application_text" value="{{ __('message.application') }}">

    <span class="control-layout-title">@lang('message.add_control_layout')</span>
    <span class="close pointer">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="control-layout-body">
    <input type="hidden" name="client_id">
    <input type="hidden" name="contract_id">
    <input type="hidden" name="parent_id">
    <input type="hidden" name="layout_bill_id">
    <input type="hidden" name="months_list">
    <input type="hidden" name="application_date">
    <input type="hidden" name="application_date">
    <input type="hidden" name="no_contract">

    <div class="control-layout-message">
      <div class="field-container">
        <div class="input-block small-input-block">
          <label>{{ mb_convert_case(__('message.months'), MB_CASE_TITLE, "UTF-8") }}</label>
          <select name="report_periods[]"
                  class="report_period-select" multiple="multiple"
                  style="width: 100%">
          </select>
        </div>
      </div>

      <div class="field-container">
        <div class="input-block radio-buttons">
          <label>@lang('message.type')</label>
          <div class="for-radio">
            <div class="radio-button">
              <input type="checkbox" name="file" id="file" value="file" checked>
              <label for="file">@lang('message.file')</label>
            </div>
            <div class="radio-button">
              <input type="checkbox" name="google_drive" id="google_drive" value="google_drive">
              <label for="google_drive">@lang('message.google_drive')</label>
            </div>
          </div>
        </div>
      </div>

      <div class="field-container">
        <label>@lang('message.source')</label>

        <!-- Поле для загрузки файлов -->
        <div id="file_input">
          <input type="file" name="application_files[]" id="application_files" multiple style="display: none">
          <ul id="file_list"></ul> <!-- Список загруженных файлов -->
          <button class="pointer btn hide" type="button" id="add_more_files">@lang('message.add_files2')</button>
        </div>

        <!-- Поле для ссылок на Google Drive -->
        <div class="input-block" id="google_drive_input" style="display: none;">
          <div id="google_drive_links">
            <div class="google-drive-link" style="display: flex; justify-content: space-between">
              <input type="text" name="google_drive_urls[]" placeholder="{{__('message.enter_google_drive_url')}}">
              <button type="button" class="custom-remove-link btn btn-danger">✖</button>
            </div>
            <hr>
          </div>
          <button class="pointer btn" type="button" id="add_google_drive_link">@lang('message.add_more')</button>
        </div>
      </div>

    </div>
    <div class="align-right application-form-action">
      <a class="cancel pointer">@lang('message.cancel')</a>
      <a class="yes pointer btn submit">@lang('message.add')</a>
    </div>
  </div>
</div>

<div class="control-layout-image-popup hide">
  <div class="custom-popup-content">
    <button id="layout-prev-image" class="nav-btn">‹</button>
    <img id="layout-image-preview" src="" alt="Layout Image" />
    <button id="layout-next-image" class="nav-btn">›</button>
  </div>
</div>

<!-- Thumbnails Container at the Bottom of the Screen -->
<div class="image-thumbnails-container hide">
  <ul id="image-thumbnails" class="thumbnails-list">
    <!-- Thumbnails will be generated dynamically -->
  </ul>
</div>



<div class="multiple-control-layout-popup">
    <div class="multiple-control-layout-header flex items-center justify-between border-b p-4">
      <span class="multiple-control-layout-title text-xl font-semibold text-gray-800">@lang('message.select_applications')</span>
      <span class="close pointer cursor-pointer text-gray-600 hover:text-red-500">
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
        </svg>
      </span>
    </div>
    <div class="multiple-control-layout-body p-4">
      <div class="layout-applications-list space-y-2">
        <!-- Applications will be appended here -->
        <p class="text-gray-500">@lang('message.no_applications_available')</p>
      </div>
    </div>
  <div class="align-right application-form-action">
    <a class="cancel pointer">@lang('message.cancel')</a>
    <a class="yes pointer btn submit">@lang('message.add')</a>
  </div>
</div>



<!-- изменение даты приложения -->
<div class="application-form2-popup">
  <div class='application-form-header'>
    <span class="application-form-title">@lang('message.application_date_edit')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="application-form-body">
    <div class="application-form-message">
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.application_name')</label>
          <input type="text" name="application_title_" disabled/>
        </div>
        <div class="input-block">
          <label>@lang('message.application_date2')</label>
          <input type="text" name="application_date_"/>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.payment_first_month')</label>
          <input type="text" name="application_first_month_pay_date_"/>
        </div>
      </div>
    </div>
    <div class="align-right application-form-action">
      <a class="cancel pointer">@lang('message.cancel')</a>
      <a class="yes pointer">>@lang('message.save')</a>
    </div>
  </div>
</div>
<script>
  const CLIENT_ID = '{{env('GOOGLE_DRIVE_CLIENT_ID')}}';
  const API_KEY = '{{env('GOOGLE_API_KEY')}}';

  const DISCOVERY_DOC = 'https://docs.googleapis.com/$discovery/rest?version=v1';
  const SCOPES = 'https://www.googleapis.com/auth/documents';

  let tokenClient;
  let gapiInited = false;
  let gisInited = false;

  document.getElementById('authorize_button').style.visibility = 'hidden';

  function gapiLoaded() {
    gapi.load('client', initializeGapiClient);
  }

  async function initializeGapiClient() {
    await gapi.client.init({
      apiKey: API_KEY,
      discoveryDocs: [DISCOVERY_DOC],
    });
    gapiInited = true;
    maybeEnableButtons();
  }

  function gisLoaded() {
    tokenClient = google.accounts.oauth2.initTokenClient({
      client_id: CLIENT_ID,
      scope: SCOPES,
      callback: '', // defined later
    });
    gisInited = true;
    maybeEnableButtons();
  }

  function maybeEnableButtons() {
    if (gapiInited && gisInited) {
      document.getElementById('authorize_button').style.visibility = 'visible';
    }
  }

  function handleAuthClick() {
    tokenClient.callback = async (resp) => {
      if (resp.error !== undefined) {
        throw (resp);
      }
      await printDocTitle();
    };

    if (gapi.client.getToken() === null) {
      tokenClient.requestAccessToken({prompt: 'consent'});
    } else {
      tokenClient.requestAccessToken({prompt: ''});
    }
  }

  async function printDocTitle() {
    try {
      const response = await gapi.client.docs.documents.get({
        documentId: $('#authorize_button').data('id'),
      });
      const doc = response.result;
      let docIframe = document.getElementById('google-docs-editor-iframe');
      docIframe.src = `https://docs.google.com/document/d/${doc.documentId}/edit?embedded=true&rm=demo`;
      //$('#google-docs-edito-iframe').attr('src',`https://docs.google.com/document/d/${doc.documentId}/edit?embedded=true&rm=demo`);
      document.getElementById('google-doc-error').innerText = '';
      
    } catch (err) {
      document.getElementById('google-doc-error').innerText = err.message;
      return;
    }
  }
</script>

<script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
<script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>