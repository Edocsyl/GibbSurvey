    <p class="lead">Ihre Umfragen</p>
	 
	 <ul class="nav nav-tabs" id="umfragen">
    <li><a href="#erstellt" data-toggle="tab">Erstellte Umfragen</a></li>
    <li><a href="#teilgenommen" data-toggle="tab">Teilgenommene Umfragen</a></li>
    </ul>
    
    <div class="tab-content">
    <div class="tab-pane active" id="erstellt">
    
    <table class="table table-hover">
      <thead>
                <tr>
                  <th>#</th>
                  <th>Umfrage</th>
                  <th>Teilnahmen</th>
                  <th>Umfrage Link</th>
                  <th>Resultat</th>
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
                
                
			<?php foreach ($surveys as $survey) { ?>
            
            	<tr>
                  <td><?php echo $survey['id'] ?></td>
                  <td><?php echo $survey['titel'] ?></td>
                  <td></td>
                  
                  
                  
                  <td><a href="<?php echo $this->_config['basepath'] . "/survey/fill/" . $survey['hash'] ?>">Link...</a></td>
                  <td><a href="<?php echo $this->_config['basepath'] . "/survey/show/" . $survey['hash'] ?>" class="btn btn-small btn-success" type="button">Resultat einsehen</a></td>
                </tr>
              
			<?php } ?>        
                
              </tbody>
            </table>
            </div>
    <div class="tab-pane" id="teilgenommen">Teilgenommen</div>
    </div>
    
    
	 
	 