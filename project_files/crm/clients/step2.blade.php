@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section id="result-search-list" class="al-client-details-step1">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters">
        <div class="steps">
          <div class="container">
            <div class="step-1 step current">
              <span class="round">1</span>
              @lang('message.add_a_new_client')
            </div>
            <div class="line"></div>
            <div class="step-2 step current">
              <span class="round">2</span>
              @lang('message.add_a_company')
            </div>
            <div class="line"></div>
            <div class="step-3 step current">
              <span class="round">3</span>
              @lang('message.company_details')
            </div>
            <div class="line"></div>
            <div class="step-3 step ">
              <span class="round">4</span>
              @lang('message.requisites')
            </div>
          </div>
        </div>
        <div class="container container-base">
          <h1 class="title">
            {{ $data['seo']->h1_title }}
          </h1> 
          <div class="content-block">
            <div class="short-form-block">
              <div class="field-container">
                <div class="input-block label-block">
                  <input type="radio" class="hide" value="nds" id="input-nds" name="client_type" checked />
                  <label for="input-nds" class="first">@lang('message.VAT')</label>
                  <input type="radio" class="hide" value="not-nds" id="input-not-nds" name="client_type"/>
                  <label for="input-not-nds">@lang('message.notVAT')</label>
                  <input type="radio" class="hide" value="fo" id="input-fo" name="client_type"/>
                  <label for="input-fo" class="last">@lang('message.individual_')</label>
                </div>
              </div>
            </div>
            <hr>
            <div class="field-container bottom-action">
              <a href="/manager/clients/{{ $client->id }}/details/step1" class="back">
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
                </svg>
                @lang('message.back')
              </a>
              <div class="buttons-block">
                <a href="/manager/clients/{{ $client->id }}/info" class="cancel">@lang('message.cancel')</a>
                <a href="/manager/clients/{{ $client->id }}/details-new/nds" class="btn next-step submit">@lang('message.next2')</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@include('add.footer')

<style type="text/css">
.field-container {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.cancel {
  display: inline-block;
  border: 1px solid #CDD4D9;
  box-sizing: border-box;
  border-radius: 4px;
  height: 42px;
  font-family: Helvetica Neue;
  font-style: normal;
  font-weight: bold;
  font-size: 13px;
  line-height: 42px;
  text-align: center;
  margin-right: 12px;
  color:#3D445C;
}
.cancel:hover{
  /*color: #FC6B40;*/
  color:#3D445C;
}  
</style>

<script>
var main_url = '/manager/clients/{{ $client->id }}';
document.edrpou_click = false;
</script>

@include('front.crm.scripts')
