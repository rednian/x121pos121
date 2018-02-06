
<?php $this->load->view('profile/user_account/update-user-dialog'); ?>

<div id="content" class="content">
  <div class="pull-right">
    <a href="<?php echo base_url('user_account/create_new_user') ?>" class="btn btn-success pull-left btn-sm "><span
        class="fa fa-user-plus"></span> Register New Account</a>
  </div>
  <h1 class="page-header">User Account List</h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                          <strong>List of Registered Accounts</strong>
                        </h4>
                    </div>
                    <div class="panel-body">
                       <section class="row">
                         <div class="col-md-12" id="list">
                           <section class="panel">
                             <div class="panel-body">
                               <section id="container">
                                 <table id="user-list" class="table table-bordered table-sochic">
                                   <thead>
                                   <tr class="headings">
                                     <th class="text-center">
                                       Name
                                       <div>(lastname, firstname M.I.)</div>
                                     </th>
                                     <th>Position</th>
                                     <th>Username</th>
                                     <th>Created Date</th>
                                     <th class="hidden-print no-link last"><span class="hidden-print col-sm-2">Action</span>
                                     </th>
                                   </tr>
                                   </thead>
                                 </table>
                               </section>
                             </div>
                           </section>
                         </div>
                       </section>
                    </div>
                </div>
      </div>
  </div>
</div>




<script>

$(document).ready(function () {
  user_list();
  load_position();
  save_update();
});

function load_position() {
//    $('#position').html('');
// var selected = '';
  $.ajax({
    url: '<?php echo base_url('user_account/get_position_type') ?>',
    dataType: 'JSON',
    success: function (data) {
      $.each(data, function (index, data) {
  

        $('#position').append('<option value="' + data.id + '" >' + data.type + '</option>');

      });
    }

  });
}

function save_update() {
  $('#frm-user-update').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      fname: {
        validators: {
          notEmpty: {
            message: 'The first name is required and cannot be empty'
          },
          stringLength: {
            min: 3,
            max: 30,
            message: 'The first name must be more than 3 characters long'
          },
          regexp: {
            regexp: /^[a-zA-Z\s]+$/,
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
            min: 3,
            max: 30,
            message: 'The middle  name must be more than 3 characters long'
          },
          regexp: {
            regexp: /^[a-zA-Z\s]+$/,
            message: 'The middle name can only consist of alphabetical, number, dot and underscore'
          }
        }
      },
      lastname: {
        validators: {
          notEmpty: {
            message: 'The last   name is required and cannot be empty'
          },
          stringLength: {
            min: 3,
            max: 30,
            message: 'The last name must be more than 6 characters long'
          },
          regexp: {
            regexp: /^[a-zA-Z\s]+$/,
            message: 'The last name can only consist of alphabetical, number, dot and underscore'
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
          user_list();
          $('#list').addClass('col-md-12');
          $('#list').removeClass('col-md-8');
          $('#update').addClass('hide');
          location.reload();

          new PNotify({
            // title: 'Account',
            text: 'Account Successfully updated.',
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
            text: 'Acount failed to update.',
            type: 'error',
            icon: false
          });
        }

        // Reset the form
      }

    });
  });
}

function update_user_view(id) {
  // $('#list').removeClass('col-md-12');
  // $('#list').addClass('col-md-8');
  // $('#update').removeClass('hide');
  $.ajax({
    url:'<?php echo base_url('user_account/get_accessibility'); ?>',
    data:{id:id},
    type:'POST',
    dataType:'JSON',
    success:function(data){

      $.each(data, function(index, data){
       $('input:checkbox[value='+data.id+']').attr('checked','checked');

      });
           
    }
  });

  $.ajax({
    url: '<?php echo base_url('user_account/get_user_by_id') ?>',
    data: {id: id},
    type: 'POST',
    dataType: 'JSON',
    success: function (data) {
      $.each(data, function (index, data) {
        $('#fname').val(data.fname);
        $('#midname').val(data.midname);
        $('#lastname').val(data.lastname);
        $('#data-id').val(data.id);
        $('#position').val(data.pos_id);

      });
    }

  });

  /*add the position*/
}

function user_list() {


   var closePrintView = function(e) {
   if(e.which == 27) {
   printViewClosed();  
   }
   };

   function printViewClosed() {
   oTable.fnSetColumnVis(5, true);
   $(window).unbind('keyup', closePrintView);
   }

   var oTable = $('#user-list').dataTable({
    destroy: true,
    bSort: false,
    responsive:true,
       dom: 'Bfrtip',
    buttons: [
            // {
            //     extend:    'copy',
            //     text:      '<i class="fa fa-files-o"></i>',
            //     titleAttr: 'Copy',
            //     className:'btn btn-sm btn-white',
            //     Columns: [0, 1, 2, 3]
            // },
            // {
            //     extend:    'excelHtml5',
            //     text:      '<i class="fa fa-file-excel-o"></i>',
            //     titleAttr: 'Excel',
            //     className:'btn btn-sm btn-info'
            // },
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
   });



  $.ajax({
    url: '<?php echo base_url('user_account/active_users'); ?>',
    dataType: 'JSON',
    success: function (data) {
      oTable.fnClearTable();
      $.each(data, function (index, data) {
        oTable.fnAddData([data.image + ' ' + data.name, data.position, data.username, data.date, data.view + ' ' + data.update + ' ' + data.delete]);
      });
      $("#container").LoadingOverlay("hide", true);
    },
    beforeSend: function () {
      $("#container").LoadingOverlay("show", {
        image: "",
        fontawesome: "fa fa-circle-o-notch fa-spin fa-1x spin"
      });
    }
  });
}

function delete_user(id) {
  (new PNotify({
    title: 'Confirmation Needed',
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
  })).get().on('pnotify.confirm', function () {
      $.ajax({
        url: '<?php echo base_url('user_account/remove_user') ?>',
        data: {id: id},
        type: 'POST',
        dataType: 'html',
        success: function (data) {
          user_list();
          new PNotify({
            type: "success",
            text: "User successfully deleted."
          });
        }
      });
    }).on('pnotify.cancel', function () {
      /*close the notify*/
    });
  ;
}

</script>

