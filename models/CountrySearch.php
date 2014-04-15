<?php

namespace istt\np\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\np\models\Country;

/**
 * CountrySearch represents the model behind the search form about `istt\np\models\Country`.
 */
class CountrySearch extends Model
{
    public $country_id;
    public $country_name;
    public $country_name_short;

    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['country_name', 'country_name_short'], 'safe'],
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
        ];
    }

    public function search($params)
    {
        $query = Country::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'country_name_short', $this->country_name_short]);

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
