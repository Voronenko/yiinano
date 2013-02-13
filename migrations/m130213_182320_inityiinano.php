<?php 
class m130213_182320_inityiinano extends EDbMigration 
{ 
    public function up() 
    {
        /** @var $configmodule YIIConfigModule */
        $configmodule = Yii::app()->getModule('config');
        if ($configmodule == null) {
            throw new exception ("This migration requires YIIConfig module from https://github.com/Voronenko/yii-config");
        }

        echo 'congifuring yii-auth';
        //
        $yiiauthconfig = array(
            'aliases' => array(
                'auth' => 'vendor.crisu83.yii-auth'
             ),
            'modules' => array(
                'auth',
            ),
            'components' => array(
                'authManager' => array(
                    'behaviors' => array(
                        'auth' => array(
                            'class' => 'auth.components.AuthBehavior',
                            'admins' => array('admin', 'foo', 'bar'), // users with full access
                        ),
                    ),
                ),
                'user' => array(
                    'class' => 'auth.components.AuthWebUser',
                ),
            ),
        );

        $configmodule->registerConfigUpdate($yiiauthconfig,'congifuring yii-auth');

        $configmodule->writeConfig();
        echo 'done';


    } 
     

    public function down() 
    { 
        echo "m130213_182320_inityiinano does not support migration down.\n"; 
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