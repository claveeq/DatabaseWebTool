<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dbconnection;

/**
 * DbconnectionSearch represents the model behind the search form about `app\models\Dbconnection`.
 */
class DbconnectionSearch extends Dbconnection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['db_id'], 'integer'],
            [['db_host', 'db_username', 'db_password', 'db_database'], 'safe'],
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
        $query = Dbconnection::find();

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
            'db_id' => $this->db_id,
        ]);

        $query->andFilterWhere(['like', 'db_host', $this->db_host])
            ->andFilterWhere(['like', 'db_username', $this->db_username])
            ->andFilterWhere(['like', 'db_password', $this->db_password])
            ->andFilterWhere(['like', 'db_database', $this->db_database]);

        return $dataProvider;
    }
}
