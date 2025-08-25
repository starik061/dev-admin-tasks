@if(!$client)
    <div class="selection-item selection-head">
        <div class="selection-col">id</div>
        <div class="selection-col">@lang('message.type')</div>
        <div class="selection-col">@lang('message.creation_date')</div>
        <div class="selection-col">@lang('message.manager')</div>
        <div class="selection-col">@lang('message.planes_count_')</div>
        <div class="selection-col">@lang('message.views_count')</div>
    </div>
    @foreach($selections as $k => $v)
        <a href="/manager/selection/{{$v->id}}" class="ajax-popup-link">
            <div class="selection-item pointer">
                <div class="selection-col">{{ $v->id }}</div>
                <div class="selection-col">{{ $v->type->name ?? "" }}</div>
                <div class="selection-col">{{ $v->created_at }}</div>
                <div class="selection-col">{{ $v->manager->name ? $v->manager->name : 'клиент' }}</div>
                <div class="selection-col" id="selection_count_{{$v->id}}">{{ $v->boards_count }}</div>
                <div class="selection-col" id="views_count_{{$v->id}}">{{ $v->views_count }}</div>
            </div>
        </a>
    @endforeach
@else
    <div class="leads-selections">
        <div class="selection-item selection-head">
            <div class="selection-col">id</div>
            <div class="selection-col">@lang('message.type')</div>
            <div class="selection-col">@lang('message.creation_date')</div>
            <div class="selection-col">@lang('message.manager')</div>
            <div class="selection-col">@lang('message.planes_count_')</div>
            <div class="selection-col">@lang('message.views_count')</div>
        </div>
        @foreach($selections as $k => $v)
            <a href="/manager/selection/{{$v->id}}" class="ajax-popup-link">
                <div class="selection-item pointer">
                    <div class="selection-col">{{ $v->id }}</div>
                    <div class="selection-col">{{ $v->type->name ?? "" }}</div>
                    <div class="selection-col">{{ $v->created_at }}</div>
                    <div class="selection-col">{{ $v->manager->name ? $v->manager->name : 'клиент' }}</div>
                    <div class="selection-col" id="selection_count_{{$v->id}}">{{ $v->boards_count }}</div>
                    <div class="selection-col" id="views_count_{{$v->id}}">{{ $v->views_count }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endif