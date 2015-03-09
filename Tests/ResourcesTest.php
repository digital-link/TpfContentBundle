<?php

namespace Oz\Tpf\ContentBundle\Tests;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ResourcesTest extends \PHPUnit_Framework_TestCase
{
    public function testTranslations()
    {
        /** @var SplFileInfo $file */

        $finder = new Finder();
        $finder->in(__DIR__.'/../Resources/translations');
        foreach($finder->files() as $file)
        {
            $xml = @simplexml_load_string($file->getContents());
            $this->assertNotFalse($xml, $file->getRelativePathname().' is wrong');
        }
    }

    public function testViews()
    {
        $this->markTestSkipped();

        /** @var SplFileInfo $file */

        $finder = new Finder();
        $finder->in(__DIR__.'/../Resources/views/fr');
        foreach($finder->files() as $file)
        {
            $filename = str_replace('views/fr', 'views/de', $file->getPathname());
            $this->assertFileExists($filename);
        }
    }
}
