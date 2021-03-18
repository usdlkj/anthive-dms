<li class="nav-item">
    <a href="/projects/create" class="nav-link">
        <p>+Create Project</p>
    </a>
</li>

@foreach (Auth::user()->projects as $project)
<li class="nav-item">
    <a href="/projects/{{$project->id}}" class="nav-link">
        <p>{{$project->project_name}}</p>
    </a>
</li>
@endforeach



