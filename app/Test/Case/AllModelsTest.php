<?php
class AllModelsTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All models tests');
        $suite->addTestDirectory(TESTS . 'Case' . DS . 'Model');
        return $suite;
    }
}
