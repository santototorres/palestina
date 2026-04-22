<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Enums\UserRole;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (UserRole::cases() as $role) {
            Role::firstOrCreate([
                'slug' => $role->value
            ], [
                'name' => ucwords(str_replace('_', ' ', $role->value)),
                'description' => 'System role: ' . $role->value
            ]);
        }
    }
}