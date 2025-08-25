@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp

<section id="result-search-list" class="al-leeds-page">
  <div class="container-fluid container-fluid-base">
    <div class="row no-gutters">
      <div class="container container-base container-search-result manager-search mw1460">
        <h1 class="title-search-result">
          {{ $data['seo']->h1_title }}
        </h1>
        <div class="favorite-viewed-tab">
          @foreach($types as $type)
            <a href="/manager/suppliers?type_id={{$type->id}}" @if($type->id == $params['type_id']) class="active" @endif>{{$type->getTranslatedAttribute('plural',App::getLocale(), 'ru')}}</a>
          @endforeach
        </div>
        <div class="content-block clearfix">
          <div class="suppliers-table">
            <div class="header-block">
              <div class="search-block">
                <form action="/manager/suppliers" method="GET" class="search-form- field-container">
                  <input type="hidden" name="type_id" value="{{$params['type_id']}}"/>
                  <div class="input-block">
                    <label for="leads_search">@lang('message.search')</label>
                    <input type="text" name="s" value="{{@$search}}" id="leads_search" />
                    <svg class="clear-search @if(!@$search) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                    </svg>
                  </div>
                  <div class="input-block short-select-block">
                    <label>@lang('message.region')</label>
                    <select name="region" class="region-select search-form-select">
                      <option value="0">-</option>
                      @foreach($regions as $id => $name)
                      <option value="{{$id}}" @if($params['region'] == $id) selected @endif>{{$name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-block short-select-block @if(!isset($params['city']) || ($params['city'] == 0 && $params['region'] == 0)) hide @endif city-block">
                    <label>@lang('message.city')</label>
                    <select name="city" class="city-select search-form-select">
                      <option value="0">-</option>
                      @if(isset($citiesList))
                      @foreach($citiesList as $id => $name)
                      <option value="{{$id}}" @if($params['city'] == $id) selected @endif>{{$name}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <div class="input-block" style="width: 100px;">
                    <label>&nbsp;</label>
                    <button class="btn btn-main">@lang('message.find')</button>
                  </div>
                </form>
              </div>
              <div class="right-block">
                @if(in_array(Auth::user()->id, [1,202,248]))
                <a id="export-supplier" class="btn btn-main" data-type_id="{{$params['type_id'] ?: 1}}">@lang('message.export')</a>
                @endif
                @if(Auth::user()->role_id != 5)
                <div class="add-block">
                  <a href="{{ route('suppliers.add') }}" class="btn btn-main">@lang('message.supplier_add')</a>
                </div>
                @endif
              </div>
            </div>
            @if($suppliers)
              <div class="suppliers-thead">
                <div class="supplier-col lead-name pointer @if($sort=='name') active @endif" data-sort="name" data-dir="@if($sort == 'name' && $dir == 'asc') desc @else asc @endif">
                  @lang('message.name_description')
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'name' && $dir == 'desc') down @endif @if($sort == 'name' && $dir == 'asc') up @endif">
                    <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                    <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                  </svg>
                </div>
                <div class="supplier-col lead-name pointer @if($sort=='fio') active @endif" data-sort="fio" data-dir="@if($sort == 'fio' && $dir == 'asc') desc @else asc @endif">
                  @lang('message.contact_face')
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'fio' && $dir == 'desc') down @endif @if($sort == 'name' && $dir == 'asc') up @endif">
                    <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                    <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                  </svg>
                </div>
                <div class="supplier-col pointer @if($sort=='cities') active @endif" data-sort="cities"data-dir="@if($sort == 'cities' && $dir == 'asc') desc @else asc @endif">
                  @lang('message.city')
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'cities' && $dir == 'desc') down @endif @if($sort == 'cities' && $dir == 'asc') up @endif">
                    <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                    <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                  </svg>
                </div>
                <div class="supplier-col pointer @if($sort=='email') active @endif" data-sort="email"data-dir="@if($sort == 'email' && $dir == 'asc') desc @else asc @endif">
                  E-mail
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'email' && $dir == 'desc') down @endif @if($sort == 'email' && $dir == 'asc') up @endif">
                    <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                    <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                  </svg>
                </div>
                <div class="supplier-col">
                  @lang('message.comment1')
                </div>
                <div class="supplier-col">
                  @lang('message.status')
                </div>
                <div class="supplier-col action-col">
                </div>
              </div>
              <div class="suppliers-tbody">
                @include('front.crm.suppliers.rows')
              </div>
              @if ($suppliers->lastPage() > 1)
              <div class="result-paginator" data-current-page="{{ $suppliers->currentPage() }}" data-total-page="{{ $suppliers->lastPage() }}">
                <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span> @lang('message.suppliers_')</button>
                <div class="result-paginator__pages">
                  <div class='result-paginator__prev'>
                    <i class="fa fa-arrow-left"></i>
                    <a href="{!! $suppliers->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                  </div>
                  {!! $suppliers->appends($params)->links() !!}
                  <div class='result-paginator__next'>
                    <a href="{!! $suppliers->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                    <i class="fa fa-arrow-right"></i>
                  </div>                  
                </div>
              </div>
              @endif
            @else
              <div class="no-data" @if($search) style="width:100%" @endif>
                <svg width="60" height="62" viewBox="0 0 60 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M49.5456 27.2737C49.5456 39.5746 39.5737 49.5465 27.2728 49.5465C14.9719 49.5465 5 39.5746 5 27.2737C5 14.9727 14.9719 5.00086 27.2728 5.00086C39.5737 5.00086 49.5456 14.9727 49.5456 27.2737ZM44.2746 48.5997C39.6123 52.3216 33.7024 54.5465 27.2728 54.5465C12.2104 54.5465 0 42.336 0 27.2737C0 12.2113 12.2104 0.000854492 27.2728 0.000854492C42.3352 0.000854492 54.5456 12.2113 54.5456 27.2737C54.5456 34.1048 52.0341 40.3494 47.8841 45.1344L59.6231 58.3407L55.886 61.6625L44.2746 48.5997Z" fill="#3D445C"/>
                </svg>
                <span class="no-data-title">
                  @lang('message.no_result')
                </span>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- RESULT SEARCH (END) -->

<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

@include('add.footer')

<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
<style>
.supplier-block{
  border-bottom: solid 1px #CDD4D9;
}
.suppliers-thead,
.supplier-row{
  display: flex;
  align-items: center;
}
.supplier-col{
  flex: 1.2;
  padding: 12px 16px;
  font-family: 'Helvetica Neue';
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 20px;
  color: #3D445C;
} 
.supplier-row .supplier-col{
  padding: 18px;
} 
.supplier-col.action-col{
  flex:0.4;
}
.supplier-name{
  display: flex;
  align-items: flex-start;
}
.supplier-col .up-down{
  margin-right: 12px;
}
.second-line{
  display: block;
  margin-top: 2px;
  font-family: 'Helvetica Neue';
  font-style: normal;
  font-weight: 400;
  font-size: 13px;
  line-height: 20px;
  color: #8B8F9D;
}
.supplier-block.current{
  background: #F9F9FA;
}
.supplier-block.current .up-down svg{
  transform: rotateZ(180deg);
}
.supplier-row-selects{
  padding: 30px 28px 30px 40px;
}
.supplier-row-selects .supplier-info{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.supplier-row-selects .supplier-info .supplier-info-item{
  /*flex: 1;*/
  display: flex;
  width: 50%;
  flex-shrink: 0;
}
.supplier-row-selects .supplier-info .supplier-info-item .name,
.supplier-row-selects .supplier-info .supplier-info-item .value{
  flex: 1;
  padding-bottom: 15px;
}
.supplier-row-selects .supplier-info .supplier-info-item .name{
  font-style: normal;
  font-weight: 400;
  font-size: 13px;
  line-height: 16px;
  color: #8B8F9D;
}
.supplier-row-selects .supplier-info .supplier-info-item .value a{
  color: #FC6B40;
}
.supplier-row-selects .right-block a{
  color:#FC6B40;
  display:flex;
  align-items: center;
}
.supplier-row-selects .right-block a svg{
  margin-right: 5px;
}
.mw1460 .field-container .input-block.short-select-block,
.mw1460 .field-container .input-block select.search-form-select{
  width: 200px;
}
.city-block.hide{
  display:none;
}
.supplier-row-selects td{
  padding: 10px;
}
</style>
<script>
var page = '{{$page}}';
currentPage = {{$page}};
document.del_click = false;
var main_url = '/manager/suppliers';
var page_type = 'suppliers';
let param_sort = '{{$params['sort']}}';
let param_dir =  '{{$params['dir']}}';
</script>

  <script>
    document.addEventListener('submit', function (e) {
      if (e.target.matches('.status-update-form')) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const action = form.getAttribute('action');

        fetch(action, {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: formData,
        })
                .then(res => res.json())
                .then(data => {
                  if (data.success) {
                    toastr.success(data.message);
                  } else {
                    toastr.error(data.message);
                  }
                })
                .catch(() => {
                  toastr.error('Ошибка при отправке запроса');
                });
      }
    });

  </script>

@include('front.crm.scripts')
<script>
  $('.al-power-tip').powerTip({placement: 's'});
  $(document).on('click', '.suppliers-thead .supplier-col', function(){
      let data = {};
      data.sort = $(this).data('sort');
      data.dir  = space_del($(this).data('dir'));
      const str = new URLSearchParams(data).toString();
      window.location = main_url+'?'+str;
    });
  $(document).on('change', '.region-select', function(){
    const regionId = $(this).val();
    $.post('/manager/suppliers/get-cities-by-region/'+regionId,{},function(data){
      $('.city-block').removeClass('hide');
      $('.city-select').select2('destroy').empty().select2({data: data, minimumResultsForSearch: -1});
    });
  })
</script>
@if(session('success') || @$success)
<script>
notify("����������� <b>{{ @$name }} </b> ������� ���������!");
</script>
@endif  