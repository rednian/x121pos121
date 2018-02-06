<section id="content" class="content">
  <div class="pull-right">
  <a href="<?php echo base_url('customer/') ?>" class="btn btn-success btn-sm pull-right "><span
      class="fa fa-arrow-circle-left"></span> back to customer list</a>
  </div>
  <h1 class="page-header">Create New Customer
    <!-- <small>header small text goes here...</small> -->
  </h1>
  <!-- end page-header -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                class="fa fa-times"></i></a>
          </div>
          <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
        <form class="form-horizontal" id="create-customer" method="post" action="<?php echo base_url
        ('customer/add'); ?>">
          <div class="form-group">
            <label for="" class="col-sm-2  col-xs-12 control-label">Name</label>

            <div class="col-sm-5 col-xs-12">
              <input type="text" class="form-control" name="fname" id="fname" placeholder="First" autofocus=""
                autocomplete="off">
            </div>
            <div class="col-sm-5 col-xs-12">
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last" autocomplete="off">
            </div>
            <span style="margin-left: 19%" class="help-block col-sm-offset-2 col-xs-12" id="firstNameMessage"></span>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 col-xs-12 control-label">Contact</label>

            <div class="col-sm-10 col-xs-12">
              <input type="text" class="form-control" name="contact" id="contact" placeholder="Phone or Mobile#" autocomplete="off">
            </div>
          </div>
          <h5>Address</h5>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 col-xs-12 control-label">Street </label>

            <div class="col-sm-3 col-xs-12">
              <input type="text" class="form-control" name="block" id="block" placeholder="Block #" autocomplete="off">
            </div>
            <div class="col-sm-3 col-xs-12">
              <input type="text" class="form-control" name="lot" id="lot" placeholder="lot #" autocomplete="off">
            </div>
            <div class="col-sm-4 col-xs-12">
              <input type="text" class="form-control" name="street" id="street" placeholder="Street name" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 col-xs-12 control-label">Town </label>

            <div class="col-sm-3 col-xs-12">
              <input type="text" class="form-control" name="brgy" id="brgy" placeholder="Brgy." autocomplete="off">
            </div>
            <div class="col-sm-3 col-xs-12">
              <input type="text" class="form-control" name="city" id="city" placeholder="City" autocomplete="off">
            </div>
            <div class="col-sm-4 col-xs-12">
              <input type="text" class="form-control" name="province" id="province" placeholder="Province" autocomplete="off">
            </div>
            <span style="margin-left: 19%" class="help-block col-sm-offset-2 col-xs-12" id="error"></span>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 col-xs-12 control-label">Country </label>

            <div class="col-sm-6 col-xs-12">
              <input type="text" class="form-control" name="country" id="country" placeholder="Country" autocomplete="off">
            </div>
            <div class="col-sm-4 col-xs-12">
              <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zipcode" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 col-xs-12">
              <button type="submit" name="submit" class="btn btn-success btn-sm">
                <span class="fa fa-save"></span>
                Save
                New Customer
              </button>
              <button type="reset" class="btn btn-danger btn-sm" id="reset">
                <span class="glyphicon glyphicon-remove"></span>
                Cancel
              </button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function () {
    $('#create-customer').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        fname: {
          err: '#firstNameMessage',
          validators: {
            notEmpty: {
              message: 'The first name is required and cannot be empty'
            },
            stringLength: {
              min: 2,
              max: 30,
              message: 'The first name must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\-]+$/,
              message: 'The first name can only consist of alphabetical'
            }
          }
        },
        lastname: {
          err: '#firstNameMessage',
          validators: {
            notEmpty: {
              message: 'The last   name is required and cannot be empty'
            },
            stringLength: {
              min: 2,
              max: 30,
              message: 'The last name must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s\-]+$/,
              message: 'The last name can only consist of alphabetical'
            }
          }
        },
        contact: {
          message: 'The contact is not valid',
          validators: {
            notEmpty: {
              message: 'The contact is required and cannot be empty'
            },
            stringLength: {
              min: 6,
              max: 13,
              message: 'The contact must be more than 6 and less than 13 characters long'
            },
            regexp: {
              regexp: /^[0-9-\+]+$/,
              message: 'The contact can only consist of number and dash'
            }
          }
        },
        block: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The block can only consist of number'
            }
          }
        },
        lot: {
          validators: {
            regexp: {
              regexp: /^[0-9]+$/,
              message: 'The lot can only consist of number'
            }
          }
        },
        street: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The street can only consist of number'
            }
          }
        },
        brgy: {
          err: '#error',
          validators: {
            notEmpty: {
              message: 'The barangay is required and can\'t be empty'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The barangay can only consist of alphabetical'
            }
          }
        }, city: {
          err: '#error',
          validators: {
            notEmpty: {
              message: 'The city is required and can\'t be empty'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The city can only consist of alphabetical'
            }
          }
        }, province: {
          err: '#error',
          validators: {
            notEmpty: {
              message: 'The province is required and can\'t be empty'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The province can only consist of alphabetical'
            }
          }
        },
        country: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The country can only consist of alphabetical'
            }
          }
        },
        zipcode: {
          validators: {
            regexp: {
              regexp: /^[0-9]+$/,
              message: 'The zipcode can only consist of number'
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
        type: 'post',
        dataType: 'html',
        success: function (response) {
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form
        new PNotify({
          type:'success',
          text:response
        });
        }
      });
    });


    /*populate table recently added customer*/
    $.ajax({
      url: '<?php echo base_url("customer/recently_added");?>',
      dataType: 'json',
      success: function (data) {


        // for (var i = 0; i < data.length; i++) {
        //   $('#customer-list').html(data[i]['name']);
        //   $('#con').html(data[i]['contact']);
        //   $('#address').html(data[i]['address']);
        // }
      },
      error: function (err, xhr) {
       
      }
    });
  });

</script>

