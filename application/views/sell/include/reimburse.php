<div class="modal fade" tabindex="-1" role="dialog" id="reimburse-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      
        <h4 class="modal-title"><strong>Reimbursement</strong></h4>
        
      </div>
      <div class="modal-body">
       <section class="panel">
         <div class="panel-body">
         <section class="row">
           <div class="col-sm-5">
             <div class="form-group">
               <input id="code"  class="form-control" name="code" list="code-list" autocomplete="off" placeholder="Enter Trasaction Code" autofocus="">
             </div>
             <datalist id="code-list"></datalist>
           </div>
         <div class="col-sm-7">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Enter Barcode" id="barcode" autocomplete="off">
              <span class="input-group-btn">
                <button  id="btn-search-barcode" class="btn btn-success" type="button"><span class=" fa fa-search"></span></button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
         </section>
         <div class="page-header"></div>
         <section class="row">
           <div class="col-sm-12">
             <table id="reimburse-table" class="table">
               <thead>
                  <th>Purchased Date</th> 
                  <th>Code</th>
                  <th>Barcode</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Purchased Qty</th>
                  <th>Returned Qty</th>
                  <th>Actions</th>
               </thead>
             </table>
           </div>
         </section>
         </div>
       </section>
      </div>
      <div class="modal-footer">
        <section class="row">
          <div class="col-md-6 col-sm-6 col-xs-12"></div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <section class="panel">
              <div class="panel-body">
                <div class="div-header">
                  <h1 class="clearfix"><strong class="pull-left">Amount Reimburse :</strong><strong id="total-refund" class="pull-right"></strong></h1>
                </div>
              </div>
            </section>
          </div>
        </section>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-reimburse-all" class="btn btn-success">Reimburse</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
  $(document).ready(function(){



      var oTable = $('#reimburse-table').dataTable({
        select:true,
        destroy: true,
        "bPaginate": false,
        "bFilter": false,
        "bInfo": false,
        "bSort": false
      });

      $('#btn-search-barcode').click(function(){
        search_reimburse(oTable);
    });
    $('#barcode').on('change',function(){
     search_reimburse(oTable);
    });

     
      get_transcode();
      barcode_list();
      search_reimburse(oTable);
      get_product(oTable);


  });

   function save_reimburse(id){
      $.ajax({
        url:'<?php echo base_url('sell/reimburse'); ?>',
        data:{id:id},
        type:'POST',
        dataType:'JSON',
        success:function(data){
  
        }
     });
  }

  function update_return(data){
    
    var id = $(data).attr('data-id');
    var qty = $(data).val();
     $.ajax({
       url:'<?php echo base_url('sell/update_reimburse'); ?>',
       data:{id:id, qty: qty},
       type:'POST',
       dataType:'JSON',
       success:function(data){
       // alert(data);
            get_product();
          
       }
    });
  }

  function remove_reimburse(id){
    $.ajax({
       url:'<?php echo base_url('sell/remove_reimburse'); ?>',
       data:{id:id},
       type:'POST',
       dataType:'JSON',
       success:function(data){
       
            get_product();
          
       }
    });
  }

  function get_product(table){
    $.ajax({
       url:'<?php echo base_url('sell/get_product'); ?>',
       dataType:'JSON',
       success:function(data){
         // table.fnClearTable();
        if (data) {
          $.each(data, function(index, data){
            table.fnAddData([data.date, data.code, data.barcode, data.description, data.price, data.qty,data.input_qty, data.action]);
             $('#total-refund').html(data.total);
          });

        }
       }
    });
  }

  function search_reimburse(table){


        $.ajax({
          url:'<?php echo base_url('sell/search_reimburse'); ?>',
          data:{code:$('#code').val(), barcode:$('#barcode').val()},
          type:'POST',
          dataType:'JSON',
          success:function(data){
          if(data == 1){ get_product(table);}     
          }
        });
    

   
  }

  function barcode_list(){
    
    // $('#btn-reimburse-all').click( function() {
    //        var data = oTable.$('input, select').serialize();
    //        alert(
    //            "The following data would have been submitted to the server: \n\n"+
    //            data.substr( 0, 120 )+'...'
    //        );
    //        return false;
    //    } );
  }

  function get_transcode(){
    $.ajax({
      url:'<?php echo base_url('sell/get_trans'); ?>',
      dataType:'JSON',
      success:function(data){
        $.each(data, function(index, data){
          $('#code-list').append('<option value="'+data.code+'">');
        });
      }
    });
  }
</script>