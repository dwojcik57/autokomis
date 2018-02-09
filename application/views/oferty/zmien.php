<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('oferty/aktualizuj'); ?>
	<input type="hidden" name="id" value="<?php echo $oferta_sprzedazy['id']; ?>">
  <div class="form-group">
    <label>Tytuł</label>
    <input type="text" class="form-control" name="tytul" placeholder="Dodaj tytuł" value="<?php echo $oferta_sprzedazy['tytul']; ?>">
  </div>
  <div class="form-group">
    <label>Opis</label>
    <textarea id="editor1" class="form-control" name="opis" placeholder="Dodaj opis"><?php echo $oferta_sprzedazy['opis']; ?></textarea>
  </div>
  <div class="form-group">
      <label>Kategoria</label>
      <select name="kategorie_id" class="form-control">
        <?php foreach($kategorie as $kategoria): ?>
          <option value="<?php echo $kategoria['id']; ?>"><?php echo $kategoria['marka']; ?></option>
        <?php endforeach ?>
      </select>
  </div>

  <button type="submit" class="btn btn-default">Zatwierdź</button>
</form>