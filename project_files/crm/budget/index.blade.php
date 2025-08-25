@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@php
    $editable = in_array(Auth::user()->id,[1,202,248,263]) ? "editable" : "";
@endphp

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container  container-base mw1280">
                <h1 class="title">{{$data['seo']->h1_title}}</h1>
                <div class="client-tab-data-block">
                    <div class="info-block select-in-title-block">
                        <form method="GET" action="/manager/budget">
                            <div class="field-container spc-fc">
                                <div class="input-block w150">
                                    <label>@lang('message.period')</label>
                                    <select class="search-form-select" name="period" id="supplier-clients-placement-period">
                                        @foreach($periods as $k => $v)
                                            <option value="{{$k}}" @if($period == $k) selected @endif>{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if(in_array($user->role_id, [1,5]) || $user->id == 207)
                                    <div class="input-block w260">
                                        <label>@lang('message.manager')</label>
                                        <select name="user_id">
                                            <option value="all">Все</option>
                                            @foreach($users as $manager)
                                                <option value="{{$manager->id}}" @if(@$params['user_id'] == $manager->id) selected @endif>{{$manager->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-block w150">
                                        <label>Вид</label>
                                        <select name="type">
                                            <option value="simple"  @if($params['type'] == 'simple') selected @endif>@lang('message.simple')</option>
                                            <option value="advance"  @if($params['type'] == 'advance') selected @endif>@lang('message.advanced')</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="input-block w100">
                                    <label>&nbsp;</label>
                                    <button class="btn btn-style w110">@lang('message.apply')</button>
                                </div>

                                    <div class="input-block w100">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-style export-btn w110">@lang('message.export')</button>
                                    </div>

                                @if(in_array($user->id, [1,202,248]) && $period == date('Y-m') && !$approvedBudget)
                                    <div class="input-block w100">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-style approve-btn w110">@lang('message.approve')</button>
                                    </div>
                                @endif
                                @if(in_array($user->id, [207,262,277]) && !$disableApprove  && $period == date('Y-m'))
                                    <div class="input-block w260">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-style approve-btn">@lang('message.submit_for_approval')</button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    @if($params['type'] == 'simple')
                    <div class="clients-contacts-data">
                        <div class="supplier-block">
                            <div class="supplier-row-selects m0">
                                <div class="clients-contacts-data" style="background: #ffffff;">
                                    <div class="suppliers-table">
                                        <div class="suppliers-thead">
                                            <div class="supplier-col">@lang('message.supplier')</div>
                                            <div class="supplier-col">@lang('message.period')</div>
                                            <div class="supplier-col">@lang('message.sum')</div>
                                            <div class="supplier-col">@lang('message.client')</div>
                                            <div class="supplier-col">@lang('message.received_payment')</div>
                                            <div class="supplier-col">@lang('message.pay_via')</div>
                                            <div class="supplier-col">@lang('message.manager')</div>
                                            <div class="supplier-col">@lang('message.status')</div>
                                        </div>
                                        @foreach($budget as $userId => $suppliersList)
                                            @if(Auth::user()->id == 202)
                                                {{-- dd($suppliersList) --}}
                                            @endif
                                            <div class="suppliers-tbody">
                                                @foreach($suppliersList as $supplierId => $clientsList)
                                                    @foreach($clientsList as $clientId => $clientData)
                                                        @if($clientData['boards_data'])
                                                        <div class="supplier-block2 {{ !$clientData['sum'] ? 'alert-sum' : (isset($clientData['paid']) ? 'position-paid' : '') }}">
                                                            <div class="supplier-row supplier-data-row2">
                                                                <div class="supplier-col">
                                                                    {{$suppliers[$supplierId]}}
                                                                </div>
                                                                <div class="supplier-col">
                                                                    @php
                                                                    $month = [];
                                                                    $monthList = array_keys($clientData['period']);
                                                                    sort($monthList);
                                                                    foreach($monthList as $item){
                                                                        $ym = explode('-', $item);
                                                                        $month[] = $monthName[$ym[1]]." ".$ym[0];
                                                                    }
                                                                    @endphp
                                                                    {{implode(', ', $month)}}</div>
                                                                <div class="supplier-col">{{$clientData['sum']}}</div>
                                                                <div class="supplier-col">
                                                                    @if(in_array($user->role_id,[1,5]) || $user->id == $params['user_id'] || $user->id == $userId)
                                                                        <a href="/manager/clients/{{$clientId}}/suppliers?period={{$period}}" target="_blank">
                                                                            {{$clients[$clientId]}}
                                                                        </a>
                                                                    @else
                                                                        {{$clients[$clientId]}}
                                                                    @endif
                                                                </div>
                                                                <div class="supplier-col">{{$clientData['our_details']}}</div>
                                                                <div class="supplier-col @if(in_array($clientData['paid_from'], $clientData['available_payment']) && count($clientData['available_payment']) > 1) paid-from pointer @endif " data-supplier_id="{{$supplierId}}" data-client_id="{{$clientId}}" data-paid_from="{{$clientData['paid_from']}}" data-available="{{json_encode($clientData['available_payment'])}}">
                                                                    {{$ourDetails[$clientData['paid_from']]}}
                                                                </div>
                                                                <div class="supplier-col">{{$managers[$userId]}}</div>
                                                                <div class="supplier-col">
                                                                    {!! isset($clientData['paid']) ? '<span class="informer paid">•  Оплачено </span><br>'.date('d.m.Y', strtotime($clientData['pay_date'])) : '<span class="informer wait">•  Ожидает </span>' !!}
                                                                    {{-- В дальнейшем стделать ещё 2 статуса - на оплате и отменён --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if($clientData['services_data'])
                                                        <div class="supplier-block2 {{ !$clientData['services_sum'] ? 'alert-sum' : (isset($clientData['services_paid']) ? 'position-paid' : '') }}">
                                                            <div class="supplier-row supplier-data-row2">
                                                                <div class="supplier-col">
                                                                    {{$suppliers[$supplierId]}}<br>доп. послуги
                                                                </div>
                                                                <div class="supplier-col">
                                                                    @php
                                                                        $month = [];
                                                                        $monthList = array_keys($clientData['services_period']);
                                                                        sort($monthList);
                                                                        foreach($monthList as $item){
                                                                            $ym = explode('-', $item);
                                                                            $month[] = $monthName[$ym[1]]." ".$ym[0];
                                                                        }
                                                                    @endphp
                                                                    {{implode(', ', $month)}}</div>
                                                                <div class="supplier-col">{{$clientData['services_sum']}}</div>
                                                                <div class="supplier-col">
                                                                    @if(in_array($user->role_id,[1,5]) || $user->id == $params['user_id'] || $user->id == $userId)
                                                                        <a href="/manager/clients/{{$clientId}}/suppliers?period={{$period}}" target="_blank">
                                                                            {{$clients[$clientId]}}
                                                                        </a>
                                                                    @else
                                                                        {{$clients[$clientId]}}
                                                                    @endif
                                                                </div>
                                                                <div class="supplier-col">{{$clientData['our_details']}}</div>
                                                                <div class="supplier-col @if(in_array($clientData['paid_from'], $clientData['available_payment']) && count($clientData['available_payment']) > 1) paid-from pointer @endif " data-supplier_id="{{$supplierId}}" data-client_id="{{$clientId}}" data-paid_from="{{$clientData['paid_from']}}" data-available="{{json_encode($clientData['available_payment'])}}">
                                                                    {{$ourDetails[$clientData['paid_from']]}}
                                                                </div>
                                                                <div class="supplier-col">{{$managers[$userId]}}</div>
                                                                <div class="supplier-col">
                                                                    {!! isset($clientData['services_paid']) ? '<span class="informer paid">•  Оплачено </span><br>'.date('d.m.Y', strtotime($clientData['services_pay_date'])) : '<span class="informer wait">•  Ожидает </span>' !!}
                                                                    {{-- В дальнейшем стделать ещё 2 статуса - на оплате и отменён --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        @endforeach
                                        <div class="supplier-row">
                                            <div class="supplier-col"></div>
                                            <div class="supplier-col result-value">Итого</div>
                                            <div class="supplier-col result-value">{{array_sum($managersSum)}}</div>
                                            <div class="supplier-col"></div>
                                            <div class="supplier-col"></div>
                                            <div class="supplier-col"></div>
                                            <div class="supplier-col"></div>
                                            <div class="supplier-col"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="clients-contacts-data">
                        <div class="suppliers-tbody">
                        @if(count($budget) > 1)
                        @foreach($budget as $userId => $suppliersList)
                            <div class="supplier-block">
                                <div class="supplier-row supplier-data-row">
                                    <div class="supplier-col">
                                        {{$managers[$userId]}}
                                    </div>
                                    <div class="supplier-col">
                                        {{$managersSum[$userId]}}
                                    </div>
                                    <div class="supplier-col">
                                    @if(in_array($user->id, [1,202,248]) && $period == date('Y-m') && !$approvedBudget && !$approvedByManagers[$userId] && !$disableApproveByManager[$userId])
                                        <button class="btn btn-style approve-manager-btn" data-user_id="{{$userId}}">Утвердить</button>
                                    @endif
                                    </div>
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
                                    <div class="clients-contacts-data" style="background: #ffffff;">
                                        <div class="suppliers-table">
                                            <div class="suppliers-thead">
                                                <div class="supplier-col">@lang('message.supplier')</div>
                                                <div class="supplier-col">@lang('message.period')</div>
                                                <div class="supplier-col">@lang('message.sum')</div>
                                                <div class="supplier-col">@lang('message.client')</div>
                                                <div class="supplier-col">@lang('message.received_payment')</div>
                                                <div class="supplier-col">@lang('message.pay_via')</div>
                                                <div class="supplier-col">@lang('message.status')</div>
                                            </div>
                                            <div class="suppliers-tbody">
                                            @foreach($suppliersList as $supplierId => $clientsList)
                                                @foreach($clientsList as $clientId => $clientData)
                                                @if($clientData['boards_data'])
                                                <div class="supplier-block2 {{ !$clientData['sum'] ? 'alert-sum' : (isset($clientData['paid']) ? 'position-paid' : '') }}">
                                                    <div class="supplier-row supplier-data-row2">
                                                        <div class="supplier-col">
                                                            {{$suppliers[$supplierId]}}
                                                        </div>
                                                        <div class="supplier-col">
                                                            @php
                                                                $month = [];
                                                                $monthList = array_keys($clientData['period']);
                                                                sort($monthList);
                                                                foreach($monthList as $item){
                                                                    $ym = explode('-', $item);
                                                                    $month[] = $monthName[$ym[1]]." ".$ym[0];
                                                                }
                                                            @endphp
                                                            {{implode(', ', $month)}}
                                                        </div>
                                                        <div class="supplier-col">{{$clientData['sum']}}</div>
                                                        <div class="supplier-col">

                                                            @if(in_array($user->role_id,[1,5]) || ($user->id == 207 && in_array($clientId, $managerChiefClients)))
                                                                <a href="/manager/clients/{{$clientId}}/suppliers?period={{$period}}" target="_blank">
                                                                {{$clients[$clientId]}}
                                                                </a>
                                                            @else
                                                                {{$clients[$clientId]}}
                                                            @endif
                                                        </div>
                                                        <div class="supplier-col">{{$clientData['our_details']}}</div>
                                                        <div class="supplier-col @if(in_array($clientData['paid_from'], $clientData['available_payment']) && count($clientData['available_payment']) > 1) paid-from pointer @endif " data-supplier_id="{{$supplierId}}" data-client_id="{{$clientId}}" data-paid_from="{{$clientData['paid_from']}}" data-available="{{json_encode($clientData['available_payment'])}}">
                                                            {{$ourDetails[$clientData['paid_from']]}}
                                                        </div>
                                                        <div class="supplier-col">
                                                            {!! isset($clientData['paid']) ? '<span class="informer paid">•  Оплачено </span><br>'.date('d.m.Y', strtotime($clientData['pay_date'])) : '<span class="informer wiat">•  Ожидает </span>' !!}
                                                            {{-- В дальнейшем стделать ещё 2 статуса - на оплате и отменён --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($clientData['services_data'])
                                                <div class="supplier-block2 {{ !$clientData['services_sum'] ? 'alert-sum' : (isset($clientData['services_paid']) ? 'position-paid' : '') }}">
                                                    <div class="supplier-row supplier-data-row2">
                                                        <div class="supplier-col">
                                                            {{$suppliers[$supplierId]}}<br>доп. послуги
                                                        </div>
                                                        <div class="supplier-col">
                                                            @php
                                                                $month = [];
                                                                $monthList = array_keys($clientData['services_period']);
                                                                sort($monthList);
                                                                foreach($monthList as $item){
                                                                    $ym = explode('-', $item);
                                                                    $month[] = $monthName[$ym[1]]." ".$ym[0];
                                                                }
                                                            @endphp
                                                            {{implode(', ', $month)}}
                                                        </div>
                                                        <div class="supplier-col">{{$clientData['services_sum']}}</div>
                                                        <div class="supplier-col">

                                                            @if(in_array($user->role_id,[1,5]) || ($user->id == 207 && in_array($clientId, $managerChiefClients)))
                                                                <a href="/manager/clients/{{$clientId}}/suppliers?period={{$period}}" target="_blank">
                                                                    {{$clients[$clientId]}}
                                                                </a>
                                                            @else
                                                                {{$clients[$clientId]}}
                                                            @endif
                                                        </div>
                                                        <div class="supplier-col">{{$clientData['our_details']}}</div>
                                                        <div class="supplier-col @if(in_array($clientData['paid_from'], $clientData['available_payment']) && count($clientData['available_payment']) > 1) paid-from pointer @endif " data-supplier_id="{{$supplierId}}" data-client_id="{{$clientId}}" data-paid_from="{{$clientData['paid_from']}}" data-available="{{json_encode($clientData['available_payment'])}}">
                                                            {{$ourDetails[$clientData['paid_from']]}}
                                                        </div>
                                                        <div class="supplier-col">
                                                            {!! isset($clientData['services_paid']) ? '<span class="informer paid">•  Оплачено </span><br>'.date('d.m.Y', strtotime($clientData['services_pay_date'])) : '<span class="informer wiat">•  Ожидает </span>' !!}
                                                            {{-- В дальнейшем стделать ещё 2 статуса - на оплате и отменён --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                            @foreach($budget as $userId => $suppliersList)
                                <div class="supplier-block">
                                    <div class="supplier-row-selects">
                                        <div class="clients-contacts-data" style="background: #ffffff;">
                                            <div class="suppliers-table">
                                                <div class="suppliers-thead">
                                                    <div class="supplier-col">@lang('message.supplier')</div>
                                                    <div class="supplier-col">@lang('message.period')</div>
                                                    <div class="supplier-col">@lang('message.sum')</div>
                                                    <div class="supplier-col">@lang('message.client')</div>
                                                    <div class="supplier-col">@lang('message.received_payment')</div>
                                                    <div class="supplier-col">@lang('message.pay_via')</div>
                                                    <div class="supplier-col">@lang('message.status')</div>
                                                </div>
                                                <div class="suppliers-tbody">
                                                    @foreach($suppliersList as $supplierId => $clientsList)
                                                        @foreach($clientsList as $clientId => $clientData)
                                                            @if($clientData['boards_data'])
                                                            <div class="supplier-block2 {{ !$clientData['sum'] ? 'alert-sum' : (isset($clientData['paid']) ? 'position-paid' : '') }}">
                                                                <div class="supplier-row supplier-data-row2">
                                                                    <div class="supplier-col">
                                                                        {{$suppliers[$supplierId]}}
                                                                        @if($clientData['services_sum'])
                                                                            <br>доп. послуги
                                                                        @endif
                                                                    </div>
                                                                    <div class="supplier-col">
                                                                        @php
                                                                            $month = [];
                                                                            $monthList = array_keys($clientData['period']);
                                                                            sort($monthList);
                                                                            foreach($monthList as $item){
                                                                                $ym = explode('-', $item);
                                                                                $month[] = $monthName[$ym[1]]." ".$ym[0];
                                                                            }
                                                                        @endphp
                                                                        {{implode(', ', $month)}}
                                                                    </div>
                                                                    <div class="supplier-col">{{$clientData['sum'] ?: ($clientData['services_sum'] ?: '')}}</div>
                                                                    <div class="supplier-col">
                                                                        @if(in_array($user->role_id,[1,5]) || $user->id == $params['user_id'] || $user->id != 207)
                                                                        <a href="/manager/clients/{{$clientId}}/suppliers?period={{$period}}" target="_blank">
                                                                        {{$clients[$clientId]}}
                                                                        </a>
                                                                        @else
                                                                            {{$clients[$clientId]}}
                                                                        @endif
                                                                    </div>
                                                                    <div class="supplier-col">{{$clientData['our_details']}}</div>
                                                                    <div class="supplier-col @if(in_array($clientData['paid_from'], $clientData['available_payment']) && count($clientData['available_payment']) > 1) paid-from pointer @endif" data-supplier_id="{{$supplierId}}" data-client_id="{{$clientId}}" data-paid_from="{{$clientData['paid_from']}}" data-available="{{json_encode($clientData['available_payment'])}}">
                                                                        {{$ourDetails[$clientData['paid_from']]}}
                                                                    </div>
                                                                    <div class="supplier-col">
                                                                        {!! isset($clientData['paid']) ? '<span class="informer paid">•  Оплачено </span><br>'.date('d.m.Y', strtotime($clientData['pay_date'])) : '<span class="informer wait">•  Ожидает </span>' !!}
                                                                        {{-- В дальнейшем стделать ещё 2 статуса - на оплате и отменён --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if($clientData['services_data'])
                                                            <div class="supplier-block2 {{ !$clientData['sum'] ? 'alert-sum' : (isset($clientData['services_paid']) ? 'position-paid' : '') }}">
                                                                <div class="supplier-row supplier-data-row2">
                                                                    <div class="supplier-col">
                                                                        {{$suppliers[$supplierId]}}<br>доп. послуги
                                                                    </div>
                                                                    <div class="supplier-col">
                                                                        @php
                                                                            $month = [];
                                                                            $monthList = array_keys($clientData['services_period']);
                                                                            sort($monthList);
                                                                            foreach($monthList as $item){
                                                                                $ym = explode('-', $item);
                                                                                $month[] = $monthName[$ym[1]]." ".$ym[0];
                                                                            }
                                                                        @endphp
                                                                        {{implode(', ', $month)}}
                                                                    </div>
                                                                    <div class="supplier-col">{{$clientData['services_sum'] ?: ''}}</div>
                                                                    <div class="supplier-col">
                                                                        @if(in_array($user->role_id,[1,5]) || $user->id == $params['user_id'] || $user->id != 207)
                                                                            <a href="/manager/clients/{{$clientId}}/suppliers?period={{$period}}" target="_blank">
                                                                                {{$clients[$clientId]}}
                                                                            </a>
                                                                        @else
                                                                            {{$clients[$clientId]}}
                                                                        @endif
                                                                    </div>
                                                                    <div class="supplier-col">{{$clientData['our_details']}}</div>
                                                                    <div class="supplier-col @if(in_array($clientData['paid_from'], $clientData['available_payment']) && count($clientData['available_payment']) > 1) paid-from pointer @endif" data-supplier_id="{{$supplierId}}" data-client_id="{{$clientId}}" data-paid_from="{{$clientData['paid_from']}}" data-available="{{json_encode($clientData['available_payment'])}}">
                                                                        {{$ourDetails[$clientData['paid_from']]}}
                                                                    </div>
                                                                    <div class="supplier-col">
                                                                        {!! isset($clientData['services_paid']) ? '<span class="informer paid">•  Оплачено </span><br>'.date('d.m.Y', strtotime($clientData['services_pay_date'])) : '<span class="informer wait">•  Ожидает </span>' !!}
                                                                        {{-- В дальнейшем стделать ещё 2 статуса - на оплате и отменён --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                            <div class="supplier-block">
                                <div class="supplier-row">
                                    <div class="supplier-col result-value">
                                        Итого
                                    </div>
                                    <div class="supplier-col result-value">
                                        {{array_sum($managersSum)}}
                                    </div>
                                    <div class="supplier-col action-col">&nbsp;</div>
                                    <div class="supplier-col action-col">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
const ourDetails = {!! json_encode($ourDetails) !!};
const popupPaidFrom = `
<div class="default-popup hide  deactivate-client-form zi10101">
    <div class='default-popup-header'>
        <span>@lang('message.change_payer') &nbsp;</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
       </span>
    </div>
    <div class="default-popup-body">
        <form method="POST" enctype="multipart/form-data" id="suppliers_paid_from_change">
            <input type="hidden" name="client_id" value=""/>
            <input type="hidden" name="supplier_id" value="">
            <input type="hidden" name="period" value="{{$period}}">
            <div class="field-container">
                <div class="input-block mr-15">
                    <label>@lang('message.pay_with'):</label>
                    <select class="supplier_paid_from2" name="our_details_id"></select>
                </div>
            </div>
            <div class="align-right">
                <a class="clear-new pointer">@lang('message.cancel')</a>
                <button class="submit">@lang('message.save')</button>
            </div>
        </form>
    </div>
</div>`;
$(document).ready(function(){
    $('#supplier-clients-placement-period').parent().find('span.select2').css("z-index","100");
    $('[name="type"]').select2({minimumResultsForSearch: -1});
    $('.export-btn').click(function(){
        $(this).empty().append('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
        const userId = $('[name=user_id]').val();
        const period = $('[name=period]').val();
        $.ajax({
            url: '/manager/budget/export?period='+period+'&user_id='+userId,
            method: 'GET',
            xhrFields: {
                responseType: 'blob'
            },
            success: function (data, status, xhr) {
                let filename = "";
                let disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    let filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    let matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) {
                        filename = matches[1].replace(/['"]/g, '');
                    }
                }
                let a = document.createElement('a');
                let url = window.URL.createObjectURL(data);
                a.href = url;
                a.download = filename;
                document.body.append(a);
                a.click();
                a.remove();
                window.URL.revokeObjectURL(url);
                $('.export-btn').empty().append('@lang('message.export')');
            },
            error: function() {
                $('.export-btn').empty().append('@lang('message.export')');
            }
        });
        return false;
    });
    $('.approve-btn').click(function (){
        createConfirm('@lang('message.approve_budget')', '@lang('message.do_you_really_want_to_approve_the_budget')?', function(){
            $.post(
                '/manager/budget/approve',
                {
                    'period': $('[name=period]').val()
                },
                function(data){
                    if(data.success){
                        $('.approve-btn').remove();
                        toastr.success('@lang('message.budget_approved')');
                    }else{
                        toastr.warning('@lang('message.data_processing_error')');
                    }
                }
            )
        })

        return false;
    });
    $('.approve-manager-btn').click(function (){
        const userId = $(this).data('user_id');
        createConfirm('@lang('message.approve_budget')', '@lang('message.do_you_really_want_to_approve_this_manager-s_budget')?', function(){
            $.post(
                '/manager/budget/approve-by-manager',
                {
                    'period': $('[name=period]').val(),
                    'user_id': userId
                },
                function(data){
                    if(data.success){
                        $('.approve-manager-btn[data-user_id='+userId+']').remove();
                        toastr.success('@lang('message.budget_approved')');
                    }else{
                        toastr.warning('@lang('message.data_processing_error')');
                    }
                }
            )
        })

        return false;
    });
    $('.paid-from').click(function(){
        $('.default-popup.deactivate-client-form.zi10101').remove();
        $('body').append(popupPaidFrom);
        $('#suppliers_paid_from_change [name=client_id]').val($(this).data('client_id'));
        $('#suppliers_paid_from_change [name=supplier_id]').val($(this).data('supplier_id'));
        $('#suppliers_paid_from_change select').empty();
        const availablePayment = $(this).data('available');
        availablePayment.forEach(el => {
            $('#suppliers_paid_from_change select').append(`<option value='${el}'>${ourDetails[el]}</option>`);
        })
        $('#suppliers_paid_from_change select option[value='+$(this).data('paid_from')+']').prop('selected', true);
        $('.supplier_paid_from2').select2({minimumResultsForSearch: -1});
        $('.al-overlay3').removeClass('hide');
        $('.default-popup').removeClass('hide');
    });
    $(document).on('submit', '#suppliers_paid_from_change', function (){
        $.post(
            '/manager/budget/change-paid-from',
            $(this).serialize(),
            function(data){
                if(data.success){
                    const value = $('#suppliers_paid_from_change select option:selected').text();
                    const supplierId = $('#suppliers_paid_from_change [name=supplier_id]').val();
                    const clientId = $('#suppliers_paid_from_change [name=client_id]').val();
                    $(`div [data-supplier_id=${supplierId}][data-client_id=${clientId}]`).text(value);
                }else{
                    toastr.warning('@lang('message.data_processing_error')');
                }
                $('.al-overlay3').click();
            }
        )
        return false;
    })
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
    .suppliers-thead .supplier-col,
    .supplier-row .supplier-col{
        padding: 10px;
    }
    .supplier-col.action-col{
        flex:0.4;
        display:flex;
        justify-content: flex-end;
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
    .clients-contacts-data .suppliers-thead{
        border-top:none;
    }
    .select-in-title-block .select2{
        margin-left:0;
        margin-top:0;
    }
    [name="user_id"] + span{
        z-index: 100;
    }
    .approve-btn,
    .approve-btn:hover{
        background: #4FB14B;
    }
    .w150,
    .w150 select,
    .w150 .select2.select2-container.select2-container--default{
        width:150px !important;
    }
    .mw1280 .field-container .input-block.w100{
        width: 100px;
    }
    button.w110{
        width:110px;
    }
    .alert-sum{
        background: rgba(252,107,62,0.5);
    }
    .result-value{
        font-weight: bold;
        font-size: 18px;
    }
    .default-popup.hide{
        display: none;
    }
    .supplier_paid_from2{
        width:292px;
    }
    .approve-manager-btn{
        line-height: 30px;
        height: 30px;
        padding-left: 10px;
        padding-right: 10px;
        background: #4FB14B;
    }
    .approve-manager-btn:hover{
        background: #4FB14B;
    }
    .position-paid{
        background: rgba(0, 255, 0, 0.1);
    }
    .mw1280 .field-container.spc-fc{
        justify-content: flex-start;
    }
    .m0{
        margin-left:0;
        margin-right: 0;
        padding-left: 0;
        padding-right: 0;
    }
    .informer{
        padding: 3.5px 4px;
        background: #FCE9E4;
        border-radius: 4px;
        color: #FC6B40;
        white-space: nowrap;
    }
    .informer.paid{
        background: #8aed8a;
        color: #2f8e2b;
    }
</style>