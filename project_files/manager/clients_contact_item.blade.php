<div class="contact-item">
  <form class="contact-item-form">
    <input type="hidden" name="client_id" value="{{$item->client_id}}"/>
    <input type="hidden" name="contact_id" value="{{$item->id}}"/>
    <div class="input-block">
      <label>Ф.И.О.</label>
      <input type="text" name="fio" value="{{$item->fio}}" required disabled />
    </div>
    <div class="input-block">
      <label>Телефон</label>
      <input type="text" name="phone" value="{{$item->phone}}" required disabled />
    </div>
    <div class="input-block">
      <label>E-mail</label>
      <input type="email" name="email" value="{{$item->email}}" required disabled />
    </div>
    <div class="input-block buttons hide">
      <button class="crm-button crm-button-cancel">Отмена</button>
      <button class="crm-button">Сохранить</button>
    </div>
    <a class="edit-link">Редактировать</a>
  </form>
</div>