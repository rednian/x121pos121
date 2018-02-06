<div class="modal fade" id="artist-package-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Select Artist</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frm-artist-package" method="post" action="<?php echo base_url('sell/add_package_artist_temp'); ?>">   
          
            <div class="form-group">
                <label class="col-sm-2 control-label">Add Artist</label>
                <div class="col-sm-5">
                    <!-- <input class="form-control input-sm" list="artist-list" name="name" placeholder="Select Artist" autocomplete="off" /> -->
                    <select name="artist_id" class="form-control input-sm" id="artist-list-package">
                    </select>
                    <input type="hidden" name="package_id" class="form-control" id="package-id">
                    <input type="hidden" name="temp_id" class="form-control" id="package-temp-id">
                    <input type="hidden" name="total" class="form-control" id="package-total">
                    <!-- <datalist id="artist-list"></datalist> -->
                </div>
                <div class="col-sm-2">
                    <input class="form-control input-sm" type="text" pattern="[0-9]+([.][0-9]+)?" name="commission" placeholder="%" autocomplete="off" />
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success btn-sm addButton" data-template="textbox"><span class="fa fa-plus"></span></button>
                    <!-- <button type="reset" class="btn btn-danger btn-sm addButton" data-template="textbox"><span class="fa fa-remove"></span></button> -->
                </div>
            </div>
          </form>
          <section class="panel panel-info">
            <div class="panel-heading">
              <h4 class="panel-title">Artist Commission</h4>
            </div>
            <div class="panel-body">
            <h2  class="pull-left">Price: <span id="title-price-package"></span></h2>
              <table class="table" id="artist-table-package">
                <thead>
                  <th>Artist Name</th>
                  <th>Commision</th>
                  <th>Action</th>
                </thead>
              </table>
            </div>
          </section>
         
             
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <input id="submit-artist-package" type="button" name="action" class="btn btn-sm btn-success" value="Save">
      </div>
    
    </div>
  </div>
</div>
<script type="text/javascript">

function add_artist_package(p_id, total, id){

  $('#artist-package-dialog').modal('show');

  $('#title-price-package').html(total);
  $('#package-total').val(total);
  $('#package-id').val(p_id);
  $('#package-temp-id').val(id);


  
}
  

  $(document).ready(function(){

add_artist_temp();

    artist();

    $('#submit-artist-package').click(function(){
      $.ajax({
        url:'<?php echo base_url('sell/package_transer_artist'); ?>',
        dataType:'json',
        success:function(data){
          if(data == 1){
            $('#artist-table-package').DataTable().ajax.reload();
            $('#artist-package-dialog').modal('hide');
          }
        }
      });
    });

   

//     $('#btn-add').click(function(){
//        alert($('#btn-add').attr('data-price'));
//     });

//     add();

    var artist_table = $('#artist-table-package').DataTable({
      paginate:false,
      sort:false,
      search:false,
      info:false,
      filter:false,
      ajax:'<?php echo base_url('sell/display_artist_package'); ?>',
      columns:[
          {'data':'name'},
          {'data':'commission'},
          {'data':'action'},
      ]
    });

    

  });

  function artist_delete_package(id) {
  $.ajax({
    url:'<?php echo base_url('sell/artist_delete_package'); ?>',
    data:{id:id},
    type:'POST',
    success:function(data) {
      if(data == 1){

      $('#artist-table-package').DataTable().ajax.reload();

      new PNotify({
        type:'success',
        text:'Artist removed from list'
      });
      }
    }
  });
} 

  function add_artist_temp() {
     $('#service-info-id').val($('#art-id').attr('data-id'));

     
      $('#frm-artist-package').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
       name: {
          validators: {
            notEmpty: {
              message: 'The name is required and can\'t be empty'
            },
            // regexp: {
            //   regexp: /^[a-zA-Z\s\ñ\Ñ]+$/,
            //   message: 'The name can only consist of alphabetical'
            // }
           
          }
        },
         commission: {
          validators: {
            notEmpty: {
              message: 'The commission is required and can\'t be empty'
            },
            regexp: {
              regexp: /^[0-9\.]+$/,
              message: 'The commission can only consist of number'
            }
           
          }
        }

      }/*end of fields*/
    }).on('success.form.fv', function (e) {
      e.preventDefault();

      var $form = $(e.target);
      $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: $(this).attr('method'),
        dataType: 'html',
        success: function (data) {
          
          if(data == 1){

            $('#artist-table-package').DataTable().ajax.reload();

           

          



            
            new PNotify({
              type:'success',
              text :'Artist Added'
            });
          }
       
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        },
        error:function(){
          new PNotify({
              type: "error",
              text: "There something wrong with the server. Please try again later.",
            });
        }
      });
    });
  }

  function artist(){

    var option = $('#artist-list-package');

    option.html('<option selected disabled> Select Artist </option>');
      $.ajax({
      url:'<?php echo base_url('sell/get_artist'); ?>',
      dataType:'json',
      success:function(data){

        $.each(data, function(index, data){
          option.append('<option value="'+data.id+'" >'+data.name+'</option>');
          // $('#artist-list').append('<option value="'+data.name+'">');
        });

      }
    });
  }




</script>