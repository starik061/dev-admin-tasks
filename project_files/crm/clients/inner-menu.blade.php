<div class="client-navigation">
    <div class="favorite-viewed-tab">
        <a href="/manager/clients/{{ $client->id }}/view" class="{{ (request()->is("manager/clients/".$client->id."/view*")) ? 'active' : '' }}">@lang('message.information')</a>
        @if(Auth::user()->id != 273)
        <a href="/manager/clients/{{ $client->id }}/companies" class="{{ (request()->is("manager/clients/".$client->id."/companies*")) ? 'active' : '' }}" id="company-tab">@lang('message.companies') @if($data['details'])({{$data['details']}})@endif</a>
        <a href="/manager/clients/{{ $client->id }}/contacts" class="{{ (request()->is("manager/clients/".$client->id."/contacts*")) ? 'active' : '' }}" id="contacts-tab">@lang('message.contacts') @if($data['contacts'])({{$data['contacts']}})@endif</a>
        <a href="/manager/clients/{{ $client->id }}/contracts" class="{{ (request()->is("manager/clients/".$client->id."/contracts*")) ? 'active' : '' }}" id="contracts-tab">@lang('message.contracts') @if($data['contracts'])({{$data['contracts']}})@endif</a>
        @endif
        <a href="/manager/clients/{{ $client->id }}/bills" class="{{ (request()->is("manager/clients/".$client->id."/bills*")) ? 'active' : '' }}" id="bills-tab" >@lang('message.bills') @if($data['bills'])({{$data['bills']}})@endif</a>
        {{--
        <a href="/manager/clients/{{ $client->id }}/photoreports" >Фотоотчеты@if($data['photoreports']) ({{$data['photoreports']}})@endif</a>
        --}}
        @if(Auth::user()->id != 273)
        <a href="/manager/clients/{{ $client->id }}/suppliers" class="{{ (request()->is("manager/clients/".$client->id."/suppliers*")) ? 'active' : '' }}">@lang('message.owners')</a>
        <a href="/manager/clients/{{ $client->id }}/docs" class="{{ (request()->is("manager/clients/".$client->id."/docs*")) ? 'active' : '' }}">@lang('message.documents') @if($data['layouts'])({{$data['layouts']}})@endif</a>
        @endif
        @if(Auth::user()->role_id == 1 || $currentUser->role_id == 5)
        <a href="/manager/clients/{{ $client->id }}/boards" class="{{ (request()->is("manager/clients/".$client->id."/boards*")) ? 'active' : '' }}">@lang('message.planes')</a>
        @endif
        <a href="/manager/clients/{{ $client->id }}/photoreports" class="{{ (request()->is("manager/clients/".$client->id."/photoreports*")) ? 'active' : '' }}" id="photoreport-tab">@lang('message.photoreports')@if($data['photoreports']) ({{$data['photoreports']}})@endif</a>
    </div>
</div>