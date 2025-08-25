@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')


<!-- FAQ (START) -->
  @include('add.bread')
  <section class="faq">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <h1 class="title">@lang('message.faq')</h1>
          <div class="faq-block">
            @foreach($faqs as $key => $faq)
              <div class="faq-part">
                <h4 class="main-title">@lang('message.'.$key)</h4>
                <div class="single-division initAccordion">
                  @foreach($faq as $value)
                  <h3>{!! $value->getTranslatedAttribute('question') !!}</h3>
                  <div>
                    <p>{!! $value->getTranslatedAttribute('answer') !!}</p>
                  </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- FAQ (END) -->
@include('add.footer')