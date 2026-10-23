<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('admin can open the dashboard', function () {
    $adminPath = trim(env('ADMIN_PATH', 'webadmin'), '/');
    $admin = User::where('email', 'admin@example.com')->firstOrFail();

    $this->actingAs($admin)
        ->get('/'.$adminPath.'/dashboard')
        ->assertOk();
});

test('guest is redirected away from the dashboard', function () {
    $adminPath = trim(env('ADMIN_PATH', 'webadmin'), '/');

    $this->get('/'.$adminPath.'/dashboard')
        ->assertRedirect();
});
