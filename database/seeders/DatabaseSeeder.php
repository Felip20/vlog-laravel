<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);
        $frontend=category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend=category::factory()->create(['name'=>'backend','slug'=>'backend']);

        
        Post::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
        Post::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$aungaung->id]);
    }
}
