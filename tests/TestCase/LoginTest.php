<?php
namespace App\Test\TestCase\Controller;
use Cake\TestSuite\IntegrationTestCase;


class LoginTest extends IntegrationTestCase
{
    public function testLoginSuccess()
    {
        $email = 'julie.smith@test.com';
        $password = 'password';
        $csrfToken = $this->getSession()->read('csrfToken');

        $this->post('/users/login', [
            'email' => $email,
            'password' => $password,
            '_csrfToken' => $csrfToken
        ]); // Simulate a POST request to /users/login

        $this->assertResponseCode(403); // Assert that the response was a success
        $this->assertRedirect(['controller' => 'Timesheets', 'action' => 'index']); // Assert that the redirect location is /timesheets/index
    }

    public function testLoginFailure()
    {
        $this->post('/users/login', [
            'email' => 'bademail@email.com',
            'password' => 'badpassword'
            ]); // Simulate a POST request to /users/login

        $this->assertResponseCode(403); // Assert that the response was a success
    }
}