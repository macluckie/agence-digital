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
* Class Portfolio
*/
class Portfolio
{

  private $id;
  private $link;
  private $description;
  private $id_categories;

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
  * @return Portfolio
  */
  public function setId($id): Portfolio
  {
    $this->id = $id;

    return $this;
  }

  /**
  * @return mixed
  */
  public function getLink(): string
  {
    return $this->link;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setDescription($description):Portfolio
  {
    $this->description = $description;

    return $this;
  }

  public function getid_categories(): string
  {
    return $this->id_categories;
  }

  public function setid_categories(): string
  {
    return $this->id_categories = $id_categories;
  }


  /**
  * @param mixed $title
  *
  * @return Portfolio
  */
  public function setLink($link):Portfolio
  {
    $this->link = $link;

    return $this;
  }
}
