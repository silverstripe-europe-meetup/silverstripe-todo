<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marcus Dalgren
 * Date: 2013-06-15
 * Time: 20:05
 * To change this template use File | Settings | File Templates.
 */

class RestController extends Controller {
	public static $allowed_actions = array('index', 'create', 'store', 'show', 'edit', 'update', 'destroy');

	public function init() {
		parent::init();
		$response = $this->getResponse()->addHeader('Content-Type', 'application/json');
	}

	public function hasAction($action) {
		return true;
	}

	public function checkAccessAction($action) {
		return true;
	}

	protected function handleAction(SS_HTTPRequest $request, $action) {
		foreach($request->latestParams() as $k => $v) {
			if($v || !isset($this->urlParams[$k])) $this->urlParams[$k] = $v;
		}
		$className = get_class($this);
		$restAction = $this->urlParams["Action"];
		$controllerAction = str_replace("-", "_",  $restAction);
		if (!method_exists($this, $controllerAction)) {
			switch ($request->httpMethod()) {
				case "GET":
					if ($action == "" || $action == "index")
						$action = "index";
					else {
						$action = "show";
					}
					break;
				case "POST":
					$action = "store";
					break;
				case "PUT":
					$action = "store";
					break;
				case "DELETE":
					$action = "destroy";
					break;
				default:
					break;
			}
		}
		else {
			$reflection = new ReflectionMethod($this, $controllerAction);
			if (!$reflection->isPublic()) {
				return new SS_HTTPResponse("Action '$controllerAction' isn't available on class $className.", 404);
			}
			$action = $controllerAction;
			$restAction = $this->urlParams;
		}

		$this->action = $action;
		$this->requestParams = $request->requestVars();

		if(!$this->hasMethod($action)) {
			return new SS_HTTPResponse("Action '$action' isn't available on class $className.", 404);
		}

		$res = $this->extend('beforeCallActionHandler', $request, $action);
		if ($res) return reset($res);

		$actionRes = $this->$action($restAction);

		$res = $this->extend('afterCallActionHandler', $request, $action);
		if ($res) return reset($res);
		if ($actionRes === null) {
			$this->getResponse()->setStatusCode(404);
			$actionRes = json_encode(array("flash" => "Not found"));
		}

		return json_encode($actionRes);
	}

	protected function JSON($object, $statusCode = 200) {

	}
}