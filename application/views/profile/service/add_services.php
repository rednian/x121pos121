<section id="content" class="content">
  <div class="pull-right">
    <a href="<?php echo base_url('services'); ?>" class="btn btn-sm btn-success">
      <span class="fa fa-arrow-circle-left"></span> back to service list
    </a>
  </div>
  <h1 class="page-header"> <?php echo $heading; ?></h1>
  <!-- end page-header -->
  
  <div class="row">
  <div class="col-md-6 col-xs-12 col-sm-6" id="create">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
            <h4 class="panel-title"><strong>Service Information</strong></h4>
        </div>
        <div class="panel-body">
         <form id="add-service" enctype="multipart/form-data" class="form-horizontal"
           action="<?php echo base_url('services/add'); ?>"
           role="form"
           method="post">
           <section class="panel">
             <div class="panel-body">
               <div class="div-header">
                 <h5></h5>
               </div>
               <div class="form-group">
                 <label for="" class="col-sm-2 control-label">Name</label>

                 <div class="col-sm-10 col-md-10 col-xs-12 ">
                   <input type="text" class="form-control input-sm" name="service_name" autofocus=""
                     autocomplete="off">
                 </div>
               </div>
               <div class="form-group">
                 <label for="" class="col-sm-2 control-label">Price</label>

                 <div class="col-sm-10 col-md-10 col-xs-12 ">
                   <input type="text" id="price" class="form-control input-sm" name="price" autocomplete="off">
                 </div>
               </div>
               <!--                <div class="form-group">-->
               <!--                  <label for="" class="col-sm-3"></label>-->
               <!--                  <p><strong id="price_result">0.00 </strong> <strong class="text-danger">x</strong> <strong> 12%-->
               <!--                    </strong> <strong> = </strong> <strong id="result"></strong></p>-->
               <!--                </div>-->
               <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">Type</label>

                 <div class="col-sm-10 col-sm-10 col-xs-12">
                   <div class="input-group">
                     <select class="form-control input-sm type" name="type" id="type">
                       <option value="" selected disabled>-- Choose Type --</option>
                     </select>
                             <span class="input-group-btn">
                               <button class="btn btn-danger btn-sm" type="button" id="btn-add-type">
                                 <span class="glyphicon glyphicon-plus"></span>
                               </button>
                             </span>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">Class</label>

                 <div class="col-sm-10 col-sm-10 col-xs-12">
                   <div class="input-group">
                     <select class="form-control input-sm" name="class" id="class">
                       <option value="" selected disabled>-- Choose Class --</option>
                     </select>
                             <span class="input-group-btn">
                               <button class="btn btn-danger btn-sm" type="button" id="btn-add-class">
                                 <span class="glyphicon glyphicon-plus"></span>
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
               <div class="form-group">
                 <div class="col-sm-10 col-sm-offset-2 col-sm-10 col-xs-12">
                   <input type="submit" name="submit" class="btn btn-success btn-sm" value="Add new Service">
                   <input type="reset" name="reset" class="btn btn-danger btn-sm" value="cancel">
                 </div>
               </div>
             </div>
           </section>
         </form>
        </div>
      </div>

  <div class="col-md-6 col-xs-12 col-sm-6 hide" id="add-type">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
            <h4 class="panel-title"><strong>Create Service Type</strong></h4>
        </div>
        <div class="panel-body">
         <form action="<?php echo base_url('services/create_type'); ?>" method="post" id="frm-add-service-type"
           class="form-horizontal" enctype="multipart/form-data">
           <div class="form-group">
             <label for="" class="col-sm-2 control-label">Type</label>

             <div class="col-sm-10 col-md-10 col-xs-12 ">
               <input type="text" class="form-control input-sm" name="type" autofocus=""
                 autocomplete="off">
             </div>
           </div>
           <div class="form-group">
             <label for="" class="col-sm-2 control-label">Image</label>

             <div class="col-sm-10 col-md-10 col-xs-12 ">
               <input type="file" class="form-control input-sm" name="image"
                 autocomplete="off">
             </div>
           </div>
           <div class="form-group">
             <label for="" class="col-sm-2 control-label">Description</label>

             <div class="col-sm-10 col-md-10 col-xs-12 ">
               <textarea name="description" class="form-control" rows="5" style="min-height: 180px"></textarea>
             </div>
           </div>
           <div class="form-group">
             <label for="" class="col-sm-2 control-label"></label>
             <input type="submit" value="Save Service Type" class="btn btn-success btn-sm"/>
             <input id="" type="reset" value="Clear" class="btn btn-default btn-sm"/>
             <input id="btn-type-close" type="button" value="Close" class="btn btn-default btn-sm"/>
           </div>
         </form>
        </div>
      </div>
  </div>

  </div>
    <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
              <h4 class="panel-title"><strong>Recently Added Services</strong></h4>
          </div>
          <div class="panel-body">
           <table id="service-recently-added" class="table  responsive-utilities jambo_table">
             <thead>
             <tr class="headings">
               <th class="col-sm-5">Service</th>
               <th>Price</th>
               <th>Status</th>
               <th class="col-sm-2">Action</th>
             </tr>
             </thead>

           </table>
          </div>
        </div>
    </div>
  </div>
</section>


<div class="right_col" role="main">
<section class="row">
<div class="col-md-12">
<h2><span class="fa fa-user-plus"></span></h2>
<section class="row">
  <div class="col-xs-3">
    
  </div>
</section>
<section class="row">
  <div class="col-md-5 col-sm-5 col-xs-12">
    <!--create type-->

    <section id="add-type" class="hide">
      <div class="panel">
        <div class="panel-body">
          <div class="div-header">
            <h5></h5>
          </div>
          
        </div>
      </div>
    </section>

    <!--create class-->
    <section id="add-class" class="hide">
      <div class="panel">
        <div class="panel-body">
          <div class="div-header">
            <h5>Create Service Class</h5>
          </div>
          <form action="<?php echo base_url('services/create_class'); ?>" method="post" id="frm-add-service-class"
            class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Type</label>

              <div class="col-sm-10 col-md-10 col-xs-12 ">
                <select name="service_type" id="service-type" class="form-control input-sm type"></select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Class</label>

              <div class="col-sm-10 col-md-10 col-xs-12 ">
                <input type="text" class="form-control input-sm" name="service_class"
                  autocomplete="off">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-2 control-label"></label>
              <input type="submit" value="Save Service Type" class="btn btn-success btn-sm"/>
              <input type="reset" value="Clear" class="btn btn-default btn-sm"/>
              <input id="btn-class-close" type="button" value="Close" class="btn btn-default btn-sm"/>
            </div>
          </form>
        </div>
      </div>

    </section>

  </div>
  <!-- <div class="col-md-7 col-sm-7 col-xs-12">
    <section class="panel">
      <div class="panel-body">
        <div class="div-header">
          <h5></h5>
        </div>

        
      </div>
    </section>
  </div> -->

</div>
</section>
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
          $('#create').removeClass('hide');
          $('#add-class').addClass('hide');
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
function add_type() {
  $('#frm-add-service-type').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      type: {
        validators: {
          notEmpty: {
            message: 'The service type is required and cannot be empty'
          }
        }
      },
      description: {
        validators: {
          notEmpty: {
            message: 'The service type description  is required and cannot be empty'
          },
          stringLength: {
            min: 1,
            message: 'The service type description   must be more than 1 character long and 1000 max'
          }
        }
      },
      image: {
        validators: {
          notEmpty: {
            message: 'The service type image is required and can\'t be empty'
          },
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
          new PNotify({
            type: "success",
            text: "Service type Successfully Created"
          });
          get_service_type();
          $('#add-type').addClass('hide');
          $('#create').removeClass('hide');
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


  /*show the type form*/
  $('#btn-add-type').click(function () {
    $('#add-type').removeClass('hide');
    $('#create').addClass('hide');
  });
  /*show the create services form and hide type form*/
  $('#btn-type-close').click(function () {
    $('#add-type').addClass('hide');
    $('#create').removeClass('hide');
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
          list();
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
function list() {
  var oTable = $('#service-recently-added').dataTable({
    destroy: true,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
    "bSort": false,
    "oLanguage": {
      "sSearch": "Search:"
    },

    'iDisplayLength': 12,
    "sPaginationType": "full_numbers"
  });

  $.ajax({
    url: '<?php echo base_url('services/recently_added');?>',
    dataType: 'JSON',
    success: function (data) {
      oTable.fnClearTable();
      $.each(data, function (index, data) {
        oTable.fnAddData([data.service, data.price, data.status, data.action]);
      });
      $("#service-recently-added").LoadingOverlay("hide", true);
    },
    beforeSend: function () {
      $("#service-recently-added").LoadingOverlay("show", {
        image: "",
        fontawesome: "fa fa-circle-o-notch fa-spin fa-2x spin"
//          fontawesome : "fa fa-spinner fa-pulse fa-spin fa-1x default"
      });
    }
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
  add_class();
  add_type();
  calculate_sale_price();
  list();
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
          new PNotify({
            type: "success",
            text: "New Service Successfully Created"
          });
          list();
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
        $('.type').append('<option value="' + data[i].id + '">' + data[i].type + '</option>');
      }
    }
  });
}

/*display the service class*/
function get_service_class() {
  $('#type').change(function () {

    $('#class').html('');
    $('#class').append(' <option value="" selected disabled >-- Choose Class --</option>');
    $.ajax({
      url: '<?php echo base_url("services/get_service_class");?>',
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
}
</script>