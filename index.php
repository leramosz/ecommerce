<?
	
require_once "__config.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/database.php";

$app = new Controller();

switch ($app->params['action']) {
	
	case 'books':
		 $app->books();
	break;

	case 'authors':
		 $app->authors();
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

	case 'wishlist':
		 $app->wishlist();
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