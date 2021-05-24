<?php
namespace app\models\ar;

use yii\db\ActiveRecord;

/**
 *  Таблица "Лог работы прокси-машины"
 *
 * @author Constantin Ogloblin <cnst@mail.ru>
 * @since 1.0.0
 */
class CarCharacteristicValueAR extends ActiveRecord
{

    /**
    * @return string название таблицы, сопоставленной с этим ActiveRecord-классом.
    */
    public static function tableName()
    {
        return '{{car_characteristic_value}}';
    }

}
