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
namespace de\codenamephp\platform\core\file\property\writer;

/**
 * Writes a property file via stream to a given file
 *
 * @author Bastian Schwarz <bastian@codename-php.de>
 */
class Stream implements iWriter {

  public function write(\SplFileObject $file, \de\codenamephp\platform\core\file\property\Entries $propertyFile) {
    foreach($propertyFile->getEntries() as $entry) {
      $file->fwrite(sprintf('%s=%s' . PHP_EOL, $entry->getKey(), $entry->getValue()));
    }
    return $this;
  }
}
