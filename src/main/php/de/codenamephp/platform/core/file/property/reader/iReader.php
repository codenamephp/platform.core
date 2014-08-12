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
 * Reader interface for properties file. This interface is responsible for loading de\codenamephp\platform\core\file\property\File instances
 * @author Bastian Schwarz <bastian@codename-php.de>
 */
interface iReader {

  /**
   * Reads and loads a properties file
   *
   * @param \SplFileObject $file
   * @return \de\codenamephp\platform\core\file\property\Entries The loaded property file
   */
  public function read(\SplFileObject $file);
}
