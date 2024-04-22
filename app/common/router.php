<?php

use Phroute\Phroute\RouteCollector;
use App\controllers\admin\AccountController as AdminAccountCtrl;
use App\controllers\admin\DashBoardController;
use App\controllers\admin\GenreController;
use App\controllers\admin\FilmController as AdminFilmController;
use App\controllers\admin\StatisticalController;
use App\controllers\admin\TicketController;

// Begin: User
use App\controllers\auth\LoginController;
use App\controllers\user\FilmController as UserFilmController;
use App\controllers\user\HomeController;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
// $router->filter('auth', function(){
//     if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
//         header('location: ' . BASE_URL . 'login');die;
//     }
// });


//bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    header("Location:" . route('home'));
});

// Begin: Router User =========================================================
$router->get('home', [HomeController::class, 'home']);
$router->get('login', [LoginController::class, 'login']);
$router->post('loginAuth', [LoginController::class, 'loginAuth']);
$router->get('filmDetails/{id}', [UserFilmController::class, 'getFilmDetails']);
$router->post('comment/{id}', [UserFilmController::class, 'postComment']);

$router->get('bookticket/{id}&date={date}', []);









// Begin: Router Film =========================================================
$router->get('dashBoard', [DashBoardController::class, 'home']);
$router->get('filmManager', [AdminFilmController::class, 'getFilm']);
//Add 
$router->get('addFilm', [AdminFilmController::class, 'addFilm']);
$router->post('addFilm', [AdminFilmController::class, 'addFilm']);
//Edit 
$router->get('edit/{id}', [AdminFilmController::class, 'editFilm']);
$router->post('edit/{id}', [AdminFilmController::class, 'editFilm']);
//Delete 
$router->get('delete/{id}', [AdminFilmController::class, 'deleteFilm']);
// End: Router Film =========================================================

//Begin: Genre Manager
$router->get('genreManager', [GenreController::class, 'getGenre']);
$router->get('addGenre', [GenreController::class, 'addGenre']);
$router->post('addGenre', [GenreController::class, 'addGenre']);

// Begin: Router Account =========================================================
$router -> get('accountManager', [AccountController::class, 'getAccount']);
$router -> get('addAccount', [AccountController::class, 'addAccount']);
$router -> post('addAccount', [AccountController::class, 'addAccount']);
$router -> get('editAccount/{id}', [AccountController::class, 'editAccount']);
$router -> post('editAccount/{id}', [AccountController::class, 'editAccount']);
$router -> get('deleteAccount/{id}', [AccountController::class, 'deleteAccount']);
// End: Router Account =========================================================

// Begin: Router Tickets =========================================================
$router->get('ticketManager', [TicketController::class, 'getTickets']);
$router->get('orderTicketManager', [TicketController::class, 'getOrderTicket']);
$router->post('orderTicketManager', [TicketController::class, 'getOrderTicket']);


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>