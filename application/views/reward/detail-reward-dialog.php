<div class="modal fade" id="details-dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Card Holder Details</h4>
      </div>
      <div class="modal-body">
        <li class="media">
          <a class="media-left" href="javascript:;">
              <img id="image" src="" alt="" class="media-object ">
          </a>
          <div class="media-body">
            <table class="table table-striped">
                <tr> 
                  <td><h4 class="media-heading"><span class="fa fa-star text-warning"></span></h4></td>
                  <td><h4 class="media-heading"> <span id="point"></span></h4></td>
                  <input type="hidden" name="id" id="card-id">
                </tr>
                <tr>
                  <td><h4 class="media-heading"><span class="glyphicon glyphicon-user"></span></h4></td>
                  <td><h4 class="media-heading"> <span id="name"></span></h4></td>
                </tr>
                <tr>
                  <td><h4 class="media-heading"><span class="fa fa-credit-card"></span></h4></td>
                  <td><h4 class="media-heading"> <span id="card"></span></h4></td>
                </tr>
                <tr>
                  <td><h4 class="media-heading"><span class="fa fa-mobile"></span></h4></td>
                  <td><h4 class="media-heading"> <span id="contact"></span></h4></td>
                </tr>
                <tr>
                  <td><h4 class="media-heading"><span class="fa fa-home"></span></h4></td>
                  <td><h4 class="media-heading"> <span id="address"></span></h4></td>
                </tr>
            </table>
              <p>
                <button type="button" id="btn-hide" data-loading-text="Loading..." class="btn btn-success btn-sm" autocomplete="off">Available Services</button>
              </p>

          </div>
        </li>
        <div id="wrapper">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Services</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Packages</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
              <table class="table table-bordered" id="available-services">
                <thead>
                  <tr>
                    <th class="col-xs-5">#</th>
                    <th>Image</th>
                    <th>Services</th>
                    <th>Price</th>
                    <th class="col-xs-5">Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
              <table class="table table-bordered" id="available-packages">
                <thead>
                  <tr>
                    <th class="col-xs-5">#</th>
                    <th>Image</th>
                    <th>Services</th>
                    <th>Price</th>
                    <th class="col-xs-5">Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
        <input type="submit" name="action" class="btn btn-sm btn-success" value="Save">
      </div>
    
    </div>
  </div>
</div>
<script type="text/javascript">
  
  $(document).ready(function(){

    $('#details-dialog').on('hidden.bs.modal', function (e) {
      
        var table = $('#available-services').DataTable().clear().draw();
                    
                     $('#wrapper').hide();

     });


    $('#wrapper').hide();

    $('#btn-hide').on('click', function () {

       var $btn = $(this).button('loading');

        services();

       $.ajax({
        url:'<?php echo base_url('reward/available_services'); ?>',
        data:{id:$('#card-id').val(),point:  $('#point').text()},
        type:'POST',
        success:function(data){
               
        },
        complete:function(){
          $btn.button('reset');
           $('#wrapper').fadeIn();
        }
       });
       
        
     });

    // $('#btn-hide').click(function(){
      


    // });

  });
  function redeem(service_id, card_id, price, vat){
     (new PNotify({
            title: 'Confirmation Needed',
            type:'warning',
            text: 'Are you sure you want to redeem the service?',
            icon: 'glyphicon glyphicon-question-sign',
            hide: false,
            confirm: {
                confirm: true
            },
            buttons: {
                closer: false,  
                sticker: false
            },
            history: {
                history: false
            }
        })).get().on('pnotify.confirm', function() {

            $.ajax({
                url:'<?php echo base_url('reward/redeem_service') ?>',
                data:{service_id:service_id,card_id:card_id, price:price, vat:vat},
                type:'POST',
                success:function(data){
                
                if(data == 1){
                  new PNotify({
                    type:'success',
                    text:'Points successfully convert and service can now avail'
                  });

                var table = $('#available-services').DataTable().ajax.reload();
                } 
               
                }
              });

        }).on('pnotify.cancel', function() {
          /*close the notify*/
        });
  }

  function services(){

    var table = $('#available-services').DataTable({  
                destroy:true, 
                ajax:{
                  url:'<?php echo base_url('reward/available_services'); ?>',
                  data:{id:$('#card-id').val(),point:  $('#point').text()},
                  type:'POST',
                  cache:true,
                },
                columns:[
                  {'data':'num'},
                  {
                    'data':'image',
                    render:function(image){
                      return '<img src="'+image+'" class="img-responsive">' 
                    }
                  },
                  {'data':'service'},
                  {'data':'price'},
                  {'data':'action'},
                ]

            });
  }

  function details(id){


    $('#details-dialog').modal('show');

    $.ajax({
      url:'<?php echo base_url('reward/card_holder_details'); ?>',
      data:{id:id},
      type:'POST',
      dataType:'JSON',
      success:function(data){
       
       $.each(data, function(index, data){

        $('#contact').text(data.contact);
        $('#card-id').val(data.id); 
        $('#address').text(data.address);
        $('#point').text(data.point);
        $('#name').text(data.name);
        $('#card').text(data.card);
        $('#image').attr('src',data.image);

       });

      }
    });

  }




</script>
