@foreach($contracts as $contract)
    <div class="data-tr-global data-contract-item @if($new) new @endif" id="contract-row-{{$contract->id}}">
        <div class="data-tr tr-action pointer">
            <div class="data-td td-name">
                <span class="up-down">
                  <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg"
                       class="info-arrow">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M1.10225 0.352252C1.32192 0.132583 1.67808 0.132583 1.89775 0.352252L6 4.4545L10.1023 0.352252C10.3219 0.132583 10.6781 0.132583 10.8977 0.352252C11.1174 0.571922 11.1174 0.928078 10.8977 1.14775L6.39775 5.64775C6.17808 5.86742 5.82192 5.86742 5.60225 5.64775L1.10225 1.14775C0.882583 0.928078 0.882583 0.571922 1.10225 0.352252Z"
                          fill="#3D445C"/>
                  </svg>
                </span>
                <span class="contract_title" id="title-{{$contract->id}}">
                    @lang('message.contract') №{{$contract->number}} {{$contract->our_company_name_short}} - {{$contract->company_name_short}}
                 </span>
            </div>
            <div class="data-td" id="date-{{$contract->id}}">
                {{-- date('d.m.Y', strtotime($contract->created_at)) --}}
                {{ $contract->day.".".$contract->month.".".$contract->year }}
            </div>
            <div class="data-td t123
                @if(Auth::user()->role_id == 5 || Auth::user()->role_id == 1)
                    status-changer
                @endif
                    f2"
                 data-type="contract"
                 data-client_id="{{$contract->client_id}}"
                 data-id="{{$contract->id}}"
                 data-status="{{$contract->status_id}}"
            >
                @if($contract->status_id)
                    <span class="status-info"
                          style="background: {{$contract->status->background}}; color: {{$contract->status->color}};">&bull; {{ $contract->status->getTranslatedAttribute('name', App::getLocale(), 'ru') }}</span>
                @endif
            </div>
        </div>
        <div class="data-td-application hide" id="application-{{$contract->id}}">
            @if(count($contract->acts_data))
                <div class="data-table acts-list" id="acts-list-{{$contract->id}}">
                    <div class="data-thead">
                        <div class="data-tr">
                            <div class="data-td td-number">№</div>
                            <div class="data-td">@lang('message.application_date')</div>
                            <div class="data-td">@lang('message.period')</div>
                            <div class="data-td">@lang('message.city')</div>
                            <div class="data-td">@lang('message.sum')</div>
                            <div class="data-td">@lang('message.status_lc')</div>
                            <div class="data-td">@lang('message.status_lc')</div>
                            <div class="data-td action-col"></div>
                        </div>
                    </div>
                    <div class="data-tbody" id="contract-acts-{{$contract->id}}">
                        @foreach($contract->acts_data as $act)
                            @include('front.crm.clients.documents.app_row')
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endforeach

<script>
    let x = null;
    document.addEventListener('DOMContentLoaded', function () {
        const statusChangers = document.querySelectorAll('.status-changer');

        console.log(statusChangers)

        statusChangers.forEach(function (statusChanger) {
            statusChanger.addEventListener('click', function () {
                x = this.getAttribute('data-client_id');
                runSecondScript();
            });
        });

        function runSecondScript() {
            document.statusChanger = {
                client_id: x
            };
        }
    });
</script>
