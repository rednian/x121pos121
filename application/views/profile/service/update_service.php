<div class="right_col" role="main">
  <ol class="breadcrumb pull-right">
    <li><?php echo anchor('dashboard', 'Dashboard') ?></li>
    <li><a href="#">Product Information</a></li>
    <li class="active"><?php echo anchor('product', 'Product List') ?></li>
    <li class="active"><?php echo anchor('product/add_product', 'Add New Product'); ?></li>
  </ol>
  <section class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><span class="fa fa-user-plus"></span> <?php echo $heading; ?></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <section class="row">
            <div class="col-xs-3">
              <a href="<?php echo base_url('services'); ?>" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-list-alt"></span> back to service list
              </a>
            </div>
          </section>
          <section class="row">
            <form id="add-product" class="form-horizontal" action="<?php echo base_url('product/add'); ?>"
                  role="form"
                  method="post">
              <div class="col-md-9 col-md-offset-1 col-sm-6 col-xs-12">
                <section class="panel panel-default">
                  <div class="panel-heading">
                    Service Information
                  </div>
                  <div class="panel-body">
                    <section class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Name</label>

                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="service_name">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Type</label>

                          <div class="col-sm-10">
                            <div class="input-group">
                              <select class="form-control" name="type" id="type">
                                <option value="" selected disabled>-- Choose Type --</option>
                              </select>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                      <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                  </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Class</label>

                          <div class="col-sm-10">
                            <div class="input-group">
                              <select class="form-control" name="class" id="class">
                                <option value="" selected disabled>-- Choose Class --</option>
                              </select>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                      <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                  </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                          <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="" cols="" rows="5"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10 col-sm-offset-2">
                            <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add new Service">
                            <input type="reset" name="reset" class="btn btn-danger btn-sm" value="cancel">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="pic" style="border: 1px solid #dddddd; height: 200px; width: 100%">
                          <p style="font-family: Consolas, Monaco, Courier New, Courier,
                          monospace; line-height: 200px;margin-left: 5%">
                            Drop product image here..
                          </p>
                        </div>
                      </div>
                    </section>

                  </div>
                </section>
              </div>

            </form>

        </div>
      </div>
    </div>
  </section>
</div>
<script>

  $(document).ready(function () {
    var source = '<?php echo base_url("product/get_product_package"); ?>';


    /*#################################
     ##  display the product type   ##
     ################################
     */

    $.ajax({
      url: '<?php echo base_url("product/get_product_type");?>',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        for (var i = 0; i < data.length; i++) {
          $('#type').append('<option value="' + data[i].id + '">' + data[i].type + '</option>');
        }
      }
    });

    /*#################################
     ##  display the product class   ##
     ################################
     */
    $('#type').change(function () {

      $('#class').html('');
      $('#class').append(' <option value="" selected disabled >-- Choose Class --</option>');
      $.ajax({
        url: '<?php echo base_url("product/get_product_class");?>',
        type: 'GET',
        data: {type_id: $(this).val()},
        dataType: 'json',
        success: function (data) {
          for (var i = 0; i < data.length; i++) {
            $('#class').append('<option value="' + data[i].id + '">' + data[i].class + '</option>');
          }
        }
      });
    });


    /*#################################
     ##  display the product size   ##
     ################################
     */

    $.ajax({
      url: '<?php echo base_url("product/get_product_size");?>',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        for (var i = 0; i < data.length; i++) {
          $('#size').append('<option value="' + data[i].id + '">' + data[i].size + '</option>');
        }
      }
    });

    /*#################################
     ##  display the product weight  ##
     #################################
     */

    $.ajax({
      url: '<?php echo base_url("product/get_product_weight");?>',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        for (var i = 0; i < data.length; i++) {
          $('#weight_type').append('<option value="' + data[i].id + '">' + data[i].weight + '</option>');
        }
      }
    });

    $('#single_cal1').daterangepicker({
      singleDatePicker: true,
      calender_style: "picker_1"
    }, function (start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });

    $('#add-product').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        product_name: {
          err: '#product_name_message',
          validators: {
            notEmpty: {
              message: 'The product name is required and cannot be empty'
            },
            stringLength: {
              min: 3,
              max: 30,
              message: 'The product name must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z]+$/,
              message: 'The product name can only consist of alphabetical'
            }
          }
        },
        subname: {
          err: '#product_subname_message',
          validators: {
            stringLength: {
              min: 3,
              max: 30,
              message: 'The product subname must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z]+$/,
              message: 'The product subname can only consist of alphabetical, number, dot and underscore'
            }
          }
        },
        packaging: {
          validators: {
            notEmpty: {
              message: 'The packaging type is required and cannot be empty'
            },
            stringLength: {
              min: 3,
              max: 30,
              message: 'The packaging type must be more than 3   characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z ]+$/,
              message: 'The packaging type can only consist of alphabetical and space '
            }
          }
        },
        type: {
          message: 'The product type is not valid',
          validators: {
            notEmpty: {
              message: 'The product type is required and cannot be empty'
            },
//          remote: {
//            url: '<?php //echo base_url("user_account/is_username_exist"); ?>//',
//            type: 'post',
//            data: {username: $(this).val()},
//            message: 'The username is not available',
//            delay: 1000
//          }
          }
        },
        class: {
          validators: {
            notEmpty: {
              message: 'The product class is required and can\'t be empty'
            }
          }
        },
        weight: {
          validators: {
            notEmpty: {
              message: 'The product weight is required and cannot be empty'
            },
            stringLength: {
              min: 1,
              max: 30,
              message: 'The product weight must be more than 3 characters long'
            },
            regexp: {
              regexp: /^\d+(\.\d{1,3})?$/,
              message: 'The product weight can only consist of number and 3 decimal places'
            }
          }
        },
        weight_type: {
          validators: {
            notEmpty: {
              message: 'The weight type  is required and can\'t be empty'
            }
          }
        },
        description: {
          validators: {
            notEmpty: {
              message: 'The description is required and cannot be empty'
            },
            stringLength: {
              min: 1,
              max: 100,
              message: 'The description  must be more than 1 character long and 100 max'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9 .!?]+$/,
              message: 'The description can only consist of alphabetical,dot ad question mark'
            }
          }
        },
        manufactured: {
          validators: {
            stringLength: {
              min: 1,
              max: 30,
              message: 'The manufactured date must be more than 1 characters long'
            }
          }
        },
        expire_date: {
          validators: {
            stringLength: {
              min: 1,
              max: 30,
              message: 'The expire date must be more than 1 characters long'
            }
          }
        },
        supplier: {
          validators: {
            stringLength: {
              min: 3,
              max: 30,
              message: 'The supplier must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z ]+$/,
              message: 'The supplier can only consist of alphabetical'
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
              title: "Account",
              type: "success",
              text: $('#fname').val() + ' ' + $('#lastname').val() + " Successfully Created",
              nonblock: {
                nonblock: true
              },
              animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
              }
            });
          }
          else {
            new PNotify({
              title: "Account",
              type: "error",
              text: $('#fname').val() + ' ' + $('#lastname').val() + " Failed to create",
              nonblock: {
                nonblock: true
              },
              animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
              }
            });
          }

          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form
        }

      });
    });
  });
</script>