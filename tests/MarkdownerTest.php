<?php
/**
 * Created by PhpStorm.
 * User: mnobrega
 * Date: 06-09-2015
 * Time: 20:37
 */

class MarkdownerTest extends TestCase
{
    protected $markdown;

    public function setup()
    {
        $this->markdown = new \App\Services\Markdowner();
    }

    public function testSimpleParagraph()
    {
        $this->assertEquals(
            "<p>test</p>\n",
            $this->markdown->toHTML('test')
        );
    }
}