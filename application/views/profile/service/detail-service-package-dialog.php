<div class="modal fade" id="detail-service-package-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Package Details</h4>
      </div>
      <div class="modal-body">
        
        <div class="media media-lg">
          <a class="media-left" href="javascript:;">
            <img id="package-image" src="" alt="" class="media-object">
          </a>
          <div class="media-body">
            <h4 class="media-heading" id="package-name" data-id=""></h4>
            <h4 class="media-heading" id="package-price"></h4>
            <p id="package-type"></p>
            <p>Service(s) include : <span id="services-under"></span></p>
            <p id="package-description"></p>
          </div>
        </div>
      
      </div>  
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<script>


function detail_package(id){
  
  $('#detail-service-package-dialog').modal('show');

  $.ajax({
    url:'<?php echo base_url('services/package_details'); ?>',
    data:{id:id},
    dataType:'JSON',
    type:'POST',
    success:function(data){
      $('#package-image').attr('src',data.image);
      $('#package-name').html(data.name);
      $('#package-name').attr('data-id',data.id);
      $('#package-description').html(data.description);
      $('#package-type').html(data.type);
      $('#package-price').html(data.price);

    }

    //



  });

   $.ajax({
    url:'<?php echo base_url('services/package_detail_services'); ?>',
    data:{id: id},
    dataType:'JSON',
    type:'POST',
    success:function(data){
      
      $.each(data, function(index, data){
        $('#services-under').append('<span class="label label-info">'+data.service+'</span>'+' ');
      });
    }
  });


}

</script>