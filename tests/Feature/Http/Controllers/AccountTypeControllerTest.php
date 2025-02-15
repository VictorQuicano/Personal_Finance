<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AccountType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AccountTypeController
 */
final class AccountTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $accountTypes = AccountType::factory()->count(3)->create();

        $response = $this->get(route('account-types.index'));

        $response->assertOk();
        $response->assertViewIs('accountType.index');
        $response->assertViewHas('accountTypes');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('account-types.create'));

        $response->assertOk();
        $response->assertViewIs('accountType.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccountTypeController::class,
            'store',
            \App\Http\Requests\AccountTypeStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = fake()->name();
        $user = User::factory()->create();

        $response = $this->post(route('account-types.store'), [
            'name' => $name,
            'user_id' => $user->id,
        ]);

        $accountTypes = AccountType::query()
            ->where('name', $name)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $accountTypes);
        $accountType = $accountTypes->first();

        $response->assertRedirect(route('accountTypes.index'));
        $response->assertSessionHas('accountType.id', $accountType->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $accountType = AccountType::factory()->create();

        $response = $this->get(route('account-types.show', $accountType));

        $response->assertOk();
        $response->assertViewIs('accountType.show');
        $response->assertViewHas('accountType');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $accountType = AccountType::factory()->create();

        $response = $this->get(route('account-types.edit', $accountType));

        $response->assertOk();
        $response->assertViewIs('accountType.edit');
        $response->assertViewHas('accountType');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccountTypeController::class,
            'update',
            \App\Http\Requests\AccountTypeUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $accountType = AccountType::factory()->create();
        $name = fake()->name();
        $user = User::factory()->create();

        $response = $this->put(route('account-types.update', $accountType), [
            'name' => $name,
            'user_id' => $user->id,
        ]);

        $accountType->refresh();

        $response->assertRedirect(route('accountTypes.index'));
        $response->assertSessionHas('accountType.id', $accountType->id);

        $this->assertEquals($name, $accountType->name);
        $this->assertEquals($user->id, $accountType->user_id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $accountType = AccountType::factory()->create();

        $response = $this->delete(route('account-types.destroy', $accountType));

        $response->assertRedirect(route('accountTypes.index'));

        $this->assertModelMissing($accountType);
    }
}
