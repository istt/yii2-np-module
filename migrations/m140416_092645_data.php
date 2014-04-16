<?php

use yii\db\Schema;

class m140416_092645_data extends \yii\db\Migration
{
    public function up()
    {
    	$this->loadCsv('countries.csv', ['country_id', 'country_name', 'country_name_short'], '{{%countries}}');
    	$this->loadCsv('cc.csv', ['country_id', 'cc'], '{{%country_cc}}');
    	$this->loadCsv('mcc.csv', ['country_id', 'mcc'], '{{%country_mcc}}');

    	$this->loadCsv('operators.csv', ['operator_id', 'country_id', 'operator_name', 'operator_name_short'], '{{%operators}}');
    	$this->loadCsv('mnc.csv', ['operator_id', 'mnc'], '{{%operator_mnc}}');
    	$this->loadCsv('ndc.csv', ['operator_id', 'ndc'], '{{%operator_ndc}}');
    }

    public function loadCsv($filename, $cols, $table){
    	echo "Prepare to import file $filename ...";
    	$handle = fopen($filename = __DIR__ . DIRECTORY_SEPARATOR . $filename, 'r');
    	$rows = [];
    	while ($line = fgetcsv($handle)){
    		$rows[] = $line;
    	}
    	fclose($handle);
    	try {
	    	$this->batchInsert($table, $cols, $rows);
    	} catch (Exception $e) {
    		$err = [];
    		foreach ($rows as $r){
	    		try {
	    			$this->insert($table, $row = array_combine($cols, $r));
    			} catch (Exception $e) {
    				var_export($row);
    			}
    		}
    	}
    	echo "Done.\n";
    }

    public function down()
    {
	    	$this->truncateTable('{{%operator_mnc}}');
	        $this->truncateTable('{{%operator_ndc}}');
	    	$this->truncateTable('{{%country_mcc}}');
	    	$this->truncateTable('{{%country_cc}}');
	    	$this->truncateTable('{{%operators}}');
	    	$this->truncateTable('{{%countries}}');
    }
}
