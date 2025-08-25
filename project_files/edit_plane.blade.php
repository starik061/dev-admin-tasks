@include('add.head')

<body>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd1TsMsTvyGwZE5US7kA-xEKTs24z2yXU&language=ru&libraries=places,drawing"></script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
<link rel="stylesheet"
      as="style"
      href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@include('add.header')
@include('add.menu')
<!-- BOARD (START) -->
@include('add.bread')
@php
    $additionClass = '';

    if($currentUser->id == 263){
        $additionClass = 'hide';
    }
@endphp
<style>
    .location{
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .add-related{
        height: 45px;
        line-height: 29px;
        border: 1px solid #dee5ec;
    }
    .related-board-item{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 5px;
    }
    .delete-related{
        display: inline-block;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border: solid 1px #CDD4D9;
        border-radius: 4px;
        padding: 5px;
        position: relative;
    }
    .hide {
        display: none !important;
    }

    @if($additionClass === 'hide')
    #place-search {
        display: none !important;
    }

    @endif
    .direction-wrapper {
        width: 100%;
        padding: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dir {
        width: 30px;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .dir input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .dir input[type="checkbox"]:checked ~ svg {
        fill: #f76a47;
        transition: all .3s ease;
        /* background:#f76a47; */
    }

    .dir svg {
        pointer-events: none;
        fill: #8a8a8a;
        transition: all .3s ease;
        /* margin-bottom: 12px; */
    }

    .dir.up svg {
        transform: rotate(-90deg)
    }

    .dir.up-right svg {
        transform: rotate(-45deg)
    }

    .dir.down-right svg {
        transform: rotate(45deg)
    }

    .dir.down svg {
        transform: rotate(90deg)
    }

    .dir.down-left svg {
        transform: rotate(125deg)
    }

    .dir.left svg {
        transform: rotate(180deg)
    }

    .dir.up-left svg {
        transform: rotate(225deg)
    }

    .deleteButton {
        display: inline-block;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border: solid 1px #CDD4D9;
        border-radius: 4px;
        padding: 5px;
        position: relative;
        float: right;
    }

    .global-loader {
        color: #FC6B40;
        font-size: 10px;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        position: fixed;
        left: 35px;
        top: 35px;
        z-index: 101111;
        text-indent: -9999em;
        animation: mulShdSpin 1.3s infinite linear;
        transform: translateZ(0);
    }

    @keyframes mulShdSpin {
        0%,
        100% {
            box-shadow: 0 -3em 0 0.2em,
            2em -2em 0 0em, 3em 0 0 -1em,
            2em 2em 0 -1em, 0 3em 0 -1em,
            -2em 2em 0 -1em, -3em 0 0 -1em,
            -2em -2em 0 0;
        }
        12.5% {
            box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em,
            3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em,
            -2em 2em 0 -1em, -3em 0 0 -1em,
            -2em -2em 0 -1em;
        }
        25% {
            box-shadow: 0 -3em 0 -0.5em,
            2em -2em 0 0, 3em 0 0 0.2em,
            2em 2em 0 0, 0 3em 0 -1em,
            -2em 2em 0 -1em, -3em 0 0 -1em,
            -2em -2em 0 -1em;
        }
        37.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
            3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em,
            -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        50% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
            3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em,
            -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        62.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
            3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0,
            -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
        }
        75% {
            box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em,
            3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em,
            -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
        }
        87.5% {
            box-shadow: 0em -3em 0 0, 2em -2em 0 -1em,
            3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em,
            -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
        }
    }

    .upd_info {
        padding: 10px;
        background: #99ff99;
        width: 100%;
        margin-top: 17px;
    }
    .disassemble-button{
        border: solid 1px #CDD4D9;
        padding: 5px;
        display: inline-block;
        margin-top: 13px;
        cursor: pointer;
    }
</style>
<section id="board-detail" {{--itemscope itemtype="http://schema.org/Product"--}}>
    <div class="container-fluid container-fluid-base container-fluid-board-detail">
        <div class="row no-gutters">
            <div class="container container-base container-board-detail">
                <div class="row no-gutters" style="position:relative;" id="editor-block">
                    @if($upd)
                        <div class="upd_info">
                            {{$upd}}
                        </div>
                    @endif
                    <div class="buy-section info-price-board">
                        <div class="location">
                            <h1 class="info">@lang('message.editing'): {{ $board->id }} - {{ $board->addr }}</h1>
                            <span class="disassemble-button" data-id="{{$board->id}}">
                                <img src="/assets/img/icons/disassemble.png" title="Демонтировать"/>
                            </span>
                        </div>
                    </div>
                    <form method="POST" enctype="multipart/form-data" style="width: 100%;" id="board-edit-form"
                          action="/edit/{{$board->id}}">
                        <input type="hidden" name="action" value="save"/>
                        <input type="hidden" name="ajax" value="1"/>
                        <input name="map_search" placeholder="Поиск..." id="place-search"/>
                        <div id="map-edit" class="{{$additionClass}}" style="height: 500px;"></div>
                        <div class="board-data-container ">
                            <div class="{{$additionClass}}">
                                @lang('message.Latitude'): <input type='text' name='x' value='{{$board->x}}'/>
                                @lang('message.Longitude'): <input type='text' name='y' value='{{$board->y}}'/>
                                <input type='hidden' name='lat' value='{{$board->x}}'/>
                                <input type='hidden' name='lng' value='{{$board->y}}'/>

                                <span class="coords-editor{{$additionClass}}">
                                    @if($boards->coords_by_site)
                                        @lang('message.by_user')
                                    @else
                                        @if($board->link)
                                            Outdoor
                                        @else
                                            @if($firm->coords_in_file)
                                                Из файла
                                            @else
                                                @if($firm->adv_link)
                                                    ADV
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </span>
                            </div>
                            <div class="direction-wrapper {{$additionClass}}">
                                <div class="dir up">
                                    <input type="checkbox" name="direction[]" value="up"
                                           @if(in_array("up",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir up-right">
                                    <input type="checkbox" name="direction[]" value="up-right"
                                           @if(in_array("up-right",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir right">
                                    <input type="checkbox" name="direction[]" value="right"
                                           @if(in_array("right",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir down-right">
                                    <input type="checkbox" name="direction[]" value="down-right"
                                           @if(in_array("down-right",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir down">
                                    <input type="checkbox" name="direction[]" value="down"
                                           @if(in_array("down",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir down-left">
                                    <input type="checkbox" name="direction[]" value="down-left"
                                           @if(in_array("down-left",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir left">

                                    <input type="checkbox" name="direction[]" value="left"
                                           @if(in_array("left",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                                <div class="dir up-left">
                                    <input type="checkbox" name="direction[]" value="up-left"
                                           @if(in_array("up-left",$board->direction)) checked @endif>
                                    <svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
                                        <polygon
                                                points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056"/>
                                    </svg>

                                </div>
                            </div>


                            <div class="p-t-b">
                                @php
                                    $edited = $board->updated_by_user_date;
                                    if($edited){
                                        $edited = date("d.m.Y H:i:s", strtotime($edited));
                                    }
                                @endphp
                                        <!-- property-this-board-->
                                <p class="p-h">@lang('message.parametrs') @if($board->updated_by_user)
                                        <span style="color: #f76a47;">( @lang('message.edited_by_user') {{ ($edited) ? '- '.$edited : ''}} )</span>
                                    @endif</p>
                                <!-- property-header-->
                                <div class="p-t">
                                    <!-- property-table-->
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.plane_code2')</div>
                                        <div class="p-t__td">
                                            <p>{{ $board->id }}</p>
                                        </div>
                                    </div>
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.firm_code')</div>
                                        <div class="p-t__td">
                                            <p>{{ $board->firm_name }} - {{$board->code}}</p>
                                        </div>
                                    </div>
                                    <div class="p-t__tr {{$additionClass}}">
                                        <div class="p-t__td">Активна</div>
                                        <div class="p-t__td">
                                            <select name="active">
                                                <option value="{{App\Helpers\BoardConstants::ACTIVE}}"
                                                        @if($board->active == App\Helpers\BoardConstants::ACTIVE) selected @endif>
                                                    @lang('message.yes')
                                                </option>
                                                <option value="{{App\Helpers\BoardConstants::INACTIVE}}"
                                                        @if($board->active == App\Helpers\BoardConstants::INACTIVE) selected @endif>
                                                    @lang('message.no')
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-t__tr {{$additionClass}}">
                                        <div class="p-t__td">@lang('message.type')</div>
                                        <div class="p-t__td">
                                            <select name="type" style="width: 100%;">
                                                @foreach($type as $k => $v)
                                                    <option value="{{$v->type}}"
                                                            @if($v->type == $board->type) selected @endif >{{$v->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.side')</div>
                                        <div class="p-t__td">
                                            {{--<input type="text" name="side_type" value="{{$board->side_type}}" style="width: 100%;"/>--}}
                                            {{--$board->side_type--}}
                                            <select name="side_type" style="width: 100%;">
                                                @foreach($sides as $k => $v)
                                                    <option value="{{$v}}"
                                                            @if($v == $board->side_type) selected @endif >{{$v}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.light')</div>
                                        <div class="p-t__td">
                                            @php
                                                //var_dump($board->light);
                                            @endphp
                                            <select name="light" style="width: 100%;">
                                                <option value="{{App\Helpers\BoardConstants::LIGHT_ON}}"
                                                        @if($board->light === App\Helpers\BoardConstants::LIGHT_ON) selected="selected" @endif >
                                                    @lang('message.yes')
                                                </option>
                                                <option value="{{App\Helpers\BoardConstants::LIGHT_OFF}}"
                                                        @if($board->light === App\Helpers\BoardConstants::LIGHT_OFF) selected="selected" @endif >
                                                    @lang('message.no')
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.city')</div>
                                        <div class="p-t__td">
                                            <select name="city" style="width: 100%;">
                                                @foreach($cities as $k => $v)
                                                    <option value="{{$v->id}}"
                                                            @if($v->id == $board->city) selected @endif >{{$v->name_ua}}{{$v->region ? "     ({$v->regions->name})" : ''}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.address') RU</div>
                                        <div class="p-t__td">
                                            <input type="text" name="addr"
                                                   value="{{$board->addr}}"
                                                   requeired
                                                   style="width: 100%;"/>
                                        </div>
                                    </div>
                                    {{--@if(Auth::user()->id == 202)--}}
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.address') UA</div>
                                        <div class="p-t__td">
                                            <input type="text" name="addr_ua" value="{{$board->addr_ua}}"
                                                   style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="p-t__tr">
                                        <div class="p-t__td">@lang('message.address') EN</div>
                                        <div class="p-t__td">
                                            <input type="text" name="addr_en" value="{{$board->addr_en}}"
                                                   style="width: 100%;"/>
                                        </div>
                                    </div>
                                    {{--@endif--}}

                                    <div class="p-t__tr {{$additionClass}}">
                                        <div class="p-t__td">@lang('message.gid')</div>
                                        <div class="p-t__td">
                                            <textarea name="guide" style="width: 100%;">{{$board->guide}}</textarea>
                                        </div>
                                    </div>

                                    <div class="p-t__tr {{$additionClass}}">
                                        <div class="p-t__td">@lang('message.price')</div>
                                        <div class="p-t__td">
                                            <input type="text" name="price" value="{{$board->price}}"
                                                   style="width: 100%;"/>
                                        </div>
                                    </div>
                                    <div class="p-t__tr {{$additionClass}}">
                                        <div class="p-t__td">@lang('message.photo')</div>
                                        <div class="p-t__td">

                                            <div class="d-flex align-items-center">
                                                <div>
                                                    @if($board->image)
                                                        <a id="EditPhotoUrlHref" class="img_image"
                                                           href="/upload/{{$board->image}}" target="_blank"><img
                                                                    id="EditPhotoContentSrc"
                                                                    src="/upload/{{$board->image}}" height="30"/></a>
                                                    @endif
                                                    <input type="file" name="image"/>
                                                </div>
                                                <div class="ml-2">
                                                    <button class="btn btn-primary btn-full-width-sm font-size-default popup13-open"
                                                            id="EditPhotoBtn" data-rel="photo-apply"
                                                            data-code="{{ $board->id }}">Редактировать фото
                                                    </button>
                                                </div>
                                                <div style="flex: 2">
                                                    @if($board->image)
                                                        <input type="hidden" name="delete_image">
                                                        <span class="deleteButton" data-img="img_image">
                                                          <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                               xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                                                                      fill="#FC6B40"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                                                                      fill="#FC6B40"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                                                                      fill="#FC6B40"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                      d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                                                                      fill="#FC6B40"></path>
                                                              </svg>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="p-t__tr {{$additionClass}}">
                                        <div class="p-t__td">@lang('message.scheme')</div>
                                        <div class="p-t__td">
                                            @if($board->scheme)
                                                <a href="/upload/{{$board->scheme}}"
                                                   target="_blank"
                                                   class="img_scheme"><img
                                                            src="/upload/{{$board->scheme}}"
                                                            height="30"/></a>
                                            @endif
                                            <input type="file" name="scheme"/>
                                            @if($board->scheme)
                                                <input type="hidden" name="delete_scheme">
                                                <span class="deleteButton" data-img="img_scheme">
                                                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                       xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                                                          fill="#FC6B40"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                                                          fill="#FC6B40"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                                                          fill="#FC6B40"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                                                          fill="#FC6B40"></path>
                                                  </svg>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-t__tr {{ $additionClass }}">
                                        <div class="p-t__td">@lang('message.employment')</div>
                                        <div class="p-t__td">
                                            @php
                                                $employment = json_decode($employment, true);
                                                $options = [
                                                    '-' => "-",
                                                    'busy' => __('message.busy'),
                                                    'free' => __('message.free'),
                                                    'reserve' => __('message.reserve'),
                                                ];

                                                $cleanedEmployment = [];
                                                foreach ($employment as $key => $value) {
                                                    $newKey = str_replace('-', '', $key);
                                                    $cleanedEmployment[$newKey] = $value;
                                                }
                                            @endphp
                                            <table>
                                                <tr>
                                                    {{-- First row: Dates in Ym format --}}
                                                    @php
                                                        $start = new DateTime(); // Starting month
                                                        $months = [];
                                                    @endphp

                                                    @for ($i = 0; $i < 12; $i++)
                                                        @php
                                                            $ym = $start->format('Ym');
                                                            $displayedYm = $start->format('m.Y');
                                                            $months[] = $ym; // Save for second row
                                                        @endphp
                                                        <th>{{ $displayedYm }}</th>
                                                        @php $start->modify('+1 month'); @endphp
                                                    @endfor
                                                </tr>

                                                <tr>
                                                    {{-- Second row: Selects --}}
                                                    @foreach ($months as $ym)
                                                        <td>
                                                            <select name="employment[{{ $ym }}]">
                                                                @foreach ($options as $value => $label)
                                                                    <option value="{{ $value }}" {{ (isset($cleanedEmployment[$ym]) && $cleanedEmployment[$ym] == $value) ? 'selected' : '' }}>
                                                                        {{ $label }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="related-boards-list p-t__tr">
                                        <div class="p-t__td">@lang('message.related_boards')</div>
                                        <div class="p-t__td">
                                            @if($relatedBoards)
                                                @foreach($relatedBoards as $related)
                                                    <div class="related-board-item">
                                                        <input type="hidden" name="related[]" value="{{env('APP_URL') . '/' . $related->aleas}}"/>
                                                        <a href="/{{$related->aleas}}" target="_blank">
                                                            {{$related->id}} {{$related->addr}}
                                                        </a>
                                                        <span class="delete-related">
                                                          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                                                              </svg>
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <span class="add-related btn pointer">
                                                @lang('message.add_related_boards')
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
                            <div style="text-align: right;">
                                <a href="/{{$board->aleas}}" class="btn btn-style-cancel"
                                   style="padding: 1px 36px;">@lang('message.cancel')</a>
                                <input type="submit"
                                       value="@lang('message.save')"
                                       class="btn btn-style"
                                       style="padding: 1px 36px;"/>
                            </div>

                        </div>
                    </form>

                    <style>
                        .btn-style-cancel {
                            height: 45px;
                            line-height: 41px;
                            border: 1px solid #dee5ec
                        }

                        [name=map_search] {
                            height: 40px;
                            width: 400px;
                            margin-top: 10px;
                        }
                    </style>


                </div>
            </div>
        </div>
    </div>
</section>

<div class="popup13-wrapper">
    <div class="popup13-conteiner size-a" data-rel="photo-apply">
        <div class="popup13-overlay popup13-overlay-js"></div>
        <div class="popup13-content">
            <div class="popup13-close popup13-close-js"><span></span><span></span></div>
            <div id="photoEditor" data-bg="/upload/{{$board->image}}">
                <div>
                    <div class="canvas-container photo-editor__canvas-container">
                        <canvas id="canvas" width="1200" height="701"></canvas>
                    </div>
                </div>
                <label class="mt-4 font-size-default d-block d-lg-flex justify-content-start align-items-center mb-4">
                    <span class="mr-3 mb-2 mb-lg-0 d-block">Загрузить превью (уменьшенную копию) макета</span>
                    <input id="storyFile" type="file" class="form-control form-control-file">
                </label>
                <label class="font-size-default d-block d-lg-flex justify-content-start align-items-center">
                    <span class="mr-3 mb-2 mb-lg-0 d-block">Илиуказать url превью макета</span>
                    <input id="storyUrl" type="text"
                           class="form-element form-element-text-input form-control font-size-default">
                </label>
                <input type="hidden" name="photoDataUrl" value="" id="photoDataUrl">
                <div id="canvasImages" class="resource-advertise-img-wrapper d-grid gap-3 pt-4 pb-4"></div>
                <div class="d-flex">
                    <input id="clearCanvas" type="button" value="Очистить"
                           class="btn btn-black btn-full-width-sm font-size-default mr-3">
                    <!-- <a id="saveCanvas" href="javascript: void(0)" class="btn btn-primary btn-full-width-sm font-size-default">Сохранить</a> -->
                    <button id="updateCanvas" class="btn btn-primary btn-full-width-sm font-size-default btn-loader">
                       <span class="btn-loading-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" style="margin:auto;display:block" width="20"
                                height="20" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50"
                                                                                                         fill="none"
                                                                                                         stroke="#fff"
                                                                                                         stroke-width="10"
                                                                                                         r="35"
                                                                                                         stroke-dasharray="164.93361431346415 56.97787143782138"><animateTransform
                                           attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s"
                                           values="0 50 50;360 50 50" keyTimes="0;1"/></circle></svg>
                       </span>
                        <span class="btn-loading-text">
                           Сохранить
                       </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BOARD (END) -->
<script type="text/javascript">
    //48.2485445,26.692236
    var center = [{{$board->x}}, {{$board->y}}];
    @if($board->x == 0 && $board->y == 0)
    //center = [ 48.808278799236525, 31.822851234374987 ];
    center = [0, 0];
    @endif
    let coords = center;
    let board_exist = true;
    let board_data = {!!$board->toJSON()!!}

        position = {lat: parseFloat(center[0]), lng: parseFloat(center[1])};

    function GmapEdit() {
        console.log("run");
        var zoom = 10;
        @if($board->x == 0 && $board->y == 0)
            zoom = 6;
        @endif
        /*if{{$board->x}} === 0 && {{$board->y}} === 0){
            zoom = 1
            console.log(zoom);
        }*/
        window.EGmap = new google.maps.Map(document.getElementById('map-edit'), {
            zoom: zoom,
            maxZoom: 20,
            center: position
        });

        const input = document.getElementById("place-search");
        const searchBox = new google.maps.places.SearchBox(input);
        window.EGmap.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        window.EGmap.addListener("bounds_changed", () => {
            searchBox.setBounds(window.EGmap.getBounds());
        });


        switch (board_data.type) {
            case 'board':
            case 'prism':
            case 'backlight':
            case 'citylight':
            case 'pillar':
            case 'custom':
            case 'firewall':
            case 'banner':
            case 'scroler':
            case 'elite_panel':
            case 'videoboard':
                //img = '/images/markers/'+board_data.type+'.png';
                img = '/assets/img/map_marks/' + board_data.type + '.svg';
                break;
            default:
                img = '/images/markers/board.png';
                break;
        }
        //console.log(img);
        //console.log(window.EGmap);
        if (board_data.x && board_data.y) {
            marker = new google.maps.Marker({
                position: position,
                map: window.EGmap,
                icon: img,
                draggable: true
            });
            document.myMarker = marker;
            document.myMarker.infowin = new google.maps.InfoWindow({
                content: '<div class="mark-del">Удалить</div>'
            });
            document.myMarker.addListener('drag', function (event) {
                coords[0] = event.latLng.lat();
                coords[1] = event.latLng.lng();
                $('[name=x]').val(coords[0]);
                $('[name=y]').val(coords[1]);

            });
            document.myMarker.addListener('click', function () {
                this.infowin.open(this.map, this);
            });
            //console.log("mymarker");
        }
        //console.log(document.myMarker);
        window.EGmap.addListener('click', function (e) {
            if (document.myMarker) {
                document.myMarker.setPosition(e.latLng);
                coords[0] = e.latLng.lat();
                coords[1] = e.latLng.lng();
            } else {
                coords[0] = e.latLng.lat();
                coords[1] = e.latLng.lng();
                marker = new google.maps.Marker({
                    map: window.EGmap,
                    icon: img,
                    draggable: true
                });
                document.myMarker = marker;
                document.myMarker.setPosition(e.latLng);
                document.myMarker.infowin = new google.maps.InfoWindow({
                    content: '<div class="mark-del">Удалить</div>'
                });
                document.myMarker.addListener('drag', function (event) {
                    coords[0] = event.latLng.lat();
                    coords[1] = event.latLng.lng();
                    $('[name=x]').val(coords[0]);
                    $('[name=y]').val(coords[1]);
                });
                document.myMarker.addListener('click', function () {
                    this.infowin.open(this.map, this);
                });
            }
        });

        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();

            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                //console.log(place);

                const icon = {
                    url: place.icon,//'/assets/img/marker-new.png',
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };
                console.log(place.geometry.location);
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    EGmap,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                }));
                console.log(markers);
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            window.EGmap.fitBounds(bounds);
            markers.forEach((m) => {
                m.setMap(EGmap);
            });
        });
    }

</script>
@include('add.footer')
<script>
    (function ($) {
        $.fn.serializeFiles = function () {
            var form = $(this),
                formData = new FormData(),
                formParams = form.serializeArray();

            $.each(form.find('input[type="file"]'), function (i, tag) {
                $.each($(tag)[0].files, function (i, file) {
                    formData.append(tag.name, file);
                });
            });

            $.each(formParams, function (i, val) {
                formData.append(val.name, val.value);
            });

            return formData;
        };
    })(jQuery);
    $(document).ready(function () {
        $(document).on('click', '.deleteButton', function () {
            if (confirm('Вы хотите удалить это изображение?')) {
                $('.' + $(this).data('img')).remove();
                $('[name=delete_' + $(this).data('img').split('_')[1] + ']').val('1');
            }
        }).on('submit', '#board-edit-form', function (e) {
            $('body').append('<div class="global-loader"></div>')
            $('.upd_info').remove();
            e.preventDefault();
            $('[name=x]').val(coords[0]);
            $('[name=y]').val(coords[1]);
            //let formData = $('#board-edit-form').serialize();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $('#board-edit-form').serializeFiles(),
                contentType: false,
                processData: false,
                success: function (response) {
                    toastr.success("Данные рекламной конструкции сохранены", "Успешно")
                    $('[name=image]').val('');
                    $('[name=scheme]').val('');
                    if (response.image) {
                        if (!$('.img_image img').length) {
                            $('[name=image]').parent().prepend(`<a href="/upload/${response.image}" target="_blank" class="img_image"><img src="/upload/${response.image}" height="30"/></a>`);
                        } else {
                            $('.img_image img').attr('src', '/upload/' + response.image);
                        }
                    }
                    if (response.scheme) {
                        if (!$('.img_scheme img').length) {
                            $('[name=scheme]').parent().prepend(`<a href="/upload/${response.scheme}" target="_blank" class="img_scheme"><img src="/upload/${response.scheme}" height="30"/></a>`);
                        } else {
                            $('.img_scheme img').attr('src', '/upload/' + response.image);
                        }
                    }
                    $('.global-loader').remove();
                    $('#editor-block').prepend(`<div class="upd_info">Данные рекламной конструкции сохранены</div>`)
                    window.scrollTo(0, 0);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.error("Попробуйте снова снова через какое-то время или обратитесь к администратору", "Ошибка обработки данных")
                    $('.global-loader').remove();
                }
            })
        }).on('change', '[name="type"]', function () {
            let directions = getDirection();
            document.myMarker.setIcon('/assets/img/map_marks/' + $(this).val() + (directions ? '__' + directions : '') + '.svg');
        }).on('change', '[name="direction[]"]', function () {
            let directions = getDirection();
            document.myMarker.setIcon('/assets/img/map_marks/' + $('[name="type"]').val() + (directions ? '__' + directions : '') + '.svg');
        }).on('click', '.delete-related', function (){
            if (confirm('Вы хотите удалить связь между этими плоскостями?')) {
                $(this).closest('.related-board-item').remove();
            }
        }).on('click', '.add-related', function(){
            $(this).before(`
                <div class="related-board-item">
                    URL плоскости:
                    <input name="related[]" value="" style="width:700px"/>
                    <span class="delete-related">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                        </svg>
                    </span>
                </div>
            `);
        }).on('click', '.disassemble-button',  function(){
            if(confirm('Демонтировать данную рекламную конструкцию?')){
                $.ajax({
                    url: '/board/'+$(this).data('id')+'/disassemble',
                    type: "post",
                    processData: false,
                    success: function(data){
                        $('input, select').prop('disabled', true);
                        $('.related-boards-list').remove();
                        $('[type=submit]').remove();
                        $('.btn.btn-style-cancel').remove();
                        toastr.success('Плоскость демонтирована');
                    },
                    error: suppliersBillsResponseError
                })
            }
        });
    })
    const getDirection = () => {
        let directions = [];
        $('[name="direction[]"]:checked').each(function () {
            directions.push($(this).val());
        })

        return directions.join('_');
    }
    setTimeout(function () {
        let directions = getDirection();
        document.myMarker.setIcon('/assets/img/map_marks/' + $('[name="type"]').val() + (directions ? '__' + directions : '') + '.svg');
    }, 4000)
    @if($board->r301)
        $('input, select').prop('disabled', true);
        $('.related-boards-list').remove();
        $('[type=submit]').remove();
        $('.btn.btn-style-cancel').remove();
    @endif
</script>
