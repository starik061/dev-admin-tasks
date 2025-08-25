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
          @include('front.crm.suppliers.header')
          @include('front.crm.suppliers.menu')
          <span class="fs15">@lang('message.signers') {{$companyName}}</span>
          <div class="client-tab-data-block">
            <div class="client-contacts-header mb20">
              <div class="left-block">
                @if(count($signers) > 1)
                <form action="/manager/suppliers/{{$supplier->id}}/companies/{{$companyId}}/signers" method="GET" class="input-block search-form">
                  <label for="company_search">@lang('message.search')</label>
                  <input type="text" name="s" value="{{ $_GET['s'] }}" id="company_search">
                  <svg class="clear-search  @if(!$_GET['s']) hide @endif" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.493543 11.3126L0.387477 11.4187L0.493543 11.5248L1.12994 12.1612L1.23601 12.2672L1.34207 12.1612L6.32717 7.17607L11.3123 12.1612L11.4183 12.2672L11.5244 12.1612L12.1608 11.5248L12.2669 11.4187L12.1608 11.3126L7.1757 6.32754L12.1608 1.34244L12.2669 1.23637L12.1608 1.13031L11.5244 0.49391L11.4183 0.387844L11.3123 0.49391L6.32717 5.47901L1.34207 0.49391L1.23601 0.387844L1.12994 0.49391L0.493543 1.13031L0.387477 1.23637L0.493543 1.34244L5.47865 6.32754L0.493543 11.3126Z" fill="#3D445C" stroke="#3D445C" stroke-width="0.3"></path>
                  </svg>
                </form>
                @endif
              </div>
              <div class="right-block">
                <a href="/manager/suppliers/{{ $supplier->id }}/companies/{{$companyId}}/signers/add" class="btn submit signer-add-link">@lang('message.add_signer')</a>
              </div>
            </div>
            {{--<hr class="mtb20"/>--}}
            @if(count($signers))
            <div class="clients-company-data">
              <div class="data-table">
                
                <div class="data-thead">
                  <div class="data-tr">
                    <div class="data-td td-name f6">@lang('message.fio2')</div>
                    <div class="data-td">@lang('message.post')</div>
                    <div class="data-td">@lang('message.valid_from')</div>
                    <div class="data-td action-col"></div>
                  </div>
                </div>
                
                <div class="data-tbody">
                  @foreach($signers as $signer)
                  <div class="data-tr" id="company_tr_{{$company->id}}">
                    <div class="data-td td-name f6" id="sn-{{$signer->id}}">{{ $signer->name }}</div>
                    <div class="data-td" id="sp-{{$signer->id}}">{{ $signer->post }}</div>
                    <div class="data-td" id="sd-{{$signer->id}}">{{ date('d.m.Y',strtotime($signer->started_at)) }}</div>
                    <div class="data-td action-col align-right">
                      <a href="#" class="more-action">
                        <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M2 0.25C1.38125 0.25 0.875 0.75625 0.875 1.375C0.875 1.99375 1.38125 2.5 2 2.5C2.61875 2.5 3.125 1.99375 3.125 1.375C3.125 0.75625 2.61875 0.25 2 0.25ZM2 11.5C1.38125 11.5 0.875 12.0063 0.875 12.625C0.875 13.2437 1.38125 13.75 2 13.75C2.61875 13.75 3.125 13.2437 3.125 12.625C3.125 12.0063 2.61875 11.5 2 11.5ZM2 5.875C1.38125 5.875 0.875 6.38125 0.875 7C0.875 7.61875 1.38125 8.125 2 8.125C2.61875 8.125 3.125 7.61875 3.125 7C3.125 6.38125 2.61875 5.875 2 5.875Z" fill="#3D445C"/>
                        </svg>
                      </a>
                      <div class="sub-action hide">                        
                        <a href="/manager/suppliers/{{$supplier->id}}/companies/{{$companyId}}/signers/{{$signer->id}}/edit" class="edit-signer">@lang('message.edit')</a>
                        @if($company->can_delete)
                        <a href="/manager/suppliers/{{$supplier->id}}/companies/{{$companyId}}/signers/{{$signer->id}}/delete" class="signer-delete" data-id="{{$signer->id}}">@lang('message.delete')</a>
                        @endif
                       
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')

@include('front.crm.scripts')
<script>
var startedAt = null;
@if($success)
notify("{{$name}}");
@endif
</script>