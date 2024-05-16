@extends('layout.main')

@section('content')
<form action="{{ route("settings.save") }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
    <div class="card card-primary card-outline mt-5">
        <div class="card-header">
            <div class="card-title">
                <h4>Application Settings</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Logo</label>
                        <br/>
                        <input name="logo" type="file" style="display: none;" accept="image/*"/>
                        <img id="logo" src="{{ setting("logo", asset("images/logo.png")) }}" style="width: 120px;height: 120px"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Favicon</label>
                        <br/>
                        <input name="favicon" type="file" style="display: none;" accept="image/*"/>
                        <img id="favicon" src="{{ setting("favicon", asset("images/logo.png")) }}" style="width: 60px;height: 60px"/>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="phone">Title</label>
                        <input class="form-control" 
                               name="title" 
                               type="text" 
                               id="title" 
                               value="{{ setting("title", "") }}" 
                               placeholder="Enter Title">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Email</label>
                        <input class="form-control" 
                               name="email" 
                               type="text" 
                               id="email" 
                               value="{{ setting("email", "") }}" 
                               placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" 
                               name="phone" 
                               type="text" 
                               id="phone" 
                               value="{{ setting("phone", "") }}" 
                               placeholder="Enter Phone">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Copyright</label>
                        <input class="form-control" 
                               name="copyright" 
                               type="text" 
                               id="copyright" 
                               value="{{ setting("copyright", "") }}" 
                               placeholder="Enter Copyright">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="version">Version</label>
                        <input class="form-control" 
                               name="version" 
                               type="text" 
                               id="version" 
                               value="{{ setting("version", "") }}" 
                               placeholder="Enter Version">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input class="btn btn-success float-right"  type="submit" value="Save">
            <p class="clearfix"></p>
        </div>
    </div>
</form>
@endsection