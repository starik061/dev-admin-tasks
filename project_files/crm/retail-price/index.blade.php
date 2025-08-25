@include('add.head')

<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<div class="container">
    <h2>@lang('message.import_title')</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-section" >
        <form action="{{ url('/manager/retail-price/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">@lang('message.choose_file')</label>
                <input type="file" name="file" class="form-control-file" required>
            </div>
            <div style="display: flex; justify-content: space-between">
                <button type="submit" class="btn btn-primary mt-2">@lang('message.upload')</button>

                <div class="add-block" style="margin-top: 10px">
                    <a href="#" class="new-btn">@lang('message.add_retail_rule')</a>
                </div>
            </div>
        </form>
    </div>

    <hr>

    <h4>@lang('message.uploaded_rules')</h4>
    <table class="table table-bordered table-sm">
        <thead>
        <tr>
            <th>№</th>

            <th>@lang('message.markup')</th>
            <th>@lang('message.min_price')</th>
            <th>@lang('message.max_price')</th>
            <th>@lang('message.operator')</th>
            <th>@lang('message.region')</th>
            <th>@lang('message.city')</th>
            <th>@lang('message.district')</th>
            <th>@lang('message.type')</th>
            <th>@lang('message.side')</th>
            <th>@lang('message.light')</th>
            <th>@lang('message.trassa')</th>
            <th>@lang('message.month')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($prices as $index => $price)
            <tr>
                <td>{{ $prices->firstItem() + $index }}</td> <!-- Выводим нумерацию с учётом пагинации -->

                <td>{{ $price->markup }}%</td>
                <td>{{ $price->min_price ?? '-' }}</td>
                <td>{{ $price->max_price ?? '-' }}</td>
                <td>{{ $price->firm->name ?? '-' }}</td>
                <td>{{ $price->region->name ?? '-' }}</td>
                <td>{{ $price->city->name ?? '-' }}</td>
                <td>{{ $price->district->name ?? '-' }}</td>
                <td>{{ $board_types[$price->type] ?? '-' }}</td>
                <td>{{ $sides[$price->side_type]['title'] ?? '-' }}</td>
                <td>
                    {{ $price->light === 1 ? __('message.yes') : '-' }}
                </td>
                <td>
                    {{ $price->trassa === 1 ? __('message.yes') : '-' }}
                </td>
                <td style="width: 80px">{{ $price->month }}</td>

                <td style="width: 80px">
                    <form action="{{ route('retail-price.delete', $price->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $price->id }}">
                        @csrf
                        @method('DELETE')
                        <a href="#" class="btn-delete" onclick="confirmDelete(event, '{{ $price->id }}')">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"/>
                            </svg>
                        </a>
                    </form>

                    <a href="#" class="edit-btn" data-id="{{ $price->id }}" data-json='@json($price)'>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.75 2.24998C12.947 2.053 13.1808 1.89674 13.4382 1.79014C13.6956 1.68353 13.9714 1.62866 14.25 1.62866C14.5286 1.62866 14.8044 1.68353 15.0618 1.79014C15.3192 1.89674 15.553 2.053 15.75 2.24998C15.947 2.44697 16.1032 2.68082 16.2098 2.93819C16.3165 3.19556 16.3713 3.47141 16.3713 3.74998C16.3713 4.02856 16.3165 4.30441 16.2098 4.56178C16.1032 4.81915 15.947 5.053 15.75 5.24998L5.625 15.375L1.5 16.5L2.625 12.375L12.75 2.24998Z" stroke="#FC6B40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if ($prices->lastPage() > 1)
        <div class="result-paginator">
            {{ $prices->appends(request()->query())->links() }}
        </div>
    @endif

</div>

<div class="al-overlay3 hide zi10101"></div>

@include('add.footer')
<div class="lead-add-popup zi10101" style="width: 800px !important; height: 708px">
    <div class='lead-add-header'>
        <span>@lang('message.add_retail_rule')</span>
        <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
    </div>
    <div class="lead-add-form">
        <form method="POST" action="{{ route('retail-price.store') }}" class="retail-price-form">
            <div class="container  container-base mw1460 mw-full">
                <div class="content-block clearfix">

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.markup')</label>
                            <input type="number" name="markup" min="0" required/>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.min_price')</label>
                            <input type="number" name="min_price"/>
                        </div>
                        <div class="input-block">
                            <label>@lang('message.max_price')</label>
                            <input type="number" name="max_price"/>
                        </div>
                    </div>
                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.firm')</label>
                            <select name="firm_id">
                                <option value="" selected>-</option>
                                @foreach($firms as $firm)
                                    <option value="{{ $firm->id }}">{{ $firm->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-block">
                            <label>@lang('message.region')</label>
                            <select name="region_id" id="region_id">
                                <option value="" selected>-</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.city')</label>
                            <select name="city_id" id="city_id">
                                <option value="" selected>-</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" data-region-id="{{ $city->region }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-block">
                            <label>@lang('message.district')</label>
                            <select name="district_id" id="district_id">
                                <option value="" selected>-</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" data-city-id="{{ $district->city_id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label for="add-type">@lang('message.type')</label>
                            <select name="type" id="add-type">
                                <option value="">-</option>
                                @foreach($board_types as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-block">
                            <label for="add-side_type">@lang('message.side')</label>
                            <select name="side_type" id="add-side_type">
                                <option value="">-</option>
                                @foreach($sides as $side)
                                    <option value="{{ $side['type'] }}">{{ $side['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field-container">
                        <div class="input-block">
                            <label for="add-light">@lang('message.light')</label>
                            <select name="light" id="add-light">
                                <option value="">-</option>
                                <option value="1">@lang('message.yes')</option>
                                <option value="0">@lang('message.no')</option>
                            </select>
                        </div>

                        <div class="input-block">
                            <label for="add-trassa">@lang('message.trassa')</label>
                            <select name="trassa" id="add-trassa">
                                <option value="">-</option>
                                <option value="1">@lang('message.yes')</option>
                                <option value="0">@lang('message.no')</option>
                            </select>
                        </div>
                    </div>


                    <div class="align-right">
                        <button class="clear-new">@lang('message.cancel')</button>
                        <button class="submit">@lang('message.add')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="retail-price-edit-popup zi10101" id="edit-popup" style="display: none; width: 800px !important; min-height: 680px">
    <div class='lead-add-header'>
        <span>@lang('message.edit_retail_rule')</span>
        <span class="close">
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
            </svg>
        </span>
    </div>
    <div class="lead-add-form">
        <form method="POST" id="edit-form">
            @csrf
            @method('PUT')
            <div class="container container-base mw1460 mw-full">
                <div class="content-block clearfix">
                    <input type="hidden" name="id" id="edit-id" />

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.markup')</label>
                            <input type="number" name="markup" id="edit-markup" min="0" required/>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.min_price')</label>
                            <input type="number" name="min_price" id="edit-min_price"/>
                        </div>
                        <div class="input-block">
                            <label>@lang('message.max_price')</label>
                            <input type="number" name="max_price" id="edit-max_price"/>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.firm')</label>
                            <select name="firm_id" id="edit-firm_id">
                                <option value="">-</option>
                                @foreach($firms as $firm)
                                    <option value="{{ $firm->id }}">{{ $firm->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-block">
                            <label>@lang('message.region')</label>
                            <select name="region_id" id="edit-region_id">
                                <option value="">-</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.city')</label>
                            <select name="city_id" id="edit-city_id">
                                <option value="">-</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" data-region-id="{{ $city->region }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-block">
                            <label>@lang('message.district')</label>
                            <select name="district_id" id="edit-district_id">
                                <option value="">-</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" data-city-id="{{ $district->city_id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label>@lang('message.type')</label>
                            <select name="type" id="edit-type">
                                <option value="">-</option>
                                @foreach($board_types as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-block">
                            <label>@lang('message.side')</label>
                            <select name="side_type" id="edit-side_type">
                                <option value="">-</option>
                                @foreach($sides as $side)
                                    <option value="{{ $side['type'] }}">{{ $side['title'] }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="field-container">
                        <div class="input-block">
                            <label for="edit-light">@lang('message.light')</label>
                            <select name="light" id="edit-light">
                                <option value="">-</option>
                                <option value="1">@lang('message.yes')</option>
                                <option value="0">@lang('message.no')</option>
                            </select>
                        </div>

                        <div class="input-block">
                            <label for="edit-trassa">@lang('message.trassa')</label>
                            <select name="trassa" id="edit-trassa">
                                <option value="">-</option>
                                <option value="1">@lang('message.yes')</option>
                                <option value="0">@lang('message.no')</option>
                            </select>
                        </div>
                    </div>

                    <div class="align-right">
                        <button type="button" class="clear-new close">@lang('message.cancel')</button>
                        <button class="submit" style="margin-right: 5px">@lang('message.save')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@include('front.crm.scripts')
<script>
    function confirmDelete(event, priceId) {
        if (confirm('Вы уверены, что хотите удалить запись?')) {
            document.getElementById('delete-form-' + priceId).submit();
        } else {
            event.preventDefault();
        }
    }
        $(document).ready(function () {
            $('select').select2({ minimumResultsForSearch: 0 });

            // === ДЛЯ ДОБАВЛЕНИЯ ===
            const $region = $('#region_id');
            const $city = $('#city_id');
            const $district = $('#district_id');

            const $originalCityOptions = $city.find('option').clone();
            const $originalDistrictOptions = $district.find('option').clone();

            setupRegionCityDistrictSelects($region, $city, $district, $originalCityOptions, $originalDistrictOptions);

            // === ДЛЯ РЕДАКТИРОВАНИЯ ===
            const $editRegion = $('#edit-region_id');
            const $editCity = $('#edit-city_id');
            const $editDistrict = $('#edit-district_id');

            const $originalEditCityOptions = $editCity.find('option').clone();
            const $originalEditDistrictOptions = $editDistrict.find('option').clone();

            setupRegionCityDistrictSelects($editRegion, $editCity, $editDistrict, $originalEditCityOptions, $originalEditDistrictOptions);

            // === ФУНКЦИЯ ОБЩАЯ ДЛЯ ОБРАБОТКИ ЗАВИСИМОСТЕЙ ===
            function setupRegionCityDistrictSelects($region, $city, $district, $cityOptions, $districtOptions) {
                function resetSelect($select) {
                    $select.empty().append('<option value="" selected>-</option>');
                    // $select.prop('disabled', true).val('').trigger('change.select2');
                }

                $region.on('change', function () {
                    const regionId = $(this).val();
                    resetSelect($city);
                    resetSelect($district);

                    if (regionId) {
                        const filteredCities = $cityOptions.filter(function () {
                            return $(this).data('regionId') == regionId;
                        });

                        $city.append(filteredCities);
                        // $city.prop('disabled', false).val('').trigger('change.select2');
                    }
                });

                $city.on('change', function () {
                    const cityId = $(this).val();
                    resetSelect($district);

                    if (cityId) {
                        const filteredDistricts = $districtOptions.filter(function () {
                            return $(this).data('cityId') == cityId;
                        });
                        $district.append(filteredDistricts);
                        // $district.prop('disabled', false).val('').trigger('change.select2');
                    }
                });
            }
        });
</script>

<script>
    $(document).on('click', '.edit-btn', function (e) {
        e.preventDefault();
        let data = $(this).data('json');

        $('#edit-id').val(data.id);
        $('#edit-form').attr('action', `/manager/retail-price/${data.id}`);

        // Простые значения
        $('#edit-form input[name="markup"]').val(data.markup);
        $('#edit-form input[name="min_price"]').val(data.min_price);
        $('#edit-form input[name="max_price"]').val(data.max_price);


        $('#edit-form select[name="type"]').val(data.type).trigger('change');
        $('#edit-form select[name="side_type"]').val(data.side_type).trigger('change');
        $('#edit-form select[name="light"]').val(data.light != null ? String(data.light) : '').trigger('change');
        $('#edit-form select[name="trassa"]').val(data.trassa != null ? String(data.trassa) : '').trigger('change');


        // firm
        $('#edit-form select[name="firm_id"]').val(data.firm_id).trigger('change');

        // region
        $('#edit-form select[name="region_id"]').val(data.region_id).trigger('change');

        // дождаться загрузки городов после region
        setTimeout(() => {
            $('#edit-form select[name="city_id"]').val(data.city_id).trigger('change');

            // дождаться загрузки районов после city
            setTimeout(() => {
                $('#edit-form select[name="district_id"]').val(data.district_id).trigger('change');
            }, 300);
        }, 300);

        // показать попап
        $('.al-overlay3').removeClass('hide');
        $('#edit-popup').show();
    });


    $(document).on('submit', 'form.retail-price-form', function (e) {
        e.preventDefault();

        const $form = $(this);
        const formData = new FormData(this);
        const $submitButton = $form.find('[type="submit"]');

        $form.find('.input-block').removeClass('has-error');
        $form.find('.error-text').remove();

        $submitButton.prop('disabled', true);
        $('body').append('<div class="global-loader"></div>');

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success(data) {
                toastr.success(data.message);
                setTimeout(() => window.location.reload(), 1000);
            },
            error(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;

                    for (const field in errors) {
                        const message = errors[field][0];

                        if (field === 'general') {
                            toastr.error(message);
                            continue;
                        }

                        const $input = $form.find(`[name="${field}"]`);
                        $input.closest('.input-block').addClass('has-error');
                        $input.after(`<div class="error-text" style="color:red;">${message}</div>`);
                    }
                } else {
                    toastr.error('Ошибка при отправке формы');
                }
            },
            complete() {
                $submitButton.prop('disabled', false);
                $('.global-loader').remove();
            }
        });
    });

    $(document).on('submit', '#edit-form', function (e) {
        e.preventDefault();

        const $form = $(this);
        const formData = new FormData(this);
        const $submitButton = $form.find('button.submit');

        $form.find('.input-block').removeClass('has-error');
        $form.find('.error-text').remove();

        $submitButton.prop('disabled', true);
        $('body').append('<div class="global-loader"></div>');

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success(data) {
                toastr.success(data.message);
                setTimeout(() => window.location.reload(), 1000);
            },
            error(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;

                    for (const field in errors) {
                        const message = errors[field][0];

                        if (field === 'general') {
                            toastr.error(message);
                            continue;
                        }

                        const $input = $form.find(`[name="${field}"]`);
                        $input.closest('.input-block').addClass('has-error');
                        $input.after(`<div class="error-text" style="color:red;">${message}</div>`);
                    }
                } else {
                    toastr.error('Ошибка при обновлении записи');
                }
            },
            complete() {
                $submitButton.prop('disabled', false);
                $('.global-loader').remove();
            }
        });
    });

</script>


<style>

    .select2-container {
        z-index: 999999 !important;
    }
    .select2-dropdown {
        z-index: 999999 !important;
    }


    h2 {
        font-size: 28px;
        font-weight: 700;
        color: #FC6B40;
        margin-bottom: 20px;
    }

    h4 {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin-top: 40px;
    }

    .form-group label {
        font-weight: 500;
        margin-bottom: 8px;
    }

    .form-control-file {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
    }

    button[type="submit"] {
        background-color: #FC6B40;
        color: #fff;
        font-size: 16px;
        padding: 12px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #f59c42;
    }

    .alert {
        border-radius: 4px;
        padding: 15px;
        margin-top: 15px;
        margin-bottom: 25px;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    /* Стиль для таблицы */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    table th,
    table td {
        padding: 14px;
        text-align: center;
        font-size: 14px;
        border: 1px solid #ddd;
    }

    table th {
        background-color: #FC6B40;
        color: #fff;
        font-weight: 600;
    }

    table td {
        background-color: #f8f9fa;
    }

    table tr:nth-child(even) td {
        background-color: #f1f1f1;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-sm th,
    .table-sm td {
        padding: 10px;
        font-size: 13px;
    }

    .text-center {
        text-align: center;
    }

    .form-section {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    hr {
        border: 1px solid #ddd;
        margin-top: 30px;
    }

    /* Индикатор загрузки */
    .loading {
        display: none;
        text-align: center;
        font-size: 18px;
        color: #FC6B40;
    }

</style>

</body>
