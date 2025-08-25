@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

  <section class="reviews container container-base">
    <h1 class="reviews__title">@lang('message.reviews_title')</h1>
    <!-- cards block -->
    <div class="reviews__cards">

    @foreach($reviews as $key => $rws)
      <div class="review__card" id="{{ $rws->id }}">
        <div class="review__card-left">
          <img src="{{ $rws->avatar }}" alt="Avatar">           
          <span class='name'>{{ $rws->getTranslatedAttribute('name') }}</span>
          <span class='company'>{{ $rws->getTranslatedAttribute('company') }}, {{ $rws->getTranslatedAttribute('city') }}</span>
        </div>
        <div class="review__card-right">
          <p class="title">{{ $rws->getTranslatedAttribute('title') }}</p>
          <div class="message" style="height: 60px;">
            <p>{{ $rws->text }}</p>
            <div class="images">
              <img data-fancybox="{{ $key }}" href="{{ $rws->image }}" src="{{ $rws->image }}" alt="details image">
            </div>
          </div>
          <button class="button-more">@lang('message.reviews_show_more')</button>
        </div>
      </div>
    @endforeach
    {{--
    <div class="result-paginator" data-current-page="{{ $reviews->currentPage() }}" data-total-page="{{ $reviews->lastPage() }}"> 
      <div class="result-paginator__pages">
          {!! $reviews->links() !!}               
        </div>
      </div>
    </div>
    --}}
  </section>
@include('add.footer')