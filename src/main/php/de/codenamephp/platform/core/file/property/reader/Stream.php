<?php
/*
 * Copyright 2014 Bastian Schwarz <bastian@codename-php.de>.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * @namespace
 */
namespace de\codenamephp\platform\core\file\property\reader;

/**
 * Reads a property file via stream so filesize won't matter
 *
 * @author Bastian Schwarz <bastian@codename-php.de>
 */
class Stream implements iReader {

  /**
   * Reads the given file via stream and sets the properties as de\codenamephp\platform\core\file\property\Entry[] to the file de\codenamephp\platform\core\file\property\File
   * @param \SplFileObject $file
   * @return \de\codenamephp\platform\core\file\property\Entries The loaded property file
   */
  public function read(\SplFileObject $file) {
    $propertyFile = new \de\codenamephp\platform\core\file\property\Entries();
    foreach($file as $line) {
      $keyValue = explode('=', $line);
      $propertyFile->addEntry(new \de\codenamephp\platform\core\file\property\Entry(trim($keyValue[0]), trim($keyValue[1])));
    }
    return $propertyFile;
  }
}
