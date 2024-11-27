<?php

use Phroute\Phroute\RouteCollector;
use App\controllers\admin\AccountController;
use App\controllers\admin\GenreController;
use App\controllers\admin\FilmController as AdminFilmController;
use App\controllers\admin\StatisticalController;
use App\controllers\admin\TicketController;
use App\models\admin\Export;

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
$router->get('filmDetails/{id}', [UserFilmController::class, 'getFilmDetails']);
$router->get('filmByGenre/{id}', [UserFilmController::class, 'filmByGenre']);
$router->get('film', [UserFilmController::class, 'film']);
$router->post('film', [UserFilmController::class, 'film']);
$router->post('comment/{id}', [UserFilmController::class, 'postComment']);
$router->post('filmDetails/{id}', [UserFilmController::class, 'getFilmDetails']);
$router->post('checkout', [UserFilmController::class, 'checkOut']);
$router->get('payment', [UserFilmController::class, 'payment']);
$router->post('payment', [UserFilmController::class, 'payment']);
$router->get('thank', [UserFilmController::class, 'thank']);
$router->get('paymentMomo', [UserFilmController::class, 'paymentMomo']);
$router->get('my_ticket', [UserFilmController::class, 'myTicket']);


// Login

$router->get('login', [LoginController::class, 'login']);
$router->get('signup', [LoginController::class, 'signup']);
$router->post('signup', [LoginController::class, 'signup']);
$router->get('logout', [LoginController::class, 'logout']);
$router->post('loginAuth', [LoginController::class, 'loginAuth']);
$router->get('forgot_password', [LoginController::class, 'forgotPass']);
$router->post('forgot_password', [LoginController::class, 'forgotPass']);
$router->get('confirm_code', [LoginController::class, 'confirmCode']);
$router->post('confirm_code', [LoginController::class, 'confirmCode']);
$router->get('change_password', [LoginController::class, 'change_password']);
$router->post('change_password', [LoginController::class, 'change_password']);



// Begin: Router Film =========================================================
$router->get('dashBoard', [AdminFilmController::class, 'getFilm']);
$router->get('filmManager', [AdminFilmController::class, 'getFilm']);

//Add 
$router->get('addFilm', [AdminFilmController::class, 'addFilm']);
$router->post('addFilm', [AdminFilmController::class, 'addFilm']);
//Add ShowFilm
$router->get('addShowFilm', [AdminFilmController::class, 'addShowFilm']);

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
$router->get('confirmPayment/{id}', [TicketController::class, 'confirmPayment']);
$router->get('printTicket/{id}', [TicketController::class, 'printTicket']);
$router->get('confirmTicket/{id}', [TicketController::class, 'confirmTicket']);

$router->get('orderTicketManager', [TicketController::class, 'getOrderTicket']);
$router->post('orderTicketManager', [TicketController::class, 'getOrderTicket']);
$router->get('export', [Export::class, 'export']);

$router->get('filmStatiscal', [StatisticalController::class, 'filmStatiscal']);
$router->get('commentStatistical', [StatisticalController::class, 'commentStatistical']);
$router->get('revenueStatistical', [StatisticalController::class, 'revenueStatistical']);
$router->get('genreStatistical', [StatisticalController::class, 'genreStatistical']);
$router->get('ProcessChart', [StatisticalController::class, 'ProcessChart']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>