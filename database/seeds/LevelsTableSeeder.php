<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->delete();

        DB::table('levels')->insert([
            [
                'name' => 'both',
                'display_name' => 'Both Primary and Secondary',
                'display_name_kh' => 'បឋមសិក្សា​​ និង​ អនុវិទ្យាល័យ',
                'description' => 'It is for primary and secondary schools',
                'description_kh' => 'សំរាប់បឋមសិក្សា​​ និង​ អនុវិទ្យាល័យ'
            ],
            [
                'name' => 'primary',
                'display_name' => 'Primary School',
                'display_name_kh' => 'បឋមសិក្សា​​',
                'description' => 'It is for primary schools',
                'description_kh' => 'សំរាប់បឋមសិក្សា​​'
            ],
            [
                'name' => 'secondary',
                'display_name' => 'Secondary School',
                'display_name_kh' => 'អនុវិទ្យាល័យ',
                'description' => 'It is for secondary schools',
                'description_kh' => 'សំរាប់អនុវិទ្យាល័យ'
            ]
        ]);
    }
}
