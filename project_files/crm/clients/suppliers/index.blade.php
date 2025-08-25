@include('add.head')
<body>
  @include('add.header')
  @include('add.menu')

  <section class="lead-block">
    <div class="container-fluid container-fluid-base">
      <div class="row no-gutters navigation-wrapper">
        <div class="container container-base">
          <a class="back" href="/manager/clients">
            <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.08909 0.410704C7.41453 0.736141 7.41453 1.26378 7.08909 1.58921L2.67835 5.99996L7.08909 10.4107C7.41453 10.7361 7.41453 11.2638 7.08909 11.5892C6.76366 11.9147 6.23602 11.9147 5.91058 11.5892L0.910582 6.58921C0.585145 6.26378 0.585145 5.73614 0.910582 5.4107L5.91058 0.410704C6.23602 0.0852667 6.76366 0.0852667 7.08909 0.410704Z" fill="#FC6B40"/>
            </svg>
            @lang('message.back')
          </a>
        </div>
        <div class="container  container-base">
          @include('front.crm.clients.header')
          @include('front.crm.clients.inner-menu')
          <div class="client-tab-data-block">
            <div class="info-block select-in-title-block">
              <h2 class="info-block-title" style="display: inline-block;">
                @lang('message.clients_suppliers')
              </h2>
              <select class="search-form-select" name="period" id="supplier-clients-placement-period">
              @foreach($periods as $k => $v)
                <option value="{{$k}}" @if($period == $k) selected @endif>{{$v}}</option>
              @endforeach
              </select>
            </div>
            @if(@count($suppliers))
            <div class="clients-contacts-data">
              <div class="suppliers-table">
                <div class="suppliers-thead">
                    <div class="supplier-col" id="order-name" data-dir="">
                      @lang('message.owner')
                      <span class="direction"></span>
                    </div>
                    <div class="supplier-col supplier-col-05" id="order-sum" data-dir="asc">
                      @lang('message.sum')
                      <span class="direction">&#9650;</span>
                    </div>
                    <div class="supplier-col supplier-col-05" id="order-paid" data-dir="">
                      @lang('message.paid2')
                      <span class="direction"></span>
                    </div>
                    <div class="supplier-col action-col">&nbsp;</div>
                </div>
                <div class="suppliers-tbody">
                @include('front.crm.clients.suppliers.rows')
                </div>
                <div class="suppliers-tfoot">
                  <div class="supplier-col">@lang('message.itogo')</div>
                  <div class="supplier-col supplier-col-05" id="wait-sum"></div>
                  <div class="supplier-col supplier-col-05" id="paid-sum"></div>
                  <div class="supplier-col action-col">&nbsp;</div>
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

<script type="text/javascript">
$('.al-power-tip').powerTip({placement: 's'});
$(document).ready(function(){
  let divList = $(".supplier-block");
  divList.sort(function(a, b){
    return $(a).data("sum")-$(b).data("sum")
  });
  $(".suppliers-tbody").html(divList);

  $('.supplier-block').each(function(){
    // console.log(parseFloat($(this).data('sum')));
    // console.log(parseFloat($(this).data('paid_sum')));

    document.clients_sum += parseFloat($(this).data('sum'));
    document.paidSum += parseFloat($(this).data('paid_sum'));
  })
  $('#wait-sum').empty().append(document.clients_sum);
  $('#paid-sum').empty().append(document.paidSum);

  $(document).on('click', '.suppliers-thead .supplier-col', function(){
    let dir = $(this).data('dir');
    let divList = $(".supplier-block");
    $('[data-dir]').data('dir','').find('span').empty();
    if($(this).attr('id') === 'order-paid'){
      if(dir === 'desc'){
        divList.sort(function(a, b){
          return $(a).data("paid_sum")-$(b).data("paid_sum");
        });
        $(".suppliers-tbody").html(divList);
        $(this).data('dir', 'asc').find('span').empty().append("&#9650;");
      }else{
        divList.sort(function(a, b){
          return ($(a).data("paid_sum")-$(b).data("paid_sum"))*(-1);
        });
        $(".suppliers-tbody").html(divList);
        $(this).data('dir', 'desc').find('span').empty().append("&#9660;");
      }
    }
    if($(this).attr('id') === 'order-sum'){
      if(!dir || dir === 'desc'){
        divList.sort(function(a, b){
          return $(a).data("sum")-$(b).data("sum");
        });
        $(".suppliers-tbody").html(divList);
        $(this).data('dir', 'asc').find('span').empty().append("&#9650;");
      }else{
        divList.sort(function(a, b){
          return ($(a).data("sum")-$(b).data("sum"))*(-1);
        });
        $(".suppliers-tbody").html(divList);
        $(this).data('dir', 'desc').find('span').empty().append("&#9660;");
      }
    }
    if($(this).attr('id') === 'order-name'){
      if(!dir || dir === 'desc'){
        divList.sort(function(a, b){
          if ($(a).data('name') < $(b).data('name')) {
            return -1;
          }
          if ($(a).data('name') > $(b).data('name')) {
            return 1;
          }

          return 0;
        });
        $(".suppliers-tbody").html(divList);
        $(this).data('dir', 'asc').find('span').empty().append("&#9650;");
      }else{
        divList.sort(function(a, b){
          if ($(a).data('name') > $(b).data('name')) {
            return -1;
          }
          if ($(a).data('name') < $(b).data('name')) {
            return 1;
          }
        });
        $(".suppliers-tbody").html(divList);
        $(this).data('dir', 'desc').find('span').empty().append("&#9660;");
      }
    }
  })
})
</script>
<style>
  [data-dir]{
    cursor:pointer;
  }
.supplier-block{
  border-bottom: solid 1px #CDD4D9;
}
.suppliers-thead,
.suppliers-tfoot,
.supplier-row{
  display: flex;
  align-items: center;
}

/* EDITED */
.supplier-col{
  flex: 1.2;
  padding: 10px;
  font-family: 'Helvetica Neue';
  font-style: normal;
  font-weight: 500;
  font-size: 13px;
  line-height: 20px;
  color: #3D445C;
} 
.supplier-row .supplier-col{
  padding: 10px;
} 
.supplier-col.action-col{
  flex:0.4;
  display:flex;
  justify-content: flex-end;
}

.second-line{
  display: block;
  margin-top: 2px;
  font-family: 'Helvetica Neue';
  font-style: normal;
  font-weight: 400;
  font-size: 13px;
  line-height: 20px;
  color: #8B8F9D;
}
.supplier-block.current{
  background: #F9F9FA;
}
.supplier-block.current .up-down svg{
  transform: rotateZ(180deg);
}

/* EDITED */
.supplier-row-selects{
  padding: 30px 28px 30px 18px;
}
.supplier-row-selects .supplier-row .supplier-col:first-child{
  padding-left: 10px;
}

.supplier-row-selects.hide{
  display:none;
}
.supplier-row-selects .supplier-info{
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}
.supplier-row-selects .supplier-info .supplier-info-item{
  /*flex: 1;*/
  display: flex;
  width: 50%;
  flex-shrink: 0;
}
.supplier-row-selects .supplier-info .supplier-info-item .name,
.supplier-row-selects .supplier-info .supplier-info-item .value{
  flex: 1;
  padding-bottom: 15px;
}
.supplier-row-selects .supplier-info .supplier-info-item .name{
  font-style: normal;
  font-weight: 400;
  font-size: 13px;
  line-height: 16px;
  color: #8B8F9D;
}
.supplier-row-selects .supplier-info .supplier-info-item .value a{
  color: #FC6B40;
}
.supplier-row-selects .right-block a{
  color:#FC6B40;
  display:flex;
  align-items: center;
}
.supplier-row-selects .right-block a svg{
  margin-right: 5px;
}
.informer,
.informer2{
  padding: 3.5px 4px;
  background: #FCE9E4;
  border-radius: 4px;
  color: #FC6B40;
  white-space: nowrap;
}
.informer.paid,
.informer2.paid{
  background: #adf8ad; /*#EDF7ED;*/
  color: #27a227; /*#4FB14B;*/
}
.informer.partial,
.informer2.partial{
  background: #FEF5ED;
  color: #F2994A;
}
.informer-date{
  font-size: 13px;
  line-height: 24px;
  color: #8B8F9D;
}
.supplier-col-05{
  flex:0.5;
}
</style>