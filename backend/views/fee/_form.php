<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Fee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feedate')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'zh-cn',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'money')->textInput(['maxlength' => true]) ?>

    <?php 
       $categories=Category::find()->all();
       $listData=ArrayHelper::map($categories,'id','name');
    ?>
    
    <?= $form->field($model, 'cid')->dropDownList(
                $listData,
                ['prompt'=>'选择...']);
    ?>
    <?= $form->field($model, 'remark')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
