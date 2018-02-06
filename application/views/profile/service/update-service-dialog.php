<div class="modal fade" id="update-service-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Update Service Details</h4>
      </div>
      <div class="modal-body">

        <section class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <form id="frm-update-service" enctype="multipart/form-data" method="post" action="<?php echo base_url('services/update'); ?>">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="service-name" name="name" class="form-control input-sm" autocomplete="off">
                <input type="hidden" id="service-id" name="service_id" class="form-control input-sm" autocomplete="off">
                <input type="hidden" id="price-id" name="price_id" class="form-control input-sm" autocomplete="off">
                <input type="hidden" id="as-id" name="as_id" class="form-control input-sm" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" id="service-price" name="price" class="form-control input-sm" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Status</label>
                <input type="text" id="service-status" name="status" class="form-control input-sm" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" id="service-iamge" name="image" class="form-control input-sm" autocomplete="off">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control"  id="service-description" name="description" style="min-height:100px;" utocomplete="off"></textarea>
              </div>
          </div>
        </section>
        

     
        
       
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
       <input type="submit" class="btn btn-success btn-sm" value="Save Changes">
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  $(document).ready(function () {
    update();
  });

  function update_details(id){

    $.ajax({
      url:'<?php echo base_url('services/update_service_details');?>',
      data:{service_id:id},
      type:'POST',
      dataType:'JSON',
      success:function(data){
        $.each(data,function(index, data){
          $('#service-name').val(data.name);
          $('#service-price').val(data.price);
          $('#service-id').val(data.id);
          $('#price-id').val(data.price_id);
          $('#as-id').val(data.as_id);
          $('#service-status').val(data.status);
          $('#service-description').val(data.description);
        });
      }
    });

  }


  function update(){
      $('#frm-update-service').formValidation({
        message: 'This value is not valid',
        //live: 'disabled',
        icon: {
    //        valid: 'glyphicon glyphicon-ok',
    //        invalid: 'glyphicon glyphicon-remove',
          validating: 'fa fa-refresh fa-spin'
        },
        fields: {
          name: {
            validators: {
              notEmpty: {
                message: 'The service name is required and cannot be empty'
              }
            }
          },
          price: {
            validators: {
              notEmpty: {
                message: 'The service price is required and cannot be empty'
              },
              stringLength: {
                min: 1,
                message: 'The service price  must be more than 1 character long and 1000 max'
              }
            }
          },
           status: {
            validators: {
              notEmpty: {
                message: 'The service status is required and cannot be empty'
              },
              stringLength: {
                min: 1,
                message: 'The service status  must be more than 1 character long and 1000 max'
              }
            }
          },
           description: {
            validators: {
              notEmpty: {
                message: 'The service description is required and cannot be empty'
              },
              stringLength: {
                min: 1,
                message: 'The service description  must be more than 1 character long and 1000 max'
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
                text: "Updated"
              });

              var table = $('#service-list').DataTable();
                  table.ajax.reload();
              
             $('#update-service-dialog').modal('hide');

              $form
                .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
                .formValidation('resetForm', true);             // Reset the form

            }
            else {
              new PNotify({
                type: "error",
                text: "Service Failed to update"
              });
            }


          }

        });
      });
  }
</script>