<?php

namespace App\Services;

use App\Contracts\Dao\AuthDaoInterface;
use App\Contracts\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUp;

class AuthService implements AuthServiceInterface
{
    /**
     * auth Dao
     */
    private $authDao;

    /**
     * Class Constructor
     * @param authDaoInterface
     * @return void
     */

    public function __construct(AuthDaointerface $authDao)
    {
        $this->authDao = $authDao;
    }

    /**
     * register User
     * @return object
     */

    public function register(array $data): object{
        Mail::to($data['email'])->send(new SignUp());
        
        return $this->authDao->register($data);
    }
}
