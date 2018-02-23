<?php
	class Oferty_model extends CI_Model {
		public function __construct() {
			$this->load->database();	// load the database library
		}
		public function pobierz_oferty($slug = FALSE) {
			if($slug == FALSE) {
				$this->db->order_by('oferty.id', 'DESC');
				$this->db->join('kategorie', 'kategorie.id = oferty.kategorie_id');
				$query = $this->db->get('oferty');
				return $query->result_array();
			}

			$query = $this->db->get_where('oferty',array('slug' => $slug));
			return $query->row_array();
		}
		public function dodaj_oferte($post_image)
		{
			$slug = url_title($this->input->post('tytul'));

			$data = array(
					'kategorie_id' => $this->input->post('kategorie_id'),
					'user_id' => $this->session->userdata('user_id'),
					'tytul' => $this->input->post('tytul'),
					'slug' => $slug,
					'opis' => $this->input->post('opis'),
					'post_image' => $post_image
			);

			return $this->db->insert('oferty', $data);
		}
		public function usun_oferte($id) {
			$this->db->where('id', $id);
			$this->db->delete('oferty');
			return true;
		}
		public function aktualizuj_oferte()
		{
			$slug = url_title($this->input->post('tytul'));

			$data = array(
					'kategorie_id' => $this->input->post('kategorie_id'),
					'tytul' => $this->input->post('tytul'),
					'slug' => $slug,
					'opis' => $this->input->post('opis')
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('oferty', $data);
		}
		public function get_categories()
		{
			$this->db->order_by('marka');
			$query = $this->db->get('kategorie');
			return $query->result_array();
		}
		public function oferty_dla_kategorii($kategorie_id) {
				$this->db->order_by('oferty.id', 'DESC');
				$this->db->join('kategorie', 'kategorie.id = oferty.kategorie_id');
				$query = $this->db->get_where('oferty', array('kategorie_id' => $kategorie_id));
				return $query->result_array();
		}
	}