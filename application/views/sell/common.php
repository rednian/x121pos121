
<style type="text/css">
  body{
    color: #1a1b17;
  }
  #table-list > tr > td{
    font-family: Courier New !important;
  }

  .editable-input input{
    width: 100% !important;
  }
  .popover{
    z-index: 1000 !important;
  }
  .btn-link {
      /*font-weight: 400;*/
      color: #0c0a04;
      /*border-radius: 0;*/
  }
</style>

<?php $this->load->view('sell/include/reimburse'); ?>
<?php $this->load->view('sell/include/artist-dialog'); ?>
<?php $this->load->view('sell/include/artist-package-dialog'); ?>
<?php $this->load->view('sell/include/confirm'); ?>
<?php $this->load->view('sell/include/comfirm-package'); ?>
<?php $this->load->view('sell/include/confirm-product'); ?>
<?php $this->load->view('sell/include/confirm-discard'); ?>

<section class="row hide">
  <col class="sm-6">
    <form id="frm-confirm">
      <div class="form-group">
        <label>Enter Password</label>
        <input type="password" name="password" class="form-control input-sm" autofocus autocomplete="off"> 
      </div>  
      <div class="form-group">
        <input type="submit" name="password" class="btn btn-success btn-xs" value="Confirm"> 
        <input type="button" name="cancels" class="btn btn-danger btn-xs" value="Cancel"> 
      </div>
    </form>
  </col>
</section>

<div class="modal fade bs-example-modal-sm" tabindex="-1" id="add-qty" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <p>Press <code> Esc</code> to Exit.</p>
        </div>    
        <form class="form-horizontal" method="post" id="frm-qty">
          <div class="form-group">  

            <label for="inputEmail3" class="col-sm-5 control-label">Add Quantity</label>

            <div class="col-sm-7">
              <input name="input-qty" type="text" class="form-control" value="1" id="input-qty" autocomplete="off" autofocus="">
              <input name="input-bc_id" type="hidden" class="form-control" id="input-bc_id" autocomplete="off">
              <input name="input-stock_in_id" type="hidden" class="form-control" id="input-stock_in_id" autocomplete="off">
              <input name="price" type="hidden" class="form-control" id="price" autocomplete="off">
              <input name="mark_up" type="hidden" class="form-control" id="mark_up" autocomplete="off">
              <input name="vat" type="hidden" class="form-control" id="vat" autocomplete="off">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- modal for qty in barcode -->

<div class="modal fade barcode-qty" id="barcode-qty" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <section class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form" method="post" action="" id="frm-barcode">
            <div class="form-group">
            <label>Enter Quantity</label>
              <input type="text" name="qty" id="barcode-input-qty" class="form-control input-sm" value="1" autofocus="" autocomplete="off">
            </div>
          </form>
        </div>
      </section>
      
    </div>
  </div>
</div>
<?php //include 'services_avail.php'?>
<!--quantity modal-->
<section id="content" class="content">
  <section class="row">
    <div class="col-md-7">
      <section class="panel">
        <div class="panel-heading  panel-sochic">
          <div class="form-group">
            <div class="col-sm-2">
              <em>Available Item <span class="badge badge-danger" id="prod-count"></span></em>

<!--              <select name="filter" id="filter" class="form-control input-sm">-->
<!--                <option value="selected" selected disabled>filter search</option>-->
<!--                <option value="products">Products</option>-->
<!--                <option value="services">Services</option>-->
<!--                <option value="packages">Packages</option>-->
<!--              </select>-->
            </div>
            <div class="col-sm-10">

              <div class="input-group">
                <input type="search" class="form-control input-sm" id="search">
                  <span class="input-group-btn">
                    <button id="btn-search" type="button" class="btn btn-success btn-sm"><span class="fa fa-search"></span> Search</button>
                  </span>
              </div>
            </div>

          </div>
        </div>

        <div class="panel-body">

          
          <!-- <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target=".avail">Services Availed</button> -->
          <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab"></a>
              </li>
              <li role="presentation">
<!--                <a href="#service-tab" aria-controls="service-tab" role="tab" data-toggle="tab">Services <span class="badge badge-danger" id="service-count"></span></a>-->
              </li>
<!--              <li role="presentation"><a href="#package" aria-controls="package" role="tab" data-toggle="tab">Packages <span class="badge badge-danger" id="package-count"></span></a>-->
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home" style="padding: 1%; height:400px;overflow: auto "></div>
              <div role="tabpanel" class="tab-pane" id="service-tab" style="padding: 1%; height:400px;overflow: auto "></div>
              <div role="tabpanel" class="tab-pane" id="package" style="padding: 1%; height:400px; overflow-x: hidden; overflow-y: auto;"></div>
            </div>

          </div>


        </div>  
      </section>

    </div>
    <div class="col-md-5">
      <section class="panel">
        <div class="panel-heading panel-sochic">
          <div style="display:inline;">CHECKOUT<small><span class="badge badge-danger" id="list-count"> </span> item(s)</small></div>
           <button id="btn-report" class="btn btn-white btn-xs pull-right"><span class="fa fa-file-text-o text-success"></span>
            Report(F2)
          </button>
           <button id="btn-reimburse" class="btn btn-white btn-xs pull-right"  data-toggle="modal" data-target="#reimburse-modal"><span class="fa fa-plus-square text-success"></span>
          Reimburse(F4)
          </button>
          <button id="btn-discard" class="btn btn-white btn-xs pull-right" ><span class="fa fa-trash text-danger"></span>
            Discard(F7)
          </button>
          <section class="row">
            <div class="col-md-12 col-sm-12">
              <div class="" style="margin-top:2%;">
                <section class="row">
                  <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" placeholder="Enter Barcode" autofocus="" autocomplete="off" id="add-prod-barcode" />
                        <span class="input-group-addon btn-xs"><i class="fa fa-barcode text-success"></i></span>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
        <div class="panel-body">
          <section id="" style="width: 100%; border: 1px solid #dddddd;height: 500px; padding:3%; ">

              <div style="height: 250px;overflow: hidden">
                <table class="table" id="table-list-stock">
                  <thead style="border-bottom:1px solid #ddd">
                  <tr>
                    <td class="col-xs-3">DESC</td>
                    <td>QTY</td>
                    <td>PRICE</td>
                    <td class="col-xs-3">%</td>
                    <td class="col-xs-3">Total</td>
                    <td class="col-xs-1"></td>  
                  </tr>
                  </thead>
                </table>
<!--                <table class="table" id="table-list-service" >-->
<!--                  <thead >-->
<!--                  <tr class="" style="border-bottom:1px solid #ddd">-->
<!--                    <td class="col-xs-3"></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td class="col-xs-3"></td>-->
<!--                    <td class="col-xs-1"></td>-->
<!--                  </tr>-->
<!--                  </thead>-->
<!--                </table>-->
<!--                <table class="table" id="table-list-package" >-->
<!--                  <thead >-->
<!--                  <tr class="" style="border-bottom:1px solid #ddd">-->
<!--                    <td class="col-xs-3"></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td class="col-xs-3"></td>-->
<!--                    <td class="col-xs-1"></td>-->
<!--                  </tr>-->
<!--                  </thead>-->
<!--                </table>-->
              </div>

              <div style="border-top: 1px solid #dddddd">
                <section class="row">
                  <div class="col-xs-6"><h5 class="dark-font"> Sub Total</h5></div>
                  <div class="col-xs-6"><h5 class="pull-right dark-font" style="margin-right: 15%">&#8369;
                      <strong id="sub-total" class="dark-font"></strong></h5></div>
                </section>
                <section class="row">
                  <div class="col-xs-6"><h5 class="dark-font">Discount </h5></div>
                  <div class="col-xs-6"><h5 class="pull-right dark-font" style="margin-right: 15%"> <span> - </span>
                   &#8369;
                    <strong id="discount" class="dark-font"></strong></h5></div>
                </section>
                <section class="row">
                  <div class="col-xs-6"><h5 class="dark-font">VAT(12%)</h5></div>
                  <div class="col-xs-6">
                    <h5 class="pull-right dark-font" style="margin-right: 15%">&#8369;
                      <srtrong id="vat-out" class="dark-font"></srtrong>
                    </h5>
                  </div>
                </section>
<!--                <section class="row" style="border-top: 1px solid #dddddd;border-bottom: 1px solid #dddddd; margin-bottom: 1%">-->
<!--                  <div class="col-xs-3">-->
<!--                    <h5 class="dark-font" style="font-size:30px !important">Total</h5>-->
<!--                  </div>-->
<!--                  <div class="col-xs-9">-->
<!---->
<!--                  </div>-->
<!--                </section>-->
                <section class="form-group">
                  <button id="btn-sale" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-lg btn-success btn-block">
                    <span class="pull-left">PAY</span>
                    <h5 class="pull-right dark-font" style="margin-right: 15%; font-size:45px !important">
                      <strong class="total pull-right dark-font" style="font-size:45px !important"></strong>
                    </h5>

                  </button>
                </section>
                <section class="clearfix"></section>
              </div>

            
         
        </div>
      </section>
      
      
     
     
      
  </section>
</section>


<!--modal payment-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" data-backdrop="true" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding: 1%">

      <button type="button" class="btn btn-success btn-xs pull-right" data-dismiss="modal" style="margin-bottom: 1%"><span></span> Back to Sale</button>
      <!-- <div class="clearfix"></div> -->
      <section class="row">
        <div class="col-md-6">
          <section class="receipt-container" style="border:1px solid #ddd; max-height:500px; padding:5% 2%; min-height:500px; overflow:auto;">
    
          <table id="table-list" class="table">
            <thead >
              <tr style="border-bottom:1px dotted #ddd; width:100%">
                <td class="col-md-5">ITEM</td>
                <td class="col-md-2">QTY</td>
                <td class="col-md-1"></td>
                <td class="col-md-3">PRICE</td>
              </tr>
            </thead>
            <tfoot>
              <tr style="border-top:1px dotted #ddd;">
                <th>Sale Total</th>
                <th></th>
                <th></th>
                <th>&#8369;&nbsp;&nbsp;<strong id="sale-total"></strong></th>
              </tr>
              <tr>
                <th>Cash</th>
                <th></th>
                <th></th>
                <th>&#8369;&nbsp;<strong id="cash"></strong></th>
              </tr>
              <tr>
                <th>Change</th>
                <th></th>
                <th></th>
                <th>&#8369;&nbsp;<strong id="sale-change"></strong></th>
              </tr>
              <!-- <p></p> -->
              <tr>
                <th>TOTAL INVOICE</th>
                <th></th>
                <th></th>
                <th>&#8369;&nbsp;<strong id="total-invoice"></strong></th>
              </tr>
              <tr>
                <th>Total Discount</th>
                <th></th>
                <th></th>
                <th>&#8369;&nbsp;<strong id="total-sale"></strong></th>
              </tr>
              <tr>
                <th>Vat</th>
                <th></th>
                <th></th>
                <th >&#8369;&nbsp;<strong id="sale-vat"></strong></th>
              </tr>
              <tr>
                <th>Amount Due</th>
                <th></th>
                <th></th>
                <th>&#8369;&nbsp;<b><strong id="amount-due"></strong></b></th>
              </tr>

            </tfoot>
          </table>
          </section>
        </div>
        <div class="col-md-6">
          <form action="#" id="frm-finish">
            <section class="row">
              <div class="col-sm-5"><h3>PAYABLE</h3></div>
              <div class="col-sm-6 col-sm-offset-1">
                <div class="form-group">
                  <input type="text" name="payable" id="payable" class="form-control total input-lg" autocomplete="off" readonly="" />
                  <input type="hidden" id="payable-amount"/>
                  <input type="hidden" id="txt-recieve-amount"/>
                </div>
              </div>
            </section>
            <section class="row">
              <div class="col-sm-5"><h3>RECEIVED</h3></div>
              <div class="col-sm-6 col-sm-offset-1">
                <div class="form-gr oup">
                  <input type="text" name="received" id="received" class="form-control input-lg" autocomplete="off"
                    autofocus=""/>
                    <input type="hidden" name="" id="received-hidden">
                </div>
              </div>
            </section>
            <section class="row">
              <div class="col-sm-5"><h3>CHANGE</h3></div>
              <div class="col-sm-6 col-sm-offset-1">
                <div class="form-group">
                  <input type="text" name="" id="change" class="form-control input-lg" autocomplete="off" readonly/>
                </div>
              </div>
            </section>
            <section class="row">
              <div class="col-sm-5"><h3>Card Number</h3></div>
              <div class="col-sm-6 col-sm-offset-1">
                <div class="form-group">
                  <input type="text" name="card_number" id="card_number" class="form-control input-lg"
                    autocomplete="off"/>
                </div>
              </div>
            </section>
            <button type="submit" id="btn-finish" class="btn btn-success btn-lg btn-block" >Finish Transaction</button>
          </form>
        </div>
      </section>
    </div>
  </div>
</div>

<div data-service-sale="" data-service-vat="" id="data-service"></div>
<div id="print-report" class="hide">
    
</div>
<div id="reciept" class="hide">
  
</div>
<div data-service-price="0" data-service-vat="0" data-total="0" id="service-calculate" ></div>
<script>


$(document).ready(function () {


  var prod = $('#prod-display').DataTable();

 package_temp();
  load_package();
    get_total();
    add_by_barcode();
    get_report();
    load_temp_service();
    finish_transaction();
    $('#list-count').html('0');
    load_product();
    load_services();
    display_sales();
    search();


  $('#received').change(function(){
    $('#received-hidden').val($(this).val());
  });



 $('#print-cash').html();
 $('#print-change').html();

  


  $('#received').autoNumeric();
  $('#sale-change').autoNumeric();
  $('#payable').autoNumeric();
  $('#change').autoNumeric();
  $('#change').autoNumeric('set', 0.00);


  $("#add-prod-barcode").focus(function () {
    // $(this).val('');
    // alert('alert');
  });


  $('#received').on('keyup change', function () {

       $('#cash').html($(this).val());

    var payable = $('#payable').autoNumeric('get');
    var received = $('#received').autoNumeric('get');
    var change = received - payable;
    $('#change').autoNumeric('set', change);
    $('#sale-change').autoNumeric('set', change);
  });

  





  $('.modal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
  });


 


 
  

  $("form#frm-qty").on("submit", function (e) {
    e.preventDefault();
    if (!isNaN($('#input-qty').val())) {
      checkout_product($('#input-bc_id').val(), $('#input-stock_in_id').val(), $('#input-qty').val(),
        $('#price').val(), $('#mark_up').val(), $('#vat').val());
    }
  });


});
/*end of document ready function*/

function get_total(){
  $.ajax({
    url:'<?php echo base_url('sell/get_total') ?>',
    dataType:'JSON',
    success:function(data){
      $.each(data, function(index, data){
        
        $('#sub-total').html(data.sub_total);
        $('#vat-out').html(data.vat_total);
        $('#discount').html(data.discount_total);
        $('.total').html(data.grand_total);


          /*for checkout display*/
          $('#payable').val(data.grand_total)
          $('#sale-total').html(data.grand_total);
          $('#total-invoice').html(data.grand_total);
          $('#amount-due').html(data.grand_total);
          $('#total-sale').html(data.grand_total);
          $('#sale-vat').html(data.vat_total);
          $('#total-sale').html();
          
      }); 
    }
  });
}

function search() {


  $('#search').on('keyup change', function () {

    $.ajax({
      url: '<?php echo base_url('sell/search_products'); ?>',
      type: 'POST',
      data: {search: $('#search').val()},
      dataType: 'json',
      success: function (data) {

        if(data < 1){
          $('#prod-count').html('0');
        }

        $('#home').html('');
        $.each(data, function (index, data) {

          $('#home').append(data.product);
          $('#prod-count').html(data.count);
        });
        $("#home").LoadingOverlay("hide", true);

      },
      beforeSend: function () {
        $("#home").LoadingOverlay("show", {
          image: "",
          fontawesome: "fa fa-circle-o-notch fa-spin spin"
        });
      }
    });
  });



  $('#filter').change(function () {
    var val = $(this).val();

    /*search products*/
//    if (val == 'products') {



//    }

    if(val == 'services'){
      $('#search').on('keyup change', function () {
       
        $.ajax({
          url: '<?php echo base_url('sell/search_services'); ?>',
          type: 'POST',
          data: {search: $('#search').val()},
          dataType: 'json',
          success: function (data) {

            $('#service-tab').html('');

    

            $.each(data, function (index, data) {

              $('#service-tab').append(data.service);
            //   // $('#prod-count').html(data.count);
            });

            $("#service-tab").LoadingOverlay("hide", true);

          },
          beforeSend: function () {
            $("#service-tab").LoadingOverlay("show", {
              image: "",
              fontawesome: "fa fa-circle-o-notch fa-spin spin"
            });
          }
        });
      });
    }


        if(val == 'packages'){
      $('#search').on('keyup change', function () {
       
        $.ajax({
          url: '<?php echo base_url('sell/search_packages'); ?>',
          type: 'POST',
          data: {search: $('#search').val()},
          dataType: 'json',
          success: function (data) {

            $('#package').html('');
            $.each(data, function (index, data) {

              $('#package').append(data.package);
              // $('#prod-count').html(data.count);
            });
            $("#package").LoadingOverlay("hide", true);

          },
          beforeSend: function () {
            $("#package").LoadingOverlay("show", {
              image: "",
              fontawesome: "fa fa-circle-o-notch fa-spin spin"
            });
          }
        });
      });
    }

  });


}




function finish_transaction() {

  $('#frm-finish').submit(function (e) {
               

    e.preventDefault();
    // alert(parseFloat($('#payable').val()));
    // alert(parseFloat($('#received').val()));

var r  = parseFloat($('#received-hidden').val().replace(/,/g, ''));
var p = parseFloat($('#payable').val().replace(/,/g, ''));

    if ( p <= r && parseFloat($('#payable').val()) <= r ) {

      // $('#btn-finish').attr('disabled',true);


      $.ajax({
        url:'<?php echo base_url('sell/print_receipt'); ?>',
        dataType:'html',
        type:'post',
        data:{change:$('#change').val(), cash:$('#received').val()},
        success:function(data){



          if(data){
              $.ajax({
                url: '<?php echo base_url('sell/finish_trans'); ?>',
                type: 'POST',
                data:{card_number:$('#card_number').val()},
                dataType: 'html',
                success: function (data) {


       

                  display_sales();
                  
                  load_product();

                   $('#table-list-package').DataTable().ajax.reload();

                   load_temp_service();
                  $('#list-count').html('0');
                  $('.modal').modal('hide');
                  new PNotify({
                    type:'success',
                    text:'Transaction Finish',
                    animate: {
                      animate: true,
                      in_class: 'bounceInLeft',
                      out_class: 'bounceOutRight'
                    }
                  });
              
                /*reload the page*/
                 // location.reload(); 

                }
              });


            // $('#reciept').html(data);
            // print_receipt($('#reciept').html());
          }
        }
      });




      // print_receipt($('#table-list').html());

    }
    else{

      /*notify if the payment is less than the payable*/
      new PNotify({
        type:'warning',
        text:'Amount payable is greater than the amount received.'
      });
    }

  });


}




/*--------------------------------------*/
/*----------[ artist  ]---------------*/
/*--------------------------------------*/


  

/*--------------------------------------*/
/*----------[ package  ] ---------------*/
/*--------------------------------------*/


function package_temp(){
  $('#table-list-package').DataTable({
    ajax:'<?php echo base_url('sell/load_package_temp'); ?>',
     destroy: true,
        "bPaginate": false,
        "bFilter": false,
        "bInfo": false,
        "bSort": false,
        // "oLanguage": {
        //   "sSearch": "Search Services:"
        // },
    columns:[
      {'data':'name'},
      {'data':'qty'},
      {'data':'price'},
      {'data':'discount'},
      {'data':'total'},
      {'data':'action'},
    ],
     initComplete:function(setting, json){
      // $.each(json,function(index,data){
      //   $.each(data,function(index, data){
      //       $('#list-count').html(data.count);
      //   });
      // });

      get_total();
      add_discount_package();

     

    }
  });
}

function load_temp_service(){
    var oTable = $('#table-list-package').DataTable({
      ajax:'<?php echo base_url('sell/service_temp_load'); ?>',
    destroy: true,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "language": {
      "emptyTable": " "
    },
     columns: [
          { "data": "package" },
          { "data": "qty" },
          { "data": "price" },
          { "data": "discount" },
          { "data": "total" },
          { "data": "remove" },
      ],
     initComplete:function(setting, json){
      // $.each(json,function(index,data){
      //   $.each(data,function(index, data){
      //       $('#list-count').html(data.count);
      //   });
      // });

      // get_total();
      add_discount_service();
      get_total();

     

    }
  });
}

function add_package_temp(id){
  $.ajax({
    url:'<?php echo base_url('sell/add_package_temp'); ?>',
    data:{id:id},
    type:'POST',
    success:function(){
      $('#table-list-package').DataTable().ajax.reload();
       get_total();
    }
  });
}

function load_package() {
  $.ajax({
    url: '<?php echo base_url('sell/load_packages'); ?>',
    dataType: 'JSON',
    success: function (data) {

      $('#package').html('');

      $.each(data, function (index, data) {

        $('#package').append(data.package);
        $('#package-count').html(data.count);

      });

    },
    beforeSend: function () {
     
    },
    error: function (xhr, status) {
      console.log(status);
    }

  });
}



/*--------------------------------------*/
/*----------[ services  ]---------------*/
/*--------------------------------------*/

function load_temp_service(){
    var oTable = $('#table-list-service').DataTable({
      ajax:'<?php echo base_url('sell/service_temp_load'); ?>',
    destroy: true,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "language": {
      "emptyTable": " "
    },
     columns: [
          { "data": "service" },
          { "data": "qty" },
          { "data": "price" },
          { "data": "discount" },
          { "data": "total" },
          { "data": "remove" },
      ],
     initComplete:function(setting, json){
      // $.each(json,function(index,data){
      //   $.each(data,function(index, data){
      //       $('#list-count').html(data.count);
      //   });
      // });

      get_total();
      add_discount_service();

     

    }
  });
}




function get_service_detail(id) {
  display_sales();
  $.ajax({
    url: '<?php echo base_url('sell/service_avail_add'); ?>',
    dataType: 'html',
    type: 'POST',
    data: {id: id},
    success: function (data) {

        load_temp_service();
        get_total();
    
    }
  });
}


function load_services() {
  $.ajax({
    url: '<?php echo base_url('sell/load_services'); ?>',
    dataType: 'JSON',
    success: function (data) {
      $('#service-tab').html('');
      $.each(data, function (index, data) {
        $('#service-tab').append(data.service);
        $('#service-count').html(data.count);
      });

    },
    beforeSend: function () {                    
     
    },
    error: function () {
      alert('services error load')
    }

  });
}

/*--------------------------------------*/
/*----------[ products  ]---------------*/
/*--------------------------------------*/

function add_by_barcode(){

 $('#add-prod-barcode').on('change', function () {
    $("#barcode-qty").modal({backdrop: "static"});

  $("#barcode-input-qty").focus(function () {
    $(this).select();
  });
  
  $('#frm-barcode').submit(function(e){
    $('#barcode-qty').modal('hide');

    e.preventDefault();
    $.ajax({
      url: '<?php echo base_url('sell/add_by_barcode');?>',
      data: {barcode: $('#add-prod-barcode').val(), qty: $('#barcode-input-qty').val()},
      dataType: 'html',
      type: 'POST',
      success: function (data) {
        if(data == 1){
          display_sales();
        $('#add-prod-barcode').val('');
        $('#barcode-input-qty').val('1');
        }
      
      }
    });
  });
   

  });
}

function set_qty(bc_id, stock_id, price, mark_up,vat) {
  $("#add-qty").modal({backdrop: "static"});
  $("input:text").focus(function () {
    $(this).select();
  });
 
  $('#input-bc_id').val(bc_id);
  $('#input-stock_in_id').val(stock_id);
  $('#price').val(price);
  $('#mark_up').val(mark_up);
  $('#vat').val(vat);
}

function checkout_product(bc_id, stock_in_id, qty, price, mark_up, vat) {

  $.ajax({
    url: '<?php echo base_url('sell/stock_out_product');?>',
    data: {bc_id: bc_id, stock_in_id: stock_in_id, qty: qty, price: price, mark_up: mark_up, vat:vat, discount:0},
    type: 'POST',
    dataType: 'html',
    success: function (data) {    

      $('#input-bc_id').val('');
      $('#input-stock_in_id').val('');
      $('#input-qty').val('1');
      $('#search').val('');
      load_product();
      $('#add-qty').modal('hide');
      if (data != 0 && data != 1) {
        new PNotify({
          type: 'warning',
          text: data
        });
      }

      display_sales();
    },
    error: function (data) {
      alert('error on stock out')
    }

  });
}



function add_discount_package(){  
  $('.value').editable({
   placement:'bottom',
   showbuttons:false,
   url :'<?php echo base_url('sell/add_discount_package'); ?>',
   title :'Enter Discount',
   success: function(response, newValue) {
     if (response == 1) {
     package_temp();
     }
   },
   validate:function(value){
     if($.trim(value)== ''){
       return 'This field is requiered';
     }
   }
  });
}

function add_discount_service(){  
  $('.value').editable({
   placement:'bottom',
   showbuttons:false,
   url :'<?php echo base_url('sell/add_discount_service'); ?>',
   title :'Enter Discount',
   success: function(response, newValue) {
     if (response == 1) {
       display_sales();
     }
   },
   validate:function(value){
     if($.trim(value)== ''){
       return 'This field is requiered';
     }
   }
  });
}

function add_discount(){  
  $('.value').editable({
   placement:'bottom',
   showbuttons:false,
   url :'<?php echo base_url('sell/add_discount'); ?>',
   title :'Enter Discount',
   success: function(response, newValue) {
     if (response == 1) {
       display_sales();
     }
   },
   validate:function(value){
     if($.trim(value)== ''){
       return 'This field is requiered';
     }
   }
  });
}

function display_sales() {

  /*populate table with the purchase products*/
  var oTable = $('#table-list-stock').DataTable({
    ajax:'<?php echo base_url('sell/product_stock_out_list');  ?>',
    proccesing:true,
    destroy:true,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    language: {
      "emptyTable": " "
    },
    columns: [
         { "data": "name" },
         { "data": "quantity" },
         { "data": "price" },
         { "data": "discount" },
         { "data": "sub" },
         { "data": "remove" },
     ],
    initComplete:function(setting, json){
     $.each(json,function(index,data){
       $.each(data,function(index, data){
           $('#list-count').html(data.count);
       });
     });

     get_total();
     add_discount();

    

   }

  });
}

function load_product() {
  $('#home').html('');
  $.ajax({
    url: '<?php echo base_url('sell/load_product'); ?>',
    cache:true,
    dataType: 'json',
    success: function (data) {


      // localStorage.setItem('object',JSON.stringify(data));
      // var object = localStorage.getItem();


      $.each(data, function (index, data) {



        $('#home').append(data.product);
        $('#prod-count').html(data.count);
        
      });

      $("#home").LoadingOverlay("hide", true);

    },
    beforeSend: function () {
      $("#home").LoadingOverlay("show", {
        image: "",
        fontawesome: "fa fa-circle-o-notch fa-spin fa-2x spin"
      });
    }
    // error: function () {
    //   alert('error loading of products. this will force you to logout to fix the error.');
    // }
  });
}

/*---------------------------------------------------------------*/
/*----------[ prints receipt and cashier report  ]---------------*/
/*---------------------------------------------------------------*/

function get_report(){
  $('#btn-report').click(function(){
      $.ajax({
        url:'<?php echo base_url('sell/get_cashier_report'); ?>',
        dataType:'html',
        success:function(data){
            $('#print-report').html(data);  

          print_page($('#print-report').html());
        }
      });

  });
}

function print_page(data) {
     var mywindow = window.open('', 'my div', 'height=50,width=100');
     mywindow.document.write('<html><head><title>POS Sales Invoice</title>');
     mywindow.document.write('<style rel="stylesheet">h1,h2, h3, p,td{font-size:10px; margin:0; padding:0;}</style>');
     mywindow.document.write('</head><body >');
     mywindow.document.write(data);
     mywindow.document.write('</body></html>');

     mywindow.document.close(); // necessary for IE >= 10
     mywindow.focus(); // necessary for IE >= 10

     mywindow.print();
     mywindow.close();

     return true;
 }


 function print_receipt(data) {
      var mywindow = window.open('', 'my div', 'height=600,width=300');
      mywindow.document.write('<html><head><title>POS Sales Invoice</title>');
      mywindow.document.write('<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">');
      mywindow.document.write('<link href="<?php echo base_url('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" rel="stylesheet">');
      mywindow.document.write('<style rel="stylesheet">h1,h2, h3, p,td{font-size:10px; margin:0; padding:0;}</style>');
     
 
      mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');

      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10

      mywindow.print();
      mywindow.close();

      return true;
  }

  /*---------------------------------------------------------------*/
  /*----------[ keyboard events  ]---------------*/
  /*---------------------------------------------------------------*/

  $(document).keydown(function (e) {
    if (e.keyCode == 118) { //F7
        $('#btn-discard').click();
    }
  });

  $(document).keydown(function (e) {
    if (e.keyCode == 115) { //F4
      $('#btn-reimburse').click();
    }
  });

  $(document).keydown(function (e) {
    if (e.keyCode == 113) { //F2
        $('#btn-report').click();
    }
  });

  // $(document).keydown(function (e) {
  //   if (e.keyCode == 13) { //enter
  //       $('#btn-finish').click();
  //   }
  // });


</script>


