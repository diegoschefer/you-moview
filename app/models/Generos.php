<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generos".
 *
 * @property integer $idgeneros
 * @property string $nome
 *
 * @property FilmesGeneros[] $filmesGeneros
 */
class Generos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgeneros' => Yii::t('app', 'Idgeneros'),
            'nome' => Yii::t('app', 'Nome'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmesGeneros()
    {
        return $this->hasMany(FilmesGeneros::className(), ['fk_idgereros' => 'idgeneros']);
    }
}
