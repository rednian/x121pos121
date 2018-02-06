<div class="modal fade avail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <section class="modal-body">
        <section class="row">
          <div class="col-md-5">
            <table class="table" id="list-service">
              <thead class="hide">
              <tr>
                <td class="col-xs-1"></td>
                <td></td>
                <td class="col-xs-1"></td>
              </tr>
              </thead>
            </table>
          </div>
        </section>

      </section>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    services_avail();
  });

  function delete_service(rowid){
    var qty = 0;
    $.ajax({
      url:'<?php echo base_url('sell/delete_service');?>',
      dataType:'JSON',
      type:'POST',
      data:{id:rowid,qty:qty},
      success:function(data){
        if(data == 1) {
          services_avail();
        }
      }
    });
  }

  function services_avail(){
    var oTable = $('#list-service').dataTable({
      destroy: true,
      "bPaginate": false,
      "bFilter": false,
      "bInfo": false,
      "bSort": false,
      "language": {
        "emptyTable": " "
      }
    });
    $.ajax({
      url:'<?php echo base_url('sell/load_services_avail');?>',
      dataType:'JSON',
      success:function(data){
        $.each(data,function(index,data){
          oTable.fnAddData([data.name, data.price, data.remove]);
        });
      }
    });
  }
</script>