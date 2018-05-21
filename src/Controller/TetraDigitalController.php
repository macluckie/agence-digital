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
* Class TetraDigitalController
*/
class TetraDigitalController extends AbstractController
{

    public function tetradigital()
    {




        return $this->twig->render('tetraDigital/index.html.twig');
    }






    public function storyTelling()
    {

        return $this->twig->render('tetraDigital/storytelling.html.twig');
    }

    public function adminStorytelling()
    {

        if (!isset($_SESSION['login']) and !isset($_SESSION['password'])) {
            header('location:/login');
        }


        if(isset($_GET['deconnexion'])){
          unset($_SESSION['login']);
          unset($_SESSION['password']);
          session_destroy();
          header('location: /login');
        }
        $file = "../src/View/tetraDigital/story.html.twig";

        $lecture = file_get_contents($file);


        if (isset($_POST['changeStory'])) {
          //  var_dump($_POST['changeStory']);
            $readFile = fopen($file, "w");
            fwrite($readFile, $_POST['changeStory']);
            fclose($readFile);
            header('location: http://localhost:8000/adminstorytelling ');
        }

        return $this->twig->render('tetraDigital/adminstorytelling.html.twig', ['lecture' => $lecture]);
    }

    public function login()
    {


        if (isset($_POST['login']) and isset($_POST['password'])) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];

            if ($_SESSION['login'] === "admin" and $_SESSION['password'] === "azerty") {
                header('location:/portfolio/create');
            }
              elseif($_SESSION['login'] != "admin" and $_SESSION['password'] != "azerty"){

                $error = "Merci de vous indentifier correctement";
                return $this->twig->render('tetraDigital/login.html.twig', ['error'=>$error]);

              }


        } else {
            return $this->twig->render('tetraDigital/login.html.twig');
        }
    }



    public function contact()
    {
      /*
      *
      *
      *
      * Display item listing
      *
      * @return string
      */

        if (isset($_POST['nom']) and  isset($_POST['prenom']) and isset($_POST['telephone']) and isset($_POST['mail'])) {
            $mailer = new SendMail();

            $patternTelephone = "#^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$#";
            $patterNameLastname = "#^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$#";
            $emailPatterne = "#^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$#";


            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $telephone = strip_tags($_POST['telephone']);
            $email = strip_tags($_POST['mail']);
            $message = strip_tags($_POST['message']);

            if (preg_match($patternTelephone, $telephone) and preg_match($patterNameLastname, $prenom) and preg_match($patterNameLastname, $nom)
            and preg_match($emailPatterne, $email)
            ) {
                $body =
                '<!doctype html>
      <html>
      <head> <title>contact client</title>
      </head>

      <body>
      <br><strong>nom:'.$nom.
                '</strong><br><strong>prenom:'.$prenom.
                '</strong><br><strong>telephone:'.$telephone.
                '</strong><br><strong>mail: '.$email.
                '</strong><br> <p>'.$message.'</p>

      </body>
      </html>

      ';

                $mailer->send($email, 'Demande de Rappel Client', $body);
            } else {
                echo 'merci de saisir correctement le formulaire';
            }
        }
        return $this->twig->render('tetraDigital/contact.html.twig');
    }
}
