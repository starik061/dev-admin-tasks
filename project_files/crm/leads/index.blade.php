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
          <h1 class="title-search-result" style="position: relative">
            {{ $data['seo']->h1_title }}

            <div class="leads-view-type">
              <div class="line-view view-item active" data-url="/manager/leads">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.66797 5H17.5013" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.66797 10H17.5013" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.66797 15H17.5013" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2.5 5H2.50833" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2.5 10H2.50833" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2.5 15H2.50833" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="box-view view-item" data-url="/manager/leads?tmplt=kanban">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.8333 2.5H4.16667C3.24619 2.5 2.5 3.24619 2.5 4.16667V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V4.16667C17.5 3.24619 16.7538 2.5 15.8333 2.5Z" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M2.5 10H17.5" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M10 2.5V17.5" stroke="#3D445C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>

          </h1>

          {{--
          <div class="favorite-viewed-tab">
            <a href="/manager/leads" class="active">Лиды</a>
            <a href="/manager/clients">Клиенты</a>
          </div>
          --}}
          <div class="content-block clearfix">




          <div class="leads-table">
            <div class="header-block">
              <div class="search-block">
                <form action="/manager/leads" method="GET" class="search-form field-container">
                  <div class="input-block w260">
                    <label for="leads_search">@lang('message.search')</label>
                    <input type="text" name="s" value="{{@$search}}" id="leads_search" />
                    {{--<progress value="" max="100" class="leads-progress hide"></progress>--}}
                    <svg class="clear-search @if(!@$search) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                    </svg>
                  </div>
                  @if(Auth::user()->role_id == 1)
                  <div class="input-block w260">
                    <label>@lang('message.manager')</label>
                    <select name="user_id">
                      <option value="all">Все</option>
                    @foreach($users as $user)
                      <option value="{{$user->id}}" @if(@$params['user_id'] == $user->id) selected @endif>{{$user->name}}</option>
                    @endforeach
                    </select>
                  </div>
                  @endif
                  <div class="input-block w260">
                    <label>@lang('message.city')</label>
                    <select name="city_id">
                      <option></option>
                    @foreach($cities as $city)
                      <option value="{{$city->id}}" @if(@$params['city_id'] == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="input-block w260">
                    <label>@lang('message.status')</label>
                    <select name="status_id">
                      <option></option>
                      @foreach($statuses as $status)
                        <option value="{{$status->id}}" @if(@$params['status_id'] == $status->id) selected @endif>{{$status->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="input-block small-input-block">
                    <label for="dt_search">@lang('message.creation_date')</label>
                    <input type="text" name="created_at" value="{{@$created_at}}" id="dt_search" />
                    <svg class="clear-search @if(!@$created_at) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                    </svg>
                  </div>
                </form>
              </div>
              <div class="right-block">
                <div class="show-block">
                  <div class="switcher-block">
                    <div class="switcher-label">@lang('message.with_selections')</div>
                    <div class="switcher">
                      <input type='checkbox' class='ios8-switch' id='show-with-selection' @if($with_selection == "true") checked @endif>
                      <label for='show-with-selection'>&nbsp;</label>
                    </div>
                  </div>
                  <div class="switcher-block" @if(Auth::user()->role_id != 1) style="display:none;" @endif>
                    <div class="switcher-label">@lang('message.show_hidden')</div>
                    <div class="switcher">
                      <input type='checkbox' class='ios8-switch' id='show-hidden' @if($show_hidden == "true") checked @endif>
                      <label for='show-hidden'>&nbsp;</label>
                    </div>
                  </div>
                </div>
                {{--@if(Auth::user()->id != '273')--}}
                <div class="add-block">
                  <a href="{{ route('leads.add') }}" class="new-btn">@lang('message.add_lead')</a>
                </div>
                {{--@endif--}}
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
              {{--@if(Auth::user()->id != 273)--}}
                <div class="leads-col @if($sort=='email') active @endif"  style="overflow: hidden; text-overflow: ellipsis; flex: 0 0 155px" data-sort="email"data-dir="@if($sort == 'email' && $dir == 'asc') desc @else asc @endif">
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
              @if(Auth::user()->role_id == 1)
              <div class="leads-col lead-name @if($sort=='user_id') active @endif" data-sort="user_id" data-dir="@if($sort == 'user_id' && $dir == 'asc') desc @else asc @endif">
                @lang('message.manager')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'name' && $dir == 'desc') down @endif @if($sort == 'name' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              @endif
              <div class="leads-col with-filter" style="hyphens: manual; flex: 0 0 125px">
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
              @endif
              <div class="leads-col binotel-info">
                @lang('message.call_type')
              </div>
              <div class="leads-col binotel-info">
                @lang('message.state')
              </div>
              <div class="leads-col lead-status">
                @lang('message.status')
              </div>
              <div class="leads-col @if($sort=='created_at') active @endif" data-sort="created_at" data-dir="@if($sort == 'crm_leads.created_at' && $dir == 'asc') desc @else asc @endif">
                @lang('message.creation_date')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'crm_leads.created_at' && $dir == 'desc') down @endif @if($sort == 'crm_leads.created_at' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              
              <div class="leads-col @if($sort=='updated_at') active @endif" data-sort="updated_at" data-dir="@if($sort == 'crm_leads.updated_at' && $dir == 'asc') desc @else asc @endif">
                @lang('message.updated_at')
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="@if($sort == 'crm_leads.updated_at' && $dir == 'desc') down @endif @if($sort == 'crm_leads.updated_at' && $dir == 'asc') up @endif">
                  <path d="M8 4.5H4L5.90476 2.5L8 4.5Z" fill="#3D445C"/>
                  <path d="M8 7.5H4L5.90476 9.5L8 7.5Z" fill="#3D445C"/>
                </svg>
              </div>
              <div class="leads-col action-col"></div>
            </div>
            @if(@count($leads))
            <div class="leads-tbody">
              @include('front.crm.leads.rows')
            </div>
            {{--
            {!! $leads->appends($params)->links() !!}
            --}}
              @if ($leads->lastPage() > 1)
              <div class="result-paginator" data-current-page="{{ $leads->currentPage() }}" data-total-page="{{ $leads->lastPage() }}">
                <button class="btn btn-style btn-show-more-leads">@lang('message.show_more') <span class="board count">15</span> @lang('message.show_more_leads')</button>
                <div class="result-paginator__pages">
                  <div class='result-paginator__prev'>
                    <i class="fa fa-arrow-left"></i>
                    <a href="{!! $leads->previousPageUrl() !!}"><p class="result-paginator__prev-title">@lang('message.prev')</p></a>
                  </div>
                  {!! $leads->appends($params)->links() !!}
                  <div class='result-paginator__next'>
                    <a href="{!! $leads->nextPageUrl() !!}"><p class="result-paginator__next-title">@lang('message.next')</p></a>
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
  </section>
<!-- RESULT SEARCH (END) -->



<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

@include('add.footer')
@if(session('success') || @$success)
<div class="success-mesage">
  @if(session('edit'))
  @lang('message.your_lead') <b>{{ session('name') }}</b> @lang('message.successfully_update')
  @endif
  @if(@$add)
      @lang('message.your_lead') <b>{{ @$name }} </b> @lang('message.successfully_add')
  @endif
  <div class="notify-close">×</div>
</div>
@endif
@if(session('accept'))
<div class="success-mesage">
  @lang('message.you_accepted_an_order_from_a_lead') <b>{{ session('name') }}</b>!<div class="notify-close">×</div>
</div>
@endif
@if(session('allready-accepted'))
<div class="success-mesage">
  @lang('message.order_from') <b>{{ session('name') }}</b> @lang('message.already_took') {{ session('user_name') }}!<div class="notify-close">×</div>
</div>
@endif
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
<div class="lead-add-popup zi10101">
  <div class='lead-add-header'>
    <span>@lang('message.add_lead')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="lead-add-form">
    <form method="POST" action="{{ route('leads.store') }}">
      <input type="hidden" name="status_id" value="2"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.name')</label>
          <input type="text" name="name" value="" required/>
        </div>
        <div class="input-block">
          <label>E-mail</label>
          <input type="text" name="email" value="" />
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.phone')</label>
          <input type="text" name="phone" value="" id="lead_phone"/>
        </div>
        <div class="input-block">
          <label>@lang('message.telegram_profile')</label>
          <input type="text" name="tg_name" value="" id="tg_name"/>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.city')</label>
          <select class="js-example-basic-multiple" name="cities[]" multiple="multiple" id="lead_cities">
          @foreach($cities as $key => $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
          </select>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.comment')</label>
          <textarea name="comment"></textarea>
        </div>
      </div>
      <div class="align-right">
        <button class="clear-new">@lang('message.cancel')</button>
        <button class="submit">@lang('message.add')</button>
      </div>
    </form>
  </div>
</div>
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
  <div class="import-block-outdoor hide zi10101">
    <div class="close-outdoor"><svg viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="11"  x2="11" y2="1" stroke="#aaa" stroke-width="2"/><line x1="1" y1="1" x2="11" y2="11" stroke="#aaa" stroke-width="2"/></svg></div>
    <h2>@lang('message.import_from_excel')</h2>
    <form method="post" action="" enctype="multipart/form-data" id="import-form-outdoor">
    <div>
      <input type="file" name="import_file_outdoor">
      <input type="hidden" id="button_old_name" value="@lang('message.import_button')">

    </div><br />
    <button class="btn-style btn" id="input_button_outdoor">@lang('message.import_button')</button>

  </form>
  </div>

<style>

.mw1460 .field-container .input-block select[name=user_id], 
.mw1460 .field-container .input-block select[name=city_id],
.mw1460 .field-container .input-block select[name=status_id],
.mw1460 .field-container .input-block.w260 #leads_search,
.mw1460 .field-container .input-block.w260{
  width: 220px;
}
@if(Auth::user()->role_id == 1)
.mw1460 .search-form.field-container{
  width:850px;
  flex-direction: row;
  flex-wrap: wrap;
}
.mw1460 .search-form.field-container .w260:nth-child(1),
.mw1460 .search-form.field-container .w260:nth-child(2),
.mw1460 .search-form.field-container .w260:nth-child(3){
  margin-bottom: 0;
}
@endif
.selected-line{
  background: #FFF0EC;
}
.select2-container{
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;

  /*padding:  0 20px 0 11px;*/
  /*width: 263px;*/
  /*height: 42px;*/
  height: 42px;

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
  /*display: inline-block !important;*/
  display: flex;
  width: auto;
}

.select2-container--default .select2-selection--multiple{
  border: none !important;
  padding-bottom:0;
  height: 40px;
  display: flex;
  align-items: center;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
  line-height: 28px;
  border: none;
  border-radius: 0;
  display: flex;
  align-items: center;
  margin-top: 0px;
  margin-bottom: 2px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__display{
  padding: 0px 4px 0px 5px;
  font-size: 13px;
  /*line-height: 18px;*/
}
.select2-selection__choice__remove span{
  /*width: 12px;
  height: 12px;
  display: block;
  line-height: 12px;*/
  display: flex;
  align-items: center;
  margin-right: 5px;
  height: 28px;
  position: relative;
}
.select2-selection__choice__remove span svg{
  width: 13px;
  height: 13px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
  border-right: none;
  height: 28px;
  /*line-height: 28px;*/
  display: inline-block;
  /*align-items: center;*/
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
/* **************************************** */
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
.search-form .select2-container{
  z-index:100;
}
[name=user_id]{
  width:250px;
}
.show-block{
  display:flex;
  flex-direction: row;
}
.change-popup-body form{
    padding: 0;
}
.visibility-change{
  margin-left: 20px;
}
</style>

<script>
var page = '{{$page}}';
currentPage = {{$page}};
document.del_click = false;
var main_url = '/manager/leads';
var page_type = 'leads';
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
</script>

@include('front.crm.scripts')
<script>
  $('.al-power-tip').powerTip({placement: 's'});
  $('.al-power-tip2').powerTip({placement: 's'});
</script>
@if(session('success') || @$success || session('accept') || session('allready-accepted'))
<script>
  //let w = $('.success-mesage').width();
  //$('.success-mesage').css('margin-left','-'+(w/2)+'px');
  $('.success-mesage').css('opacity','1');
  if(window.location.href.indexOf("created")){
    window.history.pushState({},$('title').text(),main_url);
  }
  setTimeout(function(){
    $('.success-mesage').css('opacity','0');
    $('body').find('.success-mesage').remove();
  },15000)
</script>
@endif


<script type="text/javascript">
const monthDays = [31,28,31,30,31,30,31,31,30,31,30,31];
const created_at_date = datepicker('#dt_search', {
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
    $('#dt_search').trigger('change');
  },
});
@if(@$created_at)
@php
$dt = explode(".", $created_at);
@endphp
created_at_date.setDate(new Date({{ $dt[2] }}, {{ $dt[1]-1 }}, {{$dt[0]}}, true)); //
@endif
  const HideVisibility = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_15_1120)">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M0.84467 0.758824C1.13756 0.465931 1.61244 0.465931 1.90533 0.758824L23.9053 22.7588C24.1982 23.0517 24.1982 23.5266 23.9053 23.8195C23.6124 24.1124 23.1376 24.1124 22.8447 23.8195L0.84467 1.81948C0.551777 1.52659 0.551777 1.05172 0.84467 0.758824Z" fill="#FC6B40"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4459 5.25941C11.0777 5.11154 11.7244 5.03762 12.3732 5.03915L12.375 5.03915C15.5754 5.03915 18.1409 6.86932 19.9528 8.8021C20.852 9.7612 21.5437 10.7232 22.0106 11.446C22.2338 11.7916 22.4045 12.0809 22.5208 12.2866C21.9798 13.2459 21.3506 14.1531 20.6411 14.9963C20.3744 15.3132 20.4152 15.7863 20.7321 16.053C21.0491 16.3197 21.5222 16.279 21.7889 15.962C22.6515 14.9368 23.4048 13.8244 24.0364 12.6427C24.1511 12.4282 24.1546 12.1713 24.0458 11.9537L23.6435 12.1549L23.6435 12.1549C24.0458 11.9537 24.0457 11.9534 24.0455 11.9532L24.0452 11.9525L24.0442 11.9504L24.041 11.9442L24.0303 11.9233C24.0212 11.9056 24.0082 11.8805 23.9913 11.8485C23.9574 11.7846 23.908 11.693 23.8431 11.5777C23.7135 11.3473 23.5221 11.0215 23.2707 10.6323C22.7688 9.85513 22.023 8.8171 21.0472 7.77619C19.1093 5.70914 16.1751 3.53948 12.3759 3.53915C11.6111 3.53742 10.8487 3.62458 10.1041 3.79889C9.70075 3.89329 9.45033 4.29677 9.54474 4.70008C9.63914 5.1034 10.0426 5.35381 10.4459 5.25941ZM12.3759 3.53915L12.375 3.53915V4.28915L12.3768 3.53915L12.3759 3.53915ZM22.5227 12.2832C22.5221 12.2844 22.5215 12.2855 22.5208 12.2866L22.5238 12.2918L22.5227 12.2832ZM6.89018 6.94523C7.21938 6.69385 7.28247 6.22318 7.03108 5.89397C6.7797 5.56477 6.30903 5.50168 5.97982 5.75307C3.80397 7.41458 2.00859 9.52219 0.714133 11.9345C0.598908 12.1493 0.595196 12.4066 0.70418 12.6246L1.375 12.2891C0.70418 12.6246 0.70431 12.6248 0.704455 12.6251L0.704823 12.6258L0.705837 12.6279L0.708974 12.6341L0.719676 12.655C0.728774 12.6727 0.7418 12.6978 0.758723 12.7298C0.792564 12.7937 0.842023 12.8853 0.906865 13.0006C1.03649 13.231 1.22793 13.5568 1.47935 13.946C1.98124 14.7232 2.727 15.7612 3.70285 16.8021C5.64086 18.8693 8.57537 21.0391 12.375 21.0391V21.0392L12.3873 21.039C14.6964 21.0013 16.9329 20.2257 18.7697 18.8256C19.0991 18.5745 19.1626 18.1039 18.9115 17.7745C18.6604 17.4451 18.1898 17.3816 17.8603 17.6327C16.2799 18.8374 14.3557 19.5054 12.3689 19.5391C9.17136 19.5368 6.60798 17.7077 4.79715 15.7762C3.898 14.8171 3.20626 13.8551 2.7394 13.1323C2.51645 12.787 2.3459 12.4981 2.22957 12.2924C3.4057 10.215 4.99067 8.39572 6.89018 6.94523ZM10.7663 10.7179C11.0693 10.4355 11.0861 9.9609 10.8037 9.65786C10.5213 9.35481 10.0468 9.33806 9.74371 9.62044C9.37527 9.96375 9.07976 10.3778 8.8748 10.8377C8.66984 11.2977 8.55963 11.7943 8.55075 12.2978C8.54187 12.8013 8.63449 13.3015 8.82309 13.7684C9.0117 14.2354 9.29242 14.6595 9.64852 15.0156C10.0046 15.3717 10.4288 15.6524 10.8957 15.8411C11.3627 16.0297 11.8628 16.1223 12.3663 16.1134C12.8698 16.1045 13.3664 15.9943 13.8264 15.7893C14.2864 15.5844 14.7004 15.2889 15.0437 14.9204C15.3261 14.6174 15.3093 14.1428 15.0063 13.8604C14.7032 13.5781 14.2287 13.5948 13.9463 13.8979C13.7403 14.1189 13.4919 14.2962 13.2159 14.4192C12.9399 14.5422 12.642 14.6083 12.3399 14.6136C12.0378 14.619 11.7377 14.5634 11.4575 14.4502C11.1773 14.3371 10.9228 14.1686 10.7092 13.955C10.4955 13.7413 10.3271 13.4868 10.2139 13.2066C10.1008 12.9265 10.0452 12.6264 10.0505 12.3243C10.0558 12.0222 10.122 11.7242 10.2449 11.4482C10.3679 11.1722 10.5452 10.9238 10.7663 10.7179Z" fill="#FC6B40"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_15_1120">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>`;
  const ShowVisibility = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.85273 12C1.9691 12.2059 2.14027 12.4961 2.3644 12.8431C2.83126 13.566 3.523 14.5279 4.42215 15.487C6.23414 17.4198 8.79963 19.25 12 19.25C15.2004 19.25 17.7659 17.4198 19.5778 15.487C20.477 14.5279 21.1687 13.566 21.6356 12.8431C21.8597 12.4961 22.0309 12.2059 22.1473 12C22.0309 11.7941 21.8597 11.5039 21.6356 11.1569C21.1687 10.434 20.477 9.47205 19.5778 8.51296C17.7659 6.58017 15.2004 4.75 12 4.75C8.79963 4.75 6.23414 6.58017 4.42215 8.51296C3.523 9.47205 2.83126 10.434 2.3644 11.1569C2.14027 11.5039 1.9691 11.7941 1.85273 12ZM23 12C23.6708 11.6646 23.6707 11.6643 23.6705 11.664L23.6702 11.6633L23.6692 11.6613L23.666 11.6551L23.6553 11.6341C23.6462 11.6164 23.6332 11.5913 23.6163 11.5594C23.5824 11.4954 23.533 11.4038 23.4681 11.2886C23.3385 11.0581 23.1471 10.7324 22.8957 10.3431C22.3938 9.56598 21.648 8.52795 20.6722 7.48704C18.7341 5.41983 15.7996 3.25 12 3.25C8.20037 3.25 5.26586 5.41983 3.32785 7.48704C2.352 8.52795 1.60624 9.56598 1.10435 10.3431C0.852934 10.7324 0.661492 11.0581 0.531865 11.2886C0.467023 11.4038 0.417564 11.4954 0.383723 11.5594C0.3668 11.5913 0.353774 11.6164 0.344675 11.6341L0.333974 11.6551L0.330837 11.6613L0.329823 11.6633L0.329455 11.664C0.32931 11.6643 0.32918 11.6646 1 12L0.32918 11.6646C0.223607 11.8757 0.223607 12.1243 0.32918 12.3354L1 12C0.32918 12.3354 0.32931 12.3357 0.329455 12.336L0.329823 12.3367L0.330837 12.3387L0.333974 12.3449L0.344675 12.3659C0.353774 12.3836 0.3668 12.4087 0.383723 12.4406C0.417564 12.5046 0.467023 12.5962 0.531865 12.7114C0.661492 12.9419 0.852934 13.2676 1.10435 13.6569C1.60624 14.434 2.352 15.4721 3.32785 16.513C5.26586 18.5802 8.20037 20.75 12 20.75C15.7996 20.75 18.7341 18.5802 20.6722 16.513C21.648 15.4721 22.3938 14.434 22.8957 13.6569C23.1471 13.2676 23.3385 12.9419 23.4681 12.7114C23.533 12.5962 23.5824 12.5046 23.6163 12.4406C23.6332 12.4087 23.6462 12.3836 23.6553 12.3659L23.666 12.3449L23.6692 12.3387L23.6702 12.3367L23.6705 12.336C23.6707 12.3357 23.6708 12.3354 23 12ZM23 12L23.6708 12.3354C23.7764 12.1243 23.7764 11.8757 23.6708 11.6646L23 12Z" fill="#FC6B40"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 9.75C10.7574 9.75 9.75 10.7574 9.75 12C9.75 13.2426 10.7574 14.25 12 14.25C13.2426 14.25 14.25 13.2426 14.25 12C14.25 10.7574 13.2426 9.75 12 9.75ZM8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12Z" fill="#FC6B40"/>
                  </svg>`;
  const LeadChangeVisible = (leadId, visible) => {

    $.post('/manager/leads/'+leadId+'/change-visible',{'visible':visible},function(){
      if(visible){
        $('#v-'+leadId).data('visibility', 1).empty().append(HideVisibility);
        $('#lead-info-' + leadId).css('background','#fff')
      }else {
        $('#v-'+leadId).data('visibility', 0).empty().append(ShowVisibility);
        $('#lead-info-' + leadId).css('background','#ccc')
      }
    })
  }
  $(document).ready(function(){
    $(document).on('click', '.visibility-change', function(){
      const id = $(this).data('id');
      if($(this).data('visibility') === 1){
        createConfirm('@lang('message.set_hidden')', '@lang('message.do_you_want_to_make_this_lead_invisible')', function(){
          LeadChangeVisible(id,0);
        })
      }else{
        LeadChangeVisible(id,1);
      }
    })
  })
</script>
