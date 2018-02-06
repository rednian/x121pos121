<section class="row" style="margin-top: 3%">
  <div class="col-sm-6 col-md-4">
    <section class="panel" id="facial-service-display">
      <div class="panel-body">
        <div class="div-header">
          <h5>Facial Service Details</h5>
        </div>
        <div class="thumbnail">
          <img id="fs-image" src="" alt="" style="display: block; height: 250px; width: 100%"/>

        </div>
        <p  class="text-justify">
          <button id="btn-update-facial-service" class="btn btn-default btn-xs" role="button"><span class="glyphicon
          glyphicon-pencil"></span></button>
          <span id="fs-description"></span>
        </p>
      </div>
    </section>
    <section class="panel hide" id="facial-service-update">
      <div class="panel-body">
        <div class="div-header">
          <h5>Update Facial Description</h5>
        </div>
        <form id="frm-update-facial-service" enctype="multipart/form-data" action="<?php echo base_url
        ('web_setting/service_tab'); ?>"
          method="post">
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="facial-service-description" cols="30" rows="10" class="form-control"
              style="min-height: 300px"></textarea>
          </div>
          <div class="form-group">
            <label for="">image</label>
            <input type="file" name="image" id="" class="form-control input-sm"/>
            <input type="hidden" name="id" id="facial-service-id"/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-sm btn-success" value="Save Changes"/>
            <button type="button" class="btn btn-sm btn-default" id="btn-facial-service-close">Close</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-md-8">
    <section class="panel hide" id="facial-service-details">
      <div class="panel-body">
        <div class="div-header">
          <h5>Facial Service Details</h5>
        </div>
        <section class="row">
          <div class="col-sm-7">
            <div id="facial-service-image"></div>
          </div>
          <div class="col-sm-5">
            <h3 id="facial-service-name"></h3>
            <p id="facial-service-price"></p>
            <p id="facial-service-type"></p>
            <p id="facial-service-class"></p>
            <p id="facial-service-status"></p>
            <p id="facial-service-manufacturer"></p>
          </div>
        </section>
        <section class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p id="facial-service-description"></p>
            <button class="btn btn-danger btn-xs btn-close">Close</button>
          </div>
        </section>
      </div>
    </section>
    <section class="panel" id="facial-service-list">
      <div class="panel-body">
        <div class="div-header">
          <h5>Service Web Setting</h5>
        </div>
        <table id="facial-service-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
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

  $(document).ready(function () {

    $('.btn-close').click(function(){

      $('#facial-service-details').addClass('hide');
      $('#facial-service-list').removeClass('hide');

    });

    facial_services_details();
    display_facial();
    update_facial_service();
  });

  function facial_details(id){

    $('#facial-service-details').removeClass('hide');
    $('#facial-service-list').addClass('hide');

   $.ajax({
     url:'<?php echo base_url('web_setting/service_facial_details');?>',
     type:'POST',
     dataType:'JSON',
     data:{id:id},
     success:function(data){
       $.each(data,function(index,data){
         $('#facial-service-name').html('<h2>Name :<strong>'+data.name+'</strong></h2>');
         $('#facial-service-price').html('<h2>Price :<strong>'+data.price+'</strong></h2>');
         $('#facial-service-image').html(data.image);
          $('#facial-service-type').html('<h4>Type :<strong>'+data.type+'</strong></h4>');
          $('#facial-service-class').html('<h4>Class :<strong>'+data.class+'</strong></h4>');
          $('#facial-service-description').html(data.description);
       });
     }
   });
  }
  function update_facial_service(){

    $('#frm-update-facial-service').submit(function(e){
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
              text:'Facial Service Description successfully updated.'
            });
          }
         facial_services_details();
          $('#facial-service-display').removeClass('hide');
          $('#facial-service-update').addClass('hide');
        }

    });
    });


    $('#btn-facial-service-close').click(function(){
      $('#facial-service-display').removeClass('hide');
      $('#facial-service-update').addClass('hide');
    });

    $('#btn-update-facial-service').click(function(){
      $('#facial-service-display').addClass('hide');
      $('#facial-service-update').removeClass('hide');
    });
  }

  function display_facial(){
    var oTable = $('#facial-service-table').dataTable({
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
      url: '<?php echo base_url('web_setting/get_services_facial')?>',
      dataType: 'json',
      type: 'post',
      data: {id: 1},
      success: function (data) {

        $.each(data, function (index, data) {

          oTable.fnAddData([data.check, '<img style="width:60px;" src="' + data.image + '">', data.name, data.price,
            data.status,data.action]);
        });
      }
    });
  }


  function view_details(id) {
    $.ajax({
      url: '<?php echo base_url('web_setting/view_service_details'); ?>',
      data: {service_id: id},
      dataType: 'JSON',
      type: 'POST',
      success: function (data) {
        $.each(data, function (index, data) {

        });
      }
    });
  }


  function facial_services_details() {
    var type = 'facial services';
    $.ajax({
      url: '<?php echo base_url('web_setting/get_service_type')?>',
      dataType: 'json',
      type: 'POST',
      data: {type: type},
      success: function (data) {
        $.each(data, function (index, data) {
          $('#fs-image').attr('src', data.image);
          $('#fs-title').text(data.type);
          $('#fs-description').attr('data-id', data.id);
          $('#fs-description').text(data.description);

          $('#facial-service-id').val(data.id);
          $('#facial-service-description').text(data.description);

        });
      }
    });
  }
</script>