<section id="result-search-list" class="al-leeds-page">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search mw1460">
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="favorite-viewed-tab">
                    @foreach($types as $key => $type)
                        <a href="/manager/suppliers/bills?type={{$key}}" @if($key == $params['type']) class="active" @endif id="link-{{$key}}">
                            {{$type}}@if(in_array($currentUser->role_id, [1,5]) && $countBills[$key]) ({{$countBills[$key]}})@endif
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="content-block clearfix mw1460">
                <div class="suppliers-bills-header">
                    <div class="search-block">
                        <form action="/manager/suppliers/bills" id="suppliers-bills-filter">
                            <input type="hidden" name="type" value="{{$params['type']}}"/>
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.search')</label>
                                    <input type="text" name="search" value="{{$params['search']}}" placeholder="@lang('message.enter_value')" />
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.bill_number')</label>
                                    <input type="text" name="number" value="{{$params['number']}}" placeholder="@lang('message.enter_bill_number')" />
                                </div>
                                <div class="input-block filter-btn-block" style="display: flex;">
                                    <a class="bk-filter-btn ">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M0.989754 1.01326C1.08192 0.814602 1.28101 0.6875 1.50001 0.6875H16.5C16.719 0.6875 16.9181 0.814602 17.0103 1.01326C17.1024 1.21191 17.0709 1.446 16.9295 1.61322L11.0625 8.55096V14.75C11.0625 14.945 10.9616 15.126 10.7957 15.2285C10.6299 15.331 10.4228 15.3403 10.2485 15.2531L7.24845 13.7531C7.05788 13.6578 6.93751 13.4631 6.93751 13.25V8.55096L1.0705 1.61322C0.929088 1.446 0.897583 1.21191 0.989754 1.01326ZM2.71237 1.8125L7.92952 7.98178C8.01539 8.08333 8.06251 8.21201 8.06251 8.345V12.9024L9.93751 13.8399V8.345C9.93751 8.21201 9.98463 8.08333 10.0705 7.98178L15.2877 1.8125H2.71237Z"
                                                  fill="#FC6B40"/>
                                        </svg>
                                        @lang('message.filter')
                                    </a>
                                    @can('export-suppliers-bills')
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="crm-button suppliers-bills-export pointer">@lang('message.export')</span>
                                    @endcan
                                </div>

                                <div class="bk-filter-block">
                                    <div class="bk-filter-header">
                                        <span>@lang('message.filter')</span>
                                        <span class="close">
                                          <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                                                  fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
                                          </svg>
                                        </span>
                                    </div>
                                    <div class="bk-filter-fields">
                                        <div class="input-block">
                                            <label>@lang('message.status')</label>
                                            <select name="status_id" class="status-select search-form-select">
                                                <option value="">-</option>
                                                @foreach($allStatuses as $id => $name)
                                                    <option value="{{$id}}" @if($id == $satusId) selected @endif>{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($currentUser->role_id !== 2)
                                            <div class="input-block">
                                                <label>@lang('message.manager')</label>
                                                <select name="manager_id" class="manager-select search-form-select">
                                                    <option value="">-</option>
                                                    @php $managerName = ''; @endphp
                                                    @foreach($managers as $item)
                                                        @php
                                                            if($managerId == $item->id){
                                                                $managerName = $item->name;
                                                            }
                                                        @endphp
                                                        <option value="{{$item->id}}" @if($managerId == $item->id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="input-block">
                                            <label>@lang('message.month')</label>
                                            <select name="month" class="month-select search-form-select">
                                                <option value="">-</option>
                                                @foreach($months as $ym => $name)
                                                    <option value="{{$ym}}" @if($ym == $month) selected @endif>{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-block">
                                            <label>@lang('message.client')</label>
                                            <select name="client_id" class="client-select search-form-select">
                                                <option value="">-</option>
                                                @php
                                                    $selected = null;
                                                    $found = false;
                                                    $clientName = '';
                                                @endphp
                                                @foreach($clientsForFilter as $item)
                                                    @php
                                                        if(!$selected && $clientId == $item['id'] && !$found){
                                                            $selected = "selected";
                                                            $clientName = $item['name'];
                                                        }
                                                    @endphp
                                                    <option value="{{$item['id']}}" {{$selected}}>{{$item['name']}}</option>
                                                    @php
                                                        if($selected && $clientId == $item['id'] && !$found){
                                                            $found = true;
                                                            $selected = null;
                                                        }
                                                    @endphp
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-block">
                                            <label>@lang('message.supplier')</label>
                                            <select name="supplier_id" class="supplier-select search-form-select">
                                                <option value="">-</option>
                                                @php
                                                    $selected = null;
                                                    $found = false;
                                                    $supplierName = '';
                                                @endphp
                                                @foreach($suppliersForFilter as $item)
                                                    @php
                                                        if(!$selected && $supplierId == $item['id'] && !$found && !$supplierDetailsId){
                                                            $supplierName = $item['name'];
                                                            $selected = "selected";
                                                        }
                                                        if($supplierDetailsId && $item['details_id'] == $supplierDetailsId){
                                                            $supplierName = $item['name'];
                                                            $selected = "selected";
                                                        }
                                                    @endphp
                                                    <option value="{{$item['id']}}" data-details_id="{{$item['details_id']}}" {{$selected}}>{{$item['name']}}</option>
                                                    @php
                                                        if($selected && $supplierId == $item['id'] && !$found && !$supplierDetailsId){
                                                            $found = true;
                                                            $selected = null;
                                                        }
                                                        if($supplierDetailsId && $item['details_id'] == $supplierDetailsId){
                                                            $found = true;
                                                            $selected = null;
                                                        }
                                                    @endphp
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="supplier_details_id" value="{{$supplierDetailsId}}" id="filter-supplier_details_id"/>
                                        </div>
                                        <div class="input-block">
                                            <label>@lang('message.payer')</label>
                                            <select name="our_details_id" class="our_details-select search-form-select">
                                                <option value="">-</option>
                                                @php $ourDetailsName = ''; @endphp
                                                @foreach($ourDetails as $item)
                                                    @php
                                                        if($ourDetailsId == $item->id){
                                                            $ourDetailsName = $item->name_short;
                                                        }
                                                    @endphp
                                                    <option value="{{$item->id}}" @if($ourDetailsId == $item->id) selected @endif>{{$item->name_short}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-block">
                                            <button class="crm-button">@lang('message.find')</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="al-selected-filter">
                                    @if($managerId)
                                        <div class="selected-filter-item"
                                             data-filter="manager_id"
                                             data-id="{{$managerId}}">
                                            {{$managerName}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                    @if($month)
                                        <div class="selected-filter-item"
                                             data-filter="month"
                                             data-id="{{$month}}">
                                            {{$months[$month]}}
                                            {{--<img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>--}}
                                        </div>
                                    @endif
                                    @if($statusId)
                                        <div class="selected-filter-item"
                                             data-filter="status_id"
                                             data-id="{{$statusId}}">
                                            {{$allStatuses[$statusId]}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                    @if($clientId)
                                        <div class="selected-filter-item"
                                             data-filter="client_id"
                                             data-id="{{$clientId}}">
                                            {{$clientName}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                    @if($supplierId)
                                        <div class="selected-filter-item"
                                             data-filter="supplier_id"
                                             data-id="{{$supplierId}}">
                                            {{$supplierName}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                    @if($ourDetailsId)
                                        <div class="selected-filter-item"
                                             data-filter="our_details_id"
                                             data-id="{{$ourDetailsId}}">
                                            {{$ourDetailsName}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                    @if($params['number'])
                                        <div class="selected-filter-item"
                                             data-filter="number"
                                             data-id="{{$params['number']}}">
                                            {{$params['number']}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                    @if($params['search'])
                                        <div class="selected-filter-item"
                                             data-filter="search"
                                             data-id="{{$params['search']}}">
                                            {{$params['search']}}
                                            <img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="action-block">

                        <a class="crm-button show-add-supplier-bill-form">@lang('message.add_bill')</a>

                    </div>
                </div>
                <div class="data-section">
                    @include('front.crm.suppliers.bills.data')
                </div>
            </div>
        </div>
    </div>
</section>