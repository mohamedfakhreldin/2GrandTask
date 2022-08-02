<?php

namespace Tests\Feature;

use App\Models\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store()
    {
      $response = $this->postJson('/api/categories',[ 'category_name'=>'Fashion']);

      $response->assertJson(['success'=>'You created the category successfully']);
    }
    public function test_update()
    {
        $response = $this->putJson('api/categories/'.Category::latest()->first()->id,['category_name'=>'Heath']);
         $response->assertJson(['success'=>'You updated the category successfully']);
    }
    public function test_show()
    {

        $response = $this->getJson('api/categories/'.Category::first()->id);

        $response->assertStatus(200);
    }

    public function test_index()
    {

        $response = $this->getJson('api/categories/');

        $response->assertStatus(200);
    }
     public function test_delete()
     {
         $response = $this->deleteJson('api/categories/'.Category::latest()->first()->id);
          $response->assertJson(['success'=>'You deleted the category successfully']);
    }

}
