<div class="add-supplier-bill zi10101 bookkeeper-bill-popup">
    <div class="add-supplier-bill-header">
        <span>@lang('message.edit_bill')</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z"
                      fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="add-supplier-bill-body">
        <form class="suppliers-bill-form" id="suppliers-bill-approve-form" method="post">
            <input name="supplier_bill_id" value="" type="hidden">
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.client')</label>
                    <span class="supplier-bill-client-name"></span>
                </div>
                <div class="input-block" style="width: 305px">
                    <label>@lang('message.supplier')</label>
                    <span class="supplier-bill-supplier-name"></span>
                </div>
            </div>
            <div class="field-container not-form-2">
                <div class="input-block">
                    <label>@lang('message.supplier_company')</label>
                    <select class="form-select" id="select-bookkeeper-supplier-details-id" name="supplier_details_id">
                        <option value="-">-</option>
                    </select>
                    <span class="edrpou"></span>
                </div>
                <div class="input-block">
                    <label>@lang('message.bank')</label>
                    <select class="form-select" id="select-bookkeeper-supplier-details-bank-id" name="supplier_details_bank_id">
                        <option value="-">-</option>
                    </select>
                </div>

            </div>
            <div class="bill-card-info">

            </div>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.period')</label>
                    <span class="supplier-bill-period-name"></span>
                </div>
            </div>
            <table id="supplier-bill-boards-list">
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
            <table id="supplier-bill-services-list">
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
            <div class="field-container not-form-2">
                <div class="input-block">
                    <label>@lang('message.supplier_bill_number')</label>
                    <input type="text" name="number" value="" id="supplier_bill_number"/>
                </div>
                <div class="input-block">
                    <label>@lang('message.supplier_bill_date')</label>
                    <input type="text" name="date" value="" id="supplier_bill_date"/>
                </div>
            </div>
            <div class="field-container not-form-2">
                <div class="input-block" style="width: 100%">
                    <div class="bill-nds">
                        <span class="nds">@lang('message.VAT')</span><span class="without-nds">@lang('message.without_nds3')</span>
                    </div>
                </div>
            </div>
            <div class="field-container not-form-2">
                <div class="input-block">
                    <label>@lang('message.purpose_of_payment')</label>
                    <textarea name="description" id="supplier_bill_description">Сплата за розміщ. реклами у {period}р. зг. рах. №{number} від {date}р.</textarea>
                </div>
            </div>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.to_pay')</label>
                    <input type="text" name="sum" value="" id="bookkeeper-suppliers-bill-sum"/>
                </div>
                <div class="input-block">
                    <label>@lang('message.commission')</label>
                    <input type="text" name="commission" value="" id="bookkeeper-suppliers-bill-commission" autocomplete="off"/>
                </div>
            </div>
            <div class="field-container" id="commission-block">
                <div class="input-block">
                    <label>@lang('message.payer')</label>
                    <select name="our_details_id" class="form-select" id="select-bookkeeper-our-details-id">
                        <option value="-">-</option>
                        @foreach($companies as $item)
                            <option value="{{$item->id}}">{{$item->name_short}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-block">
                    <label>@lang('message.bank')</label>
                    <select name="our_details_bank_id" class="form-select" id="select-bookkeeper-our-details-bank-id">
                        <option>-</option>
                    </select>
                </div>
            </div>
            <div class="field-container file-block">
                <a class="btn pointer file-button show-bill-file">@lang('message.view')</a>
                <a class="btn pointer download download-bill-file" href="" target="_blank">@lang('message.download')</a>
            </div>
            <div class="field-container">
                <div class="input-block" style="margin-top: 10px;">
                    <label>@lang('message.comment')</label>
                    <textarea name="comment" id="supplier_bill_comment"></textarea>
                </div>
            </div>
            <div class="buttons-block" style="display: flex; justify-content: space-between">
                <a class="save_comment pointer">@lang('message.report_a_bug')</a>
                <button class="crm-button" id="approve-supplier-bill-button">@lang('message.send_for_payment')</button>
                <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
            </div>
        </form>
    </div>
</div>

<style>
    .form-select{
        width: 305px;
    }
    #supplier-bill-boards-list,
    #supplier-bill-services-list{
        display: none;
        margin-bottom: 20px;
        width: 100%;
    }
    #supplier-bill-boards-list tr,
    #supplier-bill-services-list tr{
        border-bottom: 1px solid #CDD4D9;
    }
    #supplier-bill-services-list td,
    #supplier-bill-boards-list td{
        padding: 5px;
    }
    #supplier-bill-services-list td .sum-input,
    #supplier-bill-boards-list td .sum-input{
        width: 70px;
        border: 1px solid #CDD4D9;
    }
    .input-block input[type=text]{
        width: 305px;
    }
    #bill-file{
        display: none;
    }
    .file-button{
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
    .field-container.file-block{
        justify-content: flex-start;
        align-items: center;
    }
    .field-container.file-block span{
        margin-left: 10px;
    }
    .supplier-info, .period-info, .supplier-details-info{
        display:none;
    }
    #supplier_bill_description,
    #supplier_bill_comment{
        width: 640px;
        height: 80px;
    }
    .add-supplier-bill-file-body img{
        max-width: 700px;
    }

    .bill-nds span {
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

    .bill-nds span.checked {
        border: 1px solid #FC6B40;
        background: #FFF0EC;
    }

    .nds {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .without-nds {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .edrpou{
        display: inline-block;
        padding-top: 10px;
    }
</style>
<script>
    $(document).ready(function(){
        $(document).on('click', '.bill-nds span', function () {
            if($(this).hasClass('checked')){
                return false;
            }
            $('.bill-nds span').removeClass('checked');
            $(this).addClass('checked');
            if ($(this).hasClass('without-nds')) {
                const val = $('#supplier_bill_description').val().split(' у т.ч. ПДВ 20%')[0];
                $('#supplier_bill_description').val(val + ' без ПДВ')
            } else {
                const val = $('#supplier_bill_description').val().split(' без ПДВ')[0];
                const nds = (+$('#bookkeeper-suppliers-bill-sum').val())/6;
                $('#supplier_bill_description').val(val + ' у т.ч. ПДВ 20% ' + nds + ' грн.')
            }
        });
        $(document).on('click', '.edit-supplier-bill', function(){
            const id = $(this).data('id');
            $('.not-form-2').show();
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/${id}/view`,
                type: 'GET',
                contentType: "application/json",
                accept: 'application/json',
                processData: false,
                success: function(response){
                    document.clientId = response.clients[0].id;
                    if(response.clients.length === 1) {
                        $('.supplier-bill-client-name').html(`<a href="/manager/clients/${response.clients[0].id}/view" target="_blank" style="color:#FC6B40;">${response.clients[0].name}</a>`);
                    }else{
                        let html = ``;
                        const count = response.clients.length;
                        for(i = 0; i < count; i++){
                            html += `<a href="/manager/clients/${response.clients[i].id}/view" target="_blank" style="color:#FC6B40;">${response.clients[i].name}</a>`;
                            if(i < (count - 1)){
                                html += ', <br>';
                            }
                        }
                        $('.supplier-bill-client-name').html(html);
                    }
                    $('.supplier-bill-supplier-name').html(`<a href="/manager/suppliers/${response.supplier_id}/view" target="_blank" style="color:#FC6B40;">${response.supplier.name}</a>`);
                    $('.supplier-bill-period-name').text(periodsName[response.period.period]);
                    $('#bookkeeper-suppliers-bill-sum').val(response.sum);
                    $('#select-bookkeeper-our-details-id').val(response.our_details_id);
                    document.ourBankId = response.our_details_bank_id;
                    $('#select-bookkeeper-our-details-id').trigger('change');
                    $('#select-bookkeeper-our-details-id').select2();
                    console.log(id);
                    $('[name="supplier_bill_id"]').val(id);
                    let boardsList = '';
                    let servicesList = '';
                    document.supplierId = response.supplier_id;
                    if(response.boards.length > 0){
                        response.boards.forEach(function (item){
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.id}]" value="${item.id}" checked></td><td>${item.board.id} / ${item.board.code}</td><td>${item.board.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    }else{
                        $('#supplier-bill-boards-list').show().find('tbody').empty();
                    }
                    if(response.services.length > 0){
                        response.services.forEach(function (item){
                            servicesList += `<tr><td><input type="checkbox" name="contracts_services_suppliers_payment_id[${item.contracts_services_suppliers_payments_id}]" value="${item.contracts_services_suppliers_payments_id}" checked></td><td>${item.service.name} (${item.price}*${item.count})</td><td><input type="text" class="sum-input" name="service_sum[${item.contracts_services_suppliers_payments_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-bill-services-list').show().find('tbody').empty().append(servicesList);
                    }else{
                        $('#supplier-bill-services-list').show().find('tbody').empty();
                    }

                    $('#supplier_bill_comment').empty().val(response.comment);
                    if(response.period.length){
                        $('.supplier-bill-period-name').empty().append(periodsName[response.period[0].period]);
                        const parts = response.period[0].period.split('-');
                        const humanPeriod = parts[1] + '.' + parts[0];
                        $('#supplier_bill_description').val($('#supplier_bill_description').val().split('{period}').join(humanPeriod));
                    }
                    if(response.supplier.details.length > 0){
                        let options = '<option value="-">-</option>';
                        response.supplier.details.forEach(function(item){
                            let selected =  (item.id === response.supplier_details_id) ? 'selected' : '';
                            if(selected){
                                $('.edrpou').empty().append("ЕДРПОУ: "+item.edrpou);
                            }
                            options += `<option value="${item.id}" ${selected} data-edrpou="${item.edrpou}">${item.name_short ? item.name : item.fio_full} ${item.edrpou}</option>`;
                        })
                        $('#select-bookkeeper-supplier-details-id').empty().append(options).select2();
                        $('#select-bookkeeper-supplier-details-bank-id').select2();
                        removeGlobalLoader();
                        if(response.supplier_details_id) {
                            let bankId = response.supplier_details_bank_id;
                            addGlobalLoader();
                            $.ajax({
                                url: `/manager/suppliers/bills/suppliers/${response.supplier_id}/details/${response.supplier_details_id}/banks`,
                                type: 'GET',
                                accept: "application/json",
                                processData: false,
                                success: function (response) {
                                    let options = '<option value="-">-</option>';
                                    response.banks.forEach(function (item) {
                                        const val = item.card_number ? item.card_number : item.iban;
                                        const selected = (response.banks.length === 1 || item.id === bankId) ? 'selected' : '';
                                        options += `<option value="${item.id}" ${selected}>${val}</option>`;
                                    })
                                    $('#select-bookkeeper-supplier-details-bank-id').empty().append(options).select2();
                                    removeGlobalLoader();
                                },
                                error: suppliersBillsResponseError
                            })
                        }
                    }
                    if(response.description){
                        $('#supplier_bill_description').val(response.description);
                    }
                    if(response.number){
                        $('#supplier_bill_number').val(response.number);
                    }
                    if(response.date){
                        let dateParts = response.date.split('-');
                        $('#supplier_bill_date').val(dateParts[2] + '.' + dateParts[1] + '.' + dateParts[0]);
                        document.supplierBillDate.setDate(new Date(dateParts[0], (+dateParts[1]) - 1, (+dateParts[2])))
                    }
                    $('.bill-nds span').removeClass('checked');
                    if(response.is_nds === 1){
                        $('span.nds').addClass('checked');
                    }else{
                        $('span.without-nds').addClass('checked');
                        if((response.description && response.description.indexOf(' без ПДВ') === -1) || !response.description){
                            $('#supplier_bill_description').val($('#supplier_bill_description').val() + ' без ПДВ');
                        }
                    }
                    $('.al-overlay3').removeClass('hide');
                    $('.add-supplier-bill.bookkeeper-bill-popup').show();
                    if(response.file){
                        const parts = response.file.split('.');
                        const ext = parts[parts.length-1].toLowerCase();
                        if(ext === 'jpg' || ext === 'png' || ext === 'jpeg' || ext === 'bmp'){
                            const img = `<img src="/storage/${response.file}">`;
                            $('.add-supplier-bill-file-body').empty().append(img);
                        }else if(ext === 'pdf'){
                            const pdf = ` <object data="/storage/${response.file}" type="application/pdf" width="700" height="${window.innerHeight-70}"></object>`
                            $('.add-supplier-bill-file-body').empty().append(pdf);
                        }else{
                            if(!response.link){
                                $('.show-bill-file').hide()
                            }
                        }
                        $('.download-bill-file').attr('href','/storage/'+response.file).show();
                    }else if(response.link){
                        $('.show-bill-file').show();
                        $('.download-bill-file').hide();
                        const iframe = `<iframe src="${response.link}" width="700"  height="${window.innerHeight-70}"></iframe>`;
                        $('.add-supplier-bill-file-body').empty().append(iframe);
                    }

                    if(response.card_number){
                        const cardInfo = `Картка: ${response.card_number}<br>Банк: ${response.bank_name}<br/>Отримувач: ${response.card_holder}<br><br>`;
                        $('.bill-card-info').empty().append(cardInfo);
                    }
                    if(response.our_details_id == 5){
                        $('.not-form-2').hide();
                        $('.commission').show();
                        @if(in_array($currentUser->id, [1,248]))
                        $('#approve-supplier-bill-button').empty().append("@lang('message.pay')");
                        @endif
                    }else{
                        $('.not-form-2').show();
                        $('.commission').hide();
                        $('#bookkeeper-suppliers-bill-commission').val('0');
                        @if(in_array($currentUser->id, [1,248]))
                        $('#approve-supplier-bill-button').empty().append("@lang('message.send_for_payment')");
                        @endif
                    }
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        })
        $(document).on('click', '.save_comment', function(){
            const id = $('[name="supplier_bill_id"]').val()
            const comment = $('#supplier_bill_comment').val();
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/${id}/comment`,
                type: 'POST',
                data: JSON.stringify({'comment':comment}),
                contentType: "application/json",
                accept: 'application/json',
                processData: false,
                success: function(response){
                    if(response.success) {
                        let  url = window.location.href;
                        if(url.indexOf('?') !== -1){
                            url += '&ajax=true';
                        }else{
                            url += '?ajax=true';
                        }
                        $.get(url,{},function(response){
                            $('.ajax-section').empty().append(response);
                            $('.al-overlay3').click();
                            removeGlobalLoader();
                            toastr.success('Коментар доданий до рахунку');
                            $('.search-form-select').select2();
                            $('.al-power-tip').powerTip({placement: 's'});
                        })
                    }
                },
                error: suppliersBillsResponseError
            })
        });
        $(document).on('change', '#select-bookkeeper-supplier-details-id', function(){
            const clientId = document.clientId;
            const supplierId = document.supplierId;
            const detailsId = $(this).val();
            const edrpou = $(this).find('option:selected').data('edrpou');
            if(supplierId === '-'){
                return false;
            }
            console.log(edrpou);
            $('.edrpou').empty().append("ЕДРПОУ: "+edrpou);
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/details/${detailsId}/banks`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function(response){
                    let options = '<option value="-">-</option>';
                    response.banks.forEach(function(item){
                        const val = item.card_number ? item.card_number : item.iban;
                        const selected = response.banks.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${val}</option>`;
                    })
                    $('#select-bookkeeper-supplier-details-bank-id').empty().append(options).select2();
                    $('.period-info').show();
                    removeGlobalLoader();
                },
                error: suppliersBillsResponseError
            })
        });
        $(document).on('change', '#supplier_bill_number', function(){
            const val = $(this).val();
            if(!val) {
                return false;
            }
            $('#supplier_bill_description').val($('#supplier_bill_description').val().split('{number}').join(val));
        })
        $(document).on('change', '#supplier_bill_date', function () {
            const val = $(this).val();
            if(!val){
                return false;
            }
            $('#supplier_bill_description').val($('#supplier_bill_description').val().split('{date}').join(val));
        });
        $(document).on('keyup keypress', '#suppliers-bill-approve-form', function(e) {
            const keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        $(document).on('submit', '#suppliers-bill-approve-form', function(e){
            e.preventDefault();
            e.stopPropagation();
            if(document.sendingBill){
                return false;
            }
            const billId = $('[name="supplier_bill_id"]').val();
            let data = {
                supplier_details_id: $('#select-bookkeeper-supplier-details-id').val(),
                supplier_details_bank_id: $('#select-bookkeeper-supplier-details-bank-id').val(),
                our_details_id: $('#select-bookkeeper-our-details-id').val(),
                our_details_bank_id: $('#select-bookkeeper-our-details-bank-id').val(),
                sum: $('#bookkeeper-suppliers-bill-sum').val(),
                number: $('#supplier_bill_number').val(),
                date: $('#supplier_bill_date').val(),
                description: $('#supplier_bill_description').val(),
                comment: $('#supplier_bill_comment').val(),
                contracts_boards_suppliers_payment_id: {},
                board_sum: {},
                is_nds: $('.bill-nds span.checked').hasClass('nds') ? 1 : 0,
                commission: $('#bookkeeper-suppliers-bill-commission').val()
            };
            let error = false;
            if(data.supplier_details_id === '-' && data.our_details_id != 5){
                $('#select-bookkeeper-supplier-details-id').addClass('error-select');
                error = true;
            }else{
                $('#select-bookkeeper-supplier-details-id').removeClass('error-select');
            }
            if(data.supplier_details_bank_id === '-' && data.our_details_id != 5){
                $('#select-bookkeeper-supplier-details-bank-id').addClass('error-select');
                error = true;
            }else{
                $('#select-bookkeeper-supplier-details-id').removeClass('error-select');
            }
            if(data.our_details_id === '-'){
                $('#select-bookkeeper-our-details-id').addClass('error-select');
                error = true;
            }
            if(!data.sum || data.sum < 0){
                $('#bookkeeper-suppliers-bill-sum').addClass('error');
                error = true;
            }else{
                $('#bookkeeper-suppliers-bill-sum').removeClass('error');
            }
            if(!data.number && data.our_details_id != 5){
                $('#supplier_bill_number').addClass('error');
                error = true;
            }else{
                $('#supplier_bill_number').removeClass('error');
            }
            if(!data.date && data.our_details_id != 5){
                $('#supplier_bill_date').addClass('error');
                error = true;
            }else{
                $('#supplier_bill_date').removeClass('error');
            }
            if(!data.description && data.our_details_id != 5){
                $('#supplier_bill_description').addClass('error');
                error = true;
            }else{
                $('#supplier_bill_description').removeClass('error');
            }
            if(!data.our_details_bank_id || data.our_details_bank_id === '-'){
                $('#select-bookkeeper-our-details-bank-id').addClass('error-select');
                error = true;
            }
            if(error){
                return false;
            }

            $('#supplier-bill-boards-list [type=checkbox]:checked').each(function(){
                const id = parseInt($(this).val());
                console.log(id);
                data.contracts_boards_suppliers_payment_id[id] = 1;
                data.board_sum[id] = $(this).closest('tr').find('.sum-input').val();
            })
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/${billId}`,
                type: 'PATCH',
                data: JSON.stringify(data),
                contentType: "application/json",
                accept: 'application/json',
                processData: false,
                success: function(response){
                    if(response.success) {
                        let  url = window.location.href;
                        if(url.indexOf('?') !== -1){
                            url += '&ajax=true';
                        }else{
                            url += '?ajax=true';
                        }
                        $.get(url,{},function(response){
                            $('.ajax-section').empty().append(response);
                            $('.al-overlay3').click();
                            removeGlobalLoader();
                            toastr.success('@lang('message.bill_has_been_placed_for_payment')');
                            $('.search-form-select').select2();
                            $('.al-power-tip').powerTip({placement: 's'});
                        })
                    }
                },
                error: suppliersBillsResponseError
            });
        });

        document.supplierBillDate = datepicker('#supplier_bill_date', {
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
                if(d < 10){
                    d = '0' + d;
                }
                if(m < 10){
                    m = '0' + m;
                }
                input.value = d+'.'+m+'.'+y;
                $('#supplier_bill_description').val($('#supplier_bill_description').val().split('{date}').join(input.value));
            },
        });

        $(document).on('change', '#select-bookkeeper-our-details-id', function(){
            if($(this).val() == 5){
                $('.not-form-2').hide();
                $('.commission').show();
                @if(in_array($currentUser->id, [1,248]))
                $('#approve-supplier-bill-button').empty().append("@lang('message.pay')");
                @endif

            }else{
                $('.not-form-2').show();
                $('.commission').hide();
                $('#bookkeeper-suppliers-bill-commission').val('0');
                @if(in_array($currentUser->id, [1,248]))
                $('#approve-supplier-bill-button').empty().append("@lang('message.send_for_payment')");
                @endif
            }
            if($(this).val() !== '-') {
                $.ajax({
                    url: `/manager/details/${$(this).val()}/banks`,
                    type: 'GET',
                    contentType: "application/json",
                    processData: false,
                    success: function (response) {
                        let options = '<option value="-">-</option>';
                        response.banks.forEach(function (item) {
                            const selected = response.banks.length === 1 || item.id == document.ourBankId ? 'selected' : '';
                            options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                        })
                        $('#select-bookkeeper-our-details-bank-id').empty().append(options).select2();
                        removeGlobalLoader();
                    },
                    error: suppliersBillsResponseError
                });
            }
        })
    });
</script>