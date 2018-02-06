<div class="modal fade" id="confirm-dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Confirm Remove Service</h4>
      </div>
      <div class="modal-body">
        <section class="row">
          <div class="col-sm-12">
            <form id="frm-confirm" class="form" action="<?php echo base_url('sell/remove_service'); ?>" method="POST">
              <div class="form-group">
                <label>Enter Password</label>
                <input class="form-control" type="password" autocomplete="off" autofocus name="password">
              </div>
              <div class="form-group">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                 <input type="reset" name="reset" class="btn btn-danger btn-sm" value="Cancel">
                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Confirm">
              </div>
            </form>   
          </div>
        </section>
      </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">


  $(document).ready(function(){

    var confirm = false;

    $('#frm-confirm').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
         valid: 'glyphicon glyphicon-ok',
         invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        password: {
          message: 'The password is not valid',
          validators: {
            notEmpty: {
              message: 'The password is required and cannot be empty'
            },
            regexp: {
              regexp: /^[a-zA-Z][a-zA-Z0-9.]+$/,
              message: 'The password must start with letter and can only consist of alphabetical, number and dot'
            },
            remote: {
              url: '<?php echo base_url("user_account/is_password_exist"); ?>',
              type: 'post',
              data: {password: $(this).val()},
              message: 'The password is invalid',
              delay: 1000
            }
          }
        },
 
      }/*end of fields*/
    }).on('success.form.fv', function (e) {

      e.preventDefault();
      var $form = $(e.target);


     $.ajax({
      url:'<?php echo base_url('sell/remove_service'); ?>',
      data:{id:service_id},
      type:'POST',
      dataType:'JSON',
      success:function(data){

       var table = $('#table-list-service').DataTable();
          table.ajax.reload();
            get_total();

       $('#confirm-dialog').modal('hide');

      $form
        .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
        .formValidation('resetForm', true);
      }
    });

      $form
        .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
        .formValidation('resetForm', true);





    });
  });

  function delete_service(id){

    service_id = id;

    $('#confirm-dialog').modal('show');

  }

</script>