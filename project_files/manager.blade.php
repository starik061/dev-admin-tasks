@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')
  @include('add.bread')
  <section class="mail">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <h1 class="title mail-page-title">@lang('message.manager_mail')</h1>
          <div class="mail-block">
            <form id="askForm" action="#" type="type">
              <div class="formTitle">
                <h4 class="title">@lang('message.mail_form')</h4>
              </div>
              <div class="lines">
                <div class="line">
                  <label class="label" for="#askName">@lang('message.name'):</label>
                  <input id="askName" type="text" placeholder="@lang('message.name')" name="name" maxlength="55"/>
                </div>
                <div class="line">
                  <label class="label" for="#askPhone">@lang('message.contact_phone'):</label>
                  <input class="validPhone" id="askPhone" type="text" placeholder="+380" name="phone" maxlength="18"/>
                </div>
                <div class="line">
                  <label class="label" for="#askEmail">Email:</label>
                  <input id="askEmail" type="text" name="email" placeholder="Email"/>
                </div>
                <div class="line">
                  <label class="label" for="#askText">@lang('message.your_message'):</label>
                  <textarea id="askText" cols="30" rows="10" name="message" placeholder="@lang('message.your_message')"></textarea>
                </div>
              </div>
              @csrf
              <div class="confirm-block">
                <div class="check-robot">
                  <label class="label-box chBox">
                    <input type="checkbox" name="robot"/>
                    <div class="box"></div><span>@lang('message.drag_captcha')</span>
                  </label>
                </div>
                <div class="submit" style="padding:0px">
                  <button class="btn" id="submitAskForm">@lang('message.send_mail')</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')