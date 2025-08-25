@include('add.head')
<body>
@include('add.header')
@include('add.menu')
@include('add.bread')

<section id="result-search-list" class="al-leeds-page">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters">
            <div class="container container-base container-search-result manager-search mw1460">
                <h1 class="title-search-result" style="position: relative">
                    {{ $data['seo']->h1_title }}
                </h1>
                <div class="content-block clearfix">

                    <form id="runKCallLeadsForm" action="{{ route('runKCallLeads') }}" method="POST" style="margin-bottom: 20px; display: flex; align-items: center;">
                        @csrf
                        <button type="submit" class="crm-button">@lang('message.run_key_call')</button>
                        <span>@lang('message.leads'):</span>
                        <div class="total-leads-icon">
                            {{ $totalLeads }}
                        </div>
                    </form>

                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('message.name')</th>
                            <th>@lang('message.mail')</th>
                            <th>@lang('message.phone')</th>
                            <th>@lang('message.status')</th>
                            <th>@lang('message.call_try_count')</th>
                            <th>@lang('message.link')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->status->name }}</td>
                                <td>{{ $lead->key_call_attempt_count }}</td>
                                <td><a href="{{ url('manager/leads/' . $lead->id . '/info') }}">Link</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">@lang('message.no_leads')</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
{{--                    <div class="pagination-wrapper">--}}
{{--                        {{ $leads->withQueryString()->links() }}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>

<span data-search='{{ json_encode($search) }}' id="data-for-search"></span>
@include('add.footer')
@include('front.crm.footer')

<style>
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }
    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table-bordered thead th, .table-bordered thead td {
        border-bottom-width: 2px;
    }
    .text-center {
        text-align: center;
    }
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .total-leads-icon {
        display: inline-block;
        background-color: #FFF0EC; /* Adjust the color as needed */
        color: black;
        font-size: 14px;
        text-align: center;
        border-radius: 50%;
        width: 30px; /* Adjust the size as needed */
        height: 30px; /* Adjust the size as needed */
        line-height: 30px; /* Make the text vertically centered */
        margin-left: 15px;
    }
</style>

<script>
    document.getElementById('runKCallLeadsForm').addEventListener('submit', function(event) {
        let confirmRun = confirm("@lang('message.approve') @lang('message.run_key_call')?");
        if (!confirmRun) {
            event.preventDefault();
        }
    });
</script>
@include('front.crm.scripts')
