<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ESTADISTICAS_MAPI".
 *
 * @property string $GID
 * @property string $CVE_ENT
 * @property string $CVE_MUN
 * @property string $CLAVEMUN
 * @property string $NOM_MUN
 * @property string $TOTAL_MUN
 * @property string $REGION_NOM
 * @property string $REGION
 * @property string $TOTAL_REG
 */
class RegMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ESTADISTICAS_MAPI';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GID', 'CVE_ENT', 'CVE_MUN', 'CLAVEMUN', 'TOTAL_MUN', 'TOTAL_REG'], 'number'],
            [['NOM_MUN'], 'string', 'max' => 80],
            [['REGION_NOM'], 'string', 'max' => 20],
            [['REGION'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'GID' => 'Gid',
            'CVE_ENT' => 'Cve  Ent',
            'CVE_MUN' => 'Cve  Mun',
            'CLAVEMUN' => 'Clavemun',
            'NOM_MUN' => 'Nom  Mun',
            'TOTAL_MUN' => 'Total  Mun',
            'REGION_NOM' => 'Region  Nom',
            'REGION' => 'Region',
            'TOTAL_REG' => 'Total  Reg',
        ];
    }
}
