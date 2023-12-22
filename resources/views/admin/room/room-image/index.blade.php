@extends('admin.layout.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Course_outline Tables</h1>
            <nav class="d-flex justify-content-between align-item-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Courses</a></li>
                    <li class="breadcrumb-item">CourseOutline</li>
                </ol>

            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    @if (session('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('successMsg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h6>Room Images</h6>
                        </div>
                        <form
                            action=""
                            method="post">
                            @csrf
                            <div class="card-body">
                                {{-- <div class="my-3">
                                    <label for="" class="form-label">Image</label>
                                    <input type="file" name = "image" class="form-control"
                                    >
                                </div> --}}

                                <div class="col-md-12 ">
                                    <button id="secondAddBtn" class="btn btn-success mb-3 rounded">+ Add Images</button>
                                    <div class="parentDiv2 form-group mb-2"></div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($courseOutlines as $index => $courseOutline)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $courseOutline->title }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($courseOutline->descriptions as $description)
                                                        <li>{{ $description->description }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <form action="{{ route('course_outline.destroy', $courseOutline->id) }}"
                                                    method = "post">
                                                    @csrf @method('delete')

                                                    @if (isset($courseOutlineEdit))
                                                        <a href="{{ route('course_outline.index', ['course_id' => $courseEdit->id, 'edit' => $courseOutline->id]) }}"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    @else
                                                        <a href="{{ route('course_outline.index', ['course_id' => $course->id, 'edit' => $courseOutline->id]) }}"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    @endif
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick = "return confirm('Are you sure to delete?')"><i
                                                            class="bi bi-trash3-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>

                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    @section('js')
    <script>
        $(document).ready(function() {

            $('#secondAddBtn').click(function(e) {
                e.preventDefault()
                $('.parentDiv2').append(
                    `<div class='row'><div class = "input-group"><div class="col-md-11 me-2"><input type = "file" class='form-control my-2' name = 'images[]' rows='3'></input></div><button class='delBtn2 btn btn-danger mt-2' style='border-radius:5px;height:40px'><i class='bi bi-x-lg'></i></button></div></div></div> `
                );
            })

            $('.parentDiv').on('click', '.delBtn', function() {
                $(this).parent().remove();
            })

            $('.parentDiv2').on('click', '.delBtn2', function() {
                $(this).parent().remove();
            })

        })
    </script>
    @endsection
@endsection