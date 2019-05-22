<?php

class ViewTest extends PHPUnit_Framework_TestCase
{
    private $View;

    public static function setUpBeforeClass()
    {
        file_put_contents(Config::get('PATH_VIEW') . 'render_1.php', '<h1><?php echo "Hello, "; ?><?= "World!" ?></h1>');
        file_put_contents(Config::get('PATH_VIEW') . 'render_2.php', '<h2>File <?= __FILE__ ?></h2>');
        file_put_contents(Config::get('PATH_VIEW') . 'render_3.php', '<h3><?= $this->message ?></h3>');
    }

    public static function tearDownAfterClass()
    {
        if (file_exists(Config::get('PATH_VIEW') . 'render_1.php')) unlink(Config::get('PATH_VIEW') . 'render_1.php');
        if (file_exists(Config::get('PATH_VIEW') . 'render_2.php')) unlink(Config::get('PATH_VIEW') . 'render_2.php');
        if (file_exists(Config::get('PATH_VIEW') . 'render_3.php')) unlink(Config::get('PATH_VIEW') . 'render_3.php');
    }

    public function setUp()
    {
        $this->View = new View();
    }

    /**
     * @runInSeparateProcess
     */
    public function testRender()
    {
        $this->expectOutputString("<h1>Hello, World!</h1>");
        $this->View->render('render_1', null, false);
    }

    /**
     * @runInSeparateProcess
     */
    public function testRenderWithData()
    {
        $this->expectOutputString("<h3>Hi there!</h3>");
        $this->View->render('render_3', array('message' => 'Hi there!'), false);
    }

    /**
     * @runInSeparateProcess
     */
    public function testRenderWithTemplate()
    {
        $expected = $this->getHeaderContents() . "<h1>Hello, World!</h1>" . $this->getFooterContents();
        $this->expectOutputString($expected);
        $this->View->render('render_1', null, true);
    }

    /**
     * @runInSeparateProcess
     */
    public function testRenderFiles()
    {
        $path = Config::get('PATH_VIEW');
        $this->expectOutputString("<h1>Hello, World!</h1><h2>File ${path}render_2.php</h2>");
        $this->View->renderFiles(array('render_1', 'render_2'), null, false);
    }

    /**
     * @runInSeparateProcess
     */
    public function testRenderFeedbackMessages()
    {
        $expected = '<div class="feedback success">Good!</div><div class="feedback error">Bad!</div>';
        $this->expectOutputString($expected);
        Session::set('feedback_positive', array('Good!'));
        Session::set('feedback_negative', array('Bad!'));
        $this->View->renderFeedbackMessages();
        $this->assertNull(Session::get('feedback_positive'));
        $this->assertNull(Session::get('feedback_negative'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testRenderJson()
    {
        $blob = array(
            'test' => 3,
            'arr' => array(1, 2, 3),
            'name' => 'hey',
            'blob' => array('name' => 'hi')
        );
        $this->expectOutputString(json_encode($blob));
        $this->View->renderJSON($blob);
    }

    public function testActiveController()
    {
        $this->assertTrue(View::checkForActiveController("index/index", "index"));
        $this->assertTrue(View::checkForActiveController("foo/bar", "foo"));
        $this->assertFalse(View::checkForActiveController("foo/bar", "bar"));
    }

    public function testActiveAction()
    {
        $this->assertTrue(View::checkForActiveAction("index/index", "index"));
        $this->assertTrue(View::checkForActiveAction("foo/bar", "bar"));
        $this->assertFalse(View::checkForActiveAction("foo/bar", "foo"));
    }

    public function testActiveControllerAndAction()
    {
        $this->assertTrue(View::checkForActiveControllerAndAction("index/index", "index/index"));
        $this->assertTrue(View::checkForActiveControllerAndAction("foo/bar", "foo/bar"));
        $this->assertFalse(View::checkForActiveControllerAndAction("foo/bar", "bar/foo"));
        $this->assertFalse(View::checkForActiveControllerAndAction("foo/bar", "foo/foo"));
        $this->assertFalse(View::checkForActiveControllerAndAction("foo/bar", "bar/bar"));
    }

    public function testEncodeHTML()
    {
        $original = "<br>'\"&'";
        $expected = "&lt;br&gt;&#039;&quot;&amp;&#039;";
        $this->assertEquals($expected, $this->View->encodeHTML($original));
    }

    private function getHeaderContents()
    {
        $contents = '';
        $before_templates = Config::get('TEMPLATE_BEFORE');
        if ($before_templates) {
            ob_start();
            foreach ($before_templates as $filename) {
                require Config::get('PATH_VIEW') . Config::get('PATH_TEMPLATE') . $filename;
            }
            $contents = ob_get_contents();
            ob_end_clean();
        }
        return $contents;
    }

    private function getFooterContents()
    {
        $contents = '';
        $after_templates = Config::get('TEMPLATE_AFTER');
        if ($after_templates) {
            ob_start();
            foreach ($after_templates as $filename) {
                require Config::get('PATH_VIEW') . Config::get('PATH_TEMPLATE') . $filename;
            }
            $contents = ob_get_contents();
            ob_end_clean();
        }
        return $contents;
    }
}
