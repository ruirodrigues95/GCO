<!-- Username welcome -->

<div class="container-fluid col-lg-12 welcome-message d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="mt-3 d-flex flex-column align-items-center">
            <h1 class="welcome-user">Hello, {{ auth()->user()->userData->name }}</h1>
            <div class="user-photo rounded-circle shadow mt-2" style="background-image: url({{ asset('storage/img/users/' . auth()->user()->userData->photo) }})"></div>
        </div>
    </div>
</div>

<!-- Courses title and categories button -->

<h1 class="title-courses text-center mt-5 mb-5">Enjoy our Courses</h1>

<div class="container mb-5">
    <div class="dropdown d-flex justify-content-end">
        <button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/categories">See All</a>
            @foreach($categories as $category)
                <a href="{{url('categories/' . $category->id . '/subcategories')}}" class="dropdown-item">{{$category->name}}</a>
            @endforeach
        </div>
    </div>

<!-- Course List -->

    <course-list search-query-string="{{ request()->query('search') ?? '' }}" user-id="{{ auth()->check() ? auth()->user()->id : null }}"></course-list>
</div>
