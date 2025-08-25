@foreach($statistic as $firmId => $firmData)
@foreach($firmData as $cityId => $cityData)
    @if($cityId == $city || $city == '-')
        @foreach($cityData as $type => $typeData)
            @foreach($typeData as $side => $monthStatistic)
                <tr>
                    <td rowspan="6">{{$firms[$firmId]}}</td>
                    <td rowspan="6">{{$citiesList[$cityId]}}</td>
                    <td rowspan="6">{{$typesList[$type]}}</td>
                    <td rowspan="6">{{$side}}</td>
                    <td>Кол-во</td>
                    @foreach($monthsData as $ym => $monthName)
                        <td>
                            @if(isset($monthStatistic[$ym]))
                                {{$monthStatistic[$ym]->boards_count}}<br>
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <td>min цена</td>
                    @foreach($monthsData as $ym => $monthName)
                        <td>
                            @if(isset($monthStatistic[$ym]))
                                {{$monthStatistic[$ym]->min_price}}
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <td>max цена</td>
                    @foreach($monthsData as $ym => $monthName)
                        <td>
                            @if(isset($monthStatistic[$ym]))
                                {{$monthStatistic[$ym]->max_price}}
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <td>ср. цена</td>
                    @foreach($monthsData as $ym => $monthName)
                        <td>
                            @if(isset($monthStatistic[$ym]))
                                {{$monthStatistic[$ym]->avg_price}}
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <td>медиана</td>
                    @foreach($monthsData as $ym => $monthName)
                        <td>
                            @if(isset($monthStatistic[$ym]))
                                {{$monthStatistic[$ym]->median_price}}
                            @endif
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <td>мода</td>
                    @foreach($monthsData as $ym => $monthName)
                        <td>
                            @if(isset($monthStatistic[$ym]))
                                {{$monthStatistic[$ym]->mode_price}}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @endforeach
    @endif
@endforeach
@endforeach