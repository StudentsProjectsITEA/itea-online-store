<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'formAddresses',
        'class' => 'section-profile-content-item',
        'data-target' => 'addresses',
    ]
]); ?>
<?php foreach ($model->address as $key => $address) : ?>
    <?php echo $form
        ->field($model, 'address')
        ->textInput([
            'class' => 'section-profile-content-input',
            'placeholder' => 'Your address...',
            'value' => Html::encode($address),
        ])
        ->label('Your address ' . ($key + 1), [
            'class' => 'section-profile-content-label',
        ]) ?>
<?php endforeach; ?>

<?php echo Html::button('Add new address', [
    'id' => 'addNewAddress',
    'class' => 'section-profile-content-btn',
]) ?>

<?php echo Html::submitButton('Save changes', ['class' => 'section-profile-content-btn']) ?>

<?php ActiveForm::end(); ?>
