@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
                @if(Session::has('success'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box box-info">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">Quick Email</h3>
                    <!-- tools box -->

                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <form role="form" action="{{ route('post') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <textarea class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;" placeholder="Message" name="desc">{{ (isset($desc))? $desc->description : '' }}</textarea><input name="_wysihtml5_mode" value="1" type="hidden">
                            {{--<iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="display: inline; background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(221, 221, 221); border-style: solid; border-width: 1px; clear: none; float: none; margin: 0px; outline: 0px none rgb(51, 51, 51); outline-offset: 0px; padding: 10px; position: static; top: auto; left: auto; right: auto; bottom: auto; z-index: auto; vertical-align: text-bottom; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 100%; height: 125px;" width="0" height="0" frameborder="0"></iframe>--}}
                        </div>
                        <div class="box-footer clearfix">
                            <button name="submit" type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                                <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="box box-info">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">Headings</h3>

                    <!-- tools box -->

                    <!-- /. tools -->
                </div>
                <div class="box-body">
                   <table class="table table-striped table-responsive">
                       <thead>
                        <tr>
                            <th>Headings</th>
                            <small><a class="btn btn-primary btn-sm add">Add New</a></small>
                        </tr>
                       </thead>
                       <tbody class="field">

                        @if (!empty($contents))
                           @foreach ($contents as $content)

                               <tr>
                                       <form role="form" action="{{ route('updateHead', $content->id) }}" method="post">
                                       <td><input name="heading" value="{{ $content->heading }}"></td>
                                           {{ csrf_field() }}

                                           <td><button class="btn btn-primary btn-sm" type="submit">Update</button></td>
                                       </form>
                                   </tr>
                           @endforeach
                            @endif
                            @if (empty($contents))
                            <tr>
                                <td><h3>No Entries</h3></td>
                            </tr>
                            @endif()
                       </tbody>
                   </table>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection
