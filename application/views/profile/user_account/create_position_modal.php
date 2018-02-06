<div class="modal fade" id="modal-position" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h3>Add Position</h3>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" id="frm-position" method="post" action="<?php echo base_url('user_account/add_position');?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-1 control-label">Position</label>
            <div class="col-sm-6">
              <div class="input-group">
                   <input type="text" class="form-control input-sm" id="position" name="position" autocomplete="off" autofocus>
                  <div class="input-group-btn">
                      <button type="submit" class="btn btn-success btn-sm">
                         Save 
                      </button>
                  </div>
              </div>
            </div>
          </div>
       </form>

       <section class="panel panel-info">
         <div class="panel-heading">
           <h4 class="panel-title">Position List</h4>
         </div>
         <div class="panel-body">
           <table class="table table-bordered" id="table-position">
             <thead>
               <tr>
                 <th>Position</th>
               </tr>
             </thead>
           </table>
         </div>
       </section>
      
      

      </div>

      <div class="modal-footer">
        <div class="form-group">
          <button type="reset" id="btn-close" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    </div>
  </div>
</div>
<script>
function update_position(){  
  $('.value').editable({
    mode:'inline',
    highlight : true,
   // placement:'right',
   // showbuttons:false,
   url :'<?php echo base_url('user_account/update_position'); ?>',
   // title :'Enter Discount',
   success: function(response, newValue) {
     if (response == 1) {
         get_position();
        //update datatable view
            // $('#table-position').DataTable().ajax.reload();
     }
   },
   validate:function(value){
     if($.trim(value)== ''){
       return 'This field is requiered';
     }
   }
  });
}

  $(document).ready(function(){



    var position_table = $('#table-position').DataTable({
      ajax:'<?php echo base_url('user_account/get_position'); ?>',
      detroy:true,
      columns:[
        {
          'data':'position',
          render:function(position){
             update_position();
            return '<strong>'+position+'</strong>';
          }
        }
      ]
    });



    $('#btn-close').click(function(){
      $('#position').val('');
    });

    $('#frm-position').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {

       position: {
          validators: {
            notEmpty: {
              message: 'The Position name is required and can\'t be empty'
            },
            remote: {
              url: '<?php echo base_url("user_account/is_position_exist"); ?>',
              type: 'post',
              data: {position: $(this).val()},
              message: 'The position is already exist',
              delay: 1000
            }
          },
        
        }

      }/*end of fields*/
    }).on('success.form.fv', function (e) {
      e.preventDefault();

      var $form = $(e.target);
      $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: $(this).attr('method'),
        // contentType: false,
        // cache: false,
        // processData: false,
        dataType: 'html',
        success: function (data) {

          if(data == 1 ){
            
            // refresh the data in position select form
            get_position();

            //update datatable view
            $('#table-position').DataTable().ajax.reload();

            new PNotify({
              type: "success",
              text: "Position Successfully Created.",
            });

            $('#modal-position').modal('hide');
            $('#position').val('');
          }
          else{
            new PNotify({
              type: "warning",
              text: data,
            });
          }
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        },
        error:function(){
          new PNotify({
              type: "erro",
              text: "You got an error.",
            });
        }
      });
    });
  });
</script>
