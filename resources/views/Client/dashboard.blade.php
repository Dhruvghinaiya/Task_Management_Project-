<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @Vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="h-full">
   
<div class="min-h-full">
    <x-client-header/>
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="mb-4">

          @if (session('success'))
          <x-AlertSuccess :message="session('success')" />
          @endif
          @if (session('error'))
          <x-AlertSuccess :message="session('error')" />
          @endif
        </div>

        <div class="container mx-auto p-6">
  <!-- Dashboard Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Task Card -->
    <a href="{{route('client.task.index')}}" class="card bg-white min-h-[150px] p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Tasks</h2>
      <p class="text-3xl font-bold text-blue-500">{{$taskCount}}</p>
      <p class="text-gray-500">View All Tasks</p>
    </a>

    <!-- Project Card -->
    <a href="{{route('client.project.index')}}" class="card bg-white p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Projects</h2>
      <p class="text-3xl font-bold text-green-500">{{$projectCount}}</p>
      <p class="text-gray-500">View All Projects</p>
    </a>

    <!-- Client Card -->
    <a href="{{route('client.index')}}" class="card bg-white p-6 rounded-lg border hover:shadow-xl transition-all duration-300 transform hover:scale-105">
      <h2 class="text-xl font-semibold text-gray-700">Total Clients</h2>
      <p class="text-3xl font-bold text-purple-500">{{$clientCount}}</p>
      <p class="text-gray-500">View All Clients</p>
    </a>
  
  </div>
</div>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
  <div class="p-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Activity</h2>
      <ul class="divide-y divide-gray-200">
          @foreach($projects as $project)
              <li class="py-4">
                  <div class="flex space-x-3">
                      <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                      <div class="flex-1 space-y-1">
                          <div class="flex items-center justify-between">
                              <h3 class="text-sm font-medium text-gray-900">Project Updated: {{ $project['name'] }}</h3>
                              <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($project['updated_at'])->diffForHumans() }}</p>
                          </div>
                          <p class="text-sm text-gray-500">Status: {{ str_replace('_', ' ', $project['status']) }}</p>
                      </div>
                  </div>
              </li>
          @endforeach
          @foreach($projects as $project)
              @foreach($project['tasks'] as $task)
                  <li class="py-4">
                      <div class="flex space-x-3">
                          <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                          </svg>
                          <div class="flex-1 space-y-1">
                              <div class="flex items-center justify-between">
                                  <h3 class="text-sm font-medium text-gray-900">Task Updated: {{ $task['name'] }}</h3>
                                  <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($task['updated_at'])->diffForHumans() }}</p>
                              </div>
                              <p class="text-sm text-gray-500">Status: {{ str_replace('_', ' ', $task['status']) }}</p>
                          </div>
                      </div>
                  </li>
              @endforeach
          @endforeach
      </ul>
  </div>
</div>
      </div>
    </main>
  </div>
  
</body>
</html>

