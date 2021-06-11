<?php

namespace app\models;

class FreeSection
{
    private $_sections;


    public function __construct()
    {
        $this->_sections = [
            0 => [
                'name' => 'Все базы данных',
                'desc' => 'Все бесплатные базы данных.',
                'link' => 'all-db',
            ],
            1 => [
                'name' => 'Общероссийские классификаторы',
                'desc' => 'Российские классификаторы раличной тематики.',
                'link' => 'russian-classification',
            ],
            2 => [
                'name' => 'Медицинские классификаторы',
                'desc' => 'Международные и российские отраслевые медицинские классификаторы.',
                'link' => 'medical-classification',
            ],
            3 => [
                'name' => 'Организации',
                'desc' => 'Данные об организациях в различных срезах.',
                'link' => 'organizations',
            ],
            4 => [
                'name' => 'Фильмы',
                'desc' => 'Данные о российских и зарубежных кинофильмах.',
                'link' => 'films',
            ],
            5 => [
                'name' => 'Авто',
                'desc' => 'Данные об автомобилях.',
                'link' => 'avto',
            ],
            6 => [
                'name' => 'Города и страны',
                'desc' => 'Города, регионы, области, страны.',
                'link' => 'cities-countries',
            ],
            7 => [
                'name' => 'Логины и пароли',
                'desc' => 'Логины, пароли, никнеймы',
                'link' => 'login-password',
            ],
        ];
    }

    public function getList()
    {
        $dataBases = new FreeDb;
        foreach ($this->_sections as $key => &$sections) {
            if ($key) {
                $sections['count'] = $dataBases->getCount($key);
            } else {
                $sections['count'] = $dataBases->getCountAll();
            }
        }

        array_multisort(array_column($this->_sections, 'name'), SORT_ASC, SORT_STRING, $this->_sections);

        return $this->_sections;
    }

    public function getSectionByLink(string $link)
    {
        foreach ($this->_sections as $key => &$section) {
            if ($section['link'] == $link) {
                $section['key'] = $key;
                return $section;
            }
        }

        return 'Section not found';
    }

}
