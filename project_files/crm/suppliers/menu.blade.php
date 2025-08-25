<div class="client-navigation">
    <div class="favorite-viewed-tab">
        <a href="/manager/suppliers/{{ $supplier->id }}/view" @if(request()->is('*/view*')) class="active" @endif>@lang('message.information')</a>
        @if(!in_array(Auth::user()->id, [273,279]))
            <a href="/manager/suppliers/{{ $supplier->id }}/companies" @if(request()->is('*/companies*')) class="active" @endif>@lang('message.companies') @if($data['details'])({{$data['details']}})@endif</a>
        @endif
        <a href="/manager/suppliers/{{ $supplier->id }}/contacts" @if(request()->is('*/contacts*')) class="active" @endif>@lang('message.contacts') @if($data['contacts'])({{$data['contacts']}})@endif</a>
        @if(Auth::user()->role_id == 1 && $supplier->firm->id)
            <a href="/manager/suppliers/{{ $supplier->id }}/parser" @if(request()->is('*/parser*')) class="active" @endif>@lang('message.parser') @if($data['parser'])({{$data['parser']}})@endif</a>
        @endif
        @if(!in_array(Auth::user()->id, [273,279]))
            <a href="/manager/suppliers/{{ $supplier->id }}/clients" @if(request()->is('*/clients*'))  class="active" @endif>@lang('message.clients')</a>
        @endif
        @if(in_array(Auth::user()->role_id, [1,2])  && $supplier->firm->id)
            <a href="/manager/suppliers/{{ $supplier->id }}/files" @if(request()->is('*/files*'))  class="active" @endif>@lang('message.files')</a>
        @endif
        @if(in_array(Auth::user()->role_id, [1,2])  && $supplier->firm->id)
            <a href="/manager/suppliers/{{ $supplier->id }}/prices" @if(request()->is('*/prices*'))  class="active" @endif>@lang('message.prices')</a>
        @endif
    </div>
</div>