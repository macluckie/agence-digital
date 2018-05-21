<?php
/**
* Created by PhpStorm.
* User: root
* Date: 11/10/17
* Time: 16:07
* PHP version 7
*/

namespace Controller;

use Model\PortfolioManager;

/**
* Class PortfolioController
*/
class PortfolioController extends AbstractController
{

  public function index()
  {
    $portfolioManager = new PortfolioManager();
    $portfolio = $portfolioManager->selectAllPerso();



    if (isset($_GET['id'])) {
      $portfolioManager = new PortfolioManager();
      $portfolio = $portfolioManager->selectChantier($_GET['id']);


      return $this->twig->render('Portfolio/chantier.html.twig', ['portfolio' => $portfolio]);
    }


    return $this->twig->render(
      'Portfolio/index.html.twig',
      ['portfolio' => $portfolio,


    ]
  );
}


public function adminCreate()
{

  if (!isset($_SESSION['login']) and !isset($_SESSION['password'])) {
    header('location:/login');
  }


  if (isset($_GET['deconnexion'])) {
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    session_destroy();
    header('location: /login');
  }

  if (!empty($_POST) and !empty($_FILES)) {
    $PortfolioManager = new PortfolioManager();

    $fileName= $_FILES['picture']['name'];

    $file_tmp_name = $_FILES['picture']['tmp_name'];
    $file_destination = '../public/assets/images/'.$fileName;
    $fileextension = strrchr($fileName, '.');
    $sizefile = $_FILES['picture']['size'];

    $extension= ['.jpg','.png'];

    if (in_array($fileextension, $extension)) {
      if (move_uploaded_file($file_tmp_name, $file_destination)) {
        echo 'image uploadée ';
      }
    } else {
      echo 'une image de type jpeg ou png de taille inférieur a 100 Mo ';
    }

    $_POST['picture'] =  $file_destination;


    $Portfolio = $PortfolioManager->insert($_POST);


    return $this->twig->render('Portfolio/adminCreate.html.twig', ['Portfolio'=>$Portfolio]);
  } else {
    return $this->twig->render('Portfolio/adminCreate.html.twig');
  }
}



public function adminChange()
{
  if (!isset($_SESSION['login']) and !isset($_SESSION['password'])) {
    header('location:/login');
  }

  if (isset($_GET['deconnexion'])) {
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    session_destroy();
    header('location: /login');
  }

  $portfolioManager = new PortfolioManager();
  $portfolio = $portfolioManager->selectAllPerso();


  if (isset($_POST['validation'])) {
    $portfolioManager = new PortfolioManager();
    $portfolio = $portfolioManager->updatePerso($_POST);
    header('location: change');
    return $this->twig->render('Portfolio/adminChange.html.twig', ['portfolio' => $portfolio]);
  } else {
    return $this->twig->render('Portfolio/adminChange.html.twig', ['portfolio' => $portfolio]);
  }
}
}


/**
* Display Portfolio informations specified by $id
*
* @param int $id
*
* @return string
*/




/**
* Display Portfolio edition page specified by $id
*
* @param int $id
*
* @return string
*/


/**
* Display Portfolio creation page
*
* @return string
*/


/**
* Display Portfolio delete page
*
* @param int $id
*
* @return string
*/
