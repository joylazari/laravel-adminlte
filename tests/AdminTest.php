<?php

use GionniValeriana\laravelAdminlte\Adminlte;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use SleepingOwl\Admin\Admin;

/**
 * Class AdminTest
 *
 * @author Joy Lazari <joy.lazari@gmail.com>
 */
class AdminlteTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \SleepingOwl\Admin\Menu\MenuItem
     */
    protected $MockedBaseMenuItem;
    /**
     * @var \GionniValeriana\laravelAdminlte\MenuItem
     */
    protected $MockedMenuItem;

    public function setUp() {

        parent::setUp();

        /** @var \Illuminate\Foundation\Application|\PHPUnit_Framework_MockObject_Builder_InvocationMocker $app */
        $app = $this->getMockBuilder('\Illuminate\Foundation\Application')->disableOriginalConstructor()->getMock();
        $app->method('make')->willReturn('\GionniValeriana\laravelAdminlte\Adminlte');
        Illuminate\Container\Container::setInstance(new Container());
        Facade::setFacadeApplication($app);

        $this->MockedBaseMenuItem = $this->getMockBuilder('\SleepingOwl\Admin\Menu\MenuItem')
            ->disableOriginalConstructor()->getMock();
        $this->MockedMenuItem = $this->getMockBuilder('\GionniValeriana\laravelAdminlte\MenuItem')
            ->disableOriginalConstructor()->getMock();
    }

    public function testInstance(){
        $this->assertInstanceOf(
            '\GionniValeriana\laravelAdminlte\Adminlte',
            Adminlte::instance()
        );
    }

}