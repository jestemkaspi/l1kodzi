<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use http\Exception\BadHeaderException;
use JsonSchema\Exception\ValidationException;
use PHPUnit\Runner\Exception;
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
        ?TemplateRendererInterface $template = null,
        EntityManager $entityManager
    ) {
        $this->containerName = $containerName;
        $this->router        = $router;
        $this->template      = $template;
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface //TODO: dwie osobne metody na wyswietlanie formularza i tworzenie uzytkownikow
    {
        $_post = $request->getParsedBody();
        try {
            if (empty($_post['username'])) {
                throw new \Exception("Username required");
            }
            if (!filter_var($_post['email'], FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Email address is invalid");
            }
            if (empty($_post['email'])) {
                throw new \Exception("Email required");
            }
            if (empty($_post['password'])) {
                throw new \Exception("Password required");
            }
            if ($_post['password'] !== $_post['passwordConf']) {
                throw new \Exception("The two password do not match");
            }

            // check if email exists
            $usersRepository = $this->entityManager->getRepository('App\Entity\User');
            $usersByEmail = $usersRepository->findBy(['email' => $_post['email']]);

            if (sizeof($usersByEmail) > 0 )
                throw new \Exception('Email already exists');


            $user = new User();
            $user->setLogin($_post['username']);
            $user->setPassword($_post['password']); //TODO: nie trzymamy hasel w plaintext
            $user->setEmail($_post['email']);
            $this->entityManager->persist($user);
            $this->entityManager->flush();


        } catch (\Exception $e) {

            $data['error'] = $e->getMessage();
            return new HtmlResponse($this->template->render('app::register', $data)); //TODO: naprawic szablon - wyswietlanie bledow w innym miejscu

        }




        $data['error'] = "success!";

        return new HtmlResponse($this->template->render('app::register', $data));
    }
}
