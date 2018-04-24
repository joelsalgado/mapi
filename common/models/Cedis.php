<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "CAT_CEDIS_MAP".
 *
 * @property string $GID
 * @property string $REGION
 * @property string $CVE_MUNICIPIO
 * @property string $MUNICIPIO
 * @property string $CVE_CEDIS
 * @property string $CEDIS
 * @property string $DOMICILIO
 * @property string $TELEFONO
 * @property double $LATITUD
 * @property double $LONGITUD
 */
class Cedis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'CAT_CEDIS_MAP';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GID', 'CVE_MUNICIPIO', 'CVE_CEDIS', 'LATITUD', 'LONGITUD'], 'number'],
            [['REGION'], 'string', 'max' => 36],
            [['MUNICIPIO'], 'string', 'max' => 80],
            [['CEDIS'], 'string', 'max' => 130],
            [['DOMICILIO'], 'string', 'max' => 150],
            [['TELEFONO'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'GID' => 'Gid',
            'REGION' => 'Region',
            'CVE_MUNICIPIO' => 'Cve  Municipio',
            'MUNICIPIO' => 'Municipio',
            'CVE_CEDIS' => 'Cve  Cedis',
            'CEDIS' => 'Cedis',
            'DOMICILIO' => 'Domicilio',
            'TELEFONO' => 'Telefono',
            'LATITUD' => 'Latitud',
            'LONGITUD' => 'Longitud',
        ];
    }
}
