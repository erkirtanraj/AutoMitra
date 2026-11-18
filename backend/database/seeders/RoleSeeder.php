<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['name' => 'Customer', 'slug' => 'customer', 'description' => 'Standard marketplace customer'],
            ['name' => 'Seller', 'slug' => 'seller', 'description' => 'Individual vehicle seller'],
            ['name' => 'Dealer Admin', 'slug' => 'dealer_admin', 'description' => 'Dealer account administrator'],
            ['name' => 'Dealer Staff', 'slug' => 'dealer_staff', 'description' => 'Dealer team member'],
            ['name' => 'Support', 'slug' => 'support', 'description' => 'Customer support operator'],
            ['name' => 'Moderator', 'slug' => 'moderator', 'description' => 'Listing and content moderator'],
            ['name' => 'Admin', 'slug' => 'admin', 'description' => 'Platform administrator'],
        ] as $role) {
            Role::updateOrCreate(['slug' => $role['slug']], $role);
        }
    }
}
