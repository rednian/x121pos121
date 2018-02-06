<div class="right_col" role="main">
  <ol class="breadcrumb pull-right">
    <li><?php echo anchor('dashboard', 'Dashboard'); ?></li>
    <li><a href="#">Profile</a></li>
    <li><?php echo anchor('customer', 'Customer Information'); ?></li>
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
          <a href="<?php echo base_url('services/create_new_service') ?>" class="btn btn-success btn-sm "><span
              class="fa fa-user-plus"></span> Add Service</a>

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
                <form action="<?php echo base_url('service_pricing/update_price');?>" class="form-horizontal" method="post" id="frm-service-pricing">
                  <div class="form-group">
                    <label for="" class="col-sm-3">Name</label>
                    <div class="col-sm-9">
                      <input type="text" readonly class="form-control" name="name" id="name" >
                      <input type="hidden" readonly class="form-control" name="service_id" id="service_id" >
                      <input type="hidden" readonly class="form-control" name="pricing_id" id="pricing_id" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3">Price</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="price" id="price" autocomplete="off" autofocus="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-9">
                      <input type="submit" class="btn btn-success btn-sm" name="submit" value="save changes">
                      <input type="reset" class="btn btn-danger btn-sm" name="submit" value="close">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-8" id="pricing">
              <div class="x_title">
                <h2>Service Unprice List</h2>
                <div class="clearfix"></div>
              </div>
              <table id="prices" class="table jambo_table">
                <thead>
                <tr class="headings">
                  <th>Services</th>
                  <th>Type</th>
                  <th>Class</th>
                  <th class="col-xs-1">Action</th>
                </tr>
                </thead>
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
    $('#frm-service-pricing').formValidation({
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
            regexp: {
               regexp: /^\d+(\.\d{1,3})?$/,
               message: 'The price can only consist of number and 3 decimal places'
            }
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
            new PNotify({
              type: "success",
              text: " Price Successfully Updated."
            });
            $('#image').html('');
            $('#name').val('');
            display();
            $form
              .formValidation('disableSubmitButtons', false)  // Enable the submit buttons
              .formValidation('resetForm', true);
          }
          else{
            alert(data);
          }

        }
      });


    });


    });



  /*get the id if button is click*/
  function get_id(id){
    $.ajax({
      url: '<?php echo base_url('service_pricing/get_selected')?>',
      data: {id:id},
      dataType: 'json',
      type: 'GET',
      success: function (data) {
        $.each(data,function(index,data){
          $('#image').html(data.image);
          $('#name').val(data.name);
          $('#service_id').val(data.service_id);
          $('#pricing_id').val(data.pricing_id);
        });
      }
    });
  }

  function display(){
    var oTable = $('#prices').dataTable({
      destroy: true,
//      "bPaginate": false,
      "bFilter": false,
      "bInfo": false,
      "bSort": false,
      "oLanguage": {
        "sSearch": "Search:"
      },
      "aoColumnDefs": [
        {
          'bSortable': false,
          'aTargets': [0]
        } //disables sorting for column one
      ],
      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    });

    $.ajax({
      url: '<?php echo base_url('service_pricing/unprice_services')?>',
      dataType: 'json',
      type: 'GET',
      success: function (data) {
        oTable.fnClearTable();
        $.each(data,function(index,data){
          oTable.fnAddData([data.service, data.type, data.class, data.action]);
        });
      }
    });
  }


</script>

