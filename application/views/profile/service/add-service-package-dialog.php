<div class="modal fade" id="add-service-package-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Services Package</h4>
      </div>
      <div class="modal-body">
  <form id="frm-create-package" enctype="multipart/form-data" class="form-horizontal"
    action="<?php echo base_url('services/create_packages'); ?>"
    role="form"
    method="post">
    <section class="panel">
      <div class="panel-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Name</label>

          <div class="col-sm-10 col-md-10 col-xs-12 ">
            <input type="text" class="form-control input-sm" name="package_name" autofocus=""
              autocomplete="off">
          </div>  
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Price</label>

          <div class="col-sm-10 col-md-10 col-xs-12 ">
            <input type="text" id="price" class="form-control input-sm" name="price" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Type</label>

          <div class="col-sm-10 col-md-10 col-xs-12 ">
            <select class="form-control input-sm" name="type">
              <option value="" selected disabled>-- Select Type --</option>
              <option value="minor">Minor</option>
              <option value="major">Major</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2">Services</label>
          <div class="col-sm-10 col-md-10 col-xs-12">
              <select name="service_info[]" id="select-services" data-placeholder="Select Services" style="width: 100%;" class="multiple-select2 form-control" multiple="multiple">
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
          
          <div class="col-sm-10 col-sm-10 col-xs-12">
            <textarea name="description" class="form-control" id="" cols="" rows="5"
              aria-autocomplete="off"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Image</label>

          <div class="col-sm-10 col-sm-10 col-xs-12">
            <input type="file" name="image" class="form-control input-sm"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2 col-sm-10 col-xs-12">
           
           
          </div>
        </div>
      </div>
    </section>
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
         <input type="reset" name="reset" class="btn btn-danger btn-sm" value="cancel">
        <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add new Service">

      </div>
    </form>
    </div>
  </div>
</div>
<script>



$(document).ready(function () {

    get_services();
    // add();

      $('#frm-create-package').formValidation({
        message: 'This value is not valid',
        //live: 'disabled',
        icon: {
    //        valid: 'glyphicon glyphicon-ok',
    //        invalid: 'glyphicon glyphicon-remove',
          validating: 'fa fa-refresh fa-spin'
        },
        fields: {
          package_name: {
            validators: {
              notEmpty: {
                message: 'The package name is required and cannot be empty'
              }
            }
          },
          price: {
            validators: {
              notEmpty: {
                message: 'The  price is required and cannot be empty'
              },
              regexp: {
                regexp: /^\d+(\.\d{1,3})?$/,
                message: 'The price can only consist of number, dot and 3 decimal places only.'
              }
            }
          },
          'service_info[]': {
            validators: {
              notEmpty: {
                message: 'The service name is required and cannot be empty'
              }
            }
          },

          type: {
            message: 'The package type is not valid',
            validators: {
              notEmpty: {
                message: 'The service type is required and cannot be empty'
              }
            }
          },
        
          description: {
            validators: {
              notEmpty: {
                message: 'The description is required and cannot be empty'
              },
              stringLength: {
                min: 1,
                message: 'The description  must be more than 1 character long and 1000 max'
              }
            }
          },
          image: {
            validators: {
    //          notEmpty: {
    //            message: 'The service image is required and can\'t be empty'
    //          },
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
                text: "Service Package Successfully Created"
              });

              var table = $('#service-package-table').DataTable();
                  table.ajax.reload();

                  $('#add-service-package-dialog').modal('hide');

            
              $form
                .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
                .formValidation('resetForm', true);             // Reset the form

            }
            else {
              new PNotify({
                type: "error",
                text: "package Failed to create"
              });
            }


          }

        });
      });

     

});
  

function add(){
  
}

/*display the service type*/
function get_services() {
  $('#select-services').html('');
  // $('#select-services').append(' <option value="" selected disabled >-- Choose Type --</option>');
  $.ajax({
    url: '<?php echo base_url("services/service_available");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      for (var i = 0; i < data.length; i++) {
        $('#select-services').append('<option value="' + data[i].id + '">' + data[i].service + '</option>');
      }
    }
  });
} 


</script>