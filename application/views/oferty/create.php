<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('oferty/create'); ?>
  <div class="form-group">
    <label>Tytuł</label>
    <input type="text" class="form-control" name="tytul" placeholder="Dodaj tytuł">
  </div>
  <div class="form-group">
    <label>Opis</label>
    <textarea id="editor1" class="form-control" name="opis" placeholder="Dodaj opis"></textarea>
  </div>
  <div class="form-group">
  		<label>Kategoria</label>
  		<select name="kategorie_id" class="form-control">
  			<?php foreach($kategorie as $kategoria): ?>
  				<option value="<?php echo $kategoria['id']; ?>"><?php echo $kategoria['marka']; ?></option>
  			<?php endforeach ?>
  		</select>
  </div>
  <div class="form-group">
  		<label>Dodaj zdjęcie</label>
  		<input type="file" name="userfile" size="20">
  	</div>
  <button type="submit" class="btn btn-default">Zatwierdź</button>
</form>