<section class="row" style="margin-top: 3%">
  <div class="col-sm-6 col-md-4">
    <section class="panel" id="facial-display">
      <div class="panel-body">
        <div class="div-header">
          <h5 id="f-title"></h5>
        </div>
        <div class="thumbnail">
          <img id="f-image" src="" alt="" style="display: block; height: 250px; width: 100%"/>

        </div>
        <p  class="text-justify">
          <button id="btn-update-facial" class="btn btn-default btn-xs" role="button"><span class="glyphicon
          glyphicon-pencil"></span></button>
          <span id="f-description"></span>
        </p>

      </div>
    </section>
    <section class="panel hide" id="facial-update">
      <div class="panel-body">
        <div class="div-header">
          <h5>Update Facial Description</h5>
        </div>
        <form id="frm-update-facial" enctype="multipart/form-data" action="<?php echo base_url
        ('web_setting/product_tab'); ?>"
          method="post">
          <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="facial-description" cols="30" rows="10" class="form-control"
              style="min-height: 300px"></textarea>
          </div>
          <div class="form-group">
            <label for="">image</label>
            <input type="file" name="image" id="" class="form-control input-sm"/>
            <input type="hidden" name="id" id="facial-id"/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-sm btn-success" value="Save Changes"/>
            <button type="button" class="btn btn-sm btn-default" id="btn-facial-close">Close</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <div class="col-md-8">
    <section class="panel hide" id="facial-details">
      <div class="panel-body">
        <div class="div-header">
          <h5>Facial Product Details</h5>
        </div>
        <section class="row">
          <div class="col-sm-7">
            <div id="facial-image"></div>
          </div>
          <div class="col-sm-5">
            <h3 id="facial-name"></h3>
            <p id="facial-barcode"></p>
            <p id="facial-price"></p>
            <p id="facial-qty"></p>
            <p id="facial-type"></p>
            <p id="facial-class"></p>
            <p id="facial-expiration-date"></p>
            <p id="facial-subname"></p>
            <p id="facial-size"></p>
            <p id="facial-weight"></p>
            <p id="facial-manufacturer"></p>
          </div>
        </section>
        <section class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p id="facial-description"></p>
            <button class="btn btn-danger btn-xs btn-close">Close</button>
          </div>
        </section>
      </div>
    </section>
    <section class="panel" id="facial-list">
      <div class="panel-body">
        <div class="div-header">
          <h5>Facial Product List </h5>
        </div>
        <table id="product-facial-table" class="table  responsive-utilities jambo_table" style="margin-top: 5%;">
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

  </div>
</section>
<script>
  $(document).ready(function () {

    facial_details();
    display_facial();
    update_facial();

  });

  function facial_view_details(id){
    
    $('#facial-details').removeClass('hide');
    $('#facial-list').addClass('hide');
    $.ajax({
      url:'<?php echo base_url('web_setting/view_details');?>',
      type:'POST',
      dataType:'JSON',
      data:{id:id},
      success:function(data){
        $.each(data,function(index,data){
          $('#facial-name').html('<h2>Name :<strong>'+data.name+'</strong></h2>');
          $('#facial-price').html('<h2>Price :<strong>'+data.price+'</strong></h2>');
          $('#facial-image').html(data.image);
           $('#facial-barcode').html('<h4>Barcode :<strong>'+data.barcode+'</strong></h4>');
           $('#facial-qty').html('<h4>Quantity :<strong>'+data.qty+'</strong></h4>');
           $('#facial-type').html('<h4>Type :<strong>'+data.type+'</strong></h4>');
           $('#facial-class').html('<h4>Class :<strong>'+data.class+'</strong></h4>');
           $('#facial-expiration-date').html('<h4>Expiration Date :<strong>'+data.expire+'</strong></h4>');
           $('#facial-subname').html('<h4>Subname :<strong>'+data.sub+'</strong></h4>');
           $('#facial-size').html('<h4>Size :<strong>'+data.size+'</strong></h4>');
           $('#facial-weight').html('<h4>Size :<strong>'+data.weight+'</strong></h4>');
           $('#facial-manufacturer').html('<h4>Size :<strong>'+data.manufacturer+'</strong></h4>');
           $('#facial-description').html(data.manufacturer);
        });
      }
    });
  }



  function update_facial(){

    $('#frm-update-facial').submit(function(e){
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
              text:'Facial Product Description successfully updated.'
            });
          }
          facial_details();
          $('#facial-display').removeClass('hide');
          $('#facial-update').addClass('hide');
        }

    });
    });


    $('#btn-facial-close').click(function(){
      $('#facial-display').removeClass('hide');
      $('#facial-update').addClass('hide');
    });

    $('#btn-update-facial').click(function(){
      $('#facial-display').addClass('hide');
      $('#facial-update').removeClass('hide');
    });
  }

  function display_facial(){
    var facial = $('#product-facial-table').dataTable({
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
      url: '<?php echo base_url('web_setting/get_product_facial')?>',
      dataType: 'json',
      type: 'post',
      data: {id: 1},
      success: function (data) {

        $.each(data, function (index, data) {

          facial.fnAddData([
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
 

  function facial_details() {
    var type = 'facial products';
    $.ajax({
      url: '<?php echo base_url('web_setting/get_product_type')?>',
      dataType: 'json',
      type: 'POST',
      data: {type: type},
      success: function (data) {
        $.each(data, function (index, data) {
          $('#f-image').attr('src', data.image);
          $('#f-title').text(data.title);
          $('#f-description').html(data.description);

          $('#facial-id').val(data.id);
          $('#facial-description').text(data.description);
        });
      }
    });
  }
</script>