<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $roomsTemplateA10 = [
        ['number' => '01', 'name' => 'Obývacia izba', 'area' => 16.54],
        ['number' => '02', 'name' => 'Izba', 'area' => 13.44],
        ['number' => '03', 'name' => 'Kuchynský kút', 'area' => 6.02],
        ['number' => '04', 'name' => 'Predsieň', 'area' => 5.60],
        ['number' => '05', 'name' => 'Kúpeľňa', 'area' => 4.34],
        ['number' => '06a', 'name' => 'WC', 'area' => 1.20],
        ['number' => '06b', 'name' => 'Komora', 'area' => 1.54],
        ['number' => '07', 'name' => 'Loggia', 'area' => 4.13],
        ];

        $roomsTemplateB10 = [
            ['number' => '08', 'name' => 'Obývacia izba', 'area' => 26.63],
            ['number' => '09', 'name' => 'Izba', 'area' => 14.07],
            ['number' => '10', 'name' => 'Izba', 'area' => 11.89],
            ['number' => '11', 'name' => 'Izba', 'area' => 11.89],
            ['number' => '12', 'name' => 'Kuchynský kút', 'area' => 12.62],
            ['number' => '13', 'name' => 'Predsieň', 'area' => 5.46],
            ['number' => '14', 'name' => 'Chodba', 'area' => 6.78],
            ['number' => '15', 'name' => 'Šatník', 'area' => 3.87],
            ['number' => '16', 'name' => 'Sprcha', 'area' => 2.81],
            ['number' => '17', 'name' => 'Kúpeľňa', 'area' => 4.70],
            ['number' => '18', 'name' => 'WC', 'area' => 1.40],
            ['number' => '19', 'name' => 'Balkón', 'area' => 8.51],
            ['number' => '20', 'name' => 'Balkón', 'area' => 24.80],
        ];

        $roomsTemplateC10 = [
            ['number' => '21', 'name' => 'Obývacia izba', 'area' => 26.77],
            ['number' => '22', 'name' => 'Izba', 'area' => 12.88],
            ['number' => '23', 'name' => 'Izba', 'area' => 14.28],
            ['number' => '24', 'name' => 'Kuchynský kút', 'area' => 10.14],
            ['number' => '25', 'name' => 'Predsieň', 'area' => 5.53],
            ['number' => '26', 'name' => 'Chodba', 'area' => 4.85],
            ['number' => '27', 'name' => 'Komora', 'area' => 2.78],
            ['number' => '28', 'name' => 'Kúpeľňa', 'area' => 4.99],
            ['number' => '29', 'name' => 'WC', 'area' => 2.49],
            ['number' => '30', 'name' => 'Balkón', 'area' => 9.23],
        ];

        $roomsTemplateD10 = [
            ['number' => '31', 'name' => 'Obývacia izba', 'area' => 18.55],
            ['number' => '32', 'name' => 'Izba', 'area' => 11.91],
            ['number' => '33', 'name' => 'Izba', 'area' => 17.77],
            ['number' => '34', 'name' => 'Izba', 'area' => 18.19],
            ['number' => '35', 'name' => 'Kuchynský kút', 'area' => 7.53],
            ['number' => '36', 'name' => 'Predsieň', 'area' => 8.88],
            ['number' => '37', 'name' => 'Chodba', 'area' => 6.97],
            ['number' => '38', 'name' => 'Kúpeľňa', 'area' => 6.66],
            ['number' => '39', 'name' => 'WC', 'area' => 2.53],
            ['number' => '40', 'name' => 'Balkón', 'area' => 9.23],
        ];

        $roomsTemplateE10 = [
            ['number' => '40', 'name' => 'Balkón', 'area' => 21.69],
            ['number' => '41', 'name' => 'Obývacia izba', 'area' => 30.69],
            ['number' => '42', 'name' => 'Izba', 'area' => 11.74],
            ['number' => '43', 'name' => 'Izba', 'area' => 16.98],
            ['number' => '44', 'name' => 'Izba', 'area' => 11.58],
            ['number' => '45', 'name' => 'Kuchynský kút', 'area' => 11.08],
            ['number' => '46', 'name' => 'Predsieň', 'area' => 9.11],
            ['number' => '47', 'name' => 'Chodba', 'area' => 5.89],
            ['number' => '48', 'name' => 'Šatník', 'area' => 4.65],
            ['number' => '49', 'name' => 'Šatník', 'area' => 3.90],
            ['number' => '50', 'name' => 'Šatník', 'area' => 4.00],
            ['number' => '51', 'name' => 'Kúpeľňa', 'area' => 7.46],
            ['number' => '52', 'name' => 'WC', 'area' => 1.39],
            ['number' => '53', 'name' => 'Balkón', 'area' => 8.51],
        ];

        $roomsTemplateF10 = [
            ['number' => '55', 'name' => 'Obývacia izba', 'area' => 16.54],
            ['number' => '56', 'name' => 'Izba', 'area' => 10.52],
            ['number' => '57', 'name' => 'Kuchynský kút', 'area' => 6.02],
            ['number' => '58', 'name' => 'Predsieň', 'area' => 6.70],
            ['number' => '59', 'name' => 'Kúpeľňa', 'area' => 4.34],
            ['number' => '60a', 'name' => 'WC', 'area' => 1.20],
            ['number' => '60b', 'name' => 'Komora', 'area' => 1.54],
            ['number' => '61', 'name' => 'Loggia', 'area' => 4.13],
        ];
        $this->generate('Byt A', $roomsTemplateA10, 10);
        $this->generate('Byt B', $roomsTemplateB10, 10);
        $this->generate('Byt C', $roomsTemplateC10, 10);
        $this->generate('Byt D', $roomsTemplateD10, 10);
        $this->generate('Byt E', $roomsTemplateE10, 10);
        $this->generate('Byt F', $roomsTemplateF10, 10);
    }

    private function generate($type, $template, $floor)
    {
        $apartments = Apartment::where('floor_id', $floor)
            ->where('name', $type)
            ->get();

        foreach ($apartments as $apartment) {
            foreach ($template as $room) {
                Room::updateOrCreate(
                    [
                        'apartment_id' => $apartment->id,
                        'number' => $floor . '.' . $room['number'],
                    ],
                    [
                        'name' => $room['name'],
                        'area' => $room['area'],
                    ]
                );
            }
        }
    }
}
