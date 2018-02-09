<h2><?php echo $oferta_sprzedazy['tytul']; ?></h2>
<div class="post-body">
		<small class="data-dodania">Data dodania: <?php echo $oferta_sprzedazy['create_at']; ?></small><br>
		<img src="<?php echo site_url(); ?>/assets/images/oferty/<?php echo $oferta_sprzedazy['post_image']; ?>">
		<?php echo $oferta_sprzedazy['opis']; ?>
</div>

<hr>
<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>/index.php/oferty/zmien/<?php echo $oferta_sprzedazy['slug']; ?>">Zmień</a> 
<?php echo form_open('/oferty/usun/'.$oferta_sprzedazy['id']); ?>
	<input type="submit" value="usuń" class="btn btn-danger">
</form>