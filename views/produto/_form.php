<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <!--?= $form->field($model, 'id_categoria')->dropDownList($array, ['prompt'=>'Escolha Categoria']) ?-->

    <?php echo ($form->field($model, 'id_categoria')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($array, 'id', 'nome'),
        'options' => ['placeholder' => 'Escolha Categoria'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]));
    ?>
    <div class="form-group">
        <?= Html::submitButton(Html::encode($btnLabel), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
