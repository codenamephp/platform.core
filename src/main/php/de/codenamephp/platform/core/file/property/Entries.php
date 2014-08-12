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
 * Entity representing a property file
 *
 * @author Bastian Schwarz <bastian@codename-php.de>
 */
class Entries {

  /**
   * The entries of the file. The entry's key is set as array key so only unique keys are allowed
   *
   * @var Entry[]
   */
  private $entries = array();

  /**
   *
   * @return Entry[]
   */
  public function getEntries() {
    return $this->entries;
  }

  /**
   *
   * @param Entry[] $entries
   * @return self
   */
  public function setEntries(array $entries) {
    $this->entries = $entries;
    return $this;
  }

  /**
   *
   * Adds an entry to the entries collection an sets its key as array key, so only uique keys are allowed.
   *
   * @param \de\codenamephp\platform\core\file\property\Entry $entry
   */
  public function addEntry(Entry $entry) {
    $this->entries[$entry->getKey()] = $entry;
    return $this;
  }

  /**
   * Unsets an entry by its key
   * 
   * @param \de\codenamephp\platform\core\file\property\Entry $entry
   * @return self
   */
  public function removeEntry(Entry $entry) {
    unset($this->entries[$entry->getKey()]);
    return $this;
  }
}
