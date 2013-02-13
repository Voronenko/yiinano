<?php
class m010213_182321_inityiibootstrap extends EDbMigration
{
    public function up()
    {
        /** @var $configModule YIIConfigModule */
        $configModule = Yii::app()->getModule('config');
        if ($configModule == null) {
            throw new exception ("This migration requires YIIConfig module from https://github.com/Voronenko/yii-config");
        }

        echo 'congifuring yii-bootstrap';
        //
        $yiiauthconfig = array(

            'import' => array(
                'vendor.crisu83.yii-bootstrap.widgets.*',
            ),

            'components' => array(
                'bootstrap' => array(
                    'class' => 'bootstrap.components.Bootstrap',
                ),
            ),

            'modules' => array(
                'gii' => array(
                    'generatorPaths' => array(
                        'bootstrap.gii',
                    ),
                ),
            ),

        );


        $configModule->registerConfigUpdate($yiiauthconfig, 'congifuring yii-bootstrap');

        $configModule->writeConfig();
        echo 'DONE';


    }


    public function down()
    {
        echo "m130213_182321_inityiibootstrap does not support migration down.\n";
        return false;

        $this->execute("");
    }

    /* 
    // Use safeUp/safeDown to do migration with transaction 
    public function safeUp() 
    { 
    } 

    public function safeDown() 
    { 
    } 
    */
} 