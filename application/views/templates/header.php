<html>
        <head>
             <title>Autokomis</title>
             <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
             <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
             <script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
        </head>
        <body>
        	<nav class="navbar navbar-inverse">
        		<div class="container">
        			<div class="navbar-header">
        				<a class="navbar-brand" href="<?php echo base_url(); ?>">Autokomis</a>
        			</div>
        			<div id="navbar">
        				<ul class="nav navbar-nav">
        					<li><a href="<?php echo base_url() ?>">Strona główna</a></li>
        					<li><a href="<?php echo base_url() ?>about">O projekcie</a></li>
                            <li><a href="<?php echo base_url() ?>oferty">Oferty</a></li>
                            <li><a href="<?php echo base_url() ?>kategorie">Kategorie</a></li>
                            
        				</ul>
                        <ul class="nav navbar-nav navbar-right">
                        <?php if(!($this->session->userdata('loged_in'))) : ?>
                            <li><a href="<?php echo base_url() ?>users/login">Zaloguj</a></li>
                            <li><a href="<?php echo base_url() ?>users/register">Rejestracja</a></li>
                        <?php endif; ?>
                        <?php if($this->session->userdata('loged_in')) : ?>
                            <li><a href="<?php echo base_url() ?>oferty/create">Dodaj oferte</a></li>
                            <li><a href="<?php echo base_url() ?>kategorie/create">Dodaj kategorie</a></li>
                            <li><a href="<?php echo base_url() ?>users/logout">Wyloguj</a></li>
                        <?php endif; ?>
                        </ul>
        			</div>
        		</div>
            </nav>

            <div class="container">
                <!-- Flash messages -->
                <?php if($this->session->flashdata('user_registered')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_registered').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('oferta_zamieszona')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('oferta_zamieszona').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('oferta_zaktualizowana')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('oferta_zaktualizowana').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('kategoria_dodana')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('kategoria_dodana').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('oferta_usunieta')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('oferta_usunieta').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('login_failed')): ?>
                    <?php echo '<p class="alert alert-danger">' .$this->session->flashdata('login_failed').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('user_logedin')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_logedin').'</p>'; ?>
                <?php endif; ?>

                <?php if($this->session->flashdata('user_logedout')): ?>
                    <?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_logedout').'</p>'; ?>
                <?php endif; ?>
