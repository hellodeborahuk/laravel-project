<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Document</title>
</head>
<body class="mx-auto max-w-screen-lg min-h-screen p-4">
  <h2 class="text-4xl font-bold text-green-900 py-6">Edit Post</h2>
  <form action="/edit-post/{{$post->id}}" method="POST"
    class="min-h-[170px] flex flex-col gap-4 border bg-white border-green-700 rounded-lg shadow-lg p-6">
    @csrf
    @method('PUT')
    <div class="flex space-x-2 items-center">
      <label>Title:</label>
      <input type="text" name="title" value="{{$post->title}}" class="text-green-900 font-bold w-full p-2">
    </div>
    <div class="flex space-x-2 items-center">
      <label for="body" class="whitespace-nowrap">Edit post:</label>
      <textarea name="body" class="W-full p-2">{{$post->body}}</textarea>
    </div>
    <div class="flex justify-end note-footer">
      <button type="submit"class="rounded-2xl px-3 py-1 bg-green-600 hover:bg-green-900 transition duration-500 text-green-50">Save changes</button>
    </div>
  </body>
</html>