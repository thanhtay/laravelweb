@extends('backend::layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h2>List User</h2>
        </div>
    </div>
    <form class="mb-3 px-4" action="">
        <div class="row">
            <div class="col-6">
                <label for="inputEmail3" class="col-form-label">Name</label>
                <input type="email" class="form-control" id="inputEmail3" placeholder="Name">
            </div>
            <div class="col-6">
                <label for="inputEmail3" class="col-form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
            <div class="w-100 mt-3"></div>
            <div class="col-6">
                <div class="form-check d-inline">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Teacher
                    </label>
                </div>
                <div class="form-check d-inline">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        User
                    </label>
                </div>
            </div>
            <div class="col-6">
                <button class="btn-success">Search</button>
            </div>
        </div>

    </form>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</td>
                <th scope="col">Name</td>
                <th scope="col">Email</td>
                <th scope="col">Role</td>
                <th scope="col">Setting</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><a href="#">Tay</a></td>
                <td>nguyenthanhtay90@gmail.com</td>
                <td>Super Admin</td>
                <td><button class="btn-secondary">Lock</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="#">Tay</a></td>
                <td>nguyenthanhtay90@gmail.com</td>
                <td>Super Admin</td>
                <td><button class="btn-secondary">Lock</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="#">Tay</a></td>
                <td>nguyenthanhtay90@gmail.com</td>
                <td>Super Admin</td>
                <td><button class="btn-secondary">Lock</button></td>
            </tr>
        </tbody>
    </table>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
                <span class="page-link">
                    2
                    <span class="sr-only">(current)</span>
                </span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
@endsection
