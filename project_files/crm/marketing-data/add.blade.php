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
                                <label>@lang('message.month')</label>
                                <select name="month" class="marketing-month" required>
                                    @foreach($monthList as $ym => $name)
                                        <option value="{{$ym}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                {{--
                                <input type="text" name="month" value="{{ old('month') }}" required/>
                                --}}
                            </div>
                        </div>
                        <div class="hr"></div>
                        <div class="field-container">
                            <div class="input-block">
                                <label>@lang('message.seo_cost')</label>
                                <input type="text" name="seo_cost" value="{{ old('seo_cost') }}" required/>
                            </div>
                            <div class="input-block">
                                <label>@lang('message.seo_click')</label>
                                <input type="text" name="seo_click" value="{{ old('seo_click') }}" required/>
                            </div>
                        </div>
                        <div class="hr"></div>
                        <div class="field-container">
                            <div class="input-block">
                                <label>@lang('message.other_cost')</label>
                                <input type="text" name="other_cost" value="{{ old('other_cost') }}" />
                            </div>
                            {{--
                            <div class="input-block">
                                <label>@lang('message.other_click')</label>
                                <input type="text" name="other_click" value="{{ old('other_click') }}" required/>
                            </div>
                            --}}
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
<style>
    .marketing-month{
        width: 320px;
    }
</style>
<script>
    var main_url = '/manager/marketing-data/view';
</script>

@include('front.crm.scripts')
<script>
    $('.marketing-month').select2();
</script>