<?php

namespace istt\np\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\np\models\NetworkOperator;

/**
 * NetworkOperatorSearch represents the model behind the search form about `istt\np\models\NetworkOperator`.
 */
class NetworkOperatorSearch extends Model
{
    public $operator_id;
    public $operator_name;
    public $operator_name_short;
    public $country_id;

    public function rules()
    {
        return [
            [['operator_id', 'country_id'], 'integer'],
            [['operator_name', 'operator_name_short'], 'safe'],
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

    public function search($params)
    {
        $query = NetworkOperator::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'operator_id' => $this->operator_id,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'operator_name', $this->operator_name])
            ->andFilterWhere(['like', 'operator_name_short', $this->operator_name_short]);

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
