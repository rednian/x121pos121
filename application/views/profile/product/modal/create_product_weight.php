<div class="modal fade" id="modal-product-weight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon"></span> Add Product Weight Type</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frm-prod-weight" method="post" action="<?php echo base_url('product/add_weight');?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-12 control-label">Weight</label>
            <div class="col-sm-10 col-xs-12">
              <input type="text" class="form-control input-sm" id="" name="weight" autocomplete="off">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon "></span> Save Type</button>
          <!-- <button type="reset" class="btn btn-danger btn-sm">Refresh</button> -->
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){

    $('#frm-prod-weight').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
        // valid: 'glyphicon glyphicon-ok',
        // invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
       weight: {
          validators: {
            notEmpty: {
              message: 'The Product size is required and can\'t be empty'
            },
             remote: {
          url: '<?php echo base_url("product/is_weight_exist"); ?>',
          type: 'post',
          data: {weight: $(this).val()},
          message: 'The weight unit is already added',
          delay: 1000
        }
          }
        },

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
          if(data == 1 ){

            $('#modal-product-weight').modal('hide');
            fetch_new_weight();

        
            new PNotify({
              type: "success",
              text: "Product Weight Successfully Saved.",
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
