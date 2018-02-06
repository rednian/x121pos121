<section class="right_col" role="main">
	<section class="row">
		<div class="col-md-12">
			<a href="<?php echo base_url('reports/sales_reports'); ?>" class="btn btn-sm btn-success pull-right ">back to trasactions report</a>
			<div class="clearfix"></div>
			<div class="div-header">
				<h2>Transaction Detail Report</h2>
			</div>
			<table id="product-report" class="table table-striped table-bordered" style="margin-top: 5%;">
			  <thead>
			 <tr style="border-bottom:1px solid #ddd;">
			    <th>Barcode</th>
			    <th>Description</th>
			    <th>Original Price</th>
			    <th>Markup</th>
			    <th>Retail Price</th>
			    <th>Quantity</th>
			    <th>Tax</th>
			    <th>Discount</th>
			    <th>Total Amount</th>
			    <th>Profit</th>
			  </tr>
			  </thead>
			  <tbody>
			  		<?php
			  $discount_total = $profit_total = $grand_total = $total = $income = $qty =  0;

			  		foreach ($data as $temp) { 

			  			$total = product_retail($temp->price, $temp->mark_up, $temp->vat)*$temp->quantity;

			  			$income = $temp->mark_up * $temp->quantity;

			  			$grand_total += $total;

			  			$profit_total += $income;

			  			$qty += $temp->quantity;
			  			?>
			  		 	<tr>
			  		 		<td><?php echo html_escape($temp->barcode); ?></td>
			  		 		<td><?php echo html_escape(ucwords($temp->prod_name)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($temp->price + $temp->vat,2)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($temp->mark_up,2)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($temp->mark_up + $temp->price + $temp->vat,2)); ?></td>
			  		 		<td><?php echo html_escape(number_format($temp->quantity)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($temp->vat,2)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($temp->discount,2)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($total,2)); ?></td>
			  		 		<td><?php echo '&#8369;'.html_escape(number_format($income,2)); ?></td>
			  		 	</tr>			  		
			  		 	<?php  } 
			  		 ?>
			  </tbody>
			  <tfoot >
			    <tr style="border-top:1px solid #ddd;">
			      <th>Grand Total</th>  
			      <th></th>
			      <th></th>
			      <th></th>
			      <th></th>
			      <th><?php echo html_escape(number_format($qty)); ?></th>
			      <th id="total-stock"></th>
			      <th id="total-discount"></th>
			      <th id="grand-total"><?php echo '&#8369;'.html_escape(number_format($grand_total,2))?></th>
			      <th id="income-total"><?php echo '&#8369;'.html_escape(number_format($profit_total,2))?></th>
			    </tr>
			  </tfoot>

			</table>
		</div>
	</section>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		var oTable = $('#product-report').dataTable({
		  destroy:true,
		  bSort:false,
		  "oLanguage": {
		    "sSearch": "Search"
		  },

		  'iDisplayLength': 12,
		  "sPaginationType": "full_numbers",
		  "dom": 'T<"clear">lfrtip',
		  "tableTools": {
		    "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
		  }

		});
	});
</script>