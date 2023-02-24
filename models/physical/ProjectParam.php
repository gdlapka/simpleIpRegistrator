<?php

namespace app\models\physical;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "project_params".
 *
 * @property int $id
 * @property string $param_key
 * @property string|null $param_value
 */
class ProjectParam extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'project_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['param_key'], 'required'],
            [['param_key', 'param_value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'param_key' => 'Параметр',
            'param_value' => 'Значение',
        ];
    }
}
