<?php

namespace app\models\logical;

use app\models\physical\ProjectParam;
use yii\db\ActiveRecord;

class ProjectParams
{
    public const KEY_SHOW_USER_IP_NOTES = 'showUserIpNotes';

    protected static function getModel(string $paramKey): ?ActiveRecord
    {
        return ProjectParam::find()
            ->where(['param_key' => $paramKey])
            ->one();
    }

    public static function get(string $key): string
    {
        /** @var ProjectParam $model */
        $model = static::getModel($key);
        return $model->param_value;
    }

    public static function set(string $key, string $value): void
    {
        /** @var ProjectParam $model */
        $model = static::getModel($key);
        $model->param_value = $value;
        $model->save();
    }

    public static function getShowUserIpNotes(): bool
    {
        return (bool) static::get(static::KEY_SHOW_USER_IP_NOTES);
    }

    public static function setShowUserIpNotes(bool $value): void
    {
        static::set(static::KEY_SHOW_USER_IP_NOTES, $value ? '1' : '0');
    }
}
