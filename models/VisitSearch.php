<?php

namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * Поисковая модель Visit
 *
 * @property-read array $columns
 */
class VisitSearch extends Visit
{
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

    public function search(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => Visit::find(),
            'pagination' => [
                'pageSize' => 8,
            ],
            'sort' => [
                'defaultOrder' => [
                    'time' => SORT_DESC,
                ]
            ],
        ]);
    }
}
