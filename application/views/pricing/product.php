<div class="right_col" role="main">
  <ol class="breadcrumb pull-right">
    <li><?php echo anchor('dashboard' , 'Dashboard'); ?></li>
    <li><a href="#">Profile</a></li>
    <li><?php echo anchor('customer' , 'Customer Information'); ?></li>
  </ol>
  <section class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><span class="glyphicon glyphicon-list-alt"></span> <?php echo $heading; ?></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                  class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <a href="<?php echo base_url('product/add_product') ?>" class="btn btn-success btn-sm "><span
              class="fa fa-user-plus"></span> Add Product</a>

          <div class="row">
            <div class="col-md-4" id="update">
              <div>
                <div class="x_title">
                  <h2>Add Price</h2>

                  <div class="clearfix"></div>
                </div>
                <div class="img-container img-thumbnail" style="height: 200px;">
                  <img src="" id="image" class="img-thumbnail img-responsive" alt="">
                </div>
                <form  method="post" action="<?php echo base_url('product_pricing/update') ?>" class="form-horizontal" id="pricing">
                  <div class="form-group">
                    <label for="" class="col-sm-4">Barcode</label>

                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control" name="barcode" id="barcode">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4">Price</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="price" id="price" autocomplete="off" autofocus value="" placeholder="0.00">
                      <input type="hidden" class="form-control" name="id" id="id">
                      <input type="hidden" class="form-control" name="bc_id" id="bc_id">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4">Mark-up(%)</label>

                    <div class="col-sm-8">
                      <input autocomplete="off" type="text" class="form-control" name="mark_up" id="mark_up" placeholder="any whole number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4">Sold price</label>

                    <div class="col-sm-8">
                      <input type="text" autocomplete="off" class="form-control" readonly="" name="sold_price" id="sold-price" placeholder="0.00">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4"></label>

                    <div class="col-sm-8">
                      <input type="submit" class="btn btn-success btn-sm" name="submit" value="Save Changes">
                      <input type="reset" class="btn btn-danger btn-sm" name="reset" value="Clear">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-8" id="pricing">
              <div class="x_title">
                <h2>Product Unprice List</h2>

                <div class="clearfix"></div>
              </div>
              <table id="prices" class="table jambo_table">
                <thead>
                <tr class="headings">
                  <th>Product</th>
                  <th class="col-sm-2">Barcode</th>
                  <th>Type</th>
                  <th>Class</th>
                  <th class="col-sm-1">Action</th>
                </tr>
                </thead>
                >
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>

  $(document).ready(function () {
    display();

    $('#pricing').formValidation({
      message: 'This value is not valid',
      //live: 'disabled',
      icon: {
//        valid: 'glyphicon glyphicon-ok',
//        invalid: 'glyphicon glyphicon-remove',
        validating: 'fa fa-refresh fa-spin'
      },
      fields: {
        price: {
          validators: {
            notEmpty: {
              message: 'The price is required and cannot be empty'
            },
            // regexp: {
            //   regexp: /^[a-zA-Z]+$/,
            //   message: 'The product name can only consist of alphabetical'
            // }
          }
        },
        mark_up: {
          validators: {
            notEmpty: {
              message: 'The mark-up price is required and cannot be empty'
            }
            // regexp: {
            //   regexp: /^[a-zA-Z]+$/,
            //   message: 'The product name can only consist of alphabetical'
            // }
          }
        }
      }/*end of fields*/
    }).on('success.form.fv', function (e) {
      e.preventDefault();
      var $form = $(e.target);

      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        dataType: 'html',
        data: $(this).serialize(),
        success: function (data) {
          if (data == 1) {
            display();
            new PNotify({
              type: "success",
              text: " Price Successfully Updated."
            });

            $('#barcode').val(' ');
            $('#sold-price').val(' ');
            $('img#image').attr('src','');
            $form
              .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
              .formValidation('resetForm', true);
          }
        }
      });


    });


    /*display the calculated price when mark-up inputted*/
    $('#mark_up').keyup(function () {
      var price = $('#price').val();
      var mark_up = $('#mark_up').val();
      var result = price * (mark_up / 100);
      result = parseFloat(result) + parseFloat(price);

      $('#sold-price').val(result);
    });
    /*display the calculated price when price inputted*/
    $('#price').keyup(function () {
      var price = $('#price').val();
      var mark_up = $('#mark_up').val();
      var result = price * (mark_up / 100);
      if(isNaN(result)){
        result = 0.00;
      }
      if(isNaN(price)){
        price = 0.00;
      }
      result = parseFloat(result) + parseFloat(price);
      $('#sold-price').val(result);
    });



  });



  function display() {

    var oTable = $('#prices').dataTable({
      destroy: true,
//      "bPaginate": false,
      "bFilter": false,
      "bInfo": false,
      "bSort": false,
      "oLanguage": {
        "sSearch": "Search:"
      },
      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    });

    $.ajax({
      url: '<?php echo base_url('product_pricing/get_unprice')?>',
      dataType: 'json',
      success: function (data) {
        oTable.fnClearTable();

        $.each(data, function (index, data) {
          oTable.fnAddData([data.product, data.barcode,data.type, data.class, data.action]);
        });
      }
    });


  }


  function get_unprice(id) {
    $.ajax({
      url: '<?php echo base_url('product_pricing/get_unprice_product')?>',
      dataType: 'json',
      type: 'GET',
      data: {id:id},
      success: function (data) {
        console.log(data);
        $.each(data, function (index, data) {
          $('#price').val(data.price);
          $('#id').val(data.id);
          $('#bc_id').val(data.bc_id);
          $('#barcode').val(data.barcode);
          $('#vat').val(data.vat);
          $('img#image').attr('src', "<?php echo base_url('uploads')?>" + '/' + data.image);
        });
      }
    });


  }

</script>

