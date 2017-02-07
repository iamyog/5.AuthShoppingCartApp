<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingCart extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('msg','Unauthorised Access');
			redirect('auth');
		}
		$this->load->model('shopping_cart_model');
	}	 
	public function index()
	{
		 
		$this->load->view('shopping-cart/index');
	}
	public function showCart()
	{
		$this->load->view('shopping-cart/show_cart');
	}	
	public function addToCart()
	{
		$data = array(
        array(
                'id'      => 'sku_123ABC',
                'qty'     => 1,
                'price'   => 39.95,
                'name'    => 'T-Shirt',
                'options' => array('Size' => 'L', 'Color' => 'Red')
        ),
        array(
                'id'      => 'sku_567ZYX',
                'qty'     => 1,
                'price'   => 9.95,
                'name'    => 'Coffee Mug'
        ),
        array(
                'id'      => 'sku_965QRS',
                'qty'     => 1,
                'price'   => 29.95,
                'name'    => 'Shot Glass'
        )
);

$this->cart->insert($data);
		echo "<pre>";
		print_r($this->cart->contents());		 
	}

}
