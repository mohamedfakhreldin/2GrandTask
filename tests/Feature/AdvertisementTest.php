<?php

namespace Tests\Feature;

use App\Models\Advertisement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdvertisementTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * test_store
     ** test create advertisement
     * @return void
     */
    public function test_store()
    {
      $response = $this->postJson('/api/advertisements',[
           'type'=>'paid',
           'title'=>'Ipad for sale',
           'description'=>'Ipad 32 gb ram 64 gb storage white 32 mp camera 8.0 inch Full HD Display',
           'advertiser'=>1,
           'category'=>1,
           'tags'=>['SASS','PHP8'],
           'start_date'=>now()->tomorrow()->toDateString()
    ]);

    $response->assertJson(['success'=>'You added the advertisement successfully']);
    }
    /**
     * test_update
     * test update advertisement
     * @return void
     */
    public function test_update()
    {
        $response = $this->putJson('api/advertisements/'.Advertisement::latest()->first()->id,[
            'type'=>'free',
            'title'=>'Ipad for sale',
            'description'=>'Ipad 32 gb ram 64 gb storage white 32 mp camera 8.0 inch Full HD Display',
            'advertiser'=>1,
            'category'=>1,
            'tags'=>['CSS3','SASS'],
            'start_date'=>now()->tomorrow()->toDateString()
     ]);
         $response->assertJson(['success'=>'You updated the advertisement successfully']);
    }
    /**
     * test_show
     * test show a advertisement
     * @return void
     */
    public function test_show()
    {

        $response = $this->getJson('/api/advertisements/'.Advertisement::first()->id);

        $response->assertStatus(200);
    }

    /**
     * test_index
     * test show all advertisements
     * @return void
     */
    public function test_index()
    {

        $response = $this->getJson('/api/advertisements/');

        $response->assertStatus(200);
    }
    /**
     * test_delete
     * test delete a advertisement
     * @return void
     */
    public function test_delete()
    {
        $response = $this->deleteJson('api/advertisements/'.Advertisement::latest()->first()->id);
         $response->assertJson(['success'=>'You deleted the advertisement successfully']);
    }
}
