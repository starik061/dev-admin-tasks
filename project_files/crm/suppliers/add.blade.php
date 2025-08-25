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
          <h1 class="title">{{ $data['seo']->h1_title }}</h1>
          <h2>@lang('message.photo_')</h2>
          <div class="field-container">
            <div class="photo-container">
              <div class="photo">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="120" height="120" rx="60" fill="#FFF0EC"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M71.9655 36.223C71.5466 36.1144 71.0724 36.1042 70.3334 36.1042H52.2501C51.9019 36.1042 50.9266 36.1042 49.9494 36.1263C49.4595 36.1374 48.9845 36.1536 48.5952 36.177C48.1999 36.2007 48.0156 36.2258 47.9826 36.2303C47.9783 36.2308 47.9766 36.2311 47.9772 36.2309L47.9689 36.2329C47.6271 36.3138 47.3149 36.489 47.0676 36.7385C46.8204 36.988 46.6481 37.3018 46.5702 37.6443C46.5659 37.6634 46.5613 37.6823 46.5564 37.7013C46.4478 38.1201 46.4376 38.5943 46.4376 39.3333V83.8959H73.5626V39.3333C73.5626 38.602 73.5535 38.1149 73.4396 37.6591L73.4337 37.6356C73.3528 37.2938 73.1778 36.9815 72.9283 36.7343C72.6788 36.487 72.3649 36.3147 72.0224 36.2369C72.0034 36.2325 71.9844 36.2279 71.9655 36.223ZM72.9097 32.4648C71.979 32.2283 71.0544 32.2288 70.4071 32.2292C70.3821 32.2292 70.3575 32.2292 70.3334 32.2292H52.2501C51.8988 32.2292 50.8849 32.2292 49.8619 32.2523C49.3508 32.2638 48.8216 32.2814 48.3632 32.309C47.9614 32.3331 47.4478 32.3724 47.0679 32.4641L47.5225 34.3475L47.0762 32.4621C46.0291 32.71 45.0726 33.2466 44.3152 34.0109C43.5648 34.7682 43.0396 35.7189 42.7982 36.757C42.5616 37.6877 42.5622 38.6124 42.5625 39.2597C42.5625 39.2846 42.5626 39.3092 42.5626 39.3333V85.8334C42.5626 86.9034 43.43 87.7709 44.5001 87.7709H75.5001C76.5701 87.7709 77.4376 86.9034 77.4376 85.8334V39.3333C77.4376 39.3111 77.4376 39.2885 77.4376 39.2656C77.4379 38.608 77.4383 37.6845 77.2018 36.731C76.9527 35.6886 76.4173 34.7364 75.6559 33.9818C74.8986 33.2314 73.9478 32.7062 72.9097 32.4648Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M39.2598 58.0625C39.2848 58.0625 39.3094 58.0626 39.3335 58.0626H44.5002C45.5703 58.0626 46.4377 58.93 46.4377 60.0001V85.8334C46.4377 86.9034 45.5703 87.7709 44.5002 87.7709H39.3335C35.4218 87.7709 32.2294 84.5784 32.2294 80.6667V65.2C32.2014 64.3446 32.2759 63.4889 32.4514 62.6512C32.4576 62.6213 32.4646 62.5917 32.4722 62.5622C32.7236 61.5927 33.2082 60.6212 33.9852 59.8442C34.7817 59.0477 35.7493 58.5594 36.729 58.3054C37.6692 58.0616 38.606 58.0622 39.2598 58.0625ZM39.3335 61.9376C38.5945 61.9376 38.1203 61.9478 37.7014 62.0564C37.2861 62.1641 36.9621 62.3474 36.7252 62.5842C36.5272 62.7823 36.3457 63.0884 36.2342 63.4934C36.1277 64.0208 36.0837 64.5589 36.1031 65.0967C36.104 65.12 36.1044 65.1434 36.1044 65.1667V80.6667C36.1044 82.4383 37.5619 83.8959 39.3335 83.8959H42.5627V61.9376H39.3335Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M80.6334 50.3125C81.4888 50.2845 82.3445 50.359 83.1822 50.5345L82.785 52.4308L83.2712 50.5553C84.2407 50.8067 85.2122 51.2913 85.9892 52.0683C86.7857 52.8648 87.274 53.8325 87.528 54.8121C87.7717 55.7521 87.7712 56.6639 87.7709 57.3411C87.7708 57.3666 87.7708 57.3918 87.7708 57.4167V80.6667C87.7708 82.5508 87.0224 84.3578 85.6901 85.6901C84.3578 87.0224 82.5508 87.7708 80.6667 87.7708H75.5C74.4299 87.7708 73.5625 86.9034 73.5625 85.8333V52.25C73.5625 51.18 74.4299 50.3125 75.5 50.3125H80.6334ZM82.34 54.3173C81.8126 54.2108 81.2745 54.1668 80.7367 54.1862C80.7134 54.1871 80.69 54.1875 80.6667 54.1875H77.4375V83.8958H80.6667C81.5231 83.8958 82.3444 83.5556 82.95 82.95C83.5556 82.3444 83.8958 81.5231 83.8958 80.6667V57.4167C83.8958 56.6541 83.8858 56.2042 83.777 55.7846C83.6693 55.3692 83.486 55.0452 83.2491 54.8084C83.0511 54.6104 82.745 54.4289 82.34 54.3173Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8955 44.5C52.8955 43.4299 53.763 42.5625 54.833 42.5625H65.1663C66.2364 42.5625 67.1038 43.4299 67.1038 44.5C67.1038 45.5701 66.2364 46.4375 65.1663 46.4375H54.833C53.763 46.4375 52.8955 45.5701 52.8955 44.5Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8955 54.8334C52.8955 53.7633 53.763 52.8959 54.833 52.8959H65.1663C66.2364 52.8959 67.1038 53.7633 67.1038 54.8334C67.1038 55.9034 66.2364 56.7709 65.1663 56.7709H54.833C53.763 56.7709 52.8955 55.9034 52.8955 54.8334Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8955 65.1666C52.8955 64.0966 53.763 63.2291 54.833 63.2291H65.1663C66.2364 63.2291 67.1038 64.0966 67.1038 65.1666C67.1038 66.2367 66.2364 67.1041 65.1663 67.1041H54.833C53.763 67.1041 52.8955 66.2367 52.8955 65.1666Z" fill="#FC6B40"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M52.8955 75.5C52.8955 74.4299 53.763 73.5625 54.833 73.5625H65.1663C66.2364 73.5625 67.1038 74.4299 67.1038 75.5C67.1038 76.5701 66.2364 77.4375 65.1663 77.4375H54.833C53.763 77.4375 52.8955 76.5701 52.8955 75.5Z" fill="#FC6B40"/>
                </svg>
              </div>
              <div class="photo-actions">
                <a class="pointer btn upload-photo">@lang('message.upload_a_photo')</a>
                <a class="pointer delete-photo">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 4.5C1.6875 4.18934 1.93934 3.9375 2.25 3.9375H15.75C16.0607 3.9375 16.3125 4.18934 16.3125 4.5C16.3125 4.81066 16.0607 5.0625 15.75 5.0625H2.25C1.93934 5.0625 1.6875 4.81066 1.6875 4.5Z" fill="#FC6B40"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 2.0625C7.25136 2.0625 7.0129 2.16127 6.83709 2.33709C6.66127 2.5129 6.5625 2.75136 6.5625 3V3.9375H11.4375V3C11.4375 2.75136 11.3387 2.5129 11.1629 2.33709C10.9871 2.16127 10.7486 2.0625 10.5 2.0625H7.5ZM12.5625 3.9375V3C12.5625 2.45299 12.3452 1.92839 11.9584 1.54159C11.5716 1.1548 11.047 0.9375 10.5 0.9375H7.5C6.95299 0.9375 6.42839 1.1548 6.04159 1.54159C5.6548 1.92839 5.4375 2.45299 5.4375 3V3.9375H3.75C3.43934 3.9375 3.1875 4.18934 3.1875 4.5V15C3.1875 15.547 3.4048 16.0716 3.79159 16.4584C4.17839 16.8452 4.70299 17.0625 5.25 17.0625H12.75C13.297 17.0625 13.8216 16.8452 14.2084 16.4584C14.5952 16.0716 14.8125 15.547 14.8125 15V4.5C14.8125 4.18934 14.5607 3.9375 14.25 3.9375H12.5625ZM4.3125 5.0625V15C4.3125 15.2486 4.41127 15.4871 4.58709 15.6629C4.7629 15.8387 5.00136 15.9375 5.25 15.9375H12.75C12.9986 15.9375 13.2371 15.8387 13.4129 15.6629C13.5887 15.4871 13.6875 15.2486 13.6875 15V5.0625H4.3125Z" fill="#FC6B40"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 7.6875C7.81066 7.6875 8.0625 7.93934 8.0625 8.25V12.75C8.0625 13.0607 7.81066 13.3125 7.5 13.3125C7.18934 13.3125 6.9375 13.0607 6.9375 12.75V8.25C6.9375 7.93934 7.18934 7.6875 7.5 7.6875Z" fill="#FC6B40"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 7.6875C10.8107 7.6875 11.0625 7.93934 11.0625 8.25V12.75C11.0625 13.0607 10.8107 13.3125 10.5 13.3125C10.1893 13.3125 9.9375 13.0607 9.9375 12.75V8.25C9.9375 7.93934 10.1893 7.6875 10.5 7.6875Z" fill="#FC6B40"></path>
                  </svg>
                </a>
                <input type="file" id="photo-file" name="logo"/>
              </div>
            </div>
          </div>
          <div class="hr"></div>
          <div class="lead-block-info">
            <form method="POST">
              @csrf
              <input type="hidden" name="client_logo"/>
              <h2>@lang('message.information_about_the_company')</h2>
              <div class="field-container">
                <div class="input-block">
                  <label>@lang('message.company_name2')</label>
                  <input type="text" name="name" value="{{ old('name') }}" required/>
                  @if($errors['name'])
                  <span class="error">{{ $errors['name'] }}</span>
                  @endif
                </div>
                {{--<div class="input-block">
                  <label>@lang('message.name')</label>
                  <input type="text" name="fio" value="{{ old('name') }}" required/>
                  @if($errors['fio'])
                  <span class="error">{{ $errors['fio'] }}</span>
                  @endif
                </div>
                --}}
                <div class="input-block wide-select">
                  <label>@lang('message.city')</label>
                  <select class="js-example-basic-multiple-- tagged-cities" name="cities[]" multiple="multiple" id="lead_cities">
                  @foreach($cities as $key => $item)
                    <option value="{{$item->id}}" >{{$item->name}}</option>
                  @endforeach
                  </select>
                  @if($errors['cities'])
                  <span class="error">{{ $errors['cities'] }}</span>
                  @endif
                </div>
                <div class="input-block mr15">
                  <label>E-mail</label>
                  <input type="text" name="email" value="{{ old('email') }}" />
                  @if($errors['email'])
                  <span class="error error-link">{!! $errors['email'] !!}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>@lang('message.phone')</label>
                  <input type="text" name="phone" id="lead_phone" value="{{ old('phone') }}" />
                  @if($errors['phone'])
                  <span class="error error-link">{!! $errors['phone'] !!}</span>
                  @endif
                </div>
                <div class="input-block mr0">
                  <label>@lang('message.site')</label>
                  <input type="text" name="site" id="lead_site" value="{{ old('site') }}"/>
                  @if($errors['site'])
                  <span class="error">{{ $errors['site'] }}</span>
                  @endif
                </div>
                <div class="input-block">
                  <div class="input-block">
                    <label>@lang('message.nds_title')</label>
                    <div class="form_toggle">
                      <div class="form_toggle-item item-1">
                        <input id="nds-1" type="radio" name="is_nds" value="1">
                        <label for="nds-1">@lang('message.yes')</label>
                      </div>
                      <div class="form_toggle-item item-2">
                        <input id="nds-0" type="radio" name="is_nds" value="0">
                        <label for="nds-0">@lang('message.no')</label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="hr"></div>
              <h2>@lang('message.contact_face')</h2>
              <div class="field-container">
                <div class="input-block">
                  <label>@lang('message.name')</label>
                  <input type="text" name="fio" value="{{ old('fio') }}" required/>
                  @if($errors['fio'])
                  <span class="error">{{ $errors['fio'] }}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>E-mail</label>
                  <input type="text" name="email2" value="{{ old('email2') }}"/>
                  @if($errors['email2'])
                  <span class="error">{{ $errors['email2'] }}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>@lang('message.phone')</label>
                  <input type="text" name="phone2" id="lead_phone" value="{{ old('phone2') }}" required/>
                  @if($errors['phone2'])
                  <span class="error">{{ $errors['phone2'] }}</span>
                  @endif
                </div>
                <div class="input-block">
                  <label>@lang('message.post')</label>
                  <select name="post_id" class="post-select-">
                  @foreach($posts as $key => $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach  
                  </select>
                </div>
                <div class="hr"></div>
                <h2>@lang('message.additional_services')</h2>
                <div class="field-container">
                  <div class="input-block">
                    @foreach($services as $service)
                      <label class="services-label">
                        <input type="checkbox" name="service_id[]" value="{{$service->id}}" />
                        {{$service->name}}
                      </label>
                    @endforeach
                  </div>
                </div>
                <div class="hr"></div>
                <div class="input-block">
                  <label>@lang('message.chanel-title')</label>
                  <select name="channel" class="al-dropdown">
                    <option value="телеграмм" @if(old('channel') == 'телеграмм') selected @endif>@lang('message.telegram')</option>
                    <option value="вайбер" @if(old('channel') == 'вайбер') selected @endif>@lang('message.viber')</option>
                    <option value="телефон" @if(old('channel') == 'телефон') selected @endif>@lang('message.phone_')</option>
                    <option value="почта" @if(old("channel") == 'почта') selected @endif>@lang('message.mail')</option>
                  </select>
                </div>
              </div>
              <div class="hr"></div>
              <h2>@lang('message.comment1')</h2>
              <div class="field-container">
                <div class="textarea-block">
                  <label>@lang('message.note')</label>
                  <textarea name="comment">{{ old('comment') }}</textarea>
                </div>
              </div>
              <div class="hr"></div>
              <div class="field-container right">
                <div class="buttons-block">
                  <a href="/manager/leads" class="cancel">@lang('message.cancel')</a>
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
@include('add.footer') 

<style type="text/css">
h1.title{
  margin-top: 22px;
}
h2{
  font-size: 20px;
  color: #3D445C;
  font-weight: 500;
  margin: 0;
  margin-bottom: 20px;
  padding: 0;
}
.container-base{
  max-width: 1050px;
}
.lead-block .h2{
  font-size: 24px;
  line-height:  28px;
  margin-bottom: 14px;
  display: block;
}
.field-container{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
} 
.field-container.hide{
  display: none;
}
.lead-block .input-block{
  margin-right: 15px;
  margin-bottom: 15px;
  position: relative;
}
.lead-block .input-block:nth-child(3n){
  margin-right: 0;
}
.lead-block .input-block.mr15{
  margin-right: 15px;
}
.lead-block .input-block label,
.lead-block .textarea-block label{
  display: block;
 font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #ADB0B9;
  margin-bottom: 5px;
}
.lead-block .input-block select,
.lead-block .input-block input{
  background: white;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;
  width: 340px;
  height: 42px;

  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;

  padding: 0 11px;
}
.lead-block .textarea-block textarea {
  background: white;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 3px;
  width: 700px;
  height: 146px;

  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;

  padding: 0 11px;
  margin-bottom: 25px;
  resize: none;
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

  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
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

  /*padding:  0 20px 0 11px;*/
  width: 340px;
  /*height: 42px;*/

  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 16px;
  color: #3D445C;
  background: white;
}
.select2-selection__rendered{
  height:  40px;
  background: white;
}
.select2-container--default .select2-selection--single{
  width: 100%;
  height: 40px !important;
  border: none !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
  padding: 0 !important;
}
.input-block .select2-selection__rendered {
  height: auto;
  background: white;
  flex-wrap: wrap;
}
.select2-container--default .select2-selection--multiple{
  border: none;
  padding-bottom:0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{
  line-height: 28px;
  border: none;
  border-radius: 0;
  display: flex;
  align-items: center;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__display{
  padding: 0px 4px 0px 5px;
  font-size: 13px;
  /*line-height: 18px;*/
}
.select2-selection__choice__remove span{
  width: 12px;
  height: 12px;
  display: block;
  line-height: 12px;
  margin-right: 5px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
  border-right: none;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
  background: none;
}
.select2-container--default .select2-search--inline .select2-search__field{
  line-height: 30px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple{
  border: none;
}
/*.select2.select2-container.select2-container--default{
  width: 340px !important;
}*/
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
  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
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
  font-family: 'Helvetica Neue', Helvetica, 'helvetica', Arial, sans-serif;;
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
.field-container .input-block .error,
.input-block span.error{
  color: #FC6B40;
  line-height: 25px;
  display: block;
}
/*.success-message{
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
}*/
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
.tagged-select .wide-select{
  width: 695px;
  margin-right: 0px;
}
.lead-block .input-block.wide-select select{
  width: 695px;
  height: 40px;
}
.tagged-select .wide-select .select2-selection.select2-selection--multiple{
  display: flex;
  height: 40px;
}
.tagged-select .wide-select .select2-selection__rendered{
  width: auto;
  height: 40px;
}
.tagged-select .wide-select .select2-container--default .select2-selection--multiple .select2-selection__choice{
  margin-top: 1.5px;
  margin-bottom: 1.5px;
}
.tagged-select .wide-select .select2-container--default .select2-search--inline .select2-search__field{
  line-height: 33px;
}
.form_toggle input[type=radio] + label{
  line-height: 42px;
  color: #3D445C;
  font-size: 13px;
}
</style>


@include('front.crm.scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $('.tagged-cities').select2({
      'tags':true
    });
    $('body').addClass('tagged-select')
  })
</script>
