<h2><?= $title ?></h2>
<?php foreach($oferty as $oferta_sprzedazy) : ?>
	<h3><?php echo $oferta_sprzedazy['tytul']; ?></h3>
	<div class="row">
		<div class="col-md-3">
			<img class="post-thumb" src="<?php echo site_url(); ?>/assets/images/oferty/<?php echo $oferta_sprzedazy['post_image']; ?>">
		</div>
		<div class="col-md-9">
			<small class="data-dodania">Data dodania: <?php echo $oferta_sprzedazy['create_at']; ?> w kategorii: <strong><?php echo $oferta_sprzedazy['marka']; ?></strong></small><br>
			<?php echo word_limiter($oferta_sprzedazy['opis'], 20); ?>
			<br><br>
			<p><a class="btn btn-default" href="<?php echo site_url('/oferty/'.$oferta_sprzedazy['slug']); ?>">Więcej</a> </p>
		</div>
	</div>
<?php endforeach; ?>