<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Advertisement;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilterAdvertisementsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_filter()
    {

        $response = $this->getJson('/api/advertiser/1',['tags'=>'CSS3']);
        $response->assertStatus(200);
    }
}
