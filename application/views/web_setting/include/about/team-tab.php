<section class="row" style="margin-top: 3%">
  <div class="col-md-12">
    <h3>Our Team</h3>
    <section class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
        <section class="panel">
          <div class="panel-body">
            <div class="div-header">
              <h5>Team Images <span id="team-count" class="badge"></span></h5>
            </div>
            <div style="height:500px; width: 100%; overflow:auto;" id="team-container">

            </div>
          </div>
        </section>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-12">
        <section class="panel" id="panel-team-display">
          <div class="panel-body">
            <div class="div-header">
              <h5>Team Description</h5>
            </div>
            <p data="" class="text-justify team-description"></p>

            <form id="frm-team" method="post" action="<?php echo base_url('web_setting/team_add_image'); ?>"
                  enctype="multipart/form-data">
              <div class="input-group">
                <input type="file" name="image" id="" class="form-control input-sm">
                <input type="hidden" name="id" value="" id="id-team" class="form-control input-sm">
                    <span class="input-group-btn">
                     <button type="submit" class="btn btn-success btn-sm">Add Image</button>
                     <button type="button" class="btn btn-default btn-sm" id="update-team-info">
                       <span class="glyphicon glyphicon-pencil"></span>
                     </button>
                    </span>
              </div>
            </form>

          </div>
        </section>
        <section class="panel hide" id="panel-team-update">
          <div class="panel-body">
            <div class="div-header">
              <h5>Update Product Description</h5>
            </div>
            <form action="<?php echo base_url('web_setting/update_about');?>" id="frm-update-team" method="post" >
              <div class="form-group">
                <input name="about_id" id="about-team-id" type="hidden"/>
                <textarea name="description" id="team-description" style="min-height: 200px"
                  class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                <button type="button" id="close-team-update" class="btn btn-default btn-sm">Close</button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>
</section>
<script>
    get_team();
     display_team_image();

  $(document).ready(function () {




    upload_image_team();
   
    update_team_info();
  });

  function update_team_info() {
    $('#frm-update-team').submit(function(e){
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
              text:'team description succcessfully updated.'
            });
          get_team();
            $('#panel-team-display').removeClass('hide');
            $('#panel-team-update').addClass('hide');
          }
        }
      });
    });


    $('#update-team-info').click(function () {
      $('#panel-team-display').addClass('hide');
      $('#panel-team-update').removeClass('hide');
    });
//    close the update when click
    $('#close-team-update').click(function(){
      $('#panel-team-display').removeClass('hide');
      $('#panel-team-update').addClass('hide');
    });
  }

  function delete_team_image(id) {
    $.ajax({
      url: '<?php echo base_url('web_setting/delete_team_image');?>',
      dataType: 'html',
      type: 'POST',
      data: {id: id},
      success: function (data) {
        if (data == 1) {
          new PNotify({
            title: "Team Image",
            type: "success",
            text: "Team Image Successfully Deleted.",
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
        display_team_image();

      }
    });
  }

  function display_team_image() {
      // alert('id : ' + $('#id-team').val());
    $.ajax({
      url: '<?php echo base_url('web_setting/get_team_image');?>',
      dataType: 'JSON',
      type: 'POST',
      data: {id: 2},
      success: function (data) {
        var row = '';
        $.each(data, function (index, data) {
          $('#team-count').text(data.count);
          row += '<div class="pull-left" style="width: 50%">';
          row += '<p><strong> Added :' + data.date + ' ' + data.action + '</p>';
          row += data.image;
          row += '</div>';
        });
        $('#team-container').html(row);
      }
    });
  }

  function upload_image_team() {
    
    $('#frm-team').submit(function (e) {
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
          display_team_image();
          if (data == 1) {
            display_image();
            // $('#image').val(' ');
            new PNotify({
              title: "Team Image",
              type: "success",
              text: "Team Image Successfully added.",
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
              title: "Customer Image",
              type: "danger",
              text: "Team Image failed to add.Please check your file",
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


  function get_team() {
    $.ajax({
      url: '<?php echo base_url('web_setting/get_team');?>',
      dataType: 'JSON',
      success: function (data) {
        $.each(data, function (index, data) {

          /*id for adding images in field*/
          $('#id-team').val(data.id);
          $('#title-id').attr('data-id', data.id);
          $('#about-team-id').val(data.id);
          $('.team-description').text(data.description);
          $('#team-description').text(data.description);
        });
      }
    });
  }
</script>