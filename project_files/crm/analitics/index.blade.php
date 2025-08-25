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
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block posts-block">
         <div class="posts-list">
             <div class="search-date-analitics">
                 <form action="/manager/analitics" method="post" >
                     <label for="date_s">
                        @lang('message.from2')
                     </label>
                     <input type="date" name="date_s" id="date_s" value="{{$filterdates}}">
                     <label for="date_e">
                        @lang('message.over')
                     </label>
                     <input type="date" name="date_e" id="date_e" value="{{$filterdatee}}">
                     <button type="submit" >@lang('message.filter')</button>
                 </form>
             </div><br>
            <div class="clients-contracts-data">
                <table class="occupancy-table" style="width: 100%;" >
                    <tbody class="occupancy-tbody" >
                    <tr class="occupancy-tr">
                        <td colspan="2" class="occupancy-td occupancy-td-header-text">
                            @lang('message.base_actuality')
                        </td>
                        <td colspan="2" class="occupancy-td occupancy-td-header-text">
                            @lang('message.coords_actuality')
                        </td>
                        <td colspan="2" class="occupancy-td occupancy-td-header-text">
                            @lang('message.image_actuality')
                        </td>
                    </tr>
                    <tr class="occupancy-tr">
                        <td class="occupancy-td occupancy-td-header-value" >
                            <div class="occupancy-div-percent"><span class="occupancy-span-percent"></span><span class="occupancy-text-percent">{{$firmday}}%</span></div>
                        </td>
                        <td class="occupancy-td  occupancy-td-header-value">
                            <div class="occupancy-div-percent"><span class="occupancy-span-percent"></span><span class="occupancy-text-percent">{{$firmall}}%</span></div>
                        </td>
                        <td class="occupancy-td  occupancy-td-header-value">
                            <div class="occupancy-div-percent"><span class="occupancy-span-percent"></span><span class="occupancy-text-percent">{{$coorday}}%</span></div>
                        </td>
                        <td class="occupancy-td  occupancy-td-header-value">
                            <div class="occupancy-div-percent"><span class="occupancy-span-percent"></span><span class="occupancy-text-percent">{{$coorall}}%</span></div>
                        </td>
                        <td class="occupancy-td  occupancy-td-header-value">
                            <div class="occupancy-div-percent"><span class="occupancy-span-percent"></span><span class="occupancy-text-percent">{{$imgday}}%</span></div>
                        </td>
                        <td class="occupancy-td  occupancy-td-header-value">
                            <div class="occupancy-div-percent"><span class="occupancy-span-percent"></span><span class="occupancy-text-percent">{{$imgall}}%</span></div>
                        </td>
                    </tr>
                    <tr class="occupancy-tr">
                        <td class="occupancy-td  occupancy-td-column-text">
                            @lang('message.today')
                        </td>
                        <td class="occupancy-td  occupancy-td-column-text">
                            @lang('message.by_month')
                        </td>
                        <td class="occupancy-td  occupancy-td-column-text">
                            @lang('message.today')
                        </td>
                        <td class="occupancy-td  occupancy-td-column-text">
                            @lang('message.by_month')
                        </td>
                        <td class="occupancy-td  occupancy-td-column-text">
                            @lang('message.today')
                        </td>
                        <td class="occupancy-td  occupancy-td-column-text">
                            @lang('message.by_month')
                        </td>
                    </tr>

                    <tr class="occupancy-tr">
                        <td colspan="2" class="occupancy-td occupancy-td-column-button">
                            <a class="crm-button " style="margin-top:0;" href="/manager/analitics/get-status-all" >@lang('message.detail')</a>
                        </td>
                        <td colspan="2" class="occupancy-td occupancy-td-column-button">
                            <a class="crm-button mt0" style="margin-top:0;" href="/manager/analitics/get-boars-without-latlon" download>@lang('message.detail')</a>
                        </td>
                        <td colspan="2" class="occupancy-td occupancy-td-column-button">
                            <a class="crm-button mt0" style="margin-top:0;" href="/manager/analitics/get-boars-without-photo" download>@lang('message.detail')</a>
                        </td>
                    </tr>
                    </tbody>
                </table>



            </div>
            
          </div>
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
@include('front.crm.scripts')
