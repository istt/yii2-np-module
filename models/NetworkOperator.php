<?php

namespace istt\np\models;

use Yii;

/**
 * This is the model class for table "oc_cfg_operators".
 *
 * @property integer $operator_id
 * @property string $operator_name
 * @property string $operator_name_short
 * @property integer $country_id
 *
 * @property OperatorMnc $operatorMnc
 * @property OperatorNdc $operatorNdc
 * @property Countries $country
 * @property OperatorsInList $operatorsInList
 * @property OperatorsLists[] $operatorLists
 */
class NetworkOperator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%operators}}';
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
            [['country_id'], 'required'],
            [['country_id'], 'integer'],
            [['operator_name'], 'string', 'max' => 255],
            [['operator_name_short'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'operator_id' => Yii::t('np', 'Operator ID'),
            'operator_name' => Yii::t('np', 'Operator Name'),
            'operator_name_short' => Yii::t('np', 'Operator Name Short'),
            'country_id' => Yii::t('np', 'Country ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMnc()
    {
        return $this->hasOne(NetworkCode::className(), ['operator_id' => 'operator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNdc()
    {
        return $this->hasOne(NetworkDestinationCode::className(), ['operator_id' => 'operator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    public function __toString(){
    	return $this->operator_name . ' - ' . $this->operator_name_short;
    }
}
