<div class="modal fade" id="add-service-type-dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Service Type</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('services/create_type'); ?>" method="post" id="frm-add-service-type"
          class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Type</label>

            <div class="col-sm-10 col-md-10 col-xs-12 ">
              <input type="text" class="form-control input-sm" name="type" autofocus=""
                autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Image</label>

            <div class="col-sm-10 col-md-10 col-xs-12 ">
              <input type="file" class="form-control input-sm" name="image"
                autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-10 col-md-10 col-xs-12 ">
              <textarea name="description" class="form-control" rows="5" style="min-height: 180px"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label"></label>
            <input type="submit" value="Save Service Type" class="btn btn-success btn-sm"/>
            <input id="" type="reset" value="Clear" class="btn btn-default btn-sm"/>
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
  
 $(document).ready(function () {

  $('#btn-add-type').click(function(){

    $('#add-service-type-dialog').modal('show');

  });

 }); 

 function add_type() {
  $('#frm-add-service-type').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      type: {
        validators: {
          notEmpty: {
            message: 'The service type is required and cannot be empty'
          }
        }
      },
      description: {
        validators: {
          notEmpty: {
            message: 'The service type description  is required and cannot be empty'
          },
          stringLength: {
            min: 1,
            message: 'The service type description   must be more than 1 character long and 1000 max'
          }
        }
      },
      image: {
        validators: {
          // notEmpty: {
          //   message: 'The service type image is required and can\'t be empty'
          // },
          file: {
            extension: 'jpeg,jpg,png',
            type: 'image/jpeg,image/png',
            maxSize: 2097152,   // 2048 * 1024
            message: 'Please choose a image file with the following format (jpg, jpeg and png only).'
          }
        }
      }
    }/*end of fields*/
  }).on('success.form.fv', function (e) {


    e.preventDefault();
    var $form = $(e.target);
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData(this),
      type: $(this).attr('method'),
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'json',
      success: function (data) {
        if (data == 1) {
          new PNotify({
            type: "success",
            text: "Service type Successfully Created"
          });
          get_service_type();
         $('#add-service-type-dialog').modal('hide');
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        }
        else {
          new PNotify({
            type: "error",
            text: "Service Failed to create"
          });
        }


      }

    });
  });


  /*show the type form*/
  $('#btn-add-type').click(function () {
    $('#add-type').removeClass('hide');
    $('#create').addClass('hide');
  });
  /*show the create services form and hide type form*/
  $('#btn-type-close').click(function () {
    $('#add-type').addClass('hide');
    $('#create').removeClass('hide');
  });
}


</script>