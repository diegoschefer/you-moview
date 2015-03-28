<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\FilmesGeneros;

/**
 * This is the model class for table "filmes".
 *
 * @property integer $idfilmes
 * @property string $nome
 * @property integer $ano
 * @property string $pais
 * @property string $imagem
 * @property integer $status
 *
 * @property Avaliacoes[] $avaliacoes
 * @property FilmesGeneros[] $filmesGeneros
 */
class Filmes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $filmesGeneros;
     
    public static function tableName()
    {
        return 'filmes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome','filmesGeneros'], 'required'],
            [['ano', 'status'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['pais'], 'string', 'max' => 45],
            [['imagem'], 'file', 'extensions' => 'gif, jpg, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfilmes' => Yii::t('app', 'Idfilmes'),
            'nome' => Yii::t('app', 'Nome'),
            'ano' => Yii::t('app', 'Ano'),
            'pais' => Yii::t('app', 'Pais'),
            'imagem' => Yii::t('app', 'Imagem'),
            'status' => Yii::t('app', 'Status'),
            'FilmesGeneros' => Yii::t('app', 'Generos'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacoes()
    {
        return $this->hasMany(Avaliacoes::className(), ['fk_idfilmes' => 'idfilmes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmesGeneros()
    {
        return $this->hasMany(FilmesGeneros::className(), ['fk_idfilmes' => 'idfilmes']);
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmesGenerosList()
    {
        $query = FilmesGeneros::find()->where(['fk_idfilmes' => $this->idfilmes])->groupBy('fk_idgereros')->asArray()->all();
        $list  = [];
        foreach($query as $item){
            $list[] = $item['fk_idgereros'];
        }
        return $list;
    }
    
    public function getImageurl()
    {
        return !empty($this->imagem) ? \Yii::$app->request->BaseUrl.'/uploads/'.$this->imagem : 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xpt1/v/t34.0-12/11075726_817902481635971_1116253616_n.jpg?oh=33235612b967e30612df9e60bf585dd1&oe=55182BF1&__gda__=1427650754_809402110b65a4695bcafba0699521d6';
    }
    
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'children' => array(self::HAS_MANY, 'FilmesGeneros', 'fk_idfilmes'),
        );
    }
    
}
