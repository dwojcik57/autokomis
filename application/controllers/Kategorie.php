<?php
	class Kategorie extends CI_Controller
	{
		public function index()
		{
			
		}
		public function create()
		{
			$data['title'] = 'Dodaj kategorie';

			$this->form_validation->set_rules('marka', 'Marka','required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('kategorie/create', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$this->kategorie_model->dodaj_kategorie();
				redirect('kategorie');
			}
		}
	}