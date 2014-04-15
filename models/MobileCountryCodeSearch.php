<?php

namespace istt\np\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\np\models\MobileCountryCode;

/**
 * MobileCountryCodeSearch represents the model behind the search form about `istt\np\models\MobileCountryCode`.
 */
class MobileCountryCodeSearch extends Model
{
    public $country_id;
    public $mcc;

    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['mcc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => Yii::t('np', 'Country ID'),
            'mcc' => Yii::t('np', 'Mcc'),
        ];
    }

    public function search($params)
    {
        $query = MobileCountryCode::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'mcc', $this->mcc]);

        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
