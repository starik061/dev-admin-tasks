@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')
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
                    <div class="posts-list">
                        <div class="clients-contracts-data">
                            <form method="post" id="monobank-credential">
                                <div class="data-table">
                                    <div class="data-thead">
                                        <div class="data-tr">
                                            <div class="data-td td-name">@lang('message.parameter')</div>
                                            <div class="data-td action-col"></div>
                                        </div>
                                        <div class="data-tr field-container">
                                            <div class="data-td td-name">@lang('message.monobank_key_id')</div>
                                            <div class="data-td action-col input-block">
                                                <input type="text" name="key_id" value="{{optional($credential)->key_id}}" required/>
                                            </div>
                                        </div>
                                        <div class="data-tr">
                                            <div class="data-td td-name">@lang('message.monobank_key')</div>
                                            <div class="data-td action-col" style="display: block">
                                                <input type="file" name="key_file" required/><br><br>
                                                {{ optional($credential)->key ? "...".substr(optional($credential)->key, 40, 64)."..." : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="crm-button mt20">Сохранить</button>
                            </form>
                        </div>
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
<style>
    .data-td{
        font-size: 13px !important;
    }
    .posts-block .input-block{
        margin: 0;
    }
    #monobank-credential input{
        font-size: 13px;
    }
</style>
<script>
    $(document).ready(function(){
        $(document).on('submit', '#monobank-credential', function (event){
            event.preventDefault();
            event.stopPropagation();
            addGlobalLoader();
            /*let fd = new FormData(document.getElementById('monobank-credential'));
            let files = $('[name=key]')[0].files;
            fd.append('key_file',files[0]);*/
            $.ajax({
                url: '/manager/monobank/credential',
                method: 'POST',
                data: new FormData(document.getElementById('monobank-credential')),
                contentType: false,
                processData: false,
                success: function (response) {
                    toastr.success(response.message);
                    removeGlobalLoader();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error('Произошла ошибка - попробуйте позже или обратитесь к администратору');
                    removeGlobalLoader();
                }
            })

            return false;
        })
    })
</script>