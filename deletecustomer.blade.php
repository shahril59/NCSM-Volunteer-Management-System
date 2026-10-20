@extends('layout.app')
@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    .banner img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-bottom: 3px solid #dc3545;
    }

    .form-container {
        max-width: 500px;
        margin: 40px auto;
        background: #fff;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        text-align: center;
    }

    h1 {
        color: #dc3545;
        margin-bottom: 25px;
    }

    p {
        font-size: 16px;
        color: #333;
        text-align: left;
        line-height: 1.6;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    button {
        width: 48%;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #b52a38;
    }

    .btn-cancel {
        background-color: #6c757d;
        color: white;
    }

    .btn-cancel:hover {
        background-color: #545b62;
    }
</style>

<div class="banner">
    <img src="{{ asset('images/customer.jpg') }}" alt="customer">
</div>

<div class="form-container">
    <h1>CONFIRM DELETE</h1>

    <p><strong>MyKad:</strong> {{ $customer->custmykad }}</p>
    <p><strong>Name:</strong> {{ $customer->custname }}</p>
    <p><strong>Phone:</strong> {{ $customer->custphonenum }}</p>
    <p><strong>Address:</strong> {{ $customer->custaddress }}</p>
    <p><strong>Postcode:</strong> {{ $customer->custpostcode }}</p>
    <p><strong>State:</strong> {{ $customer->custstate }}</p>

    <form action="{{ route('deletecustomer', $customer->custmykad) }}" method="POST">
        @csrf
        <div class="button-container">
            <button type="submit" class="btn-delete">CONFIRM DELETE</button>

           <a href="{{ route('viewcustomer') }}" class="btn-cancel" style="text-decoration: none; line-height: 40px;">CANCEL</a>
        </div>
    </form>
</div>

@endsection
