@include('add.head')
<body>
@include('add.header')
@include('add.menu')

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base bills-page">
                <a class="back" href="/manager/clients">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z"
                              fill="#FC6B40"/>
                    </svg>
                    @lang('message.back')
                </a>
            </div>
            <div class="container  container-base bills-page">
                @include('front.crm.clients.header')
                @include('front.crm.clients.inner-menu')
                <div class="client-tab-data-block">
                    <div class="info-block select-in-title-block">
                        <h2 class="info-block-title" style="display: inline-block;">
                            @lang('message.period')
                        </h2>
                        <select class="search-form-select" name="period" id="supplier-clients-placement-period">
                            @foreach($periods as $k => $v)
                                <option value="{{$k}}" @if($period == $k) selected @endif>{{$v}}</option>
                            @endforeach
                        </select>
                        <br>
                    </div>
                    @if(count($boardsData[0]) || count($boardsData[1]))
                        <div class="clients-contacts-data">
                            <table class="boards-table" style="display: table">
                                <thead class="boards-table-thead">
                                <tr class="boards-table-tr">
                                    <td class="boards-td boards-td-photo">@lang('message.photo')</td>
                                    <td class="boards-td">@lang('message.code')</td>
                                    <td class="boards-td boards-td-addr">@lang('message.city_addr')</td>
                                    <td class="boards-td">@lang('message.firm_code3')</td>
                                    <td class="boards-td">@lang('message.type_size')</td>
                                    <td class="boards-td">@lang('message.side_lc')</td>
                                    <td class="boards-td">@lang('message.period_lc')</td>
                                    <td class="boards-td">@lang('message.photo_report')</td>
                                    <td class="boards-td"></td>
                                </tr>
                                </thead>
                                <tbody class="boards-table-tbody">
                                @foreach($boardsData as $boards)
                                    @foreach($boards as $board)
                                        <tr class="boards-table-tr">
                                            <td class="boards-td boards-td-photo">
                                                @if($board->image)
                                                    <a href="/upload/{{$board->image}}" data-fancybox="gallery-a">
                                                        <img src="/upload/{{$board->image}}"/>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="boards-td">
                                                <a href="/{{ $board->aleas }}" target="_blank">
                                                    {{$board->board_id}}
                                                </a>
                                            </td>
                                            <td class="boards-td boards-td-addr">
                                                <a href="/{{ $board->aleas }}" target="_blank">
                                                    @if ($board->city_name)
                                                        {{ $board->city_name }},
                                                    @endif
                                                    {{$board->addr}}
                                                </a>
                                            </td>
                                            <td class="boards-td">
                                                <a href="/{{ $board->aleas }}" target="_blank">
                                                    {{ $board->firm_name }}, {{ $board->code }}
                                                </a>
                                            </td>
                                            <td class="boards-td">
                                                <a href="/{{ $board->aleas }}" target="_blank">
                                                    {{ mb_convert_case(mb_strtolower($board->title), MB_CASE_TITLE) }}
                                                    @if ($board->format != null)
                                                        {{ ", " }}
                                                    @endif
                                                    {{ $board->format }}
                                                </a>
                                            </td>
                                            <td class="boards-td">
                                                <a href="/{{ $board->aleas }}" target="_blank">
                                                    {{ $board->side_type }}
                                                </a>
                                            </td>
                                            <td class="boards-td">
                                                {{ date('d.m.Y', strtotime($board->date_from)) }}
                                                - {{ date('d.m.Y', strtotime($board->date_to)) }}
                                            </td>

                                            <td class="boards-td" style="align-items: center">

                                                @if($board->has_photo_reports && count($board->photo_report_images))
                                                    <div class="pointer text-center custom-bubble-image-container layout-image"
                                                         data-image-path="{{ asset('storage/' . $board->photo_report_images[0]) }}"
                                                         data-images="{{ json_encode(array_map(function ($img) {
                                                            return asset('storage/' . $img);
                                                        }, $board->photo_report_images)) }}">
                                                        <img alt="board image" class="img"
                                                             style="width: 25px; height: 25px"
                                                             src="/img/icon_photo_on.svg" data-img="">
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <img alt="board image" class="img"
                                                             style="width: 25px; height: 25px" src="/img/no_image.png"
                                                             data-img="">
                                                    </div>
                                                @endif

                                            </td>

                                            <td class="boards-td action-col align-right" style="position: relative;">
                                                <a href="#" class="more-action" style="margin-right: 12px">
                                                    <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg" class="for-js">
                                                        <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                                                              fill="#3D445C" class="for-js"/>
                                                    </svg>
                                                </a>
                                                @if(!$board->has_photo_reports)
                                                    <div class="sub-action hide">
                                                        <a class="pointer photoreport-add-link"
                                                           data-board-id="{{ $board->id }}">
                                                            @lang('message.create_photoreport')
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="sub-action hide">
                                                        <a class="custom-edit-report pointer"  data-id="{{ $board->photo_report_id }}">@lang('message.edit_photo_report')</a>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="al-overlay3 hide" style="z-index: 10006"></div>

@include('add.footer')

<div class="photoreports-popup" style="z-index: 10006">
    <div class='popup-header'>
        <span>@lang('message.edit_photoreport')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="popup-body">
        <div class="buttons-block right-buttons">
            <a class="cancel">@lang('message.cancel')</a>
            <a class="crm-button">@lang('message.save')</a>
        </div>
    </div>
</div>
<div class="photoreports-popup2" style="z-index: 10006">
    <div class='popup-header'>
        <span>@lang('message.create_photoreport')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="popup-body">
        <div class="buttons-block right-buttons">
            <a class="cancel">@lang('message.cancel')</a>
            <a class="crm-button">@lang('message.save')</a>
        </div>
    </div>
</div>

@include('front.crm.footer')
@include('front.crm.scripts')

<script type="text/javascript">
    $('.al-power-tip').powerTip({placement: 'n'});

    let photoreportData = {
        id: null,
        photo_design: null,
        photo_near: null,
        photo_far: null,
        photo_night: null,
        ym: "{{ $period }}",
        client_view: false,
        client_id: {{$client->id}}
    }
</script>

<style>
    .supplier-block {
        border-bottom: solid 1px #CDD4D9;
    }

    .suppliers-thead,
    .supplier-row {
        display: flex;
        align-items: center;
    }

    /* EDITED */
    .supplier-col {
        flex: 1.2;
        padding: 10px;
        font-family: 'Helvetica Neue';
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 20px;
        color: #3D445C;
    }

    .supplier-row .supplier-col {
        padding: 10px;
    }

    .supplier-col.action-col {
        flex: 0.4;
        display: flex;
        justify-content: flex-end;
    }

    .second-line {
        display: block;
        margin-top: 2px;
        font-family: 'Helvetica Neue';
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        line-height: 20px;
        color: #8B8F9D;
    }

    .supplier-block.current {
        background: #F9F9FA;
    }

    .supplier-block.current .up-down svg {
        transform: rotateZ(180deg);
    }

    /* EDITED */
    .supplier-row-selects {
        padding: 30px 28px 30px 18px;
    }

    .supplier-row-selects .supplier-row .supplier-col:first-child {
        padding-left: 10px;
    }

    .supplier-row-selects.hide {
        display: none;
    }

    .supplier-row-selects .supplier-info {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .supplier-row-selects .supplier-info .supplier-info-item {
        /*flex: 1;*/
        display: flex;
        width: 50%;
        flex-shrink: 0;
    }

    .supplier-row-selects .supplier-info .supplier-info-item .name,
    .supplier-row-selects .supplier-info .supplier-info-item .value {
        flex: 1;
        padding-bottom: 15px;
    }

    .supplier-row-selects .supplier-info .supplier-info-item .name {
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        line-height: 16px;
        color: #8B8F9D;
    }

    .supplier-row-selects .supplier-info .supplier-info-item .value a {
        color: #FC6B40;
    }

    .supplier-row-selects .right-block a {
        color: #FC6B40;
        display: flex;
        align-items: center;
    }

    .supplier-row-selects .right-block a svg {
        margin-right: 5px;
    }

    .boards-table {
        margin: 0px;
        width: 100%;
    }

    .boards-table-tr {
        display: table-row;
    }

    .boards-table-tr td {
        padding: 10px;
    }

    tbody td.boards-td {
        height: 80px !important;
        text-transform: none;
    }

    .fancybox__container {
        z-index: 100000;
    }
</style>