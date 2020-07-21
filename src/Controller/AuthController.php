<?php

namespace App\Controller;

use App\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AuthController
 * @package App\Controller
 *  just a quick dummy controller nothing fancy , im running out of time :P :P
 */
class AuthController extends AbstractController
{
    /**
     * ideally DocumentManager should be retrived from a container but
     * Abstract controller contraner does not privice doctrine_mongodb service so i would need a base controller
     * that would exctend the abstract controller and overide the getSubscribedServices  etc etc , to long
     * since i have consumed so much time with this
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder, DocumentManager $dm)
    {
        // can use extract() on object but this is safer
        ['username' => $username, "password" => $password] = json_decode($request->getContent(), true);

        $user = new User($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $dm->persist($user);
        $dm->flush();

        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }
}