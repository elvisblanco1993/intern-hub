@forelse (\App\Models\Category::get() as $category)
    <option value="{{ $category->name }}">{{ $category->name }}</option>
@empty
@endforelse
