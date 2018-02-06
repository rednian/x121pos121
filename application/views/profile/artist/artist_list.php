<?php include 'add-artist-description.php'; ?>
<section id="content" class="content">
 
  <h1 class="page-header">Artist Information</h1>
  <!-- end page-header -->
  
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><strong></strong></h4>
        </div>
          <div class="panel-body">
          <div class="panel-group" id="accordion">
            <div class="panel panel-success overflow-hidden">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">  
                      <i class="fa fa-plus-circle pull-right"></i> 
                   <strong>Create Artist</strong>
                  </a>
                </h3>
              </div>
              <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                 <?php 
                                  $attributes = array('class' => 'form', 'id' => 'frm-create-artist');
                 echo form_open('artist/create', $attributes);
                 ?>
                 <div class="form-group">
                   <label>First Name</label>
                   <input type="text" name="fname" class="form-control input-sm" autocomplete="off">
                 </div>
                 <div class="form-group">
                   <label>Middle Name</label>
                   <input type="text" name="midname" class="form-control input-sm" autocomplete="off">
                 </div>
                 <div class="form-group">
                   <label>Last Name</label>
                   <input type="text" name="lastname" class="form-control input-sm" autocomplete="off">
                 </div>
                 <!-- <div class="form-group">
                   <label>Desciption</label>
                    <div class="input-group">
                      <select class="form-control input-sm" name="description" id="description">
                        
                      </select>
                        <span class="input-group-btn">
                          <button class="btn btn-sm btn-success" id="add" type="button" data-toggle="modal"
                            data-target="#add-artist-description">
                            <span class="glyphicon glyphicon-plus"></span>
                          </button>
                        </span>
                    </div>
                 </div> -->
                 <div class="form-group">
                   <label>Contact Number</label>
                   <input type="text" name="contact_number" class="form-control input-sm" autocomplete="off">
                 </div>
                 <div class="form-group">
                   <label>Address</label>
                   <textarea class="form-control" rows="2" name="address" autocomplete="off"></textarea>
                 </div>
                 <div class="form-group">
                   <input type="submit" id="btn-save" name="submit" class="btn btn-sm btn-success" value="Save Artist" autocomplete="off" data-loading-text="Loading...">
                   <input type="reset" class="btn btn-sm btn-danger " value="Clear">
                 </div>

                 <?php 
                     echo form_close();
                  ?>

                </div>
              </div>
            </div>
          </div>
          </div>
      </div>

          
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
              <h4 class="panel-title"><strong>List of Artists</strong></h4>
          </div>
            <div class="panel-body">
              <table class="table table-condensed table-bordered table-sochic" id="artist-list">
                <thead>
                  <tr>
                    <th>show</th>
                    <!-- <th>#</th> -->
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div>
    </div>
  </div>
</section>

<!-- update modal -->
<div class="modal fade" id="update-artist-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Update Artist Information</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" action="<?php echo base_url('artist/update'); ?>" method="POST" id="frm-update-artist">
          <div class="form-group">
              <label class="col-md-4 control-label">First name</label>
              <div class="col-md-6">
                 <input type="text" name="fname" id="fname" autocomplete="off" autofocus="" class="input-sm form-control" placeholder="Firstname ">
                 <input type="hidden" name="id" id="id">
              </div>
          </div>
          <div class="form-group">
              <label class="col-md-4 control-label">Middle name</label>
              <div class="col-md-6">
                 <input type="text" name="midname" id="midname" autocomplete="off" class="input-sm form-control" placeholder="Middle name">
              </div>
          </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Last name</label>
              <div class="col-md-6">
                <input type="text" name="lastname" id="lastname" autocomplete="off" class="input-sm form-control" placeholder="Lastname">
              </div>
          </div>
          
          <div class="form-group">
              <label class="col-md-4 control-label">Contact</label>
               <div class="col-md-6">
                <input type="text" name="contact" id="contact" autocomplete="off" class="input-sm form-control" placeholder="Contact number ">
              </div>
          </div>

          <div class="form-group">
              <label class="col-md-4 control-label">Address</label>
               <div class="col-md-6">
                <textarea class="form-control input-sm" name="address" id="address" rows="5"></textarea>
              </div>
          </div>

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <input type="submit" name="submit" class="btn btn-sm btn-success" value="Save Changes">

      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">

function format ( d ) {
    // `d` is the original data object for the row
    var html  = '<section class="panel panel-info">';
        html +=     '<div class="panel-heading">'; 
        html +=     '<h4 class="panel-title"><strong>Artist Details</strong></h4>'; 
        html +=     '</div>';  
        html +=     '<div class="panel-body">';  
        html +=        '<table class="table">';  
        html +=           '<tr>';  
        html +=           '<td><strong>Full name</strong></td>';  
        html +=           '<td><strong>'+d.name+'</strong></td>';  
        html +=           '</tr>'; 
        html +=           '<tr>';  
        html +=           '<td><strong>Contact Number</strong></td>';  
        html +=           '<td><strong>'+d.contact+'</strong></td>';  
        html +=           '</tr>'; 
        html +=           '<tr>';  
        html +=           '<td><strong>Address</strong></td>';  
        html +=           '<td><strong>'+d.address+'</strong></td>';  
        html +=           '</tr>';
        html +=        '</table>';  
        html +=     '</div>';  
        html += '</section>';  

    return html;

}
  $(document).ready(function(){


    $('#update-artist-dialog').on('hidden.bs.modal', function (e) {
         $('form').formValidation('resetForm', true);  
         $('form').data('formValidation').resetForm();
    })

   

   

   var table = $('#artist-list').DataTable({
    ajax:{
      url:'<?php echo base_url('artist/get_artist'); ?>',
      beforeSend:function(){
      
      },
      complete:function(){
          
      }
    },

    destroy:true,
       dom: 'Bfrtip',
    buttons: [
            {
                extend:    'csv',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'CSV',
                className:'btn btn-sm btn-white text-success'
            },
            {
                extend:    'pdf',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                className:'btn btn-sm btn-white text-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                // titleAttr: 'print',
                className:'btn btn-sm btn-white',
                exportOptions: {
                               columns: ':visible'
                               }
            },
            { 
              extend:    'colvis',
              text:      'custom print',
              // titleAttr: 'PDF',
              className:'btn btn-sm btn-white'
            }
            
        ],
        columns: [
               {
                "className": 'details-control',
                "orderable": false,
                "data":      null,
                "defaultContent": ''
            },
             { "data": "name" },
             { "data": "contact" },
             { "data": "address" },
             { "data": "action" },
         ]
   
    });
   


    submit_update(table);  


   $('#artist-list tbody').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);
   
          if ( row.child.isShown() ) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          }
          else {
              // Open this row
              row.child( format(row.data()) ).show();
              tr.addClass('shown');
          }
      } );




    create_artist(table);
 
  });

  function remove_artist(id){
    (new PNotify({
           title: 'Confirmation Needed',
           type:'warning',
           text: 'Are you sure you want to delete?',
           icon: 'glyphicon glyphicon-question-sign',
           hide: false,
           confirm: {
               confirm: true
           },
           buttons: {
               closer: false,
               sticker: false
           },
           history: {
               history: false
           }
       })).get().on('pnotify.confirm', function() {

           $.ajax({
               url:'<?php echo base_url('artist/delete') ?>',
               data:{id:id},
               type:'POST',
               dataType:'html',
               success:function(data){
                if(data == 1){
                  
                  var table = $('#artist-list').DataTable();
                  table.ajax.reload();

                  new PNotify({
                    type: "success",
                    text: "Artist successfully deleted."
                  });
                }
                else{
                  new PNotify({
                    type: "error",
                    text: "Artist Failed to delete."
                  });
                }
                
               }
             });


       }).on('pnotify.cancel', function() {
         /*close the notify*/
       });

  }


  function update(id){

   $.ajax({
    url:'<?php echo base_url('artist/get_by_id'); ?>',
    data:{id:id},
    type:'POST',
    dataType:'JSON',
    success:function(data){
        $.each(data, function(index, data){
          $('#fname').val(data.fname);
          $('#midname').val(data.midname);
          $('#lastname').val(data.lastname);
          $('#contact').val(data.contact);
          $('#address').val(data.address);
          $('#id').val(data.id);
        });
    }
   });
  }

 

  function submit_update(table){


    $('#frm-update-artist').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
         valid: 'glyphicon glyphicon-ok',
         invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        fname: {
          validators: {
            notEmpty: {
              message: 'The first name is required and cannot be empty'
            },
            stringLength: {
              min: 2,
              max: 30,
              message: 'The first name must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\ñ\Ñ]+$/,
              message: 'The first name can only consist of alphabetical'
            }
          }
        },
        midname: {
          validators: { 
            // notEmpty: {
            //   message: 'The middle name is required and cannot be empty'
            // },
            stringLength: {
              min: 1,
              max: 30,
              message: 'The middle  name must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\ñ\Ñ\-]+$/,
              message: 'The middle name can only consist of alphabetical'
            }
          }
        },
        lastname: {
          // err: '#lastNameMessage',
          validators: {
            notEmpty: {
              message: 'The last   name is required and cannot be empty'
            },
            stringLength: {
              min: 2,
              max: 30,
              message: 'The last name must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\ñ\Ñ\-]+$/,
              message: 'The last name can only consist of alphabetical'
            }
          }
        },
        contact: {
          // err: '#lastNameMessage',
          validators: {
            // notEmpty: {
            //   message: 'The last   name is required and cannot be empty'
            // },
            // stringLength: {
            //   min: 2,
            //   max: 30,
            //   message: 'The last name must be more than 6 characters long'
            // },
            regexp: {
              regexp: /^[0-9\-\+]+$/,
              message: 'The contact number can only consist of number'
            }
          }
        },
        address: {
          // err: '#lastNameMessage',
          validators: {
            // notEmpty: {
            //   message: 'The last   name is required and cannot be empty'
            // },
            stringLength: {
              min: 2,
              // max: 30,
              message: 'The address must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[0-9a-zA-Z\s\ñ\Ñ\-\,\.]+$/,
              message: 'The last name can only consist of alphabetical'
            }
          }
        }
      }/*end of fields*/
    }).on('success.form.fv', function (e) {

      e.preventDefault();
      var $form = $(e.target);

       
        $('#btn-save').click(function(){
           var $btn = $(this).button('loading');
           alert('asd');
        });

      $.ajax({
        url: $(this).attr('action'),
        data: $(this).serialize(),
        type: 'POST',
        dataType: 'html',
        success: function (data) {
          if (data == 1) {

              table.ajax.reload();

              $('#update-artist-dialog').modal('hide');

            new PNotify({
              // title: 'Account',
              text: 'Artist Successfully updated.',
              type: 'success',
              icon: false
            });

            $form
              .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
              .formValidation('resetForm', true); 

          }
          else {
           new PNotify({
              // title: 'Account',
              text: 'Failed to update Artist Information. Please check your network connection.',
              type: 'error',
              icon: false
            }); 
          }

          // Reset the form
        }

      });
    });
  }



  function create_artist(table){
    $('#frm-create-artist').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
         valid: 'glyphicon glyphicon-ok',
         invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        fname: {
          validators: {
            notEmpty: {
              message: 'The first name is required and cannot be empty'
            },
            stringLength: {
              min: 2,
              max: 30,
              message: 'The first name must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\ñ\Ñ]+$/,
              message: 'The first name can only consist of alphabetical'
            }
          }
        },
        midname: {
          validators: { 
            // notEmpty: {
            //   message: 'The middle name is required and cannot be empty'
            // },
            stringLength: {
              min: 1,
              max: 30,
              message: 'The middle  name must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\ñ\Ñ\-]+$/,
              message: 'The middle name can only consist of alphabetical'
            }
          }
        },
        lastname: {
          // err: '#lastNameMessage',
          validators: {
            notEmpty: {
              message: 'The last   name is required and cannot be empty'
            },
            stringLength: {
              min: 2,
              max: 30,
              message: 'The last name must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\ñ\Ñ\-]+$/,
              message: 'The last name can only consist of alphabetical'
            }
          }
        },
        contact_number: {
          // err: '#lastNameMessage',
          validators: {
            // notEmpty: {
            //   message: 'The last   name is required and cannot be empty'
            // },
            // stringLength: {
            //   min: 2,
            //   max: 30,
            //   message: 'The last name must be more than 6 characters long'
            // },
            regexp: {
              regexp: /^[0-9\-\+]+$/,
              message: 'The contact number can only consist of number'
            }
          }
        },
        address: {
          // err: '#lastNameMessage',
          validators: {
            // notEmpty: {
            //   message: 'The last   name is required and cannot be empty'
            // },
            stringLength: {
              min: 2,
              // max: 30,
              message: 'The address must be more than 2 characters long'
            },
            regexp: {
              regexp: /^[0-9a-zA-Z\s\ñ\Ñ\-\,\.]+$/,
              message: 'The last name can only consist of alphabetical'
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
        type: 'POST',
        dataType: 'html',
        success: function (data) {
          if (data == 1) {
              table.ajax.reload();
            new PNotify({
              // title: 'Account',
              text: 'Artist Successfully created.',
              type: 'success',
              icon: false
            });

            $form
              .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
              .formValidation('resetForm', true);

          }
          else {
           new PNotify({
              // title: 'Account',
              text: 'Failed to create Artist. Please check your network connection.',
              type: 'error',
              icon: false
            }); 
          }

          // Reset the form
        }

      });
    });
  }
</script>