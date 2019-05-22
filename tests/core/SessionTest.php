<?php

class SessionTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        session_start();
    }

    /**
     * @runInSeparateProcess
     */
    public function testInit()
    {
        if (session_id() !== '') session_destroy();
        Session::init();
        $this->assertFalse(session_id() === '');
    }

    /**
     * @runInSeparateProcess
     */
    public function testDestroy()
    {
        if (session_id() === '') session_start();
        Session::destroy();
        $this->assertTrue(session_id() === '');
    }

    /**
     * @runInSeparateProcess
     */
    public function testSet()
    {
        $this->assertFalse(isset($_SESSION['test_key']));
        Session::set('test_key', 'value');
        $this->assertEquals('value', $_SESSION['test_key']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGet()
    {
        $this->assertEquals(null, Session::get('test_key'));
        $_SESSION['test_key'] = 'value';
        $this->assertEquals('value', Session::get('test_key'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testAdd()
    {
        $_SESSION['test_key'] = array();
        $this->assertEquals(array(), $_SESSION['test_key']);
        Session::add('test_key', 'value');
        $this->assertEquals(array('value'), $_SESSION['test_key']);
    }
}