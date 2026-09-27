<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\ServingSize;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRoutesTest extends TestCase
{
    use RefreshDatabase;

    private Group $group;
    private ServingSize $servingSize;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        $this->group = $this->makeGroup();
        $this->servingSize = $this->group->servingSizes()->create(['size_metric' => '130 g', 'size_imperial' => '½ cup']);
        $this->group->detailTypes()->create(['name' => 'Why', 'video' => 'https://www.youtube.com/embed/abc', 'info' => 'Info']);
    }

    private function makeAdmin(): User
    {
        $admin = $this->makeUser('admin@example.com');
        $admin->forceFill(['is_admin' => true])->save();

        return $admin;
    }

    private function groupFields(array $overrides = []): array
    {
        return [
            'name' => 'Beans',
            'icon_location' => 'icon.png',
            'banner_location' => 'banner.png',
            'per_day' => 3,
            ...$overrides,
        ];
    }

    public function test_admin_pages_are_hidden_from_everyone_else(): void
    {
        $this->actingAs($this->makeUser());
        $group = $this->group->id;
        $size = $this->servingSize->id;
        $sizeFields = ['size_metric' => '1 g', 'size_imperial' => '1 oz'];

        $this->get("/groups/$group/edit")->assertNotFound();
        $this->put("/groups/$group", $this->groupFields(['name' => 'Changed']))->assertNotFound();
        $this->get("/groups/$group/serving-sizes/create")->assertNotFound();
        $this->post("/groups/$group/serving-sizes", $sizeFields)->assertNotFound();
        $this->get("/groups/$group/serving-sizes/$size/edit")->assertNotFound();
        $this->put("/groups/$group/serving-sizes/$size", $sizeFields)->assertNotFound();
        $this->delete("/groups/$group/serving-sizes/$size")->assertNotFound();

        $this->assertSame('Beans', $this->group->fresh()->name);
        $this->assertDatabaseCount('serving_sizes', 1);
        $this->assertSame('130 g', $this->servingSize->fresh()->size_metric);
    }

    public function test_the_admin_can_edit_a_group(): void
    {
        $this->actingAs($this->makeAdmin());

        $this->get("/groups/{$this->group->id}/edit")->assertOk();
        $this->put("/groups/{$this->group->id}", $this->groupFields(['name' => 'Beans and lentils']))->assertRedirect();

        $this->assertSame('Beans and lentils', $this->group->fresh()->name);
    }

    public function test_a_serving_size_is_only_reachable_through_its_own_group(): void
    {
        $this->actingAs($this->makeAdmin());
        $other = $this->makeGroup();

        $this->delete("/groups/{$other->id}/serving-sizes/{$this->servingSize->id}")->assertNotFound();

        $this->assertModelExists($this->servingSize);
    }

    public function test_a_groups_last_detail_type_is_kept(): void
    {
        $this->actingAs($this->makeAdmin());
        $this->makeGroup()->detailTypes()->create(['name' => 'Why', 'video' => 'https://www.youtube.com/embed/def', 'info' => 'Info']);
        $only = $this->group->detailTypes()->first();

        $this->delete("/details/{$only->id}", ['groupId' => $this->group->id]);

        $this->assertModelExists($only);
    }

    public function test_a_detail_video_has_to_be_an_https_link(): void
    {
        $this->actingAs($this->makeAdmin());

        $this->post('/details', [
            'groupId' => $this->group->id,
            'name' => 'Why',
            'video' => 'javascript:alert(1)',
            'info' => 'Info',
        ])->assertSessionHasErrors('video');

        $this->assertDatabaseCount('detail_types', 1);
    }

    public function test_a_detail_video_has_to_be_a_youtube_embed(): void
    {
        $this->actingAs($this->makeAdmin());
        $detail = $this->group->detailTypes()->first();

        $this->put("/details/{$detail->id}", ['name' => 'Why', 'video' => 'https://attacker.example/embed/abcdefghijk', 'info' => 'Info'])
            ->assertSessionHasErrors('video');
        $this->put("/details/{$detail->id}", ['name' => 'Why', 'video' => 'https://www.youtube.com/embed/-mOYGq24xQc', 'info' => 'Info'])
            ->assertSessionHasNoErrors();

        $this->assertSame('https://www.youtube.com/embed/-mOYGq24xQc', $detail->fresh()->video);
    }

    public function test_taking_the_admin_email_does_not_make_you_admin(): void
    {
        config(['app.admin_email' => 'admin@example.com']);
        $user = $this->makeUser('someone@example.com');
        $user->forceFill(['email' => 'admin@example.com'])->save();

        $this->actingAs($user)->get("/groups/{$this->group->id}/edit")->assertNotFound();
    }

    public function test_the_admin_email_is_carried_over_once(): void
    {
        $admin = $this->makeUser('Admin@Example.com');
        $other = $this->makeUser('other@example.com');
        config(['app.admin_email' => 'admin@example.com']);
        $migration = require database_path('migrations/2026_09_27_000000_add_is_admin_to_users_table.php');

        $migration->down();
        $migration->up();

        $this->assertTrue($admin->fresh()->isAdmin());
        $this->assertFalse($other->fresh()->isAdmin());
    }

    public function test_an_admin_can_be_granted_and_revoked(): void
    {
        $user = $this->makeUser('ada@example.com');

        $this->artisan('user:admin', ['email' => 'ADA@example.com'])->assertSuccessful();
        $this->assertTrue($user->fresh()->isAdmin());

        $this->artisan('user:admin', ['email' => 'ada@example.com', '--revoke' => true])->assertSuccessful();
        $this->assertFalse($user->fresh()->isAdmin());

        $this->artisan('user:admin', ['email' => 'nobody@example.com'])->assertFailed();
    }

    public function test_servings_a_day_has_to_be_a_small_whole_number(): void
    {
        $this->actingAs($this->makeAdmin());

        foreach ([-1, 0, 1.5, 13, 'three'] as $perDay) {
            $this->put("/groups/{$this->group->id}", $this->groupFields(['per_day' => $perDay]))->assertSessionHasErrors('per_day');
        }

        $this->assertSame(3, (int) $this->group->fresh()->per_day);
    }
}
