<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact | Online Store | ITEA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container our-policy">
    <h2 class="sub-page__title"><?= Html::encode($this->title) ?></h2>
    <h3 class="sub-page__sub-title">
        We are at the top of the market
    </h3>
    <div class="our-policy__paragraph">
        When your business expands quickly, it can be hard to stay on top of policy creation and management. Sure,
        there may be quite a few unwritten rules that employees seem to be aware of and your organization just
        hasn’t gotten around to putting on paper yet, but those rules tend to cause more confusion than not. Just
        like the telephone game we played as kids, new rules heard “through the grapevine” are easily not shared
        correctly, misinterpreted and misunderstood.
    </div>
    <ol class="list" type="1">
        <li class="list__item">
            <span class="list__item-bold">Employee Position Descriptions</span> – Define the role of every
            employee, including their level of responsibility, amount of authority for decision-making, overarching
            goals and specific tasks. Also create methods for monitoring performance and developing employees
            through training.
        </li>
        <li class="list__item">
            <span class="list__item-bold">Personnel Policies</span> – Clearly state business hours, terms of employment
            (hiring and termination), wages or salary (and bonuses, if any), insurance and health benefits,
            paid vs. unpaid vacation days, sick leave, and retirement.
        </li>
        <li class="list__item">
            <span class="list__item-bold">Organizational Structure</span> – Create a chart with each person’s name and
            title showing how each person fits into the structure of the organization.
        </li>
        <li class="list__item">
            <span class="list__item-bold">Disciplinary Action</span> – Address issues of honesty, performance, safety and
            misconduct, and determine what constitutes a violation of company policy, as well as how employees
            will be disciplined if they violate certain rules.
        </li>
        <li class="list__item"> <span class="list__item-bold">No Retaliation</span> – Make sure to have a no
            retaliation policy to protect your employees and the company.</li>
        <li class="list__item"> <span class="list__item-bold">Technology</span> – Establish what’s acceptable and
            what’s not in regards to Internet, email and social media usage for personal purposes at work.</li>
        </ol>
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'subject') ?>

        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div> <!-- container -->
