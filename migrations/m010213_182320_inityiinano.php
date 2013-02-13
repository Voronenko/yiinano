<?php
class m010213_182320_inityiinano extends EDbMigration
{
    public function up()
    {
        /** @var $configModule YIIConfigModule */
        $configModule = Yii::app()->getModule('config');
        if ($configModule == null) {
            throw new exception ("This migration requires YIIConfig module from https://github.com/Voronenko/yii-config");
        }

        echo 'congifuring vendor.mishamx.yii-user';
        //
        $yiiauthconfig = array(
            'import' => array(
                'vendor.mishamx.yii-user.models.*', // User Model
            ),

            'aliases' => array(
                'user' => 'vendor.mishamx.yii-user',
            ),

            'modules' => array(
                'user' => array(
                    'class' => 'vendor.mishamx.yii-user.UserModule',
                    'hash' => 'md5', # encrypting method (php hash function)
                    'sendActivationMail' => false, # send activation email
                    'loginNotActiv' => false, # allow access for non-activated users
                    'activeAfterRegister' => false, # activate user on registration (only sendActivationMail = false)
                    'autoLogin' => true, # automatically login from registration
                    'registrationUrl' => array('/user/registration'), # registration path
                    'recoveryUrl' => array('/user/recovery'), # recovery password path
                    'loginUrl' => array('/user/login'), # login form path
                    'returnUrl' => array('/user/profile'), # page after login
                    'returnLogoutUrl' => array('/user/login'), # page after logout
                ),
            ),


            'components' => array(
                'user' => array(
                    // enable cookie-based authentication
                    'class' => 'WebUser',
                    'allowAutoLogin' => true,
                    'loginUrl' => array('/user/login'),
                ),
            ),


        );


        $configModule->registerConfigUpdate($yiiauthconfig, 'congifuring vendor.mishamx.yii-user');

        $configModule->writeConfig();
        echo 'DONE';


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