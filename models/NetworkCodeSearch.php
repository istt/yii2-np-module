<?php

namespace istt\np\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\np\models\NetworkCode;

/**
 * NetworkCodeSearch represents the model behind the search form about `istt\np\models\NetworkCode`.
 */
class NetworkCodeSearch extends Model
{
    public $operator_id;
    public $mnc;
    public $operator;

    public function rules()
    {
        return [
            [['operator_id'], 'integer'],
            [['mnc', 'operator'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'operator_id' => Yii::t('np', 'Operator ID'),
            'operator' => Yii::t('np', 'Network Operator'),
            'mnc' => Yii::t('np', 'Mnc'),
        ];
    }

    public function search($params)
    {
        $query = NetworkCode::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->joinWith('operator');

        $query->andFilterWhere([
            'operator_id' => $this->operator_id,
        ]);

        $query->andFilterWhere(['like', 'mnc', $this->mnc]);
        $query->andFilterWhere(['like', 'operator_name', $this->operator]);

        $dataProvider->sort->attributes['operator'] = [
        'asc' => ['operator_name' => SORT_ASC],
        'desc' => ['operator_name' => SORT_DESC],
        ];

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
