<div class="photoreports-col photo-report-checkbox-col">
    <input type="checkbox" class="row-checkbox"
           data-id="{{ $report->report_id }}">
</div>

@if((!isset($client_view) || !$client_view))
    <div class="photoreports-col">
        @if($report['client_id'] && $report['client_name'])
            <a href="/manager/clients/{{$report['client_id']}}/view">
                {{$report['client_name']}}
            </a>
        @else
            -
        @endif
    </div>
    <div class="photoreports-col">
        @if($report['user_name'])
            {{$report['user_name']}}
        @else
            -
        @endif
    </div>
@endif
<div class="photoreports-col">
    {{$report['city_name']}}
</div>
<div class="photoreports-col">
    {{$report['addr']}}
</div>
<div class="photoreports-col">
    @lang('message.contract') №{{$report['contract_number']}}
</div>
<div class="photoreports-col">
    @lang('message.application') №{{$report['act_number']}}
</div>
<div class="photoreports-col">
    {{$report['firm_name']}}
</div>
<div class="photoreports-col">
{{$report['id']}}
</div>
<div class="photoreports-col">
{{$report['code']}}
</div>
<div class="photoreports-col nowrap">
@if($report['date_from'] && $report['date_to'])
    &nbsp;&nbsp;c {{$report['date_from']}}<br/>по {{$report['date_to']}}
@else
    -
@endif
</div>
<div class="photoreports-col">
@if($report['month'])
    {{$report['month']}}
@else
    -
@endif
</div>
<div class="photoreports-col design-col">
@if($report['photo_design'])
    <div class="pointer custom-bubble-image-container"
         data-image-path="{{ asset('storage/' . $report['photo_design']) }}"
         data-images="[]"
         style="position: relative">
        <a href="/storage/{{$report['photo_design']}}" target="_blank" data-fancybox>
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M3.75 3.3125C3.23223 3.3125 2.8125 3.73223 2.8125 4.25V14.75C2.8125 15.1958 3.12361 15.5689 3.54054 15.664L12 7.2045L15.1875 10.392V4.25C15.1875 3.73223 14.7678 3.3125 14.25 3.3125H3.75ZM15.1875 11.983L12 8.79549L5.10804 15.6875H14.25C14.7678 15.6875 15.1875 15.2678 15.1875 14.75V11.983ZM1.6875 4.25C1.6875 3.11091 2.61091 2.1875 3.75 2.1875H14.25C15.3891 2.1875 16.3125 3.11091 16.3125 4.25V14.75C16.3125 15.8891 15.3891 16.8125 14.25 16.8125H3.75C2.61091 16.8125 1.6875 15.8891 1.6875 14.75V4.25ZM6.375 6.3125C6.06434 6.3125 5.8125 6.56434 5.8125 6.875C5.8125 7.18566 6.06434 7.4375 6.375 7.4375C6.68566 7.4375 6.9375 7.18566 6.9375 6.875C6.9375 6.56434 6.68566 6.3125 6.375 6.3125ZM4.6875 6.875C4.6875 5.94302 5.44302 5.1875 6.375 5.1875C7.30698 5.1875 8.0625 5.94302 8.0625 6.875C8.0625 7.80698 7.30698 8.5625 6.375 8.5625C5.44302 8.5625 4.6875 7.80698 4.6875 6.875Z"
                      fill="#4FB14B"/>
            </svg>
        </a>
    </div>
@else
    -
@endif
</div>
<div class="photoreports-col">
@if($report['work_name'])
    {{$report['work_name']}}
@else
    -
@endif
</div>
<div class="photoreports-col photo-col">
@if($report['photo_near'])
    <div class="pointer custom-bubble-image-container"
         data-image-path="{{ asset('storage/' . $report['photo_near']) }}"
         data-images="[]" style="position: relative !important; margin-top: 11px !important;">
        <a href="/storage/{{$report['photo_near']}}" target="_blank" data-fancybox style="margin-left: 35%;">
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M3.75 3.3125C3.23223 3.3125 2.8125 3.73223 2.8125 4.25V14.75C2.8125 15.1958 3.12361 15.5689 3.54054 15.664L12 7.2045L15.1875 10.392V4.25C15.1875 3.73223 14.7678 3.3125 14.25 3.3125H3.75ZM15.1875 11.983L12 8.79549L5.10804 15.6875H14.25C14.7678 15.6875 15.1875 15.2678 15.1875 14.75V11.983ZM1.6875 4.25C1.6875 3.11091 2.61091 2.1875 3.75 2.1875H14.25C15.3891 2.1875 16.3125 3.11091 16.3125 4.25V14.75C16.3125 15.8891 15.3891 16.8125 14.25 16.8125H3.75C2.61091 16.8125 1.6875 15.8891 1.6875 14.75V4.25ZM6.375 6.3125C6.06434 6.3125 5.8125 6.56434 5.8125 6.875C5.8125 7.18566 6.06434 7.4375 6.375 7.4375C6.68566 7.4375 6.9375 7.18566 6.9375 6.875C6.9375 6.56434 6.68566 6.3125 6.375 6.3125ZM4.6875 6.875C4.6875 5.94302 5.44302 5.1875 6.375 5.1875C7.30698 5.1875 8.0625 5.94302 8.0625 6.875C8.0625 7.80698 7.30698 8.5625 6.375 8.5625C5.44302 8.5625 4.6875 7.80698 4.6875 6.875Z"
                      fill="#4FB14B"/>
            </svg>
        </a>
        <div style="margin-top: 5px">
            {{ date('d.m.Y', strtotime($report['date_near'])) }}
        </div>
    </div>
@else
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.75 2.8125C3.23223 2.8125 2.8125 3.23223 2.8125 3.75V14.25C2.8125 14.6958 3.12361 15.0689 3.54054 15.164L12 6.7045L15.1875 9.89196V3.75C15.1875 3.23223 14.7678 2.8125 14.25 2.8125H3.75ZM15.1875 11.483L12 8.29549L5.10804 15.1875H14.25C14.7678 15.1875 15.1875 14.7678 15.1875 14.25V11.483ZM1.6875 3.75C1.6875 2.61091 2.61091 1.6875 3.75 1.6875H14.25C15.3891 1.6875 16.3125 2.61091 16.3125 3.75V14.25C16.3125 15.3891 15.3891 16.3125 14.25 16.3125H3.75C2.61091 16.3125 1.6875 15.3891 1.6875 14.25V3.75ZM6.375 5.8125C6.06434 5.8125 5.8125 6.06434 5.8125 6.375C5.8125 6.68566 6.06434 6.9375 6.375 6.9375C6.68566 6.9375 6.9375 6.68566 6.9375 6.375C6.9375 6.06434 6.68566 5.8125 6.375 5.8125ZM4.6875 6.375C4.6875 5.44302 5.44302 4.6875 6.375 4.6875C7.30698 4.6875 8.0625 5.44302 8.0625 6.375C8.0625 7.30698 7.30698 8.0625 6.375 8.0625C5.44302 8.0625 4.6875 7.30698 4.6875 6.375Z"
              fill="#CDD4D9"/>
    </svg>
@endif
</div>
<div class="photoreports-col photo-col">
@if($report['photo_far'])
    <div class="pointer custom-bubble-image-container"
         data-image-path="{{ asset('storage/' . $report['photo_far']) }}"
         data-images="[]" style="position: relative !important; margin-top: 11px !important">
        <a href="/storage/{{$report['photo_far']}}" target="_blank" data-fancybox style="margin-left: 35%;">
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M3.75 3.3125C3.23223 3.3125 2.8125 3.73223 2.8125 4.25V14.75C2.8125 15.1958 3.12361 15.5689 3.54054 15.664L12 7.2045L15.1875 10.392V4.25C15.1875 3.73223 14.7678 3.3125 14.25 3.3125H3.75ZM15.1875 11.983L12 8.79549L5.10804 15.6875H14.25C14.7678 15.6875 15.1875 15.2678 15.1875 14.75V11.983ZM1.6875 4.25C1.6875 3.11091 2.61091 2.1875 3.75 2.1875H14.25C15.3891 2.1875 16.3125 3.11091 16.3125 4.25V14.75C16.3125 15.8891 15.3891 16.8125 14.25 16.8125H3.75C2.61091 16.8125 1.6875 15.8891 1.6875 14.75V4.25ZM6.375 6.3125C6.06434 6.3125 5.8125 6.56434 5.8125 6.875C5.8125 7.18566 6.06434 7.4375 6.375 7.4375C6.68566 7.4375 6.9375 7.18566 6.9375 6.875C6.9375 6.56434 6.68566 6.3125 6.375 6.3125ZM4.6875 6.875C4.6875 5.94302 5.44302 5.1875 6.375 5.1875C7.30698 5.1875 8.0625 5.94302 8.0625 6.875C8.0625 7.80698 7.30698 8.5625 6.375 8.5625C5.44302 8.5625 4.6875 7.80698 4.6875 6.875Z"
                      fill="#4FB14B"/>
            </svg>
        </a>
        <div style="margin-top: 5px">
            {{ date('d.m.Y', strtotime($report['date_far'])) }}
        </div>
    </div>
@else
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.75 2.8125C3.23223 2.8125 2.8125 3.23223 2.8125 3.75V14.25C2.8125 14.6958 3.12361 15.0689 3.54054 15.164L12 6.7045L15.1875 9.89196V3.75C15.1875 3.23223 14.7678 2.8125 14.25 2.8125H3.75ZM15.1875 11.483L12 8.29549L5.10804 15.1875H14.25C14.7678 15.1875 15.1875 14.7678 15.1875 14.25V11.483ZM1.6875 3.75C1.6875 2.61091 2.61091 1.6875 3.75 1.6875H14.25C15.3891 1.6875 16.3125 2.61091 16.3125 3.75V14.25C16.3125 15.3891 15.3891 16.3125 14.25 16.3125H3.75C2.61091 16.3125 1.6875 15.3891 1.6875 14.25V3.75ZM6.375 5.8125C6.06434 5.8125 5.8125 6.06434 5.8125 6.375C5.8125 6.68566 6.06434 6.9375 6.375 6.9375C6.68566 6.9375 6.9375 6.68566 6.9375 6.375C6.9375 6.06434 6.68566 5.8125 6.375 5.8125ZM4.6875 6.375C4.6875 5.44302 5.44302 4.6875 6.375 4.6875C7.30698 4.6875 8.0625 5.44302 8.0625 6.375C8.0625 7.30698 7.30698 8.0625 6.375 8.0625C5.44302 8.0625 4.6875 7.30698 4.6875 6.375Z"
              fill="#CDD4D9"/>
    </svg>
@endif
</div>
<div class="photoreports-col photo-col">
@if($report['photo_night'])
    <div class="pointer custom-bubble-image-container"
         data-image-path="{{ asset('storage/' . $report['photo_night']) }}"
         data-images="[]" style="position: relative !important; margin-top: 11px !important">
        <a href="/storage/{{$report['photo_night']}}" target="_blank" data-fancybox style="margin-left: 35%;">
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M3.75 3.3125C3.23223 3.3125 2.8125 3.73223 2.8125 4.25V14.75C2.8125 15.1958 3.12361 15.5689 3.54054 15.664L12 7.2045L15.1875 10.392V4.25C15.1875 3.73223 14.7678 3.3125 14.25 3.3125H3.75ZM15.1875 11.983L12 8.79549L5.10804 15.6875H14.25C14.7678 15.6875 15.1875 15.2678 15.1875 14.75V11.983ZM1.6875 4.25C1.6875 3.11091 2.61091 2.1875 3.75 2.1875H14.25C15.3891 2.1875 16.3125 3.11091 16.3125 4.25V14.75C16.3125 15.8891 15.3891 16.8125 14.25 16.8125H3.75C2.61091 16.8125 1.6875 15.8891 1.6875 14.75V4.25ZM6.375 6.3125C6.06434 6.3125 5.8125 6.56434 5.8125 6.875C5.8125 7.18566 6.06434 7.4375 6.375 7.4375C6.68566 7.4375 6.9375 7.18566 6.9375 6.875C6.9375 6.56434 6.68566 6.3125 6.375 6.3125ZM4.6875 6.875C4.6875 5.94302 5.44302 5.1875 6.375 5.1875C7.30698 5.1875 8.0625 5.94302 8.0625 6.875C8.0625 7.80698 7.30698 8.5625 6.375 8.5625C5.44302 8.5625 4.6875 7.80698 4.6875 6.875Z"
                      fill="#4FB14B"/>
            </svg>
        </a>
        <div style="margin-top: 5px">
            {{ date('d.m.Y', strtotime($report['date_night'])) }}
        </div>
    </div>
@else
    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.75 2.8125C3.23223 2.8125 2.8125 3.23223 2.8125 3.75V14.25C2.8125 14.6958 3.12361 15.0689 3.54054 15.164L12 6.7045L15.1875 9.89196V3.75C15.1875 3.23223 14.7678 2.8125 14.25 2.8125H3.75ZM15.1875 11.483L12 8.29549L5.10804 15.1875H14.25C14.7678 15.1875 15.1875 14.7678 15.1875 14.25V11.483ZM1.6875 3.75C1.6875 2.61091 2.61091 1.6875 3.75 1.6875H14.25C15.3891 1.6875 16.3125 2.61091 16.3125 3.75V14.25C16.3125 15.3891 15.3891 16.3125 14.25 16.3125H3.75C2.61091 16.3125 1.6875 15.3891 1.6875 14.25V3.75ZM6.375 5.8125C6.06434 5.8125 5.8125 6.06434 5.8125 6.375C5.8125 6.68566 6.06434 6.9375 6.375 6.9375C6.68566 6.9375 6.9375 6.68566 6.9375 6.375C6.9375 6.06434 6.68566 5.8125 6.375 5.8125ZM4.6875 6.375C4.6875 5.44302 5.44302 4.6875 6.375 4.6875C7.30698 4.6875 8.0625 5.44302 8.0625 6.375C8.0625 7.30698 7.30698 8.0625 6.375 8.0625C5.44302 8.0625 4.6875 7.30698 4.6875 6.375Z"
              fill="#CDD4D9"/>
    </svg>
@endif
</div>
<div class="photoreports-col action-col nowrap">
@if($report['is_photo_report'] || !isset($report['is_photo_report']))

    <div class="actions action-col">

        <a class="pointer edit-report al-power-tip @if($report['photo_near'] || $report['photo_far'] || $report['photo_night']) hidden @endif"
           title="@lang('message.add_photoreport')" data-id="{{ $report['report_id'] }}">
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
        <a href="#" class="more-action">
            <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                 class="for-js">
                <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z"
                      fill="#3D445C" class="for-js"/>
            </svg>
        </a>
        <div class="sub-action hide" id="sub-action-{{ $report['report_id'] }}">
            @if($report['photo_near'] || $report['photo_far'] || $report['photo_night'])
                <a class="edit-report pointer" data-id="{{ $report['report_id'] }}">@lang('message.edit')</a>

                <a class="pointer copy-link" data-url="{{ route('photoReportsDetails', ['lang' => App::getLocale(), 'month_ym' => $report['ym'], 'client_id' => Crypt::encrypt($client->id)]) }}">@lang('message.copy')</a>

            @endif
            <a class="report-delete pointer"
               href="/manager/photoreports/{{$report['report_id']}}/delete">@lang('message.delete_photoreport')</a>
        </div>
    </div>

@else
    <div class="actions action-col" style="align-items: flex-end; justify-content: flex-end; margin-right: 14px">
        <a class="pointer al-power-tip photoreport-add-link" data-board-id="{{ $report['id'] }}"
           data-client-id="{{ $report['client_id'] }}" data-ym="{{$report['ym']}}">
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
    </div>
@endif
</div>