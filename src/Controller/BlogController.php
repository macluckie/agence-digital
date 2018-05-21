<?php
/**
* Created by PhpStorm.
* User: root
* Date: 11/10/17
* Time: 16:07
* PHP version 7
*/

namespace Controller;

use Model\ArticleManager;

/**
* Class BlogController
*
*/
class BlogController extends AbstractController
{
  /*
  *
  *
  *
  * Display blog listing
  *
  * @return string
  */

    public function index()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();
        return $this->twig->render('Blog/index.html.twig', ['articles' => $articles]);
    }

  /**
  * Display blog informations specified by $id
  *
  * @param  int $id
  *
  * @return string
  */

  public function details($id)
  {
    $articleManager = new ArticleManager();
    $article = $articleManager->selectOneById($id);

    return $this->twig->render('Blog/show.html.twig', ['article' => $article]);
  }



  /**
  * Display blog edition page specified by $id
  *
  * @param  int $id
  *
  * @return string
  */
    public function edit(int $id)
    {
      // TODO : edit blog with id $id
        return $this->twig->render('Blog/edit.html.twig', ['blog', $id]);
    }

  /**
  * Display blog creation page
  *
  * @return string
  */
    public function add()
    {
      // TODO : add a new blog
        return $this->twig->render('Blog/add.html.twig');
    }

  /**
  * Display blog delete page
  *
  * @param  int $id
  *
  * @return string
  */


    public function delete(int $id)
    {
      // TODO : delete the blog with id $id
        return $this->twig->render('Blog/index.html.twig');

    }

    public function portfolio()
    {
        $ArticleManager = new ArticleManager();
        $blogs = $ArticleManager->selectAll();

        return $this->twig->render('Blog/portfolio.html.twig', ['blogs' => $blogs]);
    }
}
