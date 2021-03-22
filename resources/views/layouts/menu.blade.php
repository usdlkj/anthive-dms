<li class="nav-item">
    <a href="{{route('projects.create')}}" class="nav-link">
        <p>+Create Project</p>
    </a>
</li>

@foreach (Auth::user()->projects as $project)
<li class="nav-item">
    <a href="{{route('projects.documents.index', $project->id)}}" class="nav-link">
        <p>{{$project->project_name}}</p>
    </a>
</li>
@endforeach
