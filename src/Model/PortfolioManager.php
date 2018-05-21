<?php
/**
* Created by PhpStorm.
* User: sylvain
* Date: 07/03/18
* Time: 18:20
* PHP version 7
*/

namespace Model;

/**
*
*/
class PortfolioManager extends AbstractManager
{
  const TABLE = 'Portfolio';

  /**
  *  Initializes this class.
  */
  public function __construct()
  {
    parent::__construct(self::TABLE);
  }

  public function delete(int $id)
  {
  }


  public function insert(array $data)
  {

    $picture = $data['picture'];
    $categories = $data['categories'] ;
    $description = $data['description'];
    //var_dump($data['picture']);
    $add = 'INSERT INTO '.$this->table.'(link, description, id_categories)
    VALUES(\''.$picture. '\',\'' .$description.'\',\'' .$categories.'\')';




    $statement = $this->pdoConnection->prepare($add);
    $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
    $statement->bindValue('link', $picture, \PDO::PARAM_INT);
    $statement->bindValue('description', $description, \PDO::PARAM_INT);
    $statement->bindValue('id_categories', $categories, \PDO::PARAM_INT);
    $statement->execute();
  }




  public function update(int $id, array $data)
  {
  }





  public function selectAllPerso()
  {


    return $this->pdoConnection->query(
      'SELECT Portfolio.id, link, description, id_categories, namecategories

      FROM ' . $this->table. ' JOIN categories ON id_categories = categories.id

      ORDER BY Portfolio.id DESC',
      \PDO::FETCH_CLASS,
      $this->className
      )->fetchAll();
    }

    public function selectChantier($getId)
    {


      return $this->pdoConnection->query(
        'SELECT Portfolio.id, link, description, id_categories, namecategories

        FROM ' . $this->table. ' JOIN categories ON id_categories = categories.id

        WHERE Portfolio.id ='.$getId,
        \PDO::FETCH_CLASS,
        $this->className
        )->fetchAll();
      }



      /**
      * @param int   $id   Id of the row to update
      * @param array $data $data to update
      */
      public function updatePerso($data)
      {

        $namepicture = $data['namepicture'];
        $categories = $data['listecategories'];
        $details= $data['details'];
        $id = $data['id'];






        $request = "UPDATE $this->table

        SET description='$details' , link= '$namepicture', id_categories= '$categories'
        WHERE id='$id'" ;

        $statement = $this->pdoConnection->prepare($request);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue($details, $details, \PDO::PARAM_STR);
        $statement->bindValue($categories, $categories, \PDO::PARAM_INT);
        $statement->bindValue($id, $id, \PDO::PARAM_INT);
        $statement->bindValue($namepicture, $namepicture, \PDO::PARAM_INT);
        $statement->execute();
      }
    }
