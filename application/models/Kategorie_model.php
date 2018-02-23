<?php
	class Kategorie_model extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		public function dodaj_kategorie() {
			$data = array(
				'marka' => $this->input->post('marka')
			);
			return $this->db->insert('kategorie', $data);
		}

		public function pobierz_kategorie() {
			$this->db->order_by('marka');
			$query = $this->db->get('kategorie');
			return $query->result_array();			
		}

		public function pokaz_kategorie($marka) {
			$query = $this->db->get_where('kategorie', array('marka' => $marka));

			return $query->row();
		}
	}