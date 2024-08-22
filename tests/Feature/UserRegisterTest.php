<?php

namespace Tests\Feature;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    /**
     * User 
     */
    #[Test]
    public function user_can_register(): void
    {
        //$this->withoutExceptionHandling();//Ayuda a especificar el error

        $data = [
            'name'      => 'nametest',
            'email'     => 'nametest@gmail.com',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(200);
        $this->assertDatabaseHas('users',[
            'name'      => 'nametest',
            'email'     => 'nametest@gmail.com',
        ]);
    }

    /**
     * Email 
     */
    #[Test]
    public function email_must_be_required(): void
    {
        $data = [
            'name'      => 'nametest',
            'email'     => '',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['email']]);
        $response->assertJsonFragment(['errors' => ['email' =>['The email field is required.']]]);
    }

    #[Test]
    public function email_must_be_valid_email(): void
    {
        $data = [
            'name'      => 'nametest',
            'email'     => 'asdsadas',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['email']]);
        $response->assertJsonFragment(['errors' => ['email' => ['The email field must be valid address.']]]);  
    }

    #[Test]
    public function email_must_be_unique(): void
    {
        User::factory()->create(['email' => 'nametest@gmail.com']);

        $data = [
            'name'      => 'nametest',
            'email'     => 'nametest@gmail.com',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['email']]);
        $response->assertJsonFragment(['errors' => ['email' => ['The email must be unique.']]]);  
    }


     /**
     * Name 
     */
    #[Test]
    public function name_must_be_required(): void
    {
        $data = [
            'name'      => '',
            'email'     => 'nametest2@gmail.com',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['name']]);
        $response->assertJsonFragment(['errors' => ['name' =>['The name field is required.']]]);
    }

    #[Test]
    public function name_must_be_valid_name(): void
    {
        $data = [
            'name'      => 'asdasdds',
            'email'     => 'nametest2@gmail.com',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['name']]);
        $response->assertJsonFragment(['errors' => ['name' => ['The name field must be valid address.']]]);  
    }

    #[Test]
    public function name_must_be_unique(): void
    {
        User::factory()->create(['name' => 'nametest']);

        $data = [
            'name'      => 'nametest',
            'email'     => 'nametest2@gmail.com',
            'password'  => 'nametest',
            'password_confirmation' => 'nametest',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['name']]);
        $response->assertJsonFragment(['errors' => ['name' => ['The name must be unique.']]]);  
    }
}
