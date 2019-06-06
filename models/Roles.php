<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $id
 * @property string $id_rol
 * @property string $rol
 */
class Roles extends \yii\db\ActiveRecord
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
            [['id_rol', 'rol'], 'required'],
            [['id_rol', 'rol'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_rol' => 'Id Rol',
            'rol' => 'Rol',
        ];
    }
}
