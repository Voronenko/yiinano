<?php
class m010213_182322_inityiirights extends EDbMigration
{
    public function up()
    {
        /** @var $configModule YIIConfigModule */
        $configModule = Yii::app()->getModule('config');
        if ($configModule == null) {
            throw new exception ("This migration requires YIIConfig module from https://github.com/Voronenko/yii-config");
        }

        echo 'congifuring yii-rights';
        //
        $yiiauthconfig = array(
            'import' => array(
                'vendor.crisu83.yii-rights.components.*'
            ),
            'modules' => array(
                'rights' => array(
                    'class' => 'vendor.crisu83.yii-rights.RightsModule',
                    'appLayout' => '//layouts/main',
                    'userIdColumn' => 'id',
                    'userClass' => 'User',
                    'install' => true, // Enables the installer.
                    'superuserName' => 'admin'
                )
            ),

            'components' => array(

                'authManager' => array(
                    'class' => 'RDbAuthManager', // Provides support authorization item sorting.
                    'defaultRoles' => array('Authenticated', 'Guest'), // see correspoing business rules, note: superusers always get checkAcess == true
                ),


               'user' => 
                    array (
                        'class' => 'RWebUser', // mishamx/yii-rights: Allows super users access implicitly.
                    )
               )


        );


        $configModule->registerConfigUpdate($yiiauthconfig, 'congifuring yii-rights');

        $configModule->writeConfig();
        echo 'DONE';


    }


    public function down()
    {
        echo "m130213_182322_inityiirights does not support migration down.\n";
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