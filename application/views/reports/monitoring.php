<section id="content" class="content">
  <div class="pull-right">
    
  </div>
  <h1 class="page-header">Reports <small>Monitoring</small></h1>
  <!-- end page-header -->
  <section class="row">

    <div class="col-sm-2 col-md-2 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
            <h4 class="panel-title"></h4>
        </div>
          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#nav-pills-tab-1" data-toggle="tab" aria-expanded="false">Active<span class="badge pull-right" id="active-span">0</span></a></li>
                <li class=""><a href="#nav-pills-tab-2" data-toggle="tab" aria-expanded="true">Inactive<span class="badge pull-right" id="inactive-span">0</span></a></li>
                <li class=""><a href="#nav-pills-tab-3" data-toggle="tab" aria-expanded="false">Low Stock<span class="badge pull-right" id="low-stock-span">0</span></a></li>
                <li class=""><a href="#nav-pills-tab-4" data-toggle="tab" aria-expanded="false">Consumable<span class="badge pull-right" id="consumable-span">0</span></a></li>
            </ul>
          </div>
      </div>
    </div> 

    <div class="col-sm-10 col-md-10 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
            <h4 class="panel-title"></h4>
        </div>
          <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane active fade in" id="nav-pills-tab-1">
                    <h3 class="m-t-10">Active Products</h3>
                  <table class="table table-bordered table-btn" id="table-active">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Expire</th>
                        <th>Description</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                <div class="tab-pane fade" id="nav-pills-tab-2">
                    <h3 class="m-t-10">Inactive</h3>
                 <table class="table table-bordered table-btn">
                   <thead>
                     <tr>
                       <th>Code</th>
                       <th>Description</th>
                       <th>Price</th>
                       <th>Stock</th>
                       <th>Date Expire</th>
                       <th>Description</th>
                     </tr>
                   </thead>
                 </table>
                </div>
                <div class="tab-pane fade" id="nav-pills-tab-3">
                    <h3 class="m-t-10">Low Stock</h3>
                <table class="table table-bordered table-btn">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Date Expire</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                </table>
                </div>
                <div class="tab-pane fade" id="nav-pills-tab-4">
                    <h3 class="m-t-10">Consumable</h3>

                 <table class="table table-bordered table-btn" id="table-consumable">
                   <thead>
                     <tr>
                       <th>Code</th>
                       <th>Name</th>
                       <th>Price</th>
                       <th>Stock</th>
                       <th>Date Expire</th>
                       <th>Description</th>
                     </tr>
                   </thead>
                 </table>
                 
                </div>
              </div>
          </div>
      </div>
    </div> 
  </section>
  
  
</section>
<script type="text/javascript">
  $(document).ready(function () {
    // active();
    consumable();
  });

  // function active(){
  //   var table = $('#table-active').DataTable({
  //     ajax:'<?php echo base_url('reports/consumable_list'); ?>',
  //     sort:false,
  //    destroy:true,
  //       columns: [
  //            { "data": "name" },
  //            { "data": "contact" },
  //            { "data": "address" },
  //            { "data": "action" },
  //        ]
  //   });
  // }

  function consumable(){

    var table = $('#table-consumable').DataTable({
      ajax:'<?php echo base_url('reports/consumable_list'); ?>',
      sort:false,
     destroy:true,
        columns: [
             {"data": "barcode"},
             {"data": "name"},
             {"data": "price"},
             {"data": "qty" },
             {"data": "expire" },
             {"data": "description"}, 
         ],
          initComplete:function(setting, json){
           $.each(json,function(index,data){
             $.each(data,function(index, data){
                 $('#consumable-span').html(data.count);
             });
           });
         }, 
       });
  }
    
</script>