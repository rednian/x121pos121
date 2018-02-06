<section class="row">
<div class="col-sm-6 col-md-6">

  <div class=" panel">
    <div class="" style="background:#2A3F54;color:#FFF;padding:5px; margin-top: 5%">
      <b>Product Information</b>
    </div>
    <form action="<?php echo base_url('product_monitoring/add_product') ?>" method="post" id="monitoring-add-product" enctype="multipart/form-data" 
    class="form-horizontal">
      <div class="panel-body">
        <section class="row">
          <div class="col-md-12" style="border-right: solid #dddddd 1px">
          <div class="form-group">
            <label class="col-sm-2 control-label">Stock-in</label>

            <div class="col-sm-10">
              <div class="input-group">
                <select class="form-control" name="stock_in_type" id="stock_in_type">
                  <option value="" selected disabled>-- Choose Type --</option>
                </select>
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-plus"></span>
                      </button>
                    </span>
              </div>
            </div>
          </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Barcode</label>

              <div class="col-sm-10">
                <input name="barcode" id="barcode" type="text" class="form-control" autofocus="" autocomplete="off" >
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Quantity</label>

              <div class="col-sm-10">
                <input name="quantity" id="quantity" type="text" class="form-control input-sm"  autocomplete="off">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Packaging</label>

              <div class="col-sm-10">
                <input name="packaging" id="packaging" type="text" class="form-control input-sm"  autocomplete="off">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <section class="row">
                  <div class="col-sm-6">
                    <input name="name" id="name" type="text" class="form-control input-sm"
                      placeholder="product name"  autocomplete="off">
                  </div>
                  <div class="col-sm-6">
                    <input name="subname" id="subname" type="text" class="form-control input-sm"
                      placeholder="subname"  autocomplete="off">
                  </div>
                </section>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Type</label>

              <div class="col-sm-10">
                <div class="input-group">
                  <select class="form-control" name="type" id="type">
                    <option value="" selected disabled>-- Choose Type --</option>
                  </select>
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-plus"></span>
                        </button>
                      </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Class</label>

              <div class="col-sm-10">
                <div class="input-group">
                  <select class="form-control" name="prod_class" id="class">
                    <option value="" selected disabled>-- Choose Class --</option>
                  </select>
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-plus"></span>
                        </button>
                      </span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Weight</label>

              <div class="col-sm-10">
                <section class="row">
                  <div class="col-sm-4">
                    <input name="weight" id="weight" type="text" class="form-control input-sm"  autocomplete="off">
                  </div>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <select class="form-control input-sm" name="weight_type" id="weight_type">
                        <option value="" selected disabled>-- Choose Weight --</option>
                      </select>
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                          </button>
                        </span>
                    </div>
                  </div>
                </section>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Size</label>

              <div class="col-sm-10">
                <section class="row">
                  <div class="col-sm-4">
                    <input name="size" id="size" type="text" class="form-control input-sm"  autocomplete="off">
                  </div>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <select class="form-control input-sm" name="size_type" id="size_type">
                        <option value="" selected disabled>-- Choose Size --</option>
                      </select>
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                          </button>
                        </span>
                    </div>
                  </div>
                </section>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Manufactured</label>

              <div class="col-sm-10">
                <input name="manufactured" id="manufactured" type="date"
                  class="form-control input-sm date"  autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Expire</label>

              <div class="col-sm-10">
                <input name="expire" id="expire" type="date"
                  class="form-control input-sm date"  autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>

              <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
              </div>
            </div>

            <h4>Manufacturer Information</h4>
            <hr>

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input name="manufacturer" id="manufacturer" type="text"
                  class="form-control input-sm"  autocomplete="off">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Image</label>

              <div class="col-sm-10">
                <input name="price" id="image" type="hidden" value="0"> 
                <input name="bc_id" id="bc_id" type="hidden"> 
                <input name="image" id="image" type="file" class="form-control ">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2">
                <input name="submit" id="submit" value="Add New Product" type="submit"
                  class="btn btn-success btn-sm">
                <input name="button" id="submit" value="Cancel" type="reset"
                  class="btn btn-danger btn-sm">
              </div>
            </div>
          </div>
        </section>
      </div>
    </form>
  </div>
</div>
<div class="col-md-6">
  <section class="panel">
    <div class="" style="background:#2A3F54;color:#FFF;padding:5px; margin-top: 5%">
      <b>Product Information</b>
    </div>
    <div class="panel-body"></div>
  </section>
</div>
</section>
<script>
  $(document).ready(function(){
      is_barcode_exist();
  });

function is_barcode_exist(){

  $('#barcode').on('keyup change',function(){
    $.ajax({
      url:'<?php echo base_url('product_monitoring/is_barcode_exist');?>',
      data:{barcode:$(this).val()},
      dataType:'JSON',
      type:'POST',
      success:function(data){
        if(data != 0){
          $.each(data,function(index,data){

            $('#name').val(data.name).attr('readonly',true);
            $('#size').val(data.size).attr('readonly',true);
            $('#size_type').val(data.size_type).attr('readonly',true);
            $('#weight').val(data.weight).attr('readonly',true);
            $('#weight_type').val(data.weight_type).attr('readonly',true);
            $('#packaging').val(data.Packaging_type).attr('readonly',true);
            $('#type').val(data.type).attr('readonly',true);
            $('#class').val(data.class).attr('readonly',true);
            $('#subname').val(data.subname).attr('readonly',true);
            $('#expire').val(data.expire).attr('readonly',true);
            $('#manufacturer').val(data.manufacturer).attr('readonly',true);
            $('#manufactured').val(data.input).attr('readonly',true);
            $('#bc_id').val(data.bc_id);
          
            $('#description').html(data.description).attr('readonly',true);

          });
        }
        else{
          $('#bc_id').val('');
          $('#name').val('').removeAttr('readonly');
          $('#size').val('').removeAttr('readonly');
          $('#size_type').val('').removeAttr('readonly');
          $('#weight').val('').removeAttr('readonly');
          $('#weight_type').val('').removeAttr('readonly');
          $('#packaging').val('').removeAttr('readonly');
          $('#type').val('').removeAttr('readonly');
          $('#class').val('').removeAttr('readonly');
          $('#subname').val('').removeAttr('readonly');
          $('#expire').val('').removeAttr('readonly');
          $('#manufacturer').val('').removeAttr('readonly');
          $('#manufactured').val('').removeAttr('readonly');

          $('#description').html('').removeAttr('readonly');

        }


      }
    });
  });
}

</script>