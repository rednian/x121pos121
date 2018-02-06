<div class="modal fade" id="modal-product-type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon"></span> Add Product Type</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frm-prod-type" method="post" action="<?php echo base_url('product/add_product_type');?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 col-xs-12 control-label">Type</label>
            <div class="col-sm-10 col-xs-12">
              <input type="text" class="form-control input-sm" id="" name="type" autocomplete="off" autofocus="">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 col-xs-12 control-label">Image</label>
            <div class="col-sm-10 col-xs-12">
              <input name="image" type="file" id="image-type" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label for="" class="col-sm-2 col-xs-12 control-label">Description</label>
            <div class="col-sm-10 col-xs-12">
              <textarea class="form-control" name="type_description"  style="font-family: 'Courier New', Courier, monospace; min-height:100px;max-height: 30  0px " ></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon "></span> Save New Type</button>
          <button type="reset" class="btn btn-danger btn-sm">Refresh</button>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){

    $('#frm-prod-type').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
        // valid: 'glyphicon glyphicon-ok',
        // invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
       type_description: {
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
             },
          remote: {
          url: '<?php echo base_url("product/is_type_exist"); ?>',
          type: 'post',
          data: {type: $(this).val()},
          message: 'The product type is already added',
          delay: 1000
        }
           }
         },
         image: {
            validators: {
              // notEmpty: {
              //   message: 'The Product Image is required and can\'t be empty'
              // }
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
          console.log(data);
          if(data == 1 ){
        
            new PNotify({
              type: "success",
              text: "Product type Successfully Saved.",
            });

           fetch_new_type();
           $('#modal-product-type').modal('hide');
          }
          else{
            new PNotify({
              type: "success",
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
