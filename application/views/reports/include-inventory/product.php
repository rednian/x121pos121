

  <section class="row">
    <div class="col-sm-3">
      <section class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"><strong>Select Inventory Type</strong></h4>
        </div>
        <div class="panel-body">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-table on fa-square-o"></span></span>
            <select name="" id="report-type" class="form-control">
              <option value="0" selected disabled>-- Choose Report --</option>
              <option value="all">All Inventory Level</option>
              <option value="consumable">Consumable</option>
              <option value="selling">For Selling</option>
            </select> 
          </div>
        </div>

      </section>
      
    </div>
    <div class="col-sm-9">
      <section class="panel panel-info">
        <div class="panel-heading">
          <h4 class="panel-title"><strong>Product Inventory Summary</strong></h4>
        </div>
        <div class="panel-body">
          <section class="row">
            <div class="col-sm-4">
              <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-money"></i></div>
                <div class="stats-info">
                  <h4>FOR SELLING</h4>
                  <p id="total-selling">-</p>
                </div>
                          <!-- <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                          </div> -->
              </div>
            </div>
            <div class="col-sm-4">
              <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                <div class="stats-info">
                  <h4>FOR CONSUMABLE</h4>
                  <p id="total-cosumable">-</p>
                </div>
                          <!-- <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                          </div> -->
              </div>
            </div>
            <div class="col-sm-4">
              <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                  <h4>TOTAL PRODUCTS</h4>
                  <p id="total-product">-</p>
                </div>
                          <!-- <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                          </div> -->
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>
    
  </section>
  <table id="inventory" class="table table-btn table-bordered table-sochic">
    <thead>
    <tr>
      <th>Barcode</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Expiration Date</th>
      <th>Status</th>
    </tr>
    </thead>
  </table>
<script>
  $(document).ready(function () {


 
        
      
    report();

    $('#report-type').change(function(){
        var data = $(this).val();
        report(data);
       });
         
  
     
    


  });

  function report(value) {
    var oTable = $('#inventory').dataTable({
     destroy: true,
     ajax:{
       url:'<?php echo base_url('reports/product_inventory') ?>',
       data:{value: value},
       type:'POST'
     },
      columns:[
       {'data':'barcode'}, 
       {'data':'name'},
       {'data':'qty'},
       {'data':'price'},
       {'data':'expiration'},
       {
        'data':'status'
      },
      ],
       dom: 'Bfrtip',
    buttons: [
            {
                extend:    'copy',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                className:'btn btn-sm btn-white',
                Columns: [0, 1, 2, 3]
            },
            // {
            //     extend:    'excelHtml5',
            //     text:      '<i class="fa fa-file-excel-o"></i>',
            //     titleAttr: 'Excel',
            //     className:'btn btn-sm btn-info'
            // },
            {
                extend:    'csv',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'CSV',
                className:'btn btn-sm btn-white text-success'
            },
            {
                extend:    'pdf',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                className:'btn btn-sm btn-white text-danger'
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
      fnRowCallback:function(row, column, iDisplayIndex, iDisplayIndexFull){
       
          if ( column.qty < 1  ){         
             $(row).addClass('danger');
           }

         if ( column.qty > 0 && column.qty < 20 ){
           $(row).addClass('warning');
         }

      },                                    
       initComplete:function(setting, json){

        $.each(json,function(index,data){
          $.each(data,function(index, data){

            if(data.selling != 0){
             $('#total-selling').html(data.selling);
              $('#total-product').html(data.all);
            }

              if(data.consumable != 0){

                $('#total-cosumable').html(data.consumable);
                $('#total-product').html(data.all);
              }
             
            
          });
        });
      },
     
        
    });
  }



</script>