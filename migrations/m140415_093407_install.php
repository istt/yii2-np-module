<?php

use yii\db\Schema;

class m140415_093407_install extends \yii\db\Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	// countries
    	$this->createTable('{{%countries}}',[
    				'country_id' => Schema::TYPE_PK,
    				'country_name' => Schema::TYPE_STRING,
    				'country_name_short' => Schema::TYPE_STRING,
    			], $tableOptions);
    	// country_cc
    	$this->createTable('{{%country_cc}}',[
    				'country_id' => Schema::TYPE_INTEGER,
    				'cc' => Schema::TYPE_STRING,
    			], $tableOptions);
    	$this->addForeignKey('cc_country', '{{%country_cc}}', 'country_id', '{{%countries}}', 'country_id');
    	// country_mcc
    	$this->createTable('{{%country_mcc}}',[
    				'country_id' => Schema::TYPE_INTEGER,
    				'mcc' => Schema::TYPE_STRING,
    			], $tableOptions);
    	$this->addForeignKey('mcc_country', '{{%country_mcc}}', 'country_id', '{{%countries}}', 'country_id');
    	// operators
    	$this->createTable('{{%operators}}',[
    				'operator_id' => Schema::TYPE_PK,
    				'operator_name' => Schema::TYPE_STRING,
    				'operator_name_short' => Schema::TYPE_STRING,
    				'country_id' => Schema::TYPE_INTEGER,
    			], $tableOptions);
    	$this->addForeignKey('op_country', '{{%operators}}', 'country_id', '{{%countries}}', 'country_id');
    	// operator_mnc
    	$this->createTable('{{%operator_mnc}}',[
    				'operator_id' => Schema::TYPE_INTEGER,
    				'mnc' => Schema::TYPE_STRING,
    			], $tableOptions);
    	$this->addForeignKey('mnc_operator', '{{%operator_mnc}}', 'operator_id', '{{%operators}}', 'operator_id');
    	// operator_ndc
    	$this->createTable('{{%operator_ndc}}',[
    				'operator_id' => Schema::TYPE_INTEGER,
    				'ndc' => Schema::TYPE_STRING,
    			], $tableOptions);
    	$this->addForeignKey('ndc_operator', '{{%operator_ndc}}', 'operator_id', '{{%operators}}', 'operator_id');
    }

    public function down()
    {
    	$this->dropTable('{{%operator_ndc}}');
    	$this->dropTable('{{%operator_mnc}}');
    	$this->dropTable('{{%operators}}');
    	$this->dropTable('{{%country_mcc}}');
    	$this->dropTable('{{%country_cc}}');
    	$this->dropTable('{{%countries}}');
    }
}
