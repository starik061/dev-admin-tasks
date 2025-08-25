@include('add.head')
<body>
@include('add.header')
@include('add.menu')
<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base">
                <a class="back" href="/manager/suppliers">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
                    </svg>
                    @lang('message.back')
                </a>
            </div>
            <div class="container  container-base">
                @include('front.crm.suppliers.header')
                @include('front.crm.suppliers.menu')
                <div class="client-tab-data-block">
                    @if(!empty($types))
                        <form method="POST" id="suppliers-boards-cost">
                            <b>@lang('message.all_cities')</b>
                            <table>
                                <tr>
                                    <td>@lang('message.type')</td>
                                    <td>@lang('message.boards_table_cost')</td>
                                    <td>@lang('message.pasting_service_cost')</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @php
                                $i = 0;
                                @endphp
                                @foreach($types as $type => $title)
                                    <tr class="field-container">
                                        <td>{{$title}}</td>
                                        <td class="input-block">
                                            <input type="text" name="price[{{$supplier->firm->id}}][{{$type}}]" value="{{$prices[$supplier->firm->id][$type]}}"/>
                                        </td>
                                        <td class="input-block">
                                            <input type="text" name="service[9][{{$supplier->firm->id}}][{{$type}}]" value="{{$servicePrices[$supplier->firm->id][$type]}}"/>
                                        </td>
                                        @if($i === 1)
                                            <td></td>
                                            <td>@lang('message.use_price_from_grid')</td>
                                            <td class="input-block">
                                                <input type="checkbox" name="use_price" value="1" @if($usePrice) checked @endif/>
                                            </td>
                                            @php
                                                $i++;
                                            @endphp
                                        @endif
                                        @if(!$i)
                                            <td></td>
                                            <td>@lang('message.discount')</td>
                                            <td class="input-block">
                                                <input type="text" name="discount" value="{{$discount}}"/>
                                            </td>
                                            @php
                                            $i++;
                                            @endphp
                                        @endif

                                    </tr>
                                @endforeach
                            </table>
                            @if($citiesData)
                                @foreach($citiesData as $cityId => $data)
                                    <br/><b>@lang('message.city'): {{$citiesList[$cityId]}}</b>
                                    <table>
                                        <tr>
                                            <td>@lang('message.type')</td>
                                            <td>@lang('message.boards_table_cost')</td>
                                            <td>@lang('message.pasting_service_cost')</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($types as $type => $title)
                                            <tr class="field-container">
                                                <td>{{$title}}</td>
                                                <td class="input-block">
                                                    <input type="text" name="cities_data[{{$cityId}}][price][{{$supplier->firm->id}}][{{$type}}]" value="{{$data['priceData'][$supplier->firm->id][$type]}}"/>
                                                </td>
                                                <td class="input-block">
                                                    <input type="text" name="cities_data[{{$cityId}}][service][9][{{$supplier->firm->id}}][{{$type}}]" value="{{$data['serviceData'][$supplier->firm->id][$type]}}"/>
                                                </td>
                                                @if($i === 1)
                                                    <td></td>
                                                    <td>@lang('message.use_price_from_grid')</td>
                                                    <td class="input-block">
                                                        <input type="checkbox" name="cities_data[{{$cityId}}][usePrice]" value="1" @if($data['usePrice']) checked @endif/>
                                                    </td>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endif
                                                @if(!$i)
                                                    <td></td>
                                                    <td>@lang('message.discount')</td>
                                                    <td class="input-block">
                                                        <input type="text" name="cities_data[{{$cityId}}][discount]" value="{{$data['discount']}}"/>
                                                    </td>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endif
                                            </tr>
                                        @endforeach
                                    </table>
                                @endforeach
                            @endif
                            <div class="field-container">
                                <div class="input-block">
                                    <label>@lang('message.city')</label>
                                    <select class="city-select">
                                        <option>-</option>
                                        @foreach($citiesList as $cityId => $cityName)
                                            <option value="{{$cityId}}">{{$cityName}}</option>
                                        @endforeach
                                    </select>
                                    <a class="crm-button add-city text-white">@lang('message.add_city')</a>
                                </div>
                            </div>
                            <button class="crm-button pointer text-white">@lang('message.save')</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .client-tab-data-block td{
        padding: 10px;
    }
    .field-container .input-block input{
        width: 150px;
    }
</style>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
    const citiesList = {!! json_encode($citiesList, JSON_UNESCAPED_UNICODE)  !!};
    const cityRow = `
        <br/><b>@lang('message.city'): ###city_name###</b>
        <table>
            <tr>
                <td>@lang('message.type')</td>
                <td>@lang('message.boards_table_cost')</td>
                <td>@lang('message.pasting_service_cost')</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @php
            $i = 0;
            @endphp
            @foreach($types as $type => $title)
                <tr class="field-container">
                    <td>{{$title}}</td>
                    <td class="input-block">
                        <input type="text" name="cities_data[###city_id###][price][{{$supplier->firm->id}}][{{$type}}]" value=""/>
                    </td>
                    <td class="input-block">
                        <input type="text" name="cities_data[###city_id###][service][9][{{$supplier->firm->id}}][{{$type}}]" value=""/>
                    </td>
                    @if($i === 1)
                        <td></td>
                        <td>@lang('message.use_price_from_grid')</td>
                        <td class="input-block">
                            <input type="checkbox" name="cities_data[###city_id###][usePrice]" value="1" />
                        </td>
                        @php
                        $i++;
                        @endphp
                    @endif
                    @if(!$i)
                        <td></td>
                        <td>@lang('message.discount')</td>
                        <td class="input-block">
                            <input type="text" name="cities_data[###city_id###][discount]" value=""/>
                        </td>
                        @php
                        $i++;
                        @endphp
                    @endif
                </tr>
            @endforeach
        </table>
        <div class="field-container">
            <div class="input-block">
                <label>@lang('message.city')</label>
                <select class="city-select">
                    <option>-</option>
                    @foreach($citiesList as $cityId => $cityName)
                        <option value="{{$cityId}}">{{$cityName}}</option>
                    @endforeach
                </select>
                <a class="crm-button add-city text-white">@lang('message.add_city')</a>
            </div>
        </div>
    `;
    $(document).ready(function(){
        $('.city-select').select2();
        $(document).on('click', '.add-city', function(){
            const cityId = $(this).parent().find('.city-select').val();
            if(cityId === '-'){
                return false;
            }
            $(this).closest('.field-container').before(cityRow.split('###city_id###').join(cityId).split('###city_name###').join(citiesList[cityId]));
            $(this).closest('.field-container').remove();
            $('.city-select').select2();
        })
        $(document).on('submit', '#suppliers-boards-cost', function (event){
            event.preventDefault();
            event.stopPropagation();
            addGlobalLoader();
            $.ajax({
                url: '/manager/suppliers/{{$supplier->id}}/prices',
                method: 'POST',
                data: new FormData(document.getElementById('suppliers-boards-cost')),
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