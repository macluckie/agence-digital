<?php
/**
* Created by PhpStorm.
* User: root
* Date: 11/10/17
* Time: 16:07
* PHP version 7
*/

namespace Controller;

/**
* Class ItemController
*
*/
class tetraDigitalController extends AbstractController
{

    public function tetradigital()
    {




        return $this->twig->render('tetraDigital/index.html.twig');
    }


    public function login()
    {




        return $this->twig->render('tetraDigital/login.html.twig');
    }
}
