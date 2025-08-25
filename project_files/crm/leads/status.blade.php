<div class="default-popup lead-status-popup">
    <div class='default-popup-header'>
        <span class="lead-name">@lang('message.change_of_status') @if($newStatus)
                на "{{$newStatus->name}}"
            @endif</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                      fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="default-popup-body status-div">
        <form method="POST" action="/manager/leads/{{$lead->id}}/change-status"
              class="lead-change-status-form" id="lead-status-form">
            <input type="hidden" name="lead_id" value="{{$lead->id}}"/>
            <input type="hidden" name="old_status_id" value="{{$lead->status->id}}"/>
            <input type="hidden" name="selections" value="{{ optional($lead->selections)->count() }}" />
            <input type="hidden" name="user_role_id" value="{{ Auth::user() ? Auth::user()->role_id : null }}" />
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.status')</label>
                    <select class="w540 lead_status_id" name="new_status_id"
                            data-old_status_id="{{$lead->status->id}}">
                        @foreach($lead->availableStatuses() as $statusId => $statusName)
                            <option value="{{$statusId}}"
                                    @if($statusId == $lead->status->id) selected @endif>{{$statusName}}</option>
                        @endforeach
                    </select>
                    @if($classes)
                        <div  @if($lead->status_id == 7 || $lead->status_id == 11) style="display: none" @endif class="class_status_custom_id">
                            <label>@lang('message.class')</label>
                            <select class="w540 class_status_id" name="class_id"
                                    data-old_class_id="{{$lead->class_id}}">
                                <option value="" @if($lead->class_id == null) selected @endif>-
                                </option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}"
                                            @if($class->id == $lead->class_id) selected @endif>{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            </div>
            <div class="field-container comment-container"
                 @if($lead->status_id == 7 || $newStatus->id == 7 || $lead->status_id == 11 || $newStatus->id == 11) style="display: none" @endif>
                <div class="input-block">
                    <label>@lang('message.comment1')</label>
                    <textarea name="comment" @if($newStatus && $newStatus->id == 6) required @endif></textarea>
                </div>
            </div>
            <div class="field-container call-me-block"
                 @if(($lead->status->id != 6 && !$newStatus) || ($newStatus && $newStatus->id != 6)) style="display:none;" @endif>
                <div class="info-block">
                    <label class="radio-label @if($lead->call_me_datetime) checked @endif"><input type="checkbox"
                                                                                                  name="call_me"
                                                                                                  @if($lead->call_me_datetime) checked @endif>@lang('message.remind_me_to_contact_the_lead')
                    </label>
                </div>
                <br>
                <div class="input-block  dt" @if(!$lead->call_me_datetime) style="display:none;" @endif>
                    <label>@lang('message.select_date_and_time')</label>
                    <input type="text" name="call_me_datetime" class="datetime-input" placeholder="дата и время"
                           style="width:540px;"
                           value="{{ $lead->call_me_datetime ? date('d.m.Y H:i', strtotime($lead->call_me_datetime)) : '' }}"/>
                </div>
            </div>
            <div class="field-container lead-off-reason"
                 @if((($lead->status_id != 7 && $lead->status_id != 11) && !$newStatus) ||
                      ($newStatus && $newStatus->id != 7 && $newStatus->id != 11))
                     style="display: none"
                    @endif>
                @php
                    if(!$lead->rejection_id){
                        $lead->rejection_id = 1;
                    }
                @endphp
                <div class="input-block">
                    <label>@lang('message.reason')</label>
                    @foreach($rejections_reasons as $reason)
                        <label class="radio-label @if($reason->id == $lead->rejection_reason_id) checked @endif"
                               @if($reason->rejection_id != $lead->rejection_id) style="display: none" @endif
                               data-rejection_id="{{$reason->rejection_id}}">
                            <input type="radio"
                                   name="rejection_reason_id"
                                   @if($reason->id == $lead->rejection_reason_id) checked @endif
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