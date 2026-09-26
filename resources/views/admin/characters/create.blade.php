<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Add a New Character') }}
      </h2>
  </x-slot>

  <div>
    <form 
      action="{{ route('admin.characters.store') }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="dark:bg-white">
      @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="surname" placeholder="surname">
        <input type="text" name="cost" placeholder="cost">
        <textarea name="description" placeholder="description"></textarea>
        <input type="text" name="img_profile" placeholder="img_profile">
        <input type="text" name="img_full" placeholder="img_full">
        <!-- <input type="file" name="img_profile">
        <input type="file" name="img_full"> -->
        <input type="submit" value="Save">
    </form>
  </div>

</x-app-layout>