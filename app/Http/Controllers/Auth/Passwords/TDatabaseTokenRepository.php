<?php
namespace App\Http\Controllers\Auth\Passwords;

use Illuminate\Auth\Passwords\DatabaseTokenRepository;

class TDatabaseTokenRepository extends DatabaseTokenRepository
{

    /**
     * Build the record payload for the table.
     *
     * @param  string  $email
     * @param  string  $token
     * @return array
     */
    protected function getPayload($email, $token)
    {
        return ['email' => $email, 'token' => $this->hasher->make($token), 'created_at' => time()];
    }

    
}
