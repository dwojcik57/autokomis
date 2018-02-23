<h2><?= $title ; ?></h2>

<ul class="list-group">

<?php foreach($kategorie as $kategoria) : ?>
	<li class="list-group-item"><a href="<?php echo base_url() . 'kategorie/view/' .$kategoria['marka']; ?>"><?php echo $kategoria['marka']; ?></a> </li> </br>

<?php endforeach ?>

</ul>