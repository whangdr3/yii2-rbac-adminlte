<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \bahirul\yii2rbac\adminlte\models\AuthItemModel */

$context = $this->context;
$labels = $this->context->getLabels();
$this->title = Yii::t('yii2mod.rbac', 'Update ' . $labels['Item'] . ' : {0}', $model->name);
$this->params['breadcrumbs'][] = 'RBAC';
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii2mod.rbac', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('yii2mod.rbac', 'Update');
$this->render('/layouts/_sidebar');
?>
<div class="auth-item-update">
    <div class="box box-primary">
		<div class="box-header with-border">
    		<h4><?php echo Html::encode($this->title); ?></h4>
    	</div>
	    <div class="box-body">
		    <?php echo $this->render('_form', [
		        'model' => $model,
		    ]); ?>
		</div>
	</div>
</div>