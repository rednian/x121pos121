<section id="content" class="content">
  <div class="pull-right">
  <a href="<?php echo base_url('product'); ?>" class="btn btn-sm btn-success">
    <span class="fa fa-arrow-circle-left"></span> back to product list
  </a>
  </div>
  <h1 class="page-header">Update Product Details
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
          <section class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
         
          <form action="<?php echo base_url('product/update') ?>" method="post" id="update-product"
            enctype="multipart/form-data" class="form-horizontal">
          <div class="panel-group" id="steps">
            <!-- Step 1 -->
            <div class="panel panel-default">
              
              <div id="stepOne" class="panel-collapse in">
                <div class="panel-body">
                  <section class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12" style="border-right: 1px solid #eeeeee">
                      <div class="form-group">
                        <label class="col-sm-2 col-md-2 col-xs-12 control-label">Barcode</label>

                        <div class="col-sm-10">
                          <input name="barcode" id="barcode" value="<?php foreach ($data as $val) {
                            echo $val->barcode;
                          } ?>" type="text" class="form-control input-sm" autofocus="" autocomplete="off">
                          <input name="prod_id" id="barcode" value="<?php foreach ($data as $val) {
                            echo $val->prod_id;
                          } ?>" type="hidden" class="form-control input-sm" autofocus="" autocomplete="off">
                          <input name="price_id" id="barcode" value="<?php foreach ($data as $val) {
                            echo $val->pricing_id;
                          } ?>" type="hidden" class="form-control input-sm" autofocus="" autocomplete="off">
                          <input name="bc_id" id="barcode" value="<?php foreach ($data as $val) {
                            echo $val->bc_id;
                          } ?>" type="hidden" class="form-control input-sm" autofocus="" autocomplete="off">
                          <input name="qty_id" id="barcode" value="<?php foreach ($data as $val) {
                            echo $val->stock_in_id;
                          } ?>" type="hidden" class="form-control input-sm" autofocus="" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-md-2 col-xs-12 control-label">Name</label>

                        <div class="col-sm-10">
                          <section class="row">
                            <div class="col-sm-6">
                              <input name="name" id="name" type="text" class="form-control input-sm"
                                placeholder="product name" autocomplete="off" value="<?php foreach ($data as $val) {
                            echo $val->prod_name;
                          } ?>" >
                            </div>
                            <div class="col-sm-6">
                              <input name="subname" id="subname" type="text" class="form-control input-sm"
                                placeholder="subname" autocomplete="off" value="<?php foreach ($data as $val) {
                            echo $val->prod_subname;
                          } ?>">
                            </div>
                          </section>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 col-md-2 col-xs-12 control-label">Image</label>

                        <div class="col-sm-10">
                          <input name="price_id" id="image" type="hidden" value="0" value="<?php foreach ($data as $val) {
                            echo $val->pricing_id;
                          } ?>" >
                          <input name="bc_id" id="bc_id" type="hidden" value="<?php foreach ($data as $val) {
                            echo $val->bc_id;
                          } ?>">
                           <input name="prod_id" id="bc_id" type="hidden" value="<?php foreach ($data as $val) {
                            echo $val->prod_id;
                          } ?>">
                          <input name="image" id="image" type="file" class="form-control input-sm">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Packaging</label>

                        <div class="col-sm-10">
                          <input name="packaging" id="packaging" type="text" class="form-control input-sm" autocomplete="off" value="<?php foreach ($data as $val) {
                            echo $val->prod_packaging_type;
                          } ?>" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-10">
                          <div class="form-group">
                            <select class="form-control input-sm" name="type" id="type">
                              <?php foreach ($type as $type) { ?>
                                <option value="<?php echo $type->prod_type_id; ?>"><?php echo ucwords($type->prod_type);?></option>
                              <?php } ?>
                              <?php foreach ($data as $type) { ?>
                                <option selected disabled value="<?php echo $type->prod_type_id; ?>"> <?php echo ucwords($type->prod_type);?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Class</label>

                        <div class="col-sm-10">
                          <div class="form-group">
                            <select class="form-control input-sm" name="prod_class" id="xclass">
                              <?php foreach ($class as $type) { ?>
                                <option value="<?php echo $type->prod_class_id; ?>"><?php echo ucwords($type->prod_class);?></option>
                              <?php } ?>
                              <?php foreach ($data as $type) { ?>
                                <option selected disabled value="<?php echo $type->prod_class_id; ?>"> <?php echo ucwords($type->prod_class);?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>



                      <div class="form-group">
                        <label class="col-sm-2 control-label">Manufactured</label>

                        <div class="col-sm-10">
                          <input name="manufactured" id="manufactured" type="date"
                            class="form-control input-sm date" autocomplete="off"  value="<?php foreach ($data as $val) {
                            echo $val->prod_made_date;
                          } ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" >Expire</label>

                        <div class="col-sm-10">
                          <input name="expire" id="expire" type="date"
                            class="form-control input-sm date" autocomplete="off" value="<?php foreach ($data as $val) {
                            echo $val->prod_date_exp;
                          } ?>" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>

                        <div class="col-sm-10">
                          <textarea name="description" id="description" class="form-control" rows="5" ><?php foreach ($data as $val) {
                            echo $val->prod_desc;
                          } ?></textarea>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">

                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#stepTwo">Pricing &amp; Stock
                </a></h4>
            </div>
            <div id="stepTwo" class="panel-collapse">
              <div class="panel-body">
                <sectrion class="row">
                  <div class="col-md-7 col-sm-7 col-xs-12">

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Quantity</label>

                      <div class="col-sm-10">
                        <input name="quantity" id="quantity" type="text" class="form-control input-sm" autocomplete="off" value="<?php foreach ($data as $val) {
                            echo $val->quantity;
                          } ?>" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Price</label>

                      <div class="col-sm-10">
                        <section class="row">
                          <div class="col-sm-4">
                            <label for="">Supply Price</label>
                            <input name="price" id="price" type="text" class="form-control input-sm" autocomplete="off"
                              placeholder="0.00" value="<?php foreach ($data as $val) {
                            echo $val->price;
                          } ?>"  >
                            <label for=""><small>Excluding VAT</small></label>
                          </div>
                          <div class="col-sm-4">
                            <label for=""><strong class="text-black">x</strong> Markup (%)</label>
                            <input name="mark_up" id="mark-up" type="text" class="form-control input-sm" autocomplete="off" placeholder="0.00" value="<?php foreach ($data as $val) {
                            echo $val->mark_up;
                          } ?>" >
                          </div>
                          <div class="col-sm-4">
                            <label for=""><strong>=</strong> Retail Price </label>
                            <input name="retail" id="retail" type="text" class="form-control input-sm" autocomplete="off"
                              readonly placeholder="0.00" >
                            <label for=""><small>Excluding VAT</small></label>
                          </div>
                        </section>

                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-10">
                        <em> </em>
                      </div>
                    </div>

                  </div>
                </sectrion>
              </div>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#stepThree">Supplier
                  Information</a></h4>
            </div>
            <div id="stepThree" class="panel-collapse">
              <div class="panel-body">
                <section class="row">
                  <div class="col-md-7 col-sm-7 col-xs-12">

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>

                      <div class="col-sm-10">
                        <input name="manufacturer" id="manufacturer" type="text"
                          class="form-control input-sm" autocomplete="off" value="<?php foreach ($data as $val) {
                            echo $val->prod_manufacturer;
                          } ?>" >
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2">
                        <input name="submit" id="submit" value="Save Changes" type="submit"
                          class="btn btn-success btn-sm">
                        <input name="button" id="submit" value="Cancel" type="reset"
                          class="btn btn-danger btn-sm">
                      </div>
                    </div>

                  </div>
                </section>
              </div>
            </div>
          </div>
          </div>
          </form>

          </section>


        </div>
      </div>
    </div>
  </div>
</section>






<script>
$(document).ready(function () {
  
  add();
  get_price();
});

function get_price() {

  $('#price').on('change keyup', function () {
    var price = $(this).val();
    var mark_up = $('#mark-up').val();
    mark_up = parseFloat(mark_up) / 100;
    var new_price = parseFloat(price) * parseFloat(mark_up);
    price = parseFloat(new_price) + parseFloat(price);


    if (isNaN(price)) {
      $('#retail').val('');
    }
    else {
      $('#retail').val(price);
    }

  });

  $('#mark-up').on('change keyup', function () {
    var mark_up = $(this).val();
    var price = $('#price').val();
    mark_up = parseFloat(mark_up) / 100;
    var new_price = parseFloat(price) * parseFloat(mark_up);
    price = parseFloat(new_price) + parseFloat(price);


    if (isNaN(mark_up)) {
      $('#retail').val('');
    }
    else {
      $('#retail').val(parseFloat(price));
    }


  });
}






function add() {
  $('#update-product').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//      valid: 'glyphicon glyphicon-ok',
//      invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      quantity: {
        validators: {
          notEmpty: {
            message: 'The product quantity is required and cannot be empty'
          },
          stringLength: {
            min: 1,
            message: 'The product quantity must be more than 1 characters long'
          },
          regexp: {
            regexp: /^[0-9]+$/,
            message: 'The product quantity can only consist of number'
          }
        }
      },
      name: {
        validators: {
          notEmpty: {
            message: 'The product name is required and cannot be empty'
          },
          stringLength: {
            max: 30,
            message: 'The product name must be more than 3 characters long'
          }
        }
      },
      subname: {
        err: '#product_subname_message',
        validators: {
          stringLength: {
            max: 30,
            message: 'The product subname must be more than 30 characters long'
          }
        }
      },
      price: {
        validators: {
          notEmpty: {
            message: 'The price is required and cannot be empty'
          },
          regexp: {
            regexp: /^\d+(\.\d{1,3})?$/,
            message: 'The price can only consist of number and 3 decimal places'
          }
        }
      },
      mark_up: {
        validators: {
          notEmpty: {
            message: 'The mark up is required and cannot be empty'
          },
          regexp: {
            regexp: /^\d+(\.\d{1,3})?$/,
            message: 'The mark up can only consist of number and 3 decimal places'
          }
        }
      },
      packaging: {
        validators: {
          notEmpty: {
            message: 'The packaging type is required and cannot be empty'
          }
        }
      },
      type: {
        message: 'The product type is not valid',
        validators: {
          // notEmpty: {
          //   message: 'The product type is required and cannot be empty'
          // }
        }
      },
      prod_class: {
        validators: {
          // notEmpty: {
          //   message: 'The product class is required and can\'t be empty'
          // }
        }
      },
      weight: {
        validators: {
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
          }
        }
      },
      manufactured: {
        validators: {
          stringLength: {
            max: 255,
            message: 'The manufactured date must be less than 255 characters long'
          }
        }
      },
      expire_date: {
        validators: {
          stringLength: {
            max: 30,
            message: 'The expire date must be less than 30 characters long'
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
            regexp: /^[a-zA-Z0-9\s]+$/,
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
      data: new FormData(this),
      type: $(this).attr('method'),
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'html',
      success: function (data) {

        if (data == 1) {
            window.location.href = '<?php echo base_url('product'); ?>';
          new PNotify({
            type: "success",
            text: "Product Successfully Updated. "
          });
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);


        }
        if (data == 2) {
          new PNotify({
            type: "success",
            text: "Quantity Successfully Updated."
          });
        }
        if (data == 3) {
          new PNotify({
            type: "error",
            text: "Quantity Failed to  Update."
          });
        }
        if (data == 0) {
          new PNotify({
            type: "error",
            text: "Failed to Create new Product."
          });
        }

      }

    });
  }).on('err.form.fv', function(e) {

    // Active the panel element containing the first invalid element
    var $form         = $(e.target),
      validator     = $form.data('formValidation'),
      $invalidField = validator.getInvalidFields().eq(0),
      $collapse     = $invalidField.parents('.collapse');

    $collapse.collapse('show');
  });

}


</script>
