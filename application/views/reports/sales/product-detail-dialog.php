<style type="text/css">
  .modal-lg{
    width: 1250px;
  }
</style>
<div class="modal fade" id="product-detail-dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Product Sales Details</h4>
      </div>
      <div class="modal-body">
       <table id="product-report-details" class="table table-striped table-sochic" style="margin-top: 5%;">
            <thead>
           <tr style="border-bottom:1px solid #ddd;">
              <th>Barcode</th>
              <th>Description</th>
              <th>Original Price</th>
              <th>Markup</th>
              <th>Retail Price</th>
              <th>Quantity</th>
              <th>Tax</th>
              <th>Discount</th>
              <th>Total Amount</th>
              <th>Profit</th>
            </tr>
            </thead>
            <tfoot >
              <tr>
                <th colspan="8" style="text-align: right;">Total (PHP)</th>  
                <th></th>
                <th></th>
              </tr>
            </tfoot>
            </table>
             
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
       
      </div>
    
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    
  });

  function sales_detail(id) {
 
    $('#product-detail-dialog').modal('show');

    $('#product-report-details').DataTable({
      ajax:{
        url:'<?php echo base_url('reports/detail_report'); ?>',
        data:{id:id},
        type:'POST',
        cache:true
      },
      destroy:true,
      columns:[
        {'data':'barcode'},
        {'data':'name'},
        {'data':'original_price'},
        {'data':'markup'},
        {'data':'retail'},
        {'data':'qty'},
        {'data':'tax'},
        {'data':'discount'},
        {'data':'total'},
        {'data':'income'},
      ], dom: 'Bfrtip',
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
          "footerCallback": function ( row, data, start, end, display ) {
              var api = this.api(), data;
          
              // Remove the formatting to get integer data for summation
              var intVal = function ( i ) {
                  return typeof i === 'string' ?
                      i.replace(/[\$,]/g, '')*1 :
                      typeof i === 'number' ?
                          i : 0;
              };




              /*  ----------------------------------------------------------------------
                  | markup
                  ----------------------------------------------------------------------
              */


              // // Total over all pages
              // api.column( 3 ).data().reduce( function (a, b) {
              //         return intVal(a) + intVal(b);
              //     }, 0 );
              
              // // Total over this page
              // markup = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
              //         return intVal(a) + intVal(b);
              //     }, 0 );
              
              // // // Update footer
              // $( api.column( 3 ).footer() ).html(
              //     number_comma(markup.toFixed(2)) 

          

            /*  ----------------------------------------------------------------------
                | orinal price
                ----------------------------------------------------------------------
            */

              // Total over all pages
            api.column( 8 ).data().reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
          
              // Total over this page
              original_price = api.column( 8, { page: 'current'} ).data().reduce( function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0 );
          
              // Update footer
              $( api.column( 8 ).footer() ).html(
                  number_comma(original_price.toFixed(2)) 
              );

        
          }

    });




  }
</script>
