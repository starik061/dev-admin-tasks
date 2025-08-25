@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <a class="back" href="/manager/suppliers">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            @lang('message.back')
          </a>
        </div>
        <div class="container  container-base">
          @include('front.crm.suppliers.header')
          {{--
          <div class="client-navigation">
            <div class="favorite-viewed-tab">
              <a href="/manager/suppliers/{{ $supplier->id }}/view" class="active">@lang('message.information')</a>
              @if(!in_array(Auth::user()->id, [273,279]))
              <a href="/manager/suppliers/{{ $supplier->id }}/companies">@lang('message.companies') @if($data['details'])({{$data['details']}})@endif</a>
              @endif
              <a href="/manager/suppliers/{{ $supplier->id }}/contacts">@lang('message.contacts') @if($data['contacts'])({{$data['contacts']}})@endif</a>
              @if(Auth::user()->role_id == 1 && $supplier->firm->id)
              <a href="/manager/suppliers/{{ $supplier->id }}/parser">@lang('message.parser') @if($data['parser'])({{$data['parser']}})@endif</a>
              @endif
              @if(!in_array(Auth::user()->id, [273,279]))
              <a href="/manager/suppliers/{{ $supplier->id }}/clients">@lang('message.clients')</a>
              @endif
              @if(in_array(Auth::user()->role_id, [1,2]))
                <a href="/manager/suppliers/{{ $supplier->id }}/files">@lang('message.files')</a>
              @endif
            </div> 
          </div>
          --}}
          @include('front.crm.suppliers.menu')
          <div class="client-tab-data-block">
            <div class="info-block">
              <div class="info-block-table">
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.name2')</span>
                  </div>
                  <div class="td">
                    {{ $supplier->name }}
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.city')</span>
                  </div>
                  <div class="td">
                    @foreach($supplier->cities as $k =>  $city)
                      {{$city->name}}@if($k != (count($supplier->cities) -1)), @endif
                    @endforeach
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.status')</span>
                  </div>
                  <div class="td">
                    {{$supplier->status ? $supplier->status->getTranslatedAttribute('name', \App::getLocale(), 'ru') : '-'}}
                  </div>
                </div>
              </div>
            </div>
            <hr/>
            <div class="info-block">
             <h2 class="info-block-title">Контакты</h2> 
              @foreach($contacts as $contact)
              <div class="contact-block">
                <div class="field-container">
                  <div class="input-block">
                    <label>@lang('message.fio2')</label>
                    {{ $contact->fio }}
                  </div>
                  @if($contact->phone)
                  <div class="input-block">
                    <label>@lang('message.phone')</label>
                    {{ $contact->phone }}
                  </div>
                  @endif
                  @if($supplier->contact_person == $contact->id)
                  <div class="input-block">
                    <label>@lang('message.chanel-title')</label>
                    {{ $supplier->channel }}
                  </div>
                  @endif
                </div>
                <div class="field-container">
                  @if($contact->email)
                  <div class="input-block">
                    <label>E-mail</label>
                    {{ $contact->email }}
                  </div>
                  @endif
                  <div class="input-block">
                    <label>@lang('message.post')</label>
                    <span style="background: {{$contact->post->background}}; color: {{$contact->post->color}}; padding: 5px; border-radius: 3px">
                    &bull; {{ $contact->post->name }}
                    </span>
                  </div>
                </div>  
              </div>
              @endforeach
            </div>
            <hr>
            
            @if($supplier->calls)
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.communications')</h2>
              <div class="manager-calls-header">
              @if($user->role_id == 1)  
                
                @foreach($managers as $manager)
                  <span class="pointer call-tab-selector" data-id="manager-call-{{$manager->user_id}}">{{$manager->name}}</span>
                @endforeach
              @endif
              </div>
              @foreach($managers as $manager)
                <div class="manager-calls @if($user->role_id == 1) hide @endif" id="manager-call-{{$manager->user_id}}">
                @foreach($supplier->calls as $k => $call)
                  @if($call->user_id == $manager->user_id)
                  <div class="call-item">
                    <div class="call-ico">
                      @if($call->disposition  == 'ANSWER')
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.1667 0.833008L14.5833 5.41634L12.5 3.33301" stroke="#4FB14B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.3351 14.1004V16.6004C18.3361 16.8325 18.2886 17.0622 18.1956 17.2749C18.1026 17.4875 17.9662 17.6784 17.7952 17.8353C17.6242 17.9922 17.4223 18.1116 17.2024 18.186C16.9826 18.2603 16.7496 18.288 16.5185 18.2671C13.9542 17.9884 11.491 17.1122 9.32682 15.7087C7.31334 14.4293 5.60626 12.7222 4.32682 10.7087C2.91846 8.53474 2.04202 6.05957 1.76848 3.48374C1.74766 3.2533 1.77505 3.02104 1.8489 2.80176C1.92275 2.58248 2.04146 2.38098 2.19745 2.21009C2.35345 2.0392 2.54332 1.90266 2.75498 1.80917C2.96663 1.71569 3.19543 1.66729 3.42682 1.66707H5.92682C6.33124 1.66309 6.72331 1.80631 7.02995 2.07002C7.33659 2.33373 7.53688 2.69995 7.59348 3.10041C7.699 3.90046 7.89469 4.68601 8.17682 5.44207C8.28894 5.74034 8.3132 6.0645 8.24674 6.37614C8.18027 6.68778 8.02587 6.97383 7.80182 7.20041L6.74348 8.25874C7.92978 10.345 9.65719 12.0724 11.7435 13.2587L12.8018 12.2004C13.0284 11.9764 13.3144 11.8219 13.6261 11.7555C13.9377 11.689 14.2619 11.7133 14.5601 11.8254C15.3162 12.1075 16.1018 12.3032 16.9018 12.4087C17.3066 12.4658 17.6763 12.6697 17.9406 12.9817C18.2049 13.2936 18.3453 13.6917 18.3351 14.1004Z" stroke="#4FB14B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      @else
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.168 0.833008L14.168 5.83301" stroke="#FC0808" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.168 0.833008L19.168 5.83301" stroke="#FC0808" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.3351 14.1004V16.6004C18.3361 16.8325 18.2886 17.0622 18.1956 17.2749C18.1026 17.4875 17.9662 17.6784 17.7952 17.8353C17.6242 17.9922 17.4223 18.1116 17.2024 18.186C16.9826 18.2603 16.7496 18.288 16.5185 18.2671C13.9542 17.9884 11.491 17.1122 9.32682 15.7087C7.31334 14.4293 5.60626 12.7222 4.32682 10.7087C2.91846 8.53474 2.04202 6.05957 1.76848 3.48374C1.74766 3.2533 1.77505 3.02104 1.8489 2.80176C1.92275 2.58248 2.04146 2.38098 2.19745 2.21009C2.35345 2.0392 2.54332 1.90266 2.75498 1.80917C2.96663 1.71569 3.19543 1.66729 3.42682 1.66707H5.92682C6.33124 1.66309 6.72331 1.80631 7.02995 2.07002C7.33659 2.33373 7.53688 2.69995 7.59348 3.10041C7.699 3.90046 7.89469 4.68601 8.17682 5.44207C8.28894 5.74034 8.3132 6.0645 8.24674 6.37614C8.18027 6.68778 8.02587 6.97383 7.80182 7.20041L6.74348 8.25874C7.92978 10.345 9.65719 12.0724 11.7435 13.2587L12.8018 12.2004C13.0284 11.9764 13.3144 11.8219 13.6261 11.7555C13.9377 11.689 14.2619 11.7133 14.5601 11.8254C15.3162 12.1075 16.1018 12.3032 16.9018 12.4087C17.3066 12.4658 17.6763 12.6697 17.9406 12.9817C18.2049 13.2936 18.3453 13.6917 18.3351 14.1004Z" stroke="#FC0808" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      @endif
                    </div>
                    <div class="user-info">
                      @if($call->supplier_contacts->fio)
                      <span class="manager-name">{{$call->supplier_contacts->fio}}</span><br>
                      @endif
                      <span class="call-date">{{date('d.m.Y H:i:s', strtotime($call->created_at))}}</span>
                    </div>
                    <div class="user-post">
                      {{$call->supplier_contacts->post->name}}
                    </div>
                    <div class="phone">
                      {{$call->phone}}
                    </div>
                    <div class="billsec">
                      @lang('message.expectation'): {{$call->waitsec}} c.<br>
                      @lang('message.duration'): {{$call->billsec}} с.
                    </div>
                    <div class="link2file">
                      @if($call->link)
                      <a class="binotel-get-call" data-call_id="{{$call->binotel_id}}">@lang('message.audio')</a>
                      @else
                      <span style="width:78px;display:block;">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </span>
                      @endif
                    </div>
                  </div>
                  @endif
                @endforeach
                </div> 
              @endforeach
            </div>
            @endif 
              
            
@php
  $send_week = [
    1 => __('message.weekly'),
    2 => __('message.once_in_two_weeks'),
    3 => __('message.once_every_three_weeks'),
    4 => __('message.once_every_four_weeks')
  ];
@endphp
            @if($supplier->firm && Auth::user()->role_id == 1)
            <hr/>
            <div class="info-block">
              <form id="request-form">
              <h2 class="info-block-title">
                @lang('message.requests')
                <span class="pointer edit-request">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </h2> 
              <div class="supplier-info">
                <div class="supplier-info-item">
                  <div class="name">@lang('message.link_to_file')</div>
                  <div class="value"><a href="{{$item->firm->link}}" download>{{$supplier->firm->link}}</a></div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">
                    @lang('message.send_days')
                  </div>
                  <div class="value">
                    <span class="editable-value send_days">
                    {{@implode(',', json_decode($supplier->firm->send_days))}}
                    @if(!json_decode($supplier->firm->send_days))
                    @php
                      $supplier->firm->send_days = '[]';
                    @endphp
                    @endif
                    </span>
                    <div class="send_days-checkboxes editable-element hide">
                      <label><input type="checkbox" name="send_days[]" value="Mon" @if(@in_array('Mon', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.monday2')</label>
                      <label><input type="checkbox" name="send_days[]" value="Tue" @if(@in_array('Tue', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.tuesday2')</label>
                      <label><input type="checkbox" name="send_days[]" value="Wed" @if(@in_array('Wed', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.wednesday2')</label>
                      <label><input type="checkbox" name="send_days[]" value="Thu" @if(@in_array('Thu', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.thursday2')</label>
                      <label><input type="checkbox" name="send_days[]" value="Fri" @if(@in_array('Fri', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.friday2')</label>
                      <label><input type="checkbox" name="send_days[]" value="Sat" @if(@in_array('Sat', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.saturday2')</label>
                      <label><input type="checkbox" name="send_days[]" value="Sun" @if(@in_array('Sun', json_decode($supplier->firm->send_days))) checked @endif> @lang('message.sunday2')</label>
                    </div>
                  </div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">@lang('message.next_send')</div>
                  <div class="value">{{ $supplier->firm->next_date ? date('d.m.Y',strtotime($supplier->firm->next_date)) : '' }}</div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">@lang('message.send_frequency')</div>
                  <div class="value">
                    <span class="editable-value send_week">
                    {{ $send_week[$supplier->firm->send_week] }}
                    </span>
                    <div class="send_week-dropdown editable-element hide">
                      <select id="send_week" name="send_week">
                        <option value="1" @if($supplier->firm->send_week == 1) selected @endif>@lang('message.weekly')/option>
                        <option value="2" @if($supplier->firm->send_week == 2) selected @endif>@lang('message.once_in_two_weeks')</option>
                        <option value="3" @if($supplier->firm->send_week == 3) selected @endif>@lang('message.once_every_three_weeks')</option>
                        <option value="4" @if($supplier->firm->send_week == 4) selected @endif>@lang('message.once_every_four_weeks')</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">@lang('message.last_send')</div>
                  <div class="value">{{ $supplier->firm->last_send ? date('d.m.Y',strtotime($supplier->firm->last_send)) : '' }}</div>
                </div>

                <div class="supplier-info-item">
                  <div class="name">@lang('message.last_update')</div>
                  <div class="value">{{ $supplier->last_update ? date('d.m.Y H:i:s',strtotime($supplier->last_update)) : '' }}</div>
                </div>
                
                <div class="supplier-info-item">
                  <div class="name">@lang('message.updated2')</div>
                  <div class="value">{{ $supplier->cron ? 'крон' : 'менеджер' }}</div>
                </div>
                
                <div class="supplier-info-item">
                  <div class="name">@lang('message.hide_price')</div>
                  <div class="value">{{ $supplier->firm->hidden_price ? __('message.yes') : __('message.no') }}</div>
                </div>
              </div>
              <div class="right-block save-block hide">
                <a class="btn pointer request-send submit">@lang('message.save')</a>
              </div>
              </form>
            </div>
            @endif
            <hr/>
            @if($supplier->services)
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.additional_services')</h2>
              <div >
                @foreach($supplier->services as $service)
                  {{$service->name}}<br>
                @endforeach
              </div>
            </div>
            <hr/>
            @endif
            <div class="info-block">
             <h2 class="info-block-title">@lang('message.comment1')
              <span class="pointer edit-comment">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
             </h2> 
             <div class="info-block-table">
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.note')</span>
                  </div>
                  <div class="td td-comment comment-value" data-id="{{$supplier->id}}">
                    {!! $supplier->comment !!}
                  </div>
                </div>
              </div>
              @if(Auth::user()->role_id != 5)
              <div class="right-block">
                <a href="/manager/suppliers/{{ $supplier->id }}/edit" class="btn edit">@lang('message.edit')</a>
              </div>
              @endif
            </div>
            @if(!empty($prices) || $discount)
              <hr/>
              <div class="info-block">
                <h2 class="info-block-title">@lang('message.prices')</h2>
                <div class="info-block-table">
                  <table>
                    <tr>
                      <td>@lang('message.type')</td>
                      <td>@lang('message.boards_table_cost')</td>
                      <td>@lang('message.pasting_service_cost')</td>
                      <td></td>
                      <td>@lang('message.discount')</td>
                      <td class="input-block">
                        {{$discount}}
                      </td>
                      <td>@lang('message.use_price_from_grid')</td>
                      <td class="input-block">
                        {{$item->usePrice ? 'да' : 'нет'}}
                      </td>
                    </tr>
                    @foreach($types2 as $type => $title)
                      <tr class="field-container">
                        <td>{{$title}}</td>
                        <td class="input-block">
                          {{$prices[$supplier->firm->id][$type]}}
                        </td>
                        <td class="input-block">
                          {{$servicePrices[$supplier->firm->id][$type]}}
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.scripts')
<script>
  $('.al-power-tip').powerTip({placement: 's'});
@if(session('success') || @$success)
  notify("{!!session('success')!!}");
@endif
</script>
<style>
  .info-block-table td{
    padding: 10px;
  }
.additional-information .info-block-table .tr .td:nth-child(1) {
  width: 200px;
}
.additional-information .info-block-table .tr .td a{
  color: #FC6B40;
}
#powerTip{
  max-width: 500px;
  white-space: break-spaces;
}

.info-block .supplier-info{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.info-block .supplier-info .supplier-info-item{
  /*flex: 1;*/
  width: 25%;
  flex-shrink: 0;
  padding-bottom:15px;
}
.info-block .supplier-info .supplier-info-item .name,
.info-block .supplier-info .supplier-info-item .value{
  padding-bottom: 5px;
}
.info-block .supplier-info .supplier-info-item .name{
  font-style: normal;
  font-weight: 400;
  font-size: 13px;
  line-height: 16px;
  color: #8B8F9D;
}
.info-block .supplier-info .supplier-info-item .value a{
  color: #FC6B40;
}
.save-block.hide,
.editable-value.hide,
.editable-element.hide{
  display:none;
}
.send_days-checkboxes label{
  display:block;
}
#send_week{
  width: 220px;
}
.request-send{
  color: #fff !important;
}
</style>
<script>
$(document).on('click','.edit-request', function(){
  if($('.editable-value').hasClass('hide')){
    $('.editable-value').removeClass('hide');
    $('.editable-element').addClass('hide');
    $('.save-block').addClass('hide');
  }else{
    $('.editable-value').addClass('hide');
    $('.editable-element').removeClass('hide');
    $('.save-block').removeClass('hide');
  }
})
$('#send_week').select2({minimumResultsForSearch: -1})
$(document).on('click', '.request-send', function(){
  $.post(
    '/manager/suppliers/'+{{$supplier->id}}+'/request-change',
    $('#request-form').serialize(),
    function(){
      notify('@lang('message.data_updated')');
      $('.send_week').text($('#send_week option:selected').text());
      let days = [];
      $('[name="send_days[]"]:checked').each(function(){
        days.push($(this).val());
      })
      $('.send_days').text(days.join(', '));
      $('.edit-request').trigger('click');
    }
  )
})
$(document).on('click', '.call-tab-selector', function(){
  $('.call-tab-selector').removeClass('active');
  $(this).addClass('active');
  $('.manager-calls').addClass('hide');
  $('#'+$(this).data('id')).removeClass('hide');
})
</script>