@include('add.head')

<body>
@include('add.header')
@include('add.menu')

<section class="lead-block">
    <div class="container-fluid container-fluid-base">
        <div class="row no-gutters navigation-wrapper">
            <div class="container mw-full" style="max-width: 90% !important;">
                <div class="report-header">
                    <h1>Фотоотчет</h1>
                    <div class="report-info">
                        <div>
                            <span class="label">@lang('message.order22')</span><br>
                            <strong class="value">{{$infoData['order22'] ?? '-'}}</strong>
                        </div>
                        <div>
                            <span class="label">@lang('message.period')</span><br>
                            <strong class="value">{{ $infoData['period'] ?? '-' }}</strong>
                        </div>
                        <div>
                            <span class="label">@lang('message.photoreport')</span><br>
                            <strong class="value">{{ "№".$infoData['photoreport'] ?? '-' }}</strong>
                        </div>
                        <div>
                            <span class="label">@lang('message.manager')</span><br>
                            <strong class="value">{{ $infoData['manager'] ?? '-' }}</strong>
                        </div>
                    </div>
                </div>

                <div class="client-tab-data-block pt0">
                    @foreach($reports as $index => $report)
                        <div class="report-block">
                            <div class="report-title">
                                <span class="report-number">{{ $index + 1 }}</span>
                                    <h5 style="margin-top: 15px">@lang('message.plane')
                                        @if(Auth::user() && in_array(Auth::user()->role_id, [1,2]))
                                        <strong>{{ $report->code }} / {{$report->id}}</strong>
                                        @else
                                            <strong>{{$report->id}}</strong>
                                        @endif
                                    </h5>
                            </div>
                            <p>{{ ucfirst($report->city_name) }}/{{ ucfirst($report->addr) }}</p>
                            <div class="report-images">
                                @if($report->photo_near)
                                    <!-- photo_near -->
                                    <a href="{{ Storage::disk('public')->exists($report->photo_near) ? asset('storage/' . $report->photo_near) : asset('img/no_image2.jpg') }}"
                                       data-fancybox>
                                        <div class="image-container">
                                            <img src="{{ Storage::disk('public')->exists($report->photo_near) ? asset('storage/' . $report->photo_near) : asset('img/no_image2.jpg') }}"
                                                 alt="Ближний вид">
                                            <div class="image-overlay">
                                                <span>@lang('message.photo_near')</span><br>
                                                <span>(@lang('message.click_to_view_image'))</span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                @if($report->photo_far)
                                    <!-- photo_far -->
                                    <a href="{{ Storage::disk('public')->exists($report->photo_far) ? asset('storage/' . $report->photo_far) : asset('img/no_image2.jpg') }}"
                                       data-fancybox>
                                        <div class="image-container">
                                            <img src="{{ Storage::disk('public')->exists($report->photo_far) ? asset('storage/' . $report->photo_far) : asset('img/no_image2.jpg') }}"
                                                 alt="Дальний вид">
                                            <div class="image-overlay">
                                                <span>@lang('message.photo_far')</span><br>
                                                <span>(@lang('message.click_to_view_image'))</span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                @if($report->photo_night)
                                    <!-- photo_night -->
                                    <a href="{{ Storage::disk('public')->exists($report->photo_night) ? asset('storage/' . $report->photo_night) : asset('img/no_image2.jpg') }}"
                                       data-fancybox>
                                        <div class="image-container">
                                            <img src="{{ Storage::disk('public')->exists($report->photo_night) ? asset('storage/' . $report->photo_night) : asset('img/no_image2.jpg') }}"
                                                 alt="Ночной вид">
                                            <div class="image-overlay">
                                                <span>@lang('message.photo_night')</span><br>
                                                <span>(@lang('message.click_to_view_image'))</span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@include('add.footer')
<div class="al-overlay3 hide"></div>
@include('front.crm.scripts')

<style>
    .report-header {
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        background: #fff;
        text-align: left;
    }

    .report-header h1 {
        margin-bottom: 10px;
        font-size: 35px;
        text-align: left;
    }

    .report-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        flex-wrap: wrap;
        padding: 20px 30px;
        background: #F6F7F9;
        border-radius: 8px;
    }

    .report-info div {
        flex: 1;
        min-width: 120px;
        text-align: left;
    }

    .label {
        font-family: Helvetica Neue, serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 130%;
        color: #666;
    }

    .value {
        font-family: Helvetica Neue, serif;
        font-weight: 500;
        font-size: 15px;
        line-height: 100%;
        color: #333;
    }

    @media (max-width: 768px) {
        .report-info {
            flex-direction: column;
            align-items: center;
        }

        .report-info div {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .report-header h1 {
            font-size: 18px;
        }

        .report-info {
            padding: 5px;
        }
    }

    .report-block {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 10px;
        background: #fff;
    }

    .report-title {
        display: flex;
        align-items: center;
    }

    .report-number {
        background: #FC6B40;
        color: white;
        font-weight: normal;
        border-radius: 50%;
        width: 24px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }

    .report-images {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        flex-wrap: wrap;
        justify-content: flex-start;
        cursor: pointer;
    }

    .report-images a {
        display: block;
        flex: 0 0 calc(33.33% - 10px);
        max-width: calc(33.33% - 10px);
        text-align: center;
    }

    .report-images img {
        width: 100%;
        height: 360px;
        object-fit: fill;
        border-radius: 5px;
        background: #f0f0f0;
    }

    @media (max-width: 768px) {
        .report-images a {
            flex: 0 0 calc(50% - 10px);
            max-width: calc(50% - 10px);
        }
    }

    @media (max-width: 480px) {
        .report-images {
            flex-direction: column;
        }

        .report-images a {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    .image-container {
        position: relative;
        width: 100%;
    }

    .image-overlay {
        display: block;
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 45%;
        background: rgba(128, 128, 128, 0.7);
        color: white;
        font-size: 12px;
        padding: 5px 10px;
        text-align: center;
        border-radius: 5px;
        line-height: 1.5;
        max-height: 100%;
        overflow: hidden;
    }
</style>
</body>
