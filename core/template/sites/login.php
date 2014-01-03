 <form class="form-signin" method="post" action="<?= $this->_config['basepath']; ?>/login/post">
        <p class="lead">Bei GibbSurvey einloggen.</p>
        <input type="email" name="email" id="email" class="input-block-level" placeholder="E-Mail Adresse" required>
        <input type="password" name="password" class="input-block-level" placeholder="Passwort" required>
        <button class="btn btn-primary pull-right" name="loginBtn" type="submit">Einloggen</button>
        
         <div class="control-group">
        <br />
         <p>Falls Sie noch kein GibbSurvey Login haben, <a href="<?= $this->_config['basepath']; ?>/registrieren">hier</a> klicken.</p>
         </div>
      </form>