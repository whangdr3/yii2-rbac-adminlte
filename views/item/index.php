<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $searchModel \bahirul\yii2rbac\adminlte\models\search\AuthItemSearch */

$labels = $this->context->getLabels();
$this->title = Yii::t('yii2mod.rbac', $labels['Items']);
$this->params['breadcrumbs'][] = 'RBAC';
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>
<div class="item-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h4><?php echo Html::encode($this->title); ?></h4>
        </div>
        <div class="box-body">
            <p>
                <?php echo Html::a(Yii::t('yii2mod.rbac', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']); ?>
            </p>
            <?php Pjax::begin(['timeout' => 5000, 'enablePushState' => false]); ?>

            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n{summary}\n{pager}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('yii2mod.rbac', 'Name'),
                    ],
                    [
                        'attribute' => 'ruleName',
                        'label' => Yii::t('yii2mod.rbac', 'Rule Name'),
                        'filter' => ArrayHelper::map(Yii::$app->getAuthManager()->getRules(), 'name', 'name'),
                        'filterInputOptions' => ['class' => 'form-control', 'prompt' => Yii::t('yii2mod.rbac', 'Select Rule')],
                    ],
                    [
                        'attribute' => 'description',
                        'format' => 'ntext',
                        'label' => Yii::t('yii2mod.rbac', 'Description'),
                    ],
                    [
                        'header' => Yii::t('yii2mod.rbac', 'Action'),
                        'class' => 'bahirul\yii2rbac\adminlte\grid\ActionColumn',
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>