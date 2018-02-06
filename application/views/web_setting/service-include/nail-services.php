<!------------------------------------>
<section class="row" style="margin-top: 3%">
  <div class="col-sm-6 col-md-4">
    <section class="panel"  id="nail-service-display">
      <div class="panel-body">
        <div class="div-header">
          <h5>Service Nail Details</h5>
        </div>
        <div class="thumbnail">
          <img id="fn-image" src="" alt="" style="display: block; height: 250px; width: 100%"/>

        </div>
          <p  class="text-justify">
            <button id="btn-update-nail-service" class="btn btn-default btn-xs" role="button"><span class="glyphicon
          glyphicon-pencil"></span></button>
            <span id="fn-description"></span>
          </p>
      </div>
    </section>
    <section class="panel hide" id="nail-service-update">
      <div class="panel-body">
        <div class="div-header">
          <h5>Update Nail Description</h5>
        </div>
        <form id="frm-update-nail-service" enctype="multipart/form-data" action="<?php echo base_url
        ('web_setting/service_tab'); ?>"
          method="post">
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="nail-service-description" cols="30" rows="10" class="form-control"
              style="min-height: 300px"></textarea>
          </div>
          <div class="form-group">
            <label for="">image</label>
            <input type="file" name="image" id="" class="form-control input-sm"/>
            <input type="hidden" name="id" id="nail-service-id"/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-sm btn-success" value="Save Changes"/>
            <button type="button" class="btn btn-sm btn-default" id="btn-nail-service-close">Close</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-md-8">
    <section class="panel hide" id="hair-service-details">
      <div class="panel-body">
        <div class="div-header">
          <h5>Hair Service Details</h5>
        </div>
        <section class="row">
          <div class="col-sm-7">
            <div id="nail-service-image"></div>
          </div>
          <div class="col-sm-5">
            <h3 id="nail-service-name"></h3>
            <p id="nail-service-price"></p>
            <p id="nail-service-qty"></p>
            <p id="nail-service-type"></p>
            <p id="nail-service-class"></p>
          </div>
        </section>
        <section class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p id="nail-service-description"></p>
            <button class="btn btn-danger btn-xs btn-close">Close</button>
          </div>
        </section>
      </div>
    </section>
    <section class="panel" id="hair-list">
      <div class="panel-body">
        <div class="div-header">
          <h5>Service Web Setting</h5>
        </div>
        <table id="nail-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
          <thead>
          <tr class="headings">
            <th class="col-sm-2">View Public</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Status</th>
            <th class="col-sm-1">Action</th>
          </tr>
          </thead>

        </table>
      </div>
      </section>
  </div>
</section>
<script>
  function service_details(id){
    $('.table').addclass('hide');
  }

  $(document).ready(function () {
    $('.btn-close').click(function(){
      $('#hair-service-details').addClass('hide');
      $('#hair-list').removeClass('hide');
    });

    nail_services_details();
    display_nail();
    update_nail_service();

  });

  function update_nail_service(){

    $('#frm-update-nail-service').submit(function(e){
      e.preventDefault();
      console.log( new FormData(this));
      $.ajax({
        url:$(this).attr('action'),
        type: $(this).attr('method'),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success:function(data){
          if(data == 1){
            new PNotify({
              type:'success',
              text:'Nail Service Description successfully updated.'
            });
          }
          nail_services_details();
          $('#nail-service-display').removeClass('hide');
          $('#nail-service-update').addClass('hide');
        }

      });
    });


    $('#btn-nail-service-close').click(function(){
      $('#nail-service-display').removeClass('hide');
      $('#nail-service-update').addClass('hide');
    });

    $('#btn-update-nail-service').click(function(){
      $('#nail-service-display').addClass('hide');
      $('#nail-service-update').removeClass('hide');
    });
  }

  function display_nail(){
    var nail = $('#nail-table').dataTable({
      destroy: true,
      "bSort": false,
      "oLanguage": {
        "sSearch": "Search:"
      },

      'iDisplayLength': 12,
      "sPaginationType": "full_numbers"
    });
    /*load service table*/
    $.ajax({
      url: '<?php echo base_url('web_setting/get_services_hair')?>',
      dataType: 'json',
      type: 'post',
      data: {id: 2},
      success: function (data) {
        $.each(data, function (index, data) {

          nail.fnAddData([data.check, '<img style="width:60px;" src="' + data.image + '">', data.name, data.price,
            data.status,data.action]);
        });
      }
    });
  }


  function hair_details(id){
      $('#hair-service-details').removeClass('hide');
      $('#hair-list').addClass('hide');
    $.ajax({
      url:'<?php echo base_url('web_setting/service_hair_details');?>',
      type:'POST',
      dataType:'JSON',
      data:{id:id},
      success:function(data){
        $.each(data,function(index,data){
          $('#nail-service-name').html('<h2>Name :<strong>'+data.name+'</strong></h2>');
          $('#nail-service-price').html('<h2>Price :<strong>'+data.price+'</strong></h2>');
          $('#nail-service-image').html(data.image);
           $('#nail-service-type').html('<h4>Type :<strong>'+data.type+'</strong></h4>');
           $('#nail-service-class').html('<h4>Class :<strong>'+data.class+'</strong></h4>');
           $('#nail-service-description').html(data.description);
        });
      }
    });
  }

  function nail_services_details() {
    var type = 'hair services';
    $.ajax({
      url: '<?php echo base_url('web_setting/get_service_type')?>',
      dataType: 'json',
      type: 'POST',
      data: {type: type},
      success: function (data) {
        $.each(data, function (index, data) {
          $('#fn-image').attr('src', data.image);
          $('#fn-title').text(data.type);
          $('#fn-description').attr('data-id', data.id);
          $('#fn-description').text(data.description);

          $('#nail-service-id').val(data.id);
          $('#nail-service-description').text(data.description);
        });
      }
    });
  }
</script>