<div class="modal fade" id="view-detail-service-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Service Details</h4>
      </div>
      <div class="modal-body">
        <div class="media media-lg">
          <a class="media-left" href="javascript:;">
            <img id="service-image" src="" alt="" class="media-object">
          </a>
          <div class="media-body">
            <h4 class="media-heading" id="service-names"></h4>
            <h5 id="services-price"></h5>
            <h5 id="services-type"></h5>
            <h5 id="services-class"></h5>
            <h5 id="services-status"></h5>
            <p id="service-descriptions"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
function view_service(id){

    $('#view-detail-service-dialog').modal('show');

    $.ajax({
      url:'<?php echo base_url('services/view_details'); ?>',
      data:{id:id},
      type:'POST',
      dataType:'JSON',
      success:function(data){

        $.each(data, function(index, data){

          $('#service-image').attr('src',data.image);
          $('#service-names').html(data.name);
          $('#service-descriptions').html(data.description);
          $('#services-price').html(data.price);
          $('#services-type').html(data.type);
          $('#services-class').html(data.class);
          $('#services-status').html(data.status);
        });

        
      }
    });

  }


</script>