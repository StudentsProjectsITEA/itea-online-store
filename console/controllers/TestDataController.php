<?php

namespace console\controllers;

use backend\models\Admin;
use common\models\Brand;
use common\models\CategoryParam;
use common\models\Order;
use common\models\Param;
use common\models\Photo;
use common\models\Product;
use common\models\ProductOrder;
use common\models\ProductParamValue;
use frontend\models\User;
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
        'notebooks' => ['Manufacturer', 'Screen diagonal', 'CPU', 'RAM', 'HDD'],
        'laptops' => ['Manufacturer', 'Screen diagonal', 'CPU', 'RAM', 'HDD'],
        'monitors' => ['Manufacturer', 'Screen diagonal'],
        'mobile' => ['Manufacturer', 'Screen diagonal', 'CPU', 'RAM'],
        'DSLR' => ['Manufacturer', 'Screen diagonal', 'Matrix'],
        'lens' => ['Manufacturer'],
        'videos' => ['Manufacturer', 'Screen diagonal', 'Matrix'],
        'fishing' => ['Manufacturer'],
        'hiking' => ['Manufacturer'],
        'closes' => ['Manufacturer', 'Clothing size'],
        'plays' => ['Manufacturer', 'Age'],
        'books' => ['Manufacturer', 'Age'],
        'boots' => ['Manufacturer', 'Shoe size'],
    ];

    private $brandId = [];
    private $brands = ['Apple', 'Xiaomi', 'Canon', 'Sony', 'Adidas', 'Puma', 'Kinder', 'Barbie'];

    private $productId = [];
    private $products = [
        'APPLE A2159 MacBook Pro 13"' => [
            'description' => 'MacBook Pro задаёт совершенно новые стандарты мощности и портативности ноутбуков. CPUы высокой Manufacturerности, память большего объёма, передовая графика, сверхбыстрые накопители и другие впечатляющие способности MacBook Pro помогут вам воплощать в жизнь любые творческие проекты — ещё быстрее, чем раньше.',
            'quantity' => 12,
            'price' => 40500,
            'main_photo' => 'macbook_pro_1.jpg',
            'category' => 'notebooks',
            'brand' => 'Apple',
        ],
        'Xiaomi Redmi Note 5A Gray' => [
            'description' => 'Программа обработки фотографий с фронтальной камеры содержит 36 встроенных алгоритмов обработки фото, благодаря которым изображение Вашего лица может быть доведено до идеала. Больше не нужно косметики и обработки в графических редакторах!',
            'quantity' => 20,
            'price' => 3000,
            'main_photo' => 'xiaomi_redmi_note_1.jpg',
            'category' => 'mobile',
            'brand' => 'Xiaomi',
        ],
        'CANON EOS 80D' => [
            'description' => 'Просто настройте работу камеры так, как вам нравится и начинайте удобную и быструю съемку. Делайте непрерывные серии из фотографий, чтобы не упускать неповторимые мгновения упорных спортивных соревнований или удачные кадры из жизни дикой природы.',
            'quantity' => 5,
            'price' => 30300,
            'main_photo' => 'canon_eos_1.jpg',
            'category' => 'videos',
            'brand' => 'Canon',
        ],
        'SONY Alpha a6500' => [
            'description' => 'Alpha a6500 – небольшая фотокамера от Сони, выполненная в черном цвете и предназначенная для активной профессиональной съемки. Поддерживает возможность смены объектива, поэтому обладает практически универсальными возможностями и подходит для эксплуатации в абсолютно разных условиях.',
            'quantity' => 35,
            'price' => 27800,
            'main_photo' => 'sony_alpha_1.jpg',
            'category' => 'lens',
            'brand' => 'Sony',
        ],
        'Adidas Size M Blue' => [
            'description' => 'Перчатки для занятий в тренажерном зале с гантелями, гирями, штангой, а также с медицинболами, скакалкой и другим инвентарем. Идеальны для тренировок общего характера.',
            'quantity' => 50,
            'price' => 750,
            'main_photo' => 'adidas_size_1.jpg',
            'category' => 'sport',
            'brand' => 'Adidas',
        ],
        'Puma Astro Kick' => [
            'description' => 'Перчатки для занятий в тренажерном зале с гантелями, гирями, штангой, а также с медМодель Astro Kick - новинка сезона, заимствовавшая многие интересные детали из футбольной обуви. Классическая двухцветная конструкция верха, изготовленного из мягкой замши, подчеркивается контрастной декоративной строчкой, белой фирменной боковой полосой и нарядным белым рантом.ицинболами, скакалкой и другим инвентарем. Идеальны для тренировок общего характера.',
            'quantity' => 1,
            'price' => 1600,
            'main_photo' => 'puma_astro_1.jpg',
            'category' => 'closes',
            'brand' => 'Puma',
        ],
        'Kinder Delice' => [
            'description' => 'Большая упаковка бисквитных пирожных Kinder Delice. Воздушный бисквит, нежная шоколадная глазурь и молочная начинка – прекрасный способ подкрепиться и порадовать себя!',
            'quantity' => 100,
            'price' => 300,
            'main_photo' => 'kinder_delice_1.jpg',
            'category' => 'kinders',
            'brand' => 'Kinder',
        ],
        'Barbie Dreamtopia' => [
            'description' => 'У феи Barbie есть крылья, которые по-настоящему летают! Это волшебный момент, который вдохновляет на создание разных сказочных историй. Просто прикрепите одни из двух летающих крылышек (входят в набор) к крыльям на спине феи.',
            'quantity' => 70,
            'price' => 800,
            'main_photo' => 'barbie_dreamtopia_1.jpg',
            'category' => 'plays',
            'brand' => 'Barbie',
        ],
    ];

    private $productParams = [
        'APPLE A2159 MacBook Pro 13"' => [
            'Diagonal' => '13,3',
            'Memory' => '128 ГБ',
            'OS' => 'Mac OS Mojave',
        ],
        'Xiaomi Redmi Note 5A Gray' => [
            'Sim-card' => '2',
            'Main camera, MP' => '13',
            'Battery capacity' => '3080',
        ],
        'CANON EOS 80D' => [
            'HDR' => 'Allowed',
            'Diagonal' => '3"',
        ],
        'SONY Alpha a6500' => [
            'Nutrition' => 'NP-FW50',
            'Movie Frame Rate' => '4K - 30 кадр/сек, Full HD - 120 кадр/сек',
            'Matrix' => 'APS-C',
        ],
        'Adidas Size M Blue' => [
            'Type' => 'пеpчатки для фитнеса, культуpизма',
            'Genre' => 'unisex',
            'Material' => 'Lycra',
        ],
        'Puma Astro Kick' => [
            'Size' => '42',
            'Color' => 'black',
        ],
        'Kinder Delice' => [
            'Filling' => 'молочный',
            'Packaging' => 'Картонная коробка',
        ],
        'Barbie Dreamtopia' => [
            'Brand Registration Country' => 'USA',
            'Warranty' => '14 дней',
        ],
    ];

    private $orderId = [];
    private $orders = [
        'Заказ #329589' => [
            'status_id' => 1,
            'payment_id' => 1,
            'shipping_id' => 1,
            'shipping_address' => 'Вишневое, ул. Киевская, 27',
        ],
        'Заказ #234212' => [
            'status_id' => 2,
            'payment_id' => 2,
            'shipping_id' => 1,
            'shipping_address' => 'Березанка, ул. Суворова, 62',
        ],
        'Заказ #142124' => [
            'status_id' => 1,
            'payment_id' => 2,
            'shipping_id' => 2,
            'shipping_address' => 'Арбузинка, ул. Набережная, 170',
        ],
    ];

    private $orderProducts = [
        0 => [
            'quantity' => 1,
            'discount' => null,
            'product' => 'APPLE A2159 MacBook Pro 13"',
            'order' => 'Заказ #329589',
        ],
        1 => [
            'quantity' => 2,
            'discount' => null,
            'product' => 'Puma Astro Kick',
            'order' => 'Заказ #329589',
        ],
        2 => [
            'quantity' => 1,
            'discount' => null,
            'product' => 'Xiaomi Redmi Note 5A Gray',
            'order' => 'Заказ #234212',
        ],
        3 => [
            'quantity' => 1,
            'discount' => null,
            'product' => 'CANON EOS 80D',
            'order' => 'Заказ #142124',
        ],
        4 => [
            'quantity' => 3,
            'discount' => null,
            'product' => 'Barbie Dreamtopia',
            'order' => 'Заказ #142124',
        ],
        5 => [
            'quantity' => 1,
            'discount' => 10,
            'product' => 'Kinder Delice',
            'order' => 'Заказ #142124',
        ],
    ];

    private $photos = [
        'macbook_pro_1.jpg' => [
            'is_main' => true,
            'product' => 'APPLE A2159 MacBook Pro 13"',
        ],
        'macbook_pro_2.jpg' => [
            'is_main' => false,
            'product' => 'APPLE A2159 MacBook Pro 13"',
        ],
        'macbook_pro_3.jpg' => [
            'is_main' => false,
            'product' => 'APPLE A2159 MacBook Pro 13"',
        ],
        'xiaomi_redmi_note_1.jpg' => [
            'is_main' => true,
            'product' => 'Xiaomi Redmi Note 5A Gray',
        ],
        'xiaomi_redmi_note_2.jpg' => [
            'is_main' => false,
            'product' => 'Xiaomi Redmi Note 5A Gray',
        ],
        'xiaomi_redmi_note_3.jpg' => [
            'is_main' => false,
            'product' => 'Xiaomi Redmi Note 5A Gray',
        ],
        'xiaomi_redmi_note_4.jpg' => [
            'is_main' => false,
            'product' => 'Xiaomi Redmi Note 5A Gray',
        ],
        'canon_eos_1.jpg' => [
            'is_main' => true,
            'product' => 'CANON EOS 80D',
        ],
        'canon_eos_2.jpg' => [
            'is_main' => false,
            'product' => 'CANON EOS 80D',
        ],
        'sony_alpha_1.jpg' => [
            'is_main' => true,
            'product' => 'SONY Alpha a6500',
        ],
        'sony_alpha_2.jpg' => [
            'is_main' => false,
            'product' => 'SONY Alpha a6500',
        ],
        'sony_alpha_3.jpg' => [
            'is_main' => false,
            'product' => 'SONY Alpha a6500',
        ],
        'adidas_size_1.jpg' => [
            'is_main' => true,
            'product' => 'Adidas Size M Blue',
        ],
        'puma_astro_1.jpg' => [
            'is_main' => true,
            'product' => 'Puma Astro Kick',
        ],
        'puma_astro_2.jpg' => [
            'is_main' => false,
            'product' => 'Puma Astro Kick',
        ],
        'kinder_delice_1.jpg' => [
            'is_main' => true,
            'product' => 'Kinder Delice',
        ],
        'kinder_delice_2.jpg' => [
            'is_main' => false,
            'product' => 'Kinder Delice',
        ],
        'barbie_dreamtopia_1.jpg' => [
            'is_main' => true,
            'product' => 'Barbie Dreamtopia',
        ],
    ];

    /**
     * @throws \yii\db\Exception
     * @throws \Exception
     */
    public function actionAdd()
    {
        $connection = Yii::$app->db;

        //Insert test data to user table
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

        //Insert test data to category table
        $uuidRootCategory = Uuid::uuid4()->toString();
        $connection->createCommand()->insert('category', [
            'id' => $uuidRootCategory,
            'depth' => 0,
            'name' => 'root',
            'parent_id' => null,
        ])->execute();

        foreach ($this->categories as $category => $subCategories) {
            $this->categoryId[$category] = Uuid::uuid4()->toString();
            $connection->createCommand()->insert('category', [
                'id' => $this->categoryId[$category],
                'depth' => 1,
                'name' => $category,
                'parent_id' => $uuidRootCategory,
            ])->execute();

            foreach ($subCategories as $subCategory) {
                $this->categoryId[$subCategory] = Uuid::uuid4()->toString();
                $connection->createCommand()->insert('category', [
                    'id' => $this->categoryId[$subCategory],
                    'depth' => 2,
                    'name' => $subCategory,
                    'parent_id' => $this->categoryId[$category],
                ])->execute();
            }
        }

        //Insert test data to brand table
        foreach ($this->brands as $brand) {
            $this->brandId[$brand] = Uuid::uuid4()->toString();
            $connection->createCommand()->insert('brand', [
                'id' => $this->brandId[$brand],
                'name' => $brand,
                'description' => null,
            ])->execute();
        }

        //Insert test data to product table
        foreach ($this->products as $title => $product) {
            $this->productId[$title] = Uuid::uuid4()->toString();
            $connection->createCommand()->insert('product', [
                'id' => $this->productId[$title],
                'title' => $title,
                'description' => $product['description'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'main_photo' => $product['main_photo'],
                'is_deleted' => false,
                'created_time' => time(),
                'updated_time' => time(),
                'category_id' => $this->categoryId[$product['category']],
                'brand_id' => $this->brandId[$product['brand']],
            ])->execute();
        }

        //Insert test data to product_param_value and param tables
        foreach ($this->productParams as $product => $paramList) {
            foreach ($paramList as $param => $value) {
                if (!in_array($param, $this->params)) {
                    $this->paramId[$param] = Uuid::uuid4()->toString();
                    $this->params[] = $param;

                    $connection->createCommand()->insert('param', [
                        'id' => $this->paramId[$param],
                        'is_required' => false,
                        'name' => $param,
                        'type_id' => 1,
                    ])->execute();

                    $connection->createCommand()->insert('product_param_value', [
                        'id' => Uuid::uuid4()->toString(),
                        'product_id' => $this->productId[$product],
                        'param_id' => $this->paramId[$param],
                        'value' => $value,
                    ])->execute();
                } else {
                    $connection->createCommand()->insert('product_param_value', [
                        'id' => Uuid::uuid4()->toString(),
                        'product_id' => $this->productId[$product],
                        'param_id' => $this->paramId[$param],
                        'value' => $value,
                    ])->execute();
                }
            }
        }

        //Insert test data to category_param and param tables
        foreach ($this->categoryParams as $category => $paramList) {
            foreach ($paramList as $param) {
                if (!in_array($param, $this->params)) {
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

        //Insert test data to order table
        foreach ($this->orders as $title => $orders) {
            $this->orderId[$title] = Uuid::uuid4()->toString();
            $connection->createCommand()->insert('order', [
                'id' => $this->orderId[$title],
                'status_id' => $orders['status_id'],
                'payment_id' => $orders['payment_id'],
                'shipping_id' => $orders['shipping_id'],
                'shipping_address' => $orders['shipping_address'],
                'created_time' => time(),
                'updated_time' => time(),
                'user_id' => $uuidUser,
            ])->execute();
        }

        //Insert test data to product_order table
        foreach ($this->orderProducts as $orderProducts) {
            $connection->createCommand()->insert('product_order', [
                'id' => Uuid::uuid4()->toString(),
                'quantity' => $orderProducts['quantity'],
                'discount' => $orderProducts['discount'],
                'product_id' => $this->productId[$orderProducts['product']],
                'order_id' => $this->orderId[$orderProducts['order']],
            ])->execute();
        }

        //Insert test data to photo table
        foreach ($this->photos as $title => $photos) {
            $connection->createCommand()->insert('photo', [
                'id' => Uuid::uuid4()->toString(),
                'name' => $title,
                'is_main' => $photos['is_main'],
                'created_time' => time(),
                'product_id' => $this->productId[$photos['product']],
            ])->execute();
        }

        //Insert test data to admin table
        $connection->createCommand()->insert('admin', [
            'id' => Uuid::uuid4()->toString(),
            'username' => 'store-admin',
            'auth_key' => 'nj23bi2121onlk',
            'password_hash' => ' 2jrb21uio421nip4n2;1m',
            'password_reset_token' => 'j2n1bui421124nl21',
            'email' => 'admin@example.com',
            'verification_token' => 'n23j5b321p;251m',
            'status_id' => 10,
            'created_time' => time(),
            'updated_time' => time(),
        ])->execute();
    }

    public function actionDelete()
    {
        User::deleteAll();
        Category::deleteAll();
        Brand::deleteAll();
        Product::deleteAll();
        Param::deleteAll();
        ProductParamValue::deleteAll();
        CategoryParam::deleteAll();
        Order::deleteAll();
        ProductOrder::deleteAll();
        Photo::deleteAll();
        Admin::deleteAll();
    }
}
