<?php

namespace istt\np\models;

use Yii;
use yii\data\ActiveDataProvider;
use istt\np\models\NetworkOperator;

/**
 * NetworkOperatorSearch represents the model behind the search form about `istt\np\models\NetworkOperator`.
 */
class NetworkOperatorSearch extends NetworkOperator
{
    public $operator_id;
    public $operator_name;
    public $operator_name_short;
    public $country_id;

    public function attributes(){
    	return array_merge(parent::attributes(), ['mcc.mcc', 'mnc.mnc', 'ndc.ndc', 'country.country_name', 'country.country_name_short', 'mcc.mcc']);
    }

    public function rules()
    {
        return [
            [['operator_id', 'country_id'], 'integer'],
            [['operator_name', 'operator_name_short'], 'safe'],
            // related search-able attributes
            [['mnc.mnc', 'ndc.ndc', 'country.country_name', 'country.country_name_short', 'mcc.mcc' ], 'safe']
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
        // Add sort-able relations
        $dataProvider->sort->attributes['ndc.ndc'] = [ 'asc' => ['ndc' => SORT_ASC], 'desc' => ['ndc' => SORT_DESC], ];
        $dataProvider->sort->attributes['mnc.mnc'] = [ 'asc' => ['mnc' => SORT_ASC], 'desc' => ['mnc' => SORT_DESC], ];
        $dataProvider->sort->attributes['country.country_name_short'] = [ 'asc' => ['country_name_short' => SORT_ASC], 'desc' => ['country_name_short' => SORT_DESC], ];
        $dataProvider->sort->attributes['country.country_name'] = [ 'asc' => ['country_name' => SORT_ASC], 'desc' => ['country_name' => SORT_DESC], ];
        $dataProvider->sort->attributes['mcc.mcc'] = [ 'asc' => ['mcc' => SORT_ASC], 'desc' => ['mcc' => SORT_DESC], ];
        // Add search-able relations
        $query->joinWith('mnc');
        $query->joinWith('ndc');
        $query->joinWith('country');
        $query->joinWith('mcc');


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'operator_id' => $this->operator_id,
            'country_id' => $this->country_id,
        	'country_name_short' => $this->getAttribute('country.country_name_short'),
        	'mnc' => $this->getAttribute('mnc.mnc'),
        	'mcc' => $this->getAttribute('mcc.mcc'),
        	'ndc' => $this->getAttribute('ndc.ndc'),
        ]);

        $query->andFilterWhere(['like', 'operator_name', $this->operator_name])
            ->andFilterWhere(['like', 'operator_name_short', $this->operator_name_short])
            ->andFilterWhere(['like', 'country_name', $this->getAttribute('country.country_name')])
        ;

        return $dataProvider;
    }
}
