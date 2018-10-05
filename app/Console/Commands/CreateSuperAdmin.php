<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-admin {email} {name=admin} {password=vickis666}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成超级管理员';

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
     * @return mixed
     */
    public function handle()
    {
        try {
            User::create([
                'name' => $this->argument('name'),
                'nickname' => $this->argument('name'),
                'email' => $this->argument('email'),
                'password' => Hash::make($this->argument('password')),
                'is_admin' => 1,
            ]);
            $this->info('创建成功✨');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
