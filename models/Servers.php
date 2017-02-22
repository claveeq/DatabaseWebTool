<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servers".
 *
 * @property integer $ip_id
 * @property string $ip
 */
class Servers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ip'], 'required'],
            [['ip'], 'string', 'max' => 15],
            [['ip'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ip_id' => 'Ip ID',
            'ip' => 'Ip',
        ];
    }
}
