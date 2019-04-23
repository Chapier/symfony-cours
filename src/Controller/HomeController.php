<?php
/**
 * Created by PhpStorm.
 * User: tguillemin
 * Date: 18/01/2019
 * Time: 15:48
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/hello/{prenom}/age/{age}", name="hello")
     * @Route("/salut" , name="hello_base")
     * @Route("/hello/{prenom}/{age}" , name="hello_prenom")
     * Montre la page qui dit bonjour
     */
    public function hello($prenom = "anonyme", $age = 0){
        return $this->render(
            'hello.html.twig',
            [
                'prenom' => $prenom,
                'age' => $age
            ]
        );
    }
    /**
     * @Route("/", name="homepage")
     */
    public function home(){
        $prenom = ["Lior" => 31, "Jospeh" => 12, "Anne" => 55];
        return $this->render(
            'home.html.twig',
            [
                'title' => "Bonjour à tous",
                'age' => 15,
                'tableau' => $prenom
            ]
        );
    }



}