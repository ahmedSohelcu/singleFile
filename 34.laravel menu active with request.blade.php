==================================================================================================================================

@if(Request::is('login') OR Request::is('tags') OR Request::is('categories') OR Request::is('posts') OR Request::is('tags/..') OR Request::is('categories/..') OR Request::is('posts/..') OR Request::is("posts/{$post->id}"))
    @include('partials._navAdmin')
  @else  
    @include('partials._nav')

==================================================================================================================================
is() method iterates over arguments:
==================================================================================================================================
foreach (func_get_args() as $pattern) {
    if (Str::is($pattern, $this->decodedPath())) {
        return true;
    }
}

So, something like this should work for you:

@if(Request::is('login', 'tags', 'categories', 'posts', 'tags/..', 'categories/..', 'posts/..', 'posts/{$post->id}'))

==================================================================================================================================