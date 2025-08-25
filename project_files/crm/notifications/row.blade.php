@if(count($notifications))
  @foreach($notifications as  $k => $item)
    @if(($k == 0 && $newDate) || ($k > 0 &&$notifications[$k-1]->date != $item->date))
    <div class="notifications-date">
      {{date('d.m.Y', strtotime($item->date))}}
    </div>
    @endif
    <div class="notification-item">
      <div class="image">
        {!! $item->type->svg !!}
      </div>
      <div class="text">
        {!! $item->text !!} 
        <div class="date">
          {{ date('d.m.Y H:s', strtotime($item->created_at)) }}
        </div>
      </div>
    </div>
  @endforeach
@endif