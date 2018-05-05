<?php

namespace App\Service;

/**
 * Class Expertises
 * @package App\Service
 */
class Expertises
{
    /**
     * @return array
     */
    public function getItems()
    {
        return [
            'rilievi-topografici' =>
                [
                    'title' => 'Rilievi con laser scanner, rilievo celerimetrico, rilievi topografici, rilievi gps',
                    'description' => 'Eseguiamo rilievi gps, rilievo celerimetrico, rilievo con laser scanner 3D, rilievi topografici in veneto e in tutta Italia',
                    'binding_path' => 'rilievi_topografici',
                    'menu' => 'rilievo topografico',
                    'plural' => 'rilievi topografici',
                    'image' => 'rilievi-topografici-hover.jpg',
                ],
            'piani-quotati' =>
                [
                    'title' => 'Piani quotati per miglioramenti fondiari',
                    'description' => 'Realizzazione di piani quotati per miglioramenti fondiari',
                    'binding_path' => 'piani_quotati',
                    'menu' => 'piano quotato',
                    'plural' => 'piani quotati',
                    'image' => 'piano-quotato-hover.jpg',
                ],
            'frazionamenti-lottizzazioni' =>
                [
                    'title' => 'Frazionamento e tracciamento di strade e lotti',
                    'description' => 'Frazionamenti e tracciamenti per lottizzazioni e urbanizzazioni',
                    'binding_path' => 'frazionamenti_lottizzazioni',
                    'menu' => 'accatastamenti e riconfinazioni',
                    'plural' => 'frazionamento e tracciamento',
                    'image' => 'frazionamento-tracciamento-lottizzazione-hover.jpg',
                ],
            'accatastamenti-riconfinazioni' =>
                [
                    'title' => 'Accatastamenti e riconfinazioni',
                    'description' => 'Rilievi gps, rilievo celerimetrico, rilievi topografici per accatastamenti e riconfinazioni',
                    'binding_path' => 'accatastamenti_riconfinazioni',
                    'menu' => 'accatastamento e riconfinazione',
                    'plural' => 'accatastamenti e riconfinazioni',
                    'image' => 'accatastamento-riconfinazione-hover.jpg',
                ],
            'progettazione-edile' =>
                [
                    'title' => 'Progettazione Edile',
                    'description' => 'Progettazione edile, realizzazione progetti per edilizia privata e industriale',
                    'binding_path' => 'progettazione_edile',
                    'menu' => 'progettazione edile',
                    'plural' => 'progettazione edile',
                    'image' => 'progettazione-edile-hover.jpg',
                ],
        ];
    }
}