<?php

namespace console\controllers;

use Ramsey\Uuid\Uuid;
use yii\console\Controller;
use Yii;
use common\models\Category;

/**
 * Class DataController
 * @package console\controllers
 */
class DataController extends Controller
{
    /**
     * @throws \yii\db\Exception
     */
    public function actionAddTestData()
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
            'photos' => ['DSLR', 'lens', 'videos', 'bags'],
            'sport' => ['fishing', 'hiking', 'closes'],
            'kinders' => ['plays', 'books', 'boots'],
        ];

        foreach($categories as $category => $subCategories) {

            $uuid_cat = Uuid::uuid4()->toString();

            $connection->createCommand()->insert('category', [
                'id' => $uuid_cat,
                'depth' => 1,
                'name' => $category,
                'parent_id' => $uuid_root,
            ])->execute();

            foreach($subCategories as $subCategory) {
                $connection->createCommand()->insert('category', [
                    'id' => Uuid::uuid4()->toString(),
                    'depth' => 2,
                    'name' => $subCategory,
                    'parent_id' => $uuid_cat,
                ])->execute();

            }
        }


        Yii::$app->db->createCommand()->batchInsert('user', ['name', 'age'], [
            ['Tom', 30],
            ['Jane', 20],
            ['Linda', 25],
        ])->execute();

    }

    public function actionDelTestData() {

        $category_table = new Category();
        $category_table::deleteAll();

    }
}
