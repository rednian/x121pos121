<section class="row" style="margin-top: 3%">
  <div class="col-sm-6 col-md-4">
    <section class="panel" id="hair-service-display">
      <div class="panel-body">
        <div class="div-header">
          <h5>Service Hair Details</h5>
        </div>
        <div class="thumbnail">
          <img id="fh-image" src="" alt="" style="display: block; height: 250px; width: 100%"/>

        </div>
        <p  class="text-justify">
          <button id="btn-update-hair-service" class="btn btn-default btn-xs" role="button"><span class="glyphicon
          glyphicon-pencil"></span></button>
          <span id="fh-description"></span>
        </p>
      </div>
    </section>
    <section class="panel hide" id="hair-service-update">
      <div class="panel-body">
        <div class="div-header">
          <h5>Update Hair Description</h5>
        </div>
        <form id="frm-update-hair-service" enctype="multipart/form-data" action="<?php echo base_url
        ('web_setting/service_tab'); ?>"
          method="post">
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="hair-service-description" cols="30" rows="10" class="form-control"
              style="min-height: 300px"></textarea>
          </div>
          <div class="form-group">
            <label for="">image</label>
            <input type="file" name="image" id="" class="form-control input-sm"/>
            <input type="hidden" name="id" id="hair-service-id"/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-sm btn-success" value="Save Changes"/>
            <button type="button" class="btn btn-sm btn-default" id="btn-hair-service-close">Close</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-md-8">
    <section class="panel hide" id="nail-service-details">
      <div class="panel-body">
        <div class="div-header">
          <h5>Nail Service Details</h5>
        </div>
        <section class="row">
          <div class="col-sm-7">
            <div id="hair-service-image"></div>
          </div>
          <div class="col-sm-5">
            <h3 id="hair-service-name"></h3>
            <p id="hair-service-price"></p>
            <p id="hair-service-qty"></p>
            <p id="hair-service-type"></p>
            <p id="hair-service-class"></p>
          </div>
        </section>
        <section class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p id="hair-service-description"></p>
            <button class="btn btn-danger btn-xs btn-close">Close</button>
          </div>
        </section>
      </div>
    </section>
    <section class="panel" id="nail-list">
      <section class="panel">
        <div class="panel-body">
          <div class="div-header">
            <h5>Service Web Setting</h5>
          </div>
          <table id="hair-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
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
    </section>
  </div>
</section>
<script>
  $(document).ready(function () {
      $('.btn-close').click(function(){
      $('#nail-service-details').addClass('hide');
      $('#nail-list').removeClass('hide');
    });

    // nail_services_details();
    hair_services_details();
    hair_service_display();
    update_hair_service();
  });

  function update_hair_service(){

    $('#frm-update-hair-service').submit(function(e){
      e.preventDefault();

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
              text:'Hair Service Description successfully updated.'
            });
            hair_services_details();
          }
          
          $('#hair-service-display').removeClass('hide');
          $('#hair-service-update').addClass('hide');
        }

      });
    });


    $('#btn-hair-service-close').click(function(){
      $('#hair-service-display').removeClass('hide');
      $('#hair-service-update').addClass('hide');
    });

    $('#btn-update-hair-service').click(function(){
      $('#hair-service-display').addClass('hide');
      $('#hair-service-update').removeClass('hide');
    });
  }

  function hair_service_display(){
    var hair = $('#hair-table').dataTable({
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
    url: '<?php echo base_url('web_setting/get_services_nail')?>',
    dataType: 'json',
    type: 'post',
    data: {id: 3},
    success: function (data) {
      $.each(data, function (index, data) {

        hair.fnAddData([data.check, '<img style="width:60px;" src="' + data.image + '">', data.name, data.price,
          data.status,data.action]);
      });
    }
  });
  }


  function nail_details(id) {
     $('#nail-service-details').removeClass('hide');
      $('#nail-list').addClass('hide');
    $.ajax({
      url:'<?php echo base_url('web_setting/service_nail_details');?>',
      type:'POST',
      dataType:'JSON',
      data:{id:id},
      success:function(data){
        $.each(data,function(index,data){
          $('#hair-service-name').html('<h2>Name :<strong>'+data.name+'</strong></h2>');
          $('#hair-service-price').html('<h2>Price :<strong>'+data.price+'</strong></h2>');
          $('#hair-service-image').html(data.image);
           $('#hair-service-type').html('<h4>Type :<strong>'+data.type+'</strong></h4>');
           $('#hair-service-class').html('<h4>Class :<strong>'+data.class+'</strong></h4>');
           $('#hair-service-description').html(data.description);
        });
      }
    });
  }


  function hair_services_details() {
    var type = 'nail services';
    $.ajax({
      url: '<?php echo base_url('web_setting/get_service_type')?>',
      dataType: 'json',
      type: 'POST',
      data: {type: type},
      success: function (data) {
        $.each(data, function (index, data) {
          $('#fh-image').attr('src', data.image);
          $('#fh-title').text(data.type);
          $('#fh-description').attr('data-id', data.id);
          $('#fh-description').text(data.description);

          $('#hair-service-id').val(data.id);
          $('#hair-service-description').text(data.description);
        });
      }
    });
  }
</script>


