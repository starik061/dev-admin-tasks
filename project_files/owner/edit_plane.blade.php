@include('add.head')

<body>
  @if(App::getLocale() == 'ua')
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz2s29ChsjKNAecWarcoSx76by6WDSiXw&region=UA&language=uk&libraries=places,drawing"></script>
  @else
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz2s29ChsjKNAecWarcoSx76by6WDSiXw&language=ru&libraries=places,drawing"></script>
  @endif
  @include('add.header')
  @include('add.menu')
<!-- BOARD (START) -->
  @include('add.bread')
<style>
	.direction-wrapper{
		width: 100%;
		padding: 24px;
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.dir{
		width: 30px;
		position: relative;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		cursor: pointer;
	}
	.dir input{
		position: absolute;
		width: 100%;
		height: 100%;
		opacity: 0;
		cursor: pointer;
	}
	.dir input[type="checkbox"]:checked ~ svg{
		fill:#f76a47;
		transition: all .3s ease;
		/* background:#f76a47; */
	}
	.dir svg{
		pointer-events: none;
		fill: #8a8a8a;
		transition: all .3s ease;
		/* margin-bottom: 12px; */
	}
	.dir.up svg{
		transform: rotate(-90deg)
	}
	.dir.up-right svg{
		transform: rotate(-45deg)
	}
	.dir.down-right svg{
		transform: rotate(45deg)
	}
	.dir.down svg{
		transform: rotate(90deg)
	}
	.dir.down-left svg{
		transform: rotate(125deg)
	}
	.dir.left svg{
		transform: rotate(180deg)
	}
	.dir.up-left svg{
		transform: rotate(225deg)
	}
    #board-detail .buy-section.info-price-board .location > .info::after{
        background:none;
    }
</style>
@php
$firm = DB::table('firms')->where('id',$board->firm)->first();
@endphp
  <section id="board-detail">
    <div class="container-fluid container-fluid-base container-fluid-board-detail">
      <div class="row no-gutters">
        <div class="container container-base container-board-detail">
          <div class="row no-gutters">
            @if($upd)
                <div class="upd_info" style="padding: 10px; background:#99ff99; width: 100%; margin-top: 17px;">
                {{$upd}}
                </div>
            @endif
            <div class="buy-section info-price-board">
              <div class="location">
                <h1 class="info">Редактирование: {{ $board->id }} - {{ $board->addr }}</h1>
              </div> 
            </div>
<form method="POST" enctype="multipart/form-data" style="width: 100%;" onsubmit="fedit_submit(this)">
<input type="hidden" name="action" value="save"/>
            <div id="map-edit" style="height: 500px;"></div>
            Широта: <input type='text' name='x' value='{{$board->x}}' />
		    Долгота: <input type='text' name='y' value='{{$board->y}}' />
            <input type='hidden' name='lat' value='{{$board->x}}' />
		    <input type='hidden' name='lng' value='{{$board->y}}' />
            <span class="coords-editor">
                @if($boards->coords_by_site)
                     Пользовательские
                @else
                    @if($board->link)
                        Outdoor
                    @else
                        @if($firm->coords_in_file)
                            Из файла
                        @else
                            @if($firm->adv_link)
                            ADV
                            @endif
                        @endif
                    @endif
                @endif
            </span>

			<div class="direction-wrapper">
				<div class="dir up">
					<input type="checkbox" name="direction[]" value="up" @if(in_array("up",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir up-right">
					<input type="checkbox" name="direction[]" value="up-right" @if(in_array("up-right",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir right">
					<input type="checkbox" name="direction[]" value="right" @if(in_array("right",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir down-right">
					<input type="checkbox" name="direction[]" value="down-right" @if(in_array("down-right",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>

				</div>
				<div class="dir down">
					<input type="checkbox" name="direction[]" value="down" @if(in_array("down",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir down-left">
					<input type="checkbox" name="direction[]" value="down-left" @if(in_array("down-left",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir left">

					<input type="checkbox" name="direction[]" value="left" @if(in_array("left",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir up-left">
					<input type="checkbox" name="direction[]" value="up-left" @if(in_array("up-left",$board->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
			</div>



            <div class="p-t-b">
@php
$edited = $board->updated_by_user_date;
if($edited){
    $edited = date("d.m.Y H:i:s", strtotime($edited));
}
@endphp            
              <!-- property-this-board-->
              <p class="p-h">@lang('message.parametrs') @if($board->updated_by_user) <span style="color: #f76a47;">(редактировалось пользователем@if($edited) - {{$edited}}@endif)</span>@endif</p>
              <!-- property-header-->
              <div class="p-t">
                <!-- property-table-->
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.plane_code2')</div>
                  <div class="p-t__td">
                    <input type="text" name="code" value="{{ $board->code }}" style="width: 100%;" required/>
                  </div>
                </div>
                 <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.site_code2')</div>
                  <div class="p-t__td">
                    <p>{{ $board->id}}</p>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">Активна</div>
                  <div class="p-t__td">
                    <select name="active">
                        <option value="true" @if(App\Helpers\BoardConstants::ACTIVE == $board->active) selected @endif >да</option>
                        <option value="false" @if(App\Helpers\BoardConstants::INACTIVE == $board->active) selected @endif >нет</option>
                    </select>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.type')</div>
                  <div class="p-t__td">
                    <select name="type" style="width: 100%;">
                        @foreach($type as $k => $v)
                            <option value="{{$v->type}}" @if($v->type == $board->type) selected @endif >{{$v->title}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">Сторона</div>
                  <div class="p-t__td">
                    {{--<input type="text" name="side_type" value="{{$board->side_type}}" style="width: 100%;"/>--}}
                    {{--$board->side_type--}}
                    <select name="side_type" style="width: 100%;">
                        @foreach($sides as $k => $v)
                            <option value="{{$v}}" @if($v == $board->side_type) selected @endif >{{$v}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.light')</div>
                  <div class="p-t__td">
                    <select name="light" style="width: 100%;">
                        <option value="{{App\Helpers\BoardConstants::LIGHT_ON}}" @if($board->light === App\Helpers\BoardConstants::LIGHT_ON) selected="selected" @endif >Да</option>
                        <option value="{{App\Helpers\BoardConstants::LIGHT_OFF}}" @if($board->light === App\Helpers\BoardConstants::LIGHT_OFF) selected="selected" @endif >Нет</option>
                    </select>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.city')</div>
                  <div class="p-t__td">                      
                     <select name="city" style="width: 100%;">
                        @foreach($cities as $k => $v)
                            <option value="{{$v->id}}" @if($v->id == $board->city) selected @endif >{{$v->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.address')</div>
                  <div class="p-t__td">                      
                    <input type="text" name="addr" value="{{$board->addr}}" style="width: 100%;" required/>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.format2')</div>
                  <div class="p-t__td">                      
                    <input type="text" name="format" value="{{$board->format}}" style="width: 100%;"/>
                  </div>
                </div>
                @if(Auth::user()->id == 202)
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.address') UA</div>
                  <div class="p-t__td">                      
                    <input type="text" name="addr_ua" value="{{$board->addr_ua}}" style="width: 100%;" disabled=""/>
                  </div>
                </div>
                @endif
                
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.gid')</div>
                  <div class="p-t__td">                      
                    <textarea name="guide" style="width: 100%;">{{$board->guide}}</textarea>
                  </div>
                </div>
                
                <div class="p-t__tr">
                  <div class="p-t__td">@lang('message.price')</div>
                  <div class="p-t__td">                      
                    <input type="text" name="price" value="{{$board->price}}" style="width: 100%;"/>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">Фото</div>
                  <div class="p-t__td"> 
                    @if($board->image)
                    <a href="/upload/{{$board->image}}" target="_blank"><img src="/upload/{{$board->image}}" height="30"/></a>
                    @endif                     
                    <input type="file" name="image"/>
                  </div>
                </div>
                <div class="p-t__tr">
                  <div class="p-t__td">Схема</div>
                  <div class="p-t__td">
                    @if($board->scheme)
                    <a href="/upload/{{$board->scheme}}" target="_blank"><img src="/upload/{{$board->scheme}}" height="30"/></a>
                    @endif                                         
                    <input type="file" name="scheme"/>
                  </div>
                </div>
              </div>
              <br />
              <div style="text-align: right;">
              <a href="/{{$board->aleas}}" class="btn btn-style-cancel" style="padding: 1px 36px;">Отмена</a>
              <input type="submit" value="Сохранить" class="btn btn-style" style="padding: 1px 36px;"/>
              </div>
              
            </div>
</form>
<script type="text/javascript">
//48.2485445,26.692236
var center = [{{$board->x}}, {{$board->y}}];
@if($board->x == 0 && $board->y == 0)
center = [ 48.808278799236525, 31.822851234374987 ];
@endif    
var coords = center;
var board_exist = true;
var board_data = {!!$board->toJSON()!!}

position = { lat: parseFloat(center[0]), lng: parseFloat(center[1]) };
    function GmapEdit(){
        console.log("run");
        var zoom = 10;
        @if($board->x == 0 && $board->y == 0)
        zoom = 6;
        @endif
        /*if{{$board->x}} === 0 && {{$board->y}} === 0){
            zoom = 1
            console.log(zoom);
        }*/
        document.EGmap = new google.maps.Map(document.getElementById('map-edit'), {
          zoom: zoom,
          maxZoom: 20,
          center: position
        });
        
        switch(board_data.type){
            case 'board': 
            case 'prism':
            case 'backlight':
            case 'citylight':
            case 'pillar':
            case 'custom':
            case 'firewall':
            case 'banner':
            case 'scroler':
            case 'elite_panel':
            case 'videoboard':
                //img = '/images/markers/'+board_data.type+'.png'; 
                img = '/assets/img/map_marks/'+board_data.type+'.svg';
            break;
            default:
                img = '/images/markers/board.png'; 
            break;
        }
        //console.log(img);
        //console.log(document.EGmap);
        if(board_data.x && board_data.y){
            marker = new google.maps.Marker({
                position: position,
                map: document.EGmap,
                icon: img,
                draggable: true 
            });
            document.myMarker = marker;
            document.myMarker.infowin = new google.maps.InfoWindow({
                content: '<div class="mark-del">Удалить</div>'
            });
            document.myMarker.addListener('drag',function(event) {
                coords[0] = event.latLng.lat();
                coords[1] = event.latLng.lng();
                $('[name=x]').val(coords[0]);
                $('[name=y]').val(coords[1]);
                
            }); 
            document.myMarker.addListener('click', function() {
                this.infowin.open(this.map, this);
            });
            //console.log("mymarker");
        }
        //console.log(document.myMarker);
        document.EGmap.addListener('click', function(e) {
            if(document.myMarker){
                document.myMarker.setPosition(e.latLng);
                coords[0] = e.latLng.lat();
                coords[1] = e.latLng.lng();
            }else{
                coords[0] = e.latLng.lat();
                coords[1] = e.latLng.lng();
                marker = new google.maps.Marker({
                    map: document.EGmap,
                    icon: img,
                    draggable: true 
                });
                document.myMarker = marker;
                document.myMarker.setPosition(e.latLng);
                document.myMarker.infowin = new google.maps.InfoWindow({
                    content: '<div class="mark-del">Удалить</div>'
                });
                document.myMarker.addListener('drag',function(event) {
                    coords[0] = event.latLng.lat();
                    coords[1] = event.latLng.lng();
                    $('[name=x]').val(coords[0]);
                    $('[name=y]').val(coords[1]);
                }); 
                document.myMarker.addListener('click', function() {
                    this.infowin.open(this.map, this);
                });
            }
        });
    }

function fedit_submit(f)
{
	f.x.value = coords[0];
	f.y.value = coords[1];
    f.lat.value = coords[0];
	f.lng.value = coords[1];
}
</script>            
<style>
.btn-style-cancel{
    height: 45px;
    line-height:41px;
    border: 1px solid #dee5ec
}
</style>            
            
            
          </div>
        </div>
      </div>
    </div>
  </section>  
<!-- BOARD (END) -->
@include('add.footer')
