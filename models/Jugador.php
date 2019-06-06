<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jugador".
 *
 * @property integer $id_jugador
 * @property string $nombre
 * @property integer $dinero
 */
class Jugador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jugador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'dinero'], 'required'],
            [['dinero'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jugador' => 'Id Jugador',
            'nombre' => 'Nombre',
            'dinero' => 'Dinero',
        ];
    }
}
