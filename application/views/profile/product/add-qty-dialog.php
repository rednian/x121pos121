<div class="modal fade" id="add-qty-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Product Quantity</h4>
      </div>
      <div class="modal-body">

      <form method="post" action="<?php echo base_url('product/add_qty'); ?>" id="frm-qty-add1">
        <section class="row">
          <div class="form-group">
            <div class="col-xs-3">
               <label>Remaining Quantity</label>
               <input type="text" id="balance-qty" class="form-control" readonly="" value="">
               <input type="hidden" name="id" id="id"  value="0">
             </div>
          </div>
          <div class="form-group">
            <div class="col-xs-1"> <code>+</code></div>
          </div>
  
          <div class="form-group">
            <div class="col-xs-3">
              <label>New Quantity</label>
              <input type="number" name="quantity" id="current-qty" class="form-control" value="0">
            </div>
             <div class="col-xs-1"> <code>=</code></div>
             <div class="form-group">
               <div class="col-xs-3">
                 <label>Total Quantity</label>
                 <input type="text" id="total-qty" class="form-control" readonly="" value="0">
               </div>
          </div>
        </section>
        

         
          
        
     

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon"></span> Save Changes</button>
     </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  function add_qty(id, qty) {
    $('#balance-qty').val(qty);
    $('#id').val(id);
    $('#add-qty-dialog').modal('show');


        
  }



  $(document).ready(function(){

      $('#frm-qty-add1').formValidation({
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
              $('#add-qty-dialog').modal('hide');

              new PNotify({
                type:'success',
                text:'Quantity successfully added'
              });

              $form
                .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
                .formValidation('resetForm', true);

            }
          }
        });
   

  

      });

    $('#current-qty').on('keyup change', function(){

      var current = $('#current-qty').val();
      var balance = $('#balance-qty').val();

      $('#total-qty').val(parseFloat(current) + parseFloat(balance));

    });

  });
</script>