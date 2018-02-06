<div id="content" class="content">
  <section class="row">
    
    <div class="col-sm-4">
    <h1 class="page-header">Pull-out Stock</h1>
      <div class="panel panel-default">
          <div class="panel-heading">
              <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title"><!-- Panel Title here --></h4>
          </div>
          <div class="panel-body">
            <form method="post" action="<?php echo base_url('Product_monitoring/out_product');?>" id="frm-out">
              <div class="form-group">
                <label>Product Name</label>
                <input  class="form-control input-sm" list="code-list"  name="name" autocomplete="off" id="list-name">
                <datalist id="code-list"></datalist>
                <input type="hidden" class="form-control input-sm"  name="id" value="" id="stock-id">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <p>Current Stock available : <code id="current-stock">0</code></p>
                <input type="text" class="form-control input-sm" id="qty" name="qty" autocomplete="off">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success btn-sm" value="Submit"  name="Submit">
              </div>
            </form>
          </div>
      </div>
    </div>

    <div class="col-sm-8">
    <h1 class="page-header">Product Stock Monitoring</h1>
      <div class="panel panel-default">
          <div class="panel-heading">
              <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title">Panel Title here</h4>
          </div>
          <div class="panel-body">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                    data-toggle="tab">Active</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                    data-toggle="tab">Inactive</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Low Stock
                  </a></li>
                  <li role="presentation"><a href="#current" aria-controls="current" role="tab" data-toggle="tab">Consumable Stock
                    </a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <section class="" style="margin-top: 2%">
                    <table id="active"
                      class="table  responsive-utilities jambo_table table-hover table-striped">
                      <thead>
                      <tr>
                        <th class="col-sm-2">Product</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Manufacture</th>
                        <th>Date Expire</th>
                        <th>Weight</th>
                      </tr>
                      </thead>
                    </table>
                  </section>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                  <section class="" style="margin-top: 2%">
                    <table id="inactive"
                      class="table  responsive-utilities jambo_table table-hover table-striped">
                      <thead>
                      <tr>
                        <th class="col-sm-2">Product</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Manufacture</th>
                        <th>Date Expire</th>
                        <th>Weight</th>
                      </tr>
                      </thead>
                    </table>
                  </section>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                  <section class="" style="margin-top: 2%">
                    <table id="low"
                      class="table  responsive-utilities jambo_table table-hover table-striped">
                      <thead>
                      <tr>
                        <th class="col-sm-2">Product</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Manufacture</th>
                        <th>Date Expire</th>
                        <th>Weight</th>
                      </tr>
                      </thead>
                    </table>
                  </section>
                </div>
                <div role="tabpanel" class="tab-pane" id="current">
                  <section class="" style="margin-top: 2%">
                    <table id="consumable"
                      class="table  responsive-utilities jambo_table table-hover table-striped">
                      <thead>
                      <tr>
                        <th class="col-sm-2">Product</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Manufacture</th>
                        <th>Date Expire</th>
                        <th>Weight</th>
                      </tr>
                      </thead>
                    </table>
                  </section>
                </div>
              </div>

            </div>
          </div>
      </div>
    </div>

  </section>
</div>


    <script type="text/javascript">
      $(document).ready(function(){
          get_list();
          get_id();
       
 

        $('#frm-out').submit(function(e){
            e.preventDefault();
           $.ajax({
            url:$(this).attr('action'),
            data:$(this).serialize(),
            type:$(this).attr('method'),
            dataType:'JSON',
            success:function(data){
              if(data == 1){
                $('#list-name').val('');
                $('#qty').val('');
               location.reload();
                new PNotify({
                  type:'success',
                  text:'Product successfully pulled-out'
                });
              }
            }
           });
        });
      });

function get_id(){
  $('#list-name').change(function(){

    $.ajax({
           url:'<?php echo base_url('Product_monitoring/get_id'); ?>',
           dataType:'JSON',
           data:{name:$('#list-name').val()},
           type:'POST',
           success:function(data){
             $.each(data, function(index, data){
                $('#stock-id').attr('value',data.id);
                $('#current-stock').html(data.qty);
                 // alert(data.id);
             });
           }
     });


  });
}

function get_list(){
   $.ajax({
          url:'<?php echo base_url('Product_monitoring/get_consumable'); ?>',
          dataType:'JSON',
          success:function(data){
            $.each(data, function(index, data){
              $('#code-list').append('<option value="'+data.name+'">');
            });
          }
    });

}
    </script>
<script>

  $(document).ready(function () {

    active();
    inactive();
    consumable();
//    low();
  });
  function consumable() {
    var oTable = $('#consumable').dataTable({
      'bSort': false,
      destroy: true,
      "oLanguage": {
        "sSearch": "<span class='glyphicon glyphicon-search'></span>"
      },

      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    });

    $.ajax({
      url:'<?php echo base_url('product_monitoring/consumable_list');?>',
      data:{status:'active'},
      type:'POST',
      dataType:'JSON',
      success:function(data){
        oTable.fnClearTable();
        $.each(data,function(index,data){
          oTable.fnAddData([data.name, data.price, data.qty, data.make, data.expire, data.weight]);
        });
      }
    });

  }

  function active() {
    var oTable = $('#active').dataTable({
      'bSort': false,
      destroy: true,
      "oLanguage": {
        "sSearch": "<span class='glyphicon glyphicon-search'></span>"
      },

      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    });

    $.ajax({
      url:'<?php echo base_url('product_monitoring/monitoring');?>',
      data:{status:'active'},
      type:'POST',
      dataType:'JSON',
      success:function(data){
        oTable.fnClearTable();
        $.each(data,function(index,data){
          oTable.fnAddData([data.product, data.price, data.qty, data.make, data.expire, data.weight]);
        });
      }
    });

  }
  function inactive() {
    var oTable = $('#inactive').dataTable({
      'bSort': false,
      destroy: true,
      "oLanguage": {
        "sSearch": "<span class='glyphicon glyphicon-search'></span>"
      },

      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    })

    $.ajax({
      url:'<?php echo base_url('product_monitoring/monitoring');?>',
      data:{status:'inactive'},
      type:'POST',
      dataType:'JSON',
      success:function(data){
        oTable.fnClearTable();
        $.each(data,function(index,data){
          oTable.fnAddData([data.product, data.price, data.qty, data.make, data.expire, data.weight]);
        });
      }
    });

  }
  function low() {
    var oTable = $('#low').dataTable({
      'bSort': false,
      destroy: true,
      "oLanguage": {
        "sSearch": "<span class='glyphicon glyphicon-search'></span>"
      },

      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    });

    $.ajax({
      url:'<?php echo base_url('product_monitoring/monitoring');?>',
      data:{status:'low'},
      type:'POST',
      dataType:'JSON',
      success:function(data){
        oTable.fnClearTable();
        $.each(data,function(index,data){
          oTable.fnAddData([data.product, data.price, data.qty, data.make, data.expire, data.weight]);
        });
      }
    });

  }

</script>

