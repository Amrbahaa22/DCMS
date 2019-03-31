<?php echo '<?php' ?>

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        $this->truncateLaratrustTables();

        $config = config('laratrust_seeder.role_structure');
        $userPermission = config('laratrust_seeder.permission_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = \<?php echo e($role); ?>::create([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \<?php echo e($permission); ?>::firstOrCreate([
                        'name' => $permissionValue . '-' . $module,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            $this->command->info("Creating '{$key}' user");

            // Create default user for each role
            $user = \<?php echo e($user); ?>::create([
                'name' => ucwords(str_replace('_', ' ', $key)),
                'email' => $key.'@app.com',
                'password' => bcrypt('password')
            ]);

            $user->attachRole($role);
        }

        // Creating user with permissions
        if (!empty($userPermission)) {

            foreach ($userPermission as $key => $modules) {

                foreach ($modules as $module => $value) {

                    // Create default user for each permission set
                    $user = \<?php echo e($user); ?>::create([
                        'name' => ucwords(str_replace('_', ' ', $key)),
                        'email' => $key.'@app.com',
                        'password' => bcrypt('password'),
                        'remember_token' => str_random(10),
                    ]);
                    $permissions = [];

                    foreach (explode(',', $value) as $p => $perm) {

                        $permissionValue = $mapPermission->get($perm);

                        $permissions[] = \<?php echo e($permission); ?>::firstOrCreate([
                            'name' => $permissionValue . '-' . $module,
                            'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                            'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        ])->id;

                        $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                    }
                }

                // Attach all permissions to the user
                $user->permissions()->sync($permissions);
            }
        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
<?php if(Config::get('database.default') == 'pgsql'): ?>
        DB::table('<?php echo e(config('laratrust.tables.permission_role')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.permission_user')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.role_user')); ?>')->truncate();
        $usersTable = (new \<?php echo e($user); ?>)->getTable();
        $rolesTable = (new \<?php echo e($role); ?>)->getTable();
        $permissionsTable = (new \<?php echo e($permission); ?>)->getTable();
        DB::statement("TRUNCATE TABLE {$usersTable} CASCADE");
        DB::statement("TRUNCATE TABLE {$rolesTable} CASCADE");
        DB::statement("TRUNCATE TABLE {$permissionsTable} CASCADE");
<?php else: ?>
        DB::table('<?php echo e(config('laratrust.tables.permission_role')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.permission_user')); ?>')->truncate();
        DB::table('<?php echo e(config('laratrust.tables.role_user')); ?>')->truncate();
        \<?php echo e($user); ?>::truncate();
        \<?php echo e($role); ?>::truncate();
        \<?php echo e($permission); ?>::truncate();
<?php endif; ?>
        Schema::enableForeignKeyConstraints();
    }
}

<?php /* C:\xamp\htdocs\Laravel\newproj\vendor\santigarcor\laratrust\src\views/seeder.blade.php */ ?>