<?
	
require_once "__config.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/database.php";

$app = new Controller();

switch ($app->params['action']) {
	
	case 'book':
		 $app->book();
	break;

	case 'author':
		 $app->author();
	break;

	case 'category':
		 $app->category();
	break;

	case 'cart':
		 $app->cart();
	break;

	case 'checkout':
		 $app->checkout();
	break;

	case 'contact':
		 $app->contact();
	break;

	case 'error':
		 $app->error();
	break;
	
	default:
		$app->index();
	break;
}

$app->end();

?>