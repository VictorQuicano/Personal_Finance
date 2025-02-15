<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PlanController
 */
final class PlanControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $plans = Plan::factory()->count(3)->create();

        $response = $this->get(route('plans.index'));

        $response->assertOk();
        $response->assertViewIs('plan.index');
        $response->assertViewHas('plans');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('plans.create'));

        $response->assertOk();
        $response->assertViewIs('plan.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PlanController::class,
            'store',
            \App\Http\Requests\PlanStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = fake()->name();
        $price = fake()->numberBetween(-10000, 10000);
        $duration = fake()->numberBetween(-10000, 10000);
        $features = fake()->word();

        $response = $this->post(route('plans.store'), [
            'name' => $name,
            'price' => $price,
            'duration' => $duration,
            'features' => $features,
        ]);

        $plans = Plan::query()
            ->where('name', $name)
            ->where('price', $price)
            ->where('duration', $duration)
            ->where('features', $features)
            ->get();
        $this->assertCount(1, $plans);
        $plan = $plans->first();

        $response->assertRedirect(route('plans.index'));
        $response->assertSessionHas('plan.id', $plan->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->get(route('plans.show', $plan));

        $response->assertOk();
        $response->assertViewIs('plan.show');
        $response->assertViewHas('plan');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->get(route('plans.edit', $plan));

        $response->assertOk();
        $response->assertViewIs('plan.edit');
        $response->assertViewHas('plan');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PlanController::class,
            'update',
            \App\Http\Requests\PlanUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $plan = Plan::factory()->create();
        $name = fake()->name();
        $price = fake()->numberBetween(-10000, 10000);
        $duration = fake()->numberBetween(-10000, 10000);
        $features = fake()->word();

        $response = $this->put(route('plans.update', $plan), [
            'name' => $name,
            'price' => $price,
            'duration' => $duration,
            'features' => $features,
        ]);

        $plan->refresh();

        $response->assertRedirect(route('plans.index'));
        $response->assertSessionHas('plan.id', $plan->id);

        $this->assertEquals($name, $plan->name);
        $this->assertEquals($price, $plan->price);
        $this->assertEquals($duration, $plan->duration);
        $this->assertEquals($features, $plan->features);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $plan = Plan::factory()->create();

        $response = $this->delete(route('plans.destroy', $plan));

        $response->assertRedirect(route('plans.index'));

        $this->assertModelMissing($plan);
    }
}
