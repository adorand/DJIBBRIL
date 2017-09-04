<?php

use Illuminate\Database\Seeder;
use App\Surface;
use App\Authority\Role;

class SurfaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // !!! All existing users are deleted !!!
        DB::table('surfaces')->truncate();

        $code = '';
        do {
            $code = substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
            $surface = Surface::where('code', $code)->first();
        } while($surface != null);

        $surface=new Surface();
        $surface->code=$code;
        $surface->name='admin';
        $surface->email='admin-kdi@gmail.com';
        $surface->password = bcrypt('passer');

        $surface->save();

        $surface->roles()->attach(Role::where('name', 'admin'));
    }
}
