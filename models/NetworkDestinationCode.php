<?php

namespace istt\np\models;

use Yii;

/**
 * This is the model class for table "oc_cfg_operator_ndc".
 *
 * @property integer $operator_id
 * @property string $ndc
 *
 * @property Operators $operator
 */
class NetworkDestinationCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%operator_ndc}}';
    }

    /**
    * @inheritdoc
    */
    public static function getDb(){
    	if (\Yii::$app->has('npDb') && \Yii::$app->npDb instanceof \yii\db\Connection)
    		return \Yii::$app->npDb;
    	else
    		return \Yii::$app->db;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operator_id', 'ndc'], 'required'],
            [['operator_id'], 'integer'],
            [['ndc'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'operator_id' => Yii::t('np', 'Operator ID'),
            'ndc' => Yii::t('np', 'National Destination Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(NetworkOperator::className(), ['operator_id' => 'operator_id']);
    }

    public function __toString(){
    	return $this->ndc;
    }
}
