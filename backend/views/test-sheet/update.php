<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestSheet */

$this->title = $model->name;

$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="test-sheet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>