@props(['post'])

    <span class="ml-2 text-gray-600">   Usuario:{{$post->category->created_at}}</span>
    <span class="ml-2 text-gray-500">   Última Modificación:{{$post->category->updated_at}}</span>
    <span class="ml-2 text-gray-500">   Tags:{{$post->tags}}</span>