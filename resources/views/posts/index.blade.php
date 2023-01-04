@extends('postpackage::layouts.app')
@section('name-page')
    <h1 class="text-2xl font-semibold text-gray-900">Posts</h1>
@endsection
@section('description-page')
<p class="mt-2 text-sm text-gray-700">A list of all the posts in your account including their ID, title, Body and Author ID.</p>
@endsection
@section('breadcrum-first')
<li class="flex">
  <div class="flex items-center">
    <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
    </svg>
    <a href="/blog/post" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Posts</a>
  </div>
</li>
@endsection
@section('content')


<div class="px-4 sm:px-6 lg:px-8 my-3">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
       
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="/blog/post/create" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add user</a>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author ID</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($post as $posts)
                    
                    <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$posts->id}}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$posts->title}}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$posts->author_id}}</td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="/blog/post/{{$posts->id}}" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                    </td>
                    </tr>
                @endforeach
  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  

@endsection