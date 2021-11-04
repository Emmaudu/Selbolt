@extends('layouts.master')
@section('title')
Profile Page
@endsection
<!-- Page content -->
@section('content')
<div class="container mt--6">
    <div class="row">
        <div class="col-xl-10 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        <h3 class="mb-0">Link Account For Payment</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            @if($message = Session::get('success'))
                <div class ='alert alert-success' style = "margin-bottom:8px">{{$message}}</div>
            @endif
            <div class="card-body">
                <form role="form" method="post" action="{{route('mentor.create-payment-mode')}}">
                    @csrf
                    @if ($errors->any())
                        <ul style = "margin-bottom:10px">
                        @foreach ($errors->all() as $error)
                            <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
                        @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        <label class="label">BANK CODE</label>
                        <select class="form-control" type="number" name="bank_code">
                            <option disabled selected>Select Bank</option>
                            @foreach($bankCodes as $bankCode)
                            <option value="{{$bankCode['code']}}">{{$bankCode['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label class="label">Account Number</label>
                            <input class="form-control" placeholder="Account Number" type="number" name="account_number">
                    </div>
                    <div class="form-group">
                        <label class="label">Phone Number</label>
                        <input class="form-control" placeholder="Phone Number" type="number" name="mobile">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-primary" type="submit" value="Link Acccount">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection