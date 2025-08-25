<div class="contacts-edit-popup">
  <div class='lead-add-header'>
    <span>@lang('message.edit_contact')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="contacts-edit-form">
    <form method="POST" action="/manager/clients/{{ $client->id }}/contacts/{{$contact->id}}/edit">
      <input type="hidden" name="client_id" value="{{ $client->id }}"/>
      <input type="hidden" name="contact_id" value="{{ $contact->id }}"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.fio')</label>
          <input type="text" name="fio" value="{{$contact->fio}}" required/>
        </div>
        <div class="input-block">
          <label>@lang('message.post')</label>
          <select name="post_id" class="post-select">
          @foreach($posts as $key => $item)
            <option value="{{$item->id}}" @if($contact->post_id == $item->id) selected @endif>{{$item->name}}</option>
          @endforeach  
          </select>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>E-mail</label>
          <input type="email" name="email" value="{{ $contact->email }}" id="contact_email"/>
        </div>
        <div class="input-block">
          <label>@lang('message.phone')</label>
          <input type="text" name="phone" value="{{ $contact->phone }}" required id="contact_phone"/>
        </div>        
      </div>
      <div class="align-right">
        <a class="clear-new">@lang('message.cancel')</a>
        <button class="submit">@lang('message.save')</button>
      </div>
    </form>
  </div>
</div>