<?php
class Navigation extends Querys {
	
	public $_config = null;
	private $_page = null;
	private $_param1 = null;
	private $_param2 = null;
	private $_param3 = null;
	private $_post = null;
	
	public function __construct($config, $page = null, $param1 = null, $param2 = null, $param3 = null, $post){
		$this->_config = $config;
		$this->_page = $page;
		$this->_param1 = $param1;
		$this->_param2 = $param2;
		$this->_param3 = $param3;
		$this->_post = $post;
		
	}
	
	/**
	 * Initialises the application
	 */
	public function initApp(){
		switch ($this->_page){
			case 'api':
				$this->showApi();
				break;
			default:
				$this->showPage();
				break;
		}
	}
	
	/**
	 * Api handler
	 */
	public function showApi(){
		$this->ifLogoutLeave();
		
		switch ($this->_param1){
			case 'getsurvey':
				echo json_encode($this->getSurveyByHash($this->_param2));
				break;
			case 'getquestions':
				echo json_encode($this->getQuestionByHash($this->_param2));
				break;
			default:
				break;
		}
	}
	
	/**
	 * Page handler
	 */
	public function showPage(){
		
		require $this->_config['html'] . '/header.inc.php';
		
		switch ($this->_page){
			case null:
				$this->printIndex();
				break;
			case 'surveys':
					$this->ifLogoutLeave();
					$this->printSurveys();
					break;
			case 'profile':
				$this->ifLogoutLeave();
				$this->printProfile();
				break;
			case 'about':
				$this->printAbout();
				break;
			case 'login':
				$this->ifLoginLeave();
				switch ($this->_param1){
					case 'post':
						$this->loginUser($this->_post);
						break;
					default:
						$this->printLogin();
						break;
				}
				break;
			case 'logout':
					$this->logoutUser();
					break;
			case 'register':
				$this->ifLoginLeave();
				switch ($this->_param1){
					case 'post':
						$this->registerUser($this->_post);
						break;
					default:
						$this->printRegistrieren();
						break;
				}
				break;
			case 'survey' || 's':
					switch ($this->_param1){
						case 'create':
							$this->ifLogoutLeave();
							switch ($this->_param2){
								case null:
									$this->printCreateSurvey();
									break;
								case 'post':
									$this->createSurvey($_POST);
									break;
								default:
									$this->printIndex();
									break;
							}
							break;
						case 'post':
							print_r($_POST);
							break;
						case 'fill' || 'f':
							$this->printSurveyFill($this->_param2);
							break;
						default:
							$this->printIndex();
							break;
					}
					break;
			default:
				$this->printIndex();
				break;
		}
		
		require $this->_config['html'] . '/footer.inc.php';
	}
	
	
	/**
	 * Shows the index page
	 */
	public function printIndex(){
		require $this->_config['sites'] . '/home.php';
		
	}
	
	/**
	 * Shows the about page
	 */
	public function printAbout(){
		require $this->_config['sites'] . '/about.php';
	
	}
	
	/**
	 * Shows the login page
	 */
	public function printLogin(){
		require $this->_config['sites'] . '/login.php';
	
	}
	
	/**
	 * Shows the register page
	 */
	public function printRegistrieren(){
		require $this->_config['sites'] . '/registrieren.php';
	
	}
	
	/**
	 * Shows the survey fill page
	 */
	public function printSurveyFill($hash){
		$survey = $this->getSurveyByHash($hash);
		$questions = $this->getQuestionByHash($hash);
		
		require $this->_config['sites'] . '/survey_fill.php';
	
	}
	
	/**
	 * Shows surveys of a user
	 */
	public function printSurveys(){
		$surveys = $this->getCreatedSurveysFromUser($_SESSION['userid']);
		require $this->_config['sites'] . '/surveys.php';
	
	}
	
	/**
	 * Show the user Profile
	 */
	public function printProfile(){
		if($_SESSION['userid'] != null) {
			
			$user = $this->getCurrentUser($_SESSION['userid']);
		} else {
			$user = null;
		}
		
		require $this->_config['sites'] . '/profile.php';
	
	}
	
	/**
	 * Show the create survey page
	 */
	public function printCreateSurvey(){
		require $this->_config['sites'] . '/survey_create.php';
	}
	
	
}

?>