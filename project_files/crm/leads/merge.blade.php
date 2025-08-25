<div class="change-popup zi10101 " style="width: 465px">
    <div class="change-popup-header">
        <span>@lang('message.leads_union')</span>
        <span class="close">
	      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
	        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
	      </svg>
	    </span>
    </div>
    <div class="change-popup-body">
        <form method="POST" action="/manager/leads/{{$lead->id}}/merge" >
            <input type="hidden" name="id" value="{{$lead->id}}"/>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.lead_to_merge_with')</label>
                    <select class="change-type" name="new_lead_id" style="width:405px;">
                        @foreach($leads as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="align-right">
                <button class="submit">@lang('message.merge')</button>
                <div class="lds-ellipsis3 hide"><div></div><div></div><div></div><div></div></div>
            </div>
        </form>
    </div>
</div>