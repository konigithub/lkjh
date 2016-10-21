<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Fees');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fee-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Fee'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => " {begin} - {end} 共计 {totalCount} 项",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'feedate',
            'money',
            [
                'label'=>'消费类型',
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'cid',
                'value'=> function ($model) {
                    return (Category::find()->where(['=', 'id', $model->cid])->asArray()->one()['id']>0)? Category::find()->where(['=', 'id', $model->cid])->asArray()->one()['name']:'无';
                },
                
            ],
            'remark',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
