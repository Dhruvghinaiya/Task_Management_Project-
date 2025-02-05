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
    <x-admin-header/>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Project</h1>
        <div class="flex gap-5 ml-auto">
          <a href="{{route('admin.project.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Add Project
          </a>
        </div>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="mb-4">

          @if (session('message'))
          @php 
              $message = session('message');
          @endphp
          <div id="alert-message" class="alert-container">
              @if($message['status'] == 'success')
                  <x-AlertSuccess :message="$message['description']" />
              @elseif($message['status'] == 'error')
                  <x-AlertError :message="$message['description']" />
              @endif
          </div>

         
      @endif
        <div class="container mx-auto p-4">
          <!-- Grid to show 3 cards in a row -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              
            @foreach ($projects as $project )
              <div class="bg-white p-6 rounded-lg shadow-md border rounded-t-lg">
                <h2 class="text-xl font-semibold text-gray-800">{{$project->name}}</h2>
                <p class="text-gray-600 mt-2"> {{  \Illuminate\Support\Str::limit($project->description,50)}}</p>
                <p class="mt-4 text-sm text-gray-500">Start Date: {{$project->start_date->format('M d, Y') }}</p>
                <p class="mt-2 text-sm text-gray-500">End Date: {{$project->end_date->format('M d, Y') }}</p>
                <div class="mt-4">
                  <a href="{{route('admin.project.show',$project->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">View Details</a>
                </div>
              </div>
              @endforeach
          </div>
      </div>
      
      </div>
    </main>
  </div>
  
</body>
</html>

  