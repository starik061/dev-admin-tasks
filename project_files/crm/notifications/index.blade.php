@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base notifications-page">
          <h1 class="title">{{$data['seo']->h1_title}}</h1>
          @if(count($notifications))
          <div class="notification-list-2">
            @foreach($notifications as  $k => $item)
              @if($k == 0 || $notifications[$k-1]->date != $item->date)
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
          </div>
            @if ($notifications->lastPage() > 1)
              <div class="result-paginator" data-current-page="{{ $notifications->currentPage() }}" data-total-page="{{ $notifications->lastPage() }}">
                
                <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span></button>
                
                <div class="result-paginator__pages">
                  <div class='result-paginator__prev'>
                    <i class="fa fa-arrow-left"></i>
                    <a href="{!! $notifications->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                  </div>
                  {!! $notifications->appends($params)->links() !!}
                  <div class='result-paginator__next'>
                    <a href="{!! $notifications->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                    <i class="fa fa-arrow-right"></i>
                  </div>                  
                </div>
              </div>
            @endif
          @else

          @endif
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
@include('front.crm.footer')
@include('front.crm.scripts')
<script type="text/javascript">
  currentPage = {{$page}};
  param_sort = param_dir = null;
  main_url = '/manager/notifications';
  $('.notification-count').hide();
  $.post('/manager/notifications/viewed',{},function(){});
</script>
