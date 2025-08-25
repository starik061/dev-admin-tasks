<div class="add-supplier-bill zi10101">
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
        <form class="suppliers-bill-form" id="suppliers-bill-form" method="post">
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.client')</label>
                    <select class="form-select" id="select-bookkeeper-client-id" name="client_id">
                        <option value="-">-</option>
                        @foreach($clients as $client)
                            <option value="{{$client['id']}}">{{$client['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-block supplier-info">
                    <label>@lang('message.supplier')</label>
                    <select class="form-select" id="select-bookkeeper-supplier-id" name="supplier_id">
                        <option value="-">-</option>
                    </select>
                </div>
            </div>
            <div class="field-container">
                <div class="input-block supplier-details-info">
                    <label>@lang('message.supplier_company')</label>
                    <select class="form-select" id="select-bookkeeper-supplier-details-id" name="supplier_details_id">
                        <option value="-">-</option>
                    </select>
                </div>
                <div class="input-block period-info">
                    <label>@lang('message.bank')</label>
                    <select class="form-select" id="select-bookkeeper-supplier-details-bank-id" name="supplier_details_bank_id">
                        <option value="-">-</option>
                    </select>
                </div>
            </div>
            <div class="field-container">
                <div class="input-block period-info">
                    <label>@lang('message.period')</label>
                    <select class="form-select" id="select-bookkeeper-period-id" name="period">
                        <option value="-">-</option>
                    </select>
                </div>
            </div>
            <table id="supplier-bill-boards-list">
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
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.supplier_bill_number')</label>
                    <input type="text" name="number" value="" id="supplier_bill_number"/>
                </div>
                <div class="input-block">
                    <label>@lang('message.supplier_bill_date')</label>
                    <input type="text" name="date" value="" id="supplier_bill_date"/>
                </div>
            </div>
            <div class="field-container">
                <div class="input-block">
                    <label>@lang('message.purpose_of_payment')</label>
                    <textarea name="description" id="supplier_bill_description">Сплата за розміщ. реклами у {period}р. зг. рах. №{number} від {date}р.</textarea>
                </div>
            </div>
            <div class="field-container">
                <div class="input-block">
                    <label>К оплате</label>
                    <input type="text" name="sum" value="" id="suppliers-bill-sum"/>
                </div>
                <div class="input-block">
                    <label>Плательщик</label>
                    <select name="our_details_id" class="form-select" id="select-bookkeeper-our-details-id">
                        <option value="-">-</option>
                        @foreach($companies as $item)
                            <option value="{{$item->id}}">{{$item->name_short}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field-container file-block">
                <a class="btn pointer file-button">Загрузить файл счета</a>
                <input type="file" name="file" id="bill-file"/>
                <span id="file-name"></span>
            </div>
            <div class="buttons-block right-buttons">
                <a class="cancel pointer">@lang('message.cancel')</a>
                <button class="crm-button">@lang('message.add')</button>
                <div class="lds-ellipsis2 hide"><div></div><div></div><div></div><div></div></div>
            </div>
        </form>
    </div>
</div>
<style>
    .form-select{
        width: 305px;
    }
    #supplier-bill-boards-list{
        display: none;
        margin-bottom: 20px;
        width: 100%;
    }
    #supplier-bill-boards-list tr{
        border-bottom: 1px solid #CDD4D9;
    }
    #supplier-bill-boards-list td{
        padding: 5px;
    }
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
    #supplier_bill_description{
        width: 640px;
        height: 100px;
    }
</style>
<script>
    $(document).ready(function(){
        $('.form-select').select2();
        $(document).on('change', '#select-bookkeeper-client-id', function(){
            const clientId = $(this).val();
            if(clientId === '-'){
                return false;
            }
            addGlobalLoader()
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function(response){
                    let options = '<option value="-">-</option>';
                    console.log(response.suppliers);
                    response.suppliers.forEach(function(item){
                        let selected =  response.suppliers.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                    })
                    $('#select-bookkeeper-supplier-id').empty().append(options).select2();
                    $('.supplier-info').show();
                    removeGlobalLoader();
                    if(response.suppliers.length === 1){
                        $('#select-bookkeeper-supplier-id').trigger('change');
                    }
                    $('.supplier-details-info').hide();
                    $('.period-info').hide();
                    $('#select-bookkeeper-period-id').empty().append('<option value="-">-</option>').select2();
                    $('#supplier-bill-boards-list').hide();

                },
                error: function(xhr, ajaxOptions, thrownError){
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору')
                    removeGlobalLoader();
                }
            });
        })
        $(document).on('change', '#select-bookkeeper-supplier-id', function(){
            const clientId = $('#select-bookkeeper-client-id').val();
            const supplierId = $(this).val();
            if(supplierId === '-'){
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/details`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function(response){
                    let options = '<option value="-">-</option>';
                    response.details.forEach(function(item){
                        let selected =  response.details.length === 1 ? 'selected' : '';
                        options += `<option value="${item.id}" ${selected}>${item.name_short}</option>`;
                    })
                    $('#select-bookkeeper-supplier-details-id').empty().append(options).select2();
                    $('.supplier-details-info').show();
                    removeGlobalLoader();
                    if(response.details.length === 1){
                        $('#select-bookkeeper-supplier-details-id').trigger('change');
                    }
                    $('.period-info').hide();
                    $('#supplier-bill-boards-list').hide();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                }
            });
        })
        $(document).on('change', '#select-bookkeeper-supplier-details-id', function(){
            const clientId = $('#select-bookkeeper-client-id').val();
            const supplierId = $('#select-bookkeeper-supplier-id').val();
            const detailsId = $(this).val();
            if(supplierId === '-'){
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/periods`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function(response){
                    let options = '<option value="-">-</option>';
                    response.periods.forEach(function(item){
                        options += `<option value="${item.month}">${item.name}</option>`;
                    })
                    $('#select-bookkeeper-period-id').empty().append(options).select2();
                    $('.period-info').show();
                    removeGlobalLoader();
                    $('#supplier-bill-boards-list').hide();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                }
            })
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
                        options += `<option value="${item.id}" ${selected}>${item.bank_name} - ${val}</option>`;
                    })
                    $('#select-bookkeeper-supplier-details-bank-id').empty().append(options).select2();
                    $('.period-info').show();
                    removeGlobalLoader();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                }
            })
        });

        $(document).on('change', '#select-bookkeeper-period-id', function(){
            const clientId = $('#select-bookkeeper-client-id').val();
            const supplierId = $('#select-bookkeeper-supplier-id').val();
            //const supplierDetailsId = $('#select-bookkeeper-supplier-details-id').val();
            const period = $(this).val();
            if(period === '-'){
                return false;
            }
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${clientId}/suppliers/${supplierId}/boards?period[]=${period}`,
                type: 'GET',
                contentType: "application/json",
                processData: false,
                success: function(response){
                    let boardsList = '';
                    if(response.boards.length > 0){
                        response.boards.forEach(function (item){
                            boardsList += `<tr><td><input type="checkbox" name="contracts_boards_suppliers_payment_id[${item.contracts_boards_suppliers_payment_id}]" value="${item.contracts_boards_suppliers_payment_id}"></td><td>${item.board_id} / ${item.code}</td><td>${item.addr}</td><td><input type="text" class="sum-input" name="board_sum[${item.contracts_boards_suppliers_payment_id}]" value="${item.sum}"></td></tr>`;
                        });
                        $('#supplier-bill-boards-list').show().find('tbody').empty().append(boardsList);
                    }else{
                        $('#supplier-bill-boards-list').show().find('tbody').empty();
                    }
                    removeGlobalLoader();
                    const parts = period.split('-');
                    const humanPeriod = parts[1] + '.' + parts[0];
                    $('#supplier_bill_description').val($('#supplier_bill_description').val().split('{period}').join(humanPeriod));
                },
                error: function(xhr, ajaxOptions, thrownError){
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                }
            });
        })
        $(document).on('click', '.file-button', function(){
            $('#bill-file').trigger('click');
        })
        $(document).on('change', '#bill-file', function(){
            const fileName = $(this).val().indexOf('\\') !== -1 ? $(this).val().split('\\').pop() : $(this).val().split('/').pop();
            $('#file-name').empty().append(fileName);
        })
        $(document).on('click', '#suppliers-bill-form .cancel', function(){
            $('.add-supplier-bill-header .close').trigger('click');
        })
        $(document).on('submit', '#suppliers-bill-form', function (){
            if(!addSupplierBillFormValidation(this)){
                return false;
            }
            let fd = new FormData(this);
            addGlobalLoader();
            $.ajax({
                url: `/manager/suppliers/bills/clients/${$('#select-bookkeeper-client-id').val()}/suppliers/${$('#select-bookkeeper-supplier-id').val()}`,
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.success){
                        $('table.result-table tbody').prepend(response.view);
                        $('.al-overlay3').trigger('click');
                    }
                    removeGlobalLoader();
                },
                error: function(xhr, ajaxOptions, thrownError){
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                }
            })

            return false;
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
        })
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
    });
    const addSupplierBillFormValidation = (form) => {
        const clientId = $(form).find('#select-bookkeeper-client-id').val();
        if(!clientId || clientId === '-'){
            console.log(1);
            return false;
        }
        const supplierId = $(form).find('#select-bookkeeper-supplier-id').val();
        if(!supplierId || supplierId === '-'){
            console.log(2);
            return false;
        }
        const supplierDetailsId = $(form).find('#select-bookkeeper-supplier-details-id').val();
        if(!supplierDetailsId || supplierDetailsId === '-'){
            console.log(21);
            return false;
        }
        const supplierDetailsBankId = $(form).find('#select-bookkeeper-supplier-details-bank-id').val();
        if(!supplierDetailsBankId || supplierDetailsBankId === '-'){
            console.log(211);
            return false;
        }
        const period = $(form).find('#select-bookkeeper-period-id').val();
        if(!period || period === '-'){
            console.log(3);
            return false;
        }
        const ourDetailsId = $(form).find('#select-bookkeeper-our-details-id').val();
        if(!ourDetailsId || ourDetailsId === '-'){
            console.log(4);
            return false;
        }
        const sum = +$(form).find('#suppliers-bill-sum').val();
        if(sum <= 0){
            console.log(5);
            return false;
        }
        const number = $(form).find('#supplier_bill_number').val();
        if(!number){
            console.log(6);
            return false;
        }
        const date = $(form).find('#supplier_bill_date').val();
        if(!date){
            console.log(7);
            return false;
        }
        const description = $(form).find('#supplier_bill_description').val();
        if(!description){
            console.log(8);
            return false;
        }
        if(!$(form).find('#bill-file').val()){
            console.log(6);
            return false;
        }

        return true;
    }
</script>