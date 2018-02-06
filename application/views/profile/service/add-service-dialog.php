
<div class="modal fade" id="add-service-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Services</h4>
      </div>
      <div class="modal-body">

        <?php
          $attributes = array('class'=>'form-horizontal', 'id'=>'add-service', 'enctype'=>'multipart/form-data', 'role'=>'form');
        echo form_open('services/add', $attributes);?>

    <section class="panel">
      <div class="panel-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Name</label>

          <div class="col-sm-10 col-md-10 col-xs-12 ">
            <input type="text" class="form-control input-sm" name="service_name" autofocus="" autocomplete="off">
          </div>
        </div>                              
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Price</label>

          <div class="col-sm-10 col-md-10 col-xs-12 ">
            <input type="text" id="price" class="form-control input-sm" name="price" autocomplete="off">
          </div>
        </div>       
        <div class="form-group">                                                                                              
          <label for="inputPassword3" class="col-sm-2 control-label">Type</label>

          <div class="col-sm-10 col-sm-10 col-xs-12">
            <div class="input-group">
              <select class="form-control input-sm type" name="type" id="type">
                <option value="" selected disabled>-- Choose Type --</option>
              </select>
                      <span class="input-group-btn">
                        <button class="btn btn-success btn-sm" type="button" id="btn-add-type">
                          <span class="fa fa-plus"></span>
                        </button>
                      </span>
            </div>
          </div>
        </div>
        <div class="form-group hide" id="minor-major">
            <label class="col-sm-2 control-label"></label>
             <div class="col-sm-10 col-sm-10 col-xs-12">
              <section class="row">
                <div class="col-sm-3 col-xs-12">
                  <div class="radio">
                      <label>
                          <input type="radio" name="types" value="minor" checked />
                         Minor
                      </label>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="radio">
                      <label>
                          <input type="radio" name="types" value="major" />
                          Major
                      </label>
                  </div>
                </div>
              </section>
              
               
            </div>
        </div>
        <div class="form-group" id="service-class-container">
          <label for="inputPassword3" class="col-sm-2 control-label" id="service-class-label"></label>

          <div class="col-sm-10 col-sm-10 col-xs-12">
            <div class="input-group">
              <select class="form-control input-sm" name="class" id="class">
                <option value="" selected disabled>-- Choose Class --</option>
              </select>
                      <span class="input-group-btn">
                        <button class="btn btn-danger btn-sm" type="button" id="btn-add-class">
                          <span class="fa fa-plus"></span>
                        </button>
                      </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
          
          <div class="col-sm-10 col-sm-10 col-xs-12">
            <textarea name="description" class="form-control" id="" cols="" rows="5"
              aria-autocomplete="off"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Image</label>

          <div class="col-sm-10 col-sm-10 col-xs-12">
            <input type="file" name="image" class="form-control input-sm"/>
          </div>
        </div>

      </div>
    </section>
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
         <input type="reset" name="reset" class="btn btn-danger btn-sm" value="cancel">
        <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add new Service">

      </div>
    </form>
    </div>
  </div>
</div>
<script>
function add_class() {
  $('#frm-add-service-class').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      service_type: {
        validators: {
          notEmpty: {
            message: 'The service type is required and cannot be empty'
          }
        }
      },
      service_class: {
        validators: {
          notEmpty: {
            message: 'The service class is required and cannot be empty'
          },
          stringLength: {
            min: 1,
            message: 'The service class  must be more than 1 character long and 1000 max'
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
      dataType: 'json',
      success: function (data) {
        if (data == 1) {
          new PNotify({
            type: "success",
            text: "Service type Successfully Created"
          });
         get_service_class();
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        }
        else {
          new PNotify({
            type: "error",
            text: "Service Failed to create"
          });
        }


      }

    });
  });


  $('#btn-add-class').click(function () {
    $('#add-class').removeClass('hide');
    $('#create').addClass('hide');
  });

  $('#btn-class-close').click(function () {
    $('#create').removeClass('hide');
    $('#add-class').addClass('hide');
  });
}

function delete_service(id) {
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
        url: '<?php echo base_url('services/delete') ?>',
        data: {id: id},
        type: 'POST',
        dataType: 'html',
        success: function (data) {
         
          new PNotify({
            type: "success",
            text: "Service successfully deleted."
          });
        }
      })
    }).on('pnotify.cancel', function () {
      /*close the notify*/
    });
}

function calculate_sale_price() {
  $('#price').on('change keyup', function () {
    var val = $(this).val();
    $('#price_result').html(val);
    val = parseFloat(val);
    val = (val / 1.12) * 0.12;
    $('#result').html(val);

  });


}
$(document).ready(function () {

 $('#service-class-container').hide();

    $('#type').change(function(){
     $('#minor-major').removeClass('hide');
      $('#service-class-container').fadeIn();
    });



  add_class();
  add_type();
  calculate_sale_price();

  get_service_type();
  get_service_class();


  $('#add-service').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      service_name: {
        validators: {
          notEmpty: {
            message: 'The service name is required and cannot be empty'
          }
        }
      },
      price: {
        validators: {
          notEmpty: {
            message: 'The service price is required and cannot be empty'
          },
          regexp: {
            regexp: /^\d+(\.\d{1,3})?$/,
            message: 'The price can only consist of number, dot and 3 decimal places only.'
          }
        }
      },

      type: {
        message: 'The service type is not valid',
        validators: {
          notEmpty: {
            message: 'The service type is required and cannot be empty'
          }
        }
      },
      class: {
        validators: {
          notEmpty: {
            message: 'The service class is required and can\'t be empty'
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
            message: 'The description  must be more than 1 character long and 1000 max'
          }
        }
      },
      image: {
        validators: {
//          notEmpty: {
//            message: 'The service image is required and can\'t be empty'
//          },
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
      type: $(this).attr('method'),
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'json',
      success: function (data) {
        if (data == 1) {

             $('#service-list').DataTable().ajax.reload();

          new PNotify({
            type: "success",
            text: "New Service Successfully Created"
          });
        
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);             // Reset the form

        }
        else {
          new PNotify({
            type: "error",
            text: "New Service Failed to create"
          });
        }


      }

    });
  });
});

/*display the service type*/
function get_service_type() {
  $('.type').html('');
  $('.type').append(' <option value="" selected disabled >-- Choose Type --</option>');
  $.ajax({
    url: '<?php echo base_url("services/get_service_type");?>',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      for (var i = 0; i < data.length; i++) {
        $('.type').append('<option data-value="'+data[i].type+'" value="' + data[i].id + '">' + data[i].type + '</option>');
      }
    }
  });
}

/*display the service class*/
function get_service_class() {
  $('#type').change(function () {



    $('#class').html('');
    $('#class').append(' <option value="" selected disabled >-- Choose Services Type --</option>');
    $.ajax({
      url: '<?php echo base_url("services/get_service_class");?>',
      type: 'GET',
      data: {type_id: $(this).val()},
      dataType: 'json',
      success: function (data) {
        for (var i = 0; i < data.length; i++) {
          $('#class').append('<option  value="' + data[i].id + '">' + data[i].class + '</option>');
        }
      }
    });
  });
}
</script>