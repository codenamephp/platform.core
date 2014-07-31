<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @namespace
 */
namespace de\codenamephp\platform\core\file\property;

/**
 * Entity representing a property file entry
 *
 * @author Bastian Schwarz <bastian@codename-php.de>
 */
class Entry {

  /**
   * The key the value is identified by
   *
   * @var string
   */
  private $key = '';

  /**
   * The value
   *
   * @var string
   */
  private $value = '';

  public function __construct($key, $value) {
    $this->setKey($key);
    $this->setValue($value);
  }

  /**
   *
   * @return string
   */
  public function getKey() {
    return $this->key;
  }

  /**
   *
   * @param type $key
   * @return self
   */
  public function setKey($key) {
    $this->key = (string) $key;
    return $this;
  }

  /**
   *
   * @return string
   */
  public function getValue() {
    return $this->value;
  }

  /**
   *
   * @param string $value
   * @return self
   */
  public function setValue($value) {
    $this->value = (string) $value;
    return $this;
  }
}
