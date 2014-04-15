<?php

namespace istt\np\models;

use Yii;

/**
 * This is the model class for table "oc_cfg_countries".
 *
 * @property integer $country_id
 * @property string $country_name
 * @property string $country_name_short
 *
 * @property CountriesInList $countriesInList
 * @property CountriesList[] $countryLists
 * @property CountryCc $countryCc
 * @property CountryMcc $countryMcc
 * @property Operators[] $operators
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%countries}}';
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
            [['country_name'], 'string', 'max' => 255],
            [['country_name_short'], 'string', 'max' => 20],
            [['country_name_short'], 'unique'],
            [['country_name_short'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => Yii::t('np', 'Country ID'),
            'country_name' => Yii::t('np', 'Country Name'),
            'country_name_short' => Yii::t('np', 'Country Name Short'),
            'cc' => Yii::t('np', 'Country Code'),
			'mcc' => Yii::t('np', 'Mobile Country Code'),
        ];
    }

    public function attributeLabel($attr){
    	if ($label = parent::attributeLabel($attr) == ucfirst($attr)){
    		return Yii::t('np', $attr);
    	}
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCc()
    {
        return $this->hasOne(CountryCode::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMcc()
    {
        return $this->hasOne(MobileCountryCode::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperators()
    {
        return $this->hasMany(NetworkOperator::className(), ['country_id' => 'country_id']);
    }

    public function __toString(){
    	return $this->country_name . ' - ' . $this->country_name_short;
    }
}
