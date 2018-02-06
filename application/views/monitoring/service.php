<div id="content" class="content">

  <h1 class="page-header"><span class="glyphicon glyphicon-list-alt"></span> <?php echo $heading; ?></h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-12">
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
                        
                          <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                             <li role="presentation" class="active"><a href="#rendendered" aria-controls="rendendered" role="tab" data-toggle="tab">Service Rendered</a></li>
                             <li role="presentation"><a href="#availability" aria-controls="availability" role="tab" data-toggle="tab">Service Availability</a></li>
                           </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="rendendered">
                            <table id="service-rendered" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
                              <thead>
                              <tr>
                                <th>Service Offered</th>
                                <th>Type</th>
                                <th>Class</th>
                                <th>Remarks</th>
                                <th>Date</th>
                                <th>Price</th>
                              </tr>
                              </thead>

                            </table>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="availability">
                            <table id="service-availability-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
                                <thead>
                                <tr>
                                  <th>Service Offered</th>
                                  <th>Type</th>
                                  <th>Class</th>
                                  <th>Description</th>
                                  <th>Price</th>
                                  <th>Status</th>
                                </tr>
                                </thead>
                              </table>
                          </div>
                        </div>

                      </div>

                    </div>
                </div>
      </div>
  </div>
</div>
<script>

$(document).ready(function () {


service_availability();
  rendered();
});


function rendered(){
    var oTable = $('#service-rendered').dataTable({
    destroy:true,
    bSort:false,
    "oLanguage": {
      "sSearch": "Search"
    },
    'iDisplayLength': 12,
    "sPaginationType": "full_numbers",
    "dom": 'T<"clear">lfrtip',
    "tableTools": {
      "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
    }

  });

  $.ajax({
    url:'<?php echo base_url('service_monitoring/service_rendered'); ?>',
    dataType:'JSON',
    success:function(data){
      $.each(data,function(index,data){
        oTable.fnAddData([data.service,data.type, data.class, data.remark, data.date, data.price]);
      });

    },
    error:function(){
      alert('Error from rendered');
    }
  });
}

  function service_availability(){
    
    var oTable = $('#service-availability-table').dataTable({
      destroy:true,
      bSort:false,
      "oLanguage": {
        "sSearch": "Search"
      },
      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }

    });

    $.ajax({
      url:'<?php echo base_url('service_monitoring/service_available'); ?>',
      dataType:'JSON',
      success:function(data){
        $.each(data,function(index,data){
          oTable.fnAddData([data.service,data.type, data.class, data.description, data.price, data.status]);
        });

      }
    });
  }
</script>

