<form id="update-services-form"
      data-contract_id="{{$contract->id}}"
      data-client_id="{{$client->id}}"
      data-act_id="{{$act->id}}">
    <input type="hidden" name="contract_id" value="{{$contract->id}}"/>
    <input type="hidden" name="client_id" value="{{$client->id}}"/>
    <input type="hidden" name="act_id" value="{{$act->id}}"/>
    <input type="hidden" name="detailing" value="1"/>
    <input type="hidden" name="original_service" value="{{$service->id}}"/>
    <div class="services-list">
        <div class="services-item head-line">
            <div class="services-name">@lang('message.company_name2')</div>
            <div class="services-supplier">@lang('message.supplier')</div>
            <div class="services-price">@lang('message.purchase_price')</div>

            <div class="services-price"><b>@lang('message.price_per_one')</b></div>
            <div class="services-count"><b>@lang('message.qty')</b></div>
            <div class="services-result"><b>@lang('message.sum')</b></div>
            <div class="services-action"></div>
        </div>
        <div class="services-item service-item-data">
            <div class="services-name">
                <select name="service_id[]" class="services-dd " style="display: none">
                    <option value="{{$service->service_id}}" data-price_in="{{$service->price}}">{{$service->name}}</option>
                </select>
                <input type="text" class="other-input hide" name="service_other[]" value="{{ $service->name ?: '' }}"/>
                {{$service->service->name}} {{ $service->name ?: '' }}

            </div>
            <div class="services-supplier">
                <div class="supplier-type-item">
                    <input type="checkbox" name="by_supplier[0]"
                           value="1"> @lang('message.performed_by_several_contractors')
                </div>
                <div class="supplier-service-block">
                    <select name="supplier_id[0]" class="services-supplier-dd detailing-services-dd">
                        @foreach($defaultSuppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="services-price_in">
                <input type="text" name="service_price_in[]" class="sp_in" value="{{$service->price_in}}">
            </div>

            <div class="services-price">
                <input type="text" name="service_price[]" class="sp" required  value="{{$service->price}}">
            </div>
            <div class="services-count">
                <input type="text" name="service_count[]" class="sc" required  value="{{$service->count}}">
            </div>
            <div class="services-result">
                <input type="text" name="service_result[]" class="sr" required  value="{{$service->sum}}">
            </div>
            <div class="services-action">
            </div>
            <div class="sub-service hide"></div>
            <div class="sub-service-action hide">
                <a class="add-sub-service-line pointer">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M10 3.54163C10.3452 3.54163 10.625 3.82145 10.625 4.16663V15.8333C10.625 16.1785 10.3452 16.4583 10 16.4583C9.65482 16.4583 9.375 16.1785 9.375 15.8333V4.16663C9.375 3.82145 9.65482 3.54163 10 3.54163Z"
                              fill="#FC6B40"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M3.54102 10C3.54102 9.65482 3.82084 9.375 4.16602 9.375H15.8327C16.1779 9.375 16.4577 9.65482 16.4577 10C16.4577 10.3452 16.1779 10.625 15.8327 10.625H4.16602C3.82084 10.625 3.54102 10.3452 3.54102 10Z"
                              fill="#FC6B40"/>
                    </svg>
                    @lang('message.add_additional_supplier')
                </a>
            </div>
        </div>
    </div>
    <div class="form-footer align-right">
        <button class="crm-button pointer">@lang('message.save')</button>
    </div>
</form>
<script>
    $('.detailing-services-dd').select2();
</script>