@extends('layouts.master')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <form id="emailForm" class="border p-4 bg-light shadow-sm">
                @csrf 
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control" required>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Message</label>
                    <textarea id="body" name="body" class="form-control" rows="5" required></textarea>
                    <div class="invalid-feedback"></div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Send Email</button>
            </form>

            <div id="responseMessage" class="mt-3 text-center"></div>
        </div>
    </div>
</div>

@endsection