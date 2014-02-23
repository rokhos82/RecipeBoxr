<?php
class controller {
	private $model;
	private $view;

	public function __construct($model) {
		$this->model = $model;
	}

	public function perform($action) {
		global $_GLOBALS;
		$local = $_GLOBALS["local_strings"];

		if(!isset($_SESSION["username"])) {
			if($action == "login") {
				$loggedIn = isset($_SESSION["username"]) ? true : false;
				if(isset($_GET["username"])) {
					$user = $_GET["username"];
					$pass = $_GET["password"];
					$query = "SELECT * FROM user WHERE uname=${user} AND password=${pass}";
					if($this->model->authenticateUser($user,$pass)) {
						$loggedIn = true;
						$_SESSION["username"] = $user;
						header("Location: index.php?action=home");
					}
					else {
						header("Location: index.php?action=login");
					}
				}

				if(!$loggedIn) {
					$this->view = new view($local,$_GLOBALS["include_path"]);
					$this->view->initialize($this);
					$this->view->output("loginForm.php");
				}
			}
			else {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("greeting.php");
			}
		}
		else {
			if($action == "logout") {
				session_destroy();
				header("Location: index.php?action=start");
			}
			elseif($action == "adminMain" ||
				   $action == "adminUserList" ||
				   $action == "adminEditUser" ||
				   $action == "adminNewUser") {
				if(isset($_GET["password1"])) {
					$fname = $_GET["fname"];
					$lname = $_GET["lname"];
					$uname = $_GET["uname"];
					$email = $_GET["email"];
					$pass = $_GET["password1"];
					$this->model->createUser($fname,$lname,$uname,$pass,$email);
					header("Location: index.php?action=adminUserList");
				}
				else {
					$this->view = new view($local,$_GLOBALS["include_path"]);
					$this->view->initialize($this);
					$this->view->output($action . ".php");
				}
			}
			elseif($action == "home") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("welcome.php");
			}
			elseif($action == "pantryMain" ||
				   $action == "pantryCreate") {
				if(isset($_GET["name"])) {
					$this->model->createPantry($_SESSION["userid"],$_GET["name"],$_GET["notes"]);
					header("Location: index.php?action=pantryMain");
				}
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output($action . ".php");	
			}
			elseif($action == "pantryShare") {
				$pid = isset($_GET["share_id"]) ? $_GET["share_id"] : false;
				if($pid) {
					$_SESSION["share_id"] = $pid;
					$this->view = new view($local,$_GLOBALS["include_path"]);
					$this->view->initialize($this);
					$this->view->output($action . ".php");
					unset($_SESSION["share_id"]);
				}
				elseif(isset($_GET["user_id"])) {
					$uid = $_GET["user_id"];
					$pid = $_GET["pantry_id"];
					$this->model->sharePantry($pid,$uid);
					header("Location: index.php?action=pantryMain");
				}
				else {
					header("Location: index.php?action=pantryMain");
				}
			}
			elseif($action == "pantryDelete") {
				$pid = isset($_GET["pantry_id"]) ? $_GET["pantry_id"] : false;
				if($pid) {
					$this->model->deletePantry($pid);
				}
				header("Location: index.php?action=pantryMain");
			}
			elseif($action == "pantryDetail") {
				$pid = isset($_GET["pid"]) ? $_GET["pid"] : false;
				if($pid) {
					$_SESSION["pid"] = $pid;
					$this->view = new view($local,$_GLOBALS["include_path"]);
					$this->view->initialize($this);
					$this->view->output($action . ".php");
					unset($_SESSION["pid"]);
				}
				else {
					header("Location: index.php?action=pantryMain");
				}
			}
			elseif($action == "pantryAddItem") {
				$pantry_id = $_GET["pantry_id"];
				$product_id = $_GET["product_id"];
				$quantity = $_GET["quantity"];
				$threshold = $_GET["threshold"];
				$this->model->addItemToPantry($pantry_id,$product_id,$quantity,$threshold);
				header("Location: index.php?action=pantryDetail&pid=${pantry_id}");
			}
			elseif($action == "pantryEdit") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output($action . ".php");
			}
			elseif($action == "productMain") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("${action}.php");
			}
			elseif($action == "productCreate") {
				$name = $_GET["name"];
				$fid = $_GET["food_id"];
				$notes = $_GET["notes"];
				$this->model->createProduct($name,$fid,$notes);
				header("Location: index.php?action=productMain");
			}
			elseif($action == "foodMain") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("${action}.php");	
			}
			elseif($action == "foodCreate") {
				$name = $_GET["name"];
				$category = $_GET["category"];
				$notes = $_GET["notes"];
				$this->model->createFood($name,$category,$notes);
				header("Location: index.php?action=foodMain");
			}
			elseif($action == "recipeMain") {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("${action}.php");
			}
			else {
				$this->view = new view($local,$_GLOBALS["include_path"]);
				$this->view->initialize($this);
				$this->view->output("welcome.php");
			}
		}
	}

	public function getMenuItems() {
		$items = array();
		if(isset($_SESSION["username"])) {
			$user = $_SESSION["username"];
			$query = "SELECT * FROM menus WHERE user=${user}";
			$items["Pantry"] = "index.php?action=pantryMain";
			$items["Products"] = "index.php?action=productMain";
			$items["Foods"] = "index.php?action=foodMain";
			$items["Recipes"] = "index.php?action=recipeMain";
			$items["Admin"] = "index.php?action=adminMain";
			$items["Logout"] = "index.php?action=logout";
		}
		else {
			$items["Login"] = "index.php?action=login";
		}
		return $items;
	}

	public function getModel() {
		return $this->model;
	}
}
?>