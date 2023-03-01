<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

/**
 * Поисковая модель Visit
 *
 * @property-read array $columns
 */
class VisitSearch extends Visit
{
    protected ActiveQuery $query;

    public function getColumns(): array
    {
        return [
            'time',
            'ip',
            'remote_ip',
            'host',
            'remote_host',
            'user_agent',
            'origin',
            'referrer',
        ];
    }

    /** Примитивная like фильтрация */
    protected function addFilters(): void
    {
        foreach ($this->columns as $column) {
            if (isset($this->$column)) {
                $this->query->andFilterWhere([
                    'like',
                    new Expression("lower({$column})"),
                    mb_strtolower($this->$column)
                ]);
            }
        }
    }

    public function search(array $params, bool $showUserIpNotes = true): ActiveDataProvider
    {
        $this->load($params);
        $this->query = static::find();

        if (!$showUserIpNotes) {
            $request = Yii::$app->request;
            $this->query->where(['<>', 'ip', $request->getUserIP()]);
        }

        $this->addFilters();

        return new ActiveDataProvider([
            'query' => $this->query,
            'pagination' => [
                'pageSize' => 8,
            ],
            'sort' => [
                'defaultOrder' => [
                    'time' => SORT_ASC,
                ]
            ],
        ]);
    }
}
