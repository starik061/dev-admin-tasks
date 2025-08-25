<div class="default-popup lead-status-popup">
    <div class='default-popup-header'>
        <span class="lead-name">@lang('message.change_of_status') на ##NAME##</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="default-popup-body">
        <form method="POST" action="/manager/leads/##ID##/change-status" id="lead-status-form">
            <input type="hidden" name="lead_id" value="##ID##"/>
            <input type="hidden" name="old_status_id" value="##OLD_STATUS##"/>
            <input type="hidden" name="new_status_id" value="##NEW_STATUS##"/>
            <div class="field-container comment-container" style="display: none" >
                <div class="input-block">
                    <label>@lang('message.comment1')</label>
                    <textarea name="comment"></textarea>
                </div>
            </div>
            <div class="field-container lead-off-reason">
                @php
                    $rejection_id = 2;
                @endphp
                <div class="input-block">
                    <label>@lang('message.reason')</label>
                    @foreach($rejections_reasons as $reason)
                        <label class="radio-label @if($reason->id == $rejection_id) checked @endif"
                               @if(($reason->rejection_id != $lead->rejection_id && $lead) || (!$lead && $reason->rejection_id != $rejection_id)) style="display: none" @endif
                               data-rejection_id="{{$reason->rejection_id}}">
                            <input type="radio"
                                   name="rejection_reason_id"
                                   @if($reason->id == $rejection_id) checked @endif
                                   value="{{$reason->id}}">
                            {{$reason->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="align-right">
                <button class="clear-new">@lang('message.cancel')</button>
                <button class="submit">@lang('message.change_button')</button>
            </div>
        </form>
    </div>
</div>
