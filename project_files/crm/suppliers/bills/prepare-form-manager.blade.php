<div class="add-supplier-bill zi10101 manager-bill-popup">
    <div class="add-supplier-bill-header">
        <span>@lang('message.create_bill')</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                      fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="add-supplier-bill-body">
        <ul class="tab-selector">
            <li data-id="by-client" class="active">@lang('message.client')</li>
            <li data-id="by-supplier">@lang('message.supplier')</li>
        </ul>
        <div class="bill-add-tabs">
            <form class="suppliers-bill-form" id="suppliers-bill-form-by-client" method="post">
                <input type="hidden" name="bill_id" value=""/>
                <input type="hidden" name="type_id" value="{{$params['type']}}"/>
                <div id="by-client" class="tab-item active">
                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.client')</label>
                            <select class="form-select" id="select-client-id" name="client_id">
                                <option value="-">-</option>
                                @foreach($clients as $client)
                                    <option value="{{$client['id']}}">{{$client['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="by-client-sub-filter hide">
                        <ul class="tab-selector2">
                            <li data-id="by-client-and-period" class="active">@lang('message.period')</li>
                            <li data-id="by-client-and-supplier">@lang('message.supplier')</li>
                            <li data-id="by-client-and-contract">@lang('message.contract')</li>
                        </ul>
                        <div id="by-client-and-period" class="tab-item2 active">
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.period')</label>
                                    <select class="form-select" id="select-client-period-id" name="period_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <div class="input-block client-period-supplier-block">
                                    <label>@lang('message.supplier')</label>
                                    <select class="form-select" id="select-client-period-supplier-id"
                                            name="supplier_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <table id="client-period-supplier-bill-boards-list" class="boards-list-table">
                                <caption>@lang('message.planes')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.code')</td>
                                    <td>@lang('message.address')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="client-period-supplier-bill-services-list" class="service-list-table">
                                <caption>@lang('message.additional_services')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.service')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div id="by-client-and-supplier" class="tab-item2">
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.supplier')</label>
                                    <select class="form-select" id="select-client-supplier-id" name="supplier_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <div class="input-block client-supplier-period-block">
                                    <label>@lang('message.period')</label>
                                    <select class="form-select" id="select-client-supplier-period-id" name="period_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-container client-supplier-details-card-info" style="flex-wrap: wrap">
                                <div class="input-block">
                                    <label>@lang('message.card_number')</label>
                                    <input type="text" name="card_number" id="client-supplier-details-bank-card-number">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.bank_name')</label>
                                    <input type="text" name="bank_name" id="client-supplier-details-bank-name">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.recipient_')</label>
                                    <input type="text" name="card_holder"
                                           id="client-supplier-details-bank-card-recipient">
                                </div>
                            </div>
                            <table id="client-supplier-period-bill-boards-list" class="boards-list-table">
                                <caption>@lang('message.planes')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.code')</td>
                                    <td>@lang('message.address')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="client-supplier-period-bill-services-list" class="service-list-table">
                                <caption>@lang('message.additional_services')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.service')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div id="by-client-and-contract" class="tab-item2">
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.contract')</label>
                                    <select class="form-select" id="select-client-contract-id" name="contract_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <div class="input-block client-contract-supplier-block">
                                    <label>@lang('message.supplier')</label>
                                    <select class="form-select" id="select-client-contract-supplier-id"
                                            name="supplier_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-container client-contract-supplier-details-card-info"
                                 style="flex-wrap: wrap">
                                <div class="input-block">
                                    <label>@lang('message.card_number')</label>
                                    <input type="text" name="card_number"
                                           id="client-contract-supplier-details-bank-card-number">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.bank_name')</label>
                                    <input type="text" name="bank_name" id="client-contract-supplier-details-bank-name">
                                </div>
                                <div class="input-block">
                                    <label>@lang('message.recipient_')</label>
                                    <input type="text" name="card_holder"
                                           id="client-contract-supplier-details-bank-card-recipient">
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block client-contract-supplier-period-block">
                                    <label>@lang('message.period')</label>
                                    <select class="form-select" id="select-client-contract-supplier-period-id"
                                            name="period_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <table id="client-contract-supplier-period-bill-boards-list" class="boards-list-table">
                                <caption>@lang('message.planes')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.code')</td>
                                    <td>@lang('message.address')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="client-contract-supplier-period-bill-services-list" class="service-list-table">
                                <caption>@lang('message.additional_services')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.service')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="by-supplier" class="tab-item">
                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.supplier')</label>
                            <select class="form-select" id="select-supplier-id" name="supplier_id">
                                <option value="-">-</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="by-supplier-sub-filter hide">
                        <ul class="tab-selector2">
                            <li data-id="by-supplier-and-period" class="active">@lang('message.period')</li>
                            <li data-id="by-supplier-and-client">@lang('message.client')</li>
                        </ul>
                        <div id="by-supplier-and-period" class="tab-item2 active">
                            <div class="field-container">
                                <div class="input-block supplier-period-block">
                                    <label>@lang('message.period')</label>
                                    <select class="form-select" id="select-supplier-period-id" name="period_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <div class="input-block supplier-period-client-block">
                                    <label>@lang('message.client')</label>
                                    <select class="form-select" id="select-supplier-period-client-id" name="client_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <table id="supplier-period-client-bill-boards-list" class="boards-list-table">
                                <caption>@lang('message.planes')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.code')</td>
                                    <td>@lang('message.address')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="supplier-period-client-bill-services-list" class="service-list-table">
                                <caption>@lang('message.additional_services')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.service')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="additional-clients"></div>
                            <a class="crm-button pointer add-client-btn text-white">@lang('message.add_client')</a>
                        </div>
                        <div id="by-supplier-and-client" class="tab-item2">
                            <div class="field-container">
                                <div class="input-block supplier-client-block">
                                    <label>@lang('message.client')</label>
                                    <select class="form-select"
                                            id="select-supplier-client-id"
                                            name="client_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                                <div class="input-block supplier-client-period-block">
                                    <label>@lang('message.period')</label>
                                    <select class="form-select"
                                            id="select-supplier-client-period-id"
                                            name="period_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-container">
                                <div class="input-block supplier-client-contract-block">
                                    <label>@lang('message.contract')</label>
                                    <select class="form-select"
                                            id="select-supplier-client-period-contract-id"
                                            name="contract_id">
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <table id="supplier-client-contract-period-bill-boards-list" class="boards-list-table">
                                <caption>@lang('message.planes')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.code')</td>
                                    <td>@lang('message.address')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="supplier-client-contract-period-bill-services-list" class="service-list-table">
                                <caption>@lang('message.additional_services')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.service')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="field-container">
                    @foreach($statuses as $status)
                        <div class="bill-status-changer">
                            <fieldset>
                                <label for="status-{{$status->id}}">
                                    <input type="radio" value="{{$status->id}}" name="status_id"
                                           id="status-{{$status->id}}"
                                           @if($status->id == App\CrmSuppliersBillsStatus::CREATED) checked @endif/>
                                    <span style="background: {{$status->background}}; color: {{$status->color}}">{{$status->name}}</span>
                                </label>
                            </fieldset>
                        </div>
                    @endforeach
                </div>
                <div class="field-container">
                    <div class="input-block" style="width: 100%">
                        <label>@lang('message.payment_form')</label>
                        <div class="payment-type">
                            <span class="cashless checked">@lang('message.cashless_payments')</span><span class="cash">@lang('message.cash')</span>
                        </div>
                    </div>
                </div>
                <div class="field-container supplier-card-info" style="flex-wrap: wrap">
                    <div class="input-block">
                        <label>@lang('message.card_number') / IBAN</label>
                        <input type="text" name="card_number" id="supplier-card-number">
                    </div>
                    <div class="input-block">
                        <label>@lang('message.bank_name')</label>
                        <input type="text" name="bank_name" id="supplier-bank-name">
                    </div>
                    <div class="input-block">
                        <label>@lang('message.recipient_')</label>
                        <input type="text" name="card_holder" id="supplier-card-holder">
                    </div>
                </div>
                <div class="field-container">
                    <div class="input-block">
                        <label>@lang('message.to_pay')</label>
                        <input type="text" name="sum" value="" id="suppliers-bill-sum"/>
                    </div>
                    <div class="input-block">
                        <label>@lang('message.payer')</label>
                        <select name="our_details_id" class="form-select" id="select-our-details-id">
                            <option value="-">-</option>
                            @foreach($companies as $item)
                                <option value="{{$item->id}}">{{$item->name_short}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field-container link-block">
                    <div class="input-block">
                        <label>@lang('message.link_to_google_table')</label>
                        <input type="text" name="link" class="bill-link"/>
                    </div>
                </div>
                <div class="field-container preview-block">
                    <a class="btn pointer file-button show-bill-file">@lang('message.view')</a>
                    <a class="btn pointer download download-bill-file" href=""
                       target="_blank">@lang('message.download')</a>
                </div>
                <div class="field-container file-block">
                    <a class="btn pointer file-button">@lang('message.upload_bill')</a>
                    <input type="file" name="file" class="bill-file"/>
                    <span class="file-name"></span>
                </div>
                <div class="field-container">
                    <div class="input-block" style="margin-top: 10px;">
                        <label>@lang('message.comment')</label>
                        <textarea name="comment" id="supplier_bill_manager_comment"></textarea>
                    </div>
                </div>

                <div class="buttons-block right-buttons">
                    <a class="cancel pointer cancel-supplier-bill-button">@lang('message.cancel')</a>
                    <button class="crm-button">@lang('message.add')</button>
                    <div class="lds-ellipsis2 hide">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .by-client-sub-filter {
        border-bottom: 1px solid #CDD4D9;
        margin-bottom: 10px;
    }

    .form-select {
        width: 305px;
    }

    .boards-list-table,
    .service-list-table {
        display: none;
        margin-bottom: 20px;
        width: 100%;
    }

    .boards-list-table tr,
    .service-list-table tr {
        border-bottom: 1px solid #CDD4D9;
    }

    .boards-list-table td,
    .service-list-table td {
        padding: 5px;
    }

    .boards-list-table td .sum-input,
    .service-list-table td .sum-input {
        width: 70px;
        border: 1px solid #CDD4D9;
    }

    .input-block input[type=text] {
        width: 305px;
    }

    .bill-file {
        display: none;
    }

    .file-button {
        background: #FFFFFF;
        border: 1px solid #CDD4D9;
        border-radius: 4px;
        font-family: 'Helvetica Neue';
        font-style: normal;
        font-weight: 700;
        font-size: 13px;
        line-height: 16px;
        color: #3D445C;
        padding: 12px 24px;
        margin-right: 13px;
    }

    .field-container.file-block {
        justify-content: flex-start;
        align-items: center;
    }

    .field-container.file-block span {
        margin-left: 10px;
        display: inline-flex;
        align-items: center;
    }

    .delete-file {
        width: 30px;
        height: 30px;
        border: solid 1px #CDD4D9;
        border-radius: 4px;
        padding: 5px;
        position: relative;
    }

    .supplier-info, .period-info, .supplier-details-info {
        display: none;
    }

    #supplier_bill_description {
        width: 640px;
        height: 100px;
    }

    .by-client-sub-filter.hide,
    .by-supplier-sub-filter.hide,
    .client-period-supplier-block,
    .client-period-supplier-details-block,
    .client-period-supplier-details-bank-block,
    .client-supplier-details-block,
    .client-supplier-details-bank-block,
    .client-supplier-period-block,
    .supplier-details-block,
    .supplier-details-bank-block,
    .supplier-period-block,
    .supplier-period-client-block,
    .supplier-client-contract-block,
    .supplier-client-period-block,
    .supplier-client-contract-period-block,
    .add-supplier-bill .field-container.supplier-card-info,
    .add-supplier-bill .preview-block {
        display: none;
    }

    .add-supplier-bill input[type="radio"] {
        position: relative;
        opacity: 1;
    }

    .add-supplier-bill fieldset {
        padding: 6px 8px;
        border: 1px solid #E8EBF1;
        border-radius: 3px;
    }

    .add-supplier-bill fieldset span {
        border-radius: 4px;
        display: inline-block;
        padding: 2px 6px 2px 2px;
        cursor: pointer;
    }

    .payment-type span {
        display: inline-block;
        border: 1px solid #CDD4D9;
        width: 49.6%;
        font-family: 'Helvetica Neue';
        font-weight: 700;
        font-size: 13px;
        line-height: 42px;
        text-align: center;
        cursor: pointer;
    }

    .payment-type span.checked {
        border: 1px solid #FC6B40;
        background: #FFF0EC;
    }

    .cashless {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .cash {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    .preview-block {
        margin-bottom: 15px;
    }

    .buttons-block.right-buttons {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #CDD4D9;
    }

    .add-client-btn.crm-button{
        margin-bottom: 15px;
        display: none;
    }
    .additional-clients{
        display: none;
    }
    .delete-additional-supplier-block{
        width: 30px;
        height: 30px;
        border: solid 1px #CDD4D9;
        border-radius: 4px;
        padding: 5px;
        position: relative;
        margin-left: 10px;
        display: inline-flex;
        align-items: center;
        margin-top: 6px;
    }
    #supplier_bill_manager_comment{
        width: 640px;
        height: 80px;
    }
</style>
<script>
    $(document).ready(function () {
        $('.form-select').select2();
        //Клиент
        $(document).on('change', '#select-client-id', function () {
            const clientId = $(this).val();
            if (clientId === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/data`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    $('.client-period-supplier-details-card-info').hide();
                    $('.client-supplier-details-card-info').hide();
                    $('.client-contract-supplier-details-card-info').hide();

                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function (item) {
                        let selected = response.periods.length === 1 ? 'selected' : '';
                        options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-client-period-id').empty().append(options).select2();
                    $('.by-client-sub-filter').removeClass('hide');
                    removeGlobalLoader();

                    //по периоду
                    if (response.periods.length === 1) {
                        $('#select-client-period-id').trigger('change');
                    }
                    $('.client-period-supplier-block, .client-period-supplier-details-block, .client-period-supplier-details-bank-block').hide();
                    $('#select-client-period-supplier-id').empty().append('<option value="-">-</option>').select2();
                    $('#client-period-supplier-bill-boards-list').hide().find('tbody').empty();
                    //$('#supplier-bill-boards-list').hide();

                    //по собственнику
                    console.log(response.suppliers);
                    options = '<option value="-">-</option>';
                    response.suppliers.forEach(function (item) {
                        options += `<option value="${item.id}">${item.name}</option>`;
                    })
                    $('#select-client-supplier-id').empty().append(options).select2();
                    $('.client-supplier-details-block, .client-supplier-details-bank-block, .client-supplier-period-block').hide();
                    $('#select-client-supplier-period-id').empty().append('<option value="-">-</option>').select2();
                    $('#client-supplier-period-bill-boards-list').hide().find('tbody').empty();

                    //по договору
                    options = '<option value="-">-</option>';
                    response.contracts.forEach(function (item) {
                        if (typeof item.bill_name !== 'undefined') {
                            options += `<option value="${item.contract_id}" data-contract_id="${item.contract_id}" data-app_id="${item.app_id}">${item.bill_name}</option>`;
                        } else {
                            options += `<option value="${item.contract_id}" data-contract_id="${item.contract_id}" data-app_id="${item.app_id}">Дод. ${item.app_number} до Дог. ${item.contract_number}</option>`;
                        }
                    })
                    $('#select-client-contract-id').empty().append(options).select2();
                    $('.client-contract-supplier-block, .client-contract-supplier-details-block, .client-contract-supplier-details-bank-block, .client-contract-supplier-period-block').hide();
                    $('#select-client-contract-supplier-id').empty().append('<option value="-">-</option>').select2();
                    $('#select-client-contract-supplier-period-id').empty().append('<option value="-">-</option>').select2();
                    $('#client-contract-supplier-period-bill-boards-list').hide().find('tbody').empty();

                },
                error: suppliersBillsResponseError
            });
        });
        //по периоду
        $(document).on('change', '#select-client-period-id', function () {
            const clientId = $('#select-client-id').val();
            const period = $(this).val();
            if (clientId === '-' || period === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/period/${period}/suppliers`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.suppliers.forEach(function (item) {
                        let selected = response.suppliers.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-client-period-supplier-id').empty().append(options).select2();
                    removeGlobalLoader();
                    $('.client-period-supplier-block').show();
                    $('.client-period-supplier-details-block, .client-period-supplier-details-bank-block').hide();
                    if (response.suppliers.length === 1) {
                        $('#select-client-period-supplier-id').trigger('change');
                    }
                },
                error: suppliersBillsResponseError
            });
        })
        $(document).on('change', '#select-client-period-supplier-id', function () {
            const clientId = $('#select-client-id').val();
            const period = $('#select-client-period-id').val();
            const supplierId = $(this).val();
            if (clientId === '-' || period === '-' || supplierId === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let boardsList = '';
                    if (response.boards.length) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#client-period-supplier-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    } else {
                        $('#client-period-supplier-bill-boards-list').show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#client-period-supplier-bill-services-list').show().find('tbody').empty().append(servicesList);
                    } else {
                        $('#client-period-supplier-bill-services-list').show().find('tbody').empty();
                    }
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            });
        })

        //по собственнику
        $(document).on('change', '#select-client-supplier-id', function () {
            const clientId = $('#select-client-id').val();
            const supplierId = $(this).val();
            if (clientId === '-' || supplierId === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/period`,
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function (item) {
                        let selected = response.periods.length === 1 ? 'selected' : '';
                        options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-client-supplier-period-id').empty().append(options).select2();
                    $('#client-supplier-period-bill-boards-list').hide().find('tbody').empty();
                    $('#client-supplier-period-bill-services-list').hide().find('tbody').empty();
                    removeGlobalLoader();
                    $('.client-supplier-period-block').show();
                    if (response.periods.length === 1) {
                        $('#select-client-supplier-period-id').trigger('change');
                    }
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('change', '#select-client-supplier-period-id', function () {
            const clientId = $('#select-client-id').val();
            const supplierId = $('#select-client-supplier-id').val();
            const period = $(this).val();
            if (clientId === '-' || supplierId === '-' || period === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let boardsList = '';
                    if (response.boards.length > 0) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#client-supplier-period-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    } else {
                        $('#client-supplier-period-bill-boards-list').show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#client-supplier-period-bill-services-list').show().find('tbody').empty().append(servicesList);
                    } else {
                        $('#client-supplier-period-bill-services-list').show().find('tbody').empty();
                    }
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })
        //По договору
        $(document).on('change', '#select-client-contract-id', function () {
            const clientId = $('#select-client-id').val();
            const contractId = $(this).val();
            const appId = $(this).find('option:selected').data('app_id');
            if (clientId === '-' || contractId === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/contracts/${contractId}/app/${appId}/suppliers`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.suppliers.forEach(function (item) {
                        let selected = response.suppliers.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-client-contract-supplier-id').empty().append(options).select2();
                    removeGlobalLoader();
                    $('.client-contract-supplier-block').show();
                    $('.client-contract-supplier-details-block').hide();
                    $('.client-contract-supplier-details-bank-block').hide();
                    $('.client-contract-supplier-period-block').hide();
                    $('#client-contract-supplier-period-bill-boards-list').hide().find('tbody').empty();

                    if (response.suppliers.length === 1) {
                        $('#select-client-contract-supplier-id').trigger('change');
                    }
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('change', '#select-client-contract-supplier-id', function () {
            const clientId = $('#select-client-id').val();
            const supplierId = $(this).val();
            const contractId = $('#select-client-contract-id').val();
            const appId = $('#select-client-contract-id option:selected').data('app_id');
            if (clientId === '-' || supplierId === '-' || contractId === '-') {
                return false;
            }
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/contracts/${contractId}/app/${appId}/suppliers/${supplierId}/periods`,
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function (item) {
                        let selected = response.periods.length === 1 ? 'selected' : '';
                        options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-client-contract-supplier-period-id').empty().append(options).select2();
                    removeGlobalLoader();
                    $('.client-supplier-period-block').show();
                    if (response.periods.length === 1) {
                        $('#select-client-contract-supplier-period-id').trigger('change');
                    }
                    $('.client-contract-supplier-period-block').show();
                },
                error: suppliersBillsResponseError
            });
        });
        $(document).on('change', '#select-client-contract-supplier-period-id', function () {
            const clientId = $('#select-client-id').val();
            const supplierId = $('#select-client-contract-supplier-id').val();
            const contractId = $('#select-client-contract-id').val();
            const appId = $('#select-client-contract-id option:selected').data('app_id');
            const period = $(this).val();
            if (clientId === '-' || supplierId === '-' || contractId === '-' || period === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/contracts/${contractId}/app/${appId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let boardsList = '';
                    if (response.boards.length > 0) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#client-contract-supplier-period-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    } else {
                        $('#client-contract-supplier-period-bill-boards-list').show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#client-contract-supplier-period-bill-services-list').show().find('tbody').empty().append(servicesList);
                    } else {
                        $('#client-contract-supplier-period-bill-services-list').show().find('tbody').empty();
                    }
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })

        //Собственник
        $(document).on('change', '#select-supplier-id', function () {
            const supplierId = $(this).val();
            if (supplierId === '-') {
                return false;
            }
            addGlobalLoader();
            $('.supplier-details-block, .supplier-details-bank-block, .supplier-period-client-block, .supplier-client-contract-block, .supplier-client-contract-period-block').hide();
            $('.by-supplier-sub-filter').addClass('hide');
            $('#supplier-period-client-bill-boards-list').hide().find('tbody').empty();
            $.ajax({
                url: `/manager/suppliers/bills/suppliers/${supplierId}/data`,
                accept: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function (item) {
                        let selected = response.periods.length === 1 && false ? 'selected' : '';
                        options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-supplier-period-id').empty().append(options).select2();
                    options = '<option value="-">-</option>';
                    response.clients.forEach(function (item) {
                        let selected = response.clients.length === 1 && false ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-supplier-client-id').empty().append(options).select2();
                    $('.by-supplier-sub-filter').removeClass('hide');
                    removeGlobalLoader();
                    $('.supplier-period-block').show();
                },
                error: suppliersBillsResponseError
            });
        });
        //по периоду
        $(document).on('change', '#select-supplier-period-id', function () {
            const supplierId = $('#select-supplier-id').val();
            const period = $(this).val();
            if (supplierId === '-' || period === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/suppliers/${supplierId}/periods/${period}/clients`,
                type: 'GET',
                accept: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.clients.forEach(function (item) {
                        let selected = response.clients.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-supplier-period-client-id').empty().append(options).select2();
                    $('.supplier-period-client-block').show();
                    $('#supplier-period-client-bill-boards-list').hide().find('tbody').empty();
                    $('#supplier-period-client-bill-services-list').hide().find('tbody').empty();
                    removeGlobalLoader();
                    if (response.clients.length === 1) {
                        $('#select-supplier-period-client-id').trigger('change');
                    }else{
                        if (response.boards.length) {
                            let boardsList = '';
                            let clientName = '';
                            response.boards.forEach(function (item) {
                                if(clientName !== item.client_name){
                                    clientName = item.client_name;
                                    boardsList += `<tr><td colspan="3"><b>${clientName}</b></td><tr>`
                                }
                                boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}" data-client_id="${item.client_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                            });
                            $('#supplier-period-client-bill-boards-list').show().find('tbody').empty().append(boardsList);
                        }else{
                            $('#supplier-period-client-bill-boards-list').show().find('tbody').empty();
                        }
                        if(response.services.length){
                            let servicesList = '';
                            let clientName = '';
                            response.services.forEach(function (item) {
                                if(clientName !== item.client_name){
                                    clientName = item.client_name;
                                    servicesList += `<tr><td colspan="3"><b>${clientName}</b></td><tr>`
                                }
                                servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}" data-client_id="${item.client_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                            });
                            $('#supplier-period-client-bill-services-list').show().find('tbody').empty().append(servicesList);
                        } else {
                            $('#supplier-period-client-bill-services-list').show().find('tbody').empty();
                        }
                    }
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('change', '#select-supplier-period-client-id', function () {
            const supplierId = $('#select-supplier-id').val();
            const period = $('#select-supplier-period-id').val();
            const clientId = $(this).val();
            if (supplierId === '-' || period === '-' || clientId === '-') {
                if(clientId === '-'){
                    $('#select-supplier-period-id').trigger('change');
                }
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                accept: "application/json",
                processData: false,
                success: function (response) {
                    let boardsList = '';
                    if (response.boards.length > 0) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-period-client-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    } else {
                        $('#supplier-period-client-bill-boards-list').show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-period-client-bill-services-list').show().find('tbody').empty().append(servicesList);
                    } else {
                        $('#supplier-period-client-bill-services-list').show().find('tbody').empty();
                    }
                    if($('#select-supplier-period-client-id option').length > 2) {
                        $('.add-client-btn').css('display', 'inline-block');
                        $('.additional-clients').show();
                    }else{
                        $('.add-client-btn').hide();
                        $('.additional-clients').empty().hide();
                    }

                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('click', '.add-client-btn', function(){
            const supplierId = $('#select-supplier-id').val();
            const period = $('#select-supplier-period-id').val();
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/suppliers/${supplierId}/periods/${period}/clients`,
                type: 'GET',
                accept: "application/json",
                processData: false,
                success: function (response) {
                    const selectCount = $('.additional-clients select').length + 1;
                    const selectBlock = `
                        <div class="field-container" data-additional-id="${selectCount}">
                            <div class="input-block supplier-period-client-block" style="display:block">
                                <label>@lang('message.client')</label>
                                <select class="form-select additional-client-select" id="select-supplier-period-client-id_${selectCount}" name="client_id"></select>
                            </div>
                            <div class="input-block">
                                <label>&nbsp;</label>
                                <span class="delete-additional-supplier-block pointer" data-id="${selectCount}">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                                              fill="#FC6B40"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                                              fill="#FC6B40"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                                              fill="#FC6B40"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                                              fill="#FC6B40"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    `;
                    $('.additional-clients').append(selectBlock);
                    let options = '<option value="-">-</option>';
                    response.clients.forEach(function (item) {
                        let selected = response.clients.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                    })
                    $(`#select-supplier-period-client-id_${selectCount}`).empty().append(options).select2();
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('change', '.additional-client-select', function(){
            const supplierId = $('#select-supplier-id').val();
            const period = $('#select-supplier-period-id').val();
            const clientId = $(this).val();
            if (supplierId === '-' || period === '-' || clientId === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                accept: "application/json",
                processData: false,
                success: function (response) {
                    const selectCount = $('.additional-clients select').length;
                    const tables = `
                            <table id="supplier-period-client-bill-boards-list_${selectCount}" class="boards-list-table" data-additional-id="${selectCount}">
                                <caption>@lang('message.planes')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.code')</td>
                                    <td>@lang('message.address')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table id="supplier-period-client-bill-services-list_${selectCount}" class="service-list-table" data-additional-id="${selectCount}">
                                <caption>@lang('message.additional_services')</caption>
                                <thead>
                                <tr>
                                    <td></td>
                                    <td>@lang('message.service')</td>
                                    <td>@lang('message.sum')</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                    ` ;
                    $('.additional-clients').append(tables);
                    let boardsList = '';
                    if (response.boards.length > 0) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $(`#supplier-period-client-bill-boards-list_${selectCount}`).show().find('tbody').empty().append(boardsList);
                    } else {
                        $(`#supplier-period-client-bill-boards-list_${selectCount}`).show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $(`#supplier-period-client-bill-services-list_${selectCount}`).show().find('tbody').empty().append(servicesList);
                    } else {
                        $(`#supplier-period-client-bill-services-list_${selectCount}`).show().find('tbody').empty();
                    }

                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('click', '.delete-additional-supplier-block', function(){
            const id = $(this).data('id');
            createConfirmV3('Видалити клієнта?', 'Ви дійсно бажаєте видалити цього клієнта?', function(){
                $(`[data-additional-id=${id}]`).remove();
            });
        })
        //по клиенту
        $(document).on('change', '#select-supplier-client-id', function () {
            const supplierId = $('#select-supplier-id').val();
            const clientId = $(this).val();
            console.log(clientId);
            if (supplierId === '-' || clientId === '-') {
                return false;
            }
            addGlobalLoader();
            /*$.ajax({
                url: `/manager/suppliers/bills/suppliers/${supplierId}/clients/${clientId}/contracts`,
                accept: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.contracts.forEach(function (item) {
                        const selected = response.contracts.length === 1 ? 'selected' : '';
                        if (typeof item.bill_name !== 'undefined') {
                            options += `<option value="${item.contract_id}" data-contract_id="${item.contract_id}" data-app_id="${item.app_id}" ${selected}>${item.bill_name}</option>`;
                        } else {
                            options += `<option value="${item.contract_id}" data-contract_id="${item.contract_id}" data-app_id="${item.app_id}" ${selected}>Дод. ${item.app_number} до Дог. ${item.contract_number}</option>`;
                        }
                    })
                    $('#select-supplier-client-contract-id').empty().append(options).select2();
                    $('.supplier-client-contract-block').show();
                    removeGlobalLoader();
                    if (response.contracts.length === 1) {
                        $('#select-supplier-client-contract-id').trigger('change');
                    }

                },
                error: suppliersBillsResponseError
            });*/
            $('.supplier-client-contract-block').hide();
            $('#supplier-client-contract-period-bill-boards-list').hide();
            $('#supplier-client-contract-period-bill-services-list').hide();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/period`,
                accept: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function (item) {
                        const selected = response.periods.length === 1 ? 'selected' : '';
                        options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-supplier-client-period-id').empty().append(options).select2();
                    $('.supplier-client-period-block').show();
                    removeGlobalLoader();
                    if (response.periods.length === 1) {
                        $('#select-supplier-client-period-id').trigger('change');
                    }
                },
                error: suppliersBillsResponseError
            })
        });
        $(document).on('change', '#select-supplier-client-period-id', function(){
            const supplierId = $('#select-supplier-id').val();
            const clientId = $('#select-supplier-client-id').val();
            const period = $(this).val();
            if(supplierId === '-' || clientId === '-' || period === '-'){
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/period/${period}/contracts`,
                accept: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.contracts.forEach(function (item) {
                        const selected = response.contracts.length === 1 ? 'selected' : '';
                        if (typeof item.bill_name !== 'undefined') {
                            options += `<option value="${item.contract_id}" data-contract_id="${item.contract_id}" data-app_id="${item.app_id}" ${selected}>${item.bill_name}</option>`;
                        } else {
                            options += `<option value="${item.contract_id}" data-contract_id="${item.contract_id}" data-app_id="${item.app_id}" ${selected}>Дод. ${item.app_number} до Дог. ${item.contract_number}</option>`;
                        }
                    })
                    $('#select-supplier-client-period-contract-id').empty().append(options).select2();
                    $('.supplier-client-contract-block').show();
                    removeGlobalLoader();
                    if (response.contracts.length === 1) {
                        $('#select-supplier-client-period-contract-id').trigger('change');
                    }else{
                        addGlobalLoader();
                        $.ajax({
                            url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/boards?period[]=${period}`,
                            type: 'GET',
                            contentType: "application/json",
                            processData: false,
                            success: function (response) {
                                let boardsList = '';
                                if (response.boards.length > 0) {
                                    response.boards.forEach(function (item) {
                                        boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                                    });
                                    $('#supplier-client-contract-period-bill-boards-list').show().find('tbody').empty().append(boardsList);
                                } else {
                                    $('#supplier-client-contract-period-bill-boards-list').show().find('tbody').empty();
                                }
                                let servicesList = '';
                                if (response.services.length) {
                                    response.services.forEach(function (item) {
                                        servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                                    });
                                    $('#supplier-client-contract-period-bill-services-list').show().find('tbody').empty().append(servicesList);
                                } else {
                                    $('#supplier-client-contract-period-bill-services-list').show().find('tbody').empty();
                                }
                                removeGlobalLoader();
                            },
                            error: suppliersBillsResponseError
                        })
                    }
                },
                error: suppliersBillsResponseError
            })
        })
        /*$(document).on('change', '#select-supplier-client-contract-id', function () {
            const supplierId = $('#select-supplier-id').val();
            const clientId = $('#select-supplier-client-id').val();
            const contractId = $('#select-supplier-client-contract-id ').val();
            const appId = $('#select-supplier-client-contract-id option:selected').data('app_id');
            if (clientId === '-' || supplierId === '-' || contractId === '-') {
                return false;
            }
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/contracts/${contractId}/app/${appId}/suppliers/${supplierId}/periods`,
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function (item) {
                        let selected = response.periods.length === 1 ? 'selected' : '';
                        options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-supplier-client-contract-period-id').empty().append(options).select2();
                    removeGlobalLoader();
                    $('.supplier-client-contract-period-block').show();
                    if (response.periods.length === 1) {
                        $('#select-supplier-client-contract-period-id').trigger('change');
                    }
                },
                error: suppliersBillsResponseError
            });
        });*/
        /*$(document).on('change', '#select-supplier-client-contract-period-id', function () {
            const supplierId = $('#select-supplier-id').val();
            const clientId = $('#select-supplier-client-id').val();
            const contractId = $('#select-supplier-client-contract-id ').val();
            const appId = $('#select-supplier-client-contract-id option:selected').data('app_id');
            const period = $(this).val();
            if (clientId === '-' || supplierId === '-' || contractId === '-' || period === '-') {
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/contracts/${contractId}/app/${appId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let boardsList = '';
                    if (response.boards.length > 0) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-client-contract-period-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    } else {
                        $('#supplier-client-contract-period-bill-boards-list').show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-client-contract-period-bill-services-list').show().find('tbody').empty().append(servicesList);
                    } else {
                        $('#supplier-client-contract-period-bill-services-list').show().find('tbody').empty();
                    }
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        });*/
        $(document).on('change', '#select-supplier-client-period-contract-id', function () {
            const supplierId = $('#select-supplier-id').val();
            const clientId = $('#select-supplier-client-id').val();
            const contractId = $('#select-supplier-client-period-contract-id ').val();
            const appId = $('#select-supplier-client-period-contract-id option:selected').data('app_id');
            const period = $('#select-supplier-client-period-id').val();
            if (clientId === '-' || supplierId === '-' || contractId === '-' || period === '-') {
                return false;
            }
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/contracts/${contractId}/app/${appId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function (response) {
                    let boardsList = '';
                    if (response.boards.length > 0) {
                        response.boards.forEach(function (item) {
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-client-contract-period-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    } else {
                        $('#supplier-client-contract-period-bill-boards-list').show().find('tbody').empty();
                    }
                    let servicesList = '';
                    if (response.services.length) {
                        response.services.forEach(function (item) {
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-client-contract-period-bill-services-list').show().find('tbody').empty().append(servicesList);
                    } else {
                        $('#supplier-client-contract-period-bill-services-list').show().find('tbody').empty();
                    }
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })


        $(document).on('click', '.file-button', function () {
            $(this).parent().find('.bill-file').trigger('click');
        })
        $(document).on('change', '.bill-file', function () {
            const fileName = $(this).val().indexOf('\\') !== -1 ? $(this).val().split('\\').pop() : $(this).val().split('/').pop();
            $(this).parent().find('.file-name').empty().append(fileName).append(deleteButtonHtml);
            $(this).parent().find('.file-button').removeClass('error');
            $('.bill-link').removeClass('error');
            const [file] = document.querySelector('.bill-file').files;
            if(file) {
                const parts = file.name.split('.');
                const ext = parts[parts.length - 1].toLowerCase();
                if (ext === 'jpg' || ext === 'png' || ext === 'jpeg' || ext === 'bmp') {
                    const img = `<img src="${URL.createObjectURL(file)}">`;
                    $('.add-supplier-bill-file-body').empty().append(img);
                    $('.supplier-bill-file-view').show();
                } else if (ext === 'pdf') {
                    const pdf = ` <object data="${URL.createObjectURL(file)}" type="application/pdf" width="700" height="${window.innerHeight - 70}"></object>`
                    $('.add-supplier-bill-file-body').empty().append(pdf);
                    $('.supplier-bill-file-view').show();
                }
            }
        })
        $(document).on('change', '.bill-link', function () {
            if ($(this).val().length) {
                $(this).removeClass('error');
                $('.file-button').removeClass('error');
            }
        })
        $(document).on('click', '.file-block .delete-file', function () {
            $('.file-name').empty();
            $('.bill-file').val('');
        })
        $(document).on('click', '.bill-status-changer span', function () {
            $(this).closest('fieldset').find('input').prop('checked', true);
        })
        $(document).on('click', '.payment-type span', function () {
            $('.payment-type span').removeClass('checked');
            $(this).addClass('checked');
            if ($(this).hasClass('cash')) {
                $('.add-supplier-bill .field-container.supplier-card-info').css('display', 'flex');
                $('#select-our-details-id').val(5).trigger('change');
            } else {
                $('.add-supplier-bill .field-container.supplier-card-info').hide();
                $('.add-supplier-bill .field-container.supplier-card-info input').val('');
            }
        });
        $(document).on('change', '[name=card_number]', function () {
            const bin = $(this).val().split(' ').join('');
            let _this = this;
            if (bin) {
                addGlobalLoader();
                $.ajax({
                    url: '/api/bank/check-bin',
                    type: 'POST',
                    data: JSON.stringify({'bin': bin}),
                    contentType: "application/json",
                    accept: 'application/json',
                    processData: false,
                    success: function (response) {
                        removeGlobalLoader();
                        if (response.success) {
                            $(_this).closest('.field-container').find('[name=bank_name]').val(response.bankName);
                        }
                    },
                    error: suppliersBillsResponseError
                })
            }
        })
        $(document).on('submit', '#suppliers-bill-form-by-client', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (document.sendingBill) {
                return false;
            }
            let fd = new FormData();
            let validData = {
                'clientId': null,
                "period": null,
                "supplierId": null,
                "cardNumber": null,
                "cardBankName": null,
                "cardHolder": null,
                "sum": 0,
            };
            if ($('#by-client').hasClass('active')) {
                if (!validateSupplierBillSelect(validData, "clientId", "#select-client-id")) {
                    return false;
                }
                fd.append('client_id', validData.clientId);

                if ($('#by-client-and-period').hasClass('active')) {
                    if (!validateSupplierBillSelect(validData, "period", "#select-client-period-id")) {
                        toastr.error('@lang('message.error_no_period')');
                        return false;
                    }
                    if (!validateSupplierBillSelect(validData, "supplierId", "#select-client-period-supplier-id")) {
                        toastr.error('@lang('message.error_no_supplier')');
                        return false;
                    }
                    fd.append("period", validData.period);
                    fd.append("supplier_id", validData.supplierId);
                    $('#client-period-supplier-bill-boards-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const boardPrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(boardPrice).attr('name'), $(boardPrice).val());
                        validData.sum += +$(boardPrice).val();
                    })
                    $('#client-period-supplier-bill-services-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const servicePrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(servicePrice).attr('name'), $(servicePrice).val());
                        validData.sum += +$(servicePrice).val();
                    })
                }
                if ($('#by-client-and-supplier').hasClass('active')) {
                    if (!validateSupplierBillSelect(validData, "period", "#select-client-supplier-period-id")) {
                        toastr.error('@lang('message.error_no_period')');
                        return false;
                    }
                    if (!validateSupplierBillSelect(validData, "supplierId", "#select-client-supplier-id")) {
                        toastr.error('@lang('message.error_no_supplier')');
                        return false;
                    }
                    fd.append("period", validData.period);
                    fd.append("supplier_id", validData.supplierId);
                    $('#client-supplier-period-bill-boards-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const boardPrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(boardPrice).attr('name'), $(boardPrice).val());
                        validData.sum += +$(boardPrice).val();
                    })
                    $('#client-supplier-period-bill-services-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const servicePrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(servicePrice).attr('name'), $(servicePrice).val());
                        validData.sum += +$(servicePrice).val();
                    })
                }
                if ($('#by-client-and-contract').hasClass('active')) {
                    if (!validateSupplierBillSelect(validData, "period", "#select-client-contract-supplier-period-id")) {
                        toastr.error('@lang('message.error_no_period')');
                        return false;
                    }
                    if (!validateSupplierBillSelect(validData, "supplierId", "#select-client-contract-supplier-id")) {
                        toastr.error('@lang('message.error_no_supplier')');
                        return false;
                    }
                    fd.append("period", validData.period);
                    fd.append("supplier_id", validData.supplierId);
                    $('#client-contract-supplier-period-bill-boards-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), 1);
                        const boardPrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(boardPrice).attr('name'), $(boardPrice).val());
                        validData.sum += +$(boardPrice).val();
                    })
                    $('#client-contract-supplier-period-bill-services-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const servicePrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(servicePrice).attr('name'), $(servicePrice).val());
                        validData.sum += +$(servicePrice).val();
                    })
                }
            } else {
                if (!validateSupplierBillSelect(validData, "supplierId", "#select-supplier-id")) {
                    return false;
                }
                fd.append("supplier_id", validData.supplierId);
                if ($('#by-supplier-and-period').hasClass('active')) {
                    const multiClients = $('#by-supplier-and-period input[data-client_id]').length;
                    let clientsList = [];
                    if(!multiClients) {
                        if (!validateSupplierBillSelect(validData, "clientId", "#select-supplier-period-client-id")) {
                            toastr.error('@lang('message.error_no_client')');
                            return false;
                        }
                    }
                    if (!validateSupplierBillSelect(validData, "period", "#select-supplier-period-id")) {
                        toastr.error('@lang('message.error_no_period')');
                        return false;
                    }
                    if(!multiClients) {
                        fd.append("client_id", validData.clientId);
                    }
                    fd.append("period", validData.period);
                    $('#supplier-period-client-bill-boards-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), 1);
                        const boardPrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(boardPrice).attr('name'), $(boardPrice).val());
                        validData.sum += +$(boardPrice).val();
                        if(multiClients){
                            if(!validData.clientId){
                                validData.clientId = $(this).data('client_id');
                                fd.append("client_id", validData.clientId);
                            }else{
                                if($(this).data('client_id') != validData.clientId){
                                    if(clientsList.indexOf($(this).data('client_id')) === -1){
                                        clientsList.push($(this).data('client_id'));
                                    }
                                }
                            }
                        }
                    });
                    $('#supplier-period-client-bill-services-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const servicePrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(servicePrice).attr('name'), $(servicePrice).val());
                        validData.sum += +$(servicePrice).val();
                        if(multiClients){
                            if(!validData.clientId){
                                validData.clientId = $(this).data('client_id');
                                fd.append("client_id", validData.clientId);
                            }else{
                                if($(this).data('client_id') != validData.clientId){
                                    if(clientsList.indexOf($(this).data('client_id')) === -1){
                                        clientsList.push($(this).data('client_id'));
                                    }
                                }
                            }
                        }
                    })
                    if(clientsList.length){
                        clientsList.forEach((item) => {
                            fd.append("additional_client_id[]", item);
                        })
                    }
                    let additionalError = false;
                    if($('[data-additional-id]').length){
                        $('.additional-client-select').each(function(){
                            if($(this).val() === '-'){
                                $(this).addClass('error-select');
                                toastr.error('@lang('message.error_no_client')');
                                additionalError = true;
                            }
                        })
                        if(additionalError){
                            return false;
                        }
                        additionalError = false;
                        $('.additional-client-select').each(function(index){
                            let id = index+1;
                            if(!$(`#supplier-period-client-bill-boards-list_${id} [type=checkbox]:checked`).length && !$(`#supplier-period-client-bill-services-list_${id} [type=checkbox]:checked`).length){
                                const clientName = $(this).find('option:selected').text();
                                toastr.error(`У клієнта ${clientName} не вибрані площини або додаткові. послуги`);
                                additionalError = true;
                            }else{
                                $(`#supplier-period-client-bill-boards-list_${id} [type=checkbox]:checked`).each(function () {
                                    fd.append($(this).attr('name'), 1);
                                    const boardPrice = $(this).closest('tr').find('.sum-input');
                                    fd.append($(boardPrice).attr('name'), $(boardPrice).val());
                                    validData.sum += +$(boardPrice).val();
                                })
                                $(`#supplier-period-client-bill-services-list_${id} [type=checkbox]:checked`).each(function () {
                                    fd.append($(this).attr('name'), '1');
                                    const servicePrice = $(this).closest('tr').find('.sum-input');
                                    fd.append($(servicePrice).attr('name'), $(servicePrice).val());
                                    validData.sum += +$(servicePrice).val();
                                })
                                fd.append("additional_client_id[]", $(this).val());
                            }
                        })
                        if(additionalError){
                            return false;
                        }
                        additionalError = false;
                    }
                } else if ($('#by-supplier-and-client').hasClass('active')) {
                    if (!validateSupplierBillSelect(validData, "clientId", "#select-supplier-client-id")) {
                        toastr.error('@lang('message.error_no_client')');
                        return false;
                    }
                    if (!validateSupplierBillSelect(validData, "period", "#select-supplier-client-period-id")) {
                        toastr.error('@lang('message.error_no_period')');
                        return false;
                    }
                    fd.append("client_id", validData.clientId);
                    fd.append("period", validData.period);
                    $('#supplier-client-contract-period-bill-boards-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), 1);
                        const boardPrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(boardPrice).attr('name'), $(boardPrice).val());
                        validData.sum += +$(boardPrice).val();
                    })
                    $('#supplier-client-contract-period-bill-services-list [type=checkbox]:checked').each(function () {
                        fd.append($(this).attr('name'), '1');
                        const servicePrice = $(this).closest('tr').find('.sum-input');
                        fd.append($(servicePrice).attr('name'), $(servicePrice).val());
                        validData.sum += +$(servicePrice).val();
                    })
                }
            }

            const sum = $('#suppliers-bill-sum').val();
            //if(sum === '' || (+sum) <= 0){
            validData.sum = parseFloat(validData.sum.toFixed(2));
            console.log(validData);
            console.log((+sum), validData.sum, (+sum) !== validData.sum);
            if ((+sum) !== validData.sum) {
                toastr.error('@lang('message.error_wrong_payment_sum')')
                $('#suppliers-bill-sum').addClass('error');

                return false;
            } else {
                $('#suppliers-bill-sum').removeClass('error');
            }
            fd.append('sum', sum);
            const ourDetailsId = $('#select-our-details-id').val();
            if (ourDetailsId === '-') {
                toastr.error('@lang('message.error_wrong_our_company')')
                $('#select-our-details-id').addClass('error-select');

                return false;
            }
            fd.append('our_details_id', ourDetailsId);
            fd.append('status_id', $('[name=status_id]:checked').val());
            fd.append("card_number", $('#supplier-card-number').val());
            fd.append("bank_name", $("#supplier-bank-name").val());
            fd.append("card_holder", $("#supplier-card-holder").val());
            fd.append("type_id", $('#suppliers-bill-form-by-client [name=type_id]').val());
            fd.append("comment", $("#supplier_bill_manager_comment").val());

            const billId = $('#suppliers-bill-form-by-client [name=bill_id]').val();

            const file = $('.bill-file')[0].files
            if (file.length > 0) {
                fd.append('file', file[0]);
            } else {
                const link = $('.bill-link').val();
                if (!link) {
                    if (!billId) {
                        if(ourDetailsId != 5) {
                            $(this).find('.file-button').addClass('error')
                            toastr.error('@lang('message.error_wrong_bill_file_or_link')')
                            $('.bill-link').addClass('error');

                            return false
                        }
                    }
                } else {
                    fd.append('link', link);
                }
            }

            let url = `/manager/suppliers/bills/clients/${validData.clientId}/suppliers/${validData.supplierId}/by-manager`;
            let method = 'POST';
            if (billId) {
                url = `/manager/suppliers/bills/${billId}/by-manager`;
                //method = 'PATCH';
            }

            document.sendingBill = true;
            addGlobalLoader();
            $('.lds-ellipsis2').removeClass('hide');
            $.ajax({
                url: url,
                method: method,
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $.get(
                            '/manager/suppliers/bills?ajax=true&type='+$('#suppliers-bill-form-by-client [name=type_id]').val(),
                            {},
                            function (response) {
                                $('.ajax-section').empty().append(response);
                                window.history.pushState({}, $('title').text(), '/manager/suppliers/bills?type='+$('#suppliers-bill-form-by-client [name=type_id]').val());
                                removeGlobalLoader();
                                $('.al-overlay3').trigger('click');
                                $('.search-form-select').select2();
                                toastr.success('Рахунок додано');
                                $('.lds-ellipsis2').addClass('hide');
                                $('.al-power-tip').powerTip({placement: 's'});
                            }
                        )
                    }

                    document.sendingBill = false;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                    document.sendingBill = false;
                    $('.lds-ellipsis2').addClass('hide');
                }
            })

            return false;
        });
        $(document).on('click', '.cancel-supplier-bill-button', function () {
            $('.add-supplier-bill .close').trigger('click');
        })
    });

    function validateSupplierBillSelect(data, key, id) {
        const value = $(id).val();
        if ($(id).prop("tagName") === 'SELECT') {
            if (value === '-') {
                $(id).addClass('error-select');

                return false;
            }
        } else {
            if (!value) {
                $(id).addClass('error');

                return false;
            }
        }
        data[key] = value;

        return data;
    }

    const deleteButtonHtml = `
                    <span class="delete-file pointer">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z"
                                  fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z"
                                  fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z"
                                  fill="#FC6B40"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z"
                                  fill="#FC6B40"/>
                        </svg>
                    </span>`
</script>