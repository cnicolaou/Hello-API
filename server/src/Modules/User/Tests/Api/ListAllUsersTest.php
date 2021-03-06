<?php

namespace Mega\Modules\User\Tests\Api;

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mega\Services\Core\Test\Abstracts\TestCase;
use Mega\Modules\User\Models\User;

/**
 * Class ListAllUsersTest
 *
 * @type
 * @package Mega\Modules\User\Tests\Api
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class ListAllUsersTest extends TestCase
{
    use DatabaseMigrations;

    private $endpoint = '/users';

    public function testListAllUsers_()
    {
        // create some fake users
        $users = factory(User::class, 4)->create();

        // send the HTTP request
        $response = $this->apiCall($this->endpoint, 'get');

        // assert response status is correct
        $this->assertEquals($response->getStatusCode(), '200');

        // convert JSON response string to Array
        $responseArray = json_decode($response->getContent());

        // assert the returned data size is correct
        $this->assertEquals(count($responseArray->data), 5); // 5 = 4 (fake in this test) + 1 (that is logged in)
    }



    public function testListAllUsersOnlyForAdmin_()
    {

        $listUsersPermission = Permission::create([
            'name' => 'List users',
            'slug' => 'list.users',
            'description' => 'List all registered Users',
        ]);

        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin access',
            'level' => 1,
        ]);

        $adminRole->attachPermission($listUsersPermission);

        $user = $this->getLoggedInTestingUser();

        $user->attachRole($adminRole);

//dd($user->hasRole('admin'));

        // create some fake users
        $users = factory(User::class, 4)->create();

        $endpoint = $this->endpoint;

        // send the HTTP request
        $response = $this->apiCall($endpoint, 'get');

        // assert response status is correct
        $this->assertEquals($response->getStatusCode(), '200');

        // convert JSON response string to Array
        $responseArray = json_decode($response->getContent());

        // assert the returned data size is correct
        $this->assertEquals(count($responseArray->data), 5); // 5 = 4 (fake in this test) + 1 (that is logged in)
    }
}


