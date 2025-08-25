@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')
  <section class="all-cities container container-base">
    <h1 class="board-type">{{$type->name}}</h1>
    <div class="all-cities_content">
      @foreach($city_by_region as $region => $cts)
      <div class="all-cities_region-block">
        <ul class="all-cities__list">
          <li class="item region"><b>{{ $region }}</b></li>
          @foreach($cts as $alias => $city)
          @if($type->type)
            <li class="item"><a href="{{$data['lang_url']}}{{ $type ? "/{$type->type}" : "" }}/{{ $alias }}">{{ $city }}</a></li>
          @else
            <li class="item"><a href="{{$data['lang_url']}}/{{ $alias }}">{{ $city }}</a></li>
          @endif
          @endforeach
        </ul>
      </div>
      @endforeach
    </div>
  </section>
@include('add.footer')