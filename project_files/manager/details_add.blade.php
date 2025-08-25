@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details">
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block content-our-details">
          <form action="/manager/details/add" method="post">
            <div class='input-group'>
              <div class="input-block">
                <label>Название</label>
                <input type="text" name="name" value="" required class="full_name"/>
              </div>
              <div class="input-block">
                <label>Плательщик НДС</label>
                <div class="form_toggle">
                  <div class="form_toggle-item item-1">
                    <input id="fid-1" type="radio" name="is_nds" value="1">
                    <label for="fid-1">Да</label>
                  </div>
                  <div class="form_toggle-item item-2">
                    <input id="fid-2" type="radio" name="is_nds" value="0" checked="">
                    <label for="fid-2">Нет</label>
                  </div>
                </div>
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>Адрес</label>
                <input type="text" name="address" value="" required class="full_name"/>
              </div>
              <div class="input-block mr0">
                <label>Телефон</label>
                <input type="text" name="phone" value=""/>
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>ЕДРПОУ</label>
                <input type="text" name="edrpou" value="" />
              </div>
              <div class="input-block">
                <label>ИНН</label>
                <input type="text" name="inn" value="" />
              </div>
              <div class="input-block">
                <label>Свидетельство платильшика НДС</label>
                <input type="text" name="nds" value="" />
              </div>
              <div class="input-block">
                <label>Налоговый статус</label>
                <input type="text" name="status_tax" value="" required class="full_name"/>
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>Подписант</label>
                <input type="text" name="signer" value="" required />
              </div>
            </div>
            <div class='input-group'>
              <div class="input-block">
                <label>Название банка</label>
                <input type="text" name="bank_name" value="" required class="full_name"/>
              </div>
              <div class="input-block mr0">
                <label>IBAN</label>
                <input type="text" name="iban" value="" required/>
              </div>
            </div>
            <div class="buttons-block">
              <button class="crm-button">Сохранить</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')
<link rel="stylesheet" href="/assets/js/mp/magnific-popup.css"/>
<link rel="stylesheet" as="style" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="/assets/css/crm.css?t=20220315-1"/>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/assets/js/mp/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>


<style></style>

<script>
var main_url = '/manager/detials';
</script>

<script src="/assets/js/crm.js?t=20220315-1"></script>
