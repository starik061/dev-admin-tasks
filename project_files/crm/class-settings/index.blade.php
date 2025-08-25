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
            <div class="container container-base container-search-result manager-search our-details details-block">
                <div class="favorite-viewed-tab system-info-tabs">
                    @include('front.crm.settings-menu')
                </div>
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <a class="crm-button abs-top-right" href="/manager/classes/new">@lang('message.add_class')</a>
                <div class="content-block content-our-details">
                    @if(!count($classes))
                        <div class="no-data" @if($search) style="width:100%" @endif>
                            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="eye">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8039 40.0001C13.1176 40.5899 13.5653 41.3972 14.1429 42.3536C15.4103 44.4522 17.2859 47.2412 19.7208 50.0188C24.6495 55.6411 31.5208 60.8334 40 60.8334C48.4792 60.8334 55.3505 55.6411 60.2792 50.0188C62.7141 47.2412 64.5898 44.4522 65.8571 42.3536C66.4347 41.3972 66.8824 40.5899 67.1961 40.0001C66.8824 39.4103 66.4347 38.603 65.8571 37.6466C64.5898 35.548 62.7141 32.759 60.2792 29.9814C55.3505 24.3591 48.4792 19.1667 40 19.1667C31.5208 19.1667 24.6495 24.3591 19.7208 29.9814C17.2859 32.759 15.4103 35.548 14.1429 37.6466C13.5653 38.603 13.1176 39.4103 12.8039 40.0001ZM70 40.0001C72.2647 38.9413 72.2643 38.9404 72.2639 38.9395L72.2599 38.931L72.2511 38.9123L72.2213 38.85C72.1961 38.7975 72.1601 38.7235 72.1135 38.6293C72.0204 38.441 71.8845 38.172 71.7066 37.8337C71.3509 37.1575 70.8261 36.2027 70.1372 35.0619C68.7625 32.7855 66.7178 29.7412 64.039 26.6854C58.7404 20.641 50.6117 14.1667 40 14.1667C29.3883 14.1667 21.2596 20.641 15.961 26.6854C13.2822 29.7412 11.2375 32.7855 9.8628 35.0619C9.17386 36.2027 8.64908 37.1575 8.29343 37.8337C8.11551 38.172 7.97965 38.441 7.88647 38.6293C7.83987 38.7235 7.80393 38.7975 7.77871 38.85L7.74893 38.9123L7.74009 38.931L7.73719 38.9372C7.73676 38.9381 7.73529 38.9413 10 40.0001L7.73529 38.9413C7.42157 39.6123 7.42157 40.3879 7.73529 41.0589L10 40.0001C7.73529 41.0589 7.73486 41.058 7.73529 41.0589L7.74009 41.0691L7.74893 41.0878L7.77871 41.1502C7.80393 41.2026 7.83987 41.2767 7.88647 41.3708C7.97965 41.5592 8.11551 41.8282 8.29343 42.1665C8.64908 42.8426 9.17386 43.7975 9.8628 44.9383C11.2375 47.2146 13.2822 50.259 15.961 53.3147C21.2596 59.3591 29.3883 65.8334 40 65.8334C50.6117 65.8334 58.7404 59.3591 64.039 53.3147C66.7178 50.259 68.7625 47.2146 70.1372 44.9383C70.8261 43.7975 71.3509 42.8426 71.7066 42.1665C71.8845 41.8282 72.0204 41.5592 72.1135 41.3708C72.1601 41.2767 72.1961 41.2026 72.2213 41.1502L72.2511 41.0878L72.2599 41.0691L72.2628 41.063C72.2632 41.062 72.2647 41.0589 70 40.0001ZM70 40.0001L72.2647 41.0589C72.5784 40.3879 72.5776 39.6105 72.2639 38.9395L70 40.0001Z" fill="#3D445C"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.0007 35.8333C37.6995 35.8333 35.834 37.6987 35.834 39.9999C35.834 42.3011 37.6995 44.1666 40.0007 44.1666C42.3018 44.1666 44.1673 42.3011 44.1673 39.9999C44.1673 37.6987 42.3018 35.8333 40.0007 35.8333ZM30.834 39.9999C30.834 34.9373 34.938 30.8333 40.0007 30.8333C45.0633 30.8333 49.1673 34.9373 49.1673 39.9999C49.1673 45.0625 45.0633 49.1666 40.0007 49.1666C34.938 49.1666 30.834 45.0625 30.834 39.9999Z" fill="#3D445C"/>
                            </svg>
                            <span class="no-data-title">
              @lang('message.empty_classes')
            </span>
                        </div>
                    @else
                        <div class="posts-list">
                            <div class="clients-contracts-data">
                                <div class="data-table">
                                    <div class="data-thead">
                                        <div class="data-tr">
                                            <div class="data-td td-name">@lang('message.name')</div>
                                            <div class="data-td action-col"></div>
                                        </div>
                                    </div>
                                    <div class="data-tbody contracts-rows ">
                                        @foreach($classes as $key => $item)
                                            <div class="data-tr-global">
                                                <div class="data-tr" data-id="{{$item->id}}">
                                                    <div class="data-td td-name pointer">
                                                          <span class="up-down">
                                                            <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg" class="info-arrow">
                                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z" fill="#3D445C"></path>
                                                            </svg>
                                                          </span>
                                                        {{$item->name}}
                                                    </div>
                                                    <div class="data-td action-col">
                                                        <a href="/manager/classes/{{$item->id}}/edit" class="edit mr0">
                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="details-data hide">
                                                    <div class="info-block-table">
                                                        <div class="tr">
                                                            <div class="td">
                                                                <span>LTV:</span>
                                                            </div>
                                                            <div class="td">
                                                                {{ $item->live_time_value }}
                                                            </div>
                                                        </div>
                                                        <div class="tr">
                                                            <div class="td">
                                                                <span>LT:</span>
                                                            </div>
                                                            <div class="td">
                                                                {{ $item->live_time }}
                                                            </div>
                                                        </div>

                                                        <div class="tr">
                                                            <div class="td">
                                                                <span>@lang('message.real_avg_bill'):</span>
                                                            </div>
                                                            <div class="td">
                                                                {{ $item->real_avg_bill }}
                                                            </div>
                                                        </div>

                                                        <div class="tr">
                                                            <div class="td">
                                                                <span>@lang('message.background'):</span>
                                                            </div>
                                                            <div class="td">
                                                                {{ $item->background }}
                                                            </div>
                                                        </div>
                                                        @if($item->is_nds)
                                                            <div class="tr">
                                                                <div class="td">
                                                                    <span>@lang('message.inn2'):</span>
                                                                </div>
                                                                <div class="td">
                                                                    {{ $item->inn }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
@if(session('success') || @$success)
    <div class="success-mesage">
        {!! session('name') !!}
    </div>
@endif
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');

<script>
    var main_url = '/manager/posts';
</script>

@include('front.crm.scripts')

@if(session('success') || @$success)
    <script>
        let w = $('.success-mesage').width();
        $('.success-mesage').css('margin-left','-'+(w/2)+'px');
        $('.success-mesage').css('opacity','1');
        if(window.location.href.indexOf("created")){
            window.history.pushState({},$('title').text(),main_url);
        }
        setTimeout(function(){
            $('.success-mesage').css('opacity','0');
        },3000)
    </script>
@endif