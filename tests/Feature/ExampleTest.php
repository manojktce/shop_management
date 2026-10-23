<?php

test('root redirects to the admin path', function () {
    $adminPath = env('ADMIN_PATH', 'webadmin');

    $this->get('/')
        ->assertRedirect($adminPath);
});

test('admin login page is reachable', function () {
    $adminPath = trim(env('ADMIN_PATH', 'webadmin'), '/');

    $this->get('/'.$adminPath)
        ->assertOk();
});
