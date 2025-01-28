<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            // Category
            ['access' => 'إضافة قسم'],
            ['access' => 'تعديل قسم'],
            ['access' => 'عرض قسم'],
            ['access' => 'حذف قسم'],

            // Season
            ['access' => 'إضافة موسم'],
            ['access' => 'تعديل موسم'],
            ['access' => 'عرض موسم'],
            ['access' => 'حذف موسم'],

            // Factory
            ['access' => 'إضافة مصنع'],
            ['access' => 'تعديل مصنع'],
            ['access' => 'عرض مصنع'],
            ['access' => 'حذف مصنع'],

            // Material
            ['access' => 'إضافة خامة'],
            ['access' => 'تعديل خامة'],
            ['access' => 'عرض خامة'],
            ['access' => 'حذف خامة'],

            // Colors
            ['access' => 'إضافة لون'],
            ['access' => 'تعديل لون'],
            ['access' => 'عرض لون'],
            ['access' => 'حذف لون'],

            // Product
            ['access' => 'إضافة منتج'],
            ['access' => 'تعديل منتج'],
            ['access' => 'حذف منتج'],
            ['access' => 'عرض منتج'],
            ['access' => 'إلغاء منتج'],
            ['access' => 'تفعيل منتج'],
            ['access' => 'استلام منتج'],
            ['access' => 'إكمال بيانات المنتج'],

            // Reports
            ['access' => 'عرض التقارير'],

            // Users
            ['access' => 'إضافة مستخدم'],
            ['access' => 'تعديل مستخدم'],
            ['access' => 'حذف مستخدم'],

            // Roles
            ['access' => 'إضافة دور'],
            ['access' => 'تعديل دور'],
            ['access' => 'عرض دور'],
            ['access' => 'حذف دور'],
            ['access' => 'تعديل صلاحيات مستخدم'],

        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
