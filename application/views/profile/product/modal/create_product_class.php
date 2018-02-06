<div class="modal fade" id="modal-product-class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon"></span> Add Product Class</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frm-prod-class" method="post" action="<?php echo base_url('product/add_product_class');?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 col-xs-12 control-label">Product Type</label>
            <div class="col-sm-9 col-xs-12">
              <select class="form-contol input-sm" name="type" id="modal-type">
                <option value="" selected="" disabled=""> -- Choose Type -- </option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 col-xs-12 control-label">Product Class</label>
            <div class="col-sm-9 col-xs-12">
              <input name="prod_class" type="text" class="form-control input-sm" autocomplete="off" />
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-3 col-xs-12 control-label">Description</label>
            <div class="col-sm-9 col-xs-12">
              <textarea class="form-control" name="class_description"  style="font-family: 'Courier New', Courier, monospace; min-height:100px;max-height: 300px " ></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon "></span> Save New Class</button>
          <button type="reset" class="btn btn-danger btn-sm">Refresh</button>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
function load_type(){
  $('#modal-type').html('');
  $('#modal-type').append(' <option value="" selected disabled >-- Choose Type --</option>');
  $.ajax({
    url: '<?php echo base_url("product/get_product_type");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      $.each(data, function(index, data){
         $('#modal-type').append('<option value="' + data.id + '">' + data.type + '</option>');
      });

    }
  });
}

  $(document).ready(function(){
    load_type();

    $('#frm-prod-class').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
        // valid: 'glyphicon glyphicon-ok',
        // invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
       class_description: {
          validators: {
            notEmpty: {
              message: 'The Description is required and can\'t be empty'
            }
          }
        },
        type: {
           validators: {
             notEmpty: {
               message: 'The Product Type is required and can\'t be empty'
             }
           }
         },
         prod_class: {
            validators: {
              notEmpty: {
                message: 'The Product class is required and can\'t be empty'
              },
          remote: {
          url: '<?php echo base_url("product/is_class_exist"); ?>',
          type: 'post',
          data: {prod_class: $(this).val()},
          message: 'The product class is already added',
          delay: 1000
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
        type:$(this).attr('method'),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'html',
        success: function (data) {
           // fetch_class();
           fetch_type();
          if(data == 1 ){
            new PNotify({
              type: "success",
              text: "Product Class Successfully Saved.",
            });

          
            
          }
          else{
            new PNotify({
              type: "error",
              text: data
                });
          }
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        },
        error:function(){
         alert('error'); 
        }
      });
    });
  });
</script>
