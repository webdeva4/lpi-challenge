<?php
use App\Visit;
use Illuminate\Database\Seeder;

class VisitDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('UsersTableSeeder');
        Visit::create([
                'user_id' => '1',
                'city_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '1',
                'city_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '1',
                'city_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '2',
                'city_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '2',
                'city_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '3',
                'city_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '3',
                'city_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '4',
                'city_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '4',
                'city_id' => '9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '4',
                'city_id' => '10',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '5',
                'city_id' => '11',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '5',
                'city_id' => '12',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '5',
                'city_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '6',
                'city_id' => '14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
            'user_id' => '6',
            'city_id' => '15',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')])
        ;
        Visit::create([
                'user_id' => '6',
                'city_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '7',
                'city_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '7',
                'city_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '7',
                'city_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
        Visit::create([
                'user_id' => '7',
                'city_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]
        );
    }
}
