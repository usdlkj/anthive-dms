<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i><span>Companies</span></a>
</li>

<li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-building"></i><span>Users</span></a>
</li>

<li class="side-menus {{ Request::is('projects*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('projects.index') }}"><i class="fas fa-building"></i><span>Projects</span></a>
</li>

<li class="side-menus {{ Request::is('projectFields*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('projectFields.index') }}"><i class="fas fa-building"></i><span>Project Fields</span></a>
</li>

<li class="side-menus {{ Request::is('projectUsers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('projectUsers.index') }}"><i class="fas fa-building"></i><span>Project Users</span></a>
</li>

<li class="side-menus {{ Request::is('selectValues*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('selectValues.index') }}"><i class="fas fa-building"></i><span>Select Values</span></a>
</li>

<li class="side-menus {{ Request::is('files*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('files.index') }}"><i class="fas fa-building"></i><span>Files</span></a>
</li>

<li class="side-menus {{ Request::is('documents*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('documents.index') }}"><i class="fas fa-building"></i><span>Documents</span></a>
</li>

<li class="side-menus {{ Request::is('companyDocuments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companyDocuments.index') }}"><i class="fas fa-building"></i><span>Company Documents</span></a>
</li>

<li class="side-menus {{ Request::is('documentFields*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('documentFields.index') }}"><i class="fas fa-building"></i><span>Document Fields</span></a>
</li>

<li class="side-menus {{ Request::is('mailTypes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mailTypes.index') }}"><i class="fas fa-building"></i><span>Mail Types</span></a>
</li>

<li class="side-menus {{ Request::is('mails*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mails.index') }}"><i class="fas fa-building"></i><span>Mails</span></a>
</li>

<li class="side-menus {{ Request::is('mailUsers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mailUsers.index') }}"><i class="fas fa-building"></i><span>Mail Users</span></a>
</li>

<li class="side-menus {{ Request::is('mailAttachments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mailAttachments.index') }}"><i class="fas fa-building"></i><span>Mail Attachments</span></a>
</li>

