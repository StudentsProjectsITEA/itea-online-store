<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Photo;

/**
 * PhotoSearch represents the model behind the search form of `common\models\Photo`.
 */
class PhotoSearch extends Photo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'product_id'], 'safe'],
            [['is_main'], 'boolean'],
            [['created_time'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Photo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'is_main' => $this->is_main,
            'created_time' => $this->created_time,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'product_id', $this->product_id]);

        return $dataProvider;
    }
}
