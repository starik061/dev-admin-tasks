@if($meedheader==1)
@include('add.head')
@endif
<body>
@if($meedheader==1)
@include('add.header')
@include('add.menu')
@include('add.bread')
@endif
<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details posts-block">
        <h1 class="title-search-result">
        {{$email}}
        </h1>
        <div class="content-block posts-block">
         <div class="posts-list">
            <div class="clients-contracts-data">
                <h4>Фірми які потребують уваги (не оновилися штатно {{date("d.m.Y",strtotime($yesterday))}})</h4>
                <table class="occupancy-table" >
                    <tbody class="occupancy-tbody" >
                    <tr class="occupancy-tr">

                        <td  class="occupancy-td occupancy-td-header-text">
                            <b>Id</b>
                        </td>
                        <td  class="occupancy-td occupancy-td-header-text">
                            <b>@lang('message.name2')</b>
                        </td>
                        <td  class="occupancy-td occupancy-td-header-text">
                            <b>
                                @lang('message.last_update_date')
                            </b>
                        </td>
                        <td  class="occupancy-td occupancy-td-header-text">
                            <b>
                                @lang('message.contacts')
                            </b>
                        </td>
                    </tr>
                    @foreach( $firms as $k => $v )
                    <tr class="occupancy-tr">

                        <td  class="occupancy-td occupancy-td-header-text">
                            {{$v->id}}
                        </td>
                        <td  class="occupancy-td occupancy-td-header-text">
                            {{$v->name}}
                        </td>
                        <td  class="occupancy-td occupancy-td-header-text">
                            {{$v->last_update}}
                        </td>
                        <td  class="occupancy-td occupancy-td-header-text">
                            {{$v->contact_user}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>



            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if($meedheader==1)
@include('add.footer')
@endif
@if(session('success') || @$success)
    <div class="success-mesage">
        {!! session('name') !!}
    </div>
@endif
@if($meedheader==1)
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')
@endif
