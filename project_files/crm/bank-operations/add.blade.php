@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp

<section id="result-search-list" class="al-client-info">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search our-details posts-block">
        <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
        </h1>
        <div class="content-block">
          <form method="POST" action="{{ route('ba.store') }}">
            @csrf
            <div class="field-container">
              <div class="input-block">
                <label>Получатель</label>
                <select name="bank_id" class="ba-select" id="ba_bank">
                  <option>-</option>
                  @foreach($ourDetails as $details)
                    <option value="{{$details->bank->id}}">{{$details->name_short}}</option>
                  @endforeach
                </select>
                @error('bank_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="field-container">
              <div class="input-block">
                <label>ЕДРПОУ</label>
                <input type="text" name="edrpou"/>
                @error('edrpou')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-block">
                <label>Плательщик</label>
                <input type="text" name="name"/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-block">
                <label>Описание</label>
                <input type="text" name="description"/>
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="field-container">
              <div class="input-block">
                <label>Дата операции</label>
                <input type="text" name="operation_date"/>
                @error('operation_date')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-block">
                <label>Сумма</label>
                <input type="text" name="sum"/>
                @error('sum')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="field-container">
              <div class="input-block">
                <label>Клиент</label>
                <select name="client_id" class="ba-select" id="ba_client">
                  <option>-</option>
                  @foreach($clients as $id => $name)
                  <option value="{{$id}}">{{$name}}</option>
                  @endforeach
                </select>
                @error('client_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-block">
                <label>Счет</label>
                <select name="bill_id" class="ba-select" id="ba_bill">
                  <option>-</option>
                </select>
                @error('bill_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <button class="crm-button mt20">Сохранить</button>
          </form>  
        </div>
      </div>
    </div>
  </div>
</section>
@include('add.footer')

<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<style>
.ba-select{
  width: 320px;
}
</style>
<script>
const clientsBills = {!! json_encode($bills) !!};
$(document).ready(function(){
  $('.ba-select').select2();
  $('#ba_client').change(function(){
    $('#ba_bill').select2('destroy').empty().select2({data: clientsBills[$(this).val()], minimumResultsForSearch: -1});
  })
});
@if(session('success') || @$success)
notify("{!! session('name') !!}");
@endif
</script>