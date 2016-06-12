<div style="border: 1px solid #ddd; padding: 10px; background-color: #F5F5F5; margin-bottom: 20px;">
    <h5>Author menu</h5>
    <hr>
    <a href="{{ URL::route('author_profile_index') }}" class="btn btn-default">index</a>
    <a class="btn btn-default" href="{{URL::route('author_profile_edit')}}">edit</a>
    <a class="btn btn-default" href="{{URL::route('author_profile_show')}}">preview</a>
    <a href="{{ URL::route('author_home') }}" class="btn btn-primary pull-right">home</a>

</div>