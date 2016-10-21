<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Category;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '类别');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '新建分类'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => " {begin} - {end} 共计 {totalCount} 项",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            [
                'label'=>'所属分类',
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'pid',
                'value'=> function ($model) {
                    return (Category::find()->where(['=', 'id', $model->pid])->asArray()->one()['id']>0)? Category::find()->where(['=', 'id', $model->pid])->asArray()->one()['name']:'无';
                },
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
