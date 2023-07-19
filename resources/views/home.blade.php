<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Document</title>
</head>
<body>
  @auth
  <div class="p-6 flex flex-col gap-4">
    <p>Congrats, you are logged in</p>
    <form action="/logout" method="POST">
      @csrf
      <button type="submit" class="bg-green-300 px-2 py-1">Logout</button>
    </form>
  </div>
  <div class="border-2 border-green-500 p-6">
    <h2>Create a new post</h2>
    <form action='/create-post' method='POST' class="flex flex-col gap-4">
      @csrf
      <input type="text" placeholder="title" name="title" class="border border-gray-500">
      <textarea name="body" placeholder="body content..." class="border border-gray-500"></textarea>
      <button type="submit" class="bg-green-300 px-2 py-1">Create new post</button>
  </div>
    <div class="border-2 border-green-500 p-6">
      <h2>All posts</h2>
      @foreach($posts as $post)
        <div class="bg-gray-300 p-4 m-4 space-y-2">
          <h3>{{$post['title']}} by {{$post->user->name}}</h3>
          <p>{{$post['body']}}</p>
          <p><a href="/edit-post/{{$post->id}}" class="bg-blue-300 px-2 py-1">Edit</a></p>
          <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-300 px-2 py-1">Delete</button>
          </form>
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