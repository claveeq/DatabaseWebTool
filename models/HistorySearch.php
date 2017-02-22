<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\History;

/**
 * HistorySearch represents the model behind the search form about `app\models\History`.
 */
class HistorySearch extends History
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['history_id'], 'integer'],
            [['history_server_name', 'history_db_name', 'history_date', 'history_dumpfile_loc'], 'safe'],
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
        $query = History::find();

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
            'history_id' => $this->history_id,
        ]);

        $query->andFilterWhere(['like', 'history_server_name', $this->history_server_name])
            ->andFilterWhere(['like', 'history_db_name', $this->history_db_name])
            ->andFilterWhere(['like', 'history_date', $this->history_date])
            ->andFilterWhere(['like', 'history_dumpfile_loc', $this->history_dumpfile_loc]);

        return $dataProvider;
    }
}
