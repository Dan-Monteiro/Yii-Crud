<?php

//use yii\helpers\Html;
use kartik\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin([
        'id' => 'createProduto',
    ]); ?>

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
        'addon' => [
            'append' => [
                'content' => Html::button(Html::icon('plus'), [
                    'class' => 'btn btn-danger', 
                    'title' => 'Adicionar Categoria', 
                    'data-toggle' => 'tooltip',
                    'data-toggle' => 'modal',
                    'data-target'=> '#myModalHorizontal'
                ]),
                'asButton' => true
            ]
        ]
    ]));
    ?>
    <div class="form-group">
        <?= Html::submitButton(Html::encode($btnLabel), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cadastro Categoria
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">

                <?php $form = ActiveForm::begin([
                    'id' => 'createCategoria',
                ]); ?>

                <?= $form->field($modelCategoria, 'nome')->textInput(['maxlength' => true]) ?>

                <?= $form->field($modelCategoria, 'descricao')->textInput(['maxlength' => true]) ?>
                      
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Fechar
                </button>
                <?= Html::submitButton(Html::encode($btnLabel), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
