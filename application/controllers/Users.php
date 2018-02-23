<?php
	class Users extends CI_Controller {

		// register user
		public function register() {
			$data['title'] = "Zarejestruj się";

			$this->form_validation->set_rules('name', 'Imię', 'required');
			$this->form_validation->set_rules('username', 'Nazwa użytkownika', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Hasło', 'required');
			$this->form_validation->set_rules('password2', 'Potwierdź hasło', 'matches[password]');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}
			else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->users_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'Zarejestrowałeś się, możesz się teraz zalogować');


				redirect('oferty');
			}
		}

		// login user
		public function login() {
			$data['title'] = "Zaloguj się";

			$this->form_validation->set_rules('username', 'Nazwa użytkownika', 'required');
			$this->form_validation->set_rules('password', 'Hasło', 'required');
			
			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}
			else {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$user_id = $this->users_model->login($username, $password);

				if($user_id) {

					// create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'loged_in' => true
						);
					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_logedin', 'Zalogowano');
					redirect('oferty');
				}
				else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Wporwadzono nieprawidłowe dane');
					redirect('users/login');					
				}
			}
		}

		public function logout() {
			$this->session->unset_userdata('loged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_logedout', 'Wylogowano');
			redirect('users/login');

		}

		public function check_username_exists($username) {
			$this->form_validation->set_message('check_username_exists', 'Wybrana nazwa użystkownika jest zajęta, wpowadź inną');
			if($this->users_model->check_username_exists($username)) {
				return true;
			} else {
				return 	false;
			}
		}

		public function check_email_exists($email) {
			$this->form_validation->set_message('check_email_exists', 'Wybrany email jest zajęty, wprowadź inny');

			if($this->users_model->check_email_exists($email)) {
				return true;
			} else {
				return 	false;
			}
		}


	}