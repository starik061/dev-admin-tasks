@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <a class="back" href="/manager/clients">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            @lang('message.back')
          </a>
        </div>
        <div class="container  container-base">
          @include('front.crm.clients.header')
          @include('front.crm.clients.inner-menu')
          <div class="client-tab-data-block">
            <div class="client-contacts-header mb20">
              <div class="left-block">
                @if(count($contacts) > 1)
                <form action="/manager/clients/{{$client->id}}/contacts" method="GET" class="input-block search-form">
                  <label for="company_search">@lang('message.search')</label>
                  <input type="text" name="s" value="{{ $_GET['s'] }}" id="company_search">
                  <svg class="clear-search  @if(!$_GET['s']) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
                  </svg>
                </form>
                @endif
              </div>

              <div class="right-block">
                <a href="/manager/clients/{{ $client->id }}/contacts/add" class="btn submit contacts-add-link">@lang('message.add_contact')</a>
              </div>

            </div>
            {{--<hr class="mtb20"/>--}}
            <div class="clients-contacts-data">
              <div class="data-table">
                <div class="data-thead">
                  <div class="data-tr">
                    <div class="data-td">@lang('message.fio2')</div>
                    <div class="data-td">@lang('message.post')</div>
                    <div class="data-td">@lang('message.phone')</div>
                    <div class="data-td">E-mail</div>

                    <div class="data-td action-col"></div>

                  </div>
                </div>
                <div class="data-tbody">
                @include('front.crm.clients.contacts.rows')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer');
<div class="contacts-add-popup">
  <div class='lead-add-header'>
    <span>@lang('message.add_contact')</span>
    <span class="close">
      <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.693739 15.119L0.587673 15.225L0.693739 15.3311L1.54227 16.1796L1.64833 16.2857L1.7544 16.1796L8.43656 9.49746L15.1187 16.1796L15.2248 16.2857L15.3308 16.1796L16.1794 15.3311L16.2854 15.225L16.1794 15.119L9.49722 8.4368L16.1794 1.75464L16.2854 1.64858L16.1794 1.54251L15.3308 0.693983L15.2248 0.587917L15.1187 0.693983L8.43656 7.37614L1.7544 0.693983L1.64833 0.587917L1.54227 0.693983L0.693739 1.54251L0.587673 1.64858L0.693739 1.75464L7.3759 8.4368L0.693739 15.119Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"/>
      </svg>
    </span>
  </div>
  <div class="contacts-add-form">
    <form method="POST" action="/manager/clients/{{ $client->id }}/contacts/add">
      <input type="hidden" name="client_id" value="{{ $client->id }}"/>
      <div class="field-container">
        <div class="input-block">
          <label>@lang('message.fio')</label>
          <input type="text" name="fio" value="" required/>
        </div>
        <div class="input-block">
          <label>@lang('message.post')</label>
          <select name="post_id" class="post-select">
          @foreach($posts as $key => $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach  
          </select>
        </div>
      </div>
      <div class="field-container">
        <div class="input-block">
          <label>E-mail</label>
          <input type="email" name="email" value="" id="lead_email"/>
        </div>
        <div class="input-block">
          <label>@lang('message.phone')</label>
          <input type="text" name="phone" value="" required id="lead_phone"/>
        </div>        
      </div>
      <div class="align-right">
        <button class="clear-new">@lang('message.cancel')</button>
        <button class="submit">@lang('message.add')</button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
let add_action = '/manager/clients/{{ $client->id }}/contacts/add';
</script>

@include('front.crm.scripts')

<style>
.select2-dropdown--below{
  width: 263px !important; 
}
</style>