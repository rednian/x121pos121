<section class="row" style="margin-top: 3%">
  <div class="col-md-12">
    <h3>Our Valued Customer</h3>
    <section class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
        <section class="panel">
          <div class="panel-body">
            <div class="div-header">
              <h5>Customer Images <span id="count" class="badge"></span></h5>
            </div>
            <div style="height:500px; width: 100%; overflow:auto" id="image-container">
              <table class="table" id="customer-table">
              </table>
            </div>
          </div>
        </section>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-12">
        <section class="panel" id="panel-customer-display">
          <div class="panel-body">
            <div class="div-header">
              <h5>Customer Description</h5>
            </div>
            <p data="" class="text-justify customer-description"></p>

            <form id="frm-customer-image" method="post" action="<?php echo base_url('web_setting/customer_add_image'); ?>" enctype="multipart/form-data">
              <div class="input-group">
                <input type="file" name="image" id="image" class="form-control input-sm">
                <input type="hidden" name="id" value="" id="id" class="form-control input-sm">
                    <span class="input-group-btn">
                     <button type="submit" class="btn btn-success btn-sm">Add Image</button>

                     <button type="button" class="btn btn-default btn-sm" id="update-customer-info">
                       <span class="glyphicon glyphicon-pencil"></span>
                     </button>
                    </span>
              </div>
            </form>
          </div>
        </section>
        <section class="panel hide" id="panel-customer-update">
          <div class="panel-body">
            <div class="div-header">
              <h5>Update Product Description</h5>
            </div>
            <form action="<?php echo base_url('web_setting/update_about');?>" id="frm-update-customer" method="post" >
              <div class="form-group">
                <input name="about_id" id="about-customer-id" type="hidden"/>
                <textarea name="description" id="customer-description" style="min-height: 200px"
                  class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                <button type="button" id="close-customer-update" class="btn btn-default btn-sm">Close</button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>
</section>
<script>

  $(document).ready(function () {
    get_customer();
    upload_image();
    display_image();
    update_customer_info();


  });
  function update_customer_info() {
    $('#frm-update-customer').submit(function(e){
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
              text:'customer description successfully updated.'
            });
           get_customer();
            $('#panel-customer-display').removeClass('hide');
            $('#panel-customer-update').addClass('hide');
          }
        }
      });
    });


    $('#update-customer-info').click(function () {
      $('#panel-customer-display').addClass('hide');
      $('#panel-customer-update').removeClass('hide');
    });
//    close the update when click
    $('#close-customer-update').click(function(){
      $('#panel-customer-display').removeClass('hide');
      $('#panel-customer-update').addClass('hide');
    });
  }

  function delete_image(id) {
    $.ajax({
      url: '<?php echo base_url('web_setting/delete_customer_image');?>',
      dataType: 'html',
      type: 'POST',
      data: {id: id},
      success: function (data) {
        if (data == 1) {
          new PNotify({
            title: "Customer Image",
            type: "success",
            text: "Customer Image Successfully Deleted.",
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
        display_image();

      }
    });
  }

  function display_image() {

    $.ajax({
      url: '<?php echo base_url('web_setting/get_customer_image');?>',
      dataType: 'JSON',
      type: 'GET',
      data: {id: $('#title-id').attr('data-id')},
      success: function (data) {
        $('#customer-table').empty();
        var row = '';
        $.each(data, function (index, data) {
          $('#count').text(data.count);
          row += '<tr>';
          row += '<td><p><strong> Added : ' + data.date + ' ' + data.action + '</p>' + data.image + '</strong></td>';

          row += '</tr>';

        });
        $('#customer-table').append(row);
      }
    });
  }

  function upload_image() {

    $('#frm-customer-image').submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action'),
        data: new FormData(this),
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'html',
        success: function (data) {


          if (data == 1) {
            display_image();
            new PNotify({
              type: "success",
              text: "Customer Image Successfully added.",
              nonblock: {
                nonblock: true
              },
              animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
              }
            });
          } else {
            new PNotify({
              type: "danger",
              text: "Customer Image failed to add.Please check your file",
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

  }


  function get_customer() {
    $.ajax({
      url: '<?php echo base_url('web_setting/get_customer');?>',
      dataType: 'JSON',
      type: 'GET',
      success: function (data) {
        $.each(data, function (index, data) {

          /*id for adding images in field*/
          $('#id').val(data.id);
          alert(data.id);
          $('#about-customer-id').val(data.id);
          $('#title-id').attr('data-id', data.id);
          $('.customer-description').text(data.description);
          $('#customer-description').text(data.description);
        });
      }
    });
  }
</script>