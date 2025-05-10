<?php

namespace Tests\Unit;

use App\Http\Middleware\CheckAdmin;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Closure;

class CheckAdminTest extends TestCase
{
 public function test_admin_can_pass_through_middleware()
    {
        // Crear un usuario administrador
        $admin = User::factory()->create(['role' => 'admin']);

        // Simula que el usuario admin está autenticado
        $this->actingAs($admin);

        // Crea la solicitud
        $request = Request::create('/admin', 'GET');

        // Crea el middleware
        $middleware = new CheckAdmin();

        // Pasa la solicitud por el middleware
        $response = $middleware->handle($request, fn ($req) => response('OK'));

        // Verifica que la respuesta sea 'OK', lo que indica que el middleware permitió el acceso
        $this->assertEquals('OK', $response->getContent());
    }

    public function test_non_admin_is_redirected()
    {
        $user = User::factory()->make(['role' => 'user']);

        $request = Request::create('/admin', 'GET');
        $request->setUserResolver(fn () => $user);

        $middleware = new CheckAdmin();

        $response = $middleware->handle($request, fn ($req) => response('OK'));

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('http://proyecto-prueba.test/dashboard', $response->headers->get('Location'));
    }
}
