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
              <div class="input-block">
                <label>@lang('message.post_name')</label>
                <input type="text" name="name" value="{{ old('name') }}" required/>
              </div>
              <div class="input-block">
                <label>@lang('message.bg_color')</label>
                <input type="color" name="background" value="{{ old('background') }}" required/>
              </div>
              <div class="input-block">
                <label>@lang('message.text_color')</label>
                <input type="color" name="color" value="{{ old('color') }}" required/>
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