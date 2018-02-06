<style type="text/css">
  td span.details-control {
      background: url('<?php echo base_url('assets/images/datatable-images/details_open.png'); ?>') no-repeat center center;
      cursor: pointer;
  }
  tr.shown td.details-control {
      background: url('<?php echo base_url('assets/images/datatable-images/details_close.png'); ?>') no-repeat center center;
  }
</style>
<section class="row"  style="margin-top: 3%">
  <!-- <div class="col-md-5 col-sm-5 col-xs-12">
    <section class="panel">
      <div class="panel-body">
        <div class="div-header">
          <h5>Company Location Setting</h5>
        </div>
      </div>
    </section>
  </div> -->
  <div class="col-md-12 col-sm-12 col-xs-12">
    <section class="panel">
      <div class="panel-body">
        <div class="div-header">
          <h5>Client Feedbacks</h5>
        </div>
        <table id="feedback-list" class="table table-striped table-bordered display">
          <thead>
            <tr>
              <th></th>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Comments</th>
              <th class="col-sm-1 col-md-1 col-xs-1">Actions</th>
            </tr>
          </thead>
        </table>
      </div>  
    </section>
  </div>
</section>
<script type="text/javascript">
  $(document).ready(function(){

  


    // $('#feedback-list').on('click', 'td.details-control', function () {
    //      var tr = $(this).closest('tr');
    //      var row = table.row( tr );
    
    //      if ( row.child.isShown() ) {
    //          // This row is already open - close it
    //          row.child.hide();
    //          tr.removeClass('shown');
    //      }
    //      else {
    //          // Open this row
    //          row.child( format(row.data()) ).show();
    //          tr.addClass('shown');
    //      }
    //  } );


   
      load();

 

 
  });

  function delete_data(id){

    $.ajax({
      url:'<?php echo base_url('web_setting/delete_feedback'); ?>',
      data:{id:id},
      type:'POST',
      dataType:'html',
      success:function(data){
          if(data == 1){
            new PNotify({
              type:'success',
              text:'Feedback successfully deleted'
            });
            load();
          } 
      }
    });

  }

  function load(){

    var oTable = $('#feedback-list').DataTable({
      destroy:true,
      sort:false,
     "columnDefs": [
       { className: "details-control", "targets": [ 0 ] }
     ]
    });

  
      $.ajax({
      url:'<?php echo base_url('web_setting/contact_us_list'); ?>',
      dataType:'JSON',
      success:function(data){

        oTable.fnClearTable();

        $.each(data, function(index,data){

        oTable.fnAddData(['', data.number, data.name, data.email, data.subject, data.message, data.action]);

        });

      }
    });
  }

  // function format ( d ) {
  //   alert('data');
  //     // `d` is the original data object for the row
  //     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
  //         '<tr>'+
  //             '<td>Full name:</td>'+
  //             '<td>'+d.name+'</td>'+
  //         '</tr>'+
  //         '<tr>'+
  //             '<td>Extension number:</td>'+
  //             '<td>'+d.extn+'</td>'+
  //         '</tr>'+
  //         '<tr>'+
  //             '<td>Extra info:</td>'+
  //             '<td>And any further details here (images etc)...</td>'+
  //         '</tr>'+
  //     '</table>';
  // }
</script>