<div class="data-tr act-tr" id="act-item-{{$act->id}}">
  <div class="data-td td-number">
	@lang('message.application') №{{$act->number}}
  </div>
  <div class="data-td">
	{{ date('d.m.Y', strtotime($act->date)) }}  
  </div>
  <div class="data-td status-changer" id="act_status-{{$act->id}}"  data-type="application" data-id="{{$act->id}}" data-status="{{$act->status_id}}">
	@if($act->status_id)
	<span class="status-info" style="background: {{$act->status->background}}; color: {{$act->status->color}};">&bull; {{ $act->status->name }}</span>
    @endif  
  </div>
  <div class="data-td action-col align-right">
	  <a href="#" class="more-action">
	    <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="for-js">
        <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z" fill="#3D445C" class="for-js"/>
      </svg>
    </a>
	  <div class="sub-action hide">
      <a class="pointer edit-act-date" data-client_id="{{$contract->client_id}}" data-contract_id="{{$contract->id}}" data-act_id="{{$act->id}}" data-date="{{$act->date}}" data-first_month_pay_date="{{ $act->first_month_pay_date }}" data-number="{{$act->number}}">@lang('message.change_date')</a>
	    <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/view" class="ajax-popup-link" id="act-view-{{$act->id}}">@lang('message.edit')</a>
      @if($act->file)
      <a href="{{$act->file_id ? route('act.download', ['id' => $client->id, 'contract_id' => $contract->id, 'act_id' => $act->id, 'file_id' => $act->file_id]) : $act->file}}" download>@lang('message.download_application')</a>
      @endif
      @if($act->can_delete)
      <a class="act-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}" data-client_id="{{$contract->client_id}}" href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/delete">@lang('message.delete_application')</a>
      @endif
    </div>
  </div>  
</div> 