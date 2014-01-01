<form class="form-signin"  method="post" action="<?php echo $this->_config['basepath']; ?>/survey/create/post">

<p class="lead">Umfrage erstellen</p>
<input type="text" name="titel" class="input-block-level" placeholder="Titel der Umfrage" required>
<textarea type="text" name="beschreibung" class="input-block-level" placeholder="Beschreibung" required></textarea>

<hr>
<div name="fragen">
<input type="text" name="frage_1" class="input-block-level" placeholder="Frage 1" required>
<input type="text" name="frage_2" class="input-block-level" placeholder="Frage 2" required>
<input type="text" name="frage_3" class="input-block-level" placeholder="Frage 3" required>
</div>

<a class="btn" href="#" name="addQuestion"><i class="icon-plus"></i></a><br /><br />
<button class="btn btn-large btn-primary" type="submit">Umfrage erstellen</button>      





</form>