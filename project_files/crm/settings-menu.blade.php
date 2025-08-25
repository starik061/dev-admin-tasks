@if(Auth::user()->id != 273)
    <a href="/manager/details" @if(request()->is('manager/details*')) class="active" @endif>@lang('message.our_details')</a>
    <a href="/manager/docs/1/edit" @if(request()->is('manager/docs*')) class="active" @endif>@lang('message.contract')</a>
    <a href="/manager/posts" @if(request()->is('manager/posts*')) class="active" @endif>@lang('message.posts')</a>
    <a href="/manager/you-control" @if(request()->is('manager/you-control*')) class="active" @endif>You Controll</a>
    <a href="/manager/services" @if(request()->is('manager/services*')) class="active" @endif>@lang('message.services')</a>
    <a href="/manager/settings" @if(request()->is('manager/settings*')) class="active" @endif>@lang('message.settings')</a>
    <a href="/manager/form2-cards" @if(request()->is('manager/form2-cards*')) class="active" @endif>@lang('message.form2-cards')</a>
    <a href="/manager/bonuses" @if(request()->is('manager/bonuses*')) class="active" @endif>@lang('message.salary')</a>
    <a href="/manager/salary-payment" @if(request()->is('manager/salary-payment*')) class="active" @endif>@lang('message.salary_payment')</a>
    {{--<a href="/manager/bank-operations/add" @if(request()->is('manager/bank-operations*')) class="active" @endif>@lang('message.create_a_banking_transaction')</a>--}}
    <a href="/manager/kved-stat" @if(request()->is('manager/kved-stat*')) class="active" @endif>@lang('message.kved_statistic')</a>
@endif
<a href="/manager/binotel" @if(request()->is('manager/binotel*')) class="active" @endif>Binotel</a>
<a href="/manager/chaport" @if(request()->is('manager/chaport*')) class="active" @endif>Chaport</a>
<a href="/manager/classes" @if(request()->is('manager/classes*')) class="active" @endif>@lang('message.class')</a>
<a href="/manager/marketing-data/view" @if(request()->is('manager/marketing-data*')) class="active" @endif>@lang('message.marketing')</a>
@if(in_array(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier(), [286, 1, 273]))
    <a href="/manager/instagram-edit" @if(request()->is('manager/instagram-edit*')) class="active" @endif>@lang('message.instagram-posts')</a>
@endif
@can('edit-monobank-credential')
    <a href="/manager/monobank/credential" @if(request()->is('manager/monobank/credential*')) class="active" @endif>Monobank</a>
@endcan

