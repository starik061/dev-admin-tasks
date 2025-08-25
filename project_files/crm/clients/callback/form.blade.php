<div class="default-popup clients-callback-popup" data-contact_id="{{$contact->id}}">
    <div class="default-popup-header">
        <span>Перезвонить</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                      fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
            </svg>
        </span>
    </div>
    <div class="default-popup-body">
        <form  method="POST" id="client-callback-form"
               @if(isset($callback))
                   action="/manager/clients/{{$client->id}}/contacts/{{$contact->id}}/callback/{{$callback->id}}/update"
               @else
                   action="/manager/clients/{{$client->id}}/contacts/{{$contact->id}}/callback/store"
               @endif
        >
            <div class="field-container call-me-block" style="">
                <div class="input-block  dt" style="">
                    <label>Виберіть дату і час </label>
                    <input type="text" name="callback_call_me_datetime" class="datetime-input"
                           placeholder="@lang('message.date_time')" style="width:308px;" value="{{ isset($callback) ? date('d.m.Y H:i', strtotime($callback->call_me_datetime)) : '' }}">
                </div>
            </div>
            <div class="align-right">
                <button class="submit">@lang('message.save')</button>
            </div>
        </form>
    </div>
</div>
