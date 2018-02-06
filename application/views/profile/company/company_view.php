<section id="content" class="content">
  <!-- begin breadcrumb -->
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">Company Information</h1>
  <!-- end page-header -->
  
  <div class="row">
      <div class="col-md-6">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Company Details</h4>
                    </div> -->
                    <div class="panel-body">
                       <table class="table table-bordered">
                       						<tr>
                       							<td>Company Logo</td>
                       							<td>
                       								<form id="frm-upload" enctype="multipart/form-data" method="post" action="<?php echo base_url('company/upload'); ?>">
                       								<input type="file" name="image" id="upload" onchange="uploads();" style="width:50%">
                       								<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                       								</form>
                       								<img src="<?php echo base_url('uploads/'.$data['logo']); ?>" style="width:50px; height:50px; ">
                       								<script type="text/javascript">
                       									$(document).ready(function(){
                       										$('#frm-upload').on("submit", function(e){
                       											e.preventDefault();
                       											$.ajax({
                       											  url: $(this).attr('action'),
                       											  data: new FormData(this),
                       											  type: $(this).attr('method'),
                       											  contentType: false,
                       											  cache: false,
                       											  processData: false,
                       											  dataType: 'json',
                       											  success: function (data) {
                       											  if(data.sucess == true){
                       											
                       											  }
                       											   
                       											  }

                       											});
                       										});
                       									});
                       									function uploads(){
                       										$('#frm-upload').submit();
                       										
                       									}

                       								</script>
                       							</td>
                       						</tr>
                       						<tr>
                       							<td><strong>Store Name</strong></td>
                       							<td>
                       								<a class="editable editable-click" href="#" id="store-name"><?php echo ucwords($data['name']); ?></a>
                       									
                       							</td>
                       						</tr>
                       						<tr>
                       							<td>Address</td>
                       							<td>
                       								<a class="editable editable-click" href="#" id="address"><?php echo ucwords($data['address']); ?></a>
                       									
                       							</td>
                       						</tr>
                       						<tr>
                       							<td>Contact Number</td>
                       							<td><a class="editable editable-click" href="#" id="contact"><?php echo ucwords($data['phone']); ?></a>
                       								
                       							</td>
                       						</tr>
                       						<tr>
                       							<td>Postal Code</td>
                       							<td><a class="editable editable-click" href="#" id="postal"><?php echo ucwords($data['postal_code']); ?></a>
                       								
                       							</td>
                       						</tr>
                       						<tr>
                       							<td>TIN #</td>
                       							<td>
                       								<a class="editable editable-click" href="#" id="tin"><?php echo ucwords($data['tin_number']); ?></a>
                       									
                       							</td>
                       						</tr>
                       						<tr>
                       							<td>Email</td>
                       							<td><a class="editable editable-click" href="#" id="email"><?php echo strtolower($data['email']); ?></a>
                       								
                       							</td>
                       						</tr>
                       					</table>
                    </div>
                </div>
      </div>

      <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div> -->
                        <h4 class="panel-title">Receipt Details</h4>
                    </div>
                    <div class="panel-body">
                      <table class="table table-bordered">
                      						<tr>
                      							<td class="col-sm-4">Accreditation Date</td>
                      							<td class="col-sm-8>
                      							<a class="editable editable-click" href="#" id="accdtn_date"><?php echo $receipt['accdtn_date']; ?></a>
                      							</td>
                      						</tr>
                      						<tr>
                      							<td><strong>Accreditation Number</strong></td>
                      							<td>
                      								<a class="editable editable-click" href="#" id="accdtn_no"><?php echo $receipt['accdtn_no']; ?></a>
                      							</td>
                      						</tr>
                      						<tr>
                      							<td>Serial Number</td>
                      							<td>
                      								<a class="editable editable-click" href="#" id="serial"><?php echo strtoupper($receipt['sn']); ?></a>
                      							</td>
                      						</tr>
                      						<tr>
                      							<td>MIN</td>
                      							<td><a class="editable editable-click" href="#" id="min"><?php echo $receipt['min']; ?></a>
                      							</td>
                      						</tr>
                      						<tr>
                      							<td>SI</td>
                      							<td><a class="editable editable-click" href="#" id="si"><?php echo $receipt['si']; ?></a>
                      							</td>
                      						</tr>
                      						<tr>
                      							<td>Reciept Note</td>
                      							<td>
                      								<a class="editable editable-click" href="#" id="note"><?php echo $receipt['note']; ?></a>
                      							</td>
                      						</tr>
                      					</table>
                    </div>
                </div>
      </div>
  </div>
</section>

<script type="text/javascript">

	$(document).ready(function(){
		
		/*company information*/
		storeName();
		address();
		contact_number();
		postal();
		tin();
		email();

		/*receipt information*/

		note();
		si();
		min();
		serial();
		accdtn_no();
		accdtn_date();


	
	});

	function accdtn_date(){
		$('#accdtn_date').editable({
			emptytext:'Empty',
			type:'date',
			placement:'bottom',
			pk: 1,
			url :'<?php echo base_url('Company/accdtn_date'); ?>',
			title :'Enter Accredition Date',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}

	function accdtn_no(){
		$('#accdtn_no').editable({
			emptytext:'Empty',
			type:'text',
			pk: 1,
			url :'<?php echo base_url('Company/accdtn_no'); ?>',
			title :'Enter Accredition No',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}


	function serial(){
		$('#serial').editable({
			emptytext:'Empty',
			type:'text',
			pk: 1,
			url :'<?php echo base_url('Company/serial'); ?>',
			title :'Enter Receipt Serial Number',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}


	function min(){
		$('#min').editable({
			emptytext:'Empty',
			type:'text',
			pk: 1,
			url :'<?php echo base_url('Company/min'); ?>',
			title :'Enter Receipt MIN',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}

	function si(){
		$('#si').editable({
			emptytext:'Empty',
			type:'text',
			pk: 1,
			url :'<?php echo base_url('Company/si'); ?>',
			title :'Enter Receipt SI',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}



	function note(){
		$('#note').editable({
			emptytext:'Empty',
			type:'textarea',
			pk: 1,
			url :'<?php echo base_url('Company/note'); ?>',
			title :'Enter Receipt Note',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}


	/*company information*/
	function email(){
		$('#email').editable({
			emptytext:'Empty',
			pk: 1,
			url :'<?php echo base_url('Company/email'); ?>',
			title :'Enter Tax Identification Number',
		 success: function(response, newValue) {
		   if (response == 1) {
		
		   }
		 }
		});
	}


	function tin(){
		$('#tin').editable({
			emptytext:'Empty',
			pk: 1,
			url :'<?php echo base_url('Company/tin_number'); ?>',
			title :'Enter Tax Identification Number',
		 success: function(response, newValue) {
		   if (response == 1) {

		   }
		 }
		});
	}

	function postal(){
		$('#postal').editable({
			emptytext:'Empty',
			pk: 1,
			url :'<?php echo base_url('Company/postal_code'); ?>',
			title :'Enter Postal Code',
		 success: function(response, newValue) {
		   if (response.success) {
		   }
		 }
		});
	}

	function contact_number(){
		$('#contact').editable({
			emptytext:'Empty',
			pk: 1,
			url :'<?php echo base_url('Company/phone'); ?>',
			title :'Enter Contact Number',
		 success: function(response, newValue) {
		   if (response.success) {
		   }
		 }
		});
	}

	function address(){
		$('#address').editable({
			emptytext:'Empty',
			pk: 1,
			url :'<?php echo base_url('Company/address'); ?>',
			title :'Enter address',
		 success: function(response, newValue) {
		   if (response.success) {
		   }
		 }
		});
	}

	function storeName(){
		$('#store-name').editable({
			emptytext:'Empty',
			pk: 1,
			url :'<?php echo base_url('Company/store_name'); ?>',
			title :'Enter Store name',
		 success: function(response, newValue) {
		   if (response.success) {
		   }
		 }
		});
	}
</script>