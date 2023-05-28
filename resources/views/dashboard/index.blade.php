@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <input type="button" id="delete-user" class="btn btn-danger" value="Delete"/>
                </div>
            </div>
        </div>
        <div class="pt-2"></div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-responsive-lg ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>NIC</th>
                        <th>Email</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tbody>
                        <tr id="row-user-{{$user->id}}">
                            <td><input type="checkbox" class="user-ids" name="user_ids[]" value="{{$user->id}}"/></td>
                            <td>{{$user->fname}}</td>
                            <td>{{$user->lname}}</td>
                            <td>{{$user->nic}}</td>
                            <td>{{$user->email}}</td>
                            <td><a target="_blank" class="text-primary"
                                   href="{{route('exportappform.generate',$user->id)}}"><i
                                            class="fa fa-lg fa-file-export"></i></a></td>
                        </tr>

                        </tbody>

                    @endforeach

                </table>
                {{$users->links()}}
            </div>

        </div>
    </div>
@endsection
