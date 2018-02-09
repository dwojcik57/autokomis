<?php
	class Oferty extends CI_Controller
	{
		public function index() 
		{

			$data['title'] = 'Oferty';

			$data['oferty'] = $this->Oferty_model->pobierz_oferty();

	        $this->load->view('templates/header', $data);
	        $this->load->view('oferty/index', $data);
	        $this->load->view('templates/footer', $data);
		}

		public function view($slug = NULL)
		{
			$data['oferta_sprzedazy'] = $this->Oferty_model->pobierz_oferty($slug);

			if(empty($data['oferta_sprzedazy'])) {
				show_404();
			}

			$data['title'] = $data['oferta_sprzedazy']['tytul'];

	        $this->load->view('templates/header', $data);
	        $this->load->view('oferty/view', $data);
	        $this->load->view('templates/footer', $data);
		}
		public function create()
		{
			$data['title'] = 'Dodaj ofertę';

			$data['kategorie'] = $this->Oferty_model->get_categories();

			$this->form_validation->set_rules('tytul','Tytul','required');
			$this->form_validation->set_rules('opis','Opis','required');

			if($this->form_validation->run() === FALSE) {
		        $this->load->view('templates/header', $data);
		        $this->load->view('oferty/create', $data);
		        $this->load->view('templates/footer', $data);
			}
			else
			{
				// Dodaj obraz
				$config['upload_path'] = './assets/images/oferty';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '500';
				$config['max_height'] = '500';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload())
				{
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->Oferty_model->dodaj_oferte($post_image);
				redirect('oferty');
			}	
		}
		public function usun($id)
		{
			$this->Oferty_model->usun_oferte($id);
			redirect('oferty');
		}
		public function zmien($slug)
		{
			$data['oferta_sprzedazy'] = $this->Oferty_model->pobierz_oferty($slug);

			$data['kategorie'] = $this->Oferty_model->get_categories();

			if(empty($data['oferta_sprzedazy'])) {
			show_404();
			}

			$data['title'] = 'Zmien oferte';

	        $this->load->view('templates/header', $data);
	        $this->load->view('oferty/zmien', $data);
	        $this->load->view('templates/footer', $data);

		}
		public function aktualizuj()
		{
				$this->Oferty_model->aktualizuj_oferte();
				redirect('oferty');
		}
	}