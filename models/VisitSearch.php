<?php

namespace app\models;

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

    public bool $showUserIpNotes = false;

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            ['showUserIpNotes', 'boolean'],
        ]);
    }

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

    public function search(array $params): ActiveDataProvider
    {
        $this->load($params);
        $this->query = static::find();
        $this->addFilters();

        return new ActiveDataProvider([
            'query' => $this->query,
            'pagination' => [
                'pageSize' => 8,
            ],
            'sort' => [
                'defaultOrder' => [
                    'time' => SORT_DESC,
                ]
            ],
        ]);    }

    public function attributeLabels(): array
    {
        return array_merge(parent::attributeLabels(), [
            'showUserIpNotes' => 'Показывать записи с моим IP',
        ]);
    }
}
