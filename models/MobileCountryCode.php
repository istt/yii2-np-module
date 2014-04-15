<?php

namespace istt\np\models;

use Yii;

/**
 * This is the model class for table "oc_cfg_country_mcc".
 *
 * @property integer $country_id
 * @property string $mcc
 *
 * @property Countries $country
 */
class MobileCountryCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%country_mcc}}';
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
            [['country_id', 'mcc'], 'required'],
            [['country_id'], 'integer'],
            [['mcc'], 'string', 'max' => 20],
            [['mcc'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => Yii::t('np', 'Country ID'),
            'mcc' => Yii::t('np', 'Mobile Country Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    public function __toString(){
    	return $this->mcc;
    }
}
