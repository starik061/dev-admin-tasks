@php
if(!$_COOKIE['currency']){
    $_COOKIE['currency'] = 'uah';
}
switch($_COOKIE['currency']){
    case 'uah': $_COOKIE['currency_symbol'] = '&#8372;'; break;
    case 'usd': $_COOKIE['currency_symbol'] = '&#36;'; break;
    case 'eur': $_COOKIE['currency_symbol'] = '&euro;'; break;
}
@endphp
<div class="popup-data">
  <div class="act-popup-title">
    <h2>@if(!$act->number) @lang('message.bill_without_contract') @else @lang('message.application') №{{$act->number}}@endif</h2>
    <h3>@if($act->number) @lang('message.contract') №{{$contract->number}}@endif {{$contract->our_company_name_short}} - {{$contract->company_name_short}}</h3>
  </div>
  <div class="act-popup-menu-block">
    <div class="act-popum-menu">
      <a class="act-boards-view active" data-tab="view">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 1.875C2.15482 1.875 1.875 2.15482 1.875 2.5V8.33333C1.875 8.67851 2.15482 8.95833 2.5 8.95833H8.33333C8.67851 8.95833 8.95833 8.67851 8.95833 8.33333V2.5C8.95833 2.15482 8.67851 1.875 8.33333 1.875H2.5ZM3.125 7.70833V3.125H7.70833V7.70833H3.125ZM11.6667 1.875C11.3215 1.875 11.0417 2.15482 11.0417 2.5V8.33333C11.0417 8.67851 11.3215 8.95833 11.6667 8.95833H17.5C17.8452 8.95833 18.125 8.67851 18.125 8.33333V2.5C18.125 2.15482 17.8452 1.875 17.5 1.875H11.6667ZM12.2917 7.70833V3.125H16.875V7.70833H12.2917ZM11.0417 11.6667C11.0417 11.3215 11.3215 11.0417 11.6667 11.0417H17.5C17.8452 11.0417 18.125 11.3215 18.125 11.6667V17.5C18.125 17.8452 17.8452 18.125 17.5 18.125H11.6667C11.3215 18.125 11.0417 17.8452 11.0417 17.5V11.6667ZM12.2917 12.2917V16.875H16.875V12.2917H12.2917ZM2.5 11.0417C2.15482 11.0417 1.875 11.3215 1.875 11.6667V17.5C1.875 17.8452 2.15482 18.125 2.5 18.125H8.33333C8.67851 18.125 8.95833 17.8452 8.95833 17.5V11.6667C8.95833 11.3215 8.67851 11.0417 8.33333 11.0417H2.5ZM3.125 16.875V12.2917H7.70833V16.875H3.125Z" fill="#C5B0AA"/>
		</svg>
		@lang('message.general')
      </a>
      <span class="vertical-line"></span>
    @if($act->can_delete || in_array(Auth::user()->id,[1,202,248]))
      <a class="act-boards-add-manual" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-client_id="{{$client->id}}"  data-tab="manual">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z" fill="#FC6B40"/>
        </svg>
		@lang('message.add_board_manual')
      </a>
	  <a class="act-boards-search" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-client_id="{{$client->id}}"  data-tab="search">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8864 9.31845C14.8864 12.3937 12.3934 14.8866 9.3182 14.8866C6.24297 14.8866 3.75 12.3937 3.75 9.31845C3.75 6.24321 6.24297 3.75024 9.3182 3.75024C12.3934 3.75024 14.8864 6.24321 14.8864 9.31845ZM13.5687 14.65C12.4031 15.5804 10.9256 16.1366 9.3182 16.1366C5.55261 16.1366 2.5 13.084 2.5 9.31845C2.5 5.55286 5.55261 2.50024 9.3182 2.50024C13.0838 2.50024 16.1364 5.55286 16.1364 9.31845C16.1364 11.0262 15.5085 12.5874 14.471 13.7836L17.4058 17.0852L16.4715 17.9157L13.5687 14.65Z" fill="#FC6B40"/>
		</svg>
		@lang('message.search_by_code')
      </a>
      {{--
      <a class="act-boards-add-from-selection" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-client_id="{{$client->id}}" href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/show-selection">
      --}}
      <a class="act-boards-add-from-selection" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-client_id="{{$client->id}}"  data-tab="selection">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.3802 1.71284C3.80997 1.28307 4.39286 1.04163 5.00065 1.04163H12.3429L17.2923 5.99108V16.6666C17.2923 17.2744 17.0509 17.8573 16.6211 18.2871C16.1913 18.7169 15.6084 18.9583 15.0007 18.9583H5.00065C4.39286 18.9583 3.80997 18.7169 3.3802 18.2871C2.95043 17.8573 2.70898 17.2744 2.70898 16.6666V3.33329C2.70898 2.72551 2.95043 2.14261 3.3802 1.71284ZM5.00065 2.29163C4.72438 2.29163 4.45943 2.40137 4.26408 2.59672C4.06873 2.79207 3.95898 3.05703 3.95898 3.33329V16.6666C3.95898 16.9429 4.06873 17.2078 4.26408 17.4032C4.45943 17.5985 4.72438 17.7083 5.00065 17.7083H15.0007C15.2769 17.7083 15.5419 17.5985 15.7372 17.4032C15.9326 17.2078 16.0423 16.9429 16.0423 16.6666V7.29163H11.0423V2.29163H5.00065ZM12.2923 2.75884L15.5751 6.04163H12.2923V2.75884ZM13.334 10.2083H6.66732V11.4583H13.334V10.2083ZM6.66732 13.5416H13.334V14.7916H6.66732V13.5416ZM8.33398 6.87496H6.66732V8.12496H8.33398V6.87496Z" fill="#FC6B40"/>
		</svg>
		@lang('message.add_from_selection')
      </a>
      <a class="act-boards-exist" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-client_id="{{$client->id}}" data-tab="from-exist">
         <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M3.3802 1.71284C3.80997 1.28307 4.39286 1.04163 5.00065 1.04163H12.3429L17.2923 5.99108V16.6666C17.2923 17.2744 17.0509 17.8573 16.6211 18.2871C16.1913 18.7169 15.6084 18.9583 15.0007 18.9583H5.00065C4.39286 18.9583 3.80997 18.7169 3.3802 18.2871C2.95043 17.8573 2.70898 17.2744 2.70898 16.6666V3.33329C2.70898 2.72551 2.95043 2.14261 3.3802 1.71284ZM5.00065 2.29163C4.72438 2.29163 4.45943 2.40137 4.26408 2.59672C4.06873 2.79207 3.95898 3.05703 3.95898 3.33329V16.6666C3.95898 16.9429 4.06873 17.2078 4.26408 17.4032C4.45943 17.5985 4.72438 17.7083 5.00065 17.7083H15.0007C15.2769 17.7083 15.5419 17.5985 15.7372 17.4032C15.9326 17.2078 16.0423 16.9429 16.0423 16.6666V7.29163H11.0423V2.29163H5.00065ZM12.2923 2.75884L15.5751 6.04163H12.2923V2.75884ZM13.334 10.2083H6.66732V11.4583H13.334V10.2083ZM6.66732 13.5416H13.334V14.7916H6.66732V13.5416ZM8.33398 6.87496H6.66732V8.12496H8.33398V6.87496Z" fill="#FC6B40"/>
         </svg>
           @lang('message.add_from_exist')
      </a>
      <a class="act-boards-services" data-tab="services">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 1.875C2.15482 1.875 1.875 2.15482 1.875 2.5V8.33333C1.875 8.67851 2.15482 8.95833 2.5 8.95833H8.33333C8.67851 8.95833 8.95833 8.67851 8.95833 8.33333V2.5C8.95833 2.15482 8.67851 1.875 8.33333 1.875H2.5ZM3.125 7.70833V3.125H7.70833V7.70833H3.125ZM11.6667 1.875C11.3215 1.875 11.0417 2.15482 11.0417 2.5V8.33333C11.0417 8.67851 11.3215 8.95833 11.6667 8.95833H17.5C17.8452 8.95833 18.125 8.67851 18.125 8.33333V2.5C18.125 2.15482 17.8452 1.875 17.5 1.875H11.6667ZM12.2917 7.70833V3.125H16.875V7.70833H12.2917ZM11.0417 11.6667C11.0417 11.3215 11.3215 11.0417 11.6667 11.0417H17.5C17.8452 11.0417 18.125 11.3215 18.125 11.6667V17.5C18.125 17.8452 17.8452 18.125 17.5 18.125H11.6667C11.3215 18.125 11.0417 17.8452 11.0417 17.5V11.6667ZM12.2917 12.2917V16.875H16.875V12.2917H12.2917ZM2.5 11.0417C2.15482 11.0417 1.875 11.3215 1.875 11.6667V17.5C1.875 17.8452 2.15482 18.125 2.5 18.125H8.33333C8.67851 18.125 8.95833 17.8452 8.95833 17.5V11.6667C8.95833 11.3215 8.67851 11.0417 8.33333 11.0417H2.5ZM3.125 16.875V12.2917H7.70833V16.875H3.125Z" fill="#C5B0AA"/>
        </svg>
		@lang('message.add_service')
      </a>
    <!-- тут был endif -->
      <span class="vertical-line @if(!$act->boards) hide @endif"></span>
      @if($contract->number == '-')
      <a class="act-generate-full @if(!$act->boards && !$act->services) hide @endif" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.3802 1.71284C3.80997 1.28307 4.39286 1.04163 5.00065 1.04163H12.3429L17.2923 5.99108V16.6666C17.2923 17.2744 17.0509 17.8573 16.6211 18.2871C16.1913 18.7169 15.6084 18.9583 15.0007 18.9583H5.00065C4.39286 18.9583 3.80997 18.7169 3.3802 18.2871C2.95043 17.8573 2.70898 17.2744 2.70898 16.6666V3.33329C2.70898 2.72551 2.95043 2.14261 3.3802 1.71284ZM5.00065 2.29163C4.72438 2.29163 4.45943 2.40137 4.26408 2.59672C4.06873 2.79207 3.95898 3.05703 3.95898 3.33329V16.6666C3.95898 16.9429 4.06873 17.2078 4.26408 17.4032C4.45943 17.5985 4.72438 17.7083 5.00065 17.7083H15.0007C15.2769 17.7083 15.5419 17.5985 15.7372 17.4032C15.9326 17.2078 16.0423 16.9429 16.0423 16.6666V7.29163H11.0423V2.29163H5.00065ZM12.2923 2.75884L15.5751 6.04163H12.2923V2.75884ZM13.334 10.2083H6.66732V11.4583H13.334V10.2083ZM6.66732 13.5416H13.334V14.7916H6.66732V13.5416ZM8.33398 6.87496H6.66732V8.12496H8.33398V6.87496Z" fill="#FC6B40"/>
    		</svg>
        @lang('message.generate_bill')
      </a>
      @else
      <a class="application-actions">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.3802 1.71284C3.80997 1.28307 4.39286 1.04163 5.00065 1.04163H12.3429L17.2923 5.99108V16.6666C17.2923 17.2744 17.0509 17.8573 16.6211 18.2871C16.1913 18.7169 15.6084 18.9583 15.0007 18.9583H5.00065C4.39286 18.9583 3.80997 18.7169 3.3802 18.2871C2.95043 17.8573 2.70898 17.2744 2.70898 16.6666V3.33329C2.70898 2.72551 2.95043 2.14261 3.3802 1.71284ZM5.00065 2.29163C4.72438 2.29163 4.45943 2.40137 4.26408 2.59672C4.06873 2.79207 3.95898 3.05703 3.95898 3.33329V16.6666C3.95898 16.9429 4.06873 17.2078 4.26408 17.4032C4.45943 17.5985 4.72438 17.7083 5.00065 17.7083H15.0007C15.2769 17.7083 15.5419 17.5985 15.7372 17.4032C15.9326 17.2078 16.0423 16.9429 16.0423 16.6666V7.29163H11.0423V2.29163H5.00065ZM12.2923 2.75884L15.5751 6.04163H12.2923V2.75884ZM13.334 10.2083H6.66732V11.4583H13.334V10.2083ZM6.66732 13.5416H13.334V14.7916H6.66732V13.5416ZM8.33398 6.87496H6.66732V8.12496H8.33398V6.87496Z" fill="#FC6B40"/>
        </svg>
        @lang('message.generate_docs')
        <ul class="application-sub-action hide">
          <li><span class="act-generate @if(!$act->boards) hide @endif" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">@lang('message.generate_app')</span></li>
          {{--
          <li><span class="act-generate-full @if(!$act->boards) hide @endif" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">@lang('message.generate_all')</span></li>
          --}}
        </ul>
      </a>
      @endif
    @endif  
    <div class="lds-ellipsis3 hide"><div></div><div></div><div></div><div></div></div>
	</div>
	<div class="act-popum-menu act-popup-right">
      @if($act->file)
	    <a class="act-dropdown">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="for-js">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M3.125 12.5V15.8333C3.125 16.1096 3.23475 16.3746 3.4301 16.5699C3.62545 16.7653 3.8904 16.875 4.16667 16.875H15.8333C16.1096 16.875 16.3746 16.7653 16.5699 16.5699C16.7653 16.3746 16.875 16.1096 16.875 15.8333V12.5H18.125V15.8333C18.125 16.4411 17.8836 17.024 17.4538 17.4538C17.024 17.8836 16.4411 18.125 15.8333 18.125H4.16667C3.55888 18.125 2.97598 17.8836 2.54621 17.4538C2.11644 17.024 1.875 16.4411 1.875 15.8333V12.5H3.125Z" fill="#C5B0AA" class="for-js"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M5.39062 8.77524L6.27451 7.89136L9.99923 11.6161L13.724 7.89136L14.6078 8.77524L9.99923 13.3839L5.39062 8.77524Z" fill="#C5B0AA" class="for-js"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.625 2.5V12.5H9.375V2.5H10.625Z" fill="#C5B0AA" class="for-js"/>
        </svg>
	  	@lang('message.download')
      </a>
      @endif
      @if($act->file && $act->can_delete && $contract->number != '-')
      <span class="vertical-line"></span>
      @endif
      @if($act->can_delete && $contract->number != '-')
      <a class="act-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}" data-client_id="{{$contract->client_id}}" href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/delete" >
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M1.875 5C1.875 4.65482 2.15482 4.375 2.5 4.375H17.5C17.8452 4.375 18.125 4.65482 18.125 5C18.125 5.34518 17.8452 5.625 17.5 5.625H2.5C2.15482 5.625 1.875 5.34518 1.875 5Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33268 2.29163C8.05642 2.29163 7.79146 2.40137 7.59611 2.59672C7.40076 2.79207 7.29102 3.05703 7.29102 3.33329V4.37496H12.7077V3.33329C12.7077 3.05703 12.5979 2.79207 12.4026 2.59672C12.2072 2.40137 11.9423 2.29163 11.666 2.29163H8.33268ZM13.9577 4.37496V3.33329C13.9577 2.7255 13.7162 2.14261 13.2865 1.71284C12.8567 1.28307 12.2738 1.04163 11.666 1.04163H8.33268C7.72489 1.04163 7.142 1.28307 6.71223 1.71284C6.28246 2.14261 6.04102 2.7255 6.04102 3.33329V4.37496H4.16602C3.82084 4.37496 3.54102 4.65478 3.54102 4.99996V16.6666C3.54102 17.2744 3.78246 17.8573 4.21223 18.2871C4.642 18.7169 5.22489 18.9583 5.83268 18.9583H14.166C14.7738 18.9583 15.3567 18.7169 15.7865 18.2871C16.2162 17.8573 16.4577 17.2744 16.4577 16.6666V4.99996C16.4577 4.65478 16.1779 4.37496 15.8327 4.37496H13.9577ZM4.79102 5.62496V16.6666C4.79102 16.9429 4.90076 17.2078 5.09611 17.4032C5.29146 17.5985 5.55642 17.7083 5.83268 17.7083H14.166C14.4423 17.7083 14.7072 17.5985 14.9026 17.4032C15.0979 17.2078 15.2077 16.9429 15.2077 16.6666V5.62496H4.79102Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33398 8.54163C8.67916 8.54163 8.95898 8.82145 8.95898 9.16663V14.1666C8.95898 14.5118 8.67916 14.7916 8.33398 14.7916C7.98881 14.7916 7.70898 14.5118 7.70898 14.1666V9.16663C7.70898 8.82145 7.98881 8.54163 8.33398 8.54163Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.666 8.54163C12.0112 8.54163 12.291 8.82145 12.291 9.16663V14.1666C12.291 14.5118 12.0112 14.7916 11.666 14.7916C11.3208 14.7916 11.041 14.5118 11.041 14.1666V9.16663C11.041 8.82145 11.3208 8.54163 11.666 8.54163Z" fill="#FC6B40"/>
        </svg>
        @lang('message.delete_application')
      </a>
	  @endif
    </div>
  </div>
  
  <div class="application-nds input-block">
    @lang('message.price_type'):
    <b>@if($act->nds == '1') @lang('message.with_vat') @else @lang('message.without_vat2') @endif</b>
    @if(!$contract->card_number)
    @if($act->can_delete)
    <a class="crm-button pointer" id="price-type-change">@lang('message.change_button')</a>
    @endif
    @endif
  </div>
  @if(@$act->number == '0' && count($clientDetails) > 1)
  <div class="contract-client-details">
    <div class="field-container">
      <div class="input-block">
        <label>@lang('message.client_company')</label>
        <select class="contract-client-details-select" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-application_id="{{$act->id}}" name="details_id">
          @foreach($clientDetails as $item)
            <option value="{{$item->id}}" @if($item->id == $contract->detail_id) selected @endif>{{$item->name_short}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  @endif
  <div class="acts-popup-sub-action hide">
    <a href="{{$act->file_id ? route('act.download', ['id' => $client->id, 'contract_id' => $contract->id, 'act_id' => $act->id, 'file_id' => $act->file_id]) : $act->file}}" download>@lang('message.download_application')</a>
    <a class="bill-acts-submenu pointer @if(!count($act->month)) hide @endif">
      @lang('message.download_bill')
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967L15.5303 11.4697C15.8232 11.7626 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.23744 18.8232 8.76256 18.8232 8.46967 18.5303C8.17678 18.2374 8.17678 17.7626 8.46967 17.4697L13.9393 12L8.46967 6.53033C8.17678 6.23744 8.17678 5.76256 8.46967 5.46967Z" fill="#8B8F9D"/>
      </svg>
    </a>
    <div class="flex-position-fix month-list">
      @if($act->month)
      <div class="bills-month-list hide">
        <ul>
        @foreach($act->month as $k => $month)
          <li data-date="{{$k}}" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">{{$month}}</li>
        @endforeach
        {{--
          <li data-date="full-date" data-client_id="{{$client->id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}">За весь період</li>
        --}}
        </ul>
      </div>
      @endif
    </div>
  </div>

  <div class="application-tabs applicetion-view" id="application-view">
    <ul class="tabls-list">
      <li class="pointer active" data-tab="planes">@lang('message.planes') @if(count($act->boards))({{count($act->boards)}})@endif</li>
      <li class="pointer" data-tab="services">@lang('message.additional_services') @if(count($act->services))({{count($act->services)}})@endif</li>
    </ul>
    <div class="tabs">
      <div id="planes" class="active tab-item">
        <div class="boards-table @if(!$act->boards) hide @endif">
          <div class="boards-table-thead">
            <div class="boards-table-tr">
              <div class="boards-td boards-td-photo">@lang('message.photo')</div>
              <div class="boards-td boards-td-code">@lang('message.code')</div>
              <div class="boards-td boards-td-addr">@lang('message.city_addr')</div>
              <div class="boards-td boards-td-firm">@lang('message.firm_code3')</div>
              <div class="boards-td boards-td-type">@lang('message.type_size')</div>
              <div class="boards-td boards-td-side">@lang('message.side_lc')</div>
              <div class="boards-td boards-td-updated">@lang('message.updated_at')</div>
              <div class="boards-td boards-td-period">@lang('message.period_lc')</div>
              <div class="boards-td boards-td-price-in">@lang('message.purchase_price')</div>
              <div class="boards-td boards-td-price-out">@lang('message.our_price2')</div>
              <div class="boards-td boards-td-price-result">@lang('message.itogo2')</div>
              <div class="boards-td boards-td-action">&nbsp;</div>
            </div>
          </div>
          <div class="boards-table-tbody">
          @if($act->boards)	
          	@include('front.crm.clients.contracts.acts.rows')
          @endif           
          </div>
        </div>
	  </div>
      <div id="services" class='tab-item'>
		<div class="services-table @if(!count($act->services)) hide @endif">
		  <div class="services-table-thead">
            <div class="services-table-tr">
              <div class="services-td services-td-name">@lang('message.company_name2')</div>
              <div class="services-td services-td-count align-right">@lang('message.qty')</div>
              <div class="services-td services-td-price-in align-right">@lang('message.input_price')</div>
              @if(Auth::user()->isBookkeeper())
                <div class="services-td services-td-result-in align-right">@lang('message.itogo2_in')</div>
              @endif
              <div class="services-td services-td-price align-right">@lang('message.price_out')</div>
              <div class="services-td services-td-result align-right">@lang('message.itogo2')</div>
              <div class="services-td services-td-action" style="width:65px;">&nbsp;&nbsp;</div>
            </div>
          </div>
          <div class="services-table-tbody">
          @if(count($act->services))	
          	@include('front.crm.clients.contracts.acts.service_rows')
          @endif           
          </div>	
          
		</div>
        <div class="to-add-service">
        @if($act->can_delete)
          <a class="pointer add-service-link">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z" fill="#FC6B40"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z" fill="#FC6B40"></path>
            </svg>
            @lang('message.add_service')
          </a>
        @endif
        </div>
      </div>
    </div>
  </div>
  @if($act->can_delete || Auth::user()->id == 202)
  <div class="application-tabs application-manual hide" id="application-manual">
  	@include('front.crm.clients.contracts.acts.board_form')
  </div>
  <div class="application-tabs application-search hide" id="application-search">
  	<div class="boards-search-form">
  	  <div class="input-block">
  	  	<label>@lang('message.search')</label>
  	  	<input class="boards-search-input" name="q" placeholder="@lang('message.enter_value')" id="code-search"/>
  	  </div>
  	  <div class="button-block">
  	  	<button class="crm-button" id="code-search-button">@lang('message.search')</button>
  	  </div>
  	</div>
  	<div class="boards-search-result">
      <div class="nothing">
        <svg width="60" height="62" viewBox="0 0 60 62" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M49.5456 27.2737C49.5456 39.5746 39.5737 49.5465 27.2728 49.5465C14.9719 49.5465 5 39.5746 5 27.2737C5 14.9727 14.9719 5.00086 27.2728 5.00086C39.5737 5.00086 49.5456 14.9727 49.5456 27.2737ZM44.2746 48.5997C39.6123 52.3216 33.7024 54.5465 27.2728 54.5465C12.2104 54.5465 0 42.336 0 27.2737C0 12.2113 12.2104 0.000854492 27.2728 0.000854492C42.3352 0.000854492 54.5456 12.2113 54.5456 27.2737C54.5456 34.1048 52.0341 40.3494 47.8841 45.1344L59.6231 58.3407L55.886 61.6625L44.2746 48.5997Z" fill="#3D445C"/>
        </svg>
        <span>@lang('message.no_result')</span>
  	  </div>
  	  <div class="result hide">
  	  </div>
  	  <div class="result-action hide">
  	  	<div class="selection-shadow"></div>
  	  	<div class="selection-bottom">
  	      <div class='boards-to-contracts'>
  	        <a class="add-to-contract crm-button">@lang('message.add_to') {{($contract->number != '-')? __('message.to_application') : __('message.to_bill') }}</a>
          </div>
        </div>
  	  </div>
  	</div>
  </div>

        <div class="application-tabs application-from-exist hide" id="application-from-exist">

            <div class="boards-search-form">
                <div class="input-block ">

                    <select name="contracts" style="width: 300px">
                        @foreach($contracts as $item)
                            <option value="{{$item->id}}" >{{$item->number}}</option>
                        @endforeach
                    </select>

                    <select name="contract_acts" style="width: 400px">
                        @foreach($allacts as $item)
                            <option value="{{$item->id}}" >@lang('message.application') №{{$item->number}}</option>
                        @endforeach
                    </select>

                    <script>
                        $('[name="contracts"]').select2({minimumResultsForSearch: -1});
                        $('[name="contract_acts"]').select2({minimumResultsForSearch: -1});


                        $('[name="contracts"]').on('change', function (e){

                            $.post(
                                '/manager/clients/contracts/acts/getactforcontract',
                                {
                                    "acts":{{$act->id}},
                                    'contract':$('[name=contracts]').val()
                                },
                                function(response){

                                    var data = [];
                                    $.each(response.acts, function (index, value) {

                                        data.push({id : value.id,text : '@lang('message.application') №'+value.number})
                                    })
                                    $('[name="contract_acts"]').find('option').remove();
                                    $('[name="contract_acts"]').select2('destroy').select2({data : data});
                                }
                            )



                        })
                    </script>
                </div>
                <div class="button-block input-block-exist">
                    <button class="add-to-contract-from-exist crm-button" id="code-search-button-from-exist">@lang('message.search')</button>
                </div>
            </div>
            <div class="boards-search-result">
                <div class="nothing">
                    <svg width="60" height="62" viewBox="0 0 60 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M49.5456 27.2737C49.5456 39.5746 39.5737 49.5465 27.2728 49.5465C14.9719 49.5465 5 39.5746 5 27.2737C5 14.9727 14.9719 5.00086 27.2728 5.00086C39.5737 5.00086 49.5456 14.9727 49.5456 27.2737ZM44.2746 48.5997C39.6123 52.3216 33.7024 54.5465 27.2728 54.5465C12.2104 54.5465 0 42.336 0 27.2737C0 12.2113 12.2104 0.000854492 27.2728 0.000854492C42.3352 0.000854492 54.5456 12.2113 54.5456 27.2737C54.5456 34.1048 52.0341 40.3494 47.8841 45.1344L59.6231 58.3407L55.886 61.6625L44.2746 48.5997Z" fill="#3D445C"/>
                    </svg>
                    <span>@lang('message.no_result')</span>
                </div>
                <div class="result hide">
                </div>
                <div class="result-action hide">
                    <div class="selection-shadow"></div>
                    <div class="selection-bottom">
                        <div class='boards-to-contracts'>
                            <a class="add-to-contract crm-button">@lang('message.add_to') {{($contract->number != '-')? __('message.to_application') : __('message.to_bill') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

  <div class="application-tabs application-selection hide" id="application-selection">
    <div class="selection-wrap">
      <h2>@lang('message.add_from_selection')</h2>	
  	  <div class="selection-top">
        <div class="selections-list">
          <ul>
          @if($selections)
            @foreach($selections as $index => $selection)
            <li @if(!$index) class="active" @endif data-client_id="{{$client->id}}" data-selection_id="{{$selection->id}}">@lang('message.selection') {{ $selection->id }} @lang('message.from') {{ date('d.m.Y', strtotime($selection->created_at)) }}</li>
            @endforeach
          @else
            <li> @lang('message.no_selection') </li>
          @endif
          </ul>
        </div>
        <div class="selections-data">
          @include('front.crm.clients.contracts.acts.selection_table')
        </div>
      </div>
      <div class="selection-shadow"></div>
      <div class="selection-bottom">
        @if($selections)
  <div class="selections-actions-block">
    <a class="new-flex-link items-export">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.125 12.5V15.8333C3.125 16.1096 3.23475 16.3746 3.4301 16.5699C3.62545 16.7653 3.8904 16.875 4.16667 16.875H15.8333C16.1096 16.875 16.3746 16.7653 16.5699 16.5699C16.7653 16.3746 16.875 16.1096 16.875 15.8333V12.5H18.125V15.8333C18.125 16.4411 17.8836 17.024 17.4538 17.4538C17.024 17.8836 16.4411 18.125 15.8333 18.125H4.16667C3.55888 18.125 2.97598 17.8836 2.54621 17.4538C2.11644 17.024 1.875 16.4411 1.875 15.8333V12.5H3.125Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3916 8.77524L6.27548 7.89136L10.0002 11.6161L13.7249 7.89136L14.6088 8.77524L10.0002 13.3839L5.3916 8.77524Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.625 2.5V12.5H9.375V2.5H10.625Z" fill="#FC6B40"/>
      </svg>
      @lang('message.export_to_excel')
    </a>
    <a class="new-flex-link items-delete">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.875 5C1.875 4.65482 2.15482 4.375 2.5 4.375H17.5C17.8452 4.375 18.125 4.65482 18.125 5C18.125 5.34518 17.8452 5.625 17.5 5.625H2.5C2.15482 5.625 1.875 5.34518 1.875 5Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33366 2.29163C8.05739 2.29163 7.79244 2.40137 7.59709 2.59672C7.40174 2.79207 7.29199 3.05703 7.29199 3.33329V4.37496H12.7087V3.33329C12.7087 3.05703 12.5989 2.79207 12.4036 2.59672C12.2082 2.40137 11.9433 2.29163 11.667 2.29163H8.33366ZM13.9587 4.37496V3.33329C13.9587 2.7255 13.7172 2.14261 13.2874 1.71284C12.8577 1.28307 12.2748 1.04163 11.667 1.04163H8.33366C7.72587 1.04163 7.14298 1.28307 6.71321 1.71284C6.28344 2.14261 6.04199 2.7255 6.04199 3.33329V4.37496H4.16699C3.82181 4.37496 3.54199 4.65478 3.54199 4.99996V16.6666C3.54199 17.2744 3.78343 17.8573 4.21321 18.2871C4.64298 18.7169 5.22587 18.9583 5.83366 18.9583H14.167C14.7748 18.9583 15.3577 18.7169 15.7874 18.2871C16.2172 17.8573 16.4587 17.2744 16.4587 16.6666V4.99996C16.4587 4.65478 16.1788 4.37496 15.8337 4.37496H13.9587ZM4.79199 5.62496V16.6666C4.79199 16.9429 4.90174 17.2078 5.09709 17.4032C5.29244 17.5985 5.55739 17.7083 5.83366 17.7083H14.167C14.4433 17.7083 14.7082 17.5985 14.9036 17.4032C15.0989 17.2078 15.2087 16.9429 15.2087 16.6666V5.62496H4.79199Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.33301 8.54163C8.67819 8.54163 8.95801 8.82145 8.95801 9.16663V14.1666C8.95801 14.5118 8.67819 14.7916 8.33301 14.7916C7.98783 14.7916 7.70801 14.5118 7.70801 14.1666V9.16663C7.70801 8.82145 7.98783 8.54163 8.33301 8.54163Z" fill="#FC6B40"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.667 8.54163C12.0122 8.54163 12.292 8.82145 12.292 9.16663V14.1666C12.292 14.5118 12.0122 14.7916 11.667 14.7916C11.3218 14.7916 11.042 14.5118 11.042 14.1666V9.16663C11.042 8.82145 11.3218 8.54163 11.667 8.54163Z" fill="#FC6B40"/>
      </svg>
      @lang('message.delete_selected')
    </a>
    @include('front.crm.export')
  </div>
  <div class='boards-to-contracts'>
  	<a class="add-to-contract crm-button">@lang('message.add_to') {{($contract->number != '-')? __('message.to_application') : __('message.to_bill') }}</a>
  </div>
        @endif

      </div>
    </div>
  </div>
  <div class="application-tabs applicetion-services hide" id="application-services">
  	<h2>@lang('message.add_service')</h2>
  	<div class="services-block">
  	  <form id="services-form" data-contract_id="{{$contract->id}}" data-client_id="{{$client->id}}" data-act_id="{{$act->id}}">
  	  	<input type="hidden" name="contract_id" value="{{$contract->id}}"/>
  	  	<input type="hidden" name="client_id" value="{{$client->id}}"/>
  	  	<input type="hidden" name="act_id" value="{{$act->id}}"/>
  	  	<div class="services-list">
  	      <div class="services-item head-line">
  	  	    <div class="services-name">@lang('message.company_name2')</div>
            {{--<div class="services-supplier">@lang('message.supplier')</div>--}}
            <div class="services-price">@lang('message.input_price')</div>
            
  	  	    <div class="services-price"><b>@lang('message.price_per_one')</b></div>
  	  	    <div class="services-count"><b>@lang('message.qty')</b></div>
  	  	    <div class="services-result"><b>@lang('message.sum')</b></div>
  	  	    <div class="services-action"></div>
  	      </div>
  	      <div class="services-item service-item-data">
  	        <div class="services-name">
  	      	  <select name="service_id[]" class="services-dd">
  	       	  @foreach($services as $service)
  	      	    <option value="{{$service->id}}" data-price_in="{{$service->price}}">{{$service->name}}</option>
  	      	  @endforeach
  	      	  </select>
  	      	  <input type="text" class="other-input hide" name="service_other[]"/>
  	        </div>
            {{--
            <div class="services-supplier">
                <select name="supplier_id[]" class="services-supplier-dd">
                    @foreach($defaultSuppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>
            --}}
            
            <div class="services-price_in">
              <input type="text" name="service_price_in[]" class="sp_in" value="{{$services[0]->price}}">
            </div>
            
  	        <div class="services-price">
  	      	  <input type="text" name="service_price[]" class="sp" required>
  	        </div>
  	        <div class="services-count">
  	      	  <input type="text" name="service_count[]" class="sc" required>
  	        </div>
  	        <div class="services-result">
  	      	  <input type="text" name="service_result[]" class="sr" required>
  	        </div>
  	        <div class="services-action">
  	      	  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  	      	    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 6C2.25 5.58579 2.58579 5.25 3 5.25H21C21.4142 5.25 21.75 5.58579 21.75 6C21.75 6.41421 21.4142 6.75 21 6.75H3C2.58579 6.75 2.25 6.41421 2.25 6Z" fill="#FC6B40"/>
  	      	    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.75C9.66848 2.75 9.35054 2.8817 9.11612 3.11612C8.8817 3.35054 8.75 3.66848 8.75 4V5.25H15.25V4C15.25 3.66848 15.1183 3.35054 14.8839 3.11612C14.6495 2.8817 14.3315 2.75 14 2.75H10ZM16.75 5.25V4C16.75 3.27065 16.4603 2.57118 15.9445 2.05546C15.4288 1.53973 14.7293 1.25 14 1.25H10C9.27065 1.25 8.57118 1.53973 8.05546 2.05546C7.53973 2.57118 7.25 3.27065 7.25 4V5.25H5C4.58579 5.25 4.25 5.58579 4.25 6V20C4.25 20.7293 4.53973 21.4288 5.05546 21.9445C5.57118 22.4603 6.27065 22.75 7 22.75H17C17.7293 22.75 18.4288 22.4603 18.9445 21.9445C19.4603 21.4288 19.75 20.7293 19.75 20V6C19.75 5.58579 19.4142 5.25 19 5.25H16.75ZM5.75 6.75V20C5.75 20.3315 5.8817 20.6495 6.11612 20.8839C6.35054 21.1183 6.66848 21.25 7 21.25H17C17.3315 21.25 17.6495 21.1183 17.8839 20.8839C18.1183 20.6495 18.25 20.3315 18.25 20V6.75H5.75Z" fill="#FC6B40"/>
  	      	    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.25C10.4142 10.25 10.75 10.5858 10.75 11V17C10.75 17.4142 10.4142 17.75 10 17.75C9.58579 17.75 9.25 17.4142 9.25 17V11C9.25 10.5858 9.58579 10.25 10 10.25Z" fill="#FC6B40"/>
  	      	    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.25C14.4142 10.25 14.75 10.5858 14.75 11V17C14.75 17.4142 14.4142 17.75 14 17.75C13.5858 17.75 13.25 17.4142 13.25 17V11C13.25 10.5858 13.5858 10.25 14 10.25Z" fill="#FC6B40"/>
  	      	  </svg>
  	        </div>
  	      </div>
        </div>
        <div>
          <a class="add-service-line pointer">
          	<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z" fill="#FC6B40"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z" fill="#FC6B40"/>
            </svg>
            @lang('message.add_line')
          </a>
        </div>
        <div class="form-footer align-right">
          <button class="crm-button pointer">@lang('message.add_to') {{($contract->number != '-')? __('message.to_application') : __('message.to_bill')}}</button>
        </div>
  	  </form>
  	</div>
  </div>
  @endif
  <div class="price-type-popup confirm-popup hide">
    <div class='confirm-header'>
      <span class="confirm-title">@lang('message.change_price_type')</span>
      <span class="close">
        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
        </svg>
      </span>
    </div>
    <div class="price-type-popup-body">
      <div class="input-block">
        <div class="form_toggle">
          <div class="form_toggle-item item-1">
            <input id="app_nds-1" type="radio" name="nds" value="1" data-application_id="{{$act->id}}" data-contract_id="{{$contract->id}}" data-client_id="{{$client->id}}" {{ $act->nds == '1' ? "checked" : "" }}>
            <label for="app_nds-1">@lang('message.with_vat')</label>
          </div>
          <div class="form_toggle-item item-2">
            <input id="app_nds-2" type="radio" name="nds" value="0" data-application_id="{{$act->id}}" data-contract_id="{{$contract->id}}" data-client_id="{{$client->id}}" {{ $act->nds == '0' ? "checked" : "" }}>
            <label for="app_nds-2">@lang('message.without_vat2')</label>
          </div>
        </div>
      </div>
      <div class="price-note">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6506 2.50094C11.0625 2.26906 11.5271 2.14725 11.9998 2.14725C12.4724 2.14725 12.9371 2.26906 13.3489 2.50094C13.7608 2.73281 14.1059 3.06692 14.351 3.47102L14.3532 3.47458L22.8294 17.6249C23.0695 18.0407 23.1964 18.5122 23.1978 18.9924C23.1991 19.4726 23.0747 19.9447 22.8369 20.3619C22.5991 20.7791 22.2563 21.1267 21.8424 21.3702C21.4286 21.6138 20.9582 21.7447 20.478 21.7499L20.4698 21.75L3.52153 21.75C3.04138 21.7447 2.57098 21.6138 2.15713 21.3702C1.74328 21.1267 1.40041 20.7791 1.16262 20.3619C0.924834 19.9447 0.800424 19.4726 0.801769 18.9924C0.803113 18.5122 0.930165 18.0408 1.17028 17.6249L1.17629 17.6145L9.64638 3.47459L10.2898 3.85999L9.64853 3.47102C9.89365 3.06692 10.2388 2.73281 10.6506 2.50094ZM10.932 4.24739C10.9317 4.24792 10.9313 4.24844 10.931 4.24896L2.46662 18.3797C2.35919 18.5675 2.30237 18.7801 2.30176 18.9966C2.30115 19.2149 2.3577 19.4295 2.46579 19.6191C2.57387 19.8087 2.72972 19.9668 2.91784 20.0774C3.1049 20.1875 3.31737 20.247 3.53435 20.25H20.4652C20.6822 20.247 20.8947 20.1875 21.0817 20.0774C21.2698 19.9668 21.4257 19.8087 21.5338 19.6191C21.6419 19.4295 21.6984 19.2149 21.6978 18.9966C21.6972 18.7801 21.6404 18.5675 21.5329 18.3797L13.0685 4.24896C13.0682 4.24844 13.0679 4.24792 13.0676 4.24739C12.9562 4.06441 12.7997 3.91311 12.613 3.80801C12.4258 3.70262 12.2146 3.64725 11.9998 3.64725C11.7849 3.64725 11.5737 3.70262 11.3865 3.80801C11.1999 3.91311 11.0433 4.06441 10.932 4.24739Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 15V9H12.75V15H11.25Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 18V16H12.75V18H11.25Z" fill="#FC6B40"/>
        </svg>
        @lang('message.attention')
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6506 2.50094C11.0625 2.26906 11.5271 2.14725 11.9998 2.14725C12.4724 2.14725 12.9371 2.26906 13.3489 2.50094C13.7608 2.73281 14.1059 3.06692 14.351 3.47102L14.3532 3.47458L22.8294 17.6249C23.0695 18.0407 23.1964 18.5122 23.1978 18.9924C23.1991 19.4726 23.0747 19.9447 22.8369 20.3619C22.5991 20.7791 22.2563 21.1267 21.8424 21.3702C21.4286 21.6138 20.9582 21.7447 20.478 21.7499L20.4698 21.75L3.52153 21.75C3.04138 21.7447 2.57098 21.6138 2.15713 21.3702C1.74328 21.1267 1.40041 20.7791 1.16262 20.3619C0.924834 19.9447 0.800424 19.4726 0.801769 18.9924C0.803113 18.5122 0.930165 18.0408 1.17028 17.6249L1.17629 17.6145L9.64638 3.47459L10.2898 3.85999L9.64853 3.47102C9.89365 3.06692 10.2388 2.73281 10.6506 2.50094ZM10.932 4.24739C10.9317 4.24792 10.9313 4.24844 10.931 4.24896L2.46662 18.3797C2.35919 18.5675 2.30237 18.7801 2.30176 18.9966C2.30115 19.2149 2.3577 19.4295 2.46579 19.6191C2.57387 19.8087 2.72972 19.9668 2.91784 20.0774C3.1049 20.1875 3.31737 20.247 3.53435 20.25H20.4652C20.6822 20.247 20.8947 20.1875 21.0817 20.0774C21.2698 19.9668 21.4257 19.8087 21.5338 19.6191C21.6419 19.4295 21.6984 19.2149 21.6978 18.9966C21.6972 18.7801 21.6404 18.5675 21.5329 18.3797L13.0685 4.24896C13.0682 4.24844 13.0679 4.24792 13.0676 4.24739C12.9562 4.06441 12.7997 3.91311 12.613 3.80801C12.4258 3.70262 12.2146 3.64725 11.9998 3.64725C11.7849 3.64725 11.5737 3.70262 11.3865 3.80801C11.1999 3.91311 11.0433 4.06441 10.932 4.24739Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 15V9H12.75V15H11.25Z" fill="#FC6B40"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 18V16H12.75V18H11.25Z" fill="#FC6B40"/>
        </svg>
      </div>
    </div>
  </div>
</div>
