<div id="all-level">
  <table id="" class="table  responsive-utilities jambo_table">
    <thead>
    <tr>
      <th class="col-md-4">Product</th>
      <th class="col-md-2">Current Stock</th>
      <th class="col-md-2">Stock Value</th>
      <th class="col-md-2">Amount</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $qty = 0;
    $price = 0;
    $total = 0;
    foreach ($inventory as $i) {
      $qty += $i->quantity;
      $price += $i->price;
      $total += $i->quantity * $i->price;  ?>

      <tr>
        <td><strong><?php echo $i->prod_name; ?></strong></td>
        <td><strong><?php echo $i->quantity; ?></strong></td>
        <td><strong><?php echo number_format($i->price , 2); ?></strong></td>
        <td><strong><?php echo $i->quantity != 0 ? number_format(($i->quantity) * ($i->price) , 2) : '-'; ?></strong>
        </td>
      </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
      <th><strong>TOTAL</strong></th>
      <th><strong><?php echo $qty; ?></strong></th>
      <th><strong><?php echo number_format($price , 2); ?></strong></th>
      <th><strong><?php echo number_format($total , 2); ?></strong></th>
    </tr>
    </tfoot>
  </table>
</div>