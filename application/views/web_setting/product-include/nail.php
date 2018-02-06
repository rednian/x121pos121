
<section class="row" style="margin-top: 3%">
  <div class="col-sm-6 col-md-4">
    <section class="panel"  id="nail-display">
      <div class="panel-body">
        <div class="div-header">
          <h5  id="n-title"></h5>
        </div>
        <div class="thumbnail">
          <img id="n-image" src="" alt="" style="display: block; height: 250px; width: 100%"/>

        </div>
        <p  class="text-justify">
          <button id="btn-update-nail" class="btn btn-default btn-xs" role="button"><span class="glyphicon
          glyphicon-pencil"></span></button>
          <span id="n-description"></span>
        </p>
      </div>
    </section>
    <section class="panel hide" id="nail-update">
      <div class="panel-body">
        <div class="div-header">
          <h5>Update Hair Description</h5>
        </div>
        <form id="frm-update-nail" enctype="multipart/form-data" action="<?php echo base_url
        ('web_setting/product_tab'); ?>"
          method="post">
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="nail-description" cols="30" rows="10" class="form-control"
              style="min-height: 300px"></textarea>
          </div>
          <div class="form-group">
            <label for="">image</label>
            <input type="file" name="image" id="" class="form-control input-sm"/>
            <input type="hidden" name="id" id="nail-id"/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-sm btn-success" value="Save Changes"/>
            <button type="button" class="btn btn-sm btn-default" id="btn-nail-close">Close</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-md-8">
    <section class="panel hide" id="nail-details">
      <div class="panel-body">
        <div class="div-header">
          <h5>nail Product Details</h5>
        </div>
        <section class="row">
          <div class="col-sm-7">
            <div id="nail-image"></div>
          </div>
          <div class="col-sm-5">
            <h3 id="nail-name"></h3>
            <p id="nail-barcode"></p>
            <p id="nail-price"></p>
            <p id="nail-qty"></p>
            <p id="nail-type"></p>
            <p id="nail-class"></p>
            <p id="nail-expiration-date"></p>
            <p id="nail-subname"></p>
            <p id="nail-size"></p>
            <p id="nail-weight"></p>
            <p id="nail-manufacturer"></p>
          </div>
        </section>
        <section class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p id="nail-description"></p>
            <button class="btn btn-danger btn-xs btn-close">Close</button>
          </div>
        </section>
      </div>
    </section>
    <section class="panel" id="nail-list">
      <section class="panel">
        <div class="panel-body">
          <div class="div-header">
            <h5>Nail Product List</h5>
          </div>
          <table id="product-nail-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
            <thead>
            <tr class="headings">
              <th class="col-sm-2">View Public</th>
              <th>Image</th>
              <th>Product</th>
              <th>Price</th>
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
function nail_view_details(id){
  
  $('#nail-details').removeClass('hide');
  $('#nail-list').addClass('hide');
  $.ajax({
    url:'<?php echo base_url('web_setting/view_details');?>',
    type:'POST',
    dataType:'JSON',
    data:{id:id},
    success:function(data){
      $.each(data,function(index,data){
        $('#nail-name').html('<h2>Name :<strong>'+data.name+'</strong></h2>');
        $('#nail-price').html('<h2>Price :<strong>'+data.price+'</strong></h2>');
        $('#nail-image').html(data.image);
         $('#nail-barcode').html('<h4>Barcode :<strong>'+data.barcode+'</strong></h4>');
         $('#nail-qty').html('<h4>Quantity :<strong>'+data.qty+'</strong></h4>');
         $('#nail-type').html('<h4>Type :<strong>'+data.type+'</strong></h4>');
         $('#nail-class').html('<h4>Class :<strong>'+data.class+'</strong></h4>');
         $('#nail-expiration-date').html('<h4>Expiration Date :<strong>'+data.expire+'</strong></h4>');
         $('#nail-subname').html('<h4>Subname :<strong>'+data.sub+'</strong></h4>');
         $('#nail-size').html('<h4>Size :<strong>'+data.size+'</strong></h4>');
         $('#nail-weight').html('<h4>Size :<strong>'+data.weight+'</strong></h4>');
         $('#nail-manufacturer').html('<h4>Size :<strong>'+data.manufacturer+'</strong></h4>');
         $('#nail-description').html(data.manufacturer);
      });
    }
  });
}

  $(document).ready(function () {
    nail_details();
    update_nail();

      $('.btn-close').click(function(){
      $('#nail-details').addClass('hide');
      $('#nail-list').removeClass('hide');
  });

    var n = $('#product-nail-table').dataTable({
      destroy: true,
      "bSort": false,
      "oLanguage": {
        "sSearch": "Search:"
      },
      'iDisplayLength': 12,
      "sPaginationType": "full_numbers"
    });

   $.ajax({
     url: '<?php echo base_url('web_setting/get_product_nail')?>',
     dataType: 'json',
     type: 'post',
     data: {id: 3},
     success: function (data) {

       $.each(data, function (index, data) {

         n.fnAddData([
           data.check,
           '<img style="width:60px;" src="' + data.image + '">',
           data.name,
           data.price,
           data.action
         ]);
       });
     }
   });
  });

  function update_nail(){

    $('#frm-update-nail').submit(function(e){
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
              text:'Nail Product Description successfully updated.'
            });
          }
        nail_details();
          $('#nail-display').removeClass('hide');
          $('#nail-update').addClass('hide');
        }

      });
    });


    $('#btn-nail-close').click(function(){
      $('#nail-display').removeClass('hide');
      $('#nail-update').addClass('hide');
    });

    $('#btn-update-nail').click(function(){
      $('#nail-display').addClass('hide');
      $('#nail-update').removeClass('hide');
    });
  }

  function nail_details() {
    var type = 'nail products';
    $.ajax({
      url: '<?php echo base_url('web_setting/get_product_type')?>',
      dataType: 'json',
      type: 'POST',
      data:{type:type},
      success: function (data) {

        $.each(data, function (index, data) {

          $('#n-image').attr('src', data.image);
          $('#n-title').text(data.title);
          $('#nail-id').val(data.id);
          $('#n-description').text(data.description);
          $('#nail-description').text(data.description);
        });
      }
    });
  }
</script>