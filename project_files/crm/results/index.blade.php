@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">

        <div class="container container-base bookkeeper-bills-page">
          <h1 class="title">{{$data['seo']->h1_title}}</h1>
          <div class="client-tab-data-block pt0">
            
            <div class="bills-search-form">
              <form action="{{ route('manager.results') }}" method="GET" id="manager-results">
                <div class="field-container">
                  <div class="input-block">
                    <label>@lang('message.results_period')</label>
                    <select name="report_period" class="report_period-select">
                      @foreach($reportPeriod as $k => $v)
                      <option value="{{$k}}" @if($k == $report_period) selected @endif>{{$v}}</option>
                      @endforeach
                    </select>
                  </div>
                  @if(Auth::user()->role_id == 1)
                  <div class="input-block">
                    <label>@lang('message.manager')</label>
                    <select name="user_id" class="report_period-select">
                      <option value="">@lang('message.all')</option>
                      @foreach($managers as $k => $v)
                      <option value="{{$k}}" @if($k == $user_id) selected @endif>{{$v}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif
                </div>
              </form>
            </div>
            @php
            $allIn = $allOut = $allPaid = 0;
            $lineIndex = 0;
            @endphp
            @if(count($results))
            {{-- dump($results) --}}
            {{-- dump($clients) --}}
            
            <div class="results-table data-table">
              <div class="results-table-thead data-thead">
                <div class="data-tr">
                  <div class="data-td f6 w535">
                    @lang('message.client')
                  </div>
                  <div class="data-td">
                    @lang('message.recipient')
                  </div>
                  <div class="data-td">
                    @lang('message.results_pay_date')
                  </div>
                  <div class="data-td">
                    @lang('message.sum_in')
                  </div>
                  <div class="data-td">
                    @lang('message.sum_out')
                  </div>
                  <div class="data-td">
                    @lang('message.paid3')
                  </div>
                  <div class="data-td">
                    @lang('message.earnings')
                  </div>
                  <div class="data-td">
                    10%
                  </div>
                  <div class="data-td">
                    @lang('message.bonus_koef')
                  </div> 
                  @if($user->role_id == 1)                 
                  <div class="data-td bill-action">
                    &nbsp; &nbsp; &nbsp; &nbsp;
                  </div>
                  @endif
                </div>
              </div>
              <div class="bills-table-tbody data-tbody">
              @foreach($clients as $key => $name)
                @php 
                    $sumPaid = 0;
                    $sumIn = 0;
                    $sumOut = 0;
                    $details_id = 0;
                    $payDates = [];
                    if($results[$key]){
                      foreach($results[$key] as $item){
                          $sumPaid += $item->paid_sum;
                          $sumOut += $item->sum; 
                          $payDates[] = date('d.m.Y',strtotime($item->paid_at));
                          foreach($item->acts_data as $app){
                              foreach($app->boards as $board){
                                  $sumIn += $board->owner_price;
                              }
                              foreach($app->services as $service){
                                  $sumIn += $service->price_id*$service->count;
                              }
                              $details_id = $app->contract->our_detail_id;
                          }
                      } 
                    }
                    $allIn += $sumIn;
                    $allPaid += $sumPaid;
                    $allOut += $sumOut;
                    $dates = $payDates[0];
                    if(count($payDates)>1){
                      $dates = "<span class='al-power-tip' title='".implode('<br>',$payDates)."'>".count($payDates)."</span>";
                    }
                @endphp
                <div class="data-tr results-item pointer" id="result-{{$key}}" data-id="{{$key}}">
                  <div class="data-td f6 w535">
                    <span class="number">{{++$lineIndex}}</span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="arr">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M4.10225 6.35225C4.32192 6.13258 4.67808 6.13258 4.89775 6.35225L9 10.4545L13.1023 6.35225C13.3219 6.13258 13.6781 6.13258 13.8977 6.35225C14.1174 6.57192 14.1174 6.92808 13.8977 7.14775L9.39775 11.6477C9.17808 11.8674 8.82192 11.8674 8.60225 11.6477L4.10225 7.14775C3.88258 6.92808 3.88258 6.57192 4.10225 6.35225Z" fill="#3D445C"/>
                    </svg>
                    {{$name}} @if(isset($results[$key]))(сч. {{$results[$key]->count()}})@endif
                  </div>
                  <div class="data-td">
                    {{ $ourDetails[$details_id] }}                  
                  </div>
                  <div class="data-td">
                    {!! $dates !!}
                  </div>
                  <div class="data-td client-sum_in ">
                    {{$sumIn}}
                  </div>
                  <div class="data-td ">
                    {{$sumOut}}
                  </div>
                  <div class="data-td ">
                    {{$sumPaid}}
                  </div>
                  <div class="data-td  client-earning">
                    {{ $sumPaid - $sumIn }}
                  </div>
                  <div class="data-td client-ten_percent">
                    {{ ($sumPaid - $sumIn)*0.1 }}
                  </div>
                  <div class="data-td client-koef_bonus">
                    @if($sumPaid)
                    {{ ceil((1 - $sumIn/$sumPaid)*10000)/10000 }}
                    @endif
                  </div>
                  
                  @if($user->role_id == 1) 
                  <div class="data-td bill-action">
                    {{$managers[$results[$key][0]->client->user_id]}}
                  </div>
                  @endif
                </div>
                <div class="results-details hide" id="details-{{$key}}">
                  <div class="result-details-data">
                    <table class="">
                      <tr class="result-header-tr">
                        <td class="result-name-td">@lang('message.name3')</td>
                        <td>@lang('message.qty2')</td>
                        <td>@lang('message.price_in')</td>
                        <td>@lang('message.sum_in2')</td>
                        <td>@lang('message.price_out')</td>
                        <td>@lang('message.sum_out2')</td>
                        <td>@lang('message.earnings2')</td>
                        <td>10%</td>
                        <td>@lang('message.bonus_koef2')</td>
                      </tr>
                    @if($results[$key])  
                    @foreach($results[$key] as $item)
                      @foreach($item->acts_data as $app)
                        @foreach($app->boards as $board)
                          <tr data-id="{{$board->id}}">
                            @php
                              $boardData = null;
                              if($board->board_id < 1000000){
                                $boardData = $board->getBoardData();
                              }else{
                                $boardData = $board->getManualBoardData();
                              }    
                            @endphp
                            <td class="result-name-td">
                                {{ (($boardData->id < 1000000) ? $boardData->id : $boardData->code)." ".$boardData->addr}}
                            </td>
                            <td>1</td>
                            <td>
                                
                                <input type="text" class="price_in-input" value="{{$board->owner_price}}" data-id="{{$board->id}}"/>
                                
                            </td>
                            <td class="sum_in">{{$board->owner_price}}</td>
                            <td>{{$board->price}}</td>
                            <td>{{$board->price}}</td>
                            <td class="earning">{{$board->price - $board->owner_price}}</td>
                            <td class="ten-percent">{{ ($board->price - $board->owner_price)*0.1 }}</td>
                            <td class="koef-bonus">{{ ceil((1 - $board->owner_price/$board->price)*10000)/10000 }}</td>
                          </tr>  
                        @endforeach
                        @foreach($app->services_data as $service)
                          <tr data-id="{{$board->id}}">
                            
                            <td class="result-name-td">
                                {{$service->service->name}}
                            </td>
                            <td>{{$service->count}}</td>
                            <td>
                                <input type="text" class="price_in-input--" value="{{$service->price_in}}" data-id="{{$service->id}}"/>
                            </td>
                            <td class="sum_in">{{$service->price_in*$service->count}}</td>
                            <td>{{$service->price}}</td>
                            <td>{{$service->price*$service->count}}</td>
                            <td class="earning">{{($service->price - $service->price_in)*$service->count}}</td>
                            <td class="ten-percent">{{ ($service->price - $service->price_in)*$service->count*0.1 }}</td>
                            <td class="koef-bonus">{{ ceil((1 - ($service->price_in*$service->count)/($service->price*$service->count))*10000)/10000 }}</td>
                          </tr>
                        @endforeach
                      @endforeach
                    @endforeach
                    @endif
                    </table>
                  </div>
                </div>
              @endforeach

                <div class="data-tr results-item-">
                  <div class="data-td f6 w535">
                    &nbsp;
                  </div>
                  <div class="data-td">
                    &nbsp;
                  </div>
                  <div class="data-td">
                    &nbsp;
                  </div>
                  <div class="data-td client-sum_in bold">
                    {{$allIn}}
                  </div>
                  <div class="data-td bold">
                    {{$allOut}}
                  </div>
                  <div class="data-td bold">
                    {{$allPaid}}
                  </div>
                  <div class="data-td  client-earning bold">
                    {{ $allPaid - $allIn }}
                  </div>
                  <div class="data-td client-ten_percent bold">
                    {{ ($allPaid - $allIn)*0.1 }}
                  </div>
                  <div class="data-td client-koef_bonus bold">
                    {{ ceil((1 - $allIn/$allPaid)*10000)/10000 }}
                  </div>
                  
                  @if($user->role_id == 1) 
                  <div class="data-td bill-action">
                    &nbsp
                  </div>
                  @endif
                </div>
              </div>
            </div>
            @endif
            <div class="no-company @if(count($results)) hide @endif">
              <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M55.4393 9.32002C54.8989 9.17991 54.287 9.1667 53.3334 9.1667H30.0001C29.5508 9.1667 28.2923 9.16676 27.0315 9.19523C26.3994 9.2095 25.7865 9.23051 25.2842 9.26065C24.774 9.29126 24.5363 9.32358 24.4936 9.32938C24.4882 9.33012 24.4859 9.33042 24.4867 9.33024L24.4761 9.3328C24.035 9.43722 23.6321 9.66321 23.3131 9.98514C22.994 10.3071 22.7717 10.712 22.6713 11.154C22.6657 11.1785 22.6597 11.203 22.6534 11.2274C22.5133 11.7679 22.5001 12.3798 22.5001 13.3334V70.8334H57.5001V13.3334C57.5001 12.3897 57.4884 11.7611 57.3414 11.173L57.3338 11.1427C57.2294 10.7017 57.0036 10.2987 56.6816 9.9797C56.3597 9.66067 55.9548 9.43832 55.5128 9.33789C55.4882 9.33231 55.4637 9.32635 55.4393 9.32002ZM56.6577 4.47069C55.4568 4.16552 54.2637 4.16619 53.4285 4.16666C53.3963 4.16668 53.3646 4.1667 53.3334 4.1667H30.0001C29.5468 4.1667 28.2385 4.1667 26.9186 4.1965C26.2591 4.2114 25.5762 4.23414 24.9847 4.26963C24.4663 4.30073 23.8036 4.35153 23.3135 4.46983L23.9001 6.89999L23.3241 4.46729C21.9731 4.78715 20.7388 5.47948 19.7616 6.46564C18.7932 7.44279 18.1156 8.66961 17.8041 10.009C17.4989 11.21 17.4996 12.403 17.5 13.2383C17.5001 13.2705 17.5001 13.3022 17.5001 13.3334V73.3334C17.5001 74.7141 18.6194 75.8334 20.0001 75.8334H60.0001C61.3808 75.8334 62.5001 74.7141 62.5001 73.3334V13.3334C62.5001 13.3047 62.5001 13.2755 62.5001 13.2459C62.5005 12.3974 62.501 11.2058 62.1959 9.97548C61.8744 8.63043 61.1836 7.4018 60.2011 6.4282C59.224 5.45985 57.9972 4.78226 56.6577 4.47069Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2382 37.4999C13.2704 37.4999 13.3021 37.5 13.3333 37.5H19.9999C21.3806 37.5 22.4999 38.6192 22.4999 40V73.3333C22.4999 74.714 21.3806 75.8333 19.9999 75.8333H13.3333C8.28588 75.8333 4.16659 71.714 4.16659 66.6666V46.7096C4.13045 45.6059 4.2266 44.5017 4.45303 43.4207C4.46109 43.3822 4.47006 43.3439 4.47993 43.3059C4.80424 42.055 5.42958 40.8014 6.43216 39.7989C7.45985 38.7712 8.70847 38.141 9.97252 37.8133C11.1857 37.4988 12.3945 37.4994 13.2382 37.4999ZM13.3333 42.5C12.3797 42.5 11.7678 42.5132 11.2273 42.6533C10.6914 42.7922 10.2733 43.0288 9.96769 43.3344C9.7122 43.5899 9.47801 43.9849 9.33413 44.5075C9.19665 45.188 9.13985 45.8823 9.16496 46.5762C9.16605 46.6063 9.16659 46.6365 9.16659 46.6666V66.6666C9.16659 68.9526 11.0473 70.8333 13.3333 70.8333H17.4999V42.5H13.3333Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M66.6237 27.5C67.7274 27.4638 68.8316 27.56 69.9125 27.7864L69.4 30.2333L70.0274 27.8133C71.2783 28.1376 72.5319 28.763 73.5344 29.7655C74.5621 30.7932 75.1923 32.0419 75.52 33.3059C75.8344 34.5188 75.8338 35.6953 75.8334 36.5691C75.8334 36.6021 75.8333 36.6346 75.8333 36.6666V66.6666C75.8333 69.0978 74.8676 71.4294 73.1485 73.1484C71.4294 74.8675 69.0978 75.8333 66.6667 75.8333H60C58.6193 75.8333 57.5 74.714 57.5 73.3333V30C57.5 28.6193 58.6193 27.5 60 27.5H66.6237ZM68.8258 32.6675C68.1453 32.53 67.451 32.4732 66.7571 32.4983C66.7269 32.4994 66.6968 32.5 66.6667 32.5H62.5V70.8333H66.6667C67.7717 70.8333 68.8315 70.3943 69.6129 69.6129C70.3943 68.8315 70.8333 67.7717 70.8333 66.6666V36.6666C70.8333 35.6826 70.8204 35.1021 70.68 34.5607C70.5411 34.0247 70.3045 33.6067 69.9989 33.3011C69.7434 33.0456 69.3484 32.8114 68.8258 32.6675Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 20C30.833 18.6193 31.9523 17.5 33.333 17.5H46.6663C48.0471 17.5 49.1663 18.6193 49.1663 20C49.1663 21.3807 48.0471 22.5 46.6663 22.5H33.333C31.9523 22.5 30.833 21.3807 30.833 20Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 33.3334C30.833 31.9527 31.9523 30.8334 33.333 30.8334H46.6663C48.0471 30.8334 49.1663 31.9527 49.1663 33.3334C49.1663 34.7141 48.0471 35.8334 46.6663 35.8334H33.333C31.9523 35.8334 30.833 34.7141 30.833 33.3334Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 46.6666C30.833 45.2859 31.9523 44.1666 33.333 44.1666H46.6663C48.0471 44.1666 49.1663 45.2859 49.1663 46.6666C49.1663 48.0473 48.0471 49.1666 46.6663 49.1666H33.333C31.9523 49.1666 30.833 48.0473 30.833 46.6666Z" fill="#3D445C"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.833 60C30.833 58.6193 31.9523 57.5 33.333 57.5H46.6663C48.0471 57.5 49.1663 58.6193 49.1663 60C49.1663 61.3807 48.0471 62.5 46.6663 62.5H33.333C31.9523 62.5 30.833 61.3807 30.833 60Z" fill="#3D445C"/>
              </svg>
              <span class="title">
                @lang('message.no_results')
              </span>
            </div>
            
            @if($salary)
            <div class="bottom-results">
              <div class="stavka-block">
                <span class="result-title">@lang('message.stavka2'):</span>
                <div class="block-info">
                    <div class="info-item">
                        <span>@lang('message.stavka2'):</span>
                        {{$salary['oklad']}}
                    </div>
                    <div class="info-item">
                        <span>@lang('message.salary2'):</span>
                        {{$salary['stavka'] - $salary['tax']}}
                    </div>
                    <div class="info-item">
                        <span>@lang('message.taxes'):</span>
                        {{$salary['tax']}}
                    </div>
                </div>
              </div>
              <div class="payments-block">
                <span class="result-title">@lang('message.payments2'):</span>
                <div class="block-info">
                    <div class="info-item">
                        <span>@lang('message.paid_to_manager'):</span>
                        @php
                          $title = "";
                          $arr = [];
                          if($salary['paymentsList']){
                            foreach($salary['paymentsList'] as $d => $v){
                              $arr[] = date('d.m.Y', strtotime($d))." - ".$v." грн.";
                            }
                            $title = implode("<br>", $arr);
                          }
                        @endphp
                        @if($title)
                        <div class="al-payment-tip" title="{{$title}}">
                        @endif
                        {{$salary['card']}}
                        @if($title)
                        </div>
                        @endif
                    </div>
                    <div class="info-item">
                        <span>@lang('message.rest'):</span>
                        {{$salary['result']}}
                    </div>
                </div>
              </div>
              <div class="bonus-block">
                <span class="result-title">@lang('message.bonuses'):</span>
                <div class="block-info">
                    <div class="info-item">
                        <span>%:</span>
                        {{$salary['percent']}}
                    </div>
                    <div class="info-item">
                        <span>@lang('message.bonus'):</span>
                        {{$salary['bonus']}}
                    </div>
                    <div class="info-item">
                        <span>@lang('message.result_salary'):</span>
                        {{$salary['full']}}
                    </div>
                </div>
              </div>
              <div class="itogo-block">
                <span class="result-title">@lang('message.result_salary_on_hands'):</span>
                <div class="block-info">
                    <div class="info-item final-data">
                        {{$salary['result']}}
                    </div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@include('add.footer')
<div class="al-overlay3 hide zi10101"></div>
@include('front.crm.footer')
@include('front.crm.scripts')
<script>
  const main_url = '/manager/results';
  $('.al-power-tip').powerTip({placement: 's'});
  $('.al-payment-tip').powerTip({placement: 's'});
  $(document).ready(function(){
    $('.results-item').click(function(){
      const id = $(this).data('id');
      if($(this).hasClass('open')){
        $('#details-'+id).addClass('hide');
        $(this).removeClass('open');
        $(this).find('.arr').css("rotate","0deg");
      }else{
        $('#details-'+id).removeClass('hide');
        $(this).addClass('open');
        $(this).find('.arr').css("rotate","180deg");
      }  
    });
    $('#manager-results select').change(function(){
        $(this).closest('form').submit();
    })
    $('.price_in-input').change(function(){
        const id = $(this).data('id');
        if($(this).val() >= 0){
            $('tr[data-id='+id+']').find('.sum_in').text($(this).val());
        }
        $.post(
            '/manager/results/board/'+id+'/change-in-price',
            {
                'price': $(this).val(),
                @if(Auth::user()->role_id == 1)
                'user_id': $('[name=user_id] option:selected').val(),
                @endif
                'period': $('[name=report_period] option:selected').val()
            },
            function(data){
                console.log(id);
                $('tr[data-id='+id+']').find('.earning').text(data.earning);
                $('tr[data-id='+id+']').find('.ten-percent').text(data.ten_percent);
                $('tr[data-id='+id+']').find('.koef-bonus').text(data.koef_bonus);
                $('#result-'+data.client_id).find('.client-sum_in').text(data.sum_in);
                $('#result-'+data.client_id).find('.client-earning').text(data.client_earning);
                $('#result-'+data.client_id).find('.client-ten_percent').text(data.client_ten_percent);
                $('#result-'+data.client_id).find('.client-koef_bonus').text(data.client_koef_bonus);
            }
        )
    });
    $('.price_in-input--').change(function(){
        const id = $(this).data('id');
        if($(this).val() >= 0){
            $('tr[data-id='+id+']').find('.sum_in').text($(this).val());
        }
        $.post(
            '/manager/results/service/'+id+'/change-in-price',
            {
                'price': $(this).val(),
                @if(Auth::user()->role_id == 1)
                'user_id': $('[name=user_id] option:selected').val(),
                @endif
                'period': $('[name=report_period] option:selected').val()
            },
            function(data){
                console.log(id);
                $('tr[data-id='+id+']').find('.earning').text(data.earning);
                $('tr[data-id='+id+']').find('.ten-percent').text(data.ten_percent);
                $('tr[data-id='+id+']').find('.koef-bonus').text(data.koef_bonus);
                $('#result-'+data.client_id).find('.client-sum_in').text(data.sum_in);
                $('#result-'+data.client_id).find('.client-earning').text(data.client_earning);
                $('#result-'+data.client_id).find('.client-ten_percent').text(data.client_ten_percent);
                $('#result-'+data.client_id).find('.client-koef_bonus').text(data.client_koef_bonus);
            }
        )
    });
    $(document).scroll(function(){
      if($(window).scrollTop() > 416){
        $('.results-table-thead.data-thead').addClass('fixed');
      }else{
        $('.results-table-thead.data-thead').removeClass('fixed');
      }
    })

  })
</script>
<style>
.results-item .arr{
    margin-right: 10px;
}
.data-table .data-tr{
    font-family: 'Helvetica Neue';
    font-style: normal;
    font-weight: 500;
    font-size: 13px;
    line-height: 20px;
}
.data-table .data-tbody .data-tr.results-item .data-td{
  padding: 12px 10px;
}
.data-table .data-tbody .data-tr.results-item.open{
    background: #F9F9FA;
    border-bottom: none;
}
.results-details{
    background: #F9F9FA;
    border-bottom: solid 1px #cdd4d9;
    padding: 0 20px 20px
}
.results-details.hide{
    display:none;
}
#manager-results .report_period-select{
  width:227px;
}
.result-details-data table{
    background: #fff;
    width: 100%;
}
.result-details-data table tr{
    border-bottom: solid 1px #cdd4d9;
}
.result-details-data table tr td{
    padding: 23px 15px;
    font-family: 'Helvetica Neue';
    font-style: normal;
    font-weight: 700;
    font-size: 13px;
    line-height: 19px;
}
.result-name-td{
    width: 540px;
}
.result-details-data table tr.result-header-tr td{
    padding: 18px 15px;
    font-family: 'Helvetica Neue';
    font-style: normal;
    font-weight: 500;
    font-size: 11px;
    line-height: 13px;
}
.price_in-input,
.price_in-input--{
    width: 75px;
    background: #F6F7F9;
    border: 1px solid #CDD4D9;
    box-sizing: border-box;
    border-radius: 3px;
    font-family: /*'Helvetica Neue', Helvetica, 'helvetica',*/ Arial, sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 13px;
    line-height: 16px;
    color: #3D445C;
    padding: 5px 4px;
}
.results-table .data-td{
    flex: 0 0 106px !important
}
.results-table .data-td.w535.f6{
    flex: 0 0 353px !important;
}
.bottom-results{
    display:flex;
    height: 112px;
    margin:0 auto;
    justify-content:center;
    margin-top: 20px;
}
.stavka-block{
    flex: 0 0 300px;
    background: #F9F9FA;
    height: 112px;
    padding: 20px;
}
.payments-block{
    flex: 0 0 224px;
    background: #FFF0EC;
    height: 112px;
    padding: 20px 0 20px 34px;
}
.bonus-block{
    flex: 0 0 324px;
    background: #EDF7ED;    
    height: 112px;
    padding: 20px 0 20px 34px;
}
.itogo-block{
    flex: 0 0 202px;
    background: #EBF3FE;
    height: 112px;
    padding: 27px 0 0 35px;
}
.result-title{
    font-family: 'Helvetica Neue';
    font-style: normal;
    font-weight: 500;
    font-size: 15px;
    line-height: 18px;
    color: #3D445C;
}
.block-info{
    display: flex;
    margin-top: 15px;
}
.block-info .info-item{
    flex:1;
    font-family: 'Helvetica Neue';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: #3D445C;
}
.block-info .info-item span{
    display:block;
    margin-bottom:5px;
    font-weight: 400;
    color: #8B8F9D;
}
.block-info .info-item.final-data{
    font-weight: 700;
    font-size: 24px;
    line-height: 29px;
}
.fixed{
  position:fixed;
  /*left: 50%;*/
  top: 0;
  background:#fff;
  width:1260px;
  /*transform: translateX(-50%);*/
}
.bold{
  font-weight:700;
}
.number{
  display:inline-block;
  width:20px;
  text-align: right;
  margin-right:10px;
}
</style>
 