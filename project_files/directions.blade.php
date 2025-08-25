@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
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
    .dir input[type="radio"]:checked ~ svg{
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
    .btn-save{
        height: 29px;
        /* padding: 0 26px; */
        font-size: 13px;
        line-height: 27px;
        max-width: 96px;
        width: 96px;
    }
    .btn-saved{
        background-color: #55bc4f!important;
        cursor: default!important;
        opacity: 1!important;
    }
</style>
<script src="/assets/js/jquery/jquery.js"></script>

  @include('add.bread')
  <section class="" id="result-search-list">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base container-search-result manager-search show-list">
          <h1 class="title">Направления</h1>
          <div class="result-list">
              <div class="table-result">
                  <div class="thead">
                    <div class="tr">
                        <div class="td">ID</div>
                        <div class="td">Маркер</div>
                        <div class="td">Направление</div>
                        <div class="td">&nbsp;</div>
                    </div>
                  </div>
                  <div class="tbody">
                    @foreach($imgs as $k => $v)
                    <div class="tr">
                      <div class="td">{{$v->id}}</div>
                      <div class="td"><img src="{{$v->image}}"/></div>
                      <div class="td">
                      
                      
            <div class="direction-wrapper">        
				<div class="dir up">
					<input type="radio" name="direction_{{$v->id}}[]" value="up" id="" @if(in_array("up",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir up-right">
					<input type="radio" name="direction_{{$v->id}}[]" value="up-right" id="" @if(in_array("up-right",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir right">
					<input type="radio" name="direction_{{$v->id}}[]" value="right" id="" @if(in_array("right",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir down-right">
					<input type="radio" name="direction_{{$v->id}}[]" value="down-right" id="" @if(in_array("down-right",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>

				</div>
				<div class="dir down">
					<input type="radio" name="direction_{{$v->id}}[]" value="down" id="" @if(in_array("down",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir down-left">
					<input type="radio" name="direction_{{$v->id}}[]" value="down-left" id="" @if(in_array("down-left",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir left">

					<input type="radio" name="direction_{{$v->id}}[]" value="left" id="" @if(in_array("left",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
				<div class="dir up-left">
					<input type="radio" name="direction_{{$v->id}}[]" value="up-left" id="" @if(in_array("up-left",$v->direction)) checked @endif>
					<svg class="arrow-left-4" viewBox="0 0 100 85" width="24" height="24">
					  <polygon points="58.263,0.056 100,41.85 58.263,83.641 30.662,83.641 62.438,51.866 0,51.866 0,31.611 62.213,31.611 30.605,0 58.263,0.056" />
					</svg>
					
				</div>
			</div>
            
            
                      </div>
                      <div class="td">
                        <button class="btn btn-style btn-save" data-id="{{$v->id}}">Сохранить</button>
                      </div>
                    </div>
                    @endforeach
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script>
$(document).ready(function(){
    $('.btn-save').click(function(){
        var id = $(this).data('id');
        var dir = $(this).parent().parent().find('input:checked').val();
        if(typeof dir != 'undefined'){
            $(this).addClass('btn-saved');
            $.post(
                '/direction_img',
                {
                    'id': id,
                    'direction': dir
                },
                function(data){
                    
                }
            )
        }   
    });
});
</script>

@include('add.footer')