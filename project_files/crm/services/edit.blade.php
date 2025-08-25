@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp

<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details posts-block">
        <div class="favorite-viewed-tab system-info-tabs">
          @include('front.crm.settings-menu')
        </div>
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block posts-block">
          <form method="POST">
            <div class="field-container">
              <div class="input-block ib-1-5">
                <label>@lang('message.name2')</label>
                <input type="text" name="name" value="{{ $service->name }}" required @error('name') class="error" @enderror/>
              </div>
              <div class="input-block ib-1-5">
                <label>@lang('message.price_')</label>
                <input type="text" name="price" value="{{ $service->price }}" @error('price') class="error" @enderror/>
              </div>
            </div>
            <div class="hr"></div>
            <div class="field-container right">
              <div class="buttons-block">
                <a class="cancel">@lang('message.clear')</a>
                <button class="submit">@lang('message.save')</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')

<script>
var main_url = '/manager/posts';
</script>

@include('front.crm.scripts')