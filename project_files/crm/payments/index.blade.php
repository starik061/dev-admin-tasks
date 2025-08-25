<div class="popup-form payment-notification-popup zi10101">
	<div class="popup-form-header">
    <span>@lang('message.urgent_notifications') <span id="payments-count-text">({{count($data['operations'])}})</span></span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
      </svg>
    </span>
  </div>
  <div class="popup-form-body">
  	<ul class="popup-payments-list">
  		@foreach($data['operations'] as $item)
  		<li data-id="{{$item->operation_id}}">
        <div class="operation-info">
          <div class="left-info">
            @if($item->operation->edrpou)
            <span>
              {{$item->operation->operation_date}} <b>{{$item->operation->name}}</b> @lang('message.paid_unknown_bill') <b>{{$item->our_company_name}}</b> @lang('message.on_sum') <b>{{$item->operation->sum}}</b> грн.
            </span>
            @else
            <span>
            {{$item->operation->operation_date}} @lang('message.unknown_payment') {{$item->operation->description}} @lang('message.on_sum') <b>{{$item->operation->sum}}</b> грн. <b>(Прайд Форма 2)</b>
            </span>
            @endif
          </div>
          <div class="right-action">
            <a class="cancel pointer action-button" data-operation_id="{{$item->operation_id}}">@lang('message.reject')</a>
            <a class="crm-button pointer action-button accept-payment-button" data-operation_id="{{$item->operation_id}}">@lang('message.accept')</a>
          </div>
        </div>
      </li>
  		@endforeach
  	</ul>
  </div>
</div>