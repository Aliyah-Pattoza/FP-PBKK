<!DOCTYPE html>
<html lang="en">
<head class="h-full bg-[#111A45]">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>About</title>
</head>
<body class="h-full bg-[#111A45] text-white">

<div class="min-h-full">
  <x-navbar></x-navbar>  
  <x-header>Kelompok 11</x-header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="py-24 sm:py-32">
            <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
              <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                <li>
                  <div class="flex items-center gap-x-6">
                    <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div>
                      <h3 class="text-base font-semibold leading-7 tracking-tight text-white">Leslie Alexander</h3>
                      <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                    </div>
                  </div>
                </li>
          
                <!-- More people... -->
              </ul>
            </div>
          </div>          
      </div>
    </main>
  </div>
  
</body>
</html>