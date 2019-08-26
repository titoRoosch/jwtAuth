<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $faker = Faker\Factory::create();

        for($i = 0; $i<100; $i++){
            App\Clientes::create([
                'nome' => $faker->name,
                'cnpj' => $faker->numberBetween('00000000001', '9999999999')
            ]);

            echo "Registro (".$i.") Cadastrado"."\n";
        }*/

        Model::unguard();
        $this->call(UserTableSeeder::class);
        Model::reguard();

    }
}
