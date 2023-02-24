<?php

namespace app\models\forms;


use app\models\logical\ProjectParams;
use yii\base\Model;

class UserIpForm extends Model
{
    public bool $showUserIpNotes = false;

    public static function create(): static
    {
        $model = new static();
        $model->showUserIpNotes = ProjectParams::getShowUserIpNotes();
        return $model;
    }

    public function rules(): array
    {
        return [
            ['showUserIpNotes', 'boolean'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'showUserIpNotes' => 'Показывать записи с моим IP',
        ];
    }
}
