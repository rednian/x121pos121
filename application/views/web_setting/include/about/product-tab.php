<section class="row" style="margin-top: 3%">
  <div class="col-md-12">
    <h3>Our Product</h3>
    <section class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
        <section class="panel">
          <div class="panel-body">
            <div class="div-header">
              <h5>Product Images <span id="product-count" class="badge"></span></h5>
            </div>
            <div style="height:500px; width: 100%; overflow:auto;" id="product-container">
            </div>
          </div>
        </section>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-12">
        <section class="panel" id="panel-prod-display">
          <div class="panel-body">
            <div class="div-header">
              <h5>Product Description</h5>
            </div>
            <p class="text-justify product-descriptions"></p>

            <form id="frm-product" method="post" action="<?php echo base_url('web_setting/product_add_image'); ?>" enctype="multipart/form-data">
              <div class="input-group">
                <input type="file" name="image" class="form-control input-sm">
                <input type="hidden" name="id" value="" id="id-product" class="form-control input-sm">
                    <span class="input-group-btn">
                     <button type="submit" class="btn btn-success btn-sm">Add Image</button>
                     <button id="update-prod-info" type="button" class="btn btn-default btn-sm">
                       <span class="glyphicon glyphicon-pencil"></span>
                     </button>
                    </span>
              </div>
            </form>
          </div>
        </section>
        <section class="panel hide" id="panel-prod-update">
          <div class="panel-body">
            <div class="div-header">
              <h5>Update Product Description</h5>
            </div>
            <form action="<?php echo base_url('web_setting/update_about');?>" id="frm-update-product" method="post" >
              <div class="form-group">
                <input name="about_id" id="about-prod-id" type="hidden"/>
                <textarea name="description" id="prod-description" style="min-height: 200px"
                  class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                <button type="button" id="close-prod-update" class="btn btn-default btn-sm">Close</button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>
</section>
<script>
 get_product();
  $(document).ready(function () {
   
    upload_image_product();
    display_product_image();
    delete_product_image();
    update_prod_info();
  });

  function update_prod_info() {
    $('#frm-update-product').submit(function(e){
      e.preventDefault();
      $.ajax({
        url:$(this).attr('action'),
        type:$(this).attr('method'),
        data:$(this).serialize(),
        dataType:'JSON',
        success:function(data){
          if(data == 1){
            new PNotify({
              type:'success',
              text:'Product description succcessfully updated.'
            });
            get_product();
            $('#panel-prod-display').removeClass('hide');
            $('#panel-prod-update').addClass('hide');
          }
        }
      });
    });


    $('#update-prod-info').click(function () {
        $('#panel-prod-display').addClass('hide');
        $('#panel-prod-update').removeClass('hide');
    });
//    close the update when click
    $('#close-prod-update').click(function(){
      $('#panel-prod-display').removeClass('hide');
      $('#panel-prod-update').addClass('hide');
    });
  }

  function delete_product_image(id) {
    $.ajax({
      url: '<?php echo base_url('web_setting/delete_product_image');?>',
      dataType: 'html',
      type: 'POST',
      data: {id: id},
      success: function (data) {
        if (data == 1) {

        }
        display_product_image();

      }
    });
  }

  function display_product_image() {
    $.ajax({
      url: '<?php echo base_url('web_setting/get_product_image');?>',
      dataType: 'JSON',
      type: 'POST',
      data: {id: $('#id-product').attr('value')},
      success: function (data) {

        var row = '';
        $.each(data, function (index, data) {
          $('#product-count').text(data.count);
          row += '<div class="pull-left" style="width: 50%">';
          row += '<p><strong> Added :' + data.date + ' ' + data.action + '</p>';
          row += data.image;
          row += '</div>';
        });
        $('#product-container').html(row);
      }
    });
  }

  function upload_image_product() {
      $('#frm-product').formValidation({
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
              notEmpty: {
                message: 'The image is required and can\'t be empty'
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
       type: 'POST',
       contentType: false,
       cache: false,
       processData: false,
       dataType: 'html',
       success: function (data) {
         display_product_image();
         if (data == 1) {

           new PNotify({
             text: 'Image succcessfully added.',
             type: 'success',
             styling: 'brighttheme'
           });

         } else {
           new PNotify({
             title: "Product Image",
             type: "danger",
             text: "Product Image failed to add.Please check your file",
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
       }
     });

      });





    // $('#frm-product').submit(function (e) {
    //   e.preventDefault();
    //   $.ajax({
    //     url: $(this).attr('action'),
    //     data: new FormData(this),
    //     type: 'POST',
    //     contentType: false,
    //     cache: false,
    //     processData: false,
    //     dataType: 'html',
    //     success: function (data) {
    //       display_product_image();
    //       if (data == 1) {

    //         new PNotify({
    //           text: 'Image succcessfully uploaded.',
    //           type: 'success',
    //           styling: 'brighttheme'
    //         });

    //       } else {
    //         new PNotify({
    //           title: "Product Image",
    //           type: "danger",
    //           text: "Product Image failed to add.Please check your file",
    //           nonblock: {
    //             nonblock: true
    //           },
    //           animate: {
    //             animate: true,
    //             in_class: 'slideInDown',
    //             out_class: 'slideOutUp'
    //           }
    //         });
    //       }
    //     }
    //   });
    // });

  }


  function get_product() {
    $.ajax({
      url: '<?php echo base_url('web_setting/get_product');?>',
      dataType: 'JSON',
      type: 'GET',
      success: function (data) {
        $.each(data, function (index, data) {

          /*id for adding images in field*/
          $('#id-product').val(data.id);
          $('#about-prod-id').val(data.id);
          $('.product-descriptions').text(data.description);
          $('#prod-description').text(data.description);
        });
      }
    });
  }
</script>