@include('add.head')
<body>
@include('add.header')
@include('add.menu')

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container container-base">
                <a class="back" href="/manager/leads?tmplt=kanban">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
                    </svg>
                    @lang('message.back')
                </a>
                <h1 class="title">{{$data['seo']->h1_title}}</h1>
                <div class="lead-block-info">
                    <div class="info-block-table">
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.name2')</span>
                            </div>
                            <div class="td">
                                {{ $item->name }}
                            </div>
                        </div>
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.name')</span>
                            </div>
                            <div class="td">
                                {{ $item->fio }}
                            </div>
                        </div>
                        <div class="tr">
                            <div class="td">
                                E-mail
                            </div>
                            <div class="td">
                                {{$item->email}}
                                @if(count($item->contacts) > 1)
                                    @foreach($item->contacts as $index => $contact)
                                        @if($contact->email && $index)
                                            <br>{{$contact->email}}
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.phone')</span>
                            </div>
                            <div class="td">
                                {{$item->phone}}{!! $item->phone && $item->tg_name ? '<br>' : '' !!}{{$item->tg_name}}
                                @if(count($item->contacts) > 1)
                                    @foreach($item->contacts as $index => $contact)
                                        @if($contact->phone && $index)
                                            <br>{{$contact->phone}}
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.city')</span>
                            </div>
                            <div class="td">
                                {{$item->cities}}
                            </div>
                        </div>
                        @if(Auth::user()->role_id == 1)
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.manager')</span>
                            </div>
                            <div class="td">
                              {{$item->user->name}}
                            </div>
                        </div>
                        @endif
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.created')</span>
                            </div>
                            <div class="td">
                                {{ date('d.m.Y H:i:s', strtotime($item->created_at)) }}
                            </div>
                        </div>
                        <div class="tr">
                            <div class="td">
                                <span>@lang('message.updated')</span>
                            </div>
                            <div class="td">
                                {{ date('d.m.Y H:i:s', strtotime($item->updated_at)) }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('front.crm.leads.details')
                </div>
            </div>
        </div>
    </div>
</section>

@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.footer')

@include('front.crm.scripts')
<style>
    .leads-row-selects{
        padding: 0 0 20px;
    }
    .lead-actions-container{
        margin-top: 0;
        padding-left: 0;
        padding-top: 10px;
        border-top: solid 1px #CDD4D9;
    }
    .status-tab .status-div{
        width:auto;
    }
    [name=user_id]{
        width:250px;
    }
    .show-block{
        display:flex;
        flex-direction: row;
    }
    .change-popup-body form{
        padding: 0;
    }
    .visibility-change{
        display:none;
    }
    .lead-actions-container{
        flex-wrap: wrap;
        flex-direction: row;
    }
    .lead-actions-container a{
        margin-top:15px;
        margin-bottom: 15px;
    }
</style>


