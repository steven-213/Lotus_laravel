<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
  'name' => 'Admin',
  'email' => 'admin@lotus.com',
  'password' => Hash::make('st123123'),
  'role' => User::ROLE_ADMIN
]);
