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
        border-bottom: 3px solid #007BFF;
    }

    .form-container {
        max-width: 500px;
        margin: 40px auto;
        background: #fff;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        font-weight: 600;
        color: #555;
        margin-bottom: 6px;
    }

    input[type="text"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #007BFF;
        outline: none;
    }

    button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        text-decoration: none;
        color: #007BFF;
        font-weight: 500;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="banner">
    <img src="{{ asset('images/customer.jpg') }}" alt="customer">
</div>

<div class="form-container">
    <h1>UPDATE CUSTOMER</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updatecustomer', $customer->custmykad) }}" method="POST">
        @csrf

        <div class="form-group">
            <label>NRIC No (cannot edit):</label>
            <input type="text" name="custmykad" value="{{ $customer->custmykad }}" readonly>
        </div>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="custname" value="{{ $customer->custname }}">
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="custphonenum" value="{{ $customer->custphonenum }}">
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="custaddress" value="{{ $customer->custaddress }}">
        </div>

        <div class="form-group">
            <label>Postcode:</label>
            <input type="text" name="custpostcode" value="{{ $customer->custpostcode }}">
        </div>

        <div class="form-group">
            <label>State:</label>
            <select name="custstate" required>
                <option value="">-- Select State --</option>
                @php
                    $states = [
                        'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang',
                        'Perak', 'Perlis', 'Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor',
                        'Terengganu', 'Wilayah Persekutuan Kuala Lumpur', 'Wilayah Persekutuan Labuan', 'Wilayah Persekutuan Putrajaya'
                    ];
                @endphp
                @foreach ($states as $state)
                    <option value="{{ $state }}" {{ $customer->custstate == $state ? 'selected' : '' }}>
                        {{ $state }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">UPDATE</button>
    </form>

    </div>

@endsection
