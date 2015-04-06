<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avaliacoes;

/**
 * AvaliacoesSearch represents the model behind the search form about `app\models\Avaliacoes`.
 */
class AvaliacoesSearch extends Avaliacoes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idavaliacoes', 'nota'], 'integer'],
            [['fk_idfilmes', 'comentarios', 'local', 'companhia', 'data'], 'safe'],
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
        $query = Avaliacoes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('filmes');

        $query->andFilterWhere([
            'idavaliacoes' => $this->idavaliacoes,
            'nota' => $this->nota,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'comentarios', $this->comentarios])
            ->andFilterWhere(['like', 'local', $this->local])
            ->andFilterWhere(['like', 'companhia', $this->companhia])
            ->andFilterWhere(['like', 'filmes.nome', $this->fk_idfilmes]);
        
        $query->orderBy(array("data" => SORT_DESC));
        
        return $dataProvider;
    }
}
