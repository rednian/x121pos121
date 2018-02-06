<div class="modal fade" id="add-service-class-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Service Class</h4>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url('services/create_class'); ?>" method="post" id="frm-add-service-class"
          class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Type</label>

            <div class="col-sm-10 col-md-10 col-xs-12 ">
              <select name="service_type" id="service-type" class="form-control input-sm type"></select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Class</label>

            <div class="col-sm-10 col-md-10 col-xs-12 ">
              <input type="text" class="form-control input-sm" name="service_class"
                autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-2 control-label"></label>
            <input type="submit" value="Save Service Type" class="btn btn-success btn-sm"/>
            <input type="reset" value="Clear" class="btn btn-default btn-sm"/>
            <input id="btn-class-close" type="button" value="Close" class="btn btn-default btn-sm"/>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
$(document).ready(function() {
  
  $('#btn-add-class').click(function(){

    $('#add-service-class-dialog').modal('show');

  });

});


</script>