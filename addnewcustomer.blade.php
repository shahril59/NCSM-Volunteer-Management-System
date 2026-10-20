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
</style>

<div class="banner">
    <img src="{{ asset('images/customer.jpg') }}" alt="customer">
</div>

<div class="form-container">
    <h1>ADD NEW CUSTOMER</h1>

    <form action="{{route('submitcustomer')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>NRIC No:</label>
            <input type="text" name="custmykad" maxlength="12">
        </div>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="custname">
        </div>

        <div class="form-group">
            <label>Phone Number:</label>
            <input type="text" name="custphonenum">
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="custaddress">
        </div>

        <div class="form-group">
            <label>Postcode:</label>
            <input type="text" name="custpostcode">
        </div>

        <div class="form-group">
            <label>State:</label>
            <select name="custstate" required>
                <option value="">-- Select State --</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Pulau Pinang">Pulau Pinang</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
                <option value="Wilayah Persekutuan Labuan">Wilayah Persekutuan Labuan</option>
                <option value="Wilayah Persekutuan Putrajaya">Wilayah Persekutuan Putrajaya</option>
            </select>
        </div>

        <button type="submit">SUBMIT</button>
    </form>
</div>

@endsection
