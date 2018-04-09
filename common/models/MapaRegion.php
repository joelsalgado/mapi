<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ESTADISTICA_REGION".
 *
 * @property string $CVE_REGION
 * @property string $REGION
 * @property string $TOTAL
 */
class MapaRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ESTADISTICA_REGION';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CVE_REGION', 'TOTAL'], 'number'],
            [['REGION'], 'string', 'max' => 36],
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
            'TOTAL' => 'Total',
        ];
    }
}
