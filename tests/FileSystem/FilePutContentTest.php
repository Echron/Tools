<?php
declare(strict_types = 1);

class FilePutContentTest extends \PHPUnit\Framework\TestCase
{
    public function testPutContent()
    {
        $testFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'tmp' . gmdate('U') . rand(9999, 99999) . 'txt';

        $dummyValue = 'Lorem ipsum';

        \Echron\Tools\FileSystem::putFileContent($testFile, $dummyValue);

        $content = file_get_contents($testFile);
        $this->assertEquals($dummyValue, $content);

        unlink($testFile);
    }

    public function testPutContent_NonExistingDir()
    {
        $this->expectException(Exception::class);
        $testFile = 'X:tmp' . DIRECTORY_SEPARATOR . 'tmp' . gmdate('U') . rand(9999, 99999) . 'txt';

        $dummyValue = 'Lorem ipsum';

        \Echron\Tools\FileSystem::putFileContent($testFile, $dummyValue);

        $content = file_get_contents($testFile);
        $this->assertEquals($dummyValue, $content);

        unlink($testFile);
    }

}
