<?php
use App\City;
use Illuminate\Database\Seeder;

class CityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('UsersTableSeeder');

        City::create([
                'city' => 'Milwaukee',
                'state' =>'WI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'New Berlin',
                'state' =>'WI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Hartford',
                'state' =>'WI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Madison',
                'state' =>'WI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'San Diego',
                'state' =>'CA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'San Francisco',
                'state' =>'CA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Oakland',
                'state' =>'CA',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Portland',
                'state' =>'OR',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Eugene',
                'state' =>'OR',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Phoenix',
                'state' =>'AZ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Sedona',
                'state' =>'AZ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Tucsan',
                'state' =>'AZ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Arlington',
                'state' =>'IL',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Chicago',
                'state' =>'IL',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        City::create([
                'city' => 'Naperville',
                'state' =>'IL',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
    
    }
}
