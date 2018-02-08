<?php $this->load->view('profile/product/add-product-dialog'); ?>
<?php $this->load->view('profile/product/update-product-dialog'); ?>
<?php $this->load->view('profile/product/add-qty-dialog'); ?>
<?php $this->load->view('profile/product/remove-qty-dialog'); ?>


<?php $this->load->view('/profile/product/modal/create_product_weight'); ?>
<?php $this->load->view('/profile/product/modal/create_product_size'); ?>
<?php $this->load->view('/profile/product/modal/create_product_type'); ?>
<?php $this->load->view('/profile/product/modal/create_product_class'); ?>


<div id="content" class="content">
  <div class="pull-right">
    <!-- <a href="<?php echo base_url('product/add_product') ?>" class="btn btn-success pull-left btn-sm ">Register New Product</a> -->
    <a href="#add-product-dialog" data-toggle="modal" class="btn btn-success pull-left btn-sm "><span class="fa fa-plus"></span> Register Product</a>
  </div>
  <h1 class="page-header"><span class=" "></span> <?php echo $heading; ?> 
    <!-- <small> header small text goes here...</small> -->
  </h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                   
                        <h4 class="panel-title">
                         
                        </h4>
                    </div>
                    <div class="panel-body">
                      
                       <section class="row">
                         <div class="col-md-12">
                           <table id="product-list" class="table table-bordered table-print table-sochic">
                             <thead>
                             <tr class="headings">
                               <th>Barcode</th>
                               <th>Product</th>
<!--                               <th>Class</th>-->
                               <th>Quantity</th>
                               <th>Price</th>
                               <th>Contact Number/ Email</th>
                               <th>Expiration</th>
                               <th>Status</th>
                               <th class="col-xs-2">Actions</th>
                             </tr>
                             </thead>
                           </table>
                         </div>
                       </section>
                    </div>
                </div>
      </div>
  </div>
</div>

<script>
  $(document).ready(function () {



     var table = $('#product-list').DataTable({
      ajax:{
        url:'<?php echo base_url('product/prod_list'); ?>',
        cache:true
      },
      destroy: true,
      // stateSave:true,
          columns:[
          {'data':'barcode'},
          {'data':'name'},
//          {'data':'class'},
          {'data':'qty'},
          {'data':'price'},
          {'data':'contact'},
          {'data':'expire'},
          {
            'data':'status',
            render:function(status){

              var class_name = '';
              var status1 = ''; 

              if(status === 'no'){
                class_name = 'label-default';
              status1 = 'Consumable';
              }
              else{
                class_name = 'label-success';
                status1 = 'Selling';
              }

              return '<span class="label '+class_name+'">'+status1+'</span>';
            }
          },
          {'data':'action'}
          ],
          fnRowCallback:function(row, column, iDisplayIndex, iDisplayIndexFull){

              if ( column.qty < 1  ){
                 $(row).addClass('danger');
               }

            if ( column.qty > 0 && column.qty < 20  ){
               $(row).addClass('warning');
             }
          }
     });


});

 

  function view_product(id){
    location.href  = '<?php echo base_url('product/details').'/' ?>'+id;
  }

  function remove_product(id){
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
             url:'<?php echo base_url('product/delete_product') ?>',
             data:{id:id},
             type:'POST',
             dataType:'html',
             success:function(data){

              if(data == 1){

                new PNotify({
                  type:'success',
                  text:'Product deleted.'
                });

              
              $('#product-list').DataTable().ajax.reload();

              }



             }
           });


     }).on('pnotify.cancel', function() {
       /*close the notify*/
     });
}


</script>

