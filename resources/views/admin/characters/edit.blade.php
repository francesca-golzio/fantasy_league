<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Update the Character') }}
      </h2>
  </x-slot>

  <div>
    <form 
      action="{{ route('admin.characters.update', $character) }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="dark:bg-white">
      @csrf
      @method('PUT')
        <input type="text" name="name" value="{{ $character->name }}" placeholder="name">
        <input type="text" name="surname" value="{{ $character->surname }}" placeholder="surname">
        <input type="text" name="cost" value="{{ $character->cost }}" placeholder="cost">
        <textarea name="description" placeholder="description">{{ $character->description }}</textarea>
        <input type="text" name="img_profile" value="{{ $character->img_profile }}" placeholder="img_profile">
        <input type="text" name="img_full" value="{{ $character->img_full }}" placeholder="img_full">
        <!-- <input type="file" name="img_profile" value="{{ $character->img_profile }}">
        <input type="file" name="img_full" value="{{ $character->img_full }}"> -->
        <input type="submit" value="Save">
    </form>
  </div>

</x-app-layout>