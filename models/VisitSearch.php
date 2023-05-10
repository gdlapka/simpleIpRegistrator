<?php

namespace app\models;

use Yii;
use Carbon\Carbon;
use yii\db\Expression;
use yii\db\ActiveQuery;
use yii\data\ActiveDataProvider;

/**
 * Поисковая модель Visit
 *
 * @property-read array $columns
 * @property-read string $sortableTime
 */
class VisitSearch extends Visit
{
    protected ActiveQuery $query;

    public function getColumns(): array
    {
        return [
            [
                'attribute' => 'time',
                'value' => function($model) {
                    return Carbon::createFromFormat('Y.m.d H:i:s', $model->time)->format('d.m.Y H:i:s');
                },
            ],
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
            if (is_array($column)) {
                $column = $column['attribute'];
            }

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
