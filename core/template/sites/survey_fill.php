<form class="form-signin"  method="post" action="<?= $this->_config['basepath'] ?>/survey/post">
	
<p class="lead"><?= $survey['titel'] ?></p>
<p><?= $survey['beschreibung'] ?></p>
<hr>
		
		<?php $i = 1; foreach ($questions as $question) { ?>
		
		<div class="row">
		<div class="span3"><strong>#<?= $i ?></strong> <?= $question['frage'] ?></div>
		<div class="span4">
			<input type="radio" class="umfrage" value="0" id="<?= $i ?>" name="<?= $question['id'] ?>" data-label="0%"/>
			<input type="radio" class="umfrage" value="25" id="<?= $i ?>" name="<?= $question['id'] ?>" data-label="25%"/>
			<input type="radio" class="umfrage" value="75" id="<?= $i ?>" name="<?= $question['id'] ?>" data-label="75%"/>
			<input type="radio" class="umfrage" value="100" id="<?= $i ?>" name="<?= $question['id'] ?>" data-label="100%"/>
		</div>
		</div>
		<hr>
		
		<?php $i++; } ?>
		

 <button class="btn btn-large btn-primary" type="submit">Umfrage beenden</button>
	</form>