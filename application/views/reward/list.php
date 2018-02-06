
<?php $this->load->view('reward/update-reward-dialog'); ?>
<?php $this->load->view('reward/detail-reward-dialog'); ?>
<?php $this->load->view('reward/add-card-holder-dialog'); ?>

<section id="content" class="content">
  <div class="pull-right">
      <a href="#add-card-holder-dialog" data-toggle="modal" class="btn btn-sm btn-success"><span class="fa fa-user-plus"> </span> Add Card Holder</a>
  </div>
  <h1 class="page-header">Card Holder List</h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"></h4>
            </div>
            <div class="panel-body">

              <section class="row">
                <div class="col-sm-4 col-xs-12">
                  <h4>
                    Current set amount per point: <code id="set-point"></code> is equivalent to <code>1</code> point.
                    <button class="btn btn-xs btn-white" id="btn-set-point"><span class="fa fa-pencil text-warning"></span></button>
                  </h4>
                  <form action="<?php echo base_url('reward/set_point');?>" method="post" id="frm-set-point">
                    <div class="form-group">
                      <label for="">Set Amount Per Point</label>
                      <div class="input-group"><input type="text" class="form-control input-sm" name="amount" autofocus autocomplete="off" placeholder="e.g.100">
                         <span class="input-group-btn"> 
                           <button  class="btn btn-success btn-sm" type="submit">Save</button>
                           <button  class="btn btn-default btn-sm" type="reset">Cancel</button>
                         </span> 
                      </div>
                    </div>
                  </form>
                </div>
              </section>

               <table id="list" class="table table-bordered table-responsive nowrap table-sochic">
                 <thead>
                 <tr>
                   <th>Customer Name</th>
                   <th>Contact</th>
                   <th>Card Number</t>
                   <th>Points</th>
                   <th style="width: 1px">Action</th>
                 </tr>
                 </thead>

               </table> 

            </div>
        </div>
      </div>
  </div>
</section>
<script>

function setpoint(){
  $('#frm-set-point').formValidation({
    message: 'This value is not valid',
    //live: 'disabled',
    icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
      validating: 'fa fa-refresh fa-spin'
    },
    fields: {
      amount: {
        validators: {
          notEmpty: {
            message: 'The amount is required and can\'t be empty'
          },
          regexp: {
            regexp: /^[0-9]+$/,
            message: 'The amount can only consist of  number'
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
      type: $(this).attr('method'),
      dataType: 'html',
      success: function (data) {
        if (data == 1) {
          new PNotify({
            type:'success',
            text:'Point Successfully updated.',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'bounceOutRight'
            }
          });
           $('#frm-set-point').toggle('slow');
           get_point();
          $form
            .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
            .formValidation('resetForm', true);
        }

      }

    });

  });
}



function update_details(id){
 
  $('#update-reward-dialog').modal('show');

  $.ajax({
       url:'<?php echo base_url('reward/update_display'); ?>',
       data:{id:id},
       dataType:'JSON',
       type:'POST',
       success:function(data){

         $.each(data, function(index, data){
           $('#f-ch-id').val(data.ch_id);
           $('#f-c-id').val(data.cus_id);
           $('#f-fname').val(data.fname);
           $('#f-lastname').val(data.lname);
           $('#f-contact').val(data.contact);
           $('#f-card-number').val(data.card_no);
           $('#f-lot').val(data.lot_num);
           $('#f-block').val(data.block);
           $('#f-street-name').val(data.street_name);
           $('#f-barangay').val(data.brgy);
           $('#f-city').val(data.city);
           $('#f-province').val(data.province);
           $('#f-zip-code').val(data.zipcode);
           $('#f-country').val(data.country);
           $('#f-cus-id').val(data.cus_id);
         });
       }
       
     });
}

function update_card_holder(){
  $('#frm-update-card-holder').submit(function(e){
    e.preventDefault();

    $.ajax({
      url: $(this).attr('action'),
      data: new FormData(this),
      type: $(this).attr('method'),
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'html',
      success: function (data) {
        if(data == 1){
          new PNotify({
            type:'success',
            text:'Details Updated.',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'bounceOutRight'
            }
          });
          
          $('#update-reward-dialog').modal('hide');

         var table = $('#list').DataTable();
            table.ajax.reload();

        }
        else{
          new PNotify({
            type:'error',
            text:'Updated failed.',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'bounceOutRight'
            }
          });
        }

      }
    });
  });
}


function get_point(){
  $.ajax({
    url:'<?php echo base_url('reward/get_set_point'); ?>',
    dataType:'JSON',
    success:function(data){
        $.each(data, function(index, data){
          $('#set-point').html(data.point);
        });
    }
  });
}

// function format ( d ) {
//     // `d` is the original data object for the row
//     var html  ='<section class="row">';
//         html += '<div class="col-sm-5">';
//         html += '<div class="panel panel-info" data-sortable-id="ui-media-object-4">';
//         html += ' <div class="panel-heading">';
//         html += '  <div class="panel-heading-btn">';
//         html += '  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>';
//         html += '  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>';
//         html += '  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>';
//         html += '  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>';
//         html += ' </div>';
//         html += ' <h4 class="panel-title">Card Holder Details</h4>';
//         html += '</div>';
//         html += '<div class="panel-body">';
//         html += ' <ul class="media-list media-list-with-divider">';
//         html += '  <li class="media media-sm">';
//         html += '  <a class="media-left" href="javascript:;"><img src="'+d.image+'" alt="" class="media-object rounded-corner"></a>';
//         html += '  <div class="media-body">';
//         html += '  <h4 class="media-heading">'+d.card+' <span class="badge">'+d.points+'</span></h4>';
//         html += '  <p>Full Name : '+d.name+'</p>';
//         html += '  <p>Contact : '+d.contact+'</p>';
//         html += '  <p>Address :'+d.address+'</p>';
//         html += '  <p>'+d.action+'</p>';
//         html += '</div>';
//         html += '</li';
//         html += '</div>';
//         html += '</div>';
//         html += '</section';
        

//     return html;

// }


  $(document).ready(function () {


    var table = $('#list').DataTable({
      destroy:true,
      stateSave:true,
     ajax:{
       url:'<?php echo base_url('reward/display_points'); ?>',
       cache:true,
       beforeSend:function(){
       
       },
       complete:function(){
           
       }
     },

     destroy:true,
         dom: 'Bfrtip',
      buttons: [
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
         columns: [
              { "data": 'name' },
              { "data": 'contact' },
              { "data": 'card' },
              { "data": 'points' },
              { "data": 'actions' },
              //    {
              //     "className": 'details-control',
              //     "orderable": false,
              //     "data":      null,
              //     "defaultContent": ''
              // },
          ]
    
     });



    // $('#list tbody').on('click', 'td.details-control', function () {
    //        var tr = $(this).closest('tr');
    //        var row = table.row(tr);
    
    //        if ( row.child.isShown() ) {
    //            // This row is already open - close it
    //            row.child.hide();
    //            tr.removeClass('shown');
    //        }
    //        else { 
    //            // Open this row
    //            row.child( format(row.data()) ).show();
    //            tr.addClass('shown');
    //        }
    //    } );



    $('#frm-set-point').hide();

    $('#btn-set-point').click(function(){
      $('#frm-set-point').toggle('slow');
    });

    get_point();
    update_card_holder();
    $('#btn-update-close').click(function(){
      $('#update-detail').addClass('hide');
      $('#lists').removeClass('hide');
//      $(':text').val('');
    });
    setpoint();
    // list();
    $('#frm-card-holder').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        image: {
          validators: {
            // notEmpty: {
            //   message: 'The customer image is required and can\'t be empty'
            // },
            file: {
              extension: 'jpeg,jpg,png',
              type: 'image/jpeg,image/png',
              maxSize: 2097152,   // 2048 * 1024
              message: 'Please choose a image file with the following format (jpg, jpeg and png only).'
            }
          }
        },
        street_name: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The street can only consist of  alphabetical, numbers and spaces'
            }
          }
        },
        country: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z\s]+$/,
              message: 'The country can only consist of  alphabetical and spaces'
            }
          }
        },
        zip_code: {
          validators: {
            regexp: {
              regexp: /^[0-9]+$/,
              message: 'The postal code can only consist of  number'
            }
          }
        },
        province: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The province address can only consist of alphabetical, number and spaces'
            }
          }
        },
        city: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The city address can only consist of alphabetical, number and spaces'
            }
          }
        },
        barangay: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The barangay can only consist of alphabetical, number and spaces'
            }
          }
        },
        block: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The block number can only consist of alphabetical, number and spaces'
            }
          }
        },
        lot: {
          validators: {
            regexp: {
              regexp: /^[a-zA-Z0-9\s]+$/,
              message: 'The lot number can only consist of alphabetical, number and spaces'
            }
          }
        },
        card_number: {
          validators: {
            notEmpty: {
              message: 'The card number is required and cannot be empty'
            },
            stringLength: {
              min: 3,
              max: 30,
              message: 'The card number must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9]+$/,
              message: 'The card number can only consist of alphabetical'
            },
            remote: {
              url: '<?php echo base_url("reward/is_card_exist"); ?>',
              type: 'post',
              data: {card_number: $(this).val()},
              message: 'The card number is already exist.',
              delay: 1000
            }
          }
        },
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
        lastname: {
          validators: {
            notEmpty: {
               message: 'The last name is required and cannot be empty'
            },
            stringLength: {
              min: 3,
              max: 30,
              message: 'The last  name must be more than 3 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z\s]+$/,
              message: 'The last name can only consist of alphabetical, number, dot and underscore'
            }
          }
        },
        contact: {
          validators: {
            notEmpty: {
              message: 'The contact number is required and cannot be empty'
            },
            stringLength: {
              min: 3,
              max: 30,
              message: 'The contact number  must be more than 3 characters long and less than 30'
            },
            regexp: {
              regexp: /^[0-9]+$/,
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

            $('#btn-add-card-holder').val('Save').removeAttr('disabled');

          if (data == 1) {
            
             var table = $('#list').DataTable().ajax.reload();
               

              // $('#add-card-holder-dialog').modal('hide');

            new PNotify({
              type:'success',
              text:'New Card Holder successfully Save.',
              animate: {
                animate: true,
                in_class: 'bounceInLeft',
                out_class: 'bounceOutRight'
              }
            });

            $form
              .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
              .formValidation('resetForm', true);
          }

        },
        beforeSend:function(){
          
          $('#btn-add-card-holder').val('Saving...').attr('disabled',true);
        }

      });

    });
  });


</script>