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
    private $categoryId = [];
    private $categories = [
        'electronics' => ['notebooks', 'laptops', 'monitors', 'mobile'],
        'photos' => ['DSLR', 'lens', 'videos'],
        'sport' => ['fishing', 'hiking', 'closes'],
        'kinders' => ['plays', 'books', 'boots'],
    ];

    private $paramId = [];
    private $params = [];

    private $categoryParams = [
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

    /**
     * @throws \yii\db\Exception
     * @throws \Exception
     */
    public function actionAdd()
    {
        $connection = Yii::$app->db;

        $uuidUser = Uuid::uuid4()->toString();
        $connection->createCommand()->insert('user', [
            'id' => $uuidUser,
            'username' => 'store-user',
            'first_name' => 'Vasya',
            'last_name' => 'Pupkin',
            'mobile' => 380123654789,
            'auth_key' => '23ubyub3uyh12ih42j',
            'password_hash' => 'n1guy142ub124',
            'password_reset_token' => 'n21u4b21y4u21',
            'email' => 'user@example.com',
            'verification_token' => 'qiwohfu32ug2iu',
            'status_id' => 10,
            'created_time' => time(),
            'updated_time' => time(),
        ])->execute();

        $uuidRootCategory = Uuid::uuid4()->toString();
        $connection->createCommand()->insert('category', [
            'id' => $uuidRootCategory,
            'depth' => 0,
            'name' => 'root',
            'parent_id' => NULL,
        ])->execute();

        foreach($this->categories as $category => $subCategories) {

            $this->categoryId[$category] = Uuid::uuid4()->toString();

            $connection->createCommand()->insert('category', [
                'id' => $this->categoryId[$category],
                'depth' => 1,
                'name' => $category,
                'parent_id' => $uuidRootCategory,
            ])->execute();

            foreach($subCategories as $subCategory) {

                $this->categoryId[$subCategory] = Uuid::uuid4()->toString();

                $connection->createCommand()->insert('category', [
                    'id' => $this->categoryId[$subCategory],
                    'depth' => 2,
                    'name' => $subCategory,
                    'parent_id' => $this->categoryId[$category],
                ])->execute();
            }
        }

        foreach($this->categoryParams as $category => $paramList) {

            foreach($paramList as $param) {

                if(! in_array($param, $this->params)) {

                    $this->paramId[$param] = Uuid::uuid4()->toString();

                    $this->params[] = $param;
                    $connection->createCommand()->insert('param', [
                        'id' => $this->paramId[$param],
                        'is_required' => false,
                        'name' => $param,
                        'type_id' => 1,
                    ])->execute();

                    $connection->createCommand()->insert('category_param', [
                        'id' => Uuid::uuid4()->toString(),
                        'category_id' => $this->categoryId[$category],
                        'param_id' => $this->paramId[$param],
                    ])->execute();

                } else {

                    $connection->createCommand()->insert('category_param', [
                        'id' => Uuid::uuid4()->toString(),
                        'category_id' => $this->categoryId[$category],
                        'param_id' => $this->paramId[$param],
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
