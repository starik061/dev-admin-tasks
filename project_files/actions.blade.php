@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')
  <section class="reviews container container-base">
    <h1 class="reviews__title">@lang('message.actions_title')</h1>
    <!-- cards block -->
    <div class="reviews__cards">

    @foreach($discounts as $dscnt)
      <div class="review__card" id="{{ $dscnt->id }}">
        <div class="review__card-left actions-img">
          <img src="{{ $dscnt->avatar }}" alt="Avatar">           
        </div>
        <div class="review__card-right">
          <span class="title">{{ $dscnt->getTranslatedAttribute('title') }}</span>
          <div class="message">
            <p>{{ $dscnt->text}}</p>
          </div>
          <a href="{{$data['lang_url']}}/actions/{{ $dscnt->alias }}" class="button-more">@lang('message.detail')</a>
        </div>
      </div>
    @endforeach
    <div class="result-paginator" data-current-page="{{ $discounts->currentPage() }}" data-total-page="{{ $discounts->lastPage() }}"> 
      <div class="result-paginator__pages">
          {!! $discounts->links() !!}               
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
<div id='show-map-modal' class="modal">
  <div id="map-modal-board"></div>
</div>