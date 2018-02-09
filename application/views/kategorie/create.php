<h2><?= $title ; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('kategorie/create'); ?>
	<div class="form-group">
		<label>Marka</label>
		<input type="text" class="form-control" name="marka" placeholder="Wpowadź markę">
		<button type='submit' class="btn btn-default">Wprowadź</button>
	</div>
</form>