<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Produto".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property double $valor
 * @property int $id_categoria
 *
 * @property Categoria $categoria
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'valor', 'id_categoria'], 'required'],
            [['valor'], 'number'],
            [['id_categoria'], 'integer'],
            [['nome'], 'string', 'max' => 20],
            [['descricao'], 'string', 'max' => 40],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'id_categoria' => 'Id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'id_categoria']);
    }
}
