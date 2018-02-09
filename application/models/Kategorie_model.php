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
	}