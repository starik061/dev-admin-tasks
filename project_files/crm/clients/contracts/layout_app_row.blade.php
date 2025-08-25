<div class="data-tr act-tr pointer" id="act-item-{{$act->id}}">
    <div class="data-td td-number">
        @lang('message.control_layout') №{{ $act->number }}

        @if ($act->bill && $act->bill->number)
            @lang('message.bill_title') № {{ $act->bill->number }}
        @endif
    </div>

    <div class="data-td">
        {{ date('d.m.Y', strtotime($act->created_at)) }}
    </div>
    <div class="data-td">
        @if($act->months_list)
            @foreach(json_decode($act->months_list) as $month)
                {{$month}},
            @endforeach
        @endif
    </div>
    <div class="data-td">
    </div>
    <div class="data-td">
    </div>
    <div class="data-td @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                            status-changer
                         @endif"
         id="act_status-{{$act->id}}" data-type="application_layout" data-id="{{$act->id}}"
         data-status="{{$act->status_id}}">
        @if($act->status_id)
            <span class="status-info" style="background: {{$act->status->background}}; color: {{$act->status->color}};">&bull; {{ $act->status->getTranslatedAttribute('name', App::getLocale(), 'ru') }} {{$act->status->id == 3 ? $act->status->applicationSentBy($act->id, true) : '' }}</span>
        @endif
    </div>
    <div class="data-td action-col align-right">
        <a href="#" class="more-action">
            <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="for-js">
                <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                      fill="#3D445C" class="for-js"/>
            </svg>
        </a>
        <div class="sub-action hide" id="sub-action-{{$contract->client_id}}-{{$contract->id}}-{{$act->id}}">
            <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/actLogs?logsFirst=true&layout=true"
               class="ajax-popup-link" id="act-view-{{$act->id}}">@lang('message.status_logs')</a>
            @if($act->file)
                @if($act->file_id)
                    <a class="pointer view-contract" href="https://drive.google.com/file/d/{{$act->file_id}}/view"
                       target="_blank">@lang('message.view_file')</a>

                    @if($act->status_id != 3 || in_array(Auth::user()->role_id, [1, 2]))
                        <a class="pointer edit-contract" data-id="{{$act->file_id}}" data-title="{{$file_name}}">
                            @lang('message.edit_file')
                        </a>
                    @endif

                    <a href="{{route('act-layout.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'layout_id' => $act->id, 'file_id' => $act->file_id])}}"
                       download>@lang('message.download_application')</a>
                    <a href="{{route('act-layout.download', ['id' => $contract->client_id, 'contract_id' => $contract->id, 'layout_id' => $act->id, 'file_id' => $act->file_id])}}?pdf=true"
                       download>@lang('message.download_application') (PDF)</a>
                @endif
            @endif
            @if($act->status_id != 3 || in_array(Auth::user()->role_id, [1, 2]))
                <a class="act-delete pointer" data-act_id="{{$act->id}}" data-contract_id="{{$act->contract_id}}"
                   data-client_id="{{$contract->client_id}}"
                   href="/manager/clients/{{$client->id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/delete?layout=true">
                    @lang('message.delete_control_layout')
                </a>
            @endif
        </div>
        <div class="data-td action-col" style="left: 18%">
            <a href="/manager/clients/{{$contract->client_id}}/contracts/{{$contract->id}}/acts/{{$act->id}}/actLogs?layout=true"
               class="custom-ajax-popup-link" style="position: absolute; right: 67%;">
                <div style="position: relative;">
                    <svg width="24" height="24" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2H22V16H5.17L2 19.17V2ZM20 4H4V14L5.17 12.83H20V4Z" fill="#FF7F00"/>
                    </svg>
                    <span style="position: absolute; top: -10px; right: -10px; background-color: #FF7F00; color: white; border-radius: 50%; padding: 2px 5px; font-size: 12px;">
                    {{$act->notes->count()}}
                </span>
                </div>
            </a>


            @if($act->images->count() || $act->image)
                <div class="text-center custom-bubble-image-container layout-image"
                     data-image-path="{{ asset('storage/' . $act->image) }}"
                     data-images="{{ $act->images->count() ?
                            $act->images->pluck('image')->map(function ($img) {
                                return asset('storage/' . $img);
                            })->toJson()
                            : json_encode([asset('storage/' . $act->image)]) }}">
                    <img alt="board image" class="img" src="/img/icon_photo_on.svg" data-img="">
                </div>
            @endif


        </div>

    </div>

</div>


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