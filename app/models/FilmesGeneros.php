<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filmes_generos".
 *
 * @property integer $fk_idgereros
 * @property integer $fk_idfilmes
 *
 * @property Generos $fkIdgereros
 * @property Filmes $fkIdfilmes
 */
class FilmesGeneros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filmes_generos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_idgereros', 'fk_idfilmes'], 'required'],
            [['fk_idgereros', 'fk_idfilmes'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fk_idgereros' => Yii::t('app', 'Fk Idgereros'),
            'fk_idfilmes' => Yii::t('app', 'Fk Idfilmes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdgereros()
    {
        return $this->hasOne(Generos::className(), ['idgeneros' => 'fk_idgereros']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdfilmes()
    {
        return $this->hasOne(Filmes::className(), ['idfilmes' => 'fk_idfilmes']);
    }
}
