<?php
/**
* Created by PhpStorm.
* User: wcs
* Date: 23/10/17
* Time: 10:57
* PHP version 7
*/

namespace Model;

/**
* Class Article
*
*/
class Article
{
    private $id;
    private $publication_date;
    private $link;
    private $title;
    private $author;
    private $content;
    private $thumbnails;


  /**
  * @return int
  */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Article
     */
    public function setId(int $id): Article

    {
        $this->id = $id;

        return $this;
    }

  /**
  * @return mixed
  */
    public function getTitle(): string
    {
        return $this->title;
    }

  /**
  * @param mixed $title
  *
  * @return Article
  */
    public function setTitle($title):Article
    {
        $this->title = $title;

        return $this;
    }
  /**
  * @return mixed
  */
    public function getPublicationDate(): string
    {
        return $this->publication_date;
    }

  /**
  * @param mixed $title
  *
  * @return Article
  */
    public function setPublicationDate($publication_date):Article
    {
        $this->publication_date = $publication_date;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getLink(): string

    {
        return $this->link;
    }
    /**
     * @param mixed $title
     *
     * @return Article
     */
    public function setlink($link):Article
    {
        $this->link= $link;

        return $this;
    }
    /**
    * @return mixed
    */
    public function getAuthor(): string
    {
        return $this->author;
    }

  /**
  * @param mixed $title
  *
  * @return Article
  */
    public function setAuthor($author):Article
    {
        $this->author= $author;

        return $this;
    }
  /**
  * @return mixed
  */
    public function getContent(): string
    {
        return $this->content;
    }

  /**
  * @param mixed $title
  *
  * @return Article
  */
    public function setContent($content):Article
    {
      $this->content = $content;


        return $this;
    }
  /**
  * @return mixed
  */
    public function getThumbnails(): string
    {
        return $this->thumbnails;
    }

  /**
  * @param mixed $title
  *
  * @return Article
  */
    public function setThumbnails($thumbnails):Article
    {
      $this->thumbnails = $thumbnails;


        return $this;
    }
}
