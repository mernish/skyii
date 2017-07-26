<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Class SkyiiController
 * @package console\controllers
 * @author Pankaj Sanam <pankaj.sanam@gmail.com>
 */
class SkyiiController extends Controller
{
    public $message;
    public $setCookieValidation = true;
    public $setHtaccess = true;
    
    /**
     * @param string $actionID
     * @return array
     */
    public function options($actionID)
    {
        return ['message', 'set_cookie_validation'];
    }
    
    /**
     * @return array
     */
    public function optionAliases()
    {
        return [
            'm' => 'message',
            'c' => 'set_cookie_validation'
        ];
    }
    
    public function actionIndex()
    {
        echo "\nAvailable commands: skyii/install\n";
    }
    
    public function actionInstall()
    {
        echo "\n\n======================\n";
        $name = $this->ansiFormat('Skyii', Console::FG_GREEN);
        $this->stdout("  $name Installation\n", Console::BOLD);
        echo "======================\n\n";
        
        echo "Welcome to the installation wizard of $name.";
        echo "\n\nYou are just a few steps away from creating something amazing." . "\n";
        echo "\nThis wizard will configure your application for use.";
        $isReady = $this->prompt($this->ansiFormat("\n\nSo are you ready to fly in the $name? (yes/no) ", Console::FG_CYAN));

        if (strtolower($isReady) !== 'yes') {
            echo "\nNo problem! Come back when you are ready to conquer the world. Bye!\n";

            return self::EXIT_CODE_NORMAL;
        }

        /**
         * Setup database name in config file
         */
        $db_name = $this->ask('Existing database name for this application:');
        if (!empty($db_name)) {
            $this->setupDatabase($db_name);
        }

        //sleep(2);

        /**
         * Setup cookie validation key
         */
        if ($this->setCookieValidation) {
            // Not needed because php init command will take care of this
            //$this->setupCookieValidationKey();
        }

        /**
         * Setup project path in htaccess
         * todo: Ask user if he has installed it in root of in a subdirectory
         * todo: Check if sub directory exists
         * todo: Add total number of steps and steps identification in the wizard.
         * todo: It is not accepting an input with "/"
         * 
         */
        echo "\nIf you are installing this project in a sub directory then enter the name followed by your sub directory\n";
        $project_path = $this->ask('Enter the project folder (Leave empty if project is in root folder):');
        if ($this->setHtaccess) {
            $this->setupHtaccess($project_path);
        }

        /**
         * Run migration
         */
        $run_migration = $this->ask('Run migration? (yes/no)');
        if (!empty($run_migration) && strtolower($run_migration) == 'yes') {
            Yii::$app->runAction('migrate');
        }

        echo $this->ansiFormat("\nCongratulations! You are ready to rock!\n", Console::FG_GREEN);

        return self::EXIT_CODE_NORMAL;
    }

    /**
     * Takes user input on console screen.
     *
     * @param $message
     *
     * @return string
     */
    private function ask($message)
    {
        return $this->prompt($this->ansiFormat("\n$message ", Console::FG_YELLOW), ['required' => false, 'validator' => function($input, &$error) {
            /*if(!ctype_alnum(trim($input))) {
                $error = $this->ansiFormat('Incorrect input.', Console::FG_RED);

                return false;
            }*/

            return true;
        }]);
    }

    /**
     * Update database name in configuration file
     *
     * @param $db_name
     */
    private function setupDatabase($db_name)
    {
        $path = 'common/config/main-local.php';
        $common_config_main_local = Yii::getAlias('@'.$path);
        $source_file = file($common_config_main_local);

        foreach ($source_file as $line_number => $line) {
            if (strpos($line, "'dsn'") > 0) {
                $source_file[$line_number] = "            'dsn' => 'mysql:host=localhost;dbname=$db_name',\n";
                break;
            }
        }

        file_put_contents($common_config_main_local, $source_file);
        $formatted_path = $this->ansiFormat($path, Console::FG_PURPLE);
        echo "\nDatabase configuration updated in $formatted_path.\n";
    }

    /**
     * Updates the folder path in htaccess.
     *
     * @param $path
     */
    private function setupHtaccess($path)
    {
        $htaccess = Yii::getAlias('@root/.htaccess');
        $htaccess_file = file($htaccess);

        foreach ($htaccess_file as $line_number => $line) {
            if (strpos($line, 'antick/skyii') > 0) {
                $project_folder = empty($path) ? '/' : trim($path);
                $htaccess_file[$line_number] = str_replace('antick/skyii', $project_folder, $line);
            }
        }

        file_put_contents($htaccess, $htaccess_file);
        echo "\nHtaccess paths are updated\n";
    }

    /**
     * Setup cookie validation key
     */
    private function setupCookieValidationKey()
    {
        echo "\nCookie validation key generated in:\n";
        $this->generateCookieValidationKey('api');
        $this->generateCookieValidationKey('backend');
        $this->generateCookieValidationKey('frontend');
    }

    /**
     * Generates cookie validation key
     *
     * @param $type
     */
    private function generateCookieValidationKey($type)
    {
        $path = $type.'/config/main-local.php';
        $config_file = Yii::getAlias("@$path");

        $config = file($config_file);

        foreach ($config as $line_number => $line) {
            if (strpos($line, "'cookieValidationKey'") > 0) {
                $config[$line_number] = "            'cookieValidationKey' => '".md5(rand(123456, 987654321).'skyii'.microtime())."',\n";
                break;
            }
        }

        file_put_contents($config_file, $config);

        echo $this->ansiFormat($path, Console::FG_PURPLE)."\n";
    }
}
