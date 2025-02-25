<?php

namespace CRUD\model;

use CRUD\Db;

class Stock
{
  /*
    The variables are both the table name and the conection to the database
  */
  private $product;
  private $store;
  private $units;

  public function __construct($product, $store, $units)
  {
    $this->product = $product;
    $this->store = $store;
    $this->units = $units;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function getStore()
  {
    return $this->store;
  }

  public function getUnits()
  {
    return $this->units;
  }

  /*  Select all the data from the table which name is stored in the class variable $table
    returns all the data in the table
  */
  public static function getStocks()
  {
    $sql = "SELECT * FROM stock";
    $stmt = db::doSQL($sql);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  /*  Receiving a code, selects all the data from the stock which product is the same
        Returns all the info in that row
    */
  public function getStockByProduct($product)
  {
    if (is_null($product))
        return false;

    $sql = "SELECT * FROM " . $this->table . " WHERE product = ?";
    $stmt = db::doSQL($sql, [$product]);

    return $stmt->fetch();
  }

  /**
   * Receiving all the data needed, updates or create a row
   * @param type $stock
   * @return product of the stock updated or created
   */
  public function saveStock($stock)
  {
    /* Set default values */
    $product = $units = $store = "";

    /* Check if exists */
    $exists = false;
    if (isset($stock["product"]) && $stock["product"] != '') {
        $actualStock = $this->getStockByProduct($stock["product"]);
        if (isset($actualStock["product"])) {
            $exists = true;
        }
    }

    /* Received values */
    if (isset($stock["units"]))
        $units = $stock["units"];
    if (isset($stock["product"]))
        $product = $stock["product"];
    if (isset($stock["store"]))
        $store = $stock["store"];

    if ($units == "" || $product == "" || $store == "") {
        return false;
    }

    /* Database operations */
    if ($exists) {
        // Update existing stock
        $sql = "UPDATE " . $this->table . " SET units = ?, store = ? WHERE product = ?";
        $stmt = db::doSQL($sql, [$units, $store, $product]);
    } else {
        // Insert new stock
        $sql = "INSERT INTO " . $this->table . " (product, store, units) VALUES (?, ?, ?)";
        $stmt = db::doSQL($sql, [$product, $store, $units]);
    }

    return $product;
  }

  /* Deletes the stock which key Value is the same as the one of the parametres
    */
  public function deleteStockByProduct($product, $store)
  {
    $sql = "DELETE FROM " . $this->table . " WHERE product = ? AND store = ?";
    return db::doSQL($sql, [$product, $store]);
  }
}
