<?php

namespace Tests\Feature;

use App\Member;
use App\Http\Resources\MemberResource;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function it_gets_all_members(){
        $members = factory(Member::class,2)->create();

        $response = $this->get(route('members.index'));

        $json = $response->json();

        $resource = MemberResource::collection(Member::with('government')->get());

        $resourceResponse = $resource->response();

    }
}
