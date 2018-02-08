<section class="row" id="table-load">

  <div class="col-md-3">
    <section class="form-group">
      <h5>select date range</h5>

      <div class="input-group">
        <input id="package" type="text" class="form-control input-sm" placeholder="Select date">
        <span class="input-group-addon btn" id="btn-all-refresh" style="border-radius: 0"><span class=" fa
        fa-refresh text-success"></span></span>
      </div>
    </section>
  </div>

  
</section>

<section class="row">
  <div class="col-md-12">
  <div class="panel panel-default" style="border: 1px #ddd solid">
    <div class="panel-heading">
      <h4  class="text-center">Sochic Salon</h4>
      <h3  class="text-center" style="margin-bottom:5%">SUMMARY OF REPORTS</h3>
      <section class="row">
        <div class="col-md-8 col-md-offset-2">
          <table class="table table-sochic">
            <thead>
              <tr>
                <th></th>
                <th>Gross Income</th>
                <th>Net Income</th>
              </tr>
              <tbody>
                <tr>
                  <td>Products</td>
                  <td class="total-product"></td>
                  <td class="total-product-net"></td>
                </tr>
                <tr>
                  <td>Packages &amp; Services</td>
                  <td class="total-services"></td>
                  <td class="total-commission"></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Total</th>
                  <th class="total-all-gross"></th>
                  <th class="total-all-net"></th>
               
                 
                </tr>
                <tr>
                  <th>Total Artist Commissions</th>
                  <th class="artits-commission"></th>
                     <th></th>
                </tr>
              </tfoot>
            </thead>
          </table>
        </div>
      </section>
    </div>
    <div class="panel-body"></div>
  </div>
    <section class="panel panel-default" style="border: 1px #ddd solid">
      <div class="panel-heading" >
        <h5 style="text-transform: capitalize;" class="text-center">total sales : product</h5>
      </div>
      <div class="panel-body">
        <table id="package-report" class="table table-bordered table-sochic" style="margin-top: 5%;">
          <thead>
          <tr>
            <th class="col-sm-2">Date</th>
            <th class="col-sm-3">Particulars</th>
            <th class="col-sm-2">Amount</th>
            <th class="col-sm-2">QTY</th>
            <th class="col-sm-1">Total Amount  <br/>(gross Income)</th>
          </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="4">Total</th>
              <th class="total-all-gross"></th>
            </tr>
          </tfoot>

        </table>
      </div>
    </section>


  </div>
</section>

<script>

  $(document).ready(function () {

    $('#btn-all-refresh').click(function() {
      package_sales('', '');
      $('#package').val('');
    });

      package_sales('', '');


        $('#package').daterangepicker({
          "ranges": {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },

          "alwaysShowCalendars": true,
          "startDate": moment().format('DD/MM/YYYY'),
          "endDate": moment().format('DD/MM/YYYY')

        }, function (start, end, label) {                                                                                               

          var start = start.format('YYYY-MM-DD');
          var end = end.format('YYYY-MM-DD');



          $('.total-nets').html('0.00');
          $('.total-product').html('0.00');
          $('.total-services').html('0.00');
          $('.total-commission').html('0.00');
          $('.total-product-net').html('0.00');
          $('.total-all-gross').html('0.00');
          $('.total-all-net').html('0.00');
          $('.artits-commission').html('0.00');




                package_sales(start, end);

        });

   





   




  });


  function package_sales(start, end){

   var url = '<?php echo base_url('reports/summary_reports');  ?>';
   var type = 'GET';

    if(start != '' && end != ''){
      url = '<?php echo base_url('reports/summary_reports');  ?>';
      type ='POST'; 
    }


    var oTable = $('#package-report').dataTable({
      order: [[ 1, "desc" ]],
      destroy:true,
      // bSort:false,
      searching:false,
      pageLength:100,
      language: {
        "sSearch": "Search"
      },
      ajax:{
        url: url,
        type:type,
        data: {start: start, end: end},
        dataType: 'json'
      },
              dom: 'Bfrtip',
              buttons: [
          {
              extend:    'csv',
              text:      '<i class="fa fa-file-excel-o text-success"></i>',
              titleAttr: 'CSV',
              className:'btn btn-sm btn-white'
          },
          {
              extend:    'pdf',
              text:      '<i class="fa fa-file-pdf-o text-danger"></i>',
              titleAttr: 'PDF',
              className:'btn btn-sm btn-white'
          },
          {
              extend:    'print',
              text:      '<i class="fa fa-print"></i>',
              // titleAttr: 'print',
              className:'btn btn-sm btn-white',
              exportOptions: {
                             columns: ':visible'
                             }
          },
          { 
            extend:    'colvis',
            text:      'custom print',
            // titleAttr: 'PDF',
            className:'btn btn-sm btn-white'
          }
          
      ],
      columns: [
                { "data": "date" },
                { "data": "name" },
                { "data": "amount" },
                { "data": "qty" },
                { "data": "gross" },
         
            ],
             initComplete:function(setting, json){
              $.each(json,function(index,data){
                $.each(data,function(index, data){

                $('.total-nets').html(data.total_gross);
                $('.total-product').html(data.total_product);
                $('.total-services').html(data.total_services);
                $('.total-commission').html(data.total_commission);
                $('.total-product-net').html(data.total_product_net);
                $('.total-all-gross').html(data.total_gross);
                $('.total-all-net').html(data.total_net);
                $('.artits-commission').html(data.artits_commission);
            
                });
              });

            }
           

    }); 



  }

</script>