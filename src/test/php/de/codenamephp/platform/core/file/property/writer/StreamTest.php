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

use de\codenamephp\platform\core\file\property\Entries;
use de\codenamephp\platform\core\file\property\Entry;
use de\codenamephp\platform\core\TestCase;
use org\bovigo\vfs\vfsStream;

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
    $file = $this->getMockBuilder(\SplFileObject::class)->setConstructorArgs([vfsStream::url('root/somefile'), 'w'])->getMock();
    $file
      ->expects(self::exactly(3))
      ->method('fwrite')
      ->withConsecutive(['prop1=value1' . PHP_EOL], ['prop2=value2' . PHP_EOL], ['prop3=value3' . PHP_EOL]);

    $propertyFile = new Entries();
    $propertyFile
            ->addEntry(new Entry('prop1', 'value1'))
            ->addEntry(new Entry('prop2', 'value2'))
            ->addEntry(new Entry('prop3', 'value3'));

    $this->sut->write($file, $propertyFile);
  }

  public function testwrite_canReturnSelf() {
    self::assertSame($this->sut, $this->sut->write($this->getMockBuilder(\SplFileObject::class)->setConstructorArgs([vfsStream::url('root/somefile'), 'w'])->getMock(), new Entries()));
  }
}
