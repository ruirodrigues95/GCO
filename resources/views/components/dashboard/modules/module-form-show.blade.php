<div class="container ml-5 mt-2">
    <div class="d-flex flex-wrap">
        <div class="container text-right">
            <h4 class="mb-3"><span class=" text-black-50 mr-2">Course: </span>{{$module->course->name}}</h4>
        </div>
        <h3  class="mb-3 mr-5" style="white-space: nowrap;"><span class=" text-black-50 mr-2">Module: </span>{{$module->name}}</h3>
    </div>
    <table class="table table-hover table-bordered col-6 mt-4 mr-5 rounded">
        <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="px-4">Lesson Name</th>
        </tr>
        </thead>
        <tbody>
            @foreach($module->lessons as $lesson)
                <tr>
                    <th scope="row" class="text-center">
                        {{$loop->index+1}}
                    </th>
                    <td class="px-4">
                        <a class="text-decoration-none text-dark" href="{{url('/lessons/' . $lesson->id)}}">
                            {{$lesson->title}}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

