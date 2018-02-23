<?php
	class Kategorie extends CI_Controller
	{
		public function index()
		{
				$data['kategorie'] = $this->kategorie_model->pobierz_kategorie();

				$data['title'] = 'Kategorie';

				$this->load->view('templates/header');
				$this->load->view('kategorie/index', $data);
				$this->load->view('templates/footer');
		}

		public function view($marka) {

			$data['title'] = $marka;

			$kategorie_id = $this->kategorie_model->pokaz_kategorie($marka)->id;

			$data['oferty'] = $this->Oferty_model->oferty_dla_kategorii($kategorie_id);

			$this->load->view('templates/header');
			$this->load->view('oferty/index', $data);
			$this->load->view('templates/footer');

		}

		public function create()
		{
			if(!$this->session->userdata('loged_in')) {
				redirect('users/login');
			}
			
			
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

				$this->session->set_flashdata('kategoria_dodana', 'Kategoria dodana');

				redirect('kategorie');
			}
		}
	}