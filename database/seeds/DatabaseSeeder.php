<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * NB! Caused by hardcoded FKs, you should to seed only clear database instances
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserGroupTableSeeder::class);
        $this->call(UserGroupPermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);

        $this->call(CustomerGroupTableSeeder::class);
        $this->call(CustomerTableSeeder::class);

        $this->call(CategoryTableSeeder::class);
        $this->call(CategoryLocaleSeeder::class);

        $this->call(ManufacturerTableSeeder::class);

        $this->call(ExtensionTableSeeder::class);
        $this->call(ModuleTableSeeder::class);

        $this->call(CurrencyTableSeeder::class);

        $this->call(ProductTableSeeder::class);
        $this->call(ProductLocaleTableSeeder::class);

        $this->call(AttributeGroupTableSeeder::class);

        $this->call(AttributeTableSeeder::class);

        $this->call(OptionTableSeeder::class);
        $this->call(OptionValuesTableSeeder::class);

        $this->call(BlogCategoryTableSeeder::class);

        $this->call(PaymentTableSeeder::class);
        $this->call(ShipmentTableSeeder::class);

        $this->call(OrderStatusTableSeeder::class);
    }
}
