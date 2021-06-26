<?php

namespace app\models;

class PaidDb
{
    private $_dataBases;


    public function __construct()
    {
        $this->_dataBases = [
            [
                'id' => 1,
                'name' => 'Каталог характеристик автотранспорта',
                'desc' => 'Каталог содержит характеристики автотранспорта, включая марку, модель, поколение (с указанием года начала и года окончания выпуска поколения модели), серию и модификацию (с указанием года начала и года окончания производства модели).',
                'section' => 1,
                'file' => 'demo-avto1.zip',
                'sizeFile' => '432 КБ',
                'cost' => '2 000',
            ],
        ];
    }

    public function getListAll()
    {
        array_multisort(array_column($this->_dataBases, 'name'), SORT_ASC, SORT_STRING, $this->_dataBases);

        return $this->_dataBases;
    }

    public function getList(int $section)
    {
        $ret = [];
        foreach ($this->_dataBases as $db) {
            if ($db['section'] == $section) {
                $ret[] = $db;
            }
        }
        array_multisort(array_column($ret, 'name'), SORT_ASC, SORT_STRING, $ret);

        return $ret;
    }

    public function getCount(int $section)
    {
        $count = 0;
        foreach ($this->_dataBases as $db) {
            if ($db['section'] == $section) {
                $count++;
            }
        }

        return $count;
    }

    public function getCountAll()
    {
        return count($this->_dataBases);
    }

    public function getDB(int $index)
    {
        foreach ($this->_dataBases as $db) {
            if ($db['id'] == $index) {
                return $db;
            }
        }

        return null;
    }

}
