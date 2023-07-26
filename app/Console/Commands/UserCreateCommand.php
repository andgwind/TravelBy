<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command to create a user with roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user['name'] = $this->ask('What is user name?');
        $user['email'] = $this->ask('What is user email?');
        $user['password'] = $this->secret('What is user password?');

        $validator = Validator::make($user, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());

            return;
        }

        $roles = Role::pluck('name')->toArray();
        $roleName = $this->choice('Role of the new user', $roles, 1);

        DB::transaction(function () use ($user, $roleName) {
            $newUser = User::create($user);
            $newUser->assignRole($roleName);
        });

        $this->info('User'.$user['email'].'created successfully');
    }
}
