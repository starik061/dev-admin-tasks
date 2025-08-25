@foreach($documents as $document)
    @if($document->client_id)
        <div class="data-tr-global data-contract-item
        @if(in_array($document->status_id, [4, 5, 6, 7, 8])) bg-yellow
        @elseif($document->status_id == 3) bg-green
        @elseif($document->status_id == 9) bg-red
        @endif">

            <div class="values-initiate"
                 id="status-{{$document->id}}" data-client_id="{{$document->client_id}}"
                 data-type="{{$document->type}}" data-id="{{$document->id}}"
                 data-status="{{$document->status_id}}"
                 data-document_id="{{$document->id}}">

                <div class="act-tr pointer" id="act-item-{{$document->id}}">
                    <a href="{{ route('clients.view', ['id' => $document->client_id]) }}">
                        <div class="data-tr tr-action pointer">
                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{ $document->countNumber }}
                            </div>
                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{ $document->client_title }}
                            </div>
                            <div class="data-td custom-font-size">
                                {{$document->formated_title}}
                            </div>

                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{$document->conttragent_name}}
                            </div>

                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{ $document->manager_name }}
                            </div>

                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{$document->our_legal_person}}
                            </div>
                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{$document->formated_date}}
                            </div>
                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{$document->formated_created_at}}
                            </div>
                            <div class="data-td custom-font-size" id="date-{{$document->id}}">
                                {{$document->last_status_change_at}}
                            </div>

                            <div class="data-td  @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                            custom-status-changer
                         @endif"
                                 id="status-{{$document->id}}" data-client_id="{{$document->client_id}}"
                                 data-type="{{$document->type}}" data-id="{{$document->id}}"
                                 data-status="{{$document->status_id}}">
                                @if($document->status_id)
                                    <span class="status-info"
                                          style="background: {{$document->status->background}}; color: {{$document->status->color}};">&bull;{{ $document->status_name }}</span>
                                @endif
                            </div>
                            <div class="data-td custom-font-size" id="date-{{ $document->id }}">
                                {{ $document->trimmed_notes }}
                            </div>

                            <div class="data-td" data-type="{{$document->type}}"
                                 data-id="{{$document->id}}">
                        <span class="edit custom pointer" data-id="{{$document->id}}">
                              <svg fill="#FC6B40" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                   xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                   viewBox="0 0 30.727 30.727"
                                   xml:space="preserve" class="info-arrow">
                                <g class="info-arrow">
                                  <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                                    l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"
                                        class="info-arrow"/>
                                </g>
                              </svg>
                         </span>

                                <div class="@if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                            custom-notes-changer
                         @endif">
                            <span class="custom-edit pointer" data-id="{{$document->id}}">
                                <svg fill="#FC6B40" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                     viewBox="0 0 24 24" xml:space="preserve" class="info-arrow">
                                    <g class="info-arrow">
                                        <path d="M12,0C5.372,0,0,5.372,0,12s5.372,12,12,12s12-5.372,12-12S18.628,0,12,0z M17,13h-4v4c0,0.553-0.447,1-1,1
                                            s-1-0.447-1-1v-4H7c-0.553,0-1-0.447-1-1s0.447-1,1-1h4V7c0-0.553,0.447-1,1-1s1,0.447,1,1v4h4c0.553,0,1,0.447,1,1
                                            S17.553,13,17,13z"/>
                                    </g>
                                </svg>
                            </span>

                                </div>
                            </div>
                        </div>
                    </a>


                    <div class="row-inner-tabs" data-id="tabs-{{$document->id}}">
                        <div class="row-inner-tabs-nav">
                            <ul>
                                <li data-id="#t-{{$document->id}}-notes" class="active">@lang('message.note')</li>
                                <li data-id="#t-{{$document->id}}-logs">@lang('message.document_logs')</li>
                            </ul>
                        </div>

                        <div class="tabs-content">
                            <div class="tabs-item" id="t-{{$document->id}}-logs">
                                <div class="leads-selections">
                                    <div class="selection-item selection-head">
                                        <div class="selection-col">@lang('message.manager')</div>
                                        <div class="selection-col">@lang('message.updated_date')</div>
                                        <div class="selection-col">@lang('message.object_type')</div>
                                        <div class="selection-col">@lang('message.status_old')</div>
                                        <div class="selection-col">@lang('message.status_new')</div>
                                        <div class="selection-col">@lang('message.old_notes')</div>
                                        <div class="selection-col">@lang('message.new_notes')</div>

                                    </div>

                                    @foreach($document->getCombinedChanges() as $item)
                                        <div class="selection-item">
                                            <div class="selection-col">{{ $item['user'] }}</div>
                                            <div class="selection-col">{{ $item['created_at'] }}</div>
                                            <div class="selection-col">{{ $item['type'] }}</div>


                                            <div class="selection-col" id="selection_count_{{$document->id}}">
                                                @if($item['old_status'])
                                                    <span class="status-info"
                                                          style="background: {{$item['old_status_background']}}; color: {{$item['old_status_color']}};">
                                                    &bull;{{ $item['old_status'] }}
                                                </span>
                                                @endif

                                            </div>
                                            <div class="selection-col" id="selection_count_{{$document->id}}">
                                                @if($item['new_status'])
                                                    <span class="status-info"
                                                          style="background: {{$item['new_status_background']}}; color: {{$item['new_status_color']}};">&bull;{{ $item['new_status'] }}</span>
                                                @endif
                                            </div>

                                            <div class="selection-col">{{ $item['old_message'] }}</div>
                                            <div class="selection-col">{{ $item['new_message'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="tabs-item active" id="t-{{$document->id}}-notes">
                                <div class="leads-selections">
                                    <div class="selection-item selection-head">
                                        <div class="selection-col">@lang('message.manager')</div>
                                        <div class="selection-col">@lang('message.message')</div>
                                        <div class="selection-col">@lang('message.creation_date')
                                            / @lang('message.updated_date')</div>
                                    </div>

                                    @foreach($document->notes()->orderBy('created_at', 'desc')->get() as $note)
                                        @if($note->status_id !== 3)
                                            <div class="selection-item">
                                                <div class="selection-col">
                                                    @if($note->changes->first())
                                                        {{ $note->changes->first()->user->name }}
                                                    @endif
                                                </div>
                                                <div class="selection-col">
                                                    {{ $note->notes }}
                                                </div>
                                                <div class="selection-col">{{ $note->updated_at }}</div>
                                                <div class="icon-container" data-id="{{$note->id}}"
                                                     data-notes="{{$note->notes}}">
                                                    <!-- Edit Button -->
                                                    <div class="custom-status-notes-changer">
                                                    <span class="custom-edit pointer edit-note">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z"
                                                              stroke="#FC6B40" stroke-width="2" stroke-linecap="round"
                                                              stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                    </div>
                                                    <!-- Delete Button -->
                                                    <div class="note-delete">
                                                    <span class="custom-edit pointer delete-note"
                                                          data-id="{{ $note->id }}">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                                                              fill="#FC6B40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                                                              fill="#FC6B40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                                                              fill="#FC6B40"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                                                              fill="#FC6B40"/>
                                                    </svg>
                                                </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="@if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
            custom-notes-changer
         @endif">
                                        <span class="elegant-red-text">@lang('message.add_notes')</span>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach


<script>
    let x = null;
    document.notesChanger = {};
    document.notesStatusChanger = {};

    document.addEventListener('DOMContentLoaded', function () {
        const statusChangers = document.querySelectorAll('.custom-status-changer');

        statusChangers.forEach(function (statusChanger) {
            statusChanger.addEventListener('click', function () {
                x = this.getAttribute('data-client_id');
                runSecondScript();
            });
        });

        function runSecondScript() {
            document.statusChanger = {
                client_id: x
            };
        }
    });

</script>

<style>
    a.ajax-popup-link {
        text-decoration: none; /* Убираем подчеркивание */
        color: inherit; /* Наследуем цвет текста */
    }

    .custom-font-size {
        font-size: 13px;
    }

    .bg-yellow {
        background-color: rgba(255, 255, 0, 0.1);
    }

    .bg-green {
        background-color: rgba(0, 255, 0, 0.1);
    }

    .bg-red {
        background-color: rgba(227, 180, 180, 0.87);
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    a:hover,
    a:focus,
    a:active {
        color: inherit;
        text-decoration: none;
    }

    .row-inner-tabs {
        display: none;
        transition: all 0.3s ease-in-out;
    }

    .row-inner-tabs.visible {
        display: block;
    }

    .info-arrow.rotate {
        transform: rotate(180deg);
    }

    .custom-edit {
        cursor: pointer;
        /*position: absolute;
        top: 16px;
        right: 29px;*/
        display: inline-block;
        width: 30px;
        height: 30px;
        border: solid 1px #CDD4D9;
        border-radius: 4px;
        padding: 5px;
    }

    <!--
    Logs

    -->
    .leads-selections {
        width: 100%;
        border-collapse: collapse;
    }

    .selection-item, .selection-head {
        display: flex;
    }

    .selection-col {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc; /* Добавляет границы колонок */
        word-wrap: break-word; /* Разбивает длинные слова на несколько строк */
        word-break: break-all; /* Разрывает слова на любом символе, если они не умещаются */
        white-space: normal; /* Позволяет тексту переноситься на новую строку */
        overflow-wrap: break-word; /* Разбивает слова, если они не умещаются в контейнер */
    }


    .selection-head .selection-col {
        font-weight: bold;
        background-color: #f0f0f0;
    }

    .selection-item {
        border-bottom: 1px solid #ccc; /* Добавляет нижнюю границу для элементов */
    }

    .status-info {
        padding: 2px 4px;
        border-radius: 4px;
        display: inline-block;
    }

    .elegant-red-text {
        color: red;
        font-family: 'Arial', sans-serif;
        font-size: 11px;
        /* Additional styling for elegance */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        padding: 2px 4px;
        border-radius: 4px;
    }

    .selection-item {
        position: relative;
        padding-right: 50px;
    }

    .icon-container {
        position: absolute;
        left: 97%;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        gap: 5px;
    }

    .icon-container .custom-edit {
        cursor: pointer;
    }

</style>

