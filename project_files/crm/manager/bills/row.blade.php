@php
  $bill->contract->getCurrentDetails();
  $period = '';
  if($bill->period != 'full-date' && !is_array($bill->period)){
    $tmp = explode('-', $bill->period);
    $period = $months_i[$tmp[1]].' '.$tmp[0];
  }elseif(is_array($bill->period)){
    $period = "";
    $counter = "";
    $counter_text = "";
    $bp = "";
    foreach($bill->period as $i => $item){
      $bp .= $item."|";
      $tmp = explode('-', $item);
      if(!$i){
        $period = $months_i[$tmp[1]].' '.$tmp[0];
      }else{
        $counter++;
        $counter_text .= $months_i[$tmp[1]].' '.$tmp[0]."<br>";
      }
    }
    if($counter){
      $period .= "<span class='al-power-tip' title='".substr($counter_text,0,-4)."'>+".$counter."</span>";
    }
    $bill->period = substr($bp,0,-1);
  }else{
    $tmp = explode("|", $bill->full_date);
    $period = 'з '.date('d.m.Y', strtotime($tmp[0])).' по '.date('d.m.Y', strtotime($tmp[1]));
  }
  $fileSystemNumber = str_replace(['/', "\\"], ['-', '-'], $bill->contract->number);
  $companyName = str_replace(["&quot;", "\""], ["", ""], $bill->contract->company_name_short);
  $fileTitle = "Рахунок ".$bill->number." ".$fileSystemNumber." ".$companyName;
@endphp
<div class="data-tr bills-item" id="bill-{{$bill->id}}">
  <div class="data-td bill-payer">
    <a href="/manager/clients/{{$bill->client->id}}/view" target="_blank" >
      {{$bill->client->name}}
    </a>
  </div>
  <div class="data-td contract-info">
    @if($bill->contract->number != '-')
    {{--
    <a href="https://drive.google.com/file/d/{{$bill->act->file_id}}/view" target="_blank">
      №{{ $bill->contract->number }} / Дод. №{{$bill->act->number}}
    </a>
    --}}
      @foreach($bill->acts as $app)
        <a href="https://docs.google.com/document/d/{{$app->file_id}}/edit" target="_blank">
        №{{ $bill->contract->number }} / Дод. №{{$app->number}}
        </a><br>
      @endforeach
    @else
      &ndash;
    @endif
  </div>
  <div class="data-td bill-date" data-year="{{ date('Y', strtotime($bill->date)) }}"  data-month="{{ date('m', strtotime($bill->date)) }}">
    {{ date('d.m.y', strtotime($bill->date)) }}
  </div>
  <div class="data-td bill-number">

    {{$bill->number}}
  </div>
  <div class="data-td bill-payer">
    <a href="/manager/clients/{{$bill->client->id}}/view" target="_blank">
      {{$bill->contract->company_name_short ? $bill->contract->company_name_short : $bill->contract->person_short}}
    </a>
  </div>
  <div class="data-td">
    {{$bill->our_company}}
  </div>
  <div class="data-td bill-period @if(in_array($bill->id,$placingBills)) placing-bill @endif" data-year="{{ date('Y', strtotime($bill->period)) }}"  data-month="{{ date('m', strtotime($bill->period)) }}">
    {!!$period!!}
  </div>
  <div class="data-td">
    {{ $bill->cash ? "нал." : "б/н"}}
  </div>
  <div class="data-td bill-sum">
    {{number_format($bill->sum,2,',','')}}
  </div>
  <div class="data-td">
    {{number_format($bill->paid_sum - $bill->returned, 2, ',', '')}}
  </div>
  <div class="data-td">
    @php
      $delta = number_format($bill->sum - $bill->paid_sum,2,',','');
      if(in_array($bill->id, [1319, 3690, 3634, 4501]) || $bill->returned){
          $delta = "0,00";
      }
      if(substr($delta, 0, 1) == '-'){
        $delta = str_replace("-","+",$delta);
      }
    @endphp
    {{$delta}}
  </div>
  <div class="data-td bill-status-td status-changer-bk" data-status="{{  ($bill->paid ? 'paid' : ($bill->send ? 'send' : (0 != (int)($bill->sum - $bill->paid_sum) && (int)$bill->paid_sum ? 'partially_paid' : 'wait' ) )) }}" data-type="bookkeeper" data-id="{{$bill->id}}">
    <span class="wait" style="background:{{$bill->bookkeeper_status->background}}; color: {{$bill->bookkeeper_status->color}}">&bull; {{ $bill->bookkeeper_status->name }}</span>
  </div>
  <div class="data-td ">
    
    
      @if(count($bill->bank_operations) > 0 )
        @foreach($bill->bank_operations as $k => $v)
          @if(!$k)
            @if(count($bill->bank_operations) == 1)
              {{ date('d.m.y', strtotime($v->created_at)) }}
            @else
              <span class="al-power-tip" title="
              {{ $v->sum ." - ".date('d.m.y', strtotime($v->created_at)) }}<br>
            @endif
          @else
            {{ $v->sum ." - ".date('d.m.y', strtotime($v->created_at)) }}<br>
          @endif
        @endforeach
        @if(count($bill->bank_operations) > 1)
          ">{{count($bill->bank_operations)}}</span>
        @endif
      @else
        @if($bill->paid_at)
        {{ date('d.m.y', strtotime($bill->paid_at)) }}
        @endif
      @endif
    
  </div>
  <div class="data-td bill-status-td status-changer2" data-status="{{ $bill->bookkeeper_action == '4' ? 4 : ($bill->paid ? 'paid' : ($bill->send ? 'send' : (0 != (int)($bill->sum - $bill->paid_sum) && (int)$bill->paid_sum ? 'partially_paid' : 'wait' ) )) }}" data-type="bill" data-id="{{$bill->id}}">
    {{--
    <span class="{{ $bill->paid ? 'paid' : 'wait'}}" style="display:block;">&bull; {!! $bill->paid ? 'Оплачен' : ($bill->send ? 'Отправлен' : ( ($bill->sum - $bill->paid_sum) != 0 && $bill->paid_sum  ? 'Частично<br>&nbsp;&nbsp;&nbsp;&nbsp;оплачен' : ($bill->bookkeeper_action == 4 ? 'Завизирован' :'Ожидает' ) ) ) !!}</span>
    --}}
    <span class="{{ $bill->returned ? 'wait' : ($bill->paid ? 'paid' : 'wait') }}" style="display:block;">&bull; {!! $bill->returned ? __('message.refund__') : ( $bill->paid ? __('message.paid') : ($bill->send ? __('message.sent') : ( ($bill->sum - $bill->paid_sum) != 0 && $bill->paid_sum  ? __('message.partially_paid') : ($bill->bookkeeper_action == 4 ? __('message.approved') : __('message.wait') ) ) ) ) !!}</span>
  </div>
  <div class="data-td bill-action action-col align-right">
    @if($bill->file_id || $bill->can_download)
    <a href="#" class="more-action">
      <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z" fill="#3D445C"/>
      </svg>
    </a>
    <div class="sub-action hide">
      @if($bill->paid_sum < 0.01)
      <a class="pointer delete-bill" data-id="{{$bill->id}}" data-client_id="{{$bill->client_id}}">@lang('message.delete')</a>
      @endif
      @if((($bill->bookkeeper_action != 4 && $bill->contract->number == '-') || $bill->cash ) && $bill->paid_sum < 0.01)
      <a href="{{ route('acts.index',['id' => $bill->client_id, 'contract_id' => $bill->contract_id, 'act_id' => $bill->act_id])}}" class="ajax-popup-link" id="act-view-{{$bill->act_id}}">@lang('message.edit')</a>
      @endif
      @if($bill->file_id)
      <a href="https://drive.google.com/file/d/{{$bill->file_id}}/view" target="_blank">@lang('message.view')</a>
      @endif
      @if($bill->can_download)
      <a class="bill-download pointer" data-date="{{$bill->period}}" data-client_id="{{$bill->client_id}}" data-contract_id="{{$bill->contract_id}}" data-act_id="{{$bill->act_id}}" data-signed="true">@lang('message.download')</a>
      @endif
    </div>
    @endif
  </div>
</div>