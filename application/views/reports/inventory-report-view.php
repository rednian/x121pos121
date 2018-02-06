<section id="content" class="content">
  <div class="pull-right">
    
  </div>
  <h1 class="page-header">Inventory Reports</h1>

  
  <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h4 class="panel-title"></h4>
          </div>
            <div class="panel-body">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Products</a></li>
<!--                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Services <span class="badge pull-right"><span id="service-count">0</span></span></a></li>-->
<!--                <li role="presentation"><a href="#package" aria-controls="package" role="tab" data-toggle="tab">Packages <span class="badge pull-right"><span id="package-count">0</span></span></a></li>-->
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <?php $this->load->view('reports/include-inventory/product'); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile" >
                  <section style="margin-top:3%;">
                     <table id="service-inventory-report" class="table table-bordered table-sochic">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Service Offered</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Description</th>
                        <th>Price</th>
                      </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Total Summary</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="service-total"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </section>
                </div>
                <div role="tabpanel" class="tab-pane" id="package" >
                  <section style="margin-top:3%;">
                     <table id="package-table-report" class="table table-bordered table-sochic">
                      <thead>
                        <tr class="headings">
                          <th >#</th>
                          <th >Package Name</th>
                          <th >Type</th>
                          <th >Description</th>
                          <th >Price</th> 
                          <!-- <th ></th> -->
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Total Summary</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="package-total"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </section>
                </div>
              </div>

            </div>
            </div>
        </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  service_inventory_report();
  package_inventory_report();
});

function package_inventory_report(){

 

  var oTable = $('#package-table-report').DataTable({
    ajax:'<?php echo base_url('reports/get_available_packages'); ?>',
    destroy: true,
    "oLanguage": {
      "sSearch": "Search Package:"
    },
       dom: 'Bfrtip',
    buttons: [
            {
                extend:    'copy',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                className:'btn btn-sm btn-white',
                Columns: [0, 1, 2, 3]
            },
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
    columns:[
      {'data': 'count'},
      {'data': 'name'},
      {'data': 'type'},
      {'data': 'description'},
      {'data': 'price'},
    ],

     initComplete:function(setting, json){
      $.each(json,function(index,data){
        $.each(data,function(index, data){
            $('.package-total').html(data.total);
            $('#package-count').html(data.count);
        });
      });
    },
  });


}


function service_inventory_report(){


  $('#service-total').html('');

  var oTable = $('#service-inventory-report').DataTable({
    ajax:'<?php echo base_url('reports/get_available_services'); ?>',
    destroy: true,
    "oLanguage": {
      "sSearch": "Search Services:"
    },
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
    columns:[
      {'data': 'count'},
      {'data': 'name'},
      {'data': 'type'},
      {'data': 'class'},
      {'data': 'description'},
      {'data': 'price'},
    ],

     initComplete:function(setting, json){
      $.each(json,function(index,data){
        $.each(data,function(index, data){
            $('.service-total').html(data.total_price);
            $('#service-count').html(data.count);
        });
      });
    },
  });


}

</script>