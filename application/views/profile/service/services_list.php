<?php $this->load->view('profile/service/add-service-dialog'); ?>
<?php $this->load->view('profile/service/update-service-dialog'); ?>


<?php $this->load->view('profile/service/view-detail-service-dialog'); ?>

<?php $this->load->view('profile/service/add-service-type-dialog'); ?>
<?php $this->load->view('profile/service/add-service-class-dialog'); ?>

<!-- package -->
<?php $this->load->view('profile/service/add-service-package-dialog'); ?>
<?php $this->load->view('profile/service/update-service-package-dialog'); ?>
<?php $this->load->view('profile/service/detail-service-package-dialog'); ?>

<section id="content" class="content">
  <!-- begin breadcrumb -->
  <div class="pull-right">
    <a href="#add-service-dialog" data-toggle="modal" class="btn btn-success btn-sm"> 
      <span class="fa fa-plus"></span> Add New Service
    </a>
    <a href="#add-service-package-dialog" data-toggle="modal" class="btn btn-success btn-sm">
      <span class="fa fa-plus"></span> Add Service Package
    </a>
  </div>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Services Offered</h1>
  <!-- end page-header -->
  

  <div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><strong>Services</strong></a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><strong>Packages</strong></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        
        <table id="service-list" class="table table-bordered flat table-sochic">
          <thead>
          <tr class="headings">
            <th > Name</th>
            <th > Price</th>
            <th > Type</th>
            <th > Class</th>
            <th > Status</th>
            <th >Description</th> 
            <th >Actions</th>
          </tr>
          </thead>
        </table>

      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
      <table id="service-package-table" class="table table-bordered table-sochic">
        <thead>
        <tr class="headings">
          <th >Package Name</th>
          <th >Price</th>
          <th >Type</th>
          <th >Description</th> 
          <th class="col-xs-8">Actions</th>
        </tr>
        </thead>
      </table>
      </div>
    </div>

  </div>


</section>


<script>




function delete_package(id) {

  (new PNotify({
         title: 'Confirmation Needed',
         type:'warning',
         text: 'Are you sure you want to delete?',
         icon: 'fa fa-question-sign',
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
      url:'<?php echo base_url('services/delete_package'); ?>',
      data:{id:id},
      type:'POST',
      success:function(data) {
        if(data == 1){

          $('#service-package-table').DataTable().ajax.reload();

          new PNotify({
            type:'success',
            text:'Package deleted.'
          });
        }
      }
    });

     }).on('pnotify.cancel', function() {
       /*close the notify*/
     });

}


  $(document).ready(function () { 


    /*---------------------------------------*/
    /*                   package             */
    /*---------------------------------------*/



    var package_table = $('#service-package-table').DataTable({
     ajax:{
       url:'<?php echo base_url('services/packages'); ?>',
       cache:true,
     },

     destroy:true,
         columns: [
               
              { "data": "package" },
              { "data": "price" },
              { "data": "type" },
              { "data": "description" },
              { "data": "action" },

          ]
    
    
     });

    $('#service-package-table tbody').on('click', 'td.details-control', function () {
           var tr = $(this).closest('tr');
           var row = table.row(tr);
    
           if ( row.child.isShown() ) {
               // This row is already open - close it
               row.child.hide();
               tr.removeClass('shown');
           }
           else {
               // Open this row
               row.child( format(row.data()) ).show();
               tr.addClass('shown');
           }
       } );



    /*---------------------------------------*/
    /*                      services             */
    /*---------------------------------------*/

   var table = $('#service-list').DataTable({
    destroy:true,
    stateSave:true,
    ajax:{
      url:'<?php echo base_url('services/service_list'); ?>',
      cache:true,
    },
    columns: [
          
         { "data": "service" },
         { "data": "price" },
         { "data": "type" },
         { "data": "class" },
         { "data": "status" },
         { "data": "description" },
         { "data": "action" },
     ]
   
    });




  });



  function delete_service(id){
   (new PNotify({
          title: 'Confirmation Needed',
          type:'warning',
          text: 'Are you sure you want to delete?',
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
              url:'<?php echo base_url('services/delete') ?>',
              data:{id:id},
              type:'POST',
              dataType:'html',
              success:function(data){

                if(data == 1){

                   $('#service-list').DataTable().ajax.reload();
              
                new PNotify({
                     type: "success",
                     text: "Service successfully deleted."
                  });
                }

              }
            })
      }).on('pnotify.cancel', function() {
        /*close the notify*/
      });
  }

</script>