
<?php $this->load->view('/profile/product/modal/create_product_weight'); ?>
<?php $this->load->view('/profile/product/modal/create_product_size'); ?>
<?php $this->load->view('/profile/product/modal/create_product_type'); ?>
<?php $this->load->view('/profile/product/modal/create_product_class'); ?>

<div id="content" class="content">
  <div class="pull-right">
    <a href="<?php echo base_url('product'); ?>" class="btn btn-sm btn-success">
          <span class="fa fa-arrow-circle-left"></span> back to product list
        </a>
  </div> 
  <h1 class="page-header">Create New Product </h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title"><strong>Product Details</strong></h4>
                    </div>
                    <div class="panel-body">
                   
                        <form action="<?php echo base_url('product/add_products') ?>" method="post" id="add-product"
                          enctype="multipart/form-data" class="form-horizontal">
                        <div class="panel-group" id="steps">
                          <!-- Step 1 -->
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#stepOne">Details</a></h4>
                            </div>
                            <div id="stepOne" class="panel-collapse in">
                              <div class="panel-body">
                                <section class="row">
                                  <div class="col-md-7 col-sm-7 col-xs-12" style="border-right: 1px solid #eeeeee">
                                    <div class="form-group">
                                      <label class="col-sm-2 col-md-2 col-xs-12 control-label">Barcode</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <input name="barcode" id="barcode" type="text" class="form-control input-sm" autofocus="" autocomplete="off">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-md-2 col-xs-12 control-label">Name</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <section class="row">
                                          <div class="col-sm-6">
                                            <input name="name" id="name" type="text" class="form-control input-sm"
                                              placeholder="product name" autocomplete="off">
                                          </div>
                                          <div class="col-sm-6">
                                            <input name="subname" id="subname" type="text" class="form-control input-sm"
                                              placeholder="subname" autocomplete="off">
                                          </div>
                                        </section>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-md-2 col-xs-12 control-label">Image</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <input name="price" id="image" type="hidden" value="0">
                                        <input name="bc_id" id="bc_id" type="hidden">
                                        <input name="image" id="image" type="file" class="form-control input-sm">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Packaging</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <input name="packaging" id="packaging" type="text" class="form-control input-sm" autocomplete="off">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Type</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <div class="input-group">
                                          <select class="form-control input-sm" name="type" id="type">
                                            <option value="" selected disabled>-- Choose Type --</option>
                                          </select>
                                            <span class="input-group-btn">
                                              <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-product-type">
                                                <span class="glyphicon glyphicon-plus"></span>
                                              </button>
                                            </span>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Class</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <div class="input-group">
                                          <select class="form-control input-sm" name="prod_class" id="xclass">
                                            <option value="" selected disabled>-- Choose Class --</option>  
                                          </select>
                                                  <span class="input-group-btn">
                                                    <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-product-class">
                                                      <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                  </span>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Weight</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <section class="row">
                                          <div class="col-sm-4 col-xs-12">
                                            <input name="weight" id="weight" type="text" class="form-control input-sm" autocomplete="off">
                                          </div>
                                          <div class="col-sm-8 col-xs-12">
                                            <div class="input-group">
                                              <select class="form-control input-sm" name="weight_type" id="weight_type">
                                                <option value="" selected disabled>-- Choose Weight --</option>
                                              </select>
                                                      <span class="input-group-btn">
                                                        <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-product-weight">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                      </span>
                                            </div>
                                          </div>
                                        </section>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Size</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <section class="row">
                                          <div class="col-sm-4 col-xs-12">
                                            <input name="size" id="size" type="text" class="form-control input-sm" autocomplete="off">
                                          </div>
                                          <div class="col-sm-8 col-xs-12">
                                            <div class="input-group">
                                              <select class="form-control input-sm" name="size_type" id="size-type">
                                                <option value="" selected disabled>-- Choose Size --</option>
                                              </select>
                                                      <span class="input-group-btn">
                                                        <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modal-product-size">
                                                          <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                      </span>
                                            </div>
                                          </div>
                                        </section>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Manufactured</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <input name="manufactured" id="manufactured" type="date"
                                          class="form-control input-sm date" autocomplete="off" value="<?php echo date('Y-m-d'); ?>">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Expire</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <input name="expire" id="expire" type="date"
                                          class="form-control input-sm date" autocomplete="off" value="<?php echo date('Y-m-d'); ?>">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-2 col-xs-12 control-label">Description</label>

                                      <div class="col-sm-10 col-xs-12">
                                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
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
                                    <label class="col-sm-2 col-xs-12 control-label">Quantity</label>

                                    <div class="col-sm-10 col-xs-12">
                                      <input name="quantity" id="quantity" type="text" class="form-control input-sm" autocomplete="off">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label"></label>

                                    <div class="col-sm-10 col-xs-12">
                                    <label>Is the product for selling?</label>
                                     <div class="col-sm-12 col-xs-12">
                                      <select class="form-control input-sm" name="option" id="option">
                                        <option selected="" disabled="">-- Select Option --</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                      </select>
                                     </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                 

                                    <section id="price-option" class="hide">
                                    <label class="col-sm-2 col-xs-12 control-label">Price</label>
                                      <div class="col-sm-10 col-xs-12">
                                        <section class="row">
                                          <div class="col-sm-4 col-xs-12">
                                            <label for="">Supply Price</label>
                                            <input name="price" id="price" type="text" class="form-control input-sm" autocomplete="off"
                                              placeholder="0.00">
                                            <label for=""><small>Excluding VAT</small></label>
                                          </div>

                                          <section id="add-mark-up" class="hide">

                                            <div class="col-sm-4 col-xs-12">
                                              <label for=""><strong class="text-black"><code>+</code></strong> Markup</label>
                                              <input name="mark_up" id="mark-up" type="text" class="form-control input-sm" autocomplete="off" placeholder="0.00">
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                              <label for=""><strong><code>=</code></strong> Retail Price </label>
                                              <input name="retail" id="retail" type="text" class="form-control input-sm" autocomplete="off"
                                                readonly placeholder="0.00">
                                              <label for=""><small>Excluding VAT</small></label>
                                            </div>

                                          </section>
                                          
                                          
                                        </section>

                                      </div>

                                    </section>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label"></label>

                                    <div class="col-sm-10 col-xs-12">
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
                                    <label class="col-sm-2 col-xs-12 control-label">Name</label>

                                    <div class="col-sm-10 col-xs-12">
                                      <input name="manufacturer" id="manufacturer" type="text"
                                        class="form-control input-sm" autocomplete="off">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-sm-offset-2">
                                      <input name="submit" id="submit" value="Add New Product" type="submit"
                                        class="btn btn-success btn-sm">
                                      <input name="button" id="cancel" value="Cancel" type="reset"
                                        class="btn btn-danger btn-sm">
                                    </div>
                                  </div>

                                </div>
                              </section>
                            </div>
                          </div>
                        </div>
                        </form>
                        </div>
                      
                    </div>
                </div>
      </div>
  </div>
</div>


<script>
$(document).ready(function () {
  is_barcode_exist();
  add();
  fetch_class();
  fetch_size();
  fetch_type();
  fetch_weight();
  get_price();

  $('#option').change(function(){
    var value = $(this).val();
      if(value == 'yes'){
          $('#price-option').removeClass('hide');
          $('#add-mark-up').removeClass('hide');
      }
      else{
         $('#price-option').removeClass('hide');
          $('#add-mark-up').addClass('hide');
      }
  });

  $('#cancel').click(function(){
   $('#price-option').addClass('hide');
    $('#add-mark-up').addClass('hide');
  });


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
    mark_up = parseFloat(mark_up);
    // var new_price = parseFloat(price) * parseFloat(mark_up);
    price = parseFloat(mark_up) + parseFloat(price);


    if (isNaN(mark_up)) {
      $('#retail').val('');
    }
    else {
      $('#retail').val(parseFloat(price));
    }


  });
}


function fetch_type() {
   $('#type').html('');
     $('#type').append(' <option value="" selected disabled >-- Choose Type --</option>');
  $.ajax({
    url: '<?php echo base_url("product/get_product_type");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
       $.each(data, function(index, data){
         $('#type').append('<option value="' + data.id + '">' + data.type + '</option>');
       });
     
    }
  });
}

function fetch_size() {
  $.ajax({
    url: '<?php echo base_url("product/get_product_size");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      $.each(data, function(index, data){
         $('#size-type').append('<option value="' + data.id + '">' + data.size + '</option>');
      });

    }
  });

}
function fetch_weight() {
  
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
}

function fetch_class() {

  $('#type').change(function () {

    $('#xclass').html('');
    $('#xclass').append(' <option value="" selected disabled >-- Choose Class --</option>');
    $.ajax({
      url: '<?php echo base_url("product/get_product_class");?>',
      type: 'GET',
      data: {type_id: $(this).val()},
      dataType: 'json',
      success: function (data) {
      
          $.each(data, function(index, data){
          $('#xclass').append('<option value="' + data.id + '">' + data.class + '</option>');
          });
        
      }
    });
  });

}

function add() {
  $('#add-product').formValidation({
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
      barcode: {
        validators: {
          // remote: {
          //   url: '<?php echo base_url("user_account/is_username_exist"); ?>',
          //   type: 'post',
          //   data: {barcode: $(this).val()},
          //   message: 'The username is not available',
          //   delay: 1000
          // }
        }
      },
      subname: {
        err: '#product_subname_message',
        validators: {
          //  notEmpty: {
          //   message: 'The success is required and cannot be empty'
          // },
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
          // notEmpty: {
          //   message: 'The mark up is required and cannot be empty'
          // },
          regexp: {
            regexp: /^\d+(\.\d{1,3})?$/,
            message: 'The mark up can only consist of number and 3 decimal places'
          }
        }
      },
      packaging: {
        validators: {
          // notEmpty: {
          //   message: 'The packaging type is required and cannot be empty'
          // }
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
          // notEmpty: {
          //   message: 'The weight type  is required and can\'t be empty'
          // }
        }
      },
      description: {
        validators: {
          // notEmpty: {
          //   message: 'The description is required and cannot be empty'
          // }
        }
      },
      manufactured: {
        validators: {
          // stringLength: {
          //   max: 255,
          //   message: 'The manufactured date must be less than 255 characters long'
          // }
        }
      },
      expire_date: {
        validators: {
          // stringLength: {
          //   max: 30,
          //   message: 'The expire date must be less than 30 characters long'
          // }
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

          new PNotify({
            type: "success",
            text: "Product Successfully Created."
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

function is_barcode_exist() {

  $('#barcode').on('keyup change', function () {
    $.ajax({
      url: '<?php echo base_url('product_monitoring/is_barcode_exist');?>',
      data: {barcode: $(this).val()},
      dataType: 'JSON',
      type: 'POST',
      success: function (data) {
        if (data != 0) {
          $.each(data, function (index, data) {

            $('#name').val(data.name).attr('readonly', true);
            $('#size').val(data.size).attr('readonly', true);
            $('#size_type').val(data.size_type).attr('readonly', true);
            $('#weight').val(data.weight).attr('readonly', true);
            $('#weight_type').val(data.weight_type).attr('readonly', true);
            $('#packaging').val(data.Packaging_type).attr('readonly', true);
            $('#type').val(data.type).attr('readonly', true);
            $('#class').val(data.class).attr('readonly', true);
            $('#subname').val(data.subname).attr('readonly', true);
            $('#expire').val(data.expire).attr('readonly', true);
            $('#manufacturer').val(data.manufacturer).attr('readonly', true);
            $('#manufactured').val(data.input).attr('readonly', true);
            $('#bc_id').val(data.bc_id);

            $('#description').html(data.description).attr('readonly', true);

          });
        }
        else {
          $('#bc_id').val('');
          $('#name').val('').removeAttr('readonly');
          $('#size').val('').removeAttr('readonly');
          $('#size_type').val('').removeAttr('readonly');
          $('#weight').val('').removeAttr('readonly');
          $('#weight_type').val('').removeAttr('readonly');
          $('#packaging').val('').removeAttr('readonly');
          $('#type').val('').removeAttr('readonly');
          $('#class').val('').removeAttr('readonly');
          $('#subname').val('').removeAttr('readonly');
          $('#expire').val('').removeAttr('readonly');
          $('#manufacturer').val('').removeAttr('readonly');
          $('#manufactured').val('').removeAttr('readonly');

          $('#description').html('').removeAttr('readonly');

        }


      }
    });
  });
}

</script>
