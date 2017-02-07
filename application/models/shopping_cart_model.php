<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_cart_Model extends CI_Model 
{	
	 
	public function getProducts()
	{
		$query = $this->db->get('cart_show_products');
		return $query->result();
	}
	 
}
