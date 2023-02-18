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
 * @property string $remote_ip
 * @property string $host
 * @property string $remote_host
 * @property string $user_agent
 * @property string $origin
 * @property string $referrer
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
            [['ip', 'remote_ip', 'host', 'remote_host', 'origin', 'referrer', 'time'], 'string', 'max' => 255],
            [['user_agent'], 'string', 'max' => 512],
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
            'remote_ip' => 'Удаленный IP',
            'host' => 'Хост',
            'remote_host' => 'Удаленный хост',
            'user_agent' => 'User Agent',
            'time' => 'Время посещения',
        ];
    }

    public static function saveCurrent(): void
    {
        $visit = new Visit();
        $request = Yii::$app->request;
        $visit->load([
            'ip'          => $request->getUserIP(),
            'remote_ip'   => $request->getRemoteIP(),
            'host'        => $request->getUserHost(),
            'remote_host' => $request->getRemoteHost(),
            'user_agent'  => $request->getUserAgent(),
            'origin'      => $request->getOrigin(),
            'referrer'    => $request->getReferrer(),
        ], '');
        $visit->save();
    }
}
