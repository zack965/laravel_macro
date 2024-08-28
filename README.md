# Laravel Macros 

### Definition
These are like magical incantations that empower developers to add custom abilities to their code, without changing its main structure. In easy terms, a Laravel Macro is a technique that allows us to add new functionalities to Laravel’s internal components using custom code that is not originally part of the Laravel class.To achieve this, Laravel offers a PHP trait called Macroable.

### With which components of laravel we can use the macros ?
in any component (class) in laravel that have the Macroable trait .
for example : 
#### Facades
- Cache
- File
- Request
- Response
- Route
- URL
- STR

etc....

## Macros with strings
we can define macros in AppServiceProvider class on boot function like this : 
```php
Str::macro('toUpperCase', function ($part) {
    return strtoupper($part);
});
```
and you can use this macro wherever you want , in routes for example :
```php
Route::get('/', function () {
    //dd(Task::hasMacro('concatData'));

    $task = Task::find(2); // Assuming you have a Task instance

    return response()->json(["data" => Str::toUpperCase($task->title)]);
});
```
and the output will be like 
```json
{
    "data": "STRING"
}
```

## Macros with http client 
in AppServiceProvider class you can define a macro for HttpClient in boot method
```php
Http::macro('local', function () {
    return Http::baseUrl('https://xxxxxxx.com');
});
```
and you can use it like this : 
```php
Route::get("http_sender", function () {
    $response = Http::local()->post('/api/Login');
    //dd($response);

    return response()->json(["status" => $response]);
});

```
### Credit : 
[Unleashing the Magic of Laravel Macros](https://medium.com/simform-engineering/unleashing-the-magic-of-laravel-macros-c079ebee11cc)

