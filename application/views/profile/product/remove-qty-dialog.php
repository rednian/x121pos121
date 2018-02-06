<div class="modal fade" id="remove-qty-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Pull-out Product Quantity</h4>
      </div>
      <div class="modal-body">

      <form method="post" action="<?php echo base_url('product/remove_qty'); ?>" id="frm-qty-remove1">
        <section class="row">
          <div class="form-group">
            <div class="col-xs-3">
               <label>Remaining Quantity</label>
               <input type="text" id="balance-qty1" class="form-control" readonly="" value="">
               <input type="hidden" name="id" id="id1"  value="0">
             </div>
          </div>
          <div class="form-group">
            <div class="col-xs-1"> <code>-</code></div>
          </div>
  
          <div class="form-group">
            <div class="col-xs-3">
              <label>Enter Quantity</label>
              <input type="number" name="quantity" id="current-qty1" class="form-control" value="0">
            </div>
             <div class="col-xs-1"> <code>=</code></div>
             <div class="form-group">
               <div class="col-xs-3">
                 <label>Remaining Quantity</label>
                 <input type="text" id="total-qty1" class="form-control" readonly="" value="0">
               </div>
          </div>
        </section>
        

         
          
        
     

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon"></span>Submit</button>
     </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  function remove_qty(id, qty) {
    $('#balance-qty1').val(qty);
    $('#id1').val(id);
    $('#remove-qty-dialog').modal('show');


        
  }



  $(document).ready(function(){

      $('#frm-qty-remove1').formValidation({
        message: 'This value is not valid',
        //live: 'disabled',
        icon: {
  //        valid: 'glyphicon glyphicon-ok',
  //        invalid: 'glyphicon glyphicon-remove',
          validating: 'fa fa-refresh fa-spin'
        },
        fields: {
          quantity: {
            validators: {
              notEmpty: {
                message: 'The quantity is required and cannot be empty'
              },
              regexp: {
                regexp: /^[0-9]+$/,
                message: 'The quantity can only consist of number'
              }
            }
          }
        }/*end of fields*/
      }).on('success.form.fv', function (e) {

        e.preventDefault();
        var $form = $(e.target);

        $.ajax({
          url: $(this).attr('action'),
          type: $(this).attr('method'),
          data: $(this).serialize(),
          dataType:'JSON',
          success:function(data){

            if(data == 1){
              
              $('#product-list').DataTable().ajax.reload();
              $('#remove-qty-dialog').modal('hide');

              new PNotify({
                type:'success',
                text:'Quantity successfully deducted'
              });

              $form
                .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
                .formValidation('resetForm', true);

            }
          }
        });
   

  

      });

    $('#current-qty1').on('keyup change', function(){

      var current = $('#current-qty1').val();
      var balance = $('#balance-qty1').val();

      $('#total-qty1').val(parseFloat(balance) - parseFloat(current));

    });

  });
</script>