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

use \de\codenamephp\platform\core\file\property\Entry;
use \de\codenamephp\platform\core\file\property\File;
use \de\codenamephp\platform\core\TestCase;
use \org\bovigo\vfs\vfsStream;

/**
 *
 * @author Bastian Schwarz <bastian@codename-php.de>
 */
class StreamTest extends TestCase {

  /**
   *
   * @var Stream
   */
  private $sut = null;

  protected function setUp() {
    parent::setUp();

    $this->sut = new Stream();

    vfsStream::setup();
  }

  public function testwrite_CanWriteLineToFile_ForEachEntry() {
    $file = $this->mock('\SplFileObject')->fwrite(['prop1=value1' . PHP_EOL], self::at(0))
            ->fwrite(['prop2=value2' . PHP_EOL], self::at(1))
            ->fwrite(['prop3=value3' . PHP_EOL], self::at(2))
            ->new(vfsStream::url('root/somefile'), 'w');

    $propertyFile = new File();
    $propertyFile
            ->addEntry(new Entry('prop1', 'value1'))
            ->addEntry(new Entry('prop2', 'value2'))
            ->addEntry(new Entry('prop3', 'value3'));

    $this->sut->write($file, $propertyFile);
  }

  public function testwrite_canReturnSelf() {
    self::assertSame($this->sut, $this->sut->write($this->mock('\SplFileObject')->new(vfsStream::url('root/somefile'), 'w'), new File()));
  }
}
