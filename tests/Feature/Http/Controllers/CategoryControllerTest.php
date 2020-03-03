<?php

namespace Tests\Feature\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function userCanCreateCategory()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $category = factory(Category::class)->make();

        $response = $this->actingAs($user)->post('/categories', $category->toArray());

        $this->assertDatabaseHas('categories', $category->toArray());

        $response->assertStatus(200);
    }
}
