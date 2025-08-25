@include('add.head')

<body>

@include('add.header')
@include('add.menu')
@include('add.bread')

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
                            <a class="crm-button mt0" style="margin-top:0;" href="/manager/analitics/get-excel-firm"
                               download>@lang('message.export_to_excel2')</a>
                            <table class="all-occupancy-table">
                                <tbody class="all-occupancy-tbody">
                                <tr class="all-occupancy-tr">

                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>ID</b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>@lang('message.name2')</b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.grid_statuses')
                                        </b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.actuality_percent_prev_month')
                                        </b>
                                    </td>

                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.actuality_percent')
                                        </b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.update_type')
                                        </b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.loading')
                                        </b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.last_request_date')
                                        </b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.next_request_date')
                                        </b>
                                    </td>
                                    <td class="all-occupancy-td all-occupancy-td-header-text">
                                        <b>
                                            @lang('message.last_update_date')
                                        </b>
                                    </td>
                                    @foreach($daysupd as $item)
                                        <td class="all-occupancy-td all-occupancy-td-header-text">
                                            <b>
                                                {{date("d.m.Y", strtotime(str_replace("t","",$item)))}}
                                            </b>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach( $firms as $k => $v )
                                    <tr class="all-occupancy-tr">

                                        <td class="all-occupancy-td all-occupancy-td-header-text">
                                            {{$v->id}}
                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">
                                            {{$v->name}}
                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">

                                            {{$v->actual}}

                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">

                                            {{$v->last_month}}

                                        </td>

                                        <td class="all-occupancy-td all-occupancy-td-header-text">

                                            {{$v->this_month}}

                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">

                                            {{$v->upd_type}}

                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">

                                            {{$v->upload_date}}

                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">
                                            @if(!empty($v->last_send))
                                                {{date("d.m.Y", strtotime($v->last_send))}}
                                            @endif
                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">
                                            @if(!empty($v->next_date))
                                                {{date("d.m.Y", strtotime($v->next_date))}}
                                            @endif
                                        </td>
                                        <td class="all-occupancy-td all-occupancy-td-header-text">
                                            @if(!empty($v->last_update))
                                                {{date("d.m.Y H:i:s", strtotime($v->last_update))}}
                                            @endif
                                        </td>

                                        @foreach($daysupd as $item)
                                            <td class="all-occupancy-td all-occupancy-td-header-text">

                                                {{$v->$item}}

                                            </td>

                                        @endforeach

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

@include('add.footer')

@if(session('success') || @$success)
    <div class="success-mesage">
        {!! session('name') !!}
    </div>
@endif

<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')

