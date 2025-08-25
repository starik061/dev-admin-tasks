@if($selectionBoards)
<div class="selection-items-table" data-selection_id="{{$selection->id}}">
  <div class="selection-items-head">
    <div class="selection-items-row">
      <div class="selection-items-col col-checkbox">
        <input type="checkbox" class="select-all"/>
      </div>
      <div class="selection-items-col">ID</div>
      <div class="selection-items-col">@lang('message.city')</div>
      <div class="selection-items-col">@lang('message.firm_code4')</div>
      <div class="selection-items-col">@lang('message.type')</div>
      <div class="selection-items-col">@lang('message.address')</div>
      <div class="selection-items-col">@lang('message.side')</div>
      <div class="selection-items-col">@lang('message.light')</div>
      <div class="selection-items-col">@lang('message.changed')</div>
      <div class="selection-items-col">@lang('message.photo')</div>
      <div class="selection-items-col">@lang('message.employment')</div>
      <div class="selection-items-col">@lang('message.in_price') @lang('message.without_nds3')</div>
      <div class="selection-items-col">@lang('message.price_') @lang('message.without_nds3')</div>
    </div>
  </div>
  <div class="selection-items-body">
    @include('front.crm.clients.contracts.acts.selection_boards')
  </div>
</div>
@endif