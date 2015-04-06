<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Filmes;

/**
 * FilmesSearch represents the model behind the search form about `app\models\Filmes`.
 */
class FilmesSearch extends Filmes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfilmes', 'ano', 'status'], 'integer'],
            [['nome', 'pais', 'imagem'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Filmes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idfilmes' => $this->idfilmes,
            'ano' => $this->ano,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'pais', $this->pais]);
        
        $query->select(array("filmes.*", "avaliacoes.data"));
        $query->leftJoin('avaliacoes', array("filmes.idfilmes" => "avaliacoes.fk_idfilmes"));
        $query->orderBy(array("avaliacoes.data" => SORT_DESC));
        
        return $dataProvider;
    }
}
