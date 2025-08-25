<tr class="suppliers-bills-row bill_status_{{$bill->status_id}}" id="bill-{{$bill->id}}">
    <td>
        {{-- $bills->count() - ($page-1)*20-(int)$key --}}
        crm_{{$bill->id}}
    </td>
    <td>
        {{ date('d.m.Y', strtotime($bill->created_at)) }}
    </td>
    <td>
        <a href="/manager/suppliers/{{$bill->supplier->id}}/view" target="_blank">{{$bill->supplier->name}}</a>
        @if($bill->supplier_details_id)
            <br/>{{$bill->supplier_details->name_short}}<br>{{$bill->bank->bank_name}}
        @else
            @if($bill->card_number)
                {!! "<br>". $bill->card_number . ($bill->bank_name ? "<br>{$bill->bank_name}": '') . ($bill->card_holder ? "<br>{$bill->card_holder}": '') !!}
            @endif
        @endif
    </td>
    <td>
        {!! $bill->getClientsListString() !!}
    </td>
    <td>
        {{ $bill->our_getter }}
    </td>
    <td>
        @if(count($bill->period))
            @foreach($bill->period as $period)
                @php
                    $parts = explode('-', $period->period);
                    $billPeriod = $monthsNames[$parts[1]] . ' ' . $parts[0]
                @endphp
                {{$billPeriod}}
            @endforeach
        @endif
    </td>
    <td style="text-align: center">
        @if($bill->link)
            <a href="{{$bill->link}}" target="_blank">
                <svg width="18"
                     height="18"
                     viewBox="0 0 18 18"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.4986 4.49586L9.7507 2.24378C11.4091 0.585411 14.0978 0.585401 15.7562 2.24378C17.4146 3.90216 17.4146 6.59093 15.7562 8.2493L13.5041 10.5014M3.5 8.5L2.24378 9.7507C0.585411 11.4091 0.585401 14.0978 2.24378 15.7562C3.90216 17.4146 6.59093 17.4146 8.2493 15.7562L9.5 14.5M6.5 11.5L11.5 6.5"
                          stroke="#FC6B40"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
        @endif
        @if($bill->file)
            @if(in_array(pathinfo($bill->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                <a href="/storage/{{$bill->file}}" target="_blank" class="bill-image-link" data-fancybox="image-{{$bill->id}}">
                    <svg width="24"
                         height="24"
                         viewBox="0 0 24 24"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              clip-rule="evenodd"
                              stroke-width="1.5"
                              d="M5 3.75C4.30964 3.75 3.75 4.30964 3.75 5V19C3.75 19.5943 4.16481 20.0918 4.72071 20.2187L16.0001 8.93934L20.25 13.1893V5C20.25 4.30964 19.6904 3.75 19 3.75H5ZM20.25 15.3106L16.0001 11.0607L6.81072 20.25H19C19.6904 20.25 20.25 19.6904 20.25 19V15.3106ZM2.25 5C2.25 3.48122 3.48122 2.25 5 2.25H19C20.5188 2.25 21.75 3.48122 21.75 5V19C21.75 20.5188 20.5188 21.75 19 21.75H5C3.48122 21.75 2.25 20.5188 2.25 19V5ZM8.5 7.75C8.08579 7.75 7.75 8.08579 7.75 8.5C7.75 8.91421 8.08579 9.25 8.5 9.25C8.91421 9.25 9.25 8.91421 9.25 8.5C9.25 8.08579 8.91421 7.75 8.5 7.75ZM6.25 8.5C6.25 7.25736 7.25736 6.25 8.5 6.25C9.74264 6.25 10.75 7.25736 10.75 8.5C10.75 9.74264 9.74264 10.75 8.5 10.75C7.25736 10.75 6.25 9.74264 6.25 8.5Z"
                              fill="#FC6B40"/>
                    </svg>

                </a>
            @else
                @if(in_array(pathinfo($bill->file, PATHINFO_EXTENSION), ['xls', 'xlsx', 'ods']))
                    <a href="/storage/{{$bill->file}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 32 32"
                             width="32px"
                             height="32px">
                            <path fill="#FC6B40"
                                  d="M 15.875 4 L 15.78125 4.03125 L 4.78125 6.46875 L 4 6.65625 L 4 25.34375 L 4.78125 25.53125 L 15.78125 27.96875 L 15.875 28 L 18 28 L 18 25 L 28 25 L 28 7 L 18 7 L 18 4 Z M 16 6.03125 L 16 25.96875 L 6 23.78125 L 6 8.21875 Z M 18 9 L 26 9 L 26 23 L 18 23 L 18 21 L 20 21 L 20 19 L 18 19 L 18 18 L 20 18 L 20 16 L 18 16 L 18 15 L 20 15 L 20 13 L 18 13 L 18 12 L 20 12 L 20 10 L 18 10 Z M 21 10 L 21 12 L 25 12 L 25 10 Z M 14.15625 11 L 11.875 11.28125 L 10.625 13.96875 C 10.492188 14.355469 10.394531 14.648438 10.34375 14.84375 L 10.3125 14.84375 C 10.234375 14.519531 10.160156 14.238281 10.0625 14 L 9.4375 11.6875 L 7.3125 11.9375 L 7.21875 12 L 9 16 L 7 20 L 9.15625 20.25 L 10.03125 17.78125 C 10.136719 17.46875 10.222656 17.214844 10.25 17.0625 L 10.28125 17.0625 C 10.339844 17.386719 10.378906 17.628906 10.4375 17.75 L 11.78125 20.6875 L 14.21875 21 L 11.5625 15.96875 Z M 21 13 L 21 15 L 25 15 L 25 13 Z M 21 16 L 21 18 L 25 18 L 25 16 Z M 21 19 L 21 21 L 25 21 L 25 19 Z"/>
                        </svg>
                    </a>
                @else
                    @if(pathinfo($bill->file, PATHINFO_EXTENSION) === 'pdf')
                        <a href="/storage/{{$bill->file}}" target="_blank">
                            <svg fill="#FC6B40"
                                 height="24px"
                                 width="24px"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 58 58" xml:space="preserve">
                                <g>
                                    <path d="M50.95,12.187l-0.771-0.771L40.084,1.321L39.313,0.55C38.964,0.201,38.48,0,37.985,0H8.963C7.777,0,6.5,0.916,6.5,2.926V39
                                        v16.537V56c0,0.837,0.842,1.653,1.838,1.91c0.05,0.013,0.098,0.032,0.15,0.042C8.644,57.983,8.803,58,8.963,58h40.074
                                        c0.16,0,0.319-0.017,0.475-0.048c0.052-0.01,0.1-0.029,0.15-0.042C50.658,57.653,51.5,56.837,51.5,56v-0.463V39V13.978
                                        C51.5,13.211,51.408,12.645,50.95,12.187z M47.935,12H39.5V3.565L47.935,12z M8.963,56c-0.071,0-0.135-0.026-0.198-0.049
                                        C8.609,55.877,8.5,55.721,8.5,55.537V41h41v14.537c0,0.184-0.109,0.339-0.265,0.414C49.172,55.974,49.108,56,49.037,56H8.963z
                                         M8.5,39V2.926C8.5,2.709,8.533,2,8.963,2h28.595C37.525,2.126,37.5,2.256,37.5,2.391V14h11.609c0.135,0,0.264-0.025,0.39-0.058
                                        c0,0.015,0.001,0.021,0.001,0.036V39H8.5z"/>
                                    <path d="M22.042,44.744c-0.333-0.273-0.709-0.479-1.128-0.615c-0.419-0.137-0.843-0.205-1.271-0.205h-2.898V54h1.641v-3.637h1.217
                                        c0.528,0,1.012-0.077,1.449-0.232s0.811-0.374,1.121-0.656c0.31-0.282,0.551-0.631,0.725-1.046c0.173-0.415,0.26-0.877,0.26-1.388
                                        c0-0.483-0.103-0.918-0.308-1.306S22.375,45.018,22.042,44.744z M21.42,48.073c-0.101,0.278-0.232,0.494-0.396,0.649
                                        c-0.164,0.155-0.344,0.267-0.54,0.335c-0.196,0.068-0.395,0.103-0.595,0.103h-1.504v-3.992h1.23c0.419,0,0.756,0.066,1.012,0.198
                                        c0.255,0.132,0.453,0.296,0.595,0.492c0.141,0.196,0.234,0.401,0.28,0.615c0.045,0.214,0.068,0.403,0.068,0.567
                                        C21.57,47.451,21.52,47.795,21.42,48.073z"/>
                                    <path d="M31.954,45.4c-0.424-0.446-0.957-0.805-1.6-1.073s-1.388-0.403-2.235-0.403h-3.035V54h3.814
                                        c0.127,0,0.323-0.016,0.588-0.048c0.264-0.032,0.556-0.104,0.875-0.219c0.319-0.114,0.649-0.285,0.991-0.513
                                        s0.649-0.54,0.923-0.937s0.499-0.889,0.677-1.477s0.267-1.297,0.267-2.126c0-0.602-0.105-1.188-0.314-1.757
                                        C32.694,46.355,32.378,45.847,31.954,45.4z M30.758,51.73c-0.492,0.711-1.294,1.066-2.406,1.066h-1.627v-7.629h0.957
                                        c0.784,0,1.422,0.103,1.914,0.308s0.882,0.474,1.169,0.807s0.48,0.704,0.581,1.114c0.1,0.41,0.15,0.825,0.15,1.244
                                        C31.496,49.989,31.25,51.02,30.758,51.73z"/>
                                    <polygon points="35.598,54 37.266,54 37.266,49.461 41.477,49.461 41.477,48.34 37.266,48.34 37.266,45.168 41.9,45.168
                                        41.9,43.924 35.598,43.924 	"/>
                                    <path d="M38.428,22.961c-0.919,0-2.047,0.12-3.358,0.358c-1.83-1.942-3.74-4.778-5.088-7.562c1.337-5.629,0.668-6.426,0.373-6.802
                                        c-0.314-0.4-0.757-1.049-1.261-1.049c-0.211,0-0.787,0.096-1.016,0.172c-0.576,0.192-0.886,0.636-1.134,1.215
                                        c-0.707,1.653,0.263,4.471,1.261,6.643c-0.853,3.393-2.284,7.454-3.788,10.75c-3.79,1.736-5.803,3.441-5.985,5.068
                                        c-0.066,0.592,0.074,1.461,1.115,2.242c0.285,0.213,0.619,0.326,0.967,0.326h0c0.875,0,1.759-0.67,2.782-2.107
                                        c0.746-1.048,1.547-2.477,2.383-4.251c2.678-1.171,5.991-2.229,8.828-2.822c1.58,1.517,2.995,2.285,4.211,2.285
                                        c0.896,0,1.664-0.412,2.22-1.191c0.579-0.811,0.711-1.537,0.39-2.16C40.943,23.327,39.994,22.961,38.428,22.961z M20.536,32.634
                                        c-0.468-0.359-0.441-0.601-0.431-0.692c0.062-0.556,0.933-1.543,3.07-2.744C21.555,32.19,20.685,32.587,20.536,32.634z
                                         M28.736,9.712c0.043-0.014,1.045,1.101,0.096,3.216C27.406,11.469,28.638,9.745,28.736,9.712z M26.669,25.738
                                        c1.015-2.419,1.959-5.09,2.674-7.564c1.123,2.018,2.472,3.976,3.822,5.544C31.031,24.219,28.759,24.926,26.669,25.738z
                                         M39.57,25.259C39.262,25.69,38.594,25.7,38.36,25.7c-0.533,0-0.732-0.317-1.547-0.944c0.672-0.086,1.306-0.108,1.811-0.108
                                        c0.889,0,1.052,0.131,1.175,0.197C39.777,24.916,39.719,25.05,39.57,25.259z"/>
                                </g>
                            </svg>
                        </a>
                    @else
                        <a href="/storage/{{$bill->file}}" target="_blank">
                            <svg width="24"
                                 height="24"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      clip-rule="evenodd"
                                      d="M4.05546 2.05546C4.57118 1.53973 5.27065 1.25 6 1.25H14.8107L20.75 7.18934V20C20.75 20.7293 20.4603 21.4288 19.9445 21.9445C19.4288 22.4603 18.7293 22.75 18 22.75H6C5.27065 22.75 4.57118 22.4603 4.05546 21.9445C3.53973 21.4288 3.25 20.7293 3.25 20V4C3.25 3.27065 3.53973 2.57118 4.05546 2.05546ZM6 2.75C5.66848 2.75 5.35054 2.8817 5.11612 3.11612C4.8817 3.35054 4.75 3.66848 4.75 4V20C4.75 20.3315 4.8817 20.6495 5.11612 20.8839C5.35054 21.1183 5.66848 21.25 6 21.25H18C18.3315 21.25 18.6495 21.1183 18.8839 20.8839C19.1183 20.6495 19.25 20.3315 19.25 20V8.75H13.25V2.75H6ZM14.75 3.31066L18.6893 7.25H14.75V3.31066ZM16 12.25H8V13.75H16V12.25ZM8 16.25H16V17.75H8V16.25ZM10 8.25H8V9.75H10V8.25Z"
                                      fill="#FC6B40"/>
                            </svg>
                        </a>
                    @endif
                @endif
            @endif
        @endif
    </td>
    <td>
        {{$bill->number}}
    </td>
    <td>
        {{$bill->our_details->name_short}}<br>
        {{$bill->our_bank->name}}
    </td>
    <td>
        {{$bill->sum}}
    </td>
    @can('view-suppliers-bills-commission')
    <td>
        {{$bill->commission}}
    </td>
    @endcan
    <td>
        {{$bill->user->name}}
    </td>
    <td>
        {{--@powerTip($bill->comment)--}}
        {{$bill->comment}}
    </td>
    <td class="client-bill-status">
        {!! $bill->getClientsBillsPaymentStatusString() !!}
    </td>
    <td style="text-align: center">
        <span class="supplier-bill-status"
              style="color:{{$bill->status->color}}; background:{{$bill->status->background}}">
            &bull;&nbsp;{{ $bill->status->name }}
        </span>
        @if($bill->status_id === \App\CrmSuppliersBillsStatus::PAID)
            {{ date('d.m.Y H:i:s', strtotime($bill->paid_at)) }}
        @endif
    </td>
    <td>
        {{ date('d.m.Y', strtotime($bill->updated_at)) }}
    </td>
    <td class="action-col">
        <a class="more-action pointer">
            <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                      fill="#3D445C"/>
            </svg>
        </a>
        <div class="sub-action hide">
            @if((!in_array($bill->status_id, [\App\CrmSuppliersBillsStatus::PAID])) && $currentUser->isBookkeeper())
                <a class="edit-supplier-bill pointer bill-edit-action" data-id="{{$bill->id}}">@lang('message.edit')</a>
            @endif
            @if((in_array($bill->status_id, [0, \App\CrmSuppliersBillsStatus::CREATED, \App\CrmSuppliersBillsStatus::PAY, \App\CrmSuppliersBillsStatus::PAY_URGENTLY, \App\CrmSuppliersBillsStatus::ERROR])) && $currentUser->isManager())
                <a class="edit-supplier-bill-manager pointer bill-edit-action" data-id="{{$bill->id}}">@lang('message.edit')</a>
            @endif
            @if($bill->file)
                <a href="/storage/{{$bill->file}}" target="_blank">@lang('message.download')</a>
            @endif
            @if($bill->link)
                <a href="{{$bill->link}}" target="_blank">@lang('message.download')</a>
            @endif
            @if($bill->our_details_id == 5 && $bill->status_id === \App\CrmSuppliersBillsStatus::PUT_ON_PAYMENT && $currentUser->isBookkeeper())
                <a data-id="{{$bill->id}}" class="bill-set-paid pointer">
                    Отметить как оплаченный
                </a>
            @endif
            @if($bill->log->count())
                <a data-id="{{$bill->id}}" class="bill-show-log-action pointer">
                    @lang('message.change_log')
                </a>
            @endif
            @if(in_array($bill->status_id, [0, \App\CrmSuppliersBillsStatus::CREATED, \App\CrmSuppliersBillsStatus::PAY, \App\CrmSuppliersBillsStatus::PAY_URGENTLY]))
                <a class="delete-supplier-bill pointer" data-id="{{$bill->id}}">@lang('message.delete')</a>
            @endif
        </div>
    </td>
</tr>