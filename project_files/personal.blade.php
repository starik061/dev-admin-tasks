@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="personal">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <h1 class="title">@lang('message.profile')</h1>
          @if($upd)
          <span class="success-message">
          		@lang('message.upd_succes')
          		@if($psw)
          		<br>@lang('message.upd_psw')
          		@endif
          </span>
          @endif
          <div class="personal-block">
          	<form action="{{$data['lang_url']}}/personal" method="POST">
          		@csrf
          		<span class="h2">@lang('message.contact_face')</span>
          		<div class="field-container">
          			<div class="input-block">
          				<label>@lang('message.fio')</label>
          				<input type="text" name="name" value="{{$user->name}}" @if(@$errors['name']) class="error" @endif required/>
          				@if($errors['name'])
          				<span>{{$errors['name']}}</span>
          				@endif
          			</div>
          			<div class="input-block">
          				<label>E-mail</label>
          				<input type="email" name="email" value="{{$user->email}}" @if(@$errors['email']) class="error" @endif required />
          				@if($errors['email'])
          				<span>{{$errors['email']}}</span>
          				@endif
          			</div>
          			<div class="input-block">
          				<label>@lang('message.phone')</label>
          				<input type="text" name="phone" value="{{$user->phone}}" @if(@$errors['phone']) class="error" @endif required />
          				@if($errors['phone'])
          				<span>{{$errors['phone']}}</span>
          				@endif
          			</div>
          		</div>
          		<a class="change-password">@lang('message.change_password')</a>
          		<div class="field-container @if(!$errors['password'] && !$errors['password_old'] && !$errors['password_confirmation']) hide @endif password-block">
          			<div class="input-block">
          				<label>@lang('message.password_old')</label>
          				<input type="password" name="password_old" value="" class="password"/>
          				<i class="password_show"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg></i>
          				<i class="password_hide"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z"/></svg></i>
          				@if($errors['password_old'])
          				<span>{{$errors['password_old']}}</span>
          				@endif
          			</div>
          			<div class="input-block">
          				<label>@lang('message.password_new')</label>
          				<input type="password" name="password" value="" class="password"/>
          				<i class="password_show"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg></i>
          				<i class="password_hide"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z"/></svg></i>
          				@if($errors['password'])
          				<span>{{$errors['password']}}</span>
          				@endif
          			</div>
                    <div class="input-block">
          				<label>@lang('message.confirm_password')</label>
          				<input type="password" name="password_confirmation" value="" class="password"/>
          				<i class="password_show"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg></i>
          				<i class="password_hide"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.885 14.988l3.104-3.098.011.11c0 1.654-1.346 3-3 3l-.115-.012zm8.048-8.032l-3.274 3.268c.212.554.341 1.149.341 1.776 0 2.757-2.243 5-5 5-.631 0-1.229-.13-1.785-.344l-2.377 2.372c1.276.588 2.671.972 4.177.972 7.733 0 11.985-8.449 11.985-8.449s-1.415-2.478-4.067-4.595zm1.431-3.536l-18.619 18.58-1.382-1.422 3.455-3.447c-3.022-2.45-4.818-5.58-4.818-5.58s4.446-7.551 12.015-7.551c1.825 0 3.456.426 4.886 1.075l3.081-3.075 1.382 1.42zm-13.751 10.922l1.519-1.515c-.077-.264-.132-.538-.132-.827 0-1.654 1.346-3 3-3 .291 0 .567.055.833.134l1.518-1.515c-.704-.382-1.496-.619-2.351-.619-2.757 0-5 2.243-5 5 0 .852.235 1.641.613 2.342z"/></svg></i>
          				@if($errors['password_confirmation'])
          				<span>{{$errors['password_confirmation']}}</span>
          				@endif
          			</div>
          		</div>
                @if(Auth::user()->role_id == 4)
          		<div class="hr"></div>
          		<span class="h2">@lang('message.reg_type')</span>
          		<div class="field-container">
          			<div class="input-block">
          				<label>@lang('message.reg_type')</label>
          				<select name="type_reg" class="al-dropdown">
          					<option value="0" @if(!$user->type_reg) selected @endif>@lang('message.fl')</option>
          					<option value="1" @if($user->type_reg) selected @endif>@lang('message.ul')</option>
          				</select>
          			</div>
          			<div class="input-block">
          				<label>@lang('message.company_name')</label>
          				<input type="text" name="company" value="{{$user->company}}" @if(@$errors['company']) class="error" @endif placeholder="@lang('message.company_placeholder')" />
          				@if($errors['company'])
          				<span>{{$errors['company']}}</span>
          				@endif
          			</div>
          			<div class="input-block">
          				<label>@lang('message.inn')</label>
          				<input type="text" name="inn" value="{{$user->inn}}" @if(@$errors['inn']) class="error" @endif placeholder="@lang('message.inn_placeholder')" />
          				@if($errors['inn'])
          				<span>{{$errors['inn']}}</span>
          				@endif
          			</div>
          		</div>
          		<div class="field-container">
          			<div class="input-block">
          				<label>@lang('message.nds_title')</label>
          				<div class="form_toggle">
										<div class="form_toggle-item item-1">
											<input id="fid-1" type="radio" name="nds" value="1" @if($user->nds) checked @endif>
											<label for="fid-1">@lang('message.yes')</label>
										</div>
										<div class="form_toggle-item item-2">
											<input id="fid-2" type="radio" name="nds" value="0" @if(!$user->nds) checked @endif>
											<label for="fid-2">@lang('message.no')</label>
										</div>
									</div>
          			</div>
          		</div>
                @endif
          		<div class="hr"></div>
          		<div class="field-container right">
          			<div class="buttons-block">
          				<a href="" class="cancel">@lang('message.cancel')</a>
          				<button class="submit">
          					@lang('message.save')
          				</button>
          			</div>
          		</div>
          	</form>
          </div>
        </div>
      </div>
    </div>
  </section>
<style type="text/css">
.container-base{
	max-width: 1050px;
}
.personal-block .h2{
	font-size: 24px;
	line-height:  28px;
	margin-bottom: 14px;
	display: block;
}
.field-container{
	/*border-bottom: solid 1px #e6e9ec;*/
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
}	
.field-container.hide{
	display: none;
}
.personal-block .input-block{
	margin-right: 15px;
	margin-bottom: 15px;
	position: relative;
}
.personal-block .input-block:nth-child(3n){
	margin-right: 0;
}
.personal-block .input-block label{
	display: block;
	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: 500;
	font-size: 13px;
	line-height: 16px;
	color: #ADB0B9;
	margin-bottom: 5px;
}
.personal-block .input-block input{
	background: #F6F7F9;
	border: 1px solid #CDD4D9;
	box-sizing: border-box;
	border-radius: 3px;
	width: 340px;
	height: 42px;

	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: 500;
	font-size: 13px;
	line-height: 16px;
	color: #3D445C;

	padding: 0 11px;
}
.change-password{
	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: normal;
	font-size: 14px;
	line-height: 24px;
	color: #FC6B40 !important;
	display: block;
	margin-bottom: 15px;
	cursor: pointer;
    text-decoration: underline !important;
}
.change-password:hover,
.change-password:visited{
    color: #FC6B40 !important;
    text-decoration: underline !important;
}
.hr{
	margin: 5px 0 25px;
	border-bottom: solid 1px #e6e9ec;
	width: 100%;
}
/*select {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;       
	background-image: url(/assets/img/dwn.png) ;   
	background-repeat: no-repeat;
	background-position: right center;
	background-color: #F6F7F9;
	border: 1px solid #CDD4D9;
	box-sizing: border-box;
	border-radius: 3px;

	padding:  0 20px 0 11px;
	width: 340px;
	height: 42px;

	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: 500;
	font-size: 13px;
	line-height: 16px;
	color: #3D445C;
}*/
.select2-container{
	border: 1px solid #CDD4D9;
	box-sizing: border-box;
	border-radius: 3px;

	padding:  0 20px 0 11px;
	width: 340px;
	/*height: 42px;*/

	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: 500;
	font-size: 13px;
	line-height: 16px;
	color: #3D445C;
	background: #F6F7F9;
}
.select2-selection__rendered{
	height:  40px;
	background: #F6F7F9;
}
.select2-container--default .select2-selection--single{
	width: 100%;
	height: 40px !important;
	border: none !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
	padding: 0 !important;
}
.field-container.right{
	justify-content: flex-end;
}
.buttons-block{
	text-align: right;
	padding-bottom: 15px;
}
.cancel{
	display: inline-block;
	border: 1px solid #CDD4D9;
	box-sizing: border-box;
	border-radius: 4px;
	width:  97px;
	height:  42px;
	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: bold;
	font-size: 13px;
	line-height: 42px;
	text-align: center;
	margin-right: 12px;
}
.submit{
	width: 108px;
	height:  42px;
	box-sizing: border-box;
	border-radius: 4px;
	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: bold;
	font-size: 13px;
	line-height: 42px;
	text-align: center;
	color:  #fff;
	background: #FC6B40;
	border: none;
}
.personal-block .input-block input.error{
	border-color: #FC6B40;
}
.input-block span{
	color: #FC6B40;
	line-height: 25px;
	display: block;
}
.success-message{
	margin: 10px 0;
	widht:  100%;
	display: block;
	padding:  15px;
	border:  solid 1px #5cbc59;
	background: #9adf68;

	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: 500;
	font-size: 13px;
	line-height: 16px;
	color: #444444;
}
.password{

}
.password_show{
	position: absolute;
	right: 10px;
	top:  30px;
	widht:  20px;
	cursor: pointer;
	display: none;
}
.password_hide{
	position: absolute;
	right: 10px;
	top:  30px;
	widht:  20px;
	cursor: pointer;
	display: none;
}
.password_show svg,
.password_hide svg{
	width: 20px;
	opacity: 0.3;
}
@media screen and (max-width: 820px){
    .personal-block{
        padding: 0 20px;
    }
    h1.title{
        padding: 0 20px;
    }
    .personal-block .input-block:nth-child(3n){
	   margin-right: 15px;
    }
    .personal-block .input-block:nth-child(2n){
	   margin-right: 0px;
    }
}
@media screen and (max-width: 560px){
    .personal-block{
        padding: 0 30px;
    }
    h1.title{
        padding: 0 30px;
    }
}
@media screen and (max-width: 375px){
    .personal-block{
        padding: 0 15px;
    }
    h1.title{
        padding: 0 15px;
    }
}

/* RADIO STYLE */
.form_toggle {
	display: inline-block;
	overflow: hidden;
}
.form_toggle-item {
	float: left;
	display: inline-block;
}
.form_toggle-item input[type=radio] {
	display: none;
}
.personal-block .input-block .form_toggle-item label {
	display: inline-block;
	padding: 0px/* 15px*/;   
	line-height: 42px;    
	border: 1px solid #CDD4D9;
	border-right: none;
	cursor: pointer;
	user-select: none; 
	width: 90px;  
	height: 42px;
	box-sizing: border-box;
	background: #fff;

	font-family: Helvetica Neue;
	font-style: normal;
	font-weight: 500;
	font-size: 13px;
	text-align: center;
	color: #3D445C;

}
 
.form_toggle .item-1 label {
	border-radius: 4px 0 0 4px;
}
.form_toggle .item-2 label {
	border-radius: 0 4px 4px 0;
	border-right: 1px solid #CDD4D9 !important;
}
 
/* Checked */
.form_toggle .item-1 input[type=radio]:checked + label {
	background: #FFD0EC;
    border: 1px solid #FC6B40;
}
.form_toggle .item-2 input[type=radio]:checked + label {
	background: #FFD0EC;
    border: 1px solid #FC6B40;
    border-right: 1px solid #FC6B40 !important;
}
</style>
@include('add.footer')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.change-password').click(function(){
		$('.password-block').toggleClass('hide');
	});
	$('.al-dropdown').select2({
		placeholder: 'Выберите',
		minimumResultsForSearch: -1,
		width: null,
	});
	$('.password_show').click(function(){
		$(this).parent().find('input').attr('type','text');
		$(this).hide();
		$(this).parent().find('.password_hide').show()
	});
	$('.password_hide').click(function(){
		$(this).parent().find('input').attr('type','password');
		$(this).hide();
		$(this).parent().find('.password_show').show()
	});
	$('.password').keyup(function(){
		if($(this).val().length > 0){
			if($(this).attr('type') == 'password'){
				$(this).parent().find('.password_show').show();
			}else{
				$(this).parent().find('.password_hide').show();
			}
		}else{
			$(this).parent().find('.password_show').hide();
			$(this).parent().find('.password_hide').hide();
		}
	})
})
</script>