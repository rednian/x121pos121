

<div class="modal fade" id="add-product-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register Product</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('product/add_products') ?>" method="post" id="frm-add-products" enctype="multipart/form-data" class="form-horizontal">
          <div class="panel-group" id="steps">
            <section class="row">
              <div class="col-sm-6">

                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#stepOne">Product Details</a></h4>
                  </div>
                  <div id="stepOne" class="panel-collapse in">
                    <div class="panel-body">
                      <section class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="border-right: 1px solid #eeeeee">
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
                                <select class="form-control input-sm" name="type" id="product-type">
                                  <option value="" selected disabled>-- Choose Type --</option>
                                </select>
                                  <span class="input-group-btn">
                                    <button class="btn btn-success btn-sm" id="btn-type" type="button" data-toggle="modal" data-target="#modal-product-type">
                                      <span class="fa fa-plus"></span>
                                    </button>
                                  </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-2 col-xs-12 control-label">Class</label>

                            <div class="col-sm-10 col-xs-12">
                              <div>
                                <select class="form-control input-sm flat" name="prod_class">
                                  <option value="" selected disabled>-- Choose Class --</option>  
                                  <option value="Gold">Gold</option>  
                                  <option value="Silver">Silver</option>  
                                  <option value="Special">Special</option>  
                                </select>
                                  <!-- <span class="input-group-btn">
                                    <button id="btn-class" class="btn btn-success btn-sm" type="button" 
                                    data-toggle="modal" data-target="#modal-product-class">
                                      <span class="fa fa-plus"></span>
                                    </button>
                                  </span> -->
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
                                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#modal-product-weight">
                                          <span class="fa fa-plus"></span>
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
                                    <select class="form-control input-sm" name="size_type" id="size-type1">
                                      <option value="" selected disabled>-- Choose Size --</option>
                                    </select>
                                      <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#modal-product-size">
                                          <span class="fa fa-plus"></span>
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
                      </section>
                    </div>
                  </div>
                </div>
              </div>



              <div class="col-sm-6">
                
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#stepTwo">Pricing &amp; Stock
                      </a></h4>
                  </div>
                  <div id="stepTwo" class="panel-collapse">
                    <div class="panel-body">
                      <sectrion class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

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
                                    <input type="hidden" name="price_id" id="update-price-id"/>
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
                        
                        </div>
                      </sectrion>
                    </div>
                  </div>
                </div>

                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#stepThree">Supplier
                        Information</a></h4>
                  </div>
                  <div id="stepThree" class="panel-collapse">
                    <div class="panel-body">
                      <section class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                          <div class="form-group">
                            <label class="col-sm-2 col-xs-12 control-label">Name</label>

                            <div class="col-sm-10 col-xs-12">
                              <input name="manufacturer" id="manufacturer" type="text"
                                class="form-control input-sm" autocomplete="off">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-2 col-xs-12 control-label">Email</label>

                            <div class="col-sm-10 col-xs-12">
                              <input name="email" id="email" type="email"
                                class="form-control input-sm" autocomplete="off">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-2 col-xs-12 control-label">Contact Number</label>

                            <div class="col-sm-10 col-xs-12">
                              <input name="contact_number" id="contact-number" type="text"
                                class="form-control input-sm" autocomplete="off">
                            </div>
                          </div>


                        </div>
                      </section>
                    </div>
                  </div>
                </div>

              </div>
            </section>
           </div>
       
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
        <input name="submit" id="submit" value="Add Product" type="submit"
          class="btn btn-success btn-sm">
        <input name="button" id="cancel" value="Cancel" type="reset"
          class="btn btn-danger btn-sm">
          </form>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {

    



  // fetch_new_class();
  fetch_new_size();
  fetch_new_type();
  fetch_new_weight();
  get_new_price();
  add();

    $('#frm-add-products').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
  //      valid: 'glyphicon glyphicon-ok',
  //      invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        barcode:{
            validators:{
             remote: {
               url: '<?php echo base_url("product/is_barcode_exist"); ?>',
               type: 'post',
               data: {barcode: $(this).val()},
               message: 'The barcode is not available',
               delay: 500
             },
             regexp: {
            regexp: /^[a-zA-Z0-9\s]+$/,
            message: 'The barcode can only consist of alphanumeric'
            }
          }
        },
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
           notEmpty: {
             message: 'The product weight is required and can\'t be empty' 
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
        size: {
          validators: {
           notEmpty: {
             message: 'The product size is required and can\'t be empty' 
           }
          }
        },
        size_type: {
          validators: {
            notEmpty: {
              message: 'The size type  is required and can\'t be empty'
            }
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
        },
        contact_number:{
          validators:{
            regexp:{
              regexp: /^[0-9\s]+$/,
              message: 'The contact number can only consist of number'
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

             $('#product-list').DataTable().ajax.reload();
             $('#add-product-dialog').modal('hide');

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

function get_new_price() {

  $('#price').on('change keyup', function () {
    var price = $(this).val();
    var mark_up = $('#mark-up').val();
    mark_up = parseFloat(mark_up);
    // var new_price = parseFloat(price) * parseFloat(mark_up);
    price = parseFloat(mark_up) + parseFloat(price);


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


function fetch_new_weight() {
   $('#weight_type').html('');
   $('#weight_type').append('<option selected disabled>Select Weight Type</option>');
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

function fetch_new_type() {
   $('#product-type').html('');
     $('#product-type').append(' <option value="" selected disabled >-- Choose Type --</option>');
  $.ajax({
    url: '<?php echo base_url("product/get_product_type");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
       $.each(data, function(index, data){
         $('#product-type').append('<option value="' + data.id + '">' + data.type + '</option>');
       });
     
    }
  });
}

function fetch_new_size() {
  $('#size-type1').html('');
  $('#size-type1').append('<option selected disabled>Select Size Type</option>');
  $.ajax({
    url: '<?php echo base_url("product/get_product_size");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      $.each(data, function(index, data){
         $('#size-type1').append('<option value="' + data.id + '">' + data.size + '</option>');
      });

    }
  });

}

function add(){

}








// function fetch_new_class() {

//   $('#product-type').change(function () {

//     $('#xclass').html('');
//     $('#xclass').append(' <option value="" selected disabled >-- Choose Class --</option>');
//     $.ajax({
//       url: '<?php echo base_url("product/get_product_class");?>',
//       type: 'GET',
//       data: {type_id: $(this).val()},
//       dataType: 'json',
//       success: function (data) {
      
//           $.each(data, function(index, data){
//           $('#xclass').append('<option value="' + data.id + '">' + data.class + '</option>');
//           });
        
//       }
//     });
//   });

// }




</script>