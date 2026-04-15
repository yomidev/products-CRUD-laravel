<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login Prueba 2</title>
</head>
<body>
    
<form class="max-w-sm mx-auto" action="{{ route('iniciar_sesion') }}" method="POST">
    @csrf
    <div class="mb-5">
        <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
        <input 
            type="email" 
            id="email" 
            name="email"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" 
            placeholder="name@flowbite.com" 
        />
    </div>
    
    <div class="mb-5">
        <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
        <input 
            type="password" 
            id="password" 
            name="password"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" 
            placeholder="••••••••"
        />
    </div>
    
    <button type="submit" class="text-white bg-blue-800 box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
        Submit
    </button>
</form>
</body>
</html>