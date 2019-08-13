<?php

namespace console\controllers;

use common\models\CategoryParam;
use common\models\Param;
use Ramsey\Uuid\Uuid;
use yii\console\Controller;
use Yii;
use common\models\Category;

/**
 * Class DataController
 * @package console\controllers
 */
class TestDataController extends Controller
{
    /**
     * @throws \yii\db\Exception
     * @throws \Exception
     */
    public function actionAdd()
    {
        $uuid_root = Uuid::uuid4()->toString();

        $connection = Yii::$app->db;

        $connection->createCommand()->insert('category', [
            'id' => $uuid_root,
            'depth' => 0,
            'name' => 'root',
            'parent_id' => NULL,
        ])->execute();

        $categories = [
            'electronics' => ['notebooks', 'laptops', 'monitors', 'mobile'],
            'photos' => ['DSLR', 'lens', 'videos'],
            'sport' => ['fishing', 'hiking', 'closes'],
            'kinders' => ['plays', 'books', 'boots'],
        ];

        $categoryParams = [
            'notebooks' => ['Производитель', 'Диагональ экрана', 'Процессор', 'ОЗУ', 'HDD'],
            'laptops' => ['Производитель', 'Диагональ экрана', 'Процессор', 'ОЗУ', 'HDD'],
            'monitors' => ['Производитель', 'Диагональ экрана'],
            'mobile' => ['Производитель', 'Диагональ экрана', 'Процессор', 'ОЗУ'],
            'DSLR' => ['Производитель', 'Диагональ экрана', 'Размер матрицы'],
            'lens' => ['Производитель'],
            'videos' => ['Производитель', 'Диагональ экрана', 'Размер матрицы'],
            'fishing' => ['Производитель'],
            'hiking' => ['Производитель'],
            'closes' => ['Производитель', 'Размер одежды'],
            'plays' => ['Производитель', 'Возраст'],
            'books' => ['Производитель', 'Возраст'],
            'boots' => ['Производитель', 'Размер обуви'],
        ];

        $category_id = [];
        $params = [];
        $param_id = [];

        foreach($categories as $category => $subCategories) {

            $category_id[$category] = Uuid::uuid4()->toString();

            $connection->createCommand()->insert('category', [
                'id' => $category_id[$category],
                'depth' => 1,
                'name' => $category,
                'parent_id' => $uuid_root,
            ])->execute();

            foreach($subCategories as $subCategory) {

                $category_id[$subCategory] = Uuid::uuid4()->toString();

                $connection->createCommand()->insert('category', [
                    'id' => $category_id[$subCategory],
                    'depth' => 2,
                    'name' => $subCategory,
                    'parent_id' => $category_id[$category],
                    // 'parent_id' => $uuid_cat,
                ])->execute();
            }
        }

        foreach($categoryParams as $category => $items) {

            foreach($items as $param) {
                if(! in_array($param, $params)) {

                    $params[] = $param;
                    $param_id = Uuid::uuid4()->toString();

                    $connection->createCommand()->insert('param', [
                        'id' => $param_id,
                        'is_required' => false,
                        'name' => $param,
                        'type_id' => 1,
                    ])->execute();

                    $connection->createCommand()->insert('category_param', [
                        'id' => Uuid::uuid4()->toString(),
                        'category_id' => $category_id[$category],
                        'param_id' => $param_id,
                    ])->execute();

                }
            }
        }
    }

    public function actionDelete() {

        $category_table = new Category();
        $category_table::deleteAll();

        $category_table = new Param();
        $category_table::deleteAll();

        $category_table = new CategoryParam();
        $category_table::deleteAll();
    }
}
