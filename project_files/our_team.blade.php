@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- TEAM (START) -->
  <section class="our-team">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <h1 class="title">Наша команда</h1>
          <div class="team-block">
            @foreach($team as $person)
            <div class="person-card">
              <div class="photo" style="background: url({{ Voyager::image($person->photo) }}) no-repeat center / cover"></div>
              <div class="info">
                <p class="name">{{ $person->getTranslatedAttribute('name') }}</p>
                <p class="position">{{ $person->getTranslatedAttribute('position') }}</p>
                <p class="phone">{{ $person->phone }}</p>
                <p class="email">{{ $person->email }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- TEAM (END) -->
@include('add.footer')