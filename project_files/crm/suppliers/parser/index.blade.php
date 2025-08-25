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
            Назад
          </a>
        </div>
        <div class="container  container-base">
          @include('front.crm.suppliers.header')
          @include('front.crm.suppliers.menu')
          <div class="client-tab-data-block">
            @if($supplier->firm)
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.basic_information')</h2>
              <div class="info-block-table">
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.name2')</span>
                  </div>
                  <div class="td" style="display:flex;width: 100%">
                    {{ $supplier->firm->name }}
                    <div class="right-block" style="padding-top:0; margin-top: -15px">
                      <a href="/manager/suppliers/{{$supplier->id}}/parser/{{$supplier->firm->id}}/edit" class="btn edit">@lang('message.edit')</a>
                    </div>
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.description')</span>
                  </div>
                  <div class="td">
                    {{ $supplier->firm->descr }}
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.city')</span>
                  </div>
                  <div class="td">
                    @if($supplier->firm->cities)
                      @foreach($supplier->firm->cities as $id => $city)
                        {{ $city }},
                      @endforeach
                    @endif
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.comment1')</span>
                  </div>
                  <div class="td">
                    {{ $supplier->firm->comment }}
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.extra_charge')</span>
                  </div>
                  <div class="td">
                    {{ $supplier->firm->markup }}
                  </div>
                </div>
                <hr/>
                <h2 class="info-block-title">@lang('message.contacts')</h2>
                <div class="tr">
                  <div class="td">
                    <span>@lang('message.contact_face')</span>
                  </div>
                  <div class="td">
                    {{ $supplier->firm->contact_user }}
                  </div>
                </div>
                <div class="tr">
                  <div class="td">
                    <span>E-mail</span>
                  </div>
                  <div class="td">
                    {{ $supplier->firm->email }}
                  </div>
                </div>
              </div>
            </div>
@php
$send_week = [
  1 => __('message.weekly'),
  2 => __('message.once_in_two_weeks'),
  3 => __('message.once_every_three_weeks'),
  4 => __('message.once_every_four_weeks')
];
@endphp
            <hr/>
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.requests')</h2>
              <div class="supplier-info">
                <div class="supplier-info-item">
                  <div class="name">@lang('message.link_to_file')</div>
                  <div class="value"><a href="{{$item->firm->link}}" download>{{$supplier->firm->link}}</a></div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">@lang('message.send_days')</div>
                  <div class="value">{{@implode(',', json_decode($supplier->firm->send_days))}}</div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">@lang('message.next_send')</div>
                  <div class="value">{{ $supplier->firm->next_date ? date('d.m.Y',strtotime($supplier->firm->next_date)) : '' }}</div>
                </div>
                <div class="supplier-info-item">
                  <div class="name">@lang('message.send_frequency')</div>
                  <div class="value">{{ $send_week[$supplier->firm->send_week] }}</div>
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
            </div>
            @if(count($supplier->firm->prices))
            <hr/>
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.parser_price1')</h2>
              <div class="supplier-info">
                @foreach($supplier->firm->prices as $price)
                <div class="supplier-info-item">
                  <div class="name">{{$price->title}}</div>
                  <div class="value">{{ $price->price }}</div>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            @if(count($supplier->firm->prices_enrty))
            <hr/>
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.parser_price2')</h2>
              <div class="supplier-info">
                @foreach($supplier->firm->prices_enrty as $price)
                <div class="supplier-info-item">
                  <div class="name">{{$price->title}}</div>
                  <div class="value">{{ $price->price }}</div>
                </div>
                @endforeach
              </div>
            </div>
            @endif
            @if(count($supplier->firm->prices_markup))
            <hr/>
            <div class="info-block">
              <h2 class="info-block-title">@lang('message.parser_price3')</h2>
              <div class="supplier-info">
                @foreach($supplier->firm->prices_markup as $price)
                <div class="supplier-info-item">
                  <div class="name">{{$price->title}}</div>
                  <div class="value">{{ $price->price }}</div>
                </div>
                @endforeach
              </div>
            </div>
            @endif

            @else
            <div class="right-block">
              <a class="btn submit" href="{{ route('suppliers.parser.add',['id' => $supplier->id])}}">@lang('message.add')</a>
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
</style>