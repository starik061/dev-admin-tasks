@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
@endphp
<div class="ajax-section">
@include('front.crm.suppliers.bills.section')
</div>
<span data-search='{{json_encode($search)}}' id="data-for-search"></span>

@include('add.footer')

<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
<script>
    document.sendingBill = false;
</script>
@if($currentUser->isBookkeeper())
    @include('front.crm.suppliers.bills.prepare-form-bookkeeper')
@endif
    @include('front.crm.suppliers.bills.prepare-form-manager')

<div class="supplier-bill-file-view zi10101">
    <div class="add-supplier-bill-file-header">
        <span>@lang('message.view')</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                      fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="add-supplier-bill-file-body">

    </div>
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
<style>
    .favorite-viewed-tab{
        margin: 0 0 20px;
    }
    #result-search-list .manager-search h1.title-search-result{
        padding: 0;
        margin-bottom: 30px;
    }
    .suppliers-bills-header{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 24px;
    }
    .suppliers-bills-header .action-block{
        display: flex;
        justify-content: flex-end;
    }
    a.show-add-supplier-bill-form.crm-button,
    a.show-add-supplier-bill-form.crm-button:hover{
        color: #fff;
        cursor: pointer;
    }
    .result-table{
        width: 100%;
        font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;
        color: #3D445C;
    }
    .result-table tr {
        border-bottom: solid 1px #cdd4d9;
    }
    .result-table thead td{
        font-style: normal;
        font-weight: 500;
        font-size: 12px;
        line-height: 13px;
        text-transform: lowercase;
        padding: 12px;
    }
    .result-table tbody td {
        font-size: 13px;
        line-height: 19px;
        padding: 18px 6px;
    }
    .result-table td.created-at{
        width: 5%;
    }
    .result-table td.supplier-name{
        width: 20%;
    }
    .result-table td.client-name{
        width: 20%;
    }
    .result-table td.paid-period{
        width: 7%;
    }
    .result-table td.supplier-bill{
        width: 5%;
    }
    .result-table td.our_details{
        width: 15%;
    }
    .result-table td.bill-sum{
        width: 5%;
    }
    .result-table td.manager-name{
        width: 15%;
    }
    .result-table td.paid-at{
        width: 10%;
    }
    .result-table td.action{
        width: 3%;
    }
    .mw1460{
        margin: 20px auto;
    }

    .mw1460 .field-container .input-block{
        width: auto;
    }
    /*.mw1460 .field-container .input-block.short-select-block,
    .mw1460 .field-container .input-block select.search-form-select{
        width: 200px;
    }
    .mw1460 .field-container .input-block select.client-select,
    .mw1460 .field-container .input-block select.supplier-select{
        width: 300px;
    }*/
    .mw1460 .field-container .bk-filter-fields .input-block{
        margin-right: 0;
    }
    .mw1460 .field-container .bk-filter-fields .input-block select{
        width: 392px;
    }
    .al-selected-filter {
        display: flex;
        align-items: center;
        flex-flow: row wrap;
        margin-left: 20px;
    }
    .al-selected-filter .selected-filter-item {
        padding: 5px 10px;
        border-radius: 5px;
        background: #FFF0EC;
        margin-right: 10px;
        display: flex;
        align-items: center;
        /*margin-bottom: 10px;*/
    }
    .al-selected-filter .selected-filter-item img {
        margin-left: 10px;
        cursor: pointer;
    }
    a.show-add-supplier-bill-form.crm-button{
        margin-top: 20px;
    }
    td span.supplier-bill-status{
        display: block;
        padding: 3px 5px;
        border-radius: 3px;
    }
    .add-supplier-bill-body .bill-add-tabs .tab-item,
    .add-supplier-bill-body .bill-add-tabs .tab-item2{
        display: none;
    }
    .add-supplier-bill-body .bill-add-tabs .tab-item.active,
    .add-supplier-bill-body .bill-add-tabs .tab-item2.active{
        display: block;
    }
    .add-supplier-bill-body .tab-selector,
    .add-supplier-bill-body .tab-selector2{
        margin: 0 0 20px;
        padding: 0;
        border-bottom: solid 1px #CDD4D9;
    }
    .add-supplier-bill-body .tab-selector li,
    .add-supplier-bill-body .tab-selector2 li{
        font-family: 'Helvetica Neue';
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        color: #FC6B40;
        margin: 0 20px 0 0;
        display: inline-block;
    }
    .add-supplier-bill-body .tab-selector li:hover,
    .add-supplier-bill-body .tab-selector li.active,
    .add-supplier-bill-body .tab-selector2 li:hover,
    .add-supplier-bill-body .tab-selector2 li.active{
        color: #3D445C;
        border-bottom: 2px solid #FC6B40;
        cursor: pointer;
    }
    .action-col{
        position: relative;
    }
    .action-col .sub-action{
        top: 50%;
        margin-top: 16px;
    }
    .form-select.error-select + span > span > .select2-selection.select2-selection--single > span,
    .field-container .input-block input.error,
    .input-block input.error,
    #suppliers-bill-sum.error,
    .file-button.error{
        border: solid 1px #FC6B40;
        color: #3D445C;
        -webkit-box-shadow: inset 0px 0px 18px 10px rgba(252,107,64,1);
        -moz-box-shadow: inset 0px 0px 18px 10px rgba(252,107,64,1);
        box-shadow: inset 0px 0px 18px 10px rgba(252,107,64,1);
        margin-bottom: 0;
    }
    .qs-datepicker-container{
        z-index: 100000;
    }
    .save_comment,
    .download-bill-file{
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
</style>

@include('front.crm.scripts')

<script src="//cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link
        rel="stylesheet"
        href="//cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
/>

<style>
    .fancybox__container{
        z-index: 11005;
    }
    caption {
        caption-side: top;
        text-align: left;
        padding-bottom: 10px;
    }
    .bill_status_2{ /* оплатить */
        background: rgba(255, 211, 199, 0.8); /*#FFD3C7;*/
    }
    .bill_status_3{ /* срочно оплатить */
        background: rgba(247, 225, 255, 0.8); /*#F7E1FF;*/
    }
    .bill_status_4{ /* поставлен на оплату */
        background: #fcfcdb;
    }
    .bill_status_5{ /* оплачен */
        background: #a4e0a4;
    }
    .bill_status_6{ /* Ошибка */
        background: rgba(256, 136, 0, 0.3);
    }
    .bill_status_7{ /* Ошибка оплаты */
        background: rgba(256, 85, 0, 0.3);
    }
    .mw1460 .field-container .input-block input[name=number]{
        width: 150px;
    }
    .client-bill-status span.informer{
        display: block;
        padding: 3px 5px;
        border-radius: 3px;
    }
    .client-bill-status span.informer.paid{
        background: #adf8ad;
        color: #27a227;
    }
    .client-bill-status span.informer.wait{
        background: #FCE9E4;
        color: #FC6B40;
    }
    #suppliers-bills-filter .select2-container{
        z-index: 100;
    }
</style>

<script>
    const periodsName = {!! json_encode($periodsName) !!};
    const billTypeId = '{{$params['type']}}';
    $(document).ready(function(){
        $('.search-form-select').select2();
        $(document).on('change', '.form-select', function(){
            if($(this).val() !== '-'){
                $(this).removeClass('error-select');
            }
        })
        $(document).on('click', '.show-add-supplier-bill-form', function(){
            $('.al-overlay3').removeClass('hide').addClass('zi10101');
            $('.add-supplier-bill').show();
        });
        $(document).on('click', '.suppliers-bills-row .sub-action .delete-supplier-bill', function(){
            let _this = this;
            createConfirm('@lang('message.delete_bill')', '@lang('message.do_you_want_delete_bill_from_supplier')', function(){
                const id = $(_this).data('id');
                addGlobalLoader();
                $.ajax({
                    'url': `/manager/suppliers/bills/${id}`,
                    type: 'DELETE',
                    contentType: "application/json",
                    accept: 'application/json',
                    processData: false,
                    success: function(response){
                        let  url = window.location.href;
                        if(url.indexOf('?') !== -1){
                            url += '&ajax=only-data';
                        }else{
                            url += '?ajax=only-data';
                        }
                        $.get(url,{},function(response){
                            $('.ajax-section .data-section').empty().append(response);
                            removeGlobalLoader();
                            $('.search-form-select').select2();
                            $('.al-power-tip').powerTip({placement: 's'});
                        })
                    },
                    error: suppliersBillsResponseError
                })
            })
        });
        $(document).on('click', '.edit-supplier-bill-manager', function(){
            const id = $(this).data('id');
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/${id}/manager-view`,
                type: 'GET',
                contentType: "application/json",
                accept: 'application/json',
                processData: false,
                success: function (response) {
                    $('#suppliers-bill-form-by-client [name=bill_id]').val(id);
                    if (response.bill.card_number) {
                        $('#suppliers-bill-form-by-client .payment-type .cash').addClass('checked');
                        $('#suppliers-bill-form-by-client .payment-type .cashless').removeClass('checked');
                        $('#supplier-card-number').val(response.bill.card_number);
                        $('#supplier-bank-name').val(response.bill.bank_name);
                        $('#supplier-card-holder').val(response.bill.card_holder);
                        $('.supplier-card-info').css('display', 'flex');
                    } else {
                        $('#suppliers-bill-form-by-client .payment-type .cash').removeClass('checked');
                        $('#suppliers-bill-form-by-client .payment-type .cashless').addClass('checked');
                        $('.supplier-card-info').hide();
                    }
                    $('#suppliers-bill-sum').val(response.bill.sum);
                    $('#select-our-details-id').val(response.bill.our_details_id).trigger('change.select2');
                    if (response.bill.file) {
                        const parts = response.bill.file.split('.');
                        const ext = parts[parts.length - 1].toLowerCase();
                        if (ext === 'jpg' || ext === 'png' || ext === 'jpeg' || ext === 'bmp') {
                            const img = `<img src="/storage/${response.bill.file}">`;
                            $('.add-supplier-bill-file-body').empty().append(img);
                        } else if (ext === 'pdf') {
                            const pdf = ` <object data="/storage/${response.bill.file}" type="application/pdf" width="700" height="${window.innerHeight - 70}"></object>`
                            $('.add-supplier-bill-file-body').empty().append(pdf);
                        } else {
                            if (!response.bill.link) {
                                $('.show-bill-file').hide()
                            }
                        }
                        $('.download-bill-file').attr('href', '/storage/' + response.bill.file).show();
                    } else if (response.bill.link) {
                        $('.show-bill-file').show();
                        $('.download-bill-file').hide();
                        const iframe = `<iframe src="${response.bill.link}" width="700"  height="${window.innerHeight - 70}"></iframe>`;
                        $('.add-supplier-bill-file-body').empty().append(iframe);
                    }
                    $('.preview-block').show();

                    if(response.bill.clients.length === 1) {
                        $('#select-client-id').val(response.bill.clients[0].id).trigger('change.select2');

                        let options = '<option value="-">-</option>';
                        response.periods.forEach(function (item) {
                            let selected = response.periods.length === 1 || item.month === response.bill.period[0].period ? 'selected' : '';
                            options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                        })
                        $('#select-client-period-id').empty().append(options).select2();
                        $('.by-client-sub-filter').removeClass('hide');
                        $('.client-period-supplier-block, .client-period-supplier-details-block, .client-period-supplier-details-bank-block').hide();
                        $('#client-period-supplier-bill-boards-list').hide().find('tbody').empty();

                        options = '<option value="-">-</option>';
                        response.suppliers.forEach(function (item) {
                            let selected = response.suppliers.length === 1 || item.id === response.bill.supplier_id ? 'selected' : '';
                            options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                        })
                        $('#select-client-period-supplier-id').empty().append(options).select2();
                        removeGlobalLoader();
                        $('.client-period-supplier-block').show();
                        $('.client-period-supplier-details-block, .client-period-supplier-details-bank-block').hide();

                        let boardsList = '';
                        if (response.boards.length > 0) {
                            response.boards.forEach(function (item) {
                                boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                            });
                            $('#client-period-supplier-bill-boards-list').show().find('tbody').empty().append(boardsList);
                        } else {
                            $('#client-period-supplier-bill-boards-list').show().find('tbody').empty();
                        }
                        if (response.bill.boards.length) {
                            response.bill.boards.forEach(function (item) {
                                $(`[name="contracts_boards_suppliers_payment_id[${item.id}]"]`).prop('checked', true);
                                $(`[name="board_sum[${item.id}]"]`).val(item.sum);
                            })
                        }
                        let servicesList = '';
                        if (response.services.length > 0) {
                            response.services.forEach(function (item) {
                                servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}"></td><td>${item.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                            });
                            $('#client-period-supplier-bill-services-list').show().find('tbody').empty().append(servicesList);
                        } else {
                            $('#client-period-supplier-bill-services-list').show().find('tbody').empty();
                        }
                        if (response.bill.services.length) {
                            response.bill.services.forEach(function (item) {
                                $(`[name="contracts_services_suppliers_payment_id[${item.id}]"]`).prop('checked', true);
                                $(`[name="services_sum[${item.id}]"]`).val(item.sum);
                            })
                        }

                        //оставшиеся 2 вкладки по клиенту
                        options = '<option value="-">-</option>';
                        response.suppliers.forEach(function (item) {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        })
                        $('#select-client-supplier-id').empty().append(options).select2();
                        $('.client-supplier-details-block, .client-supplier-details-bank-block, .client-supplier-period-block').hide();
                        $('#select-client-supplier-period-id').empty().append('<option value="-">-</option>').select2();
                        $('#client-supplier-period-bill-boards-list').hide().find('tbody').empty();

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

                        removeGlobalLoader();
                    }else{
                        $('[data-id="by-supplier"]').click();
                        $('#select-supplier-id').val(response.bill.supplier_id).trigger('change.select2');

                        let options = '<option value="-">-</option>';
                        response.periods.forEach(function (item) {
                            let selected = response.periods.length === 1 || item.month === response.bill.period[0].period ? 'selected' : '';
                            options += `<option value="${item.month}" ${selected}>${item.name}</option>`;
                        })
                        $('#select-supplier-period-id').empty().append(options).select2().trigger('change');
                        $('.supplier-period-client-block').show();
                        $('.by-supplier-sub-filter').removeClass('hide');
                        $('.supplier-period-block').show();
                        setTimeout(function(){
                            $('#select-supplier-period-client-id').find(`option[value=${response.bill.clients[0].id}]:first`).prop('selected', true);
                            $('#select-supplier-period-client-id').trigger('change').trigger('change.select2');

                            let i = 1;
                            for(i; i < response.bill.clients.length; i++){
                                let selectBlock = `
                                    <div class="field-container" data-additional-id="${i}">
                                        <div class="input-block supplier-period-client-block" style="display:block">
                                            <label>@lang('message.client')</label>
                                            <select class="form-select additional-client-select" id="select-supplier-period-client-id_${i}" name="client_id"></select>
                                        </div>
                                        <div class="input-block">
                                            <label>&nbsp;</label>
                                            <span class="delete-additional-supplier-block pointer" data-id="${i}">
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
                                let options = '';
                                $('#select-supplier-period-client-id option').each(function(){
                                    options += `<option value="${$(this).attr('value')}">${$(this).text()}</option>`;
                                });
                                console.log(options);
                                $(`#select-supplier-period-client-id_${i}`).empty().append(options).select2();
                                $(`#select-supplier-period-client-id_${i} option[value=${response.bill.clients[i].id}]:first`).prop('selected', true);
                                $(`#select-supplier-period-client-id_${i}`).trigger('change').trigger('change.select2');
                            }
                            setTimeout(function(){
                                let i = 0;
                                for(i; i < response.bill.boards.length; i++){
                                    $(`[name="contracts_boards_suppliers_payment_id[${response.bill.boards[i].id}]"]`).prop('checked', true);
                                }
                                for(i = 0; i < response.bill.services.length; i++){
                                    $(`[name="contracts_services_suppliers_payment_id[${response.bill.services[i].id}]"]`).prop('checked', true);
                                }
                                removeGlobalLoader();
                            }, 1500);
                        }, 1000);
                    }

                    $('#supplier_bill_manager_comment').val(response.comment);

                    $('.al-overlay3').removeClass('hide');
                    $('.add-supplier-bill.manager-bill-popup').show();
                },
                error: suppliersBillsResponseError
            });
        });
        $(document).on('click', '.suppliers-bills-row', function (e){
            //console.log(e);
            //console.log(e.target.tagName);
            if (e.target.tagName.toLowerCase() !== 'svg' &&
                e.target.tagName.toLowerCase() !== 'path' &&
                e.target.tagName.toLowerCase() !== 'a' &&
                !$(e.target).hasClass('sub-action')
            ){
                $(this).find('.bill-edit-action').click();
            }
        });
        $(document).on('click', '.favorite-viewed-tab a', function (event) {
            event.preventDefault();
            event.stopPropagation();
            const url = $(this).attr('href');
            addGlobalLoader();
            $.ajax({
                url: `${url}&ajax=true`,
                type: 'GET',
                processData: false,
                success: function (response) {
                    $('.ajax-section').empty().append(response);
                    window.history.pushState({}, $('title').text(), url);
                    removeGlobalLoader();
                    $('.search-form-select').select2();
                    $('.al-power-tip').powerTip({placement: 's'});
                    let q = new URLSearchParams(window.location.href.split('?')[1]);
                    const typeId = q.get('type');
                    if(typeId == '1' || typeId == '2'){
                        $('#suppliers-bill-form-by-client [name=type_id]').val(typeId);
                    }else{
                        $('#suppliers-bill-form-by-client [name=type_id]').val(1);
                    }

                    const params = $('#suppliers-bills-filter').serialize();
                    const curType = $('#suppliers-bills-filter [name=type]').val();
                    const otherType = curType === "1" ? 2 : 1;
                    $('#link-'+curType).attr('href', `/manager/suppliers/bills?${params}`);
                    $('#link-'+otherType).attr('href', `/manager/suppliers/bills?${params.split('type='+curType).join('type='+otherType)}`);
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('submit', '#suppliers-bills-filter', function (event) {
            event.preventDefault();
            event.stopPropagation();

            $('#suppliers-bills-filter [name]').each(function(){
                const name = $(this).attr('name');
                const selector = `[data-filter="${name}"]`;
                if(name === 'type' || name === 'supplier_details_id'){
                    return;
                }
                console.log(selector);
                let _this = this;
                if (!$(this).val()) {
                    $(selector).remove();
                } else if ($(this).attr('type') !== 'checkbox') {
                    if (!$(selector).length) {
                        $('.al-selected-filter').append('<div class="selected-filter-item" data-filter="' + $(this).attr('name') + '" data-id=""></div>');
                    }
                    $(selector).data('id', $(this).val()).empty();
                    if ($(this).attr('type') === 'text') {
                        $(selector).append($(this).val());
                    } else {
                        $(selector).append($(this).find('option:selected').text());
                    }
                    if(name !== 'month') {
                        $(selector).append('<img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>');
                    }
                }
            })

            const params = $(this).serialize();
            const url = $(this).attr('action');
            const actionUrl = `${url}?${params}&ajax=only-data`
            addGlobalLoader();
            $.ajax({
                url: actionUrl,
                type: 'GET',
                processData: false,
                success: function (response) {
                    $('.ajax-section .data-section').empty().append(response);
                    window.history.pushState({}, $('title').text(), `${url}?${params}`);

                    const curType = $('#suppliers-bills-filter [name=type]').val();
                    const otherType = curType === "1" ? 2 : 1;
                    $('#link-'+curType).attr('href', `/manager/suppliers/bills?${params}`);
                    $('#link-'+otherType).attr('href', `/manager/suppliers/bills?${params.split('type='+curType).join('type='+otherType)}`);

                    removeGlobalLoader();
                    $('.search-form-select').select2();
                    $('.al-power-tip').powerTip({placement: 's'});
                    $('.bk-filter-header .close').click();
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('click', '.result-paginator__pages a', function (event) {
            event.preventDefault();
            event.stopPropagation();
            const url = $(this).attr('href');
            let link = url;
            if(url.indexOf('?') !== -1){
                link += '&ajax=only-data';
            }else{
                link += '?ajax=only-data';
            }
            addGlobalLoader();
            $.ajax({
                url: `${link}`,
                type: 'GET',
                processData: false,
                success: function (response) {
                    $('.ajax-section .data-section').empty().append(response);
                    window.history.pushState({}, $('title').text(), url);
                    removeGlobalLoader();
                    $('.search-form-select').select2();
                    $('.al-power-tip').powerTip({placement: 's'});
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('click', '.bill-show-log-action', function(){
            const id = $(this).data('id');
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/${id}/log`,
                type: 'GET',
                accept: 'application/json',
                processData: false,
                success: function (response) {
                    $('.al-overlay3').removeClass('hide');
                    $('body').append(response.view);
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('click', '.bill-set-paid', function(){
            const id = $(this).data('id');
            let url = window.location.href;
            if(url.indexOf('?') !== -1){
                url += '&ajax=only-data'
            }else{
                url += '?ajax=only-data'
            }
            createConfirm('Отметить как оплаченный', 'Вы действительно хотите отметить этот счет как оплаченный?', function(){
                addGlobalLoader();
                $.ajax({
                    url: `/manager/suppliers/bills/${id}/paid`,
                    type: 'POST',
                    accept: 'application/json',
                    processData: false,
                    success: function (response) {
                        toastr.success('Счет отмечен как оплаченный')
                        $.ajax({
                            url: url,
                            type: 'GET',
                            processData: false,
                            success: function (response) {
                                $('.ajax-section .data-section').empty().append(response);
                                removeGlobalLoader();
                                $('.search-form-select').select2();
                                $('.al-power-tip').powerTip({placement: 's'});
                            },
                            error: suppliersBillsResponseError
                        });
                    },
                    error: suppliersBillsResponseError
                });
            });
        });
        if(window.location.hash.length){
            $('#bill-'+window.location.hash.split('#').join('')).click();
        }
        $('.al-power-tip').powerTip({placement: 's'});
        //Filter
        $(document).on('click', '.al-selected-filter .selected-filter-item img', function () {
            const filterName = $(this).parent().data('filter');
            const selector = `#suppliers-bills-filter [name="${filterName}"]`;
            $(selector).val('');
            $(selector + ' option:selected').removeAttr('selected').prop('selected', false);
            $(selector).removeAttr('checked').prop('checked', false);
            $(selector).trigger('change');
            $(this).parent().remove();
            $('#suppliers-bills-filter').submit();
        });
        $('#suppliers-bills-filter [name=number], #suppliers-bills-filter [name=search]').change(function () {
            const name = $(this).attr('name');
            const selector = `[data-filter="${name}"]`;
            console.log(selector);
            let _this = this;
            if (!$(this).val()) {
                $(selector).remove();
            } else if ($(this).attr('type') !== 'checkbox') {
                if (!$(selector).length) {
                    $('.al-selected-filter').append('<div class="selected-filter-item" data-filter="' + $(this).attr('name') + '" data-id=""></div>');
                }
                $(selector).data('id', $(this).val()).empty();
                if ($(this).attr('type') === 'text') {
                    $(selector).append($(this).val());
                } else {
                    $(selector).append($(this).find('option:selected').text());
                }
                if(name !== 'month') {
                    $(selector).append('<img src="/assets/img/icons/remove-icon.svg" style="height: 15px;"/>');
                }
            }

            $('#suppliers-bills-filter').trigger('submit');
        });
        $(document).on('click', '.suppliers-bills-export', function(){
            addGlobalLoader()
            $.ajax({
                url: '/manager/suppliers/bills/export' + window.location.search,
                type: 'GET',
                accept: 'application/json',
                processData: false,
                success: function (response) {
                    removeGlobalLoader();
                    if (response.success) {
                        let a = document.createElement('a');
                        a.download = response.file.split('/')[3];
                        a.href = response.file;
                        a.click();
                    } else {
                        suppliersBillsResponseError()
                    }
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('change', '.supplier-select', function(){
            $('#filter-supplier_details_id').val($(this).find('option:selected').data('details_id'));
        })
    });

</script>

