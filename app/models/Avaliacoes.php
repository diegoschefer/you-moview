<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avaliacoes".
 *
 * @property integer $idavaliacoes
 * @property integer $nota
 * @property string $comentarios
 * @property string $local
 * @property string $companhia
 * @property string $data
 * @property integer $fk_idfilmes
 *
 * @property Filmes $fkIdfilmes
 */
class Avaliacoes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avaliacoes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota', 'fk_idfilmes'], 'required'],
            [['nota', 'fk_idfilmes'], 'integer'],
            [['comentarios'], 'string'],
            [['data'], 'safe'],
            [['local', 'companhia'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idavaliacoes' => Yii::t('app', 'Idavaliacoes'),
            'nota' => Yii::t('app', 'Nota'),
            'comentarios' => Yii::t('app', 'Comentarios'),
            'local' => Yii::t('app', 'Local'),
            'companhia' => Yii::t('app', 'Companhia'),
            'data' => Yii::t('app', 'Data'),
            'fk_idfilmes' => Yii::t('app', 'Filme'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkIdfilmes()
    {
        return $this->hasOne(Filmes::className(), ['idfilmes' => 'fk_idfilmes']);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmes()
    {
        return $this->hasOne(Filmes::className(), ['idfilmes' => 'fk_idfilmes']);
    }
}
