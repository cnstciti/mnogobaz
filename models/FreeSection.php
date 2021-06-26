<?php

namespace app\models;

class FreeSection
{
    private $_sections;


    public function __construct()
    {
        $this->_sections = [
            0 => [
                'name' => 'Все бесплатные базы данных',
                'desc' => 'Полный список бесплатных баз данных.',
                'link' => 'all-db',
                'icon' => [
                    'name'      => 'check-double',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
            ],
            1 => [
                'name' => 'Общероссийские классификаторы',
                'desc' => 'Российские классификаторы различной тематики.',
                'link' => 'russian-classification',
                'icon' => [
                    'name'      => 'file-alt',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
            ],
            2 => [
                'name' => 'Медицинские классификаторы',
                'desc' => 'Международные и российские отраслевые медицинские классификаторы.',
                'link' => 'medical-classification',
                'icon' => [
                    'name'      => 'file-medical-alt',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
            ],
            3 => [
                'name' => 'Организации',
                'desc' => 'Данные об организациях в различных срезах.',
                'link' => 'organizations',
                'icon' => [
                    'name'      => 'building',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
            ],
            4 => [
                'name' => 'Фильмы',
                'desc' => 'Данные о российских и зарубежных кинофильмах.',
                'link' => 'films',
                'icon' => [
                    'name'      => 'film',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
            ],
            5 => [
                'name' => 'Автотранспорт',
                'desc' => 'Данные об автотранспорте.',
                'link' => 'avto',
                'icon' => [
                    'name'      => 'shuttle-van',
                    'options'   => ['class' => 'fa-3x fa-flip-horizontal'],
                    'framework' => 'fa',
                ],
            ],
            6 => [
                'name' => 'Города и страны',
                'desc' => 'Города, регионы, области, страны.',
                'link' => 'cities-countries',
                'icon' => [
                    'name'      => 'globe',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
            ],
            7 => [
                'name' => 'Логины и пароли',
                'desc' => 'Логины, пароли, никнеймы.',
                'link' => 'login-password',
                'icon' => [
                    'name'      => 'key',
                    'options'   => ['class' => 'fa-3x'],
                    'framework' => 'fa',
                ],
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
