<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Advertisement;


class FilterAdvertisementsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_filter()
    {

        $ads = Advertisement::with(['advertiser','category'])
        ->where('advertiser', 1)
        ->where('category', 6)
       ->whereJsonContains("tags",['CSS3'])
       ->get();

        $this->assertCount(1,$ads);
    }
}
