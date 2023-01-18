# I Kost

I Kost is a wabsite that requested by client that who wants to manage his property bussiness using a web, his customers can pay their bills using a web and the host can automaticly review their payments and change the payment status to success or fail
## Installation

If you want to try the web apps just follow this step

First you must import the `pengolahan_kos.sql` to MySQL database server

Next you change the `.env` file type by searching for this code
```bash
DB_DATABASE= {your database name}
DB_USERNAME={your database username}
DB_PASSWORD={your database password}
```
Next you can open the main folder using terminal or laragon cmd and type
```bash
php artisan serve
```

## End Point

#### Admin Login

```http
/admin
```
using the credential bellow to login 
| Email | Password  | 
| :-------- | :------- |
| `admin@gmail.com` | `12345` |

#### User Login

| Email | Password     |
| :-------- | :------- | 
| `raihan@gmail.com`      | `12345` | 
| `alfian@gmail.com`      | `12345` | 

Different account will have different bill and payments