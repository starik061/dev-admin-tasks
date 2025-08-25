@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container  container-base">
          <div class="favorite-viewed-tab system-info-tabs">
            @include('front.crm.settings-menu')
          </div>
          <h1>{{$doc->name}}</h1>
          @if(Auth::user()->role_id == '1')
          <div class="note">
            @lang('message.google_doc_auth1') - <a class="btn pointer" id="authorize_button" onclick="handleAuthClick()">@lang('message.google_doc_auth2')</a>
          </div>
          @endif
          <div id="content">
            <iframe src="{{$doc->link}}" style="width:100%; height:600px; border:none;"></iframe>
          </div>
          <div class="vars">
            <h2>@lang('message.variables')</h2>
            <div class="vars-block">
              <div class="info-block-table">
                <div class="tr">
                  <div class="td">
                    <span>${num_doc}</span>
                  </div>
                  <div class="td">
                    @lang('message.number_of_contract')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${day}</span>
                  </div>
                  <div class="td">
                    @lang('message.contract_creation_day')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${month}</span>
                  </div>
                  <div class="td">
                    @lang('message.contract_creation_month')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${year}</span>
                  </div>
                  <div class="td">
                    @lang('message.contract_creation_year')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${valid_until_day}</span>
                  </div>
                  <div class="td">
                    @lang('message.contract_valid_until2')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${valid_until_ym}</span>
                  </div>
                  <div class="td">
                    @lang('message.contract_valid_until3')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_company_name}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_company')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_person}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_signer')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_based_on}</span>
                  </div>
                  <div class="td">
                    @lang('message.based_on')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${company_name}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_company')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${person}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_signer')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${based_on}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_based_on')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_tax_status}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_tax_status')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${tax_status}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_tax_status')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${domain}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_domain')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_address}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_address')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_iban}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_iban')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_bank_name}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_bank')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_edrpou}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_edrpou')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_inn}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_inn')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_nds}</span>
                  </div>
                  <div class="td">
                    @lang('message.our_nds_number')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${our_signer_type}</span>
                  </div>
                  <div class="td">
                    @lang('message.signer_post')
                  </div>
                </div>
              </div>
              <div class="info-block-table">
                <div class="tr">
                  <div class="td">
                    <span>${our_signer}</span>
                  </div>
                  <div class="td">
                    @lang('message.signer_short')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${ur_index}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_ur_address_index')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${ur_city}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_ur_address_city')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${ur_address}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_ur_address_street')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${ur_house}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_ur_address_house')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${ur_office}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_ur_address_office')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${post_index}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_post_address_index')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${post_city}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_post_address_city')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${post_address}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_post_address_street')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${post_house}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_post_address_house')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${post_office}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_post_address_office')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${iban}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_iban')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${bank_name}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_bank')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${edrpou}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_edrpou')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${inn}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_inn')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${nds}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_nds_number')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${signer_type}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_signer_post')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${person_short}</span>
                  </div>
                  <div class="td">
                    @lang('message.client_signer_short')
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>${city_of_doc}</span>
                  </div>
                  <div class="td">
                    @lang('message.base_city')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
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
          documentId: '{{$doc->doc_id}}',
          //documentId: '1cRiYeKthhRYAZAx2a20uC9jpmrLToGTNcWQnCH1xxf4',
        });
        const doc = response.result;
        document.getElementById('content').innerHTML = "";
        const iframe = `<iframe  style="width:100%; height:600px; border:none;" src="https://docs.google.com/document/d/${doc.documentId}/edit?embedded=true&rm=demo"></iframe>`;
        document.getElementById('content').innerHTML += iframe;
      } catch (err) {
        document.getElementById('content').innerText = err.message;
        return;
      }
    }
  </script>
  <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
  <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>
@include('add.footer')

@include('front.crm.scripts')
