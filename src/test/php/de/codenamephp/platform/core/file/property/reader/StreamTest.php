<?php
/**
 * Copyright 2017 CodenamePHP <mail@codename-php.de>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace de\codenamephp\platform\core\file\property\reader;

use de\codenamephp\platform\core\file\property\Entry;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use SplFileObject;

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

  public function testread_CanReadPropertiesFromFile() {
    vfsStream::create(['testfile.properties' => implode(PHP_EOL, ['prop1=value1', 'prop2=value2', 'prop3=value3'])]);

    $file = $this->sut->read(new SplFileObject(vfsStream::url('root/testfile.properties')));

    self::assertEquals([
      'prop1' => new Entry('prop1', 'value1'),
      'prop2' => new Entry('prop2', 'value2'),
      'prop3' => new Entry('prop3', 'value3'),
    ], $file->getEntries());
  }

  public function testread_CanReturnFile() {
    vfsStream::create(['testfile.properties' => '']);

    self::assertInstanceOf('\de\codenamephp\platform\core\file\property\Entries', $this->sut->read(new SplFileObject(vfsStream::url('root/testfile.properties'))));
  }
}
