@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')
<!-- BOARD (START) -->

  <div id="useragreement" class="container container-base">
    <h1 class="useragreement__title">@lang('message.users_agreements')</h1>
    {!! $user_agree !!}
  </div>

<!-- BOARD (END) -->
@include('add.footer')