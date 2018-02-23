<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Imię</label>
				<input type="text" class="form-control" name="name" placeholder="Imię">
			</div>
			<div class="form-group">
				<label>Kod pocztowy</label>
				<input type="text" class="form-control" name="kodpocztowy" placeholder="Kod pocztowy">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Nazwa użytkownika</label>
				<input type="text" class="form-control" name="username" placeholder="Nazwa użytkownika">
			</div>
			<div class="form-group">
				<label>Hasło</label>
				<input type="password" class="form-control" name="password" placeholder="Imię">
			</div>
			<div class="form-group">
				<label>Potwierdź hasło</label>
				<input type="password" class="form-control" name="password2" placeholder="Potwierdź hasło">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Zatwierdź</button>
		</div>
	</div>
<?php echo form_close(); ?>