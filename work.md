# Tasks
- report fetch by date

# Algorithms
<!-- Adding permisions -->
```php
$permissions = ['browse', 'edit','export', 'add','delete']

$module_names = ['sales', 'zones', 'users', 'customers','shifts','handovers','gateways','receipts','vehicles','permissions']


$manager = [[1,1,1,1,0],[1,1,1,1,1],[1,1,1,1,1], [1,1,1,1,1],[1,0,1,1,0],[1,0,1,1,0],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,0,0,0,0]];
$partner = [[1,0,1,1,0],[1,1,1,1,1],[1,0,1,0,0], [1,1,1,1,1],[1,0,1,1,0],[1,0,1,1,0],[1,1,1,1,1],[1,0,1,1,0],[1,1,1,1,1],[0,0,0,0,0]];
$cashier = [[1,0,1,1,0],[0,0,0,0,0],[0,0,0,0,0], [1,1,1,1,0],[1,0,1,1,0],[1,0,1,0,0],[1,1,1,1,1],[0,0,0,0,0],[1,1,1,1,1],[0,0,0,0,0]];
$admin_permissions = [[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1],[1,1,1,1,1]];

//add for both API and web
for ($j=0; $j <= count($module_names)-1; $j++) { 
	for ($i=0; $i <= count($permissions)-1; $i++) { 
		// create permissions
		$name = $permissions[$i].' '.$module_names[$j];
		$permission = \Permission::create(['name' => $name,'guard_name' => 'api']);
		// assignroles "suppervissor"
		$role = \Role::find(3);
		$manager = \Role::find(2);
		$manager->givePermissionTo($permission);
		if ($supervisor_permissions[$j][$i]) {
			$role->givePermissionTo($permission);
		}
	}
}
```

##Hosting: 
- Clear cache
- Build assets
- Migrate DB with configurations
- Transfer normal Laravel folder structure [Please use in base dir, for subdir, change .htaccess appropriately]
- Edit inxed file pointers
- Check mix tags for assets
