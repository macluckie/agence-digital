<?php
/**
* Created by PhpStorm.
* User: root
* Date: 11/10/17
* Time: 16:07
* PHP version 7
*/

namespace Controller;

use Model\ItemManager;

/**
* Class ItemController
*
*/
class ItemController extends AbstractController
{
  /*
  *
  *
  *
  * Display item listing
  *
  * @return string
  */
    public function index()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->selectAll();

        return $this->twig->render('Item/index.html.twig', ['items' => $items]);
    }

  /**
  * Display item informations specified by $id
  *
  * @param  int $id
  *
  * @return string
  */
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    }

  /**
  * Display item edition page specified by $id
  *
  * @param  int $id
  *
  * @return string
  */
    public function edit(int $id)
    {
      // TODO : edit item with id $id
        return $this->twig->render('Item/edit.html.twig', ['item', $id]);
    }

  /**
  * Display item creation page
  *
  * @return string
  */
    public function add()
    {
      // TODO : add a new item
        return $this->twig->render('Item/add.html.twig');
    }

  /**
  * Display item delete page
  *
  * @param  int $id
  *
  * @return string
  */
    public function delete(int $id)
    {
      // TODO : delete the item with id $id
        return $this->twig->render('Item/index.html.twig');
    }

    public function portfolio()
    {
        $itemManager = new ItemManager();
        $items = $itemManager->selectAll();

        return $this->twig->render('Item/portfolio.html.twig', ['items' => $items]);
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
            and preg_match($emailPatterne, $email)) {
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
        return $this->twig->render('Item/contact.html.twig');
    }
}
