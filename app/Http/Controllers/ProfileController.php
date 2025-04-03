<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * @class ProfileController
 * @description Controlador para la gestión del perfil de usuario
 */
class ProfileController extends Controller
{
    /**
     * @function edit
     * @description Muestra el formulario de edición del perfil del usuario
     * @param {Request} request - Objeto de solicitud HTTP
     * @returns {View} Vista con el formulario de edición del perfil
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * @function update
     * @description Actualiza la información del perfil del usuario
     * @param {ProfileUpdateRequest} request - Datos validados del perfil del usuario
     * @returns {RedirectResponse} Redirección a la página de edición del perfil con un mensaje de estado
     * @success {string} status - Mensaje de éxito: "profile-updated"
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * @function destroy
     * @description Elimina la cuenta del usuario autenticado
     * @param {Request} request - Objeto de solicitud HTTP con la contraseña del usuario
     * @returns {RedirectResponse} Redirección a la página de inicio después de eliminar la cuenta
     * @success {string} success - Mensaje de éxito: "Cuenta eliminada correctamente"
     * @error {string} error - Mensaje de error si la contraseña es incorrecta
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
