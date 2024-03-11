<?php

namespace app\commands;

class SeederController extends \yii\console\Controller
{
    private string $path = '/app/seeders/';
    private string $defaultSeeder = '/app/custom/ClassSeeder.php';

    private array $listClassSeeder = [
        'CategoriesSeeder',
        'UsersSeeder',
        'StocksSeeder',
        'ProductSeeder',
        'PopularSeeder',
    ];

    public function actionCreateSeeder($name)
    {
        try {
            $view = file_get_contents($this->defaultSeeder);
            $newFile = fopen($this->path . $name . '.php', 'w');
            fwrite($newFile, $view);

            print "Create seeder: $this->path$name.php";
        } catch (\ErrorException $e) {
            print "Error seeder: $e";
        }
    }

    public function actionExecuteSeederUp($class)
    {
        $seederClass = "\\app\\seeders\\$class";
        try {

            $classObj = new $seederClass;
            $classObj->up();

            print "Execute seeder: $this->path$class.php" . "\n";
        } catch (\ErrorException $e) {
            print "Error seeder: $e";
        }
    }

    public function actionExecuteSeederDown($class)
    {
        $seederClass = "\\app\\seeders\\$class";
        try {
            $classObj = new $seederClass;
            $classObj->down();
            print "Execute seeder: $this->path$class.php" . "\n";
        } catch (\ErrorException $e) {
            print "Error seeder: $e";
        }
    }

    public function actionExecuteSeedersUp()
    {
        $seederClass = "\\app\\seeders\\";
        try {
            foreach ($this->listClassSeeder as $seederClassItem) {
                $activeClass = $seederClass . $seederClassItem;
                $objActive = new $activeClass();
                $objActive->up();
                print "Execute seeder: $seederClassItem \n";
            }
        } catch (\ErrorException $e) {
            print "Error seeders: $e";
        }
    }
    public function actionExecuteSeedersDown()
    {
        $seederClass = "\\app\\seeders\\";
        try {
            foreach ($this->listClassSeeder as $seederClassItem) {
                $activeClass = $seederClass . $seederClassItem;
                $objActive = new $activeClass();
                $objActive->down();
                print "Delete seeder: $seederClassItem \n";
            }
        } catch (\ErrorException $e) {
            print "Error seeders: $e";
        }
    }
}

