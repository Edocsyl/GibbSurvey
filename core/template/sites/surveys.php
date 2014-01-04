    <p class="lead">Ihre Umfragen</p>
	 
	 <ul class="nav nav-tabs" id="umfragen">
    <li><a href="#erstellt" data-toggle="tab">Erstellte Umfragen</a></li>
    <li><a href="#teilgenommen" data-toggle="tab">Teilgenommene Umfragen</a></li>
    </ul>
    
    <div class="tab-content">
    <div class="tab-pane active" id="erstellt">
    
    <?php if($surveys != null){ ?>       
              
    <table class="table table-hover">
      <thead>
                <tr>
                  <th>#</th>
                  <th>Umfrage</th>
                  <th>Erstellt</th>
                  <th>Umfrage Link</th>
                  <th>Resultat</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              
              <!-- 
              <tr>
                  <td>1</td>
                  <td>Wie finden Sie die Gibb.</td>
                  <td>32</td>
                  <td>Link</td>
                  <td><a class="btn btn-small btn-success" type="button">Resultat einsehen</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Die 1:12 Initiative</td>
                  <td>74</td>
                  <td>Link</td>
                  <td><button class="btn btn-small btn-warning disabled" type="button">Endet am 26.11.2013</button></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Was halten sie von Cookies</td>
                  <td>333</td>
                  <td>Link</td>
                  <td><a class="btn btn-small btn-success" type="button">Resultat einsehen</a></td>
                </tr>  -->
                
                
			<?php $i = 1; foreach ($surveys as $survey) { ?>
            
            	<tr>
                  <td><?= $i ?></td>
                  <td><?= $survey['titel'] ?></td>
                  <td><?= date_format(date_create($survey['erstell_datum']), 'd.m.Y H:i') ?></td>
                  <td><a href="<?= $this->_config['basepath'] . "/s/f/" . $survey['hash'] ?>" target="_blank" class="btn btn-small btn-info" type="button">Umfrage &ouml;ffnen</a></td>
                  <td><button name="umfrage_<?= $survey['hash'] ?>" uid="<?= $survey['hash'] ?>" type="button" class="btn btn-small btn-success">Resultat einsehen</button></td>
                  <td><button name="umfrage_<?= $survey['hash'] ?>" uid="<?= $survey['hash'] ?>" type="button" class="btn btn-small">Mehr...</button></td>
                </tr>
              
			<?php $i++; } ?> 
			
			  
              </tbody>
            </table>
            <?php } else { echo "Noch keine Umfrage erstellt."; }?>
            </div>
    <div class="tab-pane" id="teilgenommen">
      <?php if($parsurveys != null){ ?> 
       <table class="table table-hover">
      <thead>
                <tr>
                  <th>#</th>
                  <th>Umfrage</th>
                  <th>Erstellt</th>
                  <th>Resultat</th>
                </tr>
              </thead>
              <tbody>
              
              <?php $ii = 1; foreach ($parsurveys as $parsurvey) { ?>
            
            	<tr>
                  <td><?= $ii ?></td>
                  <td><?= $parsurvey['titel'] ?></td>
                  <td><?= date_format(date_create($parsurvey['erstell_datum']), 'd.m.Y H:i') ?></td>
                  <td><button name="umfrage_<?= $survey['hash'] ?>" uid="<?= $survey['hash'] ?>" type="button" class="btn btn-small btn-success">Ergebniss einsehen</button></td>
                </tr>
              
			<?php $ii++; } ?> 
              
              </tbody>
            </table>
      
      
      <?php } else { echo "An keiner Umfrage teilgenommen."; }?>

    
    </div>
    </div>
    

    <div id="umfragePop" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#x274c;</button>
    <h3 id="umfrageHeader"></h3>
    </div>
    <div id="umfrageBody" class="modal-body">
    </div>
 
    </div>
    
	 
	 