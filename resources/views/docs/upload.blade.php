@extends('docs._layout')

@section('page')
      <!-- right content -->
      <div class="flex-1 w-full bg-white p-6 shadow rounded-2xl">
        <h1 class="font-bold text-2xl text-center md:text-left text-brand-primary-400 mb-6">
          Upload Files to S3
        </h1>
        <!-- one block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">1. </span>
            <p class="text-brand-primary-300 text-sm">
              If your form fields include an input for file uploads, FieldGoal will store these files to S3 once
              configured. You must have an Amazon S3 account setup with programmatic access, along with a bucket and
              directory that you want to use for file uploads.
            </p>
          </div>
        </div>
        <!-- two block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">2. </span>
            <p class="text-brand-primary-300 text-sm">
              Navigate to FieldGoal's form settings page and add your S3 access keys. Please note that your Secret
              Access Key can only be downloaded once it is created. If you no longer have it, you will need to create a
              new one.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/access-keys.png" alt="free">
          </div>
        </div>
        <!-- three block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">3. </span>
            <p class="text-brand-primary-300 text-sm">
              When creating a bucket, you will select the region and name. Both should be all lowercase and may contain
              hyphens.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/region-bucket.png" alt="free">
          </div>
        </div>
        <!-- four block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">4. </span>
            <p class="text-brand-primary-300 text-sm">
              The directory path is needed unless you are uploading all files to the root folder.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/directory.png" alt="free">
          </div>
        </div>
        <!-- five block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">5. </span>
            <p class="text-brand-primary-300 text-sm">
              The "Allowed Mimes" field refers to the document extensions that are allowed to be uploaded. For example,
              if you want to allow PDF, Word Documents, and Text documents you would fill out the field as below.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/mimes.png" alt="free">
          </div>
        </div>
        <!-- six block -->
        <div class="mb-6">
          <div class="flex gap-2 my-2">
            <span class="font-semibold text-brand-primary-400">6. </span>
            <p class="text-brand-primary-300 text-sm">
              The "Max File Upload Size" field must be listed in Kilobytes. 1MB = 1000KB, so if you only want users to
              upload a max file size of 5MB, you would fill out the field as below.
            </p>
          </div>
          <div class="flex justify-center items-center m-8">
            <img class="shadow" src="../images/file-size.png" alt="free">
          </div>
        </div>
      </div>
    @endsection