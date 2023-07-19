<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Document</title>
</head>
<body class="mx-auto max-w-screen-lg min-h-screen p-4">
  @auth
  <div class="flex justify-between items-center">
    <h2 class="text-5xl font-bold text-green-900 py-6">Notes</h2>
    <form action="/logout" method="POST">
      @csrf
      <button type="submit" class="rounded-2xl px-3 py-1 bg-green-600 hover:bg-green-900 transition duration-500 text-green-50"">Logout</button>
    </form>
  </div>
  <div class="lg:grid grid-cols-3 gap-6 space-y-8 lg:space-y-0">
    <div class="min-h-[170px] flex flex-col flex-grow border bg-white border-green-700 rounded-lg shadow-lg">
      <form action='/create-post' method='POST' >
        @csrf
          <div class="p-4 flex items-center justify-between relative border-b border-green-700">
            <input type="text" placeholder="Enter title..." name="title" class="text-green-900 font-bold">
            <div class="flex space-x-2">
              <div class="w-3 h-3 rounded-full bg-red-500"></div>
              <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
              <div class="w-3 h-3 rounded-full bg-green-500"></div>
            </div>
          </div>
          <div class="p-4 flex flex-col h-full justify-between">
            <textarea name="body" placeholder="Type to add a note..." class="w-full text-green-800"></textarea>
            <div class="flex justify-end note-footer">
              <button type="submit" class="rounded-2xl px-3 py-1 bg-green-600 hover:bg-green-900 transition duration-500 text-green-50">Create post</button>
            </div>
          </div>
      </form>
    </div>
     @foreach($posts as $post)
       <div class="min-h-[170px] flex flex-col border border-green-700 bg-green-50 rounded-lg shadow-lg">
        <div class="p-4 flex items-center justify-between relative border-b border-green-700">
          <h3>{{$post['title']}}</h3>         
          <div class="flex space-x-2">
            <div class="w-3 h-3 rounded-full bg-red-500"></div>
            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
            <div class="w-3 h-3 rounded-full bg-green-500"></div>
          </div>
        </div>
        <div class="p-4 flex flex-col h-full justify-between">
          <p>{{$post['body']}}</p>  
          <div class="flex items-center justify-between note-footer mt-2">
            <small class="text-green-900">{{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small>
            <div class="flex gap-2">
              <p><a href="/edit-post/{{$post->id}}" class="text-green-900 hover:text-green-600 cursor-pointer">Edit</a></p>
              <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-green-900 hover:text-green-600 cursor-pointer">Delete</button>
              </form> 
            </div>
             
          </div>        
                
        </div>
      </div> 
      @endforeach 
</div>

  @else
    <div class="border-2 border-green-500 p-6">
      <h2 class="mb-2">Register</h2>
      <form action="/register" method="POST" class="flex gap-4">
        @csrf
        <input type="text" placeholder="name" name="name" class="border border-gray-500">
        <input type="text" placeholder="email" name="email" class="border border-gray-500">
        <input type="password" placeholder="password" name="password" class="border border-gray-500">
        <button type="submit" class="bg-green-300 px-2 py-1">Register</button>
      </form>
    </div>
     <div class="border-2 border-green-500 p-6">
      <h2 class="mb-2">Login</h2>
      <form action="/login" method="POST" class="flex gap-4">
        @csrf
        <input type="text" placeholder="name" name="loginname" class="border border-gray-500">
        <input type="password" placeholder="password" name="loginpassword" class="border border-gray-500">
        <button type="submit" class="bg-green-300 px-2 py-1">Login</button>
      </form>
    </div>
  @endauth


</body>
</html>