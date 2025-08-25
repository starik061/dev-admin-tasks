<div class="ajax-content">
  <div class="selection-items-table">
    <div class="selection-items-head">
      <div class="selection-items-row">
        <div class="selection-items-col col-checkbox">
          <input type="checkbox" class="select-all"/>
        </div>
        <div class="selection-items-col">ID</div>
        <div class="selection-items-col">Город</div>
        <div class="selection-items-col">Фирма - Код</div>
        <div class="selection-items-col">Тип</div>
        <div class="selection-items-col">Адрес</div>
        <div class="selection-items-col">Сторона</div>
        <div class="selection-items-col">Подсветка</div>
        <div class="selection-items-col">Изменино</div>
        <div class="selection-items-col">Фото</div>
        <div class="selection-items-col">Занятость</div>
        <div class="selection-items-col">@lang('message.in_price')</div>
        <div class="selection-items-col">@lang('message.price_')</div>
      </div>
    </div>
    <div class="selection-items-body">
      @include('front.manager.selections_items_new')
    </div>
  </div>  

  <button class='section-items-button add-to-contract hide'>Добавить к договору</button>
  <button title="Close (Esc)" type="button" class="mfp-close al-close">×</button>
</div>

