<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "FURWEB_ENTREGAS_300".
 *
 * @property string $N_PERIODO
 * @property string $CVE_PROGRAMA
 * @property int $FOLIO
 * @property string $FOLIO_RELACIONADO
 * @property string $CVE_CEDIS
 * @property string $MES
 * @property string $TARJETA
 * @property string $TARJETA_ID
 * @property string $CVE_BENEFICIO1
 * @property string $CVE_BENEFICIO2
 * @property string $CVE_BENEFICIO3
 * @property double $COSTO_1
 * @property double $COSTO_2
 * @property double $COSTO_3
 * @property string $TIPO_ENTREGA
 * @property string $FECHA_REG
 * @property string $USU
 * @property string $IP
 * @property string $FECHA_M
 * @property string $USU_M
 * @property string $IP_M
 * @property string $DISPOSITIVO_ID
 */
class Entrega extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'FURWEB_ENTREGAS_300';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['N_PERIODO', 'CVE_PROGRAMA', 'CVE_CEDIS', 'MES', 'CVE_BENEFICIO1', 'CVE_BENEFICIO2', 'CVE_BENEFICIO3', 'COSTO_1', 'COSTO_2', 'COSTO_3'], 'number'],
            [['FOLIO'], 'integer'],
            [['FOLIO_RELACIONADO'], 'string', 'max' => 16],
            [['TARJETA', 'TARJETA_ID', 'DISPOSITIVO_ID'], 'string', 'max' => 20],
            [['TIPO_ENTREGA'], 'string', 'max' => 1],
            [['FECHA_REG', 'FECHA_M'], 'string', 'max' => 7],
            [['USU', 'IP', 'USU_M', 'IP_M'], 'string', 'max' => 80],
            [['N_PERIODO', 'CVE_PROGRAMA', 'FOLIO', 'CVE_CEDIS', 'MES', 'TARJETA_ID'], 'unique', 'targetAttribute' => ['N_PERIODO', 'CVE_PROGRAMA', 'FOLIO', 'CVE_CEDIS', 'MES', 'TARJETA_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'N_PERIODO' => 'N  Periodo',
            'CVE_PROGRAMA' => 'Cve  Programa',
            'FOLIO' => 'Folio',
            'FOLIO_RELACIONADO' => 'Folio  Relacionado',
            'CVE_CEDIS' => 'Cve  Cedis',
            'MES' => 'Mes',
            'TARJETA' => 'Tarjeta',
            'TARJETA_ID' => 'Tarjeta  ID',
            'CVE_BENEFICIO1' => 'Cve  Beneficio1',
            'CVE_BENEFICIO2' => 'Cve  Beneficio2',
            'CVE_BENEFICIO3' => 'Cve  Beneficio3',
            'COSTO_1' => 'Costo 1',
            'COSTO_2' => 'Costo 2',
            'COSTO_3' => 'Costo 3',
            'TIPO_ENTREGA' => 'Tipo  Entrega',
            'FECHA_REG' => 'Fecha  Reg',
            'USU' => 'Usu',
            'IP' => 'Ip',
            'FECHA_M' => 'Fecha  M',
            'USU_M' => 'Usu  M',
            'IP_M' => 'Ip  M',
            'DISPOSITIVO_ID' => 'Dispositivo  ID',
        ];
    }
}
