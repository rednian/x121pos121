<?php $this->load->view('reports/sales/product-detail-dialog'); ?>

<section class="row">
  <div class="col-md-3" id="select-date"> 
    <section class="form-group">
      <h5>Select date range</h5>  
      <div class="input-group">
        <input id="product" type="text" class="form-control input-sm" placeholder="select date">
        <span id="btn-product-refresh" class="input-group-addon btn " style="border-radius: 0"><span class=" fa
        fa-refresh text-success"></span></span>
      </div>
    </section>
  </div>
</section>


<section class="row">
  <div class="col-md-12">
    <section class="panel">
      <div class="panel-heading">
         <h2 class="panel-title text-center"><strong>Sales Report</strong> <br> Products </h2>
      </div>
      <div class="panel-body">
        
        
        <table id="transaction-table" class="table table-bordered table-sochic" style="margin-top: 5%;">
          <thead>
         <tr style="border-bottom:1px solid #ddd;">
            <th>Date</th>
            <th>Particulars</th>
            <th>Distributor's Price</th>
            <th>SRP</th>
            <th>Income per Piece</th>
            <th>QTY</th>
            <th>Total Amount (gross Income)</th>
            <th>Net Income</th>
          </tr>
          </thead>
          <tfoot >
            <tr>
              <th colspan="6" style="text-align: right;">Total Sales</th>  
              <th class="total-gross"></th>
              <th class="total-net"></th>
            </tr>
          </tfoot>
        </table>
        <section class="row">
          <div class="col-md-4 col-md-offset-8">
            <em><strong>Note:</strong></em>
            <p><em>Income per piece <code>=</code> SRP <code>-</code> DP <br/> Net Income <code>=</code> Quantity <code>x</code> Income per Piece</em></p>
          </div>
        </section>
      
      </div>
    </section>
  </div>
</section>
<script>

  $(document).ready(function () {

    all_reports('','');
    $('.total-gross').html('-');
    $('.total-net').html('-');



    $('#btn-product-refresh').click(function(){
      all_reports('','');
    });





       $('#product').daterangepicker({
         "ranges": {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         },

         // "alwaysShowCalendars": true,
         "startDate": moment().format('DD/MM/YYYY'),
         "endDate": moment().format('DD/MM/YYYY')

       }, function (start, end, label) {

         var start = start.format('YYYY-MM-DD');
         var end = end.format('YYYY-MM-DD');


       $('.total-gross').html('-');
       $('.total-net').html('-');
           all_reports(start,end);


       


       });
  

   
  });



  function all_reports(start, end){
    var url = '<?php echo base_url('reports/all_transaction'); ?>';
    var type = 'GET';

      if(start != '' && end != ''){

        url = '<?php echo base_url('reports/all_transaction'); ?>';
        type = 'POST';
      }
     


     var table = $('#transaction-table').DataTable({
                ajax:{
                  url: url,
                  type: type,
                  data:{start : start, end : end},
                  cache:true
                },
                order: [[ 1, "desc" ]],
                searching:false,
                pageLength:50,
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
            destroy:true,
            columns:[
              {'data':'date'},
              {'data':'name'},
              {'data':'supplier_price'},
              {'data':'retail_price'},
              {'data':'income'},
              {'data':'qty'},
              {'data':'gross'},
              {'data':'net'},
              ],
               initComplete:function(setting, json){
                $.each(json,function(index,data){
                  $.each(data,function(index, data){

                      $('.total-gross').html(data.total_gross);
                      $('.total-net').html(data.total_net);
                  });
                });

            

               

              }
        // "footerCallback": function ( row, data, start, end, display ) {
        //     // var api = this.api(), data;
 
        //     // // Remove the formatting to get integer data for summation
        //     // var intVal = function ( i ) {
        //     //     return typeof i === 'string' ?
        //     //         i.replace(/[\$,]/g, '')*1 :
        //     //         typeof i === 'number' ?
        //     //             i : 0;
        //     // };
 
        //     // // Total over all pages
        //     // total = api.column( 3 ).data().reduce( function (a, b) {
        //     //         return intVal(a) + intVal(b);
        //     //     }, 0 );
 
        //     // // Total over this page
        //     // pageTotal = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
        //     //         return intVal(a) + intVal(b);
        //     //     }, 0 );
 
        //     // Update footer
        //     $( api.column( 3 ).footer() ).html(
        //         'PHP '+number_comma(pageTotal.toFixed(2)) 
        //     );
        // }
              
          });
   }


 





</script>

