<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= [
            'PHP8',
            'HTML',
            'CSS3',
            'Python',
            'Laravel',
            'SASS',
            'ReactJS'
        ];

        foreach ($tags as $tag) {
            Tag::factory(1)->create([
                'tag_name'=>$tag
            ]);
        }
    }
}
