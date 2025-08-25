@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <a class="back" href="/manager/suppliers/{{$supplier->id}}/companies">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            @lang('message.back')
          </a>
        </div>
        <div class="container  container-base">
          <div class="client-details-block">
            <div class="details-header">
              <h1>{{ $company->name ? $company->name : $company->fio_full}}</h1>
              <a href="/manager/suppliers/{{$supplier->id}}/companies/{{$company->id}}/edit" class="view-edit-btn">@lang('message.edit')</a>
              
            </div>
            @if(in_array($company->type_id, [1,2]))
              @include('front.crm.suppliers.companies.not-fo')
            @else
              @include('front.crm.suppliers.companies.fo')
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')

@include('front.crm.scripts')