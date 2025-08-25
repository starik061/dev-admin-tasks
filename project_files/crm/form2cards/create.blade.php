@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<!-- RESULT SEARCH (START) -->
@php
    $webp = "";
@endphp

<section id="result-search-list" class="al-client-info">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search our-details posts-block">
                <div class="favorite-viewed-tab system-info-tabs">
                    @include('front.crm.settings-menu')
                </div>
                <h1 class="title-search-result">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block posts-block">
                    <form method="POST">
                        <div class="field-container">
                            <div class="input-block">
                                <label>@lang('message.our_company')</label>
                                <select name="details_id" class="details" required>
                                    @foreach($details as $item)
                                        <option value="{{$item->id}}">{{$item->name_short}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-block">
                                <label>Назва картки</label>
                                <input type="text" name="card_name" value="{{old('card_name')}}" />
                            </div>
                        </div>
                        {{--
                        <div class="field-container">
                            <div class="input-block">
                                <label>IBAN</label>
                                <input type="text" name="iban" value="{{old('iban')}}" />
                            </div>
                            <div class="input-block">
                                <label>@lang('message.bank_name')</label>
                                <input type="text" name="bank_name" value="{{old('bak_name')}}" />
                            </div>
                        </div>
                        --}}
                        <div class="hr"></div>
                        <div class="field-container right">
                            <div class="buttons-block">
                                <a class="cancel">@lang('message.clear')</a>
                                <button class="submit">@lang('message.save')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('add.footer')
<script>
    var main_url = '/manager/form2-cards';
</script>

@include('front.crm.scripts')
<script>
    $('.details').select2();
    $(document).on('change', '[name="iban"]', function () {
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
</script>