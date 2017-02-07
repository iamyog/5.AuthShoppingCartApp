<?php include('/../partials/header.php'); ?>

<div class="jumbot">
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>
				<a class="colorh" href="<?php echo site_url('shoppingcart');?>">Shopping Cart</a>
				<span class="small pull-right">	
					<a href="" class="colorh">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
						Cart <span class="badge">5</span>
					<a>

					<a href="" class="colorh">Checkout</a>
				</span>
			</h2>						 
		</div>
	</div>

<div class="row">

<div class="col-md-10 col-md-offset-1">
	
	<?php echo form_open('path/to/controller/update/method'); ?>

<table class="table">

<tr>
        <th>QTY</th>
        <th>Item Description</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<p><?php echo form_submit('', 'Update your Cart'); ?></p>
</div>
</div>

	
	
	 
</div>

 
 

 <?php include('/../partials/footer.php'); ?>

 