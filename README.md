# MelopanTestTask
1-1 Build simple sign up and signin page

1-2 Build empty dashboard

1-3 Build an item CRUD

1-4 Build an item read only page for merchant

1-5 An ACL (access control) feature for admin user

# Things to be noted
- Never expose mysql auto incremented id publicly via URL when accessing an item
- Make sure data validation works properly and returning a proper error message
- Design the table structure as best as you could think of
# User List
- SuperAdmin Account
mail:superadmin@example.com
pass:superadmin

- Admin Account
mail:admin@example.com
pass:admin

- Merchant Account
mail:merchant@example.com
pass:merchant
# procedure
Use it on a PC with docker installed.
After cloning, execute the following commands for the app container
```
make -i install
```

