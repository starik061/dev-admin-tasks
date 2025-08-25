@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')
  <div id="content_faq">
    <div class="reviews container container-base">
      <h1 class="title">{{ $discount->getTranslatedAttribute('title') }}</h1>
      <div class="action_item">
        <div class="img_action2">
          <img src="{{ $discount->avatar }}" alt="avatar">
        </div>
        <div class="action_div fleft">
          {!! $discount->getTranslatedAttribute('text') !!}
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@include('add.footer')