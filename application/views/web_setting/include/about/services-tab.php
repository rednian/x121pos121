<section class="row" style="margin-top: 3%">
  <div class="col-md-12">
    <h3>Our Services</h3>
    <section class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
        <section class="panel">
          <div class="panel-body">
            <div class="div-header">
              <h5>Service Images <span id="service-count" class="badge"></span></h5>
            </div>
            <div style="height:500px; width: 100%; overflow:auto;" id="service-container">
            </div>
          </div>
        </section>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-12">
        <section class="panel"  id="panel-service-display">
          <div class="panel-body">
            <div class="div-header">
              <h5>Service Desciption</h5>
            </div>
            <p class="text-justify service-descriptions"></p>
            <form id="frm-service" method="post" action="<?php echo base_url('web_setting/service_add_image'); ?>" enctype="multipart/form-data">
              <div class="input-group">
                <input type="file" name="image" class="form-control input-sm">
                <input type="hidden" name="id" value="" id="id-service" class="form-control input-sm">
                    <span class="input-group-btn">
                     <button type="submit" class="btn btn-success btn-sm">Add Image</button>
                     <button type="button" class="btn btn-default btn-sm"  id="update-service-info">
                       <span class="glyphicon glyphicon-pencil"></span>
                     </button>
                    </span>
              </div>
            </form>
          </div>
        </section>
        <section class="panel hide" id="panel-service-update">
          <div class="panel-body">
            <div class="div-header">
              <h5>Update Product Description</h5>
            </div>
            <form action="<?php echo base_url('web_setting/update_about');?>" id="frm-update-service" method="post" >
              <div class="form-group">
                <input name="about_id" id="about-service-id" type="hidden"/>
                <textarea name="description" id="service-description" style="min-height: 200px"
                  class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                <button type="button" id="close-service-update" class="btn btn-default btn-sm">Close</button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>

    <section class="panel panel-default">
      <div class="panel-heading" style="padding: 2px 15px !important;">
        <h4>Our Services</h4>
      </div>
      <div class="panel-body">
        <section class="row">
          <div class="col-md-7">
            <h4>Service Images <span id="service-count" class="badge"></span></h4>


          </div>
          <div class="col-md-5">
            <section class="panel">
              <div class="panel-heading">

              </div>
              <div class="panel-body">

              </div>
            </section>
          </div>
          <p>

          </p>
        </section>

      </div>
    </section>
  </div>
</section>
<script>
  get_service();
   display_service_image();
  $(document).ready(function () {

    delete_service_image();
   
    upload_image_service();
    update_service_info();
  });
  function update_service_info() {
    $('#frm-update-service').submit(function(e){
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
              text:'Service description succcessfully updated.'
            });
            get_service();
            $('#panel-service-display').removeClass('hide');
            $('#panel-service-update').addClass('hide');
          }
        }
      });
    });


    $('#update-service-info').click(function () {
      $('#panel-service-display').addClass('hide');
      $('#panel-service-update').removeClass('hide');
    });
//    close the update when click
    $('#close-service-update').click(function(){
      $('#panel-service-display').removeClass('hide');
      $('#panel-service-update').addClass('hide');
    });
  }

  function delete_service_image(id){
    $.ajax({
      url: '<?php echo base_url('web_setting/delete_service_image');?>',
      dataType: 'html',
      type: 'POST',
      data:{id:id},
      success: function (data) {
        if(data == 1){
          new PNotify({
            title: "Service Image",
            type: "success",
            text: "Service Image Successfully Deleted.",
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
        display_service_image();

      }
    });
  }

  function display_service_image(){
    $.ajax({
      url: '<?php echo base_url('web_setting/get_service_image');?>',
      dataType: 'JSON',
      type: 'POST',
      data:{id:$('#id-service').attr('value')},
      success: function (data) {

        var row  = '';
        $.each(data, function (index, data) {
          $('#service-count').text(data.count);
          row += '<div class="pull-left" style="width: 50%">';
          row += '<p><strong> Added :'+data.date+' '+data.action+'</p>';
          row += data.image;
          row += '</div>';
        });
        $('#service-container').html(row);
      }
    });
  }

  function upload_image_service() {
    $('#frm-service').submit(function (e) {
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
          display_service_image();
          if (data == 1) {

            // $('#image').val(' ');
            new PNotify({
              type: "success",
              text: "Service Image Successfully added.",
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
              text: "Service Image failed to add.Please check your file",
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


  function get_service() {
    $.ajax({
      url: '<?php echo base_url('web_setting/get_service');?>',
      dataType: 'JSON',
      type: 'GET',
      success: function (data) {
        $.each(data, function (index, data) {

          /*id for adding images in field*/
          $('#id-service').val(data.id);
          $('#about-service-id').val(data.id);
//          $('#title-id').attr('data-id', data.id);
          $('.service-descriptions').text(data.description);
          $('#service-description').text(data.description);
        });
      }
    });
  }
</script>