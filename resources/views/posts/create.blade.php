@extends('postpackage::layouts.app')
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
@section('breadcrum-second')
<li class="flex">
    <div class="flex items-center">
      <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
      </svg>
      <a href="/blog/post/create" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">New Post</a>
    </div>
  </li>
@endsection
@section('alert')
@if ($message = Session::get('success'))
<div class="rounded-md bg-green-50 p-4">
    <div class="flex">
      <div class="flex-shrink-0">
        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        <h3 class="text-sm font-medium text-green-800">Success</h3>
        <div class="mt-2 text-sm text-green-700">
          <p>{{$message}}</p>
        </div>
        
      </div>
    </div>
  </div>
  
@endif
@endsection
@section('content')
<div class="mx-4 px-3 my-3">
    <form class="space-y-8 divide-y divide-gray-200" method="POST">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
          <div class="space-y-6 sm:space-y-5">
           
      
            <div class="space-y-6 sm:space-y-5">
              <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Title</label>
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <div class="flex max-w-lg rounded-md shadow-sm">
                    <input type="text" value="" name="title" id="title" autocomplete="title" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  </div>
                </div>
              </div>
      
              <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="body" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Body</label>
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <textarea id="body" name="body" rows="3" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                  <p class="mt-2 text-sm text-gray-500">Write a few sentences for post.</p>
                </div>
              </div>
      
            </div>
          </div>
      
          
        </div>
      
        <div class="pt-5">
          <div class="flex justify-end">
            <a href="{{url()->previous()}}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
          </div>
        </div>
    </form>
</div>   
  
    
@endsection
