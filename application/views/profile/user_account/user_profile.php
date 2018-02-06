<style>
  #my_file {
    display: none;
  }

  /*#btn-get-file {*/
  /*background: #f9f9f9;*/
  /*border: 5px solid #88c;*/
  /*padding: 15px;*/
  /*border-radius: 5px;*/
  /*margin: 10px;*/
  /*cursor: pointer;*/
  /*}*/
</style>
<div id="content" class="content">
  <div class="pull-right">
    <a href="<?php echo base_url('user_account'); ?>" class="btn btn-sm btn-success pull-right"><span class="fa fa-arrow-circle-left"></span> back to user list</a>
  </div>
  <h1 class="page-header">Account Profile</h1>
  <!-- end page-header -->
  <!-- begin profile-container -->
  <div class="profile-container">
    <!-- begin profile-section -->
    <div class="profile-section">
      <!-- begin profile-left -->
      <div class="profile-left">
        <!-- begin profile-image -->
        <div class="profile-image">
          <img src="<?php echo $user['image']; ?>" id="image" class="img-responsive">
          <i class="fa fa-user hide"></i>
        </div>
        <!-- end profile-image -->
        <div class="m-b-10">
          <!-- <a href="#" class="btn btn-warning btn-block btn-sm">Change Picture</a> -->
          <form method="post" id="frm-image-upload" enctype="multipart/form-data" action="<?php echo base_url('user_account/change_pic'); ?>">
             <input type="file" name="image" onchange="upload()" id="files" class="btn btn-xs btn-warning btn-block"/>
             <input type="hidden" name="id"  id="id" value="<?php echo $user['id']; ?>" />
          </form>
        </div>
        <!-- begin profile-highlight -->
        <div class="profile-highlight">
          <h4><i class="fa fa-cog"></i> Change Password
            <button  id="btn-setting" class="btn btn-link btn-xs"><span class="fa fa-pencil"></span></button>
          </h4>
          <section id="update-setting">
            <form action="<?php echo base_url('user_account/setting'); ?>" id="frm-setting" method="post">
              <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" name="old" id="" class="form-control input-sm" autocomplete="off"/>
              </div>
              <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="new_pass" id="" class="form-control input-sm" autocomplete="off"/>
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm" id="" class="form-control input-sm" autocomplete="off"/>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>
                  Save
                </button>
                <button type="reset" id="reset" class="btn btn-sm btn-danger"><span class="glyphicon
                glyphicon-remove"></span>
                  Cancel
                </button>
              </div>
            </form>
          </section>
        </div>
        <!-- end profile-highlight -->
      </div>
      <!-- end profile-left -->
      <!-- begin profile-right -->
      <div class="profile-right">
        <!-- begin profile-info -->
        <div class="profile-info">
          <!-- begin table -->
          <div class="table-responsive">
            <table class="table table-profile">
              <thead>
              <tr>
                <th></th>
                <th>
                 <h4><?php echo html_escape($user['name']); ?>
                <small><?php echo html_escape($user['username']); ?></small>
              </h4>
                </th>
              </tr>
              </thead>
              <tbody>
              <tr class="highlight">
                <td class="field">Registered</td>
                <td><a href="#"><?php echo html_escape($user['date']); ?></a></td>
              </tr>
              
              <tr class="divider">
                <td colspan="2"></td>
              </tr>
              <tr>
                <td class="field"></td>
                <td><h4 class="title">Account Accessibility</h4></td>
              </tr>
              <tr>
                <td class="field"></td>
                <td>
                  <!-- <ul class="list-unstyled"> -->
                  <?php foreach ($access as $temp) { ?>
                     <a href="<?php echo base_url($temp->link); ?>" class="btn btn-info" style="margin-top:1%"><?php echo html_escape(ucwords($temp->module_name)) .' / '. html_escape(ucwords($temp->menu)); ?></a>
                  <?php } ?>
                  <!-- </ul> -->
                </td>
              </tr>
              <tr>
        
              </tbody>
            </table>
          </div>
          <!-- end table -->
        </div>
        <!-- end profile-info -->
      </div>
      <!-- end profile-right -->
    </div>
    <!-- end profile-section -->
    <!-- begin profile-section -->
    <div class="profile-section">
     <section class="row">
       <div class="col-sm-12 col-xs-12 col-md-12">
        <h4 class="title">Account Log History</h4>
         <table id="log-history" class="table table-bordered">
           <thead>
           <tr>
             <th>Login</th>
             <th>Logout</th>
           </tr>
           </thead>
           <tbody>
           <?php foreach ($logs as $log) { ?>
             <tr>
               <td><strong><?php echo html_escape($log->login); ?></strong></td>
               <td><strong><?php echo html_escape($log->logout); ?></strong></td>
             </tr>
           <?php } ?>
           </tbody>
         </table>
       </div>
     </section>
    </div>
    <!-- end profile-section -->
  </div>
  <!-- end profile-container -->
</div>

<script type="text/javascript">

  $(document).ready(function(){
    
    change();

    $('#frm-image-upload').on("submit", function(e){
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        data: new FormData(this),
        type: $(this).attr('method'),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
        if (data == 1) {
      new PNotify({
                type:'success',
                text:'Image successfully updated'
              });
        }    
        } 

      });
    });



  });


  function upload(){
    $('#frm-image-upload').submit();
  }


  function change(){
    $('#files').change(function(){
        var reader = new FileReader();
        reader.onload = function (e) {
        
            $('#image').attr('src',e.target.result);
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
  }
</script>

<script type="text/javascript">
function get_image() {
  $('#btn-get-file').click(function () {
    $("#file").click();
  })

  $('#file').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      data: new FormData('#frm-upload'),
      contentType: false,
      cache: false,
      processData: false,
      type: $(this).attr('method'),
      dataType: 'html',
      success: function (data) {
        if (data == 1) {
          new PNotify({
            text: 'Profile picture successfully updated.',
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
            text: 'Password failed to update.',
            type: 'error',
            icon: false
          });
        }

        // Reset the form
      }

    });


  });


}
$(document).ready(function () {
  get_image();
  var oTable = $('#log-history').dataTable({
    destroy: true,
    bSort: false,
    "oLanguage": {
      "sSearch": "Search"
    },
    "aoColumnDefs": [
      {
//          'bSortable': false
        'aTargets': [0]
      } //disables sorting for column one
    ],
    'iDisplayLength': 12,
    "sPaginationType": "full_numbers",
    "dom": 'T<"clear">lfrtip',
    "tableTools": {
      "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
    }

  });


  update();
  $('#frm-setting').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      old: {
        message: 'The password is not valid',
        validators: {
          notEmpty: {
            message: 'The old password is required and cannot be empty'
          },
          remote: {
            url: '<?php echo base_url("user_account/password_check"); ?>',
            type: 'post',
//              data: {password: $(this).val()},
            message: 'invalid password.',
            delay: 1000
          }
        }
      },
      new_pass: {
        validators: {
          notEmpty: {
            message: 'The password is required and can\'t be empty'
          },
          stringLength: {
            min: 6,
            max: 30,
            message: 'The password must be more than 6 and less than 30 characters long'
          },
          regexp: {
            regexp: /^[a-zA-Z0-9_\.]+$/,
            message: 'The username can only consist of alphabetical, number, dot and underscore'
          },
          different: {
            field: 'username',
            message: 'The password can\'t be the same as username'
          },
          callback: {
            callback: function (value, validator) {
              // Check the password strength
              if (value.length < 6) {
                return {
                  valid: false,
                  message: 'The password must be more than 6 characters'
                }
              }

              if (value === value.toLowerCase()) {
                return {
                  valid: false,
                  message: 'The password must contain at least one upper case character'
                }
              }
              if (value === value.toUpperCase()) {
                return {
                  valid: false,
                  message: 'The password must contain at least one lower case character'
                }
              }
              if (value.search(/[0-9]/) < 0) {
                return {
                  valid: false,
                  message: 'The password must contain at least one number'
                }
              }

              return true;
            }
          }
        }
      },
      confirm: {
        validators: {
          notEmpty: {
            message: 'The confirm password is required and can\'t be empty'
          },
          identical: {
            field: 'new_pass',
            message: 'The password and its confirm are not the same'
          }
        }
      },
      image: {
        validators: {
          file: {
            extension: 'jpeg,jpg,png',
            type: 'image/jpeg,image/png',
            maxSize: 2097152,   // 2048 * 1024
            message: 'Please choose a image file with the following format (jpg, jpeg and png only).'
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
      contentType: false,
      cache: false,
      processData: false,
      type: $(this).attr('method'),
      dataType: 'html',
      success: function (data) {
        if (data == 1) {
          new PNotify({
            // title: 'Account',
            text: 'Password successfully updated.',
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
            text: 'Password failed to update.',
            type: 'error',
            icon: false
          });
        }

        // Reset the form
      }

    });
  });


});

function update() {
  $('#update-setting').addClass('hide');
  $('#btn-setting').click(function () {
    $('#update-setting').removeClass('hide').slideDown();
    $('#view').addClass('hide').slideUp();
  });

  $('#reset').click(function () {

    $('#update-setting').addClass('hide').fadeOut();
    $('#view').removeClass('hide').fadeIn();
  });
}

</script>