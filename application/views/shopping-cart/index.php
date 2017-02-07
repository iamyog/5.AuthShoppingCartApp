<?php include('/../partials/header.php'); ?>

<div class="jumbot">
	
	<div class="row">
		<div class="col-md-9 col-md-offset-2">
			<h2>
				Shopping Cart Demo  
				<span class="small pull-right">	
					<a href="<?php echo site_url('shoppingcart/showCart'); ?>" class="colorh">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
						Cart <span class="badge">5</span>
					<a>

					<a href="" class="colorh">Checkout</a>
				</span>
			</h2>						 
		</div>
	</div>
	<hr>
	<div class="row">

		 
	 <div class="col-md-3 col-md-offset-2">
		<form method="post" action="<?php echo site_url('shoppingcart/addToCart'); ?>">
			<div class="thumbnail">
		      <img src="<?php echo base_url('assets/img/deadpool.jpg'); ?>">
		      <div class="caption">
		        <h3 class="text-center">Deadpool<span class="small pull-right" style="margin-top: 20px;">$12</span></h3>
		        <p>Wade Wilson (Ryan Reynolds) is a former Special Forces operative who now works as a mercenary. His world comes crashing down when evil scientist Ajax (Ed Skrein) tortures, disfigures....</p>
		        <p class="clearfix">

		        <button type="submit" class="btn btn-danger pull-right">Add to Cart</button> 
				</p>
		      </div>
		    </div>	
		    </form>

		</div> 

	
		<div class="col-md-3">
		<form method="post" action="<?php echo site_url('shoppingcart/addToCart'); ?>">
				<div class="thumbnail">
		      <img src="<?php echo base_url('assets/img/superman.jpg'); ?>">
		      <div class="caption">
		        <h3 class="text-center">Man of Steel<span class="small pull-right" style="margin-top: 20px;">$20</span></h3>
		        <p>When a young boy discovers that he has extraordinary powers, he decides to find out about his origin. He then learns to fight for Earth when it gets attacked by members of his own race.</p>
		        <p class="clearfix">
		        <button type="submit" class="btn btn-danger pull-right">Add to Cart</button> 
		      </div>
		    </div>	
		    </form>		 
		</div> 
		<div class="col-md-3">
		<form method="post" action="<?php echo site_url('shoppingcart/addToCart'); ?>">
				<div class="thumbnail">
		      <img src="<?php echo base_url('assets/img/spiderman.jpg'); ?>" alt="...">
		      <div class="caption">
		        <h3 class="text-center">Spider-Man<span class="small pull-right" style="margin-top: 20px;">$10</span></h3>
		        <p>When bitten by a genetically modified spider, a nerdy, shy, and awkward high school student gains spider-like abilities that he eventually must use to fight evil as a superhero after tragedy befalls his family.</p>
		        <p class="clearfix">
		        <button type="submit" class="btn btn-danger pull-right">Add to Cart</button> 

		      </div>
		    </div>
		</form> 
		    				 
		</div>
	</div>
</div>

 

 <?php include('/../partials/footer.php'); ?>

 <!-- <script>
   
	$( document ).ready(function() {

		$('#success').hide(); $('#failed').hide(); $('#success_e').hide(); $('#failed_e').hide();
		$('#success_delete').hide(); $('#failed_delete').hide();			

		$('#tableData').dataTable({
		    "bInfo" : false
		   /* "ajax": function (data, callback, settings) {
    			callback(
			      JSON.parse( getlocalStorage.getItem('dataTablesData') )
    			);
  			}*/
		       
		});

		$('.timePicker').datetimepicker({
		    pickDate: false,
		      pick12HourFormat: true
		});

		$('.datePicker').datetimepicker({
    		language: 'en',
      		pickTime: false
    	});

    	getAllRecord();

	}); 

	function getAllRecord()
	{
		$.ajax({
            type        : 'GET',
            url         : '<?php echo site_url('events/getAllRecords');?>',
        }).done(function(data) {      
	        
	        if(data.length == 0) 
	        {
	        	$('#showTable').hide();
	        	$('#showAlterModal').show();
	        } 
	        else
	        {
		        $('#showTable').show();
	        	$('#showAlterModal').hide();	
	            $('#event_tbody').html(data);        	
	        }   
        });
	}    
   

	$('#event_add_form').submit(function(e){

		var frm = $('#event_add_form');
	
        var formData = {
            'event_title'  : $('#event_title').val(),
            'event_date'   : $('#event_date').val(),
            'event_time'   : $('#event_time').val(),
            'event_desc'   : $('#event_desc').val()
        }; 
         
        $.ajax({
            type        : frm.attr('method'), 
            url         : frm.attr('action'), 
            data        : formData, 
            success:function(data){
               
                if (data){
                	  $('#success').show();		 
                	  $('#success').text('Success : Event created successfully');
                	  $('#event_title').val(''),
			          $('#event_date').val(''),
			          $('#event_time').val(''),
			          $('#event_desc').val('')
                }
                else
                {
					$('#failed').show();
                	$('#failed').text('Oopps : Event can not created');	
                }                
            }            
        }).done(function(data) {
        	$("#success").delay(3000).fadeOut();
        	$("#failed").delay(3000).fadeOut();
		        getAllRecord();	         	
            });
        // stop the form from submitting the normal way and refreshing the page
        e.preventDefault();
	});

	
  	function deleteEvent(id)
  	{
  		$.ajax({
            type        : 'GET',
            url         : '<?php echo site_url('events/deleteRecord');?>',
            data        : {id:id}, 
            success:function(data){
       
            	if (data) 
            	{
               		$('#success_delete').show();	
               		$('#success_delete').text('Success : Event Deleted successfully');             		
               }
               else
               {
               		$('#failed_delete').show();	
               		$('#failed_delete').text('Oopps : Event can not delete');
               }
            }
        }).done(function(data){
        	
        	$("#success_delete").delay(3000).fadeOut();
        	$("#failed_delete").delay(3000).fadeOut();

		    getAllRecord();		    		   
        });
  	}

  	function editEvent(data)
  	{  		 
  		$('#e_id').val(data.id);
  		$('#e_title').val(data.title);
  		$('#e_date').val(data.date);
  		$('#e_time').val(data.time);
  		$('#e_desc').val(data.desc);
  		$('#modalEdit').modal();
  	}

  	$('#event_edit_form').submit(function(e){

		var frm = $('#event_edit_form');
		 
        var formData = {
        	'e_id'  : $('#e_id').val(),
            'e_title'  : $('#e_title').val(),
            'e_date'   : $('#e_date').val(),
            'e_time'   : $('#e_time').val(),
            'e_desc'   : $('#e_desc').val()
        }; 
         
        $.ajax({
            type        : frm.attr('method'), 
            url         : frm.attr('action'), 			
            data        : formData, //data      : frm.serialize(),
            success:function(data){
				
                if (data)
                {
                	  $('#success_e').show();		 
                	  $('#success_e').text('Success : Event Updated successfully');
                	  $('#e_title').val(''),
			          $('#e_date').val(''),
			          $('#e_time').val(''),
			          $('#e_desc').val('')
                }
                else
                {
					$('#failed_e').show();
                	$('#failed_e').text('Oopps : Event can not updated');	
                }
            }            
        }).done(function(data) { 
        	
        	$("#success_e").delay(3000).fadeOut();
        	$("#failed_e").delay(3000).fadeOut();               
            
              getAllRecord();	 
        });
        // stop the form from submitting the normal way and refreshing the page
        e.preventDefault();
	});

</script> -->