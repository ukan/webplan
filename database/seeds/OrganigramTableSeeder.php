<?php

use App\Models\Organigram;
use Illuminate\Database\Seeder;

class OrganigramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organigram')->truncate();

        foreach ($this->getOrganigram() as $organ) {
            $org = new Organigram();   
            $org->nama = $organ;   
            $org->save();   
        }
    }

    private function getOrganigram()
    {
        return [
            'Pusat',
            'Jadwal',
        ];
    }
}
