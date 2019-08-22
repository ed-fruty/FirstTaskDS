<?php

namespace Tests\Unit;

use App\Member;
use App\Government;

use App\Http\Resources\MemberResource;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function it_gets_all_members(){
    
        $members = factory(Member::class,2)->create();

        $response = $this->get(route('members.index'));

        $json = $response->json();

        $resource = MemberResource::collection(Member::with('government')->get());

        $resourceResponse = $resource->response()->getData(True);

        $this->assertEquals($json,$resourceResponse);
    }

    public function test_show_method_returns_a_particular_member()
    {
        $government = factory(Government::class)->create();

        $member = factory(Member::class)->create(['government_id'=>$government->ID]);

        $response = $this->get(route('members.show',[$member->id]));

        $json = $response->json();

        $resource = MemberResource::collection(Member::with('government')->where('id',$member->id)->get());

        $resourceResponse = $resource->response()->getData(True);
        
        $this->assertEquals($json,$resourceResponse);

    }
}
