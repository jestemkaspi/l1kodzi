<?php

declare(strict_types=1);

namespace App\Handler;

use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Router;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;

class RegistrationHandler implements RequestHandlerInterface
{
    /** @var string */
    private $containerName;

    /** @var Router\RouterInterface */
    private $router;

    /** @var null|TemplateRendererInterface */
    private $template;

    private $entityManager;

    public function __construct(
        string $containerName,
        Router\RouterInterface $router,
        ?TemplateRendererInterface LoginHandler.php = null,
        EntityManager $entityManager
    ) {
        $this->containerName = $containerName;
        $this->router        = $router;
        $this->template      = $template;
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface

    {

        $data = [];

        $usersRepository = $this->entityManager->getRepository('App\Entity\User');

        $data['users'] = $usersRepository->findAll();



$errors = array();
$username = "";
$email = "";

// if user clicks on the sign up button
if (isset($_POST['signup - btn'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordConf = $_POST['passwordConf'];

  // validation
  if (empty($username)) {
    $errors['username'] = "Username required";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email address is invalid";
  }
  if (empty($email)) {
    $errors['email'] = "Email required";
  }
  if (empty($password)) {
    $errors['password'] = "Password required";
  }
  if ($passowrd !== $passwordConf) {
    $errors['password'] = "The two password do not match";
  }

  $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1"
  $stmt = $conn->prepare($emailQuery);
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $userCount = $result->num_rows;
  $this->entityManager
$usersRepository = $this->entityManager->getRepository('App\Entity\User');

        $data['users'] = $usersRepository->







  if ($userCount > 0) {
    $errors['email'] = "Email already exists";
  }

  if (count($errors) === 0) {
	 $password = password_hash($password, PASSWORD_DEFAULT);
	 $token = bin2hex(random_bytes(50));
	 $verified = false;

	 $sql = "INSERT INTO users (username, mail, verified, token, password) VALUES (?, ?, ?, ?, ?)";
	 $stmt = $conn->prepare($emailQuery);
     $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password);


     if ($stmt->execute()) {
        // login user
        $user_id = $conn->insert_id;
		$_SESSION['id'] = $user_id;
		$_SESSION['username'] = $username;
	    $_SESSION['email'] = $email;
		$_SESSION['verified'] = $verified;
		// set flash message
		$_SESSION['message'] = "You are now logged in!";
		$_SESSION['alert -class'] = "alert-success";

        exit();

     } else {
       $errors['db_errors'] = "Database error: failed to register";
     }
  }




}
















        return new HtmlResponse($this->template->render('app::login', $data));
    }
}
