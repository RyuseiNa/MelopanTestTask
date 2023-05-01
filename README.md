# MelopanTestTask
1-1 Build simple sign up and signin page

1-2 Build empty dashboard

1-3 Build an item CRUD

1-4 Build an item read only page for merchant

1-5 An ACL (access control) feature for admin user

Things to be noted
- Never expose mysql auto incremented id publicly via URL when accessing an item
- Make sure data validation works properly and returning a proper error message
- Design the table structure as best as you could think of

SuperAdmin Account
mail:superadmin@example.com
pass:superadmin

Admin Account
mail:admin@example.com
pass:admin

Merchant Account
mail:merchant@example.com
pass:merchant

URL LIST  
home  
http://localhost  
super admin signin  
http://localhost/superadmin/signin  
admin signup  
http://localhost/admin/signup  
admin signin  
http://localhost/admin/signin  
merchant signup  
http://localhost/admin/signup  
merchant signin  
http://localhost/admin/signin  
dashboard  
http://localhost/dashboard  
item list  
http://localhost/items  
access item  
http://localhost/items/(UUID)  
create item  
http://localhost/items/register
update item  
http://localhost/items/(UUID)/update  
delete item  
http://localhost/items/(UUID)/delete  
admin list  
http://localhost/admins  
access admin  
http://localhost/admins/(UUID)  
update admin  
http://localhost/admins/(UUID)/update  
delete admin  
http://localhost/admins/(UUID)/delete  



