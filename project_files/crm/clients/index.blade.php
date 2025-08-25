@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
$webp = "";
@endphp

  <section id="result-search-list" class="al-leeds-page @if(Auth::user()->role_id == 1 || 1) for-admin @endif">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters">
        <div class="container container-base container-search-result manager-search mw1460">
          <h1 class="title-search-result">
            {{ $data['seo']->h1_title }}
          </h1>
          {{--
          <div class="favorite-viewed-tab">
            @if(Auth::user()->role_id != 5)
            <a href="/manager/leads">Лиды</a>
            @endif
            <a href="/manager/clients" class="active">Клиенты</a>
          </div>
          --}}
          <div class="content-block clearfix">

          <div class="leads-table">
            <div class="header-block">
              <div class="search-block">
                <form action="/manager/clients" method="GET" class="search-form field-container">

                  <input type="hidden" name="start_date" id="start_date_hidden">
                  <input type="hidden" name="end_date" id="end_date_hidden">

                  <div class="input-block">
                    <label for="leads_search">@lang('message.search')</label>
                    <input type="text" name="s" value="{{@$search}}" id="leads_search" />
                    <svg class="clear-search @if(!@$search) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                    </svg>
                  </div>
                  @if(in_array(Auth::user()->role_id,[1,5]) )
                  @if(Auth::user()->id != 273)
                  <div class="input-block w260">
                    <label>@lang('message.manager')</label>
                    <select name="user_id">
                      <option value="all">@lang('message.all')</option>
                      
                    @foreach($users as $user)
                      @if((!in_array($user->id,[1,202,260]) && Auth::user()->role_id == 5) || Auth::user()->role_id == 1)  
                      <option value="{{$user->id}}" @if(@$params['user_id'] == $user->id) selected @endif>{{$user->name}}</option>
                      @endif
                    @endforeach
                    </select>
                  </div>
                  @endif
                  @if(Auth::user()->role_id == 1)
                  <div class="input-block w260">
                    <label>@lang('message.city')</label>
                    <select name="city_id">
                      <option></option>
                    @foreach($cities as $city)
                      <option value="{{$city->id}}" @if(@$params['city_id'] == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                    </select>
                  </div>
                  @endif
                  @endif
                  <div class="input-block w260">
                    <label>@lang('message.status')</label>
                    <select name="active">
                      <option value="-">@lang('message.all')</option>
                      @foreach($activeStatuses as $status)
                        <option value="{{$status->id}}" @if(isset($params['active']) && $params['active'] == $status->id) selected @endif>{{$status->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="input-block w260">
                    <label>@lang('message.class')</label>
                    <select name="class_id">
                      <option></option>
                      @foreach($classes as $class)
                        <option value="{{$class->id}}"
                                @if(@$params['class_id'] == $class->id) selected @endif>{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group mr-2 input-block">
                    <label style="color: rgba(0, 0, 0, 0.3)">Время</label>
                    <select name="date_range" id="date_range" class="form-control" style="width: 220px;">
                      <option value="" disabled @if(!isset($params['date_range'])) selected @endif hidden>Выберите период</option>
                      <option value="today" @if(isset($params['date_range']) && $params['date_range'] == 'today') selected @endif>Сегодня</option>
                      <option value="yesterday" @if(isset($params['date_range']) && $params['date_range'] == 'yesterday') selected @endif>Вчера</option>
                      <option value="current_week" @if(isset($params['date_range']) && $params['date_range'] == 'current_week') selected @endif>Текущая неделя</option>
                      <option value="last_week" @if(isset($params['date_range']) && $params['date_range'] == 'last_week') selected @endif>Прошлая неделя</option>
                      <option value="current_month" @if(isset($params['date_range']) && $params['date_range'] == 'current_month') selected @endif>Текущий месяц</option>
                      <option value="last_month" @if(isset($params['date_range']) && $params['date_range'] == 'last_month') selected @endif>Прошлый месяц</option>
                      <option value="all_time" @if(isset($params['date_range']) && $params['date_range'] == 'all_time') selected @endif>Всё время</option>
                      <option value="custom" @if(isset($params['date_range']) && $params['date_range'] == 'custom') selected @endif>Пользовательский диапазон</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="right-block">
                <div class="show-block">
                  <div class="switcher-block">
                    <div class="switcher-label">@lang('message.with_selections')</div>
                    <div class="switcher">
                      <input type='checkbox' class='ios8-switch' id='show-with-selection' @if($with_selection == "true") checked @endif >
                      <label for='show-with-selection'>&nbsp;</label>
                    </div>
                  </div>
                </div>
                @if(Auth::user()->role_id != 263 && Auth::user()->id != 273)
                <div class="add-block">
                  <a href="{{ route('clients.add') }}" class="btn btn-main">@lang('message.add_client')</a>
                </div>
                @endif
              </div>
            </div>
            <div class="leads-thead">
              <div class="leads-col lead-name @if($sort=='name') active @endif" data-sort="name" data-dir="@if($sort == 'name' && $dir == 'asc') desc @else asc @endif">
                @lang('message.name3')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'name' && $dir == 'desc') down @endif @if($sort == 'name' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              <div class="leads-col lead-name @if($sort=='fio') active @endif" data-sort="fio" data-dir="@if($sort == 'fio' && $dir == 'asc') desc @else asc @endif" style="padding-left: 5px;">
                @lang('message.fio2')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'fio' && $dir == 'desc') down @endif @if($sort == 'name' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              {{--@if(Auth::user()->id != 273)--}}
              <div class="leads-col @if($sort=='email') active @endif" style="overflow: hidden; text-overflow: ellipsis; flex: 0 0 155px" data-sort="email"data-dir="@if($sort == 'email' && $dir == 'asc') desc @else asc @endif">
                E-mail
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'email' && $dir == 'desc') down @endif @if($sort == 'email' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              <div class="leads-col @if($sort=='phone') active @endif" data-sort="phone"data-dir="@if($sort == 'phone' && $dir == 'asc') desc @else asc @endif">
                @lang('message.phone')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'phone' && $dir == 'desc') down @endif @if($sort == 'phone' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              {{--@endif--}}
              <div class="leads-col @if($sort=='cities') active @endif" data-sort="cities"data-dir="@if($sort == 'cities' && $dir == 'asc') desc @else asc @endif">
                @lang('message.city')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'cities' && $dir == 'desc') down @endif @if($sort == 'cities' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              @if(Auth::user()->role_id == 1 || Auth::user()->id == 207)
              <div class="leads-col lead-name @if($sort=='user_id') active @endif" data-sort="user_id" data-dir="@if($sort == 'user_id' && $dir == 'asc') desc @else asc @endif">
                @lang('message.manager')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'name' && $dir == 'desc') down @endif @if($sort == 'name' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              @endif
              @if(Auth::user()->role_id == 1)
              <div class="leads-col lead-name with-filter" style="hyphens: manual; flex: 0 0 125px">
                @lang('message.source')
                @if(Auth::user()->role_id == 1)
                <span class="pointer filter-ico">
                  <svg width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.22657 2C2.50087 2 1.58526 4.03892 2.73175 5.32873L8.99972 12.3802V19C8.99972 19.3788 9.21373 19.725 9.55251 19.8944L13.5525 21.8944C13.8625 22.0494 14.2306 22.0329 14.5255 21.8507C14.8203 21.6684 14.9997 21.3466 14.9997 21V12.3802L21.2677 5.32873C22.4142 4.03893 21.4986 2 19.7729 2H4.22657Z" fill="#000000"/>
                  </svg>
                </span>
                <div class="row-filter hide">
                  @foreach($source as $key => $value)
                    <label for="si_{{$key}}">
                      <input type="checkbox" name="source[]" id="si_{{$key}}" value="{{$value ?: '-'}}" @if(isset($params['source']) && in_array($value,$params['source'])) checked @endif/> {{$value ?: '-'}}
                    </label>
                  @endforeach
                  <span class="btn btn-style leads-apply-filter">@lang('message.apply')</span>
                </div>
                @endif
              </div>
              @endif
              @if(Auth::user()->role_id == 1)
              <div class="leads-col with-filter">
                @lang('message.channel')
                <span class="pointer filter-ico">
                  <svg width="12px" height="12px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.22657 2C2.50087 2 1.58526 4.03892 2.73175 5.32873L8.99972 12.3802V19C8.99972 19.3788 9.21373 19.725 9.55251 19.8944L13.5525 21.8944C13.8625 22.0494 14.2306 22.0329 14.5255 21.8507C14.8203 21.6684 14.9997 21.3466 14.9997 21V12.3802L21.2677 5.32873C22.4142 4.03893 21.4986 2 19.7729 2H4.22657Z" fill="#000000"/>
                  </svg>
                </span>
                <div class="row-filter hide">
                  @foreach($utm_channel as $key => $value)
                    <label for="ci_{{$key}}">                    
                      <input type="checkbox" name="utm_channel[]" id="ci_{{$key}}" value="{{$value ?: '-'}}" @if(isset($params['utm_channel']) && in_array($value,$params['utm_channel'])) checked @endif/> {{$value ?: '-'}}
                    </label>
                  @endforeach
                  <span class="btn btn-style leads-apply-filter">@lang('message.apply')</span>
                </div>
              </div>
              
              <div class="leads-col binotel-info">
                @lang('message.call_type')
              </div>
              <div class="leads-col binotel-info">
                @lang('message.state')
              </div>
              @endif
                <div class="leads-col">
                  @lang('message.client_status')
                </div>
              @if(Auth::user()->role_id == 1)
              <div class="leads-col @if($sort=='lead_created_at') active @endif" data-sort="lead_created_at"data-dir="@if($sort == 'lead_created_at' && $dir == 'asc') desc @else asc @endif">
                @lang('message.lead_created_at')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'created_at' && $dir == 'desc') down @endif @if($sort == 'created_at' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              @endif
              <div class="leads-col @if($sort=='created_at') active @endif" data-sort="created_at"data-dir="@if($sort == 'created_at' && $dir == 'asc') desc @else asc @endif">
                @lang('message.creation_date')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'created_at' && $dir == 'desc') down @endif @if($sort == 'created_at' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>

              <div class="leads-col @if($sort=='updated_at') active @endif" data-sort="updated_at"data-dir="@if($sort == 'updated_at' && $dir == 'asc') desc @else asc @endif">
                @lang('message.updated_at')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'updated_at' && $dir == 'desc') down @endif @if($sort == 'updated_at' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>

              <div class="leads-col action-col">
              </div>
            </div>
            @if(@count($clients))
            <div class="leads-tbody">
              @include('front.crm.clients.rows')
            </div>

              @if ($clients->lastPage() > 1)
              <div class="result-paginator" data-current-page="{{ $clients->currentPage() }}" data-total-page="{{ $clients->lastPage() }}">
                <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span> @lang('message.show_more_clients')</button>
                <div class="result-paginator__pages">
                  <div class='result-paginator__prev'>
                    <i class="fa fa-arrow-left"></i>
                    <a href="{!! $clients->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                  </div>
                  {!! $clients->appends($params)->links() !!}
                  <div class='result-paginator__next'>
                    <a href="{!! $clients->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
                    <i class="fa fa-arrow-right"></i>
                  </div>                  
                </div>
              </div>
              @endif
              <br><br>
              <a class="pointer export-data btn btn-style" style="padding: 0 20px; color:white;">@lang('message.data_export')</a>
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

    <div id="selected_date_range"></div>

    <div id="custom_date_range_modal" class="modal_time">
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="form-group">
          <label for="custom_start_date" class="mr-2">Начальная дата:</label>
          <input type="date" id="custom_start_date" name="custom_start_date" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="custom_end_date" class="mr-2">Конечная дата:</label>
          <input type="date" id="custom_end_date" name="custom_end_date" class="form-control" required>
        </div>
        <button id="custom_date_range_submit" class="btn def-custom-btn">Применить</button>
      </div>
    </div>
  </section>
<!-- RESULT SEARCH (END) -->



<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

@include('add.footer')
@if(session('success') || @$success)
<div class="success-mesage">
  @if(session('edit'))
  @lang('message.your_client') <b>{{ session('name') }}</b> @lang('message.successfully_update')
  @endif
  @if(@$add)
      @lang('message.your_client') <b>{{ @$name }} </b> @lang('message.successfully_add')
  @endif
</div>
@endif
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')

  @if(session('merged'))
    <div class="success-mesage">
      @lang('message.you_merged_clients')
      <div class="notify-close">×</div>
    </div>
  @endif
  @if(session('already-merged'))
    <div class="success-mesage">
      @lang('message.already-merged')!
      <div class="notify-close">×</div>
    </div>
  @endif
  @if(session('merge-error'))
    <div class="success-mesage">
      @lang('message.request_error')
      <div class="notify-close">×</div>
    </div>
  @endif

<div class="import-block hide zi10101">
    <div class="close"><svg viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="11"  x2="11" y2="1" stroke="#aaa" stroke-width="2"/><line x1="1" y1="1" x2="11" y2="11" stroke="#aaa" stroke-width="2"/></svg></div>
    <h2>@lang('message.import_from_excel')</h2>
    <div><a href="/import/import.xlsx" class="red-link">@lang('message.example_file')</a></div><br />
    <form method="post" action="" enctype="multipart/form-data" id="import-form">
        <div>
            <input type="file" name="import_file"/>
        </div><br />
        <button class="btn-style btn" id="import-button">@lang('message.import_button')</button>
    </form>
</div>

  <div class="confirm-popup2" style="z-index:10111">
    <div class='confirm-header'>
      <span class="confirm-title"></span>
      <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="confirm-body">
      <div class="confirm-message"></div>
      <div class="align-right confirm-action">
        <a class="cancel pointer">@lang('message.cancel')</a>
        <a class="yes pointer">@lang('message.yes')</a>
      </div>
    </div>
  </div>
  <div class="default-popup deactivate-client-form hide">
    <div class='default-popup-header'>
      <span>@lang('message.deactivate_company')</span>
      <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="default-popup-body">
      <form method="POST" enctype="multipart/form-data" id="deactivate-form">
        <input type="hidden" name="client_id" value=""/>
        <input type="hidden" name="active" value="0">
        <input type="hidden" name="from_main" value="1"/>
        <div class="field-container">
          <div class="input-block mr-15">
            <label>@lang('message.inactive_from'):</label>
            <input type="text" name="date_from" value="" required/>
          </div>
          <div class="input-block">
            <label>@lang('message.inactive_reason')</label>
            <input type="file" name="reason_file"/>
          </div>
        </div>
        <div class="field-container">
          <div class="textarea-block">
            <label>@lang('message.reason_')</label>
            <textarea name="reason"></textarea>
          </div>
        </div>
        <div class="align-right">
          <a class="clear-new pointer">@lang('message.cancel')</a>
          <button class="submit">@lang('message.save')</button>
        </div>
      </form>
    </div>
  </div>

  <style>
    .mw1460 .search-form.field-container {
      width: 950px;
      flex-direction: row;
      flex-wrap: wrap;
    }
    .default-popup.hide{
      display:none;
    }
    .field-container.right{
      justify-content: flex-end;
    }
    .buttons-block{
      text-align: right;
      padding-bottom: 15px;
    }
    .field-container .input-block .error,
    .input-block span.error{
      color: #FC6B40;
      line-height: 25px;
      display: block;
    }
    .input-block.hide{
      display:none;
    }
    .field-container .input-block.mr-15{
      margin-right: 15px;
    }
    .default-popup input[type=file]{
      border: none;
      background: none;
      padding-top: 10px;
    }
    .default-popup .textarea-block{
      width: 100%;
    }
    .default-popup .textarea-block label{
      display: block;
      font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
      font-style: normal;
      font-weight: 500;
      font-size: 13px;
      line-height: 16px;
      color: #ADB0B9;
      margin-bottom: 5px;
    }
    .default-popup .textarea-block textarea{
      width: 100%;
      box-sizing: border-box;
      padding: 3px;
      border: solid 1px #CDD4D9;
      background: #F6F7F9;
      resize: none;
      height: 100px;
      margin-bottom: 15px;
    }
  </style>

<style>

.mw1460 .field-container .input-block select[name=user_id], 
.mw1460 .field-container .input-block select[name=city_id],
.mw1460 .field-container .input-block select[name=date_range],
.mw1460 .field-container .input-block.w260{
  width: 260px;
}
  .for-admin select{
    width: 260px !important;
  }
  /*.for-admin .mw1460 .field-container .input-block select[name=user_id],
  .for-admin .mw1460 .field-container .input-block select[name=city_id],
  .for-admin .mw1460 .field-container .input-block.w260{
    width: 160px;
  }*/
.selected-line{
  background: #FFF0EC;
}
.select2-container{
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;

  /*padding:  0 20px 0 11px;*/
  @if(Auth::user()->role_id == 1)
  width: 160px;
  @else
  width: 263px;
  @endif
  /*height: 42px;*/

  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;
  background: white;
}

.input-block .select2-selection--multiple{
  width: 263px;
}
.select2-selection__rendered{
  height:  40px;
  background: white;
}
.select2-container--default .select2-selection--single{
  width: 100%;
  height: 40px !important;
  border: none !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
  /*padding: 0 !important;*/
}
.input-block .select2-selection__rendered {
  /*height: auto;*/
  background: white;
  flex-wrap: wrap;
}
.search-form .select2-container {
  z-index: 100;
}
.select2-container--default .select2-selection--multiple{
  border: none !important;
  padding-bottom:0;
  min-height: 40px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
  line-height: 28px;
  border: none;
  border-radius: 0;
  display: flex;
  align-items: center;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__display{
  padding: 0px 4px 0px 5px;
  font-size: 13px;
  /*line-height: 18px;*/
}
.select2-selection__choice__remove span{
  width: 12px;
  height: 12px;
  display: block;
  line-height: 12px;
  margin-right: 5px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
  border-right: none;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
  background: none;
}
.select2-container--default .select2-search--inline .select2-search__field{
  line-height: 30px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple{
  border: none;
}
.select2-dropdown--below{
  /*width: 263px !important;*/
}
.field-container .input-block input{
  background: white;
}
.field-container .input-block textarea{
  background: white;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 0px;
    right: 1px;
    width: 20px;
}
.select2-selection__rendered {
    height: 40px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 8px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.leads-col.action-col{
  flex:1;
}
.action-col a.edit{
  margin-right:0;
}
.change-popup-body form{
    padding: 0;
}

.modal_time {
  display: none; /* По умолчанию скрыто */
  position: absolute;
  z-index: 9999; /* Установите высокий z-index, чтобы модальное окно было поверх других элементов */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  overflow: auto; /* Добавляем прокрутку, если содержимое модального окна превышает видимую область */
  align-items: center;
  justify-content: center;
}

/* Контент модального окна */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  border-radius: 5px;
  width: 10%; /* Регулируйте ширину по вашему выбору */
}

/* Кнопка закрытия */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>

<script>
var page = '{{$page}}';
currentPage = {{$page}};
document.del_click = false;
var main_url = '/manager/clients';
var page_type = 'clients';
let param_sort = '{{$params['sort']}}';
let param_dir =  '{{$params['dir']}}';
$('#lead_cities').change(function(){
  setTimeout(function(){
    let h1 = $('.lead-add-header').height();
    let h2 = $('.lead-add-form').height();
    let new_h = h1+h2+51;
    $('.lead-add-popup').css('height',new_h+'px').css('margin-top','-'+(new_h/2)+'px');
  }, 200);
})
document.getElementById('date_range').addEventListener('change', function () {
  if (this.value === 'custom') {
    document.getElementById('custom_date_range_modal').style.display = 'flex';
  } else {
    document.getElementById('custom_date_range_modal').style.display = 'none';
    document.getElementById('selected_date_range').innerText = '';
  }

  console.log("srs" + this.value)

  let startDate = '';
  let endDate = '';
  let testDate = '2024-05-06';

  switch (this.value) {
    case 'today':
      startDate = new Date().toISOString().split('T')[0];
      endDate = startDate;
      break;
    case 'yesterday':
      let yesterday = new Date();
      yesterday.setDate(yesterday.getDate() - 1);
      startDate = yesterday.toISOString().split('T')[0];
      endDate = yesterday.toISOString().split('T')[0];
      break;
    case 'current_week':
      let currentWeek = new Date();
      let dayOfWeek = currentWeek.getDay();
      let diff = currentWeek.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 : 1);
      startDate = new Date(currentWeek.setDate(diff)).toISOString().split('T')[0];
      endDate = new Date(currentWeek.setDate(diff + 6)).toISOString().split('T')[0];
      break;
    case 'last_week':
      let today = new Date();

      if (today.getDay() === 0) {
        today.setDate(today.getDate() - 6);
      }

      let lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);

      let prevWeekStart = new Date(lastWeek.setDate(lastWeek.getDate() - lastWeek.getDay() + 2));
      let prevWeekEnd = new Date(lastWeek.setDate(prevWeekStart.getDate() + 6));

      startDate = prevWeekStart.toISOString().split('T')[0];
      endDate = prevWeekEnd.toISOString().split('T')[0];
      break;
    case 'current_month':
      let currentMonthStart = new Date(new Date().getFullYear(), new Date().getMonth(), 1);
      currentMonthStart = new Date(currentMonthStart.setDate(currentMonthStart.getDate() + 1))
      startDate = currentMonthStart.toISOString().split('T')[0];

      let currentMonthEnd = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0);
      currentMonthEnd = new Date(currentMonthEnd.setDate(currentMonthEnd.getDate() + 1))
      endDate = currentMonthEnd.toISOString().split('T')[0];
      break;
    case 'last_month':
      let lastMonthStart = new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1);
      lastMonthStart = new Date(lastMonthStart.setDate(lastMonthStart.getDate() + 1))
      startDate = lastMonthStart.toISOString().split('T')[0];

      let lastMonthEnd = new Date(new Date().getFullYear(), new Date().getMonth(), 0);
      lastMonthEnd = new Date(lastMonthEnd.setDate(lastMonthEnd.getDate() + 1))
      endDate = lastMonthEnd.toISOString().split('T')[0];
      break;
    case 'all_time':
      startDate = '2000-01-01';
      endDate = new Date().toISOString().split('T')[0];
      break;
    default:
      startDate = '';
      endDate = '';
  }
  document.getElementById('start_date_hidden').value = startDate;
  document.getElementById('end_date_hidden').value = endDate;

  if (this.value !== 'custom') {
    let params = new URLSearchParams(window.location.search);
    params.set('start_date', startDate);
    params.set('end_date', endDate);
    params.set('date_range', this.value);
    window.location.href = window.location.pathname + '?' + params.toString();
  }
});

document.getElementById('custom_date_range_submit').addEventListener('click', function () {
  document.getElementById('custom_date_range_modal').style.display = 'none';
});


document.querySelector("#custom_date_range_modal .close").addEventListener('click', function () {
  document.getElementById('custom_date_range_modal').style.display = 'none';
});

document.getElementById('custom_date_range_submit').addEventListener('click', function () {
  let startDate = document.getElementById('custom_start_date').value;
  let endDate = document.getElementById('custom_end_date').value;

  document.getElementById('start_date_hidden').value = startDate;
  document.getElementById('end_date_hidden').value = endDate;

  document.getElementById('selected_date_range').innerText = startDate + ' - ' + endDate;

  document.getElementById('custom_date_range_modal').style.display = 'none';
  let params = new URLSearchParams(window.location.search);
  params.set('start_date', startDate);
  params.set('end_date', endDate);
  params.set('date_range', 'custom');
  window.location.href = window.location.pathname + '?' + params.toString();
});


function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
          results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
</script>

@include('front.crm.scripts')

  @if(session('success') || @$success || session('merged') || session('already-merged'))
    <script>
      //let w = $('.success-mesage').width();
      //$('.success-mesage').css('margin-left','-'+(w/2)+'px');
      $('.success-mesage').css('opacity', '1');
      if (window.location.href.indexOf("created")) {
        window.history.pushState({}, $('title').text(), main_url);
      }
      setTimeout(function () {
        $('.success-mesage').css('opacity', '0');
        $('body').find('.success-mesage').remove();
      }, 15000)
    </script>
  @endif

<script>
  $('.al-power-tip').powerTip({placement: 's'});
  window.submitAllowed = true;
  window.deactivatePage = true;
  $(document).ready(function(){
    $(document).on('click', '.deactivate-link', function(){
      console.log($(this).data('active'));
      $('.default-popup-body [name=active]').val(0)
      $('.default-popup-body [name=client_id]').val($(this).data('client_id'))
      $('#deactivate-form').attr('action', '/manager/clients/'+$(this).data('client_id')+'/active');
      $('.al-overlay3').removeClass('hide');
      $('.default-popup').removeClass('hide');
      window.submitAllowed = false;
    });
    const dateFrom = datepicker('[name=date_from]', {
      startDay: 1,
      customDays: ['@lang('message.sunday')', '@lang('message.monday')', '@lang('message.tuesday')', '@lang('message.wednesday')', '@lang('message.thursday')', '@lang('message.friday')', '@lang('message.saturday')'],
      customMonths: ['@lang('message.january')', '@lang('message.february')', '@lang('message.march')', '@lang('message.april')', '@lang('message.may')', '@lang('message.june')', '@lang('message.july')', '@lang('message.august')', '@lang('message.september')', '@lang('message.october')', '@lang('message.november')', '@lang('message.december')'],
      onSelect: instance => {
        console.log(instance.dateSelected)
      },
      formatter: (input, date, instance) => {
        let d = date.getDate();
        let m = date.getMonth() + 1;
        let y = date.getYear() + 1900;
        let y2 = date.getYear() - 100;
        if(d < 10){
          d = '0' + d;
        }
        if(m < 10){
          m = '0' + m;
        }
        input.value = d+'.'+m+'.'+y;
      },
    });

    $('#deactivate-form').submit(function(){
      console.log(window.submitAllowed);
      if(!window.submitAllowed) {
        console.log("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
        $('.default-popup').css('z-index','10100');
        document.secondPopup = true;
        createConfirmV2('@lang('message.deactivate_client')', '@lang('message.do_you_want_to_make_the_client_inactive')', function () {
          $('.confirm-popup2').hide();
          window.submitAllowed = true;
          $('.default-popup').addClass('hide');
          $('#deactivate-form').submit();
        })

        return false;
      }
    })
  })
</script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Cancel button functionality
      document.querySelector('#merge-clients .cancel-button').addEventListener('click', function () {
        if (document.querySelector('.jquery-modal.blocker.current')) {
          document.querySelector('.jquery-modal.blocker.current').click();
        }
      });

      // Variables
      const customRadios = document.querySelectorAll('#merge-clients input[name="new-selection"]');
      const inputGroups = document.querySelectorAll('#merge-clients #new-selection-add-lead');
      const leadsLabels = document.querySelectorAll('#merge-clients #leads-label');
      const leadFilter = document.querySelector('#merge-clients #lead-filter');
      const leadsDropdown = document.querySelector('#merge-clients #leads-dropdown');
      const leadsList = document.querySelector('#merge-clients #leads-list');

      // Hide all elements function
      function hideAllElements() {
        leadsLabels.forEach(label => label.style.display = 'none');
        inputGroups.forEach(group => group.style.display = 'none');
        leadsDropdown.style.display = 'none';
      }

      // Show elements based on selected radio value
      function showElementsBasedOnRadio(value) {
        hideAllElements();

        if (value === 'client') {
          inputGroups.forEach(group => group.style.display = 'block');
          leadsLabels.forEach(label => label.style.display = 'block');
          leadFilter.style.display = 'block';
          leadsDropdown.style.display = 'none'; // Initially hidden
        }
      }

      // Event listeners for radio buttons
      customRadios.forEach(radio => {
        radio.addEventListener('change', function () {
          document.querySelector('#merge-clients #resource-type').value = this.value;
          showElementsBasedOnRadio(this.value);
        });
      });

      // Filter functionality for leads
      leadFilter.addEventListener('focus', function () {
        leadsDropdown.style.display = 'block'; // Show dropdown on focus
      });

      leadFilter.addEventListener('blur', function () {
        setTimeout(() => {
          leadsDropdown.style.display = 'none'; // Hide dropdown when focus is lost
        }, 200); // Delay to allow click on dropdown items
      });

      leadFilter.addEventListener('input', function () {
        const filterValue = this.value.toLowerCase();
        const options = leadsList.querySelectorAll('li');

        let hasVisibleOptions = false;
        options.forEach(option => {
          const nameMatch = option.textContent.toLowerCase().includes(filterValue);
          const emailMatch = option.dataset.email.toLowerCase().includes(filterValue);
          const phoneMatch = option.dataset.phone.toLowerCase().includes(filterValue);
          const isVisible = nameMatch || emailMatch || phoneMatch;

          option.style.display = isVisible ? 'block' : 'none';
          if (isVisible) hasVisibleOptions = true;
        });

        leadsDropdown.style.display = hasVisibleOptions ? 'block' : 'none';
      });

      // Select lead on click
      leadsList.addEventListener('click', function (event) {
        console.log(event.target.dataset);
        if (event.target.tagName === 'LI') {
          leadFilter.value = event.target.textContent;
          document.querySelector('#merge-clients #lead-email').value = event.target.dataset.email;
          document.querySelector('#merge-clients #lead-phone').value = event.target.dataset.phone;
          leadsDropdown.style.display = 'none';
          if (document.querySelector('#merge-clients #resource-id')) {
            document.querySelector('#merge-clients #resource-id').value = event.target.dataset.value;
            document.querySelector('#merge-clients #resource-parent-id').value = event.target.dataset.value;

          }
        }
      });

      // Set default value
      const defaultValue = 'client';
      customRadios.forEach(radio => {
        if (radio.value === defaultValue) {
          document.querySelector('#merge-clients #resource-type').value = defaultValue;
          radio.checked = true;
          showElementsBasedOnRadio(defaultValue);
        }
      });
    });
  </script>

  @if(session('success') || @$success)
<script>
  let w = $('.success-mesage').width();
  $('.success-mesage').css('margin-left','-'+(w/2)+'px');
  $('.success-mesage').css('opacity','1');
  if(window.location.href.indexOf("created")){
    window.history.pushState({},$('title').text(),main_url);
  }
  setTimeout(function(){
    $('.success-mesage').css('opacity','0');
  },3000)

</script>
@endif  