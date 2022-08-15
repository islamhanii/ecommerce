<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the project and create admin email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        $this->info('Database was created successfully.');

        $name = $this->enterData('name', 'required|string|min:3|max:255');

        $email = $this->enterData('email', 'required|email:filter|max:255');

        $phone = $this->enterData('phone', 'required|string|min:8|max:255');

        $password = $this->secret('Please enter your password');
        while(true) {
            $validator = Validator::make(['password' => $password], [
                'password' => 'required|min:8|max:32'
            ]);
            if(!$validator->fails()) break;

            $error = $validator->errors()->all()[0];
            $this->info($error);
            $password = $this->secret('Please enter a valid password');
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password)
        ]);

        Artisan::call('db:seed --class="RoleSeeder"');
        $role = Role::where('name', 'admin')->first();

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

        $this->info('User was created successfully. You can login your email from this page ' . route('loginPage'));
    }

    public function enterData($type, $validations) {
        $data = $this->ask("Please enter your $type");
        while(true) {
            $validator = Validator::make([$type => $data], [
                $type => $validations
            ]);
            if(!$validator->fails()) break;

            $error = $validator->errors()->all()[0];
            $this->info($error);
            $data = $this->ask("Please enter a valid $type");
        }

        return $data;
    }
}
