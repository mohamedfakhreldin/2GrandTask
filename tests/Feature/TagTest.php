<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
      $response = $this->postJson('/api/tags',[ 'tag_name'=>'PHP']);

      $response->assertJson(['success'=>'You created the tag successfully']);
    }
    public function test_update()
    {
        $response = $this->putJson('api/tags/'.Tag::latest()->first()->id,['tag_name'=>'HTML5']);
         $response->assertJson(['success'=>'You updated the tag successfully']);
    }
    public function test_show()
    {

        $response = $this->getJson('api/tags/'.Tag::first()->id);

        $response->assertStatus(200);
    }

    public function test_index()
    {

        $response = $this->getJson('api/tags/');

        $response->assertStatus(200);
    }
    public function test_delete()
    {
        $response = $this->deleteJson('api/tags/'.Tag::latest()->first()->id);
         $response->assertJson(['success'=>'You deleted the tag successfully']);
    }

}
