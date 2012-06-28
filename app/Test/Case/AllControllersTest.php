<?php
class AllControllersTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All controllers tests');
        $suite->addTestDirectory(TESTS . 'Case' . DS . 'Controller');
        return $suite;
    }
}
