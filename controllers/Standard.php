<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crud".
 *
 * @property integer $id
 */
class Standard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id_rol', 'trim'],
			['rol', 'trim'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rol' => 'ID Rol',
			'rol' => 'Rol',
        ];
    }
}
