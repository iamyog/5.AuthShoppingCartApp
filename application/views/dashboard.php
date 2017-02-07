<?php include('partials/header.php'); ?>
	<div class="row">
		<h3>
		</h3>
		<div class="col-md-6 col-md-offset-3 text-center">			 
			<a href="<?php echo site_url('shoppingcart');?>" class="btn btn-danger">Shopping Cart</a>			 
		</div> 
	</div>
	<div>		
    <?php if ($this->session->flashdata('msg')) {?>       

      <div class="row">
      <div class="text-center col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3" id="card" style="margin-top: 20px;">      	
        <h3>
          <?php echo $this->session->flashdata('msg');?>
        </h3>
      </div> 
      </div>

      <?php }?>
	</div>
<?php include('partials/footer.php'); ?>