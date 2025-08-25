@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @php
  $editable = in_array(Auth::user()->id,[1,202,248,263]) ? "editable" : "";
  //dd($suppliers[6]);
  @endphp
  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        
        <div class="container  container-base mw960">
          <h1 class="title">@lang('message.payments')</h1>
          <div class="client-tab-data-block">
            <div class="info-block select-in-title-block">
              {{--
              <h2 class="info-block-title" style="display: inline-block;">
                Период 
              </h2>
              <select class="search-form-select" name="period" id="supplier-clients-placement-period">
              @foreach($periods as $k => $v)
                <option value="{{$k}}" @if($period == $k) selected @endif>{{$v}}</option>
              @endforeach
              </select>
              --}}
              <form method="GET" action="/manager/suppliers/payments{{ $bySupplier == false ? '/by-client' : ''}}">
                <div class="field-container spc-fc">
                  <div class="input-block w260">
                    <label>@lang('message.period')</label>
                    <select class="search-form-select" name="period" id="supplier-clients-placement-period">
                    @foreach($periods as $k => $v)
                      <option value="{{$k}}" @if($period == $k) selected @endif>{{$v}}</option>
                    @endforeach
                    </select>
                  </div>
                  @if(in_array(Auth::user()->role_id, [1,5]))
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
                    <label>@lang('message.search')</label>
                    <input type="text" name="s" value="{{ isset($params['s']) ? $params['s'] : '' }}"/>
                  </div>
                  <div class="input-block w260">
                    <label>&nbsp;</label>
                    <button class="btn btn-style">@lang('message.apply')</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="payments-group-header">
              @lang('message.group_by'):
              <a href="/manager/suppliers/payments{{ count($params) ? '?'.http_build_query($params) : '' }}" class="tab-btn @if($bySupplier == true) active @endif" data-id="tab-supplier-data">@lang('message.by_suppliers')</a>
              <a href="/manager/suppliers/payments/by-client{{ count($params) ? '?'.http_build_query($params) : '' }}" class="tab-btn @if($bySupplier == false) active @endif"data-id="tab-clients-data">@lang('message.by_clients')</a>
            </div>
           
            <div class="clients-contacts-data payments-tabs">
              @if(@count($suppliers))
              @php /*dd($suppliers)*/ @endphp
              <div class="suppliers-table @if($bySupplier == true) active @endif tab" id="tab-supplier-data">
                <div class="suppliers-thead">
                    <div class="supplier-col">@lang('message.supplier')</div>
                    <div class="supplier-col">@lang('message.sum')</div>
                    <div class="supplier-col">@lang('message.paid2')</div>
                    <div class="supplier-col action-col">&nbsp;</div>
                </div>
                <div class="suppliers-tbody">
                @foreach($suppliers as $supplier)
                  @php
                  $paidSum = 0;
                  $sumForPaid = 0;

                  foreach($supplier->paymentInfo['clients'] as $client){
                    $boardsIds = [];
                    $index = 0;
                    if(isset($supplier->paymentInfo['boards'][$client->id]) && count($supplier->paymentInfo['boards'][$client->id])){
                      foreach($supplier->paymentInfo['boards'][$client->id] as $k => $board){
                        if(($client->id == 554 && in_array($period,['2024-04', '2024-06'])) || ($client->id == 787 && $period == '2024-06') || ($client->id == 37 && $period == '2025-01') || ($client->id == 1061 && $period == '2025-02')){
                          if(in_array($board->id, $boardsIds)){
                            $index = 1;
                          }else{
                            $index = 0;
                            $boardsIds[] = $board->id;
                          }
                        }
                        if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index] != null){
                          //var_dump($board->contract_board_id);
                          //dd($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][0]);
                          $cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->contract_board_id)->where('paid_period',$period)->first();
                          $supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->cbsp_sum = $cbsp->sum;
                          $sumForPaid += $cbsp->sum ?: $supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->owner_price;
                          if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid){
                            $paidSum += $cbsp->sum; //$supplier->paymentInfo['boardsInfo'][$client->id][$board->id][0]->owner_price;
                          }
                        }
                      }
                    }
                    if(isset($supplier->paymentInfo['services'][$client->id]) && count($supplier->paymentInfo['services'][$client->id])){
                      foreach($supplier->paymentInfo['services'][$client->id] as $service){
                        if($service->supplier_paid){
                          $paidSum += $service->sum;
                        }
                        $sumForPaid += $service->sum;
                      }
                    }
                  }
                  $addClass = "";
                  if($paidSum && $paidSum < $sumForPaid){
                    $addClass = "bill-detials-2";
                  }
                  if($paidSum >= $sumForPaid && $paidSum){
                    $addClass = "bill-detials-1";
                  }
                  //dd($sumForPaid);
                  @endphp
                  <div class="supplier-block {{$addClass}}">
                    <div class="supplier-row supplier-data-row">
                        <div class="supplier-col">{{$supplier->name}}</div>
                        <div class="supplier-col">{{$sumForPaid}}</div>
                        <div class="supplier-col">{{$paidSum}}</div>
                        <div class="supplier-col action-col">
                          <span class=" pointer up-down-new">
                              <svg fill="#FC6B40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727" xml:space="preserve"  class="info-arrow">
                                <g class="info-arrow">
                                  <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                                    l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"  class="info-arrow"/>
                                </g>
                              </svg>
                           </span>
                        </div>
                    </div>
                    <div class="supplier-row-selects hide">
                      {{-- dump($supplier) --}}
                      @if(@count($supplier->paymentInfo['clients']))
                      <div class="clients-contacts-data" style="background: #ffffff;">
                        <div class="suppliers-table">
                          <div class="suppliers-thead">
                              <div class="supplier-col">@lang('message.client')</div>
                              <div class="supplier-col supplier-col-05">@lang('message.sum')</div>
                              <div class="supplier-col supplier-col-05">@lang('message.paid2')</div>
                              <div class="supplier-col action-col">&nbsp;</div>
                          </div>
                          <div class="suppliers-tbody">
                            @foreach($supplier->paymentInfo['clients'] as $client)
                              @php
                              $paidSum = 0;
                              $sumForPaid = 0;
                              $boardsIds = [];
                              $index = 0;
                              foreach($supplier->paymentInfo['boards'][$client->id] as $k => $board){

                                if(($client->id == 554 && in_array($period,['2024-04', '2024-06'])) || ($client->id == 787 && $period == '2024-06') || ($client->id == 37 && $period == '2025-01') || ($client->id == 1061 && $period == '2025-02')){
                                    if(Auth::user()->id == 202){
                                        //dd($supplier->paymentInfo['boardsInfo'][$client->id]);
                                    }
                                    if(in_array($board->id, $boardsIds)){
                                        $index = 1;
                                    }else{
                                        $index = 0;
                                        $boardsIds[] = $board->id;
                                    }
                                }
                                $sumForPaid += $supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->cbsp_sum ?: $supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->owner_price;;
                                if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid){
                                  $paidSum += $supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->cbsp_sum; //$supplier->paymentInfo['boardsInfo'][$client->id][$board->id][0]->owner_price;
                                }
                              }
                              if(isset($supplier->paymentInfo['services'][$client->id]) && count($supplier->paymentInfo['services'][$client->id])){
                                foreach($supplier->paymentInfo['services'][$client->id] as $service){
                                  if($service->supplier_paid){
                                    $paidSum += $service->sum;
                                  }
                                  $sumForPaid += $service->sum;
                                }
                              }
                              @endphp
                            <div class="supplier-block2">
                              <div class="supplier-row supplier-data-row2">
                                  <div class="supplier-col">{{$client->name}}</div>
                                  <div class="supplier-col supplier-col-05">{{--number_format($client->sum,'2','.','')--}}{{$sumForPaid}}</div>
                                  <div class="supplier-col supplier-col-05">{{$paidSum}}</div>
                                  <div class="supplier-col action-col">
                                    <span class=" pointer up-down-new2">
                                        <svg fill="#FC6B40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727" xml:space="preserve"  class="info-arrow">
                                          <g class="info-arrow">
                                            <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                                              l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"  class="info-arrow"/>
                                          </g>
                                        </svg>
                                      </span>
                                  </div>
                              </div>
                              <div class="supplier-row-selects2 hide">
                                @if(isset($supplier->paymentInfo['boards'][$client->id]))
                                <div class="suppliers-thead">
                                  <div class="supplier-col">ID / @lang('message.code')</div>
                                  <div class="supplier-col">@lang('message.city_')</div>
                                  <div class="supplier-col">@lang('message.type_')</div>
                                  <div class="supplier-col f3">@lang('message.address_')</div>
                                  <div class="supplier-col f03">@lang('message.side_short')</div>
                                  <div class="supplier-col f07">@lang('message.period_lc')</div>
                                  <div class="supplier-col f07">@lang('message.purchase_price')</div>
                                  <div class="supplier-col">@lang('message.payment_from_the_client')</div>
                                  <div class="supplier-col">@lang('message.payment_to_the_owner')</div>
                                </div>
                                @php
                                $companyName = "";
                                $boardsIds = [];
                                  $index = 0;
                                @endphp
                                @foreach($supplier->paymentInfo['boards'][$client->id] as $k => $board)
                                @php
                                if($board->act_id == 912){
                                  $board->company_name_short = 'ФОП Кореганова Ю.А.';
                                }
                                @endphp
                                @if($companyName != ($board->company_name_short ?: $board->company_name))
                                <div class="client-company-title">{{($board->company_name_short ?: $board->company_name)}}</div>
                                @php
                                $companyName = ($board->company_name_short ?: $board->company_name);
                                @endphp
                                @endif
                                @php
                                  if(($client->id == 554 && in_array($period,['2024-04', '2024-06'])) || ($client->id == 787 && $period == '2024-06') || ($client->id == 37 && $period == '2025-01') || ($client->id == 1061 && $period == '2025-02')){
                                      if(in_array($board->id, $boardsIds)){
                                          $index = 1;
                                      }else{
                                          $boardsIds[] = $board->id;
                                      }
                                  }
                                @endphp
                                <div class="supplier-row">
                                  <div class="supplier-col">{{$board->id}} / {{$board->code}}</div>
                                  <div class="supplier-col">{{$board->city_name}}</div>
                                  <div class="supplier-col">{{$board->title}} {{$board->format}}</div>
                                  <div class="supplier-col f3">{{$board->addr}}</div>
                                  <div class="supplier-col f03">{{$board->side}}</div>
                                  <div class="supplier-col f07">
                                    @if(!$supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->date_from)
                                      {{date('d.m.Y',strtotime($board->getContractBoardInfo($period)->date_from))}} {{date('d.m.Y',strtotime($board->getContractBoardInfo($period)->date_to))}}
                                    @else
                                      {{date('d.m.Y',strtotime($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->date_from))}} {{date('d.m.Y',strtotime($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->date_to))}}
                                    @endif
                                  </div>
                                  <div class="supplier-col f07">{{$supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->cbsp_sum ?: ($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->owner_price ?: $board->getOwnerPrice($period))}}</div>
                                  <div class="supplier-col">
                                    <span class="informer @if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->paid) paid @else wait @endif">&bull; @if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
                                    @if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->paid)
                                    <br>
                                    <span class="informer-date">{{ date('d.m.Y', strtotime($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->paid_at)) }}</span>
                                    @endif
                                  </div>
                                  <div class="supplier-col" id="b-{{$board->id}}">
                                    <span class="informer {{$editable}} @if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid) paid @else wait @endif"
                                          data-id="{{$board->id}}"
                                          data-contract_id="{{$supplier->paymentInfo['boardsInfo'][$client->id][$board->id][0]->contract_id ?: $board->getContractBoardInfo($period)->contract_id }}"
                                    >&bull; @if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
                                    @if($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid)
                                    <br>
                                    <span class="informer-date">{{ date('d.m.Y', strtotime($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid_at)) }}</span>
                                    <span class="informer-form">
                                    @php
                                    $spf = '';
                                    switch($supplier->paymentInfo['boardsInfo'][$client->id][$board->id][$index]->supplier_paid_form){
                                      case "1": $spf = 'Безнал ТОВ'; break;
                                      case "2": $spf = 'Безнал ФОП'; break;
                                      case "3": $spf = 'Форма 2'; break;
                                    }
                                    @endphp
                                      {{ $spf }}
                                    </span>
                                    @endif
                                  </div>
                                </div>
                                @endforeach
                              @endif
                                  @if(isset($supplier->paymentInfo['services'][$client->id]))
                                    <b>@lang('message.additional_services')</b><br><br>
                                    <div class="suppliers-thead">
                                      <div class="supplier-col">№</div>
                                      <div class="supplier-col f73">доп. услуга</div>
                                      <div class="supplier-col f07">@lang('message.purchase_price')</div>
                                      <div class="supplier-col">@lang('message.payment_from_the_client')</div>
                                      <div class="supplier-col">@lang('message.payment_to_the_owner')</div>
                                    </div>
                                    @foreach($supplier->paymentInfo['services'][$client->id] as $k => $service)
                                      <div class="supplier-row">
                                        <div class="supplier-col">{{$k+1}}</div>
                                        <div class="supplier-col f73">{{$service->name}}</div>
                                        <div class="supplier-col f07 supplier-price">
                                          {{--
                                          @if($service->supplier_paid || Auth::user()->role_id == 5)
                                            {{ $service->sum }}
                                          @else
                                            <input class="supplier-price"
                                                   type="text"
                                                   data-client_id="{{$client->id}}"
                                                   data-service_id="{{$service->service_id}}"
                                                   data-payment_id="{{$service->payment_id}}"
                                                   data-default_price="{{$service->sum}}"
                                                   value="{{$service->sum}}"
                                            />
                                          @endif
                                          --}}
                                          {{ $service->sum }}
                                        </div>
                                        <div class="supplier-col">
                                          <span class="informer @if($service->paid) paid @else wait @endif">&bull; @if($service->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
                                          @if($service->paid)
                                            <br>
                                            <span class="informer-date">{{ date('d.m.Y', strtotime($service->paid_at)) }}</span>
                                          @endif
                                        </div>
                                        <div class="supplier-col" id="s-{{$service->payment_id}}">
                                          <span class="informer2 {{$editable}} @if($service->supplier_paid) paid @else wait @endif"
                                                data-id="{{$service->payment_id}}"
                                          >&bull; @if($service->supplier_paid) @lang('message.paid') @else  @lang('message.wait') @endif</span>
                                          @if($service->supplier_paid)
                                            <br>
                                            <span class="informer-date">{{ date('d.m.Y', strtotime($service->supplier_paid_at)) }}</span>
                                            <span class="informer-form">
                                                  @php
                                                    $spf = '';
                                                    switch($service->supplier_paid_form){
                                                      case "1": $spf = __('message.bank_tov'); break;
                                                      case "2": $spf = __('message.bank_fop'); break;
                                                      case "3": $spf = __('message.bank_form2'); break;
                                                    }
                                                  @endphp
                                              {{ $spf }}
                                           </span>
                                          @endif
                                        </div>
                                      </div>
                                    @endforeach
                                  @endif
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>

                      @endif
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
                @if ($suppliers->lastPage() > 1)
                <div class="result-paginator" data-current-page="{{ $suppliers->currentPage() }}" data-total-page="{{ $suppliers->lastPage() }}">
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
              @endif
              @if(@count($clients))
              <div class="suppliers-table @if(!$bySupplier) active @endif tab" id="tab-supplier-data">
                <div class="suppliers-thead">
                    <div class="supplier-col">@lang('message.client')</div>
                    <div class="supplier-col supplier-col-05">@lang('message.sum')</div>
                    <div class="supplier-col supplier-col-05">@lang('message.paid2')</div>
                    <div class="supplier-col action-col">&nbsp;</div>
                </div>
                <div class="suppliers-tbody">
                @foreach($clients as $client)
                  @php
                    $paidSum = 0;
                    $supplierSum = 0;
                    /*if(Auth::user()->id == 202){
                        dd($client);
                    }*/
                    if(isset($client->paymentInfo['suppliers']) && count($client->paymentInfo['suppliers'])){
                      foreach($client->paymentInfo['suppliers'] as $supplier){
                        //$supplierSum += $supplier->sum;
                        if(isset($client->paymentInfo['boardsInfo'][$supplier->id]) && count($client->paymentInfo['boardsInfo'][$supplier->id])){
                          foreach($client->paymentInfo['boardsInfo'][$supplier->id] as $clientDetailId => $clientInfo){
                            foreach($clientInfo as $boardId => $boardInfo){
                              //if($client->paymentInfo['boardsInfo'][$supplier->id][$boardId][0] !== null){
                                //$cbsp = App\CrmContractsBoardsSuppliersPayment::where('contract_board_id',$client->paymentInfo['boardsInfo'][$supplier->id][$boardId][0]->contract_board_id)->where('paid_period',$period)->first();
                                //$client->paymentInfo['boardsInfo'][$supplier->id][$boardId][0]->cbsp_sum = $cbsp->sum;
                                        $boardsInfoIndex__ = 0;
                                        if($boardInfo[0]->paid_period === null){
                                          foreach($boardInfo as $key_ => $value_){
                                              if($value_->paid_period !== null){
                                                  $boardsInfoIndex__ = $key_;
                                                  break;
                                              }
                                          }
                                        }
                              $supplierSum += $boardInfo[$boardsInfoIndex__]->sum ?: $boardInfo[$boardsInfoIndex__]->owner_price;
                              if($boardInfo[$boardsInfoIndex__]->supplier_paid){
                                $paidSum += $boardInfo[$boardsInfoIndex__]->sum; //$boardInfo[0]->owner_price;
                              }
                            }
                          }
                        }
                        if(isset($client->paymentInfo['services'][$supplier->id]) && count($client->paymentInfo['services'][$supplier->id])){
                          foreach($client->paymentInfo['services'][$supplier->id] as $service){
                            if($service->supplier_paid){
                              $paidSum += $service->sum;
                            }
                            $supplierSum += $service->sum;
                          }
                        }
                      }
                    }
                    $addClass = "";
                    if($paidSum && $paidSum < $supplierSum){
                      $addClass = "bill-detials-2";
                    }
                    if($paidSum >= $supplierSum && $paidSum){
                      $addClass = "bill-detials-1";
                    }
                  @endphp
                  <div class="supplier-block {{$addClass}}">
                    <div class="supplier-row supplier-data-row">
                        <div class="supplier-col">{{$client->name}}</div>
                        <div class="supplier-col supplier-col-05">{{number_format($supplierSum,2,'.','')}}</div>
                        <div class="supplier-col supplier-col-05">{{$paidSum}}</div>
                        <div class="supplier-col action-col">
                          <span class=" pointer up-down-new">
                              <svg fill="#FC6B40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727" xml:space="preserve"  class="info-arrow">
                                <g class="info-arrow">
                                  <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                                    l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"  class="info-arrow"/>
                                </g>
                              </svg>
                            </span>
                        </div>
                    </div>
                    <div class="supplier-row-selects hide">
                      {{-- dump($client->paymentInfo['suppliers']) --}}
                      @if(isset($client->paymentInfo['suppliers']) && count($client->paymentInfo['suppliers']))
                      <div class="clients-contacts-data" style="background: #ffffff;">
                        <div class="suppliers-table">
                          <div class="suppliers-thead">
                              <div class="supplier-col">@lang('message.supplier')</div>
                              <div class="supplier-col supplier-col-05">@lang('message.sum')</div>
                              <div class="supplier-col supplier-col-05">@lang('message.paid2')</div>
                              <div class="supplier-col action-col">&nbsp;</div>
                          </div>
                          <div class="suppliers-tbody">
                            @foreach($client->paymentInfo['suppliers'] as $supplier)
                            @php
                              $paidSum = 0;
                              $paidSumBySupplier = 0;
                              if(isset($client->paymentInfo['boardsInfo'][$supplier->id]) && count($client->paymentInfo['boardsInfo'][$supplier->id])){
                                foreach($client->paymentInfo['boardsInfo'][$supplier->id] as $clientDetailId => $clientInfo){
                                  foreach($clientInfo as $boardId => $boardInfo){
                                    foreach($client->paymentInfo['boards'][$supplier->id] as $k => $b){

                                      if($b->id == $boardId){
                                        $board = $b;
                                        $boardsInfoIndex__ = 0;
                                        if($boardInfo[0]->paid_period === null){
                                          foreach($boardInfo as $key_ => $value_){
                                              if($value_->paid_period !== null){
                                                  $boardsInfoIndex__ = $key_;
                                                  break;
                                              }
                                          }
                                        }
                                        $paidSumBySupplier += $boardInfo[$boardsInfoIndex__]->sum ?: $boardInfo[$boardsInfoIndex__]->owner_price;
                                        if($boardInfo[$boardsInfoIndex__]->supplier_paid){
                                          $paidSum += $boardInfo[$boardsInfoIndex__]->sum; //?: $boardInfo[0]->owner_price;
                                        }
                                        break;
                                      }
                                    }
                                    if(!$board){
                                      continue;
                                    }
                                  }
                                }
                              }
                              if(isset($client->paymentInfo['services'][$supplier->id]) && count($client->paymentInfo['services'][$supplier->id])){
                                foreach($client->paymentInfo['services'][$supplier->id] as $service){
                                  if($service->supplier_paid){
                                    $paidSum += $service->sum;
                                  }
                                  $paidSumBySupplier += $service->sum;
                                }
                              }
                            @endphp
                            <div class="supplier-block2">
                              <div class="supplier-row supplier-data-row2">
                                  <div class="supplier-col">{{$supplier->name}}</div>
                                  <div class="supplier-col supplier-col-05">{{number_format($paidSumBySupplier,2,'.','')}}</div>
                                  <div class="supplier-col supplier-col-05">{{$paidSum}}</div>
                                  <div class="supplier-col action-col">
                                    <span class=" pointer up-down-new2">
                                        <svg fill="#FC6B40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 30.727 30.727" xml:space="preserve"  class="info-arrow">
                                          <g class="info-arrow">
                                            <path d="M29.994,10.183L15.363,24.812L0.733,10.184c-0.977-0.978-0.977-2.561,0-3.536c0.977-0.977,2.559-0.976,3.536,0
                                              l11.095,11.093L26.461,6.647c0.977-0.976,2.559-0.976,3.535,0C30.971,7.624,30.971,9.206,29.994,10.183z"  class="info-arrow"/>
                                          </g>
                                        </svg>
                                      </span>
                                  </div>
                              </div>
                              <div class="supplier-row-selects2 hide">
                                @if(isset($client->paymentInfo['boards'][$supplier->id]))
                                <div class="suppliers-thead">
                                  <div class="supplier-col">ID / @lang('message.code')</div>
                                  <div class="supplier-col">@lang('message.city_')</div>
                                  <div class="supplier-col">@lang('message.type_')</div>
                                  <div class="supplier-col f3">@lang('message.address_')</div>
                                  <div class="supplier-col f03">@lang('message.side_short')</div>
                                  <div class="supplier-col f07">@lang('message.period_lc')</div>
                                  <div class="supplier-col f07">@lang('message.purchase_price')</div>
                                  <div class="supplier-col">@lang('message.payment_from_the_client')</div>
                                  <div class="supplier-col">@lang('message.payment_to_the_owner')</div>
                                </div>

                                @php
                                $companyName = "";
                                //dd($client->paymentInfo['boards'][$supplier->id]);
                                @endphp
                                @foreach($client->paymentInfo['boardsInfo'][$supplier->id] as $clientDetailId => $clientInfo)
                                  @php
                                  //dd($clientInfo);
                                    $firstBoard = $clientInfo[array_key_first($clientInfo)][0];
                                    $companyName = ($firstBoard->company_name_short ?: $firstBoard->company_name);
                                    if($firstBoard->act_id == 912){
                                      $companyName = 'ФОП Кореганова Ю.А.';
                                    }
                                  @endphp
                                  @if(count($client->paymentInfo['boards'][$supplier->id]) > 1)
                                  <div class="client-company-title">{{ $companyName }}</div>
                                  @endif
                                  @foreach($clientInfo as $boardId => $boardInfo)
                                  @php
                                    $board = null;

                                    foreach($client->paymentInfo['boards'][$supplier->id] as $k => $b){
                                        if(Auth::user()->id == 202){
                                          //var_dump($b->id);
                                          //var_dump($boardId);
                                        }
                                      if($b->id == $boardId){
                                        $board = $b;
                                        break;
                                      }
                                    }
                                    $boardsInfoIndex = 0;
                                    if($boardInfo[0]->paid_period === null){
                                        foreach($boardInfo as $key_ => $value_){
                                            if($value_->paid_period !== null){
                                                $boardsInfoIndex = $key_;
                                                break;
                                            }
                                        }
                                    }
                                    if(!$board){
                                      continue;
                                    }
                                  @endphp
                                  <div class="supplier-row">
                                    <div class="supplier-col">{{$board->id}} / {{$board->code}}</div>
                                    <div class="supplier-col">{{$board->board_city->name}}</div>
                                    <div class="supplier-col">{{$board->board_type->title}} {{$board->format}}</div>
                                    <div class="supplier-col f3">{{$board->addr}}</div>
                                    <div class="supplier-col f03">{{$board->side}}</div>
                                    <div class="supplier-col f07">{{date('d.m.Y',strtotime($boardInfo[$boardsInfoIndex]->date_from))}} {{date('d.m.Y',strtotime($boardInfo[$boardsInfoIndex]->date_to))}}</div>
                                    <div class="supplier-col f07 owner-price">{{$boardInfo[$boardsInfoIndex]->sum ?: $boardInfo[$boardsInfoIndex]->owner_price}}</div>
                                    <div class="supplier-col">
                                      <span class="informer @if($boardInfo[$boardsInfoIndex]->paid) paid @else wait @endif">&bull; @if($boardInfo[$boardsInfoIndex]->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
                                      @if($boardInfo[0]->paid)
                                      <br> 
                                      <span class="informer-date">{{ date('d.m.Y', strtotime($boardInfo[$boardsInfoIndex]->paid_at)) }}</span>
                                      @endif
                                    </div>
                                    <div class="supplier-col" id="b-{{$board->id}}">
                                      <span class="informer {{$editable}} @if($boardInfo[$boardsInfoIndex]->supplier_paid) paid @else wait @endif" data-id="{{$board->id}}" data-contract_id="{{$boardInfo[$boardsInfoIndex]->contract_id}}">&bull;
                                      @if($boardInfo[$boardsInfoIndex]->supplier_paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
                                      @if($boardInfo[$boardsInfoIndex]->supplier_paid)
                                      <br>
                                      <span class="informer-date">{{ date('d.m.Y', strtotime($boardInfo[$boardsInfoIndex]->supplier_paid_at)) }}</span>
                                      <span class="informer-form">
                                      @php
                                      $spf = '';
                                      switch($boardInfo[$boardsInfoIndex]->supplier_paid_form){
                                            case "1": $spf = 'Безнал ТОВ'; break;
                                            case "2": $spf = 'Безнал ФОП'; break;
                                            case "3": $spf = 'Форма 2'; break;
                                          }
                                      @endphp
                                        {{ $spf }}
                                      </span>
                                      @endif
                                    </div>
                                  </div>
                                  @endforeach
                                @endforeach




                                {{--
                                @foreach($client->paymentInfo['boards'][$supplier->id] as $k => $board)
                                <div class="supplier-row">
                                  <div class="supplier-col">{{$board->id}} / {{$board->code}}</div>
                                  <div class="supplier-col">{{$board->city_name}}</div>
                                  <div class="supplier-col">{{$board->title}} {{$board->format}}</div>
                                  <div class="supplier-col f3">{{$board->addr}}</div>
                                  <div class="supplier-col f03">{{$board->side}}</div>
                                  <div class="supplier-col f07">{{date('d.m.Y',strtotime($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->date_from))}} {{date('d.m.Y',strtotime($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->date_to))}}</div>
                                  <div class="supplier-col f07">{{$client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->owner_price}}</div>
                                  <div class="supplier-col">
                                    <span class="informer @if($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->paid) paid @else wait @endif">&bull; @if($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->paid) Оплачен @else Ожидает @endif</span>
                                    @if($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->paid)
                                    <br>
                                    <span class="informer-date">{{ date('d.m.Y', strtotime($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->paid_at)) }}</span>
                                    @endif
                                  </div>
                                  <div class="supplier-col" id="b-{{$board->id}}">
                                    <span class="informer {{$editable}} @if($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->supplier_paid) paid @else wait @endif" data-id="{{$board->id}}" data-contract_id="{{$client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->contract_id}}">&bull;
                                    @if($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->supplier_paid) Оплачен @else Ожидает @endif</span>
                                    @if($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->supplier_paid)
                                    <br>
                                    <span class="informer-date">{{ date('d.m.Y', strtotime($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->supplier_paid_at)) }}</span>
                                    <span class="informer-form">
                                    @php
                                    $spf = '';
                                    switch($client->paymentInfo['boardsInfo'][$supplier->id][$board->id][0]->supplier_paid_form){
                                      case "1": $spf = 'Безнал ТОВ'; break;
                                      case "2": $spf = 'Безнал ФОП'; break;
                                      case "3": $spf = 'Форма 2'; break;
                                    }
                                    @endphp
                                      {{ $spf }}
                                    </span>
                                    @endif
                                  </div>
                                </div>
                                @endforeach
                                --}}

                              @endif
                                  @if(isset($client->paymentInfo['services'][$supplier->id]))
                                    <b>@lang('message.additional_services')</b><br><br>
                                    <div class="suppliers-thead">
                                      <div class="supplier-col">№</div>
                                      <div class="supplier-col f73">доп. услуга</div>
                                      <div class="supplier-col f07">@lang('message.purchase_price')</div>
                                      <div class="supplier-col">@lang('message.payment_from_the_client')</div>
                                      <div class="supplier-col">@lang('message.payment_to_the_owner')</div>
                                    </div>
                                    @foreach($client->paymentInfo['services'][$supplier->id] as $k => $service)
                                      <div class="supplier-row">
                                        <div class="supplier-col">{{$k+1}}</div>
                                        <div class="supplier-col f73">{{$service->name}}</div>
                                        <div class="supplier-col f07 supplier-price">
                                          {{--
                                          @if($service->supplier_paid || Auth::user()->role_id == 5)
                                            {{ $service->sum }}
                                          @else
                                            <input class="supplier-price"
                                                   type="text"
                                                   data-client_id="{{$client->id}}"
                                                   data-service_id="{{$service->service_id}}"
                                                   data-payment_id="{{$service->payment_id}}"
                                                   data-default_price="{{$service->sum}}"
                                                   value="{{$service->sum}}"
                                            />
                                          @endif
                                          --}}
                                          {{ $service->sum }}
                                        </div>
                                        <div class="supplier-col">
                                          <span class="informer @if($service->paid) paid @else wait @endif">&bull; @if($service->paid) @lang('message.paid') @else @lang('message.wait') @endif</span>
                                          @if($service->paid)
                                            <br>
                                            <span class="informer-date">{{ date('d.m.Y', strtotime($service->paid_at)) }}</span>
                                          @endif
                                        </div>
                                        <div class="supplier-col" id="s-{{$service->payment_id}}">
                                      <span class="informer2 {{$editable}} @if($service->supplier_paid) paid @else wait @endif"
                                            data-id="{{$service->payment_id}}"
                                      >&bull; @if($service->supplier_paid) @lang('message.paid') @else  @lang('message.wait') @endif</span>
                                          @if($service->supplier_paid)
                                            <br>
                                            <span class="informer-date">{{ date('d.m.Y', strtotime($service->supplier_paid_at)) }}</span>
                                            <span class="informer-form">
                                              @php
                                                $spf = '';
                                                switch($service->supplier_paid_form){
                                                  case "1": $spf = __('message.bank_tov'); break;
                                                  case "2": $spf = __('message.bank_fop'); break;
                                                  case "3": $spf = __('message.bank_form2'); break;
                                                }
                                              @endphp
                                              {{ $spf }}
                                          </span>
                                          @endif
                                        </div>
                                      </div>
                                    @endforeach
                                  @endif
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      @endif
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
                @if ($clients->lastPage() > 1)
                <div class="result-paginator" data-current-page="{{ $clients->currentPage() }}" data-total-page="{{ $clients->lastPage() }}">
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
              @endif
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
$(document).ready(function(){
    $('#supplier-clients-placement-period').parent().find('span.select2').css("z-index","100");
    /*$('.supplier-data-row').each(function(){
      const subData = $(this).closest('.supplier-block').find('.supplier-row-selects').eq(0);
      console.log(subData);
      let sum = 0;
      $(subData).find('.supplier-block2').each(function(){
        sum += parseFloat($(this).find('.supplier-data-row2 .supplier-col:nth-child(2)').text());
      });
      $(this).find('.supplier-col:nth-child(2)').empty().append(sum);
    })*/
})
</script>

<style>
.supplier-block{
  border-bottom: solid 1px #CDD4D9;
}
.suppliers-thead,
.supplier-row{
  display: flex;
  align-items: center;
}

/* EDITED */
.supplier-col{
  flex: 1.2;
  padding: 10px;
  font-family: 'Helvetica Neue';
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 20px;
  color: #3D445C;
} 
.supplier-row .supplier-col{
  padding: 10px;
} 
.supplier-col.action-col{
  flex:0.4;
  display:flex;
  justify-content: flex-end;
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
  background: /*#F9F9FA;*/ #F5F5F7;
}
.supplier-block.current .up-down svg,
.supplier-block2.current .up-down-new2 svg{
  transform: rotateZ(180deg);
}

/* EDITED */
.supplier-row-selects,
.supplier-row-selects2{
  padding: 30px 28px 30px 18px;
}
.supplier-row-selects .supplier-row .supplier-col:first-child,
.supplier-row-selects2 .supplier-row .supplier-col:first-child{
  padding-left: 10px;
}
.supplier-row-selects.hide,
.supplier-row-selects2.hide{
  display:none;
}
.supplier-row-selects .supplier-info,
.supplier-row-selects2 .supplier-info{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.supplier-row-selects .supplier-info .supplier-info-item,
.supplier-row-selects2 .supplier-info .supplier-info-item{
  /*flex: 1;*/
  display: flex;
  width: 50%;
  flex-shrink: 0;
}
.supplier-row-selects .supplier-info .supplier-info-item .name,
.supplier-row-selects .supplier-info .supplier-info-item .value,
.supplier-row-selects2 .supplier-info .supplier-info-item .name,
.supplier-row-selects2 .supplier-info .supplier-info-item .value{
  flex: 1;
  padding-bottom: 15px;
}
.supplier-row-selects .supplier-info .supplier-info-item .name,
.supplier-row-selects2 .supplier-info .supplier-info-item .name{
  font-style: normal;
  font-weight: 400;
  font-size: 13px;
  line-height: 16px;
  color: #8B8F9D;
}
.supplier-row-selects .supplier-info .supplier-info-item .value a,
.supplier-row-selects2 .supplier-info .supplier-info-item .value a{
  color: #FC6B40;
}
.supplier-row-selects .right-block a,
.supplier-row-selects2 .right-block a{
  color:#FC6B40;
  display:flex;
  align-items: center;
}
.supplier-row-selects .right-block a svg,
.supplier-row-selects2 .right-block a svg{
  margin-right: 5px;
}
.informer,
.informer2{
  padding: 3.5px 4px;
  background: #FCE9E4;
  border-radius: 4px;
  color: #FC6B40;
  white-space: nowrap;
}
.informer.paid,
.informer2.paid{
  background: #EDF7ED;
  color: #4FB14B;
}
.informer.partial,
.informer2.partial{
  background: #FEF5ED;
  color: #F2994A;
}
.informer-date{
  font-size: 13px;
  line-height: 24px;
  color: #8B8F9D;
}
.clients-contacts-data .suppliers-thead{
  border-top:none;
}
.select-in-title-block .select2{
  margin-left:0;
  margin-top:0;
}
.supplier-col-05{
  flex:0.5;
}
[name="user_id"] + span{
  z-index: 100;
}
</style>