<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ESTADISTICA_REGION_MPIO".
 *
 * @property string $CVE_REGION
 * @property string $REGION
 * @property string $CVE_MUNICIPIO
 * @property string $MUNICIPIO
 * @property string $TOTAL
 */
class MapaMun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ESTADISTICA_REGION_MPIO';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CVE_REGION', 'CVE_MUNICIPIO', 'TOTAL'], 'number'],
            [['REGION'], 'string', 'max' => 36],
            [['MUNICIPIO'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CVE_REGION' => 'Cve  Region',
            'REGION' => 'Region',
            'CVE_MUNICIPIO' => 'Cve  Municipio',
            'MUNICIPIO' => 'Municipio',
            'TOTAL' => 'Total',
        ];
    }
}
