@include('add.head')
<body>
@include('add.header')
@include('add.menu')

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base">
                <a class="back" href="/manager/clients">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z"
                              fill="#FC6B40"/>
                    </svg>
                    @lang('message.back')
                </a>
            </div>
            <div class="container  container-base">
                @include('front.crm.clients.header')
                @include('front.crm.clients.inner-menu')
                <div class="client-tab-data-block">
                    <div class="clients-contacts-data">
                        <div class="data-table">
                            <div class="data-thead">
                                <div class="data-tr">
                                    <div class="data-td">№</div>
                                    <div class="data-td">@lang('message.date')</div>
                                    <div class="data-td">@lang('message.months')</div>
                                    <div class="data-td">@lang('message.status')</div>
                                    <div class="data-td action-col"></div>
                                </div>
                            </div>
                            <div class="data-tbody">
                                @if(count($layouts))
                                    @foreach($layouts as $layout)
                                        @if($layout)
                                            <div class="data-tr layout-tr" id="act-item-{{$layout->id}}">
                                                <div class="data-td td-number">
                                                    @lang('message.control_layout') №{{ $layout->number }}
                                                    @if ($layout->bill && $layout->bill->number)
                                                        @lang('message.bill_title') № {{ $layout->bill->number }}
                                                    @endif
                                                </div>

                                                <div class="data-td">
                                                    {{ date('d.m.Y', strtotime($layout->created_at)) }}
                                                </div>
                                                <div class="data-td">
                                                    @if($layout->months_list)
                                                        @foreach(json_decode($layout->months_list) as $month)
                                                            {{$month}},
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="data-td @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1) status-changer pointer @endif"
                                                     id="act_status-{{$layout->id}}" data-type="application_layout"
                                                     data-id="{{$layout->id}}"
                                                     data-status="{{$layout->status_id}}">
                                                    @if($layout->status_id)
                                                        <span class="status-info"
                                                              style="background: {{$layout->status->background}}; color: {{$layout->status->color}};">
                                                        &bull; {{ $layout->status->getTranslatedAttribute('name', App::getLocale(), 'ru') }}
                                                            {{$layout->status->id == 3 ? $layout->status->applicationSentBy($layout->id, true) : '' }}
                                                    </span>
                                                    @endif
                                                </div>


                                                <div class="data-td action-col align-right">
                                                    <a href="#" class="more-action" style="margin-right: 12px">
                                                        <svg width="4" height="14" viewBox="0 0 4 14" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg" class="for-js">
                                                            <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                                                                  fill="#3D445C" class="for-js"/>
                                                        </svg>
                                                    </a>
                                                    <div class="sub-action hide" id="sub-action-{{$layout->id}}">

                                                        <a href="/manager/clients/{{$client->id}}/contracts/{{$layout->contract_id}}/acts/{{$layout->id}}/actLogs?logsFirst=true&layout=true"
                                                           class="ajax-popup-link"
                                                           id="act-view-{{$layout->id}}">@lang('message.status_logs')</a>

                                                        @if($layout->file)
                                                            <a href="{{ asset('storage/' . $layout->file) }}" download>
                                                                @lang('message.download')
                                                            </a>
                                                            @if($layout->file_id)
                                                                <a class="pointer view-contract"
                                                                   href="https://drive.google.com/file/d/{{$layout->file_id}}/view"
                                                                   target="_blank">@lang('message.view_file')</a>

                                                                <a class="pointer edit-contract"
                                                                   data-id="{{$layout->file_id}}"
                                                                   data-title="{{$file_name}}">@lang('message.edit_file')</a>

                                                                <a href="{{route('act-layout.download', ['id' => $client->id, 'contract_id' => $layout->contract_id, 'layout_id' => $layout->id, 'file_id' => $layout->file_id])}}"
                                                                   download>@lang('message.download_application')</a>
                                                                <a href="{{route('act-layout.download', ['id' => $client->id, 'contract_id' => $layout->contract_id, 'layout_id' => $layout->id, 'file_id' => $layout->file_id])}}?pdf=true"
                                                                   download>@lang('message.download_application')
                                                                    (PDF)</a>
                                                            @endif
                                                        @endif


                                                        @if(Auth::user()->role_id != 5 || Auth::user()->id == 248)
                                                            <a class="act-delete pointer" data-act_id="{{$layout->id}}" data-contract_id="{{$layout->contract_id}}"
                                                               data-client_id="{{$client->id}}"
                                                               href="/manager/clients/{{$client->id}}/contracts/{{$layout->contract_id}}/acts/{{$layout->id}}/delete?layout=true">
                                                                @lang('message.delete_control_layout')
                                                            </a>
                                                        @endif

                                                    </div>
                                                    <a href="/manager/clients/{{$client->id}}/contracts/{{$layout->contract_id}}/acts/{{$layout->id}}/actLogs?layout=true"
                                                       class="custom-ajax-popup-link">
                                                        <div class="pointer" style="position: relative; margin-right: 35px">
                                                            <svg width="24" height="24" viewBox="0 0 24 20" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2 2H22V16H5.17L2 19.17V2ZM20 4H4V14L5.17 12.83H20V4Z"
                                                                      fill="#FF7F00"/>
                                                            </svg>
                                                            <span style="position: absolute; top: -10px; right: -10px; background-color: #FF7F00; color: white; border-radius: 50%; padding: 2px 5px; font-size: 12px;">
                                                                {{$layout->notes->count()}}
                                                            </span>
                                                        </div>
                                                    </a>

                                                    @if($layout->images->count())
                                                        <div class="pointer text-center custom-bubble-image-container layout-image"
                                                             data-image-path="{{ asset('storage/' . $layout->image) }}"
                                                             data-images="{{ $layout->images->pluck('image')->map(function ($img) {
                                                                    return asset('storage/' . $img);
                                                                })->toJson() }}">
                                                            <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-img="">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="data-tr">
                                        <div class="data-td" colspan="5">Документы не найдены</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="status-popup" style="height: 350px">
    <div class='status-header'>
        <span>@lang('message.change_status')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
              fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="status-form">
        <form class="status-form-change" id="status-change">
            <input type="hidden" name="client_id" value="{{$client->id}}"/>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.status')</label>
                    <select class="status-select" name="status" id="status-select">
                        @foreach($statuses as $value)
                            @if(($value->id == 2 && Auth::user()->role_id == 2) || ($value->id == 3 && in_array(Auth::user()->role_id, [1, 5])) || ($value->id != 2 && $value->id != 3))
                                <option value="{{$value->id}}" data-color="{{$value->color}}"
                                        data-background="{{$value->background}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="input-block">
                        <label for="note">@lang('message.note')</label>
                        <textarea class="status-note-textarea" name="note" id="note" style="width: 100%"
                                  placeholder="@lang('message.enter_note')"></textarea>
                    </div>
                </div>
            </div>
            <div class="buttons-block">
                <button class="crm-button">@lang('message.save')</button>
                <div class="lds-ellipsis2 hide">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </form>
    </div>
</div>


@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
@include('front.crm.scripts')

<script>
    document.statusChanger = {
        client_id: {{$client->id}}
    };
</script>

<script src="/assets/js/slick/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/assets/js/mp/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
<script src="/assets/js/datepicker.min.js"></script>
<script src="/assets/js/crm.js?t=20221102-1"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.addEventListener('click', function (event) {
            const clickedElement = event.target;

            const logsContainer = document.querySelector('.boards-table-tbody');

            // Клик на Информация
            if (clickedElement.classList.contains('custom-popup-info')) {
                let x = document.querySelector('.custom-popup-notes');
                x.classList.remove('active');
                clickedElement.classList.add('active');

                document.querySelector('.custom-notes-popup').classList.add('hide');
                document.querySelector('.info-popup').classList.remove('hide');

                // Клик на История
            } else if (clickedElement.classList.contains('custom-popup-notes')) {
                let y = document.querySelector('.custom-popup-info');
                y.classList.remove('active');
                clickedElement.classList.add('active');

                document.querySelector('.info-popup').classList.add('hide');
                document.querySelector('.custom-notes-popup').classList.remove('hide');
            }
        });
    });

</script>

