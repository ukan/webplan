<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();

        foreach ($this->getMenus() as $menu) {
            if ($menu['is_parent']) {
                $m = array_except($menu, 'child');

                $m = Menu::create($m);

                foreach ($menu['child'] as $child) {
                    $child = array_add($child, 'parent', $m->id);

                    Menu::create($child);
                }
            } else {
                Menu::create($menu);
            }
        }
    }

    private function getMenus()
    {
        return [
            ['is_parent' => false, 'name' => str_slug('Dashboard'), 'display_name' => 'Dashboard', 'icon' => 'tachometer', 'href' => 'admin/dashboard', 'pattern' => 'dashboard'],
        /* Super Admin */
            ['is_parent' => true, 'name' => str_slug('Super Admin Account Management'), 'display_name' => 'Account Management', 'icon' => 'users', 'href' => '#', 'pattern' => 'user-trustees', 'child' => [
                ['name' => str_slug('Super Admin Menu Management'), 'display_name' => 'Menu Management', 'icon' => 'bars', 'href' => 'admin/user-trustees/menus', 'pattern' => 'user-trustees'],
                ['name' => str_slug('Super Admin Role Management'), 'display_name' => 'Role Management', 'icon' => 'user-secret', 'href' => 'admin/user-trustees/roles', 'pattern' => 'user-trustees'],
                ['name' => str_slug('Super Admin User Management'), 'display_name' => 'User Management', 'icon' => 'users', 'href' => 'admin/user-trustees/users', 'pattern' => 'user-trustees'],
            ]],
        /* Member */
            ['is_parent' => false, 'name' => str_slug('Member Area My Profile'), 'display_name' => 'My Profile', 'icon' => 'user', 'href' => 'my-profile', 'pattern' => 'my_profile'],
        /* HQ Admin */
            ['is_parent' => false, 'name' => str_slug('HQ Admin Manage LCW'), 'display_name' => 'Manage LCW', 'icon' => 'desktop', 'href' => 'admin/lcw-page/manage-lcw', 'pattern' => 'manage-lcw'],
            ['is_parent' => false, 'name' => str_slug('HQ Admin History'), 'display_name' => 'History', 'icon' => 'history', 'href' => 'admin/log-history-page/log-history', 'pattern' => 'history'],      
        ];
    }
}
