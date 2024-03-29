<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Command 

- php artisan serve (run port = 8000)

- php artisan serve --port = 3000

- php artisan make:controller PostController

- php artisan make:migartion create_posts_table

- php artisan migrate

- php artisan migrate:rollback

- php artisan migrate:refresh

- php artisan migrate:fresh

- php artisan migrate:reset

- php artisan make:model Post

- php artisan make:request PostRequest

- php artisan make:model Post --migration (same)

- php artisan make:model Post -m (same)

- php artisan route:list

- php artisan make:seeder PostSeeder

- php artisan db:seed --class=PostSeeder

- php artisan migrate:fresh --seed;
 

## Auth

- Auth::attempt(check email && password)

- Auth::check(login true or false)

- Auth::user(user information)

- Auth::logout

- Auth::loginUsingId

## Tinker

- php artisan tinker

- Post::all()

- Post::Where('id','22')->first()

- Post::find(22)

- Post::Where('title','like','%php%')->get()

- Post::Where('title' ,'my title')->update(['tilte' => 'title'])

- Post::Where('id',22)->delete()

- Post::query()->delete() = all Post

- Post::turncate() -> id start No 1

## Learning

- Route

- Balde

- View 

- Blade (Escape html)

- Controller

- Tinker

- Factory

- Seeder

- Migration

- Relation Route , Controller , View

- CRUD

- Method(POST,GET)

- One To Many (relation)

- Foregin key (cascade)

- Paginate 

- Middleware

- Auth

- One to One || One to Many

- Search items

- Deisgn

- inrandomorder is not working this project(try again)


get => get data

post => insert  * for security (@csrf)
put =>   update data *
patch => update data *
delete => delete data *  => POST

    <input type="hidden" name="_method" value="DELETE"> (method change delete)
    <input type="hidden" name="_token" value="{{ csrf_token() }}">(@csrf) 



   ** Dry Principle(Coding Rule) **