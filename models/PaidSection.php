<?php

namespace app\models;

class PaidSection
{
    private $_sections;


    public function __construct()
    {
        $this->_sections = [
            /*
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
            */
        ];
    }

    public function getList()
    {
        $dataBases = new PaidDb;
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
