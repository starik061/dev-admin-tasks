@include('add.head')

<body>

@include('add.header')
@include('add.menu')
<!-- BOARD (START) -->
@include('add.bread')

<div class="container-fluid container-fluid-base container-fluid-board-detail">
    <div class="row no-gutters">
        <div class="container container-base container-board-detail">
            <div class="row no-gutters" style="position:relative;" id="editor-block">
                <div class="buy-section info-price-board">
                    <div class="location">
                        <h1 class="info">Редактирование границ района</h1>
                        <div class="field-container">
                            <div class="input-block">
                                <label>Город</label>
                                <select name="city_id">
                                    <option>-</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->alias}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-block">
                                <label>Район</label>
                                <select name="district_id">
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="map-global-search" style="height: 500px; width: 100%"></div>
                <a class="btn btn-style save-district"
                   style="padding: 2px 36px; margin-left: 810px; margin-top: 20px; margin-bottom: 20px; display: inline-block"
                   href="#">
                    @lang('message.save')
                </a>
            </div>
        </div>
    </div>
</div>
@include('add.footer')
<script>
    let districtPolygons = [];
    let bounds = null;
    $('.save-district').click(function(){
        if($('[name=district_id]').val()){
            $.post(
                '/districts/'+$('[name=district_id]').val(),
                {
                    'bounds': JSON.stringify(districtPolygons)
                },
                function() {
                    toastr.success('Район обновлен успешно')
                }
            );
        }
    })
    $('[name="city_id"]').change(function(){
        $.post(
            '/api/get/districts/by-city',
            {
                'alias': $(this).val()
            },
            function(data){
                if(data.districts.length){
                    let optionsText =  '<option>-</option>';
                    data.districts.forEach(function(el){
                        optionsText += `<option value='${el.id}'>${el.name}</option>`;
                    })
                    $('[name=district_id]').empty().append(optionsText).select2();
                }
            }
        )
    }).select2();
    $('[name=district_id]').change(function(){
        $.get(
            '/api/get/districts/'+$(this).val(),
            function(data){
                drawedFigures.forEach(figure => figure.setMap(null))
                markersPolyArr = [];
                drawedFigures = [];
                polyDrawed = false;
                circleDrawed = false;
                drawingManager.setDrawingMode(null);
                $('#selRadius').removeClass('visible');
                $('#selRadius span').text('');
                $.getJSON('/assets/districts/'+data.id+'.geojson?t='+Math.random(), function(result){
                    bounds = new google.maps.Polygon({
                        paths: result.geometry.coordinates,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#FF0000",
                        fillOpacity: 0.35,
                    });
                    bounds.setMap(googleMap);
                });
            }
        );
    }).select2();
</script>