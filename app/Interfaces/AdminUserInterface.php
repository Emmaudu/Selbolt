<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface AdminUserInterface{

    /**
     * @return mentors that belongs to a users
     * 
     * 
     */
    public function mentors();

    /**
     * @return transactions that belongs to a users
     * 
     * 
     */
    public function pendingTransactions();

    /**
     * @return transactions that belongs to a users
     * 
     * 
     */
    public function transactions();



}