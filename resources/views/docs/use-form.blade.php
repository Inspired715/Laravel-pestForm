@extends('docs._layout')

@section('page')
      <!-- right content -->
      <div class="flex-1 md:w-3/5 bg-white p-6 shadow rounded-2xl">
        <h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
          Create a New Form
        </h1>
        <p class="text-2xl text-brand-primary-300 mt-10 mb-5">Use a Form</p>
        <!-- one block -->
        <div class="">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">1. </span>
            <p class="text-brand-primary-300 text-sm">
              Go to the <a href="../forms.html" class="font-bold">PestForm forms page</a> and locate the form you want
              to use.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow-md" src="../images/form-list.png" alt="free">
          </div>
        </div>
        <!-- two block -->
        <div class="">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">2. </span>
            <p class="text-brand-primary-300 text-sm">
              Click on "Copy Embed Code"; it should look similar to this:
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <div class="bg-brand-blue-200 flex flex-col px-10 py-6 rounded-lg text-white text-sm w-full lg:text-base">
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm overflow-x-auto">
                <span class="text-pink-600">&lt;form</span>
                <span class="text-green-600">action</span>=
                <span class="text-yellow-400">"http://localhost:5500/public/index.html"</span>
                <span class="text-green-600">method</span>=<span class="text-yellow-400">"POST"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
            </div>
          </div>
        </div>
        <!-- three block -->
        <div class="">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">3. </span>
            <p class="text-brand-primary-300 text-sm">
              This embed code can replace an existing HTML form tag, or if you have a form setup the way you like it,
              just make sure that the method attribute is set to "POST" and the action attribute is set to the FieldGoal
              endpoint. We'll give a few examples below.
            </p>
          </div>
          <!-- html -->
          <h4 class="font-medium text-brand-primary-400 mb-1">HTML</h4>
          <div class="flex justify-center items-center m-8">
            <div
              class="bg-brand-blue-200 flex flex-col px-10 py-6 rounded-lg overflow-x-scroll text-white text-sm w-full lg:text-base">
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm">
                <span class="text-pink-600">&lt;form</span>
                <span class="text-green-600">action</span>=
                <span class="text-yellow-400">"http://localhost:5500/public/index.html"</span>
                <span class="text-green-600">method</span>=<span class="text-yellow-400">"POST"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm ml-4">
                <span class="text-pink-600">&lt;input</span>
                <span class="text-green-600">type</span>=
                <span class="text-yellow-400">"text"</span>
                <span class="text-green-600">name</span>=<span class="text-yellow-400">"first_name"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm ml-4">
                <span class="text-pink-600">&lt;input</span>
                <span class="text-green-600">type</span>=
                <span class="text-yellow-400">"text"</span>
                <span class="text-green-600">name</span>=<span class="text-yellow-400">"first_name"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm">
                <span class="text-pink-600">&lt;/form</span>
                <span class="text-pink-600">&gt;</span>
              </span>
            </div>
          </div>
          <!-- tailwind css -->
          <h4 class="font-medium text-brand-primary-400 mb-1">HTML</h4>
          <div class="flex justify-center items-center m-8">
            <div
              class="bg-brand-blue-200 flex flex-col px-10 py-6 rounded-lg overflow-x-scroll text-white text-sm w-full lg:text-base">
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm">
                <span class="text-pink-600">&lt;form</span>
                <span class="text-green-600">action</span>=
                <span class="text-yellow-400">"http://localhost:5500/public/index.html"</span>
                <span class="text-green-600">method</span>=<span class="text-yellow-400">"POST"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm ml-4">
                <span class="text-pink-600">&lt;div</span>
                <span class="text-green-600">class</span>=
                <span class="text-yellow-400">"mb-4"</span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm ml-8">
                <span class="text-pink-600">&lt;input</span>
                <span class="text-green-600">class</span>=
                <span class="text-yellow-400 whitespace-nowrap">"border rounded w-full py-2 px-3
                  focus:shadow-outline"</span>
                <span class="text-green-600">type</span>=
                <span class="text-yellow-400">"text"</span>
                <span class="text-green-600">placeholder</span>=<span class="text-yellow-400">"Username"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm ml-8">
                <span class="text-pink-600">&lt;input</span>
                <span class="text-green-600">class</span>=
                <span class="text-yellow-400 whitespace-nowrap">"border rounded w-full py-2 px-3
                  focus:shadow-outline"</span>
                <span class="text-green-600">type</span>=
                <span class="text-yellow-400">"text"</span>
                <span class="text-green-600">placeholder</span>=<span class="text-yellow-400">"Password"
                </span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm ml-4">
                <span class="text-pink-600">&lt;/div</span>
                <span class="text-pink-600">&gt;</span>
              </span>
              <span class="px-1 flex flex-nowrap gap-2 py-1 rounded-sm">
                <span class="text-pink-600">&lt;/form</span>
                <span class="text-pink-600">&gt;</span>
              </span>
            </div>
          </div>
        </div>
      </div>
@endsection