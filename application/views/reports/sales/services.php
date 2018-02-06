<section class="row" id="table-load">

  <div class="col-md-3">
    <section class="form-group">
      <h5>Select date range</h5>

      <div class="input-group">
        <input id="service" type="text" class="form-control input-sm" placeholder="select date">
        <span id="btn-refresh-services" class="input-group-addon btn text-success" style="border-radius: 0"><span class=" fa
        fa-refresh"></span></span>
      </div>
    </section>
  </div>

</section>

<section class="row">
  <div class="col-md-12">
    <section class="panel">
      <div class="panel-heading">
        <h2 class="panel-title text-center"><strong>Sales Report</strong> <br> Packages &amp; Services </h2>
      </div>
      <div class="panel-body">
        
        <table id="service-report" class="table table-bordered table-sochic" style="margin-top: 5%;">
          <thead>
          <tr>
            <th class="col-sm-2">Date</th>
            <th class="col-sm-3">Particulars</th>
            <th class="col-sm-2">Amount</th>
            <th class="col-sm-2">QTY</th>
            <th class="col-sm-1">Total</th>
            <th class="col-sm-2">Total Artist Commission</th>
            <th class="col-sm-2">Net Income</th>
          </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="4">Total</th>
              <th class="service-grand-total"></th>
              <th class="service-total-commission"></th>
              <th class="service-total-net"></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>


  </div>
</section>

<script>

  $(document).ready(function () {


      $('.service-grand-total').html('-');
      $('.service-total-commission').html('-');
      $('.service-total-net').html('-');

     service_sales('', '');


    $('#btn-refresh-services').click(function(){
       service_sales('', '');
    });

   


        $('#service').daterangepicker({
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

          $('.grand-total').html('');
          $('.total-commission').html('');
          $('.net-total').html('');
     

          $('.service-grand-total').html('-');
          $('.service-total-commission').html('-');
          $('.service-total-net').html('-');

          service_sales(start, end);



        });

      




  });


  function service_sales(start, end){

   var url = '<?php echo base_url('reports/get_all');  ?>';
   var type = 'GET';

    if(start != '' && end != ''){
      url = '<?php echo base_url('reports/get_all');  ?>';
      type ='POST';
    }


    var oTable = $('#service-report').dataTable({
      destroy:true,
      bSort:false,
      pageLength:50,
      searching:false,
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
                { "data": "total" },
                { "data": "commission" },
                { "data": "net_income" }
            ],
             initComplete:function(setting, json){
              $.each(json,function(index,data){
                $.each(data,function(index, data){

                
            
                    $('.service-grand-total').html(data.grand_total);
                    $('.service-total-commission').html(data.total_commission);
                    $('.service-total-net').html(data.net_total);
                });
              });

              // get_total();
              // add_discount();

             

            }
            // "footerCallback": function ( row, data, start, end, display ) {
            //     var api = this.api(), data;
            
            //     // Remove the formatting to get integer data for summation
            //     var intVal = function ( i ) {
            //         return typeof i === 'string' ?
            //             i.replace(/[\$,]/g, '')*1 :
            //             typeof i === 'number' ?
            //                 i : 0;
            //     };
            
            //     // Total over all pages
            //     total = api.column( 5 ).data().reduce( function (a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0 );
            
            //     // Total over this page
            //     pageTotal = api.column( 5, { page: 'current'} ).data().reduce( function (a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0 );
            
            //     // Update footer
            //     $( api.column( 5 ).footer() ).html(
            //         'PHP '+number_comma(pageTotal.toFixed(2)) 
            //     );
            // }

    }); 



  }

</script>