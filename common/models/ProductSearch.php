<?php

namespace common\models;

use common\components\ProductParamsFinder;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductSearch represents the model behind the search form of `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title', 'description', 'main_photo', 'category_id', 'brand_id'], 'safe'],
            [['quantity', 'price', 'created_time', 'updated_time'], 'integer'],
            [['is_deleted'], 'boolean'],
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
     * @param int $pageSize
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search(int $pageSize, array $params)
    {
        $categoriesIdFromRequest = (new ProductParamsFinder())->getCategoriesIdFromParams($params);
        $brandsIdFromRequest = (new ProductParamsFinder())->getBrandsIdFromParams($params);

        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
            'sort' => [
                'defaultOrder' => [
                    'quantity' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if (isset($params['search'])) {
            $query
                ->andFilterWhere(['ilike', 'title', $params['search']])
                ->orFilterWhere(['ilike', 'description', $params['search']]);
        }

        if (isset($params['minPrice']) && isset($params['maxPrice'])) {
            $query
                ->andFilterWhere(['between', 'price', $params['minPrice'], $params['maxPrice']]);
        }

        if (! empty($categoriesIdFromRequest)) {
            $query
                ->andFilterWhere(['category_id' => $categoriesIdFromRequest]);
        }

        if (! empty($brandsIdFromRequest)) {
            $query
                ->andFilterWhere(['id' => $brandsIdFromRequest]);
        }

        return $dataProvider;
    }
}
