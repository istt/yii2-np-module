<?php

namespace istt\np\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use istt\np\models\NetworkDestinationCode;

/**
 * NetworkDestinationCodeSearch represents the model behind the search form about `istt\np\models\NetworkDestinationCode`.
 */
class NetworkDestinationCodeSearch extends Model
{
    public $operator_id;
    public $ndc;

    public function rules()
    {
        return [
            [['operator_id'], 'integer'],
            [['ndc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'operator_id' => Yii::t('np', 'Operator ID'),
            'ndc' => Yii::t('np', 'Ndc'),
        ];
    }

    public function search($params)
    {
        $query = NetworkDestinationCode::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'operator_id' => $this->operator_id,
        ]);

        $query->andFilterWhere(['like', 'ndc', $this->ndc]);

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
