<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use DateTime;

/**
 * This is the model class for table "visits".
 *
 * @property int $id
 * @property string $ip
 * @property string|null $time
 */
class Visit extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'visits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['ip'], 'required'],
            [['ip', 'time'], 'string', 'max' => 255],
            [
                ['time'],
                'default',
                'value' => (new DateTime)->format(Yii::$app->formatter->datetimeFormat),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'ip' => 'IP',
            'time' => 'Время посещения',
        ];
    }
}
