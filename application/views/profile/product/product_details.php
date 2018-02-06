<section id="content" class="content"  data-id="<?php echo $id; ?>">

  <div class="pull-right">
  <a href="<?php echo base_url('product') ?>" class="btn btn-success btn-sm "><span
      <span class="fa fa-arrow-circle-left"></span> back to product list</a>
  </div>
  <h1 class="page-header" id="prod-name">
  </h1>
  <!-- end page-header -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <!-- <div class="panel-heading">
          <h4 class="panel-title"></h4>
          <a href="<?php echo base_url('product/update_product/'.$id); ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit
            Product
          </a>
          <a class="btn btn-danger btn-sm" href="<?php echo base_url('product/delete_product/'.$id); ?>"><span class="glyphicon glyphicon-remove"></span> Delete Product
          </a>
        </div> -->
        <div class="panel-body">
          <section class="row">
            <div class="col-md-12">
              <h1 style="font-size: 190%" >
                <small></small>
              </h1>
              <section class="panel panel-default">
                <div class="panel-heading">
                 
                </div>
                <div class="panel-body">
                  <section class="row">
                    <div class="col-md-9">
                    <section class="div-header">
                      <h5>Product Details</h5>
                    </section>

                      <p style="border-bottom: solid 1px #CCCCCC; padding-bottom: 2%;  margin-bottom: 2%" id="description">
                      </p>

                      <table class="table" style="">
                        <tr>
                          <td style="border: none"><strong>Stock Count</strong></td>
                          <td style="border: none" id="qty">-------------------</td>
                          <td style="border: none"><strong>Created Date</strong></td>
                          <td style="border: none" id="created">-------------------</td>
                        </tr>
                        <tr>
                          <td style="border: none"><strong>Type</strong></td>
                          <td style="border: none" id="type">-------------------</td>
                          <td style="border: none"><strong>Class</strong></td>
                          <td style="border: none" id="class">-------------------</td>
                        </tr>
                        <tr>
                          <td style="border: none"><strong>Subname</strong></td>
                          <td style="border: none" id="sub">-------------------</td>
                          <td style="border: none"><strong>Packaging Type</strong></td>
                          <td style="border: none" id="package"></td>
                        </tr>
                        <tr>
                          <td style="border: none"><strong>Size</strong></td>
                          <td style="border: none" id="size">-------------------</td>
                          <td style="border: none"><strong>Weight</strong></td>
                          <td style="border: none" id="weight">-------------------</td>
                        </tr>
                      </table>
                      <h5>Manufacturer Information</h5>
                      <table class="table" style="border-bottom: 1px solid #dddddd;">
                        <tr>
                          <td style="border: none"><strong>Manufacturer</strong></td>
                          <td style="border: none" id="supplier">-------------------</td>
                        </tr>
                        <tr>
                          <td style="border: none"><strong>Manufacured Date</strong></td>
                          <td style="border: none"><strong id="made">-------------------</strong></td>
                          <td style="border: none"><strong>Expired Date</strong></td>
                          <td style="border: none"><strong id="expire">-------------------</strong></td>

                        </tr>
                      </table>
                    </div>
                    <div class="col-md-3">
                      <div style="border: 1px solid #dddddd;margin-top: 10%; max-height: 300px" id="image"></div>
                    </div>
                  </section>
                  
                </div>
              </section>
            </div>
          </section>
          <section class="row">
            <div class="col-md-6">
              <section class="div-header">
              <h5>Product Stock in History</h5>
              </section>
              <table id="prod-history" class="table  table-bordered table-sochic">
                <thead>
                <tr class="headings">
                  <th>Date</th>
                  <th>User</th>
                  <th>Type</th>
                  <th>Stock</th>
                </tr>
                </thead>

              </table>
            </div>
            <div class="col-md-6">
              <section class="div-header">
              <h5>Product Stock out History</h5>
              </section>
              <table id="history-out" class="table table-bordered table-sochic">
                <thead>
                <tr class="headings">
                  <th>Date</th>
                  <!-- <th>User</th> -->
                  <th>Type</th>
                  <th>Stock</th>
                </tr>
                </thead>

              </table>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</section>




<script>

  $(document).ready(function () {
    details();
    history();
    out();

  });

  function out() {

    // $('#history-out').Datatable({
    //   ajax:{
    //     url:'<?php echo base_url('product/history_out');?>',
    //     cache:true,
    //   },
    //   destroy:true,
    //      dom: 'Bfrtip',
    //   buttons: [
    //           {
    //               extend:    'copy',
    //               text:      '<i class="fa fa-files-o"></i>',
    //               titleAttr: 'Copy',
    //               className:'btn btn-sm btn-white',
    //               Columns: [0, 1, 2, 3]
    //           },
    //           // {
    //           //     extend:    'excelHtml5',
    //           //     text:      '<i class="fa fa-file-excel-o"></i>',
    //           //     titleAttr: 'Excel',
    //           //     className:'btn btn-sm btn-info'
    //           // },
    //           {
    //               extend:    'csv',
    //               text:      '<i class="fa fa-file-excel-o"></i>',
    //               titleAttr: 'CSV',
    //               className:'btn btn-sm btn-white text-success'
    //           },
    //           {
    //               extend:    'pdf',
    //               text:      '<i class="fa fa-file-pdf-o"></i>',
    //               titleAttr: 'PDF',
    //               className:'btn btn-sm btn-white text-danger'
    //           },
    //           {
    //               extend:    'print',
    //               text:      '<i class="fa fa-print"></i>',
    //               // titleAttr: 'print',
    //               className:'btn btn-sm btn-white',
    //               exportOptions: {
    //                              columns: ':visible'
    //                              }
    //           },
    //           { 
    //             extend:    'colvis',
    //             text:      'custom print',
    //             // titleAttr: 'PDF',
    //             className:'btn btn-sm btn-white'
    //           }
              
    //       ],  
        
    // });

    var oTable = $('#history-out').dataTable({
      destroy: true,
      bSort: false,
         dom: 'Bfrtip',
      buttons: [
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
      
    });
    var bc_id = $('#content').attr('data-id');
    // alert('<?php echo base64_decode('+bc_id+')?>');
    $.ajax({
      url: '<?php echo base_url('product/history_out');?>',
      data: {bc_id: bc_id},
      type: 'POST',
      dataType: 'JSON',
      success: function (data) {
        oTable.fnClearTable();
        $.each(data, function (index, data) {
          oTable.fnAddData([data.date, data.type, data.qty]);
        });
      }
    });

  }

  function history() {

    var oTable = $('#prod-history').dataTable({
      destroy: true,
      bSort: false,
         dom: 'Bfrtip',
      buttons: [
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
    });
    var bc_id = $('#content').attr('data-id');
    $.ajax({
      url: '<?php echo base_url('product/prod_history');?>',
      data: {bc_id: bc_id},
      type: 'POST',
      dataType: 'JSON',
      success: function (data) {
        oTable.fnClearTable();
        $.each(data, function (index, data) {
          oTable.fnAddData([data.date, data.user, data.type, data.qty]);
        });
      }
    });

  }

  function details() {
    var bc_id = $('#content').attr('data-id');



    $.ajax({
      url: '<?php echo base_url('product/get_detail');?>',
      data: {bc_id: bc_id},
      type: 'POST',
      dataType: 'JSON',
      success: function (data) {

        $.each(data, function (index, data) {
          $('#prod-name').html(data.name);
          $('#description').html(data.description);
          $('#weight').html(data.weight);
          $('#type').html(data.type);
          $('#size').html(data.size);
          $('#sub').html(data.sub);
          $('#class').html(data.class);
          $('#package').html(data.package);
          $('#image').html(data.image);
          $('#created').html(data.created);
          $('#qty').html(data.qty);
          $('#made').html(data.made);
          $('#supplier').html(data.supplier);
          $('#expire').html(data.expire);
        });
      }
    });
  }

</script>

