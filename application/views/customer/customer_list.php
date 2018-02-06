<section id="content" class="content">
  <div class="pull-right">
  <a href="<?php echo base_url('customer/new_customer') ?>" class="btn btn-success btn-sm pull-right"><span
      class="fa fa-user-plus"></span> Add Customer</a>
  </div>
  <h1 class="page-header">Customer List
 <!--    <small>header small text goes here...</small> -->
  </h1>
  <!-- end page-header -->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title"></h4>
        </div>
        <div class="panel-body">
         <section class="row">
             <div class="col-md-12">
               <div class="panel">
                 <div class="div-header">
                   <h5>Customer List</h5>
                 </div>
                 <table id="user-list" class="table table-bordered table-sochic">
                   <thead>
                   <tr class="headings">
                     <th class="text-center">
                       Name
                       <div>( lastname, firstname )</div>
                     </th>
                     <th class="text-center">
                       Contact Number
                       <div>( Phone / Mobile )</div>
                     </th>
                     <th class="text-center">
                       Address
                       <div>( block #, lot #, street, brgy, city, province, country, zip code )</div>
                     </th>
         <!--            <th>Actions</th>-->
                   </tr>
                   </thead>

                 </table>
               </div>

             </div>
           </section>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function () {
    customer_list();

  });

  function customer_list() {
    var oTable = $('#user-list').dataTable({
      destroy: true,
      'bSort': false,
      "oLanguage": {
        "sSearch": "Search Customer:"
      },
      'iDisplayLength': 12,
      "sPaginationType": "full_numbers",
      "dom": 'T<"clear">lfrtip',
      "tableTools": {
        "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
      }
    });

    $.ajax({
      url: '<?php echo base_url('customer/customer_list'); ?>',
      dataType: 'JSON',
      success: function (data) {

        $.each(data, function (index, data) {
          oTable.fnAddData([data.name, data.contact, data.address]);
        })
      },
      beforeSend: function () {

      }
    });
  }

</script>

