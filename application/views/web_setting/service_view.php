<section id="content" class="content">
  <div class="pull-right">

  </div>
  <h1 class="page-header">Services
     <small> Website Setting</small>
  </h1>
  <!-- end page-header -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                class="fa fa-times"></i></a>
          </div>
          <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
        <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Facial Services</a></li>
            <li role="presentation">
              <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Hair Services</a></li>
            <li role="presentation">
              <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Nail Services</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <?php include'service-include/facial-services.php';?>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
            <?php include'service-include/nail-services.php';?>   
            
             
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">      
              <?php include'service-include/hair-services.php';?>
           
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $('#btn-service-list').click(function(){ 
      $('.details').addClass('hide');
      $('.wrapper').removeClass('hide');
    });
  });
  // function details(id){
  //   $('.wrapper').addClass('hide');
  //    $('.details').removeClass('hide');
  //   $.ajax({
  //     url:'<?php echo base_url('web_setting/view_service_details');?>',
  //     data:{service_id:id},
  //     type:'POST',
  //     dataType:'JSON',
  //     success:function(data){
  //       $.each(data, function(index, data){
  //         $('#service-name').html(data.name);
  //         $('#service-image').html(data.image);
  //         $('#service-class').html(data.class);
  //         $('#service-type').html(data.type);
  //         $('#service-price').html(data.price);
  //         $('#service-status').html(data.status);
  //         $('#service-description').html(data.description);
  //       });
  //     }

  //   });
  // }

  function update_service_status(c){
    var id = $(c).attr('data-id');
    var status = '';
    if(c.checked){
      status = 1;
    }
    else{
      status = 0;
    }
    $.ajax({
      url: '<?php echo base_url('web_setting/update_service_status')?>',
      dataType: 'html',
      type: 'POST',
      data:{id:id, status:status},
      success: function (data) {
        if(data == 1){
          new PNotify({
            type: "success",
            text: "Status Successfully updated."
          });
        }
      }
    });
  }
</script>