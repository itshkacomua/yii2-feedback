<?php

namespace itshkacomua\feedback\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use itshkacomua\feedback\models\FeedBack;

/**
 * FeedBackSearch represents the model behind the search form of `itshkacomua\feedback\models\FeedBack`.
 */
class FeedBackSearch extends FeedBack
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'purpose_id', 'created_at', 'user_update', 'updated_at'], 'integer'],
            [['name', 'email', 'subject', 'content', 'answer', 'phone'], 'safe'],
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
        $query = FeedBack::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'purpose_id' => $this->purpose_id,
            'created_at' => $this->created_at,
            'user_update' => $this->user_update,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
