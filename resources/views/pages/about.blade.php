@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron text-center my-5">
        <h1>About</h1>
    </div>
    <div class="justify-content-center py-5 my-5">

    <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">ID</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-primary">
                <th scope="row">1</th>
                <td>Haoru Xiao</td>
                <td>1507250</td>
              </tr>
              <tr class="table-secondary">
                <th scope="row">2</th>
                <td>Dixing Xu</td>
                <td>1509014</td>
              </tr>
              <tr class="table-success">
                <th scope="row">3</th>
                <td>Zeying Zhang</td>
                <td>1509815</td>
              </tr>
              <tr class="table-danger">
                <th scope="row">4</th>
                <td>Yinan Wang</td>
                <td>1507641</td>
              </tr>
              <tr class="table-warning">
                <th scope="row">5</th>
                <td>Jialu Wang</td>
                <td>1509213</td>
              </tr>
              <tr class="table-info">
                <th scope="row">6</th>
                <td>Xutong Liu</td>
                <td>1509287</td>
              </tr>
            </tbody>
          </table>

    </div>


</div>
@stop