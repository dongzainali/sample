<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SampleService */

$this->title = Yii::t('frontend', 'Update {modelClass}: ', [
    'modelClass' => 'Sample Service',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Sample Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('frontend', 'Update');
?>
<div class="sample-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
