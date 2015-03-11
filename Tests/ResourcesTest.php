<?php

namespace Oz\Tpf\ContentBundle\Tests;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Translation\Loader\XliffFileLoader;

class ResourcesTest extends \PHPUnit_Framework_TestCase
{
    public function testTranslations()
    {
        /** @var SplFileInfo $file */

        $finder = new Finder();
        $finder->in(__DIR__.'/../Resources/translations');
        foreach($finder->files() as $file)
        {
            $loader = new XliffFileLoader();
            $loader->load($file, 'fr');
        }
    }

    public function testViews()
    {
        /** @var SplFileInfo $file */

        $finder = new Finder();
        $finder->in(__DIR__.'/../Resources/views/fr');
        foreach($finder->files() as $file)
        {
            $filename = str_replace('views/fr', 'views/de', $file->getPathname());
            $this->assertFileExists($filename);

            $filename = str_replace('views/fr', 'views/en', $file->getPathname());
            $this->assertFileExists($filename);
        }
    }
}
