<?php

namespace App\Http\Controllers;

use App\AuthUser\Authentification;
use App\Commands\SaveUser;
use App\Queries\VerificationUser;
use ArtisanSdk\CQRS\Concerns\CQRS;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use CQRS;

    /**
     * Записывает данные пользователя в ДБ
     * при успешной записи возвращает модель данных пользователя
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->command(SaveUser::class)
            ->email($request->input('email'))
            ->name($request->input('username'))
            ->password($request->input('password'))
            ->run();
    }

    /**
     * Ищет пользователя по данным из ДБ
     * при успешной записи возвращает модель данных пользователя
     * в противном случае: false
     * @param Request $request
     * @return false
     */
    public function find(Request $request)
    {
        $data = $this->query(VerificationUser::class)
            ->email( $request->input('email') )
            ->password( $request->input('password') )
            ->run();
        return $data;
    }

    public function isAuth(Request $request)
    {
        $data = $this->find($request);
        Authentification::set_session($data);
        return $data->email == $request->input('email');
    }

    public function logout()
    {
        Authentification::end_session();
        return redirect()->route('login');
    }

}
