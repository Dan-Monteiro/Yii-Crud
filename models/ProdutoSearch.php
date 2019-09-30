<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{

    public $categoria;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_categoria'], 'integer'],
            [['nome', 'descricao', 'categoria'], 'safe'],
            [['valor'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produto::find();
        $query->joinWith('categoria');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['categoria'] = [
            'asc' => ['Categoria.nome' => SORT_ASC],
            'desc' => ['Categoria.nome' => SORT_DESC],
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'valor' => $this->valor
        ]);

        $query->andFilterWhere(['like', 'Produto.nome', $this->nome])
            ->andFilterWhere(['like', 'Produto.descricao', $this->descricao])
            ->andFilterWhere(['like', 'Categoria.nome', $this->categoria]);

        return $dataProvider;
    }
}
