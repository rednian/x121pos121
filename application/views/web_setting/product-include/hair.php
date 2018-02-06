
<section class="row" style="margin-top: 3%">
  <div class="col-sm-6 col-md-4">
    <section class="panel" id="hair-display">
      <div class="panel-body">
        <div class="div-header">
          <h5 id="h-title"></h5>
        </div>
        <div class="thumbnail">
          <img id="h-image" src="" alt="" style="display: block; height: 250px; width: 100%"/>
        </div>
        <p  class="text-justify">
          <button id="btn-update-hair" class="btn btn-default btn-xs" role="button"><span class="glyphicon
          glyphicon-pencil"></span></button>
          <span id="h-description"></span>
        </p>
      </div>
    </section>
    <section class="panel hide" id="hair-update">
      <div class="panel-body">
        <div class="div-header">
          <h5>Update Hair Description</h5>
        </div>
        <form id="frm-update-hair" enctype="multipart/form-data" action="<?php echo base_url
        ('web_setting/product_tab'); ?>"
          method="post">
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="hair-description" cols="30" rows="10" class="form-control"
              style="min-height: 300px"></textarea>
          </div>
          <div class="form-group">
            <label for="">image</label>
            <input type="file" name="image" id="" class="form-control input-sm"/>
            <input type="hidden" name="id" id="hair-id"/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-sm btn-success" value="Save Changes"/>
            <button type="button" class="btn btn-sm btn-default" id="btn-hair-close">Close</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-md-8">
    <section class="panel hide" id="hair-details">
      <div class="panel-body">
        <div class="div-header">
          <h5>hair Product Details</h5>
        </div>
        <section class="row">
          <div class="col-sm-7">
            <div id="hair-image"></div>
          </div>
          <div class="col-sm-5">
            <h3 id="hair-name"></h3>
            <p id="hair-barcode"></p>
            <p id="hair-price"></p>
            <p id="hair-qty"></p>
            <p id="hair-type"></p>
            <p id="hair-class"></p>
            <p id="hair-expiration-date"></p>
            <p id="hair-subname"></p>
            <p id="hair-size"></p>
            <p id="hair-weight"></p>
            <p id="hair-manufacturer"></p>
          </div>
        </section>
        <section class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p id="hair-description"></p>
            <button class="btn btn-danger btn-xs btn-close">Close</button>
          </div>
        </section>
      </div>
    </section>
    <section class="panel" id="hair-list">
      <section class="panel">
        <div class="panel-body">
          <div class="div-header">
            <h5>Hair Product List</h5>
          </div>
          <table id="product-hair-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
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
  $(document).ready(function () {
    hair_details();
    load_hair();
    update_hair();

    $('.btn-close').click(function(){
        $('#hair-details').addClass('hide');
        $('#hair-list').removeClass('hide');
    });

  });
  function hair_view_details(id){
    
    $('#hair-details').removeClass('hide');
    $('#hair-list').addClass('hide');
    $.ajax({
      url:'<?php echo base_url('web_setting/view_details');?>',
      type:'POST',
      dataType:'JSON',
      data:{id:id},
      success:function(data){
        $.each(data,function(index,data){
          $('#hair-name').html('<h2>Name :<strong>'+data.name+'</strong></h2>');
          $('#hair-price').html('<h2>Price :<strong>'+data.price+'</strong></h2>');
          $('#hair-image').html(data.image);
           $('#hair-barcode').html('<h4>Barcode :<strong>'+data.barcode+'</strong></h4>');
           $('#hair-qty').html('<h4>Quantity :<strong>'+data.qty+'</strong></h4>');
           $('#hair-type').html('<h4>Type :<strong>'+data.type+'</strong></h4>');
           $('#hair-class').html('<h4>Class :<strong>'+data.class+'</strong></h4>');
           $('#hair-expiration-date').html('<h4>Expiration Date :<strong>'+data.expire+'</strong></h4>');
           $('#hair-subname').html('<h4>Subname :<strong>'+data.sub+'</strong></h4>');
           $('#hair-size').html('<h4>Size :<strong>'+data.size+'</strong></h4>');
           $('#hair-weight').html('<h4>Size :<strong>'+data.weight+'</strong></h4>');
           $('#hair-manufacturer').html('<h4>Size :<strong>'+data.manufacturer+'</strong></h4>');
           $('#hair-description').html(data.manufacturer);
        });
      }
    });
  }

  function update_hair(){

    $('#frm-update-hair').submit(function(e){
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
              text:'Hair Product Description successfully updated.'
            });
          }
          hair_details();
          $('#hair-display').removeClass('hide');
          $('#hair-update').addClass('hide');
        }

      });
    });


    $('#btn-hair-close').click(function(){
      $('#hair-display').removeClass('hide');
      $('#hair-update').addClass('hide');
    });

    $('#btn-update-hair').click(function(){
      $('#hair-display').addClass('hide');
      $('#hair-update').removeClass('hide');
    });
  }

  function load_hair(){
    var h = $('#product-hair-table').dataTable({
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
      url: '<?php echo base_url('web_setting/get_product_hair')?>',
      dataType: 'json',
      type: 'post',
      data: {id: 2},
      success: function (data) {

        $.each(data, function (index, data) {

          h.fnAddData([
            data.check,
            '<img style="width:60px;" src="' + data.image + '">',
            data.name,
            data.price,
            data.action
          ]);
        });
      }
    });

  }


  function hair_details() {
    var type = 'hair products';
    $.ajax({
      url: '<?php echo base_url('web_setting/get_product_type')?>',
      dataType: 'json',
      type: 'POST',
      data:{type:type},
      success: function (data) {

        $.each(data, function (index, data) {
          $('#h-image').attr('src', data.image);
          $('#h-title').text(data.title);
          $('#hair-id').val(data.id);
          $('#h-description').text(data.description);
          $('#hair-description').text(data.description);
        });
      }
    });
  }
</script>