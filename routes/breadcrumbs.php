<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

/* ^^^ Users ^^^ */
Breadcrumbs::for('admins.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Admins', route('admins.index'));
});

Breadcrumbs::for('admins.edit', function ($trail, $admin) {
    $trail->parent('admins.index');
    $trail->push($admin->username, route('admins.edit', $admin->id));
});
/* ^^^^^^^^^^^^^^ */

/* ^^^ Categories ^^^ */
Breadcrumbs::for('categories.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Categories', route('categories.index'));
});

Breadcrumbs::for('categories.edit', function ($trail, $category) {
    $trail->parent('categories.index');
    $trail->push($category->name, route('categories.edit', $category->id));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('categories.index');
    $trail->push('New Category', route('categories.create'));
});
/* ^^^^^^^^^^^^^^^^^^ */

/* ^^^ Products ^^^ */
Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Products', route('products.index'));
});

Breadcrumbs::for('products.edit', function ($trail, $product) {
    $trail->parent('products.index');
    $trail->push($product->name, route('products.edit', $product->id));
});

Breadcrumbs::for('products.create', function ($trail) {
    $trail->parent('products.index');
    $trail->push('New Product', route('products.create'));
});
/* ^^^^^^^^^^^^^^^ */

/* ^^^ Attributes ^^^ */
Breadcrumbs::for('attributes.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Attributes', route('attributes.index'));
});

Breadcrumbs::for('attributes.edit', function ($trail, $attribute) {
    $trail->parent('attributes.index');
    $trail->push($attribute->name, route('attributes.edit', $attribute->id));
});

Breadcrumbs::for('attributes.create', function ($trail) {
    $trail->parent('attributes.index');
    $trail->push('New attribute', route('attributes.create'));
});
/* ^^^^^^^^^^^^^^^^^^^^^^^^ */

/* ^^^ Attribute Groups ^^^ */
Breadcrumbs::for('attribute-groups.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Attribute Groups', route('attribute-groups.index'));
});

Breadcrumbs::for('attribute-groups.edit', function ($trail, $attributeGroup) {
    $trail->parent('attribute-groups.index');
    $trail->push($attributeGroup->name, route('attribute-groups.edit', $attributeGroup->id));
});

Breadcrumbs::for('attribute-groups.create', function ($trail) {
    $trail->parent('attribute-groups.index');
    $trail->push('New Attribute Group', route('attribute-groups.create'));
});
/* ^^^^^^^^^^^^^^^^^^^^^^^^ */

/* ^^^ Options ^^^ */
Breadcrumbs::for('options.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Options', route('options.index'));
});

Breadcrumbs::for('options.edit', function ($trail, $option) {
    $trail->parent('options.index');
    $trail->push($option->name, route('options.edit', $option->id));
});

Breadcrumbs::for('options.create', function ($trail) {
    $trail->parent('options.index');
    $trail->push('New Option', route('options.create'));
});
/* ^^^^^^^^^^^^^^^ */

/* ^^^ Manufactures ^^^ */
Breadcrumbs::for('manufacturers.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Manufacturers', route('options.index'));
});

Breadcrumbs::for('manufacturers.create', function ($trail) {
    $trail->parent('manufacturers.index');
    $trail->push('New Manufacturer', route('manufacturers.create'));
});

Breadcrumbs::for('manufacturers.edit', function ($trail, $manufacturer) {
    $trail->parent('manufacturers.index');
    $trail->push($manufacturer->name, route('manufacturers.edit', $manufacturer->id));
});
/* ^^^^^^^^^^^^^^^ */

/* ^^^ Languages ^^^ */
Breadcrumbs::for('languages.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Languages', route('languages.index'));
});

Breadcrumbs::for('languages.create', function ($trail) {
    $trail->parent('languages.index');
    $trail->push('New Language', route('languages.create'));
});

Breadcrumbs::for('languages.edit', function ($trail, $language) {
    $trail->parent('languages.index');
    $trail->push($language->name, route('languages.edit', $language->code));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Information ^^^ */
Breadcrumbs::for('information.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Information', route('information.index'));
});

Breadcrumbs::for('information.create', function ($trail) {
    $trail->parent('information.index');
    $trail->push('New Information', route('information.create'));
});

Breadcrumbs::for('information.edit', function ($trail, $information) {
    $trail->parent('information.index');
    $trail->push($information->title, route('information.edit', $information->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Extensions ^^^ */
Breadcrumbs::for('extensions.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Extensions', route('extensions.index'));
});

Breadcrumbs::for('extensions.create', function ($trail) {
    $trail->parent('extensions.index');
    $trail->push('New extension', route('extensions.create'));
});

Breadcrumbs::for('extensions.edit', function ($trail, $extension) {
    $trail->parent('extensions.index');
    $trail->push($extension->name, route('extensions.edit', $extension->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Modules ^^^ */
Breadcrumbs::for('modules.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Modules', route('modules.index'));
});

Breadcrumbs::for('modules.create', function ($trail) {
    $trail->parent('modules.index');
    $trail->push('New module', route('modules.create'));
});

Breadcrumbs::for('modules.edit', function ($trail, $module) {
    $trail->parent('modules.index');
    $trail->push($module->name, route('modules.edit', $module->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Layouts ^^^ */
Breadcrumbs::for('layouts.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Layouts', route('modules.index'));
});

Breadcrumbs::for('layouts.create', function ($trail) {
    $trail->parent('layouts.index');
    $trail->push('New layout', route('layouts.create'));
});

Breadcrumbs::for('layouts.edit', function ($trail, $layout) {
    $trail->parent('layouts.index');
    $trail->push($layout->name, route('layouts.edit', $layout->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Customers ^^^ */
Breadcrumbs::for('customers.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Customers', route('customers.index'));
});

Breadcrumbs::for('customers.create', function ($trail) {
    $trail->parent('customers.index');
    $trail->push('New Customer', route('customers.create'));
});

Breadcrumbs::for('customers.edit', function ($trail, $customer) {
    $trail->parent('customers.index');
    $trail->push($customer->name, route('customers.edit', $customer->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Customer Groups ^^^ */
Breadcrumbs::for('customer-groups.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Customers', route('customer-groups.index'));
});

Breadcrumbs::for('customer-groups.create', function ($trail) {
    $trail->parent('customer-groups.index');
    $trail->push('New Customer', route('customer-groups.create'));
});

Breadcrumbs::for('customer-groups.edit', function ($trail, $group) {
    $trail->parent('customer-groups.index');
    $trail->push($group->name, route('customer-groups.edit', $group->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Blog Posts ^^^ */
Breadcrumbs::for('blog-posts.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog Posts', route('blog-posts.index'));
});

Breadcrumbs::for('blog-posts.create', function ($trail) {
    $trail->parent('blog-posts.index');
    $trail->push('New Blog Post', route('blog-posts.create'));
});

Breadcrumbs::for('blog-posts.edit', function ($trail, $post) {
    $trail->parent('blog-posts.index');
    $trail->push($post->title, route('blog-posts.edit', $post->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Blog Categories ^^^ */
Breadcrumbs::for('blog-categories.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog Categories', route('blog-categories.index'));
});

Breadcrumbs::for('blog-categories.create', function ($trail) {
    $trail->parent('blog-categories.index');
    $trail->push('New Blog Category', route('blog-categories.create'));
});

Breadcrumbs::for('blog-categories.edit', function ($trail, $category) {
    $trail->parent('blog-categories.index');
    $trail->push($category->title, route('blog-categories.edit', $category->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Currencies ^^^ */
Breadcrumbs::for('currencies.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Currencies', route('currencies.index'));
});

Breadcrumbs::for('currencies.create', function ($trail) {
    $trail->parent('currencies.index');
    $trail->push('New Currency', route('currencies.create'));
});

Breadcrumbs::for('currencies.edit', function ($trail, $currency) {
    $trail->parent('currencies.index');
    $trail->push($currency->name, route('currencies.edit', $currency->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Orders ^^^ */
Breadcrumbs::for('orders.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Orders', route('orders.index'));
});

Breadcrumbs::for('orders.create', function ($trail) {
    $trail->parent('orders.index');
    $trail->push('New Order', route('orders.create'));
});

Breadcrumbs::for('orders.show', function ($trail, $order) {
    $trail->parent('orders.index');
    $trail->push('Order #' . $order->id, route('orders.show', $order->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Order Statuses ^^^ */
Breadcrumbs::for('order-statuses.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Order Statuses', route('order-statuses.index'));
});

Breadcrumbs::for('order-statuses.create', function ($trail) {
    $trail->parent('order-statuses.index');
    $trail->push('New Order Status', route('order-statuses.create'));
});

Breadcrumbs::for('order-statuses.edit', function ($trail, $status) {
    $trail->parent('order-statuses.index');
    $trail->push($status->name, route('order-statuses.edit', $status->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Payments ^^^ */
Breadcrumbs::for('payments.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Payments', route('payments.index'));
});

Breadcrumbs::for('payments.create', function ($trail) {
    $trail->parent('payments.index');
    $trail->push('New Payment', route('payments.create'));
});

Breadcrumbs::for('payments.edit', function ($trail, $payment) {
    $trail->parent('payments.index');
    $trail->push($payment->name, route('payments.edit', $payment->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Shipments ^^^ */
Breadcrumbs::for('shipments.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Shipments', route('shipments.index'));
});

Breadcrumbs::for('shipments.create', function ($trail) {
    $trail->parent('shipments.index');
    $trail->push('New Shipment', route('payments.create'));
});

Breadcrumbs::for('shipments.edit', function ($trail, $shipment) {
    $trail->parent('shipments.index');
    $trail->push($shipment->name, route('shipments.edit', $shipment->id));
});
/* ^^^^^^^^^^^^^^^^^ */

/* ^^^ Pages ^^^ */
Breadcrumbs::for('pages.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Pages', route('pages.index'));
});

Breadcrumbs::for('pages.edit', function ($trail, $page) {
    $trail->parent('pages.index');
    $trail->push($page->name, route('pages.edit', $page->id));
});

Breadcrumbs::for('pages.create', function ($trail) {
    $trail->parent('pages.index');
    $trail->push('New Page', route('pages.create'));
});
/* ^^^^^^^^^^^^^^^ */

/* ^^^ Users ^^^ */
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.edit', function ($trail, $users) {
    $trail->parent('users.index');
    $trail->push($users->username, route('users.edit', $users->id));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('New User', route('users.create'));
});
/* ^^^^^^^^^^^^^^^ */

/* ^^^ User Groups ^^^ */
Breadcrumbs::for('user-groups.index', function ($trail) {
    $trail->parent('home');
    $trail->push('User Groups', route('user-groups.index'));
});

Breadcrumbs::for('user-groups.edit', function ($trail, $group) {
    $trail->parent('user-groups.index');
    $trail->push($group->name, route('user-groups.edit', $group->id));
});

Breadcrumbs::for('user-groups.create', function ($trail) {
    $trail->parent('user-groups.index');
    $trail->push('New User Group', route('user-groups.create'));
});
/* ^^^^^^^^^^^^^^^ */


