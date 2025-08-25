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
        <div 
          class="container container-base container-search-result manager-search mw1460"
        >
          <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
          </h1>
          <div class="favorite-viewed-tab">
            <a href="/manager/leads" class="active">Лиды</a>
            <a href="/manager/clients">Клиенты</a>
          </div>  
          <div class="content-block clearfix">


@if(@count($leads))
          

          <div class="leads-table">
            <div class="search-block">
              <form action="/manager/leads" method="GET">
                <input type="text" name="s" value="{{@$search}}" placeholder="Поиск" id="leads_search" />
                <progress value="" max="100" class="leads-progress hide"></progress>
              </form>
            </div>
            <div class="leads-thead">
              <div class="leads-col @if($sort=='name') active @endif" data-sort="name" data-dir="@if($sort == 'name' && $dir == 'asc') desc @else asc @endif">
                Наименование
                <img src="/images/down.png" class="al-rotate @if($sort == 'name' && $dir == 'desc') down @else up @endif @if($sort != 'name') hide @endif"/>
              </div>
              <div class="leads-col @if($sort=='email') active @endif" data-sort="email"data-dir="@if($sort == 'email' && $dir == 'asc') desc @else asc @endif">
                E-mail
                <img src="/images/down.png" class="al-rotate @if($sort == 'email' && $dir == 'desc') down @else up @endif @if($sort!='email') hide @endif"/>
              </div>
              <div class="leads-col @if($sort=='phone') active @endif" data-sort="phone"data-dir="@if($sort == 'phone' && $dir == 'asc') desc @else asc @endif">
                Телефон
                <img src="/images/down.png" class="al-rotate @if($sort == 'phone' && $dir == 'desc') down @else up @endif @if($sort!='phone') hide @endif"/>
              </div>
              <div class="leads-col @if($sort=='cities') active @endif" data-sort="cities"data-dir="@if($sort == 'cities' && $dir == 'asc') desc @else asc @endif">
                Город
                <img src="/images/down.png" class="al-rotate @if($sort == 'cities' && $dir == 'desc') down @else up @endif @if($sort!='cities') hide @endif"/>
              </div>
              <div class="leads-col @if($sort=='created_at') active @endif" data-sort="created_at"data-dir="@if($sort == 'created_at' && $dir == 'asc') desc @else asc @endif">
                Дата создания 
                <img src="/images/down.png" class="al-rotate @if($sort == 'created_at' && $dir == 'desc') down @else up @endif @if($sort!='created_at') hide @endif"/>
              </div>
            </div>
            <div class="leads-tbody">
              @foreach($leads as $key => $item)
              <div class="leads-main-row">
                <div class="leads-row" data-id="{{$item->id}}" data-name="{{$item->name}}" data-email="{{$item->email}}" data-phone="{{$item->phone}}" data-cities='{{$item->city}}' data-comment="{{$item->comment}}">
                  <div class="leads-col">{{$item->name}}</div>
                  <div class="leads-col">{{$item->email}}</div>
                  <div class="leads-col">{{$item->phone}}</div>
                  <div class="leads-col">{{$item->cities}}</div>
                  <div class="leads-col">
                    {{$item->created_at}}
                    <a class="del" data-id="{{$item->id}}">
                      <!--<img src="/images/trash.png"/>-->
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 6C2.25 5.58579 2.58579 5.25 3 5.25H21C21.4142 5.25 21.75 5.58579 21.75 6C21.75 6.41421 21.4142 6.75 21 6.75H3C2.58579 6.75 2.25 6.41421 2.25 6Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.75C9.66848 2.75 9.35054 2.8817 9.11612 3.11612C8.8817 3.35054 8.75 3.66848 8.75 4V5.25H15.25V4C15.25 3.66848 15.1183 3.35054 14.8839 3.11612C14.6495 2.8817 14.3315 2.75 14 2.75H10ZM16.75 5.25V4C16.75 3.27065 16.4603 2.57118 15.9445 2.05546C15.4288 1.53973 14.7293 1.25 14 1.25H10C9.27065 1.25 8.57118 1.53973 8.05546 2.05546C7.53973 2.57118 7.25 3.27065 7.25 4V5.25H5C4.58579 5.25 4.25 5.58579 4.25 6V20C4.25 20.7293 4.53973 21.4288 5.05546 21.9445C5.57118 22.4603 6.27065 22.75 7 22.75H17C17.7293 22.75 18.4288 22.4603 18.9445 21.9445C19.4603 21.4288 19.75 20.7293 19.75 20V6C19.75 5.58579 19.4142 5.25 19 5.25H16.75ZM5.75 6.75V20C5.75 20.3315 5.8817 20.6495 6.11612 20.8839C6.35054 21.1183 6.66848 21.25 7 21.25H17C17.3315 21.25 17.6495 21.1183 17.8839 20.8839C18.1183 20.6495 18.25 20.3315 18.25 20V6.75H5.75Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.25C10.4142 10.25 10.75 10.5858 10.75 11V17C10.75 17.4142 10.4142 17.75 10 17.75C9.58579 17.75 9.25 17.4142 9.25 17V11C9.25 10.5858 9.58579 10.25 10 10.25Z" fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 10.25C14.4142 10.25 14.75 10.5858 14.75 11V17C14.75 17.4142 14.4142 17.75 14 17.75C13.5858 17.75 13.25 17.4142 13.25 17V11C13.25 10.5858 13.5858 10.25 14 10.25Z" fill="#FC6B40"/>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="leads-row-selects hide">
                  {{-- dump($item->selections) --}}
                  @if(@count($item->selections))
                  
                  <b>Подборки</b>
                  <div class="leads-selections">
                    <div class="selection-item selection-head">
                      <div class="selection-col">id</div>
                      <div class="selection-col">Дата создания</div>
                      <div class="selection-col">Менеджер</div>
                      <div class="selection-col">Количество плоскостей</div>
                    </div>
                    @foreach($item->selections as $k => $v)
                    <a href="/manager/selection/{{$v->id}}" class="ajax-popup-link">
                      <div class="selection-item pointer">
                        <div class="selection-col">{{ $v->id }}</div>
                        <div class="selection-col">{{ $v->created_at }}</div>
                        <div class="selection-col">{{ $v->manager }}</div>
                        <div class="selection-col" id="selection_count_{{$v->id}}">{{ $v->boards_count }}</div>
                      </div>
                    </a>
                    @endforeach
                  </div>
                  @else
                  Подборки отсутствуют
                  @endif
                </div>
              </div>
              @endforeach
            </div>
              {!! $leads->appends($params)->links() !!}
          </div>

@else
        @if($search)
            <div class="search-block" style="width:calc(100% - 360px);float:left;">
              <form action="/manager/leads" method="GET">
                <input type="text" name="s" value="{{@$search}}" placeholder="Поиск" id="leads_search" />
                <progress value="" max="100" class="leads-progress hide"></progress>
              </form>
        @endif
          <div class="no-data" @if($search) style="width:100%" @endif>
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="eye">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8039 40.0001C13.1176 40.5899 13.5653 41.3972 14.1429 42.3536C15.4103 44.4522 17.2859 47.2412 19.7208 50.0188C24.6495 55.6411 31.5208 60.8334 40 60.8334C48.4792 60.8334 55.3505 55.6411 60.2792 50.0188C62.7141 47.2412 64.5898 44.4522 65.8571 42.3536C66.4347 41.3972 66.8824 40.5899 67.1961 40.0001C66.8824 39.4103 66.4347 38.603 65.8571 37.6466C64.5898 35.548 62.7141 32.759 60.2792 29.9814C55.3505 24.3591 48.4792 19.1667 40 19.1667C31.5208 19.1667 24.6495 24.3591 19.7208 29.9814C17.2859 32.759 15.4103 35.548 14.1429 37.6466C13.5653 38.603 13.1176 39.4103 12.8039 40.0001ZM70 40.0001C72.2647 38.9413 72.2643 38.9404 72.2639 38.9395L72.2599 38.931L72.2511 38.9123L72.2213 38.85C72.1961 38.7975 72.1601 38.7235 72.1135 38.6293C72.0204 38.441 71.8845 38.172 71.7066 37.8337C71.3509 37.1575 70.8261 36.2027 70.1372 35.0619C68.7625 32.7855 66.7178 29.7412 64.039 26.6854C58.7404 20.641 50.6117 14.1667 40 14.1667C29.3883 14.1667 21.2596 20.641 15.961 26.6854C13.2822 29.7412 11.2375 32.7855 9.8628 35.0619C9.17386 36.2027 8.64908 37.1575 8.29343 37.8337C8.11551 38.172 7.97965 38.441 7.88647 38.6293C7.83987 38.7235 7.80393 38.7975 7.77871 38.85L7.74893 38.9123L7.74009 38.931L7.73719 38.9372C7.73676 38.9381 7.73529 38.9413 10 40.0001L7.73529 38.9413C7.42157 39.6123 7.42157 40.3879 7.73529 41.0589L10 40.0001C7.73529 41.0589 7.73486 41.058 7.73529 41.0589L7.74009 41.0691L7.74893 41.0878L7.77871 41.1502C7.80393 41.2026 7.83987 41.2767 7.88647 41.3708C7.97965 41.5592 8.11551 41.8282 8.29343 42.1665C8.64908 42.8426 9.17386 43.7975 9.8628 44.9383C11.2375 47.2146 13.2822 50.259 15.961 53.3147C21.2596 59.3591 29.3883 65.8334 40 65.8334C50.6117 65.8334 58.7404 59.3591 64.039 53.3147C66.7178 50.259 68.7625 47.2146 70.1372 44.9383C70.8261 43.7975 71.3509 42.8426 71.7066 42.1665C71.8845 41.8282 72.0204 41.5592 72.1135 41.3708C72.1601 41.2767 72.1961 41.2026 72.2213 41.1502L72.2511 41.0878L72.2599 41.0691L72.2628 41.063C72.2632 41.062 72.2647 41.0589 70 40.0001ZM70 40.0001L72.2647 41.0589C72.5784 40.3879 72.5776 39.6105 72.2639 38.9395L70 40.0001Z" fill="#3D445C"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M40.0007 35.8333C37.6995 35.8333 35.834 37.6987 35.834 39.9999C35.834 42.3011 37.6995 44.1666 40.0007 44.1666C42.3018 44.1666 44.1673 42.3011 44.1673 39.9999C44.1673 37.6987 42.3018 35.8333 40.0007 35.8333ZM30.834 39.9999C30.834 34.9373 34.938 30.8333 40.0007 30.8333C45.0633 30.8333 49.1673 34.9373 49.1673 39.9999C49.1673 45.0625 45.0633 49.1666 40.0007 49.1666C34.938 49.1666 30.834 45.0625 30.834 39.9999Z" fill="#3D445C"/>
            </svg>
            <span class="no-data-title">
              Список лидов пуст
            </span>
          </div>
        @if($search)
            </div>
        @endif
@endif
            <div class="leads-form">
              <h2>Данные</h2>
              @if(@$old['id'])
              <form action="/manager/leads/{{$old['id']}}/update" method="POST" id="add_upd_form">
              @else
              <form action="/manager/leads/add" method="POST" id="add_upd_form">
              @endif
                <div class="input-block">
                  <label>Наименование</label>
                  <input type="text" name="name" value="{{@$old['name']}}" id="lead_name" required @if(isset($errors['name'])) class="data-error" @endif/>
                  @if(isset($errors['name']))
                  <span class="error">{{$errors['name']}}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>E-mail</label>
                  <input type="email" name="email" value="{{@$old['email']}}" id="lead_email" required @if(isset($errors['email'])) class="data-error" @endif/>
                  @if(isset($errors['email']))
                  <span class="error">{{$errors['email']}}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>Телефон</label>
                  <input type="text" name="phone" value="{{@$old['phone']}}" id="lead_phone" required @if(isset($errors['phone'])) class="data-error" @endif/>
                  @if(isset($errors['phone']))
                  <span class="error">{{$errors['phone']}}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>Город</label>
                  {{--<input type="text" name="city" value="" id="lead_city"/>--}}
                  <select class="js-example-basic-multiple" name="cities[]" multiple="multiple" id="lead_cities">
                  @foreach($cities as $key => $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                  </select>
                  @if(isset($errors['cities']))
                  <span class="error">{{$errors['cities']}}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>Примечание</label>
                  <textarea name="comment" id="lead_comment">{{@$old['comment']}}</textarea>
                </div>
                <div class="input-block">
                  <button class="clear" id="clear_button">Очистить</button>
                  @if(@$old['id'])
                  <button class="submit" id="submit_button">Обновить лида</button>
                  @else
                  <button class="submit" id="submit_button">Добавить в лиды</button>
                  @endif
                </div>
              </form>
              <hr>
              <a href="#" class="lead2client hide">
                Перевести в клиенты 
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 5.29289C8.68342 4.90237 9.31658 4.90237 9.70711 5.29289L15.7071 11.2929C16.0976 11.6834 16.0976 12.3166 15.7071 12.7071L9.70711 18.7071C9.31658 19.0976 8.68342 19.0976 8.29289 18.7071C7.90237 18.3166 7.90237 17.6834 8.29289 17.2929L13.5858 12L8.29289 6.70711C7.90237 6.31658 7.90237 5.68342 8.29289 5.29289Z" fill="#fff"/>
                </svg>

              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- RESULT SEARCH (END) -->



<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

@include('add.footer')
<div id='show-map-modal' class="modal">
  <div id="map-modal-board"></div>
</div>
<link rel="stylesheet" href="/assets/js/mp/magnific-popup.css"/>
<link rel="stylesheet" as="style" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="/assets/css/crm.css?t=20220315-1"/>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/assets/js/mp/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>

<style></style>

<script>
var page = '{{$page}}';
document.del_click = false;
var main_url = '/manager/leads';
var page_type = 'leads';
</script>

<script src="/assets/js/crm.js?t=20220315-1"></script>