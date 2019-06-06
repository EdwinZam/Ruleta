<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $nombre;
    public $correo;

    public function rules()
    {
        return [
            [['nombre', 'email'], 'required'],
            ['correo', 'email'],
        ];
    }
}
