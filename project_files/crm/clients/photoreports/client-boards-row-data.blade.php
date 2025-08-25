@foreach($boardsWithoutPhotoReports as $board)
    <tr class="boards-table-tr" style="display: table-row !important;">
        <td class="boards-td boards-td-photo">
            @if($board['image'])
                <a href="/upload/{{ $board['image'] }}"
                   data-fancybox="gallery-a">
                    <img src="/upload/{{ $board['image'] }}"/>
                </a>
            @endif
        </td>
        <td class="boards-td">
            <a href="/{{ $board['aleas'] }}" target="_blank">
                {{ $board['id'] }}
            </a>
        </td>
        <td class="boards-td boards-td-addr">
            <a href="/{{ $board['aleas'] }}" target="_blank">
                @if ($board['city_name'])
                    {{ $board['city_name'] }},
                @endif
                {{ $board['addr'] }}
            </a>
        </td>
        <td class="boards-td">
            <a href="/{{ $board['aleas'] }}" target="_blank">
                {{ $board['firm_name'] }}, {{ $board['code'] }}
            </a>
        </td>
        <td class="boards-td">
            <a href="/{{ $board['aleas'] }}" target="_blank">
                {{ mb_convert_case(mb_strtolower($board['title']), MB_CASE_TITLE) }}
                @if ($board['format'] != null)
                    {{ ", " }}
                @endif
                {{ $board['format'] }}
            </a>
        </td>
        <td class="boards-td">
            <a href="/{{ $board['aleas'] }}" target="_blank">
                {{ $board['side_type'] }}
            </a>
        </td>
        <td class="boards-td">
{{--            {{ date('d.m.Y', strtotime($board['date_from'])) }}--}}
{{--            - {{ date('d.m.Y', strtotime($board['date_to'])) }}--}}

            {{$board['ym']}}
        </td>

        <td class="boards-td action-col align-right"
            style="position: relative;">
            <a class="pointer al-power-tip photoreport-add-link" data-board-id="{{ $board['id'] }}" data-ym="{{$board['ym']}}">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="30" height="30" rx="4" fill="#FC6B40"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M15 7.89581C15.3797 7.89581 15.6875 8.20362 15.6875 8.58331V21.4166C15.6875 21.7963 15.3797 22.1041 15 22.1041C14.6203 22.1041 14.3125 21.7963 14.3125 21.4166V8.58331C14.3125 8.20362 14.6203 7.89581 15 7.89581Z"
                          fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.89453 15C7.89453 14.6203 8.20234 14.3125 8.58203 14.3125H21.4154C21.7951 14.3125 22.1029 14.6203 22.1029 15C22.1029 15.3797 21.7951 15.6875 21.4154 15.6875H8.58203C8.20234 15.6875 7.89453 15.3797 7.89453 15Z"
                          fill="white"/>
                </svg>
            </a>

        </td>
    </tr>
@endforeach