<?php $this->load->view('profile/user_account/create_position_modal'); ?>

<section id="content" class="content">
   <div class="pull-right">
     <a href="<?php echo base_url('user_account'); ?>" class="btn btn-sm btn-success pull-left">
     <span class="fa fa-arrow-circle-left"></span>
       back to user list</a>
   </div>
  <h1 class="page-header">Register New Account</h1>
  <!-- end page-header -->
  
  <div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
              <h4 class="panel-title">
                <section class="row">
                  <div class="col-sm-1 col-xs-12 col-md-1">
                   
                  </div>
                </section>
              </h4>
          </div>
            <div class="panel-body">

              <?php echo form_open('user_account/add_user', 'class="form-horizontal" id="create-user" role="form"'); ?>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <section class="row">
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="First" autofocus=""
                        autocomplete="off">
                      <span class="help-block" id="firstNameMessage"/>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="" name="midname" placeholder="Middle"
                        autocomplete="off">
                      <span class="help-block" id="MidNameMessage"/>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last"
                        autocomplete="off">
                      <span class="help-block" id="lastNameMessage"/>
                    </div>
                  </section>

                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Position</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <select class="form-control" name="position" id="position-type">
                      <option value="" selected disabled>-- Choose Position --</option>
                    </select>
                      <span class="input-group-btn">
                        <button class="btn btn-success" id="add" type="button" data-toggle="modal"
                          data-target="#modal-position">
                          <span class="fa fa-plus"></span>
                        </button>
                      </span>
                  </div>
                  <div class="input-group hidden" id="add-position-type">
                    <input type="text" class="form-control" name="position_type" placeholder="add new position">
                      <span class="input-group-btn">
                        <button class="btn btn-success" id="save-position" type="button">
                          add new position
                        </button>
                      </span>
                  </div>
                  <section id="pos-type" class="col-sm-12"></section>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>

                <div class="col-sm-10">
                  <input type="password" name="confirmPassword" class="form-control ">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <input type="submit" name="submit" class="btn btn-success btn-sm" value="Submit">
                  <input type="reset" name="reset" class="btn btn-danger btn-sm" value="cancel">
                </div>
              </div>






            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
              <h4 class="panel-title"><strong>Account Accessibility</strong></h4>
          </div>
            <div class="panel-body">
             
             <div class="page-header">
               <h6>Profile Information</h6>
             </div>

             <section class="row">
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                      
                       <input type="checkbox" name="accessibility[]" value="2"> Account
                     </label>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="3"> Product
                     </label>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="4"> Service
                     </label>
                   </div>
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="5"> Artist
                     </label>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="6"> Company
                     </label>
                   </div>
                 </div>
               </div>
             </section>

             <!-- <div class="page-header">
               <h6>Monitoring</h6>
             </div>
 -->
        <!--      <section class="row">
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="7"> Product 
                     </label>
                   </div>
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="8"> Service
                     </label>
                   </div>
                 </div>
               </div>
             </section> -->


             <div class="page-header">
               <h6>Reward</h6>
             </div>

             <section class="row">
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="7"> Pointing System  
                     </label>
                   </div>
                 </div>
               </div>
             </section>

             <div class="page-header">
               <h6>Reports</h6>
             </div>

             <section class="row">
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="8"> Inventory  
                     </label>
                   </div>
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="9"> Sales  
                     </label>
                   </div>
                 </div>
                 
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="10"> Artist  
                     </label>
                   </div>
                 </div>
                 
               </div>
             </section>

             <div class="page-header">
            <!--    <h6>Web Settings</h6>
             </div> -->

             <!-- <section class="row">
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="12"> About Us  
                     </label>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="13"> Products  
                     </label>
                   </div>
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="14"> Services  
                     </label>
                   </div>
                 </div>
                 
               </div>
             </section> -->


             <div class="page-header">
               <h6>Sell</h6>
             </div>

             <section class="row">
               <div class="col-sm-12 col-xs-12">
                 <div class="form-group">
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="accessibility[]" value="1"> Common
                     </label>
                   </div>
                 </div>
               </div>
             </section>


            </div>
        </div>
    </div>
  </div>
</section>
<script>

function get_position() {
  $('#position-type').html('');
  $('#position-type').append(' <option value="" selected disabled >-- Choose Position --</option>');
  $.ajax({
    url: '<?php echo base_url("user_account/get_position_type");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      for (var i = 0; i < data.length; i++) {
        $('#position-type').append('<option value="' + data[i].id + '">' + data[i].type + '</option>');
      }
    }
  });
}

$(document).ready(function () {

  get_position();


  $('#create-user').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
       // valid: 'glyphicon glyphicon-ok',
       // invalid: 'glyphicon glyphicon-remove',
      // validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      fname: {
        err: '#firstNameMessage',
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
            regexp: /^[a-zA-Z\s\ñ\Ñ]+$/,
            message: 'The first name can only consist of alphabetical'
          }
        }
      },
      midname: {
        err: '#MidNameMessage',
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
            regexp: /^[a-zA-Z\s\ñ\Ñ]+$/,
            message: 'The middle name can only consist of alphabetical, number, dot and underscore'
          }
        }
      },
      lastname: {
        err: '#lastNameMessage',
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
            regexp: /^[a-zA-Z\s\ñ\Ñ]+$/,
            message: 'The last name can only consist of alphabetical, number, dot and underscore'
          }
        }
      },
      username: {
        message: 'The username is not valid',
        validators: {
          notEmpty: {
            message: 'The username is required and cannot be empty'
          },
          stringLength: {
            min: 5,
            max: 20,
            message: 'The username must be more than 5 and less than 20 characters long'
          },
          regexp: {
            regexp: /^[a-zA-Z][a-zA-Z0-9.]+$/,
            message: 'The username must start with letter and can only consist of alphabetical, number and dot'
          },
          remote: {
            url: '<?php echo base_url("user_account/is_username_exist"); ?>',
            type: 'post',
            data: {username: $(this).val()},
            message: 'The username is not available',
            delay: 1000
          }
        }
      },
      password: {
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
            regexp: /^[a-zA-Z0-9\_\.]+$/,
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
      confirmPassword: {
        validators: {
          notEmpty: {
            message: 'The confirm password is required and can\'t be empty'
          },
          identical: {
            field: 'password',
            message: 'The password and its confirm are not the same'
          }
        }
      },
  'accessibility[]': {
          validators: {
              notEmpty: {
                  message: 'Please specify at least one language you can speak'
              }
            }
          },
      position: {
        validators: {
          notEmpty: {
            message: 'The Position is required and can\'t be empty'
          }
        }
      },
      country: {
        validators: {
          notEmpty: {
            message: 'The country is required and can\'t be empty'
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
          new PNotify({
            // title: 'Account',
            text: 'Account Successfully created.',
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
            text: 'Failed to create. Account. Please check your network connection.',
            type: 'error',
            icon: false
          });
        }

        // Reset the form
      }

    });
  });
});
</script>